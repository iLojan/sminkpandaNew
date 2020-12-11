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
       # code...
       $output .='<option value>Select Category</option>';
   foreach($stmt as $row){
       // $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
       // $subtotal = $row['price']*$row['quantity'];
       // $total += $subtotal;
       $output .='<option  value="'.$row['id'].'">'.$row['category_name'].'</option>';
     
   }
}
else{
   $output .="<span>Record Not Found</span>";
}
   echo json_encode(array("statusCode"=>$output));
}

elseif($_POST['type'] == 'subCategory'){
$categoryId = $_POST['id'];
  $stmt = $conn->prepare("SELECT * FROM subcategory WHERE categoryId=$categoryId");
  if ($stmt->execute()) {
      # code...
      $output .='<option value>Select Category</option>';
  foreach($stmt as $row){
      // $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
      // $subtotal = $row['price']*$row['quantity'];
      // $total += $subtotal;
      $output .='   
      <option v-for="category in categorys" :key="category.id" value="'.$row['id'].'">'.$row['sub_category_name'].'</option>';
    
  }
}
  else{
    $output .="<span>Record Not Found</span>";
  }
  echo json_encode(array("statusCode"=>$output));
}

elseif($_POST['type'] == 'save'){

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

  $stmt = $conn->prepare("insert into product(category,subCategory,title,priceType,quantity,price,productCondition,brand,authenticity,description,shopId,create_date) 
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
  
  // echo json_encode(array("statusCode"=>$output));
}
elseif($_POST['type'] == "product-list"){
    $shopId = $_POST['shopId'];
    $stmt = $conn->prepare("SELECT p.id,p.title,p.brand,p.productCondition,p.price,p.priceType,p.authenticity,p.description,s.id 
    as shop_id,s.name as shop_name,c.id as category_id,c.category_name,sc.id 
    as sub_c_id,sc.sub_category_name 
    FROM product p INNER JOIN shops s on p.shopId = s.id 
    INNER JOIN category c on p.category = c.id 
    INNER JOIN subcategory sc on p.subCategory = sc.id 
    where p.shopId = $shopId");
    $stmt->execute();
    foreach($stmt as $row){
        // $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
        // $subtotal = $row['price']*$row['quantity'];
        // $total += $subtotal;
        $output .='<tr>
        <td class="pt-3-half" contenteditable="true">'.$row['title'].'</td>
        <td class="pt-3-half" contenteditable="true">'.$row['category_name'].'</td>
        <td class="pt-3-half" contenteditable="true">'.$row['sub_category_name'].'</td>

        <td>
          <span class="table-remove">
          <a href="./product-setup.php?id='.$row['id'].'"></a>
            <button
              type="button"
              class="btn btn-danger btn-rounded btn-sm my-0"
              @click="editProduct(productList)"
            >Edit</button>
            <button type="button" class="btn btn-danger btn-rounded btn-sm my-0">Remove</button>
          </span>
        </td>
      </tr>';
      
    }
  
    echo json_encode(array("statusCode"=>$output));
}

?>