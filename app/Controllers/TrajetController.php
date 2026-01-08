<?php
namespace App\Controllers;

use App\Models\Trajet;
use App\Models\Agence;

class TrajetController extends BaseController
{
    public function create(): void
    {
        $this->requireLogin();

        $agences = Agence::all();
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $depart = $_POST['id_agence_depart'];
            $arrivee = $_POST['id_agence_arrivee'];
            $dateDepart = $_POST['date_heure_depart'];
            $dateArrivee = $_POST['date_heure_arrivee'];
            $places = (int) $_POST['places_total'];

            // VALIDATIONS
            if ($depart === $arrivee) {
                $errors[] = "L’agence de départ et d’arrivée doivent être différentes.";
            }
            if (strtotime($dateArrivee) <= strtotime($dateDepart)) {
                $errors[] = "La date d’arrivée doit être après la date de départ.";
            }
            if ($places < 1) {
                $errors[] = "Le nombre de places doit être au minimum de 1.";
            }

            if (empty($errors)) {
                Trajet::create([
                    'date_heure_depart' => $dateDepart,
                    'date_heure_arrivee' => $dateArrivee,
                    'places_total' => $places,
                    'id_auteur' => $_SESSION['user']['id'],
                    'id_agence_depart' => $depart,
                    'id_agence_arrivee' => $arrivee
                ]);

                header('Location: index.php');
                exit;
            }
        }

        require __DIR__ . '/../Views/trajet/create.php';
    }
}