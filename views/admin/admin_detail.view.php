<!-- ----------------btn add admin------------- -->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container">
    <h3>Create addmin</h3>  
    <a href="form_add_admin.view.php" class='btn btn-primary m-5 r-4'>Add admin</a>  
    <br> 
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Full Name</th>
        <th>Username</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1.</td>
        <td>Rathanak</td>
        <td>Sok Heang</td>
        <td>Bour.handsome@gmail.com</td>
        <td>
            <a href="form_add_admin.view.php" class='btn btn-secondary' >Update Admin</a>
            <a href="#" class='btn btn-danger' onclick="confirmDelete()">Delete Admin</a>
        </td>
    </tr>
    
    </tbody>
  </table>
</div>

</body>
</html>









<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"> -->


<!-- <a href="form_add_admin.view.php" class='btn-primary'>Add admin</a>

<br /><br /><br />

<table class='tbl-full'>
    <tr>
        <th>id</th>
        <th>Full Name</th>
        <th>Username</th>
        <th>Action</th>
    </tr>

    <tr>
        <td>1.</td>
        <td>Rathanak</td>
        <td>Sok Heang</td>
        <td>
            <a href="#" clss='btn-secondary' bg-color= orange>Update Admin</a>
            <a href="#" clss='btn-danger'>Delete Admin</a>
        </td>
    </tr>
</table> -->