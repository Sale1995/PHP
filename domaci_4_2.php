<?php

    $trenutnoVreme = date("H");

    if ($trenutnoVreme >= 5 && $trenutnoVreme < 12) {

        echo "Dobro jutro";
    } else if ($trenutnoVreme >= 12 && $trenutnoVreme < 20){
        echo "Dobar dan";
    } else {
        echo "Dobro vece";
    }
    
    ?>

