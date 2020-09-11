<?php
 
require_once("Connect.php");
$userid = $_POST['userid'];

$data = array();

$resulttt = mysqli_query($conn, "SELECT DISTINCT Followee FROM Follow WHERE Followerid ='$userid' LIMIT 20");  


while ($rowww = mysqli_fetch_object($resulttt))
{
    array_push($data, $rowww);

}




echo json_encode($data);

?>