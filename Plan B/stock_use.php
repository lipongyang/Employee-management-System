<?php
include 'dbconnect.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    //update the stock by decrease the instock by 1 and increase the used by 1
    $stock_use = mysqli_query($con, "update stocks set instock = instock-1 , used = used+1 where st_id = $id");
    if ($stock_use) {
        echo "<script>alert('Stock Updated')</script>";
        echo ("<script>window.location.href='stock_mgm.php'</script>");
    } else {
        echo "<script>alert('Somthing when wrong')</script>";
    }
}
