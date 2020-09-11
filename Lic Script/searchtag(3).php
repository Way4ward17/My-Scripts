<?php

require_once("Connect.php");
$data = array();
$tags = $_POST['tags'];
$page_number = mysqli_escape_string($conn, $_POST['page']);
$count_per_page = 20;
$next_offset = ($page_number - 1) * $count_per_page;

$data = array();

$dataEmptya = array();

$dataEmptyb = array();

$Sqlresultt = "SELECT * FROM Post WHERE LOWER(tags) LIKE LOWER('%$tags%' LIMIT $count_per_page OFFSET $next_offset"; 

$resultFex = $conn->query($Sqlresultt);

if ($resultFex->num_rows > 0) {

while ($roww = $resultFex ->fetch_assoc())

{
    $pdfURL= $roww['pdfURL'];
    $videourl= $roww['videourl'];
    $download = $roww['download'];
    //$shareusername= $roww['shareusername'];
    $shareuserid = $roww['shareuserid'];
    $sharepost = $roww['sharepost'];
    //$shareprofilephoto = $roww['shareprofilephoto'];
    $share = $roww['share'];
    $sponsor = $roww['sponsor'];
    $imageURL1 = $roww['imageURL1'];	
    $imageURL2 = $roww['imageURL2'];	
    $imageURL3 = $roww['imageURL3'];	
    $imageURL4 = $roww['imageURL4'];
    $imageURL5 = $roww['imageURL5'];	
    $type = $roww['type'];	
    $likes = $roww['likes'];	
    $tags = $roww['tags'];	
    $mention = $roww['mention'];
    $postid = $roww['id'];	
    $details = $roww['details'];	
   // $username = $roww['username'];	
    $userid = $roww['userid'];	
    $verified = $roww['verified'];
    $time = $roww['time'];
    $comment = $roww['comment'];
   // $photo = $roww['photo'];
    $fullname = $roww['fullname'];
    

$usernameShare = getProfileUsername($shareuserid);

$photoShare =  getProfileImage($shareuserid);


$username =  getProfileUsername($userid);

$photo =  getProfileImage($userid);


$info = array('imageURL2', 'imageURL3', 'imageURL4', 'imageURL5', 'imageURL1', 'type', 'likes', 'tags', 'mention', 'id', 'details', 'photo', 'username', 'verified', 'time', 'comment', 'userid', 'videourl', 'download', 'pdfURL', 'fullname', 'shareuserid', 'shareprofilephoto', 'shareusername', 'sharepost', 'sponsor', 'share');
$infoData = array($imageURL2, $imageURL3, $imageURL4, $imageURL5, $imageURL1, $type, $likes, $tags, $mention, $postid, $details, $photo, $username, $verified, $time, $comment, $userid, $videourl, $download, $pdfURL, $fullname, $shareuserid, $photoShare, $usernameShare, $sharepost, $sponsor, $share);
array_push($dataEmptya, $infoData);
$dataEmptyb = array_combine($info, $infoData);
array_push($data,$dataEmptyb);
    
}
}






echo json_encode($data);



 
?>