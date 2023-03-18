<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Learnifly icon -->
    <link rel="shortcut icon" href="../images/tp063338/logo/favicon.ico" type="image/x-icon">
    <!-- Font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
    <!-- Link to CSS -->
    <link rel="stylesheet" href="styles.css" />
    <!-- Link to resetPassword.js -->
    <script src="js/resetPassword.js" defer></script>

    <title>Reset Password</title>
</head>

<body>
    <div class="password-section">
        <div class="left-side cover-img">
            <img src="" alt="Cover Image" /><!-- Generated image -->
            <div class="testimony-div">
                <p>
                    "Thanks to Learnifly, I can concentrate on my students'
                    education without any distractions!" <br />
                    - Sarah Johnson, Lecturer
                </p>
            </div>
        </div>
        <div class="right-side">
            <div class="description-div">
                <img src="./images/logo.png" alt="" />
                <h3>Password Reset</h3>
                <p>Please enter your email and new password</p>
            </div>
            <form action="" method="POST" class="credentials">
                <p class="error-msg">
                    <!-- Generated msg -->
                </p>
                <div class="input">
                    <label for="email">Email Address</label>
                    <input id="email" type="email" name="email" placeholder="Enter Email" />
                </div>
                <div class="input">
                    <label for="password">New password</label>
                    <input id="password" type="password" name="password" placeholder="Enter New Password" />
                    <i class="fas fa-eye icon"></i>
                </div>

                <div class="input">
                    <label for="cPassword">Confirm password</label>
                    <input id="cPassword" type="password" name="cPassword" placeholder="Confirm New Password" />
                    <i class="fas fa-eye cpassword-icon"></i>
                </div>
                <button name="loginBtn">Reset password</button>
            </form>
            <a href="./login.php">Back to login</a>
        </div>
    </div>
</body>

</html>