<?php 
    include_once('../config.php');

    $result = mysqli_query($mysqli, "SELECT COUNT(*) FROM tblcomments");

    $row = mysqli_fetch_row($result);
    $total_comment = $row[0];
?>