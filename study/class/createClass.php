<?php
    include ("../../../Learnifly/dbConnection/dbConnection.php");
    include ("../../../Learnifly/navbar/header.php");
?>

<?php
    if (isset($_POST['btnCreate'])) {
    $class = $_POST['txtClass']; //validation requried, 4 letters
    $intake = $_POST['txtIntake']; //validation required, 4 integers
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
    mysqli_close($connection);
    }
?>

<h1>Create Class</h1>

<form action="#" method="POST" class="create-class">
    <input type="text" name="txtClass" placeholder="Class Code" required/>
    <input type="integer" name="txtIntake" placeholder="Intake" required/>
    <button class="btn" id="sign-up-btn" name="btnCreate">Confirm</button>
</form>



<?php
    include ("../../../Learnifly/navbar/footer.php");
?>