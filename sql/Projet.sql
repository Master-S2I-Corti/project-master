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
        batiment        Varchar (25) ,
        etage           Varchar (25) ,
        numero_privee   Varchar (10) ,
        id              Int ,
        id_status       Int ,
        id_departement  Int ,
        PRIMARY KEY (code_professeur )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Departement
#------------------------------------------------------------

CREATE TABLE Departement(
        id_departement int (11) Auto_increment  NOT NULL ,
        libelle        Varchar (255) ,
        id_ufr         Int ,
        PRIMARY KEY (id_departement )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Etudiant
#------------------------------------------------------------

CREATE TABLE Etudiant(
        code_etudiant int (11) Auto_increment  NOT NULL ,
        INE           Varchar (25) ,
        numSecu       Varchar (25) ,
        id_annee      Int ,
        id            Int ,
        PRIMARY KEY (code_etudiant )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Element_Constitutif
#------------------------------------------------------------

CREATE TABLE Element_Constitutif(
        id_matiere  int (11) Auto_increment  NOT NULL ,
        libelle     Varchar (50) ,
        description Varchar (25) ,
        plan        Text ,
        coeff       Int ,
        cours       Double ,
        tp          Double ,
        td          Double ,
        id_ue       Varchar (25) ,
        PRIMARY KEY (id_matiere )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: UE
#------------------------------------------------------------

CREATE TABLE UE(
        id_ue       Varchar (25) NOT NULL ,
        libelle     Varchar (25) ,
        description Text ,
        coeff       Int ,
        edts        Int ,
        id_semestre Varchar (25) ,
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
        id_annee   int (11) Auto_increment  NOT NULL ,
        libelle    Varchar (25) ,
        id_diplome Int ,
        PRIMARY KEY (id_annee )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Groupe
#------------------------------------------------------------

CREATE TABLE Groupe(
        code_groupe int (11) Auto_increment  NOT NULL ,
        lib         Varchar (25) ,
        PRIMARY KEY (code_groupe )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Diplome
#------------------------------------------------------------

CREATE TABLE Diplome(
        id_diplome     int (11) Auto_increment  NOT NULL ,
        libelle        Varchar (255) ,
        maquetteEtat   Int ,
        id_departement Int ,
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
        remarque        Text ,
        id_matiere      Int ,
        id_salle        Int ,
        code_professeur Int ,
        PRIMARY KEY (id_seance )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Salle
#------------------------------------------------------------

CREATE TABLE Salle(
        id_salle int (11) Auto_increment  NOT NULL ,
        location Varchar (25) ,
        capacite Int ,
        PRIMARY KEY (id_salle )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Logiciel
#------------------------------------------------------------

CREATE TABLE Logiciel(
        id_logiciel      int (11) Auto_increment  NOT NULL ,
        libelle          Varchar (255) ,
        licence          Date ,
        personne_contact Text ,
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
# Table: Disponibilite
#------------------------------------------------------------

CREATE TABLE Disponibilite(
        id_dispo        int (11) Auto_increment  NOT NULL ,
        libelle         Varchar (25) ,
        jour_semaine    Int ,
        m1              Varchar (25) ,
        m2              Varchar (25) ,
        m3              Varchar (25) ,
        m4              Varchar (25) ,
        m5              Varchar (25) ,
        code_professeur Int ,
        PRIMARY KEY (id_dispo )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Personne
#------------------------------------------------------------

CREATE TABLE Personne(
        id              int (11) Auto_increment  NOT NULL ,
        login           Varchar (25) ,
        password        Varchar (255) ,
        nom             Varchar (25) ,
        prenom          Varchar (25) ,
        tel             Varchar (25) ,
        naissance       Date ,
        email           Varchar (50) ,
        email_sos       Varchar (50) ,
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
        libelle         Varchar (50) ,
        dateEval        Date ,
        code_professeur Int ,
        id_matiere      Int ,
        PRIMARY KEY (id_evaluation )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Responsabilite
#------------------------------------------------------------

CREATE TABLE Responsabilite(
        id_reponsabilite int (11) Auto_increment  NOT NULL ,
        libellle         Varchar (25) ,
        decharge         Int ,
        PRIMARY KEY (id_reponsabilite )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Password_resets
#------------------------------------------------------------

CREATE TABLE Password_resets(
        email      Varchar (25) NOT NULL ,
        token      Varchar (255) NOT NULL ,
        created_at TimeStamp ,
        PRIMARY KEY (email )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Archive_maquette
#------------------------------------------------------------

CREATE TABLE Archive_maquette(
        id_archive int (11) Auto_increment  NOT NULL ,
        annee      Int ,
        file       Varchar (255) ,
        id_diplome Int ,
        PRIMARY KEY (id_archive )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Indisponibilite
#------------------------------------------------------------

CREATE TABLE Indisponibilite(
        id_indispo      int (11) Auto_increment  NOT NULL ,
        debut           TimeStamp ,
        fin             TimeStamp ,
        code_professeur Int ,
        PRIMARY KEY (id_indispo )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: UFR
#------------------------------------------------------------

CREATE TABLE UFR(
        id_ufr  int (11) Auto_increment  NOT NULL ,
        libelle Varchar (100) ,
        PRIMARY KEY (id_ufr )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Status
#------------------------------------------------------------

CREATE TABLE Status(
        id_status     int (11) Auto_increment  NOT NULL ,
        type          Varchar (25) ,
        volumeHoraire Int ,
        PRIMARY KEY (id_status )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: AppartientGroupe
#------------------------------------------------------------

CREATE TABLE AppartientGroupe(
        code_groupe   Int NOT NULL ,
        code_etudiant Int NOT NULL ,
        PRIMARY KEY (code_groupe ,code_etudiant )
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
        note          Double ,
        code_etudiant Int NOT NULL ,
        id_evaluation Int NOT NULL ,
        PRIMARY KEY (code_etudiant ,id_evaluation )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Responsable_Diplome
#------------------------------------------------------------

CREATE TABLE Responsable_Diplome(
        id_diplome      Int NOT NULL ,
        code_professeur Int NOT NULL ,
        PRIMARY KEY (id_diplome ,code_professeur )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Responsable_UE
#------------------------------------------------------------

CREATE TABLE Responsable_UE(
        id_ue           Varchar (25) NOT NULL ,
        code_professeur Int NOT NULL ,
        PRIMARY KEY (id_ue ,code_professeur )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Est_Responsable
#------------------------------------------------------------

CREATE TABLE Est_Responsable(
        code_professeur  Int NOT NULL ,
        id_reponsabilite Int NOT NULL ,
        PRIMARY KEY (code_professeur ,id_reponsabilite )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Realise_Matiere
#------------------------------------------------------------

CREATE TABLE Realise_Matiere(
        id_matiere      Int NOT NULL ,
        code_professeur Int NOT NULL ,
        PRIMARY KEY (id_matiere ,code_professeur )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Participe
#------------------------------------------------------------

CREATE TABLE Participe(
        id_seance   Int NOT NULL ,
        code_groupe Int NOT NULL ,
        PRIMARY KEY (id_seance ,code_groupe )
)ENGINE=InnoDB;

ALTER TABLE Enseignant ADD CONSTRAINT FK_Enseignant_id FOREIGN KEY (id) REFERENCES Personne(id);
ALTER TABLE Enseignant ADD CONSTRAINT FK_Enseignant_id_status FOREIGN KEY (id_status) REFERENCES Status(id_status);
ALTER TABLE Enseignant ADD CONSTRAINT FK_Enseignant_id_departement FOREIGN KEY (id_departement) REFERENCES Departement(id_departement);
ALTER TABLE Departement ADD CONSTRAINT FK_Departement_id_ufr FOREIGN KEY (id_ufr) REFERENCES UFR(id_ufr);
ALTER TABLE Etudiant ADD CONSTRAINT FK_Etudiant_id_annee FOREIGN KEY (id_annee) REFERENCES Annee(id_annee);
ALTER TABLE Etudiant ADD CONSTRAINT FK_Etudiant_id FOREIGN KEY (id) REFERENCES Personne(id);
ALTER TABLE Element_Constitutif ADD CONSTRAINT FK_Element_Constitutif_id_ue FOREIGN KEY (id_ue) REFERENCES UE(id_ue);
ALTER TABLE UE ADD CONSTRAINT FK_UE_id_semestre FOREIGN KEY (id_semestre) REFERENCES Semestre(id_semestre);
ALTER TABLE Semestre ADD CONSTRAINT FK_Semestre_id_annee FOREIGN KEY (id_annee) REFERENCES Annee(id_annee);
ALTER TABLE Annee ADD CONSTRAINT FK_Annee_id_diplome FOREIGN KEY (id_diplome) REFERENCES Diplome(id_diplome);
ALTER TABLE Diplome ADD CONSTRAINT FK_Diplome_id_departement FOREIGN KEY (id_departement) REFERENCES Departement(id_departement);
ALTER TABLE Seance ADD CONSTRAINT FK_Seance_id_matiere FOREIGN KEY (id_matiere) REFERENCES Element_Constitutif(id_matiere);
ALTER TABLE Seance ADD CONSTRAINT FK_Seance_id_salle FOREIGN KEY (id_salle) REFERENCES Salle(id_salle);
ALTER TABLE Seance ADD CONSTRAINT FK_Seance_code_professeur FOREIGN KEY (code_professeur) REFERENCES Enseignant(code_professeur);
ALTER TABLE Disponibilite ADD CONSTRAINT FK_Disponibilite_code_professeur FOREIGN KEY (code_professeur) REFERENCES Enseignant(code_professeur);
ALTER TABLE Personne ADD CONSTRAINT FK_Personne_code_professeur FOREIGN KEY (code_professeur) REFERENCES Enseignant(code_professeur);
ALTER TABLE Personne ADD CONSTRAINT FK_Personne_code_etudiant FOREIGN KEY (code_etudiant) REFERENCES Etudiant(code_etudiant);
ALTER TABLE Evaluations ADD CONSTRAINT FK_Evaluations_code_professeur FOREIGN KEY (code_professeur) REFERENCES Enseignant(code_professeur);
ALTER TABLE Evaluations ADD CONSTRAINT FK_Evaluations_id_matiere FOREIGN KEY (id_matiere) REFERENCES Element_Constitutif(id_matiere);
ALTER TABLE Archive_maquette ADD CONSTRAINT FK_Archive_maquette_id_diplome FOREIGN KEY (id_diplome) REFERENCES Diplome(id_diplome);
ALTER TABLE Indisponibilite ADD CONSTRAINT FK_Indisponibilite_code_professeur FOREIGN KEY (code_professeur) REFERENCES Enseignant(code_professeur);
ALTER TABLE AppartientGroupe ADD CONSTRAINT FK_AppartientGroupe_code_groupe FOREIGN KEY (code_groupe) REFERENCES Groupe(code_groupe);
ALTER TABLE AppartientGroupe ADD CONSTRAINT FK_AppartientGroupe_code_etudiant FOREIGN KEY (code_etudiant) REFERENCES Etudiant(code_etudiant);
ALTER TABLE Possede_Logiciel ADD CONSTRAINT FK_Possede_Logiciel_id_salle FOREIGN KEY (id_salle) REFERENCES Salle(id_salle);
ALTER TABLE Possede_Logiciel ADD CONSTRAINT FK_Possede_Logiciel_id_logiciel FOREIGN KEY (id_logiciel) REFERENCES Logiciel(id_logiciel);
ALTER TABLE Possede_Salle ADD CONSTRAINT FK_Possede_Salle_id_salle FOREIGN KEY (id_salle) REFERENCES Salle(id_salle);
ALTER TABLE Possede_Salle ADD CONSTRAINT FK_Possede_Salle_id_materiel FOREIGN KEY (id_materiel) REFERENCES Materiel(id_materiel);
ALTER TABLE Detient ADD CONSTRAINT FK_Detient_code_professeur FOREIGN KEY (code_professeur) REFERENCES Enseignant(code_professeur);
ALTER TABLE Detient ADD CONSTRAINT FK_Detient_id_competence FOREIGN KEY (id_competence) REFERENCES Competence(id_competence);
ALTER TABLE Note ADD CONSTRAINT FK_Note_code_etudiant FOREIGN KEY (code_etudiant) REFERENCES Etudiant(code_etudiant);
ALTER TABLE Note ADD CONSTRAINT FK_Note_id_evaluation FOREIGN KEY (id_evaluation) REFERENCES Evaluations(id_evaluation);
ALTER TABLE Responsable_Diplome ADD CONSTRAINT FK_Responsable_Diplome_id_diplome FOREIGN KEY (id_diplome) REFERENCES Diplome(id_diplome);
ALTER TABLE Responsable_Diplome ADD CONSTRAINT FK_Responsable_Diplome_code_professeur FOREIGN KEY (code_professeur) REFERENCES Enseignant(code_professeur);
ALTER TABLE Responsable_UE ADD CONSTRAINT FK_Responsable_UE_id_ue FOREIGN KEY (id_ue) REFERENCES UE(id_ue);
ALTER TABLE Responsable_UE ADD CONSTRAINT FK_Responsable_UE_code_professeur FOREIGN KEY (code_professeur) REFERENCES Enseignant(code_professeur);
ALTER TABLE Est_Responsable ADD CONSTRAINT FK_Est_Responsable_code_professeur FOREIGN KEY (code_professeur) REFERENCES Enseignant(code_professeur);
ALTER TABLE Est_Responsable ADD CONSTRAINT FK_Est_Responsable_id_reponsabilite FOREIGN KEY (id_reponsabilite) REFERENCES Responsabilite(id_reponsabilite);
ALTER TABLE Realise_Matiere ADD CONSTRAINT FK_Realise_Matiere_id_matiere FOREIGN KEY (id_matiere) REFERENCES Element_Constitutif(id_matiere);
ALTER TABLE Realise_Matiere ADD CONSTRAINT FK_Realise_Matiere_code_professeur FOREIGN KEY (code_professeur) REFERENCES Enseignant(code_professeur);
ALTER TABLE Participe ADD CONSTRAINT FK_Participe_id_seance FOREIGN KEY (id_seance) REFERENCES Seance(id_seance);
ALTER TABLE Participe ADD CONSTRAINT FK_Participe_code_groupe FOREIGN KEY (code_groupe) REFERENCES Groupe(code_groupe);
