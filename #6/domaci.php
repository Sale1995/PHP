
<?php

$imena = [
    'toma', 'petar', 'marko'
];


if (!isset($_POST['ime'])) {
    die("Niste uneli ime");
}

$unesenoIme = strtolower($_POST['ime']);


if (strlen($unesenoIme) < 3) {
    die("Ime mora imati više od 3 karaktera");
}


if (!in_array($unesenoIme, $imena)) {
    die("Nismo pronašli ime u listi korisnika");
}

echo "Uspešno smo pronašli korisnika";

?>
