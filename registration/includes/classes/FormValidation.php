<?php
class FormValidation
{
    public static function validateName($name)
    {
        // Check if length of name is between 2 - 20 characters
        if (strlen($name) < 2 || strlen($name) > 20) {
            return true;
        }
    }

    public static function validateEmail($con, $email)
    {
        // Check email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return "invalid format";
        }

        // Check if email exists
        $query = $con->prepare("SELECT * FROM user WHERE user_email = :email");
        $query->bindValue(":email", $email);
        $query->execute();

        // If email exist return true
        if ($query->rowCount() != 0) {
            return true;
        }

        return false;
    }

    public static function validatePassword($password)
    {
        if (strlen($password) < 8 || strlen($password) > 25) {
            return true;
        }
    }
}
