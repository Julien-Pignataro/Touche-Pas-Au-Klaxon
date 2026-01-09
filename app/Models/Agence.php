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
    public static function find(int $id): array|false
{
    $pdo = Database::getConnection();
    $stmt = $pdo->prepare("SELECT * FROM agence WHERE id_agence = :id");
    $stmt->execute(['id' => $id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

public static function update(int $id, string $ville): bool
{
    $pdo = Database::getConnection();
    $stmt = $pdo->prepare("UPDATE agence SET ville = :ville WHERE id_agence = :id");
    return $stmt->execute(['ville' => $ville, 'id' => $id]);
}
}