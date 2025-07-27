<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
    <title>Pregled uplata za potvrdu</title>
</head>
<body>
    
    <h2>Pregled uplata za potvdru</h2>

    <?php if(empty($uplate)): ?>
        <p>Nema uplate za potvrdu.</p>
    <?php else: ?>
        <table border="1" cellpadding="8">
            <tr>
                <th>ID</th>
                <th>Mentor</th>
                <th>Ucenik</th>
                <th>Cena</th>
                <th colspan="2">Akcija</th>
            </tr>
            <?php foreach ($uplate as $sesija): ?>
                <tr>
                    <td><?= $sesija['id'] ?></td>
                    <td><?= htmlspecialchars($sesija['mentor_ime']) ?></td>
                    <td><?= htmlspecialchars($sesija['ucenik_ime']) ?></td>
                    <td><?= $sesija['cena'] ?> EUR</td>
                    <td>
                        <?php if ($sesija['potvrda_admina']): ?>
                            <span style="color: green;">Potvrdjeno</span>
                        <?php else: ?>
                            <span style="color: orange;">Na cekanju</span>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if (!$sesija['potvrda_admina']): ?>
                            <a href="/mentorska_platforma/public/admin/uplate/potvrdi?id=<?= $sesija['id'] ?>">Potvrdi</a>
                        <?php else: ?>
                            <em>✔</em>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>

        </table>
    <?php endif; ?><br><br>

    <a href="/mentorska_platforma/public/admin/dashboard">Nazad na dashboard</a>

</body>
</html>