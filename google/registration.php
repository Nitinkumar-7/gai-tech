<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
    <script src="regist.js"></script>
</head>
<script>


</script>
<body>





<?php

    session_start();
    include_once "db.php";

    if (isset($_SESSION['protected']) || $_SESSION['protected']){
        header('location:dashboard.php');
        exit;
    }
    
  
     $name_error = $email_error = $pass_error = $phone_error = $occup_error = $city_error = $pin_error =  $cpass_error = null;

    $flag = TRUE;
    

   if (isset($_POST['submit'])) {




   


    // username validation
    if (empty($_POST['username'])){
        $name_error = "* name required ";
        $flag=false;
    }
    elseif 
        (!preg_match("/^[A-Z]*$/", $_POST['username'])){
            $name_error = "CAPITAl LETTERS";

            $flag = false;
       }
       else {
        $username = test($_POST['username']);
       }


      //email validation
        $email =test($_POST['email']);
         if (empty($_POST['email'])){
        $email_error = "*required field email";
         $flag=false;

     } 
     elseif
          (!preg_match("/^[a-zA-Z0-9_.+-]+@gmail|@yahoo\.com$/", $_POST['email'])){
            $email_error = "invalid email";
            $flag=false;
        }
     else{

        $sql_e = "SELECT * FROM `regist` WHERE email='$email'";
        $res_e = mysqli_query($con, $sql_e);

         if(mysqli_num_rows($res_e) > 0){
          $email_error = "Sorry... email already taken";  
          $flag=false;  
         
        }else{
            $email = test($_POST['email']);

         }
     }

     //password validation
     $cpass= test($_POST['cpass']);

                if (empty($_POST["cpass"])) {
                    $pass_error = "*REQUIRED FIELD PASSWORD";
                    
                    $flag=false;
       
                } 
                elseif
                    (!preg_match('/^[0-9]*$/', $_POST['cpass'])){
                        $pass_errr = "INVALID PASSWORD NUMBER ";
                    $flag = false;
                    }
                else {
                    $pass = test($_POST['cpass']);
                }


     if (empty($_POST['pass'])){
        $pass_error = "* password required ";
        $flag=false;
    }
    elseif 
        (!preg_match("/^[0-9]*$/", $_POST['pass'])){
            $pass_error = "* invalid pass number";
            $flag = false;
       }
       elseif
       ($_POST['pass'] !== $cpass){
           $cpass_error = "PASSWORD DOESN'T MATCH ";
       $flag = false;
       }
       else {
        $pass = test($_POST['pass']);
       }




       // phone number validation
  

        // $phone= $_POST['phone'];
         if(!preg_match("/^[0-9]{10}+$/", $_POST['phone'])){
            $phone_error = "* invalid phone number";
            $flag = false;
       }
       else {
        $phone = test($_POST['phone']);
       }



       //occupation 

     $occup = test($_POST['occup']);
       //city 
     $city = test($_POST['city']);
    //  $img = test($_POST['img']);







		


 

     //pin validation

     if (!preg_match("/^[0-9]{6}+$/", $_POST['pin'])){
        $pin_error = "pin code should be 6 character";
    }
        else{
          $pin = test($_POST['pin']);
        }

        if ($flag){

// simple code for email without validation

    //            $username = $_POST['username'];
    //             $email = $_POST['email'];
    //             $pass = $_POST['pass'];
    //             $phone = $_POST['phone'];
    //             $occup = $_POST['occup'];
    //             $city = $_POST['city'];
    //             $pin = $_POST['pin'];
    

    

  
                    
    //         $sql_e = "SELECT * FROM `regist` WHERE email='$email'";
   
    // $res_e = mysqli_query($con, $sql_e);

  
    //  if(mysqli_num_rows($res_e) > 0){
    //   $email_error = "Sorry... email already taken";    
     
    // }else{

    /////////////////////////////////////////////// 
            
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
        $file_name ="profile-icon-png-898.png" ;

        // echo '<img src="https://technosmarter.com/assets/icon/user.png" style="height:150px;width:150px;border-radius:50%>';

    }
    
    // if (!empty($_FILES['img']['name'])){
    //     $file_name =$_FILES['img']['name'];
    //     $file_type =$_FILES['img']['type'];
    //     $file =$_FILES['img']['size'];
    //     $file_temp_loc =$_FILES['img']['tmp_name'];
    //     $file_store = "uploads/".$file_name;
    
    //     move_uploaded_file($file_temp_loc, $file_store);
    //     }
    //     elseif (!empty($img_url = $_POST['img'])) {
    //             // $img_url = $_POST['img'];
    //             $file_name = basename($img_url);
    //             $file_store = "uploads/";
    //             $images = basename($img_url);
    //              $target = $file_store . basename($img_url);
        
    //             // Download the image from the URL and save it to the server
    //             file_put_contents($file_store, file_get_contents($img_url));
    //         } else {

    //         $file_name ="profile-icon-png-898.png" ;
    
    //         // echo '<img src="https://technosmarter.com/assets/icon/user.png" style="height:150px;width:150px;border-radius:50%>';
    
    //     }
    // }
    

   
    // print_r(move_uploaded_file($file_temp_loc, $file_store));

          $sql    = "INSERT INTO `regist` (username,  email, pass, phone, occup, city, img, pin)
                      VALUES ('".$username."', '".$email."', '".$pass."','".$phone."','".$occup."','".$city."','".$file_name."','".$pin."')";
                   if ($con->query($sql) === TRUE) {    
                 
                 

                    $_SESSION['message'] = "<script>"."alert(' NEW RECORD CREATED SUCESSFULLY')"."</script>";

                        
                    print_r($file_store);
                    print_r($_FILES['img']);
                                }else {
                                echo 'somthing went wrong';
                            }
                            header("Location:login.php?image_success=1");
                        }
                    }
                
                 
                

          
          
            



                // mysqli_close($conn);
          function test($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }



            
    
        ?>   

        

        <form class="form" action="#"  id="myform" method="POST" enctype="multipart/form-data">
        <h1 class="login-title">Registration</h1>
        <?php echo "<span>". $name_error."</span>"; ?><span id ="name_error"> </span><input type="text" class="login-input" name="username" placeholder="Username" id="userinput" onblur="namevalidation()"> 
        <?php echo "<span>". $email_error."</span>"; ?><span id ="email_error"> </span><input type="text" class="login-input" name="email" placeholder="Email Adress" id="emailinput" onblur="emailvalidation()">

        <?php echo "<span>". $cpass_error."</span>"; ?><span id ="cpass_error"> </span><input type="password" class="login-input" name="cpass" placeholder="Password" id="cpassinput" onblur="cpassvalidation()"> 
        <?php echo "<span>". $pass_error."</span>"; ?><span id ="pass_error"> </span><input type="password" class="login-input" name="pass" placeholder="Confirm-Password" id="passinput" onblur="passvalidation()"> 

        <?php echo "<span>". $phone_error."</span>"; ?><span id ="phone_error"> </span><input type="tel" class="login-input" name="phone" placeholder="Phone no" id="phoneinput" onchange="phonevalidation()"> 
        <input type="text" class="login-input" name="occup" placeholder="occup">
        <input type="text" class="login-input" name="city" placeholder="city">

        <div id="file-upload">
           <input type="file" class="login-input" name="img" id="file-upload" accept="image/png, image/jpeg, image/png">
        </div>

        <div id="url-upload" style="display:none">
           <input type="url" class="login-input"  name="img"  id="url-upload" placeholder="Enter url of image">
        </div>

        <label><input type="radio" id="file" name="upload-type" onclick="showFileInput()" checked> Upload from PC</label>

		<label><input type="radio" id="url" name="upload-type" onclick="showFileInput()"> Upload from URL</label><br>

		

        <?php echo "<span>". $pin_error."</span>"; ?><span id ="pin_error"></span><input type="text" class="login-input" name="pin" placeholder="Pin-code" id="pininput" onchange="pinvalidation()"> 



        <input type="submit" name="submit" value="Register" class="login-button">


        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
    
  

      


</body>
</html>