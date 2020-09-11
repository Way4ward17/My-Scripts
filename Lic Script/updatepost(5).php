<?php
	
   require_once("Connect.php");

    $tags = $_POST['tags'];	
    $mention = $_POST['mention'];
    $postid = $_POST['id'];	
    $details = $_POST['details'];	
   
   
$query = "UPDATE `Post` SET tags = '$tags', mention = '$mention', details = '$details' WHERE postid = '$postid'";
    
    if(mysqli_query($conn,$query)){
        $response['status'] = 1;
        $response['message'] = "Successfully Updated";
    }else{
        $response['status'] = 0;
        $response['message'] = "Error ooooooo";
    }
   

echo json_encode($response);

?>