<?php
    require_once('../config.php');

    // To format date 
    date_default_timezone_set('Asia/Manila');
    $current_time = date('Y-m-d');
    
    // Check if the form has been submitted
    if (isset($_POST['submit'])) {
        // Prepare the UPDATE query
        $query = "UPDATE tblaccounts SET Name = ?, Email = ?, Password = ?, ModifiedDate = ? WHERE ID = ?";
        $stmt = mysqli_prepare($mysqli, $query);
        mysqli_stmt_bind_param($stmt, 'ssssi', $_POST['Name'], $_POST['Email'], $_POST['Password'], $current_time, $_POST['ID']);
        mysqli_stmt_execute($stmt);
    }
    
    // Check if the delete button has been clicked
    if (isset($_POST['delete'])) {
        // Prepare the DELETE query
        $query = "DELETE FROM tblaccounts WHERE ID = ?";
        $stmt = mysqli_prepare($mysqli, $query);
        mysqli_stmt_bind_param($stmt, 'i', $_POST['ID']);
        mysqli_stmt_execute($stmt);
    }
    
    // Retrieve the rows for the current page
    $query = "SELECT * FROM tblaccounts";
    $result = mysqli_query($mysqli, $query);
?>