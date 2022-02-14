<?php
$msg = '';
$cat = ' ';
$status = ' ';
include '../../AdminLogin/function.inc.php';

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $post = $_POST['post'];
    $desc = $_POST['description'];
    $status = $_POST['status'];
    $images = '';

    if (!empty($_FILES['img']['tmp_name'])) {
        $images = addslashes(file_get_contents($_FILES['img']['tmp_name']));
    }

    $sql = "INSERT INTO `testimonial`( `name`, `images`, `description`, `post`, `status`) VALUES
                                 ('$name','$images','$desc','$post','$status')";

    $current_id = mysqli_query($connection, $sql);

    if ($current_id) {
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
                    <strong>Alert!</strong>  ' .
            $connection->error .
            '
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>';
    }
}

?>

<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Testimonial</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="container">
                    <div class="row">

                        <div class="form-group col-sm-4">
                            <lavel class="a-color" for="exampleFormControlSelect1"> <b> name</b></lavel>
                            <input name="name" placeholder="name" type="text" class="form-control" id="exampleFormControlSelect1">
                        </div>


                        <div class="form-group col-sm-3">
                            <lavel class="a-color" for="exampleFormControlSelect1"> <b> Designation </b></lavel>
                            <input name="post" type="text" placeholder="Designation" class="form-control" id="exampleFormControlSelect1">
                        </div>

                        <div class="form-group col-sm-3">
                            <lavel class="a-color" for="exampleFormControlSelect1"> <b> Images</b></lavel>
                            <input name="img" type="file" class="form-control" id="exampleFormControlSelect1">
                        </div>
                        <div class="form-group col-sm-2">
                            <lavel class="a-color" for="exampleFormControlSelect1"> <b>Select Status</b></lavel>
                            <select name="status" class="form-control" id="exampleFormControlSelect1">

                                <option value='1'>Active</option>
                                <option value='0'>DeActive</option>

                            </select>
                        </div>
                        <div class="form-group col-sm-12">
                            <lavel class="a-color" for="exampleFormControlSelect1"> <b> Description</b></lavel>
                            <textarea name="description" class="form-control  ckeditor" id="exampleFormControlSelect1">
              </textarea>


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