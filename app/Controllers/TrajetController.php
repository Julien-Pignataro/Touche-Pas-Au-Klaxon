<?php
namespace App\Controllers;

use App\Models\Trajet;

class TrajetController
{
    public function index(): void
    {
        $trajets = Trajet::getAvailableFutureTrips();
        require __DIR__ . '/../Views/trajet/index.php';
    }
}