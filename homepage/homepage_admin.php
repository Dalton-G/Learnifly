<?php include "../../Learnifly/navbar/header.php"; ?>
<?php include "../../Learnifly/dbConnection/dbConnection.php"; ?>

<head>
    <title>Dashboard</title>
<body>

<div class="">
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
            <th>ID</th>
            <th>Name</th>
            <th>Desc</th>
            <th>Class</th>
            <th>Lecturer</th>
        </tr>
        <?php
            $courseDefaultQuery = "SELECT course_id, course_name, course_desc, class_id, user_id FROM course ORDER BY course_id ASC";
            $getCourseData = mysqli_query($connection, $courseDefaultQuery);

            if (isset($_GET['btnSubmit'])) {
                $courseSearch = $_GET['txtCourseName'];
                $courseSearchQuery = "SELECT course_id, course_name, course_desc, class_id, user_id FROM course WHERE course_name = '$course_search'";
                $getSearchedData = mysqli_query($connection, $courseSearchQuery);
                while ($row = mysqli_fetch_assoc($getSearchData)) {
                    echo 
                    "<tr><td class=''>" . $row["course_id"] . 
                    "</td><td class=''>" . $row["course_name"] .
                    "</td><td class=''>" . $row["course_desc"] .
                    "</td><td class=''>" . $row["class_id"] .
                    "</td><td class=''>" . $row["user_id"] .
                    "</td></td>";
                }
                echo "</table>";

            } else {
                $courseDefaultDataQuery = "SELECT course_id, course_name, course_desc, class_id, user_id FROM inquiries";
                $getCourseRowData = mysqli_query($connection, $courseDefaultQuery);
                while ($row = $getCourseRowData -> fetch_assoc()) {
                    echo 
                    "<tr><td class=''>" . $row["course_id"] . 
                    "</td><td class=''>" . $row["course_name"] .
                    "</td><td class=''>" . $row["course_desc"] .
                    "</td><td class=''>" . $row["class_id"] .
                    "</td><td class='class=''>" . $row["user_id"] .
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