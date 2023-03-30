<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USERLIST</title>
    <link rel="stylesheet" href="style.css" >
</head>
<body>

    
    <?php

session_start();
include "db.php";
if (!isset($_SESSION['protected']) || !$_SESSION['protected']){
    header('location:login.php');
    exit;
}
    


include "db.php";

$sql = "SELECT * FROM regist ";

$result = mysqli_query($con, $sql);
$row = mysqli_num_rows($result);

if($row > 0){

    echo "<table class= 'form' cellspacing='4px' cellpadding='4px'>";
    echo "<caption>"."USERS-LIST"."</caption>";
        echo "<tr class = 'form'>";
            echo "<th >"."ID"."</th>";
            echo "<th >"."IMAGES"."</th>";

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
                $file_name = $row['img'];
                $file_store = "uploads/";
                $target = $file_store . $file_name;
               
                $pin = $row['pin'];
                
                echo "<tr class = 'form' >";
                    echo "<td>".$id."</td>";
                    echo "<td>"."<img class ='avtar' src ='$target'> "."</td>";
                    
                    echo "<td>".$username."</td>";
                    echo "<td>".$email."</td>";
                    echo "<td>".$occup."</td>";
                    echo "<td>".$city."</td>";
                    echo "<td>".$pin."</td>"."</tr>";
            } 
                    echo "</table>";
                  
                
                
                
   
 
            }
            else{
                echo " error";
            }
            
            ?>
            <p class='link'><a href='dashboard.php'>Back</a></p>
            <p class='link'><a href='search.php'>SEARCH</a></p>
        </body>
        </html>