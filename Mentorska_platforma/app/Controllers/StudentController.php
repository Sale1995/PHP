<?php

    namespace App\Controllers;

    use App\Models\User;

    class StudentController
    {
        public function index()
        {
            session_start();
            if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
                header("Location: /mentorska_platforma/public/login");
                exit;
            }

            $ucenici = User::allStudents();
            require_once __DIR__ . '/../Views/students/index.php';
        }

        public function create()
        {
            session_start();
            if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
                header("Location: /metorska_platforma/public/login");
                exit;
            }

            require_once __DIR__ . '/../Views/students/create.php';
        }

        public function store()
        {
            session_start();
            if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
                header("Location: /mentorska_platforma/public/login");
                exit;
            }

            $ime = $_POST['ime'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            if ($ime && $email && $password) {
                $conn = \App\Config\Database::getConnection();

                $stmt = $conn->prepare("INSERT INTO users (email, password, role, ime) VALUES (?, ?, 'ucenik', ?)");
                $stmt->execute([$email, hash('sha256', $password), $ime]);

                header("Location: /mentorska_platforma/public/admin/ucenici");
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
    if (!$id) {
        echo "ID nije prosleđen.";
        return;
    }

    $conn = \App\Config\Database::getConnection();
    $stmt = $conn->prepare("SELECT id, ime, email FROM users WHERE id = ? AND role = 'ucenik'");
    $stmt->execute([$id]);
    $ucenik = $stmt->fetch(\PDO::FETCH_ASSOC);

    require_once __DIR__ . '/../Views/students/edit.php';
}

        public function update()
        {
            session_start();
            if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
                header("Location: /mentorska_platforma/public/login");
                exit;
            }

            $id = $_POST['id'] ?? null;
            $ime = $_POST['ime'] ?? '';
            $email = $_POST['email'] ?? '';

            if ($id && $ime && $email) {
                $conn = \App\Config\Database::getConnection();
                $stmt = $conn->prepare("UPDATE users SET ime = ?, email = ? WHERE id = ? AND role = 'ucenik'");
                $stmt->execute([$ime, $email, $id]);

                header("Location: /mentorska_platforma/public/admin/ucenici");
                exit;
            } else {
                echo "Sva polja su obavezna.";
            }
        }

        public function delete()
        {
            session_start();
            if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
                header("Location: /mentorska_platforma/public/login");
                exit();
            }

            $id = $_GET['id'] ?? null;
            if (!$id) {
                echo "ID nije prosledjen.";
                return;
            }

            $conn = \App\Config\Database::getConnection();

            //Obrisi samo ako je role = 'ucenik'
            $stmt = $conn->prepare("DELETE FROM users WHERE id = ? AND role = 'ucenik'");
            $stmt->execute([$id]);

            header("Location: /mentorska_platforma/public/admin/ucenici");
            exit();
        }

        public function dashboard()
        {
            session_start();

            if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'ucenik') {
                header("Location: /mentorska_platforma/public/login");
                exit;
            }
            
            require_once __DIR__ . '/../Views/students/dashboard.php';
        }

        
    }