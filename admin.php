<?php
if ($_SESSION['user']['role'] == 'ADMIN' || $_SESSION['user']['role'] == 'EDITOR') {
    print '
		<h1>Administration</h1>
		<div id="adminLinks">';
    if ($_SESSION['user']['role'] == 'ADMIN') {
        print '<a href="index.php?menu=adminUsers"">Users</a>';
    }
    print '
        <a href="index.php?menu=adminRenders">Renders</a>
		</div>';
}
else {
    $_SESSION['message'] = '<p>Please register or login using your credentials!</p>';
    header("Location: index.php?menu=login");
}
