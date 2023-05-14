<?php

require'inc/connect.php';
require'inc/admin-nav.php';


?>
    <div class = "col-9 float-start p-2 pt-5 text-light" style = "background:rgb(49, 47, 47)">
        <h3 class = "m-5">Pending deposit</h3>
    
<div class = "card bg-dark col-12">
    <table class = "table text-light mt-5">
        <tr>
            <th>
                s/n
            </th>
            <th>
                Username
            </th>
            <th>
                Plan name
            </th>
            <th>
                Amount
            </th>
            <th>
                Processor
            </th>
            <th>
                Date
            </th>
            <th>
                Action
            </th>
        </tr>
            
    <?php

    $sql = mysqli_query($ret,'SELECT * FROM pending_deposit');
    while($r=mysqli_fetch_array($sql)){
        echo'
    <tr>
            <td>
                '.$r['id'].'
            </td>
            <td>
                '.$r['user'].'
            </td>
            <td>
                '.$r['plan_name'].'
            </td>
            <td>
                '.$r['amt'].'
            </td>
            <td>
                '.$r['processor'].'
            </td>
            <td>
                '.$r['dat'].'
            </td>
            <td>
                <a href = "process-deposit.php?id='.$r['id'].'" class = "btn btn-success text-light">Run</a>
            </td>
        </tr>';
}
    echo'</table>

</div>
</div>


</body>';
?>