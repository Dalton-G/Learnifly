<?php include "../../../Learnifly/navbar/header.php"; ?>
<?php include "../../../Learnifly/dbConnection/dbConnection.php"; ?>

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
        <a href="../../../Learnifly/homepage/homepage_admin.php"><button class="dashboard-btn-2">Reset</button></a>
    </div>

    <table>
        <tr>
            <th>Student Name</th>
            <th>Course Name</th>
            <th>Submission Time</th>
            <th>Submission File</th>
            <th>Grade</th>
            <th>Action</th>
            <th>
        </tr>
        <?php
            $courseDefaultQuery = "SELECT course.course_id, course.course_name, course.course_desc, class.class_name, user.user_name FROM ((course INNER JOIN class ON course.class_id = class.class_id) INNER JOIN user ON course.user_id = user.user_id)";
            $getCourseData = mysqli_query($connection, $courseDefaultQuery);

            if (isset($_GET['btnSubmit'])) {
                $courseSearch = $_GET['txtCourseName'];
                $courseSearchQuery = "SELECT course.course_id, course.course_name, course.course_desc, class.class_name, user.user_name FROM ((course INNER JOIN class ON course.course_id = class.class_id) INNER JOIN user ON course.user_id = user.user_id) WHERE course_name = '$courseSearch'";
                $getSearchedCourseData = mysqli_query($connection, $courseSearchQuery);
                while ($row = mysqli_fetch_assoc($getSearchedCourseData)) {
                    echo 
                    "<tr><td>" . $row["course_id"] . 
                    "</td><td>" . $row["course_name"] .
                    "</td><td>" . $row["course_desc"] .
                    "</td><td>" . $row["class_name"] .
                    "</td><td>" . $row["user_name"] .
                    "</td><td>" . "Grade" .
                    "</td><td>" . "Button" .
                    "</td>";
                }
                echo "</table>";

            } else {
                while ($row = $getCourseData -> fetch_assoc()) {
                    echo 
                    "<tr><td>" . $row["course_id"] . 
                    "</td><td>" . $row["course_name"] .
                    "</td><td>" . $row["course_desc"] .
                    "</td><td>" . $row["class_name"] .
                    "</td><td>" . $row["user_name"] .
                    "</td><td>" . "Grade" .
                    "</td><td>" . "Button" .
                    "</td>";
                }
                echo "</table>";
            }
        ?>
    </table>
</div>


<?php mysqli_close($connection); ?>
<?php include "../../../Learnifly/navbar/footer.php"; ?>