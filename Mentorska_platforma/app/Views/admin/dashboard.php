<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
    <title>Admin Dashboard</title>
</head>
<body>

    <h2>Osnovne informacije za admina</h2>
    <ul>
        <li><strong>Ukupno mentora:</strong> <?= $mentori ?></li>
        <li><strong>Ukupno ucenika:</strong> <?= $ucenici ?></li>
        <li><strong>Ukupno sesija:</strong> <?= $sesije ?></li>
        <li><strong>Ukupna zarada:</strong> <?= number_format($zarada, 2) ?>EUR</li>
    </ul>

    <h3>Linkovi:</h3>
    <ul>
        <li><a href="/mentorska_platforma/public/admin/mentori">Upravljanje mentorima</a></li>
        <li><a href="/mentorska_platforma/public/admin/ucenici">Upravljanje ucenicima</a></li>
        <li><a href="/mentorska_platforma/public/sessions/admin">Sve sesije</a></li>
        <li><a href="/mentorska_platforma/public/admin/uplate">Uplate</a></li>
        <li><a href="/mentorska_platforma/public/admin/izvestaji">Izvestaji</a></li>
    </ul>

    <p><a href="/mentorska_platforma/public/logout">Izloguj se</a></p>
</body>
</html>
