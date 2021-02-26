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
    <link rel="stylesheet" href="../css/table.css">
</head>

<body>
    <div class="container-fluid d-flex align-items-stretch" style="padding: 0;">
        <?php include_once("../components/adminNav.php"); ?>

        <!-- Page Content  -->
        <div class="wrap" style="width: 100%;">
            <div id="content" class="p-4 p-md-4 pt-5">
                <h2 class="mb-4">Products</h2>
                <?php
                $query = mysqli_query($con, "SELECT * FROM products ORDER BY id ASC");

                ?>

                <div class="container-fluid" style="height: 600px;overflow-y: scroll;">
                    <div class="table-responsive-sm">
                        <table class="table table-sm table-striped table-hover table-responsive-sm table-bordered" id="product_table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Item Images</th>
                                    <th scope="col">Item Name</th>
                                    <th scope="col">Item Price</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Category</th>
                                    <th scope="col" style="width: 250px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($product = mysqli_fetch_object($query)) :
                                ?>
                                    <tr>
                                        <td style="text-align: center;"><img src="../product_images/<?php echo $product->item_location ?>" alt="" style="width: 60px;"></td>
                                        <td><?php echo $product->items_name ?></td>
                                        <td>&#8369; <?php echo number_format($product->item_price) ?></td>
                                        <td><?php echo $product->quantity ?></td>
                                        <td><?php echo $product->category ?></td>
                                        <td scope="row">
                                            <div class="actions" style="text-align: center;">
                                                <a href="edit-products.php?id=<?php echo $product->id ?>">
                                                    <img src="../images/edit.png" alt="edit" style="width: 40px; margin-right:10px">
                                                </a>
                                                <a href="../php/delete-products.php?id=<?php echo $product->id ?>">
                                                    <img src="../images/delete.png" alt="delete" style="width: 40px; margin-left:10px">
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("../components/scriptLocations.php"); ?>


    <script>
        $(document).ready(() => {
            $('#product_table').DataTable();
        })
    </script>
</body>

</html>