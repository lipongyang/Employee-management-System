<?php
$page = 'taskslist';
include 'header.php';
?>

<?php include 'sidebar.php'; ?>
<!-- -------------coding here----------------- -->
<div class="mainbackground">
    <div class="maincontainer" id="maincontainer">
        <div class="contianer">
            <div class="head">
                <h1>Task Lists</h1>
            </div>
            <div class="addtask">
                <a href="addtask.php"><button class="btn-add">Add Task List +</button></a>
            </div>
            <div class="table-list">
                <table border="1px" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Task Name</th>
                            <th>Assigned To</th>
                            <th>Start Date</th>
                            <th>Estimate Days</th>
                            <th>Expect Closure Date</th>
                            <th>Actual Till Date</th>
                            <th>Progress</th>
                            <th>Status</th>
                            <th style="min-width:150px">Action</th>
                        </tr>
                    </thead>
                    <?php
                    $ret = mysqli_query($con, "select *from  tasklist");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($ret)) {
                        $id = $row['taskid'];
                    ?>
                        <tr>
                            <td><?php echo $cnt; ?></td>
                            <td><?php echo $row['taskname']; ?></td>
                            <td><?php echo $row['assignedto']; ?></td>
                            <td><?php echo $row['stdate']; ?></td>
                            <td><?php echo $row['estimateday']; ?></td>
                            <td><?php echo $row['expectclosuredate']; ?></td>
                            <td><?php echo $row['actualtildate']; ?></td>
                            <td><?php echo $row['progress']; ?>%</td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <button onclick="window.location.href='updatetask.php?id=<?php echo $id ?>'" class="btn-update">Update</button>
                                <script language="javascript">
                                    function confirmDelete() {
                                        if (confirm("Are you sure you want to delete the selected task?")) {
                                            // Redirect the user to the delete script
                                            window.location = "deletetask.php?id=<?php echo $id; ?>";
                                        }
                                    }
                                </script>
                                <a href="javascript:confirmDelete()" class="btn-delete">Delete</a>
                            </td>
                        </tr>
                    <?php
                        $cnt = $cnt + 1;
                    } ?>
                </table>
            </div>
        </div>
    </div>
</div>
</div>



<!-- ------------- End coding here----------------- -->
<?php include 'footer.php' ?>