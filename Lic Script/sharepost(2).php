<?php>


   require_once("Connect.php");


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
    $username = $_POST['username'];	
    $userid = $_POST['userid'];	
    $verified = $_POST['verified'];
    $time = $_POST['time'];
    $comment = $_POST['comment'];
    $photo = $_POST['photo'];
    $fullname = $_POST['fullname'];
    $oldid = $_POST['oldid'];
    
    
    $shareusername= $_POST['shareusername'];
    $shareuserid = $_POST['shareuserid'];
    $sharepost = $_POST['sharepost'];
    $shareprofilephoto = $_POST['shareprofilephoto'];
    $share = $_POST['share'];
 
 
$queryFind = "SELECT share FROM `Post` WHERE id = '$oldid' ";

$result = $conn->query($queryFind);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $commentCount =  $row["share"];
   
}   
$sum = $commentCount + 1;

$sql = "UPDATE Post SET share = '$sum' WHERE id = '$oldid' ";

$result = mysqli_query($conn,$sql);
if($result){
	$response['status'] = 1;
	$response['message'] = $sum;

 
 
   
    $query = "INSERT INTO `Post` (shareuserid,sharepost,videourl,fullname,imageURL1,imageURL2,imageURL3,imageURL4,imageURL5,type, likes, tags, mention, id, details, verified, time, comment, userid,share) 
    VALUES ('$shareuserid','$sharepost','$videourl','$fullname','$imageURL1','$imageURL2','$imageURL3','$imageURL4','$imageURL5','$type','$likes','$tags','$mention','$postid','$details','$verified','$time','$comment','$userid','$share')";

    
    if(mysqli_query($conn,$query)){
        $response['status'] = 1;
        $response['message'] = "Successfully Saved";
        
        increasepost($userid);
    }else{
        $response['status'] = 0;
        $response['message'] = "Error ooooooo";
    }
}
}
   echo json_encode($response);
   ?>