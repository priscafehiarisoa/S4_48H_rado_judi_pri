DROP DATABASE IF EXISTS regime;

CREATE DATABASE IF NOT EXISTS regime;
USE regime;
# -----------------------------------------------------------------------------
#       TABLE : USER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS USER
 (
   NAME VARCHAR(128) NULL  ,
   IDUSER INTEGER NOT NULL auto_increment ,
   EMAIL VARCHAR(50) NOT NULL  ,
   PASSWORD VARCHAR(128) NOT NULL  ,
   GENRE SMALLINT NOT NULL  ,
   ADMIN SMALLINT NOT NULL
   , PRIMARY KEY (IDUSER) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : REPAS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS REPAS
 (
   IDREPAS INTEGER NOT NULL auto_increment ,
   NOMREPAS VARCHAR(128) NULL  ,
   TYPEREPAS SMALLINT NOT NULL  ,
   CALORIEDONEE DECIMAL(10,2) NOT NULL  ,
   COMPOSANTREPAS INTEGER NULL  
   , PRIMARY KEY (IDREPAS) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : CODE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CODE
 (
   IDCODE INTEGER NOT NULL auto_increment ,
   CODE CHAR(32) NOT NULL  ,
   VALEUR DECIMAL(10,2) NOT NULL  
   , PRIMARY KEY (IDCODE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : SCEANCE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SCEANCE
 (
   IDSCEANCE INTEGER NOT NULL auto_increment ,
   NOMSCEANCE VARCHAR(128) NULL  
   , PRIMARY KEY (IDSCEANCE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : REGIMEJOURNALIER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS REGIMEJOURNALIER
 (
   IDREGIME INTEGER NOT NULL  auto_increment
   , PRIMARY KEY (IDREGIME) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PLATS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PLATS
 (
   IDPLAT INTEGER NOT NULL auto_increment ,
   TYPEPLAT SMALLINT NOT NULL  
   , PRIMARY KEY (IDPLAT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : COMPTEUSER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMPTEUSER
 (
   IDCOMPTEUSER INTEGER NOT NULL auto_increment  ,
   IDUSER INTEGER NULL  ,
   MONTANT DECIMAL(10,2) NULL  
   , PRIMARY KEY (IDCOMPTEUSER) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE COMPTEUSER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_COMPTEUSER_USER
     ON COMPTEUSER (IDUSER ASC);

# -----------------------------------------------------------------------------
#       TABLE : PROFIL
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PROFIL
 (
   IDPROFIL INTEGER NOT NULL  auto_increment,
   IDUSER INTEGER NULL  ,
   POIDS DECIMAL(10,2) NOT NULL  ,
   TAILLE DECIMAL(10,2) NOT NULL  ,
   AGE INTEGER NOT NULL  
   , PRIMARY KEY (IDPROFIL) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PROFIL
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PROFIL_USER
     ON PROFIL (IDUSER ASC);

# -----------------------------------------------------------------------------
#       TABLE : OBJECTIF
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS OBJECTIF
 (
   IDOBJECTIF INTEGER NOT NULL  ,
   OBJECTIF SMALLINT NOT NULL  
   , PRIMARY KEY (IDOBJECTIF) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : EXERCICE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS EXERCICE
 (
   IDEXERCICE INTEGER NOT NULL auto_increment ,
   NOMEXERCICE VARCHAR(128) NOT NULL  ,
   CALORIEDEPENSEE DECIMAL(10,2) NOT NULL  
   , PRIMARY KEY (IDEXERCICE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : CODEUTILISE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CODEUTILISE
 (
   IDUSER INTEGER NOT NULL auto_increment ,
   IDCODE INTEGER NOT NULL  ,
   VALIDEE INTEGER NULL  ,
   DATEDEVALIDATION CHAR(32) NULL  
   , PRIMARY KEY (IDUSER,IDCODE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE CODEUTILISE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_CODEUTILISE_USER
     ON CODEUTILISE (IDUSER ASC);

CREATE  INDEX I_FK_CODEUTILISE_CODE
     ON CODEUTILISE (IDCODE ASC);

# -----------------------------------------------------------------------------
#       TABLE : REGIMEUSERJOURNALIERPAYEE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS REGIMEUSERJOURNALIERPAYEE
 (
   IDUSER INTEGER NOT NULL  ,
   IDREGIME INTEGER NOT NULL  ,
   DATEREGIME CHAR(32) NOT NULL  
   , PRIMARY KEY (IDUSER,IDREGIME) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE REGIMEUSERJOURNALIERPAYEE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_REGIMEUSERJOURNALIERPAYEE_USER
     ON REGIMEUSERJOURNALIERPAYEE (IDUSER ASC);

CREATE  INDEX I_FK_REGIMEUSERJOURNALIERPAYEE_REGIMEJOURNALIER
     ON REGIMEUSERJOURNALIERPAYEE (IDREGIME ASC);

# -----------------------------------------------------------------------------
#       TABLE : REGIMEUSERJOURNALIER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS REGIMEUSERJOURNALIER
 (
   IDUSER INTEGER NOT NULL  ,
   IDREGIME INTEGER NOT NULL  ,
   DATEREGIME DATE NOT NULL  
   , PRIMARY KEY (IDUSER,IDREGIME) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE REGIMEUSERJOURNALIER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_REGIMEUSERJOURNALIER_USER
     ON REGIMEUSERJOURNALIER (IDUSER ASC);

CREATE  INDEX I_FK_REGIMEUSERJOURNALIER_REGIMEJOURNALIER
     ON REGIMEUSERJOURNALIER (IDREGIME ASC);

# -----------------------------------------------------------------------------
#       TABLE : OBJECTIFUSER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS OBJECTIFUSER
 (
   IDUSER INTEGER NOT NULL  ,
   IDOBJECTIF INTEGER NOT NULL  ,
   POIDSCIBLE DECIMAL(10,2) NOT NULL  
   , PRIMARY KEY (IDUSER,IDOBJECTIF) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE OBJECTIFUSER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_OBJECTIFUSER_USER
     ON OBJECTIFUSER (IDUSER ASC);

CREATE  INDEX I_FK_OBJECTIFUSER_OBJECTIF
     ON OBJECTIFUSER (IDOBJECTIF ASC);

# -----------------------------------------------------------------------------
#       TABLE : ASSO_8
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ASSO_8
 (
   IDPLAT INTEGER NOT NULL  ,
   IDREGIME INTEGER NOT NULL  
   , PRIMARY KEY (IDPLAT,IDREGIME) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE ASSO_8
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_ASSO_8_PLATS
     ON ASSO_8 (IDPLAT ASC);

CREATE  INDEX I_FK_ASSO_8_REGIMEJOURNALIER
     ON ASSO_8 (IDREGIME ASC);

# -----------------------------------------------------------------------------
#       TABLE : DETAILSCEANCE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DETAILSCEANCE
 (
   IDSCEANCE INTEGER NOT NULL  ,
   IDEXERCICE INTEGER NOT NULL  ,
   REPEXO INTEGER NOT NULL  
   , PRIMARY KEY (IDSCEANCE,IDEXERCICE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE DETAILSCEANCE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_DETAILSCEANCE_SCEANCE
     ON DETAILSCEANCE (IDSCEANCE ASC);

CREATE  INDEX I_FK_DETAILSCEANCE_EXERCICE
     ON DETAILSCEANCE (IDEXERCICE ASC);

# -----------------------------------------------------------------------------
#       TABLE : DETAILSCEANCEJOURNALIER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DETAILSCEANCEJOURNALIER
 (
   IDUSER INTEGER NOT NULL  ,
   IDSCEANCE INTEGER NOT NULL  ,
   DATESCEANCE DATE NOT NULL  
   , PRIMARY KEY (IDUSER,IDSCEANCE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE DETAILSCEANCEJOURNALIER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_DETAILSCEANCEJOURNALIER_USER
     ON DETAILSCEANCEJOURNALIER (IDUSER ASC);

CREATE  INDEX I_FK_DETAILSCEANCEJOURNALIER_SCEANCE
     ON DETAILSCEANCEJOURNALIER (IDSCEANCE ASC);

# -----------------------------------------------------------------------------
#       TABLE : DETAILPLAT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS DETAILPLAT
 (
   IDREPAS INTEGER NOT NULL  ,
   IDPLAT INTEGER NOT NULL  
   , PRIMARY KEY (IDREPAS,IDPLAT) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE DETAILPLAT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_DETAILPLAT_REPAS
     ON DETAILPLAT (IDREPAS ASC);

CREATE  INDEX I_FK_DETAILPLAT_PLATS
     ON DETAILPLAT (IDPLAT ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE COMPTEUSER 
  ADD FOREIGN KEY FK_COMPTEUSER_USER (IDUSER)
      REFERENCES USER (IDUSER) ;


ALTER TABLE PROFIL 
  ADD FOREIGN KEY FK_PROFIL_USER (IDUSER)
      REFERENCES USER (IDUSER) ;


ALTER TABLE CODEUTILISE 
  ADD FOREIGN KEY FK_CODEUTILISE_USER (IDUSER)
      REFERENCES USER (IDUSER) ;


ALTER TABLE CODEUTILISE 
  ADD FOREIGN KEY FK_CODEUTILISE_CODE (IDCODE)
      REFERENCES CODE (IDCODE) ;


ALTER TABLE REGIMEUSERJOURNALIERPAYEE 
  ADD FOREIGN KEY FK_REGIMEUSERJOURNALIERPAYEE_USER (IDUSER)
      REFERENCES USER (IDUSER) ;


ALTER TABLE REGIMEUSERJOURNALIERPAYEE 
  ADD FOREIGN KEY FK_REGIMEUSERJOURNALIERPAYEE_REGIMEJOURNALIER (IDREGIME)
      REFERENCES REGIMEJOURNALIER (IDREGIME) ;


ALTER TABLE REGIMEUSERJOURNALIER 
  ADD FOREIGN KEY FK_REGIMEUSERJOURNALIER_USER (IDUSER)
      REFERENCES USER (IDUSER) ;


ALTER TABLE REGIMEUSERJOURNALIER 
  ADD FOREIGN KEY FK_REGIMEUSERJOURNALIER_REGIMEJOURNALIER (IDREGIME)
      REFERENCES REGIMEJOURNALIER (IDREGIME) ;


ALTER TABLE OBJECTIFUSER 
  ADD FOREIGN KEY FK_OBJECTIFUSER_USER (IDUSER)
      REFERENCES USER (IDUSER) ;


ALTER TABLE OBJECTIFUSER 
  ADD FOREIGN KEY FK_OBJECTIFUSER_OBJECTIF (IDOBJECTIF)
      REFERENCES OBJECTIF (IDOBJECTIF) ;


ALTER TABLE ASSO_8 
  ADD FOREIGN KEY FK_ASSO_8_PLATS (IDPLAT)
      REFERENCES PLATS (IDPLAT) ;


ALTER TABLE ASSO_8 
  ADD FOREIGN KEY FK_ASSO_8_REGIMEJOURNALIER (IDREGIME)
      REFERENCES REGIMEJOURNALIER (IDREGIME) ;


ALTER TABLE DETAILSCEANCE 
  ADD FOREIGN KEY FK_DETAILSCEANCE_SCEANCE (IDSCEANCE)
      REFERENCES SCEANCE (IDSCEANCE) ;


ALTER TABLE DETAILSCEANCE 
  ADD FOREIGN KEY FK_DETAILSCEANCE_EXERCICE (IDEXERCICE)
      REFERENCES EXERCICE (IDEXERCICE) ;


ALTER TABLE DETAILSCEANCEJOURNALIER 
  ADD FOREIGN KEY FK_DETAILSCEANCEJOURNALIER_USER (IDUSER)
      REFERENCES USER (IDUSER) ;


ALTER TABLE DETAILSCEANCEJOURNALIER 
  ADD FOREIGN KEY FK_DETAILSCEANCEJOURNALIER_SCEANCE (IDSCEANCE)
      REFERENCES SCEANCE (IDSCEANCE) ;


ALTER TABLE DETAILPLAT 
  ADD FOREIGN KEY FK_DETAILPLAT_REPAS (IDREPAS)
      REFERENCES REPAS (IDREPAS) ;


ALTER TABLE DETAILPLAT 
  ADD FOREIGN KEY FK_DETAILPLAT_PLATS (IDPLAT)
      REFERENCES PLATS (IDPLAT) ;

