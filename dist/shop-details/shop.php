<?php
include '../../includes/session.php'; 
$conn = $pdo->open();

if($_POST['type'] == 'setUpShop' ){
    $shopName = $_POST['shopName'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $addressLine1 = $_POST['addressLine1'];
    $addressLine2 = $_POST['addressLine2'];
    $postcode = $_POST['postcode'];
    $url = $_POST['url'];
    $shopId = $_POST['shopId'];
    $city = $_POST['city'];
    $addressLine2 = $_POST['addressLine2'];
    $date_added = date('Y-m-d');
    
   
 
    
    $user_id = $_SESSION['user'];
    if($shopId){
        $stmt = $conn->prepare("UPDATE shops SET name=:name,email=:email,mobile=:mobile,city=:city,addressLine1=:addressLine1,addressLine2=:addressLine2,postcode=:postcode WHERE id=:shopId");
					
        $stmt->bindParam(':name',$shopName);
        $stmt->bindParam(':email',$email);
        $stmt->bindParam(':mobile',$mobile);
        $stmt->bindParam(':city',$city);
        $stmt->bindParam(':addressLine1',$addressLine1);
        $stmt->bindParam(':addressLine2',$addressLine2);
        $stmt->bindParam(':postcode',$postcode);
        $stmt->bindParam(':shopId',$shopId);
        $stmt->execute();
    }
    else{
    $stmt = $conn->prepare("insert into shops(name,email,mobile,,city,addressLine1,addressLine2,postcode,user_id,date_added) 
    values(:name,:email,:mobile,:city:addressLine1,:addressLine2,:postcode,:user_id,:date_added)");
    $stmt->execute(['name'=>$shopName,'email'=>$email,'mobile'=>$mobile,'city'=>$city,'addressLine1'=>$addressLine1,'addressLine2'=>$addressLine2,'postcode'=>$postcode,'user_id'=>$user_id,'date_added'=>$date_added]);
//    if($stmt->execute()){
       $shopId= $conn->lastInsertId();
       if ($shopId) {
        echo json_encode(array("statusCode"=>200,"Messages"=>"Shop Create Success","data"=> $shopId));
        if($url){
            
       $urls = explode(",",$url);
        foreach($urls as $value)
        {
            echo $value;
            $stmt = $conn->prepare("insert into shop_images(url,shop_id,create_date) 
            values(:url,:shop_id,:create_date)");
            $stmt->bindParam(":url",$value);
            $stmt->bindParam(":shop_id",$shopId);
            $stmt->bindParam(":create_date",$date_added);
           if($stmt->execute()){
            echo json_encode(array("statusCode"=>200,"Messages"=>"Shop Images Added Success"));
           }
           else{
            echo json_encode(array("statusCode"=>201)); 
           }
        }
        }
       }
   
//    }
   else {
    echo json_encode(array("statusCode"=>201));
 }
}

$pdo->close();
}
else{
    $_SESSION['error'] = 'Fill up signup form first';
    header('location: signup.php');
}

if($_POST['type'] =="getShop"){
    echo json_encode(array("statusCode"=>$_POST['type']));
}
?>