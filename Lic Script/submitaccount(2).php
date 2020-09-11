<?php
require_once("Connect.php");

$userid = $_POST['userid'];
$balance = $_POST['balance'];
$accountnum = $_POST['accountnum'];



$query = "INSERT INTO `Account`( `userid`, `balance`, `accountnum`) VALUES ('$userid','$balance','$accountnum')";

if(mysqli_query($conn,$query)){
        $response['status'] = 1;
        $response['message'] = "Account Successfully Saved";
  
    }else{
        $response['status'] = 0;
        $response['message'] = "Error ooooooo";
        
        
    }
    
echo json_encode($response);

?>