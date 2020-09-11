<?php


$target_dir = "profileimage/";
$target_file = $target_dir . time()."~".basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
$check - getimagesize($FILES["image"]["tmp_name"]);

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
}else{
    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
        $response['status'] = 1;
        $response['message'] = "Image Uploaded";  
        
    
    $userid = $_POST['userid'];	
    $fullname = $_POST['fullname'];	
    $username = $_POST['username'];	
    $devicetoken = $_POST['devicetoken'];	
    $department = $_POST['department'];	
    $session = $_POST['session'];	
    $matricnumber = $_POST['matricnumber'];
    $password = $_POST['password'];	
    $phone = $_POST['phone'];	
    $faculty = $_POST['faculty'];	
    $email = $_POST['email'];	
    $status = $_POST['status'];
 
 require_once("Connect.php");
   
    $query = "INSERT INTO Users ( userid, fullname, username, devicetoken, department, session, matricnumber, password, phone, faculty, email, image,status) VALUES ('$userid','$fullname','$username','$devicetoken','$department','$session','$matricnumber','$password','$phone','$faculty','$email','$linkbase$target_file','$status')";

    
    if(mysqli_query($conn,$query)){
        $response['status'] = 1;
        $response['message'] = "Successfully Saved";
        $response['imagelink'] = $linkbase.$target_file;
        
        
        saveCount($userid);
        saveFollowing($userid);
        saveFollower($userid);
        
        
    }else{
        $response['status'] = 0;
        $response['message'] = "Error ooooooo";
        
        
    }
    
        
        
    }else{
    $response['status'] = 0;
    $response['message'] = "Cant upload";
    }
}

echo json_encode($response);
?>