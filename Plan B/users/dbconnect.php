<?php
$con = mysqli_connect("localhost", "root", "root", "cassava_project");
if (mysqli_connect_errno()) {
    echo "Connection Fail" . mysqli_connect_error();
}
