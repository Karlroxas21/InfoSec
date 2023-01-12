<?php
    include('../config.php');

    $id = $_GET['delete_id'];

    
    $result = mysqli_query($mysqli, "DELETE FROM tblaccounts WHERE ID=$id");

    
    echo "<script>alert('Data deleted.')</script>";
    echo "<script>window.location.href='../src/ui_acc_management.php'</script>";
?>


        