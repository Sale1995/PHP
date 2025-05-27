<?php


    $imeProsledjeno = isset($_POST["ime"]);
    if($imeProsledjeno == false)
    {
        die ("Ime nije prosledjeno");
    }
$lozinkaProsledjena = isset($_POST["lozinka"]);
if($lozinkaProsledjena == false)
{
    die ("Lozinka nije prosledjena");
}

$ime = trim($_POST["ime"]);
if($ime == "")
{
    die("Morate uneti ime");
}

$lozinka = trim($_POST["lozinka"]);
if($lozinka == "")
{
    die("Morate uneti lozinku");
}

echo $_POST["ime"]. " ".$_POST["lozinka"];

?>