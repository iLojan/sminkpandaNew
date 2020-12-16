<?php
include './includes/session.php'; 
$conn = $pdo->open();

if($_POST['type'] =="getproductById"){

  $productId = $_POST['product_id'];
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