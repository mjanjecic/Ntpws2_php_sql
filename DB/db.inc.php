<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "ntpws_vjezbe";

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if(!$conn) {
    die("Connection to database failed! " . mysqli_connect_error());
}
