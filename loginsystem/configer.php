<?php

 $conn = mysqli_connect("localhost", "admin", "admin", "chiku");
  
 // Check connection
if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error );
  }
  else{
      echo "";
  }
  ?>