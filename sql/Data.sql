SET foreign_key_checks = 0;

DELETE FROM Personne;
DELETE FROM Enseignant;
DELETE FROM Etudiant;
DELETE FROM Annee;
DELETE FROM Diplome;
DELETE FROM Departement;

START TRANSACTION;

ALTER TABLE `Personne` CHANGE `updated_at` `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;
ALTER TABLE `Personne` CHANGE `created_at` `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP;


INSERT INTO `Personne` (`id`, `login`, `password`, `nom`, `prenom`, `tel`, `email`, `code_postal`, `ville`, `adresse`, `remember_token`, `created_at`, `updated_at`, `admin`, `code_professeur`, `code_etudiant`) VALUES
  (1, 'etu', '$2y$10$YUV3bcd.JwBk/ci29kjXhucPfeQV1NC48GSdRE0xbk8e5LG1FWWCW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ZMJx9PiZSOeEsU6sWBdyOpyTPtJ0gA5bRRXHu5kXElT4qVxHMwB6utplZyK3', '2018-01-28 16:00:17', '2018-01-28 16:00:17', 0, NULL, NULL),
  (2, 'admin', '$2y$10$YUV3bcd.JwBk/ci29kjXhucPfeQV1NC48GSdRE0xbk8e5LG1FWWCW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rwVdvEgmC6jvkA5ku7DiRXC7GmuPOwSZ6J4tfZZVFT8OLoau1n8cQa05zMAl', '2018-01-28 15:01:07', '2018-01-28 15:01:07', 1, NULL, NULL),
  (3, 'ens', '$2y$10$YUV3bcd.JwBk/ci29kjXhucPfeQV1NC48GSdRE0xbk8e5LG1FWWCW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-28 16:03:17', '2018-01-28 16:03:17', 0, NULL, NULL);


INSERT INTO `Enseignant` (`code_professeur`, `id`) VALUES
(1, 3);

INSERT INTO `Etudiant` (`code_etudiant`, `id_annee`, `id`) VALUES
(1, NULL, 1);


UPDATE Personne SET code_etudiant = 1 WHERE id = 1;
UPDATE Personne SET code_professeur = 1 WHERE id = 2;


INSERT INTO UFR (libelle) VALUE ('Science et technique');
INSERT INTO Departement (libelle, id_departement) VALUE  ('Informatique', 1);
INSERT INTO Diplome (libelle, id_departement) VALUE ('MASTER S2I', 1);
INSERT INTO Diplome (libelle, id_departement) VALUE ('LICENCE', 1);
INSERT INTO Annee (libelle, id_diplome) VALUE ('1ere', 1);
INSERT INTO Annee (libelle, id_diplome) VALUE ('2eme', 1);

INSERT INTO Annee (libelle, id_diplome) VALUE ('1ere', 2);
INSERT INTO Annee (libelle, id_diplome) VALUE ('2eme', 2);
INSERT INTO Annee (libelle, id_diplome) VALUE ('3eme', 2);

COMMIT ;

SET foreign_key_checks = 1;

