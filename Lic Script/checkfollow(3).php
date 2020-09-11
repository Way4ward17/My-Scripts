<?php>

$followerid = $_POST['followerid'];	
$followee = $_POST['followee'];
require_once("Connect.php");
$queryFind = "SELECT * FROM `Follow` WHERE Followerid = '$followerid' AND Followee ='$followee'";
$result = mysqli_query($conn,$queryFind);
         if (mysqli_num_rows($result) > 0) {
                          $response['status'] = 1;
                          $response['message'] = "Following";
                          
                          
            
} else {
        $response['status'] = 0;
        $response['message'] = "Not Following";
   
}
    
    
echo json_encode($response);
  
    
    
?>
   