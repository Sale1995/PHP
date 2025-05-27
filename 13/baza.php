<?php

    $baza = mysqli_connect("localhost", "root", "root", "prvi_cas");

    if(mysqli_connect_error()) 
    {
        die("Desila se greska prilikom konektovana na bazu podataka");
    }


    if(!isset ($_POST["ime"]) || empty($_POST["ime"]))
    {
        die("Niste uneli podatke");
    }

    if(!isset ($_POST["opis"]) || empty($_POST["opis"]))
    {
        die("Niste uneli podatke");
    }

    if(!isset ($_POST["cena"]) || empty($_POST["cena"]))
    {
        die("Niste uneli podatke");
    }

    if(!isset ($_POST["dan_nabavke"]) || empty($_POST["dan_nabavke"]))
    {
        die("Niste uneli podatke");
    }

    if(!isset ($_POST["kolicina"]) || empty($_POST["kolicina"]))
    {
        die("Niste uneli podatke");
    }


    $imeProizvoda = $_POST["ime"];
    $opis = $_POST["opis"];
    $cena = $_POST["cena"];
    $datumNabavke = $_POST["dan_nabavke"];
    $kolicina = $_POST["kolicina"];

    $query = " INSERT INTO proizvodi (ime, opis, cena, dan_nabavke, kolicina) VALUES ('$imeProizvoda', '$opis', $cena, '$datumNabavke', $kolicina) ";
    $baza -> query($query);
