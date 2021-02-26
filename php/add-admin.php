<?php
session_start();
include "conn.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$uname = $_POST["uname"];
$pass = password_hash($_POST["pass"], PASSWORD_ARGON2I);

$validateUname = mysqli_query($con, "SELECT * FROM users WHERE user_type='admin' and uname = '$uname'");
$validateEmail = mysqli_query($con, "SELECT * FROM users WHERE user_type='admin' and email = '$email'");

if (mysqli_num_rows($validateEmail) > 0) {
    echo '
    <script>
        alert("\"' . $email . '\" already exist.\nPlease try again.");
        window.location.href = "../pages/add-admin.php"
    </script>';
} else if (mysqli_num_rows($validateUname) > 0) {
    echo '
    <script>
        alert("\"' . $uname . '\" already exist.\nPlease try again.");
        window.location.href = "../pages/add-admin.php"
    </script>';
} else {
    $query = mysqli_query($con, "INSERT INTO users(fname, lname, email, uname, pass, user_type) VALUES('$fname','$lname','$email','$uname','$pass', 'admin')");

    if ($query) {
        echo '
        <script>
            alert("Admin added successfully.");
            window.location.href = "../pages/add-admin.php"
        </script>';
    }
}
