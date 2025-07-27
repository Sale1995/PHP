<?php

    namespace App\Controllers;

    use PDO;

    class AdminController
    {
        public function dashboard()
        {
            session_start();

            if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
                header("Location: /mentorska_platforma/public/login");
                exit;
            }

            $conn = \App\Config\Database::getConnection();

            //Statistika
            $mentori = $conn->query("SELECT COUNT(*) FROM users WHERE role = 'mentor'")->fetchColumn();
            $ucenici = $conn->query("SELECT COUNT(*) FROM users WHERE role = 'ucenik'")->fetchColumn();
            $sesije = $conn->query("SELECT COUNT(*) FROM sessions")->fetchColumn();
            $zarada = $conn->query("SELECT SUM(cena) FROM sessions WHERE placeno = 1 AND potvrda_admina = 1")->fetchColumn();


            require_once __DIR__ . '/../Views/admin/dashboard.php';
        }

        public function uplate()
        {
            session_start();
            if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
                header("Location: /mentorska_platforma/public/login");
                exit;
            }

            $conn = \App\Config\Database::getConnection();
            $stmt = $conn->prepare("SELECT s.*, u1.ime AS mentor_ime, u2.ime AS ucenik_ime
                                    FROM sessions s
                                    JOIN users u1 ON s.mentor_id = u1.id
                                    JOIN users u2 ON s.ucenik_id = u2.id
                                    WHERE s.placeno = 1");
            $stmt->execute();
            $uplate = $stmt->fetchAll(PDO::FETCH_ASSOC);

            require_once __DIR__ . '/../Views/admin/uplate.php';
        }

        public function potvrdiUplatu()
        {
            session_start();
            if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
                header("Location: /mentorska_platforma/public/login");
                exit;
            }

            $id = $_GET['id'] ?? null;

            if($id) {
                $conn = \App\Config\Database::getConnection();
                $stmt = $conn->prepare("UPDATE sessions SET potvrda_admina = 1 WHERE id = ?");
                $stmt->execute([$id]);
            }

            header("Location: /mentorska_platforma/public/admin/uplate");
        }

public function izvestaji()
{
    session_start();

    if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
        header("Location: /mentorska_platforma/public/login");
        exit;
    }

    $conn = \App\Config\Database::getConnection();

    // Preuzmi filtere iz URL-a (npr. ?godina=2025&mesec=7)
    $godina = $_GET['godina'] ?? date('Y');  // default je trenutna godina
    $mesec = $_GET['mesec'] ?? null;

    // 1. Broj sesija po mesecu (sa filterom)

    $stmt = $conn->prepare("SELECT MONTH(dt.datum_vreme) AS mesec, YEAR(dt.datum_vreme) AS godina, COUNT(*) AS broj_sesija
                        FROM sessions s
                        JOIN dostupni_termini dt ON s.termin_id = dt.id
                        WHERE YEAR(dt.datum_vreme) = ?" . ($mesec ? " AND MONTH(dt.datum_vreme) = ?" : "") . "
                        GROUP BY mesec, godina
                        ORDER BY MIN(dt.datum_vreme)");

    $params = [$godina];
    if ($mesec) $params[] = $mesec;

    $stmt->execute($params);
    $sesije_po_mesecu = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 2. Ukupna zarada (sa istim filterom)
        if ($mesec) {
        $stmt = $conn->prepare("SELECT SUM(s.cena) AS ukupna_zarada
                                FROM sessions s
                                JOIN dostupni_termini dt ON s.termin_id = dt.id
                                WHERE s.placeno = 1 AND s.potvrda_admina = 1
                                AND YEAR(dt.datum_vreme) = ? AND MONTH(dt.datum_vreme) = ?");
        $stmt->execute([$godina, $mesec]);
    } else {
        $stmt = $conn->prepare("SELECT SUM(s.cena) AS ukupna_zarada
                                FROM sessions s
                                JOIN dostupni_termini dt ON s.termin_id = dt.id
                                WHERE s.placeno = 1 AND s.potvrda_admina = 1
                                AND YEAR(dt.datum_vreme) = ?");
        $stmt->execute([$godina]);
    }

    $ukupna_zarada = $stmt->fetchColumn();


    // 3. Najaktivniji mentori (filter po godini i mesecu)
    $godina = $_GET['godina'] ?? date('Y');
    $mesec = $_GET['mesec'] ?? null;

    if ($mesec) {
        $stmt = $conn->prepare("SELECT u.ime, COUNT(*) AS broj_sesija
                                FROM sessions s
                                JOIN users u ON s.mentor_id = u.id
                                JOIN dostupni_termini dt ON s.termin_id = dt.id
                                WHERE YEAR(dt.datum_vreme) = ? AND MONTH(dt.datum_vreme) = ?
                                GROUP BY u.id
                                ORDER BY broj_sesija DESC");
        $stmt->execute([$godina, $mesec]);
    } else {
        $stmt = $conn->prepare("SELECT u.ime, COUNT(*) AS broj_sesija
                                FROM sessions s
                                JOIN users u ON s.mentor_id = u.id
                                JOIN dostupni_termini dt ON s.termin_id = dt.id
                                WHERE YEAR(dt.datum_vreme) = ?
                                GROUP BY u.id
                                ORDER BY broj_sesija DESC");
        $stmt->execute([$godina]);
    }

    $najaktivniji = $stmt->fetchAll(PDO::FETCH_ASSOC);


    // 4. Najbolje ocenjeni mentori (filter po godini i mesecu)
    $godina = $_GET['godina'] ?? date('Y');
    $mesec = $_GET['mesec'] ?? null;

    if ($mesec) {
        $stmt = $conn->prepare("SELECT u.ime, AVG(f.ocena) AS prosecna_ocena
                                FROM feedback f
                                JOIN users u ON f.mentor_id = u.id
                                WHERE YEAR(f.created_at) = ? AND MONTH(f.created_at) = ?
                                GROUP BY f.mentor_id
                                ORDER BY prosecna_ocena DESC");
        $stmt->execute([$godina, $mesec]);
    } else {
        $stmt = $conn->prepare("SELECT u.ime, AVG(f.ocena) AS prosecna_ocena
                                FROM feedback f
                                JOIN users u ON f.mentor_id = u.id
                                WHERE YEAR(f.created_at) = ?
                                GROUP BY f.mentor_id
                                ORDER BY prosecna_ocena DESC");
        $stmt->execute([$godina]);
    }

    $najbolje_ocenjeni = $stmt->fetchAll(PDO::FETCH_ASSOC);


    // Godina i mesec šaljemo i u view za prikaz u select-u
    require_once __DIR__ . '/../Views/admin/izvestaji.php';
}

        
    }