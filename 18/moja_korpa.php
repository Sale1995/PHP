<?php

if(session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if(!isset($_SESSION['ulogovan']))
{
    die("Morate biti ulogovani da bi videli ovu stranicu");
}

require_once "modeli/baza.php";

$userId = $_SESSION['user_id'];
$rezultat = $baza->query("SELECT narudzbine.kolicina, narudzbine.cena, proizvodi.ime 
FROM narudzbine 
INNER JOIN proizvodi 
ON proizvodi.id = narudzbine.id_proizvoda 
WHERE narudzbine.id_korisnika = $userId"
);
$narudzbine = $rezultat->fetch_all(MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>

<?php require_once "html_delovi/navigacija.php" ?>
    
    <?php if(!$rezultat->num_rows): ?>
        <h1>Nemate nijedan proizvod u korpi</h1>
    <?php else: ?>
        <?php foreach($narudzbine as $narudzbina): ?>
            <div class="col-12 d-flex justify-content-center">
                <p class = "p-2">Proizvod: <?= $narudzbina['ime'] ?></p>
                <p class = "p-2">Kolicina: <?= $narudzbina['kolicina'] ?></p>
                <p class = "p-2">Cena: <?= $narudzbina['cena'] ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

</body>
</html>

