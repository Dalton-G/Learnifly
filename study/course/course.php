<?php
    include ("../../../Learnifly/dbConnection/dbConnection.php");
    include ("../../../Learnifly/navbar/header.php");
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
                    <form action = "../course/modifyCourse.php" method = "get">
                        <button type = "submit" name = "modify_course_button" class = "default_button"><i class="fa-solid fa-pencil"></i>Modify Course</button>
                    </form>
                </div>
                <div class = "button-item">
                    <form action = "../course/deleteCourse.php" method = "get">
                        <button type = "submit" name = "delete_course_button" class = "default_button"><i class="fa-solid fa-trash"></i>Delete Course</button>
                    </form>
                </div>
            </div>
        </div>


<?php
    include ("../../../Learnifly/navbar/footer.php");
?>