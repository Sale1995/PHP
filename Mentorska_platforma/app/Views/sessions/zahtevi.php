<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
    <title>Zahtevi za sesije</title>
</head>
<body>
    <h2>Zahtevi za sesije</h2>
    <?php if (empty($zahtevi)): ?>
        <p>Nema zahteva trenutno.</p>
    <?php else: ?>
        <table border="1" cellpadding="8">
            <tr>
                <th>Učenik</th>
                <th>Datum i vreme</th>
                <th>Cena</th>
                <th>Akcija</th>
            </tr>
            <?php foreach ($zahtevi as $zahtev): ?>
                <tr>
                    <td><?= htmlspecialchars($zahtev['ucenik_ime']) ?></td>
                    <td><?= htmlspecialchars($zahtev['datum_vreme']) ?></td>
                    <td><?= htmlspecialchars($zahtev['cena']) ?> EUR</td>
                    <td>
                        <a href="/mentorska_platforma/public/sessions/prihvati?id=<?= $zahtev['id'] ?>">Prihvati</a> |
                        <a href="/mentorska_platforma/public/sessions/odbij?id=<?= $zahtev['id'] ?>">Odbij</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <a href="/mentorska_platforma/public/mentor/dashboard">Nazad</a><br>
</body>
</html>
