<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="registration.css">
	<title>assignment</title>

</head>
<body>
    	 <form action="#" method="POST">
            <fieldset> REGISTRATION FORM</fieldset> 

            <label>NAME </label>
            <input type="text" name="name" id="" placeholder="Name" required>
            <br>

            <label>E- mail </label>
            <input type="email" name="email" id="" placeholder="E-mail" required>
            <br>

         <!--    <label>Phone No. </label>
            <input type="tel" id="phone" name="phone" placeholder="12345-67890"  required>
            <br>

            <label>Occupation</label>
            <input type="text" name="occup" id="" placeholder="Occupation" required>
            <br>

            <label>City </label>
            <input type="text" name="city" id="" placeholder="City" required>
            <br>

            <label>Pin </label>
            <input type="number" name="numb" id="" placeholder="Pincode" required>
            <br> -->

            <label>Password</label>
            <input type="password" name="pass" id="" placeholder="Password" required>
            <br>

            <div class="division">
            <input class="btn" type="submit" value="submit" name="submit">
            </div >

            <div class="division ">
            <a href="login.php">click to login </a>
            </div>

            </form>


              <?php
     
            include ('configer.php');

            if (isset($_POST['submit'])) {

                $name = $_POST['name'];
                $email = $_POST['email'];
                // $phone = $_POST['phone'];
                // $occup = $_POST['occup'];
                // $city = $_POST['city'];
                // $numb = $_POST['numb'];
                $pass = $_POST['pass'];

                $sql = "INSERT INTO assign (name, email, phone, occup, city, numb, pass)
                        VALUES ('".$name."', '".$email."', '".$phone."','".$occup."', '".$city."', '".$numb."','".$pass."')";
                        if ($conn->query($sql) === TRUE) {
                                echo "<h2>"."New record created successfully "."<br>";
                                }
                            
                            else {
                                echo 'error';
                            } 
                }
          
                
                mysqli_close($conn);
            
        ?>





</body>
</html>