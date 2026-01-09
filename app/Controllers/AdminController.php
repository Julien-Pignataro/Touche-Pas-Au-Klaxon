<?php
namespace App\Controllers;

use App\Models\Agence;
use App\Models\Trajet;
use App\Models\Utilisateur;

class AdminController extends BaseController
{
    public function dashboard(): void
{
    $this->requireAdmin();

    $utilisateurs = \App\Models\Utilisateur::all();
    $agences = \App\Models\Agence::all();
    $trajets = \App\Models\Trajet::getAvailableFutureTrips();

    require __DIR__ . '/../Views/admin/dashboard.php';
}

    public function addAgence(): void
    {
        $this->requireAdmin();

        if (!empty($_POST['ville'])) {
            Agence::create($_POST['ville']);
        }

        header('Location: index.php?controller=admin&action=dashboard');
        exit;
    }

    public function deleteAgence(): void
    {
        $this->requireAdmin();

        if (!empty($_GET['id'])) {
            Agence::delete((int) $_GET['id']);
        }

        header('Location: index.php?controller=admin&action=dashboard');
        exit;
    }

    public function deleteTrajet(): void
    {
        $this->requireAdmin();

        if (!empty($_GET['id'])) {
            Trajet::delete((int) $_GET['id']);
        }

        header('Location: index.php?controller=admin&action=dashboard');
        exit;
    }
    public function editAgence(): void
{
    $this->requireAdmin();

    if (empty($_GET['id'])) {
        header('Location: index.php?controller=admin&action=dashboard');
        exit;
    }

    $agence = Agence::find((int) $_GET['id']);
    require __DIR__ . '/../Views/admin/edit_agence.php';
}

public function updateAgence(): void
{
    $this->requireAdmin();

    if (!empty($_POST['ville']) && !empty($_GET['id'])) {
        Agence::update((int) $_GET['id'], $_POST['ville']);
    }

    header('Location: index.php?controller=admin&action=dashboard');
    exit;
}
}