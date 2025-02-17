<?php

$naslovSajta = "Postani Programer";
$navigacija = [
    [
        "stranica" => "Glavna",
        "adresa" => "home.php"
    ],
    [
        "stranica" => "O nama",
        "adresa" => "about_us.php"
    ],
    [
        "stranica" => "Kontakt",
        "adresa" => "contact.php"
    ],

];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $naslovSajta?></title>
</head>
<body>
    
    <h1><?php echo $naslovSajta ?></h1>

    <nav>
        <a href="<?php echo $navigacija[0]['adresa'] ?>"><?php echo $navigacija[0]['stranica'] ?></a>
        <a href="<?php echo $navigacija[1]['adresa'] ?>"><?php echo $navigacija[1]['stranica'] ?></a>
        <a href="<?php echo $navigacija[2]['adresa'] ?>"><?php echo $navigacija[2]['stranica'] ?></a>
    </nav>

    <footer>
        <p>Copyright @copy; mojsajt <?php echo date("Y") ?></p>
    </footer>

</body>
</html>