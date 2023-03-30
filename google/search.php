<!DOCTYPE>
<html>
<head>
	<title>Search</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
	<form  class="form" action="#" method="GET">
		<input type="text" name="query" id="animated"/>
		<!-- <input type="submit" value="Search" /> -->
        <span class='link'><a href='users.php'>back</a></span>
	</form>

 

<?php
    include_once "db.php";
	$query = $_GET['query']; 
	
	
	
		
		$sql = "SELECT * FROM regist WHERE `username` LIKE '%{$query}%'";


        $result = mysqli_query($con, $sql);
        $row = mysqli_num_rows($result);

        if($row > 0){
			
		
            echo "<table class= 'form' cellspacing='4px' cellpadding='4px'>";
            echo "<caption>"."USERS-LIST"."</caption>";
                echo "<tr class = 'form'>";
                    echo "<th >"."ID"."</th>";
                    echo "<th >"."NAME"."</th>";
                    echo "<th >"."EMAIL"."</th>";
                    echo "<th >"."OCCUPATION"."</th>";
                    echo "<th>"."CITY"."</th>"  ;
                    echo "<th>"."PIN"."</th>"."</tr>";
                    
                    while($row = mysqli_fetch_array($result)){
                        
                        $id = $row['id'];
                        $username = $row['username'];
                        $email = $row['email'];
                        $city = $row['city'];
                        $occup = $row['occup'];
                        $pin = $row['pin'];
                        
                        echo "<tr class = 'form' >";
                            echo "<td>".$id."</td>";
                            echo "<td>".$username."</td>";
                            echo "<td>".$email."</td>";
                            echo "<td>".$occup."</td>";
                            echo "<td>".$city."</td>";
                            echo "<td>".$pin."</td>"."</tr>";
                    } 
                            echo "</table>";
			
		}else{ 
			// echo "No results";
            echo "<div class='form'>";
            echo $query." is not found"."<br>";
            echo "PLEASE SEARCH AGAIN"."<br>";
            echo "<a href='logout.php'>"." LOGIN"."<a>";
            echo "</div>";
		}
		
	
?>
</body>
</html>
</body>
</html>