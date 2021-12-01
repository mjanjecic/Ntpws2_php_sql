<?php

$username=$_SESSION['user']['username'];
$full_name=$_SESSION['user']['full_name'];
$email=$_SESSION['user']['email'];
$country=$_SESSION['user']['country'];
$birth_date=$_SESSION['user']['birth_date'];
print '<main>
<h1>User data</h1>
<ul id="userDataShow">
    <li>Username: '.$username.'</li>
    <li>Email: '.$email.'</li>
    <li>Full name: '.$full_name.'</li>
    <li>Country: '.$country.'</li>
    <li>Birth Date: '.$birth_date.'</li>
</ul>
</main>';
