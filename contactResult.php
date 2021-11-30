<?php

$name = $_GET['name'];
$surname = $_GET['surname'];
$email = $_GET['email'];
$country = $_GET['country'];

print '<p>Name: ' . $name.'</p>';
print '<p>Surname: ' . $surname.'</p>';
print '<p>Email: ' . $email.'</p>';
print '<p>Country: ' . $country.'</p>';


print '<a href="index.php?menu=contact">Back to contact</a>';