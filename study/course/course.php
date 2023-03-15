<?php
    include ("../../../Learnifly/dbConnection/dbConnection.php");
    include ("../../../Learnifly/navbar/header.php");
?>


<head>
    <title>Manage Courses</title>
</head>


    <h1 class = "page_title">Manage Courses</h1>

    <img src="../../../Learnifly/images/tp063403/manage/manage.webp" alt="" class = "main_image">

    <div class = "button-container">  
        
        <div class = "button-item">
            <form action = "../course/addCourse/addCourse.php" method = "get">
                <button type = "submit" name = "add_course_button" class = "default_button">Add Course</button>
            </form>
        </div>
        <div class = "button-item">
            <form action = "../course/modifyCourse/modifyCourse.php" method = "get">
                <button type = "submit" name = "modify_course_button" class = "default_button">Modify Course</button>
            </form>
        </div>
        <div class = "button-item">
            <form action = "../course/deleteCourse/deleteCourse.php" method = "get">
                <button type = "submit" name = "delete_course_button" class = "default_button">Delete Course</button>
            </form>
        </div>
    </div>


<?php
    include ("../../../Learnifly/navbar/footer.php");
?>