<?php
ini_set('display_errors', 1);
error_reporting(~0);
?>
<?php
include 'header.php';
?>
<!-- ------------------- backend code ------------------------ -->
<?php
if (isset($_POST['submit'])) {
    $image = $_POST['image'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    // print_r($_FILES[]);
    if (isset($_FILES['image']['name'])) {
        //set the source and destination path upload the image
        $image_name = $_FILES['image']['name'];
        //auto rename the image
        // get the extension of the image first (.pgn,jpg,jpeg...)
        $temp = explode('.', $image_name);
        $ext = end($temp);
        //rename the image
        $image_name = "Admin" . rand(000, 999) . '.' . $ext;
        // print_r($image_name);
        // die();
        $source_path = $_FILES['image']['tmp_name'];
        $dest_path = "images/admins/" . $image_name;

        //upload the image
        $upload = move_uploaded_file($source_path, $dest_path);

        //Check if the image is uploaded
        if ($upload == false) {
            echo "<script>alert('image not uploaded plz try again')</script>";
            // echo "<script>window.location.href = 'adadmin.php'</script>";
            die();
        }
    } else {
        //do not upload the image and set it to blank
        $image_name = "";
    }

    $sql = mysqli_query($con, "insert into user set
        image = '$image_name',
        username='$username', 
        password='$password',
        role='$role'
    ");

    if ($sql) {
        echo "<script>alert('Admin has been added.');</script>";
        echo "<script>window.location.href = 'adadmin.php'</script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }
}
?>
<?php include 'sidebar.php'; ?>
<!-- -------------coding here----------------- -->
<div class="head">
    <h1 style="margin:30px 0px 0 130px">Adding Admin</h1>
</div>
<div class="addingtask">
    <form method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>
                    <label for="image">Uploade Image : </label>
                </td>
                <td>
                    <input type="file" name="image" id="image">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="username">Username:</label>
                </td>
                <td align="left">
                    <input type="text" name="username" id="username" placeholder="Enter First Name"><br>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="password">Password:</label>
                </td>
                <td align="left">
                    <input type="text" name="password" id="password" placeholder="Enter last name">
                </td>
            </tr>

            <td align="right">
                <label for="role">Role:</label>
            </td>
            <td align="left">
                <select name="role" id="role">
                    <option value="pm">Project Management</option>
                    <option value="ma">Manager assistant</option>
                    <option value="am">Admin</option>
                </select>
            </td>
            </tr>
        </table>
        <button type="submit" name="submit" class="btn-addtask">Add Admin</button>
    </form>
</div>


<!-- ------------- End coding here----------------- -->

<?php include 'footer.php' ?>