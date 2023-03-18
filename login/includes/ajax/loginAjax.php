<?php
require_once("../config.php");

$email = $_POST["email"];
$password = $_POST["password"];

// Check if any inputs are empty
if (!($email && $password)) {
    exit("<p>Please fill in all inputs!</p>");
}

$query = $con->prepare("SELECT * FROM user WHERE user_email = :email");
$query->bindValue(":email", $email);
$query->execute();

if (!$query->rowCount() > 0) {
    exit("<p>Invalid credentials!</p>");
}

$row = $query->fetch(PDO::FETCH_ASSOC);

if (!($password === $row["user_password"])) {
    exit("<p>Invalid credentials!</p>");
}

$_SESSION["user_id"] = $row["user_id"];
$_SESSION["user_role"] = $row["user_role"];
$_SESSION["user_name"] = $row["user_name"];
echo "<p>Login Success! <i class='fas fa-check'></i></p>||{$_SESSION['user_role']}";


