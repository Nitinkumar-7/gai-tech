<?php
session_start();
// Connect to database
include 'configer.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style/myntra.css">
	<link rel="stylesheet" href="style/edit.css">
	<!-- font awesome cdn link  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<title>delete product</title>
</head>
<?php
$admin = $_SESSION['admin'];

// open only when authenticated
if(!isset($admin)){
   header('location:login.php');
};


// Check if user ID was provided
if (!isset($_GET['p_id'])) {
	echo "No user ID provided";
	exit();
}

// Get user ID from URL parameter
$p_id = $_GET['p_id'];

// Delete user from database
$sql = "DELETE FROM product WHERE p_id = $p_id";
if (mysqli_query($conn, $sql)) {

	echo '<div class=" modal fade" id="emptyCartModal" tabindex="-1" role="dialog" aria-labelledby="emptyCartModalLabel" aria-hidden="true" data-backdrop="static">';
	echo '<div class="popup modal-dialog modal-dialog-centered" role="document">';
	echo '<div class="modal-content">';
	echo '<div class="modal-header">';
	echo '<h3 class="bigtext modal-title" id="emptyCartModalLabel"> PRODUCT DELETED SUCESSFULLY </h3>';
	echo '</div>';

	echo '<div class="modal-footer">';
	echo '<a class= "closebtn btn btn-primary" href="admin_product.php" role="button">OK</a>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
	echo '</div>';

	// Show the modal popup using JavaScript
	echo '<script>$("#emptyCartModal").modal("show");</script>';
} else {
	echo "Error deleting user: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>