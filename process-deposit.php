<?php

require'inc/connect.php';
require'inc/admin-nav.php';

    echo'<div class = "col-9 float-start p-2 pt-5 text-light" style = "background:rgb(49, 47, 47)">';

    
if(isset($_POST['accept'])){
    
    $sql = mysqli_query($ret,'SELECT * FROM pending_deposit WHERE id = '.$_GET['id'].'');
    while($r=mysqli_fetch_array($sql)){

    $re = mysqli_query($ret,'SELECT * FROM plans WHERE plan_name = "'.$r['plan_name'].'"');
               while($e=mysqli_fetch_array($re)){
                   $dur = $e['duration'];

                    $dura = $dur/24;

                   $profit = $e['profit'];
                   $amt = $r['amt'];

                   $sum = $amt * $dura * $profit;

                   $si = $sum/100;
  
        $ins = mysqli_query($ret,'INSERT INTO processed_deposit SET user = "'.$r['user'].'",
        plan_name="'.$r['plan_name'].'",amt="'.$r['amt'].'",earn="'.$si.'",processor="'.$r['processor'].'",dat="'.date('d-m-Y h:m:sa').'"');

        $rsql = mysqli_query($ret,'SELECT * FROM user_bal WHERE user_id = "'.$r['user'].'"');
        
            while($bal = mysqli_fetch_array($rsql)){
                $sql = mysqli_query($ret,'UPDATE user_bal SET  balance = "'.($r['amt'] + $bal['balance']).'",total_deposit = "'.($bal['total_deposit'] + $r['amt']).'",d_dat = "'.date('d-m-Y h:m:sa').'",pending_earn = "'.$si.'"  WHERE user_id = "'.$r['user'].'"');

                if($sql){
                    mysqli_query($ret,'DELETE FROM pending_deposit WHERE id = '.$_GET['id'].'');
                    echo'<div class = "bg-success text-light p-2">Deposit approved successful</div>';
                }else{
                    echo'<div class = "bg-danger text-light p-2">Deposit approved unsuccessful!</div>';
                }
            }

    
}
               }
            }


            if(isset($_POST['decline'])){
                $dec =  mysqli_query($ret,'DELETE FROM pending_deposit WHERE id = '.$_GET['id'].'');
                if($dec){
                    echo'<div class = "bg-warning text-light p-2">Deposit decline successful</div>';
                }else{
                    echo'<div class = "bg-danger text-light p-2">Deposit decline unsuccessful!</div>';
                }
            }
        
echo'
        <h3 class = "m-5">Process deposit</h3>
    
<form method = "post" class = "border border-1 rounded bg-dark col-12 p-5">
    <table class = "table text-light mt-5">
            
    ';

    $sql = mysqli_query($ret,'SELECT * FROM pending_deposit WHERE id = '.$_GET['id'].'');
    while($r=mysqli_fetch_array($sql)){
        echo'
    <tr>
            <td>
                Username
            </td>
            <td>
                '.$r['user'].'
            </td>
            </tr><tr>
            <td>
                Plan name
            </td>
            <td>
                '.$r['plan_name'].'
            </td>
            </tr><tr>
            <td>
                Amount
            </td>
            <td>
                $'.$r['amt'].'
            </td>
            </tr>';
               $re = mysqli_query($ret,'SELECT * FROM plans WHERE plan_name = "'.$r['plan_name'].'"');
               while($e=mysqli_fetch_array($re)){
                   $dur = $e['duration'];

                    $dura = $dur/24;

                   $profit = $e['profit'];
                   $amt = $r['amt'];

                   $sum = $amt * $dura * $profit;
                   $si = $sum/100;
                   echo '<tr>
                   <td>
                       Durtion
                   </td>
                   <td>'.
                   $e['duration']
                       .' hours
                       </td>
                       </tr><tr>
                       <td>
                        Profit
                       </td>
                       <td>'.
                       $e['profit']
                           .'%
                           </td>
                           </tr><tr>
                           <td>
                               Earn
                           </td>
                           <td>$'.
                               $si
                               .'
                               </td>
                               </tr>';
               } 
                
                
                echo'
            </td>
            </tr><tr>
            <td>
                Processor
            </td>
            <td>
                '.$r['processor'].'
            </td>
            </tr><tr>
            <td>
                Date of deposit
            </td>
             <td>
                '.$r['dat'].'
            </td>
        </tr>';
}
    echo'</table>
    <button class = "btn btn-warning text-light col-4 float-end" name = "decline">Decline</button>
    <button type = "submit" name = "accept" class = "btn btn-primary text-light col-4">Accept</button>
</div>
</div>


</body>';
?>