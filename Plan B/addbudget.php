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
    $allocate_buget = $_POST['budget'];

    // print_r($_FILES[]);


    $sql = mysqli_query($con, "insert into budget set
        allocate_budget = '$allocate_buget'
    ");

    if ($sql) {
        echo "<script>alert('Budget has been added.');</script>";
        echo "<script>window.location.href = 'budget.php'</script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }
}
?>
<?php include 'sidebar.php'; ?>
<!-- -------------coding here----------------- -->
<div class="head">
    <h1 style="margin:30px 0px 0 130px">Adding Budget</h1>
</div>
<div class="addingtask">
    <form method="POST" enctype="multipart/form-data">
        <table>

            <tr>
                <td align="right">
                    <label for="budget">Budget:</label>
                </td>
                <td align="left">
                    <input type="number" name="budget" id="budget" placeholder="Enter Your Budget"><br>
                </td>
            </tr>
        </table>
        <button type="submit" name="submit" class="btn-addtask">Add Budget</button>
    </form>
</div>


<!-- ------------- End coding here----------------- -->

<?php include 'footer.php' ?>