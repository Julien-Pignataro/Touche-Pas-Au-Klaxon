<?php require __DIR__ . '/../layout/header.php'; ?>

<h1 class="mb-4">Proposer un trajet</h1>

<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<form method="post" class="row g-3">

    <!-- Infos utilisateur (non modifiables) -->
    <div class="col-md-6">
        <label class="form-label">Conducteur</label>
        <input class="form-control" value="<?= $_SESSION['user']['prenom'].' '.$_SESSION['user']['nom'] ?>" disabled>
    </div>
    <div class="col-md-6">
        <label class="form-label">Email</label>
        <input class="form-control" value="<?= $_SESSION['user']['email'] ?>" disabled>
    </div>

    <!-- Agences -->
    <div class="col-md-6">
        <label class="form-label">Agence de départ</label>
        <select name="id_agence_depart" class="form-select" required>
            <?php foreach ($agences as $agence): ?>
                <option value="<?= $agence['id_agence'] ?>">
                    <?= htmlspecialchars($agence['ville']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="col-md-6">
        <label class="form-label">Agence d’arrivée</label>
        <select name="id_agence_arrivee" class="form-select" required>
            <?php foreach ($agences as $agence): ?>
                <option value="<?= $agence['id_agence'] ?>">
                    <?= htmlspecialchars($agence['ville']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Dates -->
    <div class="col-md-6">
        <label class="form-label">Date & heure de départ</label>
        <input type="datetime-local" name="date_heure_depart" class="form-control" required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Date & heure d’arrivée</label>
        <input type="datetime-local" name="date_heure_arrivee" class="form-control" required>
    </div>

    <!-- Places -->
    <div class="col-md-4">
        <label class="form-label">Nombre de places</label>
        <input type="number" name="places_total" class="form-control" min="1" required>
    </div>

    <div class="col-12">
        <button class="btn btn-success">Créer le trajet</button>
        <a href="index.php" class="btn btn-secondary">Annuler</a>
    </div>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>