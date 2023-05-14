<?php

require'inc/connect.php';
if(isset($_POST['confirm'])){
      $ins = mysqli_query($ret,'INSERT INTO pending_deposit SET user = "'.$_SESSION['user'].'",plan_name = "'.$_SESSION['pname'].'",amt = "'.$_SESSION['amt'].'",processor = "'.$_SESSION['pro'].'",dat = "'.date('d-m-Y h:m:sa').'"');
      if($ins){
        echo'<div class = "bg-success text-light p-2">Deposit request successful, waiting for admin approval</div>';
    }else{
        echo'<div class = "bg-danger text-light p-2">Deposit request unsuccessful!</div>';
    }
}


echo'

<body class = "bg-dark">';
    require'inc/user-nav.php';
    require'inc/user-side.php';

    echo'
    <div class = "col-9 float-start p-2 pt-5 text-light" style = "background:rgb(49, 47, 47)">
    <h3 class = "m-5">Confirm deposit</h3>
    <table class = "table bg-dark text-light">
    <tr><td>Plan name</td><td>'.$_SESSION['pname'].'</td></tr>
    <tr><td>Amount</td><td>'.$_SESSION['amt'].'</td></tr>
    <tr><td>Processor</td><td>'.$_SESSION['pro'].'</td></tr>
    </table>
    <button class = "mt-2 btn bg-primary text-light" name = "confirm">Confirm</button>
    ';
    

   echo' </div>
    <div class = "bg-dark col-12 text-light text-center">&copy; all right reserved !</div>';
?>