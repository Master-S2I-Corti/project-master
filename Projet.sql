-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Dim 28 Janvier 2018 à 17:05
-- Version du serveur :  5.7.21-0ubuntu0.16.04.1
-- Version de PHP :  7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet`
--

-- --------------------------------------------------------

--
-- Structure de la table `Annee`
--

CREATE TABLE `Annee` (
  `id_annee` int(11) NOT NULL,
  `libelle` varchar(25) DEFAULT NULL,
  `id_diplome` int(11) DEFAULT NULL,
  `code_professeur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Competence`
--

CREATE TABLE `Competence` (
  `id_competence` int(11) NOT NULL,
  `libelle` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Contrainte`
--

CREATE TABLE `Contrainte` (
  `id_contrainte` int(11) NOT NULL,
  `libelle` varchar(25) DEFAULT NULL,
  `jour_contrainte` date DEFAULT NULL,
  `heure_debut_contrainte` time DEFAULT NULL,
  `heure_fin_contrainte` time DEFAULT NULL,
  `commentaire` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Departement`
--

CREATE TABLE `Departement` (
  `id_departement` int(11) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `code_professeur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Detient`
--

CREATE TABLE `Detient` (
  `code_professeur` int(11) NOT NULL,
  `id_competence` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Diplome`
--

CREATE TABLE `Diplome` (
  `id_diplome` int(11) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `maquetteEtat` int(11) DEFAULT NULL,
  `id_filiere` int(11) DEFAULT NULL,
  `code_professeur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Enseignant`
--

CREATE TABLE `Enseignant` (
  `code_professeur` int(11) NOT NULL,
  `id_annee` int(11) DEFAULT NULL,
  `id_diplome` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Enseignant`
--

INSERT INTO `Enseignant` (`code_professeur`, `id_annee`, `id_diplome`, `id`) VALUES
(1, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Structure de la table `Etudiant`
--

CREATE TABLE `Etudiant` (
  `code_etudiant` int(11) NOT NULL,
  `code_groupe` int(11) DEFAULT NULL,
  `id_annee` int(11) DEFAULT NULL,
  `id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Etudiant`
--

INSERT INTO `Etudiant` (`code_etudiant`, `code_groupe`, `id_annee`, `id`) VALUES
(1, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Structure de la table `Evaluations`
--

CREATE TABLE `Evaluations` (
  `id_evaluation` int(11) NOT NULL,
  `coeff` int(11) DEFAULT NULL,
  `type` varchar(25) DEFAULT NULL,
  `code_professeur` int(11) DEFAULT NULL,
  `id_matiere` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Filiere`
--

CREATE TABLE `Filiere` (
  `id_filiere` int(11) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `id_departement` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Groupe`
--

CREATE TABLE `Groupe` (
  `code_groupe` int(11) NOT NULL,
  `lib` varchar(25) DEFAULT NULL,
  `id_annee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Logiciel`
--

CREATE TABLE `Logiciel` (
  `id_logiciel` int(11) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `licence` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Materiel`
--

CREATE TABLE `Materiel` (
  `id_materiel` int(11) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Matiere`
--

CREATE TABLE `Matiere` (
  `id_matiere` varchar(25) NOT NULL,
  `libelle` varchar(50) DEFAULT NULL,
  `description` varchar(25) DEFAULT NULL,
  `plan` text,
  `coeff` int(11) DEFAULT NULL,
  `cours` int(11) DEFAULT NULL,
  `td` int(11) DEFAULT NULL,
  `tp` int(11) DEFAULT NULL,
  `id_ue` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Note`
--

CREATE TABLE `Note` (
  `code_etudiant` int(11) NOT NULL,
  `id_evaluation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Personne`
--

CREATE TABLE `Personne` (
  `id` int(11) NOT NULL,
  `identifiant` varchar(25) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `tel` varchar(25) DEFAULT NULL,
  `mail` varchar(25) DEFAULT NULL,
  `code_postal` varchar(25) DEFAULT NULL,
  `ville` varchar(25) DEFAULT NULL,
  `adresse` varchar(25) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `code_professeur` int(11) DEFAULT NULL,
  `code_etudiant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Personne`
--

INSERT INTO `Personne` (`id`, `identifiant`, `password`, `nom`, `prenom`, `tel`, `mail`, `code_postal`, `ville`, `adresse`, `remember_token`, `created_at`, `updated_at`, `admin`, `code_professeur`, `code_etudiant`) VALUES
(1, 'etu', '$2y$10$YUV3bcd.JwBk/ci29kjXhucPfeQV1NC48GSdRE0xbk8e5LG1FWWCW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ZMJx9PiZSOeEsU6sWBdyOpyTPtJ0gA5bRRXHu5kXElT4qVxHMwB6utplZyK3', '2018-01-28 16:00:17', '2018-01-28 16:00:17', 0, NULL, 1),
(2, 'admin', '$2y$10$YUV3bcd.JwBk/ci29kjXhucPfeQV1NC48GSdRE0xbk8e5LG1FWWCW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rwVdvEgmC6jvkA5ku7DiRXC7GmuPOwSZ6J4tfZZVFT8OLoau1n8cQa05zMAl', '2018-01-28 15:01:07', '2018-01-28 15:01:07', 1, NULL, NULL),
(3, 'ens', '$2y$10$YUV3bcd.JwBk/ci29kjXhucPfeQV1NC48GSdRE0xbk8e5LG1FWWCW', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2018-01-28 16:03:17', '2018-01-28 16:03:17', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `Possede`
--

CREATE TABLE `Possede` (
  `id_contrainte` int(11) NOT NULL,
  `code_professeur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Possede_Logiciel`
--

CREATE TABLE `Possede_Logiciel` (
  `id_salle` int(11) NOT NULL,
  `id_logiciel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Possede_Salle`
--

CREATE TABLE `Possede_Salle` (
  `id_salle` int(11) NOT NULL,
  `id_materiel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Salle`
--

CREATE TABLE `Salle` (
  `id_salle` int(11) NOT NULL,
  `location` varchar(25) DEFAULT NULL,
  `capacite` int(11) DEFAULT NULL,
  `id_seance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Seance`
--

CREATE TABLE `Seance` (
  `id_seance` int(11) NOT NULL,
  `type` varchar(25) DEFAULT NULL,
  `heure_debut` datetime DEFAULT NULL,
  `heure_fin` datetime DEFAULT NULL,
  `date_seance` date DEFAULT NULL,
  `id_matiere` varchar(25) DEFAULT NULL,
  `id_salle` int(11) DEFAULT NULL,
  `code_professeur` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `Semestre`
--

CREATE TABLE `Semestre` (
  `id_semestre` varchar(25) NOT NULL,
  `libelle` varchar(25) DEFAULT NULL,
  `id_annee` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `UE`
--

CREATE TABLE `UE` (
  `id_ue` varchar(25) NOT NULL,
  `libelle` varchar(25) DEFAULT NULL,
  `description` text,
  `coeff` int(11) DEFAULT NULL,
  `id_semestre` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Annee`
--
ALTER TABLE `Annee`
  ADD PRIMARY KEY (`id_annee`),
  ADD KEY `FK_Annee_id_diplome` (`id_diplome`),
  ADD KEY `FK_Annee_code_professeur` (`code_professeur`);

--
-- Index pour la table `Competence`
--
ALTER TABLE `Competence`
  ADD PRIMARY KEY (`id_competence`);

--
-- Index pour la table `Contrainte`
--
ALTER TABLE `Contrainte`
  ADD PRIMARY KEY (`id_contrainte`);

--
-- Index pour la table `Departement`
--
ALTER TABLE `Departement`
  ADD PRIMARY KEY (`id_departement`);

--
-- Index pour la table `Detient`
--
ALTER TABLE `Detient`
  ADD PRIMARY KEY (`code_professeur`,`id_competence`),
  ADD KEY `FK_Detient_id_competence` (`id_competence`);

--
-- Index pour la table `Diplome`
--
ALTER TABLE `Diplome`
  ADD PRIMARY KEY (`id_diplome`),
  ADD KEY `FK_Diplome_id_filiere` (`id_filiere`),
  ADD KEY `FK_Diplome_code_professeur` (`code_professeur`);


--
-- Index pour la table `Enseignant`
--
ALTER TABLE `Enseignant`
  ADD PRIMARY KEY (`code_professeur`),
  ADD KEY `FK_Enseignant_id_annee` (`id_annee`),
  ADD KEY `FK_Enseignant_id_diplome` (`id_diplome`),
  ADD KEY `FK_Enseignant_id` (`id`);

--
-- Index pour la table `Etudiant`
--
ALTER TABLE `Etudiant`
  ADD PRIMARY KEY (`code_etudiant`),
  ADD KEY `FK_Etudiant_code_groupe` (`code_groupe`),
  ADD KEY `FK_Etudiant_id_annee` (`id_annee`),
  ADD KEY `FK_Etudiant_id` (`id`);

--
-- Index pour la table `Evaluations`
--
ALTER TABLE `Evaluations`
  ADD PRIMARY KEY (`id_evaluation`),
  ADD KEY `FK_Evaluations_code_professeur` (`code_professeur`),
  ADD KEY `FK_Evaluations_id_matiere` (`id_matiere`);

--
-- Index pour la table `Filiere`
--
ALTER TABLE `Filiere`
  ADD PRIMARY KEY (`id_filiere`),
  ADD KEY `FK_Filiere_id_departement` (`id_departement`);

--
-- Index pour la table `Groupe`
--
ALTER TABLE `Groupe`
  ADD PRIMARY KEY (`code_groupe`),
  ADD KEY `FK_Groupe_id_annee` (`id_annee`);

--
-- Index pour la table `Logiciel`
--
ALTER TABLE `Logiciel`
  ADD PRIMARY KEY (`id_logiciel`);

--
-- Index pour la table `Materiel`
--
ALTER TABLE `Materiel`
  ADD PRIMARY KEY (`id_materiel`);

--
-- Index pour la table `Matiere`
--
ALTER TABLE `Matiere`
  ADD PRIMARY KEY (`id_matiere`),
  ADD KEY `FK_Matiere_id_ue` (`id_ue`);

--
-- Index pour la table `Note`
--
ALTER TABLE `Note`
  ADD PRIMARY KEY (`code_etudiant`,`id_evaluation`),
  ADD KEY `FK_Note_id_evaluation` (`id_evaluation`);

--
-- Index pour la table `Personne`
--
ALTER TABLE `Personne`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Personne_code_professeur` (`code_professeur`),
  ADD KEY `FK_Personne_code_etudiant` (`code_etudiant`);

--
-- Index pour la table `Possede`
--
ALTER TABLE `Possede`
  ADD PRIMARY KEY (`id_contrainte`,`code_professeur`),
  ADD KEY `FK_Possede_code_professeur` (`code_professeur`);

--
-- Index pour la table `Possede_Logiciel`
--
ALTER TABLE `Possede_Logiciel`
  ADD PRIMARY KEY (`id_salle`,`id_logiciel`),
  ADD KEY `FK_Possede_Logiciel_id_logiciel` (`id_logiciel`);

--
-- Index pour la table `Possede_Salle`
--
ALTER TABLE `Possede_Salle`
  ADD PRIMARY KEY (`id_salle`,`id_materiel`),
  ADD KEY `FK_Possede_Salle_id_materiel` (`id_materiel`);

--
-- Index pour la table `Salle`
--
ALTER TABLE `Salle`
  ADD PRIMARY KEY (`id_salle`),
  ADD KEY `FK_Salle_id_seance` (`id_seance`);

--
-- Index pour la table `Seance`
--
ALTER TABLE `Seance`
  ADD PRIMARY KEY (`id_seance`),
  ADD KEY `FK_Seance_id_matiere` (`id_matiere`),
  ADD KEY `FK_Seance_id_salle` (`id_salle`),
  ADD KEY `FK_Seance_code_professeur` (`code_professeur`);

--
-- Index pour la table `Semestre`
--
ALTER TABLE `Semestre`
  ADD PRIMARY KEY (`id_semestre`),
  ADD KEY `FK_Semestre_id_annee` (`id_annee`);

--
-- Index pour la table `UE`
--
ALTER TABLE `UE`
  ADD PRIMARY KEY (`id_ue`),
  ADD KEY `FK_UE_id_semestre` (`id_semestre`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Annee`
--
ALTER TABLE `Annee`
  MODIFY `id_annee` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Departement`
--
ALTER TABLE `Departement`
  MODIFY `id_departement` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Diplome`
--
ALTER TABLE `Diplome`
  MODIFY `id_diplome` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Evaluations`
--
ALTER TABLE `Evaluations`
  MODIFY `id_evaluation` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Filiere`
--
ALTER TABLE `Filiere`
  MODIFY `id_filiere` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Groupe`
--
ALTER TABLE `Groupe`
  MODIFY `code_groupe` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Logiciel`
--
ALTER TABLE `Logiciel`
  MODIFY `id_logiciel` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Materiel`
--
ALTER TABLE `Materiel`
  MODIFY `id_materiel` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Personne`
--
ALTER TABLE `Personne`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `Salle`
--
ALTER TABLE `Salle`
  MODIFY `id_salle` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `Seance`
--
ALTER TABLE `Seance`
  MODIFY `id_seance` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Annee`
--
ALTER TABLE `Annee`
  ADD CONSTRAINT `FK_Annee_code_professeur` FOREIGN KEY (`code_professeur`) REFERENCES `Enseignant` (`code_professeur`),
  ADD CONSTRAINT `FK_Annee_id_diplome` FOREIGN KEY (`id_diplome`) REFERENCES `Diplome` (`id_diplome`);

--
-- Contraintes pour la table `Detient`
--
ALTER TABLE `Detient`
  ADD CONSTRAINT `FK_Detient_code_professeur` FOREIGN KEY (`code_professeur`) REFERENCES `Enseignant` (`code_professeur`),
  ADD CONSTRAINT `FK_Detient_id_competence` FOREIGN KEY (`id_competence`) REFERENCES `Competence` (`id_competence`);

--
-- Contraintes pour la table `Diplome`
--
ALTER TABLE `Diplome`
  ADD CONSTRAINT `FK_Diplome_id_filiere` FOREIGN KEY (`id_filiere`) REFERENCES `Filiere` (`id_filiere`),
  ADD CONSTRAINT `FK_Diplome_code_professeur` FOREIGN KEY (`code_professeur`) REFERENCES `Enseignant` (`code_professeur`);


--
-- Contraintes pour la table `Enseignant`
--
ALTER TABLE `Enseignant`
  ADD CONSTRAINT `FK_Enseignant_id` FOREIGN KEY (`id`) REFERENCES `Personne` (`id`),
  ADD CONSTRAINT `FK_Enseignant_id_annee` FOREIGN KEY (`id_annee`) REFERENCES `Annee` (`id_annee`),
  ADD CONSTRAINT `FK_Enseignant_id_diplome` FOREIGN KEY (`id_diplome`) REFERENCES `Diplome` (`id_diplome`);

--
-- Contraintes pour la table `Etudiant`
--
ALTER TABLE `Etudiant`
  ADD CONSTRAINT `FK_Etudiant_code_groupe` FOREIGN KEY (`code_groupe`) REFERENCES `Groupe` (`code_groupe`),
  ADD CONSTRAINT `FK_Etudiant_id` FOREIGN KEY (`id`) REFERENCES `Personne` (`id`),
  ADD CONSTRAINT `FK_Etudiant_id_annee` FOREIGN KEY (`id_annee`) REFERENCES `Annee` (`id_annee`);

--
-- Contraintes pour la table `Evaluations`
--
ALTER TABLE `Evaluations`
  ADD CONSTRAINT `FK_Evaluations_code_professeur` FOREIGN KEY (`code_professeur`) REFERENCES `Enseignant` (`code_professeur`),
  ADD CONSTRAINT `FK_Evaluations_id_matiere` FOREIGN KEY (`id_matiere`) REFERENCES `Matiere` (`id_matiere`);

--
-- Contraintes pour la table `Filiere`
--
ALTER TABLE `Filiere`
  ADD CONSTRAINT `FK_Filiere_id_departement` FOREIGN KEY (`id_departement`) REFERENCES `Departement` (`id_departement`);

--
-- Contraintes pour la table `Groupe`
--
ALTER TABLE `Groupe`
  ADD CONSTRAINT `FK_Groupe_id_annee` FOREIGN KEY (`id_annee`) REFERENCES `Annee` (`id_annee`);

--
-- Contraintes pour la table `Matiere`
--
ALTER TABLE `Matiere`
  ADD CONSTRAINT `FK_Matiere_id_ue` FOREIGN KEY (`id_ue`) REFERENCES `UE` (`id_ue`);

--
-- Contraintes pour la table `Note`
--
ALTER TABLE `Note`
  ADD CONSTRAINT `FK_Note_code_etudiant` FOREIGN KEY (`code_etudiant`) REFERENCES `Etudiant` (`code_etudiant`),
  ADD CONSTRAINT `FK_Note_id_evaluation` FOREIGN KEY (`id_evaluation`) REFERENCES `Evaluations` (`id_evaluation`);

--
-- Contraintes pour la table `Personne`
--
ALTER TABLE `Personne`
  ADD CONSTRAINT `FK_Personne_code_etudiant` FOREIGN KEY (`code_etudiant`) REFERENCES `Etudiant` (`code_etudiant`),
  ADD CONSTRAINT `FK_Personne_code_professeur` FOREIGN KEY (`code_professeur`) REFERENCES `Enseignant` (`code_professeur`);

--
-- Contraintes pour la table `Possede`
--
ALTER TABLE `Possede`
  ADD CONSTRAINT `FK_Possede_code_professeur` FOREIGN KEY (`code_professeur`) REFERENCES `Enseignant` (`code_professeur`),
  ADD CONSTRAINT `FK_Possede_id_contrainte` FOREIGN KEY (`id_contrainte`) REFERENCES `Contrainte` (`id_contrainte`);

--
-- Contraintes pour la table `Possede_Logiciel`
--
ALTER TABLE `Possede_Logiciel`
  ADD CONSTRAINT `FK_Possede_Logiciel_id_logiciel` FOREIGN KEY (`id_logiciel`) REFERENCES `Logiciel` (`id_logiciel`),
  ADD CONSTRAINT `FK_Possede_Logiciel_id_salle` FOREIGN KEY (`id_salle`) REFERENCES `Salle` (`id_salle`);

--
-- Contraintes pour la table `Possede_Salle`
--
ALTER TABLE `Possede_Salle`
  ADD CONSTRAINT `FK_Possede_Salle_id_materiel` FOREIGN KEY (`id_materiel`) REFERENCES `Materiel` (`id_materiel`),
  ADD CONSTRAINT `FK_Possede_Salle_id_salle` FOREIGN KEY (`id_salle`) REFERENCES `Salle` (`id_salle`);

--
-- Contraintes pour la table `Salle`
--
ALTER TABLE `Salle`
  ADD CONSTRAINT `FK_Salle_id_seance` FOREIGN KEY (`id_seance`) REFERENCES `Seance` (`id_seance`);

--
-- Contraintes pour la table `Seance`
--
ALTER TABLE `Seance`
  ADD CONSTRAINT `FK_Seance_code_professeur` FOREIGN KEY (`code_professeur`) REFERENCES `Enseignant` (`code_professeur`),
  ADD CONSTRAINT `FK_Seance_id_matiere` FOREIGN KEY (`id_matiere`) REFERENCES `Matiere` (`id_matiere`),
  ADD CONSTRAINT `FK_Seance_id_salle` FOREIGN KEY (`id_salle`) REFERENCES `Salle` (`id_salle`);

--
-- Contraintes pour la table `Semestre`
--
ALTER TABLE `Semestre`
  ADD CONSTRAINT `FK_Semestre_id_annee` FOREIGN KEY (`id_annee`) REFERENCES `Annee` (`id_annee`);

--
-- Contraintes pour la table `UE`
--
ALTER TABLE `UE`
  ADD CONSTRAINT `FK_UE_id_semestre` FOREIGN KEY (`id_semestre`) REFERENCES `Semestre` (`id_semestre`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
