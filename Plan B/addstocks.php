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
    $p_name = $_POST['p_name'];
    $p_description = $_POST['usage'];
    $p_instock = $_POST['instock'];
    $p_used = $_POST['used'];

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
        $dest_path = "images/products/" . $image_name;

        //upload the image
        $upload = move_uploaded_file($source_path, $dest_path);

        //Check if the image is uploaded
        if ($upload == false) {
            echo "<script>alert('image not uploaded plz try again')</script>";
            // echo "<script>window.location.href = 'addstocks.php'</script>";
            die();
        }
    } else {
        //do not upload the image and set it to blank
        $image_name = "";
    }

    $sql = mysqli_query($con, "insert into  stocks(image,pd_name,pd_usage,instock,used) value('$image_name','$p_name','$p_description','$p_instock','$p_used')");

    if ($sql) {
        echo "<script>alert('Product has been added.');</script>";
        echo "<script>window.location.href = 'addstocks.php'</script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }
}
?>
<?php include 'sidebar.php'; ?>
<!-- -------------coding here----------------- -->
<div class="head">
    <h1 style="margin:30px 0px 0 130px">Adding Product</h1>
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
                    <label for="p_name">Product Name</label>
                </td>
                <td align="left">
                    <input type="text" name="p_name" id="p_iname" placeholder="Enter Product Name"><br>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="usage">Product Usage</label>
                </td>
                <td align="left">
                    <input type="text" name="usage" id="usage" placeholder="Enter Product Description">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="instock">instock</label>
                </td>
                <td align="left">
                    <input type="number" name="instock" id="instock" placeholder="How many in stocks">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="used">used</label>
                </td>
                <td align="left">
                    <input type="number" name="used" id="used" placeholder="Enter a valid used">
                </td>
            </tr>

        </table>
        <button type="submit" name="submit" class="btn-addtask">Add Product</button>
    </form>
</div>


<!-- ------------- End coding here----------------- -->

<?php include 'footer.php' ?>