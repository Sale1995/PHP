<?php

if(!isset($_GET['email']) || empty($_GET['email']))
{
    die ("Niste prosledili email");
}

$email = $_GET['email'];

require_once "baza.php";

$rezultat = $baza->query("SELECT * FROM korisnici WHERE email LIKE '%$email%'");

if($rezultat->num_rows >= 1 )
{
    die("Nasli smo $rezultat->num_rows korisnika sa tom email adresom");

} else
{
    echo "Nema registrovanih korisnika sa tim emailom";
}