<?php
include "conn.php";
session_start();

$date = $_POST['date'];
$time = $_POST['time'];
$details = $_POST['details'];

$query = mysqli_query($con, "INSERT INTO appointments(`user_id`, `date`, `time`, `status`, details) VALUES('$_SESSION[id]', '$date', '$time', 'pending', '$details')");

if ($query) {
    echo '
    <script>
        alert("Appointment set successfully.");
        window.location.href = "../pages/set-appointment.php"
    </script>';
}
