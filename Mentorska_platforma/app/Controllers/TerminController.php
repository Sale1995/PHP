<?php

namespace App\Controllers;

use App\Config\Database;
use PDO;

class TerminController
{
    public function index()
    {
        session_start();
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'mentor') {
            header("Location: /mentorska_platforma/public/login");
            exit;
        }

        $mentor_id = $_SESSION['user_id'];
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM dostupni_termini WHERE mentor_id = ?");
        $stmt->execute([$mentor_id]);
        $termini = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once __DIR__ . '/../Views/termini/index.php';
    }

    public function create()
    {
        session_start();
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'mentor') {
            header("Location: /mentorska_platforma/public/login");
            exit;
        }

        require_once __DIR__ . '/../Views/termini/create.php';
    }

    public function store()
    {
        session_start();
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'mentor') {
            header("Location: /mentorska_platforma/public/login");
            exit;
        }

        $datum_vreme = $_POST['datum_vreme'] ?? null;
        $mentor_id = $_SESSION['user_id'];

        if (!$datum_vreme) {
            echo "Morate uneti datum i vreme!";
            exit;
        }

        $conn = Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO dostupni_termini (mentor_id, datum_vreme, zauzeto) VALUES (?, ?, 0)");
        $stmt->execute([$mentor_id, $datum_vreme]);

        header("Location: /mentorska_platforma/public/termini");
    }

    public function delete()
    {
        session_start();
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'mentor') {
            header("Location: /mentorska_platforma/public/login");
            exit;
        }

        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo "Nedostaje ID termina!";
            exit;
        }

        $conn = Database::getConnection();
        $stmt = $conn->prepare("DELETE FROM dostupni_termini WHERE id = ?");
        $stmt->execute([$id]);

        header("Location: /mentorska_platforma/public/termini");
    }
}
