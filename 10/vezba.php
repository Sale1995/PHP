<?php

    function izracunajPopust($cena, $popust)
    {
        $popust = $popust/100;
        $rezultat = $cena * $popust;
        return $rezultat;
    }

    $obracunatiPopust = izracunajPopust(1500, 20);
    echo $obracunatiPopust;

?>