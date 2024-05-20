<?php
$page = 'admin_page';
include 'header.php';
?>

<?php include 'sidebar.php'; ?>
<!-- -------------coding here----------------- -->
<div class="head">
    <h1 style="margin:40px 0px 0 160px">Admins</h1>
</div>
<div class="addtask">
    <a href="adadmin.php"><button class="btn-add">Add Admin +</button></a>
</div>
<div class="table-list">
    <table border="1px" cellspacing="0">
        <thead>
            <tr>
                <th style="padding-left:40px;padding-right:40px">No</th>
                <th style="padding-left:40px;padding-right:40px">Image</th>
                <th style="padding-left:40px;padding-right:40px">Username</th>
                <th style="padding-left:40px;padding-right:40px">Password</th>
                <th style="padding-left:40px;padding-right:40px">Role</th>
                <th style="padding-left:40px;padding-right:40px">Action</th>
            </tr>
        </thead>

        <tr>
            <?php
            // fetch data from database table employees
            $res_emp = mysqli_query($con, "select * from user");
            $cnt = 1;
            while ($row = mysqli_fetch_array($res_emp)) {
                $id = $row['id'];
            ?>
                <td><?php echo $cnt; ?></td>
                <td><img src="images/admins/<?php echo $row['image']; ?>" alt="emp-image" width="60px"></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['role']; ?></td>
                <td>
                    <button onclick="window.location.href='updateadmin.php?id=<?php echo $id ?>'" class=" btn-update">Update</button>
                    <script language="javascript">
                        function confirmDelete() {
                            if (confirm("Are you sure you want to delete the selected Admin?")) {
                                // Redirect the user to the delete script
                                window.location = "deleteadmin.php?id=<?php echo $id; ?>";
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