<?php

$servername = "localhost";
$dbUsername = "phongvu99";
$dbPassword = "eminemA1";
$dbName = "university";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}