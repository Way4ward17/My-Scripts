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
$questid = $_POST['questid'];


$query = "INSERT INTO `Testquestion`(`testid`, `userid`, `question`, `optionone`, `optiontwo`, `optionthree`, `optionfour`, `type`,`questid`) VALUES 
('$testid','$userid','$question','$answerone','$answertwo','$answerthree', '$answerfour', '$type','$questid')";

if(mysqli_query($conn,$query)){
        $response['status'] = 1;
        $response['message'] = "Successfully Saved";
  
    }else{
        $response['status'] = 0;
        $response['message'] = "Error ooooooo";
        
        
    }
    
echo json_encode($response);

?>