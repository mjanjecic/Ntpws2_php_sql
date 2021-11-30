<?php
if ($_SESSION['user']['role'] == 'ADMIN') {
    print '
		<h1>Administration</h1>
		<div id="admin">
			<ul>
				<li><a href="index.php?menu=adminUsers"">Users</a></li>
				<li><a href="index.php?menu=adminNews">News</a></li>
			</ul>';
    # Admin Users
    #if ($action == 1) { include("admin/users.php"); }

    # Admin News
    #else if ($action == 2) { include("admin/news.php"); }
    print '
		</div>';
}
else {
    $_SESSION['message'] = '<p>Please register or login using your credentials!</p>';
    header("Location: index.php?menu=adminNews");
}
?>