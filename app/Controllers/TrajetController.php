<?php
namespace App\Controllers;

use App\Models\Trajet;
use App\Models\Agence;

class TrajetController extends BaseController
{
    /**
     * Page d'accueil : liste des trajets
     */
    public function index(): void
    {
        $trajets = Trajet::getAvailableFutureTrips();
        require __DIR__ . '/../Views/trajet/index.php';
    }

    /**
     * Création d'un trajet
     */
    public function create(): void
    {
        $this->requireLogin();

        $agences = Agence::all();
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $depart = $_POST['id_agence_depart'] ?? '';
            $arrivee = $_POST['id_agence_arrivee'] ?? '';
            $dateDepart = $_POST['date_heure_depart'] ?? '';
            $dateArrivee = $_POST['date_heure_arrivee'] ?? '';
            $places = (int) ($_POST['places_total'] ?? 0);

            if (empty($depart) || empty($arrivee)) {
                $errors[] = "Veuillez sélectionner une agence de départ et une agence d’arrivée.";
            }

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

                // 🔥 REDIRECTION EXPLICITE (IMPORTANT)
                header('Location: index.php?controller=trajet&action=index');
                exit;
            }
        }

        require __DIR__ . '/../Views/trajet/create.php';
    }
    public function edit(): void
{
    $this->requireLogin();

    if (empty($_GET['id'])) {
        header('Location: index.php');
        exit;
    }

    $trajet = Trajet::find((int) $_GET['id']);
    $agences = Agence::all();

    if (!$trajet) {
        header('Location: index.php');
        exit;
    }

    require __DIR__ . '/../Views/trajet/edit.php';
}

public function update(): void
{
    $this->requireLogin();

    if (empty($_GET['id']) || $_SERVER['REQUEST_METHOD'] !== 'POST') {
        header('Location: index.php');
        exit;
    }

    Trajet::update((int) $_GET['id'], [
        'date_heure_depart' => $_POST['date_heure_depart'],
        'date_heure_arrivee' => $_POST['date_heure_arrivee'],
        'places_total' => (int) $_POST['places_total']
    ]);

    header('Location: index.php');
    exit;
}
}