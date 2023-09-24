<?php
include('header.php');

if(isset($_GET['del'])){

    $del= mysqli_query($con,"DELETE FROM `orders` WHERE order_id = '".$_GET['delete_id']."'");

   
}


?>
</script>
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
            <div class="col-sm-10 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                     
                            <h6 class="mb-4">Orders_list</h6>
                                
                            

                            <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Order_id</th>
                                        <th scope="col">User_id</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">invoice</th>
                                        <th scope="col">total_products</th>
                                        <th scope="col">order_date</th>
                                        <th scope="col">order_status</th>

                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                    <?php
$sqlq=mysqli_query($con,"SELECT * from `orders`" );
 while( $st=mysqli_fetch_array($sqlq)){
?>



                                        <td ><?php echo $st['order_id'] ?></td>
                                        <td><?php echo $st['user_id'] ?>  </td>
<td><?php echo $st['due_amount'] ?></td>
<td><?php echo $st['invoice'] ?></td>
<td><?php echo $st['total_products'] ?></td>
<td><?php echo $st['order_date'] ?></td>
<td><?php echo $st['order_state'] ?></td>
                                        <td>
                                            
                                     <a href="order.php?del&delete_id=<?php echo $st['order_id']?>">   <button style="background-color:#EB1616;font-weight:bolder;color:white; margin-right:10px;"  class="btn">Delete</button></a>
                                    
                                        
                                        
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

