<?php
namespace App\Models;

use PDO;

class Agence
{
    public static function all(): array
    {
        $pdo = Database::getConnection();
        return $pdo->query("SELECT * FROM agence ORDER BY ville")
                   ->fetchAll(PDO::FETCH_ASSOC);
    }
}