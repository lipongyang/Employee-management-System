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
    $taskname = $_POST['taskname'];
    $Assigned = $_POST['Assigned'];
    $stdate = $_POST['stdate'];
    $estday = $_POST['estday'];
    $expdate = $_POST['expdate'];
    $actualdate = $_POST['actualdate'];
    $progress = $_POST['progress'];
    $status = $_POST['status'];
    $featured = $_POST['featured'];

    if (isset($_GET['id'])) {
        $taskid = $_GET['id'];
        $sql = mysqli_query($con, "Update  tasklist set
        taskname = '$taskname',
        assignedto = '$Assigned',
        stdate = '$stdate',
        estimateday = '$estday',
        expectclosuredate= '$expdate',
        actualtildate = '$actualdate',
        progress = '$progress',
        status = '$status',
        featured = '$featured'
         where taskid = $taskid");

        if ($sql) {
            echo "<script>alert('Task has been Updated!.');</script>";
            echo "<script>window.location.href = 'taskslist.php'</script>";
        } else {
            echo "<script>alert('Something Went Wrong. Please try again.');</script>";
        }
    }
}
?>
<?php include 'sidebar.php'; ?>
<!-- -------------coding here----------------- -->
<div class="head">
    <h1 style="margin:30px 0px 0 130px">Updating Task</h1>
</div>
<div class="addingtask">
    <form method="POST">
        <table>
            <?php
            if (isset($_GET['id'])) {
                $taskid = $_GET['id'];
                $sql_fetch = mysqli_query($con, "Select * from tasklist where taskid = $taskid");
                while ($task_row = mysqli_fetch_array($sql_fetch)) {
                    $assignedto = $task_row['assignedto'];
            ?>
                    <tr>
                        <td align="right">
                            <label for="taskname">Task Name</label>
                        </td>
                        <td align="left">
                            <input type="text" name="taskname" id="taskname" placeholder="Enter Task Name" value="<?php echo $task_row['taskname']; ?>"><br>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="Assigned">Pick An Employee</label>
                        </td>
                        <td align="left">
                            <select name="Assigned" id="Assigned">
                                <option value="<?php echo $assignedto ?>" selected><?php echo $assignedto ?></option>
                                <?php
                                $emp_sql = mysqli_query($con, "Select * from Employee where FirstName !='$assignedto' ");
                                while ($emp_row = mysqli_fetch_array($emp_sql)) {
                                ?>
                                    <option value="<?php echo $emp_row['FirstName']; ?>"><?php echo $emp_row['FirstName']; ?></option>

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
                            <input type="date" name="stdate" id="stdate" value="<?php echo $task_row['stdate']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="Estimate">Estimate Days</label>
                        </td>
                        <td align="left">
                            <input type="number" name="estday" id="estday" placeholder="How many days" value="<?php echo $task_row['estimateday']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td align=" right">
                            <label for="expdate">Expect Closure Date</label>
                        </td>
                        <td align="left">
                            <input type="date" name="expdate" id="expdate" value="<?php echo $task_row['expectclosuredate']; ?>"><br>
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="actualdate">Actual Till Date</label>
                        </td>
                        <td align="left">
                            <input type="date" name="actualdate" id="actualdate" value="<?php echo $task_row['actualtildate']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="progress">Progress</label>
                        </td>
                        <td align="left">
                            <input type="number" min="0" max="100" name="progress" id="progress" value="<?php echo $task_row['progress']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="status">status</label>
                        </td>
                        <td align="left">
                            <select name="status" id="status">
                                <option value="<?php echo $task_row['status']; ?> selected"><?php echo $task_row['status']; ?></option>
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
                                <option value="<?php echo $task_row['featured'] ?>" selected><?php echo $task_row['featured'] ?></option>
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
            </tr>
        </table>
        <button type="submit" name="submit" class="btn-addtask">Add Task</button>
    </form>
</div>

<!-- ------------- End coding here----------------- -->

<?php include 'footer.php' ?>