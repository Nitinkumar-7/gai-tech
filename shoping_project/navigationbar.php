<?php
session_start();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/myntra.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>firstpage</title>

</head>

<?php
include "configer.php";

$u_id = $_SESSION['u_id'];
$phone = $_SESSION['phone'];
?>

<body>
  <header>
    <!-- navigation section start -->
    <nav>
      <!-- main division  -->
      <div class="container1">
        <div class="container0">
          <div class="logoimgdiv">
            <!-- logo image  -->
            <a href="myntra.php"><img class="logoimg"
                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-eqlSHJPKwe1riVNwVsJh_2e6KsKBmEmOX87ht807tQ&s"
                alt="LOGO"></a>
          </div>
          <!-- green background dropdown  -->
          <div class="green">

            <a class="link greendrop" href="men.php">MEN</a>
            <section class="hidden_menu_green hidden_menu">

              <!-- //sxdfcgvbhjnkmljnhbgvfcdx -->
              <?php

              include 'configer.php';
              $sql = "SELECT * FROM categories WHERE category = 'MEN' ORDER BY category_type, category_name";
              $result = mysqli_query($conn, $sql);

              // Group categories by category type and name
              $grouped_categories = array();
              while ($row = mysqli_fetch_assoc($result)) {
                $category_type = $row['category_type'];
                $category_name = $row['category_name'];
                if (!isset($grouped_categories[$category_type])) {
                  $grouped_categories[$category_type] = array();
                }
                $grouped_categories[$category_type][] = $category_name;
              }
              ?>

              <span class="dropspan">
                <ul class="dropdown-menu">

                  <?php
                  // Display categories in a table grouped by category type and name
                  echo "<table >";
                  echo '<tr>';
                  foreach ($grouped_categories as $category_type => $category_names) {
                    echo "<td class='tabledata'>";
                    echo "<h5 class='green_heading'>" . $category_type . '</h5><br>';
                    foreach ($category_names as $category_name) {
                      echo '<a href="men.php?name=' . $category_name . '">' . $category_name . '</a><br>';
                    }
                    echo '</td>';
                  }
                  echo '</tr>';
                  echo '</table>';
                  ?>
                </ul>
            </section>
          </div>
          <!-- green dropdown ends  -->

          <!-- yellow dropdown section -->
          <div class="yellow">
            <a class='link yellowdrop ' href="women.php">WOMEN</a>
            <section class="hidden_menu_yellow hidden_menu">

              <?php


              $sql = "SELECT * FROM categories WHERE category = 'WOMEN' ORDER BY category_type, category_name";


              $result = mysqli_query($conn, $sql);

              // Group categories by category type and name
              $grouped_categories = array();
              while ($row = mysqli_fetch_assoc($result)) {
                $category_type = $row['category_type'];
                $category_name = $row['category_name'];
                if (!isset($grouped_categories[$category_type])) {
                  $grouped_categories[$category_type] = array();
                }
                $grouped_categories[$category_type][] = $category_name;
              }
              ?>



              <span class='dropspan'>
                <ul class="dropdown-menu">



                  <?php
                  // Display categories in a table grouped by category type and name
                  echo "<table>";
                  echo '<tr>';
                  foreach ($grouped_categories as $category_type => $category_names) {
                    echo "<td class='tabledata'>";
                    echo "<h5 class='yellow_heading'>" . $category_type . '</h5><br>';
                    foreach ($category_names as $category_name) {
                      echo '<a href="women.php?name=' . $category_name . '">' . $category_name . '</a><br>';
                    }
                    echo '</td>';
                  }
                  echo '</tr>';
                  echo '</table>';
                  ?>
                </ul>


            </section>
          </div>
          <!-- yellow dropdown ends -->

          <!-- orange dropdown section  -->
          <div class="orange">
            <a class='link orangedrop' href="kids.php">KIDS</a>

            <section class="hidden_menu_orange hidden_menu">
              <?php

              $sql = "SELECT * FROM categories WHERE category = 'KIDS' ORDER BY category_type, category_name";

              $result = mysqli_query($conn, $sql);


              // Group categories by category type and name
              $grouped_categories = array();
              while ($row = mysqli_fetch_assoc($result)) {
                $category_typey = $row['category_type'];
                $category_namey = $row['category_name'];
                if (!isset($grouped_categories[$category_typey])) {
                  $grouped_categories[$category_typey] = array();
                }
                $grouped_categories[$category_typey][] = $category_namey;
              }
              ?>
              <span class='dropspan'>
                <ul class="dropdown-menu">
                  <?php
                  // Display categories in a table grouped by category type and name
                  echo "<table>";
                  echo '<tr>';
                  foreach ($grouped_categories as $category_typey => $category_names) {
                    echo "<td class='tabledata'>";
                    echo "<h5 class='orange_heading'>" . $category_typey . '</h5><br>';
                    foreach ($category_names as $category_namey) {
                      echo '<a href="kids.php?name=' . $category_namey . '">' . $category_namey . '</a><br>';
                    }
                    echo '</td>';
                  }
                  echo '</tr>';
                  echo '</table>';
                  ?>
                </ul>

            </section>
          </div>

          <!-- orange section ends  -->
        </div>
        <div class="hiddencontainer">
          <i class="fa fa-bars"></i>
        </div>

        <div class="container2"><!--this container using flex box-->

          <!-- search bar section  -->
          <form class="marginauto" action="search.php" method="GET">
            <div class="searchBox">

              <input class="searchInput" type="text" name="search" placeholder="SEARCH FOR PRODUCTS ">
              <button class="searchButton" href="#">
                <i class="fa fa-search" aria-hidden="true"></i>
              </button>

            </div>
          </form>


          <div class="profile_div">
            <a class="profile anchor_margin" href="#profile" alt='PROFILE'>
              <i class="fa fa-user-circle-o "></i>
            </a>

            <div class="drop_profile">
              <?php
              if (!isset($u_id)) {
                echo "<h6 class='orange_heading'>WELCOME</h6>
                  <p class='drop_info'>To access account and manage orders</p><br>
                  <a class='login_button' href='login.php'> LOGIN/SIGNUP</a>";
                // echo"<div class='profile_button' ><a class='login_button' href='logout.php'> LOGOUT</a></div>";
              
              } else {
                $sql = "SELECT * FROM users WHERE u_id= '$u_id'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_num_rows($result);
                echo "<span class='cyantext'>" . "WELCOME-USER" . "<span>" . "<br>" . "<br>";

                if ($row == 1) {
                  while ($row = mysqli_fetch_array($result)) {



                    echo "ID : " . $_SESSION['u_id'] = $u_id = $row['u_id'];
                    echo "<br>";
                    echo "NAME : " . $_SESSION['user_name'] = $user_name = $row['user_name'];
                    echo "<br>";
                    echo "PHONE : " . $_SESSION['phone'] = $phone = $row['phone'];
                    echo "<br>";
                    echo "EMAIL : " . $_SESSION['email'] = $row['email'];
                    echo "<br>";
                    echo "<section class='flexbutton'>";
                    echo "<div class='profile_button' ><a class='login_button' href='my_orders.php'>ORDERS</a></div>";
                    echo "<div class='profile_button' ><a class='login_button' href='user_update.php'>UPDATE</a></div>";
                    echo "<div class='profile_button' ><a class=' profile_button_red login_button' href='logout.php'> LOGOUT</a></div>";
                    echo "</section>";
                  }
                }
              }


              ?>


            </div>

          </div>

          <div class="cart_div">
            <?php

            $u_id = $_SESSION['u_id'];
            $select_cart_count = mysqli_query($conn, "SELECT * FROM `cart` WHERE u_id = '$u_id'") or die('query failed');
            $cart_num_rows = mysqli_num_rows($select_cart_count);
            
            ?>

            <span class="reddot">
              <?php echo $cart_num_rows; ?>
            </span>
            <a class="cart anchor_margin" href="cart.php" alt='CART'>
              <i class="fa fa-cart-plus "></i></a>
          </div>
          <button id="dark-mode-btn">dark/light</button>

        </div>
        <!-- <div class="light_dark"> -->



        <!-- </div> -->

      </div>

    </nav>
    <!-- navigation section ends  -->


  </header>
  <!-- header section ends  -->
</body>

<!-- script tag for the dark mode  -->
<script>
  const darkModeBtn = document.getElementById("dark-mode-btn");
  const body = document.getElementsByTagName("body")[0];

  darkModeBtn.addEventListener("click", () => {
    body.classList.toggle("dark-mode");
    const mainContainer = document.querySelector(".main_container");
    mainContainer.classList.toggle("dark-mode");

  });
</script>

</html>