<?php
    include_once('../config.php');

    // To format date 
    date_default_timezone_set('Asia/Manila');
    $current_time = date('Y-m-d');
   

    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $modifiedDate = $current_time;

    $result = mysqli_query($mysqli, "UPDATE tblaccounts
    SET Name='$name', Email='$email', Password='$pass', ModifiedDate='$modifiedDate' 
    WHERE ID=$id");
    

    echo "<script>alert('Data successflly updated.');</script>";
    echo "<script>window.location.href='../src/ui_acc_management.php';</script>";

?>