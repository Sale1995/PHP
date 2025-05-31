<?php


    if(!isset($_GET['id']) || empty($_GET['id'])) 
    {
        die("Fali ID proizvoda");
    }

    require_once "baza.php";
    
    $idProizvoda = $_GET['id'];

    function dohvatiProizvodPoId($baza, $id)
    {
        $query = $baza->prepare("SELECT * FROM proizvodi WHERE id = ?");
        $query->bind_param("i", $id);
        $query->execute();

        $rezultat = $query->get_result();

        if(!$rezultat->num_rows)
        {
            return false;
        }

        return $rezultat->fetch_assoc();
    }

    $proizvod = dohvatiProizvodPoId($baza, $idProizvoda);

    if(!$proizvod)
    {
        die("Ovaj proizvod ne postoji");
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        
        <h1><?= $proizvod['ime'] ?></h1>
        <p><?= $proizvod['opis'] ?></p>
        <p>Cena proizvoda: <?= $proizvod['cena'] ?></p>

        <?php if($proizvod ['kolicina'] == 0): ?>
            <p>Nema na stanju</p>
        <?php else: ?>
            <p>Ima na stanju</p>
        <?php endif;?>

    </body>
    </html>