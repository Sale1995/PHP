<?php

    require_once "Models/Korisnik.php";

    $korisnik = new Korisnik();

    $email = "kolikoimasa@gmail.com";

    echo $korisnik->getName();

    $korisnik->setName("sale");

    echo $korisnik->getName();

    $korisnik->update("pcadmin@pcadmin.com", "pcadm@pcadmin.com", "kolikoimasati");

    if($korisnik->emailExists($email) === false)
    {
        $korisnik->register($email, "sale199");
    } else
    {
        die ("Vec postoji korisnik sa ovom email adresom u bazi");
    }