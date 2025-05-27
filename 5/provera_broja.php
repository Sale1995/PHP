<?php

if (isset($_GET['broj']) && is_numeric($_GET["broj"])) {
    $broj = $_GET['broj'];

    if ($broj % 2 == 0) {
        echo "broj je paran";
    } else {
        echo "broj je neparan";
    }
} else {
    echo "Unesite broj";
}
?>