<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Dodaj novi termin</h2>
<form method="POST" action="/mentorska_platforma/public/termini/store">
    <label>Datum i vreme:</label><br>
    <input type="datetime-local" name="datum_vreme" required><br><br>
    <button type="submit">Sačuvaj</button>
</form>
</body>
</html>

















