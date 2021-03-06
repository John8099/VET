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

        form input,
        textarea {
            border: 1px solid #6c757d !important;
        }

        textarea.form-control {
            height: 150px !important;
        }

        form input:focus,
        textarea:focus {
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

        form {
            height: auto;
        }
    </style>
</head>

<body>
    <?php include_once("../components/customerNav.php"); ?>

    <div class="container-fluid d-flex align-items-stretch" style="padding: 0;">
        <!-- Page Content  -->
        <div class="wrap" style="width: 100%;">

            <div class="container" style="width: 50%;padding: 20px">
                <h2 class="mb-4">Set Appointment</h2>
                <hr>
                <form class="login100-form text-dark" action="../php/set-appointment.php" method="POST">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>Set Date</label>
                                <input type="date" class="form-control" name="date" required>
                            </div>
                            <div class="col">
                                <label>Set Time</label>
                                <input type="time" class="form-control" name="time" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group ">
                        <label>Addition Details</label>
                        <textarea class="form-control" name="details" rows="6"></textarea>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include_once("../components/scriptLocations.php"); ?>
    <script>
    </script>


</body>

</html>