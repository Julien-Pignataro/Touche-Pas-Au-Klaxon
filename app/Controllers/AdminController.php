<?php
namespace App\Controllers;

class AdminController extends BaseController
{
    public function dashboard(): void
    {
        $this->requireAdmin();

        require __DIR__ . '/../Views/admin/dashboard.php';
    }
}