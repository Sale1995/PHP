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
$sifra = $_POST['password'];

$stmt = $baza->prepare(" SELECT * FROM korisnici WHERE email = ? ");
$stmt->bind_param("s", $email);
$stmt->execute();
$rezultat = $stmt->get_result();

if($rezultat->num_rows == 1)
{
    $korisnik = $rezultat->fetch_assoc();
    $verifikovanaSifra = password_verify($sifra, $korisnik['sifra']);

    if($verifikovanaSifra == true)
    {
        echo "Dobrodosli nazad";

    } else {
        echo "Sifra nije tacna";
    }
} else 
{
    echo "Korisnik ne postoji";
}


