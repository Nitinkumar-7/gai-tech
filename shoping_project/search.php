<?php


include "configer.php";


@include 'navigationbar.php';


// set the number of products to display per page
$productsPerPage = 10;


// get the search term from the URL parameter
$searchTerm = $_GET['search'];

// get the current page number from the URL parameter
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

// calculate the starting product index for the current page
$start = ($page - 1) * $productsPerPage;

// perform the search query
$sql = "SELECT * FROM product WHERE p_name LIKE '$searchTerm%' LIMIT $start, $productsPerPage";
$result = mysqli_query($conn, $sql);

// get the total number of products that match the search term
$sqlCount = "SELECT COUNT(*) as count FROM product WHERE p_name LIKE '$searchTerm%'";

$countResult = mysqli_query($conn, $sqlCount);

$countRow = mysqli_fetch_assoc($countResult);
$totalProducts = $countRow['count'];

// calculate the total number of pages
$totalPages = ceil($totalProducts / $productsPerPage);

// output the search results
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

    <title>searchclist</title>

</head>


<body>

    <h2 class="margin-top_table">Product Table</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Avatar</th>

        </tr>
        <?php

        while ($row = mysqli_fetch_assoc($result)) {
            $category = $row["p_category"];
            $productId = $row["p_id"];
            $productName = $row["p_name"];
            $productPrice = $row["p_price"];
            $avatar = $row['avatar'];
            ?>

            <tr class='hoverred'
                onclick="window.location='<?php echo ($category === 'MEN' ? 'men.php' : ($category === 'WOMEN' ? 'women.php' : ($category === 'KID' ? 'kids.php' : 'myntra.php'))) . '?id=' . $productId; ?>'">

                <td>
                    <?php echo $productId; ?>
                </td>
                <td>
                    <?php echo $productName; ?>
                </td>
                <td>
                    <?php echo $category; ?>
                </td>
                <td>
                    <?php echo $productPrice; ?>
                </td>
                <td><img src='uploads/<?php echo $avatar; ?>' width='100' height='100'></td>
            </tr>

            <?php
        }

        echo "</table>";
        // output pagination links
        if ($totalPages > 1) {
            echo '<div class="paginationbtn">';
            if ($page > 1) {
                echo '<a class="block" href="?search=' . urlencode($searchTerm) . '&page=' . ($page - 1) . '">Previous</a>';
            }
            for ($i = 1; $i <= $totalPages; $i++) {
                echo '<a class="block" href="?search=' . urlencode($searchTerm) . '&page=' . $i . '"';
                if ($i == $page) {
                    echo ' class="active"';
                }
                echo '>' . $i . '</a>';
            }
            if ($page < $totalPages) {
                echo '<a  class="block" href="?search=' . urlencode($searchTerm) . '&page=' . ($page + 1) . '">Next</a>';
            }
            echo '</div>';
        }
        ?>
</body>

</html>