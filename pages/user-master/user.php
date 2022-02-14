<?php
include '../../connection.inc.php';

if (isset($_SESSION['username']) && ($_SESSION['username'] != '')) {
  $volunteer = "SELECT * FROM `volunteer` WHERE 1";
  $result_volunteer = mysqli_query($connection, $volunteer);

?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Naamyaa Foundation </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Exta css by dev -->
    <link rel="stylesheet" href="../extra.css">
  </head>

  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <?php
      include '../navfootersider/nav.php';
      include '../navfootersider/aside.php';
      include './insert.php';
      ?>
      <!-- end navbar -->
      <!-- Main Sidebar Container -->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Volunteer</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Volunteer</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
          <a href="" class="btn btn-primary text-center" data-toggle="modal" data-target="#insert">Add Volunteer
          </a>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-12">
              <div class="card">

                <!-- /.card -->

                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Volunteer</h3>
                  </div>
                  <!-- /.card-header -->

                  <div class="card-body table-responsive">

                    <table id="example1" class="table table-bordered table-striped">

                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Address</th>

                          <th>Date/Time</th>
                          <th>Details</th>
                          <th>Status</th>
                          <th>Delete</th>
                        </tr>
                      </thead>

                      <tbody>

                        <?php
                        $i = 1;
                        while ($rows = mysqli_fetch_array($result_volunteer)) {

                        ?>
                          <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $rows['name']; ?></td>
                            <td><?php echo $rows['email']; ?></td>
                            <td><?php echo $rows['phone']; ?></td>
                            <td><?php echo $rows['address']; ?></td>

                            <td><?php echo $rows['date']; ?></td>

                            <td> <a href="read-mail.php?read=<?php echo $rows['id']; ?>">Read..</a></td>
                            <td> <a href="update.php?edit=<?php echo $rows['id']; ?>" class="btn btn-warning">Update</a></td>

                            <td> <?php
                                  if ($rows['status'] == 1) {
                                    echo "<a class='btn btn-success' href='activedeactive.php?type=status&operation=deactive&id=" . $rows['id'] . "'>Active</a>";
                                  } else {
                                    echo "<a class='btn btn-secondary' href='activedeactive.php?type=status&operation=active&id=" . $rows['id'] . "'>Deactive</a>";
                                  }

                                  ?>
                            </td>
                            <td> <a href="delete.php?delete=<?php echo $rows['id']; ?>" class="btn btn-danger">Delete</a></td>


                          </tr>
                        <?php }
                        ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Mobile</th>
                          <th>Address</th>

                          <th>Date/Time</th>
                          <th>Details</th>

                          <th>Status</th>
                          <th>Delete</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <?php include '../navfootersider/footer.php';   ?>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables -->
    <script src="../../plugins/datatables/jquery.dataTables.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- page script -->
    <script>
      $(function() {
        $("#example1").DataTable();
        $('#example2').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false,
        });
      });
    </script>
  </body>

  </html>
<?php
} else {
  header('location:./AdminLogin/super_Admin.php');
}
?>