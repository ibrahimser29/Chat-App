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
        <div id="signup-error" class="error">error</div>
        <form action="#" id="sign-up" enctype="multipart/form-data">
            <div class="field fullname">
                <div class="input">
                <label>First Name</label>
                <input type="text" placeholder="First Name" name="fname"/>
                </div>
                <div class="input">
                <label>Last Name</label>
                <input type="text" placeholder="Last Name" name="lname"/>
                </div>
            </div>
            <div class="field">
                <label>Email Address</label>
                <input type="email" placeholder="Email Address" name="email"/>
            </div>
            <div class="field">
                <label>Password</label>
                <input type="password" placeholder="Password" name="password"/>
            </div>
            <div class="field">
                <label>Confirm Password</label>
                <input type="password" placeholder="Confirm Password" name="confirm_password"/>
            </div>
            <div class="field">
                <label>Select Image</label>
                <input type="file" name="image"/>
            </div>
                <button type="submit" id="sign-up-btn">Continue to Chat</button>
                <p>Already Member? <a href="index.php">Sign in</p>
        </from>
    </div>

</div>
<script src="js/signup.js"></script>
</body>
</html>