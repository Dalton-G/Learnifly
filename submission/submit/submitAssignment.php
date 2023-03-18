<?php
    include ("../../../Learnifly/dbConnection/dbConnection.php");
    include ("../../../Learnifly/navbar/header.php");
    $studentId = $_SESSION["user_id"];
    $studentName = $_SESSION["user_name"];
?>

<?php  
    if (isset($_POST['btnSubmit'])) { 
        $course = $_POST['txtCourse']; 
        $date = $_POST['txtDate'];
        $file = $_FILES['txtFile'];
        $query = "SELECT * FROM course WHERE course_name = '$course'";
        $results = mysqli_query($connection,$query);
        if($row = mysqli_fetch_assoc($results)){
            $courseId = $row['course_id'];
        
            $query = "SELECT * FROM submission WHERE user_id='$studentId' AND course_Id='$courseId'";
            $results = mysqli_query($connection,$query);
            $row = mysqli_fetch_assoc($results);
            $count = mysqli_num_rows($results);
            if ($count == 1) {
                echo 'You have submitted the assignment. Available submission attempt is 0.';
            }else{
                $sqlQuery = "INSERT INTO `submission`(`submission_date_time`, `submission_file`, `user_id`, `course_id`) 
                VALUES ('$date','$file','$studentId','$courseId')";
                if (mysqli_query($connection, $sqlQuery)){
                    echo 'Assignment successfuly submitted';
                }else{
                    echo 'Fail to submit assignment, please try again.';
                }
            }
        }
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
                <form action="uploadSubmission.php" method="POST" nctype = "multipart/form-data" class="contact-form">
                    <div class="input-wrap w-100">
                        <input class="contact-input" type="text" name="txtStudent" value="<?php echo $studentName?>"/>
                        <label>Student Name</label>
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="input-wrap w-100">
                    <label for="className">Course Name</label>
                        <select class="contact-input" name="txtCourse" id="className">
                        <?php
                            $getCourse = mysqli_query($connection, "SELECT * FROM course WHERE user_id = '$studentId'");
                            while ($row = mysqli_fetch_assoc($getCourse)) {
                                echo "<option value='{$row['course_id']}'>{$row['course_name']}</option>";
                            }
                        ?>  
                        </select>
                        <i class="fa-solid fa-book"></i>
                    </div>
                    <div class="input-wrap w-100">
                        <input class="contact-input" type="integer" name="txtDate" value="<?php date_default_timezone_set("Asia/Kuala_Lumpur"); echo date("Y/m/d h:i:sa")?>"/>
                        <label>Submission Date</label>
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                    <div class="input-wrap w-100">
                        <input type="file" name="txtFile" required/>
                    </div>

                    <button class="btn" id="sign-up-btn" name="btnSubmit">Submit</button>
                    
                </form>
            </div>
        </div>
        <div class="right"></div>
    </div>
</section>


<?php
    include ("../../../Learnifly/navbar/footer.php");
?>