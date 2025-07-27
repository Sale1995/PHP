<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
    <title>Učenički Dashboard</title>
</head>
<body>

    <h2>Dobrodošao, <?= htmlspecialchars($_SESSION['ime']) ?>!</h2>

    <ul>
        <li><a href="/mentorska_platforma/public/sessions/create">Zakaži novu sesiju</a></li>
        <li><a href="/mentorska_platforma/public/sessions/ucenik">Moje sesije</a></li>
        <li><a href="/mentorska_platforma/public/logout">Izloguj se</a></li>
    </ul>
</body>
</html>