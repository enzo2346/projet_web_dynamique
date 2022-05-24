DROP TABLE IF EXISTS `rendezvous`;
DROP TABLE IF EXISTS `profil`;
DROP TABLE IF EXISTS `administrateur`;
DROP TABLE IF EXISTS `personnel`;
DROP TABLE IF EXISTS `client`;
DROP TABLE IF EXISTS `utilisateurs`;

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