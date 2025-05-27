<?php

    function starijeGodine($godine) {
        $starijeOd = [];

        foreach($godine as $godina) { 
            if($godina < 1990) {
                $starijeOd[] = $godina;
            }
        }
        return $starijeOd;
    }

    $godine = [1890, 2010, 1994, 1923, 1989];

    echo implode(", ", starijeGodine($godine));