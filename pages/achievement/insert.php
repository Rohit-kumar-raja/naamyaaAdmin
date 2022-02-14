<?php
$msg = "";

include '../../AdminLogin/function.inc.php';

if (isset($_POST['add'])) {
    $title = $_POST['name'];
    $description = $_POST['description'];
    $link = str_replace('watch?v=', 'embed/', $_POST['link']);
    $date = $_POST['date'];
    echo  "<br>";

    $status = $_POST['status'];

    $insert = "INSERT INTO `archievment`(`name`, `description`, `image`, `link`, `date`,`status`) VALUES ('$title','$description','NULL','$link','$date','$status')";
    $result = mysqli_query($connection, $insert);
    if ($result > 0) {
        if (count($_FILES) > 0) {
            if (is_uploaded_file($_FILES['image']['tmp_name'])) {

                $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                $sql = "UPDATE archievment set `image`='$imgData' WHERE `name`='$title' ";
                $current_id = mysqli_query($connection, $sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
                if (isset($current_id)) {
                    echo '<script>
                        window.location.replace(window.location.href)
                        </script>';
                }
            }
        }

        echo "<p class='success'>Event Added successfully Refresh the page</p>";
    } else {
        echo "<p class='col'>$connection->error</p>";
    }

    // } else {
    //     $msg = "Enter status in 1 (Active) & 0 (DeActtive)";
    // }

    //Api to retriving data

}
$categrie = "SELECT * FROM `categories`";
$cat_r = mysqli_query($connection, $categrie);
?>

<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Achievement</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="container">
                        <div class="row">
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Title</label>
                                <input name="name" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Title">

                            </div>
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Image</label>
                                <input name="image" type="file" id="defaultForm-email" accept="image/*" class="form-control validate">

                            </div>
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Youtube Video link</label>
                                <input name="link" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Youtube Link">

                            </div>
                            <div class="md-form col-sm-4">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Date</label>
                                <input name="date" type="date" id="defaultForm-email" class="form-control validate">
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="exampleFormControlSelect1">Select Status</label>
                                <select name="status" class="form-control" id="exampleFormControlSelect1">

                                    <option value='1'>Active</option>
                                    <option value='0'>DeActive</option>
                                </select>
                            </div>
                            <div class="md-form col-sm-12">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Description</label>
                                <textarea name="description" id="defaultForm-email" class="form-control validate ckeditor" placeholder="Enter Description"></textarea>

                            </div>
                            <?php echo $msg; ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button name="add" class="btn btn-default">Add </button>
                </div>
            </form>
        </div>
    </div>
</div>