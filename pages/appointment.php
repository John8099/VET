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
    <?php include_once("../components/customerNav.php"); ?>
    <div class="container-fluid d-flex align-items-stretch" style="padding: 0;">

        <!-- Page Content  -->
        <div class="wrap" style="width: 100%;">
            <div class="container" style="height: 550px;overflow-y: scroll;">

                <h2 class="mb-4">My Appointments</h2>
                <hr>
                <div class="table-responsive-sm">
                    <table class="table table-sm table-striped table-hover table-responsive-sm table-bordered" id="admin_table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Details</th>
                                <th scope="col">CreateAt</th>
                                <th scope="col" style="width: 250px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = mysqli_query($con, "SELECT * FROM appointments WHERE `user_id` = $_SESSION[id] and `status` = 'pending' ORDER BY id ASC");
                            while ($appoint = mysqli_fetch_object($query)) :
                            ?>
                                <tr>
                                    <td><?php echo date("(l) F d, Y", strtotime(str_replace('-', '/', $appoint->date))) ?></td>
                                    <td><?php echo date("h:i A", strtotime($appoint->time)) ?></td>
                                    <td><?php echo $appoint->details ?></td>
                                    <td><?php echo date("M d, Y h:i:s A", strtotime(str_replace('-', '/', $appoint->createAt))) ?></td>
                                    <td>
                                        <div class="actions" style="text-align: center;">
                                            <a href="edit-appointment.php?id=<?php echo $appoint->id ?>">
                                                <img src="../images/edit.png" alt="edit" style="width: 40px; margin-right:10px">
                                            </a>
                                            <a href="../php/delete-appointment.php?id=<?php echo $appoint->id ?>">
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
    <?php include_once("../components/scriptLocations.php"); ?>
    <script>
        $(document).ready(() => {
            $('#admin_table').DataTable();
        })
    </script>
</body>

</html>