/* Insertion des données dans la table Utilisateur */

INSERT INTO utilisateur (nom, prenom, telephone, email, mot_de_passe, role) VALUES
('Martin','Alexandre','0612345678','alexandre.martin@email.fr','password','ADMIN'),
('Dubois','Sophie','0698765432','sophie.dubois@email.fr','password','USER'),
('Bernard','Julien','0622446688','julien.bernard@email.fr','password','USER'),
('Moreau','Camille','0611223344','camille.moreau@email.fr','password','USER'),
('Lefèvre','Lucie','0777889900','lucie.lefevre@email.fr','password','USER'),
('Leroy','Thomas','0655443322','thomas.leroy@email.fr','password','USER'),
('Roux','Chloé','0633221199','chloe.roux@email.fr','password','USER'),
('Petit','Maxime','0766778899','maxime.petit@email.fr','password','USER'),
('Garnier','Laura','0688776655','laura.garnier@email.fr','password','USER'),
('Dupuis','Antoine','0744556677','antoine.dupuis@email.fr','password','USER'),
('Lefebvre','Emma','0699887766','emma.lefebvre@email.fr','password','USER'),
('Fontaine','Louis','0655667788','louis.fontaine@email.fr','password','USER'),
('Chevalier','Clara','0788990011','clara.chevalier@email.fr','password','USER'),
('Robin','Nicolas','0644332211','nicolas.robin@email.fr','password','USER'),
('Gauthier','Marine','0677889922','marine.gauthier@email.fr','password','USER'),
('Fournier','Pierre','0722334455','pierre.fournier@email.fr','password','USER'),
('Girard','Sarah','0688665544','sarah.girard@email.fr','password','USER'),
('Lambert','Hugo','0611223366','hugo.lambert@email.fr','password','USER'),
('Masson','Julie','0733445566','julie.masson@email.fr','password','USER'),
('Henry','Arthur','0666554433','arthur.henry@email.fr','password','USER');

/* Insertion des données dans la table Agence */

INSERT INTO agence (ville) VALUES
('Paris'),
('Lyon'),
('Marseille'),
('Toulouse'),
('Nice'),
('Nantes'),
('Strasbourg'),
('Montpellier'),
('Bordeaux'),
('Lille'),
('Rennes'),
('Reims');