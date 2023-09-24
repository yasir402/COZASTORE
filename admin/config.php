<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'ecommerce';

$con = mysqli_connect($server,$username,$password,$database);
if($con){
    echo "";
}
else{
    echo "not connected";
}


?>