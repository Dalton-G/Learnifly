<?php include "../../../Learnifly/navbar/header.php"; ?>
<?php include "../../../Learnifly/dbConnection/dbConnection.php"; ?>
<?php include "../../../Learnifly/homepage/tables/downloadFiles.php"; ?>

<head>
    <title>View Submission</title>
<body>

<!-- [1] view course -->
<div class="dashboard-filter">
    <h1 class="dashboard-header">View Student Submission</h1>
    <?php echo "<h2 class='dashboard-h2'>" . $user_name . "</h2>" ?>
    <div class="dashboard-line"></div>

    <div class="dashboard-search-div">
        <form class="dashboard-search-box" action="#" method="get">
            <input type="text" class="dashboard-search-TF" placeholder="Search Course Name" name="txtCourseName" required><br>
            <input type="submit" value="Search" name="btnSubmit" class="dashboard-btn-1">
        </form>
        <a href="../../../Learnifly/submission/grading/view_submission.php"><button class="dashboard-btn-2">Reset</button></a>
    </div>

    <table>
        <tr>
            <th>Student Name</th>
            <th>Course Name</th>
            <th>Submission Time</th>
            <th>Submission File</th>
            <th>Action</th>
            <th>Grade</th>
        </tr>
        <?php
            $courseDefaultQuery = "SELECT user.user_name, course.course_name, submission.submission_date_time, submission.submission_file, grade.grade_given, submission.submission_id FROM ((( user INNER JOIN submission ON user.user_id = submission.user_id) INNER JOIN course ON submission.course_id = course.course_id) LEFT JOIN grade ON grade.submission_id = submission.submission_id)";
            $getCourseData = mysqli_query($connection, $courseDefaultQuery);

            if (isset($_GET['btnSubmit'])) {
                $courseSearch = $_GET['txtCourseName'];
                $courseSearchQuery = "SELECT user.user_name, course.course_name, submission.submission_date_time, submission.submission_file, grade.grade_given, submission.submission_id FROM ((( user INNER JOIN submission ON user.user_id = submission.user_id) INNER JOIN course ON submission.course_id = course.course_id) LEFT JOIN grade ON grade.submission_id = submission.submission_id) WHERE course_name = '$courseSearch'";
                $getSearchedCourseData = mysqli_query($connection, $courseSearchQuery);
                while ($row = mysqli_fetch_assoc($getSearchedCourseData)) {
                    echo 
                    "<tr><td>" . $row["user_name"] . 
                    "</td><td>" . $row["course_name"] .
                    "</td><td>" . $row["submission_date_time"] .
                    "</td><td>" . downloadSubmission($row["submission_file"]) .
                    "</td><td>" . "<a href='grading.php?id=" . $row['submission_id'] . "' class='download-file-btn'> <i class='fa-solid fa-marker'></i>&nbsp;&nbsp; Grade </a>" .
                    "</td><td>" . checkGrade($row["grade_given"]) .
                    "</td>";
                }
                echo "</table>";

            } else {
                while ($row = $getCourseData -> fetch_assoc()) {
                    echo 
                    "<tr><td>" . $row["user_name"] . 
                    "</td><td>" . $row["course_name"] .
                    "</td><td>" . $row["submission_date_time"] .
                    "</td><td>" . downloadSubmission($row["submission_file"]) .
                    "</td><td>" . dropdownGradeMenu($row["grade_given"]) ."<label class='download-file-btn'><i class='fa-solid fa-marker'></i>&nbsp;&nbsp;&nbsp;Grade<input type='submit' value='". $row['submission_id'] ."' name='submission_id' class='hidden-grade-btn'></label></form>" .
                    "</td><td>" . checkGrade($row["grade_given"]) .
                    "</td>";
                }
                echo "</table>";
            }
        ?>
    </table>
</div>

<?php
if (isset($_GET['submission_id'])) {
    $submissionID = $_GET['submission_id'];
    $grade_given = $_GET['grade_given'];
    echo $grade_given;
    echo $submissionID;

    $insertGradeQuery = "INSERT INTO `grade`(`grade_given`, `submission_id`) VALUES ('$grade_given','$submissionID')";
    $insertGradeResult = mysqli_query($connection, $insertGradeQuery);

    if ($insertGradeResult) {
        echo "<script>setTimeout(function() { window.location.href = 'view_submission.php'; });</script>";
    } else {
        echo "Failed: " . mysqli_error($connection);
    }
}
?>

<?php mysqli_close($connection); ?>
<?php include "../../../Learnifly/navbar/footer.php"; ?>