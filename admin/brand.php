<?php
include('header.php');

if(isset($_GET['del'])){

    $del= mysqli_query($con,"DELETE FROM `brands` WHERE brand_id= '".$_GET['delete_id']."'");

   
}


?>
</script>
            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
            <div class="col-sm-10 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                        <a href="brand_add.php"><button style="background-color:#EB1616;font-weight:bolder;color:white;float:right;margin-bottom:5px;" class="btn">Add New</button></a>
                            <h6 class="mb-4">brands_list</h6>
                                
                            

                            <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">brand_id</th>
                                        <th scope="col">brand_name</th>
                                  
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                    <?php
$sqlq=mysqli_query($con,"SELECT * from `brands`" );
 while( $st=mysqli_fetch_array($sqlq)){
?>



                                        <td ><?php echo $st['brand_id'] ?></td>
                                        <td><?php echo $st['brand_name'] ?>  </td>

                                        <td>
                                            
                                     <a href="brand.php?del&delete_id=<?php echo $st['brand_id']?>">   <button style="background-color:#EB1616;font-weight:bolder;color:white; margin-right:10px;"  class="btn">Delete</button></a>
                                       
                                        
                                        
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

