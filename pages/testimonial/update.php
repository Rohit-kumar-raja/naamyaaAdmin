<?php



$msg = "";
$row = "";
include '../../AdminLogin/function.inc.php';
include '../../connection.inc.php';

if (isset($_GET['edit']) && ($_GET['edit'] != '')) {
  $id = $_GET['edit'];

  $select_single_data = "SELECT * FROM `testimonial` WHERE id=$id";
  $result = mysqli_query($connection, $select_single_data);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);

    $name = $row['name'];
    $desc = $row['description'];
    $post = $row['post'];
    $image = $row['images'];
    $status = $row['status'];
    if (isset($_POST['Submit'])) {
      $name = $_POST['name'];
      $desc = $_POST['desc'];
      $post = $_POST['post'];
      $status = $_POST['status'];

      if (!empty($_FILES['img']['tmp_name'])) {
        $images = addslashes(file_get_contents($_FILES['img']['tmp_name']));
        $update_img = "UPDATE `testimonial` SET `images`='$images' WHERE `id`='$id'";
        $result = mysqli_query($connection, $update_img);
      }

      $update = "UPDATE `testimonial` SET `name`='$name',`description`='$desc',`status`='$status',`post`='$post'  WHERE `id`='$id'";
      $result = mysqli_query($connection, $update);
      if ($result) {

        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                  <strong>Success</strong> Your Data Successfully Added into the Database
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>';

        echo "<script>
                  setTimeout(function() {
                      window.location.replace('index.php');
      
                    }, 1000);
      
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
    <!doctype html>
    <html lang="en">

    <?php include '../navfootersider/updatenav.php'; ?>

    <body class="hold-transition sidebar-mini">


      <section class="content card ">
        <div class="col-12">
          <div class="card-body">
            <form method="post" enctype="multipart/form-data">
              <div class="container">
                <div class="row">

                  <div class="mb-3 col-sm-4">


                    <lavel class="a-color" for="exampleFormControlSelect1"> <b> name </b></lavel>
                    <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                  </div>

                  <div class="form-group col-sm-3">
                    <lavel class="a-color" for="exampleFormControlSelect1"> <b> Designation </b></lavel>
                    <input value="<?php echo $post; ?>" name="post" type="text" placeholder="Designation" class="form-control" id="exampleFormControlSelect1">
                  </div>

                  <div class="form-group col-sm-3">
                    <lavel class="a-color" for="exampleFormControlSelect1"> <b> Images</b></lavel>

                    <div class="col-sm-6">
                      <a <?php echo ' href="data:image/jpeg;base64,' . base64_encode($image) . '"' ?> data-toggle="lightbox" data-title="Images">
                        <img height="30px" width="30px" <?php echo ' src="data:image/jpeg;base64,' . base64_encode($image) . '"' ?> class="img-fluid mb-2" alt="Slider Images" />
                      </a>
                    </div>

                    <div class="col-sm-9">
                      <input name="img" type="file" class="form-control" id="exampleFormControlSelect1">
                    </div>
                  </div>
                  <div class="form-group col-sm-2">
                    <lavel class="a-color" for="exampleFormControlSelect1"> <b> Status </b></lavel>
                    <select name="status" class="form-control" id="exampleFormControlSelect1">

                      <option value='1'>Active</option>
                      <option value='0'>DeActive</option>

                    </select>
                  </div>

                  <div class="mb-3 col-sm-12">


                    <label for="exampleInputEmail1" class="form-label ">Description</label>
                    <textarea name="desc" class="form-control ckeditor" id="exampleInputEmail1" aria-describedby="emailHelp"> <?php echo $desc ?> </textarea>

                  </div>
                  <button type="submit" name="Submit" class="btn btn-primary centre">Submit</button>
                  <h3><?php echo $msg; ?></h3>
                </div>
              </div>
            </form>

          </div>
      </section>
      </div>
      </div>

      <?php include '../navfootersider/footer.php'; ?>
      <?php include '../navfootersider/foot.php'; ?>
    </body>

    </html>
<?php

  } else {
    header('location: ../../pages/testimonial');
  }
} else {
  header('location: ../../pages/testimonial');
}


?>