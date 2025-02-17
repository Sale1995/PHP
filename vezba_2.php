<?php

    $naslovSajta = "Postani Programer";
    $navigacija = ["Glavna", "O nama", "Kontakt"];
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $naslovSajta ?></title>
</head>
<body>
    <h1><?php echo $naslovSajta ?></h1>

    <nav>

    <a><?php echo $navigacija[0]?></a>
    <a><?php echo $navigacija[1]?></a>
    <a><?php echo $navigacija[2]?></a>
    
    </nav>
</body>
</html>