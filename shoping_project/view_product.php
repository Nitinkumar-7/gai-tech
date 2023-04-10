<?php
session_start();

// include the database configuration file
include 'configer.php';
// navigationbar.php file is include here for navigation bar 
@include 'navigationbar.php';

$admin = $_SESSION['admin'];


// check if product ID is set
$u_id = $_SESSION['u_id'];
if (isset($_GET['id'])) {

    // get the product ID from the URL parameter
    $product_id = $_GET['id'];

    // query the database to get the product details
    $select_product = mysqli_query($conn, "SELECT * FROM `product` WHERE p_id = '$product_id' ") or die('query failed');

    // check if the query returned any results
    if (mysqli_num_rows($select_product) > 0) {

        // fetch the product details
        $fetch_product = mysqli_fetch_assoc($select_product);
        ?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="style/logoutscreen.css">
            <title>
                <?php echo $fetch_product['p_name']; ?>
            </title>
        </head>
        <style>

        </style>


        <body>
            <section class="fullbody">

            <!-- first div which fetch the product name , price ,category  -->
                <div class="firstdivision">
                    <h1 class="bigheading">
                        <?php echo $fetch_product['p_name']; ?>
                    </h1>
                    <p class="p_text">Price: ₹
                        <?php echo $fetch_product['p_price']; ?>
                    </p>
                    <p class="p_text">Category:
                        <?php echo $fetch_product['p_category']; ?>
                    </p>
                    <img class="img_product" src="uploads/<?php echo $fetch_product['avatar']; ?>" alt="Product Image">
                </div>

                <!-- second div which insert data   -->
                <div class="seconddivision">
                    <!-- add the "Add to Cart" button -->
                    <form action="#" method="post">
                        <input type="hidden" name="u_id" value="<?php echo $_SESSION['u_id']; ?>">
                        <input type="hidden" name="product_id" value="<?php echo $fetch_product['p_id']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $fetch_product['p_name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $fetch_product['p_price']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $fetch_product['avatar']; ?>">
                        <input type="hidden" name="product_category" value="<?php echo $fetch_product['p_category']; ?>"><br>
                        <div class="centerr">
                            <label for="product_quantity">Quantity:</label>
                            <input type="number" name="product_quantity" value="1" min="0" id="product_quantity">
                        </div>
                        <input type="submit" value="Add to Cart" name="add_to_cart">
                    </form>
                </div>
            </section>
        </body>

        </html>

        <?php
    } else {
        // if no results were returned, display an error message
        echo 'Product not found.';
    }
} else {
    // if product ID is not set, redirect back to the products page
    header('Location: men.php');
}

$phone = $_SESSION['phone'];

// on button click 
if (isset($_POST['add_to_cart'])) {
    if (!isset($phone)) {
        echo "<script> alert('Please login to add items in cart!'); 
        window.location.href = 'login.php';
        </script>";
    } else {
        // post data
        $u_id = $_POST['u_id'];
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_category = $_POST['product_category'];
        $product_quantity = $_POST['product_quantity'];

        // insert data into cart table
        $insert_cart = mysqli_query($conn, "INSERT INTO cart (u_id, product_id, product_name, product_price, product_image, product_category, product_quantity) VALUES ('$u_id', '$product_id', '$product_name', '$product_price', '$product_image', '$product_category', '$product_quantity')") or die('query failed');
    }
}

?>