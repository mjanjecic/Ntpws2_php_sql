<main class="contactMain">
    <h1>Contact</h1>
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2781.7974754342285!2d15.967324915568545!3d45.79528497910614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765d68b441ce2df%3A0x54e2a03adf42446f!2sTehni%C4%8Dko%20veleu%C4%8Dili%C5%A1te%20u%20Zagrebu!5e0!3m2!1shr!2shr!4v1635175771578!5m2!1shr!2shr" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <hr>
    <form action="contactResult.php" method="get" class="UserForm">
        <label name="name" for="name">First Name<span style="color: red">*</span>:</label>
        <input type="text" name="name" id="name" required placeholder="First name">
        <label name="surname" for="surname">Last Name<span style="color: red">*</span>:</label>
        <input type="text" name="surname" id="surname" required placeholder="Last name">
        <label name="email" for="email">Email<span style="color: red">*</span>:</label>
        <input type="email" name="email" id="email" required>
        <label for="country">Country<span style="color: red">*</span>:</label>

<?php
include("countries.php");
?>

<label>Description:</label>
        <textarea style="height: 250px;"></textarea>
        <div>
            <button type="reset">Reset</button>
            <button type="submit">Submit</button>
        </div>
    </form>
</main>
