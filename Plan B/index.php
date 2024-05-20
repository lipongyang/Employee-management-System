<?php
$page = 'dashboard';
include 'header.php';
?>
<?php include 'sidebar.php'; ?>
<div class="contianer">
    <div class="head">
        <h1><b>Dashboard</b></h1>
    </div>
    <div class=" boxcontian">
        <div class="box1">
            <?php
            $sql_emp = mysqli_query($con, "Select * from Employee");
            $count_emp = mysqli_num_rows($sql_emp);
            ?>
            <h3>Total Employees</h3>
            <h3 style="color: rgb(255, 0, 81);"><?php echo $count_emp ?></h3>
        </div>
        <div class="box2">
            <?php
            $sql_task = mysqli_query($con, "Select * from tasklist");
            $count_task = mysqli_num_rows($sql_task);
            ?>
            <h3>Total Task</h3>
            <h3 style="color: rgb(140, 226, 140);"><?php echo $count_task; ?></h3>
        </div>
        <div class="box4">
            <?php
            $sql_taskdone = mysqli_query($con, "Select * from tasklist where status = 'Completed'");
            $count_taskdone = mysqli_num_rows($sql_taskdone);
            ?>
            <h3>Tasks Done</h3>
            <h3 style="color: rgb(99, 97, 90);"><?php echo $count_taskdone; ?></h3>
        </div>
        <div class="box3">
            <h3>Total Budget</h3>
            <?php
            $sql_budget = mysqli_query($con, "Select * from budget");
            $row_budget = mysqli_fetch_array($sql_budget);
            $budget = $row_budget['allocate_budget'];
            $formated_buget = number_format($budget);
            ?>
            <h3 style="color: rgb(106, 117, 241);">$ <?php echo  $formated_buget ?></h3>
        </div>
    </div>
    <div class="dashes">
        <div class="employeedash">
            <ul class="employee-list">
                <?php
                $get_emp = mysqli_query($con, "Select *from Employee limit 3");
                $count = mysqli_num_rows(($get_emp));
                while ($row = mysqli_fetch_assoc($get_emp)) {;
                ?>
                    <li class="employee-item">
                        <img class="employee-image" src="images/employees/<?php echo $row['image']; ?>" alt="Employee Image" width="60px">
                        <div class="employee">
                            <h3 class="employee-name">Name: <?php echo $row['FirstName']; ?></h3>
                            <php? class="employee-job">Job: <?php echo $row['Job'] ?></p>
                        </div>
                    </li>
                <?php
                } ?>
            </ul>
        </div>
        <div class="taskdash">
            <table class="task-table">
                <thead>

                    <tr>
                        <th>No</th>
                        <th>Task Name</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                    $get_task = mysqli_query($con, "Select * from tasklist where featured = 'yes' limit 5");
                    $SLN = 1;
                    while ($row = mysqli_fetch_assoc($get_task)) {
                    ?>
                        <tr>
                            <td><?php echo $SLN ?></td>
                            <td><?php echo $row['taskname']; ?></td>
                        </tr>
                    <?php
                        $SLN++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php
        $get_budget = mysqli_query($con, "select allocate_budget from budget");
        $get_usedbudget = mysqli_query($con, "select used_budget from budget");
        $row1 = mysqli_fetch_array($get_budget);
        $row2 = mysqli_fetch_array($get_usedbudget);
        $capital = $row1['allocate_budget'];
        $spent =  $row2['used_budget'];
        $spent_percentage = ($spent * 100) / $capital;

        ?>
        <div class="budgetdash">
            <div class="container">
                <div class="barcontainer">

                    <div class="bar" style="height:100%">
                        <p style="margin-top: 70px; text-align:center; color:white; font-size:larger">100%</p>
                    </div>

                </div>
                <div class="barcontainer">
                    <div class="bar" style="height:<?php echo $spent_percentage ?>%;text-align:center; color:white; font-size:larger;margin-top:-250px"><?php echo $spent_percentage ?>%
                    </div>
                </div>

            </div>
            <div class="allocate-spent" style="display: flex; margin-left: 0px;">
                <h3 style="margin-left: 100px;margin-top: 50px;">Allocated</h3>
                <h3 style="margin-left: 45px;margin-top: 50px;">Spent</h3>
            </div>
        </div>
    </div>
    <div class="overal">
        <?php
        $sql_all_pui = mysqli_query($con, "Select * from tasklist where assignedto = 'pui'");
        $count_pui = mysqli_num_rows($sql_all_pui);

        $sql_done_pui = mysqli_query($con, "Select * from tasklist where assignedto = 'pui' and status = 'completed'");
        $count_done_pui = mysqli_num_rows($sql_done_pui);

        //calculate the percentage of task done
        $percentage_pui = ($count_done_pui * 100) / $count_pui;
        $limitedNumber_pui = number_format($percentage_pui, 2);
        ?>
        <div class="set1">
            <h3 style="text-align:center; margin-top:20px">Working Progress Of : Pui</h3>
            <div class="pie" style="--p:<?php echo $limitedNumber_pui ?>;--b:10px;--c:purple;"><?php echo $limitedNumber_pui ?>%</div>
        </div>
        <?php
        $sql_all_tom = mysqli_query($con, "Select * from tasklist where assignedto = 'Tom'");
        $count_tom = mysqli_num_rows($sql_all_tom);

        $sql_done_tom = mysqli_query($con, "Select * from tasklist where assignedto = 'Tom' and status = 'completed'");
        $count_done_tom = mysqli_num_rows($sql_done_tom);

        //calculate the percentage of task done
        $percentage_tom = ($count_done_tom * 100) / $count_tom;
        $limitedNumber_tom = number_format($percentage_tom, 2);
        ?>
        <div class="set2">
            <h3 style="text-align:center; margin-top:20px">Working Progress Of: Tom</h3>
            <div class="pie" style="--p:<?php echo $limitedNumber_tom ?>;--b:10px;--c:orange;"><?php echo $limitedNumber_tom ?>%</div>
        </div>
        <?php
        $sql_all_nop = mysqli_query($con, "Select * from tasklist where assignedto = 'Thannsiri'");
        $count_nop = mysqli_num_rows($sql_all_nop);

        $sql_done_nop = mysqli_query($con, "Select * from tasklist where assignedto = 'Thannsiri' and status = 'completed'");
        $count_done_nop = mysqli_num_rows($sql_done_nop);

        //calculate the percentage of task done
        $percentage_nop = ($count_done_nop * 100) / $count_nop;
        $limitedNumber_nop = number_format($percentage_nop, 2);
        ?>
        <div class="set3">
            <h3 style="text-align:center; margin-top:20px">Working Progress Of : Thannsiri</h3>
            <div class="pie" style="--p:<?php echo $limitedNumber_nop ?>;--b:10px;--c:green;margin-left:130px"><?php echo $limitedNumber_nop ?>%</div>
        </div>
    </div>
</div>

<?php include 'footer.php' ?>