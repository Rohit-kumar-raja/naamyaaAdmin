
<?php
session_start();
$name = $_FILES['file']['name'];
$tmp_name = $_FILES['file']['tmp_name'];
$position = strpos($name, ".");
$fileextension = substr($name, $position + 1);
$fileextension = strtolower($fileextension);
if (isset($name)) {
    $path = '../upload/';
    if (empty($name)) {
        echo "Please choose a file";
    } else if (!empty($name)) {
        if (($fileextension !== "mp4") && ($fileextension !== "ogg") && ($fileextension !== "webm")) {
            echo "The file extension must be .mp4, .ogg, or .webm in order to be uploaded";
        } else if (($fileextension == "mp4") || ($fileextension == "ogg") || ($fileextension == "webm")) {
            if (move_uploaded_file($tmp_name, $path . $name)) {
                if ($_SERVER['HTTP_HOST'] = 'localhost') {
                    echo  "http://localhost/naamyaafoundation/pages/upload/" . $name;
                } else {
                    echo  "https://naamyaafoundation.org/Admin/pages/upload/" . $name;
                }
            }
        }
    }
}
?>

