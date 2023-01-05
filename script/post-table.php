<?php
    require_once('../config.php');

    // To format date 
    date_default_timezone_set('Asia/Manila');
    $current_time = date('Y-m-d');
        
    // Check if the delete button has been clicked
    if (isset($_POST['delete'])) {
        // Prepare the DELETE query
        $query = "DELETE FROM tblcomments WHERE ID = ?";
        $stmt = mysqli_prepare($mysqli, $query);
        mysqli_stmt_bind_param($stmt, 'i', $_POST['ID']);
        mysqli_stmt_execute($stmt);
    }
    
    // Retrieve the rows for the current page
    $query = "SELECT * FROM tblcomments";
    $result = mysqli_query($mysqli, $query);
?>