<?php

    include '../../dbConnection/dbConnection.php';

    $classID = '1'; // IMPORTANT!!! REPLACE THESE WITH SESSION VARIABLES!!!!!
    $userID = '1'; // IMPORTANT!!! QUERY USER DATABASE FOR LECTURERS!!! (addCourse.php not here)

    if (isset($_POST['submit'])) {
        
        $courseName = $_POST['courseName'];
        $courseDesc = $_POST['courseDesc'];
        $courseImage = $_FILES['courseImage'];
        $courseResource = $_FILES['courseResource'];

        $imageName = $courseImage["name"];
        $tempImageName = $courseImage["tmp_name"];
        $imageStorage = "../../images/courseImages/" . $imageName;

        $resourceName = $courseResource["name"];
        $tempResourceName = $courseResource["tmp_name"];
        $resourceStorage = "../../resources/courseResource/" . $resourceName;

        // $getExistingCourses = "SELECT * FROM `course`";
        // $courseArray = array();
        // $queryCourses = mysqli_query($connection, $getExistingCourses);

        // Constraints on Filetypes for Image
        // $imageArray = explode('.', $imageName);
        // $imageExt = strtolower(end($imageArray));
        // $allowedExt = array('jpg', 'jpeg', 'png', 'jfif', 'pdf', 'gif');
        $imageSize = $courseImage['size'];

        if ($imageSize < 5000000){  # 5 MB Size Limit
            move_uploaded_file($tempImageName, $imageStorage); # Moves image to pictures folder
            move_uploaded_file($tempResourceName, $resourceStorage); # Moves resource to resource folder

            $addCourseQuery = "INSERT INTO `course` (`course_name`, `course_resource`, `course_img`, `course_desc`, `class_id`, `user_id`) VALUES 
            ('$courseName', '$resourceName', '$imageName', '$courseDesc', '$classID', '$userID')";
            
            if (mysqli_query($connection, $addCourseQuery)) {
                echo '<script>alert("Course Succcessfully Created!");
                window.location = ("addCourse.php");
                </script>';
            } else {
                echo "Query Failed";
            } 

        } else { 
            echo '<script type="text/JavaScript">   <!-- Alerts user when file exceeds 5MB-->
            alert("That file uploaded exceeds 5MB, please upload another file");
            window.location = ("addCourse.php");
            </script>';
        }

    } else {
        echo '<script type="text/JavaScript">      <!-- Alerts user when file type is not supported-->
        alert("That file type is not allowed, please upload another file");
        window.location = ("addCourse.php");
        </script>';
    }
        

    mysqli_close($connection);
?>