<?php
include 'header.php';
?>
<!-- ------------------- backend code ------------------------ -->
<?php
if (isset($_POST['submit'])) {
    $taskname = $_POST['taskname'];
    $Assigned = $_POST['Assigned'];
    $stdate = $_POST['stdate'];
    $estday = $_POST['estday'];
    $expdate = $_POST['expdate'];
    $actualdate = $_POST['actualdate'];
    $progress = $_POST['progress'];
    $status = $_POST['status'];
    $featured = $_POST['featured'];


    $sql = mysqli_query($con, "insert into  tasklist(taskname,assignedto,stdate,estimateday,expectclosuredate,actualtildate,progress,status,featured) value('$taskname','$Assigned','$stdate','$estday','$stdate','$expdate','$progress','$status','$featured')");

    if ($sql) {
        echo "<script>alert('Task has been added.');</script>";
        echo "<script>window.location.href = 'addtask.php'</script>";
    } else {
        echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    }
}
?>
<?php include 'sidebar.php'; ?>
<!-- -------------coding here----------------- -->
<div class="head">
    <h1 style="margin:30px 0px 0 130px">Adding Task</h1>
</div>
<div class="addingtask">
    <form method="POST">
        <table>
            <tr>
                <td align="right">
                    <label for="taskname">Task Name</label>
                </td>
                <td align="left">
                    <input type="text" name="taskname" id="taskname" placeholder="Enter Task Name"><br>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="Assigned">Pick An Employee</label>
                </td>
                <td align="left">
                    <select name="Assigned" id="Assigned">
                        <?php
                        $emp_sql = mysqli_query($con, "Select FirstName from Employee");
                        while ($row = mysqli_fetch_array($emp_sql)) {
                        ?>
                            <option value="<?php echo $row['FirstName']; ?>"><?php echo $row['FirstName']; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="stdate">Start Date</label>
                </td>
                <td align="left">
                    <input type="date" name="stdate" id="stdate">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="Estimate">Estimate Days</label>
                </td>
                <td align="left">
                    <input type="number" name="estday" id="estday" placeholder="How many days">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="expdate">Expect Closure Date</label>
                </td>
                <td align="left">
                    <input type="date" name="expdate" id="expdate"><br>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="actualdate">Actual Till Date</label>
                </td>
                <td align="left">
                    <input type="date" name="actualdate" id="actualdate">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="progress">Progress</label>
                </td>
                <td align="left">
                    <input type="number" min="0" max="100" name="progress" id="progress">
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="status">status</label>
                </td>
                <td align="left">
                    <select name="status" id="status">
                        <option value="Not Start">Not Start</option>
                        <option value="In Progress">In Progress</option>
                        <option value="Completed">Completed</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right">
                    <label for="featured">Featured</label>
                </td>
                <td align="left">
                    <select name="featured" id="">
                        <option value="no">No</option>
                        <option value="yes">Yes</option>
                    </select>
                </td>
            </tr>
        </table>
        <button type="submit" name="submit" class="btn-addtask">Add Task</button>
    </form>
</div>

<!-- ------------- End coding here----------------- -->

<?php include 'footer.php' ?>