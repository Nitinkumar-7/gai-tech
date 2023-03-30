<!DOCTYPE html>
<html>
<head>
  <title>CSV File Upload</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
  
  
</style>

<body>
  <form method="POST" enctype="multipart/form-data">
    <input type="file" name="csv_file">
    <input type="submit" name="submit" value="Upload CSV">
  </form>

  <?php
    // Connect to the database
    $conn = mysqli_connect("localhost", "admin", "admin", "google");

    

    // Check if the form was submitted
    if (isset($_POST["submit"])) {

      // Check if a CSV file was uploaded
      if ($_FILES["csv_file"]["error"] == UPLOAD_ERR_OK) {
        // Open the uploaded file
        $file = fopen($_FILES["csv_file"]["tmp_name"], "r");

        // Loop through each row in the CSV file
        while (($data = fgetcsv($file, 1000, ",")) !== FALSE) {
          $user = mysqli_real_escape_string($conn, $data[0]); // Assuming the first column contains the user name
          $email = mysqli_real_escape_string($conn, $data[1]); // Assuming the second column contains the email address

          // Validate if the user already exists in the database
          $query = "SELECT * FROM simplecsv WHERE username = '$user'";
          $result = mysqli_query($conn, $query);

          if (mysqli_num_rows($result) > 0) {
            // User already exists in the database, do something
            echo "<p>User $user already exists in the database.</p>";
          } else {
            // User does not exist in the database, insert the record
            $query = "INSERT INTO simplecsv (username, email) VALUES ('$user', '$email')";
            mysqli_query($conn, $query);
          }
        }

        fclose($file);
        echo"<div>";
        echo "<span>CSV file uploaded and processed successfully.</span>";
         echo "</div>";

      } else {
        echo"<div>";
        echo "<span>Error uploading CSV file.</span>";
        echo "</div>";
      }
    }

    // Retrieve the data from the "users" table
    $query = "SELECT * FROM simplecsv";
    $result = mysqli_query($conn, $query);

    // Create the HTML table
    echo "<table>";
    echo "<tr><th>ID</th><th>Username</th><th>Email</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>".$row['id']."</td>";
      echo "<td>".$row['username']."</td>";
      echo "<td>".$row['email']."</td>";
      echo "</tr>";
    }

    echo "</table>";

    // Close the database connection
    mysqli_close($conn);
  ?>
</body>
</html>