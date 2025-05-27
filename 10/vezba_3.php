<?php

    function vrednostBrojeva($broj) {

        if($broj < 0 ) {
            return "negativan";
        } else if ($broj > 0 ) {
            return "pozitivan";
        } else {
            return "nula";
        }
    }

    echo vrednostBrojeva(-2);