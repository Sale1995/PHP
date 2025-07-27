<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
    <title>Lista učenika</title>
</head>
<body>
    <h2>Učenici</h2>
    <p><a href="/mentorska_platforma/public/admin/ucenici/create">Dodaj ucenika</a></p>
    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Ime</th>
            <th>Email</th>
            <th>Datum registracije</th>
            <th>Akcija</th>
        </tr>
        <?php foreach ($ucenici as $ucenik): ?>
            <tr>
                <td><?= $ucenik['id'] ?></td>
                <td><?= $ucenik['ime'] ?></td>
                <td><?= $ucenik['email'] ?></td>
                <td><?= $ucenik['created_at'] ?></td>
                <td>
                    <a href="/mentorska_platforma/public/admin/ucenici/edit?id=<?= $ucenik['id'] ?>">Izmeni</a>
                    <a href="/mentorska_platforma/public/admin/ucenici/delete?id=<?= $ucenik['id'] ?>" onclick="return confirm('Da li sigurno zelis da obrises ovog ucenika?');">Obrisi</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <p><a href="/mentorska_platforma/public/admin/dashboard">Nazad na dashboard</a></p>
</body>
</html>
