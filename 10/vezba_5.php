<?php


    function vracanjeOcena($ocene, $granicnaVrednost) {
        $broj = 0;

        foreach ($ocene as $ime => $ocena) {

            if($ocena > $granicnaVrednost) {
                $broj ++;
            }
        }
        return $broj;
    }

    $osoba = [
        "Aleksandar" => 5,
        "Nikola" => 3,
        "Marko" => 4,
        "Stefan" => 8,
        "Stevko" => 9
    ];

    echo vracanjeOcena($osoba, 4);