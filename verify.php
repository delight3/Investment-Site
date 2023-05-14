<?php

require'inc/connect.php';

if (isset($_POST['verify'])) {
 
    if($_POST['pass'] == $_SESSION['pass']){

         mysqli_query($ret,'INSERT INTO user SET fname = "'.$_SESSION['fname'].'",uemail = "'.$_SESSION['uemail'].'",user = "'.$_SESSION['user'].'",pass = "'.$_SESSION['fname'].'"');

        $sql = mysqli_query($ret,'INSERT INTO user_bal SET balance = "0",total_deposit = "0",d_dat = "0",total_withdrew = "0", w_dat = "0", pending_earn = "0" , user_id = "'.$_SESSION['user'].'"');

        if($sql){
        echo'<script> window.location.href = "user-dashboard.php";</script>';
        }else{
            echo'<div class = "bg-danger text-light p-2">
            Server encounter error!
            </div>'; 
        }
    }else{
        echo'<div class = "bg-danger text-light p-2">
        Password mismatch
        </div>'; 
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
    <form action="" method="post" class="m-auto mt-5 p-3 col-6 text-center bg-dark border border-1 border-light rounded">
    <h2 class = "text-info"><i class ="fa fa-user"></i>&nbsp;VERIFY FORM</h2>    
    <i class="text-danger">Please fill the form :</i>
       <input type="email" class="form-control mt-4" value = "'.$_SESSION['uemail'].'" name= "uemail" placeholder="Email">
        <input type="password" class="form-control mt-4" name = "pass" placeholder="Password"><br>
       <a href="" class="float-end">back</a>
        <button class="btn btn-primary col-6 text-light text-uppercase" name = "verify">verify</button>
    </form>
    
</body>
</html>';
?>