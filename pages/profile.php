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
                <h2 class="mb-4">My Profile</h2>
                <hr>
                <?php
                $query = mysqli_query($con, "SELECT * FROM users WHERE id=$_SESSION[id]");
                $user = mysqli_fetch_object($query);

                ?>
                <form class="login100-form text-dark" action="../php/update-profile.php" method="POST">

                    <div class="form-group">
                        <div class="row">
                            <input type="text" value="<?php echo $user->id ?>" name="id" readonly hidden>
                            <div class="col">
                                <label>First name</label>
                                <input type="text" class="form-control" name="fname" value="<?php echo $user->fname ?>" required>
                            </div>
                            <div class="col">
                                <label>Last name</label>
                                <input type="text" class="form-control" name="lname" value="<?php echo $user->lname ?>" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo $user->email ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="uname" value="<?php echo $user->uname ?>" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="pass">
                    </div>

                    <h2 class="text-dark">Pet Details</h2>
                    <hr>
                    <div class="form-group">
                        <label>Pet name</label>
                        <input type="text" class="form-control" name="pet_name" value="<?php echo $user->pet_name ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Breed of Pet</label>
                        <input type="text" class="form-control" name="pet_breed" value="<?php echo $user->pet_breed ?>" required>
                    </div>
                    <div class="form-group ">
                        <label>Addition Details</label>
                        <textarea class="form-control" name="details" rows="6"><?php echo $user->pet_addtional_details ?></textarea>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="btn btn-primary">
                            Update
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