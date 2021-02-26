<?php
include 'conn.php';
session_start();

$id = $_POST['id'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$uname = $_POST['uname'];
$pass = $_POST['pass'];
$pet_name = $_POST['pet_name'];
$pet_breed = $_POST['pet_breed'];
$details = $_POST['details'];

$query;
$validateUname = mysqli_query($con, "SELECT * FROM users WHERE uname = '$uname' and id != $_SESSION[id]");
$validateEmail = mysqli_query($con, "SELECT * FROM users WHERE email = '$email' and id != $_SESSION[id]");

if (mysqli_num_rows($validateEmail) > 0) {
    echo '
    <script>
        alert("\"' . $email . '\" already exist.\nPlease try again.");
        window.location.href = "../pages/profile.php"
    </script>';
} else if (mysqli_num_rows($validateUname) > 0) {
    echo '
    <script>
        alert("\"' . $uname . '\" already exist.\nPlease try again.");
        window.location.href = "../pages/profile.php"
    </script>';
} else {
    if ($pass == "") {
        $query = mysqli_query($con, "UPDATE users SET fname='$fname', lname='$lname', email='$email', uname='$uname', pet_name='$pet_name', pet_breed='$pet_breed', pet_addtional_details='$details' WHERE id = $id");
    } else {
        $pass = password_hash($_POST['pass'], PASSWORD_ARGON2I);
        $query = mysqli_query($con, "UPDATE users SET fname='$fname', lname='$lname', email='$email', uname='$uname', pass='$pass', pet_name='$pet_name', pet_breed='$pet_breed', pet_addtional_details='$details' WHERE id = $id");
    }

    if ($query) {
        echo '
        <script>
            alert("Profile successfully updated.");
            window.location.href = "../pages/profile.php"
        </script>';
    }
}
