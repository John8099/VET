<?php 
$host = "localhost";
$uname = "root";
$pass = "";
$db = "vet";

try {
    $con = mysqli_connect($host, $uname, $pass, $db);
}
catch (Exception $ex) {
    print_r($ex);
}
