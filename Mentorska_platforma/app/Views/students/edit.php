<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
    <title>Izmena učenika</title>
</head>
<body>
    <h2>Izmeni učenika</h2>

    <form action="/mentorska_platforma/public/admin/ucenici/update" method="POST">
        <input type="hidden" name="id" value="<?= $ucenik['id'] ?>">

        <label>Ime:</label><br>
        <input type="text" name="ime" value="<?= $ucenik['ime'] ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= $ucenik['email'] ?>" required><br><br>

        <button type="submit">Sačuvaj izmene</button>
    </form>

    <p><a href="/mentorska_platforma/public/admin/ucenici">Nazad</a></p>
</body>
</html>
