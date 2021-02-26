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
                <h2 class="mb-4">Admin List</h2>

                <div class="container-fluid" style="height: 600px;overflow-y: scroll;">
                    <div class="table-responsive-sm">
                        <table class="table table-sm table-striped table-hover table-responsive-sm table-bordered" id="admin_table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Username</th>
                                    <th scope="col" style="width: 250px;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($con, "SELECT * FROM users WHERE user_type = 'admin' ORDER BY id ASC");
                                while ($user = mysqli_fetch_object($query)) :
                                ?>
                                    <tr>
                                        <td><?php echo $user->fname ?></td>
                                        <td><?php echo $user->lname ?></td>
                                        <td><?php echo $user->email ?></td>
                                        <td><?php echo $user->uname ?></td>
                                        <td>
                                            <div class="actions" style="text-align: center;">
                                                <a href="edit-admin.php?id=<?php echo $user->id ?>">
                                                    <img src="../images/edit.png" alt="edit" style="width: 40px; margin-right:10px">
                                                </a>
                                                <a href="../php/delete.php?id=<?php echo $user->id ?>">
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
            $('#admin_table').DataTable();
        })
    </script>
</body>

</html>