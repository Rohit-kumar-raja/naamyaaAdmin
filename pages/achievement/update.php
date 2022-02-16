<?php

$msg = "";
$row = "";
include '../../AdminLogin/function.inc.php';
include '../../connection.inc.php';
// i have changed something
if (isset($_GET['edit']) && ($_GET['edit'] != '')) {
    $id = $_GET['edit'];

    $select_single_data = "SELECT * FROM `archievment` WHERE id=$id";
    $result = mysqli_query($connection, $select_single_data);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $name = $row['name'];
        $image = $row['image'];
        $link = $row['link'];
        $date = $row['date'];
        $description = $row['description'];
        $status = $row['status'];

        if (isset($_POST['Submit'])) {
            $cat = simplename($_POST['name']);
            $link = $_POST['link'];
            $date = $_POST['date'];
            $description = $_POST['description'];

            $status = simplename($_POST['status']);

            $update = "UPDATE `archievment` SET `name`='$cat',`description`='$description',`link`='$link',`date`='$date',`status`='$status' WHERE id=$id";
            $result1 = mysqli_query($connection, $update);

            if ($result1) {

                if (count($_FILES) > 0) {
                    if (is_uploaded_file($_FILES['image']['tmp_name'])) {

                        $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                        $sql = "UPDATE archievment set `image`='$imgData' WHERE `id`='$id' ";
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
                      window.location.replace('achievement.php');
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
        <?php
        // here added the comman update link
        include '../../pages/navfootersider/updatenav.php'; ?>
        <div class="card p-4">

            <form method="post" enctype="multipart/form-data">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label for="exampleInputEmail1" class="form-label">name</label>
                            <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="exampleInputEmail1" class="form-label">link</label>
                            <input type="text" id="link" name="link" value="<?php echo $link; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="exampleInputEmail1" class="form-label">date</label>
                            <input type="date" name="date" value="<?php echo $date; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="exampleInputEmail1" class="form-label">Video <i class="fas fa-video    "></i> </label>
                            <div class="progress" >
                                <div id="progress" style="display: none;" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;"></div>
                            </div>

                            <div class="row" id="video_row">
                                <div class="col-sm-8">
                                    <input type="file" class="form-control" accept="video/*" id="file" name="file" />
                                </div>
                                <div class="col-sm-4">
                                    <input type="button" class="button btn btn-success mt-1" value="Upload" id="but_upload">
                                </div>
                                <small class="text-danger pl-2">Please first upload video after that submit the form</small>

                            </div>
                        </div>
                        <div class="col-sm-4 form-group">
                            <label for="exampleInputEmail1" class="form-label">Image</label>
                            <input type="file" name="image" accept="image/*" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">

                        </div>
                        <div class="form-group col-sm-4">
                            <label for="exampleFormControlSelect1">Select Status</label>
                            <select name="status" class="form-control" id="exampleFormControlSelect1">
                                <option value='1'>Active</option>
                                <option value='0'>DeActive</option>
                            </select>
                        </div>
                        <div class="col-sm-12 form-group">
                            <label for="exampleInputEmail1" class="form-label">description</label>
                            <textarea cols="10" rows="6" type="text" name="description" class="form-control ckeditor" id="exampleInputEmail1" aria-describedby="emailHelp">
                             <?php echo $description; ?> </textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" name="Submit" class="btn btn-primary centre">Submit</button>
                <h3><?php echo $msg; ?></h3>
            </form>
        </div>
        <?php include '../../pages/navfootersider/foot.php'; ?>
        </body>
        <script src="../ajax.include/videoupload.js"></script>

        </html>
<?php
    } else {
        header('location: ../../pages/achievement/achievement.php');
    }
} else {
    header('location: ../../pages/achievement/achievement.php');
}
?>