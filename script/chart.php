<?php
    include_once('../config.php');

    $query= "SELECT DATE_FORMAT(CreatedDate, '%m') AS month, COUNT(*) AS num_rows
    FROM tblaccounts GROUP BY DATE_FORMAT(CreatedDate, '%m') ORDER BY month ASC";
    $result = mysqli_query($mysqli, $query);

    $num_row_each_month = array();

    while ($row = mysqli_fetch_assoc($result)){
        $month = $row['month'];
        $num_rows = $row['num_rows'];

        array_push($num_row_each_month, $num_rows);
    }

    $num_row_each_month_json = json_encode($num_row_each_month);
?>