<?php
class User{
    private $email;
    private $password;
    
    public function __construct($email,$password)
    {
        $this->email=$email;
        $this->password=$password;
    }

    public static function checkPassword($password){
        $hasUpperCase=preg_match("/[A-Z]/",$password);
        $hasLowerCase=preg_match("/[a-z]/",$password);
        $hasSpecial=preg_match("/[\W]/",$password);
        $hasMinLen=strlen($password)>=12;

        return $hasLowerCase && $hasUpperCase && $hasSpecial && $hasMinLen;
    }
}


?>
