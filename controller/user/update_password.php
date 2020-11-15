<?php
require_once 'auth.php';
$email = $_POST['email'];
$password = $_POST['password'];
$password = password_hash($password , PASSWORD_DEFAULT);

$user = new Auth();
if(isset($email , $password))
{
    if($user->rest_password($email,$password))
    {
        header('Location:../../view/index.php?confirm=Password Updated! Login Now');
    }

}