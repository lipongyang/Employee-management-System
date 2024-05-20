<?php
$page = 'employees';
include 'header.php';
?>

<?php include 'sidebar.php'; ?>
<!-- -------------coding here----------------- -->
<div class="head">
    <h1 style="margin:40px 0px 0 160px">Employees</h1>
</div>
<div class="addtask">
    <a href="addemp.php"><button class="btn-add">Add Employee +</button></a>
</div>
<div class="table-list">
    <table border="1px" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Job</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Address</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>
        </thead>

        <tr>
            <?php
            // fetch data from database table employees
            $res_emp = mysqli_query($con, "select * from Employee");
            $cnt = 1;
            while ($row = mysqli_fetch_array($res_emp)) {
                $id = $row['EmpID'];
            ?>
                <td><?php echo $cnt; ?></td>
                <td><img src="images/employees/<?php echo $row['image']; ?>" alt="emp-image" width="60px"></td>
                <td><?php echo $row['FirstName']; ?></td>
                <td><?php echo $row['LastName']; ?></td>
                <td><?php echo $row['Job']; ?></td>
                <td><?php echo $row['Email']; ?></td>
                <td><?php echo $row['Mobile']; ?></td>
                <td><?php echo $row['Address']; ?></td>
                <td><?php echo $row['DOB']; ?></td>
                <td>
                    <?php echo $row['gender']; ?>
                </td>

                <td>
                    <button onclick="window.location.href='updateemp.php?id=<?php echo $id ?>'" class=" btn-update">Update</button>
                    <script language="javascript">
                        function confirmDelete() {
                            if (confirm("Are you sure you want to delete the selected Employee?")) {
                                // Redirect the user to the delete script
                                window.location = "delemp.php?id=<?php echo $id; ?>";
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