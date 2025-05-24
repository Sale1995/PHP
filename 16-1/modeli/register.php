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

$stmt = $baza->prepare(" SELECT * FROM korisnici WHERE email = ? ");
$stmt->bind_param("s", $email);
$stmt->execute();
$rezultat = $stmt->get_result();

if($rezultat->num_rows >= 1)
{
    die("Vec postoji korisnik sa ovom email adresom");
}
else
{
    $stmt = $baza->prepare("INSERT INTO korisnici (email, sifra) VALUES (?, ?)");
    $stmt->bind_param("ss", $email, $sifra);
    $stmt->execute();
    echo "Uspesno ste se registrovali";
}






