<?php
    include_once('../config.php');

    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $pass = $_POST['Password'];
    $createdDate = date("Y-m-d");
    $modifiedDate = date("Y-m-d");

    $result = mysqli_query($mysqli, "INSERT INTO tblaccounts(Name, Email, Password, CreatedDate, ModifiedDate)
    VALUES('$name', '$email', '$pass', '$createdDate', '$modifiedDate')");

    echo "<script>alert('Data addedd successfully'); window.location.href = '../index.php';</script>";
?>