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
$query = $con->query("SELECT * FROM class");

?>

<head>
    <script src="js/registration.js" defer></script>
    <title>Create Assignment</title>
</head>
<div class="registration-page">
    <section class="registration-section">
        <h2 class="title">📝 Register a user</h2>
        <div class="error-msg">
            <!-- Generated message -->
        </div>
        <form action="" class="form">

            <div class="credential">
                <label for="role">User Role</label>
                <select name="role" id="role">
                    <option value="student">Student</option>
                    <option value="lecturer">Lecturer</option>
                </select>
            </div>
            <div class="credential">
                <label for="fName">First Name</label>
                <input id="fName" name="fName" type="text" />
            </div>
            <div class="credential">
                <label for="lName">Last Name</label>
                <input id="lName" name="lName" type="text" />
            </div>
            <div class="credential">
                <label for="email">Email</label>
                <input id="email" name="email" type="text" />
            </div>
            <div class="credential">
                <label for="password">Password</label>
                <input id="password" name="password" type="text" />
                <i class="fa-solid fa-arrows-rotate pass-generate-icon" title="Generate a random password"></i>
            </div>
            <div class="credential">
                <label for="className">Class Name</label>
                <select name="classId" id="className" onmousedown="if(this.options.length>4){this.size=4;}"  onchange='this.size=0;' onblur="this.size=0;">
                    <option value="">-- Select a class --</option>
                    <?php
                    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value=' {$row['class_id']} '>{$row['class_name']}</option>";
                    }
                    ?>
                </select>
            </div>
            <button class="create-btn">Create Account</button>
        </form>
    </section>
</div>


<?php
require_once("../../Learnifly/navbar/footer.php");
?>