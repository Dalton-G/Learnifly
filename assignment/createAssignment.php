<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    
    $studentId = $_SESSION["user_id"];
    $user_role = $_SESSION["user_role"];

    include ("../../Learnifly/dbConnection/dbConnection.php");
    include ("../../Learnifly/navbar/header.php");
?>
<script src="calendar.js"></script>
<?php
    $getCourse = "SELECT * FROM course WHERE user_id='$studentId'";
    $resultCourse = mysqli_query($connection,$getCourse);

    $getStudent = "SELECT * FROM user WHERE user_id='$studentId'";
    $resultStudent = mysqli_query($connection,$getStudent);
    
    $rowCourse = mysqli_fetch_assoc($resultCourse);
    $countCourse = mysqli_num_rows($resultCourse);
    if ($countCourse == 1) {
        $row['course_name'] = $course;
    }else { 
        echo'Course not registered';
    }

    $rowStudent = mysqli_fetch_assoc($resultStudent);
    $countStudent = mysqli_num_rows($resultStudent);
    if ($countStudent == 1) {
        $row['user_name'] = $student;
    }else { 
        echo'Error';
    }

    if (isset($_POST['btnSubmit'])) {
        $class = $_POST['txtStudent']; 
        $intake = $_POST['txtCourse']; 
        $date = $_POST['txtDate'];
        //$file = ;
        
    mysqli_close($connection);
    }
?>

<section class="contact">
    <div class="container">
        <div class="left">
            <div class="form-wrapper w-100">
                <div class="contact-headling">  
                    <h1>Submit Assignment</h1>
                </div>
                <form action="uploadCourse.php" method="POST" nctype = "multipart/form-data" class="contact-form">
                    <div class="input-wrap w-100">
                        <input class="contact-input" type="text" name="txtAsgName" required/>
                        <label>Assignment Name</label>
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="input-wrap w-100">
                        <input class="contact-input" type="text" name="txtAsgDes" required/>
                        <label>Assignment Description</label>
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="input-wrap w-100">
                        <input class="contact-input" type="text" name="txtStart" required/>
                        <label>Start Date</label>
                        <i class="fa-solid fa-book"></i>
                        <?php include ("../../Learnifly/assignment/calendar.php"); ?>
                    </div>
                    <div class="input-wrap w-100">
                        <input class="contact-input" type="text" name="txtEnd" required/>
                        <label>End Date</label>
                        <i class="fa-solid fa-book"></i>
                    </div>
                    <div class="input-wrap w-100">
                        <!-- get course from previous page -->
                        <input class="contact-input" type="text" name="txtCourse" value="<?php echo $_GET["course_name"]?>"/> 
                        <label>Course</label> 
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                    <div class="input-wrap w-100">
                        <input class="contact-input" type="file" name="txtFile" required/>
                    </div>

                    <button class="btn" id="sign-up-btn" name="btnUpload">Submit</button>
                    
                </form>
            </div>
        </div>
        <div class="right"></div>
    </div>
</section>


<?php
    include ("../../Learnifly/navbar/footer.php");
?>