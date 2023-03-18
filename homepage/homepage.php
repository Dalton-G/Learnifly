<?php include "../../Learnifly/navbar/header.php"; ?>
<?php include "../../Learnifly/dbConnection/dbConnection.php"; ?>

<?php if (isset($_SESSION['user_role'])) {
    if ($user_role == "lecturer") {
        include '../../Learnifly/homepage/tables/lecturer_dashboard.php';
    } else if ($user_role == "student") {
        include '../../Learnifly/homepage/tables/student_dashboard.php';
    }
}
?>

<?php mysqli_close($connection); ?>
<?php include "../../Learnifly/navbar/footer.php"; ?>