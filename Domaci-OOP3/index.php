<?php

    require_once "Modeli/Kopnena.php";
    require_once "Modeli/Kokoska.php";
    require_once "Modeli/Meduza.php";
    require_once "Modeli/Pas.php";
    require_once "Modeli/Riba.php";
    require_once "Modeli/Vodena.php";
    require_once "Modeli/Zivotinja.php";

    $kopnenaZivotinja = new Kopnena();
    $kopnenaZivotinja->brojNogu = 4;
    $kopnenaZivotinja->tezina = 2;

    echo $kopnenaZivotinja->tezina;

    $vodenaZivotinja = new Vodena();
    $vodenaZivotinja->vrstaVode = "slatka";

    echo $vodenaZivotinja->vrstaVode;

    $haski = new Pas();
    $haski->tezina = 7;
    $haski->duzinaRepa = 15; //15 cm
    $haski->brojNogu = 4;

    echo $haski->brojNogu;

     $saran = new Riba();
     $saran->krljust = true;
     $saran->tezina = 21;
     $saran->vrstaVode = "slatkovodna";

     echo $saran->tezina." ".$saran->vrstaVode;