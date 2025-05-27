
<?php

if (!isset ($_POST['email']) || empty ($_POST['email'] ))
    {
        die ("Niste uneli email");
    }

    if (!isset ($_POST['password']) || empty ($_POST['password'] ))
    {
        die ("Niste uneli password");
    }

    require_once "baza.php";

    $email = $_POST['email'];
    $sifra = $_POST['password'];

    $rezultat = $baza->query(" SELECT * FROM korisnici WHERE email = '$email' ");

    if($rezultat->num_rows == 1)
    {
        $korisnik = $rezultat->fetch_assoc();
        $verifikovanaSifra = password_verify($sifra, $korisnik['sifra']);
        
        if($verifikovanaSifra == true)
        {
            if(session_status() == PHP_SESSION_NONE)
        {
            session_start();
        }
            $_SESSION['ulogovan'] = true;
            $_SESSION['user_id'] = $korisnik['id'];

            header("Location: ../index.php");
        } else {
            echo "Sifra nije tacna";
        }

    }   else 
    {
        echo "Korisnik ne postoji";
    }