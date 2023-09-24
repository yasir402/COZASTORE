<?php
include('admin/config.php');
include('funtion/common_function.php');


if(isset($_POST['register'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $password= $_POST['password'];
    $hash = password_hash($password,PASSWORD_DEFAULT);
    $c_password= $_POST['c_password'];
    $contact = $_POST['contact'];
$userip =  getIPAddress();
// select querryvxcv

$select= mysqli_query($con,"select * from `users` where user_email='$email' ");
$rows = mysqli_num_rows($select);
if($rows > 0){
    echo"<script> alert ('user already exists')     </script>";
}
elseif($password!= $c_password){

        echo"<script> alert ('passwords donot matched')     </script>";
}
else{

    $querry = mysqli_query($con,"insert into `users`(user_name,user_email,user_address,user_password,user_contact,user_ip) values ('$username','$email','$address','$hash','$contact','$userip') ");
if( $querry){
    echo"<script> alert ('registered')     </script>";
 
}
}
// selecting cart items
$cart = mysqli_query($con,"select * from `cart` where ip ='$userip' ");
$rowww= mysqli_num_rows($cart);
if($rowww>0){

    $_SESSION['username']=  $username;
    echo"<script> alert ('you have items in your cart')     </script>";

    echo"<script> window.location.href='checkout.php'</script>";

}
else{

    echo"<script> window.location.href='index.php'</script>";


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
                    <h2 class="text-center">REGISTER</h2>
                    <form autocomplete="off" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email"  name="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="text" class="form-label">Present Address</label>
                            <input type="text"  name="address" class="form-control" id="address" placeholder="Enter your Address">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your Password" oninput="validatePassword(this)">
<span>password and confirm password should be same</span>
                        </div>
                        <div class="mb-3">
                            <label for="c_password" class="form-label">Confirm_Password</label>
                            <input type="password" name="c_password" class="form-control" id="password" placeholder="Enter your confirm_Password" oninput="validatePassword(this)">

                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="text" name="contact" class="form-control" id="contact" placeholder="Enter your Contact" oninput="validateContact(this)">

                        </div>
                        <div class="d-grid">
                            <button type="submit" name="register" class="btn btn-primary">Register</button>
                            <a href="user_login.php">Already registered</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
function validateContact(input) {
    // Remove any non-digit characters (e.g., spaces, dashes)
    input.value = input.value.replace(/\D/g, '');

    // Ensure the input length is exactly 11 characters
    if (input.value.length !== 11) {
        // You can provide feedback to the user here (e.g., display an error message)
        // For now, we're just disabling the submit button if the input is invalid
        document.querySelector('button[type="submit"]').disabled = true;
    } else {
        // Re-enable the submit button if the input is valid
        document.querySelector('button[type="submit"]').disabled = false;
    }
}
</script>
<script>
function validatePassword(input) {
    const password = input.value;

    // Define regular expressions for checking password strength
    const regexLowercase = /[a-z]/;
    const regexUppercase = /[A-Z]/;
    const regexNumber = /[0-9]/;
    const regexSpecial =/[!@#$%^&*()_+{}\[\]:;<>,.?~\\-]/;

    // Check the password strength based on various criteria
    const isStrong = (
        password.length >= 8 &&
        regexLowercase.test(password) &&
        regexUppercase.test(password) &&
        regexNumber.test(password) &&
        regexSpecial.test(password)
    );

    // Display a message to the user based on password strength
    const strengthMessage = document.getElementById("password-strength-message");
    if (isStrong) {
        strengthMessage.textContent = "Strong Password ✓";
        strengthMessage.style.color = "green";
    } else {
        strengthMessage.textContent = "Password should be at least 8 characters long and include lowercase, uppercase, number, and special character.";
        strengthMessage.style.color = "red";
    }

    // Enable or disable the submit button based on password strength
    document.querySelector('button[type="submit"]').disabled = !isStrong;
}
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>
</html>
