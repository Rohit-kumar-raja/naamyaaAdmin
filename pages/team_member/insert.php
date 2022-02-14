<?php
$msg = "";

include '../../AdminLogin/function.inc.php';


if (isset($_POST['add'])) {

    $department = $_POST['department'];
    $name = $_POST['name'];
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $post = $_POST['post'];
    $occupation = $_POST['occupation'];
    $know = $_POST['know'];
    $priority = trim($_POST['priority']);
    $status = $_POST['status'];
    $description = $_POST['description'];
    $date=date('Y-m-d');
    if (!empty($_FILES['image']['tmp_name'])) {
        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    }



    $insert = "INSERT INTO `team_member`(`name`, `gender`, `email`, `phone`, `department`, `address`, `occupation`, `wheretoknow`, `whyjoin`,`priraty`, `date`, `Image`, `status`) VALUES
                         ('$name','$gender','$email','$phone','$department','$address','$occupation','$know','$description','$priority','$date','$image','$status')";
    $result = mysqli_query($connection, $insert);
    if ($result > 0) {

        echo '<div class="ml-5  alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success</strong> Your Data Successfully Added into the Database
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';

        echo "<script>
            setTimeout(function() {
                window.location.replace('user.php');

              }, 1000);

        </script>";
    } else {
        echo '<div ml-5 class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Alert!</strong>  ' . $connection->error . '
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
    }
}

$categrie = "SELECT * FROM `categories`";
$cat_r = mysqli_query($connection, $categrie);
?>

<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">team_member</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="container">
                        <div class="row">

                            <div class="md-form col-sm-4  mt-3">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Department</label>
                                <select name="department" id="defaultForm-email" class="form-control validate" placeholder="Enter Caregorie Name">
                                    <option selected disabled>department ..</option>
                                    <?php while ($cat_row = mysqli_fetch_array($cat_r)) { ?>
                                        <option value=" <?php echo $cat_row['name']; ?>"><?php echo $cat_row['name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="md-form col-sm-4  mt-3">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Name</label>
                                <input name="name" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Name">

                            </div>


                            <div class="md-form col-sm-4  mt-3">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Email</label>
                                <input name="email" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Email id">

                            </div>
                            <div class="md-form col-sm-4  mt-3">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Phone</label>
                                <input name="phone" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Phone Number">

                            </div>
                            <div class="md-form col-sm-4  mt-3">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Gender</label>
                                <select name="gender" id="defaultForm-email" class="form-control validate">
                                    <option selected disabled>gender</option>

                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                    <option value="others">Others</option>

                                </select>

                            </div>

                            <div class="md-form col-sm-4  mt-3">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Address</label>
                                <input name="address" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Address">

                            </div>

                            <div class="md-form col-sm-4  mt-3">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Image</label>
                                <input name="image" type="file" id="defaultForm-email" accept="image/*" class="form-control validate">

                            </div>
                            <div class="md-form col-sm-4  mt-3">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Occupation</label>

                                <select name="occupation" class="form-control">
                                    <option selected="" disabled="">Occupation

                                    </option>
                                    <option value="High school">High school</option>
                                    <option value="College">College</option>
                                    <option value="Working">Working</option>
                                    <option value="Self Employed">Self Employed</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div class="md-form col-sm-4  mt-3">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">How did </label>

                                <select name="know" class="form-control">

                                    <option selected="" disabled="">How did You known About naamya

                                    </option>
                                    <option value="school">School</option>
                                    <option value="college">College</option>
                                    <option value="Social Media">Social Media</option>
                                    <option value="Website">Website</option>
                                    <option value="News">News</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-2  mt-3">
                                <label for="exampleFormControlSelect1">priority</label>
                                <select name="priority" class="form-control" id="exampleFormControlSelect1">

                                    <option value='high'>High</option>
                                    <option value='medium'>medium</option>
                                    <option value='low'>low</option>

                                </select>
                            </div>

                            <div class="form-group col-sm-2  mt-3">
                                <label for="exampleFormControlSelect1">Status</label>
                                <select name="status" class="form-control" id="exampleFormControlSelect1">

                                    <option value='1'>Active</option>
                                    <option value='0'>Deactive</option>

                                </select>
                            </div>
                            <div class="md-form col-sm-4  mt-3">
                                <label data-error="wrong" data-success="right" for="defaultForm-email">Why Join</label>
                                <textarea name="description" id="defaultForm-email" class="form-control validate" placeholder="Enter Description">
                        </textarea>

                            </div>
                        </div>
                    </div>
                    <?php echo $msg; ?>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button name="add" class="btn btn-default">Add team_member</button>
                </div>
            </form>
        </div>
    </div>
</div>