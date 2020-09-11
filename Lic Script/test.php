<?php>

$userid = $_POST["userid"];
    saveCount($userid);
        saveFollowing($userid);
        saveFollower($userid);

?>