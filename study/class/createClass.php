<?php
    include ("../../../Learnifly/dbConnection/dbConnection.php");
    include ("../../../Learnifly/navbar/header.php");
?>

<?php
    if (isset($_POST['btnCreate'])) {
    $class = $_POST['txtClass']; 
    $intake = $_POST['txtIntake']; 
    if (ctype_alpha($class)){ //validation only letters
        if(filter_var($intake, FILTER_VALIDATE_INT)!== false){ //validation only integers
            if (strlen($class)==4 && strlen($intake)==4){//validation 4 letters and integers
                $classname = $class.$intake;
                $query = "SELECT * FROM class WHERE class_name='$classname'";
                $results = mysqli_query($connection,$query);
                $row = mysqli_fetch_assoc($results);
                $count = mysqli_num_rows($results);
                if ($count == 1) {
                        echo 'Class already exists.';
                }else {
                    $sqlQuery = "INSERT INTO `class`(`class_id`, `class_name`) VALUES ('','$classname')";
                    
                    if (mysqli_query($connection,$sqlQuery)) {
                        echo 'Class successfully created.';
                    } else {
                        echo 'Failed to create class, please try again.';
                    }
                }
            }else{
                echo 'Input length must be 4.'; 
            }
        }else {
            echo 'Please insert valid intake code. Tips: Integer data type';
        }
    }else{
        echo 'Please insert valid class. Tips: Only letters';
    }
    mysqli_close($connection);
    }
?>

<div class="whole">
    <div class="wrapper">
        <div class="title">Create Class</div>
            <form action="#" method="POST" class="contact-form">
            <div class="field">
                    <input type="text" name="txtClass" required/>
                    <label>Class</label>
                    <i class="fa-solid fa-landmark"></i>
                </div>
                <div class="field">
                    <input type="integer" name="txtIntake" required/>
                    <label>Intake</label>
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
                <div class="field">
                    <input type="submit" id="sign-up-btn" name="btnCreate"></type>
                </div>
            </form>  
        </div>
    </div>
</div>



<div class="foot">
<?php
    include ("../../../Learnifly/navbar/footer.php");
?>
</div>