        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Moje zakazane sesije</title>
        </head>
        <body>
            
            <h2>Moje zakazane sesije</h2>
            
            <?php if (empty($sesije)): ?>
                <p>Nemate zakazanih sesija.</p>
                <?php else: ?>
                    <table border="1" cellpading="8">
                        <tr>
                            <th>Mentor</th>
                            <th>Datum i vreme</th>
                            <th>Cena</th>
                            <th>Status</th>
                        </tr>
                    
                    <?php foreach ($sesije as $sesija): ?>
                        <tr>
                            <td><?= htmlspecialchars($sesija['mentor_ime']) ?></td>
                            <td><?= htmlspecialchars($sesija['datum_vreme']) ?></td>
                            <td><?= htmlspecialchars($sesija['cena']) ?></td>
                            <td><?= htmlspecialchars($sesija['status']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php endif; ?>
            <br>
            <a href="/mentorska_platforma/public/ucenik/dashboard">Nazad na dashboard</a>

        </body>
        </html>