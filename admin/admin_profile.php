
<?php
include('header.php');
$id = $_GET['update_id'];


if(isset($_POST['update'])){

    $name= $_POST['name'];
  
    $email= $_POST['email'];
    $password= $_POST['password'];

    $emp = $_FILES['img']['name'];
    $tmp = $_FILES['img']['tmp_name'];
    $folder = "upload/".$emp;
    $move = move_uploaded_file($tmp,$folder);

    
    $sql="UPDATE `admin` SET `admin_name`='$name',`admin_email`='$email',`admin_password`='$password',`admin_img`=' $folder' WHERE admin_id = $id";
    $res = mysqli_query($con,$sql);
    if($res){
     echo "<script>alert('Successfully updated')</script>";
     echo '<script>window.location="category.php"</script>';
    }
    else{
     echo  "sorry";
    }
  
    }
    
















?>




<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">ADMIN PROFILE </h6>

                    
                            <div class="mb-3">
 <form action="" method="POST" enctype="multipart/form-data">                     
                                                       <?php
$sq=mysqli_query($con,"SELECT * FROM `admin`");
$ys=mysqli_fetch_array($sq)
?>


                                    <label class="form-label">admin_name</label>
                                    <input type="text" value="<?php echo $ys['admin_name']?>" name="name" class="form-control" >
                                    
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">admin_email</label>
                                    <input type="email" value="<?php echo $ys['admin_email']?>" name="email" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">admin_password</label>
                                 
                                    <input type="password" value="<?php echo $ys['admin_password']?>" name="password" class="form-control">
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">admin_img</label>
                                    <br>
                                    <br>
                                    <img src="<?php echo $ys['admin_img']?>" width="150px" alt="">
                                    <br>
                                    <br>
                                    <input type="file" name="img" class="form-control">
                                </div>
                                
                             
                           <button  name="update" href="main.php" type="submit" class="btn"  style="background-color:#EB1616;font-weight:bolder;color:white;">UPDATE</button>
                             </div>
                            </form>
                        </div>
                    </div>













































<?php
include('footer.php');
?>