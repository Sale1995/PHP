<?php
namespace App\Controllers;

use App\Models\User;

class AuthController
{
    public function showLoginForm()
    {
        require_once __DIR__ . '/../Views/auth/login.php';
    }

    public function login()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $user = User::findByEmail($email);

        if ($user && hash('sha256', $password) === $user['password']) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['ime'] = $user['ime'];

            // Redirect based on role
            switch ($user['role']) {
                case 'admin':
                    header("Location: admin/dashboard");
                    exit;
                case 'mentor':
                    header("Location: mentor/dashboard");
                    exit;
                case 'ucenik':
                    header("Location: ucenik/dashboard");
                    exit;
            }
        } else {
            echo "Pogrešan email ili lozinka!";
        }
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header("Location: /mentorska_platforma/public/login");
    }
}
