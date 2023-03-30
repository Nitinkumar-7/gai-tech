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


 <!--  This is same code as simplecsv.php here's just adding pagination 
  to make both pages saperate  -->

  <?php
    // Connect to the database
    $conn = mysqli_connect("localhost", "admin", "admin", "google");

    // Set the number of records per page
    $records_per_page = 5;

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

    // Set the default sorting order and column
$sort_order = isset($_POST['sort_order']) ? $_POST['sort_order'] : 'ASC';
$sort_by = isset($_POST['sort_by']) ? $_POST['sort_by'] : 'id';

// Set the default range of records to display
$start_record = isset($_POST['start_record']) ? $_POST['start_record'] : 1;
$end_record = isset($_POST['end_record']) ? $_POST['end_record'] : $records_per_page;


    // Retrieve the total number of records from the "simplecsv" table
    $query = "SELECT COUNT(*) as total_records FROM simplecsv";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    $total_records = $row['total_records'];

    // Calculate the total number of pages
    $total_pages = ceil($total_records / $records_per_page);

    // Get the current page number
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Calculate the offset for the SQL query
    $offset = ($current_page - 1) * $records_per_page;

   // Retrieve the data from the "simplecsv" table with pagination and filtering
$query = "SELECT * FROM simplecsv ORDER BY $sort_by $sort_order LIMIT $offset, $records_per_page";
$result = mysqli_query($conn, $query);

    // Create the HTML table
echo "<form method='post'>";
echo "<label>Sort By:</label>";
echo "<select name='sort_by'>
        <option value='id' " . ($sort_by == 'id' ? 'selected' : '') . ">ID</option>
        <option value='username' " . ($sort_by == 'username' ? 'selected' : '') . ">Username</option>
        <option value='email' " . ($sort_by == 'email' ? 'selected' : '') . ">Email</option>
      </select>";
echo "<label>Sort Order:</label>";
echo "<select name='sort_order'>
        <option value='ASC' " . ($sort_order == 'ASC' ? 'selected' : '') . ">Ascending</option>
        <option value='DESC' " . ($sort_order == 'DESC' ? 'selected' : '') . ">Descending</option>
      </select>";
// echo "<label>Start Record:</label>";
// echo "<input type='number' name='start_record' value='$start_record'>";
// echo "<label>End Record:</label>";
// echo "<input type='number' name='end_record' value='$end_record'>";
echo "<input type='submit' value='Filter'>";
echo "</form>";

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

     // Create the pagination links
  echo "<div>";

  // Display the previous page  link if there exists
  if ($current_page > 1) {
    echo "<a href=\"?page=".($current_page-1)."\">&laquo; Previous</a>";
  }

  // the page numbers display by 
  for ($i = 1; $i <= $total_pages; $i++) {
    if ($i === $current_page) {
      echo "<span>$i</span>";
    } else {
      echo "<a href=\"?page=$i\">$i</a>";
    }
  }

  // Display the next page link if there exists
  if ($current_page < $total_pages) {
    echo "<a href=\"?page=".($current_page+1)."\">Next &raquo;</a>";
  }

  echo "</div>";
?>

   

</body>
</html>