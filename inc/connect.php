<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome/font-awesome/css/font-awesome.css">
</head>

<?php
session_start();
$ret = mysqli_connect('localhost','root','');
$db = mysqli_select_db($ret,'invest');
?>