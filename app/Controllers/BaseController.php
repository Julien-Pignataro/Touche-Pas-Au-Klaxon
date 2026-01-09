<?php
namespace App\Controllers;

/**
 * Contrôleur de base
 * Gère la sécurité (authentification / rôles)
 */


class BaseController
{
    protected function requireLogin(): void
    {
        if (empty($_SESSION['user'])) {
            header('Location: index.php?controller=auth&action=login');
            exit;
        }
    }

    protected function requireAdmin(): void
    {
    if (empty($_SESSION['user']) || $_SESSION['user']['is_admin'] != 1) {
        header('Location: index.php');
        exit;
        }
    }
}