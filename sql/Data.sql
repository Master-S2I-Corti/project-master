SET foreign_key_checks = 0;

DELETE FROM Personne;
DELETE FROM Enseignant;
DELETE FROM Etudiant;
DELETE FROM Annee;
DELETE FROM Filiere;
DELETE FROM Diplome;
DELETE FROM Departement;

START TRANSACTION;

INSERT INTO `Personne` (`id`, `identifiant`, `password`, `nom`, `prenom`, `tel`, `email`, `code_postal`, `ville`, `adresse`, `remember_token`, `created_at`, `updated_at`, `admin`, `code_professeur`, `code_etudiant`) VALUES
  (1, 'etu', '$2y$10$YUV3bcd.JwBk/ci29kjXhucPfeQV1NC48GSdRE0xbk8e5LG1FWWCW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ZMJx9PiZSOeEsU6sWBdyOpyTPtJ0gA5bRRXHu5kXElT4qVxHMwB6utplZyK3', '2018-01-28 16:00:17', '2018-01-28 16:00:17', 0, NULL, 1),
  (2, 'admin', '$2y$10$YUV3bcd.JwBk/ci29kjXhucPfeQV1NC48GSdRE0xbk8e5LG1FWWCW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rwVdvEgmC6jvkA5ku7DiRXC7GmuPOwSZ6J4tfZZVFT8OLoau1n8cQa05zMAl', '2018-01-28 15:01:07', '2018-01-28 15:01:07', 1, NULL, NULL),
  (3, 'ens', '$2y$10$YUV3bcd.JwBk/ci29kjXhucPfeQV1NC48GSdRE0xbk8e5LG1FWWCW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-28 16:03:17', '2018-01-28 16:03:17', 0, 1, NULL);


INSERT INTO `Enseignant` (`code_professeur`, `id_annee`, `id_diplome`, `id`) VALUES
(1, NULL, NULL, 3);

INSERT INTO `Etudiant` (`code_etudiant`, `code_groupe`, `id_annee`, `id`) VALUES
(1, NULL, NULL, 1);

INSERT INTO `responsabilite` (`id_reponsabilite`, `libellle`, `heureReducable`) VALUES
(1, 'Presidence', 192),(2, 'Vice Presidence', null),(3, 'Directeur Laboratoire', 96),(4,'Doyen', 96),(5,'Responsable Filiere', 12);

INSERT INTO Departement (libelle) VALUE ('Science et technique');
INSERT INTO Filiere (libelle, id_departement) VALUE  ('Informatique', 1);
INSERT INTO Diplome (libelle, id_filiere) VALUE ('MASTER S2I', 1);
INSERT INTO Diplome (libelle, id_filiere) VALUE ('LICENCE', 1);
INSERT INTO Annee (libelle, id_diplome) VALUE ('1', 1);
INSERT INTO Annee (libelle, id_diplome) VALUE ('2', 1);

INSERT INTO Annee (libelle, id_diplome) VALUE ('1', 2);
INSERT INTO Annee (libelle, id_diplome) VALUE ('2', 2);
INSERT INTO Annee (libelle, id_diplome) VALUE ('3', 2);

COMMIT ;

SET foreign_key_checks = 1;

