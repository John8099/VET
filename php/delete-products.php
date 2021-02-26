<?php
session_start();
include "conn.php";

$id = $_GET['id'];

$uploads_dir = "../product_images";
$imagesLocation = mysqli_fetch_object(mysqli_query($con, "SELECT * FROM products WHERE id=$id"))->item_location;
unlink("$uploads_dir/$imagesLocation");

$query = mysqli_query($con, "DELETE FROM products WHERE id = $id");

if ($query) {
    echo '
    <script>
        alert("Product deleted successfully.");
        window.location.href = "../pages/products.php"
    </script>';
}
