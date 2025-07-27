<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
    <title>Izmena Mentora</title>
</head>
<body>
    <h2>Izmeni mentora</h2>

    <form action="/mentorska_platforma/public/admin/mentori/update" method="POST">
        <input type="hidden" name="id" value="<?= $mentor['id'] ?>">

        <label>Ime:</label><br>
        <input type="text" name="ime" value="<?= $mentor['ime'] ?>" required><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= $mentor['email'] ?>" required><br><br>

        <label>Biografija:</label><br>
        <textarea name="biografija" required><?= $mentor['biografija'] ?></textarea><br><br>

        <label>Oblasti:</label><br>
        <input type="text" name="oblasti" value="<?= $mentor['oblasti'] ?>" required><br><br>

        <button type="submit">Sačuvaj izmene</button>
    </form>

    <p><a href="/mentorska_platforma/public/admin/mentori">Nazad</a></p>
</body>
</html>
