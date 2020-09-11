<?php

require_once("Connect.php");
$folder = $_POST['folder'];
$target_dir = "postimage/".$folder."/";
            if (!file_exists($target_dir)){
				@mkdir($target_dir, 0777);
			}


$target_file = $target_dir . time()."~".basename($_FILES["image"]["name"]);



    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
        $response['status'] = 1;
        $response['message'] = "Image Uploaded";
        $response['link'] = $target_file;  
        
        
    $name = $_POST['name'];	
    $path = $_POST['path'];	
    $userid = $_POST['userid'];	
    $libname = $_POST['libname'];
       $category = $_POST['category'];
          $subcategory = $_POST['subcategory'];

 
 
    $query = "INSERT INTO `Book` (name,path,userid,libname,category,subcategory) 
    VALUES ('$name','$linkbase$target_file','$userid','$libname','$category','$subcategory')";

    
    if(mysqli_query($conn,$query)){
        $response['status'] = 1;
        $response['message'] = "Successfully Uploaded";
    }else{
        $response['status'] = 0;
        $response['message'] = "Error Uploading (Network Shit!)";
    }
   
        
        
        
    }else{
    $response['status'] = 0;
    $response['message'] = "Cant upload";
     $response['link'] = $target_file; 
    }


echo json_encode($response);
?>