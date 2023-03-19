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

<?php
    $emptyString = "Select";
    
    $getCourses = "SELECT * FROM course";
    $queryCourse = mysqli_query($connection, $getCourses);
    $courseNameArray = array();

    foreach ($queryCourse as $course) {
        array_push($courseNameArray, $course['course_name']);
    }

?>
    <h1 class = "page_title">Modify Course</h1>
    <link rel="stylesheet" href="modifyCoursesPage-light.css">

    <img src="../../../Learnifly/images/tp063403/manage/modifyCourse.png" alt="" class = "addcourse-form-img">
        <form action = "updateCoursePage.php" class = "addcourse-form" method = "post" enctype = "multipart/form-data">
            <div class = "addcourse-form-item">
            <span>Choose Course</span> <br><select style = "margin-top: 10px"name="courseName" required>
                            
                            <?php                             
                                echo "<option value=\"$emptyString\" selected>$emptyString</option>";
                                foreach ($courseNameArray as $courseName) {
                                    echo "<option value=\"$courseName\">$courseName</option>";
                                }
                            ?>
                            </select><br>
            </div>
                            <button type = "submit" name = "submit" class = "addcourse-form-button"><i class="fa-solid fa-check"></i>Submit</button>
        </form>

<?php
    mysqli_close($connection);
    include ("../../../Learnifly/navbar/footer.php");
?>