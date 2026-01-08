<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Touche pas au Klaxon</title>

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">

        <!-- Nom de l'application -->
        <a class="navbar-brand" href="index.php">
            Touche pas au Klaxon
        </a>

        <div class="collapse navbar-collapse justify-content-end">
            <ul class="navbar-nav align-items-center">

                <?php if (empty($_SESSION['user'])): ?>
                    <!-- Utilisateur non connecté -->
                    <li class="nav-item">
                        <a class="btn btn-outline-light"
                           href="index.php?controller=auth&action=login">
                            Connexion
                        </a>
                    </li>

                <?php elseif ($_SESSION['user']['role'] === 'ADMIN'): ?>
                    <!-- Administrateur -->
                    <li class="nav-item me-2">
                        <a class="nav-link" href="index.php?controller=admin&action=dashboard">
                            Tableau de bord
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger"
                           href="index.php?controller=auth&action=logout">
                            Déconnexion
                        </a>
                    </li>

                <?php else: ?>
                    <!-- Utilisateur connecté -->
                    <li class="nav-item me-3">
                        <a class="btn btn-success"
                           href="index.php?controller=trajet&action=create">
                            + Proposer un trajet
                        </a>
                    </li>
                    <li class="nav-item me-3 text-white">
                        <?= $_SESSION['user']['prenom'] ?>
                        <?= $_SESSION['user']['nom'] ?>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light"
                           href="index.php?controller=auth&action=logout">
                            Déconnexion
                        </a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>

<div class="container">