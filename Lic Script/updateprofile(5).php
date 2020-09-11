<?php>



 	$userid = $_POST['userid'];	
    $fullname = $_POST['fullname'];	
    $username = $_POST['username'];	
    $department = $_POST['department'];	
    $session = $_POST['session'];	
    $matricnumber = $_POST['matricnumber'];
    $phone = $_POST['phone'];	
    $faculty = $_POST['faculty'];	
    $email = $_POST['email'];	
    $status = $_POST['status'];
 
 require_once("Connect.php");
   
    $query = "UPDATE Users SET fullname= '$fullname', username= '$username', department= '$department', session= '$session', matricnumber= '$matricnumber', phone= '$phone', faculty= '$faculty', email= '$email',status= '$status' WHERE userid = '$userid'";

    
    if(mysqli_query($conn,$query)){
        $response['status'] = 1;
        $response['message'] = "Successfully Updated";
       
        
        
        
    }else{
        $response['status'] = 0;
        $response['message'] = "Error ooooooo";
        
        
    }
    echo json_encode($response);

?>