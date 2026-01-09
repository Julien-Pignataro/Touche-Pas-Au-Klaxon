<?php require __DIR__ . '/../layout/header.php'; ?>

<h1>Modifier l’agence</h1>

<form method="post"
      action="index.php?controller=admin&action=updateAgence&id=<?= $agence['id_agence'] ?>"
      class="row g-3">

    <div class="col-md-6">
        <input class="form-control"
               name="ville"
               value="<?= htmlspecialchars($agence['ville']) ?>"
               required>
    </div>

    <div class="col-md-2">
        <button class="btn btn-primary">Enregistrer</button>
        <a href="index.php?controller=admin&action=dashboard"
           class="btn btn-secondary">Annuler</a>
    </div>
</form>

<?php require __DIR__ . '/../layout/footer.php'; ?>