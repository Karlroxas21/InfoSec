<?php
    include_once('../config.php');

    // To format date 
    date_default_timezone_set('Asia/Manila');

    $current_time = date('Y-m-d');
    $comment = $_POST['comment'];
    
    $result = mysqli_query($mysqli, "INSERT INTO tblcomments(Message, PostDate)
    VALUES('$comment', '$current_time')");
    
    echo "<script>alert('Comment posted successfully'); window.location.href = '../index.php';</script>";
?>