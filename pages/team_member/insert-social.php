<?php
$msg = "";

include '../../AdminLogin/function.inc.php';


if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $link = $_POST['link'];
    $id=$_GET['read'];



        $insert = "INSERT INTO `social_media`( `name`, `link`, `reid`, `table_name`) VALUES ('$name','$link','$id','team_member')";
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
                window.location.replace('read-mail.php?read=$id');

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



// } else {
//     $msg = "Enter status in 1 (Active) & 0 (DeActtive)";
// }

//Api to retriving data


?>

<div class="modal fade" id="insert_social" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Social Media</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Social Media</label>
                        <select name="name" class="form-control" id="exampleFormControlSelect1">

                            <option value='facebook'> Facebook</option>
                            <option value='twitter'>Twitter</option>
                            <option value='linkedIn'>LinkedIn</option>
                            <option value='youtube'>YouTube</option>
                            <option value='pinterest'>Pinterest</option>
                            <option value='instagram'>Instagram</option>
                            <option value='reddit'>Reddit</option>
                            <option value='snapchat'>Snapchat</option>
                            <option value='quora'>Quora</option>
                            <option value='github'>Github</option>


                        </select>
                    </div>
                    <div class="md-form mb-5">
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Link</label>
                        <input name="link" type="text" id="defaultForm-email" class="form-control validate" placeholder="Enter Caregorie Name">

                    </div>




                    <?php echo $msg; ?>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button name="add" class="btn btn-default">Add </button>
                </div>
            </form>
        </div>
    </div>
</div>