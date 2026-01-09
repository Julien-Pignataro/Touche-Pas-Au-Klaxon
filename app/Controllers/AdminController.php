<?php
namespace App\Controllers;

use App\Models\Agence;
use App\Models\Trajet;

class AdminController extends BaseController
{
    public function dashboard(): void
    {
        $this->requireAdmin();

        $agences = Agence::all();
        $trajets = Trajet::getAvailableFutureTrips();

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
}