    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Zakazane sesije</title>
    </head>
    <body>
        
        <h2>Zakazane sesije</h2>
        <?php if (empty($sesije)): ?>
            <p>Nema zakazanih sesija.</p>
        <?php else: ?>
            <table border="1" cellpadding="8">
                <tr>
                    <th>Ucenik</th>
                    <th>Datum i vreme</th>
                    <th>Cena</th>
                    <th>Status</th>
                </tr>
                <?php foreach($sesije as $sesija): ?>
                    <tr>
                        <td><?= htmlspecialchars($sesija['ucenik_ime']) ?></td>
                        <td><?= htmlspecialchars($sesija['datum_vreme']) ?></td>
                        <td><?= htmlspecialchars($sesija['cena']) ?></td>
                        <td><?= htmlspecialchars($sesija['status']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?php endif; ?>
            <br>
            <a href="/mentorska_platforma/public/mentor/dashboard">Nazad</a>
    </body>
    </html>