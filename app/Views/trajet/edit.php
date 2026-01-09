<?php require __DIR__ . '/../layout/header.php'; ?>

<h1>Modifier le trajet</h1>

<form method="post"
      action="index.php?controller=trajet&action=update&id=<?= $trajet['id_trajet'] ?>"
      class="row g-3">

    <div class="col-md-6">
        <label class="form-label">Départ</label>
        <input type="datetime-local" name="date_heure_depart"
               class="form-control"
               value="<?= date('Y-m-d\TH:i', strtotime($trajet['date_heure_depart'])) ?>"
               required>
    </div>

    <div class="col-md-6">
        <label class="form-label">Arrivée</label>
        <input type="datetime-local" name="date_heure_arrivee"
               class="form-control"
               value="<?= date('Y-m-d\TH:i', strtotime($trajet['date_heure_arrivee'])) ?>"
               required>
    </div>

    <div class="col-md-4">
        <label class="form-label">Places</label>
        <input type="number" name="places_total"
               class="form-control"
               min="1"
               value="<?= $trajet['places_total'] ?>"
               required>
    </div>

    <div class="col-12">
        <button class="btn btn-primary">Enregistrer</button>
        <a href="index.php" class="btn btn-secondary">Annuler</a>
    </div>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>