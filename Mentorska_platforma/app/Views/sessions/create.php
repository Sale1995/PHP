<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zakazi novu mentorsku sesiju</title>
</head>
<body>
    
    <h2>Dostupni termini za zakazivanje</h2>

    <?php if (empty($termini)): ?>
        <p>Nema dostupnih termina.</p>
    <?php else: ?>
        <table border="1" cellpadding="8">
            <tr>
                <th>Mentor</th>
                <th>Datum i vreme</th>
                <th>Akcija</th>
            </tr>
            <?php foreach ($termini as $termin): ?>
                <tr>
                    <td><?= htmlspecialchars($termin['mentor_ime']) ?></td>
                    <td><?= htmlspecialchars($termin['datum_vreme']) ?></td>
                    <td>
                        <form action="/mentorska_platforma/public/sessions/store" method="POST">
                            <input type="hidden" name="mentor_id" value="<?= $termin['mentor_id'] ?>">
                            <input type="hidden" name="termin_id" value="<?= $termin['id'] ?>">
                            <input type="hidden" name="cena" value="300">
                            <button type="submit">Zakazi</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?><br><br>

    <a href="/mentorska_platforma/public/ucenik/dashboard">Nazad</a>
</body>
</html>