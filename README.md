# Touche pas au klaxon 🚗

Application web de covoiturage interne développée en **PHP (MVC)** avec **MySQL** et **Bootstrap**.  
Le projet propose la gestion des trajets entre agences, avec un espace administrateur sécurisé.

---

## 📌 Fonctionnalités

### Utilisateur
- Consultation des trajets disponibles
- Création d’un trajet
- Modification d’un trajet
- Suppression d’un trajet (si autorisé)
- Authentification (session)

### Administrateur
- Accès sécurisé au tableau de bord
- Liste des utilisateurs
- Liste des agences
- Création / modification / suppression d’agences
- Liste des trajets
- Suppression des trajets

---

## 🧱 Architecture

Le projet respecte une architecture **MVC** :

```
touche-pas-au-klaxon/
├── app/
│   ├── Controllers/
│   ├── Models/
│   └── Views/
├── public/
│   └── index.php
├── tests/
├── vendor/
├── composer.json
└── README.md
```

- **Model** : accès aux données (PDO)
- **View** : affichage (HTML / Bootstrap)
- **Controller** : logique applicative
- **Front controller** : `public/index.php`

---

## 🛠️ Technologies utilisées

- PHP 8.x
- MySQL (XAMPP)
- Bootstrap 5
- Composer
- PHPUnit

---

## ⚙️ Installation

### 1️⃣ Prérequis
- XAMPP (Apache + MySQL)
- PHP ≥ 8.0
- Composer

### 2️⃣ Cloner le projet
```bash
git clone <https://github.com/Julien-Pignataro/Touche-Pas-Au-Klaxon>
```

### 3️⃣ Installer les dépendances
```bash
composer install
```

### 4️⃣ Configuration de la base de données
Créer une base MySQL nommée par exemple :
```
covoiturage_intranet
```

Configurer la connexion dans :
```
app/Models/Database.php
```

### 5️⃣ Lancer le projet
```
http://localhost/touche-pas-au-klaxon/public/index.php
```

---

## 🔐 Accès administrateur

Un champ `is_admin` est présent dans la table `utilisateur`.

Exemple SQL :
```sql
ALTER TABLE utilisateur ADD is_admin TINYINT(1) DEFAULT 0;
UPDATE utilisateur SET is_admin = 1 WHERE email = 'admin@email.fr';
```

---

## 🧪 Tests

Les tests unitaires sont réalisés avec **PHPUnit**.

Lancement :
```bash
vendor/bin/phpunit
```

> Les tests dépendants de la base de données peuvent être désactivés dans un environnement local.

---

## ✅ Sécurité

- Accès administrateur protégé
- Vérification des actions via le contrôleur
- Validation des données côté serveur
- Requêtes préparées (PDO)

---

## 🎓 Projet pédagogique

Ce projet a été réalisé dans un cadre pédagogique afin de démontrer :
- La mise en place d’un MVC en PHP
- La gestion des rôles utilisateurs
- La manipulation de données via PDO
- La sécurisation d’un back-office
- L’écriture de tests unitaires

---

## 👤 Auteur

**Julien Pignataro**

---

## 📄 Licence

Projet à usage pédagogique.