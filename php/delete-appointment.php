<?php
session_start();
include "conn.php";

$id = $_GET['id'];

$query = mysqli_query($con, "DELETE FROM appointments WHERE id = $id");

if ($query) {
    echo '
    <script>
        alert("Admin deleted successfully.");
        window.location.href = "../pages/appointment.php"
    </script>';
}
