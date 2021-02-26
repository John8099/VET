<?php
include "conn.php";
session_start();

$id = $_GET['id'];
$query = mysqli_query($con, "UPDATE appointments SET `status` = 'done' WHERE id = $id");

if ($query) {
    echo '
    <script>
        window.location.href = "../pages/admin.php"
    </script>';
}
