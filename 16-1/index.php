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
            
            <form action="registracija.php" method="POST">
                <button>Registuj se</button>
            </form></br>

            <form action="logovanje.php" method="POST">
                <button>Uloguj se</button>
            </form></br>

            <form action="dodavanjeProizvoda.php" method="POST">
                <button>Dodaj proizvod</button>
            </form></br>

            <form action="pretragaProizvoda.php" method="GET">
                <button>Pretraga proizvoda</button>
            </form>

            <?php foreach ($proizvodi as $proizvod): ?>

            <div>
                <h1><?= $proizvod['ime'] ?></h1>
                <p><?= $proizvod['opis'] ?></p>
                <p>Cena proizvoda: <?= $proizvod['cena'] ?></p>

                <?php if($proizvod['kolicina'] == 0): ?>
                    <p>Nema na stanju</p>
                <?php else: ?>
                    <p>Ima na stanju</p>
                <?php endif; ?>

                <a href="modeli/product.php?id=<?= $proizvod['id'] ?>">Pogledaj proizvod</a>

            </div>

            <?php endforeach; ?>

        </body>
        </html>