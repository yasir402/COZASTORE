<?php
include('admin/config.php');
session_start();


if(isset($_GET['order'])){
    $order_id= $_GET['order'];
    $select = mysqli_query($con,"select * from `orders` where order_id =  $order_id");
    $fetch= mysqli_fetch_assoc($select);
}
if(isset($_POST['confirm'])){
    $invoice= $_POST['Invoice'];
    $amonnt= $_POST['Amount'];
    $pay_mode=$_POST['dropdown'];


    $insert=mysqli_query($con,"insert into `payments` (order_id,invoice,pay_mode,pay_date) values (  $order_id,   $invoice,'$pay_mode',now())");
if($insert){
    echo"<script> alert ('Payment done')     </script>";
        echo"<script> window.location.href='account_settings.php'</script>";
}


$update =mysqli_query($con,"update `orders` set order_state='complete' where order_id=  $order_id ");


}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beautiful Form</title>
    <!-- Include Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-200 p-8">
    <div class="max-w-md mx-auto bg-white p-8 rounded shadow-lg">
        <h2 class="text-2xl font-semibold mb-4">Confirm payment</h2>
        <form id="myForm" method="post">
            <div class="mb-4">
                <label for="name" class="block text-gray-600">Invoice</label>
                <input value="<?php echo $fetch['invoice']?>" type="text" id="name" name="Invoice" class="w-full px-4 py-2 border rounded-md focus:ring focus:ring-blue-400">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-600">Amount</label>
                <input value="<?php echo $fetch['due_amount']?>" type="text" id="email" name="Amount" class="w-full px-4 py-2 border rounded-md focus:ring focus:ring-blue-400">
            </div>
            <div class="mb-4">
                <label for="dropdown" class="block text-gray-600">Select an Option</label>
                <select id="dropdown" name="dropdown" class="w-full px-4 py-2 border rounded-md focus:ring focus:ring-blue-400">
                    <option value="">-----SELECT-----</option>
                    <option value="JAZZ CASH">JAZZ CASH</option>
                    <option value="EASYPAISA">EASYPAISA</option>
                    <option value="DEBIT CARD">DEBIT CARD</option>
                    <option value="PAY-OFFLINE">PAY-OFFLINE</option>


                </select>
            </div>
            <div>
            <button name="confirm" type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-400">CONFIRM</button>
            <a href="account_settings.php?order" class="bg-black hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded focus:outline-none focus:ring focus:ring-blue-400">
    BACK
</a>

         
        </div>
        </form>
    </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include your custom JavaScript -->
    <script >

    </script>
</body>
</html>























