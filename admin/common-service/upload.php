<?php
// Include the database configuration file
	include '../../includes/session.php';

	$conn = $pdo->open();
    // File path configuration 
    $uploadDir = "../../images/"; 
    $fileName = basename($_FILES['file']['name']); 
    $uploadFilePath = $uploadDir.$fileName; 
     
    // Upload file to server 
    if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadFilePath)){ 
        // Insert file information in the database 

        echo json_encode(array("url"=>$fileName));
    } 
?>