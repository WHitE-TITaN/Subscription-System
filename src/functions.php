<?php

/**
 * Generate a 6-digit numeric verification code.
 */
function generateVerificationCode(): string {
    rand(100000, 999999);
    return str_pad((string)rand(100000, 999999), 6, '0', STR_PAD_LEFT);
}

/**
 * Send a verification code to an email.
 */
function sendVerificationEmail(string $email, string $code): bool {
    $task = $_SESSION['action'];
    $to = $email;
    $subject = "Your OTP Code for $task";
    $message = "Hello! Your OTP code is: $code

                Please use this code to verify your email address for $task.
                If you did not request this, please ignore this email.
                
                
                Click here to unsubscribe - 'http://localhost/xkcd-WHitE-TITaN/src/unsubscribe.php'


                thank you for using our service!";
    if(emailService($to, $subject, $message)) {
        return true;
    } else {
        return false; // Email sending failed
    }
}

/**
 * Register an email by storing it in a file.
 */
function registerEmail(string $email): bool {
    $file = __DIR__ .'/registered_emails.txt';
    
    if (!file_exists($file)) {
        file_put_contents($file, ""); // Create the file if it doesn't exist
    }

    $line = $email . " " . date("d-m-y H:i:s") . PHP_EOL;
    file_put_contents($file, $line, FILE_APPEND | LOCK_EX);

    return true;
}

/**
 * Unsubscribe an email by removing it from the list.
 */
function unsubscribeEmail(string $email): bool {
  $file = __DIR__ . '/registered_emails.txt';
    if(!file_exists($file)) return false; // File does not exist, nothing to unsubscribe

    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $filtered = array_filter($lines, fn($line) => !str_contains($line, $email));
    file_put_contents($file, implode(PHP_EOL, $filtered) . PHP_EOL);
}



/**
 * Fetch random XKCD comic and format data as HTML.
 */
function fetchAndFormatXKCDData(): string {
    // TODO: Implement this function
}

/**
 * Send the formatted XKCD updates to registered emails.
 */
function sendXKCDUpdatesToSubscribers(): void {
  $file = __DIR__ . '/registered_emails.txt';
    // TODO: Implement this function
}




/*
    * Check if an email is already registered.
*/ 
function isEmailRegistered(string $email): bool {
    $file = __DIR__ . '/registered_emails.txt';
    if (!file_exists($file)) {
        return false; // File does not exist, no emails registered
    }

    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos($line, $email) === 0) { // Check if the line starts with the Email is registered
            return true; 
        }
    }
    return false; // Email not found in the registered emails
}


/* 
    *mail service function to send emails
*/
function emailService($to, $subject, $message): bool {
    $headers = "From: davilk411@gmail.com"; // Use domain email in production
    if (mail($to, $subject, $message, $headers)) {
        return true;
    } else {
        return false;
    }
}