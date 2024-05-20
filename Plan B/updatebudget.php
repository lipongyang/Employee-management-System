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
if (isset($_POST['submit'])) {
    $allocate_buget = $_POST['budget'];
    $used_budget = $_POST['usedbudget'];
    // print_r($_FILES[]);


    $sql = mysqli_query($con, "update budget set
        allocate_budget = $allocate_buget,
        used_budget = $used_budget
        where id = $id
    ");

    if ($sql) {
        echo "<script>alert('Budget has been Updated.');</script>";
        echo "<script>window.location.href = 'budget.php'</script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }
}
?>
<?php include 'sidebar.php'; ?>
<!-- -------------coding here----------------- -->
<div class="head">
    <h1 style="margin:30px 0px 0 130px">Updating Budget</h1>
</div>
<div class="addingtask">
    <form method="POST" enctype="multipart/form-data">
        <table>
            <?php
            $get_budget = mysqli_query($con, "select * from budget where id = $id");
            $row = mysqli_fetch_array($get_budget);
            ?>
            <tr>
                <td align="right">
                    <label for="budget">Budget:</label>
                </td>
                <td align="left">
                    <input type="number" name="budget" id="budget" value="<?php echo $row['allocate_budget']; ?>" placeholder="Update Capital"><br>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="usedbudget">Used Budget:</label>
                </td>
                <td align="left">
                    <input type="number" name="usedbudget" id="usedbudget" value="<?php echo $row['used_budget']; ?>" placeholder="Update Expencese"><br>
                </td>
            </tr>
        </table>
        <button type="submit" name="submit" class="btn-addtask">Update Budget</button>
    </form>
</div>


<!-- ------------- End coding here----------------- -->

<?php include 'footer.php' ?>