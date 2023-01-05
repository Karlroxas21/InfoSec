<?php 
    require_once('./config.php');

    // Retrieve the rows for the current page
    $query = "SELECT * FROM tblcomments";
    $result = mysqli_query($mysqli, $query);
?>