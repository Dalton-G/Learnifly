<?php
    include ("../../../Learnifly/dbConnection/dbConnection.php");

    if (isset($_POST['updateCourse'])) {
        
        $courseID = $_POST['courseID'];
        $courseName = $_POST['courseName'];
        $courseResource = $_FILES['courseResource'];
        $courseImage = $_FILES['courseImage'];
        $courseDescription = $_POST['courseDescription'];
        $classID = $_POST['classID'];
        $lecturerName = $_POST['lecturerName'];

        $imageName = $courseImage["name"];
        $tempImageName = $courseImage["tmp_name"];
        $imageStorage = "../../images/courseImages/" . $imageName;

        $resourceName = $courseResource["name"];
        $tempResourceName = $courseResource["tmp_name"];
        $resourceStorage = "../../resources/courseResource/" . $resourceName;

        $getLecturerID = "SELECT * FROM `user` WHERE user_name = '$lecturerName'";
        $lecturerIDQuery = mysqli_query($connection, $getLecturerID);
        $getLecturerArray = mysqli_fetch_assoc($lecturerIDQuery);
        $lecturerID = $getLecturerArray['user_id'];

        $currentCourse = "SELECT * FROM `course` WHERE `course_id` = '$courseID'";
        $updateCourseQuery = "UPDATE course SET `course_desc` = '$courseDescription', `user_id` = '$lecturerID' WHERE `course_id` = '$courseID'";        

        $queryUpdateCourse = mysqli_query($connection, $currentCourse);
        $updateImageQuery = "UPDATE course SET `course_img` = '$imageName' WHERE `course_id` = '$courseID'";
        $updateResourceQuery = "UPDATE course SET `course_resource` = '$resourceName' WHERE `course_id` = '$courseID'";

        $currentCourseImage = mysqli_fetch_assoc($queryUpdateCourse);
        $currentImage = $currentCourseImage['course_img'];
        $currentResource = $currentCourseImage['course_resource'];

        $deleteImagePath = "../../images/courseImages/" . $currentImage;
        $deleteResourcePath = "../../resources/courseResource/" . $currentResource;

        if ($courseImage['name'] == '' && $courseResource['name'] == '') { // IMAGE AND RESOURCE EMPTY
            if (mysqli_query($connection, $updateCourseQuery)) {
                echo '<script>alert("Course Details have been Updated!");
                        window.location = ("course.php");
                        </script>';
            } else {
                // Nothing
            }
        } else if ($courseImage['name'] != "" && $courseResource['name'] == '') { // RESOURCE EMPTY
            if (mysqli_query($connection, $updateCourseQuery)) {
                if (mysqli_query($connection, $updateImageQuery)) {
                    unlink($deleteImagePath);
                    move_uploaded_file($tempImageName, $imageStorage);
                    echo '<script>alert("Course Details and Image have been Updated!");
                                window.location = ("course.php");
                                </script>';
                } else {
                    // Nothing
                }
            } else {
                // Nothing
            }
        } else if ($courseImage['name'] != "" && $courseResource['name'] != '') { // NONE EMPTY
            if (mysqli_query($connection, $updateCourseQuery)) {
                if (mysqli_query($connection, $updateImageQuery)) {
                    if (mysqli_query($connection, $updateResourceQuery)) {
                        unlink($deleteImagePath);
                        move_uploaded_file($tempImageName, $imageStorage);
                        unlink($deleteResourcePath);
                        move_uploaded_file($tempResourceName, $resourceStorage);

                        echo '<script>alert("Course Details, Image and Resource have been Updated!");
                                window.location = ("course.php");
                                </script>';

                    } else {
                        // Nothing
                    }
                } else {
                    // Nothing
                }
            } else {
                // Nothing
            }
        } else if (($courseImage['name'] == "" && $courseResource['name'] != '')) { // IMAGE EMPTY
            if (mysqli_query($connection, $updateCourseQuery)) {
                if (mysqli_query($connection, $updateResourceQuery)) {
                    unlink($deleteResourcePath);
                    move_uploaded_file($tempResourceName, $resourceStorage);

                    echo '<script>alert("Course Details and Resource have been Updated!");
                                window.location = ("course.php");
                                </script>';
                } else {
                    // Nothing
                }
            } else {
                // Nothing
            }
        } else {
            echo '<script>alert("An error occured whilst trying to update, please try again");
                window.location = ("course.php");
                </script>';
        }
    }
    
    mysqli_close($connection);
?>