<?php
require_once("../config.php");

$email = $_POST["email"];
$password = $_POST["password"];
$cPassword = $_POST["cPassword"];

// Check if any inputs are empty
if (!($email && $password && $cPassword)) {
    exit("<p>Please fill in all inputs</p>");
}

$query = $con->prepare("SELECT * FROM user WHERE user_email = :email");
$query->bindValue(":email", $email);
$query->execute();

// Check if email exists
if (!$query->rowCount() > 0) {
    exit("<p>Email doesnt exist</p>");
}

// Check if password is invalid
if (strlen($password) < 8 || strlen($password) > 20) {
    exit("<p>Password must be within 8 to 20 characters</p>");
}

// Check if both passwords match
if (!($password === $cPassword)) {
    exit("<p>Passwords doesnt match</p>");
}


// Update database with new password
$query2 = $con->prepare("UPDATE user SET user_password = :password WHERE user_email = :email");
$query2->bindValue(":email", $email);
$query2->bindValue(":password", $password);
$query2->execute();

// Success message
echo "<p>Password Reset Success! <i class='fas fa-check'></i></p>";


