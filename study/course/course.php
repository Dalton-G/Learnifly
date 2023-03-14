<?php
    include ("../../../Learnifly/navbar/header.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="themeCourse" rel="stylesheet" type="text/css" href="../../../Learnifly/study/course/course-light.css">
    <script src="https://kit.fontawesome.com/09ed84f06d.js" crossorigin="anonymous"></script>
    <script src="../../../Learnifly/navbar/navbar-scripts.js" type="text/javascript" defer></script>
    <title>Manage Courses</title>
</head>
<body>
    <h1 class = "page_title">Manage Courses</h1>

    <img src="../../../Learnifly/images/tp063403/manage/manage.webp" alt="" class = "main_image">

    <div class = "button-container">  
        
        <div class = "button-item">
            <form action = "../course/addCourse/addCourse.php" method = "get">
                <button type = "submit" name = "add_course_button" class = "default_button">Add Course</button>
            </form>
        </div>
        <div class = "button-item">
            <button type = "submit" name = "modify_course_button" class = "default_button">Modify Course</button>
        </div>
        <div class = "button-item">
            <button type = "submit" name = "delete_course_button" class = "default_button">Delete Course</button>
        </div>
    </div>


</body>
</html>

<?php
    include ("../../../Learnifly/navbar/footer.php");
?>