<?php

    function izracunajPDV($iznos) {
        if(!is_numeric($iznos)) {
            echo "Broj mora biti numericka vrednost";
            return;
        }

        if($iznos < 1) {
            echo "Broj ne moze biti manji od 1";
            return;
        }
        
        $stopaPDV = 0.22;

        $pdv = $iznos * $stopaPDV;

        echo "PDV iznosi " . $pdv . "eur";

    }

    izracunajPDV(100);
?>
