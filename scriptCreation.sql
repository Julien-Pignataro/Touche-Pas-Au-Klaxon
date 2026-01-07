/* Création de la base de données */

CREATE DATABASE covoiturage_intranet CHARACTER SET utf8mb4;
USE covoiturage_intranet;

/* Création de la table Utilisateur */

CREATE TABLE utilisateur (
    id_utilisateur INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    telephone VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mot_de_passe VARCHAR(255) NOT NULL,
    role ENUM('USER', 'ADMIN') NOT NULL DEFAULT 'USER'
);

/* Création de la table Agence */

CREATE TABLE agence (
    id_agence INT AUTO_INCREMENT PRIMARY KEY,
    ville VARCHAR(50) NOT NULL UNIQUE
);

/* Création de la table Trajet */

CREATE TABLE trajet (
    id_trajet INT AUTO_INCREMENT PRIMARY KEY,
    date_heure_depart DATETIME NOT NULL,
    date_heure_arrivee DATETIME NOT NULL,
    places_total INT NOT NULL,
    places_disponibles INT NOT NULL,
    id_auteur INT NOT NULL,
    id_agence_depart INT NOT NULL,
    id_agence_arrivee INT NOT NULL,

    CONSTRAINT fk_trajet_auteur FOREIGN KEY (id_auteur)
        REFERENCES utilisateur(id_utilisateur),

    CONSTRAINT fk_trajet_depart FOREIGN KEY (id_agence_depart)
        REFERENCES agence(id_agence),

    CONSTRAINT fk_trajet_arrivee FOREIGN KEY (id_agence_arrivee)
        REFERENCES agence(id_agence)
);
