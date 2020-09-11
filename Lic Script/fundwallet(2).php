<?php

$acctno = $_POST['accountno'];
$amount = $_POST['amount'];
$userid = $_POST['userid'];

require_once("Connect.php");


$queryFindRep = "SELECT userid FROM `Users` WHERE userid = '$userid' ";

$resultRep = $conn->query($queryFindRep);

if ($resultRep->num_rows > 0) {
 
  while($row = $resultRep->fetch_assoc()) {
      
    $user =  $row["userid"];
    
   } 
   
 if($user == $userid){
     
     $queryFindRep = "SELECT * FROM `Account` WHERE accountnum = '$acctno' ";

$resultRep = $conn->query($queryFindRep);

if ($resultRep->num_rows > 0) {
 
  while($row = $resultRep->fetch_assoc()) {

    $balanceRep =  $row["balance"];
   
   }   

$sum = $balanceRep + $amount;

$sql = "UPDATE Account SET balance = '$sum' WHERE accountnum = '$acctno' ";

$result = mysqli_query($conn,$sql);

if($result){
	$response['status'] = "1";
	$response['message'] = "Successful: Your current balance is ".$sum;
}else{
	$response['status'] = "0";
	$response['message'] = "Error Updating Balance";
}  

}else{

$response['status'] = "0";
$response['message'] = "Error Updating Balance";

}
     
     
 }else{
     
     $response['status'] = "0";
$response['message'] = "Your Location is tracked";
     
 }



}else{
$response['status'] = "0";
$response['message'] = "Your Location is tracked";
}

echo json_encode($response);



?>