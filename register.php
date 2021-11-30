<main>
    <form method="post" action="registerResult.php">
        <label name="username" for="username">Username</label>
        <input type="text" name="username" id="username" required placeholder="Username">
        <label name="password" for="password">Password</label>
        <input type="password" name="password" id="password" required placeholder="Password">
        <label name="rptpassword" for="rptpassword">Repeat Password</label>
        <input type="rptpassword" name="rptpassword" id="rptpassword" required placeholder="Repeat password">
        <label name="full_name" for="full_name">Full name</label>
        <input type="text" name="full_name" id="full_name" required placeholder="John Doe">
        <label name="email" for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <label name="country" for="country">Country</label>
        <?php
        include 'countries.php';
        ?>
        <label name="birth_date" for="birth_date">Birth Date</label>
        <input type="date" name="birth_date" id="birth_date" required>
        <?php
            if (isset($_GET['error'])) {

                if ($_GET['error'] == "userExists") {
                    print '<p style="color: red">USER ALREADY EXISTS!</p>';
                }
                else if($_GET['error'] == "emailExists") {
                    print '<p style="color: red">EMAIL ALREADY EXISTS!</p>';
                }
                else if($_GET['error'] == "passwordMatch") {
                    print '<p style="color: red">PASSWORDS DONT MATCH!</p>';
                }
            }
        ?>
        <button type="submit" name="submit">Register</button>
        <p>Already have an account?</p>
        <a href="index.php?menu=login">Log in</a>
    </form>
</main>