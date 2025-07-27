<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
    <title>Feedback od učenika</title>
</head>
<body>
    <h2>Feedback koji ste dobili</h2>
    <p><strong>Vaša prosečna ocena:</strong> <?= $prosecna_ocena ?>/5</p>

    <?php if (count($feedbacks) === 0): ?>
        <p>Još uvek niste dobili nijedan feedback.</p>
    <?php else: ?>
        <table border="1" cellpadding="10">
            <tr>
                <th>Učenik</th>
                <th>Ocena</th>
                <th>Komentar</th>
            </tr>
            <?php foreach ($feedbacks as $f): ?>
                <tr>
                    <td><?= htmlspecialchars($f['ucenik_ime']) ?></td>
                    <td><?= $f['ocena'] ?></td>
                    <td><?= htmlspecialchars($f['komentar']) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>

    <p><a href="/mentorska_platforma/public/mentor/dashboard">Nazad</a></p>
</body>
</html>
