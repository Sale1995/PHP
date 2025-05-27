<?php

if(!empty($_GET["ime_korisnika"])) {
    $ime = $_GET["ime_korisnika"];

    if($ime == "Milan") {
        echo "Pozdrav Milane";
    } else if ($ime == "Nikola") {
        echo "Pozdrav Nikola";
    } else {
        echo "Niste na spisku";
    }

} else {
    echo "unesi ime";
}

