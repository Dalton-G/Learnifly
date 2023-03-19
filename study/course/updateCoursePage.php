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
    
    $courseName = $_POST['courseName'];
    $getCourseID = "SELECT * FROM `course` WHERE course_name = '$courseName'";
    $courseIDQuery = mysqli_query($connection, $getCourseID);
    
    $getLecturers = "SELECT * FROM `user` WHERE user_role = 'lecturer'";
    $lecturersArray = array();
    $queryLecturers = mysqli_query($connection, $getLecturers);

    while($lecturer = mysqli_fetch_assoc($queryLecturers)) { 
        $lecturerName = $lecturer['user_name']; 
        array_push($lecturersArray, $lecturerName);
    }

    if ($courseName == "Select") {
        echo '<script type="text/JavaScript">  
        alert("A Course must be selected, please choose a course");
        window.location = ("modifyCoursesPage.php");
        </script>';
    }

?>
    <?php if (isset($_POST['submit'])) { ?>
    
        <h1 class = "page_title">Update <?=$_POST['courseName']?> Course</h1>
        
        <?php while ($courseDetail = mysqli_fetch_assoc($courseIDQuery)) { ?>

            <?php        
                $courseID = $courseDetail['course_id'];
                $courseName = $courseDetail['course_name'];
                $courseResource = $courseDetail['course_resource'];
                $courseImage = $courseDetail['course_img'];
                $courseDescription = $courseDetail['course_desc'];
                $lecturerID = $courseDetail['user_id'];
                $classID = $courseDetail['class_id'];

                $getLecturerName = "SELECT * FROM `user` WHERE user_id = '$lecturerID'";    
                $lecturerNameQuery = mysqli_query($connection, $getLecturerName);
                $lecturerNameArray = mysqli_fetch_assoc($lecturerNameQuery);
                $lecturerName = $lecturerNameArray['user_name'];

                $getClassName = "SELECT * FROM `class` WHERE class_id = '$classID'";
                $classNameQuery = mysqli_query($connection, $getClassName);
                $classNameArray = mysqli_fetch_assoc($classNameQuery);
                $className = $classNameArray['class_name'];
            ?>
            
            <img class = "addcourse-form-img" style = "width: 350px; height: 350px;" src = "../../images/courseImages/<?=$courseDetail['course_img'];?>">

            <div class = "updatecourse-container">
                <div class = "updatecourse-item">
                    <span>Course Description: </span><?=$courseDescription?>
                </div>
                <div class = "updatecourse-item">
                    <span>Course Resource: </span><?=$courseResource?>
                </div>
                <div class = "updatecourse-item">
                    <span>Class: </span><?=$className?>
                </div>
                <div class = "updatecourse-item">
                    <span>Lecturer Assigned: </span><?=$lecturerName?>
                </div>
            </div>
            <br>

            <form action = "updateCourse.php" method = "post" class = "addcourse-form" enctype = "multipart/form-data">
                <input type = "hidden" name = "courseName" value = "<?=$courseName?>">
                <input type = "hidden" name = "courseID" value = "<?=$courseID?>">
                <input type = "hidden" name = "classID" value = "<?=$classID?>">

                <div class = "addcourse-form-item">
                    Modify Description <br><input type = "text" name = "courseDescription" value = "<?= $courseDescription; ?>" required> <br>
                </div>
                <div class = "addcourse-form-item">
                    Change Resource File <br><input type = "file" name = "courseResource"> <br>
                </div>
                <div class = "addcourse-form-item">
                    Change Lecturer <br><select name="lecturerName" required>
                                    <?php                          
                                        foreach ($lecturersArray as $lecturer) {
                                            if ($lecturerName == $lecturer) {
                                                echo "<option value=\"$lecturerName\" selected>$lecturerName</option>"; // Sets the previous value as the default selected value
                                            } else {
                                                echo "<option value=\"$lecturer\">$lecturer</option>"; // Displays all other lectuers below the default
                                            }
                                        }
                                    ?>
                                    </select>
                                    <br>
                </div>
                <div class = "addcourse-form-item">
                    Change Course Image <br><input type = "file" name = "courseImage" class = "addcourse-form-item"> <br>
                    <button type = "submit" name = "updateCourse" class = "addcourse-form-button" >Update Course</button>
                </div>
            </form>

        <?php }
    } 
    ?>
    

<?php
    mysqli_close($connection);
    include ("../../../Learnifly/navbar/footer.php");
?>