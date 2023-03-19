<?php
    include ("../../../Learnifly/dbConnection/dbConnection.php");
    include ("../../../Learnifly/navbar/header.php");

    $emptyString = "Select";

    $getLecturers = "SELECT * FROM `user` WHERE user_role = 'lecturer'";
    $lecturersArray = array();
    $queryLecturers = mysqli_query($connection, $getLecturers);

    $getClasses = "SELECT * FROM `class`";
    $classesArray = array();
    $queryClasses = mysqli_query($connection, $getClasses);

    while($lecturer = mysqli_fetch_assoc($queryLecturers)) { 
        $lecturerName = $lecturer['user_name']; 
        array_push($lecturersArray, $lecturerName);
    }

    while($class = mysqli_fetch_assoc($queryClasses)) { 
        $className = $class['class_name'];
        array_push($classesArray, $className);
    }
    
?>
    
    <h1 class = "page_title">Add Course</h1>
    <img src="../../../Learnifly/images/tp063403/manage/School-Education-Course-PNG-Image.png" alt="" class = "addcourse-form-img">
    <form action = "uploadCourse.php" method = "post" enctype = "multipart/form-data" class = "addcourse-form">
        
        <div class = "addcourse-form-item">
            Course Name <br><input type = "text" name = "courseName" required class>
        </div> 
        <div class = "addcourse-form-item">
            Course Description <br><input type = "text" name = "courseDesc" required> <br>
        </div>
        <div class = "addcourse-form-item">
            Choose Lecturer <br><select name="lecturerName" required>
                            <?php                          
                                echo "<option value=\"$emptyString\" selected>$emptyString</option>";

                                foreach ($lecturersArray as $lecturer) {
                                    echo "<option value=\"$lecturer\">$lecturer</option>";
                                }
                            ?>
                            </select><br>
        </div>
        <div class = "addcourse-form-item">
            Select Class <br><select name = "class" required>
                            <?php
                                echo "<option value=\"$emptyString\" selected>$emptyString</option>";
                                foreach ($classesArray as $class) {
                                    echo "<option value=\"$class\">$class</option>";
                                }
                            ?>
                            </select><br>
        </div>
        <div class = "addcourse-form-item">
            Upload Course Image <br><input type = "file" name = "courseImage" required > <br>
            <p style = "font-style: italic; font-size: 12px;">file types allowed - jpg, jpeg, png, jfif, pdf, gif</p>
        </div>
        <div class = "addcourse-form-item">
            Upload Course Resource <br><input type = "file" name = "courseResource" required ><br>
        </div>
        <button type = "submit" name = "submit" class = "addcourse-form-button"><i class="fa-solid fa-check"></i>Submit</button>
    </form>


<?php
    mysqli_close($connection);
    include ("../../../Learnifly/navbar/footer.php");
?>