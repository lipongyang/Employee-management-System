<?php
$page = 'profile';
include 'header.php';
?>

<?php include 'sidebar.php'; ?>
<!-- -------------coding here----------------- -->
<?php
$username = $_SESSION['username'];
// Get the user's data from the database
$sql = "SELECT * FROM user where username = '$username'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Display the user's information
    $user_data = $result->fetch_assoc();
?>
    <div class="container_profile">
        <div class="avatar-flip">
            <img src="images/admins/<?php echo $user_data['image'] ?>" height="150" width="150">
            <img src="images/employees/Employee97.jpeg" height="150" width="150">
        </div>
        <h2><?php echo $user_data['username'] ?></h2>
        <h2><?php echo $_SESSION['role'] ?></h2>

        <h4>HOVER OVER CONTAINER</h4>
        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Maecenas sed diam eget risus varius blandit sit amet non magna ip sum dolore.</p>
        <p>Connec dolore ipsum faucibus mollis interdum. Donec ullamcorper nulla non metus auctor fringilla.</p>
    </div>
<?php
} else {
    echo "User data not found. Please log in.";
}



?>




<!-- ------------- End coding here----------------- -->

<?php include 'footer.php' ?>