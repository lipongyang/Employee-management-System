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
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $job = $_POST['job'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];
    $DOB = $_POST['dob'];
    $gender = $_POST['gender'];

    // print_r($_FILES[]);
    if (isset($_FILES['image']['name'])) {
        //set the source and destination path upload the image
        $image_name = $_FILES['image']['name'];
        //auto rename the image
        // get the extension of the image first (.pgn,jpg,jpeg...)
        $ext = end(explode('.', $image_name));

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
            echo "<script>window.location.href = 'addemp.php'</script>";
            die();
        }
    } else {
        //do not upload the image and set it to blank
        $image_name = "";
    }

    $sql = mysqli_query($con, "insert into  Employee(image,FirstName,LastName,Job,Email,Mobile,Address,DOB,gender) value('$image_name','$firstname','$lastname','$job','$email','$mobile','$address','$DOB','$gender')");

    if ($sql) {
        echo "<script>alert('Employee has been added.');</script>";
        echo "<script>window.location.href = 'addemp.php'</script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }
}
?>
<?php include 'sidebar.php'; ?>
<!-- -------------coding here----------------- -->
<div class="head">
    <h1 style="margin:30px 0px 0 130px">Adding Employees</h1>
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
                    <label for="firstname">First Name</label>
                </td>
                <td align="left">
                    <input type="text" name="firstname" id="firstname" placeholder="Enter First Name"><br>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="lastname">Last Name</label>
                </td>
                <td align="left">
                    <input type="text" name="lastname" id="lastname" placeholder="Enter last name">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="job">Job</label>
                </td>
                <td align="left">
                    <input type="text" name="job" id="job" placeholder="Enter job">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="Email">Email</label>
                </td>
                <td align="left">
                    <input type="email" name="email" id="email" placeholder="Enter a valid email">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="mobile">Mobile</label>
                </td>
                <td align="left">
                    <input type="tel" name="mobile" id="mobile"><br>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="address">Address</label>
                </td>
                <td align="left">
                    <input type="text" name="address" id="address" placeholder="Enter Address">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="DOB">DOB</label>
                </td>
                <td align="left">
                    <input type="date" name="dob" id="dob">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="gender">Gender</label>
                </td>
                <td align="left">
                    <select name="gender" id="gender">
                        <option value="MALE">MALE</option>
                        <option value="FEMALE">FEMALE</option>
                        <option value="OTHER">OTHERS</option>
                    </select>
                </td>
            </tr>
        </table>
        <button type="submit" name="submit" class="btn-addtask">Add Employee</button>
    </form>
</div>


<!-- ------------- End coding here----------------- -->

<?php include 'footer.php' ?>