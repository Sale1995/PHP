<?php


    function najvisaTemperatura($niz) {
        $rezultat = $niz[0];

        foreach ($niz as $temperatura) {
            if($temperatura > $rezultat) {
                $rezultat = $temperatura;
            }
        }

        return $rezultat;
    }

    $temperature = [25, 36, 45, 12, 150, 98, 2, 99];

    echo najvisaTemperatura($temperature);