<?php
session_start();
@include 'configer.php';

$admin = $_SESSION['admin'];

// open only when authenticated
if(!isset($admin)){
   header('location:login.php');
};
?>
<!DOCTYPE html>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title></title>
</head>
<?php

// Check if the category ID is provided in the URL
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Delete the category from the database
  $sql = "DELETE FROM categories WHERE c_id = $id";
  $result = mysqli_query($conn, $sql);

  if ($result) {
  //   echo "<script> alert('CATEGORY DELETED SUCESSFULLY'); 

	// window.location.href = 'admin_page.php';
	// </script>";

  echo '<div class=" modal fade" id="emptyCartModal" tabindex="-1" role="dialog" aria-labelledby="emptyCartModalLabel" aria-hidden="true" data-backdrop="static">';
  echo '<div class="popup modal-dialog modal-dialog-centered" role="document">';
  echo '<div class="modal-content">';
  echo '<div class="modal-header">';
  echo '<h3 class="bigtext modal-title" id="emptyCartModalLabel">CATEGORY DELETED SUCESSFULLY</h3>';
  echo '</div>';
  echo '<div class="modal-footer">';
  echo '<a class= "closebtn btn btn-primary" href="admin_page.php" role="button">BACK</a>';
  echo '</div>';
  echo '</div>';
  echo '</div>';
  echo '</div>';

  // Show the modal popup using JavaScript
  echo '<script>$("#emptyCartModal").modal("show");</script>';
   
  } else {
    echo "Error: " . mysqli_error($conn);
  }
} else {
  // Redirect back to the categories page if no category ID is provided
  header('location:admin_page.php');
}

?>