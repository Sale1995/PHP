<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
    <title>Admin Izveštaji</title>
</head>
<body>
    <h2>Izveštaji</h2>

    <!-- Filter forma -->
    <form method="GET" action="/mentorska_platforma/public/admin/izvestaji" style="margin-bottom: 20px;">
        <label for="godina">Godina:</label>
        <select name="godina" id="godina">
            <?php
            $trenutna = date('Y');
            for ($i = $trenutna; $i >= $trenutna - 5; $i--) {
                $selected = (isset($_GET['godina']) && $_GET['godina'] == $i) ? 'selected' : '';
                echo "<option value=\"$i\" $selected>$i</option>";
            }
            ?>
        </select>

        <label for="mesec">Mesec:</label>
        <select name="mesec" id="mesec">
            <option value="">-- Svi --</option>
            <?php
            $meseci = [
                1 => 'Januar', 2 => 'Februar', 3 => 'Mart', 4 => 'April',
                5 => 'Maj', 6 => 'Jun', 7 => 'Jul', 8 => 'Avgust',
                9 => 'Septembar', 10 => 'Oktobar', 11 => 'Novembar', 12 => 'Decembar'
            ];
            foreach ($meseci as $broj => $naziv) {
                $selected = (isset($_GET['mesec']) && $_GET['mesec'] == $broj) ? 'selected' : '';
                echo "<option value=\"$broj\" $selected>$naziv</option>";
            }
            ?>
        </select>

        <button type="submit">Filtriraj</button>
    </form>

    <h3>Broj sesija po mesecu</h3>
    <ul>
        <?php
        foreach ($sesije_po_mesecu as $red):
            $mesecIme = $meseci[(int)$red['mesec']] ?? $red['mesec'];
            $godina = $red['godina'] ?? ($_GET['godina'] ?? date('Y'));
            echo "<li>$mesecIme  $godina: {$red['broj_sesija']} sesija</li>";
        endforeach;
        ?>
    </ul>

    <h3>Ukupna zarada</h3>
    <p><?= $ukupna_zarada ?> EUR </p>

    <h3>Najaktivniji mentori</h3>
    <ul>
        <?php foreach ($najaktivniji as $mentor): ?>
            <li>
                <?= isset($mentor['ime']) ? htmlspecialchars($mentor['ime']) : 'Nepoznat mentor' ?>
                (<?= $mentor['broj_sesija'] ?? 0 ?> sesija)
            </li>
        <?php endforeach; ?>
    </ul>

    <h3>Najbolje ocenjeni mentori</h3>
    <ul>
        <?php foreach ($najbolje_ocenjeni as $mentor): ?>
            <li><?= htmlspecialchars($mentor['ime']) ?> (<?= number_format($mentor['prosecna_ocena'], 2) ?>)</li>
        <?php endforeach; ?>
    </ul>

    <a href="/mentorska_platforma/public/admin/dashboard">Nazad na dashboard</a>
    <p><a href="/mentorska_platforma/public/login">Izloguj se</a></p>
</body>
</html>
