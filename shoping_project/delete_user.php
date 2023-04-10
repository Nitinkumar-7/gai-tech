<?php
// Connect to database
include 'configer.php';

$admin = $_SESSION['admin'];

// open only when authenticated
if(!isset($admin)){
   header('location:login.php');
};


// Check if user ID was provided
if (!isset($_GET['id'])) {
	echo "No user ID provided";
	exit();
}

// Get user ID from URL parameter
$user_id = $_GET['id'];

// Delete user from database
$sql = "DELETE FROM users WHERE u_id = $user_id";
if (mysqli_query($conn, $sql)) {
	echo "<script> alert('USER DELETED SUCESSFULLY'); 

	window.location.href = 'admin_users.php';
	</script>";

} else {
	echo "Error deleting user: " . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>
