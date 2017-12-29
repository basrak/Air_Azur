DROP DATABASE IF EXISTS AIR_AZUR;

CREATE DATABASE IF NOT EXISTS AIR_AZUR;
USE AIR_AZUR;

# -----------------------------------------------------------------------------
#       TABLE : USERS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS USERS
 (
   IDUSERS INTEGER(5) NOT NULL  ,
   LOGIN VARCHAR(15) UNIQUE NOT NULL  ,
   MDP VARCHAR(20) NOT NULL  
   , PRIMARY KEY (IDUSERS) 
 )
 ENGINE=INNODB;

# -----------------------------------------------------------------------------
#       TABLE : ADMINISTRATEUR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ADMINISTRATEUR
 (
   IDUSERS INTEGER(5) NOT NULL  ,
   MAILADMIN VARCHAR(30) UNIQUE NULL  ,
   LOGIN VARCHAR(15) UNIQUE NOT NULL  ,
   MDP VARCHAR(20) NOT NULL  
   , PRIMARY KEY (IDUSERS) 
 )ENGINE=INNODB;

 # -----------------------------------------------------------------------------
#       TABLE : AGENCE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS AGENCE
 (
   IDUSERS INTEGER(5) NOT NULL  ,
   CODEAGENCE VARCHAR(10) UNIQUE NOT NULL  ,
   NOMAGENCE VARCHAR(30) UNIQUE NOT NULL  ,
   ADRAGENCE VARCHAR(50) NULL  ,
   CPAGENCE INTEGER(5) NULL  ,
   VILLEAGENCE VARCHAR(20) NULL  ,
   TELAGENCE CHAR(15) NULL  ,
   MAILAGENCE VARCHAR(128) NULL  ,
   LOGIN VARCHAR(15) NOT NULL  ,
   MDP VARCHAR(20) NOT NULL  
   , PRIMARY KEY (IDUSERS) 
 )ENGINE=INNODB;
 
# -----------------------------------------------------------------------------
#       TABLE : AEROPORT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS AEROPORT
 (
   IDARPT INTEGER(5) NOT NULL  ,
   NOMARPT VARCHAR(20) UNIQUE NOT NULL  ,
   VILLEARPT VARCHAR(30) NOT NULL  
   , PRIMARY KEY (IDARPT) 
 )ENGINE=INNODB;

# -----------------------------------------------------------------------------
#       TABLE : VOLGEN
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS VOLGEN
 (
   IDVOL INTEGER(5) NOT NULL  ,
   IDARPT INTEGER(2) NOT NULL  ,
   IDARPT_ARRIVEE INTEGER(2) NOT NULL  ,
   CODEVOL VARCHAR(10) UNIQUE NOT NULL  ,
   PRIXVOL DECIMAL(13,2) NOT NULL  ,
   PLACESVOL INTEGER(3) NOT NULL  ,
   JOURVOL VARCHAR(10) NOT NULL  
   , PRIMARY KEY (IDVOL) 
 )ENGINE=INNODB; 

# -----------------------------------------------------------------------------
#       TABLE : VOL
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS VOL
 (
   IDVOL INTEGER(5) NOT NULL  ,
   DATEDEPART DATETIME NOT NULL  ,
   DATEARRIVEE DATETIME NOT NULL  ,
   PRIMARY KEY (IDVOL,DATEDEPART) 
 )ENGINE=INNODB;
 
# -----------------------------------------------------------------------------
#       TABLE : CLIENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CLIENT
 (
   IDCLIENT INTEGER(5) NOT NULL  ,
   NOMCLIENT VARCHAR(30) NOT NULL  ,
   PRENOMCLIENT VARCHAR(30) NOT NULL  ,
   ADRCLIENT VARCHAR(50) NULL  ,
   CPCLIENT INTEGER(5) NULL  ,
   VILLECLIENT VARCHAR(30) NULL  ,
   TELCLIENT CHAR(15) NULL  ,
   MAILCLIENT VARCHAR(30) NULL  
   , PRIMARY KEY (IDCLIENT) 
 )ENGINE=INNODB;

# -----------------------------------------------------------------------------
#       TABLE : RESERVATION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS RESERVATION
 (
   IDUSERS INTEGER(5) NOT NULL  ,
   IDRESERV INTEGER(4) NOT NULL  ,
   IDCLIENT INTEGER(2) NOT NULL  ,
   IDVOL INTEGER(5) NOT NULL  ,
   DATEDEPART DATETIME NOT NULL  ,
   DATERESERV DATETIME NOT NULL  ,
   NBRRESERV INTEGER(3) NOT NULL  
   , PRIMARY KEY (IDUSERS,IDRESERV) 
 )ENGINE=INNODB;

# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE ADMINISTRATEUR 
  ADD FOREIGN KEY FK_ADMINISTRATEUR_USERS (IDUSERS)
      REFERENCES USERS (IDUSERS) on delete cascade on update cascade;


ALTER TABLE VOL 
  ADD FOREIGN KEY FK_VOL_VOLGEN (IDVOL)
      REFERENCES VOLGEN (IDVOL) on delete cascade on update cascade;


ALTER TABLE RESERVATION 
  ADD FOREIGN KEY FK_RESERVATION_AGENCE (IDUSERS)
      REFERENCES AGENCE (IDUSERS) on delete cascade on update cascade;


ALTER TABLE RESERVATION 
  ADD FOREIGN KEY FK_RESERVATION_CLIENT (IDCLIENT)
      REFERENCES CLIENT (IDCLIENT) on delete cascade on update cascade;


ALTER TABLE RESERVATION 
  ADD FOREIGN KEY FK_RESERVATION_VOL (IDVOL,DATEDEPART)
      REFERENCES VOL (IDVOL,DATEDEPART) on delete cascade on update cascade;


ALTER TABLE VOLGEN 
  ADD FOREIGN KEY FK_VOLGEN_AEROPORT (IDARPT)
      REFERENCES AEROPORT (IDARPT) on delete cascade on update cascade;


ALTER TABLE VOLGEN 
  ADD FOREIGN KEY FK_VOLGEN_AEROPORT1 (IDARPT_ARRIVEE)
      REFERENCES AEROPORT (IDARPT) on delete cascade on update cascade;


ALTER TABLE AGENCE 
  ADD FOREIGN KEY FK_AGENCE_USERS (IDUSERS)
      REFERENCES USERS (IDUSERS) on delete cascade on update cascade;

# -----------------------------------------------------------------------------
#       INSERTION DES VALEURS
# -----------------------------------------------------------------------------

INSERT INTO `users` (`IDUSERS`, `LOGIN`, `MDP`) VALUES
(1, 'admin', 'admin'),
(2, 'AZ_ADS', 'agence'),
(3, 'AZ_AA', 'agence');

INSERT INTO `administrateur` (`IDUSERS`, `MAILADMIN`, `LOGIN`, `MDP`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin');
	  
INSERT INTO `agence` (`IDUSERS`, `CODEAGENCE`, `NOMAGENCE`, `ADRAGENCE`, `CPAGENCE`, `VILLEAGENCE`, `TELAGENCE`, `MAILAGENCE`, `LOGIN`, `MDP`) VALUES
(2, 'ADS', 'Agence du Soleil', '2 rue de la lune', 75011, 'Paris', '01-02-03-04-05', 'ads@az.com', 'AZ_ADS', 'agence'),
(3, 'AA', 'Agence anonyme', '10 avenue du pastis', 13000, 'Marseille', '04-01-02-03-04', 'peuchere@yahoo.fr', 'AZ_AA', 'agence');
