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
    <title>Customer</title>
    <?php include_once("../components/bootstrapsLocations.php"); ?>
    <style>
        ::placeholder {
            color: #6c757d !important;
        }

        .form-control {
            color: black !important;
        }

        form input {
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
    <?php include_once("../components/customerNav.php"); ?>

    <div class="container-fluid d-flex align-items-stretch" style="padding: 0;">
        <!-- Page Content  -->
        <div class="wrap" style="width: 100%;">
            <h2 class="mb-4"></h2>

            <div class="container">
                <?php
                $page = $_GET["page"];

                $categories = array(
                    "Accessories",
                    "Houses",
                    "Bed",
                    "Bowls",
                    "Feeders",
                    "Cleaning Tools",
                    "Toilet",
                    "Toys",
                    "Vitamins",
                    "Medicines",
                    "Treats"
                );
                $title = "All Products";
                $check = 0;
                foreach ($categories as $category) {
                    if (strtolower($category) == strtolower($page)) {
                        $query = mysqli_query($con, "SELECT * FROM products WHERE category='$page'");
                        $title = $category;
                        $check++;
                    }
                }
                if ($check == 0) {
                    $query = mysqli_query($con, "SELECT * FROM products");
                }
                ?>
                <h4><?php echo $title ?></h4>
                <hr>
                <?php
                if (mysqli_num_rows($query) > 0) {
                    while ($row = mysqli_fetch_object($query)) :
                ?>
                        <div class="card" style="width: 20rem; height: 400px; float: left;margin:20px; text-align: center;">
                            <center>
                                <img class="card-img-top" src="../product_images/<?php echo $row->item_location ?>" alt="Card image cap" style="width: 250px;">
                            </center>
                            <div class="card-body">
                                <p class="card-text"><?php echo $row->items_name ?></p>
                                <p class="card-text" style="font-weight: bold;">
                                    &#8369; <label class="text-success"><?php echo number_format($row->item_price) ?></label>
                                </p>
                                <p class="card-text" style="font-weight: bold;">
                                    <label class="text-success"><?php echo $row->quantity ?></label>
                                    Items Left
                                </p>
                            </div>
                        </div>
                    <?php
                    endwhile;
                } else {
                    ?>
                    <h4 style="text-align: center;">No items left.</h4>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php include_once("../components/scriptLocations.php"); ?>
    <script>
    </script>


</body>

</html>