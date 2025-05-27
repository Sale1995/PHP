<?php

    $automobili = ["Audi", "BMW", "Mercedes"];

    foreach ($automobili as $automobil) {
        if($automobil == "BMW") {
        continue;
        }
        echo $automobil;
    }

?>