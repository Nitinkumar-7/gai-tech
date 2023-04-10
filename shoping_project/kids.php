<?php
  session_start();
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style/men.css">
  <link rel="stylesheet" href="style/myntra.css">
  <title>men</title>
</head>

<body>

  <!-- navigation section start -->
  <?php
 

  include 'configer.php';
  // navigationbar.php file is include here for navigation bar 
  @include 'navigationbar.php';
  // slider.php file is include here for slider 
  @include 'slider.php';

  $u_id = $_SESSION['u_id'];
  ?>
  <!-- main box which hold full page   -->
  <div class="big_box">

    <!-- container grid -->
    <div class="main_container">

      <?php
      // sql query to select data from table 
      $select_products = mysqli_query($conn, "SELECT * FROM `product` WHERE p_category = 'KID' ") or die('query failed');

      if (mysqli_num_rows($select_products) > 0) {

        while ($fetch_products = mysqli_fetch_assoc($select_products)) {
          // loop to show full data 
          ?>
          <section class="container_boxes box1">
            <!-- product container   -->
            <!--  form to add the item in the cart -->
            <form action="" method="POST" class="">

              <!-- fetch image and show here   -->
              <!-- <img src="uploads/<?php echo $fetch_products['avatar']; ?>" alt="" class="productimage"> -->
              <a href="view_product.php?id=<?php echo $fetch_products['p_id']; ?>"><img src="uploads/<?php echo $fetch_products['avatar']; ?>" alt="" class="productimage"></a>
     
              <div class="price">

                <h3>
                  <!-- fetch the product name  -->
                  <?php echo $fetch_products['p_name']; ?>
                </h3>
                <b>₹:
                  <!-- fetch the product price -->
                  <?php echo $fetch_products['p_price']; ?>
                </b>
                <!-- input field to send data in card -->
                <input type="hidden" name="u_id" value="<?php echo $_SESSION['u_id']; ?>">
                <input type="hidden" name="product_id" value="<?php echo $fetch_products['p_id']; ?>">
                <input type="hidden" name="product_name" value="<?php echo $fetch_products['p_name']; ?>">
                <input type="hidden" name="product_price" value="<?php echo $fetch_products['p_price']; ?>">
                <input type="hidden" name="product_image" value="<?php echo $fetch_products['avatar']; ?>">
                <input type="hidden" name="product_category" value="<?php echo $fetch_products['p_category']; ?>"><br>
                <label class="center"> QUANTITY :
                  <input type="number" name="product_quantity" value="1" min="0" class="qty, btn">
                </label>
                <input type="submit" value="add to cart" name="add_to_cart" class="btn hiddenbtn">
              </div>
            </form>

          </section>



          <?php
        }
      } else {

        echo '<p class="empty">no products added yet!</p>';
      }
      ?>
    </div>

  </div>
  <div>
    <?php


    // @include 'footer.php';
    
    ?>

  </div>
  <?php
  $phone= $_SESSION['phone'];
  if (isset($_POST['add_to_cart'])) {

    if(!isset($phone)){

      echo "<script> alert('please login to add items in cart ! '); 

      window.location.href = 'login.php';
      </script>";


      // header("Location:login.php");
    }
    else{
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

  @include 'footer.php';
  ?>



</body>

</html>