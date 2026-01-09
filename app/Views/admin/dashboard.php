<?php require __DIR__ . '/../layout/header.php'; ?>

<h1>Tableau de bord administrateur</h1>

<hr>

<h2>Utilisateurs</h2>
<?php if (empty($utilisateurs)): ?>
    <p>Aucun utilisateur</p>
<?php else: ?>
    <ul>
        <?php foreach ($utilisateurs as $u): ?>
            <li><?= $u['prenom'] ?> <?= $u['nom'] ?> (<?= $u['email'] ?>)</li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<hr>

<h2>Agences</h2>
<?php if (empty($agences)): ?>
    <p>Aucune agence</p>
<?php else: ?>
    <ul>
        <?php foreach ($agences as $a): ?>
            <li><?= $a['ville'] ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<hr>

<h2>Trajets</h2>
<?php if (empty($trajets)): ?>
    <p>Aucun trajet</p>
<?php else: ?>
    <ul>
        <?php foreach ($trajets as $t): ?>
            <li>
                <?= $t['ville_depart'] ?> → <?= $t['ville_arrivee'] ?>
                (<?= $t['date_depart'] ?>)
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<?php require __DIR__ . '/../layout/footer.php'; ?>