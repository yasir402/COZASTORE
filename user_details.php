
<!-- fetching user details -->
<?php
// Include your database connection here (e.g., include('db_connection.php'))

// Initialize variables
$user_id = 0;
$row = array();

// Fetch user details
if (isset($_GET['account'])) {
    $session = $_SESSION['username'];
    $query = mysqli_query($con, "SELECT * FROM `users` WHERE user_name = '$session'");
    $row = mysqli_fetch_array($query);
    $user_id = $row['user_id'];
}

// Check if the form is submitted for updating data
if (isset($_POST['update'])) {
    // Get the form values
    $update_id = $user_id;
    $newUsername = mysqli_real_escape_string($con, $_POST['username']);
    $newEmail = mysqli_real_escape_string($con, $_POST['email']);
    $newAddress = mysqli_real_escape_string($con, $_POST['address']);
    $newContact = mysqli_real_escape_string($con, $_POST['contact']);

    // Perform validation if necessary

    // Update the user's information in the database
    $updateQuery = "UPDATE users SET user_name = '$newUsername', user_email = '$newEmail', user_address = '$newAddress', user_contact = '$newContact' WHERE user_id = $update_id";

    if (mysqli_query($con, $updateQuery)) {
        // Update successful
        echo "<script>alert('Update successful');</script>";
        echo "<script>window.location.href='logout.php'</script>";
    } else {
        // Update failed
        echo "Error updating user information: " . mysqli_error($con);
    }
}

// Check if the form is submitted for account deletion
if (isset($_POST['delete'])) {
    $user_namee = $_SESSION['username'];
    $delete = mysqli_query($con, "DELETE FROM `users` WHERE user_name = '$user_namee'");
    if ($delete) {
        session_destroy();
        echo "<script>alert('account deleted');</script>";
        echo "<script>window.location.href='index.php'</script>";
    } else {
        echo "<script>alert('Error deleting account');</script>";
    }
}
?>

<!-- Rest of your HTML code -->



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


        <div class="justify-content-center">
            <div class="col-md-6 col-sm-8">
                <div class="login-container">
                    <h2 class="text-center">My account</h2>
                    <form autocomplete="off" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" value="<?php echo  $row['user_name']    ?>" class="form-control" name="username" id="username" placeholder="Enter your username">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" value="<?php echo $row['user_email']    ?>"   name="email" class="form-control" id="email" placeholder="Enter your email">
                        </div>
                        <div class="mb-3">
                            <label for="text" class="form-label">Present Address</label>
                            <input type="text" value="<?php echo $row['user_address']    ?>"  name="address" class="form-control" id="address" placeholder="Enter your Address">
                        </div>
                      
                    
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="text" name="contact" value="<?php echo $row['user_contact']    ?>"  class="form-control" id="contact" placeholder="Enter your Contact" oninput="validateContact(this)">

                        </div>
                        <div class="d-grid">
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                            <br>
                            <form action="" method="post">
                            <button type="submit" name="delete" class="btn btn-danger" id="deleteAccount">Delete my account</button>
</form>
<!-- Include SweetAlert CSS and JavaScript files -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Add a click event listener to the "Delete" button
    document.getElementById('deleteAccount').addEventListener('click', function () {
        // Show a SweetAlert confirmation dialog
        Swal.fire({
            title: 'Confirm Deletion',
            text: 'Are you sure you want to delete your account?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                // If the user confirms, submit the form to delete the account
                document.forms[0].submit();
            }
        });
    });
});
</script>

                        </div>
                    </form>
                </div>
            </div>

    </div>
