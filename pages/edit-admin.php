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
    <div class="container-fluid d-flex align-items-stretch" style="padding: 0;">
        <?php include_once("../components/adminNav.php"); ?>
        <?php
        $query = mysqli_query($con, "SELECT * FROM users WHERE id = $_GET[id]");
        $user = mysqli_fetch_object($query);
        ?>
        <!-- Page Content  -->
        <div class="wrap" style="width: 100%;">
            <div id="content" class="p-4 p-md-5 pt-5">
                <h2 class="mb-4">
                    <?php echo strtoupper("$user->fname $user->lname") . " " . " Information" ?>
                </h2>

                <div class="container" style="height: 550px;width:60%">
                    <form class="login100-form text-dark" action="../php/edit.php?update_admin" method="POST">
                        <div class="form-group">
                            <input type="text" name="id" value="<?php echo $user->id ?>" readonly hidden>
                            <div class="row">
                                <div class="col">
                                    <label>First name</label>
                                    <input type="text" class="form-control" name="fname" value="<?php echo $user->fname ?>" placeholder="First name" required>
                                </div>
                                <div class="col">
                                    <label>Last name</label>
                                    <input type="text" class="form-control" name="lname" value="<?php echo $user->lname ?>" placeholder="Last name" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $user->email ?>" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="uname" value="<?php echo $user->uname ?>" placeholder="Username" required>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="pass" placeholder="Password">
                        </div>

                        <div class="container-login100-form-btn">
                            <button class="btn btn-primary" type="submit">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php include_once("../components/scriptLocations.php"); ?>
    <script>
    </script>


</body>

</html>