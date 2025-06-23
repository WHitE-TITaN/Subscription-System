
<?php
require_once 'functions.php';

session_start();
$_SESSION['action'] = 'register';
$comicContent = fetchAndFormatXKCDData();

if(!$comicContent) $comicContent = "Error Fetching API";
?>


<html>
<head>
    <title>XKCD Comic Registration</title>
    <style>
        @font-face {
            font-family: terminus;
            src: url(terminusFonts/TerminusTTF-4.49.3.ttf) format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body{
            display: flex;
            flex-direction: column;
            min-height: 100vh;

            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            font-family: terminus;
            overflow: hidden;
            margin: 0;
            padding: 0;
        }
        .header button{
            background-color: rgb(102, 156, 236); 
            border-radius: 5px;  
            font-family: terminus;
            border: none;
            color: white;
            height: 25px
        }

        .header button:hover {
            background-color: rgb(22, 100, 210);
        }

        .header input[type = "email"] {
            width: 200px;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .header label{
            font-weight: bold;
            margin-right: 10px;
        }
    </style>

</head>
<body>
    <div class="header" style="text-align: center; padding: 10px; background-color:rgb(200, 200, 200);">
        <h1>Register for XKCD Comic Updates</h1>
        <p>Enter your email to receive updates on new XKCD comics.</p>
        <form method="post" action="registerUser/register.php" style="border: black; border-radius: 10px; border-color: black">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit">Register</button>
        </form>
    </div>

    <div class="container" style="flex: 1; display: flex; justify-content: center; align-items: center; height: auto; padding: 20px;">
        <strong><?php echo $comicContent; ?></strong>
    </div>
</body>
</html>



