<?php

require_once("Connect.php");
$data = array();
$username = $_POST['username'];
$page_number = mysqli_escape_string($conn, $_POST['page']);
$count_per_page = 20;
$next_offset = ($page_number - 1) * $count_per_page;
$resultt = mysqli_query($conn, "SELECT * FROM Users WHERE LOWER(username) LIKE LOWER('%$username%') LIMIT $count_per_page OFFSET $next_offset");  

while ($roww = mysqli_fetch_object($resultt))
{
    array_push($data, $roww);
}

echo json_encode($data);
  


?>