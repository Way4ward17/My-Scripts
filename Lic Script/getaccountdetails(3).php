<?php>

$acctno = $_POST['accountnum'];
$repaccountnum = $_POST['repaccountnum'];
$amount = $_POST['amount'];

require_once("Connect.php");


$queryFind = "SELECT * FROM `Account` WHERE accountnum = '$acctno' ";

$result = $conn->query($queryFind);

if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {
      
    $userid =  $row["userid"];
    
   } 
   
   
$querySender = "SELECT * FROM `Account` WHERE accountnum = '$repaccountnum' ";

$resultSender = $conn->query($querySender);

if ($resultSender->num_rows > 0) {
 
  while($row = $resultSender->fetch_assoc()) {

    $balance =  $row["balance"];

   } 
 
   
   
   if($amount > $balance){
        
    $response['status'] = 0;
	$response['message'] = "Insufficient Fund";
        
    }else{
    
$query = "SELECT fullname FROM `Users` WHERE userid = '$userid' ";

$resultFullname = $conn->query($query);

if ($resultFullname->num_rows > 0) {
 
  while($rowFullname = $resultFullname->fetch_assoc()) {
    $fullname =  $rowFullname["fullname"];
   } 
}
           
	    $response['status'] = 1;
	    $response['message'] = $fullname ; 
	    $response['balance'] = $balance ;      
        
        
    }
   
  
}else{
     $response['status'] = 0;
    $response['message'] = "Invalid Account Number";
}
            
} else {
        $response['status'] = 0;
        $response['message'] = "Invalid Account Number";
   
}
    
    
echo json_encode($response);
  
    
    
?>