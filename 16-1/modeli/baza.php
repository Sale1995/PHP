<?php

    $baza = mysqli_connect("localhost", "root", "root", "online_web");

    if(mysqli_connect_error())
    {
        die("Konekcija nije uspela, doslo je do greske");
    }