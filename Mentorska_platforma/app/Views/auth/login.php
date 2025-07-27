<!DOCTYPE html>
<html lang="sr">
<head>
    <meta charset="UTF_8">
    <link rel="stylesheet" href="/mentorska_platforma/public/css/style.css">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="/mentorska_platforma/public/login">
        <label>Email:</label><br>
        <input type="email" name="email" required><br><br>

        <label>Lozinka:</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">Prijavi se</button>
    </form>
</body>
</html>
