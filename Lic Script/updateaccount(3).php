<?php>

$acctno = $_POST['accountnum'];	
$amount = $_POST['amount'];	
$repaccount = $_POST['repaccount'];

require_once("Connect.php");
$queryFind = "SELECT * FROM `Account` WHERE accountnum = '$acctno' ";

$result = $conn->query($queryFind);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $balance =  $row["balance"];
   
   }   

    if($amount > $balance){
        
    $response['status'] = "0";
	$response['message'] = "Insufficient Fund";
        
    }else{
$sum = $balance - $amount;

$sql = "UPDATE Account SET balance = '$sum' WHERE accountnum = '$acctno' ";

$result = mysqli_query($conn,$sql);

if($result){
    
$queryFindRep = "SELECT * FROM `Account` WHERE accountnum = '$repaccount' ";

$resultRep = $conn->query($queryFindRep);

if ($resultRep->num_rows > 0) {
 
  while($row = $resultRep->fetch_assoc()) {

    $balanceRep =  $row["balance"];
   
   }   

$reduce = $balanceRep + $amount;

$sql = "UPDATE Account SET balance = '$reduce' WHERE accountnum = '$repaccount' ";

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
	$response['message'] = "Error Updating Balance";
}           

}

            
} else {
        $response['status'] = "0";
        $response['message'] = "Invalid Account Number";
   
}

    
echo json_encode($response);
  
    
    
?>