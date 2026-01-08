<?php
namespace App\Models;

use PDO;

/**
 * Gestion des utilisateurs
 */
class Utilisateur
{
    public static function findByEmail(string $email): ?array
    {
        $pdo = Database::getConnection();

        $stmt = $pdo->prepare(
            "SELECT * FROM utilisateur WHERE email = :email"
        );
        $stmt->execute(['email' => $email]);

        return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
    }
}