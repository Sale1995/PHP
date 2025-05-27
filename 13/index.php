<?php

    $baza = mysqli_connect("localhost", "root", "root", "prvi_cas");

    if(mysqli_connect_error()) 
    {
        die("Desila se greska prilikom konektovana na bazu podataka");
    }

    

    $ime = "Jabuka";
    $opis = "Veoma slatka jabuka";
    $cena = 99.99;
    $datumNabavke = "2025-03-25";
    $kolicina = 100;


    $query = "INSERT INTO proizvodi (ime, opis, cena, dan_nabavke, kolicina) VALUES ('$ime', '$opis', $cena, '$datumNabavke', $kolicina) ";
    $baza -> query($query);


