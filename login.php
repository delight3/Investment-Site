<?php

require'inc/connect.php';

if (isset($_POST['login'])) {
    $user = mysqli_real_escape_string($ret,$_POST['user']);
    $pass = mysqli_real_escape_string($ret,$_POST['pass']);

    $sql = mysqli_query($ret,'SELECT * FROM user WHERE user = "'.$user.'" AND pass = "'.$pass.'"');

    $ret = mysqli_num_rows($sql);

    if($ret > 0){
        while($re=mysqli_fetch_array($sql)){
            
            if($re['position']=='1'){
                $_SESSION['admin'] = $user;
                echo'<script> window.location.href = "admin-dashboard.php";</script>';
            }else{
                $_SESSION['user'] = $user;
                echo'<script> window.location.href = "user-dashboard.php";</script>';
            }
        }
        echo'<div class = "text-light">acount found</div>';
    }else{
        echo'<div class = "bg-danger p-2 text-light">Invalid username or password!</div>';
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
        <input type="text" class="form-control mt-4" name = "user" placeholder="username"><br>
        <input type="password" class="form-control mt-4" name = "pass" placeholder="Password"><br>
      
        <a href="" class="float-end">back</a>
        <button class="btn btn-primary col-6 text-light text-uppercase" name = "login">login</button>
    </form>
    
</body>
</html>';
?>