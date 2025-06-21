<?php

require_once '../functions.php';

// check if the request method is POST
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    echo '<div class="container" style="display: flex; justify-content: center; align-items: center; color: red; height: 100vh;">
            <h1>
                "Invalid Request Method"
            </h1>
          </div>';
    return false;
}
else{
    // Call the function to verify the code
    if(varifyCode()){
        // If verification is successful, redirect to the home page or any other page and register the email to txt file
        //header("Location: ../index.php");
        registerEmail($_SESSION['email']);
        $task = $_SESSION['action'];
        $to = $_SESSION['email'];
        $subject = "Email Successfull $task";
        $message = "Hello! Your email has been successfully $task.
        
                    ";

        $message .= $task === 'register' ? "Enjoy the Service!
                    " : "You have successfully unsubscribed from our service.
                    ";

        $message .= $task !== 'unsubscribe' ? 'to unsubscribe, click here - "http://localhost/xkcd-WHitE-TITaN/src/unsubscribe.php"
                    ' :  "Thank you for using our service!
                    ";

        if($task === 'unsubscribe'){
            unsubscribeEmail($to);
        }  

        emailService($to, $subject, $message);
        session_destroy();
        exit();
    }
}

function varifyCode():bool {
    // Start the session to access session variables
    session_start();

    $OTP = $_POST['OTP'] ?? null;
    $code = $_SESSION['code'] ?? null;
    $email = $_SESSION['email'] ?? null;
    $task = $_SESSION['action'] ?? null; // Check if the session variable 'action' is set and equals 'register' or 'unsubscribe'

    

    // Check if the session variable 'OTP' is set and not empty
    if(empty($OTP) || empty($code)){
        echo '<div class="container" style="display: flex; justify-content: center; align-items: center; color: red; height: 100vh;">
                <h1>
                    "Invalid or Missing OTP Code"
                </h1>
              </div>';
        return false;
    }

    if(empty($email)){
        echo '<div class="container" style="display: flex; justify-content: center; align-items: center; color: red; height: 100vh;">
                <h1>
                    "Email Not Found in Session"
                </h1>
              </div>';
        return false;
    }
    
    // Compare the submitted OTP with the stored code
    if($code !== $OTP){
        echo '<div class="container" style="display: flex; justify-content: center; align-items: center; color: red; height: 100vh;">
                <h1>
                    "Invalid OTP Code"
                </h1>
              </div>';
        return false;
    }
    else{
        echo '<div class="container" style="display: flex; justify-content: center; align-items: center; color: green; height: 100vh;">
                <h1>
                    "Email Successfully $task"
                </h1>
              </div>';
        return true;
    }
}
?>