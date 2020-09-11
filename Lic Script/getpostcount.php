<?php>

$userid = $_POST['userid'];
require_once("Connect.php");
 $queryFind = "SELECT number FROM `Postcount` WHERE userid = '$userid' ";

      $result = $conn->query($queryFind);

      if ($result->num_rows > 0) {
    
      while($row = $result->fetch_assoc()) {

      $number =  $row["number"];
   
      }
        $response['status'] = 1;
        $response['message'] = $number;          
            
} else {
        $response['status'] = 0;
        $response['message'] = "O";
   
}
    
    
echo json_encode($response);
  
    
    
?>
   