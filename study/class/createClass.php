<?php
    include ("../../../Learnifly/dbConnection/dbConnection.php");
    include ("../../../Learnifly/navbar/header.php");
?>

<ink rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>

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
                if ($count == 1) {?>
                    <input id="fail" value="yes" hide>;
                    <?php echo '<script>alert("Class Already Exists!");
                        window.location = ("createClass.php");
                        </script>';
                    }else {
                    $sqlQuery = "INSERT INTO `class`(`class_id`, `class_name`) VALUES ('','$classname')";
                    
                    if (mysqli_query($connection,$sqlQuery)) {
                        echo '<script>alert("Class Succcessfully Created!");
                        window.location = ("createClass.php");
                        </script>';
                    } else {
                        echo '<script>alert("Failed to create class, please try again.");
                        window.location = ("createClass.php");
                        </script>';
                    }
                }
            }else{
                echo '<script>alert("Length of Class and Intake must each be 4.");
                window.location = ("createClass.php");
                </script>'; 
            }
        }else {
            echo '<script>alert("Please insert valid intake code. Tips: Integer data type.");
            window.location = ("createClass.php");
            </script>';
        }
    }else{
        echo '<script>alert("Please insert valid class. Tips: Letters only.");
        window.location = ("createClass.php");
        </script>';
    }
    mysqli_close($connection);
    }
?>

<div class="whole">
    <div class="wrapper">
        <div class="title">Create Class</div>
            <form action="#" method="POST" class="contact-form">
            <div class="field">
                    <input type="text" name="txtClass" id="class" required/>
                    <label>Class</label>
                    <i class="icon fa-solid fa-landmark"></i>
                </div>
                <div class="field">
                    <input type="integer" name="txtIntake" id="intake" required/>
                    <label>Intake</label>
                    <i class="icon fa-solid fa-calendar-days"></i>
                </div>
                <div class="field">
                    <input type="submit" id="sign-up-btn" name="btnCreate" onclick="message()"></type>
                </div>
            <div class="message">
                <div class="success" id="success">Class Successfully Sent!</div>
                <div class="danger" id="danger">Invalid Class Input!</div>
            </div>
            </form>  
        </div>
    </div>
</div>
            
<script src="main.js"></script>

<div class="foot">
<?php
    include ("../../../Learnifly/navbar/footer.php");
?>
</div>