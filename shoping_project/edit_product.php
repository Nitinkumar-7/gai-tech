<?php
session_start();

$admin = $_SESSION['admin'];

// redireact to login.php 
if (!isset($admin)) {
  header('location:login.php');
}
;
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
	<title>Edit Product</title>
</head>


</style>

<body>
	<h2 class='add_product_div'>Edit Product</h2>
	<?php
	// Connect to databas
	include 'configer.php';

	@include 'admin_header.php';

	// Get product ID from URL parameter
	$p_id = $_GET["p_id"];

	// Fetch data for the product with the specified ID
	$sql = "SELECT * FROM product WHERE p_id=" . $p_id;
	$result = mysqli_query($conn, $sql);
	echo "<div class='add_product_div'>";
	if (mysqli_num_rows($result) > 0) {
		// Output form with data for the product
		$row = mysqli_fetch_assoc($result);
		echo "<form action='update_product.php' method='POST' enctype='multipart/form-data'>";
		echo "<input type='hidden' name='p_id' value='" . $row["p_id"] . "'>";
		echo "<label for='p_name'>Product Name:</label>";
		echo "<input class='productinput' type='text' id='p_name' name='p_name' value='" . $row["p_name"] . "' required><br><br>";
		echo "<label for='category'>Product Category:</label>";
		echo "<select id='category' name='p_category'>";
		echo "<option value='KID'" . ($row["p_category"] == "KID" ? " selected" : "") . ">KIDS</option>";
		echo "<option value='MEN'" . ($row["p_category"] == "MEN" ? " selected" : "") . ">MEN</option>";
		echo "<option value='WOMEN'" . ($row["p_category"] == "WOMEN" ? " selected" : "") . ">WOMEN</option>";
		echo "</select>";
		echo "<label for='p_price'>Product Price:</label>";
		echo "<input class='productinput' type='text' id='p_price' name='p_price' value='" . $row["p_price"] . "' required><br><br>";
		echo "<label for='avatar'>Avatar:</label>";
		echo "<img src='uploads/" . $row["avatar"] . "' width='100' height='100'><br>";
		echo "<input class='productinput' type='file' placeholder='IMAGE URL' name='avatar' id='avatar'><br><br>";
		echo "<input class='btn' type='submit' name='submit' value='UPDATE'>";
		echo "</form>";
	} else {
		echo "Product not found.";
	}
	echo "</div>";


	mysqli_close($conn);
	?>
</body>

</html>