ALTER TABLE `membre` ADD COLUMN `isAdmin` BOOL NOT NULL DEFAULT FALSE;

ALTER TABLE membre MODIFY password varchar(255) NOT NULL

INSERT `membre` (`login`, `password`, `email`, `adresse`, `nom`, `prenom`, `codePostal`, `dateNaissance`, `imageProfil`, membre.`isAdmin`) VALUES
  ('admin', '$2y$10$p8STZzS2k8kDqPJHlViE3eWKWt1qg5VAgT.aIxOinMmRsXVxvokqW', 'admin@admin.com', '', 'admin', 'admin', 0, '0000-00-00', NULL, true);