ALTER TABLE `membre` ADD COLUMN `isAdmin` BOOL NOT NULL DEFAULT FALSE;

INSERT `membre` (`login`, `password`, `email`, `adresse`, `nom`, `prenom`, `codePostal`, `dateNaissance`, `imageProfil`, membre.`isAdmin`) VALUES
  ('admin', 'admin', 'admin@admin.com', '', 'admin', 'admin', 0, '0000-00-00', NULL, true);