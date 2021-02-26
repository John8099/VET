<?php

session_start();
include "conn.php";


$id = $_POST["id"];
$item_name = $_POST["item_name"];
$qty = $_POST["qty"];
$category = $_POST["category"];
$item_price = $_POST["item_price"];
if ($_FILES["item_image"]["name"] != "") {
    $uploads_dir = "../product_images";

    if ($_FILES["item_image"]["error"] == 0) {
        $tmp_name =  $_FILES["item_image"]["tmp_name"];
        $name = uniqid() . "_" . basename($_FILES["item_image"]["name"]);
        if (move_uploaded_file($tmp_name, "$uploads_dir/$name")) {

            $imagesLocation = mysqli_fetch_object(mysqli_query($con, "SELECT * FROM products WHERE id=$id"))->item_location;
            unlink("$uploads_dir/$imagesLocation");

            $query = mysqli_query($con, "UPDATE products SET items_name='$item_name', item_location='$name', item_price='$item_price', quantity='$qty', category='$category' WHERE id=$id");
            if ($query) {
                echo '
                <script>
                    alert("Item successfully updated.");
                    window.location.href = "../pages/products.php"
                </script>';
            } else {
                unlink("$uploads_dir/$name");
                echo '
                <script>
                    alert("Error uploading images.\nPlease try again.");
                    window.location.href = "../pages/edit-products.php?id=' . $id . '"
                </script>';
            }
        } else {
            echo '
            <script>
                alert("Error uploading images.\nPlease try again.");
                window.location.href = "../pages/edit-products.php?id=' . $id . '"
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
    $query = mysqli_query($con, "UPDATE products SET items_name='$item_name', item_price='$item_price', quantity='$qty', category='$category' WHERE id=$id");
    if ($query) {
        echo '
        <script>
            alert("Item successfully updated.");
            window.location.href = "../pages/products.php"
        </script>';
    }
}
