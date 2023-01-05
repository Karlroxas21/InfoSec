<?php  
    // Connect to the database
    include('../config.php');
         
    // Check connection
    if (!$mysqli) {
        die("Connection failed: " . mysqli_connect_error());
    }
         
    // Query for the number of comments in the past 30 days
    $query = "SELECT COUNT(*) AS num_comments
            FROM tblcomments
            WHERE PostDate BETWEEN DATE_SUB(NOW(), INTERVAL 30 DAY) AND NOW()";
    $result = mysqli_query($mysqli, $query);
         
    // Check if the query was successful
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $num_comments_past_30_days = $row['num_comments'];
    } else {
        // Print an error message if the query fails
        echo "Error: " . mysqli_error($mysqli);
    }
         
    // Query for the number of comments in the previous 30 days
    $query = "SELECT COUNT(*) AS num_comments
            FROM tblcomments
            WHERE PostDate BETWEEN DATE_SUB(NOW(), INTERVAL 60 DAY) AND DATE_SUB(NOW(), INTERVAL 30 DAY)";
    $result = mysqli_query($mysqli, $query);
         
    // Check if the query was successful
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $num_comments_prev_30_days = $row['num_comments'];
    } else {
        // Print an error message if the query fails
        echo "Error: " . mysqli_error($mysqli);
    }
         
    // Calculate the percentage increase
    $percent_increase = ($num_comments_past_30_days / $num_comments_prev_30_days) * 100;
    $percent_increase = number_format($percent_increase, 2);
?>