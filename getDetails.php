<?php
include './includes/session.php'; 
$conn = $pdo->open();

$output = '';

// $shopId =$_POST['shopId'];



    if($_POST['type'] =="getShop"){

        $total = 0;
        $stmt = $conn->prepare("SELECT * FROM shops");
        $stmt->execute();
        foreach($stmt as $row){
            // $image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
            // $subtotal = $row['price']*$row['quantity'];
            // $total += $subtotal;
            $output .='
            <div class="col-md-6 mb-4 mb-xl-0 col-xl-3">
            <a href="../shop/shop.html" class="d-black text-gray-90">
                <div class="min-height-132 py-1 d-flex bg-gray-1 align-items-center">
                    <div class="col-6 col-xl-5 col-wd-6 pr-0">
                    '.
                    $stmt = $conn->prepare("SELECT * FROM shop_images where shop_id = 111 ");
        $stmt->execute();
        foreach($stmt as $row){
            $output .='<img class="img-fluid" src="'.$row['url'].'">';
        }
                    '
                        
                    </div>
                    <div class="col-6 col-xl-7 col-wd-6">
                        <div class="mb-2 pb-1 font-size-18 font-weight-light text-ls-n1 text-lh-23">
                        '.$row['name'].'
                        </div>
                        <div class="link text-gray-90 font-weight-bold font-size-15" href="#">
                            Shop now
                            <span class="link__icon ml-1">
                                <span class="link__icon-inner"><i class="fas fa-angle-right"></i></span>
                            </span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
          ';
          
        }
      
        echo json_encode(array("statusCode"=>$output));
        
    }




?>