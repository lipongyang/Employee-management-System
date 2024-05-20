<?php
if (!isset($_SESSION['username'])) {
    echo "<script>alert('Plase login first')</script>";
    echo "<script>window.location.href = 'login.php'</script>";
}
