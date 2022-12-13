
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">	
	<title>Account Management</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/dashboard.css">

  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery.validate.min.js"></script>   
</head>

<body>
  <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="images/infosec.png" alt="Logo" width="120" height="24"/>
      </a>
      <a class="btn btn-outline-success" href="index.php">Logout</a>
    </div>
  </header>


  <div class="container-fluid">
    <div class="row">
      <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
        <div class="position-sticky pt-3 sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="ui_admin_dashboard.php">
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
              <a class="nav-link active" href="ui_acc_management.php">
                <span data-feather="users" class="align-text-bottom"></span>
                Accounts Management
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="ui_manage_comment.php">
                <span data-feather="message-circle" class="align-text-bottom"></span>
                Posts Management
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Accounts Management</h1>
        </div>
        <div class="inner-container">
                <table class="table mt-3">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Modified Date</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr *ngFor="let row of employeeData">
                        <td>{{row.id}}</td>
                        <td>{{row.firstName}}</td>
                        <td>{{row.lastName}}</td>
                        <td>{{row.email}}</td>
                        <td>
                          <button (click)="oneEdit(row)" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-info">Edit</button>
                          <button (click)="deleteEmployee(row)" class="btn btn-danger mx-3">Delete</button>
                        </td>
                      </tr>
                    </tbody>
                  </table>
            </div>
        </div>

        <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Student Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form [formGroup]="formValue">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Name</label>
              <input type="text" formControlName="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label">Email</label>
              <input type="text" formControlName="email" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Password</label>
              <input type="email" formControlName="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" id="cancel" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" *ngIf="showUpdate" (click)="updateEmployeeDetails()"class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
  </div>

        </div>

      </main>

      
    </div>
  </div>
    
  <script src="js/dashboard.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/feather.min.js"></script>
  <script>
    feather.replace()
  </script>

</body>
</html>