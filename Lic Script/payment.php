  <?php>
    $userid = $_POST['userid'];
    $purpose = $_POST['purpose'];	
    $transactionid = $_POST['transactionid'];
    $refid = $_POST['refid'];	
     $amount = $_POST['amount'];	

    require_once("Connect.php");

    $query = "INSERT INTO `Payment`(`userid`, `purpose`, `transactionid`, `refid`,`amount`)
    VALUES ('$userid','$purpose','$transactionid','$refid','$amount')";

    
    if(mysqli_query($conn,$query)){
        $response['status'] = 1;
        $response['message'] = "Successfully Saved";
    }else{
        $response['status'] = 0;
        $response['message'] = "Error ooooooo";
    }
    
    echo json_encode($response);
    
    ?>