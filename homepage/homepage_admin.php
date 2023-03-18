<?php include "../../Learnifly/navbar/header.php"; ?>

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
            <th>Email</th>
            <th>Subject</th>
            <th>Message</th>
        </tr>
        <?php 
            $conn = mysqli_connect("localhost", "root", "", "freshhub");
            if ($conn-> connect_error) {
                die("Connection failed:". $conn-> connect_error);
            }

            $sql = "SELECT * FROM inquiries ORDER BY inquiry_id DESC";
            $result = $conn-> query($sql);

            if (isset($_GET['btnSubmit'])) {
                $inquiry_id = $_GET['txtInquiryID'];
                $sqlQuery = "SELECT * FROM inquiries WHERE inquiry_id = '$inquiry_id'";
                $result = mysqli_query($conn, $sqlQuery);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo 
                    "<tr><td class='inquiry-id'>" . $row["inquiry_id"] . 
                    "</td><td class='inquiry-name'>" . $row["name"] .
                    "</td><td class='inquiry-email'>" . $row["email"] .
                    "</td><td class='inquiry-subject'>" . $row["subject"] .
                    "</td><td class='class='inquiry-textarea'>" . $row["message"] .
                    "</td></td>";
                }
                echo "</table>";

            } else if (isset($_GET['btnDelete'])) {
                $inquiry_id = $_GET['txtInquiryID'];
                $sqlQuery = "DELETE FROM `inquiries` WHERE inquiry_id= '$inquiry_id'";
                $result = mysqli_query($conn, $sqlQuery);?>
                <script type="text/JavaScript">
                    setTimeout("location.href = '../contactUs/viewInquiries.php';",0);
                </script>
            <?php }
            else {
                $sql = "SELECT inquiry_id, name, email, subject, message FROM inquiries";
                $result = $conn-> query($sql);
                while ($row = $result -> fetch_assoc()) {
                    echo 
                    "<tr><td class='inquiry-id'>" . $row["inquiry_id"] . 
                    "</td><td class='inquiry-name'>" . $row["name"] .
                    "</td><td class='inquiry-email'>" . $row["email"] .
                    "</td><td class='inquiry-subject'>" . $row["subject"] .
                    "</td><td class='class='inquiry-textarea'>" . $row["message"] .
                    "</td></td>";
                }
                echo "</table>";
            }

            $conn-> close();
        ?>
    </table>
</div>

</body>
</html>

<?php include "../../Learnifly/navbar/footer.php"; ?>