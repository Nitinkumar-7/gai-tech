<?php

// session start here 
session_start();

// include file configer.php to connect with database 
@include 'configer.php';

// navigation-bar for admin pannel 
@include 'admin_header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSS IS ADDED BY myntra.css and edit.css  -->
  <link rel="stylesheet" href="style/myntra.css">
  <link rel="stylesheet" href="style/edit.css">
  <!-- font awesome cdn link  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <title>Edit-Category</title>
</head>

<?php

$admin = $_SESSION['admin'];

// redireact to login.php 
if (!isset($admin)) {
  header('location:login.php');
}
;

// Check if the category ID is provided in the URL
if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // Fetch the category from the database
  $sql = "SELECT * FROM categories WHERE c_id = $id";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    $row = mysqli_fetch_assoc($result);
    $category = $row['category'];
    $category_type = $row['category_type'];
    $category_name = $row['category_name'];
  } else {
    echo "Error: " . mysqli_error($conn);
  }
} else {
  // Redirect back to the categories page if no category ID is provided
  header('location:categories.php');
}

// Handle form submission
if (isset($_POST['update'])) {
  $category = $_POST['category'];
  $category_type = $_POST['category_type'];
  $category_name = $_POST['category_name'];

  // Update the category in the database
  $sql = "UPDATE categories SET category = '$category', category_type = '$category_type', category_name = '$category_name' WHERE c_id = $id";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    
    echo '<div class=" modal fade" id="emptyCartModal" tabindex="-1" role="dialog" aria-labelledby="emptyCartModalLabel" aria-hidden="true" data-backdrop="static">';
    echo '<div class="popup modal-dialog modal-dialog-centered" role="document">';
    echo '<div class="modal-content">';
    echo '<div class="modal-header">';
    echo '<h3 class="bigtext modal-title" id="emptyCartModalLabel"> CATEGORY UPDATED </h3>';
    echo '</div>';
 
    echo '<div class="modal-footer">';
    echo '<a class= "closebtn btn btn-primary" href="admin_page.php" role="button">OK</a>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '</div>';

    // Show the modal popup using JavaScript
    echo '<script>$("#emptyCartModal").modal("show");</script>';
    
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}

?>

<body>
  <div class="add_product_div">
    <div class="add_product"> Edit Category</div>

    <!-- form for edit category  -->
    <form class="mainform" action="#" method="POST">
      <label for="category">Category:</label><br>
      <input class="productinput" type="text" id="category" name="category" value="<?php echo $category; ?>" required><br><br>
      <label for="category_type">Category Type:</label><br>
      <input class="productinput" type="text" id="category_type" name="category_type"
        value="<?php echo $category_type; ?>" required><br><br>
      <label for="category_name">Category Name:</label><br>
      <input class="productinput" type="text" id="category_name" name="category_name"
        value="<?php echo $category_name; ?>" required><br><br>
      <input class="productinput" type="submit" value="Update" name="update">
    </form>
</body>

</html>