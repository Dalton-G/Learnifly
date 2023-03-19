<?php
    include ("../../../Learnifly/dbConnection/dbConnection.php");
    if (isset($_POST['submit'])) {
        
        $courseName = $_POST['courseName'];
        $courseDesc = $_POST['courseDesc'];
        $courseImage = $_FILES['courseImage'];
        $courseResource = $_FILES['courseResource'];
        $courseLecturer = $_POST['lecturerName'];
        $classSelected = $_POST['class'];

        $imageName = $courseImage["name"];
        $tempImageName = $courseImage["tmp_name"];
        $imageStorage = "../../images/courseImages/" . $imageName;

        $resourceName = $courseResource["name"];
        $tempResourceName = $courseResource["tmp_name"];
        $resourceStorage = "../../resources/courseResource/" . $resourceName;
        
        if ($courseLecturer != "Select") {
            $getLecturerID = "SELECT * FROM `user` WHERE user_name = '$courseLecturer'";
            $queryLecturerID = mysqli_query($connection, $getLecturerID);
            $lecturerIDArray = mysqli_fetch_assoc($queryLecturerID);
            $lecturerID = $lecturerIDArray['user_id'];
        } else {
            // Nothing Happens
        }

        if ($classSelected != "Select") {
            $getClassID = "SELECT * from `class` WHERE class_name = '$classSelected'";
            $queryClassID = mysqli_query($connection, $getClassID);
            $classIDArray = mysqli_fetch_assoc($queryClassID);
            $classID = $classIDArray['class_id'];
        } else {
            // Nothing Happens
        }

        // $getExistingCourses = "SELECT * FROM `course`";
        // $courseArray = array();
        // $queryCourses = mysqli_query($connection, $getExistingCourses);

        // Constraints on Filetypes for Image
        $imageArray = explode('.', $imageName);
        $imageExt = strtolower(end($imageArray));
        $allowedExt = array('jpg', 'jpeg', 'png', 'jfif', 'pdf', 'gif', 'webp');


        $getAllCourses = "SELECT * FROM `course`";
        $queryAllCourses = mysqli_query($connection, $getAllCourses);
        while ($course = mysqli_fetch_assoc($queryAllCourses)) {
            if ($courseName == $course['course_name']) {
                echo '<script type="text/JavaScript">   
                alert("A course with that name already exists, please choose another name");
                window.location = ("addCourse.php");
                </script>';
                die; // Stops other code from executing
            } else {
                // Continue Loop
            }
        }
        
        if ($lecturerID == null) {
            echo '<script type="text/JavaScript">  
            alert("A Lecturer must be selected, please choose one");
            window.location = ("addCourse.php");
            </script>';
        
        } else if ($classID == null) {
            echo '<script type="text/JavaScript">   
            alert("A Class must be selected, please choose one");
            window.location = ("addCourse.php");
            </script>';

        } else if (in_array($imageExt, $allowedExt)) { 
            
            move_uploaded_file($tempImageName, $imageStorage); # Moves image to pictures folder
            move_uploaded_file($tempResourceName, $resourceStorage); # Moves resource to resource folder
           
            $addCourseQuery = "INSERT INTO `course` (`course_name`, `course_resource`, `course_img`, `course_desc`, `class_id`, `user_id`) VALUES 
            ('$courseName', '$resourceName', '$imageName', '$courseDesc', '$classID', '$lecturerID')";
            
            if (mysqli_query($connection, $addCourseQuery)) {
                echo '<script>alert("Course Succcessfully Created!");
                window.location = ("addCourse.php");
                </script>';
            } else {
                echo "Query Failed";
            } 

        } else {
            echo '<script type="text/JavaScript">      <!-- Alerts user when file type is not supported-->
            alert("That file type is not allowed, please upload another file");
            window.location = ("addCourse.php");
            </script>';
        }

    } else {
        // Nothing
    }
        
    mysqli_close($connection);
?>