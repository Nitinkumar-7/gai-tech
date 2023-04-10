<?php
session_start();
include 'configer.php';

$phone=$_SESSION['phone'];


$sql = "SELECT * FROM users WHERE phone = '$phone'";
        


        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);
       
        
        if($row === 1){
            while ($row = mysqli_fetch_array($result)) {
             
             
            echo $_SESSION['u_id'] = $u_id = $row['u_id'];
            echo $_SESSION['role_id'] = $role_id = $row['role_id'];
            echo $_SESSION['user_name'] =  $user_name = $row['user_name'];
           echo  $_SESSION['email'] = $email = $row['email'];
           echo  $_SESSION['pass'] = $pass = $row['pass'];
            echo $_SESSION['phone'] = $phone = $row['phone'];
            echo $_SESSION['registered'] = $id;
          
           
          
            }

              header("Location:myntra.php");
            }
        
            ?>