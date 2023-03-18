<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../images/tp063338/logo/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <!-- Link to CSS -->
    <link rel="stylesheet" href="styles.css" />
    <!-- Link to login.js -->
    <script src="js/login.js" defer></script>

    <title>Login</title>
</head>

<body>
    <div class="login-section">
        <div class="left-side">
            <!-- Logo and Title -->
            <div class="description-div">
                <img src="./images/logoText.png" alt=""/>
                <p>Welcome back! Please enter your details</p>
            </div>
            <!-- Login Form -->
            <form action="" method="POST" class="credentials">
                <p class="error-msg">
                    <!-- Generated msg -->
                </p>
                <div class="input">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" name="email" placeholder="Enter Email" />
                </div>
                <div class="input">
                    <label for="password">Password</label>
                    <input id="password" type="password" name="password" placeholder="Enter Password" />
                    <i class="fas fa-eye icon"></i>
                </div>
                <button name="loginBtn">Sign in</button>
            </form>
            <a href="./resetPassword.php">Forgot your password?</a>
        </div>
        <div class="right-side cover-img">
            <img src="" alt="Cover Image" /> <!-- Generated image -->
            <div class="testimony-div">
                <p>
                    "Thanks to Learnifly, I can concentrate on my students'
                    education without any distractions!" <br />
                    - Sarah Johnson, Lecturer
                </p>
            </div>
        </div>
    </div>
</body>

</html>