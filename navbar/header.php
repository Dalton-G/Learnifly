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
            <a href= "../../../Learnifly/homepage/homepage.php" class="navbar-link">Home</a> 
            <a href="#" class="navbar-link">Study</a>
            <a href="../../../Learnifly/social/event/event.php" class="navbar-link">Hangout</a>
            <!-- dropdown-menu -->
            <div class="dropdown" data-dropdown>
                <button class="navbar-link" data-dropdown-button>More</button>
                <div class="dropdown-menu information-grid">
                    <!-- [2.1] academics dropdown section -->
                    <div>
                        <div class="dropdown-heading">Academics</div>
                        <div class="dropdown-links">
                            <a href="#" class="dropdown-navbar-link">Grades</a>
                            <a href="#" class="dropdown-navbar-link">Interim Transcript</a>
                        </div>
                    </div>

                    <!-- [2.2] my_purchase dropdown section -->
                    <div>
                        <div class="dropdown-heading">My Purchases</div>
                        <div class="dropdown-links">
                            <a href="#" class="dropdown-navbar-link">Order History</a>
                            <a href="#" class="dropdown-navbar-link">Resources</a>
                        </div>
                    </div>

                    <!-- [2.3] admin_function dropdown section -->
                    <div>
                        <div class="dropdown-heading">Admin Function</div>
                        <div class="dropdown-links">
                            <a href="#" class="dropdown-navbar-link">Manage Account</a>
                            <a href="../../../Learnifly/study/course/course.php" class="dropdown-navbar-link">Manage Course</a>
                            <a href="../../../Learnifly/study/class/class.php" class="dropdown-navbar-link">Manage Classes</a>
                        </div>
                    </div>
                    
                    <!-- [2.4] coursework dropdown section -->
                    <div>
                        <div class="dropdown-heading">Coursework</div>
                        <div class="dropdown-links">
                            <a href="#" class="dropdown-navbar-link">Assignment</a>
                            <a href="#" class="dropdown-navbar-link">Exam</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- coloum 3 - right -->
        <div class="flexbox-item flexbox-item-3">
            <!-- [3.1] chat dropdown menu -->
            <div class="dropdown" data-dropdown>
                <button class="navbar-link"><i class="fa-solid fa-comment" data-dropdown-button></i></button>
                <div class="dropdown-menu information-grid">
                    <!-- chat dropdown list start -->
                    <div>
                        <div class="dropdown-heading">Chat</div>
                        <div class="dropdown-links">
                            <a href="#" class="dropdown-navbar-link">Send Messages</a>
                            <a href="#" class="dropdown-navbar-link">Inbox</a>
                        </div>
                    </div>
                    <!-- chat dropdown list ends -->
                </div>
            </div>
            <!-- [3.2] profile dropdown menu -->
            <div class="dropdown" data-dropdown>
                <button class="navbar-link"><i class="fa-solid fa-user" data-dropdown-button></i></button>
                <div class="dropdown-menu information-grid">
                    <!-- profile dropdown list start -->
                    <div>
                        <div class="dropdown-heading">Profile</div>
                        <div class="dropdown-links">
                            <a href="#" class="dropdown-navbar-link">Account Settings</a>
                            <a href="#" class="dropdown-navbar-link">Wallet</a>
                            <a href="#" class="dropdown-navbar-link">Log Out</a>
                        </div>
                    </div>
                    <!-- profile dropdown list ends -->
                </div>
            </div>
            <!-- [3.3] toggle theme function -->
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