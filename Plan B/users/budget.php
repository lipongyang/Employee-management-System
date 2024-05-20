<?php
$page = 'budget';
include 'header.php';
?>

<?php include 'sidebar.php'; ?>
<!-- -------------coding here----------------- -->
<div class="head">
    <h1 style="margin:40px 0px 0 160px">Budget</h1>
</div>
<div class="addtask">
    <a href="addstocks.php"><button class="btn-add">Add Product +</button></a>
</div>
<div class="table-list">
    <table border="1px" cellspacing="0">
        <thead>
            <tr>
                <th style="padding-left:20px;padding-right:20px">No</th>
                <th style="padding-left:20px;padding-right:20px">Allocated Budget</th>
                <th style="padding-left:62px;padding-right:62px">Used Budget</th>
                <th style="padding-left:65px;padding-right:65px">Action</th>
            </tr>
        </thead>

        <tr>
            <?php
            // fetch data from database table employees
            $res_emp = mysqli_query($con, "select * from budget");
            $cnt = 1;
            while ($row = mysqli_fetch_array($res_emp)) {
                $id = $row['id'];
            ?>
                <td><?php echo $cnt; ?></td>
                <td><?php echo $row['allocate_budget']; ?> $</td>
                <td style="max-width: 400px;"><?php echo $row['used_budget'] ?> $</td>
                <td>

                    <button onclick="window.location.href='updatebudget.php?id=<?php echo $id ?>'" class=" btn-update">Update</button>
                    <script language="javascript">
                        function confirmDelete() {
                            if (confirm("Are you sure you want to delete the selected Budget?")) {
                                // Redirect the user to the delete script
                                // window.location = "delete_budget.php?id=<?php echo $id; ?>";
                                <?php
                                $delete = mysqli_query($con, "Delete from budget where id = $id");
                                ?>
                            }
                        }
                    </script>
                    <a href="javascript:confirmDelete()" class="btn-delete">Delete</a>
                </td>
        </tr>
    <?php
                $cnt = $cnt + 1;
            }
    ?>
    </table>
</div>
<!-- ------------- End coding here----------------- -->

<?php include 'footer.php' ?>