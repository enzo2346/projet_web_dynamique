DROP TABLE IF EXISTS `rendezvous`;
DROP TABLE IF EXISTS `profil`;
DROP TABLE IF EXISTS `administrateur`;
DROP TABLE IF EXISTS `personnel`;
DROP TABLE IF EXISTS `client`;
DROP TABLE IF EXISTS `utilisateurs`;
DROP TABLE IF EXISTS `calendrier`;

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
    `idclient` INT NOT NULL AUTO_INCREMENT,
    `emailclient` VARCHAR(50) NOT NULL,
    `nom` VARCHAR(50) NOT NULL,
    `prenom` VARCHAR(50) NOT NULL,
    `adresse` VARCHAR(50) NOT NULL,
    `ville` VARCHAR(50) NOT NULL,
    `codepostal` INT NOT NULL,
    `pays` VARCHAR(50) NOT NULL,
    `telephone` VARCHAR(50) NOT NULL,
    `cartevitale` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`idclient`)
);

CREATE TABLE `personnel` (
    `idpersonnel` INT NOT NULL AUTO_INCREMENT,
    `emailpersonnel` VARCHAR(50) NOT NULL,
    `nom` VARCHAR(50) NOT NULL,
    `prenom` VARCHAR(50) NOT NULL,
    `specialite` VARCHAR(50) NOT NULL,
    `telephone` VARCHAR(50) NOT NULL,
    `salle` VARCHAR(50) NOT NULL,
    `teams` VARCHAR(50) NOT NULL,
    `autres` TEXT, 
    `idprofil` INT NOT NULL,
    PRIMARY KEY (`idpersonnel`)
);

CREATE TABLE `administrateur` (
    `idadmin` INT NOT NULL AUTO_INCREMENT,
    `emailadministrateur` VARCHAR(50) NOT NULL,
    `nom` VARCHAR(50) NOT NULL,
    `prenom` VARCHAR(50) NOT NULL,
    `teams` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`idadmin`)
);

CREATE TABLE `profil` (
    `idprofil` INT NOT NULL,
    `cv` VARCHAR(50) NOT NULL,
    `video` VARCHAR(50) NOT NULL,
    `photo` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`idprofil`)
);

CREATE TABLE `rendezvous` (
    `idclient` INT NOT NULL,
    `idpersonnel` INT NOT NULL,
    `date` DATE NOT NULL,
    `creneau` INT NOT NULL,
    PRIMARY KEY (`idclient`,`date`,`creneau`)
);

CREATE TABLE `calendrier` (
    `idpersonnel` INT NOT NULL,
    `date` DATE NOT NULL,
    `creneau` INT NOT NULL,
    `statuscreneau` INT NOT NULL,
    PRIMARY KEY (`idpersonnel`,`date`,`creneau`)
);

ALTER TABLE utilisateurs ADD FOREIGN KEY (emailclient) REFERENCES client(emailclient);
ALTER TABLE utilisateurs ADD FOREIGN KEY (emailpersonnel) REFERENCES personnel(emailpersonnel);
ALTER TABLE utilisateurs ADD FOREIGN KEY (emailadministrateur) REFERENCES administrateur(emailadministrateur);

ALTER TABLE personnel ADD FOREIGN KEY (idprofil) REFERENCES profil(idprofil);

ALTER TABLE rendezvous ADD FOREIGN KEY (idclient) REFERENCES personnel(idclient);
ALTER TABLE rendezvous ADD FOREIGN KEY (idpersonnel) REFERENCES client(idpersonnel);

ALTER TABLE calendrier ADD FOREIGN KEY (idpersonnel) REFERENCES personnel(idpersonnel);