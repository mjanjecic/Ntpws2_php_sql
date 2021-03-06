<?php

include_once 'DB/db.inc.php';

function Include_page() {
    # Homepage
    if (!isset($_GET['menu']) || $_GET['menu'] == "home") { include("home.php"); }
    # Renders
    else if ($_GET['menu'] == "renders") { include("renders.php"); }
    # RenderDetails
    else if ($_GET['menu'] == "renderDetails") { include("renderDetails.php"); }
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
    #userPage
    else if ($_GET['menu'] == "userPage") { include("userPage.php"); }
    #apiPage
    else if ($_GET['menu'] == "api") { include("api.php"); }
    #admin
    else if ($_GET['menu'] == "admin") { include("admin.php"); }
    #adminUsers
    else if ($_GET['menu'] == "adminUsers") { include("admin/users.php"); }
    #adminRenders
    else if ($_GET['menu'] == "adminRenders") { include("admin/renders.php"); }
    #adminEditRender
    else if ($_GET['menu'] == "editRender") { include("admin/editRender.php"); }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta name="keywords" content="TVZ, HTML, Test">
    <meta name="description" content="Projekt za NTPWS">
    <meta name="author" content="Matija Janječić">
    <link rel="icon" href="images/icon.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="banner">
        </div>
        <nav class="navbar">
			<a href="index.php?menu=home">Home</a>
			<a href="index.php?menu=renders">Renders</a>
            <a href="index.php?menu=contact">Contact</a>
            <a href="index.php?menu=aboutUs">About us</a>
            <a href="index.php?menu=gallery">Gallery</a>
            <a href="index.php?menu=api">API</a>
            <?php
            session_start();
            if (isset($_SESSION['user']['username'])) {
                print '<a href="index.php?menu=userPage" class="loginNav">'.$_SESSION['user']['username'].'</a>';
                if($_SESSION['user']['role'] == 'ADMIN' || $_SESSION['user']['role'] == 'EDITOR') {
                    print '<a href="index.php?menu=admin">Admin</a>';
                }
                    print '<a href="logout.php">Log out</a>';

            } else {
                print '<a href="index.php?menu=login" class="loginNav">Login</a>
                       <a href="index.php?menu=register">Sign up</a>';
            }
            ?>

        </nav>
    </header>
<?php
    Include_page();
?>

    <footer>
        <p>Copyright &copy; Matija Janječić
            <a href="https://github.com/">
                <img src="images/github.png">
            </a>

        </p>
    </footer>
</body>
</html>
