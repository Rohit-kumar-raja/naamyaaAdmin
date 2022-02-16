<?php

use function PHPSTORM_META\elementType;

$msg = "";
$row = "";
include '../../AdminLogin/function.inc.php';
include '../../connection.inc.php';

if (isset($_GET['edit']) && ($_GET['edit'] != '')) {
    $id = $_GET['edit'];

    $select_single_data = "SELECT * FROM `contact_data` WHERE id=$id";
    $result = mysqli_query($connection, $select_single_data);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $location = $row['location'];
        $email = $row['email'];
        $phone = $row['phone'];
        $location_link = $row['location_link'];

?>


        <!doctype html>
        <html lang="en">

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
                <?php
                include '../navfootersider/nav.php';
                include '../navfootersider/aside.php';
                ?>
                <div class="content-wrapper">
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class=" col-sm-6">
                                    <h1>Update Data</h1>
                                </div>

                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
                                        <li class="breadcrumb-item active">Update Data</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>
                    <div class="card p-3">


                        <form method="post" enctype="multipart/form-data">
                            <div class="row">


                                <div class="mb-3  col-sm-4">


                                    <label for="exampleInputEmail1" class="form-label">Location Name</label>
                                    <input type="text" name="location" value="<?php echo $location; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                </div>
                                <div class="mb-3  col-sm-4">


                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="text" name="email" value="<?php echo $email; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                </div>
                                <div class="mb-3  col-sm-4">


                                    <label for="exampleInputEmail1" class="form-label">Phone</label>
                                    <input type="text" name="phone" value="<?php echo $phone; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                                </div>
                                <div class="mb-3  col-sm-12">


                                    <label for="exampleInputEmail1" class="form-label">Location lingk</label>
                                    <textarea rows="5" cols="98" type="text" name="location_link" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"><?php echo $location_link; ?></textarea>

                                </div>

                                <button type="submit" name="Submit" class="btn btn-primary centre">Submit</button>
                                <h3><?php echo $msg; ?></h3>
                            </div>
                        </form>
                    </div>
                    <!-- Optional JavaScript; choose one of the two! -->

                    <!-- Option 1: Bootstrap Bundle with Popper -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

        </body>
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

        </html>
<?php

    } else {
        header('location: ../../pages/categories/categories.php');
    }
} else {
    header('location: ../../pages/categories/categories.php');
}
if (isset($_POST['Submit'])) {
    $location = simplename($_POST['location']);
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $location_link = $_POST['location_link'];




    $update = "UPDATE `contact_data` SET `location`='$location',`email`='$email',`phone`='$phone',`location_link`='$location_link' WHERE id=$id";
    $result = mysqli_query($connection, $update);
    if ($result > 0) {
        echo "<script>

       window.location.replace('../contact/contact_data.php')
       </script>";
    } else {
        echo "<p class='col'>data already exits</p>";
    }
}
?>