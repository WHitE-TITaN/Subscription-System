<?php
    session_start();
    $_SESSION['action'] = 'unsubscribe';
?>

<div class="container" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <form method="post" action="registerUser/register.php">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit-email">Unsubscribe</button>
    </form>
</div>

