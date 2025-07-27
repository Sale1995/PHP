<?php

    namespace App\Controllers;

    use App\Config\Database;
    use PDO;

    class FeedbackController
    {
        public function create()
        {
            session_start();

            if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'ucenik') {
                header("Location: /mentorska_platforma/public/login");
                exit;
            }

            $session_id = $_GET['id'] ?? null;

            if (!$session_id) {
                echo "Neispravan ID sesije.";
                exit;
            }

            require_once __DIR__ . '/../Views/feedback/create.php';
        }

        public function store()
        {
            session_start();

            if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'ucenik') {
                header("Location: /mentorska_platforma/public/login");
                exit;
            }

            $session_id = $_POST['session_id'];
            $ocena = $_POST['ocena'];
            $komentar = $_POST['komentar'];

            $conn = \App\Config\Database::getConnection();
            //Pronadji podatke o sesiji
            $stmt = $conn->prepare("SELECT * FROM sessions WHERE id = ? ");
            $stmt->execute([$session_id]);
            $session = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$session) {
                echo "Sesija ne postoji";
                exit;
            }

            $mentor_id = $session['mentor_id'];
            $ucenik_id = $_SESSION['user_id'];

            //Proveri da li vec postoji feedback za tu sesiju
            $stmt = $conn->prepare("SELECT * FROM feedback WHERE session_id = ? ");
            $stmt->execute([$session_id]);
            if ($stmt->fetch()) {
                echo "<h2>Vec ste ostavili ocenu za ovu sesiju.</h2>";
                echo "<p><a href='/mentorska_platforma/public/sessions/ucenik'>Nazad na moje sesije</a></p>";
                exit;
            }

            //Unesi feedback
            $stmt = $conn->prepare("INSERT INTO feedback (session_id, ucenik_id, mentor_id, ocena, komentar) 
                                    VALUES (?, ?, ?, ?, ?) ");
            $stmt->execute([$session_id, $ucenik_id, $mentor_id, $ocena, $komentar]);

            header("Location: /mentorska_platforma/public/feedback/success");

        }

        public function mentorFeedback()
        {
            session_start();

            if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'mentor') {
                hader("Location: /mentorska_platforma/public/login");
                exit;
            }

            $mentor_id = $_SESSION['user_id'];
            $conn = \App\Config\Database::getConnection();

            $stmt = $conn->prepare(" SELECT f.ocena, f.komentar, u.ime AS ucenik_ime
                                    FROM feedback f
                                    JOIN users u ON f.ucenik_id = u.id
                                    WHERE f.mentor_id = ? ");

            $stmt->execute([$mentor_id]);
            $feedbacks = $stmt->fetchAll(PDO::FETCH_ASSOC);

            //Prosecna ocena
            $stmt = $conn->prepare(" SELECT AVG(ocena) AS prosecna_ocena FROM feedback WHERE mentor_id = ? ");
            $stmt->execute([$mentor_id]);
            $prosecna = $stmt->fetch(PDO::FETCH_ASSOC);
            $prosecna_ocena = is_numeric($prosecna['prosecna_ocena']) ? round($procesna['procesna_ocena'], 2) : 0; //zaokruzeno na 2 decimale


            require_once __DIR__ . '/../Views/feedback/mentor_feedback.php';
        }
    }