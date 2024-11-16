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
        return $valid;
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
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_GET['action'] === 'create_user') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (User::validate_email($email) && User::check_password($password)) {
        $user = new User($email, $password);
        echo json_encode(['status' => 'success', 'user' => ['email' => $email]]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email or password']);
    }
}
