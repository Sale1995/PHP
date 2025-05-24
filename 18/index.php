<?php

    require_once "modeli/baza.php";

    $rezultat = $baza->query("SELECT * FROM proizvodi");

    $proizvodi = $rezultat->fetch_all(MYSQLI_ASSOC);

        if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

?>
   

   <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php require_once "html_delovi/navigacija.php" ?>

        <div class="container d-flex flex-wrap">
        <?php foreach ($proizvodi as $proizvod):  ?>

            <div class="col-md-4 col-12 p-2 mt-2">
                <h1><?= $proizvod['ime'] ?></h1>
                <p><?= $proizvod['opis'] ?></p>
                <p>Cena proizvoda: <?= $proizvod['cena'] ?></p>

                <?php if($proizvod ['kolicina'] == 0): ?>
                    <p>Nema na stanju</p>
                <?php else: ?>
                    <p>Ima na stanju</p>
                <?php endif; ?>

                <a class="btn btn-outline-primary" href="proizvod.php?id=<?= $proizvod['id'] ?>">Pogledaj proizvod</a>

            </div>

        <?php endforeach; ?>
        </div>
        
    </body>
</html>