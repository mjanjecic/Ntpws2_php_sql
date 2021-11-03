<?php
/**
 * @var Object $conn
 */

require_once 'DB/db.inc.php';

$username=$_POST['username'];
$password=$_POST['password'];
$rptPassword=$_POST['rptpassword'];
$full_name=$_POST['full_name'];
$email=$_POST['email'];
$country=$_POST['country'];
$city=$_POST['city'];
$address=$_POST['address'];
$birt_date=$_POST['birth_date'];

if ($password != $rptPassword) {
    header("location: ../Ntpws_php/index.php?menu=register&error=passwordMatch");
}

// Escape user inputs for security
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$country = mysqli_real_escape_string($conn, $_POST['country']);
$birt_date = mysqli_real_escape_string($conn, $_POST['birth_date']);

$user_check=mysqli_query($conn, "SELECT * FROM users WHERE username LIKE '$username';");
$email_check=mysqli_query($conn, "SELECT * FROM users WHERE email LIKE '$email';");

if (mysqli_num_rows($user_check)==0) {
    header("location: ../Ntpws_php/index.php?menu=register&error=userExists");
} else if (mysqli_num_rows($email_check)==0){
    header("location: ../Ntpws_php/index.php?menu=register&error=emailExists");
} else {
    $query = "INSERT INTO users (username, password, full_name, email, country_id) VALUES ('$username', '$password', '$full_name', '$email', '$country')";
    if (mysqli_query($conn, $query)) {
        echo "User added successfully.";
        header("location: ../Ntpws_php/index.php?menu=login");
    } else {
        echo "ERROR: Could not execute $query. " . mysqli_error($conn);
        header("location: ../Ntpws_php/index.php?menu=register&error=userExists");
    }
}

