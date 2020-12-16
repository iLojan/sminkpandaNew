<?php
include '../../includes/session.php'; 
$conn = $pdo->open();

$output = '';
$user =$_SESSION['user'];
$date_added = date('Y-m-d');
// $shopId =$_POST['shopId'];
if($_POST['type'] == 'getCategory' ){

  $total = 0;
   $stmt = $conn->prepare("select * from category");
   if ($stmt->execute()) {

   foreach($stmt as $row){
        $data[] = $row;     
   }
   echo json_encode($data);
}
else{
  $data[] = "401";
   echo json_encode($data);
}
  
}

elseif($_POST['type'] == 'subCategory'){
$categoryId = $_POST['id'];
  $stmt = $conn->prepare("SELECT * FROM subcategory WHERE categoryId=$categoryId");
  if ($stmt->execute()) {
      # code...
      $output .='<option value>Select Category</option>';
  foreach($stmt as $row){
    $data[] = $row;    
    
  }
  echo json_encode($data);
}
  else{
    // $output .="<span>Record Not Found</span>";
  }

}

elseif($_POST['type'] == 'save'){

 echo $productId = $_POST['id'];
  $category=$_POST['category'];
  $subCategory=$_POST['subCategory'];
  $title=$_POST['title'];
  $priceType=$_POST['priceType'];
  $quantity=$_POST['quantity'];
  $price=$_POST['price'];
  $productCondition=$_POST['productCondition'];
  $brand=$_POST['brand'];
  $authenticity=$_POST['authenticity'];
  $description=$_POST['description'];
  $shopId=$_POST['shopId'];
  $url=$_POST['url'];
   $featureList = $_POST['featureList'];
  $character = json_decode($featureList);




  if($productId == 0){
   
  //  -=============
  
  $stmt = $conn->prepare("insert into product(category,subCategory,name,priceType,quantity,price,productCondition,brand,authenticity,description,shopId,create_date) 
  values(:category,:subCategory,:title,:priceType,:quantity,:price,:productCondition,:brand,:authenticity,:description,:shopId,:create_date)");

  $stmt->bindParam(":category",$category);
  $stmt->bindParam(":shopId",$shopId);
  $stmt->bindParam(":create_date",$date_added);
  $stmt->bindParam(":subCategory",$subCategory);
  $stmt->bindParam(":title",$title);
  $stmt->bindParam(":price",$price);
  $stmt->bindParam(":priceType",$priceType);
  $stmt->bindParam(":quantity",$quantity);
  $stmt->bindParam(":productCondition",$productCondition);
  $stmt->bindParam(":brand",$brand);
  $stmt->bindParam(":authenticity",$authenticity);
  $stmt->bindParam(":description",$description);
  
 if($stmt->execute()){
  $productId= $conn->lastInsertId();
  if ($productId) {
   echo json_encode(array("statusCode"=>200,"Messages"=>"Shop Create Success","data"=> $shopId));
         if($character){
    foreach($character as $value)
   {
    //  if($value->id == null){
echo $value->name;
       $stmt = $conn->prepare("insert into product_features(feature,product_id,create_date) 
       values(:feature,:product_id,:create_date)");
       $stmt->bindParam(":feature",$value->name);
       $stmt->bindParam(":product_id",$productId);
       $stmt->bindParam(":create_date",$date_added);
      if($stmt->execute()){
       echo json_encode(array("featuresStatusCode"=>200,"featuresMessages"=>"Product features Added Success"));
      }
      else{
       echo json_encode(array("statusCode"=>201)); 
      }

    //  }
     
   }
  }
   if($url){
       
  $urls = explode(",",$url);
   foreach($urls as $value)
   {
       echo $value;
       $stmt = $conn->prepare("insert into product_images(url,product_id,create_date) 
       values(:url,:product_id,:create_date)");
       $stmt->bindParam(":url",$value);
       $stmt->bindParam(":product_id",$productId);
       $stmt->bindParam(":create_date",$date_added);
      if($stmt->execute()){
       echo json_encode(array("imageStatusCode"=>200,"imageMessages"=>"Shop Images Added Success"));
      }
      else{
       echo json_encode(array("statusCode"=>201)); 
      }
   }
   }
  }
  echo json_encode(array("statusCode"=>200,"Messages"=>"Shop Images Added Success"));
 }
 else{
  echo json_encode(array("statusCode"=>201)); 
 }
}
else{
   $stmt = $conn->prepare("UPDATE product SET 
    category=:category,subCategory=:subCategory,name=:title,
    priceType=:priceType,quantity=:quantity,price=:price,
    productCondition=:productCondition,brand=:brand,
    authenticity=:authenticity,description=:description,
    shopId=:shopId,create_date=:create_date 
    WHERE id=:productId");
      
      $stmt->bindParam(":category",$category);
      $stmt->bindParam(":productId",$productId);
      $stmt->bindParam(":shopId",$shopId);
      $stmt->bindParam(":create_date",$date_added);
      $stmt->bindParam(":subCategory",$subCategory);
      $stmt->bindParam(":title",$title);
      $stmt->bindParam(":price",$price);
      $stmt->bindParam(":priceType",$priceType);
      $stmt->bindParam(":quantity",$quantity);
      $stmt->bindParam(":productCondition",$productCondition);
      $stmt->bindParam(":brand",$brand);
      $stmt->bindParam(":authenticity",$authenticity);
      $stmt->bindParam(":description",$description);
    if ($stmt->execute()) {
        echo json_encode(array("statusCode"=>200,"Messages"=>"Shop Update Success"));
          if ($productId) {
   echo json_encode(array("statusCode"=>200,"Messages"=>"Shop Update Success","data"=> $shopId));
          if($character){
    foreach($character as $value)
   {
    //  if($value->id == null){
echo $value->name;
       $stmt = $conn->prepare("insert into product_features(feature,product_id,create_date) 
       values(:feature,:product_id,:create_date)");
       $stmt->bindParam(":feature",$value->name);
       $stmt->bindParam(":product_id",$productId);
       $stmt->bindParam(":create_date",$date_added);
      if($stmt->execute()){
       echo json_encode(array("featuresStatusCode"=>200,"featuresMessages"=>"Product features Added Success"));
      }
      else{
       echo json_encode(array("statusCode"=>201)); 
      }

    //  }
     
   }
  }
   if($url){
       
  $urls = explode(",",$url);
   foreach($urls as $value)
   {
       echo $value;
       $stmt = $conn->prepare("insert into product_images(url,product_id,create_date) 
       values(:url,:product_id,:create_date)");
       $stmt->bindParam(":url",$value);
       $stmt->bindParam(":product_id",$productId);
       $stmt->bindParam(":create_date",$date_added);
      if($stmt->execute()){
       echo json_encode(array("imageStatusCode"=>200,"imageMessages"=>"Shop Images Added Success"));
      }
      else{
       echo json_encode(array("statusCode"=>201)); 
      }
   }

  


   }

    }
  }
}
  
  // echo json_encode(array("statusCode"=>$output));
}




elseif($_POST['type'] == "product-list"){
    $shopId = $_POST['shopId'];
    $stmt = $conn->prepare("SELECT p.id,p.name as title,p.brand,p.productCondition,p.price,p.priceType,p.authenticity,p.description,s.id 
    as shop_id,s.name as shop_name,c.id as category_id,c.name as category_name,sc.id 
    as sub_c_id,sc.name as sub_category_name, GROUP_CONCAT(i.url ORDER BY i.url) AS images     
    FROM product p INNER JOIN shops s on p.shopId = s.id 
    LEFT JOIN  product_images i ON p.id = i.product_id
    INNER JOIN category c on p.category = c.id 
    INNER JOIN subcategory sc on p.subCategory = sc.id 
    where p.shopId = $shopId");
    $stmt->execute();
    foreach($stmt as $row){
        // $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
        // $subtotal = $row['price']*$row['quantity'];
        // $total += $subtotal;
        $data[] = $row;
      
    }
  
    echo json_encode($data);
}
elseif($_POST['type'] =="getproductById"){

  $productId = $_POST['productId'];
  $stmt = $conn->prepare("SELECT * FROM product WHERE id= $productId");
  $stmt->execute();
  
  foreach($stmt as $row){
    $data = $row;

    $stmt1 = $conn->prepare("SELECT * FROM product_images WHERE product_id =".$row['id']);
    $stmt1->execute();

    foreach($stmt1 as $row1){
      $data1[]= $row1;  
      // echo json_encode($data1);
    }
    $data1[] = "";
       $featuresStmt = $conn->prepare("SELECT id, feature as name FROM product_features WHERE product_id =".$row['id']);
   
if($featuresStmt->execute()){
   
    foreach($featuresStmt as $row1){

 $features[]= $row1;  
  
    }
 
   $features[]= "";
  
   
 
  }
  
   $data['url']=$data1;
     $data['feature']=$features;
  echo json_encode($data);
  }
}
?>