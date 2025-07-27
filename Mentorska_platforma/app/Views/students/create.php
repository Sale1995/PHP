<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj Ucenika</title>
</head>
<body>
    
    <h2>Dodaj novog ucenika</h2>

    <form action="/mentorska_platforma/public/admin/ucenici/store" method="POST">
        <label>Ime:</label></br>
        <input type="text" name="ime" required></br></br>

        <label>Email:</label></br>
        <input type="email" name="email" required></br></br>

        <label>Lozinka:</label></br>
        <input type="password" name="password" required></br></br>

        <button type="submit">Sacuvaj ucenika</button>
    </form>

    <p><a href="/mentorska_platforma/public/admin/ucenici">Nazad na listu</a></p>
</body>
</html>