<?php
session_start();

// Establish a connection to the database 
include 'configer.php';

echo $phone = $_SESSION['phone'];

//  if not authenticated redirect to logoutscreen.php 
if (!isset($phone)) {
    header('location:logoutscreen.php');
}


$nameerr = $emailerr = $passerr = $phoneerr = null;


$flag = TRUE;

function test($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return ($data);
}


if (isset($_POST['create'])) {

    // Retrieve the form data using the POST method
    $role_id = 2;
    $phone = $_SESSION['phone']; // Enclose phone number in quotes to make it a string value


    // name validation
    if (empty($_POST["user_name"])) {
        $nameerr = "**REQUIRED FIELD NAME ";
        $flag = false;
    } elseif
    (!preg_match("/^[A-Z]*$/", $_POST['user_name'])) {
        $nameerr = "CAPITAL LETTERS ONLY ";
        $flag = false;
    } else {
        $user_name = test($_POST['user_name']);
    }



    //   validation for email 
    $email = test($_POST['email']);
    if (empty($_POST["email"])) {
        $emailerr = "*REQUIRED FIELD EMAIL";

        $flag = false;
    } elseif
    (!preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/', $_POST['email'])) {
        $emailerr = "INVALID EMAIL";
        $flag = false;
    } else {

        $check = "SELECT *FROM users WHERE email='$email' ";
        $check_result = mysqli_query($conn, $check);

        if (mysqli_num_rows($check_result) > 0) {
            $emailerr = "EMAIL ALREADY EXIST !!";
            $flag = false;
        } else {
            $email = test($_POST['email']);
        }
    }
    //email validation end


    if (empty($_POST["pass"])) {
        $passerr = "**SET PASSWORD ";
        $flag = false;
    } else {


        $password = md5($_POST['pass']);
    }
    // $password = "#" . password_hash($_POST["pass"], PASSWORD_DEFAULT);

    // SQL query to insert user data into table
    if ($flag) {
        $sql = "INSERT INTO users (role_id, phone, user_name, email, pass, created, updated) VALUES ('$role_id', '$phone', '$user_name', '$email', '$password', NOW(), NOW())";

        // Execute the SQL statement
        if (mysqli_query($conn, $sql)) {
            $_SESSION['registered'] = "registered";


            echo "<script> alert('INFORMATION COMPLETED'); 

  window.location.href = 'session.php';
  </script>";
            // header ("location:myntra.html");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
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
    <link rel="stylesheet" href="style/myntra.css">
    <link rel="stylesheet" href="style/contact.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>firstpage</title>

</head>

<body>

    <?php
    @include 'navigationbar.php';
    ?>
    <!-- header section ends  -->


    <section class="center">
        <!-- from is created -->
        <form class="order" action="#" method="POST">

            <!-- labels and input field are used in this form   -->
            <div class="inputdivision">
                <label class="firstlabel" for=""> <b class="fontsize">Complete your sign up</b></label>
            </div>
            <div class="inputdivision">
                <label class="firstlabel" for="">Mobile Number</label>
                <div class="numbersession">
                    <?php echo $_SESSION['phone']; ?>
                    <!-- <input type="hidden" name ="phone" value="session ki value" placeholder="session bnana pdega ">                  -->
                </div>
            </div>

            <div class="inputdivision textcenter">
                <input class="input" type="password" name="pass" placeholder="Create Password*" required><span>
                    <?php echo $passerr ?>
                </span>
            </div>

            <div class="inputdivision textcenter">
                <input class="input" type="text" name="user_name" placeholder="Name*" required><span>
                    <?php echo $nameerr ?>
                </span>
            </div>

            <div class="inputdivision textcenter">
                <input class="input" type="email" name="email" placeholder="Email(optional)" required> <span>
                    <?php echo $emailerr ?>
                </span>
            </div>

            <div class="inputdivision">
                <label class="secondlabel" for="gender">Select Gender:
                    <input class="radiobuttons" type="radio" name="gender" value="Male" id="gender" required>Male
                    <input class="radiobuttons" type="radio" name="gender" value="Female" id="gender" required> Female
                </label>
            </div>


            <div class="inputdivision  textcenter">
                <input class="input redbackground" type="submit" name="create" value="CREATE ACCOUNT">
            </div>


        </form>
        <!-- form tag closing -->


    </section>
    <!-- main section close  -->

</body>

</html>