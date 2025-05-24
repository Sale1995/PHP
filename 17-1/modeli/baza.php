<?php

    $baza = mysqli_connect("localhost", "root", "root", "web_shop");

    if(mysqli_connect_error())
    {
        die("Doslo je do greske prilikom povezivanja sa bazom");
    }