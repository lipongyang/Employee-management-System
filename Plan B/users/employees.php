<?php
$page = 'employees';
include 'header.php';
?>

<?php include 'sidebar.php'; ?>
<!-- -------------coding here----------------- -->
<div class="head">
    <h1 style="margin:40px 0px 0 160px">Employees</h1>
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
                <td><img src="../images/employees/<?php echo $row['image']; ?>" alt="emp-image" width="60px"></td>
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
        </tr>
    <?php
                $cnt = $cnt + 1;
            }
    ?>
    </table>
</div>



<!-- ------------- End coding here----------------- -->

<?php include 'footer.php' ?>