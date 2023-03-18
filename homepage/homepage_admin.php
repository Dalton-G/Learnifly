<?php include "../../Learnifly/navbar/header.php"; ?>
<?php include "../../Learnifly/dbConnection/dbConnection.php"; ?>

<head>
    <title>Dashboard</title>
<body>

<div class="course-table-filter">
    <h1 class="">View Courses</h1>

    <!-- Course Table -->
    <div class="">
        <form class="" action="#" method="get">
            <input type="text" class="" placeholder="Search Course Name" name="txtCourseName" required>
            <input type="submit" value="Search" name="btnSubmit" class="">
        </form>
        <a href="../../../Learnifly/homepage/homepage_admin.php"><button class="">Reset</button></a>
    </div>

    <!-- result table -->
    <table>
        <tr>
            <th>Course ID</th>
            <th>Course Name</th>
            <th>Course Description</th>
            <th>Class</th>
            <th>Lecturer</th>
        </tr>
        <?php
            $courseDefaultQuery = "SELECT 
            course.course_id, 
            course.course_name, 
            course.course_desc, 
            class.class_name, 
            user.user_name 
        FROM 
            ((course 
            INNER JOIN class ON course.class_id = class.class_id) 
            INNER JOIN user ON course.user_id = user.user_id);";
            $getCourseData = mysqli_query($connection, $courseDefaultQuery);

            if (isset($_GET['btnSubmit'])) {
                $courseSearch = $_GET['txtCourseName'];
                $courseSearchQuery = "SELECT course.course_id, course.course_name, course.course_desc, class.class_name, user.user_name FROM ((course INNER JOIN class ON course.course_id = class.class_id) INNER JOIN user ON course.user_id = user.user_id) WHERE course_name = '$courseSearch'";
                $getSearchedData = mysqli_query($connection, $courseSearchQuery);
                while ($row = mysqli_fetch_assoc($getSearchedData)) {
                    echo 
                    "<tr><td class=''>" . $row["course_id"] . 
                    "</td><td class=''>" . $row["course_name"] .
                    "</td><td class=''>" . $row["course_desc"] .
                    "</td><td class=''>" . $row["class_name"] .
                    "</td><td class=''>" . $row["user_name"] .
                    "</td></td>";
                }
                echo "</table>";

            } else {
                while ($row = $getCourseData -> fetch_assoc()) {
                    echo 
                    "<tr><td class=''>" . $row["course_id"] . 
                    "</td><td class=''>" . $row["course_name"] .
                    "</td><td class=''>" . $row["course_desc"] .
                    "</td><td class=''>" . $row["class_name"] .
                    "</td><td class='class=''>" . $row["user_name"] .
                    "</td></td>";
                }
                echo "</table>";
            }

            mysqli_close($connection);
        ?>
    </table>
</div>

</body>
</html>

<?php include "../../Learnifly/navbar/footer.php"; ?>