<?php
include "conn.php";
session_start();

$id = $_POST['id'];
$date = $_POST['date'];
$time = $_POST['time'];
$details = $_POST['details'];

$query = mysqli_query($con, "UPDATE appointments SET `date`='$date', `time`='$time', details='$details' WHERE id = $id");

if ($query) {
    echo '
    <script>
        alert("Appointment updated successfully.");
        window.location.href = "../pages/appointment.php"
    </script>';
}
