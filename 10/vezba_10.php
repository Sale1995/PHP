<?php


    function prosecnaCena($proizvodi) {

        $ukupno = 0;
        $brojProizvoda = 0;

        foreach ($proizvodi as $proizvod => $cena) {
            $ukupno += $cena;
            $brojProizvoda++;
        }

        return $ukupno / $brojProizvoda;
    }

    $artikli = [
        "Hleb" => 60,
        "Mleko" => 120,
        "Sir" => 450,
        "Jaja" => 220
    ];

    echo prosecnaCena($artikli);