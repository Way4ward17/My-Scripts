<?php
require_once("Connect.php");

$question = $_POST['question'];
$number = $_POST['number'];
$type = $_POST['type'];
$testid = $_POST['testid'];
$userid = $_POST['userid'];
$questid = $_POST['questid'];


$query = "UPDATE `Testquestion` SET `testid` = '$testid', `userid` = '$userid', `question` = '$question', `number` = '$number', `type` = '$type' , `questid` = '$questid' WHERE questid = '$questid'";

if(mysqli_query($conn,$query)){
        $response['status'] = 1;
        $response['message'] = "Successfully Saved";
  
    }else{
        $response['status'] = 0;
        $response['message'] = "Error ooooooo";
        
        
    }
    
echo json_encode($response);

?>