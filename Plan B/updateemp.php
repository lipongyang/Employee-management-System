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
    $empid = $_GET['id'];
}
$get_all = mysqli_query($con, "Select * from employee where empid = $empid");
$row = mysqli_fetch_assoc($get_all);
$current_image = $row['image'];
if (isset($_POST['submit'])) {

    $current_image = $_POST['current_image'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $job = $_POST['job'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $DOB = $_POST['dob'];
    $gender = $_POST['gender'];
    print_r($current_image);
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
            $image_name = "Employee" . rand(000, 999) . '.' . $ext;
            // print_r($image_name);
            // die();
            $source_path = $_FILES['image']['tmp_name'];
            $dest_path = "images/employees/" . $image_name;

            //upload the image
            $upload = move_uploaded_file($source_path, $dest_path);

            //Check if the image is uploaded
            if ($upload == false) {
                echo "<script>alert('image not uploaded plz try again')</script>";
                echo "<script>window.location.href = 'employees.php'</script>";
                die();
            }
            // remove current image
            if ($current_image != "") {
                $remove_path = "images/employees/" . $current_image;
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
    }

    $sql = mysqli_query($con, "Update  Employee set
            image = '$image_name',    
            FirstName='$firstname',
            LastName='$lastname' ,
            Job='$job' ,
            Email='$email' ,
            Mobile='$mobile' ,
            Address= '$address',
            DOB='$DOB',
            Gender='$gender'
             Where EmpID=$empid");

    if ($sql) {
        echo "<script>alert('Employee has been updated.');</script>";
        echo "<script>window.location.href = 'employees.php'</script>";
        print_r($current_image);
    } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }
}
?>
<?php include 'sidebar.php'; ?>
<!-- -------------coding here----------------- -->
<div class="head">
    <h1 style="margin:30px 0px 0 130px">Updating Employees</h1>
</div>
<div class="addingtask">
    <form method="POST" enctype="multipart/form-data">
        <table>
            <?php
            $sql_get = mysqli_query($con, "Select * From Employee where EmpID = $empid");
            while ($row = mysqli_fetch_array($sql_get)) {
            ?>
                <tr>
                    <td>Curent Image</td>
                    <td><img src="images/employees/<?php echo $current_image; ?>" alt="" width="60px"></td>
                </tr>
                <tr>
                    <td>
                        <label for="image">New Image : </label>
                    </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="firstname">First Name</label>
                    </td>
                    <td align="left">
                        <input type="text" name="firstname" id="firstname" placeholder="Enter First Name" value="<?php echo $row['FirstName']; ?>"><br>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="lastname">Last Name</label>
                    </td>
                    <td align="left">
                        <input type="text" name="lastname" id="lastname" placeholder="Enter last name" value="<?php echo $row['LastName']; ?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="job">Job</label>
                    </td>
                    <td align="left">
                        <input type="text" name="job" id="job" placeholder="Enter job" value="<?php echo $row['Job']; ?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="Email">Email</label>
                    </td>
                    <td align="left">
                        <input type="email" name="email" id="email" placeholder="Enter a valid email" value="<?php echo $row['Email']; ?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="mobile">Mobile</label>
                    </td>
                    <td align="left">
                        <input type="tel" name="mobile" id="mobile" value="<?php echo $row['Mobile']; ?>"><br>
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="address">Address</label>
                    </td>
                    <td align="left">
                        <input type="text" name="address" id="address" placeholder="Enter Address" value="<?php echo $row['Address']; ?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="DOB">DOB</label>
                    </td>
                    <td align="left">
                        <input type="date" name="dob" id="dob" value="<?php echo $row['DOB']; ?>">
                    </td>
                </tr>
                <tr>
                    <td align="right">
                        <label for="gender">Gender</label>
                    </td>
                    <td align="left">
                        <select name="gender" id="gender">
                            <option value="<?php echo $row['gender'] ?>"><?php echo $row['gender'] ?></option>
                            <option value="MALE">MALE</option>
                            <option value="FEMALE">FEMALE</option>
                            <option value="OTHER">OTHERS</option>
                        </select>
                    </td>

                </tr>
            <?php
            }
            ?>
        </table>
        <input type="hidden" name="current_image" id="current_image" value="<?php echo $current_image; ?>">
        <button type="submit" name="submit" class="btn-addtask">Update </button>
    </form>
</div>


<!-- ------------- End coding here----------------- -->

<?php include 'footer.php' ?>