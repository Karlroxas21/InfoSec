<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin Dashboard</title>
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
              <a class="nav-link active" aria-current="page" href="#">
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
              <a class="nav-link" href="../src/ui_acc_management.php">
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

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
        </div>
        <!-- MY CODE -->
        <div class="row">
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                  <!-- Number of users registered are stored here -->
                <?php include('../script/count-user.php') ?>
                <h2 class="card-title" id="total-reg"><?php echo $num_user_reg?></h2>
                <p class="card-text">User Registrations</p>
                <a href="../src/ui_acc_management.php" class="btn-primary">More info
                  <img src="../assets/icons8-right-arrow-30.png" width="15px">
                </a>
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
              <?php include('../script/count-comment.php') ?>
                <h2 class="card-title"><?php echo $total_comment ?></h2>
                <p class="card-text">Comments</p>
                <!-- Add a increase percentage in past 30 days -->
                <?php include('../script/comment-growth.php')?>
                <p class="card-text"><?php echo "$percent_increase% increase in the number of comments in the past 30 days."?></p>
              </div>
            </div>
          </div>
        </div>
        <?php include_once('../script/chart.php'); ?>
   

        <div class="container">
          <canvas id="myChart"></canvas>
        </div>
      </main>
  </div>
 

  <script src="../js/dashboard.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/feather.min.js"></script>
  <script>
    feather.replace()
  </script>

  <!-- CHART JS -->
  <script src="../node_modules\chart.js\dist\chart.umd.js"></script>
  <script>
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July',
          'August', 'September', 'October', 'November', 'December'
        ],
        datasets: [{
          label: '# Comments',
          data: <?php echo $num_row_each_month_json; ?>,
          borderWidth: 2
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  </script>
</body>

</html>