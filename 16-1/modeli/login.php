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

function getKorisnikbyEmail($baza, $email)
{
    $query = $baza->prepare(" SELECT * FROM korisnici WHERE email = ? ");
    $query->bind_param("s", $email);
    $query->execute();
    $rezultat = $query->get_result();
    return $rezultat;
}

$rezultat = getKorisnikbyEmail($baza, $email);

$korisnik = $rezultat->fetch_assoc();
  


if(!$rezultat->num_rows)
{
    die("Korisnik ne postoji");
}

$verifikovanaSifra = password_verify($sifra, $korisnik['sifra']);

if(!$verifikovanaSifra)
{
    die("Sifra nije tacna");
} else
{
    echo "Dobrodosli nazad";
}

