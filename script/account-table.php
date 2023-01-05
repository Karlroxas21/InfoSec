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
    
    // Determine the number of rows per page
    $rowsPerPage = 10;
    
    // Retrieve the total number of rows in the table
    $query = "SELECT COUNT(*) FROM tblaccounts";
    $result = mysqli_query($mysqli, $query);
    $row = mysqli_fetch_row($result);
    $totalRows = $row[0];
    
    // Calculate the total number of pages needed$totalPages = ceil($totalRows / $rowsPerPage);
    $totalPages = ceil($totalRows / $rowsPerPage);
    // Determine the current page number
    if (isset($_GET['page'])) {
        $currentPage = (int)$_GET['page'];
    } else {
        $currentPage = 1;
    }
    
    // Calculate the starting row number for the current page
    $startingRow = ($currentPage - 1) * $rowsPerPage;
    
    // Retrieve the rows for the current page
    $query = "SELECT * FROM tblaccounts LIMIT $startingRow, $rowsPerPage";
    $result = mysqli_query($mysqli, $query);
    
    // Display the pagination links
    function displayPagination($totalPages, $currentPage){
        for ($i = 1; $i <= $totalPages; $i++) {
            if ($i == $currentPage) {
            echo "<span>$i</span>";
            } else {
            echo "<a href='?page=$i'>$i</a>";
            }
        }
    }

?>