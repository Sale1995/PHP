<?php

    $baza = mysqli_connect("localhost", "root", "root", "web_shop");

    if (mysqli_connect_error()) {
        
        die("Greska prilikom povezivanja sa bazom podataka");
    }