<?php

$username=$_SESSION['user']['username'];
$full_name=$_SESSION['user']['full_name'];
$email=$_SESSION['user']['email'];
$country=$_SESSION['user']['country'];
$birth_date=$_SESSION['user']['birth_date'];
print '<main>
<p>Username: '.$username.'</p>
<p>Email: '.$email.'</p>
<p>Full name: '.$full_name.'</p>
<p>Country: '.$country.'</p>
<p>Birth Date: '.$birth_date.'</p>
</main>';
