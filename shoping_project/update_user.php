<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="style/myntra.css">
    <link rel="stylesheet" href="style/update.css">
</head>

<body>
    <?php
    // Connect to database
    include 'configer.php';
    @include 'admin_header.php';

    $admin = $_SESSION['admin'];

    // redireact to login.php 
    if (!isset($admin)) {
        header('location:login.php');
    }
    ;

    // Check if form was submitted
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $role_id = $_POST['role_id'];
        $phone = $_POST['phone'];
        $user_name = $_POST['user_name'];
        $email = $_POST['email'];

        // Update user data in database
        $sql = "UPDATE users SET role_id='$role_id', phone='$phone', user_name='$user_name', email='$email' WHERE u_id='$id'";
        $result = mysqli_query($conn, $sql);

        // Check if update was successful
        if ($result) {

            echo "<script> alert('USER UPDATED SUCESSFULLY'); 

	window.location.href = 'admin_users.php';
	</script>";
        } else {
            echo "<script>alert('Error updating user data');</script>";
        }

        // Close database connection
        mysqli_close($conn);
    } else {
        // Fetch user data from database
        $id = $_GET['id'];
        $sql = "SELECT * FROM users WHERE u_id='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        // Close database connection
        mysqli_close($conn);
    }
    ?>

    <div class="containergg">
        <h1 class="headingtwo">Update User</h1>
        <form class='updateform' method="post">
            <input type="hidden" name="id" value="<?php echo $row['u_id']; ?>">
            <div class="form-group">
                <label for="role_id">Role ID</label>
                <input type="text" name="role_id" id="role_id" value="<?php echo $row['role_id']; ?>" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" value="<?php echo $row['phone']; ?>" required>
            </div>
            <div class="form-group">
                <label for="user_name">User Name</label>
                <input type="text" name="user_name" id="user_name" value="<?php echo $row['user_name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $row['email']; ?>" required>
            </div>
            <button type="submit" name="submit">Update</button>
        </form>
    </div>

</body>

</html>