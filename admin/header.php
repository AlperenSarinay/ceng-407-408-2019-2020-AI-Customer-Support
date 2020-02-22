<?php
    session_start();

    ini_set('display_errors', 1);
    error_reporting(-1); 

    include '../helpers/adminController.php';

    if (isset($_SESSION['user_Username'])) {
        $sUsername = $_SESSION['user_Username'];
        $userid = $_SESSION['user_UserID'];
    } else {
        echo 'You cannot enter this page!';
        exit(0);
        $sUsername = null;
    }
?>
<!-- META Header -->
<meta title="robots" content="noindex">
<meta title="description" content="Admin Dashboard AI Customer Support">
<title>Admin Dashboard V1.0</title>
<!-- JS/CSS Header -->
<script src="../js/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- Admin Header -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">
        <img src="../images/mascot.png" width="30" height="30" class="d-inline-block align-top" alt=""> Admin Dashboard V1.0
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/index.php">AICS <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="general-options.php">General Settings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="users.php">Users</a>
            </li>
        </ul>
        <span class="navbar-text">
        Navbar text with an inline element
        </span>
    </div>
</nav>
