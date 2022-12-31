<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Account Management</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/dashboard.css">

  <script src="../js/jquery-3.6.0.min.js"></script>
  <script src="../js/jquery-ui.min.js"></script>
  <script src="../js/jquery.validate.min.js"></script>
</head>

<body>

  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="../images/infosec.png" alt="Logo" width="120" height="24" />
      </a>
      <a class="btn btn-outline-success" href="../index.php">Logout</a>
    </div>
  </header>
  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3 sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="../src/ui_admin_dashboard.php">
                <span data-feather="home" class="align-text-bottom"></span>
                Dashboard
              </a>
            </li>
          </ul>
          <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
            <span>DATA ADMINISTRATION</span>
          </h6>
          <ul class="nav flex-column mb-2">
            <li class="nav-item">
              <a class="nav-link active" href="../src/ui_acc_management.php">
                <span data-feather="users" class="align-text-bottom"></span>
                Accounts Management
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../src/ui_manage_comment.php">
                <span data-feather="message-circle" class="align-text-bottom"></span>
                Posts Management
              </a>
            </li>
          </ul>
        </div>
      </nav>
  </div>
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Accounts Management</h1>
        </div>
        <div class="inner-container">
          <div class="inner-left-container">
            <?php
            include('../script/account-table.php');
            ?>
            <table class="table mt-3">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Created Date</th>
                <th scope="col">Modified Date</th>
                <th scope="col">Action</th>
              </tr>
              <?php while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['ID'] . "</td>";
                echo "<td>" . $row['Name'] . "</td>";
                echo "<td>" . $row['Email'] . "</td>";
                echo "<td>" . $row['CreatedDate'] . "</td>";
                echo "<td>" . $row['ModifiedDate'] . "</td>";
                echo "<td>";
                echo "<form method='post'>";
                echo "<input type='hidden' name='ID' value='" . $row['ID'] . "'>";
                echo "<input type='submit' class='btn btn-info' data-bs-toggle='modal' data-bs-target='#editModal' name='edit' value='Edit'>";
                echo "<input type='submit' class='btn btn-danger mx-3' name='delete' value='Delete'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
              } ?> 
            </table>
            <!-- Display Pagination -->
            <div class='pagination'>
              <?php displayPagination($totalPages, $currentPage); ?>
            </div>
          </div>
            <div class="inner-right-container">
              <!-- EDIT DATA -->
              <?php
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
                echo "<div class='mb-3'>";
                echo "<label for='Name' class='form-label' >Name:</label>";
                echo "<input type='text' id='Name' name='Name' class='form-control' value='" . $row['Name'] . "'>";
                echo "</div>";

                echo "<br>";

                echo "<div class='mb-3'>";
                echo "<label for='Email' class='form-label' >Email:</label>";
                echo "<input type='email' ID='Email' name='Email' class='form-control' value='" . $row['Email'] . "'>";
                echo "</div>";

                echo "<br>";

                echo "<div class='mb-3'>";
                echo "<label for='Password' class='form-label' >Password:</label>";
                echo "<input type='password' ID='Password' name='Password' class='form-control' value='" . $row['Password'] . "'>";
                echo "</div>";

                echo "<br>";

                echo "<div>";
                echo "<button id='cancel' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>";
                echo "<br>";
                echo "<button type='submit' class='btn btn-primary'  name='submit' value='Save'>Update</button>";
                echo "</div>";
                echo "</form>";
              } ?>
            </div>
          </div>
      </main> 

<script src="../js/dashboard.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/feather.min.js"></script>
<script>
  feather.replace()
</script>
</body>

</html>