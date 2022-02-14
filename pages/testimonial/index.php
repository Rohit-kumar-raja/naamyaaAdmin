<?php
include '../../connection.inc.php';

if (isset($_SESSION['username']) && ($_SESSION['username'] != '')) {
  $img = "SELECT * FROM `testimonial` WHERE 1";
  $imageresult = mysqli_query($connection, $img);



?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Naamyaa foundation</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="./dist/img/favicon.png">
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
  <script src="../../ckeditor/ckeditor.js"></script>

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
              <h1>Testimonial</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Testimonial</li>
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
                  <h3 class="card-title">Testimonial</h3>
                </div>
                <!-- /.card-header -->
                <?php

                  include 'insert.php';
                  // include 'update.php';
                  ?>
                <!-- here is all massages for the data -->

                <div class="card-body">
                  <a href="" class="btn btn-primary text-center" data-toggle="modal" data-target="#insert">Add
                    Testimonial
                  </a>
                  <br>
                  <br>
                  <div class="table-responsive ">
                    <table id="example1" class="table table-bordered table-striped">

                      <thead>
                        <tr>
                          <th>S no</th>
                          <th>Name</th>
                          <th>Designation</th>
                          <th>image</th>
                          <th>Description</th>
                          <th>Action1</th>
                          <th>Action2</th>
                          <th>status</th>
                        </tr>
                      </thead>

                      <tbody>

                        <?php
                          $i = 1;
                          if (mysqli_num_rows($imageresult) > 0) {
                            while ($rowimage = mysqli_fetch_array($imageresult)) {



                          ?>
                        <!-- Button trigger modal -->


                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $rowimage['id']; ?>" tabindex="-1"
                          role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Candidate Massages </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <?php echo $rowimage['description']; ?>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- massage end -->
                        <tr>
                          <td><?php echo $i ?></td>
                          <td><?php echo $rowimage['name']; ?></td>
                          <td><?php echo $rowimage['post']; ?></td>
                          <td>
                            <a <?php echo ' href="data:image/jpeg;base64,' . base64_encode($rowimage['images']) . '"' ?>
                              data-toggle="lightbox" data-title="Images">
                              <img height="30px" width="30px"
                                <?php echo ' src="data:image/jpeg;base64,' . base64_encode($rowimage['images']) . '"' ?>
                                class="img-fluid mb-2" alt="Slider Images" />
                            </a>
                          </td>

                          <td> <button type="button" class="btn btn-success" data-toggle="modal"
                              data-target="#exampleModal<?php echo $rowimage['id']; ?>">
                              Read more
                            </button></td>
                          <td><a href="update.php?edit=<?php echo $rowimage['id']; ?>"
                              class="btn btn-warning">Update</a></td>

                          <td> <a href="delete.php?delete=<?php echo $rowimage['id']; ?>"
                              class="btn btn-danger">Delete</a> </td>
                          <td> <?php
                                      if ($rowimage['status'] == 1) {
                                        echo "<a class='btn btn-success' href='activedeactive.php?type=status&operation=deactive&id=" . $rowimage['id'] . "'>Active</a>";
                                      } else {
                                        echo "<a class='btn btn-secondary' href='activedeactive.php?type=status&operation=active&id=" . $rowimage['id'] . "'>Deactive</a>";
                                      }

                                      ?>
                          </td>

                        </tr>
                        <?php $i++;
                            }
                          }
                          ?>
                      </tbody>
                      <tfoot>
                        <tr>
                          <th>S no</th>
                          <th>Name</th>
                          <th>Designation</th>
                          <th>image</th>
                          <th>Description</th>
                          <th>Action1</th>
                          <th>Action2</th>
                          <th>status</th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>

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
  <script src="../../plugins/ekko-lightbox/ekko-lightbox.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
  <!-- page script -->
  <script>
    $(function () {
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
  <script>
    $(function () {
      $(document).on('click', '[data-toggle="lightbox"]', function (event) {
        event.preventDefault();
        $(this).ekkoLightbox({
          alwaysShowClose: true
        });
      });

      $('.filter-container').filterizr({
        gutterPixels: 3
      });
      $('.btn[data-filter]').on('click', function () {
        $('.btn[data-filter]').removeClass('active');
        $(this).addClass('active');
      });
    })

  </script>
</body>

</html>
<?php
} else {
  header('location:./AdminLogin/super_Admin.php');
}
?>
