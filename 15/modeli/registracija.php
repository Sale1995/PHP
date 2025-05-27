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
$sifra = password_hash($_POST['password'], PASSWORD_BCRYPT);

require_once "baza.php";

$rezultat = $baza->query("SELECT * FROM korisnici WHERE email = '$email'");

if($rezultat->num_rows >= 1)
{
    die("Vec postoji korisnik sa ovom email adresom");
    
} else {
    echo "Uspesno ste se registrovali";
    $baza->query("INSERT INTO korisnici (email, sifra) VALUES ('$email', '$sifra')");
}




