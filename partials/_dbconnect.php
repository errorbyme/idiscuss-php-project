<?php
$con = mysqli_connect("localhost", "root", "", "idiscussdb");
if (!$con) {
    die("not connected" . mysqli_connect_error($con));
}
?>