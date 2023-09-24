<?php
include('admin/config.php');
include('funtion/common_function.php');
if(isset($_GET['user_id'])){
    $user_id= $_GET['user_id'];

    // Getting the user's IP address
    $ip = getIPAddress();

    // Initialize total prize, invoice, and status
    $totalprize = 0;
    $invoice = mt_rand();
    $status = "pending";

    // Query to fetch items from the cart
    $querry = mysqli_query($con, "SELECT * FROM `cart` WHERE ip = '$ip'");
    $count = mysqli_num_rows($querry);

    while($row = mysqli_fetch_array($querry)){
        $pro_id = $row['pro_id'];

        // Query to select products from the cart
        $que = mysqli_query($con, "SELECT * FROM `products` WHERE pro_id = $pro_id");
        
        while($row_pro = mysqli_fetch_array($que)){
            $pro_prize = array($row_pro['pro_price']);
            $pro_value = array_sum($pro_prize);
            $totalprize += $pro_value;
        }
    }

    // Getting quantity from cart
    $get_cart = mysqli_query($con, "SELECT * FROM `cart`");
    $get_quantity = mysqli_fetch_array($get_cart);
    $quantity = $get_quantity['quantity'];

    if($quantity == 0){
        $quantity = 1;
        $subtotal = $totalprize;
    } else {
        $quantity = $quantity;
        $subtotal = $totalprize * $quantity;
    }

    // Inserting orders
    $insert = mysqli_query($con, "INSERT INTO `orders`(`user_id`, `due_amount`, `invoice`, `total_products`, `order_date`, `order_state`) VALUES ($user_id, $subtotal, '$invoice', $count, now(), '$status')");

    if($insert){
        echo "<script> alert('Orders are submitted')</script>";
        echo "<script> window.location.href='account_settings.php'</script>";
    }

    // Inserting pending orders
    $pending = mysqli_query($con, "INSERT INTO `orders_pending`(`user_id`, `invoice`, `product_id`, `quantity`, `order_status`) VALUES ($user_id, '$invoice', $pro_id, $quantity, '$status')");

    // Deleting cart
    $emptycart = mysqli_query($con, "DELETE FROM `cart` WHERE ip = '$ip'");
}
?>
+
+