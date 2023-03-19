<?php
if (!isset($_SESSION)) {
    session_start();
}

$user_id = $_SESSION["user_id"];
$user_role = $_SESSION["user_role"];
$user_name = $_SESSION["user_name"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../../../Learnifly/images/tp063338/logo/favicon.ico"/>
    <script src="https://kit.fontawesome.com/824073b7bb.js" crossorigin="anonymous"></script>
    <script src="../../../Learnifly/navbar/navbar-scripts.js" type="text/javascript" defer></script>
</head>
<body>
    <div class="flexbox-container" id="header-theme">
        <!-- coloumn 1 - left -->
        <div class="flexbox-item flexbox-item-1">
            <a href="#" class="header-logo-link"><h1 class="flexbox-item-1-logo"><i class="fa-solid fa-paper-plane"></i> Learnifly</h1></a>
        </div>
        <!-- coloum 2 - center -->
        <div class="flexbox-item flexbox-item-2">
            <!-- admin only functions  !!!!!! -->
            <?php if (isset($_SESSION['user_role'])) {
                    if ($user_role == "admin") {
                        echo "<a href= '../../../Learnifly/homepage/homepage_admin.php' class='navbar-link'>Dashboard</a>";
                        echo "<a href='../../../Learnifly/study/class/class.php' class='navbar-link'>Class</a>";
                        echo "<a href='../../../Learnifly/study/course/course.php' class='navbar-link'>Course</a>";
                        echo "<a href='../../../Learnifly/registration/registration.php' class='navbar-link'>Account</a>";
                    } else if ($user_role == "lecturer") {
                        echo "<a href= '../../../Learnifly/homepage/homepage.php' class='navbar-link'>Home</a>";
                        echo "<a href= '../../../Learnifly/submission/grading/view-submission.php' class='navbar-link'>View Submission</a>";
                        echo "<a href= '../../../Learnifly/homepage/homepage.php' class='navbar-link'>Create Assignment</a>";
                    } else if ($user_role == "student") {
                        echo "<a href= '../../../Learnifly/homepage/homepage.php' class='navbar-link'>Home</a>";
                        echo "<a href= '../../../Learnifly/submission/submit/submitAssignment.php' class='navbar-link'>Submit Assignment</a>";
                    }
                }
            ?>
        </div>
        <!-- coloum 3 - right -->
        <div class="flexbox-item flexbox-item-3">
            <!-- [3.1] profile dropdown menu -->
            <div class="dropdown" data-dropdown>
                <button class="navbar-link"><i class="fa-solid fa-user" data-dropdown-button></i></button>
                <div class="dropdown-menu information-grid">
                    <!-- profile dropdown list start -->
                    <div>
                        <div class="dropdown-heading"><?php echo $user_name ?></div>
                        <div class="dropdown-links">
                            <a href="../login/logout.php" class="dropdown-navbar-link">Log Out</a>
                        </div>
                    </div>
                    <!-- profile dropdown list ends -->
                </div>
            </div>
            <!-- [3.2] toggle theme function -->
            <div class="toggle-container">
                <input type="checkbox" class="header-toggle-theme-checkbox-class" id="header-toggle-theme-checkbox-id" onclick="isChecked()">
                <label for="header-toggle-theme-checkbox-id" class="header-toggle-theme-label-class">
                    <i class="fa-solid fa-moon"></i>
                    <i class="fa-solid fa-sun"></i>
                    <div class="header-toggle-theme-ball"></div>
                </label>
            </div>
        </div>
    </div>
</body>
</html>