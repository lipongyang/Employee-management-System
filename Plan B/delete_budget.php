<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete = mysqli_query($con, "Delete from budget where id = $id");
    if ($delete) {
        echo "<script>alert('done')</script>";
        echo "window.location.href='budget.php'";
    } else {
        echo "<script>alert('Somethind went wrong.!')</script>";
    }
}
