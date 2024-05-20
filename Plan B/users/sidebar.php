<?php include 'header.php' ?>
<div class="navigation">
    <ul>
        <!--  -->
        <li class="list <?php if ($page == 'dashboard') {
                            echo 'active';
                        } ?>">
            <b></b>
            <b></b>
            <a href="index.php">
                <span class="icon"><ion-icon name="home-outline"></ion-icon></span>
                <span class="title">Dashboard</span>
            </a>
        </li>
        <li class="list <?php if ($page == 'taskslist') {
                            echo 'active';
                        } ?>">
            <b></b>
            <b></b>
            <a href="taskslist.php">
                <span class="icon"><ion-icon name="list-outline"></ion-icon></span>
                <span class="title">Task List</span>
            </a>
        </li>
        <li class="list <?php if ($page == 'employees') {
                            echo 'active';
                        } ?>"">
            <b></b>
            <b></b>
            <a href=" employees.php">
            <span class="icon"><ion-icon name="people-outline"></ion-icon></span>
            <span class="title">Employee</span>
            </a>
        </li>
        <li class="list <?php if ($page == 'stock_mgm') {
                            echo 'active';
                        } ?>"">
            <b></b>
            <b></b>
            <a href=" stock_mgm.php">
            <span class="icon"><ion-icon name="layers-outline"></ion-icon></span>
            <span class="title">Stock</span>
            </a>
        </li>
        <li class="list <?php if ($page == 'taskstatus') {
                            echo 'active';
                        } ?>"">
            <b></b>
            <b></b>
            <a href=" budget.php">
            <span class="icon"><ion-icon name="cash-outline"></ion-icon></span>
            <span class="title">Budget Status</span>
            </a>
        </li>

        <li class="list">
            <a href="../login.php">
                <span class="icon"><ion-icon name="log-out-outline"></ion-icon></span>
                <span class="title">Log Out</span>
            </a>
        </li>
    </ul>
    <ul>

    </ul>
</div>
<div class="toggle">
    <ion-icon name="menu-outline" class="open"></ion-icon>
    <ion-icon name="close-outline" class="close"></ion-icon>
</div>