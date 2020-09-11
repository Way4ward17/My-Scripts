  <?php>

   
    $type = $_POST['type'];	
    $id = $_POST['id'];
    $school = $_POST['school'];
    $school1 = $_POST['school1'];	
    $school2 = $_POST['school2'];
    $faculty = $_POST['faculty'];	
    $faculty1 = $_POST['faculty1'];	
    $faculty2 = $_POST['faculty2'];	
    $department = $_POST['department'];	
    $department1 = $_POST['department1'];
    $department2 = $_POST['department2'];
    $time = $_POST['time'];
    $userid = $_POST['userid'];
        $expireddate = $_POST['expireddate'];
    

 
    require_once("Connect.php");
   
 
    $query = "INSERT INTO `Promoterequest`(`type`, `postid`, `school`, `school1`, `school2`, `faculty`, `faculty1`, `fsculty2`, `department`, `department1`, `department2`, `time`, `userid`,`expireddate`) 
    VALUES ('$type','$postid','$school','$school1','$school2','$faculty','$faculty1','$faculty2','$department','$department1','$department2','$time','$userid','$expireddate')";

    
    if(mysqli_query($conn,$query)){
        $response['status'] = 1;
        $response['message'] = "Successfully Saved";
    }else{
        $response['status'] = 0;
        $response['message'] = "Error ooooooo";
    }
    
echo json_encode($response);
    
    ?>