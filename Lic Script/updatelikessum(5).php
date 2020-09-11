<?php>

$postid = $_POST['id'];
require_once("Connect.php");


$queryFind = "SELECT * FROM `Post` WHERE id = '$postid'";
$result = mysqli_query($conn,$queryFind);
         if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              $count = $row["likes"];}
$sum = 0;
$sum = 1 + $count;          
$sql = "UPDATE Post SET likes = '$sum' WHERE id = '$postid' ";

$result = mysqli_query($conn,$sql);
if($result){
	$response['status'] = "1";
	$response['message'] = $sum;
}else{
	$response['status'] = "0";
	$response['message'] = "Error Updating Count";
}


} else {
$response['status'] = 0;
$response['message'] = "Error Messages";
}








echo json_encode($response);


?>