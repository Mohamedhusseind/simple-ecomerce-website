<?php
require_once '../class/config.php';
class Auth extends Database {
    //Register new user
    public function register($username,$email,$password){
        $sql = "INSERT INTO users(username,email,password) VALUES (:username,:email,:password)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username'=>$username,'email'=>$email,'password'=>$password]);
            return true;
    }
    //checking existing users
    public function user_exist($username)
    {
        $sql = "SELECT username From users where username = :username";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username'=>$username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function login_check($username,$password)
    {
        $sql = "SELECT password FROM users where username = :username ";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username' => $username]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password,$row['password'])) {

            return $row;
        }

    }
    public function user_email($email)
    {
        $sql = "SELECT email From users where email = :email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['email'=>$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function user_id($username)
    {
        $stmt = $this->conn->prepare("SELECT id From users where username = :username");
        $stmt->execute(['username' => $username]);
        $row = $stmt->fetch();
        return $row[0];
    }

    public function rest_password($email,$password)
    {
        $sql = "UPDATE users SET password = :password WHERE email = :email";
        $stmt = $this->conn->prepare($sql);
        $row=$stmt->execute(['email'=>$email,'password'=>$password]);
        return$row;

    }

}