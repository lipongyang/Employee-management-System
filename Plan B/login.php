<?php
session_start();
include 'dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

</body>

</html>
<div class="bg">
    <h1 class="btn-shine">Hi...!</h1>
    <div class="login-form">
        <div class="effect1">
        </div>
        <div class="effect2">
        </div>
        <div class="effect3">
        </div>
        <div class="effect4">
        </div>
        <div class="effect5">
        </div>
        <div class="effect6">
        </div>

        <form method="POST">
            <table class="input-form">

                <tr>
                    <td><label for="username">Username:</label><br></td>
                    <td><input type="text" id="username" name="username" required><br></td>
                </tr>
                <tr>
                    <td><label for="password">Password:</label><br></td>
                    <td><input type="password" id="password" name="password" required><br></td>
                </tr>
            </table>
            <button type="submit" name="submit" class="btn-login">Login</button><br><br>
            <a href="./users/index.php" style="margin-left:320px;">View As User</a>

        </form>

    </div>
</div>

</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM User WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    $base_username = $row['username'];
    $base_password = $row['password'];
    $role = $row['role'];
    $user_role1 = 'pm';
    $user_role2 = 'ma';
    $user_role3 = 's';
    if ($username == $base_username and $password == $base_password and $role == $user_role1) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $user_role1;
        header('location: index.php');
    } else if ($username == $base_username and $password == $base_password and $role == $user_role2) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $user_role2;
        header('location: index.php');
    } else if ($username == $base_username and $password == $base_password and $role == $user_role3) {
        $_SESSION['username'] = $username;
        $_SESSION['role'] = $user_role3;
        header('location: index.php');
    } else {
        echo  "<script>alert('Username or Password is incorrect!')</script>";
    }
    $con->close();
}
?>