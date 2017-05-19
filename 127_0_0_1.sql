-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 08 Mai 2017 à 13:07
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ecommerce-symfony3`
--
CREATE DATABASE IF NOT EXISTS `ecommerce-symfony3` DEFAULT CHARACTER SET utf8 COLLATE utf8_german2_ci;
USE `ecommerce-symfony3`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`, `image_id`) VALUES
(1, 'Automobile', 8),
(2, 'Jeux video et console', 6),
(3, 'Higt-Tech', 3),
(4, 'Mobile et telephone', 3),
(5, 'Vetements', 3),
(6, 'Sports', 3);

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(11) NOT NULL,
  `valider` tinyint(1) NOT NULL,
  `date` datetime NOT NULL,
  `reference` int(11) NOT NULL,
  `produits` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `commandes`
--

INSERT INTO `commandes` (`id`, `valider`, `date`, `reference`, `produits`) VALUES
(1, 1, '2017-04-17 03:14:57', 1, 'a:3:{i:0;a:1:{i:1;s:1:"2";}i:1;a:1:{i:2;s:1:"1";}i:2;a:1:{i:4;s:1:"5";}}'),
(2, 1, '2017-04-17 03:14:57', 2, 'a:3:{i:0;a:1:{i:1;s:1:"2";}i:1;a:1:{i:2;s:1:"1";}i:2;a:1:{i:4;s:1:"5";}}');

-- --------------------------------------------------------

--
-- Structure de la table `commentd`
--

CREATE TABLE `commentd` (
  `id_com` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `id_Produit` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `contenu` text COLLATE utf8_german2_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

-- --------------------------------------------------------

--
-- Structure de la table `data`
--

CREATE TABLE `data` (
  `iddata` int(11) NOT NULL,
  `idUser` int(11) DEFAULT NULL,
  `idProduit` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  `_data_adrre` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Contenu de la table `data`
--

INSERT INTO `data` (`iddata`, `idUser`, `idProduit`, `quantite`, `_data_adrre`) VALUES
(1, 6, 0, 67, 0),
(2, 6, 0, 7, 0),
(3, 6, 9, 2, 1),
(4, 6, 4, 3, 37),
(5, 6, 4, 2, 37),
(6, 6, 16, 1, 37),
(7, 6, 9, 2, 37),
(8, 6, 7, 4, 37),
(9, 6, 12, 1, 37),
(10, 6, 4, 3, 38),
(11, 6, 4, 2, 38),
(12, 6, 16, 1, 38),
(13, 6, 9, 2, 38),
(14, 6, 7, 4, 38),
(15, 6, 12, 1, 38),
(16, 6, 2, 1, 43),
(17, 6, 1, 1, 51),
(18, 3, 10, 1, 52),
(19, 3, 14, 2, 52),
(20, 3, 9, 2, 52),
(21, 3, 1, 1, 53),
(22, 3, 44, 2, 53),
(23, 3, 9, 1, 53),
(24, 6, 14, 1, 54),
(25, 6, 1, 1, 54),
(26, 6, 7, 1, 55),
(27, 6, 1, 1, 57),
(28, 6, 2, 1, 63);

-- --------------------------------------------------------

--
-- Structure de la table `data_adrs`
--

CREATE TABLE `data_adrs` (
  `id_briefing` int(11) NOT NULL,
  `Adresse livraison` text COLLATE utf8_german2_ci,
  `Adresse facturation` text COLLATE utf8_german2_ci,
  `idFacture` int(11) NOT NULL,
  `Prix` int(11) NOT NULL,
  `livre` tinyint(1) DEFAULT NULL,
  `Date_livraison_prevue` timestamp NULL DEFAULT NULL,
  `Date_de_commande` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Contenu de la table `data_adrs`
--

INSERT INTO `data_adrs` (`id_briefing`, `Adresse livraison`, `Adresse facturation`, `idFacture`, `Prix`, `livre`, `Date_livraison_prevue`, `Date_de_commande`) VALUES
(63, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Fatima  Diani  - Nevksdbjc dgvcjhkqsbjdc ghdvcjhsdb France 98000 Tel : 78', 132, 93157, NULL, NULL, '2017-05-05 11:17:04'),
(62, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 131, 0, NULL, NULL, '2017-05-05 06:06:41'),
(61, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 130, 0, NULL, NULL, '2017-05-05 06:03:37'),
(60, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 129, 0, NULL, NULL, '2017-05-05 06:03:06'),
(59, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 128, 0, NULL, NULL, '2017-05-05 06:02:51'),
(58, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 127, 0, NULL, NULL, '2017-05-05 05:39:10'),
(57, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 126, 0, NULL, NULL, '2017-05-05 05:37:36'),
(56, 'Pascal  Viyou  - Une allée des démoiselles d\'Avignon  Nanterre France 92000 Tel : 6', 'Pascal  Viyou  - Une allée des démoiselles d\'Avignon  Nanterre France 92000 Tel : 6', 125, 0, NULL, NULL, '2017-05-05 02:34:50'),
(55, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 124, 1629, NULL, NULL, '2017-05-05 01:32:25'),
(54, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 123, 99880, NULL, NULL, '2017-05-05 00:48:52'),
(53, 'Pauliette  Pauline   - 04 Saint Jean bouffeau  Nancy Frane 15009 Tel : 78', 'Pauliette  Pauline   - 04 Saint Jean bouffeau  Nancy Frane 15009 Tel : 78', 122, 192891, NULL, NULL, '2017-05-03 06:58:48'),
(52, 'Pauliette  Pauline   - 04 Saint Jean bouffeau  Nancy Frane 15009 Tel : 78', 'Pauliette  Pauline   - 04 Saint Jean bouffeau  Nancy Frane 15009 Tel : 78', 118, 11713, NULL, NULL, '2017-05-03 02:15:29'),
(51, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 117, 96038, NULL, NULL, '2017-05-03 02:03:16'),
(50, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 116, 93157, NULL, NULL, '2017-05-03 02:01:51'),
(49, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 115, 93157, NULL, NULL, '2017-05-03 01:59:42'),
(48, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 114, 93157, NULL, NULL, '2017-05-03 01:51:37'),
(47, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 113, 93157, NULL, NULL, '2017-05-03 01:51:12'),
(46, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 112, 93157, NULL, NULL, '2017-05-03 01:08:45'),
(45, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 111, 93157, NULL, NULL, '2017-05-03 01:06:49'),
(44, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 110, 93157, NULL, NULL, '2017-05-03 01:06:20'),
(43, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 109, 93157, NULL, NULL, '2017-05-03 01:04:31'),
(42, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 108, 21592, NULL, NULL, '2017-05-03 01:01:53'),
(41, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 107, 21592, NULL, NULL, '2017-05-03 00:56:54'),
(40, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 106, 21592, NULL, NULL, '2017-05-03 00:56:19'),
(39, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 105, 21592, NULL, NULL, '2017-05-03 00:55:19'),
(38, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 104, 21592, NULL, NULL, '2017-05-03 00:51:27'),
(37, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 103, 21592, NULL, NULL, '2017-05-03 00:43:38'),
(36, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 102, 21592, NULL, NULL, '2017-05-03 00:42:20'),
(35, 'Lionnel  Messi  - Avenue de la fayette Rue N° 101 Paris France 55800 Tel : 06 88 55 22 11', 'Christiano  Ronaldo  - Une Allée de la marine  Appt 1005  Lyon France 32580 Tel : 01 99 66 33 22 ', 101, 21592, NULL, NULL, '2017-05-03 00:42:09');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `idFacture` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `PrixFacture` double NOT NULL,
  `Reference` bigint(20) NOT NULL,
  `Livré` varchar(256) COLLATE utf8_german2_ci NOT NULL DEFAULT 'En cours de livraison'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Contenu de la table `facture`
--

INSERT INTO `facture` (`idFacture`, `idUser`, `Date`, `PrixFacture`, `Reference`, `Livré`) VALUES
(124, 6, '2017-05-05 01:32:25', 1629.3, 1493947945, 'Expedier'),
(123, 6, '2017-05-05 00:48:52', 99879.94, 1493945331, 'Expedier'),
(122, 3, '2017-05-03 06:58:48', 192891.42, 1493794727, 'Expedier'),
(121, 7, '2017-05-03 06:57:02', 96038.42, 1493794621, 'Expedier'),
(120, 7, '2017-05-03 06:56:01', 96038.42, 1493794560, 'En cours de livraison'),
(119, 7, '2017-05-03 06:55:45', 96038.42, 1493794544, 'En cours de livraison'),
(103, 6, '2017-05-03 00:43:38', 21591.86, 1493772217, 'En cours de livraison'),
(102, 6, '2017-05-03 00:42:20', 21591.86, 1493772139, 'Livrer'),
(101, 6, '2017-05-03 00:42:09', 21591.86, 1493772128, 'En cours de livraison'),
(125, 7, '2017-05-05 02:34:50', 0, 1493951690, 'En cours de livraison'),
(126, 6, '2017-05-05 05:37:36', 0, 1493962655, 'En cours de livraison'),
(127, 6, '2017-05-05 05:39:10', 0, 1493962749, 'En cours de livraison'),
(128, 6, '2017-05-05 06:02:51', 0, 1493964169, 'Expedier'),
(129, 6, '2017-05-05 06:03:06', 0, 1493964185, 'En cours de livraison'),
(130, 6, '2017-05-05 06:03:37', 0, 1493964216, 'En cours de livraison'),
(131, 6, '2017-05-05 06:06:41', 0, 1493964400, 'En cours de livraison'),
(132, 6, '2017-05-05 11:17:04', 93157.26, 1493983023, 'En cours de livraison');

-- --------------------------------------------------------

--
-- Structure de la table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `media`
--

INSERT INTO `media` (`id`, `path`, `alt`) VALUES
(1, 'http://voices.nationalgeographic.com/files/2015/11/Holy-Stone%C2%AE-RC-Quadcopter-Drone-with-HD-Camera-600x338.jpg', 'Drone'),
(2, 'http://voices.nationalgeographic.com/files/2015/11/Holy-Stone%C2%AE-RC-Quadcopter-Drone-with-HD-Camera-600x338.jpg', 'Drone'),
(3, 'http://www.netpublic.fr/wp-content/uploads/2015/02/drone.jpg', 'NetPublic drone'),
(4, 'http://static.lexpress.fr/medias_10645/w_945,h_709,c_crop,x_126,y_0/w_640,h_358,c_fill,g_center/v1445510876/nike-a-annonce-que-ses-baskets-a-lacage-automatique-seront-vendues-aux-encheres-au-printemps-2016_5450285.jpg', 'Sneaker nike'),
(5, 'http://www.origines-parfums.com/content/product_9136761hd.jpg', 'Parfum Dior'),
(6, 'http://media.meltystyle.fr/article-3329976-fb/playstation-5-date-de-sortie-ps5-ps4-slim.jpg', 'Playstation 5'),
(7, 'https://www.forbes.fr/wp-content/uploads/2017/04/iphone-8-fuites-de-chez-apple.jpg', 'Iphone 8'),
(8, 'http://www.favorisxp.com/fond-ecran/voiture-cars-wallpapers/koenigsegg-ccx-fond-ecran-voiture-de-sport.jpg', 'BMW ligth air '),
(9, 'https://s-media-cache-ak0.pinimg.com/564x/4a/38/b7/4a38b7a8b1713fc9b0cd5262d2f6f968.jpg', 'Vetement femme'),
(10, 'http://www.surmesurepascher.com/cpimg/06122012134918b.jpg', 'veste homme'),
(11, 'http://www.luimagazine.fr/wp-content/uploads/2015/06/parfum-homme-boss-bottled.jpg', 'parfun homme'),
(12, 'http://cdn.gemperles.com/media/catalog/product/cache/1/small_image/400x346/bbc5a75aa9b507e77d240bd05470eea8/s/d/sdy034-1_1.jpg', 'bague de mariage femme'),
(13, 'https://encrypted-tbn3.gstatic.com/images?q=tbn:ANd9GcTCmraJn6aZDsjcraX1tDqIRRP4Is7Dx4rppRmxwKwdMZUy8EOa', 'Talon femme'),
(14, 'http://www.snut.fr/wp-content/uploads/2015/10/image-de-voiture-de-course.jpg', 'Voiture de luxe : Ferrari'),
(15, 'http://o.aolcdn.com/commerce/autodata/images/USC50FRC201A021001.jpg', 'Voiture de luxe : Ferrari'),
(16, 'http://www.mazdaplasencia.com/img/360/mazda-3-sedan/rojo/m6.png', 'Mazda droid 6 '),
(17, 'https://static.rentacar.fr/images/cms_uploaded/pages/hub-vehicule/vp/locatio-voiture-rentacar-qashqai.png', 'Rent A Car Sa Model:Yzly loop PL8'),
(18, 'https://static.rentacar.fr/images/cms_uploaded/pages/hub-vehicule/vp/location-voiture-luxe-rentacar.png', 'Rent A Car Sa Model:Ligth car Wp9'),
(19, 'http://media.melty.fr/article-2558138-fb/ps4-sony-console.jpg', 'Playstation 4'),
(20, 'http://www.gqmagazine.fr/uploads/images/thumbs/201629/99/une_date_de_sortie_pour_la_xbox_one_s_en_france_1549_north_780x_white.png', 'XXBox Revolution'),
(21, 'http://i2.cdscdn.com/pdt2/1/1/3/1/700x700/auc0326233000113/rw/lunettes-video-pour-console-ecran-virtuel-de-72.jpg', 'RealGame GetForce FX'),
(22, 'http://www.infos-mobiles.com/wp-content/uploads/2014/07/le-concept-d-iwatch-d-aturio-rose.jpg', 'La montre du futur'),
(23, 'http://gadgetsin.com/uploads/2012/02/concept_magic_macbook_pro_3.jpg', 'God Computer'),
(24, 'http://www.appgame.com/wp-content/uploads/2016/01/PlayStation-VR-20160120-t.jpg', 'Playstation VR : YourWorld '),
(25, 'https://www.dpreview.com/files/p/articles/5703485458/24547595003_7a6b8e8c9e_k.jpg', 'Samsung S7'),
(26, 'http://wimages.vr-zone.net/2016/01/Huawei-P9.jpg', 'Huawei P9'),
(27, 'http://sport.foot007.fr/pic/Nike-Mercurial/Crampon-Nike-Mercurial-Vert-1.jpg', 'Crampon Nike Mecurial Vert');

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `page`
--

INSERT INTO `page` (`id`, `titre`, `contenu`) VALUES
(1, 'CGV', '<div class="row">\r\n<h2 style="font-style:italic">Item Brand and Category<img alt="wink" src="http://127.0.0.1:8000/ckeditor/plugins/smiley/images/wink_smile.png" style="height:23px; width:23px" title="wink" /></h2>\r\n\r\n<h5>AB29837 Item Model</h5>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry &#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n\r\n<div class="row">\r\n<h4>Item Brand and Category</h4>\r\n\r\n<h5>AB29837 Item Model</h5>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n\r\n<div class="row">\r\n<h4>Item Brand and Category</h4>\r\n\r\n<h5>AB29837 Item Model</h5>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>'),
(2, 'Mentions légales', '<div class="row">\r\n                <h4>Item Brand and Category</h4>\r\n                <h5>AB29837 Item Model</h5>\r\n                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry \'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n            </div>\r\n            <div class="row">\r\n                <h4>Item Brand and Category</h4>\r\n                <h5>AB29837 Item Model</h5>\r\n                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n            </div>\r\n            <div class="row">\r\n                <h4>Item Brand and Category</h4>\r\n                <h5>AB29837 Item Model</h5>\r\n                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n            </div>'),
(3, 'Test 3', 'Test admin - Back end');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `id` int(11) NOT NULL,
  `contenu` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `panier_user`
--

CREATE TABLE `panier_user` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `panier_user`
--

INSERT INTO `panier_user` (`id`, `id_user`, `quantite`, `id_produit`) VALUES
(3, 4, 1, 11),
(12, 6, 2, 12);

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `prix` double NOT NULL,
  `disponible` tinyint(1) NOT NULL,
  `categorie` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tva` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `produits`
--

INSERT INTO `produits` (`id`, `nom`, `description`, `prix`, `disponible`, `categorie`, `image`, `tva`) VALUES
(1, 'XBenz 3280', 'Au bord non d\'un vehicule mais du meileur quui puisse exister', 40000, 1, '1', '8', 2),
(2, 'Ferrari Xyz9800', 'Le meilleur confort au bord d\'un vehicule à 4 chevaux', 38800, 1, '1', '14', 2),
(3, 'Ferrari beast', 'Un vehicule indefiable : Cinq mètre en un quart de seconde, batisé la bète', 790000, 1, '1', '15', 2),
(5, 'Ligth car Wp9', 'Incarne Luxe et Respect en un seul regard ', 69999.99, 1, '1', '18', 2),
(6, 'Yzly loop PL8', 'Ideal pour une sortie agréable nen famille', 49998.99, 1, '1', '17', 2),
(7, 'Playstation 5', 'La console du futur', 799.99, 1, '2', '6', 1),
(8, 'Playstation 4', 'La nouvelle PS4, la console la plus vendue au monde,\r\n         en version plus fine : un concentré de puissance de jeu en versions 500 Go et 1 To.\r\n          Disponible en Jet Black dès maintenant. Disponible en Glacier White à partir du 24 janvier.', 399.99, 1, '2', '19', 2),
(9, 'XXBox Revolution', 'Welcome to the Future of Play', 399.99, 1, '2', '20', 1),
(10, 'RealGame GetForce FX', 'Sois vigilent, ça commence quand on ne s\'y attend pas, une véritable passion', 999.99, 1, '2', '21', 2),
(11, 'La Montre du Futur', 'Une montre unique en son genre', 1999.99, 1, '3', '22', 1),
(12, 'God Computer', 'Ultimate computer', 3999.99, 1, '3', '23', 2),
(13, 'Playstation VR : YourWorld ', 'Le PlayStation VR est le nouveau venu de la famille PS4, \r\n        alors quelle que soit la console PS4 que vous possédez, vous êtes prêt pour le PS VR :\r\n         connectez le casque-micro à votre PS4, ajoutez une PlayStation Camera* et oubliez le\r\n          monde réel.', 1999.99, 1, '3', '24', 1),
(14, 'Iphone 8', 'Il n\'est pas juste le meilleur mais il demeure le meilleur', 1599.99, 1, '4', '7', 2),
(15, 'Samsung S7', 'Plus qu\'un smartphone : Avec les Galaxy S7,\r\n         nous avons transformé la manière de vivre et partager vos meilleures \r\n         expériences. Plongez dans une toute nouvelle dimension et dépassez vos limites.', 1699.99, 1, '4', '25', 2),
(16, 'Huawei P9', 'LA PHOTOGRAPHIE SUR SMARTPHONE RÉINVENTÉE .', 1599.99, 1, '4', '26', 2),
(44, 'Droid d57', 'L\'ideal pour les business men', 19999.99, 1, '1', '16', 2);

-- --------------------------------------------------------

--
-- Structure de la table `tva`
--

CREATE TABLE `tva` (
  `id` int(11) NOT NULL,
  `multiplicate` double NOT NULL,
  `nom` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `valeur` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `tva`
--

INSERT INTO `tva` (`id`, `multiplicate`, `nom`, `valeur`) VALUES
(1, 0.982, 'Tva 1.75', 1.75),
(2, 0.833, 'Tva 20%', 20);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `username_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `email_canonical` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)',
  `panier` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `panier`) VALUES
(1, 'benjamin', 'benjamin', 'benjamin@gmail.com', 'benjamin@gmail.com', 1, NULL, '$2y$13$dQcDEi6rsW.guG5riMUIlupZqA64q0T.8IurWXyHJVjwyh82YkIN6', NULL, NULL, NULL, 'a:0:{}', 'a:0:{}'),
(2, 'mathilde', 'mathilde', 'mathilde@gmail.com', 'mathilde@gmail.com', 1, NULL, '$2y$13$Bc1valxjxZQNzULWflG7UegCj5P7BHUf56vlk4gnCbxDCB4yTMPIC', NULL, NULL, NULL, 'a:0:{}', 'a:0:{}'),
(3, 'pauline', 'pauline', 'pauline@gmail.com', 'pauline@gmail.com', 1, NULL, '$2y$13$57Y7nNwjW8iCz.24NYkRhOEgYQ46KcE6vIsvxrtTVpYcjGbhOtlHe', '2017-05-03 09:00:13', NULL, NULL, 'a:0:{}', 'a:0:{}'),
(4, 'tiffany', 'tiffany', 'tiffany@gmail.com', 'tiffany@gmail.com', 1, NULL, '$2y$13$gnUgLeazVHlhgZpopd5g7OxEBWxjBTV93I4Tf3aOen/VbsphY6RiK', NULL, NULL, NULL, 'a:0:{}', 'a:0:{}'),
(5, 'dominique', 'dominique', 'dominique@gmail.com', 'dominique@gmail.com', 1, NULL, '$2y$13$dNfHs9wrmIiw4RwRS3XC9OeNaDbmFQqQZ1ZkyrB4fW9C9lDx/H2r6', '2017-04-22 04:43:30', NULL, NULL, 'a:0:{}', 'a:0:{}'),
(6, 'toto', 'toto', 'toto@gmail.com', 'toto@gmail.com', 1, NULL, '$2y$13$fbI4Rf0h2LsfoufUot9ioeAqeC4LR7KIJvUp0dVfMSqIib7s.vueW', '2017-05-08 12:01:57', NULL, NULL, 'a:0:{}', 'a:0:{}'),
(7, 'williams', 'williams', 'williamsviyou97@gmail.com', 'williamsviyou97@gmail.com', 1, NULL, '$2y$13$WapNNq7CoUPFx28BepObceiVZ.DyKp2igu94p54TZp6/SZesg1tMe', '2017-05-05 13:10:11', NULL, NULL, 'a:1:{i:0;s:10:"ROLE_ADMIN";}', 'N;');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_adresse`
--

CREATE TABLE `utilisateur_adresse` (
  `id` int(11) NOT NULL,
  `nom` varchar(125) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_User` int(11) NOT NULL,
  `Adresse` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Complement` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Ville` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Pays` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CodePostal` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `Tel` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `facturation` tinyint(1) NOT NULL DEFAULT '0',
  `livraison` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `utilisateur_adresse`
--

INSERT INTO `utilisateur_adresse` (`id`, `nom`, `prenom`, `id_User`, `Adresse`, `Complement`, `Ville`, `Pays`, `CodePostal`, `Tel`, `facturation`, `livraison`) VALUES
(1, 'Catelain', 'Benjamin', 0, '', '', '', '', '', '', 0, 1),
(2, 'premier', 'albert', 0, '', '', '', '', '', '', 0, 1),
(3, 'Yakuno', 'Yumi', 0, '', '', '', '', '', '', 0, 1),
(13, 'Messi', 'Lionnel', 6, 'Avenue de la fayette', 'Rue N° 101', 'Paris', 'France', '55800', '06 88 55 22 11', 0, 1),
(15, 'Pauline ', 'Pauliette', 3, '04 Saint Jean bouffeau', '', 'Nancy', 'Frane', '15009', '78', 1, 1),
(16, 'Viyou', 'Pascal', 7, 'Une allée des démoiselles d\'Avignon', '', 'Nanterre', 'France', '92000', '6', 1, 1),
(17, 'Diani', 'Fatima', 6, 'Nevksdbjc', 'dgvcjhkqsbjdc', 'ghdvcjhsdb', 'France', '98000', '78', 1, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentd`
--
ALTER TABLE `commentd`
  ADD PRIMARY KEY (`id_com`);

--
-- Index pour la table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`iddata`);

--
-- Index pour la table `data_adrs`
--
ALTER TABLE `data_adrs`
  ADD PRIMARY KEY (`id_briefing`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`idFacture`);

--
-- Index pour la table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `panier_user`
--
ALTER TABLE `panier_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tva`
--
ALTER TABLE `tva`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D64992FC23A8` (`username_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649A0D96FBF` (`email_canonical`),
  ADD UNIQUE KEY `UNIQ_8D93D649C05FB297` (`confirmation_token`);

--
-- Index pour la table `utilisateur_adresse`
--
ALTER TABLE `utilisateur_adresse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_User_2` (`id_User`),
  ADD KEY `id_User` (`id_User`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `commentd`
--
ALTER TABLE `commentd`
  MODIFY `id_com` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `data`
--
ALTER TABLE `data`
  MODIFY `iddata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `data_adrs`
--
ALTER TABLE `data_adrs`
  MODIFY `id_briefing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `idFacture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
--
-- AUTO_INCREMENT pour la table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `panier_user`
--
ALTER TABLE `panier_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT pour la table `tva`
--
ALTER TABLE `tva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `utilisateur_adresse`
--
ALTER TABLE `utilisateur_adresse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
