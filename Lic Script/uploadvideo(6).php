<?php


require_once("Connect.php");
$folder = $_POST['folder'];
$target_dir = "postimage/".$folder."/";
            if (!file_exists($target_dir)){
				@mkdir($target_dir, 0777);
			}




$target_file = $target_dir . time()."~".basename($_FILES["image"]["name"]);
$target_file2 = $target_dir . time()."~".basename($_FILES["image2"]["name"]);

    if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file) && move_uploaded_file($_FILES["image2"]["tmp_name"], $target_file2)){
        $response['status'] = 1;
        $response['message'] = "Image Uploaded";
        $response['link'] = $target_file;  
        
   
   
    $type = $_POST['type'];	
    $likes = $_POST['likes'];
    $share = $_POST['share'];
    $tags = $_POST['tags'];	
    $mention = $_POST['mention'];
    $postid = $_POST['id'];	
    $details = $_POST['details'];	
   
    $userid = $_POST['userid'];	
    $verified = $_POST['verified'];
    $time = $_POST['time'];
    $comment = $_POST['comment'];
 
 
    require_once("Connect.php");
   
   
    $completelink = $linkbase.$target_file;  
    $completelink2 = $linkbase.$target_file2;  
    $query = "INSERT INTO `Post` (share,imageURL1,videourl,type, likes, tags, mention, id, details, verified, time, comment, userid) 
    VALUES ('$share','$completelink2','$completelink','$type','$likes','$tags','$mention','$postid','$details','$verified','$time','$comment','$userid')";

    
    if(mysqli_query($conn,$query)){
        $response['status'] = 1;
        $response['message'] = "Successfully Saved";
        increasepost($userid);
    }else{
        $response['status'] = 0;
        $response['message'] = "Error ooooooo";
    }
    
    
    }else{
    $response['status'] = 0;
    $response['message'] = "Cant upload";
    }


echo json_encode($response);
?>