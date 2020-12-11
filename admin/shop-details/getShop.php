<?php
include '../../includes/session.php'; 
$conn = $pdo->open();

$output = '';
$user =$_SESSION['user'];
if($_POST['type'] =="getShop"){

    $total = 0;
    $stmt = $conn->prepare("SELECT 
    p.id, p.name, p.addressLine1, p.addressLine2,p.city, 
    GROUP_CONCAT(i.url ORDER BY i.url) AS images FROM shops p LEFT JOIN shop_images i ON p.id = i.shop_id where user_id = $user GROUP BY p.id ");
    $stmt->execute();
    foreach($stmt as $row){
      

      $data[]= $row;  

     }
    
        
       echo json_encode($data );

   
    
}
elseif($_POST['type'] =="getShopById"){

  $shopId = $_POST['shopId'];
  if ($shopId) {
     $stmt = $conn->prepare("SELECT * FROM shops WHERE id= $shopId");
  $stmt->execute();
  foreach($stmt as $row){
    $data = $row;
    $stmt1 = $conn->prepare("SELECT * FROM shop_images WHERE shop_id =".$row['id']);
    $stmt1->execute();

    foreach($stmt1 as $row1){
    
      $data1[]= $row1;  
      // echo json_encode($data1);
    }
  
  }
  
$data1[] = "";
  $data['url']=$data1;
  echo json_encode($data);
  
  // echo json_encode($data1);
  }
 
}


?>