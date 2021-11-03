<main>
    <form method="post" action="registerResult.php">
        <label name="username" for="username">Username</label>
        <input type="text" name="username" id="username" required placeholder="Username" value="Matija">
        <label name="password" for="password">Password</label>
        <input type="password" name="password" id="password" required placeholder="Password" value="123">
        <label name="rptpassword" for="rptpassword">Repeat Password</label>
        <input type="rptpassword" name="rptpassword" id="rptpassword" required placeholder="Repeat password" value="123">
        <label name="full_name" for="full_name">Full name</label>
        <input type="text" name="full_name" id="full_name" required placeholder="John Doe" value="Matija Janjecic">
        <label name="email" for="email">Email</label>
        <input type="email" name="email" id="email" required value="matijaj14@gmail.com">
        <label name="country" for="country">Country</label>
        <?php
        include 'countries.php';
        ?>
        <label name="city" for="city">City</label>
        <input type="text" name="city" id="city" required value="Zagreb">
        <label name="address" for="address">Adress</label>
        <input type="text" name="address" id="address" required value="123">
        <label name="birth_date" for="birth_date">Birth Date</label>
        <input type="text" name="birth_date" id="birth_date" required value="11/10/2021">
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
    </form>
        <p>Already have an account?</p>
        <a href="index.php?menu=login">Log in</a>
</main>