<?php
session_start();
require_once '../functions.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //check if the email is set and not empty
    if($_SESSION['action'] == 'unsubscribe' && !isEmailRegistered($_POST['email'])){
        echo '<div class="container" style="display: flex; justify-content: center; align-items: center; color: red; height: 100vh;">
                <h1>
                    "Email Not Registered"
                </h1>
              </div>';
        return;
    }

    if(!isset($_POST['email']) ||
        empty($_POST['email']) ||
        !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        echo'<div class = "container" style = "display : flex; justify-content : center; align-item : center; color: red; height : 100vh;">
                <h1>
                    "Not Valid Email"
                </h1>
            </div>';
        return;
    }

    // register the email and send the verification code
    $email = $_POST['email'];
    if($_SESSION['action'] == 'register' && isEmailRegistered($email)){
        echo'<div class = "container" style = "display : flex; justify-content : center; align-item : center; color: red; height : 100vh;">
                <h1>
                    "Email Already Registered"
                </h1>
            </div>';
        return;
    }

    $_SESSION['email'] = $email;
    $code = generateVerificationCode();
    $_SESSION['code'] = $code;
    if(!sendVerificationEmail($email, $code)){
        echo'<div class = "container" style = "display : flex; justify-content : center; align-item : center; color: red; height : 100vh;">
                <h1>
                    "Error Sending OTP"
                </h1>
            </div>';
        return;
    }
}

else{
    // if the request method is not POST, show an error message
    echo'<div class = "container" style = "display : flex; justify-content: center; align-items: center; color: red; height: 100vh;">
            <h1>
                "Invalid Request"
            </h1>
        </div>';
    return;
}

?>

<!-- form to verify the email after otp is sent -->
<div class="container" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
    <form method="post" action="varify.php">
        <label for="OTP">OTP Code Sent to : <strong><?php echo htmlspecialchars($email); ?></strong></label>
        <input type="text" id="verification_code" name="OTP" required maxlength="6">
        <button type="submit-verification" >Verify</button>
    </form>
</div>






<div id="emailExistsPopup" style="display:none; position:fixed; top:30%; left:50%; transform:translate(-50%, -30%); background:#fff; border:2px solid #333; padding:30px 40px; z-index:1000; box-shadow:0 2px 10px rgba(0,0,0,0.3); border-radius:10px;">
    <p style="font-size:18px; color:#d00;">This email is already registered!</p>
    <button onclick="document.getElementById('emailExistsPopup').style.display='none';" style="margin-top:10px; padding:5px 15px; border-radius:5px; border:none; background:#333; color:#fff;">Close</button>
</div>

<script>
    // Check if the URL contains ?email_exists=1
    if (window.location.search.includes('email_exists=1')) {
        document.getElementById('emailExistsPopup').style.display = 'block';
    }
</script>

