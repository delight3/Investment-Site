<?php

require'inc/connect.php';

if (isset($_POST['signup'])) {
    if(!preg_match_all('/[a-z, ]/i',$_POST['fname'])){
        echo'<div class = "bg-danger text-light p-2">
        Fulname requires only alphabet!</div>';
    }else if(!preg_match_all('/[a-z,0-9]/i',$_POST['user'])){
        echo'<div class = "bg-danger text-light p-2">
        Username requires only alphanumeric!</div>';
    }else if($_POST['pass'] != $_POST['rpass']){
        echo'<div class = "bg-danger text-light p-2">
        Password mismatch!</div>';
    }else{
        $_SESSION['fname'] = mysqli_real_escape_string($ret,$_POST['fname']);
        $_SESSION['uemail'] = mysqli_real_escape_string($ret,$_POST['uemail']);
        $_SESSION['user'] = mysqli_real_escape_string($ret,$_POST['user']);
        $_SESSION['pass'] = mysqli_real_escape_string($ret,$_POST['pass']);
        echo'<script> window.location.href = "verify.php";</script>';
    }
}

echo'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>signup</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/font-awesome/font-awesome/css/font-awesome.css">
</head>
<body class="p-5 bg-dark">
    <form action="" method="post" class="m-auto mt-5 p-3 col-6 text-center bg-dark border border-2 border-light rounded">
        <i class="text-danger">Please fill the form :</i>
        <input type="text" class="form-control mt-4" name = "fname" placeholder="Fulname"><br>
        <input type="email" class="form-control mt-4" name= "uemail" placeholder="Email"><br>
        <input type="text" class="form-control mt-4" name = "user" placeholder="username"><br>
        <input type="password" class="form-control mt-4" name = "pass" placeholder="Password"><br>
        <input type="password" class="form-control mt-4" name = "rpass" placeholder="Confirm Password"><br>
        <a href="" class="float-end">back</a>
        <button class="btn btn-primary col-6 text-light text-uppercase" name = "signup">signup</button>
    </form>
    
</body>
</html>';
?>