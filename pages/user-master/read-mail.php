<?php
include '../../connection.inc.php';
if (isset($_SESSION['username']) && ($_SESSION['username'] != '')) {
  $id = $_GET['read'];
  $select = "SELECT * FROM `volunteer` WHERE  `id`=$id";
  $result = mysqli_query($connection, $select);
  $row = mysqli_fetch_array($result);

?>

  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Read Mail</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="../extra.css">
  </head>

  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <?php include '../navfootersider/nav.php';
      include '../navfootersider/aside.php';
      ?>
      <!-- /.navbar -->
      <?php include './insert-social.php'; ?>
      <!-- Main Sidebar Container -->

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Volunteer</h1>

                <p>

                  <?php echo $msg; ?></p>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">keypepole</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">
                <a href="user.php" class="btn btn-primary btn-block mb-3"><i class="fas fa-arrow-left"> </i> Back to keypepole</a>

                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Add Social media</h3>

                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="modal" data-target="#insert_social"><i class="fas fa-minus"></i>
                      </button>
                    </div>
                  </div>

                  <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- /.card -->
              </div>
              <!-- /.col -->
              <div class="col-md-9">
                <div class="card card-primary card-outline">
                  <div class="card-header">
                    <h3 class="card-title">Full Details</h3>

                    <div class="card-tools">
                      <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Previous"><i class="fas fa-chevron-left"></i></a>
                      <a href="#" class="btn btn-tool" data-toggle="tooltip" title="Next"><i class="fas fa-chevron-right"></i></a>
                    </div>

                  </div>

                  <!-- /.card-header -->
                  <div class="card-body p-0">
                    <div class="mailbox-read-info">
                      <h5>Message Subject Is Placed Here</h5>
                      <h6>From: <?php echo $row['email']; ?>
                        <span class="mailbox-read-time float-right"><?php echo $row['date']; ?></span>
                      </h6>
                    </div>
                    <!-- /.mailbox-read-info -->
                    <div class="mailbox-controls with-border text-center">
                      <div class="btn-group">
                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Delete">
                          <i class="far fa-trash-alt"></i></button>
                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Reply">
                          <i class="fas fa-reply"></i></button>
                        <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-container="body" title="Forward">
                          <i class="fas fa-share"></i></button>
                      </div>
                      <!-- /.btn-group -->
                      <button type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Print">
                        <i class="fas fa-print"></i></button>
                    </div>
                    <!-- /.mailbox-controls -->
                    <div class="mailbox-read-message">
                      <p>name - <?php echo $row['name']; ?></p>
                      <p>email - <?php echo $row['email']; ?></p>
                      <p>phone - <?php echo $row['phone']; ?></p>
                      <p>department - <?php echo $row['department']; ?></p>

                      <p>date of join - <?php echo $row['date']; ?></p>
                      <p>occupation - <?php echo $row['occupation']; ?></p>

                      <p>address - <?php echo $row['address']; ?></p>
                      <p>wheretoknow - <?php echo $row['wheretoknow']; ?></p>

                      <p>image - <?php echo '<img " class="mini_img img-fluid"src="data:image/jpeg;base64,' . base64_encode($row['Image']) . '"/>'; ?></p>

                      <p>description - <?php echo $row['whyjoin']; ?></p>

                      <br>
                      <br>
                      <b>Social Media Links</b>
                      <br>
                      <br>
                      <?php $select = "SELECT * FROM `social_media` WHERE  `reid`=$id";
                      $result = mysqli_query($connection, $select);
                      while ($row = mysqli_fetch_array($result)) { ?>
                      <a href="<?php echo $row['link']; ?>">  <i class="fab fa-<?php echo $row['name'] ?>"> </i></a>
                      
                      <?php } ?>
                    </div>
                    <!-- /.mailbox-read-message -->
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer bg-white">

                  </div>
                  <!-- /.card-footer -->
                  <div class="card-footer">
                    <div class="float-right">
                      <button type="button" class="btn btn-default"><i class="fas fa-reply"></i> Reply</button>
                      <button type="button" class="btn btn-default"><i class="fas fa-share"></i> Forward</button>
                    </div>
                    <button type="button" class="btn btn-default"><i class="far fa-trash-alt"></i> Delete</button>
                    <button type="button" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
                  </div>
                  <!-- /.card-footer -->
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
      <?php
      include '../navfootersider/footer.php';
      ?>
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
    <!-- AdminLTE App -->
    <script src="../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
  </body>

  </html>
<?php
} else {
  header('location:../../AdminLogin/super_Admin.php');
}
?>