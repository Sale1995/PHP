<?php

$cena = $_GET["cena_proizvoda"];
$vrstaRobe = $_GET["Vrsta_robe"];

if($vrstaRobe == "Hrana") {
    $cena += 50;
} else if($vrstaRobe == "Oprema za racunare") {
    $cena += 350;
}

if(isset($_GET["Porez"])) {
    $cena = ($cena * 0.10) + $cena;
}

echo $cena;

?>