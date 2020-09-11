<?php


$linkbase = "https://ibakaxpress.com/crib/";
$conn = mysqli_connect("localhost","ibakwudu_auuacribsuser","adefuwaoluwaponmilehussein","ibakwudu_aauacribs");

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

 
function getProfileImage($userid){
$conn = mysqli_connect("localhost","ibakwudu_auuacribsuser","adefuwaoluwaponmilehussein","ibakwudu_aauacribs");

$sqlUser = "SELECT image FROM `Users` WHERE userid = '$userid'";

$resultUser = $conn->query($sqlUser);

if ($resultUser->num_rows > 0) {
 
  while($rowUser = $resultUser->fetch_assoc()) {
    
    $photoShare =  $rowUser["image"];
  }
  
 }
 
 return $photoShare;
} 
 
 
 
function getProfileUsername($userid){
$conn = mysqli_connect("localhost","ibakwudu_auuacribsuser","adefuwaoluwaponmilehussein","ibakwudu_aauacribs");
 
$sqlUser = "SELECT username FROM `Users` WHERE userid = '$userid'";

$resultUser = $conn->query($sqlUser);

if ($resultUser->num_rows > 0) {
 
  while($rowUser = $resultUser->fetch_assoc()) {
    
    $usernameShare =  $rowUser["username"];
  }
 }
 
 return $usernameShare;
}  
 
 
  function followingcount($Followerid){
      
    $conn = mysqli_connect("localhost","ibakwudu_auuacribsuser","adefuwaoluwaponmilehussein","ibakwudu_aauacribs");

    $queryFind = "SELECT number FROM `Followingcount` WHERE userid = '$Followerid' ";

    $result = $conn->query($queryFind);

    if ($result->num_rows > 0) {
  
    while($row = $result->fetch_assoc()) {

    $number =  $row["number"];
        
    }   
    
    $sum = $number + 1;

    $sql = "UPDATE Followingcount SET number = '$sum' WHERE userid = '$Followerid' ";

    $result = mysqli_query($conn,$sql);
    
    if($result){
        
    	$response['status'] = "1";
    	$response['message'] = $sum;
    	
    }
    
    }
 
  }
  
    function followercount($userid){
       
      $conn = mysqli_connect("localhost","ibakwudu_auuacribsuser","adefuwaoluwaponmilehussein","ibakwudu_aauacribs");

      $queryFind = "SELECT number FROM `Followercount` WHERE userid = '$userid' ";

      $result = $conn->query($queryFind);

      if ($result->num_rows > 0) {
    
      while($row = $result->fetch_assoc()) {

      $number =  $row["number"];
   
      }
      
$sum = $number + 1;

$sql = "UPDATE Followercount SET number = '$sum' WHERE userid = '$userid' ";

$result = mysqli_query($conn,$sql);

if($result){

	$response['status'] = "1";

	$response['message'] = $sum;
	
}
}
 
  }

 function unfollowingcount($Followerid){
  $conn = mysqli_connect("localhost","ibakwudu_auuacribsuser","adefuwaoluwaponmilehussein","ibakwudu_aauacribs");

  $queryFind = "SELECT number FROM `Followingcount` WHERE userid = '$Followerid' ";

$result = $conn->query($queryFind);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $number =  $row["number"];
   
   }   
$sum = $number - 1;

$sql = "UPDATE Followingcount SET number = '$sum' WHERE userid = '$Followerid' ";

$result = mysqli_query($conn,$sql);
if($result){
	$response['status'] = "1";
	$response['message'] = $sum;
	
}
}
 
  }
  
    function unfollowercount($userid){
$conn = mysqli_connect("localhost","ibakwudu_auuacribsuser","adefuwaoluwaponmilehussein","ibakwudu_aauacribs");

      $queryFind = "SELECT number FROM `Followercount` WHERE userid = '$userid' ";

$result = $conn->query($queryFind);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $number =  $row["number"];
   
   }   
$sum = $number - 1;

$sql = "UPDATE Followercount SET number = '$sum' WHERE userid = '$userid' ";

$result = mysqli_query($conn,$sql);
if($result){
	$response['status'] = "1";
	$response['message'] = $sum;
	
}
}
}


    function increasepost($userid){
       
      $conn = mysqli_connect("localhost","ibakwudu_auuacribsuser","adefuwaoluwaponmilehussein","ibakwudu_aauacribs");

      $queryFind = "SELECT number FROM `Postcount` WHERE userid = '$userid' ";

      $result = $conn->query($queryFind);

      if ($result->num_rows > 0) {
    
      while($row = $result->fetch_assoc()) {

      $number =  $row["number"];
   
      }
      
$sum = $number + 1;

$sql = "UPDATE Postcount SET number = '$sum' WHERE userid = '$userid' ";

$result = mysqli_query($conn,$sql);

if($result){

	$response['status'] = "1";

	$response['message'] = $sum;
	
}
}
 
  }
  
    function saveFollowing($userid){
      $number = "0";
      $conn = mysqli_connect("localhost","ibakwudu_auuacribsuser","adefuwaoluwaponmilehussein","ibakwudu_aauacribs");
      $query = "INSERT INTO Followingcount (userid, number) VALUES ('$userid','$number')";

    
    if(mysqli_query($conn,$query)){
        $response['status'] = 1;
         $response['message'] = "Saved count";
        
        
        
    }else{
        $response['status'] = 0;
        $response['message'] = "Error ooooooo";
        
        
    }
  }
  
    function saveFollower($userid){
      $number = "0";
      $conn = mysqli_connect("localhost","ibakwudu_auuacribsuser","adefuwaoluwaponmilehussein","ibakwudu_aauacribs");
      $query = "INSERT INTO Followercount (userid, number) VALUES ('$userid','$number')";

    
    if(mysqli_query($conn,$query)){
        $response['status'] = 1;
        $response['message'] = "Saved count";
        
        
        
    }else{
        $response['status'] = 0;
        $response['message'] = "Error ooooooo";
        
        
    }
  }
  
  function saveCount($userid){
      $number = "0";
      $conn = mysqli_connect("localhost","ibakwudu_auuacribsuser","adefuwaoluwaponmilehussein","ibakwudu_aauacribs");
      $query = "INSERT INTO Postcount (userid, number) VALUES ('$userid','$number')";

    
    if(mysqli_query($conn,$query)){
        $response['status'] = 1;
        $response['message'] = "Saved count";
      
        
        
        
    }else{
        $response['status'] = 0;
        $response['message'] = "Error ooooooo";
        
        
    }
  }
  
  
  
  function compressImage($source, $destination, $quality) { 
    // Get image info 
    $imgInfo = getimagesize($source); 
    $mime = $imgInfo['mime']; 
     
    // Create a new image from file 
    switch($mime){ 
        case 'image/jpeg': 
            $image = imagecreatefromjpeg($source); 
            break; 
        case 'image/png': 
            $image = imagecreatefrompng($source); 
            break; 
        case 'image/gif': 
            $image = imagecreatefromgif($source); 
            break; 
        default: 
            $image = imagecreatefromjpeg($source); 
    } 
     
    // Save image 
    imagejpeg($image, $destination, $quality); 
     
    // Return compressed image 
    return $destination; 
} 

 
?>


