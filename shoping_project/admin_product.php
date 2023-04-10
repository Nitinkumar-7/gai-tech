<?php

// session is started here 
session_start();

// admin session is fetched here 
$admin = $_SESSION['admin'];

// if admin session is not created redirect to login.php 
if (!isset($admin)) {
    header('location:login.php');
}
;

// navigation bar for admin section 
@include 'admin_header.php';


// user id session is called 
$_SESSION['u_id'];

// database connection is called 
include 'configer.php';


if (isset($_POST['submit'])) {

    $p_name = mysqli_real_escape_string($conn, $_POST['p_name']);
    $p_category = mysqli_real_escape_string($conn, $_POST['p_category']);
    $p_price = mysqli_real_escape_string($conn, $_POST['p_price']);

    if (!empty($avatar = $_FILES["avatar"]["name"])) {

        $flag = true;
        $target_dir = "uploads/"; // directory where the image will be uploaded
        $target_file = $target_dir . basename($_FILES["avatar"]["name"]); // full path of the uploaded file
        $avatarFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION)); // get the file extension

        // Check if the file is an avatar
        $check = getimagesize($_FILES["avatar"]["tmp_name"]);
        if ($check === false) {
            $imgerror = "File is not an avatar.";
            $flag = false;
        }

        // Check if the file already exists in the directory
        if (file_exists($target_file)) {
            $imgerror = "IMAGE IS ALREADY EXIST";
            $flag = false;
        }

        // Check file size
        if ($_FILES["avatar"]["size"] > 15000000) {
            $imgerror = "TOO LARGE FILE";
            $flag = false;
        }

        // Allow certain file formats
        if (
            $avatarFileType != "jpg" && $avatarFileType != "png" && $avatarFileType != "jpeg"
            && $avatarFileType != "gif"
        ) {
            $imgerror = "ONLY JPG, JPEG, PNG & GIF IMAGES ";
            $flag = false;
        }

        // Upload the file
        if ($flag) {
            if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                // echo "The file ". ($_FILES["avatar"]["name"]). " has been uploaded.";
            } else {
                $imgerror = "SORRY, ERROR IN UPLOADING";
                $flag = false;
            }
        }

    }
    // display piture using url 
    elseif (!empty($file_url = $_POST['avatar'])) {
        // $imgname =(END(explode('/',$avatar)));
        $target_dir = "uploads/";


        $avatar = basename($file_url);
        $folder_path = $target_dir . basename($file_url);


        if (file_put_contents($folder_path, file_get_contents($file_url))) {
            echo "";
        } else {
            $imgerror = "File can't be moved!";
        }
    } else {
        $avatar = "person-gb066ca900_640.png";

        // $imgerror= "*IMAGE IS REQUIRED ";
        // $flag= false;
    }

    if ($flag) {


        $sql = "INSERT INTO product (p_name, p_category, p_price, avatar)
                 VALUES ('$p_name','$p_category','$p_price','$avatar')";


        if (mysqli_query($conn, $sql)) {

            echo "sussesful";


            // die();
        } else {
            echo "error";
            echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
        // header("Location: login.php");
        mysqli_close($conn);
    }

}

function test($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return ($data);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style/myntra.css">
    <link rel="stylesheet" href="style/admin_style.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <title>UPLOADS</title>

</head>


<body>
    <div class="add_product_div">
        <div class="add_product"> ADD PRODUCTS</div>
        <form class="mainform" action="#" method="POST" id="forms" name="myForm" enctype="multipart/form-data">
            <label for="p_name">Product Name:</label>
            <input class="productinput" type="text" id="p_name" name="p_name" required><br><br>


            <label for="category">Product Category:</label>
            <select id="category" name="p_category">
                <option value="KID">KIDS</option>
                <option value="MEN">MEN</option>
                <option value="WOMEN">WOMEN</option>

            </select>

            <label for="p_price">Product Price:</label>
            <input class="productinput" type="text" id="p_price" name="p_price" required><br><br>


            <tr>
                <td>
                    <label for="avatar"> AVATAR </label>
                </td>
                <td>
                    <input class="productinput" class='file' type="file" placeholder="IMAGE URL" name="avatar"
                        id="avatar">

                    <?php echo "<span>" . $imgerror . "</span>"; ?>
                </td>

            </tr>
            <div class="sub">
                <input class="productinput" class="btn" type="submit" name="submit" value="SUBMIT">
            </div>
        </form>
    </div>

    </head>

    <body>
        <h2>Product Table</h2>
        <!-- heading for product table  -->

        <table>
            <!-- fetch and show data in the table format    -->
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Avatar</th>
                <th>Action</th>
            </tr>
            <?php

            // Fetch data from table
            $sql = "SELECT * FROM product";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["p_id"] . "</td>";
                    echo "<td>" . $row["p_name"] . "</td>";
                    echo "<td>" . $row["p_category"] . "</td>";
                    echo "<td>" . $row["p_price"] . "</td>";
                    ?>

                    <td><img src="uploads/<?php echo $row['avatar']; ?>" width='100' height='100'></td>
                    <?php
                    echo "<td><button onclick='editProduct(" . $row["p_id"] . ")'>Update</button> 
                    <button onclick='deleteProduct(" . $row["p_id"] . ")'>Delete</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "0 results";
            }

            mysqli_close($conn);
            ?>
        </table>

        <script>
            // script for update and delete buttons 
            function editProduct(id) {
                window.location.href = "edit_product.php?p_id=" + id;
            }

            function deleteProduct(id) {
                if (confirm("Are you sure you want to delete this product?")) {
                    window.location.href = "delete_product.php?p_id=" + id;
                }
            }
        </script>


    </body>

</html>