<?php
include('admin/config.php');
include('funtion/common_function.php');
  include('includes/header.php');

?>
!<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <!-- https://cdnjs.com/libraries/twitter-bootstrap/5.0.0-beta1 -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css"
    />

    <!-- Icons: https://getbootstrap.com/docs/5.0/extend/icons/ -->
    <!-- https://cdnjs.com/libraries/font-awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />

    <title>Hello, world!</title>
  </head>
  <body>
 <!-- getting user id -->
 <?php
$ip=getIPAddress() ;
$get = mysqli_query($con,"select * from `users` where user_ip = '$ip'");
$row= mysqli_fetch_array($get);
$user_id = $row['user_id'];
?>







<div class="container">
    <h2 class="text-center text-info">Payment options </h2>
    <div class="row">
        <div class="col-md-6">
        <a href="" > <img src="images/pay.jpg" width="100%" class="ms-auto d-block" height="100%" alt=""></a>
        </div>
        <div class="col-md-6 text-center c">
        <a href="order.php?user_id=<?php echo $user_id   ?>" > <h1>Pay offline</h1></a>
        </div>
    </div>
</div>





    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!-- https://cdnjs.com/libraries/popper.js/2.5.4 -->
    <!-- <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.min.js"
    ></script> -->

    <!-- More: https://getbootstrap.com/docs/5.0/getting-started/introduction/ -->
  </body>
</html>







<?php
include('includes/footer.php');



?>