<?php
include('admin/config.php');
include ('funtion/common_function.php');
?>




<!DOCTYPE html>
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
<link rel="stylesheet" href="style.css">
    <!-- Icons: https://getbootstrap.com/docs/5.0/extend/icons/ -->
    <!-- https://cdnjs.com/libraries/font-awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />
     <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />
    <title>Ecommerce website!</title>
  </head>
  <body >
 
<!-- navbar -->
<?php
include('includes/header.php')

?>


<div class="bg-light">
    <h3 class="text-center">
        My Store
    </h3>
    <p class="text-center">
        Quality is our first approach
    </p>
</div>



<!-- products -->
<div class="row">

<div class="col-md-10">

<div class="row">

<!-- getting produts -->
<?php
search();
 getuniquecategory();
 getuniquebrands();
?>





</div>





</div>

<div class="col-md-2 bg-secondary p-0">
    <ul class="navbar-nav me-auto text-center ">

    <li class="nav-item bg-info ">
        <a href="" class="nav-link text-light"> <h4> Delivery Brands <h4/></a>

    </li>

<?php

brand();

?>
    
    </ul>


















    <ul class="navbar-nav me-auto text-center">

<li class="nav-item bg-info ">
    <a href="" class="nav-link text-light"> <h4> Categories <h4/></a>

</li>

<?php

categories()
?>
</ul>









</div>
    
</div>


</div>





















<?php

include('includes/footer.php')

?>









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
