<?php require __DIR__ . '/../layout/header.php'; ?>

<h1>Tableau de bord administrateur</h1>

<hr>

<h2>Agences</h2>

<form method="post" action="index.php?controller=admin&action=addAgence" class="row g-2 mb-3">
    <div class="col-md-6">
        <input class="form-control" name="ville" placeholder="Nouvelle agence" required>
    </div>
    <div class="col-md-2">
        <button class="btn btn-primary">Ajouter</button>
    </div>
</form>

<table class="table table-striped">
    <tr>
        <th>Ville</th>
        <th>Action</th>
    </tr>
    <?php foreach ($agences as $agence): ?>
        <tr>
            <td><?= htmlspecialchars($agence['ville']) ?></td>
            <td>
                <a href="index.php?controller=admin&action=deleteAgence&id=<?= $agence['id_agence'] ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Supprimer cette agence ?')">
                   Supprimer
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<hr>

<h2>Trajets</h2>

<table class="table table-bordered">
    <tr>
        <th>Départ</th>
        <th>Arrivée</th>
        <th>Date</th>
        <th>Action</th>
    </tr>
    <?php foreach ($trajets as $trajet): ?>
        <tr>
            <td><?= htmlspecialchars($trajet['ville_depart']) ?></td>
            <td><?= htmlspecialchars($trajet['ville_arrivee']) ?></td>
            <td><?= $trajet['date_heure_depart'] ?></td>
            <td>
                <a href="index.php?controller=admin&action=deleteTrajet&id=<?= $trajet['id_trajet'] ?>"
                   class="btn btn-danger btn-sm"
                   onclick="return confirm('Supprimer ce trajet ?')">
                   Supprimer
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php require __DIR__ . '/../layout/footer.php'; ?>