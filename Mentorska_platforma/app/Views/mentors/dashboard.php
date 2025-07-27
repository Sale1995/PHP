<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
    <title>Mentor Dashboard</title>
</head>
<body>
    <h2>Dobrodošao, <?= htmlspecialchars($_SESSION['ime'] ?? 'Mentor') ?>!</h2>

    <p>Ovde možeš upravljati svojim terminima i sesijama.</p>

    <ul>
        <li><a href="/mentorska_platforma/public/termini">Moji termini</a></li>
        <li><a href="/mentorska_platforma/public/sessions/mentor">Zahtevi za sesije</a></li>
        <li><a href="/mentorska_platforma/public/sessions/mentor/zakazane">Zakazane sesije</a></li>
        <li><a href="/mentorska_platforma/public/sessions/mentor/odbijene">Odbijene sesije</a></li>
        <li><a href="/mentorska_platforma/public/feedback/mentor">Pogledaj ocene</a></li>
    </ul>

    <p><a href="/mentorska_platforma/public/logout">Izloguj se</a></p>
</body>
</html>
