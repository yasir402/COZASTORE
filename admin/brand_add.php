
<?php
include('header.php');

?>


<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">ADD BRAND</h6>

                            <a href="brand.php"><button style="background-color:#EB1616;font-weight:bolder;color:white;float:right;margin-bottom:5px;" class="btn">back to list</button></a>
                            <form  method="POST" enctype="" >
                                <div class="mb-3">
                                    <label class="form-label">brand_name</label>
                                    <input type="text" name="name" class="form-control">
                                </div>
                      
                               <div>
                           <button name="insert" type="submit" class="btn"  style="background-color:#EB1616;font-weight:bolder;color:white;">ADD</button>
                             </div>
                            </form>
                        </div>
                    </div>


<?php

if(isset($_POST['insert'] )){

    $cat_name= $_POST['name'];
$select = "SELECT * FROM `brands` WHERE brand_name = '$cat_name'";
$result= mysqli_query ($con,$select);
$num= mysqli_num_rows($result);
if($num>0){
echo "<script>alert('brand already exits')</script>";
}
else{


$query = mysqli_query ($con,"INSERT INTO `brands`(`brand_name`) VALUES ('".$cat_name."') ");

echo '<script>window.location="brand.php"</script>';
}
}
?>
<?php
include('footer.php');
?>