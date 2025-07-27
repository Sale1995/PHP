<?php

    namespace App\Controllers;

    use App\Models\Mentor;

    class MentorController
    {
        public function index()
        {
            session_start();
            if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
                header("Location: /mentorska_platforma/public/login");
                exit;
            }

            $mentori = Mentor::all();
            require_once __DIR__ . '/../Views/mentors/index.php';
        }

        public function create()
        {
            session_start();
            if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
                header("Location: /mentorksa_platforma/public/login");
                exit;
            }

            require_once __DIR__ . '/../Views/mentors/create.php';
        }

        public function store()
        {
            session_start();
            if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
                header("Location: /mentorksa_platforma/public/login");
                exit;
            }

            $ime = $_POST['ime'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';
            $biografija = $_POST['biografija'] ?? '';
            $oblasti = $_POST['oblasti'] ?? '';

            //Proveravamo da li su sva polja popunjena
            if ($ime && $email && $password && $biografija && $oblasti) {
                $conn = \App\Config\Database::getConnection();

                //1. Ubaci u users
                $stmt = $conn->prepare("INSERT INTO users (email, password, role, ime) VALUES (?, ?, 'mentor', ?)");
                $stmt->execute([$email, hash('sha256', $password), $ime]);

                $userId = $conn->lastInsertId();

                //2. Ubaci u mentors
                $stmt = $conn->prepare("INSERT INTO mentors (user_id, biografija, oblasti) VALUES (?, ?, ?)");
                $stmt->execute([$userId, $biografija, $oblasti]);

                header("Location: /mentorska_platforma/public/admin/mentori");
                exit;
            } else {
                echo "Sva polja su obavezna";
            }

        }

            public function edit()
            {
                session_start();
                if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
                    header("Location: /mentorska_platforma/public/login");
                    exit;
            }

            $id = $_GET['id'] ?? null;
            if(!$id) {
                echo "ID nije pronadjen.";
                return;
            }

            $mentor = \App\Models\Mentor::findByUserId($id);
            require_once __DIR__ . '/../Views/mentors/edit.php';
        }

        public function update()
        {
            session_start();

            if(!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
                header("Location: /mentorksa_platforma/public/login");
                exit;
            }

            $id = $_POST['id'] ?? null;
            $ime = $_POST['ime'] ?? '';
            $email = $_POST['email'] ?? '';
            $biografija = $_POST['biografija'] ?? '';
            $oblasti = $_POST['oblasti'] ?? '';

            if ($id && $ime && $email && $biografija && $oblasti) {
                $conn = \App\Config\Database::getConnection();

                // Update users
                $stmt = $conn->prepare("UPDATE users SET ime = ?, email = ? WHERE id = ?");
                $stmt->execute([$ime, $email, $id]);

                //Update mentors
                $stmt = $conn->prepare("UPDATE mentors SET biografija = ?, oblasti = ? WHERE user_id = ?");
                $stmt->execute([$biografija, $oblasti, $id]);

                header("Location: /mentorska_platforma/public/admin/mentori");
                exit();
            } else {
                echo "Sva polja su obavezna.";
            }
        }

        public function delete()
        {
            session_start();
            if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
                header("Location: /mentorska_platforma/public/login");
                exit;
            }

            $id = $_GET['id'] ?? null;
            if (!$id) {
                echo "ID nije pronadjen.";
                return;
            }

            $conn = \App\Config\Database::getConnection();

            //Prvo obrisi iz mentor tabele
            $stmt = $conn->prepare("DELETE FROM mentors WHERE user_id = ?");
            $stmt->execute([$id]);

            //Zatim brisemo iz users
            $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
            $stmt->execute([$id]);

            header("Location: /mentorska_platforma/public/admin/mentori");
            exit;
            
        }

        public function dashboard()
        {
            session_start();

            if (!isset($_SESSION['user_id']) || $_SESSION['role'] !=='mentor') {
                header("Locatiion: /mentorska_platforma/public/login");
                exit;
            }

            require_once __DIR__ . '/../Views/mentors/dashboard.php';
        }

    }