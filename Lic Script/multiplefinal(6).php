<?php>
 $imageURL1 = $_POST['imageURL1'];	
    $imageURL2 = $_POST['imageURL2'];	
    $imageURL3 = $_POST['imageURL3'];	
    $imageURL4 = $_POST['imageURL4'];
    $imageURL5 = $_POST['imageURL5'];
    $type = $_POST['type'];	
    $likes = $_POST['likes'];
     $videourl = $_POST['videourl'];
    $tags = $_POST['tags'];	
    $mention = $_POST['mention'];
    $postid = $_POST['id'];	
    $details = $_POST['details'];	
    $userid = $_POST['userid'];	
    $verified = $_POST['verified'];
    $time = $_POST['time'];
    $comment = $_POST['comment'];
      $share = $_POST['share'];
 
    require_once("Connect.php");

    $query = "INSERT INTO `Post` (share,videourl,imageURL1,imageURL2,imageURL3,imageURL4,imageURL5,type, likes, tags, mention, id, details, verified, time, comment, userid) 
    VALUES ('$share','$videourl','$linkbase$imageURL1','$linkbase$imageURL2','$linkbase$imageURL3','$linkbase$imageURL4','$linkbase$imageURL5','$type','$likes','$tags','$mention','$postid','$details','$verified','$time','$comment','$userid')";

    
    if(mysqli_query($conn,$query)){
        $response['status'] = 1;
        $response['message'] = "Successfully Saved";
        increasepost($userid);
    }else{
        $response['status'] = 0;
        $response['message'] = "Error ooooooo";
    }
   
   echo json_encode($response);
   ?>