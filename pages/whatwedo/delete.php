<?php

if (isset($_GET['delete'])) {
    include '../../connection.inc.php';
    $id = $_GET['delete'];
    $delete = "delete from whatwedo where id=$id";
    $result = mysqli_query($connection, $delete);
    if ($result) {
        header('location:achievement.php');
    } else {
        echo "data not deleted here";
    }
}
