<?php
    include ("../../../Learnifly/dbConnection/dbConnection.php");
    include ("../../../Learnifly/navbar/header.php");
?>

<?php

if (!(isset($_SESSION["user_id"]) && isset($_SESSION["user_role"]))) {
    header("Location:../../../Learnifly/login/login.php");
}

if (isset($_SESSION['user_role'])) {
    if ($user_role != "admin") {
        header("Location:../../../Learnifly/login/login.php");
    } else {

    }
}

?>

<head>
    <title>Manage Courses</title>
</head>

    <h1 class = "page_title">Manage Courses</h1>

        <div class = "div-container">
            <img src="../../../Learnifly/images/tp063403/manage/manage2.png" alt="" class = "main_image">
            <div class = "button-container">  
                <div class = "button-item">
                    <form action = "../course/addCourse.php" method = "get">
                        <button type = "submit" name = "add_course_button" class = "default_button"><i class="fa-regular fa-plus"></i>Add Course</button>
                    </form>
                </div>
                <div class = "button-item">
                    <form action = "../course/modifyCoursesPage.php" method = "get">
                        <button type = "submit" name = "modify_course_button" class = "default_button"><i class="fa-solid fa-pencil"></i>Modify Course</button>
                    </form>
                </div>
            </div>
        </div>


<?php
    mysqli_close($connection);
    include ("../../../Learnifly/navbar/footer.php");
?>