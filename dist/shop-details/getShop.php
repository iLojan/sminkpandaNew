<?php
include '../../includes/session.php'; 
$conn = $pdo->open();

$output = '';
$user =$_SESSION['user'];
if($_POST['type'] =="getShop"){

    $total = 0;
    $stmt = $conn->prepare("SELECT * FROM shops WHERE user_id=$user");
    $stmt->execute();
    foreach($stmt as $row){
        // $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
        // $subtotal = $row['price']*$row['quantity'];
        // $total += $subtotal;
        $output .='<div class="col-md-3" id="shopList">
        <div class="card shop-details">
          <div class="card-body">
            <div class="shop-name card-title">'.$row['name'].'</div>
            <div
              class="shop-adderss card-subtitle mb-2 text-muted"
            >'.$row['addressLine1'].','.$row['addressLine1'].','.$row['city'].'</div>
          </div>
          <div class="card-footer text-muted">
            <a href="./setup-shop.php?a='.$row['id'].'&type=editShop" class="card-link" >Edit</a>
           
            <a href="../product-details/product-list.php?a='.$row['id'].'" class="card-link addProductLink" >Add Product</a>
          </div>
        </div>
      </div>';
      
    }
  
    echo json_encode(array("statusCode"=>$output));
    
}
elseif($_POST['type'] =="getShopById"){

  $shopId = $_POST['shopId'];
  $stmt = $conn->prepare("SELECT * FROM shops WHERE id= $shopId");
  $stmt->execute();
  foreach($stmt as $row){
  echo json_encode(array("statusCode"=>$row));
  }
}


?>