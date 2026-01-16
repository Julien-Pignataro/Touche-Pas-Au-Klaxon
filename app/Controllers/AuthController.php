<?php
namespace App\Controllers;

use App\Models\Utilisateur;

class AuthController
{
    public function login(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $user = Utilisateur::findByEmail($_POST['email']);

            if ($user && password_verify($_POST['password'], $user['mot_de_passe'])) {
                $_SESSION['user'] = [
                    'id' => $user['id_utilisateur'],
                    'nom' => $user['nom'],
                    'prenom' => $user['prenom'],
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'is_admin' => ($user['role'] == 'ADMIN') ? '1':'0',
                ];
                header('Location: index.php');
                exit;
            }

            $error = "Identifiants incorrects";
        }

        require __DIR__ . '/../Views/auth/login.php';
    }

    public function logout(): void
    {
        session_destroy();
        header('Location: index.php');
        exit;
    }
}
