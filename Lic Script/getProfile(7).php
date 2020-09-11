<?php

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
    $userid = $_POST['userid'];

    require_once 'Connect.php';

    $sql = "SELECT * FROM Users WHERE userid ='$userid' ";

    $response = mysqli_query($conn, $sql);

    $result = array();
    $result['read'] = array();

    if( mysqli_num_rows($response) === 1 ) {
        
        if ($row = mysqli_fetch_assoc($response)) {
 
                $h['userid'] = $row['userid'];	
                $h['fullname']  =$row['fullname'];	
                $h['username']  =$row['username'];	
                $h['devicetoken']  = $row['devicetoken'];	
                $h['department']  = $row['department'];	
                $h['session'] = $row['session'];
                $h['matricnumber'] = $row['matricnumber'];
                $h['password'] = $row['password'];	
                $h['phone'] = $row['phone'];	
                $h['faculty'] = $row['faculty'];	
                $h['email'] = $row['email'];	
                $h['image'] = $row['image'];
                
                
             array_push($result["read"], $h);
 
             $result["success"] = "1";
             echo json_encode($result);
        }
 
   }
 
 }else {
 
     $result["success"] = "0";
     $result["message"] = "Error!";
     echo json_encode($result);
 
     mysqli_close($conn);
 }
 
 ?>


