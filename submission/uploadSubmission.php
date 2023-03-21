<?php
  include ("../../Learnifly/dbConnection/dbConnection.php");
  if (isset($_POST['btnSubmit'])) {
  $targetfolder = "../resources/courseSubmission/";
  $studentId = $_POST['studentID'];
  echo $studentId;
  $targetfolder = $targetfolder . basename( $_FILES['txtFile']['name']) ;
  $file_type=$_FILES['txtFile']['type'];
  if ($file_type=="application/pdf") {
    if(move_uploaded_file($_FILES['txtFile']['tmp_name'], $targetfolder)) {
      
      $file = $_FILES['txtFile'];
      $newfile = $file["name"];
      $course = $_POST['txtCourse']; 
      $date = $_POST['txtDate'];
      echo implode (",",$file);

      $query = "SELECT * FROM course WHERE course_id = '$course'";
      $results = mysqli_query($connection,$query);
      if($row = mysqli_fetch_assoc($results)){
        $courseId = $row['course_id'];

        $Squery = "SELECT * FROM submission WHERE user_id='$studentId' AND course_Id='$courseId'";
        $Sresults = mysqli_query($connection,$Squery);
        $Srow = mysqli_fetch_assoc($Sresults);
        $count = mysqli_num_rows($Sresults);
        if ($count == 1) {
          echo'<script type="text/JavaScript"> 
            alert("You have submitted the assignment. Available submission attempt is 0.");
            window.location = ("submitAssignment.php");
            </script>';
        }else{
          $sqlQuery = "INSERT INTO `submission`(`submission_date_time`, `submission_file`, `user_id`, `course_id`) 
          VALUES ('$date','$newfile','$studentId','$courseId')";
          if (mysqli_query($connection, $sqlQuery)){
            echo'<script type="text/JavaScript"> 
              alert("Assignment Succcessfully Submitted!");
              window.location = ("submitAssignment.php");
              </script>';
          }else{
            echo'<script type="text/JavaScript"> 
              alert("Fail to submit assignment, please try again.");
              window.location = ("submitAssignment.php");
              </script>';
          }
        }
      }
    }else {
    echo'<script type="text/JavaScript"> 
      alert("File failed to upload");
      window.location = ("submitAssignment.php");
      </script>';
    }
  }else {
    echo'<script type="text/JavaScript"> 
      alert("Only PDF file format is allowed.");
      window.location = ("submitAssignment.php");
      </script>';
  }
}

?>