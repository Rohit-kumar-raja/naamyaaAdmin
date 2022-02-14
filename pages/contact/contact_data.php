<?php
include '../../connection.inc.php';

if (isset($_SESSION['username']) && ($_SESSION['username'] != '')) {
    $select = "SELECT * FROM `contact_data` WHERE 1";
    $result1 = mysqli_query($connection, $select);

?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 3 | DataTables</title>
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
                                <h1>Event</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active">Event</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">

                                <!-- /.card -->

                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">All Event of The Product</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <?php

                       
                                    // include 'update.php';
                                    ?>
                                   
                                    <div class="card-body">

                                        <table id="example1" class="table table-bordered table-striped table-responsive">

                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Location</th>

                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Location</th>
                                                    <th>Action1</th>

                                                </tr>
                                            </thead>

                                            <tbody>

                                                <?php

                                                if (mysqli_num_rows($result1) > 0) {
                                                    while ($rows = mysqli_fetch_array($result1)) {

                                                ?>
                                                        <tr>
                                                            <td><?php echo $rows['id']; ?></td>
                                                            <td><?php echo $rows['location']; ?></td>
                                                            <td><?php echo $rows['email']; ?></td>
                                                            <td><?php echo $rows['phone']; ?></td>
                                                            <td><?php echo $rows['location_link']; ?></td>

                                                            <td><a href="update.php?edit=<?php echo $rows['id']; ?>" class="btn btn-warning">Update</a></td>
                                                           


                                                        </tr>
                                                <?php }
                                                } ?>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Location</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Location</th>
                                                    <th>Action1</th>
                                     
                                                </tr>
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