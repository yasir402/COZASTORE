<?php
include('admin/config.php');
include('funtion/common_function.php');
session_start();
include('includes/cart_header.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>

    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Add custom CSS for styling -->
    <style>
        .table img {
            max-width: 100px;
            height: auto;
        }

        .mm {
            justify-content: space-between;
        }
        .cart_image{
            width: 80px;
            height: 80px;
            object-fit: contain;
        }

        /* Media query for screens smaller than 768px */
        @media (max-width: 768px) {
            .table img {
                max-width: 50px; /* Reduce image size for smaller screens */
            }
        }

        /* Media query for screens smaller than 576px */
        @media (max-width: 576px) {
            .table img {
                max-width: 30px; /* Further reduce image size for even smaller screens */
            }
            .mm {
                flex-direction: column; /* Stack buttons vertically on smaller screens */
                align-items: center; /* Center-align buttons on smaller screens */
            }
        }
    </style>
</head>
<body>
<div class="bg-light">
    <h3 class="text-center my-4">My Cart</h3>
    <p class="text-center mb-4">Quality is our first approach</p>
</div>

<div class="container mt-5">
    <div class="row">
    <div class="table-responsive">
                 <table class="table table-bordered text-center">
                 <form method="post">   
            
                <?php


    global $con;
    $ip = getIPAddress(); 
    $querre = mysqli_query($con, "SELECT * FROM cart WHERE ip = '$ip'");
    $tota = 0; // Initialize $tota to 0
  $result = mysqli_num_rows($querre);
  if($result >0){
    echo "     <thead>
    <tr>
        <th>Product Name</th>
        <th>Product Image</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Remove</th>
        <th>Action</th>
    </tr>
</thead>
<tbody>";
    while ($row = mysqli_fetch_array($querre)) {
      $pro_id = $row['pro_id'];
      $proo =  mysqli_query($con, "SELECT * FROM products WHERE pro_id = $pro_id");
  
      while ($row2 = mysqli_fetch_array($proo)) {
        $pro_price = $row2['pro_price'];
        $pro_name = $row2['pro_name'];
        $pro_image = $row2['pro_image1'];
        $tota += $pro_price; // Add the product price directly to $tota
      

?>
                <tr>
                    <td><?php echo $pro_name ?></td>
                    <td><img src="admin/<?php echo $pro_image?>" class="cart_image" alt="Sample Product Image"></td>
                    <td><input class="form-control" name="qty" type="number" min="1" max="10" value="1"></td>
<!-- updateing quantyt -->

<?php
    $ip = getIPAddress(); 
   if(isset($_POST['update'])){

$qauntity = $_POST['qty'];
$update= mysqli_query($con,"update `cart`  set quantity= $qauntity where  ip ='$ip'  ");

$tota = $tota * $qauntity ;

   }
      

?>
                    <td><?php echo $pro_price ?></td>
                    <td><input type="checkbox" name="item[]" value="<?php echo   $pro_id  ?>" id=""></td>
                    <td><button class="btn btn-danger" name="remove" type="submit">Remove</button>
                    <button class="btn btn-info" name="update" type="submit">Update</button>
                
                
                
                </td>
                </tr>


                <?php

}
    }
    }
    else{

echo"<h2 class='text-danger text-center'>cart is empty <h2/>";



    }
?>
            </tbody>
        </table>
        </div>
        </form>


     

        <div class="d-flex justify-content-between mb-5 mm">
            <?php    
   $ip = getIPAddress(); 
   $querre = mysqli_query($con, "SELECT * FROM cart WHERE ip = '$ip'");

 $result = mysqli_num_rows($querre);
 if($result >0){
    echo"
    <h4 class='px-3'>Subtotal: <strong> $tota/-</strong></h4>
    <a href='index.php' class='btn btn-info' style='margin-right: 10px;'>Continue Shopping</a>
    <a href='checkout.php' class='btn btn-success'>Checkout</a>
    
";


 }
else{

    echo'      <a href="index.php" class="btn btn-info">Continue Shopping</a>';
}

?>
     
        </div>
    </div>
</div>

<!-- Add Bootstrap JS and jQuery for functionality -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include('includes/footer.php');




// removing items

function remove(){
    global $con;
    if(isset($_POST['remove'])){
        foreach($_POST['item'] as $removeid){
            echo $removeid;

            $deletequerry = mysqli_query($con,"delete from `cart` where pro_id = $removeid");
        if( $deletequerry ){
            echo "<script>window.open('cart.php','_self') </script>";
        }
        
        }
    }
}
echo $remove =  remove();



?>
