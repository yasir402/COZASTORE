<?php
include('admin/config.php');

session_start();
include('funtion/common_function.php');

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // You should perform validation and sanitization on $username and $password here.
    // For security reasons, never store plain passwords in your database. Always hash them.

    // Assuming you have a database table named 'users' with columns 'username' and 'password'
    $query = "SELECT * FROM users WHERE user_name = '$username'";
    $result = mysqli_query($con, $query);
$count = mysqli_num_rows($result);
$hash = mysqli_fetch_assoc($result);
$ip = getIPAddress();
// cart checking
$cart = mysqli_query($con,"select * from `cart` where ip ='$ip' ");
$count_cart = mysqli_num_rows($cart);


if($count >0){
  if(password_verify($password,$hash['user_password'])){
    // echo"<script> alert ('Successfully loged in')     </script>";
if($count ==1 and $count_cart ==0 ){
 
    $_SESSION['username'] =$username;
    echo"<script> alert ('login successfully')     </script>";
    echo"<script> window.location.href='index.php'</script>";
}
else{
 
    $_SESSION['username'] =$username;
    echo"<script> alert ('login successfully')     </script>";
    echo"<script> window.location.href='payment.php'</script>";
}
  }
  else{
    echo"<script> alert ('Invalid credentials')     </script>";
  }
}else{
    echo"<script> alert ('Invalid credentials')     </script>";
}
   
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            margin-top: 10vh;
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-8">
                <div class="login-container">
                    <h2 class="text-center">Login</h2>
                    <form autocomplete="off" method ="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username" placeholder="Enter your username">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                        </div>
                        <div class="d-grid">
                            <button type="submit" name="submit" class="btn btn-primary">Login</button>
                            <a href="user_register.php">Dont have an account!</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
