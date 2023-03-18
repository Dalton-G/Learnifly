<?php
    include ("../../../Learnifly/dbConnection/dbConnection.php");
    include ("../../../Learnifly/navbar/header.php");
    
    $emptyString = "Select";
    
    $getCourses = "SELECT * FROM course";
    $queryCourse = mysqli_query($connection, $getCourses);
    $courseNameArray = array();

    foreach ($queryCourse as $course) {
        array_push($courseNameArray, $course['course_name']);
    }

?>
    <h1>Modify Course</h1>
    <link rel="stylesheet" href="modifyCoursesPage-light.css">

    <form action = "updateCoursePage.php" class = "" method = "post" enctype = "multipart/form-data">
        Choose Course: <select name="courseName" required>
                        <?php                             
                            echo "<option value=\"$emptyString\" selected>$emptyString</option>";
                            foreach ($courseNameArray as $courseName) {
                                echo "<option value=\"$courseName\">$courseName</option>";
                            }
                        ?>
                        </select><br>
                        <button type = "submit" name = "submit" class = "">Submit</button>
    </form>
    
    


<?php
    include ("../../../Learnifly/navbar/footer.php");
?>