<?php>

$acctno = $_POST['accountnum'];	
require_once("Connect.php");
$queryFind = "SELECT * FROM `Account` WHERE accountnum = '$acctno' ";

$result = $conn->query($queryFind);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {

    $userid =  $row["userid"];
    $balance =  $row["balance"];
   } 
   

   
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
            
} else {
        $response['status'] = 0;
        $response['message'] = "Invalid Account Number";
   
}
    
    
echo json_encode($response);
  
    
    
?>