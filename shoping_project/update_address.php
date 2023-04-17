<?php
session_start();
// session start to use sessions 

// connected with database
include "configer.php";

// navigationbar is added 
@include 'navigationbar.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/contact.css">

    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>DETAILS</title>
</head>


<?php

$u_id = $_SESSION['u_id'];
if (!isset($u_id)) {
    header("Location:login.php");
}

function test($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    return ($data);
}

$_SESSION['user_name'];
$_SESSION['phone'];
$_SESSION['registered'];
$_SESSION['u_id'];
$_SESSION['pincode'];
$_SESSION['address'];
$_SESSION['city'];
$_SESSION['state'];

$nameerr = $phoneerr = $pin_codeerr = null;
$flag = TRUE;

if (isset($_POST['submit'])) {

    // Retrieve the form data using the POST method

    // name validation
    if (empty($_POST["name"])) {
        $nameerr = "**REQUIRED FIELD NAME ";
        $flag = false;
    } elseif
    (!preg_match("/^[A-Z]*$/", $_POST['name'])) {
        $nameerr = "CAPITAL LETTERS ONLY ";
        $flag = false;
    } else {
        $name = test($_POST['name']);
    }
    // name validation ends^^^^^
    $phone = test($_POST['phone']);
    if (!preg_match('/^[0-9]{10}+$/', $_POST['phone'])) {
        $phoneerr = "INVALID PHONE NUMBER ";
        $flag = false;
    } else {

        $check = "SELECT *FROM users WHERE phone = '$phone' ";
        $check_result = mysqli_query($conn, $check);

        if (mysqli_num_rows($check_result) < 1) {
            $phoneerr = "DOESN'T EXIST !!";
            $flag = false;
        } else {

            $phone = test($_POST['phone']);

        }
    }
    if (!preg_match("/^[0-9]{6}+$/", $_POST['pincode'])) {
        $pin_codeerr = "PIN-CODE SHOULD BE OF 6 CHARACTERS  ";
        $flag = false;
    } else {
        // echo $pin;
        $pincode = test($_POST['pincode']);
    }

    $address = $_POST["address"];
    $city = $_POST["city"];
    $state = $_POST["state"];

    // sql query to insert location data into table

    if ($flag) {
        $sql = "UPDATE addresses 
        SET name = '$name', phone = '$phone', pincode = '$pincode', address = '$address', city = '$city', state = '$state'
        WHERE u_id = '$u_id'";


        // Execute the SQL statement
        if (mysqli_query($conn, $sql)) {
            // echo "<script> alert('ADDRESS IS UPDATED '); 
            // window.location.href = 'contactdetails.php';
            // </script>";

            echo '<div class=" modal fade" id="emptyCartModal" tabindex="-1" role="dialog" aria-labelledby="emptyCartModalLabel" aria-hidden="true" data-backdrop="static">';
            echo '<div class="popup modal-dialog modal-dialog-centered" role="document">';
            echo '<div class="modal-content">';
            echo '<div class="modal-header">';
            echo '<h3 class="bigtext modal-title" id="emptyCartModalLabel">YOUR ADDRESS IS UPDATED</h3>';
            echo '</div>';
            echo '<div class="poppara modal-body">';
            echo 'Your Address Is Updated, Continue Your Order';
            echo '</div>';
            echo '<div class="modal-footer">';
            echo '<a class= "closebtn btn btn-primary" href="contactdetails.php" role="button">OK</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

            // Show the modal popup using JavaScript
            echo '<script>$("#emptyCartModal").modal("show");</script>';
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
}

?>

<body>
    <!-- html form is created below -->

    <!-- main section  -->
    <section class="center">

        <!-- from is created -->
        <form class="order" action="#" method="POST">

            <!-- labels and input field are used in this form   -->
            <div class="inputdivision">
                <label class="firstlabel" for="">CONTECT DETAILS</label>
            </div>
            <div class="inputdivision textcenter">
                <input class="input" type="text" value="<?php echo $_SESSION['user_name']; ?>" name="name"
                    placeholder="PLACE ORDER WITH NEW NAME " required> <span>
                    <?php echo $nameerr; ?>
                </span>
            </div>

            <div class="inputdivision textcenter">
                <input class="input" value="<?php echo $_SESSION['phone']; ?>" type="tel" name="phone"
                    placeholder="Mobile No*" required> <span>
                    <?php echo $phoneerr; ?>
                </span>
            </div>

            <div class="inputdivision">
                <label class="secondlabel" for="">ADDRESS</label>
            </div>

            <div class="inputdivision  textcenter">
                <input class="input" value="<?php echo $_SESSION['pincode']; ?>" type="text" name="pincode"
                    placeholder="Pin Code*" required>
                <span>
                    <?php echo $pin_codeerr; ?>
                </span>
            </div>

            <div class="inputdivision  textcenter">
                <input class="input" value="<?php echo $_SESSION['address']; ?>" type="text" name="address"
                    placeholder="address*" required>
            </div>

            <div class="inputdivision textcenter">
                <input class="input" value="<?php echo $_SESSION['city']; ?>" type="text" name="city" placeholder="City"
                    required>
            </div>

            <div class="inputdivision textcenter">
                <input class="input" value="<?php echo $_SESSION['state']; ?>" type="text" name="state"
                    placeholder="State" required>
            </div>

            <div class="inputdivision  textcenter">
                <input class="input redbackground" type="submit" name="submit" value="UPDATE ADDRESS" required>
            </div>


        </form>
        <!-- form tag closing -->


    </section>
    <!-- main section close  -->



</body>

</html>