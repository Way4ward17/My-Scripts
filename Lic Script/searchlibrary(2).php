<?php

require_once("Connect.php");
$data = array();
$details = $_POST['name'];
$page_number = mysqli_escape_string($conn, $_POST['page']);
$count_per_page = 20;
$next_offset = ($page_number - 1) * $count_per_page;
$resultt = mysqli_query($conn, "SELECT * FROM Library WHERE LOWER(name) LIKE LOWER('%$details%') OR LOWER(name) LIKE LOWER('$details%') OR LOWER(name) LIKE LOWER('%$details') LIMIT $count_per_page OFFSET $next_offset");  

while ($roww = mysqli_fetch_object($resultt))
{
    array_push($data, $roww);
}

echo json_encode($data);
  


?>