<?php

if(!isset($_POST['ime']) || empty($_POST['ime']))
{
    die ("Niste prosledili ime proizvoda");
}
if(!isset($_POST['opis']) || empty($_POST['opis']))
{
    die ("Niste prosledili opis proizvoda");
}
if(!isset($_POST['cena']) || empty($_POST['cena']))
{
    die ("Niste prosledili cenu proizvoda");
}
if(!isset($_POST['slika']) || empty($_POST['slika']))
{
    die ("Niste prosledili sliku proizvoda");
}
if(!isset($_POST['kolicina']) || empty($_POST['kolicina']))
{
    die ("Niste prosledili kolicinu proizvoda");
}

require_once "baza.php";

$ime = $_POST['ime'];
$opis = $_POST['opis'];
$cena = $_POST['cena'];
$slika = $_POST['slika'];
$kolicina = $_POST['kolicina'];

function dodajProizvod($baza, $ime, $opis, $cena, $slika, $kolicina)
{
    $query = $baza->prepare("INSERT INTO proizvodi (ime, opis, cena, slika, kolicina) VALUES (?, ?, ?, ?, ?)");
    $query->bind_param("ssdsi", $ime, $opis, $cena, $slika, $kolicina);
    $query->execute();
    $query->close();
}

dodajProizvod($baza, $ime, $opis, $cena, $slika, $kolicina);


