<?php


namespace App\Controllers;

use PDO;
use App\Config\Database;

class SessionController
{
    public function create()
    {
        session_start();
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'ucenik') {
            header("Location: /mentorska_platforma/public/login");
            exit;
        }

        $conn = Database::getConnection();

        $stmt = $conn->prepare("SELECT dostupni_termini.*, users.ime AS mentor_ime 
                                FROM dostupni_termini 
                                JOIN users ON dostupni_termini.mentor_id = users.id
                                WHERE zauzeto = 0");
        $stmt->execute();
        $termini = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once __DIR__ . '/../Views/sessions/create.php';
    }

    public function store()
    {
        session_start();
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'ucenik') {
            header("Location: /mentorska_platforma/public/login");
            exit;
        }

        $mentor_id = $_POST['mentor_id'] ?? null;
        $termin_id = $_POST['termin_id'] ?? null;
        $cena = $_POST['cena'] ?? null;
        $ucenik_id = $_SESSION['user_id'];

        if(!$mentor_id || !$termin_id || !$cena) {
            echo "Nedostaju podaci";
            return;
        }

        $conn = \App\Config\Database::getConnection();

        //Provera da li je termin slobodan
        $stmt = $conn->prepare("SELECT * FROM dostupni_termini WHERE id = ? AND zauzeto = 0");
        $stmt->execute([$termin_id]);
        $termin = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$termin) {
            echo "Termin vise nije dostupan";
            return;
        }

        //Unos nove sesije
        $stmt = $conn->prepare("INSERT INTO sessions (mentor_id, ucenik_id, termin_id, status, cena) VALUES (?, ?, ?, 'na_cekanju', ?) ");
        $stmt->execute([$mentor_id, $ucenik_id, $termin_id, $cena]);

        header("Location: /mentorska_platforma/public/sessions/success");
        exit;
    }

    public function pregled()
    {
        session_start();

        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'mentor') {
            header("Location: /mentorksa_platforma/public/login");
            exit;
        }

        $mentor_id = $_SESSION['user_id'];
        $conn = \App\Config\Database::getConnection();

        $stmt = $conn->prepare("SELECT sessions.*, u.ime AS ucenik_ime, dt.datum_vreme
                                FROM sessions
                                JOIN users u ON sessions.ucenik_id = u.id
                                JOIN dostupni_termini dt ON sessions.termin_id = dt.id
                                WHERE sessions.mentor_id = ? AND sessions.status = 'na_cekanju'");
        $stmt->execute([$mentor_id]);

        $zahtevi = $stmt->fetchAll(PDO::FETCH_ASSOC);

        require_once __DIR__ . '/../Views/sessions/zahtevi.php';
    }

    public function prihvati()
        {
            session_start();
            if ($_SESSION['role'] !== 'mentor') exit;

            $id = $_GET['id'] ?? null;

            if ($id) {
                $conn = \App\Config\Database::getConnection();

                //Promeni status
                $stmt = $conn->prepare("UPDATE sessions SET status = 'prihvaceno' WHERE id = ? ");
                $stmt->execute([$id]);
            }

            header("Location: /mentorska_platforma/public/sessions/mentor");
            exit;
        }

        public function odbij()
        {
            session_start();
            if ($_SESSION['role'] !== 'mentor') exit;

            $id = $_GET['id'] ?? null;

            if ($id) {
                $conn = \App\Config\Database::getConnection();

                //Promeni status
                $stmt = $conn->prepare(" UPDATE sessions SET status = 'odbijeno' WHERE id = ? ");
                $stmt->execute([$id]);

                //Oslobodi termin
                $stmt = $conn->prepare(" UPDATE dostupni_termini SET zauzeto = 0 WHERE id = (SELECT termin_id FROM sessions WHERE id = ?) ");
                $stmt->execute([$id]);
            }

            header("Location: /mentorska_platforma/public/sessions/mentor");

        }

        public function mentorZakazane()
        {
            session_start();

            if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'mentor') {
                header("Location: /mentorska_platforma/public/login");
                exit;
            }

            $mentor_id = $_SESSION['user_id'];
            $conn = \App\Config\Database::getConnection();

            $stmt= $conn->prepare(" SELECT s.*, u.ime AS ucenik_ime, dt.datum_vreme
                                    FROM sessions s
                                    JOIN users u ON s.ucenik_id = u.id
                                    JOIN dostupni_termini dt ON s.termin_id = dt.id
                                    WHERE s.mentor_id = ? AND s.status = 'prihvaceno' ");

            $stmt->execute([$mentor_id]);
            $sesije = $stmt->fetchAll(PDO::FETCH_ASSOC);

            require_once __DIR__ . '/../Views/sessions/mentor_zakazane.php';

        }

        public function ucenikZakazane() {
            session_start();

            if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'ucenik') {
                header("Location: /mentorsla_platforma/public/login");
                exit;
            }

            $ucenik_id = $_SESSION['user_id'];
            $conn = \App\Config\Database::getConnection();

            $stmt = $conn->prepare(" SELECT s.*, u.ime AS mentor_ime, dt.datum_vreme
                                    FROM sessions s
                                    JOIN users u ON s.mentor_id = u.id
                                    JOIN dostupni_termini dt ON s.termin_id = dt.id
                                    WHERE s.ucenik_id = ? AND s.status = 'prihvaceno' ");

            $stmt->execute([$ucenik_id]);
            $sesije = $stmt->fetchAll(PDO::FETCH_ASSOC);

            require_once __DIR__ . '/../Views/sessions/ucenik_zakazane.php';

        }

        public function ucenikOstale() 
        {
            session_start();

            if(!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'ucenik') {
                header("Location: /mentorska_platforma/public/login");
                exit;
            }

            $ucenik_id = $_SESSION['user_id'];
            $conn = \App\Config\Database::getConnection();

            $stmt = $conn->prepare(" SELECT s.*, u.ime AS mentor_ime, dt.datum_vreme
                                    FROM sessions s
                                    JOIN users u ON s.mentor_id = u.id
                                    JOIN dostupni_termini dt ON s.termin_id = dt.id
                                    WHERE s.ucenik_id = ? AND s.status IN ('na_cekanju', 'odbijeno') ");
            
            $stmt->execute([$ucenik_id]);
            $sesije = $stmt->fetchAll(PDO::FETCH_ASSOC);

            require_once __DIR__ . '/../Views/sessions/ucenik_ostale.php';

        }

        
        
        public function mentorOdbijene()
        {
            session_start();
            if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'mentor') {
                header("Location: /mentorska_platforma/public/login");
                exit;
            }

            $mentor_id = $_SESSION['user_id'];
            $conn = \App\Config\Database::getConnection();

            $stmt = $conn->prepare(
                "SELECT s.*, u.ime AS ucenik_ime, dt.datum_vreme
                FROM sessions s
                JOIN users u ON s.ucenik_id = u.id
                JOIN dostupni_termini dt ON s.termin_id = dt.id
                WHERE s.mentor_id = ? AND s.status = 'odbijeno'"
            );
            $stmt->execute([$mentor_id]);
            $sesije = $stmt->fetchAll(PDO::FETCH_ASSOC);

            require_once __DIR__ . '/../Views/sessions/mentor_odbijene.php';
        }

        public function ucenikPrihvacene()
        {
            session_start();

            if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'ucenik') {
            header("Location: /mentorska_platforma/public/login");
            exit;

            }

            $ucenik_id = $_SESSION['user_id'];
            $conn = \App\Config\Database::getConnection();

            $stmt = $conn = \App\Config\Database::getConnection();

            $stmt = $conn->prepare(" SELECT s.*, u.ime AS mentor_id, dt.datum_vreme
                                    FROM sessions s
                                    JOIN users u ON s.mentor_id = u.id
                                    JOIN dostupni_termini dt ON s.termin_id = dt.id
                                    WHERE s.ucenik_id = ? AND s.status = 'prihvaceno' ");

            $stmt->execute([$ucenik_id]);
            $sesije = $stmt->fetchAll(PDO::FETCH_ASSOC);

            require_once __DIR__ . '/../Views/sessions/ucenik.php';

        }

        public function plati()
        {
            session_start();

            if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'ucenik') {
                header("Location: /mentorska_platforma/public/login");
                exit;
            }

            $id = $_GET['id'] ?? null;
            if (!$id)
            {
                echo "Neispravan ID sesije";
                exit;
            }

            $conn = \App\Config\Database::getConnection();

            //Obelezi da je sesija placena
            $stmt = $conn->prepare("UPDATE sessions SET placeno = 1 WHERE id = ?");
            $stmt->execute([$id]);

            header("Location: /mentorska_platforma/public/sessions/ucenik");
        }

        public function adminSesije()
        {
            session_start();

            if(!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
                header("Location: /mentorska_platforma/public/login");
                exit;
            }

            $conn = \App\Config\Database::getConnection();

            $stmt = $conn->prepare("SELECT s.*,
                                        u1.ime AS mentor_ime,
                                        u2.ime AS ucenik_ime,
                                        dt.datum_vreme
                                    FROM sessions s
                                    JOIN users u1 ON s.mentor_id = u1.id
                                    JOIN users u2 ON s.ucenik_id = u2.id
                                    JOIN dostupni_termini dt ON s.termin_id = dt.id
                                    ORDER BY dt.datum_vreme DESC");
            $stmt->execute();
            $sesije = $stmt->fetchAll(PDO::FETCH_ASSOC);

            require_once __DIR__ . '/../Views/sessions/admin_sesije.php';
        }

    }