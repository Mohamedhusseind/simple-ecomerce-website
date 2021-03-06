<?php
session_start();
if(!empty($_GET['logout']))
{
    session_destroy();
    header('Location:../view/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CRM</title>
    <!-- Bootstrap 4 CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css" />
    <!-- Fontawesome CSS CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/style.css" />
</head>
<body>
<!--------Start Nav------->
<nav class="navbar shadow-sm  mb-5  rounded  bg-light  navbar-expand-lg navbar-light ">
    <img src="../images/crm.png" class="icon" />
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="home.php">Home <span class="sr-only">(current)</span></a>
        </div>
    </div>
    <div class="navbar float-right">


        <div class="navbar-nav ">
            <?php if (empty($_SESSION["user"]))
            { echo '
            <a class="nav-item nav-link text-uppercase font-weight-bold" href="index.php">login <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link text-uppercase font-weight-bold" href="register.php">Signup<span class="sr-only">(current)</span></a>
            ';
            } ?>
            <?php if ( !empty( $_SESSION["user"]) )
            { echo '
            <a class="nav-item nav-link text-uppercase text-primary font-weight-bold">'.$_SESSION['user'].'<span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link text-uppercase font-weight-bold " href="app.php?logout=logout">logout <span class="sr-only">(current)</span></a>
            ';
            } ?>

    </div>

    </div>
</nav>



     