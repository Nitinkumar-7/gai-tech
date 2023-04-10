<?php
// session started here 
session_start();

// connection establish
include "configer.php";

// navigation bar included 
@include 'navigationbar.php';

 $phone = $_SESSION['phone'];

//  if not authenticated redirect to logoutscreen.php 
if (!isset($phone)) {
    header('location:logoutscreen.php');
}

$u_id = $_SESSION['u_id'];
if(!isset($u_id)){
    header("Location:login.php");
}


// sessions called 
$u_id = $_SESSION['u_id'];
$_SESSION['user_name'];
$_SESSION['phone'];
$_SESSION['registered'];
$_SESSION['u_id'];
$_SESSION['pincode'];
$_SESSION['address'];
$_SESSION['city'];
$_SESSION['state'];



// sql query to select data from the cart table 
$sql = "SELECT * FROM cart WHERE u_id = '$u_id'";

$result = mysqli_query($conn, $sql);
$row = mysqli_num_rows($result);

if ($row >= 1) {
    while ($row = mysqli_fetch_array($result)) {

        $_SESSION['u_id'] = $u_id = $row['u_id'];

        $product_ids.= $row['product_id'];

        $product_names.= $row['product_name'];

        $total_price+= $row['product_price'];

        $product_quantities+= $row['product_quantity'];

    }
}

$_SESSION['product_quantity'] = $product_quantities;

$_SESSION['total_price'] = $total_price;

$_SESSION['product_ids'] = $product_ids;

$_SESSION['product_names'] = $product_names;

$_SESSION['u_id'];

$_SESSION['product_quantities'] = $product_quantities;



if (isset($_POST['order'])) {
    
    $quary ="DELETE FROM cart WHERE u_id = '$u_id'";
   
    if (mysqli_query($conn, $quary)){

    // Get the values from the form
    $u_id = $_SESSION['u_id'];
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $pincode = $_POST["pincode"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];
    $product_names = $_POST["products"];
    $product_quantities = $_POST["quantity"];
    $total_price = $_POST["price"];

    // Construct the SQL query to insert the data
    $sql = "INSERT INTO orders (u_id, name, phone, pincode, address, city, state, product_names, product_quantities, total_price) 
            VALUES ('$u_id', '$name', '$phone', '$pincode', '$address', '$city', '$state', '$product_names', '$product_quantities', '$total_price')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        
        echo "<script> alert('Order placed successfully'); 
  window.location.href = 'myntra.php';
  </script>";

    } else {
        echo "Error: " . $sql  . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/myntra.css">
    <link rel="stylesheet" href="style/order.css">

    <title>Order Page</title>
</head>
<style>
  
</style>
</head>

<body>
    <div class="flex_div">
        <div class="full_div">
            <h1 class=blue> WELCOME
                <?php echo $_SESSION['user_name']; ?></h1>
            <h3>YOUR ADDRESS</h3>
            <b> PHONE </b> =
            <?php echo $_SESSION['phone']; ?><br>
            PIN_CODE :
            <?php echo $_SESSION['pincode']; ?><br>
            ADDRESS :
            <?php echo $_SESSION['address']; ?><br>
            CITY :
            <?php echo $_SESSION['city']; ?><br>
            STATE :
            <?php echo $_SESSION['state']; ?><br>

            <a class="update_address" href="update_address.php"> CHANGE ADDRESS</a>



        </div>


        <div class="container">
            <h1>PLACE ORDER</h1>

            <!-- form to insert data into the order table  -->
            <form action="#" method="post">
                
                <input value="<?php echo $_SESSION['user_name'];?>" type="hidden" id="name" name="name" required>

                <input value="<?php echo $_SESSION['phone'];?>" type="hidden" id="phone" name="phone" required>

                <input value="<?php echo $_SESSION['pincode'];?>" type="hidden" id="pincode" name="pincode" required>

                <input value="<?php echo $_SESSION['address'];?>" type="hidden" id="address" name="address" required>

                <input value="<?php echo $_SESSION['city'];?>" type="hidden" id="city" name="city" required>

                <input value="<?php echo $_SESSION['state'];?>" type="hidden" id="state" name="state" required>

                <input value="<?php echo $_SESSION['product_names'];?>" type="hidden" id="product" name="products"
                    required>

                <input value="<?php echo $_SESSION['product_quantities'];?>" type="hidden" id="quantity"
                    name="quantity" required>

                <input value="<?php echo $_SESSION['total_price'];?>" type="hidden" id="price" name="price" required>

                <input type="submit" name="order" value=" ORDER">
            </form>
        </div>
    </div>
</body>

</html>
<?php


