        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Moje sesije</title>
        </head>
        <body>
            
            <h2>Prihvacene sesije</h2>

            <?php if (empty($sesije)): ?>
                <p>Nemate nijednu prihvacenu sesiju.</p>
            <?php else: ?>
                <table border="1" cellpadding="8">
                    <tr>
                        <th>Mentor</th>
                        <th>Datum i vreme</th>
                        <th>Cena</th>
                        <th>Placanje</th>
                        <th>Feedback</th>
                    </tr>
                        <?php foreach ($sesije as $sesija): ?>
                            <tr>
                                <td><?= htmlspecialchars($sesija['mentor_id']) ?></td>
                                <td><?= htmlspecialchars($sesija['datum_vreme']) ?></td>
                                <td><?= $sesija['cena'] ?> EUR</td>
                                <td>
                                    <?php if ($sesija['placeno'] == 0): ?>
                                        <a href="/mentorska_platforma/public/sessions/plati?id=<?= $sesija['id'] ?>">Plati</a>
                                    <?php elseif ($sesija['placeno'] == 1 && $sesija['potvrda_admina'] == 0): ?>
                                        Ceka potvrdu admina
                                        <?php else: ?>
                                            ✅ Placeno
                                        <?php endif; ?>
                                </td>
                                <td>
                                    <?php if($sesija['placeno'] == 1): ?>
                                        <a href="/mentorska_platforma/public/feedback/create?id=<?= $sesija['id'] ?>">Osvati feedback</a>
                                        <?php else: ?>
                                            Tek nakon placanja
                                        <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                </table>
            <?php endif; ?>
            <br><br>
            <a href="/mentorska_platforma/public/ucenik/dashboard">Nazad</a><br>
            <a href="/mentorska_platforma/public/logout">Izloguj se</a>
        </body>
        </html>