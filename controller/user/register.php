<?php
session_start();

require_once 'auth.php';
$user = new Auth();

if ( isset($_POST['username'] , $_POST['password'] , $_POST['email']) )
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hpass = password_hash($password , PASSWORD_DEFAULT);

    if($user->user_exist($username))
    {
        header('Location:../../view/register.php?value=This UserName already Exist ! && username='.$username);
    }
    if($user->user_email($email))
    {
        header('Location:../../view/register.php?email_exist=This Email already Exist ! && email='.$email.'&& username='.$username);
    }
    else
    {
        if($user->register($username,$email,$hpass))
        {
        $_SESSION['user']=$username;
        header('Location:../../view/home.php');
        }
        else{
            echo $user->showmessage('Danger','There is problem ! try again!');
        }

    }
}

