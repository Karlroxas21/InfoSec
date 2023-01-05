<?php 
    include('../config.php');

    $id='';
    $name='';
    $email='';
    $pass='';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = mysqli_query($mysqli, "SELECT * FROM tblaccounts WHERE ID=$id");
        while($res = mysqli_fetch_array($result)){
            $name = $res['Name'];
            $email = $res['Email'];
            $pass = $res['Password'];
        }
    }

?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link href="../style.css" rel="stylesheet">

<div class="" style="margin-right: 20%; margin-left: 20%; margin-top: 5%;">
<form action="../script/edit.php" method="POST">
    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $id; ?>">
    <div class="mb-3">
        <label for="name" class="form-label">Name:</label>
        <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>">
    </div>
    <div class="mb-3">
        <label for="email" class="col-form-label">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="mb-3">
        <label for="password" class="col-form-label">Password:</label>
        <input type="text" class="form-control" id="password" name="password" value="<?php echo $pass; ?>">
    </div>
    <div class="modal-footer float-end">
        <a type="button" class="btn btn-sm btn-secondary p-3" href="../src/ui_acc_management.php">Cancel</a>
        <button type="submit" class="btn btn-sm btn-primary p-3">Update</button>
    </div>
</form>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
