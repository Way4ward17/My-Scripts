<?php

require_once("Connect.php");
$testid = $_POST['testid'];
$passwordnew = $_POST['password'];
$userid = $_POST['userid'];

$sqlUsername = "SELECT password FROM testdata WHERE testid = '$testid'";

$resultUsername = $conn->query($sqlUsername);

if ($resultUsername->num_rows == 1) {
 
  while($rowUsername = $resultUsername->fetch_assoc()) {
  
      $password = $rowUsername["password"];
  }
  
  if($password == $passwordnew){
       
       
       
$queryFind = "SELECT * FROM `Testconfirm` WHERE userid = '$userid' AND testid = '$testid'";
$resultFind = mysqli_query($conn,$queryFind);
         if (mysqli_num_rows($resultFind) > 0) {
               
                $response['message'] = 0;

         }else{
             
               $query = "INSERT INTO `Testconfirm`( `testid`, `userid`) VALUES ('$testid','$userid')";
            
            if(mysqli_query($conn,$query)){
                   
                    $response['message'] = 3;
              
                }
         }
                   
          
       
  }else{

       $response['message'] = 1;
  }
  
}

echo json_encode($response);




?>