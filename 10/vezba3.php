<?php

    function izracunajKamatu($iznosKredita, $godina)
    {
        $kamata = 0;
        if($godina < 2000) {
            $kamata = 0.05;
        } else if ($godina >=2000 && $godina <=2010) {
            $kamata = 0.08;
        } else if ($godina >= 2011 && $godina <= 2020) {
            $kamata = 0.1;
        } else {
            $kamata = 0.14;
        }
        return $iznosKredita*$kamata;
    }

    $kredit1999 = izracunajKamatu(10000, 2009);
    echo $kredit1999;
        
?>