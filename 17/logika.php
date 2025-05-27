<?php

    if(!isset ($_POST['ime']) || empty($_POST['ime']) )
    {
        die("Niste prosledili ime");
    }

    $ime = $_POST['ime'];

    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    $_SESSION['ime'] = $ime;

    header("Location: index.php");