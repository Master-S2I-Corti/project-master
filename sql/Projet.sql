#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Enseignant
#------------------------------------------------------------

CREATE TABLE Enseignant(
        code_professeur int (11) Auto_increment  NOT NULL ,
        type            Varchar (25) ,
        heure           Int ,
        id_annee        Int ,
        id              Int ,
        id_diplome      Int ,
        id_ue           Varchar (25) ,
        PRIMARY KEY (code_professeur )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Departement
#------------------------------------------------------------

CREATE TABLE Departement(
        id_departement int (11) Auto_increment  NOT NULL ,
        libelle        Varchar (255) ,
        PRIMARY KEY (id_departement )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Etudiant
#------------------------------------------------------------

CREATE TABLE Etudiant(
        code_etudiant int (11) Auto_increment  NOT NULL ,
        INE           Varchar (25) ,
        numSecu       Varchar (25) ,
        code_groupe   Int ,
        id_annee      Int ,
        id            Int ,
        PRIMARY KEY (code_etudiant )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Filiere
#------------------------------------------------------------

CREATE TABLE Filiere(
        id_filiere     int (11) Auto_increment  NOT NULL ,
        libelle        Varchar (255) ,
        id_departement Int ,
        PRIMARY KEY (id_filiere )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Matiere
#------------------------------------------------------------

CREATE TABLE Matiere(
        id_matiere  Varchar (25) NOT NULL ,
        libelle     Varchar (50) ,
        description Varchar (25) ,
        plan        Text ,
        coeff       Int ,
        cours       Int ,
        tp          Int ,
        td          Int ,
        id_ue       Varchar (25) ,
        PRIMARY KEY (id_matiere )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: UE
#------------------------------------------------------------

CREATE TABLE UE(
        id_ue           Varchar (25) NOT NULL ,
        libelle         Varchar (25) ,
        description     Text ,
        coeff           Int ,
        edts            Int ,
        id_semestre     Varchar (25) ,
        code_professeur Int ,
        PRIMARY KEY (id_ue )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Semestre
#------------------------------------------------------------

CREATE TABLE Semestre(
        id_semestre Varchar (25) NOT NULL ,
        libelle     Varchar (25) ,
        id_annee    Int ,
        PRIMARY KEY (id_semestre )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Annee
#------------------------------------------------------------

CREATE TABLE Annee(
        id_annee        int (11) Auto_increment  NOT NULL ,
        libelle         Varchar (25) ,
        id_diplome      Int ,
        code_professeur Int ,
        PRIMARY KEY (id_annee )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Groupe
#------------------------------------------------------------

CREATE TABLE Groupe(
        code_groupe int (11) Auto_increment  NOT NULL ,
        lib         Varchar (25) ,
        id_annee    Int ,
        PRIMARY KEY (code_groupe )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Diplome
#------------------------------------------------------------

CREATE TABLE Diplome(
        id_diplome      int (11) Auto_increment  NOT NULL ,
        libelle         Varchar (255) ,
        maquetteEtat    Int ,
        id_filiere      Int ,
        code_professeur Int ,
        PRIMARY KEY (id_diplome )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Seance
#------------------------------------------------------------

CREATE TABLE Seance(
        id_seance       int (11) Auto_increment  NOT NULL ,
        type            Varchar (25) ,
        heure_debut     Datetime ,
        heure_fin       Datetime ,
        date_seance     Date ,
        id_matiere      Varchar (25) ,
        id_salle        Int ,
        code_professeur Int ,
        PRIMARY KEY (id_seance )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Salle
#------------------------------------------------------------

CREATE TABLE Salle(
        id_salle  int (11) Auto_increment  NOT NULL ,
        location  Varchar (25) ,
        capacite  Int ,
        id_seance Int ,
        PRIMARY KEY (id_salle )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Logiciel
#------------------------------------------------------------

CREATE TABLE Logiciel(
        id_logiciel int (11) Auto_increment  NOT NULL ,
        libelle     Varchar (255) ,
        licence     Date ,
        PRIMARY KEY (id_logiciel )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Materiel
#------------------------------------------------------------

CREATE TABLE Materiel(
        id_materiel int (11) Auto_increment  NOT NULL ,
        libelle     Varchar (255) ,
        PRIMARY KEY (id_materiel )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Competence
#------------------------------------------------------------

CREATE TABLE Competence(
        id_competence Int NOT NULL ,
        libelle       Varchar (25) ,
        PRIMARY KEY (id_competence )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Contrainte
#------------------------------------------------------------

CREATE TABLE Contrainte(
        id_contrainte          Int NOT NULL ,
        libelle                Varchar (25) ,
        jour_contrainte        Date ,
        heure_debut_contrainte Time ,
        heure_fin_contrainte   Time ,
        commentaire            Text ,
        PRIMARY KEY (id_contrainte )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Personne
#------------------------------------------------------------

CREATE TABLE Personne(
        id              int (11) Auto_increment  NOT NULL ,
        identifiant     Varchar (25) ,
        password        Varchar (255) ,
        nom             Varchar (25) ,
        prenom          Varchar (25) ,
        tel             Varchar (25) ,
        naissance       Date ,
        email           Varchar (25) ,
        email_sos       Varchar (25) ,
        code_postal     Varchar (25) ,
        ville           Varchar (25) ,
        adresse         Varchar (25) ,
        remember_token  Varchar (100) ,
        created_at      TimeStamp NOT NULL ,
        updated_at      TimeStamp NOT NULL ,
        admin           Bool NOT NULL ,
        code_professeur Int ,
        code_etudiant   Int ,
        PRIMARY KEY (id )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Evaluations
#------------------------------------------------------------

CREATE TABLE Evaluations(
        id_evaluation   int (11) Auto_increment  NOT NULL ,
        coeff           Int ,
        type            Varchar (25) ,
        code_professeur Int ,
        id_matiere      Varchar (25) ,
        PRIMARY KEY (id_evaluation )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Responsabilite
#------------------------------------------------------------

CREATE TABLE Responsabilite(
        id_reponsabilite int (11) Auto_increment  NOT NULL ,
        libellle         Varchar (25) ,
        heureReducable   Int ,
        PRIMARY KEY (id_reponsabilite )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Password_reset
#------------------------------------------------------------

CREATE TABLE Password_reset(
        email      Varchar (25) NOT NULL ,
        token      Varchar (255) NOT NULL ,
        created_at TimeStamp ,
        PRIMARY KEY (email )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Possede_Logiciel
#------------------------------------------------------------

CREATE TABLE Possede_Logiciel(
        id_salle    Int NOT NULL ,
        id_logiciel Int NOT NULL ,
        PRIMARY KEY (id_salle ,id_logiciel )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Possede_Salle
#------------------------------------------------------------

CREATE TABLE Possede_Salle(
        id_salle    Int NOT NULL ,
        id_materiel Int NOT NULL ,
        PRIMARY KEY (id_salle ,id_materiel )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Detient
#------------------------------------------------------------

CREATE TABLE Detient(
        code_professeur Int NOT NULL ,
        id_competence   Int NOT NULL ,
        PRIMARY KEY (code_professeur ,id_competence )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Note
#------------------------------------------------------------

CREATE TABLE Note(
        note          Int ,
        code_etudiant Int NOT NULL ,
        id_evaluation Int NOT NULL ,
        PRIMARY KEY (code_etudiant ,id_evaluation )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table:     Possede
#------------------------------------------------------------

CREATE TABLE Possede(
        id_contrainte   Int NOT NULL ,
        code_professeur Int NOT NULL ,
        PRIMARY KEY (id_contrainte ,code_professeur )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Est_Responsable
#------------------------------------------------------------

CREATE TABLE Est_Responsable(
        code_professeur  Int NOT NULL ,
        id_reponsabilite Int NOT NULL ,
        PRIMARY KEY (code_professeur ,id_reponsabilite )
)ENGINE=InnoDB;

ALTER TABLE Enseignant ADD CONSTRAINT FK_Enseignant_id_annee FOREIGN KEY (id_annee) REFERENCES Annee(id_annee);
ALTER TABLE Enseignant ADD CONSTRAINT FK_Enseignant_id FOREIGN KEY (id) REFERENCES Personne(id);
ALTER TABLE Enseignant ADD CONSTRAINT FK_Enseignant_id_diplome FOREIGN KEY (id_diplome) REFERENCES Diplome(id_diplome);
ALTER TABLE Enseignant ADD CONSTRAINT FK_Enseignant_id_ue FOREIGN KEY (id_ue) REFERENCES UE(id_ue);
ALTER TABLE Etudiant ADD CONSTRAINT FK_Etudiant_code_groupe FOREIGN KEY (code_groupe) REFERENCES Groupe(code_groupe);
ALTER TABLE Etudiant ADD CONSTRAINT FK_Etudiant_id_annee FOREIGN KEY (id_annee) REFERENCES Annee(id_annee);
ALTER TABLE Etudiant ADD CONSTRAINT FK_Etudiant_id FOREIGN KEY (id) REFERENCES Personne(id);
ALTER TABLE Filiere ADD CONSTRAINT FK_Filiere_id_departement FOREIGN KEY (id_departement) REFERENCES Departement(id_departement);
ALTER TABLE Matiere ADD CONSTRAINT FK_Matiere_id_ue FOREIGN KEY (id_ue) REFERENCES UE(id_ue);
ALTER TABLE UE ADD CONSTRAINT FK_UE_id_semestre FOREIGN KEY (id_semestre) REFERENCES Semestre(id_semestre);
ALTER TABLE UE ADD CONSTRAINT FK_UE_code_professeur FOREIGN KEY (code_professeur) REFERENCES Enseignant(code_professeur);
ALTER TABLE Semestre ADD CONSTRAINT FK_Semestre_id_annee FOREIGN KEY (id_annee) REFERENCES Annee(id_annee);
ALTER TABLE Annee ADD CONSTRAINT FK_Annee_id_diplome FOREIGN KEY (id_diplome) REFERENCES Diplome(id_diplome);
ALTER TABLE Annee ADD CONSTRAINT FK_Annee_code_professeur FOREIGN KEY (code_professeur) REFERENCES Enseignant(code_professeur);
ALTER TABLE Groupe ADD CONSTRAINT FK_Groupe_id_annee FOREIGN KEY (id_annee) REFERENCES Annee(id_annee);
ALTER TABLE Diplome ADD CONSTRAINT FK_Diplome_id_filiere FOREIGN KEY (id_filiere) REFERENCES Filiere(id_filiere);
ALTER TABLE Diplome ADD CONSTRAINT FK_Diplome_code_professeur FOREIGN KEY (code_professeur) REFERENCES Enseignant(code_professeur);
ALTER TABLE Seance ADD CONSTRAINT FK_Seance_id_matiere FOREIGN KEY (id_matiere) REFERENCES Matiere(id_matiere);
ALTER TABLE Seance ADD CONSTRAINT FK_Seance_id_salle FOREIGN KEY (id_salle) REFERENCES Salle(id_salle);
ALTER TABLE Seance ADD CONSTRAINT FK_Seance_code_professeur FOREIGN KEY (code_professeur) REFERENCES Enseignant(code_professeur);
ALTER TABLE Salle ADD CONSTRAINT FK_Salle_id_seance FOREIGN KEY (id_seance) REFERENCES Seance(id_seance);
ALTER TABLE Personne ADD CONSTRAINT FK_Personne_code_professeur FOREIGN KEY (code_professeur) REFERENCES Enseignant(code_professeur);
ALTER TABLE Personne ADD CONSTRAINT FK_Personne_code_etudiant FOREIGN KEY (code_etudiant) REFERENCES Etudiant(code_etudiant);
ALTER TABLE Evaluations ADD CONSTRAINT FK_Evaluations_code_professeur FOREIGN KEY (code_professeur) REFERENCES Enseignant(code_professeur);
ALTER TABLE Evaluations ADD CONSTRAINT FK_Evaluations_id_matiere FOREIGN KEY (id_matiere) REFERENCES Matiere(id_matiere);
ALTER TABLE Possede_Logiciel ADD CONSTRAINT FK_Possede_Logiciel_id_salle FOREIGN KEY (id_salle) REFERENCES Salle(id_salle);
ALTER TABLE Possede_Logiciel ADD CONSTRAINT FK_Possede_Logiciel_id_logiciel FOREIGN KEY (id_logiciel) REFERENCES Logiciel(id_logiciel);
ALTER TABLE Possede_Salle ADD CONSTRAINT FK_Possede_Salle_id_salle FOREIGN KEY (id_salle) REFERENCES Salle(id_salle);
ALTER TABLE Possede_Salle ADD CONSTRAINT FK_Possede_Salle_id_materiel FOREIGN KEY (id_materiel) REFERENCES Materiel(id_materiel);
ALTER TABLE Detient ADD CONSTRAINT FK_Detient_code_professeur FOREIGN KEY (code_professeur) REFERENCES Enseignant(code_professeur);
ALTER TABLE Detient ADD CONSTRAINT FK_Detient_id_competence FOREIGN KEY (id_competence) REFERENCES Competence(id_competence);
ALTER TABLE Note ADD CONSTRAINT FK_Note_code_etudiant FOREIGN KEY (code_etudiant) REFERENCES Etudiant(code_etudiant);
ALTER TABLE Note ADD CONSTRAINT FK_Note_id_evaluation FOREIGN KEY (id_evaluation) REFERENCES Evaluations(id_evaluation);
ALTER TABLE Possede ADD CONSTRAINT FK_Possede_id_contrainte FOREIGN KEY (id_contrainte) REFERENCES Contrainte(id_contrainte);
ALTER TABLE Possede ADD CONSTRAINT FK_Possede_code_professeur FOREIGN KEY (code_professeur) REFERENCES Enseignant(code_professeur);
ALTER TABLE Est_Responsable ADD CONSTRAINT FK_Est_Responsable_code_professeur FOREIGN KEY (code_professeur) REFERENCES Enseignant(code_professeur);
ALTER TABLE Est_Responsable ADD CONSTRAINT FK_Est_Responsable_id_reponsabilite FOREIGN KEY (id_reponsabilite) REFERENCES Responsabilite(id_reponsabilite);
