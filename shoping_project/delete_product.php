<?php
session_start();
// Connect to database
include 'configer.php';


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
	echo "<script> alert('PRODUCT DELETED SUCESSFULLY'); 

	window.location.href = 'admin_product.php';
	</script>";

} else {
	echo "Error deleting user: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
