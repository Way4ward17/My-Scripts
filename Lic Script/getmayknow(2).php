<?php
 
require_once("Connect.php");
$userid = $_POST['userid'];
$department = $_POST['department'];
$faculty = $_POST['faculty'];
$data = array();

$resulttt = mysqli_query($conn, "SELECT DISTINCT Followee FROM Follow WHERE Followerid !='$userid' LIMIT 20");  


while ($rowww = mysqli_fetch_object($resulttt))
{
    array_push($data, $rowww);

}




echo json_encode($data);



// $sql = "SELECT DISTINCT userid FROM Users WHERE LOWER(faculty) like LOWER('%$faculty%') OR LOWER(department) like LOWER('%$department%') ";

// $result = $conn->query($sql);

// if ($result->num_rows > 0) {
 
// while($row = $result->fetch_assoc()) {

// $Followee =  $row["userid"];


// }
// echo json_encode($data);
// }


// $resultsql = "SELECT DISTINCT Followee FROM `Follow` WHERE Followee != '$Followee' AND Followerid = '$userid' OR Followerid != '$userid'";

// $resulty = $conn->query($resultsql);

// if ($resulty->num_rows > 0) {
 
// while($row = $resulty->fetch_assoc()) {

// $Followeee =  $row["Followee"];





// $resulttt = mysqli_query($conn, "SELECT * FROM Users WHERE userid ='$Followeee' LIMIT 10");  


// while ($rowww = mysqli_fetch_object($resulttt))
// {
//     array_push($data, $rowww);


// }
// }
// }
// }
// }




 
?>