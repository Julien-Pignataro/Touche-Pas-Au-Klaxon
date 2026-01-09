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

    public static function create(string $ville): bool
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("INSERT INTO agence (ville) VALUES (:ville)");
        return $stmt->execute(['ville' => $ville]);
    }

    public static function delete(int $id): bool
    {
        $pdo = Database::getConnection();
        $stmt = $pdo->prepare("DELETE FROM agence WHERE id_agence = :id");
        return $stmt->execute(['id' => $id]);
    }
}