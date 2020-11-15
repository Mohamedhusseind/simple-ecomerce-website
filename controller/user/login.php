<?php
session_start();
require_once 'auth.php';
$user = new Auth();
$username = $_POST['username'];
$password = $_POST['password'];

if (isset($username, $password)){
if ($user->login_check($username,$password))
{
    if(!empty($_POST['rem']))
    {
        setcookie("username",$username,time()+(30*24*60*60),'/');
        setcookie("password",$password,time()+(30*24*60*60),'/');
    }
    else {
        setcookie("username","",1,'/');
        setcookie("password","",1,'/');
    }
    $_SESSION['user'] = $_POST['username'];
    header('Location:../../view/home.php');
}
else {
echo header('Location:../../view/index.php?fail=The Password or UserName Not Valid! try again');
}
}
