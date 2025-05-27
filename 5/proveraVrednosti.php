<?php

    if(!isset($_GET["vrednost"]) || empty($_GET["vrednost"])) {
        die ("Niste uneli vrednost");
    }

    $vrednost = $_GET["vrednost"];

    if(is_numeric($vrednost)) {
        echo "Uneta vrednost je broj.";
    } else if (is_string($vrednost)) {
        echo "Uneta vrednost je string";
    } else {
        echo "Uneta vrednost je nepoznatog tipa";
    }