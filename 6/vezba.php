<?php

    $pin = isset($_POST["pin"]);
    if($pin == false)
    {
        die("Niste uneti pin");
    }

    $duzinaPina = strlen($_POST["pin"]);
    if($duzinaPina < 4 ||  $duzinaPina > 6) {
        die ("Pin mora biti minimun 4, a maksimalno 6 karaktera");
    }

    echo "Uspesno ste uneli pin";
?>