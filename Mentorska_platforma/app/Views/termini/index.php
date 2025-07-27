<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Moji dostupni termini</h2>
<p><a href="/mentorska_platforma/public/termini/create">Dodaj novi termin</a></p>
<table border="1" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>Datum i vreme</th>
        <th>Akcija</th>
    </tr>
    <?php foreach ($termini as $t): ?>
    <tr>
        <td><?= $t['id'] ?></td>
        <td><?= htmlspecialchars($t['datum_vreme']) ?></td>
        <td><a href="/mentorska_platforma/public/termini/delete?id=<?= $t['id'] ?>" onclick="return confirm('Obrisati termin?')">Obriši</a></td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>