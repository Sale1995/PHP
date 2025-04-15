<?php

if(!isset($_POST['email']) || empty($_POST['email']))
{
    die ("Niste prosledili email");
}

if(!isset($_POST['password']) || empty($_POST['password']))
{
    die ("Niste prosledili sifru");
}

$email = $_POST['email'];
$sifra = $_POST['password'];

require_once "baza.php";

$baza->query("INSERT INTO korisnici (email, sifra) VALUES ('$email', '$sifra')");

