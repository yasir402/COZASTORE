<?php
include('header.php');

if(isset($_GET['del'])){

    $del= mysqli_query($con,"DELETE FROM `users` WHERE user_id = '".$_GET['delete_id']."'");

   
}


?>
</script>
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
            <div class="col-sm-10 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                       
                            <h6 class="mb-4">All_Payments</h6>
                                
                            

                            <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">payment_id</th>
                                        <th scope="col">order_id</th>
                                        <th scope="col">invoice</th>
                                        <th scope="col">Method</th>
                                        <th scope="col">Date/Time</th>
                                     
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                    <?php
$sqlq=mysqli_query($con,"SELECT * from `payments`" );
 while( $st=mysqli_fetch_array($sqlq)){
?>



                                        <td ><?php echo $st['pay_id'] ?></td>
                                        <td><?php echo $st['order_id'] ?>  </td>
<td><?php echo $st['invoice'] ?></td>
<td><?php echo $st['pay_mode'] ?></td>
<td><?php echo $st['pay_date'] ?></td>

                                        <td>
                                            
                                     <a href="payment.php?del&delete_id=<?php echo $st['pay_id']?>">   <button style="background-color:#EB1616;font-weight:bolder;color:white; margin-right:10px;"  class="btn">Delete</button></a>
                                    
                                        
                                        
                                    </tr>
                        <?php
 }
                        ?>
                                </tbody>
                            </table>
</div>
                        </div>
                    </div>
            </div>
            <?php


    
include('footer.php');
?>

