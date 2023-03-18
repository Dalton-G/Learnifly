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

        echo $courseID . "<br>"; 
        echo $courseName . "<br>";
        echo $courseResource . "<br>";
        echo $courseImage . "<br>";
        echo $courseDescription . "<br>";
        echo $lecturerName . "<br>";

    }

    mysqli_close($connection);
?>