<?php
$page = 'stock_mgm';
include 'header.php';
?>

<?php include 'sidebar.php'; ?>
<!-- -------------coding here----------------- -->
<div class="head">
    <h1 style="margin:40px 0px 0 160px">Stocks</h1>
</div>
<div class="addtask">
    <a href="addstocks.php"><button class="btn-add">Add Product +</button></a>
</div>
<div class="table-list">
    <table border="1px" cellspacing="0">
        <thead>
            <tr>
                <th style="padding-left:20px;padding-right:20px">No</th>
                <th style="padding-left:40px;padding-right:40px">Image</th>
                <th style="padding-left:62px;padding-right:62px">Product Name</th>
                <th style="padding-left:62px;padding-right:62px">Usage</th>
                <th style="padding-left:40px;padding-right:40px">InStock</th>
                <th style="padding-left:40px;padding-right:40px">Used</th>
            </tr>
        </thead>

        <tr>
            <?php
            // fetch data from database table employees
            $res_emp = mysqli_query($con, "select * from stocks");
            $cnt = 1;
            while ($row = mysqli_fetch_array($res_emp)) {
                $id = $row['st_id'];
            ?>
                <td><?php echo $cnt; ?></td>
                <td><img src="../images/products/<?php echo $row['image']; ?>" alt="emp-image" width="120px"></td>
                <td><?php echo $row['pd_name']; ?></td>
                <td style="max-width: 400px;text-align:justify"><?php echo $row['pd_usage'] ?></td>
                <td><?php echo $row['instock']; ?></td>
                <td><?php echo $row['used']; ?></td>

        </tr>
    <?php
                $cnt = $cnt + 1;
            }
    ?>
    </table>
</div>
<!-- ------------- End coding here----------------- -->

<?php include 'footer.php' ?>