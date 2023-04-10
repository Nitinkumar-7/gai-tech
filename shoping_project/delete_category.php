<?php
session_start();
@include 'configer.php';

$admin = $_SESSION['admin'];

// open only when authenticated
if(!isset($admin)){
   header('location:login.php');
};

// Check if the category ID is provided in the URL
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Delete the category from the database
  $sql = "DELETE FROM categories WHERE c_id = $id";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    echo "<script> alert('CATEGORY DELETED SUCESSFULLY'); 

	window.location.href = 'admin_page.php';
	</script>";
   
  } else {
    echo "Error: " . mysqli_error($conn);
  }
} else {
  // Redirect back to the categories page if no category ID is provided
  header('location:admin_page.php');
}

?>