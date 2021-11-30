<main>
<form method="post" action="loginSubmit.php">
    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == "incorrectInput") {
            print '<p style="color: red">Username or password incorrect!</p>';
        }
        if ($_GET['error'] == "unauthorized") {
            print '<p style="color: red">User has not been approved by admin!</p>';
        }
    }
    ?>
    <label name="username" for="username">Username</label>
    <input type="text" name="username" id="username" required placeholder="Username">
    <label name="password" for="password">Password</label>
    <input type="password" name="password" id="password" required placeholder="Password">
    <button type="submit">Log in</button>
    <p>Don't have an account yet?</p>
    <a href="index.php?menu=register">Register</a>
</form>

</main>
