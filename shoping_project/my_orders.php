<?php
session_start();

include 'configer.php';

echo $phone = $_SESSION['phone'];

//  if not authenticated redirect to logoutscreen.php 
if (!isset($phone)) {
  header('location:logoutscreen.php');
}


$u_id = $_SESSION['u_id'];

@include 'navigationbar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style/myntra.css">
  <link rel="stylesheet" href="style/admin_style.css">
  <!-- <link rel="stylesheet" href="style/contact.css"> -->

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>MY-ORDERS</title>

</head>

<body>
  <table class="margin-top_table">

    <!-- table heading is given here  -->
    <h2 class=' margin-top_table'> ALL ORDERS </h2>
    <thead>

      <!-- table headers is used here  -->
      <tr>
        <th>Order ID</th>

        <th>Name</th>
        <th>Phone</th>
        <th>Pincode</th>
        <th>Address</th>
        <th>City</th>
        <th>State</th>
        <th>Product Names</th>
        <th>Product Quantities</th>
        <th>Total Price</th>
        <th>ORDER-ON</th>

      </tr>
    </thead>

    <!-- table body is use to show data in the table  -->
    <tbody>
      <?php


      // Select all orders from the table
      $sql = "SELECT * FROM orders WHERE u_id = '$u_id'";
      $result = mysqli_query($conn, $sql);

      // Loop through each row in the table and display the data
      if (mysqli_num_rows($result) > 0) {

        // fetch data from the databse using associative arrays 
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $row["order_id"] . "</td>";

          echo "<td>" . $row["name"] . "</td>";
          echo "<td>" . $row["phone"] . "</td>";
          echo "<td>" . $row["pincode"] . "</td>";
          echo "<td>" . $row["address"] . "</td>";
          echo "<td>" . $row["city"] . "</td>";
          echo "<td>" . $row["state"] . "</td>";
          echo "<td>" . $row["product_names"] . "</td>";
          echo "<td>" . $row["product_quantities"] . "</td>";
          echo "<td>" . $row["total_price"] . "</td>";
          echo "<td>" . $row["created_at"] . "</td>";

        }
      } else {
        // else part if there is no orders present 
        echo "<tr><td colspan='13'>No orders found</td></tr>";
      }

      // Close database connection
      mysqli_close($conn);
      ?>
    </tbody>
  </table>




</body>

</html>