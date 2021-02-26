<?php
session_start();
include "conn.php";

if (isset($_GET["update_admin"])) {
    $id = $_POST["id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $uname = $_POST["uname"];

    $validateUname = mysqli_query($con, "SELECT * FROM users WHERE user_type='admin' and uname = '$uname' and id != $id");
    $validateEmail = mysqli_query($con, "SELECT * FROM users WHERE user_type='admin' and email = '$email' and id != $id");

    if (mysqli_num_rows($validateEmail) > 0) {
        echo '
        <script>
            alert("\"' . $email . '\" already exist.\nPlease try again.");
            window.location.href = "../pages/edit-admin.php?id=' . $id . '"
        </script>';
    } else if (mysqli_num_rows($validateUname) > 0) {
        echo '
        <script>
            alert("\"' . $uname . '\" already exist.\nPlease try again.");
            window.location.href = "../pages/edit-admin.php?id=' . $id . '"
        </script>';
    } else {
        $query;
        if ($_POST["pass"] != "") {
            $pass = password_hash($_POST["pass"], PASSWORD_ARGON2I);
            $query = mysqli_query($con, "UPDATE users SET fname='$fname', lname='$lname', email='$email', uname='$uname', pass='$pass' WHERE id=$id");
        } else {
            $query = mysqli_query($con, "UPDATE users SET fname='$fname', lname='$lname', email='$email', uname='$uname' WHERE id=$id");
        }

        if ($query) {
            echo '
            <script>
                alert("Admin updated successfully.");
                window.location.href = "../pages/admin-list.php"
            </script>';
        }
    }
} else {
    //Customers
}
