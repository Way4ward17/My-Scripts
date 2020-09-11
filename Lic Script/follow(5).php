<?php>



$userid = $_POST['userid'];
$followerid = $_POST['followerid'];

require_once("Connect.php");


$queryFind = "SELECT * FROM `Follow` WHERE Followee = '$userid' AND Followerid = '$followerid'";
$result = mysqli_query($conn,$queryFind);
         if (mysqli_num_rows($result) > 0) {
         
                $sql = "DELETE FROM Follow WHERE Followee = '$userid' AND Followerid = '$followerid'";
                        
                        if (mysqli_query($conn, $sql)) {
                          $response['status'] = 1;
                          $response['message'] = "Deleted";
                          
unfollowingcount($followerid);
unfollowercount($userid);

                          
                        } else {
                          $response['status'] = 0;
                          $response['message'] = "Error Deleting";
                        }
                 
             
} else {
   $query = "INSERT INTO `Follow` (Followee,Followerid) 
    VALUES ('$userid','$followerid')";
    if(mysqli_query($conn,$query)){
        $response['status'] = 1;
        $response['message'] = "Successfully Saved";
        
        followingcount($followerid);
        followercount($userid);
       
    }else{
        $response['status'] = 0;
        $response['message'] = "Error ooooooo";
    }
}
    
    
echo json_encode($response);
   
  
?>