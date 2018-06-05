-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2018 at 07:44 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projetweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE `membre` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `adresse` varchar(200) DEFAULT NULL,
  `nom` varchar(200) DEFAULT NULL,
  `prenom` varchar(200) DEFAULT NULL,
  `codePostal` int(11) DEFAULT NULL,
  `dateNaissance` date DEFAULT NULL,
  `imageProfil` text,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `isBanned` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`id`, `login`, `password`, `email`, `adresse`, `nom`, `prenom`, `codePostal`, `dateNaissance`, `imageProfil`, `isAdmin`, `isBanned`) VALUES
(1, 'a', 'b', 'c', '', '', '', 0, '0000-00-00', NULL, 0, 0),
(2, 'd', 'q', 's', '', 'dzad', 'ad', 0, '0000-00-00', './uploads/download.jpg', 0, 0),
(3, 'test', 'test', 'dorian.scohier@gmail.com', '', '', '', 0, '0000-00-00', './uploads/Plage paradisiaque-1680x1050.jpg', 0, 0),
(4, 'admin', '$2y$10$p8STZzS2k8kDq', 'admin@admin.com', '', 'admin', 'admin', 0, '0000-00-00', NULL, 1, 0),
(5, 'antho', '$2y$10$4N1b382w7UEAqV0PNH02/eLkEreb5Do9/DbH9h64zwZFpzvkoet4G', 'anthonyroelandts@gmail.com', 'Rue Antoine Nys 22/1', 'Anthony', 'Roelandts', 1070, '1992-04-06', './uploads/Classy Ork.jpg', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `membre_connections`
--

CREATE TABLE `membre_connections` (
  `id` int(11) NOT NULL,
  `membre_id` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `membre_connections`
--

INSERT INTO `membre_connections` (`id`, `membre_id`, `start`, `end`) VALUES
(1, 1, '2018-06-02 16:22:45', '2018-06-02 17:15:32'),
(2, 1, '2018-06-02 17:15:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `total_price` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `price` float(10,2) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `created`, `modified`, `status`) VALUES
(1, 'test1', 'Premier article de test', 10.00, '2018-06-02 00:00:00', '2018-06-02 00:00:00', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Indexes for table `membre_connections`
--
ALTER TABLE `membre_connections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_MEMBRE` (`membre_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membre`
--
ALTER TABLE `membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `membre_connections`
--
ALTER TABLE `membre_connections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `membre_connections`
--
ALTER TABLE `membre_connections`
  ADD CONSTRAINT `FK_MEMBRE` FOREIGN KEY (`membre_id`) REFERENCES `membre` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 05 juin 2018 à 08:49
-- Version du serveur :  10.1.26-MariaDB
-- Version de PHP :  7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetweb2`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id_bil` int(11) NOT NULL,
  `titre_bil` varchar(25) NOT NULL,
  `texte_bil` text NOT NULL,
  `dateCreation_bil` date NOT NULL,
  `id_membre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billet`
--

INSERT INTO `post` (`id_bil`, `titre_bil`, `texte_bil`, `dateCreation_bil`, `id_membre`) VALUES
  (6, 'Quisque vestibulum justo', 'Quisque vestibulum justo lacus, tempor varius mi scelerisque sit amet. Nullam at aliquet risus. Sed sollicitudin nulla a facilisis semper. Nam sit amet lorem vel dui consequat iaculis. Aenean consequat est ut urna venenatis, quis aliquet sem blandit. Pellentesque ut tincidunt justo. Praesent tincidunt imperdiet ligula, ac elementum est pharetra a. In ullamcorper sapien dolor, nec rutrum quam congue ut. Donec sed augue id est iaculis mattis. Sed facilisis sapien sapien, at porta nisi ultricies in. Cras eu urna lacinia nibh vestibulum dapibus. Vivamus libero orci, sagittis vel velit id, volutpat vehicula purus. Sed bibendum dignissim nibh sit amet posuere.', '2018-05-14', 1),
  (7, 'Phasellus aliquam laoreet efficitur', 'Phasellus aliquam laoreet efficitur. Suspendisse in lorem ut risus egestas molestie. Quisque massa magna, aliquet eu nulla nec, molestie blandit mi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec nunc lacus, vulputate ut quam quis, venenatis viverra odio. Sed lacinia odio in turpis dictum, sit amet mollis nisl tempor. Duis dolor nisi, maximus eu iaculis vel, condimentum a libero. Maecenas laoreet sodales nisi, a varius ex faucibus a. Cras vel metus ex. Nulla est urna, bibendum sed est nec, viverra ultricies felis. Nunc varius faucibus rhoncus. Duis sodales purus et velit varius, in convallis ipsum condimentum. ', '2018-05-12', 1),
  (8, 'Mauris eu ornare tellus.', 'Phasellus aliquam laoreet efficitur. Suspendisse in lorem ut risus egestas molestie. Quisque massa magna, aliquet eu nulla nec, molestie blandit mi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec nunc lacus, vulputate ut quam quis, venenatis viverra odio. Sed lacinia odio in turpis dictum, sit amet mollis nisl tempor. Duis dolor nisi, maximus eu iaculis vel, condimentum a libero. Maecenas laoreet sodales nisi, a varius ex faucibus a. Cras vel metus ex. Nulla est urna, bibendum sed est nec, viverra ultricies felis. Nunc varius faucibus rhoncus. Duis sodales purus et velit varius, in convallis ipsum condimentum.', '2018-05-16', 1),
  (9, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec lectus lacus, accumsan id mi nec, euismod lacinia odio. Vivamus sit amet semper ante, sit amet auctor quam. Fusce lobortis aliquet neque sed pellentesque. Integer neque lorem, convallis ac dignissim in, mattis sed metus. Curabitur rutrum leo at est tristique, id scelerisque ipsum mattis. Donec bibendum dictum suscipit. Maecenas ornare ex sit amet commodo rhoncus.', '2017-05-14', 1);

-- --------------------------------------------------------


-- --------------------------------------------------------

--
-- Table structure for table `commentaire`
--

CREATE TABLE `comment` (
  `id_com` int(11) NOT NULL,
  `date_com` date NOT NULL,
  `texte_com` text NOT NULL,
  `id_bil` int(11) NOT NULL,
  `id_membre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commentaire`
--

INSERT INTO `comment` (`id_com`, `date_com`, `texte_com`, `id_bil`, `id_membre`) VALUES
  (1, '2018-05-15', 'Bonjour', 6, 1),
  (2, '2018-05-15', 'Salut tout le monde', 7, 1),
  (3, '2018-05-15', 'first hahaha !!', 8, 1),
  (4, '2018-05-15', 'hey everybody', 6, 2),
  (5, '2018-05-15', 'lorem ipsum ', 6, 3);

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Table structure for table `tchat`
--

CREATE TABLE `chat` (
  `id_ch` int(11) NOT NULL,
  `date_ch` date NOT NULL,
  `texte_ch` varchar(25) NOT NULL,
  `id_membre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tchat`
--

INSERT INTO `chat` (`id_ch`, `date_ch`, `texte_ch`, `id_membre`) VALUES
  (1, '2017-06-14', 'hello everybody', 1),
  (2, '2017-06-14', 'tell me ?', 2),
  (3, '2017-06-14', 'bonjour, je suis martin', 2),
  (4, '2017-06-14', 'Bonjour martin', 3);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_bil`),
  ADD UNIQUE KEY `titre_bil` (`titre_bil`),
  ADD KEY `FK_billet_id_uti` (`id_membre`);


--
-- Indexes for table `commentaire`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_com`),
  ADD KEY `FK_commentaire_id_bil` (`id_bil`),
  ADD KEY `FK_commentaire_id_uti` (`id_membre`);

--
-- Indexes for table `tchat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_ch`),
  ADD KEY `FK_tchat_id_uti` (`id_membre`);

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_post_id_membre` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `commentaire`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_comment_id_bil` FOREIGN KEY (`id_bil`) REFERENCES `post` (`id_bil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_comment_id_membre` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `FK_chat_id_membre` FOREIGN KEY (`id_membre`) REFERENCES `membre` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;
