<?php
namespace App\Models;

use PDO;

/**
 * Classe Trajet
 */
class Trajet
{
    public static function getAvailableFutureTrips(): array
    {
        $pdo = Database::getConnection();

        $stmt = $pdo->prepare("
            SELECT t.*, 
                   a1.ville AS depart, 
                   a2.ville AS arrivee
            FROM trajet t
            JOIN agence a1 ON t.id_agence_depart = a1.id_agence
            JOIN agence a2 ON t.id_agence_arrivee = a2.id_agence
            WHERE t.places_disponibles > 0
              AND t.date_heure_depart > NOW()
            ORDER BY t.date_heure_depart ASC
        ");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}