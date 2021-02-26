<?php

session_start();
include "conn.php";

$item_image = uniqid() . "_" . $_FILES["item_image"]["name"];
$item_name = $_POST["item_name"];
$qty = $_POST["qty"];
$category = $_POST["category"];
$item_price = $_POST["item_price"];

$uploads_dir = "../product_images";
if ($_FILES["item_image"]["error"] == 0) {
    $tmp_name =  $_FILES["item_image"]["tmp_name"];
    $name = uniqid() . "_" . basename($_FILES["item_image"]["name"]);
    if (move_uploaded_file($tmp_name, "$uploads_dir/$name")) {
        $query = mysqli_query($con, "INSERT INTO products VALUES(NULL, '$item_name','$name', '$item_price', '$qty','$category',)");
        if ($query) {
            echo '
            <script>
                alert("Item successfully added.");
                window.location.href = "../pages/add-products.php"
            </script>';
        } else {
            unlink("$uploads_dir/$name");
            echo '
            <script>
                alert("Error uploading images.\nPlease try again.");
                window.location.href = "../pages/add-products.php"
            </script>';
        }
    } else {
        echo '
        <script>
            alert("Error uploading images.\nPlease try again.");
            window.location.href = "../pages/add-products.php"
        </script>';
    }
} else {
    echo '
    <script>
        alert("Error uploading images.\nPlease try again.");
        window.location.href = "../pages/add-products.php"
    </script>';
}
