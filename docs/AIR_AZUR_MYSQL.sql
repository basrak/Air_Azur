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
   MDP VARCHAR(20) NOT NULL ,
   uSTATUS VARCHAR(10) NOT NULL,
   PRIMARY KEY (IDUSERS) 
 )
 ENGINE=INNODB;

# -----------------------------------------------------------------------------
#       TABLE : ADMINISTRATEURS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ADMINISTRATEUR
 (
   IDUSERS INTEGER(5) NOT NULL  ,
   MAILADMIN VARCHAR(30) NOT NULL  ,
   LOGIN VARCHAR(15) UNIQUE NOT NULL  ,
   MDP VARCHAR(20) NOT NULL,
   uSTATUS VARCHAR(10) NOT NULL,
   PRIMARY KEY (IDUSERS) 
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
   MDP VARCHAR(20) NOT NULL ,
   uSTATUS VARCHAR(10) NOT NULL,
   PRIMARY KEY (IDUSERS) 
 )ENGINE=INNODB;
 
# -----------------------------------------------------------------------------
#       TABLE : AEROPORT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS AEROPORT
 (
   IDARPT INTEGER(5) NOT NULL  auto_increment,
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
   IDVOL INTEGER(5) NOT NULL  auto_increment,
   DATEDEPART DATETIME NOT NULL  ,
   DATEARRIVEE DATETIME NOT NULL  ,
   PRIMARY KEY (IDVOL,DATEDEPART) 
 )ENGINE=INNODB;
 
# -----------------------------------------------------------------------------
#       TABLE : CLIENT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CLIENT
 (
   IDCLIENT INTEGER(5) NOT NULL  auto_increment,
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

INSERT INTO `users` (`IDUSERS`, `LOGIN`, `MDP`, `uSTATUS`) VALUES
(1, 'admin1', 'admin', 'admin'),
(2, 'admin2', 'admin', 'admin'),
(3, 'AZ_ADS', 'agence', 'agence'),
(4, 'AZ_AA', 'agence', 'agence');

INSERT INTO `administrateur` (`IDUSERS`, `MAILADMIN`, `LOGIN`, `MDP`, `uSTATUS`) VALUES
(1, 'admin@gmail.com', 'admin1', 'admin', 'admin'),
(2, 'admin@gmail.com', 'admin2', 'admin', 'admin');
	  
INSERT INTO `agence` (`IDUSERS`, `CODEAGENCE`, `NOMAGENCE`, `ADRAGENCE`, `CPAGENCE`, `VILLEAGENCE`, `TELAGENCE`, `MAILAGENCE`, `LOGIN`, `MDP`, `uSTATUS`) VALUES
(3, 'ADS', 'Agence du Soleil', '2 rue de la lune', 75011, 'Paris', '01-02-03-04-05', 'ads@az.com', 'AZ_ADS', 'agence', 'agence'),
(4, 'AA', 'Agence anonyme', '10 avenue du pastis', 13000, 'Marseille', '04-01-02-03-04', 'peuchere@yahoo.fr', 'AZ_AA', 'agence', 'agence');

INSERT INTO `aeroport` (`NOMARPT`, `VILLEARPT`) VALUES
('Alger', 'Algérie'),
('Amsterdam', 'Pays-Bas'),
('Athènes', 'Grèce'),
('Berlin','Allemagne'),
('Bruxelles','Belgique'),
('LeCap','Afrique du Sud'),
('Dakar','Sénégal'),
('Dublin','Irlande'),
('Doha','Qatar'),
('La Havane','Cuba'),
('Lima','Perou'),
('Lisbonne','Portugal'),
('Madrid','Espagne'),
('Moscou','Russie'),
('Mexico','Mexique'),
('Oslo','Norvege'),
('Paris CDG','France'),
('Paris Orly','France'),
('Rabat','Maroc'),
('Séoul','Corée du Sud'),
('Tokyo','Japon');

INSERT INTO `client`(`NOMCLIENT`, `PRENOMCLIENT`, `ADRCLIENT`, `CPCLIENT`, `VILLECLIENT`, `TELCLIENT`, `MAILCLIENT`) VALUES 
("Durand", "Alain", "1 rue de l'avenir", "75008", "Paris", "0102030405", "alain.durand@gmail.com"),
("Dupond", "Jean", "3 rue de l'abreuvoir", "69000", "Lyon", "0102030505", "jean.dupond@hotmail.com"),
("Poireau", "Robert", "58 boulevard du pré", "33000", "Bordeaux", "0502030405", "rpoireau@gmail.com"),
("Neymar", "Jean", "5 avenue du petit pont", "78100", "Saint Germain en Laye", "0105304051", "neymar@yahoo.com");

INSERT INTO `volgen` (`IDVOL`, `IDARPT`, `IDARPT_ARRIVEE`, `CODEVOL`, `PRIXVOL`, `PLACESVOL`, `JOURVOL`) VALUES
(1, 1, 2, 'AIR5001', '600.00', 120, 'lundi'),
(2, 1, 2, 'AIR5002', '600.00', 120, 'Mardi');

INSERT INTO `vol` (`IDVOL`, `DATEDEPART`, `DATEARRIVEE`) VALUES
(1, '2018-03-21 17:00:00', '2018-03-21 19:00:00'),
(1, '2018-04-21 18:00:00', '2018-04-21 19:00:00'),
(2, '2018-03-21 18:00:00', '2018-03-21 19:00:00'),
(2, '2018-04-21 18:00:00', '2018-04-21 19:00:00');