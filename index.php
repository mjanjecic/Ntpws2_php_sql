<?php

include_once 'DB/db.inc.php';

function Include_page() {
    # Homepage
    if (!isset($_GET['menu']) || $_GET['menu'] == "home") { include("home.php"); }
    # News
    else if ($_GET['menu'] == "news") { include("news.php"); }
    # News1
    else if ($_GET['menu'] == "news1") { include("news1.php"); }
    # News2
    else if ($_GET['menu'] == "news2") { include("news2.php"); }
    # News3
    else if ($_GET['menu'] == "news3") { include("news3.php"); }
    # News4
    else if ($_GET['menu'] == "news4") { include("news4.php"); }
    # Contact
    else if ($_GET['menu'] == "contact") { include("contact.php"); }
    # About Us
    else if ($_GET['menu'] == "aboutUs") { include("aboutUs.php"); }
    # Gallery
    else if ($_GET['menu'] == "gallery") { include("gallery.php"); }
    #login
    else if ($_GET['menu'] == "login") { include("login.php"); }
    #register
    else if ($_GET['menu'] == "register") { include("register.php"); }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="keywords" content="TVZ, HTML, Test">
    <meta name="description" content="First project for college">
    <meta name="author" content="Matija Janječić">
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <header>
        <div class="banner"></div>
        <nav class="navbar">
			<a href="index.php?menu=home">Home</a>
			<a href="index.php?menu=news">News</a>
            <a href="index.php?menu=contact">Contact</a>
            <a href="index.php?menu=aboutUs">About us</a>
            <a href="index.php?menu=gallery">Gallery</a>
            <?php
            if (isset($_COOKIE['username'])) {
                print '<p class="loginNav">'.$_COOKIE['username'].'</p>';
            }
            ?>
            <a href="index.php?menu=login" class="loginNav">Login</a>
            <a href="index.php?menu=register">Sign up</a>
        </nav>
    </header>
<?php
    Include_page();
?>

    <footer>
        <p>Created by Matija
            <a href="https://github.com/">
                <img src="images/github.png">
            </a>
        </p>
    </footer>
</body>
</html>
