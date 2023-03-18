<?php
    include ("../../../Learnifly/dbConnection/dbConnection.php");
    include ("../../../Learnifly/navbar/header.php");

    $getLecturers = "SELECT * FROM `user` WHERE user_role = 'lecturer'";
    $lecturersArray = array();
    $queryLecturers = mysqli_query($connection, $getLecturers);

    $getClasses = "SELECT * FROM `class`";
    $classesArray = array();
    $queryClasses = mysqli_query($connection, $getClasses);

    while($lecturerName = mysqli_fetch_assoc($queryLecturers)['user_name']) { 
        array_push($lecturersArray, $lecturerName);
    }

    while($className = mysqli_fetch_assoc($queryClasses)['class_name']) { 
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
                                    $emptyString = "Select a Lecturer";

                                    echo "<option value=\"$emptyString\" selected>$emptyString</option>";
                                    
                                    foreach ($lecturersArray as $lecturer) {
                                        echo "<option value=\"$lecturer\">$lecturer</option>";
                                    }
                            ?>
                            </select><br>
            
            Add Classes:  <?php 
                                if ($classesArray != null) {
                                    foreach ($classesArray as $class) {
                                        echo "<label><input type=\"checkbox\" name=\"classes[]\" value=\"$class\">$class</label><br>";
                                    }
                                } else {
                                    echo "<label>No Classes Exist</label><br>";
                                }
                                             
                            ?>
                            <br>
            
            Upload Course Image: <input type = "file" name = "courseImage" required> <br>
            <p style = "font-style: italic; font-size: 12px;">file types allowed - jpg, jpeg, png, jfif, pdf, gif</p>
            <p style = "font-style: italic; font-size: 12px;">It is ideal to choose an image with a 1:1 aspect ratio</p>
            Upload Course Resource: <input type = "file" name = "courseResource" required>
            <p style = "font-style: italic; font-size: 12px;">file types allowed - pdf, pptx, docx, xlsx</p>
            <button type = "submit" name = "submit" class = "">Upload</button>
        </form>
    </div>

<?php
    include ("../../../Learnifly/navbar/footer.php");
?>