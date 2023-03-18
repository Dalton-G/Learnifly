<?php
    include ("../../../Learnifly/dbConnection/dbConnection.php");
    include ("../../../Learnifly/navbar/header.php");
    $studentId = $_SESSION["user_id"];
    $studentName = $_SESSION["user_name"];
?>

<?php
    $getCourse = "SELECT * FROM course";
    $resultCourse = mysqli_query($connection,$getCourse);
    $rowCourse = mysqli_fetch_assoc($resultCourse);


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
                        <input class="contact-input" type="text" name="txtStudent" value="<?php echo $studentName?>"/>
                        <label>Student Name</label>
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <div class="input-wrap w-100">
                    <label for="className">Class Name</label>
                        <select class="contact-input" name="classId" id="className">

                            <option value="<?php echo $category["course_name"]?>"></option>

                        </select>
                        <i class="fa-solid fa-book"></i>
                    </div>
                    <div class="input-wrap w-100">
                        <input class="contact-input" type="integer" name="txtDate" value="<?php date_default_timezone_set("Asia/Kuala_Lumpur"); echo date("Y/m/d h:i:sa")?>"/>
                        <label>Submission Date</label>
                        <i class="fa-solid fa-calendar-days"></i>
                    </div>
                    <div class="input-wrap w-100">
                        <input class="contact-input" type="file" name="txtFile" required/>
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