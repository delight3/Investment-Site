<?php

require'inc/connect.php';

if(isset($_POST['proceed'])){
    $sql = mysqli_query($ret,'SELECT * FROM user_bal WHERE user_id = "'.$_SESSION['user'].'"');
    while($ro=mysqli_fetch_array($sql)){
        $amt = $_POST['amt'];
        if($ro['balance'] < $amt){
            echo'<div class = "bg-danger text-light p-2">Insuffient fund!</div>';
        }else{
              $ins = mysqli_query($ret,'INSERT INTO pending_withdraw SET user = "'.$_SESSION['user'].'",amt = "'.$_SESSION['amt'].'",dat = "'.date('d-m-Y h:m:sa').'"');
                if($ins){
                     echo'<div class = "bg-success text-light p-2">Withdraw request successful, waiting for admin approval</div>';
                 }else{
                    echo'<div class = "bg-danger text-light p-2">Withdraw request unsuccessful!</div>';
      }
    }
}
}
echo'

<body class = "bg-dark">';
    require'inc/user-nav.php';
    require'inc/user-side.php';

    echo'
    <div class = "card col-lg-9 col-md-12 float-start p-5 text-light" style = "background:rgb(49, 47, 47)">
    
    <h3 class = "m-2">Request withdraw</h3>
    <select class = "form-select bg-dark text-light mt-5" name = "pro">';
    $r = mysqli_query($ret,'SELECT * FROM processor');

    while($re=mysqli_fetch_array($r)){
        echo'<option>'.$re['name'].'</option>';
    }
    echo'
    </select>
    <input type = "number" class = "mt-3 form-control bg-dark text-light" name = "amt" placeholder = "amount to invest">
    <button class = "mt-4 btn bg-primary text-light" name = "proceed">Proceed</button>
    </div>
    <div class = "bg-dark col-12 text-light text-center">&copy; all right reserved !</div>';
?>