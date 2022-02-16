<?php
$msg = "";
$cat = " ";
$status = " ";
include '../../AdminLogin/function.inc.php';

$desc = ' ';
if (isset($_POST['add'])) {
    $link = str_replace('watch?v=', 'embed/', $_POST['link']);
    $desc = $_POST['description'];
    $status = $_POST['status'];
    if ($cat != null) {
        $sql = "INSERT INTO `videogallery`(`link`, `description`,`status`) VALUES ('$link','$desc','$status')";

        $current_id = mysqli_query($connection, $sql);
        if ($current_id) {
            echo '<script>
                    window.location.replace("videogallery.php")
                    </script>';
        } else {
            echo "<p class='col'>data already exits</p>";
        }
    }
}
// $selectid="SELECT * FROM `catagries_images` WHERE 1";



$select1 = "SELECT * FROM `categories`";
$result2 = mysqli_query($connection, $select1);


?>

<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Videos Gallery</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">

                    <div class="form-group">
                        <label class="a-color" for="exampleFormControlSelect1">Video link</label>
                        <input name="link" id="link" type="text" class="form-control" id="exampleFormControlSelect1" placeholder="ENter Video Link">

                    </div>
                    <div class="col-sm-12 form-group">
                        <label for="exampleInputEmail1" class="form-label">Video <i class="fas fa-video    "> <small class="text-danger">(* video <= 64MB)</small> </i> </label>
                        <div class="progress">
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
                    <div class="form-group">
                        <label class="a-color" for="exampleFormControlSelect1">Description</label>
                        <textarea name="description" class="form-control" id="exampleFormControlSelect1" placeholder="Enter Description">

                        </textarea>
                    </div>
                    <div class="form-group">
                        <label class="a-color" for="exampleFormControlSelect1">Select Status</label>
                        <select name="status" class="form-control" id="exampleFormControlSelect1">

                            <option value='1'>Active</option>
                            <option value='0'>Deactive</option>

                        </select>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button name="add" class="btn btn-default">Add Video Images</button>
                </div>
            </form>
        </div>
    </div>
</div>