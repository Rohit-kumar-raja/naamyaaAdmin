<?php

if(isset($_GET['delete'])){
    include '../../connection.inc.php';
$id=$_GET['delete'];
$delete="delete from team_member where id=$id";
$result=mysqli_query($connection,$delete);
if($result){
    header('location:user.php');
}
else{
    echo "data not deleted here";
}
}
?>