<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
    <title>Odbijene sesije</title>
</head>
<body>
    <h2>Odbijene sesije</h2>

    <?php if (empty($sesije)): ?>
        <p>Nema odbijenih sesija.</p>
    <?php else: ?>
        <table border="1" cellpadding="8">
            <tr>
                <th>Učenik</th>
                <th>Datum i vreme</th>
                <th>Cena</th>
                <th>Status</th>
            </tr>
            <?php foreach ($sesije as $sesija): ?>
                <tr>
                    <td><?= htmlspecialchars($sesija['ucenik_ime']) ?></td>
                    <td><?= htmlspecialchars($sesija['datum_vreme']) ?></td>
                    <td><?= htmlspecialchars($sesija['cena']) ?> RSD</td>
                    <td><?= htmlspecialchars($sesija['status']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <br>
    <a href="/mentorska_platforma/public/sessions/mentor">Nazad na zahteve</a>
</body>
</html>
