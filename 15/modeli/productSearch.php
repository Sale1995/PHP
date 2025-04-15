<?php

if(!isset($_GET['ime']) || empty($_GET['ime']))
{
    die ("Niste prosledili email");
}

require_once "baza.php";

$ime = $_GET['ime'];

$rezultat = $baza->query("SELECT * FROM proizvodi WHERE ime LIKE '%$ime%' OR opis LIKE '%$ime%' ");

if($rezultat->num_rows >= 1) 
{
    echo "Uspesno smo pronasli " .$rezultat->num_rows. " proizvod/a ";
} else
{
    echo "Nismo pronasli nijedan proizvod";
}