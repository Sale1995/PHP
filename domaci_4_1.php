<?php 

    $ime = "administrator";
    $lozinka = "mojaSifreJeSigurna";

    if ($ime == "administrator" && $lozinka = "mojaSifraJeSigurna") {

        echo "Dobrodosao";
    }

    $ime = strtolower ("adminIStratOR");
    $lozinka = "mojaSifraJeSigurna";

    if ($ime == "administrator" && $lozinka == "mojaSifraJeSigurna") {

        echo "Dobrodosao";
    }

?>