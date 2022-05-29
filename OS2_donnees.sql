
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
('medecing1@gmail.com','Mercure','Alain','generaliste','06 11 11 11 01','EM-201','compte de chat',1),
('medecing2@gmail.com','Du Trieux','Roger','generaliste','06 11 11 11 02','EM-202','compte de chat',2),
('medecing3@gmail.com','Thivierge','Garland','generaliste','06 11 11 11 03','EM-203','compte de chat',3),
('medecing4@gmail.com','LaCaille','Landers','generaliste','06 11 11 11 04','EM-204','compte de chat',4),
('medecing5@gmail.com','Bourgouin','Alain','generaliste','06 11 11 11 05','EM-205','compte de chat',5),

('medaddictologie1@gmail.com','Labrie','Moore','addictologie','06 22 22 22 01','EM-241','compte de chat',6),
('medaddictologie2@gmail.com','Lefevre','Auguste','addictologie','06 22 22 22 02','EM-242','compte de chat',7),
('medandrologie1@gmail.com','Laframboise','Alexandre','andrologie','06 22 22 22 03','EM-243','compte de chat',8),
('medandrologie2@gmail.com','Lagrange','Burell','andrologie','06 22 22 22 04','EM-244','compte de chat',9),
('medcardiologie1@gmail.com','Bousquet','Sargent','cardiologie','06 22 22 22 05','EM-245','compte de chat',10),
('medcardiologie2@gmail.com','Laurent','Claude','cardiologie','06 22 22 22 06','EM-246','compte de chat',11),
('meddermatologie1@gmail.com','Chastain','Iva','dermatologie','06 22 22 22 07','EM-247','compte de chat',12),
('meddermatologie2@gmail.com','Couet','David','dermatologie','06 22 22 22 08','EM-248','compte de chat',13),
('medgastrohepatoenterologie1@gmail.com','Cinq-Mars','Gaston','gastro-hepato-enterologie','06 22 22 22 09','EM-249','compte de chat',14),
('medgastrohepatoenterologie2@gmail.com','Briard','Chappell','gastro-hepato-enterologie','06 22 22 22 10','EM-250','compte de chat',15),
('medgynecologie1@gmail.com','LHiver','Mallory','gynecologie','06 22 22 22 11','EM-251','compte de chat',16),
('medgynecologie2@gmail.com','Dupont','Germain','gynecologie','06 22 22 22 12','EM-252','compte de chat',17),
('medist1@gmail.com','Moreau','Laurette','ist','06 22 22 22 13','EM-253','compte de chat',18),
('medist2@gmail.com','Aubé','Alphonse','ist','06 22 22 22 14','EM-254','compte de chat',19),
('medosteopatie1@gmail.com','Veilleux','Dominique','osteopatie','06 22 22 22 15','EM-255','compte de chat',20),
('medosteopatie2@gmail.com','Rousseau','Alice','osteopatie','06 22 22 22 16','EM-257','compte de chat',21),

('servcovid19@gmail.com','Jetté','Claude','Dépistage covid-19','06 33 33 33 01 ','EM-256','compte de chat',22),
('servpreventive@gmail.com','Duval','Astrid','Biologie préventive','06 33 33 33 02 ','EM-256','compte de chat',23),
('servenceinte@gmail.com','Roussel','Raina','Biologie de la femme enceinte','06 33 33 33 03 ','EM-256','compte de chat',24),
('servroutine@gmail.com','Tougas','Raoul','Biologie de routine','06 33 33 33 04 ','EM-256','compte de chat',25),
('servcancerologie@gmail.com','Grignon','Kerman','Cancérologie','06 33 33 33 05 ','EM-256','compte de chat',26),
('servgynecologie@gmail.com','Lépicier','Michel','Gynécologie','06 33 33 33 06 ','EM-256','compte de chat',27);


-- Remplir table admin

INSERT INTO `administrateur` (`emailadministrateur`,`nom`,`prenom`,`teams`) VALUES
('admin1@gmail.com','Desroches','Franck','compte de chat'),
('admin2@gmail.com','Tollmache','Aurore','compte de chat');

-- Remplir table profil

INSERT INTO `profil`(`idprofil`,`cv`,`video`,`photo`) VALUES
(1,'cv1.xml','https://yt.com','images/icon1.jpg'),
(2,'cv2.xml','https://yt.com','images/icon2.jpg'),
(3,'cv3.xml','https://yt.com','images/icon3.jpg'),
(4,'cv4.xml','https://yt.com','images/icon4.jpg'),
(5,'cv5.xml','https://yt.com','images/icon5.jpg'),
(6,'cv6.xml','https://yt.com','images/icon6.jpg'),
(7,'cv7.xml','https://yt.com','images/icon7.jpg'),
(8,'cv8.xml','https://yt.com','images/icon8.jpg'),
(9,'cv9.xml','https://yt.com','images/icon9.jpg'),
(10,'cv10.xml','https://yt.com','images/icon1.jpg'),
(11,'cv11.xml','https://yt.com','images/icon2.jpg'),
(12,'cv12.xml','https://yt.com','images/icon3.jpg'),
(13,'cv13.xml','https://yt.com','images/icon4.jpg'),
(14,'cv14.xml','https://yt.com','images/icon5.jpg'),
(15,'cv15.xml','https://yt.com','images/icon6.jpg'),
(16,'cv16.xml','https://yt.com','images/icon7.jpg'),
(17,'cv17.xml','https://yt.com','images/icon8.jpg'),
(18,'cv18.xml','https://yt.com','images/icon9.jpg'),
(19,'cv19.xml','https://yt.com','images/icon1.jpg'),
(20,'cv20.xml','https://yt.com','images/icon2.jpg'),
(21,'cv21.xml','https://yt.com','images/icon3.jpg'),
(22,'cv22.xml','https://yt.com','images/icon4.jpg'),
(23,'cv23.xml','https://yt.com','images/icon5.jpg'),
(24,'cv24.xml','https://yt.com','images/icon6.jpg'),
(25,'cv25.xml','https://yt.com','images/icon7.jpg'),
(26,'cv26.xml','https://yt.com','images/icon8.jpg'),
(27,'cv27.xml','https://yt.com','images/icon9.jpg');
