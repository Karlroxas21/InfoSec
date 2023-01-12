<?php
    include_once('../config.php');

    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $pass = $_POST['Password'];
    $cpass = $_POST['CPassword'];
    $createdDate = date("Y-m-d");
    $modifiedDate = date("Y-m-d");

    if(!isset($name) || !isset($email)){
        echo "<script>alert('Accountt information must be complete. Please try again');</script>";
        echo "<script>window.location.href='../index.php'</script>";
        exit();
    }

    if($pass != $cpass){
        echo "<script>alert('Password does not match. Please try again');</script>";
        echo "<script>window.location.href='../index.php'</script>";
    }

        $result = mysqli_query($mysqli, "INSERT INTO tblaccounts(Name, Email, Password, CreatedDate, ModifiedDate)
        VALUES('$name', '$email', '$pass', '$createdDate', '$modifiedDate')");
        echo "<script>alert('Data addedd successfully'); 
        window.location.href = '../index.php';</script>";
?>