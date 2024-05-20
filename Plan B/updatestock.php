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
    $st_id = $_GET['id'];
}
$get_all = mysqli_query($con, "Select * from stocks where st_id = $st_id");
$row = mysqli_fetch_assoc($get_all);
$current_image = $row['image'];
if (isset($_POST['submit'])) {
    $current_image = $_POST['current_image'];
    $p_name = $_POST['p_name'];
    $p_description = $_POST['usage'];
    $p_instock = $_POST['instock'];
    $p_used = $_POST['used'];

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
            $image_name = "Product" . rand(000, 999) . '.' . $ext;
            // print_r($image_name);
            // die();
            $source_path = $_FILES['image']['tmp_name'];
            $dest_path = "images/products/" . $image_name;

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
                $remove_path = "images/products/" . $current_image;
                $remove = unlink($remove_path);
                if ($remove == false) {
                    echo "<script>alert('Failed to remove the image')</script>";
                    // echo "<script>window.location.href='employees.php'</script>";
                }
            }
        } else {
            //do not upload the image and set it to blank
            $image_name = "";
        }
    } else {
        $image_name = $current_image;
    }

    $sql = mysqli_query($con, "update stocks set
        image='$image_name',
        pd_name='$p_name',
        pd_usage='$p_description',
        instock='$p_instock',
        used='$p_used' where st_id = $st_id");

    if ($sql) {
        echo "<script>alert('Product has been Updated.');</script>";
        echo "<script>window.location.href = 'stock_mgm.php'</script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }
}
?>
<?php include 'sidebar.php'; ?>
<!-- -------------coding here----------------- -->
<div class="head">
    <h1 style="margin:30px 0px 0 130px">Updating Product</h1>
</div>
<div class="addingtask">
    <form method="POST" enctype="multipart/form-data">
        <table>
            <?php
            $res_stock = mysqli_query($con, "select * from stocks where st_id = $st_id");
            $row = mysqli_fetch_array($res_stock);
            ?>
            <tr>
                <td>
                    <label for="cuurent_image"></label>
                </td>
                <td>
                <td><img src="images/products/<?php echo $current_image; ?>" alt="" width="60px"></td>
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
                    <label for="p_name">Product Name</label>
                </td>
                <td align="left">
                    <input type="text" name="p_name" id="p_iname" value="<?php echo $row['pd_name'] ?>" placeholder="Enter Product Name"><br>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="usage">Product Usage</label>
                </td>
                <td align="left">
                    <input type="text" name="usage" id="usage" value="<?php echo $row['pd_usage'] ?>" placeholder="Enter Product Description">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="instock">instock</label>
                </td>
                <td align="left">
                    <input type="number" name="instock" id="instock" value="<?php echo $row['instock'] ?>" placeholder="How many in stocks">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="used">used</label>
                </td>
                <td align="left">
                    <input type="number" name="used" id="used" value="<?php echo $row['used'] ?>" placeholder="Enter a valid used">
                </td>
            </tr>

        </table>
        <input type="hidden" name="current_image" id="current_image" value="<?php echo $current_image; ?>">
        <button type="submit" name="submit" class="btn-addtask">Update Product</button>
    </form>
</div>


<!-- ------------- End coding here----------------- -->

<?php include 'footer.php' ?>