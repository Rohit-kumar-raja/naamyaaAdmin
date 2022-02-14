<?php
$msg = "";

include '../../AdminLogin/function.inc.php';


if (isset($_POST['add'])) {
    $title = $_POST['name'];
    $categries = $_POST['Categries'];
    $description = $_POST['description'];
    $link = str_replace('watch?v=','embed/',$_POST['link']);
    echo  "<br>";

    $status = $_POST['status'];




    $insert = "INSERT INTO `about_us`(`type`, `title`, `description`, `images`, `youtube`,`status`) VALUES ('$categries','$title','$description','NULL','$link','$status')";
    $result = mysqli_query($connection, $insert);
    if ($result > 0) {
        if (count($_FILES) > 0) {
            if (is_uploaded_file($_FILES['image']['tmp_name'])) {

                $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                $sql = "UPDATE about_us set `images`='$imgData' WHERE `type`='$categries' ";
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
        echo "<p class='col'>data already exits</p>";
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
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">About us</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Title</label>
                        <input name="name" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Title">

                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Section</label>
                        <select name="Categries" id="defaultForm-email" class="form-control validate">
                            <option selected disabled>Choose Section..</option>
                            <option value="About us">About Us</option>
                            <option value="Mission">Mission</option>
                            <option value="Vission">Vission</option>
                        </select>
                    </div>


                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Image</label>
                        <input name="image" type="file" id="defaultForm-email" accept="image/*" class="form-control validate" placeholder="Enter Images">

                    </div>

                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Youtube Video link</label>
                        <input name="link" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Youtube Link">

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Select Status</label>
                        <select name="status" class="form-control" id="exampleFormControlSelect1">

                            <option value='1'>Active</option>
                            <option value='0'>Deactive</option>

                        </select>
                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Description</label>
                        <textarea name="description" id="defaultForm-email" class="form-control validate ckeditor">

                        </textarea>

                    </div>
                    <?php echo $msg; ?>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button name="add" class="btn btn-default">Add About us</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="../../ckeditor/ckeditor.js"></script>
