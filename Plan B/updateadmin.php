<?php
ini_set('display_errors', 1);
error_reporting(~0);
?>
<?php
include 'header.php';
?>
<!-- ------------------- backend code ------------------------ -->
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$get_all = mysqli_query($con, "Select * from user where id = $id");
$row = mysqli_fetch_assoc($get_all);
$current_image = $row['image'];
if (isset($_POST['submit'])) {
    $current_image = $_POST['current_image'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    // print_r($_FILES[]);
    if (isset($_FILES['image']['name'])) {
        //set the source and destination path upload the image
        $image_name = $_FILES['image']['name'];
        print_r($image_name);
        // check if the image is available
        if ($image_name != "") {
            //Image is available
            // get the extension of the image first (.pgn,jpg,jpeg...)
            $temp = explode('.', $image_name);
            $ext = end($temp);
            //rename the image
            $image_name = "Admins" . rand(000, 999) . '.' . $ext;
            // print_r($image_name);
            // die();
            $source_path = $_FILES['image']['tmp_name'];
            $dest_path = "images/admins/" . $image_name;

            //upload the image
            $upload = move_uploaded_file($source_path, $dest_path);

            //Check if the image is uploaded
            if ($upload == false) {
                echo "<script>alert('image not uploaded plz try again')</script>";
                echo "<script>window.location.href = 'updateadmin.php'</script>";
                die();
            }
            // remove current image
            if ($current_image != "") {
                $remove_path = "images/admins/" . $current_image;
                $remove = unlink($remove_path);
                if ($remove == false) {
                    echo "<script>alert('Failed to remove the image')</script>";
                    // echo "<script>window.location.href='employees.php'</script>";
                }
            }
        } else {
            //do not upload the image and set it to blank
            $image_name = $current_image;
        }
    } else {
        $image_name = $current_image;
    }

    $sql = mysqli_query($con, "update user set
        image='$image_name',
        username='$username',
        password='$password',
        role='$role'
        where id = $id");

    if ($sql) {
        echo "<script>alert('Admin has been Updated.');</script>";
        echo "<script>window.location.href = 'admin_info.php'</script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }
}
?>
<?php include 'sidebar.php'; ?>
<!-- -------------coding here----------------- -->
<div class="head">
    <h1 style="margin:30px 0px 0 130px">Updating Admin</h1>
</div>
<div class="addingtask">
    <form method="POST" enctype="multipart/form-data">
        <table>
            <?php
            $res_stock = mysqli_query($con, "select * from user where id = $id");
            $row = mysqli_fetch_array($res_stock);
            ?>
            <tr>
                <td>
                    <label for="current_image">Current Image:</label>
                </td>
                <td>
                <td><img src="images/admins/<?php echo $current_image; ?>" alt="" width="60px"></td>
                </td>
            </tr>
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
                    <input type="text" name="username" id="username" value="<?php echo $row['username'] ?>" placeholder="Enter username"><br>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="password">Password:</label>
                </td>
                <td align="left">
                    <input type="text" name="password" id="password" value="<?php echo $row['password'] ?>" placeholder="Enter Password">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="role">Role:</label>
                </td>
                <td align="left">
                    <select name="role" id="role">
                        <option value="<?php echo $row['role'] ?>"><?php echo $row['role'] ?></option>
                        <option value="pm">pm</option>
                        <option value="ma">ma</option>
                        <option value="am">am</option>
                    </select>
                </td>
            </tr>

        </table>
        <input type="hidden" name="current_image" id="current_image" value="<?php echo $current_image; ?>">
        <button type="submit" name="submit" class="btn-addtask">Update Admin</button>
    </form>
</div>


<!-- ------------- End coding here----------------- -->

<?php include 'footer.php' ?>