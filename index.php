<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>"/>
    <title>Chat App</title>
</head>
<body>
<div class="container">
    <div class="login">
        <h2>Chat App</h2>
        <div id="signin-error" class="error">error</div>
        <form action="#" id="sign-in">

            <div class="field">
                <label>Email Address</label>
                <input type="email" placeholder="Email Address" name="email"/>
            </div>
            <div class="field">
                <label>Password</label>
                <input type="password" placeholder="Password" name="password"/>
            </div>
                <button id="signinbtn">Continue to Chat</button>
                <p>New here? <a href="signup.php">Sign Up</p>
        </from>
    </div>
    <script src="js/login.js"></script>
</div>
</body>
</html>