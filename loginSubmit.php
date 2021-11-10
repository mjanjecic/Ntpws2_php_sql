<?php
/**
 * @var Object $conn
 */

require_once 'DB/db.inc.php';

// Escape user inputs for security
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);




$user_check=mysqli_query($conn, "SELECT * FROM users WHERE username LIKE '$username';");

if (mysqli_num_rows($user_check)!=0) {
    $row = @mysqli_fetch_array($user_check, MYSQLI_ASSOC);
    $hash = $row['password'];
    $verify_password = password_verify($password, $hash);

    if ($verify_password) {
        echo 'Password Verified!';
        $country_id = $row['country_id'];

        $country_result = mysqli_query($conn, "SELECT * FROM countries WHERE country_code LIKE '$country_id';");
        $country_row = @mysqli_fetch_array($country_result, MYSQLI_ASSOC);
        $country = $country_row['country_name'];
        session_start();
        $_SESSION['user']['username'] = $row['username'];
        $_SESSION['user']['full_name'] = $row['full_name'];;
        $_SESSION['user']['email'] = $row['email'];;
        $_SESSION['user']['country'] = $country;
        $_SESSION['user']['birth_date'] = $row['birth_date'];;
        header("location: ./index.php?menu=home");
    }
    else {
        echo 'Incorrect Password!';
    }
} else {
    header("location: ./index.php?menu=login&error=userExists");
}