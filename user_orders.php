<div class="container mt-5">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                <style>
    
</style>
          
                    <tr>
                        <th>S.No</th>
                        <th>due_amount</th>
                        <th>invoice</th>
                        <th>total_products</th>
                        <th>order_date</th>
                        <th>order_status</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <!-- getting user id -->
                    <?php
$username= $_SESSION['username'];
$getuser= mysqli_query($con,"select * from `users` where user_name= '$username'");
$row= mysqli_fetch_assoc($getuser);
$user_id= $row['user_id'];
// getting orders
$orders= mysqli_query($con,"select * from `orders` where user_id = $user_id");
$numeber=1;
while($roww= mysqli_fetch_assoc($orders)){

?>
                    <tr>
                        <td><?php echo $numeber ?></td>
                        <td><?php echo $roww['due_amount'] ?></td>
                        <td><?php echo $roww['invoice'] ?></td>
                        <td><?php echo $roww['total_products'] ?></td>
                        <td><?php echo $roww['order_date'] ?></td>
                        <td><?php echo $roww['order_state'] ?></td>
                        <?php

if($roww['order_state'] == 'complete'){

    echo "<td class='text-success'>   Paid  </td>";
}
else{

?>
                        <td><a href="confirm.php?order= <?php echo $roww['order_id'] ?>">Confirm</a></td>
                    <?php
}
                    ?>
                    
                    </tr>
                    <?php
                    $numeber++;

}
?>

          <!-- Repeat this table row structure for each product in the cart -->
                </tbody>
            </table>
        </div>
    </div>
</div>
