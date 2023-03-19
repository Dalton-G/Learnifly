<?php
    include ("../../../Learnifly/dbConnection/dbConnection.php");
    include ("../../../Learnifly/navbar/header.php");
    $studentId = $_SESSION["user_id"];
    $studentName = $_SESSION["user_name"];
?>


<div class="whole-sub">
    <div class="wrapper">
        <div class="title">Submit Assignment</div>
            <form action="uploadSubmission.php" method="POST" enctype = "multipart/form-data">
                <div class="field r">
                    <input  type="text" name="txtStudent" value="<?php echo $studentName?>" readonly/>
                    <label>Student Name</label>
                    <i class="icon fa-solid fa-user"></i>
                </div>
                <div class="field r">
                    <select class="contact-input" name="txtCourse" id="className">
                    <?php
                        $getClass = mysqli_query($connection, "SELECT * FROM user WHERE user_id = '$studentId'");
                        while ($row = mysqli_fetch_assoc($getClass)) {
                            $class = $row["class_id"];
                        
                            $getCourse = mysqli_query($connection, "SELECT * FROM course WHERE class_id = '$class'");
                            while ($row = mysqli_fetch_assoc($getCourse)) {
                                echo "<option value='{$row['course_id']}'>{$row['course_name']}</option>";
                        }}
                    ?>  
                    </select>
                    <label>Course Name</label>
                    <i class="icon fa-solid fa-book"></i>
                </div>
                <div class="field r">
                    <input  type="integer" name="txtDate" value="<?php date_default_timezone_set("Asia/Kuala_Lumpur"); echo date("Y/m/d h:i:sa")?>" readonly/>
                    <label>Submission Date</label>
                    <i class="icon fa-solid fa-calendar-days"></i>
                </div>
                <div class="s">
                    <input type="file" name="txtFile" required/>
                </div>
                <div class="field">
                    <input type="submit" id="sign-up-btn" name="btnSubmit"></input>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
    include ("../../../Learnifly/navbar/footer.php");
?>