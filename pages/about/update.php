<?php

use function PHPSTORM_META\elementType;

$msg = "";
$row = "";
include '../../AdminLogin/function.inc.php';
include '../../connection.inc.php';

$url = $_GET['url'];

if (isset($_GET['edit']) && ($_GET['edit'] != '')) {
    $id = $_GET['edit'];
    // echo $id;
    $select_single_data = "SELECT * FROM `about_us` WHERE id=$id";
    $result = mysqli_query($connection, $select_single_data);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $name = $row['title'];
        $description = $row['description'];
        // $image = $row['image'];
        $youtube = $row['youtube'];
        $date = $row['date'];

        if (isset($_POST['Submit'])) {
            $title = $_POST['name'];
            $link = $_POST['link'];
            $desc = $_POST['desc'];
            $status = $_POST['status'];
            $date = date('Y-m-d');

            $update = "UPDATE `about_us` SET `title`='$title',`description`='$desc',`youtube`='$link',`date`='$date',`status`='$status'  WHERE id=$id";
            $result = mysqli_query($connection, $update);
            if ($result) {

                if (count($_FILES) > 0) {
                    if (is_uploaded_file($_FILES['image']['tmp_name'])) {

                        $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                        $sql = "UPDATE about_us set `images`='$imgData' WHERE `id`='$id' ";
                        $current_id = mysqli_query($connection, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
                    }
                }

                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Success</strong> Your Data Successfully Added into the Database
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';

                echo "<script>
                setTimeout(function() {
                  window.location.replace('$url');
                  }, 2000);

            </script>";
            } else {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>Alert!</strong>  ' . $connection->error . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>';
            }
        }

?>



        <!doctype html>
        <html lang="en">

        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>Naamyaa Foundation</title>
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
                                    <h1>Update</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active">Update</li>
                                    </ol>
                                </div>
                            </div>
                        </div><!-- /.container-fluid -->
                    </section>

                    <div class="card p-4">

                        <form method="post" enctype="multipart/form-data" id="frm_ecard">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="mb-3 col-md-4">
                                        <label for="exampleInputEmail1" class="form-label">Title</label>
                                        <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label for="exampleInputEmail1" class="form-label">Image</label>
                                        <input name="image" type="file" id="defaultForm-email" accept="image/*" class="form-control validate" placeholder="Enter Images">
                                    </div>

                                    <div class="col-sm-4 form-group">
                                        <label for="exampleInputEmail1" class="form-label">Video <i class="fas fa-video    "> <small class="text-danger">(* video <= 64MB)</small> </i> </label>
                                        <div class="progress">
                                            <div id="progress" style="display: none;" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                                        </div>
                                        <div class="row" id="video_row">
                                            <div class="col-sm-9">
                                                <input type="file" class="form-control" accept="video/*" id="file" name="file" />
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="button" class="button btn btn-success mt-1" value="Upload" id="but_upload">
                                            </div>
                                            <small class="text-danger pl-2">Please first upload video after that submit the form</small>
                                        </div>
                                    </div>

                                    <!-- this is the progress bar -->
                                    <div class="progress" style="display: none;">
                                        <div class="progress-bar progress-bar-striped progress-bar-animated bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
                                    </div>
                                    <br>
                                    <div class="alert alert-success status" style="display:none" role="alert">
                                        Your file is successfully uploaded !
                                    </div>
                                    <div class="mb-3 col-md-4">
                                        <label for="exampleInputEmail1" class="form-label">Youtube Video link</label>
                                        <input type="text" id="link" name="link" value="<?php echo $youtube; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="exampleFormControlSelect1">Select Status</label>
                                        <select name="status" class="form-control" id="exampleFormControlSelect1">
                                            <option value='1'>Active</option>
                                            <option value='0'>Deactive</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 col-md-12">
                                        <label for="exampleInputEmail1" class="form-label"> Description</label>
                                        <textarea type="text" cols="10" rows="10" name="desc" class="form-control ckeditor" id="exampleInputEmail1" aria-describedby="emailHelp"><?php echo $description; ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" name="Submit" class="btn btn-primary centre">Submit</button>
                            <h3><?php echo $msg; ?></h3>
                        </form>
                    </div>
                </div>

                <!-- Optional JavaScript; choose one of the two! -->

            <?php include '../navfootersider/foot.php'; ?>
                <script>
                    $(document).ready(function() {
                        $(function() {

                            $("form").ajaxForm({
                                beforeSend: function() {
                                    $(".status").css("display", "none");

                                    $(".progress").css("display", "");
                                    var percentVal = "0%";
                                    $(".bar").css("width", percentVal);
                                },
                                uploadProgress: function(event, position, total, percentComplete) {
                                    var percentVal = percentComplete + "%";
                                    $(".bar").css("width", percentVal);
                                },
                                complete: function(xhr) {
                                    $(".progress").css("display", "none");
                                    $(".status").css("display", "");

                                }
                            });

                        });
                    });
                </script>
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
        header('location: ../../pages/keypepole/keypepole.php');
    }
} else {
    header('location: ../../pages/keypepole/keypepole.php');
}

?>

<style>

</style>