<?php
class User
{
    private $email;
    private $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    public static function validate_email($email)
    {
        $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        $valid = preg_match($pattern, $email);
        if ($valid) {
            return $valid;
        } else {
            return "Invalid email.";
        }
    }

    public static function check_password($password)
    {
        $hasUpperCase = preg_match("/[A-Z]/", $password);
        $hasLowerCase = preg_match("/[a-z]/", $password);
        $hasSpecial = preg_match("/[\W]/", $password);
        $hasMinLen = strlen($password) >= 12;

        return $hasLowerCase && $hasUpperCase && $hasSpecial && $hasMinLen;
    }

    public function copy_with($newEmail, $newPassword) {
        return new User($newEmail ?? $this->email, $newPassword ?? $this->password);
    }

}
