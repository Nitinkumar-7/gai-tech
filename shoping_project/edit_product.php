<?php

// session is started here 
session_start();

// admin session is fetched here 
$admin = $_SESSION['admin'];

echo $p_id = $_SESSION['p_id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/myntra.css">
    <link rel="stylesheet" href="style/admin_style.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <title>PRODUCT</title>

</head>
<body>
<?php

// if admin session is not created redirect to login.php 

// navigation bar for admin section 
@include 'admin_header.php';


// user id session is called 
echo $_SESSION['u_id'];

// database connection is called 
include 'configer.php';

if (isset($_GET['p_id'])) {
	$p_id = $_GET['p_id'];

	// Fetch the category from the database
	$sql = "SELECT * FROM product WHERE p_id= '$p_id'";
	$result = mysqli_query($conn, $sql);

	if (mysqli_num_rows($result) > 0) {
		// Output form with data for the product
		$row = mysqli_fetch_assoc($result);
        echo '<div class="add_product_div">
        <div class="add_product"> Edit Category</div>';
		echo "<form class='mainform' action='#' method='POST' enctype='multipart/form-data'>";
		// echo "<input type='hidden' name='p_id' value='" . $row["p_id"] . "'>";
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
		echo "<input class='productinput' type='file' placeholder='IMAGE URL' name='avatar' id='avatar' value='" . $row["avatar"] . "'><br><br>";
		echo "<input class='btn' type='submit' name='submit' value='UPDATE'>";
		echo "</form>";
        echo "</div>";
        echo "</div>";
	} else {
		echo "Product not found.";
	}
	echo "</div>";
}

$_SESSION['avatar']=$row["avatar"];
 

if (isset($_POST['submit'])) {


    $p_name = $_POST['p_name'];
    $p_category = $_POST['p_category'];
    $p_price = $_POST['p_price'];

   // Initialize $flag to false

    if (!empty($avatar = $_FILES["avatar"]["name"])) {

        $flag = true;
        $target_dir = "uploads/"; // directory where the image will be uploaded
        $target_file = $target_dir . basename($_FILES["avatar"]["name"]); // full path of the uploaded file
        $avatarFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // get the file extension

        // Check if the file is an avatar
        $check = getimagesize($_FILES["avatar"]["tmp_name"]);
        if ($check === false) {
            $imgerror = "File is not an avatar.";
            $flag = false;
        }

        // Check if the file already exists in the directory
        if (file_exists($target_file)) {
            $imgerror = "IMAGE IS ALREADY EXIST";
            $flag = false;
        }

        // Check file size
        if ($_FILES["avatar"]["size"] > 15000000) {
            $imgerror = "TOO LARGE FILE";
            $flag = false;
        }

        // Allow certain file formats
        if (
            $avatarFileType != "jpg" && $avatarFileType != "png" && $avatarFileType != "jpeg"
            && $avatarFileType != "gif"
        ) {
            $imgerror = "ONLY JPG, JPEG, PNG & GIF IMAGES ";
            $flag = false;
        }

        // Upload the file
        if ($flag) {
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                // echo "The file ". ($_FILES["avatar"]["name"]). " has been uploaded.";
            } else {
                $imgerror = "SORRY, ERROR IN UPLOADING";
                $flag = false;
            }
        }

    }
    // display piture using url 

    else {
        $avatar = $_SESSION['avatar'];

        // $imgerror= "*IMAGE IS REQUIRED ";
        // $flag= false;
    }

   

        $sql = "UPDATE product SET p_name = '$p_name', p_category = '$p_category', p_price = '$p_price', avatar = '$avatar' WHERE p_id = '$p_id' ";
	echo $sql ;
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '<div class="modal fade" id="emptyCartModal" tabindex="-1" role="dialog" aria-labelledby="emptyCartModalLabel" aria-hidden="true" data-backdrop="static">';
            echo '<div class="popup modal-dialog modal-dialog-centered" role="document">';
            echo '<div class="modal-content">';
            echo '<div class="modal-header">';

            echo '<h3 class="bigtext modal-title" id="emptyCartModalLabel"> PRODUCT UPDATED </h3>';
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
            echo "error";
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }


        // header("Location: login.php");
       
    }

	?>
	</body>
	</html>
	

		