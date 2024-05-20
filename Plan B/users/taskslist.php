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

            <div class="table-list">
                <table border="1px" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Task Name</th>
                            <th style="padding-left:40px;padding-right:40px">Assigned To</th>
                            <th>Start Date</th>
                            <th>Estimate Days</th>
                            <th>Expect Closure Date</th>
                            <th>Actual Till Date</th>
                            <th>Progress</th>
                            <th style="padding-left:40px;padding-right:40px">Status</th>
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