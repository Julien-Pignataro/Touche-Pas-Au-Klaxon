<?php
namespace App\Models;

use PDO;

/**
 * Gestion des trajets
 */
class Trajet
{
    /**
     * Récupère les trajets futurs avec places disponibles
     */
    public static function getAvailableFutureTrips(): array
    {
        $pdo = Database::getConnection();

        $sql = "
            SELECT 
                t.id_trajet,
                t.date_heure_depart,
                t.date_heure_arrivee,
                t.places_total,
                t.places_disponibles,
                u.prenom,
                u.nom,
                u.email,
                u.telephone,
                a1.ville AS ville_depart,
                a2.ville AS ville_arrivee,
                u.id_utilisateur AS auteur_id
            FROM trajet t
            JOIN utilisateur u ON t.id_auteur = u.id_utilisateur
            JOIN agence a1 ON t.id_agence_depart = a1.id_agence
            JOIN agence a2 ON t.id_agence_arrivee = a2.id_agence
            WHERE t.places_disponibles > 0
              AND t.date_heure_depart > NOW()
            ORDER BY t.date_heure_depart ASC
        ";

        return $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Crée un nouveau trajet
     */
    public static function create(array $data): bool
    {
        $pdo = Database::getConnection();

        $stmt = $pdo->prepare("
            INSERT INTO trajet (
                date_heure_depart,
                date_heure_arrivee,
                places_total,
                places_disponibles,
                id_auteur,
                id_agence_depart,
                id_agence_arrivee
            ) VALUES (
                :depart,
                :arrivee,
                :places_total,
                :places_dispo,
                :auteur,
                :agence_depart,
                :agence_arrivee
            )
        ");

        return $stmt->execute([
            'depart' => $data['date_heure_depart'],
            'arrivee' => $data['date_heure_arrivee'],
            'places_total' => $data['places_total'],
            'places_dispo' => $data['places_total'],
            'auteur' => $data['id_auteur'],
            'agence_depart' => $data['id_agence_depart'],
            'agence_arrivee' => $data['id_agence_arrivee'],
        ]);
    }
}