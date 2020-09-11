<?php>

$postid = $_POST['postid'];	
$userid = $_POST['userid'];
require_once("Connect.php");
$queryFind = "SELECT * FROM `Likes` WHERE userid = '$userid' AND postid = '$postid'";
$result = mysqli_query($conn,$queryFind);
         if (mysqli_num_rows($result) > 0) {
         
                $sql = "DELETE FROM Likes WHERE userid='$userid' AND postid = '$postid'";
                        
                        if (mysqli_query($conn, $sql)) {
                          $response['status'] = 1;
                          $response['message'] = "Deleted";
                        } else {
                          $response['status'] = 0;
                          $response['message'] = "Error Deleting";
                        }
                 
             
} else {
   $query = "INSERT INTO `Likes` (postid,userid) 
    VALUES ('$postid','$userid')";
    if(mysqli_query($conn,$query)){
        $response['status'] = 1;
        $response['message'] = "Successfully Saved";
    }else{
        $response['status'] = 0;
        $response['message'] = "Error ooooooo";
    }
}
    
    
echo json_encode($response);
  
    
    
?>
   