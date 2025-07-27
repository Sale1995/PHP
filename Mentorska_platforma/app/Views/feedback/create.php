        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
            <title>Ocenjivanje mentora</title>
        </head>
        <body>
            
            <h2>Ocenite sesiju</h2>

            <form action="/mentorska_platforma/public/feedback/store" method="POST">
                <input type="hidden" name="session_id" value="<?= htmlspecialchars($_GET['id']) ?>">

                <label for="ocena">Ocena (1-5):</label><br>
                <input type="number" name="ocena" min="1" max="5" required><br><br>

                <label for="komentar">Komentar:</label><br>
                <textarea name="komentar" rows="4" cols="40" required></textarea><br><br>

                <button type="submit">Posalji ocenu</button>
            </form>

        </body>
        </html>