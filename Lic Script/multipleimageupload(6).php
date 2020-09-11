<?php

$folder = $_POST['folder'];
$target_dir = "postimage/".$folder."/";
            if (!file_exists($target_dir)){
				@mkdir($target_dir , 0777);
			}

$target_file = $target_dir . time()."~".basename($_FILES["image"]["name"]);


     


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
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
        $response['status'] = 1;
        $response['message'] = "Image Uploaded";
        $response['link'] = $linkbase.$target_file;  
   
   
    }else{
    $response['status'] = 0;
    $response['message'] = "Cant upload";
    
    }

}
echo json_encode($response);
?>