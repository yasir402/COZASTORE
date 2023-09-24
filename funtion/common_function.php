<style>
    .custom-card {
            width: 90%;
      
            border: 1px solid rgba(0, 0, 0, 0.125);
            border-radius: 0.25rem;
            margin-bottom: 20px;
            
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .custom-card .card-img-top {
            max-height: 100%;
            max-width: 100%;  /*        max-height: 200px; Adjust the maximum height as needed */
            object-fit: contain; /* Ensures the image covers the entire container */
        }

        .custom-card .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .custom-card .card-text {
            font-size: 1rem;
        }

        .custom-card .card-price {
            font-size: 1.25rem;
            font-weight: bold;
            color: #007bff; /* Blue color for the price */
        }

        .custom-card .btn {
            margin-top: 10px;
        }

        /* Style for the "Add to cart" button */
        .custom-card .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        /* Style for the "View more" button */
        .custom-card .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        /* Add hover effect to buttons */
        .custom-card .btn:hover {
            opacity: 0.9;
        }

        /* Media query for screens larger than 768px */
        @media (min-width: 768px) {
            .custom-card {
                width: 80%; /* Adjust the card width for medium screens, two cards per row */
                margin-right: 2%; /* Add some spacing between cards */
            }
        }

        /* Media query for screens larger than 992px */
        @media (min-width: 992px) {
            .custom-card {
                width: 70%; /* Adjust the card width for larger screens, three cards per row */
                margin-right: 2%; /* Add some spacing between cards */
            }
        }

        /* Media query for screens larger than 1200px */
        @media (min-width: 1200px) {
            .custom-card {
                width: 100%; /* Adjust the card width for very large screens, four cards per row */
                margin-right: 2%; /* Add some spacing between cards */
            }
        }

</style>

<?php
include('./admin/config.php');


function getproduct(){
global $con;


if(!isset($_GET['category'])){
if(!isset($_GET['brand'])){

    $sq=mysqli_query($con,"SELECT * from `products` ORDER BY rand() limit 0,3" );

    while($s=mysqli_fetch_array($sq))
    {
    ?>
   <div class="col-md-4" id="shop">
  <div class="card custom-card">
    <img src="./admin/<?php echo $s['pro_image1'] ?>" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?php echo $s['pro_name'] ?></h5>
      <p class="card-text"><?php echo $s['pro_description'] ?></p>
      <p class="card-price">Rs/<?php echo $s['pro_price'] ?></p>
      <a href="index.php?cart=<?php echo $s['pro_id'] ?>" class="btn btn-primary">Add to cart</a>
      <a href="products_detail.php?product_id=<?php echo $s['pro_id'] ?>" class="btn btn-secondary">View more</a>
    </div>
  </div>
</div>

    <?php
    }
}
}

}
// all products

function getallproduct(){
    global $con;
    
    
    if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
    
        $sq=mysqli_query($con,"SELECT * from `products` ORDER BY rand() " );
    
        while($s=mysqli_fetch_array($sq))
        {
        ?>
        <div class="col-md-4 ">
        <div class="card" style="width: 18rem;">
          <img src="./admin/<?php echo $s['pro_image1'] ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $s['pro_name'] ?></h5>
            <p class="card-text"><?php echo $s['pro_description'] ?></p>
            <p class="card-text"> Rs/<?php echo $s['pro_price'] ?></p>
            <a href="index.php?cart=<?php echo $s['pro_id'] ?>" class="btn btn-primary">Add to cart</a>
            <a href="products_detail.php?product_id=<?php echo $s['pro_id'] ?> " class="btn btn-secondary">View more</a>
          </div>
        </div>
        </div>
        <?php
        }
    }
    }
    
    }


// getting unique categoris
function getuniquecategory(){
    global $con;
    
    
    if(isset($_GET['category'])){
  
    $category_id = $_GET['category'];
        $sq=mysqli_query($con,"SELECT * from `products` where cat_id =$category_id" );
    $numofrows = mysqli_num_rows($sq);

if($numofrows ==0){

    echo "<h2 class= 'text-center text-danger'> No stock for this category </h2>";
}

        while($s=mysqli_fetch_array($sq))
        {
        ?>
        <div class="col-md-4 ">
        <div class="card" style="width: 18rem;">
          <img src="./admin/<?php echo $s['pro_image1'] ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $s['pro_name'] ?></h5>
            <p class="card-text"><?php echo $s['pro_description'] ?></p>
            <p class="card-text"> Rs/<?php echo $s['pro_price'] ?></p>
            <a href="index.php?cart=<?php echo $s['pro_id'] ?>" class="btn btn-primary">Add to cart</a>
            <a href="products_detail.php?product_id=<?php echo $s['pro_id'] ?> " class="btn btn-secondary">View more</a>
          </div>
        </div>
        </div>
        <?php
        }
    }
    }
    

    
// getting unique brands
function getuniquebrands(){
    global $con;
    
    
    if(isset($_GET['brand'])){
  
    $category_id = $_GET['brand'];
        $sq=mysqli_query($con,"SELECT * from `products` where brand_id =$category_id" );
    $numofrows = mysqli_num_rows($sq);

if($numofrows ==0){

    echo "<h2 class= 'text-center text-danger'> No stock for this brand </h2>";
}

        while($s=mysqli_fetch_array($sq))
        {
        ?>
        <div class="col-md-4 ">
        <div class="card" style="width: 18rem;">
          <img src="./admin/<?php echo $s['pro_image1'] ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $s['pro_name'] ?></h5>
            <p class="card-text"><?php echo $s['pro_description'] ?></p>
            <p class="card-text"> Rs/<?php echo $s['pro_price'] ?></p>
            <a href="index.php?cart=<?php echo $s['pro_id'] ?>" class="btn btn-primary">Add to cart</a>
            <a href="products_detail.php?product_id=<?php echo $s['pro_id'] ?> " class="btn btn-secondary">View more</a>
          </div>
        </div>
        </div>
        <?php
        }
    }
    }
    
    
    


function brand(){
    
    global $con;
$sqlq=mysqli_query($con,"SELECT * from `brands`" );

while($st=mysqli_fetch_array($sqlq))
{
?>
    <li class="nav-item">
    <a href="display_all.php?brand=<?php echo $st['brand_id'] ?>" class="nav-link text-light"><?php echo $st['brand_name']?></a>
    
    </li>
    <?php

}
}




function categories(){
    global $con;
    
    $sqlq=mysqli_query($con,"SELECT * from `categories`" );
    
    while($st=mysqli_fetch_array($sqlq))
    {
    ?>
    <li class="nav-item">
    <a href="display_all.php?category=<?php echo $st['cat_id'] ?>" class="nav-link text-light"><?php echo $st['cat_name']?></a>
    
    </li>
    <?php
    }
}



// searching work


function search(){

    global $con;
if(isset($_GET['search'])){
$search_data= $_GET['search'];

    
        $sq=mysqli_query($con,"SELECT * from `products` where pro_keyword like '%$search_data%'" );
        $numofrows = mysqli_num_rows($sq);

if($numofrows ==0){

    echo "<h2 class= 'text-center text-danger'>No products found</h2>";
}
        while($s=mysqli_fetch_array($sq))
        {
        ?>
        <div class="col-md-4 ">
        <div class="card" style="width: 18rem;">
          <img src="./admin/<?php echo $s['pro_image1'] ?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $s['pro_name'] ?></h5>
            <p class="card-text"><?php echo $s['pro_description'] ?></p>
            <p class="card-text"> Rs/<?php echo $s['pro_price'] ?></p>
            <a href="index.php?cart=<?php echo $s['pro_id'] ?>" class="btn btn-primary">Add to cart</a>
            <a href="products_detail.php?product_id=<?php echo $s['pro_id'] ?> " class="btn btn-secondary">View more</a>
          </div>
        </div>
        </div>
        <?php
        }
    }

}
// products details

function detail(){

  global $con;

  if(isset($_GET['product_id'])){
  if(!isset($_GET['category'])){
  if(!isset($_GET['brand'])){
$pro_id = $_GET['product_id'];
      $sq=mysqli_query($con,"SELECT * from `products` where pro_id= $pro_id" );
  
      while($s=mysqli_fetch_array($sq))
      {
      ?>
      <div class="col-md-4 ">
      <div class="card" style="width: 18rem;">
        <img src="./admin/<?php echo $s['pro_image1'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title"><?php echo $s['pro_name'] ?></h5>
          <p class="card-text"><?php echo $s['pro_description'] ?></p>
          <p class="card-text"> Rs/<?php echo $s['pro_price'] ?></p>
          <a href="index.php?cart=<?php echo $s['pro_id'] ?>" class="btn btn-primary">Add to cart</a>
        
        </div>
      </div>
      </div>
      <div class="col-md-8">
    <div class="row">
<div class="col-md-12">
    <h4 class="text-center text-info mb-5">Related products</h4>
   </div>
   <div class="col-md-6">
   <img class="card-img-top"  src="./admin/<?php echo $s['pro_image2'] ?>" alt="">
   </div>
     <div class="col-md-6">
    <img class="card-img-top" src="./admin/<?php echo $s['pro_image3'] ?>" alt="">

</div>
    </div>

</div>
      <?php
      }
  }
  }
}

}

function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
 
}  
// cart function



function cart() {
  global $con;
  if (isset($_GET['cart'])) {
 
    $ip = getIPAddress(); // Assuming getIPAddress() returns a valid IP address

    $getpro_id = $_GET['cart'];

    
    // Wrap $getpro_id and $ip with single quotes in the SQL query
    $querre = mysqli_query($con, "SELECT * FROM cart WHERE ip = '$ip' AND pro_id = '$getpro_id'");
    
    $numofro = mysqli_num_rows($querre);

    if ($numofro > 0) {
      echo "<script>alert('Item is already added to cart')</script>";
      echo "<script>window.open('index.php', '_self')</script>";
    } else {
      // Wrap $getpro_id and $ip with single quotes in the SQL query
      $insert = mysqli_query($con, "INSERT INTO cart (pro_id, ip, quantity) VALUES ('$getpro_id', '$ip', 0)");
      echo "<script>alert('Item has been added to cart')</script>";
      echo "<script>window.open('index.php', '_self')</script>";
    }
  }
}

// cart numbers

function cart_item(){

  global $con;
  if (isset($_GET['cart'])) {
 
    $ip = getIPAddress(); // Assuming getIPAddress() returns a valid IP address
    
    // Wrap $getpro_id and $ip with single quotes in the SQL query
    $querre = mysqli_query($con, "SELECT * FROM cart WHERE ip = '$ip'");
    
    $numofro = mysqli_num_rows($querre);
  }
   else {
    global $con;
  
      $ip = getIPAddress(); // Assuming getIPAddress() returns a valid IP address
      
      // Wrap $getpro_id and $ip with single quotes in the SQL query
      $querre = mysqli_query($con, "SELECT * FROM cart WHERE ip = '$ip'");
      
      $numofro = mysqli_num_rows($querre);
    }
    echo $numofro;
  }


// prize code


function price() {
  global $con;
  $ip = getIPAddress(); 
  $querre = mysqli_query($con, "SELECT * FROM cart WHERE ip = '$ip'");
  $tota = 0; // Initialize $tota to 0

  while ($row = mysqli_fetch_array($querre)) {
    $pro_id = $row['pro_id'];
    $proo =  mysqli_query($con, "SELECT * FROM products WHERE pro_id = $pro_id");

    while ($row2 = mysqli_fetch_array($proo)) {
      $pro_price = $row2['pro_price'];
      $tota += $pro_price; // Add the product price directly to $tota
    }
  }

  echo $tota;
}


// get user details
function order_details()
{
    global $con;
    $username = $_SESSION['username'];
    $getdet = mysqli_query($con, "select * from `users` where user_name= '$username'");
    while ($get = mysqli_fetch_array($getdet)) {
        $user_id = $get['user_id'];
        if (!isset($_GET['account'])) {
            if (!isset($_GET['order'])) {
                if (!isset($_GET['pending'])) {
                    $getorders = mysqli_query($con, "select * from `orders` where user_id = $user_id and order_state='pending'");
                    $countorder = mysqli_num_rows($getorders);
                    if ($countorder >= 0) {
                        echo "<h2>You have  $countorder pending orders</h2>";
                    }
                }
            }
        }
    }
}
?>



    










