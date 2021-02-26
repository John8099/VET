<?php
session_start();
include "../php/conn.php";
if (!isset($_SESSION["id"])) {
    header("Location: ../");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <?php include_once("../components/bootstrapsLocations.php"); ?>
    <style>
        ::placeholder {
            color: #6c757d !important;
        }

        .form-control {
            color: black !important;
        }

        form input[type="text"],
        form input[type="number"],
        form select {
            border: 1px solid #6c757d !important;
        }

        .btn-primary {
            color: #fff !important;
            background-color: #007bff !important;
            border-color: #007bff !important;
        }

        .btn.btn-primary:hover {
            background-color: #007bfff0 !important;
        }
    </style>
</head>

<body>
    <div class="container-fluid d-flex align-items-stretch" style="padding: 0;">
        <?php include_once("../components/adminNav.php"); ?>
        <!-- Page Content  -->
        <div class="wrap" style="width: 100%;">
            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4">
                    Add Products
                </h2>
                <div class="container" style="height: 550px;width:60%">
                    <form class="login100-form text-dark" action="../php/add-product.php" method="POST" enctype="multipart/form-data">
                        <div class="form-groupt">
                            <div class="form-group" style="text-align: center;">
                                <img src="../images/150x150.png" id="images" style="width: 150px;height: 150px;border-radius:10px;margin-top:10px;" />
                            </div>
                            <label>Item Image</label>
                            <input type="file" class="form-control" id="profile-img" name="item_image" accept="image/*" required />
                        </div>
                        <div class="form-group">
                            <label>Item name</label>
                            <input type="text" class="form-control" name="item_name" placeholder="Name of item" required>
                        </div>

                        <div class="form-group">
                            <label>Item Price</label>
                            <input type="number" class="form-control" name="item_price" placeholder="Price of item" required>
                        </div>

                        <div class="form-group">
                            <label>Quantity</label>
                            <input type="number" class="form-control" name="qty" placeholder="Number of Items" required>
                        </div>

                        <div class="form-group">
                            <label>Category</label>
                            <select name="category" class="form-control" required>
                                <option value="">- Select Category -</option>
                                <option value="Accessories">Accessories</option>
                                <option value="Houses">Houses</option>
                                <option value="Bed">Bed</option>
                                <option value="Bowls">Bowls</option>
                                <option value="Feeders">Feeders</option>
                                <option value="Cleaning Tools">Cleaning Tools</option>
                                <option value="Toilet">Toilet</option>
                                <option value="Toys">Toys</option>
                                <option value="Vitamins">Vitamins</option>
                                <option value="Medicines">Medicines</option>
                                <option value="Treats">Treats</option>
                            </select>
                        </div>

                        <div class="container-login100-form-btn" style="float: right;">
                            <button class="btn btn-primary" type="submit">
                                Add
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("../components/scriptLocations.php"); ?>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#images').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#profile-img").change(function() {
            readURL(this);
        });
    </script>
</body>

</html>