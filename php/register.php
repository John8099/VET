<?php
session_start();
include "conn.php";

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$uname = $_POST["uname"];
$pass = password_hash($_POST["pass"], PASSWORD_ARGON2I);
$pet_name = $_POST["pet_name"];
$pet_breed = $_POST["pet_breed"];
$details = $_POST["details"];

$validateUname = mysqli_query($con, "SELECT * FROM users WHERE uname = '$uname'");
$validateEmail = mysqli_query($con, "SELECT * FROM users WHERE email = '$email'");

if (mysqli_num_rows($validateEmail) > 0) {
    echo '
    <script>
        alert("\"' . $email . '\" already exist.\nPlease try again.");
        window.location.href = "../pages/register.php"
    </script>';
} else if (mysqli_num_rows($validateUname) > 0) {
    echo '
    <script>
        alert("\"' . $uname . '\" already exist.\nPlease try again.");
        window.location.href = "../pages/register.php"
    </script>';
} else {
    $query = mysqli_query($con, "INSERT INTO users VALUES(NULL, '$fname','$lname','$email','$uname','$pass','customer','$pet_name','$pet_breed', '$details')");

    if ($query) {
        echo '
        <script>
            alert("Welcome ' . $fname . ' ' . $lname . '.");
            window.location.href = "../pages/customer.php?page=all"
        </script>';
    }
}
