<?php
require ("config.php");



if(isset($_POST['login'])){
    $username=$_POST['name'];
    $password= $_POST['password'];
    $query ="SELECT * FROM `admin` WHERE admin_name='$username' and admin_password	='$password'";
    $res= mysqli_query($con,$query);
    $count = mysqli_num_rows($res);
    if($count>0){
		echo "<script>alert('Successfully LOGIN')</script>";

		session_start();
        $_SESSION['ADMIN_LOGIN']=true;
        $_SESSION['ADMIN_USERNAME']=$username;
        header('location:main.php');
        die();

    }
    else{
		echo "<script>alert('LOGIN FAILED')</script>";
    }
}

?>



<!doctype html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="admin_style.css">

</head>
<body>
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
					
			   
						<div class="card-3d-wrap mx-auto">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<div class="section text-center">
											<h4 class="mb-4 pb-3">Log In</h4>
											<div class="form-group">
                                                <form autocomplete="off" method="POST" >
												<input type="text" name="name" class="form-style" placeholder="admin_name">
												<i class="input-icon uil uil-at"></i>
											</div>	
											<div class="form-group mt-2">
												<input type="password" name="password" class="form-style" placeholder="Password">
												<i class="input-icon uil uil-lock-alt"></i>
                                            </div>
                                            <br>
                                            <button name="login" type="submit" class="btn">LOGIN</button>
                                            


                                            </form>
                      					
					</div>
			      					</div>
			      				</div>
								
		      	</div>
	      	</div>
	    </div>
	</div>
</body>
</html>












