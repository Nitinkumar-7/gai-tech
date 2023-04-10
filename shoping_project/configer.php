<?php
 
      // connection is created 
        $conn = mysqli_connect("localhost", "admin", "admin", "project");
         
        // Check connection
        if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
        else{
          echo "";
        }

         
?>