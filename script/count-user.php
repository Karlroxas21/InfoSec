<?php 
    include_once('../config.php');

    $result = mysqli_query($mysqli, "SELECT COUNT(*) FROM tblaccounts");

    $row = mysqli_fetch_row($result);
    $num_user_reg = $row[0];
?>