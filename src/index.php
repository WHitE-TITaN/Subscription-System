
<?php
require_once 'functions.php';

$_SESSION_start();
$_SESSION['action'] = 'register';
?>


<div class="container" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <form method="post" action="registerUser/register.php">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit-email">Register</button>
    </form>
</div>
