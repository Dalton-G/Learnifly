<?php
    include ("../../../Learnifly/dbConnection/dbConnection.php");
    include ("../../../Learnifly/navbar/header.php");

    $getLecturers = "SELECT * FROM `user` WHERE user_role = 'lecturer'";
    $lecturersArray = array();
    $queryLecturers = mysqli_query($connection, $getLecturers);

    if (mysqli_fetch_assoc($queryLecturers) != null) {  // If Lecturers exist, loop through and push to array
        while($lecturerName = mysqli_fetch_assoc($queryLecturers)['user_name']) {
            array_push($lecturersArray, $lecturerName);
        }
    } else {
        // Do Nothing
    }

?>
    
    <h1>Add Course</h1>

    <div>
        <form action = "uploadCourse.php" method = "post" enctype = "multipart/form-data" class = "">
            Course Name: <input type = "text" name = "courseName" required> <br> 
            Course Description: <input type = "text" name = "courseDesc" required> <br>

            Choose Lecturer: <select name="lecturer" required>
                            <?php
                                foreach ($lecturersArray as $lecturer) {
                                    echo "<option value=\"$lecturer\">$lecturer</option>";
                                }
                            ?>
                            </select><br>

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