CREATE TABLE `utilisateurs` (
    `email` VARCHAR(50) NOT NULL,
    `typ` INT NOT NULL,
    `mdp` VARCHAR(50) NOT NULL,
    `emailclient` VARCHAR(50) NOT NULL,
    `emailpersonnel` VARCHAR(50) NOT NULL,
    `emailadministrateur` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`email`)
);

CREATE TABLE `client` (
    `emailclient` VARCHAR(50) NOT NULL,
    `nom` VARCHAR(50) NOT NULL,
    `prenom` VARCHAR(50) NOT NULL,
    `adresse` VARCHAR(50) NOT NULL,
    `ville` VARCHAR(50) NOT NULL,
    `codepostal` INT NOT NULL,
    `pays` VARCHAR(50) NOT NULL,
    `telephone` VARCHAR(50) NOT NULL,
    `cartevitale` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`emailclient`)
);

CREATE TABLE `personnel` (
    `emailpersonnel` VARCHAR(50) NOT NULL,
    `nom` VARCHAR(50) NOT NULL,
    `prenom` VARCHAR(50) NOT NULL,
    `specialite` VARCHAR(50) NOT NULL,
    `telephone` VARCHAR(50) NOT NULL,
    `salle` VARCHAR(50) NOT NULL,
    `teams` VARCHAR(50) NOT NULL,
    `autres` TEXT, 
    `idprofil` INT NOT NULL,
    PRIMARY KEY (`emailpersonnel`)
);

CREATE TABLE `administrateur` (
    `emailadministrateur` VARCHAR(50) NOT NULL,
    `nom` VARCHAR(50) NOT NULL,
    `prenom` VARCHAR(50) NOT NULL,
    `teams` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`emailadministrateur`)
);

CREATE TABLE `profil` (
    `idprofil` INT NOT NULL,
    `cv` VARCHAR(50) NOT NULL,
    `video` VARCHAR(50) NOT NULL,
    `photo` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`idprofil`)
);

CREATE TABLE `rendezvous` (
    `idrendezvous` INT NOT NULL,
    `debut` DATETIME NOT NULL,
    `fin` DATETIME NOT NULL,
    `emailclient` VARCHAR(50) NOT NULL,
    `emailpersonnel` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`idrendezvous`)
);

ALTER TABLE utilisateurs ADD FOREIGN KEY (emailclient) REFERENCES client(emailclient);
ALTER TABLE utilisateurs ADD FOREIGN KEY (emailpersonnel) REFERENCES personnel(emailpersonnel);
ALTER TABLE utilisateurs ADD FOREIGN KEY (emailadministrateur) REFERENCES administrateur(emailadministrateur);

ALTER TABLE personnel ADD FOREIGN KEY (idprofil) REFERENCES profil(idprofil);

ALTER TABLE rendezvous ADD FOREIGN KEY (emailpersonnel) REFERENCES personnel(emailpersonnel);
ALTER TABLE rendezvous ADD FOREIGN KEY (emailclient) REFERENCES client(emailclient);

-- Remplir table utilisateur
-- 2admin / 5 médecins généralistes / 16 médecins spécialisés / 6 services de labo / 3 clients
INSERT INTO `utilisateurs` (`email`,`typ`,`mdp`,`emailclient`,`emailpersonnel`,`emailadministrateur`) VALUES
('admin1@gmail.com',3,'mdp','pasclient','paspersonnel','admin1@gmail.com'),
('admin2@gmail.com',3,'mdp','pasclient','paspersonnel','admin2@gmail.com'),

('medecing1@gmail.com',2,'mdp','pasclient','medecing1@gmail.com','pasadmin'),
('medecing2@gmail.com',2,'mdp','pasclient','medecing2@gmail.com','pasadmin'),
('medecing3@gmail.com',2,'mdp','pasclient','medecing3@gmail.com','pasadmin'),
('medecing4@gmail.com',2,'mdp','pasclient','medecing4@gmail.com','pasadmin'),
('medecing5@gmail.com',2,'mdp','pasclient','medecing5@gmail.com','pasadmin'),

('medaddictologie1@gmail.com',2,'mdp','pasclient','medaddictologie1@gmail.com','pasadmin'),
('medaddictologie2@gmail.com',2,'mdp','pasclient','medaddictologie2@gmail.com','pasadmin'),
('medandrologie1@gmail.com',2,'mdp','pasclient','medandrologie1@gmail.com','pasadmin'),
('medandrologie2@gmail.com',2,'mdp','pasclient','medandrologie2@gmail.com','pasadmin'),
('medcardiologie1@gmail.com',2,'mdp','pasclient','medcardiologie1@gmail.com','pasadmin'),
('medcardiologie2@gmail.com',2,'mdp','pasclient','medcardiologie2@gmail.com','pasadmin'),
('meddermatologie1@gmail.com',2,'mdp','pasclient','meddermatologie1@gmail.com','pasadmin'),
('meddermatologie2@gmail.com',2,'mdp','pasclient','meddermatologie2@gmail.com','pasadmin'),
('medgastrohepatoenterologie1@gmail.com',2,'mdp','pasclient','medgastrohepatoenterologie1@gmail.com','pasadmin'),
('medgastrohepatoenterologie2@gmail.com',2,'mdp','pasclient','medgastrohepatoenterologie2@gmail.com','pasadmin'),
('medgynecologie1@gmail.com',2,'mdp','pasclient','medgynecologie1@gmail.com','pasadmin'),
('medgynecologie2@gmail.com',2,'mdp','pasclient','medgynecologie2@gmail.com','pasadmin'),
('medist1@gmail.com',2,'mdp','pasclient','medist1@gmail.com','pasadmin'),
('medist2@gmail.com',2,'mdp','pasclient','medist2@gmail.com','pasadmin'),
('medosteopatie1@gmail.com',2,'mdp','pasclient','medosteopatie1@gmail.com','pasadmin'),
('medosteopatie2@gmail.com',2,'mdp','pasclient','medosteopatie2@gmail.com','pasadmin'),

('servcovid19@gmail.com',2,'mdp','pasclient','servcovid19@gmail.com','pasadmin'),
('servpreventive@gmail.com',2,'mdp','pasclient','servpreventive@gmail.com','pasadmin'),
('servenceinte@gmail.com',2,'mdp','pasclient','servenciente@gmail.com','pasadmin'),
('servroutine@gmail.com',2,'mdp','pasclient','servroutine@gmail.com','pasadmin'),
('servcancerologie@gmail.com',2,'mdp','pasclient','servcancerologie@gmail.com','pasadmin'),
('servgynecologie@gmail.com',2,'mdp','pasclient','servgynecologie@gmail.com','pasadmin'),

('client1@gmail.com',1,'mdp','client1@gmail.com','paspersonnel','pasadmin'),
('client2@gmail.com',1,'mdp','client2@gmail.com','paspersonnel','pasadmin'),
('client3@gmail.com',1,'mdp','client3@gmail.com','paspersonnel','pasadmin');

-- Remplir table client

INSERT INTO `client` ( `emailclient`,`nom`,`prenom`,`adresse`,`ville`,`codepostal`,`pays`,`telephone`,`cartevitale`) VALUES
('client1@gmail.com','pierre','paul','37 quai de Grenelle','paris',75007,'france','+33 12 34 56 71','1 00 23 45 671'),
('client2@gmail.com','martin','celine','37 quai de Grenelle','paris',75007,'france','+33 12 34 56 72','1 00 23 45 672'),
('client3@gmail.com','dupraz','jean','37 quai de Grenelle','paris',75007,'france','+33 12 34 56 73','1 00 23 45 673');

-- Remplir table personnel

INSERT INTO `personnel` (`emailpersonnel`,`nom`,`prenom`,`specialite`,`telephone`,`salle`,`teams`,`idprofil`) VALUES
('medecing1@gmail.com','n','p','generaliste','06 11 11 11 01','EM-201','compte de chat',1),
('medecing2@gmail.com','n','p','generaliste','06 11 11 11 02','EM-202','compte de chat',2),
('medecing3@gmail.com','n','p','generaliste','06 11 11 11 03','EM-203','compte de chat',3),
('medecing4@gmail.com','n','p','generaliste','06 11 11 11 04','EM-204','compte de chat',4),
('medecing5@gmail.com','n','p','generaliste','06 11 11 11 05','EM-205','compte de chat',5),

('medaddictologie1@gmail.com','n','p','s','06 22 22 22 01','EM-241','compte de chat',6),
('medaddictologie2@gmail.com','n','p','s','06 22 22 22 02','EM-242','compte de chat',7),
('medandrologie1@gmail.com','n','p','s','06 22 22 22 03','EM-243','compte de chat',8),
('medandrologie2@gmail.com','n','p','s','06 22 22 22 04','EM-244','compte de chat',9),
('medcardiologie1@gmail.com','n','p','s','06 22 22 22 05','EM-245','compte de chat',10),
('medcardiologie2@gmail.com','n','p','s','06 22 22 22 06','EM-246','compte de chat',11),
('meddermatologie1@gmail.com','n','p','s','06 22 22 22 07','EM-247','compte de chat',12),
('meddermatologie2@gmail.com','n','p','s','06 22 22 22 08','EM-248','compte de chat',13),
('medgastrohepatoenterologie1@gmail.com','n','p','s','06 22 22 22 09','EM-249','compte de chat',14),
('medgastrohepatoenterologie2@gmail.com','n','p','s','06 22 22 22 10','EM-250','compte de chat',15),
('medgynecologie1@gmail.com','n','p','s','06 22 22 22 11','EM-251','compte de chat',16),
('medgynecologie2@gmail.com','n','p','s','06 22 22 22 12','EM-252','compte de chat',17),
('medist1@gmail.com','n','p','s','06 22 22 22 13','EM-253','compte de chat',18),
('medist2@gmail.com','n','p','s','06 22 22 22 14','EM-254','compte de chat',19),
('medosteopatie1@gmail.com','n','p','s','06 22 22 22 15','EM-255','compte de chat',20),
('medosteopatie2@gmail.com','n','p','s','06 22 22 22 16','EM-257','compte de chat',21),

('servcovid19@gmail.com','n','p','s','06 33 33 33 01 ','EM-256','compte de chat',22),
('servpreventive@gmail.com','n','p','s','06 33 33 33 02 ','EM-256','compte de chat',23),
('servenceinte@gmail.com','n','p','s','06 33 33 33 03 ','EM-256','compte de chat',24),
('servroutine@gmail.com','n','p','s','06 33 33 33 04 ','EM-256','compte de chat',25),
('servcancerologie@gmail.com','n','p','s','06 33 33 33 05 ','EM-256','compte de chat',26),
('servgynecologie@gmail.com','n','p','s','06 33 33 33 06 ','EM-256','compte de chat',27);


-- Remplir table admin

INSERT INTO `administrateur` (`emailadministrateur`,`nom`,`prenom`,`teams`) VALUES
('admin1@gmail.com','n','p','compte de chat'),
('admin2@gmail.com','n','p','compte de chat');

-- Remplir table profil

INSERT INTO `profil`(`idprofil`,`cv`,`video`,`photo`) VALUES
(1,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(2,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(3,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(4,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(5,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(6,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(7,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(8,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(9,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(10,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(11,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(12,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(13,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(14,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(15,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(16,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(17,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(18,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(19,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(20,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(21,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(22,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(23,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(24,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(25,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(26,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique'),
(27,'cv','https://yt.com','C:\wamp64\www\projet_web_dynamique');











