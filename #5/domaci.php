<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kalkulator cene</title>
</head>
<body>

    <form action="domaci_kalkulacija.php" method="GET">

        <input type="text" placeholder="Unesite cenu proizvoda" name="cena_proizvoda">
        <br>
        
        <select name="Vrsta_robe">
            <option value="Hrana">Hrana</option>
            <option value="Oprema za racunare">Oprema za racunare</option>
        </select><br>
        
        <label>
            <input type="checkbox" name="Porez"> Izračunaj porez
        </label><br>

        <button>Izračunaj cenu</button>
    </form>

</body>
</html>
