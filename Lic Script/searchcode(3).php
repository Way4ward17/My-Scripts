<?php

require_once("Connect.php");
$data = array();
$code = $_POST['coursecode'];
$page_number = mysqli_escape_string($conn, $_POST['page']);
$count_per_page = 20;
$next_offset = ($page_number - 1) * $count_per_page;
$resultt = mysqli_query($conn, "SELECT * FROM testdata WHERE LOWER(coursecode) like LOWER('%$code%') LIMIT $count_per_page OFFSET $next_offset");  

while ($roww = mysqli_fetch_object($resultt))
{
    array_push($data, $roww);
}

echo json_encode($data);
  