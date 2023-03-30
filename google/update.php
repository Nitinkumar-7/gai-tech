<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
    <script src="regist.js"></script>

</head>
<body>





<?php
session_start();
    include_once "db.php";

    if (!isset($_SESSION['protected']) || !$_SESSION['protected']){
        header('location:login.php');
        exit;
    }

    $sid = $_SESSION['sid'];
  
    
        function test($data)
        {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return ($data);
        }

    $name_error = $email_error = $pass_error = $phone_error = $occup_error = $city_error = $pin_error = null;

    $flag = TRUE;
    if (isset($_POST['submit'])) {

      $username = test($_POST['username']);
    $email = test($_POST['email']);
    $pass = test($_POST['pass']);
    $phone = test($_POST['phone']);
    $occup = test($_POST['occup']);
    $city = test($_POST['city']);
    $img = test($_POST['img']);
    $pin = test($_POST['pin']);




//         // name validation
//         if (empty($_POST["username"])) {
          
//             $name_error = "* REQUIRED FIELD NAME ";
//             $flag=false;
//         } 
//         elseif (!preg_match("/^[A-Z]*$/", $_POST['username'])) {
            
//             $name_error = "CAPITAL LETTER CHARACTER ONLY ";
//         $flag = false;
//         } else {
            
//             $username = test($_POST['username']);
//         }
//         // name validation ends^^^^^

//         // email validation ^^^^^

//         $email = test($_POST['email']);
//         if (empty($_POST["email"])) {
//             $email_error = "* REQUIRED FIELD EMAIL";
        
//             $flag=false;
//         }
//         elseif
//         (!preg_match('/^[a-zA-Z0-9_.+-]+@gmail\.com$/' , $_POST['email'])){
//             $email_error = "@gmail.com REQUIRED ";
//             $flag = false;
//         }
    
//              else {
//                 $email = test($_POST['email']);
//             }
        
//             //email validation end

//          //pass-word validation 
// //          $cpass= test($_POST['cpass']);

// //          if (empty($_POST["cpass"])) {
// //              $passerr = "* REQUIRED FIELD EMAIL PASSWORD";
             
// //              $flag=false;

// //          } 
// //          elseif
// //              (!preg_match('/^[0-9]*$/', $_POST['cpass'])){
// //                  $passerr = "INVALID PASSWORD NUMBER ";
// //              $flag = false;
// //              }
// //          else {
// //              $pass = test($_POST['cpass']);
// //          }


// //  if (empty($_POST["pass"])) {
// //      $pass_error = "* REQUIRED FIELD PASSWORD";
     
// //      $flag=false;

// //  } 
// //  elseif
// //         (!preg_match('/^[0-9]*$/', $_POST['pass'])){
// //             $passerr = "INVALID PASSWORD NUMBER ";
// //         $flag = false;
// //         }
// // elseif
// //         ($_POST['pass'] !== $cpass){
// //             $cpasserr = "PASSWORD DOESN'T MATCH ";
// //         $flag = false;
// //         }
 
// // else {
//     $pass = test($_POST['pass']);
// //  }

       
//         if(!preg_match('/^[0-9]{10}+$/', $_POST['phone'])){
//             $phone_error = "INVALID PHONE NUMBER ";    
//             $flag = false;
//         }
//         else{
//             $phone = test($_POST['phone']);
//         }
        
//         $occup = $_POST['occup'];
//         $city = test($_POST['city']);

//         if(!preg_match("/^[0-9]{6}+$/", $_POST['pin'])){
//             $pin_error = "PIN-CODE SHOULD BE OF 6 CHARACTERS  ";
//         }
//         else{
//             // echo $pin;
//             $pin = test($_POST['pin']);
//         }

if ($flag) {

if (!empty($_FILES['img']['name'])){
            $file_name =$_FILES['img']['name'];
            $file_type =$_FILES['img']['type'];
            $file =$_FILES['img']['size'];
            $file_temp_loc =$_FILES['img']['tmp_name'];
            $file_store = "uploads/".$file_name;

            move_uploaded_file($file_temp_loc, $file_store);
        }
        elseif (!empty($img_url = $_POST['img'])) {
                $img_url = $_POST['img'];
                 $file_name = basename($img_url);
                 $file_store = "uploads/";
                 $images = basename($img_url);
                 $target = $file_store . basename($img_url);
                     
                        // Download the image from the URL and save it to the server
                        file_put_contents($target, file_get_contents($img_url));
                    } 
else{
    
    $file_name = $_SESSION['simg'];
}
}
        

        if ($flag) {

            // $id = $row['id'];
         $sid = $_SESSION['sid'];
         $sql = "UPDATE `regist` SET `username`='$username',`email`='$email',`pass`='$pass',`phone`='$phone',`occup`='$occup',`city`='$city' ,`img`='$file_name',`pin`='$pin' WHERE `id`='$sid'"; 
        
         $result = $con->query($sql); 
 
         if ($result == TRUE) {
                //  echo "UPDATED SUCESSFULLY";
                echo "<script>"."alert(' record updated successfully')"."</script>"."<br>";

                 header("Location:dashboard.php");
             } else {
                 echo "error";
                 echo "Error: ";
             }   
             
         }
     } 
           
         $sid = $_SESSION['sid'];
         $susername = $_SESSION['susername'];
         $semail = $_SESSION['semail'];
         $spass = $_SESSION['spass'];
         $sphone = $_SESSION['sphone'];
         $soccup = $_SESSION['soccup'];
         $scity = $_SESSION['scity'];
         $simg = $_SESSION['simg'];
         $spin = $_SESSION['spin'];
                 


               // mysqli_close($conn);

  



   
       ?>   


        <form class="form" action="#" method="POST" enctype="multipart/form-data">
        <h1 class="login-title">UPDATE FORM</h1>
        <?php echo "<span>". $name_error."</span>"; ?><input type="text"  value =' <?php echo $susername; ?>' class="login-input" name="username" placeholder="Username" > 
        <?php echo "<span>". $email_error."</span>"; ?>   <input type="text" value =' <?php echo $semail; ?>' class="login-input" name="email" placeholder="Email Adress">      
        <?php echo "<span>". $pass_error."</span>"; ?><input type="password" value =' <?php echo $spass; ?>' class="login-input" name="pass" placeholder="Password">
        <?php echo "<span>". $phone_error."</span>"; ?><input type="tel" value =' <?php echo $sphone; ?>' class="login-input" name="phone" placeholder="Phone no">
        <input type="text" class="login-input" value =' <?php echo $soccup; ?>'name="occup" placeholder="occup">
        <input type="text" class="login-input" value =' <?php echo $scity; ?>' name="city" placeholder="city">
      

        <div id="file-upload">
           <input type="file" class="login-input" name="img" id="file-upload" accept="image/png, image/jpeg, image/png" >
        </div>

        <div id="url-upload" style="display:none">
           <input type="url" class="login-input"  name="img"  id="url-upload" placeholder="Enter url of image">
        </div>

        <label><input type="radio" id="file" name="upload-type" onclick="showFileInput()" checked> Upload from PC</label>

		<label><input type="radio" id="url" name="upload-type" onclick="showFileInput()"> Upload from URL</label><br>

        

        
        
        <?php echo "<span>". $pin_error."</span>"; ?><input type="text" value =' <?php echo $spin; ?>' class="login-input" name="pin" placeholder="Pin-code"> 



        <input type="submit" name="submit" value="UPDATE" class="login-button">
        <p class="link"><a href="dashboard.php">Dashboard</a></p>
        
        <p class="link"><a href="login.php">Click to Login</a></p>
        <p class="link"><a href="logout.php">Click to Logout</a></p>
    </form>
    
  

      


</body>
</html>