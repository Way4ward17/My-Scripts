<?php
	
    $imageURL1 = $_POST['imageURL1'];	
    $imageURL2 = $_POST['imageURL2'];	
    $type = $_POST['type'];	
    $likes = $_POST['likes'];	
    $tags = $_POST['tags'];	
    $mention = $_POST['mention'];
    $postid = $_POST['id'];
    $details = $_POST['details'];
    $verified = $_POST['verified'];	
    $time = $_POST['time'];
    $comment = $_POST['comment'];
    $userid = $_POST['userid'];
     $share = $_POST['share'];
 
    require_once("Connect.php");
   
    $query = "INSERT INTO `Post` (share,imageURL1, imageURL2, type, likes, tags, mention, id, details, verified, time, comment, userid) VALUES ('$share','$imageURL1','$imageURL2','$type','$likes','$tags','$mention','$postid','$details','$verified','$time','$comment','$userid')";

    
    if(mysqli_query($conn,$query)){
        $response['status'] = 1;
        $response['message'] = "Successfully Saved";
    }else{
        $response['status'] = 0;
        $response['message'] = "Error ooooooo";
    }
   

echo json_encode($response);

?>