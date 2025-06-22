
<?php
require_once 'functions.php';

session_start();
$_SESSION['action'] = 'register';
$comicContent = fetchAndFormatXKCDData();

?>

<div class="header" style="text-align: center; padding: 10px; background-color: #f0f0f0;">
    <h1>Register for XKCD Comic Updates</h1>
    <p>Enter your email to receive updates on new XKCD comics.</p>
    <form method="post" action="registerUser/register.php" style="border: black; border-radius: 10px; border-color: black">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit-email">Register</button>
    </form>
</div>

<div class="container" style="padding: 0px; display: flex; justify-content: center; align-items: center; height: 100vh;">
    <strong><?php echo $comicContent; ?></strong>
</div>
