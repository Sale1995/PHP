<?php
namespace App\Models;

use App\Config\Database;
use PDO;

class User
{
    public static function findByEmail($email)
    {
        $conn = Database::getConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute(['email' => $email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function allStudents()
    {
        $conn = \App\Config\Database::getConnection();
        $stmt = $conn->query("SELECT id, ime, email, created_at FROM users WHERE role = 'ucenik'");
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
}
