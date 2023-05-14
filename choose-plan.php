<?php

require'inc/connect.php';
if(isset($_POST['proceed'])){
    $sql = mysqli_query($ret,'SELECT * FROM plans WHERE plan_name = "'.$_POST['p'].'"');
    while($row=mysqli_fetch_array($sql)){
        $amt = $_POST['amt'];
        if(!($row['min'] <= $amt) || ($amt >= $row['max'])){
            echo'<div class = "bg-danger text-light p-2">Amount out of range!</div>';
        }else{
            $_SESSION['pname'] = $_POST['p'];
            $_SESSION['amt'] = $amt;
            $_SESSION['pro'] = $_POST['pro'];
            echo'<script> window.location.href = "preview_deposit.php";</script>';

        }

    }    
}

echo'

<body class = "bg-dark">';
    require'inc/user-nav.php';
    require'inc/user-side.php';

    echo'
    <div class = "col-9 float-start p-2 pt-5 text-light" style = "background:rgb(49, 47, 47)">
    <h3 class = "m-5">Choose plan</h3>';
    $retn = mysqli_query($ret,'SELECT * FROM plans');
    while($re=mysqli_fetch_array($retn)){
        echo'<div class = "card col-5 bg-dark m-5 text-light text-center float-start">
            '.$re['plan_name'].' <hr>
            Min = $'.$re['min'].'<br>
            Max = $'.$re['max'].'<hr>
            '.$re['profit'].'% profit after '.$re['duration'].' hours
            <input type = "radio" name = "p" value = "'.$re['plan_name'].'">
            </div>';
    }

    echo'
    <h3 class = "m-2">Choose processor</h3>
    <select class = "form-select bg-dark text-light" name = "pro">';
    $r = mysqli_query($ret,'SELECT * FROM processor');

    while($re=mysqli_fetch_array($r)){
        echo'<option>'.$re['name'].'</option>';
    }
    echo'
    </select>
    <input type = "number" class = "mt-2 form-control bg-dark text-light" name = "amt" placeholder = "amount to invest">
    <button class = "mt-2 btn bg-primary text-light" name = "proceed">Proceed</button>
    </div>
    <div class = "bg-dark col-12 text-light text-center">&copy; all right reserved !</div>';
?>