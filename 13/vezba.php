<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="POST" action="baza.php">
        <input type="text" name="ime" placeholder="Ime proizvoda" required>
        <input type="text" name="opis" placeholder="Opis" required>
        <input type="number" name="cena" placeholder="Cena" required>
        <input type="text" name="dan_nabavke" placeholder="Datum nabavke" required>
        <input type="number" name="kolicina" placeholder="Kolicina" required>
        <button>Dodaj proizvod</button>
    </form>

</body>
</html>