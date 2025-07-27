<?php

    namespace App\Models;

    use App\Config\Database;
    use PDO;

    class Mentor{
        public static function all()
        {
            $conn = Database::getConnection();
            $sql = "SELECT u.id, u.ime, m.biografija, m.oblasti
                    FROM users u
                    JOIN mentors m ON u.id = m.user_id
                    WHERE u.role = 'mentor'";
            $stmt = $conn->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function findByUserId($id)
        {
            $conn = \App\Config\Database::getConnection();
            $stmt = $conn->prepare("SELECT u.id, u.ime, u.email, m.biografija, m.oblasti
                                    FROM users u
                                    JOIN mentors m ON u.id = m.user_id
                                    WHERE u.id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(\PDO::FETCH_ASSOC);
        }
    }