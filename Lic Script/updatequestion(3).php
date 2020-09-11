<?php
require_once("Connect.php");

$question = $_POST['question'];
$answerone = $_POST['answer1'];
$answertwo = $_POST['answer2'];
$answerthree = $_POST['answer3'];
$answerfour = $_POST['answer4'];
$type = $_POST['type'];
$testid = $_POST['testid'];
$userid = $_POST['userid'];
$number = $_POST['number'];
$questid = $_POST['questid'];


$query = "UPDATE `Testquestion` SET `testid` = '$testid', `userid` = '$userid', `question` = '$question', `optionone` = '$answerone', `optiontwo` = '$answertwo', `optionthree` = '$answerthree', `optionfour` = '$answerfour', `type` = '$type' , `number` = '$number' WHERE questid = '$questid'";

if(mysqli_query($conn,$query)){
        $response['status'] = 1;
        $response['message'] = "Successfully Saved";
  
    }else{
        $response['status'] = 0;
        $response['message'] = "Error ooooooo";
        
        
    }
    
echo json_encode($response);

?>