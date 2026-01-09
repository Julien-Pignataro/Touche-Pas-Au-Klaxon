<?php
namespace App\Models;

use PDO;

class Utilisateur
{
    public static function all(): array
    {
        $pdo = Database::getConnection();
        return $pdo->query("
            SELECT id_utilisateur, nom, prenom, email, telephone, is_admin
            FROM utilisateur
            ORDER BY nom
        ")->fetchAll(PDO::FETCH_ASSOC);
    }
}