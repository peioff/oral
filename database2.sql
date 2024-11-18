
-- Création de la base de donnée
CREATE DATABASE IF NOT EXISTS ARCADIA;
-- Définition de l'usage de la base de données
USE ARCADIA;
-- Création des utilisateurs
-- Ces identifiants seront ceux utilisés depuis PHP avec PDO pour éviter l'utilisation de ROOT
CREATE USER IF NOT EXISTS 'databaseUser' IDENTIFIED BY 'Str0nGP4ssw0rD!';
-- Attribution des privilèges en lecture et en écriture à l'utilisateur
GRANT SELECT ON * TO databaseUser;
GRANT INSERT ON * TO databaseUser;
GRANT UPDATE ON * TO databaseUser;
GRANT DELETE ON * TO databaseUser;
-- Création de la table 'users'
CREATE TABLE IF NOT EXISTS users
(
    `user_id`               INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `role`                  VARCHAR(50)         NOT NULL,
    `username`              VARCHAR(50)         NOT NULL,
    `password`              VARCHAR(255)        NOT NULL,
    `firstname`             VARCHAR(50)         NOT NULL,
    `lastname`              VARCHAR(50)         NOT NULL,
    `email`                 VARCHAR(50)         NOT NULL
);
-- Création de la table 'animals'
CREATE TABLE IF NOT EXISTS animals
(
    `animal_id`         INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    `name`              VARCHAR(50)         NOT NULL,
    `species`           VARCHAR(50)         NOT NULL,
    `living`            VARCHAR(50)         NOT NULL,
    `image_id`          INT(5)              NOT NULL DEFAULT 0,
    `score`             INT(5)              NOT NULL DEFAULT 0
);
-- Insertion de données
-- Insertion de trois utilisateurs dans la table users
INSERT INTO users (role,username,password,firstname,lastname,email)
VALUES ('admin','StudiJose','$2y$10$dQXrRLAgUCPilCSSeeJJmONcfE4Bjjx/rkPR4rboZb.zraWpYFrpi','José','Studi','contact@arcadia.fr');
INSERT INTO users (role,username,password,firstname,lastname,email)
VALUES ('employee','OffP','$2y$10$imMGJ/dSD/uXGshw.0b5ieH8ygUjDI5BIa.bC4eHDUf1SavKtcofO','Pierre','Officialdeguy','p.off@gmail.com');
INSERT INTO users (role,username,password,firstname,lastname,email)
VALUES ('veterinary','JohnDoe','$2y$10$vdUzMPWwyuS9j4G3auNQ3u6SkX6hWUKGQoqXySA.zpIwNbK6gCcYa','John','Doe','jd@gmail.com');
-- Insertion de trois animaux dans la table animals
INSERT INTO animals(name, species, living, image_id, score)
VALUE ('foxyTheFox','canidé','La foret',0,0);
INSERT INTO animals(name, species, living, image_id, score)
    VALUE ('wolfy','canidé','La foret',0,0);
INSERT INTO animals(name, species, living, image_id, score)
    VALUE ('zebra','canidé','La savane',0,0);




