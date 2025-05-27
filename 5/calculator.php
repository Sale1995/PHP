<?php


if (isset($_GET["vrsta_racunice"]) && !empty($_GET["vrsta_racunice"]) &&
    isset($_GET["broj_1"]) && !empty($_GET["broj_1"]) &&
    isset($_GET["broj_2"]) && !empty($_GET["broj_2"])) {

$vrstaRacunice = $_GET["vrsta_racunice"];
$broj1 = $_GET["broj_1"];
$broj2 = $_GET["broj_2"];


if ($vrstaRacunice == "Sabiranje") {
    echo $broj1 + $broj2;
}

else if($vrstaRacunice == "Oduzimanje") {
    echo $broj1 - $broj2;
} 
}
else {
    echo "Niste uneli brojeve";
}


?>
