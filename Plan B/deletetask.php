<?php
include 'header.php';
?>

<?php
// Check if the 'id' parameter is present in the GET request
if (isset($_GET['id'])) {
    // Get the ID from the GET request
    $tasklist_id = $_GET['id'];
    $sql = mysqli_query($con, "Delete from tasklist where taskid = $tasklist_id");

    if ($sql) {
        echo "<script>alert('Task Deleted Successfully!');</script>";
        echo "<script>window.location.href = 'taskslist.php'</script>";
    } else {
        echo "<script>alert('Something went wrong.!');</script>";
        echo "<script>window.location.href = 'taskslist.php'</script>";
    }
} else {
    echo " Error: Missing 'id' parameter.";
}
?>
</body>

</html>