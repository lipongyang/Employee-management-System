<?php
include 'header.php';
?>

<?php
// Check if the 'id' parameter is present in the GET request
if (isset($_GET['id'])) {
    // Get the ID from the GET request
    $id = $_GET['id'];
    $sql = mysqli_query($con, "Delete from user where id = $id");
    if ($sql) {
        echo "<script>alert('Admin Deleted Successfully!');</script>";
        echo "<script>window.location.href = 'admin_info.php'</script>";
    } else {
        echo "<script>alert('Something went wrong.!');</script>";
        echo "<script>window.location.href = 'admin_info.ph'</script>";
    }
} else {
    echo " Error: Missing 'id' parameter.";
}
?>
</body>

</html>