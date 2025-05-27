<?php

    if(!isset($_GET["dan"]) || !is_string($_GET["dan"]) || trim($_GET["dan"]) === "") {
        die ("Niste uneli dan");
    }

    $dan = strtolower(trim($_GET["dan"]));

    switch ($dan) {
        case "ponedeljak":
            echo "Ponedeljak - Pocetak radne nedelje";
            break;
        case "utorak":
            echo "Utorak - Druga dan u nedelji";
            break;
        case "sreda":
            echo "Sreda - Treci dan u nedelji";
            break;
        case "cetvrtak":
            echo "Cetvrtak - Cetvrti dan u nedelji";
            break;
        case "petak":
            echo "Petak - Peti dan u nedelji";
            break;
        case "subota":
            echo "Subota - Prvi slobodan dan";
        case "nedelja":
            echo "Nedelja - Neradni dan u nedelji";
            break;
        default:
            echo "Niste uneli ispravan dan";
}

?>