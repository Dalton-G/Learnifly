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
            $courseDefaultQuery = "SELECT course.course_id, course.course_name, course.course_desc, class.class_name, user.user_name FROM ((course INNER JOIN class ON course.class_id = class.class_id) INNER JOIN user ON course.user_id = user.user_id)";
            $getCourseData = mysqli_query($connection, $courseDefaultQuery);

            if (isset($_GET['btnSubmit'])) {
                $courseSearch = $_GET['txtCourseName'];
                $courseSearchQuery = "SELECT course.course_id, course.course_name, course.course_desc, class.class_name, user.user_name FROM ((course INNER JOIN class ON course.course_id = class.class_id) INNER JOIN user ON course.user_id = user.user_id) WHERE course_name = '$courseSearch'";
                $getSearchedCourseData = mysqli_query($connection, $courseSearchQuery);
                while ($row = mysqli_fetch_assoc($getSearchedCourseData)) {
                    echo 
                    "<tr><td class='course-tb-id'>" . $row["course_id"] . 
                    "</td><td class='course-tb-name'>" . $row["course_name"] .
                    "</td><td class='course-tb-description'>" . $row["course_desc"] .
                    "</td><td class='course-tb-class'>" . $row["class_name"] .
                    "</td><td class='course-tb-lecturer'>" . $row["user_name"] .
                    "</td></td>";
                }
                echo "</table>";

            } else {
                while ($row = $getCourseData -> fetch_assoc()) {
                    echo 
                    "<tr><td class='course-tb-id'>" . $row["course_id"] . 
                    "</td><td class='course-tb-name'>" . $row["course_name"] .
                    "</td><td class='course-tb-description'>" . $row["course_desc"] .
                    "</td><td class='course-tb-class'>" . $row["class_name"] .
                    "</td><td class='course-tb-lecturer'>" . $row["user_name"] .
                    "</td></td>";
                }
                echo "</table>";
            }
        ?>
    </table>
</div>