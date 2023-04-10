<?php
session_start();

// Establish a connection to the database
include 'configer.php';

 $phone = $_SESSION['phone'];

@include 'navigationbar.php';

    //  if not authenticated redirect to logoutscreen.php 
    if (!isset($phone)) {
        header('location:logoutscreen.php');
    }


$state = $_SESSION['state'];
if (isset($state)) {
    // header ("Location :order.php");
    echo "<script> 
    window.location.href = 'order.php';
    </script>";
}


function test($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    return ($data);
}

 $myphone = $_SESSION['phone'];
$u_id = $_SESSION['u_id'];

$check = "SELECT * FROM addresses WHERE phone = '$myphone' ";
$check_result = mysqli_query($conn, $check);




if (mysqli_num_rows($check_result) == 1) {

   
    while ($row = mysqli_fetch_assoc($check_result)) {
        $_SESSION['a_id'] = $row["a_id"];
        $_SESSION['name'] = $row["name"];
        $_SESSION['phone'] = $row["phone"];
        $_SESSION['pincode'] = $row["pincode"];
        $_SESSION['address'] = $row["address"];
        $_SESSION['city'] = $row["city"];
         $_SESSION['state'] = $row["state"];
    }
    header("Location:order.php");
} else {
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

        // phone validation -
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
                $check = "SELECT *FROM addresses WHERE phone = '$phone' ";
                $check_result = mysqli_query($conn, $check);

                if (mysqli_num_rows($check_result) == 1) {
                    $phoneerr = "ALREADY EXIST !!";
                    $flag = false;

                } else {
                    $phone = test($_POST['phone']);
                }
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
            $sql = "INSERT INTO addresses (u_id, name, phone, pincode, address, city, state)
            VALUES ('$u_id','$name', '$phone', '$pincode', '$address', '$city', '$state')";

            // Execute the SQL statement
            if (mysqli_query($conn, $sql)) {
                echo "<script> 
                window.location.href = 'order.php';
                </script>";

            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }



        }
    }

    // Perform the SELECT query
    $sql = "SELECT * FROM addresses WHERE phone= '$phone'";
    $result = mysqli_query($conn, $sql);

    // Check if there are any results
    if (mysqli_num_rows($result) > 0) {
        // Loop through the results and print each row
        while ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['a_id'] = $row["a_id"] ;
            $_SESSION['name'] = $row["name"];
            $_SESSION['phone'] = $row["phone"];
            $_SESSION['pincode'] = $row["pincode"];
            $_SESSION['address'] = $row["address"];
            $_SESSION['city'] = $row["city"];
            $_SESSION['state'] = $row["state"];
        }
        header("Location:order.php");
    }
}
// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style/contact.css">
    <title>CONTACT-DETAILS</title>
</head>

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
                    placeholder="PLACE ORDER WITH NEW NAME " required > <span>
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
                    placeholder="Pin Code*" required><span>
                    <?php echo $pin_codeerr; ?>
                </span>
            </div>

            <div class="inputdivision  textcenter">
                <input class="input" value="<?php echo $_SESSION['address']; ?>" type="text" name="address"
                    placeholder="address*" required>
            </div>

            <div class="inputdivision textcenter">
                <input class="input" value="<?php echo $_SESSION['city']; ?>" type="text" name="city"
                    placeholder="City" required>
            </div>

            <div class="inputdivision textcenter">
                <input class="input" value="<?php echo $_SESSION['state']; ?>" type="text" name="state"
                    placeholder="State" required>
            </div>

            <div class="inputdivision  textcenter">
                <input class="input redbackground" type="submit" name="submit" value="ADD ADDRESS">
            </div>


        </form>
        <!-- form tag closing -->


    </section>
    <!-- main section close  -->



</body>

</html>