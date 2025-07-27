<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
    <title>Mentori</title>
</head>
<body>
    <h2>Lista mentora</h2>
    <p><a href="/mentorska_platforma/public/admin/mentori/create"> Dodaj mentora</a></p>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Ime</th>
            <th>Biografija</th>
            <th>Oblasti</th>
            <th>Akcija</th>
        </tr>
        <?php foreach ($mentori as $mentor): ?>
            <tr>
                <td><?= $mentor['id'] ?></td>
                <td><?= $mentor['ime'] ?></td>
                <td><?= $mentor['biografija'] ?></td>
                <td><?= $mentor['oblasti'] ?></td>
                <td>
                    <a href="/mentorska_platforma/public/admin/mentori/edit?id=<?= $mentor['id'] ?>">Izmeni</a>
                    <a href="/mentorska_platforma/public/admin/mentori/delete?id=<?= $mentor['id'] ?>" onclick="return confirm('Da li si siguran da želiš da obrišeš ovog mentora?');">Obriši</a>

                </td>
            </tr>
        <?php endforeach; ?>
    </table><br><br>

    <a href="/mentorska_platforma/public/admin/dashboard">Nazad na dashboard</a>
</body>
</html>
