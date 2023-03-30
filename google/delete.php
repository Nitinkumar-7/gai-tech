<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<title></title>
</head>
<body>

	<?php 
	session_start();
	require_once "db.php";


	$id = $_SESSION['id'];
	$susername = $_SESSION['susername'];
	
		

	 if (isset($_SESSION['sid'])) {
	 	$sid = $_SESSION['sid'];
		
	 	

	 	$sql = "DELETE FROM `regist` WHERE `id`='$sid'"; 
		
		
		
		

	 	
		 if ($con->query($sql) === TRUE) {
			echo "<script> alert('RECORD DELETED SUCESSFULLY')</script>";
			echo "<div class='form'>";
			echo " <h1 class='login-title'>record of ". $susername ." is deleted sucessfully"."</h1>";
			echo "<h3> click back to go back </h3>".'<br>';
			echo "<a href='logout.php'>"." back"."<a>";
		  
			echo "</div>";
		  } else {
			echo "Error deleting record: " . $con->error;
		  }
		  }
		  $con->close();
		  
		  ?>
	 

	



	 

</body>
</html>