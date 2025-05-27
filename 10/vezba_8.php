<?php

    function imenaSaPetSlova($imena) {
        $rezultat = [];

        foreach ($imena as $ime) {
            if (strlen($ime) === 5) {
                $rezultat[] = $ime;
            }
        }
            return $rezultat;
    }   


    $listaImena = ["Aleksandar", "Milos", "Petra", "Mila"];

    $rezultat = imenaSaPetSlova($listaImena);

    echo implode (", ", $rezultat);