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
    $rowsPerPage = 5;
    
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
    
    // Display the rows in a table
    echo "<table>";
    echo "<tr>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Created Date</th>";
    echo "<th>Modified Date</th>";
    echo "<th>Action</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['ID'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo "<td>" . $row['CreatedDate'] . "</td>";
        echo "<td>" . $row['ModifiedDate'] . "</td>";
        echo "<td>";
        echo "<form method='post'>";
        echo "<input type='hidden' name='ID' value='" . $row['ID'] . "'>";
        echo "<input type='submit' name='edit' value='Edit'>";
        echo "<input type='submit' name='delete' value='Delete'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
    
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
  
    
    // Check if the edit button has been clicked
    if (isset($_POST['edit'])) {
        // Retrieve the row to be edited
        $query = "SELECT * FROM tblaccounts WHERE ID = ?";
        $stmt = mysqli_prepare($mysqli, $query);
        mysqli_stmt_bind_param($stmt, 'i', $_POST['ID']);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
    
        // Display the form for editing the row
        echo "<form method='post'>";
        echo "<input type='hidden' name='ID' value='" . $row['ID'] . "'>";
        echo "<label for='Name'>Name:</label>";
        echo "<input type='text' id='Name' name='Name' value='" . $row['Name'] . "'>";
        echo "<br>";
        echo "<label for='Email'>Email:</label>";
        echo "<input type='email' ID='Email' name='Email' value='" . $row['Email'] . "'>";
        echo "<br>";
        echo "<label for='Password'>Password:</label>";
        echo "<input type='password' ID='Password' name='Password' value='" . $row['Password'] . "'>";
        echo "<br>";
        echo "<input type='submit' name='submit' value='Save'>";
        echo "</form>";
    }
    
?>