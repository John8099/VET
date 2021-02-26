<?php
include "conn.php";
session_start();

$uname = $_POST["uname"];
$pass = $_POST["pass"];

$query = mysqli_query($con, "SELECT * FROM users WHERE uname = '$uname'");

if (mysqli_num_rows($query) > 0) {
    $user = mysqli_fetch_object($query);

    if (password_verify($pass, $user->pass)) {
        $_SESSION["id"] = $user->id;
        if ($user->user_type == "admin") {
            echo '
            <script>
                alert("Welcome Admin ' . $user->fname . ' ' . $user->lname . '.");
                window.location.href = "../pages/admin.php"
            </script>';
        } else {
            echo '
            <script>
                alert("Welcome back ' . $user->fname . ' ' . $user->lname . '.");
                window.location.href = "../pages/customer.php?page=all"
            </script>';
        }
    } else {
        echo '
        <script>
            alert("Password not match.\nPlease try again.");
            window.location.href = "../"
        </script>';
    }
} else {
    echo '
    <script>
        alert("Username \"' . $uname . '\" not found.\nPlease try again.");
        window.location.href = "../"
    </script>';
}
