<?php
include('admin/config.php');
include('funtion/common_function.php');
  include('includes/header.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Cart</title>

    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  
</head>
<body>


<div class="row px-1">
    <div class="col-md-12">
        <div class="row">
            <?php
            if(isset($_SESSION['username'])){
               echo "<script>     window.location.href = 'payment.php'      </script>";
            }else{
                echo "<script>     window.location.href = 'user_login.php'      </script>";
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


?>
