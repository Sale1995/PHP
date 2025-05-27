<?php

    function nizBrojeva($brojevi) {
        $zbir = 0;
        foreach($brojevi as $broj) {
            if($broj % 2 == 0 ) {
                $zbir += $broj;
            }
        }
        return $zbir;
    }

    $brojevi = [12,25,14,22,15,46];

    echo nizBrojeva($brojevi);
