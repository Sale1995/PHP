<?php


    function slovaString($niz) {

        if(strlen($niz) > 5) {
            return strlen($niz);
        } else {
            return 0;
        }

    }

    $tekst = "Alekds";

    echo slovaString($tekst);