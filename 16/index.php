<?php

    require_once "modeli/baza.php";

    $rezultat = $baza->query("SELECT * FROM proizvodi");

    $proizvodi = $rezultat->fetch_all(MYSQLI_ASSOC);


?>
   

   <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>

        <?php foreach ($proizvodi as $proizvod):  ?>

            <div>
                <h1><?= $proizvod['ime'] ?></h1>
                <p><?= $proizvod['opis'] ?></p>
                <p>Cena proizvoda: <?= $proizvod['cena'] ?></p>

                <?php if($proizvod ['kolicina'] == 0): ?>
                    <p>Nema na stanju</p>
                <?php else: ?>
                    <p>Ima na stanju</p>
                <?php endif; ?>

                <a href="proizvod.php?id=<?= $proizvod['id'] ?>">Pogledaj proizvod</a>

            </div>

        <?php endforeach; ?>
        
    </body>
</html>