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
                <h2 class="mb-4">Appointments</h2>
                <?php
                $query = mysqli_query($con, "SELECT * FROM users u LEFT JOIN appointments a ON a.user_id = u.id WHERE a.status = 'pending'");
                ?>

                <div class="container-fluid" style="height: 600px;overflow-y: scroll;">
                    <div class="table-responsive-sm">
                        <table class="table table-sm table-striped table-hover table-responsive-sm table-bordered" id="product_table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Appointment Date</th>
                                    <th scope="col" style="width: 400px;">Details</th>
                                    <th scope="col" style="width: 200px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($appoint = mysqli_fetch_object($query)) :
                                ?>
                                    <tr>
                                        <td><?php echo strtoupper("$appoint->fname $appoint->lname") ?></td>
                                        <td><?php echo date("h:i A", strtotime($appoint->time)) . " " . date("F d, Y", strtotime(str_replace('-', '/', $appoint->date))) ?></td>
                                        <td><?php echo $appoint->details ?></td>
                                        <td scope="row">
                                            <div class="actions" style="text-align: center;">
                                                <a href="../php/done.php?id=<?php echo $appoint->id ?>">
                                                    <img src="../images/thumbs-up.png" alt="edit" style="width: 40px; margin-right:10px">
                                                </a>
                                                <!-- <a href="../php/delete-products.php?id=<?php echo $appoint->id ?>">
                                                    <img src="../images/delete.png" alt="delete" style="width: 40px; margin-left:10px">
                                                </a> -->
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