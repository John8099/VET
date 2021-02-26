<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="../images/icons/footprint.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../css/util.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100" style="width: 50%; padding: 30px;">
                <form class="login100-form text-white" action="../php/register.php" method="POST">
                    <h2 class="text-white">Pet Owner</h2>
                    <hr class="bg-white">
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <label>First name</label>
                                <input type="text" class="form-control" name="fname" placeholder="First name" required>
                            </div>
                            <div class="col">
                                <label>Last name</label>
                                <input type="text" class="form-control" name="lname" placeholder="Last name" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email" required>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="uname" placeholder="Username" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="pass" placeholder="Password" required>
                    </div>

                    <h2 class="text-white">Pet Details</h2>
                    <hr class="bg-white">
                    <div class="form-group">
                        <label>Pet name</label>
                        <input type="text" class="form-control" name="pet_name" placeholder="Pet name" required>
                    </div>
                    <div class="form-group">
                        <label>Breed of Pet</label>
                        <input type="text" class="form-control" name="pet_breed" placeholder="Breed of Pet" required>
                    </div>
                    <div class="form-group">
                        <label>Would you like to add any details?</label>
                        <textarea class="form-control" name="details"></textarea>
                    </div>
                    <div class="container-login100-form-btn">
                        <button class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                    <div class="text-center p-t-30 txt1">
                        Already registered?
                        <a class="txt1" href="../" style="text-decoration: underline;">
                            Login here.
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/bootstrap/js/popper.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/daterangepicker/moment.min.js"></script>
    <script src="../vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="../vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="../js/main.js"></script>

</body>

</html>