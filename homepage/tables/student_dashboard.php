<?php
$user_id = $_SESSION["user_id"];
$class_id = $_SESSION["class_id"];
include 'downloadCourse.php';
?>

<head>
    <title>Dashboard</title>
<body>

<!-- [1] view course -->
<div class="dashboard-filter">
    <h1 class="dashboard-header">Dashboard</h1>
    <div class="dashboard-line"></div>

    <div class="dashboard-search-div">
        <form class="dashboard-search-box" action="#" method="get">
            <input type="text" class="dashboard-search-TF" placeholder="Search Course Name" name="txtCourseName" required><br>
            <input type="submit" value="Search" name="btnSubmit" class="dashboard-btn-1">
        </form>
        <a href="../../../Learnifly/homepage/homepage.php"><button class="dashboard-btn-2">Reset</button></a>
    </div>

    <table>
        <tr>
            <th>Course Name</th>
            <th>Course Desc</th>
            <th>Course Resource</th>
            <th>Course Assignments</th>
            <th>Grade</th>
        </tr>
        <?php
            $courseDefaultQuery = "SELECT course.course_name, course.course_desc, course.course_resource, assignment.assignment_file, grade.grade_given FROM ((( course LEFT JOIN assignment ON course.course_id = assignment.course_id) LEFT JOIN submission ON course.course_id = submission.course_id) LEFT JOIN grade ON submission.submission_id = grade.submission_id) WHERE course.class_id = '$class_id'";
            $getCourseData = mysqli_query($connection, $courseDefaultQuery);

            if (isset($_GET['btnSubmit'])) {
                $courseSearch = $_GET['txtCourseName'];
                $courseSearchQuery = "SELECT course.course_name, course.course_desc, course.course_resource, assignment.assignment_file, grade.grade_given FROM ((( course LEFT JOIN assignment ON course.course_id = assignment.course_id) LEFT JOIN submission ON course.course_id = submission.course_id) LEFT JOIN grade ON submission.submission_id = grade.submission_id) WHERE course.class_id = '$class_id' AND course_name = '$courseSearch'";
                $getSearchedCourseData = mysqli_query($connection, $courseSearchQuery);
                while ($row = mysqli_fetch_assoc($getSearchedCourseData)) {
                    echo 
                    "<tr><td class='student-tb-courseName'>" . $row["course_name"] . 
                    "</td><td class='student-tb-courseDesc'>" . $row["course_desc"] .
                    "</td><td class='student-tb-courseResource'>" . $row["course_resource"] .
                    "</td><td class='student-tb-courseAssignment'>" . $row["assignment_file"] .
                    "</td><td class='student-tb-grade'>" . $row["grade_given"] .
                    "</td></td>";
                }
                echo "</table>";

            } else {
                while ($row = $getCourseData -> fetch_assoc()) {
                    echo 
                    "<tr><td class='student-tb-courseName'>" . $row["course_name"] . 
                    "</td><td class='student-tb-courseDesc'>" . $row["course_desc"] .
                    "</td><td class='student-tb-courseResource'><a href='" . downloadCourse($row['course_resource']) . "' download>Download</a>" .
                    "</td><td class='student-tb-courseAssignment'>" . $row["assignment_file"] . 
                    "</td><td class='student-tb-grade'>" . $row["grade_given"] .
                    "</td></td>";
                }
                echo "</table>";
            }
        ?>
    </table>
</div>