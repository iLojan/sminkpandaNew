<?php
include './includes/session.php'; 
$conn = $pdo->open();

if($_POST['type'] == 'getSearch' ){
    $name = $_POST['name'];
    


     $stmt = $conn->prepare("
    SELECT
        name,search_type
    FROM product
    WHERE
        product.name LIKE :keyword
        UNION

     SELECT
        name,search_type
    FROM shops
    WHERE
        shops.name LIKE :keyword

UNION

  SELECT
        name,search_type
    FROM category
    WHERE
        category.name LIKE :keyword limit 10");
  $stmt->execute(['keyword' => '%'.$name.'%']);
  foreach($stmt as $row){
    $data[] = $row;
  
  
  }
 
  echo json_encode($data);
  
  // echo json_encode($data1);
  
}
?>