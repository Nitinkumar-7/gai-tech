
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>

<body>

     <form class="form" method="post" action="#" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="email" placeholder="email" autofocus="true"/>
        <input type="password" class="login-input" name="pass" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">New Registration</a></p>
        
  </form>
<?php
 require_once "db.php";
    
    session_start();
    if (isset($_SESSION['protected']) || $_SESSION['protected']){
        header('location:dashboard.php');
        exit;
    }
     
    echo $_SESSION['message'];
    if (isset($_POST['submit'])) {
        $email = stripslashes($_POST['email']); 
        $pass = stripslashes($_POST['pass']);

        $sql = "SELECT * FROM regist WHERE email='$email' AND pass='$pass'";
        
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
            $_SESSION['sid']= $id; 

            // echo $_SESSION['susername']= $username; 
            // echo $_SESSION['semail']= $email; 
            // echo $_SESSION['spass']= $pass; 
            // echo $_SESSION['sphone']= $phone; 
            // echo $_SESSION['soccup']= $occup; 
            // echo $_SESSION['scity']= $city; 
            // echo $_SESSION['spin']= $pin; 


         $_SESSION['protected'] =$email;
         header("Location: dashboard.php");



        }
         else {
            echo "<div class='form'>
                  <h3>Incorrect email/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    }

?>
   

</body>
</html>