<?php
//include auth_session.php file on all user panel pages
// include("auth_session.php");
// ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>

    <?php 
    session_start();
    include "db.php";
    if (!isset($_SESSION['protected']) || !$_SESSION['protected']){
        header('location:login.php');
        exit;
    }

 
    $sid = $_SESSION['sid'];
    $sql    = "SELECT *  FROM regist WHERE id ='$sid'";
    $result = mysqli_query($con, $sql);
        $row = mysqli_num_rows($result);
        
        if ($row == 1) {
            while($row = mysqli_fetch_array($result)){

             $id = $row['id'];
             $username = $row['username'];
             $email = $row['email'];
             $pass = $row['pass'];
             $phone = $row['phone'];
             $occup = $row['occup'];
             $city = $row['city'];
             $file_name = $row['img'];
            
             $pin = $row['pin']; 
            

            }

                $_SESSION['susername'] = $username;
                $_SESSION['semail'] = $email;
                $_SESSION['spass'] = $pass;
                $_SESSION['sphone'] = $phone;
                $_SESSION['soccup'] = $occup;
                $_SESSION['scity'] = $city;
                $_SESSION['simg'] = $file_name;
                $_SESSION['spin'] = $pin;

                // $_SESSION['simg'];
    }
    else{
        echo "<div class='form'>";
        echo $_SESSION['susername']." is invalid user"."<br>";
        echo "PLEASE LOGIN AGAIN"."<br>";
        echo "<a href='logout.php'>"." LOGIN"."<a>";
        echo "</div>";

    }
    ?>

     <div class="form">

     <img src="<?php echo 'uploads/'.$_SESSION['simg']; ?>" style="height:150px;width:150px;border-radius:50%;">

       <h1 class="login-title">Hey, <?php echo $_SESSION['susername']; ?></h1>
       <h1 class="login-title">user id :  <?php echo $_SESSION['sid']; ?></h1>
        <h1 class="login-title">You are now user dashboard page. <br> Your All Details Are</h1>

        <p>E-mail: <?php echo $_SESSION['semail']; ?></p>
        <p>Password: <?php echo $_SESSION['spass']; ?></p>
        <p>Phone No. : <?php echo $_SESSION['sphone']; ?></p>
        <p>Occupation: <?php echo $_SESSION['soccup']; ?></p>
        <p>City: <?php echo $_SESSION['scity']; ?></p>
        <p>Pincode: <?php echo $_SESSION['spin']; ?></p>



        
    <p><a href="update.php">Update</a></p>
    <p><a href="delete.php">Delete</a></p>
    <p><a href="logout.php">Logout</a></p>
    <p class='link'><a href='users.php'>click here to visit USERS-LIST</a></p>

    </div>

 
</body>
</html>