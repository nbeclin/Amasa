ALTER TABLE `animal` ADD `type` VARCHAR(20) NOT NULL AFTER `okEnfant`;

UPDATE `animal` SET `type` = 'chien' WHERE `categorie` = 'adoptionChien';
UPDATE `animal` SET `type` = 'chat' WHERE `categorie` = 'adoptionChat';
UPDATE `animal` SET `type` = 'chat' WHERE `categorie` = 'adoptionChaton';
UPDATE `animal` SET `categorie` = 'adoption' WHERE `categorie` = 'adoptionChat';
UPDATE `animal` SET `categorie` = 'adoption' WHERE `categorie` = 'adoptionChaton';
UPDATE `animal` SET `categorie` = 'adoption' WHERE `categorie` = 'adoptionChien';