<?php
namespace App\Controllers;

use App\Models\Trajet;

class TrajetController extends BaseController
{
    public function create(): void
    {
        $this->requireLogin();
        require __DIR__ . '/../Views/trajet/create.php';
    }
}