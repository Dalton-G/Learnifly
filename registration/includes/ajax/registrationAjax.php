<?php
require_once("../../../login/includes/config.php");
require_once("../classes/FormSanitizer.php");
require_once("../classes/FormValidation.php");


// Acquire form data
$userRole = $_POST["role"];
$fName = $_POST["fName"];
$lName = $_POST["lName"];
$email = $_POST["email"];
$password = $_POST["password"];
$classId = ($userRole === "student") ? $_POST["classId"] : "";

// Sanitize form inputs
$fName = FormSanitizer::sanitizeFormString($fName);
$lName = FormSanitizer::sanitizeFormString($lName);
$email = FormSanitizer::sanitizeFormEmail($email);
$password = FormSanitizer::sanitizeFormPassword($password);


// Check empty inputs. Lecturers dont have classId while students do
if ($userRole === "student") {
    if (!($userRole && $fName && $lName && $email && $password && $classId)) {
        exit("<p>Please fill in all inputs! </p>");
    }
} else if (!($userRole && $fName && $lName && $email && $password)) {
    exit("<p>Please fill in all inputs! </p>");
}


// First name must be between 2 - 20 characters
$isInvalidFirstName = FormValidation::validateName($fName);
if ($isInvalidFirstName) {
    exit("<p>First name must be 2 - 20 characters long! </p>");
}

// Last name must be between 2 - 20 characters
$isInvalidLastName = FormValidation::validateName($lName);
if ($isInvalidLastName) {
    exit("<p>Last name must be 2 - 20 characters long! </p>");
}

// Validate email format and check if email exists
$isInvalidEmail = FormValidation::validateEmail($con, $email);
if ($isInvalidEmail === "invalid format") {
    exit("<p>Invalid email format! </p>");
} else if ($isInvalidEmail) {
    exit("<p>Email already exists! </p>");
}

// Password length must be between 8 to 20 characters
$isInvalidPassword = FormValidation::validatePassword($password);
if ($isInvalidPassword) {
    exit("<p>Password must be 8 - 20 characters long! </p>");
}


$query = $con->prepare("INSERT INTO `user` (user_name, user_password, user_email, user_role, class_id)
                        VALUES (:user_name, :user_password, :user_email, :user_role, :class_id)");
$query->bindValue(":user_name", "$fName $lName");
$query->bindValue(":user_password", $password);
$query->bindValue(":user_email", $email);
$query->bindValue(":user_role", $userRole);
if ($userRole === "student") {
    $query->bindValue(":class_id", $classId);
} else {
    $query->bindValue(":class_id", null);
}

$query->execute();

if ($query) {
    // Success message
    echo ("<p>Registration Success! <i class='fa-solid fa-square-check'></i></p>");
} else {
    echo "An error occured";
}
