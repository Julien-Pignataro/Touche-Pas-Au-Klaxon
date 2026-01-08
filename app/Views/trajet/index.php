<?php require __DIR__ . '/../layout/header.php'; ?>

<h1 class="mb-4">Trajets disponibles</h1>

<?php if (empty($trajets)): ?>
    <div class="alert alert-info">
        Aucun trajet disponible pour le moment.
    </div>
<?php else: ?>
    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark">
            <tr>
                <th>Départ</th>
                <th>Date départ</th>
                <th>Arrivée</th>
                <th>Date arrivée</th>
                <th>Places dispo</th>
                <?php if (!empty($_SESSION['user'])): ?>
                    <th>Actions</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($trajets as $trajet): ?>
            <tr>
                <td><?= htmlspecialchars($trajet['ville_depart']) ?></td>
                <td><?= date('d/m/Y H:i', strtotime($trajet['date_heure_depart'])) ?></td>
                <td><?= htmlspecialchars($trajet['ville_arrivee']) ?></td>
                <td><?= date('d/m/Y H:i', strtotime($trajet['date_heure_arrivee'])) ?></td>
                <td>
                    <span class="badge bg-success">
                        <?= $trajet['places_disponibles'] ?>
                    </span>
                </td>

                <?php if (!empty($_SESSION['user'])): ?>
                    <td>
                        <!-- Bouton détails -->
                        <button
                            class="btn btn-primary btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#modal<?= $trajet['id_trajet'] ?>">
                            Détails
                        </button>

                        <!-- Boutons auteur -->
                        <?php if ($_SESSION['user']['id'] === $trajet['auteur_id']): ?>
                            <a href="index.php?controller=trajet&action=edit&id=<?= $trajet['id_trajet'] ?>"
                               class="btn btn-warning btn-sm">
                                Modifier
                            </a>

                            <a href="index.php?controller=trajet&action=delete&id=<?= $trajet['id_trajet'] ?>"
                               class="btn btn-danger btn-sm"
                               onclick="return confirm('Supprimer ce trajet ?');">
                                Supprimer
                            </a>
                        <?php endif; ?>
                    </td>
                <?php endif; ?>
            </tr>

            <!-- MODAL DÉTAILS -->
            <div class="modal fade" id="modal<?= $trajet['id_trajet'] ?>" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title">Détails du trajet</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            <p><strong>Conducteur :</strong>
                                <?= $trajet['prenom'] ?> <?= $trajet['nom'] ?></p>
                            <p><strong>Email :</strong> <?= $trajet['email'] ?></p>
                            <p><strong>Téléphone :</strong> <?= $trajet['telephone'] ?></p>
                            <p><strong>Places totales :</strong> <?= $trajet['places_total'] ?></p>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">
                                Fermer
                            </button>
                        </div>

                    </div>
                </div>
            </div>

        <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<?php require __DIR__ . '/../layout/footer.php'; ?>