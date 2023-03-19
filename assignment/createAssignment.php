<?php
require_once("../../Learnifly/navbar/header.php");
require_once("../login/includes/config.php");
// Start session if havent
if (!isset($_SESSION)) {
    session_start();
}

// Redirect user to login page if not logged in
if (!(isset($_SESSION["user_id"]) && isset($_SESSION["user_role"]))) {
    header("Location:../login/login.php");
}
?>

<?php
$query = $con->query("SELECT * FROM course");

?>

<head>
    <script src="js/createAssignment.js" defer></script>
    <title>Create assignment</title>
</head>
<div class="create-assignment-page">
    <section class="assignment-section">
        <h2 class="title">📜 Create assignment</h2>
        <div class="error-msg">
            <!-- Generated message -->
        </div>
        <form action="" class="form" enctype="multipart/form-data">
            <div class="non-date-input">
                <label for="courseName">Course</label>
                <select name="courseId" id="courseName" onmousedown="if(this.options.length>4){this.size=4;}" onchange='this.size=0;' onblur="this.size=0;">
                    <option value="">-- Select a course --</option>
                    <?php
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value=' {$row['course_id']} '>{$row['course_name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="non-date-input">
                <label for="assignment-name">Assignment Name</label>
                <input id="assignment-name" name="assignmentName" type="text" />
            </div>
            <div class="non-date-input">
                <label for="description">Description</label>
                <input id="description" name="assignmentDescription" type="text" />
            </div>
            <div class="date-input">
                <label for="start-date">Start Date</label>
                <input id="start-date" name="startDate" type="date" />
                <input name="startTime" type="time">
            </div>
            <div class="date-input">
                <label for="end-date">End Date</label>
                <input id="end-date" name="endDate" type="date" />
                <input name="endTime" type="time">
            </div>
            <div class="non-date-input">
                <label for="assignment">Assignment Question</label>
                <input id="assignment" name="assignmentFile" type="file" />
            </div>

            <button class="create-btn">Create Assignment</button>
        </form>
    </section>
</div>

<?php
require_once("../../Learnifly/navbar/footer.php");
?>