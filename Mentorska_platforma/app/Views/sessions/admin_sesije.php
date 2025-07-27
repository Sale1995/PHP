        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Sve sesije - Admin</title>
        </head>
        <body>

            <h2>Sve sesije na platformi</h2>

            <?php if(empty($sesije)): ?>
                <p>Nema nijedna sesija.</p>
            <?php else: ?>
                <table border="1", cellpadding="8">
                    <tr>
                        <th>ID</th>
                        <th>Mentor</th>
                        <th>Ucenik</th>
                        <th>Datum i vreme</th>
                        <th>Status</th>
                        <th>Cena</th>
                        <th>Placeno</th>
                        <th>Potvrda admina</th>
                    </tr>
                    <?php foreach($sesije as $s): ?>
                        <tr>
                           <td><?= $s['id'] ?></td>
                           <td><?= $s['mentor_ime'] ?></td>
                           <td><?= $s['ucenik_ime'] ?></td>
                           <td><?= $s['datum_vreme'] ?></td>
                           <td><?= $s['status'] ?></td>
                           <td><?= $s['cena'] ?>EUR</td>
                           <td><?= $s['placeno'] ? 'Da' : 'NE' ?></td>
                           <td><?= $s['potvrda_admina'] ? 'Potvrdjeno' : 'Na cekanju' ?></td>
                        </tr>
                     <?php endforeach; ?>
                </table>
            <?php endif; ?><br><br>

            <a href="/mentorska_platforma/public/admin/dashboard">Nazad na dashboard</a>

        </body>
        </html>