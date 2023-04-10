<?php

session_start();

 $u_id = $_SESSION['u_id'];
if (!isset($u_id)) {

    header("Location : login.php");
}

$u_id = $_SESSION['u_id'];
$name = $_SESSION['user_name'];
$email = $_SESSION['email'];
$phone = $_SESSION['phone'];


include "configer.php";

// Get the form data
if (isset($_POST['update'])) {
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $user_name = mysqli_real_escape_string($conn, $_POST['user_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Update the user in the database
    $sql = "UPDATE users SET phone='$phone', user_name='$user_name', email='$email' WHERE u_id='$u_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "User updated successfully!";
    } else {
        echo "Error updating user: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/myntra.css">
    <!-- two files are used to style this page  -->
    <link rel="stylesheet" href="style/update.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>Update User</title>
</head>

<body>
    <div class="containergg">
        <h1 class="headingtwo">Update User</h1>
        <form class='updateform' method="post" action="update_user.php">

            <label for="phone">Phone:</label>
            <input type="text" value=<?php echo $phone; ?> name="phone" required><br>

            <label for="user_name">User Name:</label>
            <input type="text" value=" <?php echo $name; ?> " name="user_name" required><br>

            <label for="email">Email:</label>
            <input type="email" value=" <?php echo $email; ?>" name="email" required><br>

            <input type="submit" value="Update User" name="update">
            <input type="button" onclick="window.location.href='myntra.php';" value="back" >
        </form>
    </div>
</body>

</html>