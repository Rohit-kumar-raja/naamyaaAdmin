<?php



$msg = "";
$row = "";
include '../../AdminLogin/function.inc.php';
include '../../connection.inc.php';

if (isset($_GET['edit']) && ($_GET['edit'] != '')) {
    $id = $_GET['edit'];

    $select_single_data = "SELECT * FROM `videogallery` WHERE id=$id";
    $result = mysqli_query($connection, $select_single_data);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];

        $link = $row['link'];
        $date = $row['date'];
        $description = $row['description'];
        $status = $row['status'];

?>
        <!doctype html>
        <html lang="en">
        <?php include '../navfootersider/updatenav.php'; ?>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <form method="post" enctype="multipart/form-data">
                            <div class="card p-2">
                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label for="exampleInputEmail1" class="form-label">Link</label>
                                        <input type="text" id="link" name="link" value="<?php echo $link; ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                    <div class="col-sm-6 form-group">
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
                                    <div class="form-group col-md-6">
                                        <label for="exampleFormControlSelect1">Select Status</label>
                                        <select name="status" class="form-control" id="exampleFormControlSelect1">

                                            <option value='1'>Active</option>
                                            <option value='0'>DeActive</option>

                                        </select>
                                    </div>

                                    <div class="mb-3 col-12">
                                        <label for="exampleInputEmail1" class="form-label">Description</label>
                                        <textarea type="text" name="description" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                          <?php echo $description; ?> </textarea>
                                    </div>
                                </div>

                                <button type="submit" name="Submit" class="btn btn-primary centre p-2">Submit</button>
                                <h3><?php echo $msg; ?></h3>
                        </form>
                    </div>
                </div>
            </div>
            </div>
        </section>

        <?php include '../navfootersider/foot.php'; ?>

        </body>

        </html>
<?php

    } else {
        header('location: ../../pages/Gallery/videogallery.php');
    }
} else {
    header('location: ../../pages/Gallery/videogallery.php');
}
if (isset($_POST['Submit'])) {

    $link =  $link = str_replace('watch?v=', 'embed/', $_POST['link']);;

    $description = $_POST['description'];

    $status = simplename($_POST['status']);
    if ($status == 1 || $status == 0) {

        $update = "UPDATE `videogallery` SET `link`='$link',`description`='$description',`status`='$status' WHERE  id=$id";
        $result1 = mysqli_query($connection, $update);




        if ($result1) {


            echo "<script>
                            window.location.replace('../../pages/Gallery/videogallery.php')
                        </script>";
        } else {
            echo "<p class='col'>data already exits</p>";
        }
    } else {
        $msg = "Enter status in 1 (Active) & 0 (DeActive)";
        echo $msg;
    }
}
?>