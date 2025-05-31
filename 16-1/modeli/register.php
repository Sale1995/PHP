<?php

if(!isset($_POST['email']) || empty($_POST['email']))
{
    die ("Niste prosledili email");
}

if(!isset($_POST['password']) || empty($_POST['password']))
{
    die ("Niste prosledili sifru");
}

require_once "baza.php";

$email = $_POST['email'];
$sifra = password_hash($_POST['password'], PASSWORD_BCRYPT);

function korisnikPostoji($baza, $email)
{
    $query = $baza->prepare(" SELECT * FROM korisnici WHERE email = ? ");
    $query->bind_param("s", $email);
    $query->execute();
    $rezultat = $query->get_result();
    return $rezultat->num_rows > 0;
}

function registrujKorisnika($baza, $email, $sifra)
{
    $query = $baza->prepare("INSERT INTO korisnici (email, sifra) VALUES (?, ?)");
    $query->bind_param("ss", $email, $sifra);
    return $query->execute();
}

if(korisnikPostoji($baza, $email))
{
    die("Vec postoji korisnik sa ovom email adresom");
}

if(registrujKorisnika($baza, $email, $sifra)) 
{
    echo "Uspesno ste se registrovali";
} else 
{
    echo "Doslo je do greske prilikom registracije";
}