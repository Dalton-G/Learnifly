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
    
    <h1>Add Course</h1>

    <div>
        <form action = "uploadCourse.php" method = "post" enctype = "multipart/form-data" class = "">
            Course Name: <input type = "text" name = "courseName" required> <br> 
            Course Description: <input type = "text" name = "courseDesc" required> <br>

            Choose Lecturer: <select name="lecturerName" required>
                            <?php                        
                                    
                                    echo "<option value=\"$emptyString\" selected>$emptyString</option>";

                                    foreach ($lecturersArray as $lecturer) {
                                        echo "<option value=\"$lecturer\">$lecturer</option>";
                                    }
                            ?>
                            </select><br>
            
            Select Class - <select name = "class" required>
                            <?php
                                echo "<option value=\"$emptyString\" selected>$emptyString</option>";
                                foreach ($classesArray as $class) {
                                    echo "<option value=\"$class\">$class</option>";
                                }
                            ?>
                            </select><br>
        
            Upload Course Image: <input type = "file" name = "courseImage" required> <br>
            <p style = "font-style: italic; font-size: 12px;">file types allowed - jpg, jpeg, png, jfif, pdf, gif</p>
            <p style = "font-style: italic; font-size: 12px;">It is ideal to choose an image with a 1:1 aspect ratio</p>
            Upload Course Resource: <input type = "file" name = "courseResource" required><br>
            <button type = "submit" name = "submit" class = "">Upload</button>
        </form>
    </div>

<?php
    include ("../../../Learnifly/navbar/footer.php");
?>