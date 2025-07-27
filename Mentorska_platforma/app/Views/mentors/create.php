<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
    <title>Dodaj Mentora</title>
</head>
<body>
    <h2>Dodaj novog mentora</h2>

    <form action="/mentorska_platforma/public/admin/mentori/store" method="POST">
        <label>Ime:</label><br>
        <input type="text" name="ime" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Lozinka:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Biografija:</label><br>
        <textarea name="biografija" required></textarea><br><br>

        <label>Oblasti znanja:</label><br>
        <input type="text" name="oblasti" required><br><br>

        <button type="submit">Sačuvaj mentora</button>
    </form>

    <p><a href="/mentorska_platforma/public/admin/mentori">Nazad na listu</a></p>
</body>
</html>
