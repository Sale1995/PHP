<?php

    function najveciBroj($niz) {
        $najveci = $niz[0];

        foreach($niz as $broj) {
            if($broj > $najveci) {
                $najveci = $broj;
            }
        }

        return $najveci;
    }

    $brojevi = [12,25,14,36,89,102,256,11,12];

    echo najveciBroj($brojevi);