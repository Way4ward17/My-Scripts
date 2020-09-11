 <?php>

    $userid = $_POST['userid'];	
    $comment = $_POST['comment'];	
    $postid = $_POST['id'];  
    
 
 require_once("Connect.php");
 
$queryFind = "SELECT comment FROM `Post` WHERE id = '$postid' ";

$result = $conn->query($queryFind);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $commentCount =  $row["comment"];
   
   }   
$sum = $commentCount + 1;

$sql = "UPDATE Post SET comment = '$sum' WHERE id = '$postid' ";

$result = mysqli_query($conn,$sql);
if($result){
	$response['status'] = "1";
	$response['message'] = $sum;
	
	
	$query = "INSERT INTO Comment ( userid, comment, postid) VALUES ('$userid','$comment','$postid')";

    
    if(mysqli_query($conn,$query)){
        $response['status'] = 1;
        $response['message'] = "Successfully Saved";
       
        
        
        
    }else{
        $response['status'] = 0;
        $response['message'] = "Error ooooooo";
        
        
    }
	
}else{
	$response['status'] = "0";
	$response['message'] = "Error Updating Count";
}

}
   


    echo json_encode($response);

    ?>
    