<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
    <title>Ostale sesije</title>
</head>
<body>
    <h2>Na čekanju i odbijene sesije</h2>

    <?php if (empty($sesije)): ?>
        <p>Nemate nijednu sesiju na čekanju ili odbijenu.</p>
    <?php else: ?>
        <table border="1" cellpadding="8">
            <tr>
                <th>Mentor</th>
                <th>Datum i vreme</th>
                <th>Status</th>
            </tr>
            <?php foreach ($sesije as $sesija): ?>
                <tr>
                    <td><?= htmlspecialchars($sesija['mentor_ime']) ?></td>
                    <td><?= htmlspecialchars($sesija['datum_vreme']) ?></td>
                    <td><?= htmlspecialchars($sesija['status']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <br>
    <a href="/mentorska_platforma/public/ucenik/dashboard">Nazad na dashboard</a>
</body>
</html>
