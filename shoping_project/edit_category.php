<?php

// session start here 
session_start();

// include file configer.php to connect with database 
@include 'configer.php';

// navigation-bar for admin pannel 
@include 'admin_header.php';

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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $category = $_POST['category'];
  $category_type = $_POST['category_type'];
  $category_name = $_POST['category_name'];

  // Update the category in the database
  $sql = "UPDATE categories SET category = '$category', category_type = '$category_type', category_name = '$category_name' WHERE c_id = $id";
  $result = mysqli_query($conn, $sql);

  if ($result) {
    // Redirect back to the categories page after successful update
    header('location:categories.php');
  } else {
    echo "Error: " . mysqli_error($conn);
  }
}

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
  <title>Edit-Category</title>
</head>

<body>
  <div class="add_product_div">
    <div class="add_product"> Edit Category</div>

    <!-- form for edit category  -->
    <form class="mainform" action="#" method="POST">
      <label for="category">Category:</label><br>
      <input class="productinput" type="text" id="category" name="category" value="<?php echo $category; ?>"><br><br>
      <label for="category_type">Category Type:</label><br>
      <input class="productinput" type="text" id="category_type" name="category_type"
        value="<?php echo $category_type; ?>"><br><br>
      <label for="category_name">Category Name:</label><br>
      <input class="productinput" type="text" id="category_name" name="category_name"
        value="<?php echo $category_name; ?>"><br><br>
      <input class="productinput" type="submit" value="Update">
    </form>
</body>

</html>