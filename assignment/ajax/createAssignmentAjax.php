<?php
require_once("../../login/includes/config.php");

$courseId = $_POST["courseId"]; // Course Id
$assignmentName = $_POST["assignmentName"]; // Assignment Name
$assignmentDescription = $_POST["assignmentDescription"]; // Assignment Description
$startDate = $_POST["startDate"];
$startTime = $_POST["startTime"];
$endDate = $_POST["endDate"];
$endTime = $_POST["endTime"];
$assignmentFileArray = $_FILES["assignmentFile"];
$assignmentFileName = $assignmentFileArray["name"]; // File Name

// echo "Course Id: " . $courseId . "<br>";
// echo "Assignment Name: " . $assignmentName . "<br>";
// echo "Assignment Description: " . $assignmentDescription . "<br>";
// echo "Start Date: " . $startDate . "<br>";
// echo "Start Time: " . $startTime . "<br>";
// echo "End Date: " . $endDate . "<br>";
// echo "End Time: " . $endTime . "<br>";
// var_dump($assignmentFileName);


// If any of the variables are empty or null, exit
if (!($courseId && $assignmentName && $assignmentDescription && $startDate && $startTime && $endDate && $endTime && $assignmentFileName)) {
    exit("<p> Please fill in all inputs! </p>");
}

$startDateTime = date_create_from_format('Y-m-d H:i', "$startDate $startTime");
$startDateTimeString = $startDateTime->format('Y-m-d H:i:s'); // Assignment Start Time

$endDateTime = date_create_from_format('Y-m-d H:i', "$endDate $endTime");
$endDateTimeString = $startDateTime->format('Y-m-d H:i:s'); // Assignment End Time

$query = $con->prepare("INSERT INTO assignment (assignment_name, assignment_desc, assignment_start_date_time, assignment_end_date_time, assignment_file, course_id)
                        VALUES (:assignmentName, :assignmentDescription, :startDateTimeString, :endDateTimeString, :assignmentFileName, :courseId)");

$query->bindValue(':assignmentName', $assignmentName);
$query->bindValue(':assignmentDescription', $assignmentDescription);
$query->bindValue(':startDateTimeString', $startDateTimeString);
$query->bindValue(':endDateTimeString', $endDateTimeString);
$query->bindValue(':assignmentFileName', $assignmentFileName);
$query->bindValue(':courseId', $courseId);
$query->execute();

if ($query) {
    // Success message
    echo ("<p>Assignment Uploaded Successfully! <i class='fa-solid fa-square-check'></i></p>");
} else {
    echo "An error occured";
}

$targetDirectory = "../../resources/courseAssignment/"; // specify the directory where the file should be stored
$targetFile = $targetDirectory . basename($_FILES["assignmentFile"]["name"]); // get the name of the file and concatenate with the target directory
move_uploaded_file($_FILES["assignmentFile"]["tmp_name"], $targetFile);