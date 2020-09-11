<?php

$folder = $_POST['folder'];
$userid = $_POST['userid'];
$target_dir = "profileimage/".$folder."/";
            if (!file_exists($target_dir)){
				mkdir($target_dir, 0777);
			}

$target_file = $target_dir . $userid."~".basename($_FILES["image"]["name"]);

$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$check = getimagesize($FILES["image"]["tmp_name"]);

$response = array();
$error = "";

if($check !=false){
    $uploadOk = 1;
}else{
    $uploadOk = 0;
    $error .= "Uploaded file is not a valid image";
}
if($imageFileType !="jpg" && $imageFileType !="png" && $imageFileType !="jpeg" && $imageFileType !="gif"){
     $uploadOk = 0;
    $error .= "Uploaded type is not a valid image";
    
}else{
   $uploadOk = 1;
}
if($uploadOk == 0){
    $response['status'] = 0;
    $response['message'] = $error;
     $response['link'] = $target_file; 
}else{
    

$temp = explode(".", $_FILES["image"]["name"]);
$newfilename = $userid . '.' . end($temp);
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_dir. $newfilename)){
        $response['status'] = 1;
        $response['message'] = "Image Uploaded";
        $response['link'] = $target_file;  
        
        
   
    require_once("Connect.php");
   
    $query = "UPDATE `Users` SET image = '$linkbase$target_dir$newfilename' WHERE userid = '$userid'";

    
    if(mysqli_query($conn,$query)){
        $response['status'] = 1;
        $response['imagelink'] = $linkbase.$target_dir.$newfilename;
        $response['message'] = "Successfully Saved";
    }else{
        $response['status'] = 0;
        $response['message'] = "Error ooooooo";
    }
   
        
        
        
    }else{
    $response['status'] = 0;
    $response['message'] = "Cant upload";
     $response['link'] = $target_file; 
    }

}
echo json_encode($response);
?>