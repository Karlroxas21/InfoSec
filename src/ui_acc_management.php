<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Account Management</title>
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="../DataTables/datatables.min.css">

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
            <table id="table-acc" class="table mt-3">
              <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Created Date</th>
                  <th scope="col">Modified Date</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) {
                  echo "<tr>";
                    echo "<td>" . $row['ID'] . "</td>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['Email'] . "</td>";
                    echo "<td>" . $row['CreatedDate'] . "</td>";
                    echo "<td>" . $row['ModifiedDate'] . "</td>";
                    echo "<td>";
                      echo "<a type='button' class='btn btn-sm btn-info' href='../src/manage_acc.php?id=" . $row['ID'] . "'>Edit</a>|";
                      echo "<a type='button' class='btn btn-sm btn-danger delete-modal' id='btnDelete' name='btnDelete' data-bs-id='$row[ID]' data-bs-toggle='modal' data-bs-target='#myModal_delete'>Delete</a>";
                    echo "</td>";
                  echo "</tr>";
                } mysqli_close($mysqli);?> 
              </tbody>
            </table>
          </div>

          <!-- MODAL DELETE -->
          <div class="modal" id="myModal_delete">
            <div class="modal-dialog">
              <div class="modal-content">

              <form action="../script/delete.php" method="GET">
                <input type="hidden" id="delete_id" name="delete_id" value="" readonly/>
                <!-- Header -->
                <div class="modal-header">
                  <h4 class="modal-ttitle">Delete Account</h4>
                  <button type="button" class="btn-close" btn-bs-dismiss="modal"></button>
                </div>

                <!-- BODY -->
                <div class="modal-body">
                  You are about to delete this account profile. </br>
                  This action cannot be undone. Are you sure you want to delete this record?
                </div>

                <!-- FOOTER -->
                <div class="modal-footer">
                  <button type="sbumit" class="btn btn-success">Proceed</button>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </form>

              </div>
            </div>
          </div>
          <!-- END OF MODAL DELETE -->
      </main> 

<script>
  $(document).ready(function (){
    $('#table-acc').on('click', '.delete-modal', function(){
      $('#delete_id').val($(this).attr('data-bs-id'));
      });
    });
</script>     
<script>
  $(document).ready( function () {
    $('#table-acc').DataTable();
  } ); 
</script>
<script src="../js/dashboard.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/feather.min.js"></script>
<script type="text/javascript" src="../DataTables/datatables.min.js"></script>
<script>
  feather.replace()
</script>
</body>

</html>