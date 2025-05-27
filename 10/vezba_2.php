<?php


    function nizStringova($stringovi) {

        $rezultat = [];

        foreach($stringovi as $string) {
            if(ctype_upper(substr($string, 0, 1))) {
                $rezultat[] = $string;
            }
        }
        return $rezultat;
    }

    $niz = ["Jabuka", "Banana", "malina", "kruska", "Kupina"];

    echo implode(", ", nizStringova($niz));
