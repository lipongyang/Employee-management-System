<?php
session_status() === PHP_SESSION_ACTIVE ?: session_start();
ini_set('display_errors', 1);
error_reporting(~0);
include 'dbconnect.php';
include 'check_login.php';
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