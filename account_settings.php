<?php
include('admin/config.php');
include('funtion/common_function.php');
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css">
    <!-- Add your other CSS links here -->
    <style>
        body {
            overflow-x: hidden;
        }
    </style>
</head>
<body>


    <!-- Include the navbar -->
    <?php include('includes/header.php'); ?>

    
        <div class="row px-1 justify-content-center">
            <div class="col-md-9 text-center justify-content-center">
                <div class="row justify-content-center" style="">
                    <?php
                order_details();
                if(isset($_GET['account'])){
                    include('user_details.php');
                }
                if(isset($_GET['order'])){
                    include('user_orders.php');
                }
                    ?>
                </div>
            </div>

            <div class="col-md-3 bg-secondary p-0">
                <ul class="navbar-nav me-0 text-center ">
                    <li class="nav-item bg-info ">
                        <a href="" class="nav-link text-light"> <h3>User profile<h3/></a>
                    </li>
                    <li class="nav-item  ">
                        <a href="account_settings.php?account" class="nav-link text-light"> <h4>My account<h4/></a>
                    </li>
                    <li class="nav-item  ">
                        <a href="account_settings.php?order" class="nav-link text-light"> <h4>My orders<h4/></a>
                    </li>
                    <li class="nav-item  ">
                        <a href="account_settings.php?pending" class="nav-link text-light"> <h4>Pending orders<h4/></a>
                    </li>
                </ul>

            </div>
        </div>
    </div>

    <?php include('includes/footer.php'); ?>

    <!-- Include your JavaScript files -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
    <!-- Add your other script tags here -->
</body>
</html>
