-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- G�n�r� le : Ven 17 D�cembre 2010 � 10:55
-- Version du serveur: 5.1.36
-- Version de PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de donn�es: `drupal`
--

-- --------------------------------------------------------

--
-- Structure de la table `lectures_semaine_temporal`
--

DROP TABLE IF EXISTS `lectures_semaine_temporal`;
CREATE TABLE IF NOT EXISTS `lectures_semaine_temporal` (
  `ID` int(10) NOT NULL,
  `celebration` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LEC_1_impaire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PR_impaire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LEC_1_paire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PR_paire` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EV` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Contenu de la table `lectures_semaine_temporal`
--

INSERT INTO `lectures_semaine_temporal` (`ID`, `celebration`, `LEC_1_impaire`, `PR_impaire`, `LEC_1_paire`, `PR_paire`, `EV`) VALUES
(1, 'adventus_12', 'Is2,1-5', 'Ps122,1', 'Is2,1-5', 'Ps122,1', 'Mt8,5-11'),
(2, 'adventus_12', 'Is4,2-6', NULL, 'Is4,2-6', NULL, NULL),
(3, 'adventus_13', 'Is11,1-10', 'Ps72,1', 'Is11,1-10', 'Ps72,1', 'Lc10,21-24'),
(4, 'adventus_14', 'Is25,6-10', 'Ps23,1', 'Is25,6-10', 'Ps23,1', 'Mt15,29-37'),
(5, 'adventus_15', 'Is26,1-6', 'Ps118,1', 'Is26,1-6', 'Ps118,1', 'Mt7,21-27'),
(6, 'adventus_16', 'Is29,17-24', 'Ps27,1', 'Is29,17-24', 'Ps27,1', 'Mt9,27-31'),
(7, 'adventus_17', 'Is30,19-26', 'Ps147,1', 'Is30,19-26', 'Ps147,1', 'Mt9,35-10,8'),
(8, 'adventus_22', 'Is35,1-10', 'Ps85,9', 'Is35,1-10', 'Ps85,9', 'Lc5,17-26'),
(9, 'adventus_23', 'Is40,1-11', 'Ps96,1', 'Is40,1-11', 'Ps96,1', 'Mt18,12-14'),
(10, 'adventus_24', 'Is40,25-31', 'Ps103,1', 'Is40,25-31', 'Ps103,1', 'Mt11,28-30'),
(11, 'adventus_25', 'Is41,13-20', 'Ps145,1', 'Is41,13-20', 'Ps145,1', 'Mt11,11-15'),
(12, 'adventus_26', 'Is48,17-19', 'Ps1,1', 'Is48,17-19', 'Ps1,1', 'Mt11,16-19'),
(13, 'adventus_27', 'Si48,1-11', 'Ps80,2', 'Si48,1-11', 'Ps80,2', 'Mt17,10-13'),
(14, 'adventus_32', 'Nb24,2-17', 'Ps25,4', 'Nb24,2-17', 'Ps25,4', 'Mt21,23-27'),
(15, 'adventus_33', 'So3,1-13', 'Ps34,2', 'So3,1-13', 'Ps34,2', 'Mt21,28-32'),
(16, 'adventus_34', 'Is45,6-25', 'Ps85,9', 'Is45,6-25', 'Ps85,9', 'Lc7,18-23'),
(17, 'adventus_35', 'Is54,1-10', 'Ps30,2', 'Is54,1-10', 'Ps30,2', 'Lc7,24-30'),
(18, 'adventus_36', 'Is56,1-8', 'Ps67,2', 'Is56,1-8', 'Ps67,2', 'Jn5,33-36'),
(19, '1712', 'Gn49,2', 'Ps72,1', 'Gn49,2', 'Ps72,1', 'Mt1,1-17'),
(20, '1712', 'Gn49,8-10', NULL, 'Gn49,8-10', NULL, NULL),
(21, '1812', 'Jr23,5-8', 'Ps72,1', 'Jr23,5-8', 'Ps72,1', 'Mt1,18-24'),
(22, '1912', 'Jg13,2-7', 'Ps71,1', 'Jg13,2-7', 'Ps71,1', 'Lc1,5-25'),
(23, '1912', 'Jg13,24-25', NULL, 'Jg13,24-25', '0', NULL),
(24, '2012', 'Is7,10-14', 'Ps24,1', 'Is7,10-14', 'Ps24,1', 'Lc1,26-38'),
(25, '2112', 'Ct2,8-14', 'Ps33,1-3', 'Ct2,8-14', 'Ps33,1-3', 'Lc1,39-45'),
(26, '2112', 'So3,14-18', NULL, 'So3,14-18', NULL, NULL),
(27, '2212', '1S1,24-28', '1S2,1', '1S1,24-28', '1S2,1', 'Lc1,46-56'),
(28, '2312', 'Ml3,1-4', 'Ps25,4', 'Ml3,1-4', 'Ps25,4', 'Lc1,57-66'),
(29, '2312', 'Ml3,23-24', NULL, 'Ml3,23-24', NULL, NULL),
(30, '2412', '2S7,1-5', 'Ps89,2', '2S7,1-5', 'Ps89,2', 'Lc1,67-79'),
(31, '2412', '2S7,8-12', NULL, '2S7,8-12', NULL, NULL),
(32, '2412', '2S7,14', NULL, '2S7,14', NULL, NULL),
(33, '2412', '2S7,16', NULL, '2S7,16', NULL, NULL),
(34, '2612', 'Ac6,8-7,60', 'Ps31,3', 'Ac6,8-7,60', 'Ps31,3', 'Mt10,17-22'),
(35, '2712', '1Jn1,1-4', 'Ps97,1', '1Jn1,1-4', 'Ps97,1', 'Jn20,2-8'),
(36, '2712', NULL, NULL, NULL, NULL, 'Jn21,20-24'),
(37, '2812', '1Jn1,5-2,2', 'Ps124,2', '1Jn1,5-2,2', 'Ps124,2', 'Mt2,13-18'),
(38, '2912', '1Jn2,3-11', 'Ps96,1', '1Jn2,3-11', 'Ps96,1', 'Lc2,22-35'),
(39, '3012', '1Jn2,12-17', 'Ps96,7', '1Jn2,12-17', 'Ps96,7', 'Lc2,36-40'),
(40, '3112', '1Jn2,18-21', 'Ps96,1', '1Jn2,18-21', 'Ps96,1', 'Jn1,1-18'),
(41, '0201', '1Jn2,22-28', 'Ps98,1', '1Jn2,22-28', 'Ps98,1', 'Jn1,19-28'),
(42, '0301', '1Jn2,29-3,6', 'Ps98,1', '1Jn2,29-3,6', 'Ps98,1', 'Jn1,29-34'),
(43, '0401', '1Jn3,7-10', 'Ps98,1', '1Jn3,7-10', 'Ps98,1', 'Jn1,35-42'),
(44, '0501', '1Jn3,11-21', 'Ps100,1', '1Jn3,11-21', 'Ps100,1', 'Jn1,43-51'),
(45, '0601', '1Jn5,5-13', 'Ps147,12', '1Jn5,5-13', 'Ps147,12', 'Mc1,7-11'),
(46, '0601', NULL, NULL, NULL, NULL, 'Lc3,23-38'),
(47, '0701', '1Jn5,14-21', 'Ps149,1', '1Jn5,14-21', 'Ps149,1', 'Jn2,1-11'),
(48, 'postepi_2', '1Jn3,22-4,6', 'Ps2,7', '1Jn3,22-4,6', 'Ps2,7', 'Mt4,12-25'),
(49, 'postepi_3', '1Jn4,7-10', 'Ps72,1', '1Jn4,7-10', 'Ps72,1', 'Mc6,34-44'),
(50, 'postepi_4', '1Jn4,11-18', 'Ps72,1', '1Jn4,11-18', 'Ps72,1', 'Mc6,45-52'),
(51, 'postepi_5', '1Jn4,19-5,4', 'Ps72,1', '1Jn4,19-5,4', 'Ps72,1', 'Lc4,14-22'),
(52, 'postepi_6', '1Jn5,5-13', 'Ps147,12', '1Jn5,5-13', 'Ps147,12', 'Lc5,12-16'),
(53, 'postepi_7', '1Jn5,14-21', 'Ps149,1', '1Jn5,14-21', 'Ps149,1', 'Jn3,22-30'),
(54, 'quadragesima_04', 'Jl2,12-18', 'Ps51,3', 'Jl2,12-18', 'Ps51,3', 'Mt6,1-18'),
(55, 'quadragesima_04', '2Co5,20-6,2', NULL, '2Co5,20-6,2', NULL, NULL),
(56, 'quadragesima_05', 'Dt30,15-20', 'Ps1,1', 'Dt30,15-20', 'Ps1,1', 'Lc9,22-25'),
(57, 'quadragesima_06', 'Is58,1-9', 'Ps51,3', 'Is58,1-9', 'Ps51,3', 'Mt9,14-15'),
(58, 'quadragesima_07', 'Is58,9-14', 'Ps86,1', 'Is58,9-14', 'Ps86,1', 'Lc5,27-32'),
(59, 'quadragesima_12', 'Lv19,1-18', 'Ps19,8', 'Lv19,1-18', 'Ps19,8', 'Mt25,31-46'),
(60, 'quadragesima_13', 'Is55,10-11', 'Ps34,4', 'Is55,10-11', 'Ps34,4', 'Mt6,7-15'),
(61, 'quadragesima_14', 'Jon3,1-10', 'Ps51,3', 'Jon3,1-10', 'Ps51,3', 'Lc11,29-32'),
(62, 'quadragesima_15', 'Est14,1-14', 'Ps138,1', 'Est14,1-14', 'Ps138,1', 'Mt7,7-12'),
(63, 'quadragesima_16', 'Ez18,21-28', 'Ps130,1', 'Ez18,21-28', 'Ps130,1', 'Mt5,20-26'),
(64, 'quadragesima_17', 'Dt26,16-19', 'Ps119,1', 'Dt26,16-19', 'Ps119,1', 'Mt5,43-48'),
(65, 'quadragesima_22', 'Da9,4-10', 'Ps79,5', 'Da9,4-10', 'Ps79,5', 'Lc6,36-38'),
(66, 'quadragesima_23', 'Is1,10-20', 'Ps50,7', 'Is1,10-20', 'Ps50,7', 'Mt23,1-12'),
(67, 'quadragesima_24', 'Jr18,18-20', 'Ps39,5', 'Jr18,18-20', 'Ps39,5', 'Mt20,17-28'),
(68, 'quadragesima_25', 'Jr17,5-10', 'Ps1,1', 'Jr17,5-10', 'Ps1,1', 'Lc16,19-31'),
(69, 'quadragesima_26', 'Gn37,3-28', 'Ps105,4', 'Gn37,3-28', 'Ps105,4', 'Mt21,33-46'),
(70, 'quadragesima_27', 'Mt7,14-20', 'Ps103,1', 'Mt7,14-20', 'Ps103,1', 'Lc15,1-32'),
(71, 'quadragesima_32', '2R5,1-15', 'Ps42,2', '2R5,1-15', 'Ps42,2', 'Lc4,24-30'),
(72, 'quadragesima_33', 'Da3,25-43', 'Ps25,4', 'Da3,25-43', 'Ps25,4', 'Mt18,21-35'),
(73, 'quadragesima_34', 'Dt4,1-9', 'Ps147,12', 'Dt4,1-9', 'Ps147,12', 'Mt5,17-19'),
(74, 'quadragesima_35', 'Jr7,23-28', 'Ps95,1', 'Jr7,23-28', 'Ps95,1', 'Lc11,14-23'),
(75, 'quadragesima_36', 'Os14,2-10', 'Ps81,12', 'Os14,2-10', 'Ps81,12', 'Mc12,28-34'),
(76, 'quadragesima_37', 'Os6,1-6', 'Ps51,3', 'Os6,1-6', 'Ps51,3', 'Lc18,9-14'),
(77, 'quadragesima_42', 'Is65,17-21', 'Ps30,2', 'Is65,17-21', 'Ps30,2', 'Jn4,43-54'),
(78, 'quadragesima_43', 'Ez47,1-12', 'Ps46,2', 'Ez47,1-12', 'Ps46,2', 'Jn5,1-16'),
(79, 'quadragesima_44', 'Is49,8-15', 'Ps145,8', 'Is49,8-15', 'Ps145,8', 'Jn5,17-30'),
(80, 'quadragesima_45', 'Ex32,7-14', 'Ps106,4', 'Ex32,7-14', 'Ps106,4', 'Jn5,31-47'),
(81, 'quadragesima_46', 'Sg2,1-22', 'Ps34,17', 'Sg2,1-22', 'Ps34,17', 'Jn7,2-30'),
(82, 'quadragesima_47', 'Jr11,18-20', 'Ps7,2', 'Jr11,18-20', 'Ps7,2', 'Jn7,40-53'),
(83, 'quadragesima_52', 'Da13,1-62', 'Ps23,1', 'Da13,1-62', 'Ps23,1', 'Jn8,1-11'),
(84, 'quadragesima_53', 'Nb21,4-9', 'Ps102,2', 'Nb21,4-9', 'Ps102,2', 'Jn8,21-30'),
(85, 'quadragesima_54', 'Da3,14-95', 'Da3,52', 'Da3,14-95', 'Da3,52', 'Jn8,31-42'),
(86, 'quadragesima_55', 'Gn17,3-9', 'Ps105,4', 'Gn17,3-9', 'Ps105,4', 'Jn8,51-59'),
(87, 'quadragesima_56', '1R20,10-13', 'Ps18,2', '1R20,10-13', 'Ps18,2', 'Jn10,31-42'),
(88, 'quadragesima_57', 'Ez37,21-28', 'Jr31,1', 'Ez37,21-28', 'Jr31,1', 'Jn11,45-57'),
(89, 'HS_2', 'Is42,1-7', 'Ps27,1', 'Is42,1-7', 'Ps27,1', 'Jn12,1-11'),
(90, 'HS_3', 'Is49,1-6', 'Ps71,1', 'Is49,1-6', 'Ps71,1', 'Jn13,21-38'),
(91, 'HS_4', 'Is50,4-9', 'Ps69,8', 'Is50,4-9', 'Ps69,8', 'Mt26,14-25'),
(92, 'pascha_12', 'Ac2,14-32', 'Ps16,1', 'Ac2,14-32', 'Ps16,1', 'Mt28,8-15'),
(93, 'pascha_13', 'Ac2,36-41', 'Ps33,4', 'Ac2,36-41', 'Ps33,4', 'Jn20,11-15'),
(94, 'pascha_14', 'Ac3,1-10', 'Ps105,1', 'Ac3,1-10', 'Ps105,1', 'Lc24,13-35'),
(95, 'pascha_15', 'Ac3,11-26', 'Ps8,4', 'Ac3,11-26', 'Ps8,4', 'Lc24,35-48'),
(96, 'pascha_16', 'Ac4,1-12', 'Ps118,1', 'Ac4,1-12', 'Ps118,1', 'Jn21,1-14'),
(97, 'pascha_17', 'Ac4,13-21', 'Ps118,1', 'Ac4,13-21', 'Ps118,1', 'Mc16,9-15'),
(98, 'pascha_22', 'Ac4,23-31', 'Ps2,1', 'Ac4,23-31', 'Ps2,1', 'Jn3,1-8'),
(99, 'pascha_23', 'Ac4,32-37', 'Ps93,1', 'Ac4,32-37', 'Ps93,1', 'Jn3,7-15'),
(100, 'pascha_24', 'Ac5,17-26', 'Ps34,2', 'Ac5,17-26', 'Ps34,2', 'Jn3,16-21'),
(101, 'pascha_25', 'Ac5,27-33', 'Ps34,2', 'Ac5,27-33', 'Ps34,2', 'Jn3,31-36'),
(102, 'pascha_26', 'Ac5,34-42', 'Ps27,1', 'Ac5,34-42', 'Ps27,1', 'Jn6,1-15'),
(103, 'pascha_27', 'Ac6,1-7', 'Ps33,1', 'Ac6,1-7', 'Ps33,1', 'Jn6,16-21'),
(104, 'pascha_32', 'Ac6,8-15', 'Ps119,23', 'Ac6,8-15', 'Ps119,23', 'Jn6,22-29'),
(105, 'pascha_33', 'Ac7,51-8,1', 'Ps31,3', 'Ac7,51-8,1', 'Ps31,3', 'Jn6,30-35'),
(106, 'pascha_34', 'Ac8,1-8', 'Ps66,1', 'Ac8,1-8', 'Ps66,1', 'Jn6,35-40'),
(107, 'pascha_35', 'Ac8,26-40', 'Ps66,8', 'Ac8,26-40', 'Ps66,8', 'Jn6,44-51'),
(108, 'pascha_36', 'Ac9,1-20', 'Ps117,1', 'Ac9,1-20', 'Ps117,1', 'Jn6,52-59'),
(109, 'pascha_37', 'Ac9,31-42', 'Ps116,12', 'Ac9,31-42', 'Ps116,12', 'Jn6,60-69'),
(110, 'pascha_42', 'Ac11,1-18', 'Ps42,2', 'Ac11,1-18', 'Ps42,2', 'Jn10,1-10'),
(111, 'pascha_43', 'Ac11,19-26', 'Ps87,1', 'Ac11,19-26', 'Ps87,1', 'Jn10,22-30'),
(112, 'pascha_44', 'Ac12,24-13,5', 'Ps67,2', 'Ac12,24-13,5', 'Ps67,2', 'Jn12,44-50'),
(113, 'pascha_45', 'Ac13,13-25', 'Ps89,2', 'Ac13,13-25', 'Ps89,2', 'Jn13,16-20'),
(114, 'pascha_46', 'Ac13,26-33', 'Ps2,1', 'Ac13,26-33', 'Ps2,1', 'Jn14,1-6'),
(115, 'pascha_47', 'Ac13,44-52', 'Ps98,1', 'Ac13,44-52', 'Ps98,1', 'Jn14,7-14'),
(116, 'pascha_52', 'Ac14,5-18', 'Ps113', 'Ac14,5-18', 'Ps113', 'Jn14,21-26'),
(117, 'pascha_53', 'Ac14,19-28', 'Ps145,1', 'Ac14,19-28', 'Ps145,1', 'Jn14,27-31'),
(118, 'pascha_54', 'Ac15,1-6', 'Ps122,1', 'Ac15,1-6', 'Ps122,1', 'Jn15,1-8'),
(119, 'pascha_55', 'Ac15,7-21', 'Ps96,1', 'Ac15,7-21', 'Ps96,1', 'Jn15,9-11'),
(120, 'pascha_56', 'Ac15,22-31', 'Ps57,8', 'Ac15,22-31', 'Ps57,8', 'Jn15,12-17'),
(121, 'pascha_57', 'Ac16,1-10', 'Ps100,1', 'Ac16,1-10', 'Ps100,1', 'Jn15,18-21'),
(122, 'pascha_62', 'Ac16,11-15', 'Ps149,1', 'Ac16,11-15', 'Ps149,1', 'Jn15,26-16,4'),
(123, 'pascha_63', 'Ac16,22-34', 'Ps138,1', 'Ac16,22-34', 'Ps138,1', 'Jn16,5-11'),
(124, 'pascha_64', 'Ac17,15-18,1', 'Ps148,1', 'Ac17,15-18,1', 'Ps148,1', 'Jn16,12-15'),
(125, 'pascha_65', 'Ac18,1-8', 'Ps98,1', 'Ac18,1-8', 'Ps98,1', 'Jn16,16-20'),
(126, 'pascha_66', 'Ac18,9-18', 'Ps47,2', 'Ac18,9-18', 'Ps47,2', 'Jn16,20-23'),
(127, 'pascha_67', 'Ac18,23-28', 'Ps47,2', 'Ac18,23-28', 'Ps47,2', 'Jn16,23-28'),
(128, 'pascha_72', 'Ac19,1-8', 'Ps68,2', 'Ac19,1-8', 'Ps68,2', 'Jn16,29-33'),
(129, 'pascha_73', 'Ac20,17-27', 'Ps68,1', 'Ac20,17-27', 'Ps68,1', 'Jn17,1-11'),
(130, 'pascha_74', 'Ac20,28-38', 'Ps68,29', 'Ac20,28-38', 'Ps68,29', 'Jn17,11-19'),
(131, 'pascha_75', 'Ac22,30-23,11', 'Ps16,1', 'Ac22,30-23,11', 'Ps16,1', 'Jn17,20-26'),
(132, 'pascha_76', 'Ac25,13-21', 'Ps103,1', 'Ac25,13-21', 'Ps103,1', 'Jn21,15-19'),
(133, 'pascha_77', 'Ac28,16-31', 'Ps11,4', 'Ac28,16-31', 'Ps11,4', 'Jn21,20-25'),
(134, 'perannum_1-2', 'He1,1-6', 'Ps97,1', '1S1,1-8', 'Ps16,12', 'Mc1,4-20'),
(135, 'perannum_1-3', 'He2,5-12', 'Ps8,4', '1S1,9-20', '1S2,1', 'Mc1,21-28'),
(136, 'perannum_1-4', 'He2,14-18', 'Ps105,1', '1S3,1-4,1', 'Ps40,2', 'Mc1,29-39'),
(137, 'perannum_1-5', 'He3,7-14', 'Ps95,6', '1S4,1-11', 'Ps44,1', 'Mc1,40-45'),
(138, 'perannum_1-6', 'He4,1-11', 'Ps78,3', '1S8,4-22', 'Ps89,16', 'Mc2,1-12'),
(139, 'perannum_1-7', 'He4,12-16', 'Ps19,8', '1S9,1-10,1', 'Ps11,2', 'Mc2,13-17'),
(140, 'perannum_2-2', 'He5,1-10', 'Ps110,1', '1S15,16-23', 'Ps50,7', 'Mc2,18-22'),
(141, 'perannum_2-3', 'He6,10-20', 'Ps111,1', '1S16,1-13', 'Ps89,2', 'Mc2,23-28'),
(142, 'perannum_2-4', 'He7,1-17', 'Ps110,1', '1S17,32-51', 'Ps144,1', 'Mc3,1-6'),
(143, 'perannum_2-5', 'He7,25-8,6', 'Ps40,7', '1S18,6-19,7', 'Ps56,2', 'Mc3,7-12'),
(144, 'perannum_2-6', 'He8,6-13', 'Ps85,8', '1S24,3-21', 'Ps57,2', 'Mc3,13-19'),
(145, 'perannum_2-7', 'He9,2-14', 'Ps47,2', '2S1,1-27', 'Ps80,2', 'Mc3,20-21'),
(146, 'perannum_3-2', 'He9,15-28', 'Ps98,1', '2S5,1-10', 'Ps89,2', 'Mc3,22-30'),
(147, 'perannum_3-3', '2S6,12-19', 'Ps24,7', NULL, NULL, 'Mc3,31-35'),
(148, 'perannum_3-4', 'He10,11-18', 'Ps110,1', '2S7,1-17', 'Ps89,4', 'Mc4,1-20'),
(149, 'perannum_3-5', 'He10,19-25', 'Ps24,1', '2S7,18-29', 'Ps132,1', 'Mc4,21-25'),
(150, 'perannum_3-6', 'He10,32-39', 'Ps37,3', '2S11,1-17', 'Ps51,3', 'Mc4,26-34'),
(151, 'perannum_3-7', 'He11,1-19', 'Lc1,69', '2S12,1-17-', 'Mc4,3541', NULL),
(152, 'perannum_4-2', 'He11,32-40', 'Ps31,20', '2S15,13-16,13', 'Ps3,2', 'Mc5,1-20'),
(153, 'perannum_4-3', 'He12,1-4', 'Ps22,26', '2S18,9-19,4', 'Ps85,1', 'Mc5,21-43'),
(154, 'perannum_4-4', 'He12,4-15', 'Ps103,1', '2S24,2-17', 'Ps32,1', 'Mc6,1-6'),
(155, 'perannum_4-5', 'He12,18-24', 'Ps48,2', '1R2,1-12', '1Ch29,1', 'Mc6,7-13'),
(156, 'perannum_4-6', 'He13,1-5', 'Ps27,1', 'Si47,2-11', 'Ps18,31', 'Mc6,14-29'),
(157, 'perannum_4-7', 'He13,15-21', 'Ps23,1', '1R3,4-13', 'Ps119,9', 'Mc6,30-34'),
(158, 'perannum_5-2', 'Gn1,1-19', 'Ps104,1', '1R8,1-13', 'Ps132,1', 'Mc6,53-56'),
(159, 'perannum_5-3', 'Gn1,20-2,4', 'Ps8,4', '1R8,22-30', 'Ps84,3', 'Mc7,1-13'),
(160, 'perannum_5-4', 'Gn2,4-17', 'Ps104,1', '1R10,1-10', 'Ps37,5', 'Mc7,14-23'),
(161, 'perannum_5-5', 'Gn2,18-25', 'Ps128,1', '1R11,4-13', 'Ps106,3', 'Mc7,24-30'),
(162, 'perannum_5-6', 'Gn3,1-8', 'Ps32,1', '1R11,29-12,19', 'Ps81,1', 'Mc7,31-37'),
(163, 'perannum_5-7', 'Gn3,9-24', 'Ps90,2', '1R12,26-13,34', 'Ps106,6', 'Mc8,1-10'),
(164, 'perannum_6-2', 'Gn4,1-25', 'Ps50,1', 'Jc1,1-11', 'Ps119,67', 'Mc8,11-13'),
(165, 'perannum_6-3', 'Gn6,5-7,10', 'Ps29,1', 'Jc1,12-18', 'Ps94,12', 'Mc8,14-21'),
(166, 'perannum_6-4', 'Gn8,6-22', 'Ps116,12', 'Jc1,19-27', 'Ps15,1', 'Mc8,22-26'),
(167, 'perannum_6-5', 'Gn9,1-13', 'Ps102,16', 'Jc2,1-9', 'Ps34,2', 'Mc8,27-33'),
(168, 'perannum_6-6', 'Gn11,1-9', 'Ps33,10', 'Jc2,14-26', 'Ps112,1', 'Mc8,34-9,1'),
(169, 'perannum_6-7', 'He11,1-7', 'Ps145,2', 'Jc3,1-10', 'Ps11,2', 'Mc9,2-13'),
(170, 'perannum_7-2', 'Si1,1-10', 'Ps93,1', 'Jc3,13-18', 'Ps19,8', 'Mc9,14-29'),
(171, 'perannum_7-3', 'Si2,1-11', 'Ps37,3', 'Jc4,1-10', 'Ps55,7', 'Mc9,30-37'),
(172, 'perannum_7-4', 'Si4,11-19', 'Ps119,165', 'Jc4,13-17', 'Ps49,2', 'Mc9,38-40'),
(173, 'perannum_7-5', 'Si5,1-8', 'Ps1,1', 'Jc5,1-6', 'Ps49,17', 'Mc9,41-50'),
(174, 'perannum_7-6', 'Si6,5-17', 'Ps119,12', 'Jc5,9-12', 'Ps103,1', 'Mc10,1-12'),
(175, 'perannum_7-7', 'Si17,1-15', 'Ps103,13', 'Jc5,13-20', 'Ps141,1', 'Mc10,13-16'),
(176, 'perannum_8-2', 'Si17,20-28', 'Ps32,1', '1P1,3-9', 'Ps111,1', NULL),
(177, 'perannum_8-3', 'Si35,1-15', 'Ps50,4', '1P1,10-16', 'Ps98,1', 'Mc10,28-31'),
(178, 'perannum_8-4', 'Si36,1-2', 'Ps79,8', '1P1,18-25', 'Ps147,12', 'Mc10,32-45'),
(179, 'perannum_8-4', 'Si36,5-6', NULL, NULL, NULL, NULL),
(180, 'perannum_8-4', 'Si36,13-19', NULL, NULL, NULL, NULL),
(181, 'perannum_8-5', 'Si42,15-26', 'Ps33,2', '1P2,2-12', 'Ps100,1', 'Mc10,46-52'),
(182, 'perannum_8-6', 'Si44,1', 'Ps149,1', '1P4,7-13', 'Ps96,1', 'Mc11,11-25'),
(183, 'perannum_8-6', 'Si44,9-13', NULL, NULL, NULL, NULL),
(184, 'perannum_8-7', 'Si51,17-27', 'Ps19,8', 'Jud1,17-25', 'Ps63,2', 'Mc11,27-33'),
(185, 'perannum_9-2', 'Tb1,1-29', 'Ps112,1', '2P1,1-7', 'Ps91,1', 'Mc12,1-12'),
(186, 'perannum_9-3', 'Tb2,10-23', 'Ps112,1', '2P3,12-18', 'Ps90,2', 'Mc12,13-17'),
(187, 'perannum_9-4', 'Tb3,1-25', 'Ps25,2', '2Tm1,1-12', 'Ps123,1', 'Mc12,18-27'),
(188, 'perannum_9-5', 'Tb6,10-8,10', 'Ps128,1', '2Tm2,8-15', 'Ps25,4', 'Mc12,28-34'),
(189, 'perannum_9-6', 'Tb11,5-17', 'Ps146,2', '2Tm3,10-17', 'Ps119,157', 'Mc12,35-37'),
(190, 'perannum_9-7', 'Tb12,1-20', 'Tb13,2', '2Tm4,1-8', 'Ps71,8', 'Mc12,38-44'),
(191, 'perannum_10-2', '2Co1,1-7', 'Ps34,2', '1R17,1-6', 'Ps121,1', 'Mt5,1-12'),
(192, 'perannum_10-3', '2Co1,18-22', 'Ps119,129', '1R17,7-16', 'Ps4,2', 'Mt5,13-16'),
(193, 'perannum_10-4', '2Co3,4-11', 'Ps99,5', '1R18,20-39', 'Ps16,1', 'Mt5,17-19'),
(194, 'perannum_10-5', '2Co3,15-4,6', 'Ps85,9', '1R18,41-46', 'Ps65,1', 'Mt5,20-26'),
(195, 'perannum_10-6', '2Co4,7-15', 'Ps116,10', '1R19,9-16', 'Ps27,7', 'Mt5,27-32'),
(196, 'perannum_10-7', '2Co5,14-21', 'Ps103,1', '1R19,16-21', 'Ps16,1', 'Mt5,33-37'),
(197, 'perannum_11-2', '2Co6,1-10', 'Ps98,1', '1R21,1-16', 'Ps5,2', 'Mt5,38-42'),
(198, 'perannum_11-3', '2Co8,1-9', 'Ps146,2', '1R21,17-29', 'Ps51,3', 'Mt5,43-48'),
(199, 'perannum_11-4', '2Co9,6-11', 'Ps112,1', '2R2,1-14', 'Ps31,2', 'Mt6,1-18'),
(200, 'perannum_11-5', '2Co11,1-11', 'Ps111,1', 'Si48,1-14', 'Ps97,1', 'Mt6,7-15'),
(201, 'perannum_11-6', '2Co11,18-30', 'Ps34,2', '2R11,1-20', 'Ps132,11', 'Mt6,19-23'),
(202, 'perannum_11-7', '2Co12,1-10', 'Ps34,8', '2Ch24,17-25', 'Ps89,4', 'Mt6,24-34'),
(203, 'perannum_12-2', 'Gn12,1-9', 'Ps33,12', '2R17,5-18', 'Ps60,3', 'Mt7,1-5'),
(204, 'perannum_12-3', 'Gn13,2-18', 'Ps15,1', '2R19,9-36', 'Ps48,2', 'Mt7,6-14'),
(205, 'perannum_12-4', 'Gn15,1-18', 'Ps105,1', '2R22,8-23,3', 'Ps119,33', 'Mt7,15-20'),
(206, 'perannum_12-5', 'Gn16,1-16', 'Ps106,1', '2R24,8-17', 'Ps79,1', 'Mt7,21-29'),
(207, 'perannum_12-6', 'Gn17,1-22', 'Ps128,1', '2R25,1-12', 'Ps137,1', 'Mt8,1-4'),
(208, 'perannum_12-7', 'Gn18,1-15', 'Lc1,46', 'Lm2,2-19', 'Ps74,1', 'Mt8,5-17'),
(209, 'perannum_13-2', 'Gn18,16-33', 'Ps103,1', 'Am2,6-16', 'Ps50,16', 'Mt8,18-22'),
(210, 'perannum_13-3', 'Gn19,15-29', 'Ps26,2', 'Am3,1-8', 'Ps5,2', 'Mt8,23-27'),
(211, 'perannum_13-4', 'Gn21,3-21', 'Ps34,7', 'Am5,14-24', 'Ps50,7', 'Mt8,28-34'),
(212, 'perannum_13-5', 'Gn22,1-19', 'Ps116,1', 'Am7,10-17', 'Ps19,8', 'Mt9,1-8'),
(213, 'perannum_13-6', 'Gn23,1-24,67', 'Ps106,1', 'Am8,4-12', 'Ps119,2', 'Mt9,9-13'),
(214, 'perannum_13-7', 'Gn27,1-29', 'Ps135,1', 'Am9,11-15', 'Ps85,9', 'Mt9,14-17'),
(215, 'perannum_14-2', 'Gn28,10-22', 'Ps91,1', 'Os2,16-22', 'Ps145,2', 'Mt9,18-26'),
(216, 'perannum_14-3', 'Gn32,23-32', 'Ps17,1', 'Os8,4-13', 'Ps115,3', 'Mt9,32-38'),
(217, 'perannum_14-4', 'Gn41,55-42,24', 'Ps33,2', 'Os10,1-12', 'Ps105,2', 'Mt10,1-7'),
(218, 'perannum_14-5', 'Gn44,18-45,5', 'Ps105,16', 'Os11,1-9', 'Ps80,2', 'Mt10,7-15'),
(219, 'perannum_14-6', 'Gn46,1-30', 'Ps37,3', 'Os14,2-10', 'Ps51,3', 'Mt10,16-23'),
(220, 'perannum_14-7', 'Gn49,29-50,24', 'Ps105,1', 'Is6,1-8', 'Ps93,1', 'Mt10,24-33'),
(221, 'perannum_15-2', 'Ex1,8-22', 'Ps124,2', 'Is1,11-17', 'Ps50,7', 'Mt10,34-11,1'),
(222, 'perannum_15-3', 'Ex2,1-15', 'Ps69,3', 'Is7,1-9', 'Ps48,2', 'Mt11,20-24'),
(223, 'perannum_15-4', 'Ex3,1-12', 'Ps103,1', 'Is10,5-16', 'Ps94,5', 'Mt11,25-27'),
(224, 'perannum_15-5', 'Ex3,13-20', 'Ps105,1', 'Is26,7-19', 'Ps102,13', 'Mt11,28-30'),
(225, 'perannum_15-6', 'Ex11,10-12,14', 'Ps116,12', 'Is38,1-8', 'Is38,1', 'Mt12,1-8'),
(226, 'perannum_15-7', 'Ex12,37-42', 'Ps136,1', 'Mi 2,1-5', 'Ps9,1', 'Mt12,14-21'),
(227, 'perannum_16-2', 'Ex14,5-18', 'Ex15,1', 'Mi 6,1-8', 'Ps50,5', 'Mt12,38-42'),
(228, 'perannum_16-3', 'Ex14,21-15,1', 'Ex15,8', 'Mi 7,14-20', 'Ps85,2', 'Mt12,46-50'),
(229, 'perannum_16-4', 'Ex16,1-15', 'Ps78,17', 'Jr1,1-10', 'Ps70,1', 'Mt13,1-9'),
(230, 'perannum_16-5', 'Ex19,1-20', 'Da3,52', 'Jr2,1-13', 'Ps36,6', 'Mt13,10-17'),
(231, 'perannum_16-6', 'Ex20,1-17', 'Ps19,8', 'Jr3,14-17', 'Jr31,1', 'Mt13,18-23'),
(232, 'perannum_16-7', 'Ex24,3-8', 'Ps50,1', 'Jr7,1-11', 'Ps84,2', 'Mt13,24-30'),
(233, 'perannum_17-2', 'Ex32,15-34', 'Ps106,19', 'Jr13,1-11', 'Dt32,6', 'Mt13,31-35'),
(234, 'perannum_17-3', 'Ex33,7-34,28', 'Ps103,6', 'Jr14,17-22', 'Ps79,5', 'Mt13,36-43'),
(235, 'perannum_17-4', 'Ex34,29-35', 'Ps99,5', 'Jr15,10-21', 'Ps59,2', 'Mt13,44-46'),
(236, 'perannum_17-5', 'Ex40,16-38', 'Ps84,3', 'Jr18,1-10', 'Ps146,1', 'Mt13,47-53'),
(237, 'perannum_17-6', 'Lv23,1-37', 'Ps81,3', 'Jr26,1-9', 'Ps69,2', 'Mt13,54-58'),
(238, 'perannum_17-7', 'Lv25,1-17', 'Ps67,2', 'Jr26,11-19', 'Ps69,15', 'Mt14,1-12'),
(239, 'perannum_18-2', 'Nb11,4-15', 'Ps81,12', 'Jr28,1-17', 'Ps119,29', 'Mt14,13-21'),
(240, 'perannum_18-3', 'Nb12,1-13', 'Ps51,3', 'Jr30,1-22', 'Ps102,16', 'Mt14,22-36'),
(241, 'perannum_18-4', 'Mt15,1-14', NULL, NULL, NULL, NULL),
(242, 'perannum_18-5', 'Nb13,1-14,35', 'Ps106,6', 'Jr31,1-7', 'Jr31,1', 'Mt15,21-28'),
(243, 'perannum_18-6', 'Nb20,1-13', 'Ps95,1', 'Jr31,31-34', 'Ps51,12', 'Mt16,13-23'),
(244, 'perannum_18-7', 'Dt4,32-40', 'Ps77,12', 'Na2,1-3,7', 'Dt32,36', 'Mt16,24-28'),
(245, 'perannum_18-8', 'Dt6,4-13', 'Ps18,2', 'Ha1,12-2,4', 'Ps9,8', 'Mt17,14-20'),
(246, 'perannum_19-2', 'Dt10,12-22', 'Ps147,12', 'Ez1,2-28', 'Ps148,1', 'Mt17,22-27'),
(247, 'perannum_19-3', 'Dt31,1-8', 'Dt32,3', 'Ez2,8-3,4', 'Ps119,14', 'Mt18,1-14'),
(248, 'perannum_19-4', 'Dt34,1-12', 'Ps66,1', 'Ez9,1-10,22', 'Ps113,1', 'Mt18,15-20'),
(249, 'perannum_19-5', 'Jos3,7-17', 'Ps115,1', 'Ez12,1-12', 'Ps78,56', 'Mt18,21-19,1'),
(250, 'perannum_19-6', 'Jos24,1-13', 'Ps136,16', 'Ez16,1-63', 'Is12,2', NULL),
(251, 'perannum_19-7', 'Jos24,14-29', 'Ps16,1', 'Ez18,1-32', 'Ps51,12', 'Mt19,13-15'),
(252, 'perannum_20-2', 'Jg2,11-19', 'Ps106,2', 'Ez24,15-24', 'Dt32,6', 'Mt19,16-22'),
(253, 'perannum_20-3', 'Jg6,11-24', 'Ps85,9', 'Ez28,1-10', 'Dt32,26', 'Mt19,23-30'),
(254, 'perannum_20-4', 'Jg9,6-15', 'Ps21,2', 'Ez34,1-11', 'Ps23,1', 'Mt20,1-16'),
(255, 'perannum_20-5', 'Jg11,29-39', 'Ps40,5', 'Ez36,23-28', 'Ps51,12', 'Mt22,1-14'),
(256, 'perannum_20-6', 'Rt1,1-22', 'Ps146,5', 'Ez37,1-14', 'Ps107,2', 'Mt22,34-40'),
(257, 'perannum_20-7', 'Rt2,1-4,17', 'Ps128,1', 'Ez43,1-7', 'Ps85,9', 'Mt23,1-12'),
(258, 'perannum_21-2', '1Th1,1-10', 'Ps149,1', '2Th1,1-12', 'Ps96,1', 'Mt23,13-22'),
(259, 'perannum_21-3', '1Th2,1-8', 'Ps139,1', '2Th2,1-17', 'Ps96,1', 'Mt23,23-26'),
(260, 'perannum_21-4', '1Th2,9-13', 'Ps139,7', '2Th3,6-18', 'Ps128,1', 'Mt23,27-32'),
(261, 'perannum_21-5', '1Th3,7-13', 'Ps90,3', '1Co1,1-9', 'Ps145,2', 'Mt24,42-51'),
(262, 'perannum_21-6', '1Th4,1-5', 'Ps97,1', '1Co1,17-25', 'Ps33,1', 'Mt25,1-13'),
(263, 'perannum_21-7', '1Th4,9-11', 'Ps98,1', '1Co1,26-31', 'Ps33,12', 'Mt25,14-30'),
(264, 'perannum_22-2', '1Th4,13-17', 'Ps96,1', '1Co2,1-5', 'Ps119,97', 'Lc4,16-30'),
(265, 'perannum_22-3', '1Th5,1-11', 'Ps27,1', '1Co2,10-16', 'Ps145,8', 'Lc4,31-37'),
(266, 'perannum_22-4', 'Col1,1-8', 'Ps52,10', '1Co3,1-9', 'Ps33,12', 'Lc4,38-44'),
(267, 'perannum_22-5', 'Col1,9-14', 'Ps98,2', '1Co3,18-23', 'Ps24,1', 'Lc5,1-11'),
(268, 'perannum_22-6', '1Co4,1-5', 'Ps-37,3', NULL, NULL, 'Lc5,33-39'),
(269, 'perannum_22-7', '1Co4,9-15', 'Ps-145,17', NULL, NULL, 'Lc6,1-5'),
(270, 'perannum_23-2', 'Col1,24-2,3', 'Ps62,6', '1Co5,1-8', 'Ps5,2', 'Lc6,6-11'),
(271, 'perannum_23-3', 'Col2,6-15', 'Ps145,1', '1Co6,1-11', 'Ps149,1', 'Lc6,12-19'),
(272, 'perannum_23-4', 'Col3,1-11', 'Ps145,2', '1Co7,25-31', 'Ps45,11', 'Lc6,20-26'),
(273, 'perannum_23-5', 'Col3,12-17', 'Ps150,1', '1Co8,1-13', 'Ps139,1', 'Lc6,27-38'),
(274, 'perannum_23-6', '1Tm1,1-14', 'Ps16,1', '1Co9,16-27', 'Ps84,2', 'Lc6,39-42'),
(275, 'perannum_23-7', '1Tm1,15-17', 'Ps113,1', '1Co10,14-22', 'Ps116,12', 'Lc6,43-49'),
(276, 'perannum_24-2', '1Tm2,1-8', 'Ps28,1', '1Co11,17-26', 'Ps40,7', 'Lc7,1-10'),
(277, 'perannum_24-3', '1Tm3,1-13', 'Ps101,1', '1Co12,12-31', 'Ps100,1', 'Lc7,11-17'),
(278, 'perannum_24-4', '1Tm3,14-16', 'Ps111,1', '1Co12,31-13,13', 'Ps33,2', 'Lc7,31-35'),
(279, 'perannum_24-5', '1Tm4,12-16', 'Ps111,7', '1Co15,1-11', 'Ps118,1', 'Lc7,36-50'),
(280, 'perannum_24-6', '1Tm6,2-12', 'Ps49,6', '1Co15,12-20', 'Ps17,1', 'Lc8,1-3'),
(281, 'perannum_24-7', '1Tm6,13-16', 'Ps100,1', '1Co15,35-49', 'Ps56,4', 'Lc8,4-15'),
(282, 'perannum_25-2', 'Esd1,1-6', 'Ps126,1', 'Pr3,27-34', 'Ps15,1', 'Lc8,16-18'),
(283, 'perannum_25-3', 'Esd6,7-20', 'Ps122,1', 'Pr21,1-13', 'Ps119,1', 'Lc8,19-21'),
(284, 'perannum_25-4', 'Esd9,5-9', 'Tb13,2', 'Pr30,5-9', 'Ps119,29', 'Lc9,1-6'),
(285, 'perannum_25-5', 'Ag1,1-8', 'Ps149,1', 'Qo1,2-11', 'Ps90,3', 'Lc9,7-9'),
(286, 'perannum_25-6', 'Ag1,15-2,9', 'Ps43,1', 'Qo3,1-11', 'Ps144,1', 'Lc9,18-22'),
(287, 'perannum_25-7', 'Za2,5-15', 'Jr31,10', 'Qo11,9-12,8', 'Ps90,3', 'Lc9,43-45'),
(288, 'perannum_26-2', 'Za8,1-8', 'Ps102,16', 'Jb1,6-22', 'Ps17,1', 'Lc9,46-50'),
(289, 'perannum_26-3', 'Za8,20-23', 'Ps87,2', 'Jb3,1-23', 'Ps88,2', 'Lc9,51-56'),
(290, 'perannum_26-4', 'Ne2,1-8', 'Ps137,1', 'Jb9,1-16', 'Ps82,1', 'Lc9,57-62'),
(291, 'perannum_26-5', 'Ne8,1-12', 'Ps19,8', 'Jb19,21-27', 'Ps27,7', 'Lc10,1-12'),
(292, 'perannum_26-6', 'Ba1,15-22', 'Ps79,1', 'Jb38,1-40,5', 'Ps139,1', 'Lc10,13-16'),
(293, 'perannum_26-7', 'Ba4,5-29', 'Ps69,33', 'Jb42,1-17', 'Ps119,66', 'Lc10,17-24'),
(294, 'perannum_27-2', 'Jon1,1-2,11', 'Jon2,2', 'Ga1,6-12', 'Ps111,1', 'Lc10,25-37'),
(295, 'perannum_27-3', 'Jon3,1-10', 'Ps130,1', 'Ga1,13-24', 'Ps139,1', 'Lc10,38-42'),
(296, 'perannum_27-4', 'Jon4,1-11', 'Ps86,3', 'Ga2,1-14', 'Ps117,1', 'Lc11,1-4'),
(297, 'perannum_27-5', 'Ml3,13-20', 'Ps1,1', 'Ga3,1-5', 'Lc1,69', 'Lc11,5-13'),
(298, 'perannum_27-6', 'Jl1,13-2,2', 'Ps9,2', 'Ga3,6-14', 'Ps111,1', 'Lc11,15-26'),
(299, 'perannum_27-7', 'Jl4,12-21', 'Ps97,1', 'Ga3,22-29', 'Ps105,2', 'Lc11,27-28'),
(300, 'perannum_28-2', 'Rm1,1-7', 'Ps98,1', 'Ga4,22-5,1', 'Ps113,1', 'Lc11,29-32'),
(301, 'perannum_28-3', 'Rm1,16-25', 'Ps19,2', 'Ga5,1-6', 'Ps119,41', 'Lc11,37-41'),
(302, 'perannum_28-4', 'Rm2,1-11', 'Ps62,6', 'Ga5,18-25', 'Ps1,1', 'Lc11,42-46'),
(303, 'perannum_28-5', 'Rm3,21-30', 'Ps130,1', 'Ep1,1-10', 'Ps98,1', 'Lc11,47-54'),
(304, 'perannum_28-6', 'Rm4,1-8', 'Ps32,1', 'Ep1,11-14', 'Ps33,1', 'Lc12,1-7'),
(305, 'perannum_28-7', 'Rm4,13-18', 'Ps105,4', 'Ep1,15-23', 'Ps8,2', 'Lc12,8-12'),
(306, 'perannum_29-2', 'Rm4,20-25', 'Lc1,69', 'Ep2,1-10', 'Ps100,1', 'Lc12,13-21'),
(307, 'perannum_29-3', 'Rm5,12-21', 'Ps40,7', 'Ep2,12-22', 'Ps85,9', 'Lc12,35-38'),
(308, 'perannum_29-4', 'Rm6,12-18', 'Ps124,2', 'Ep3,2-12', 'Is11,2', NULL),
(309, 'perannum_29-5', 'Rm6,19-23', 'Ps1,1', 'Ep3,14-21', 'Ps33,1', 'Lc12,49-53'),
(310, 'perannum_29-6', 'Rm7,18-25', 'Ps119,66', 'Ep4,1-6', 'Ps24,1', 'Lc12,54-59'),
(311, 'perannum_29-7', 'Rm8,1-11', 'Ps24,1', 'Ep4,7-16', 'Ps122,1', NULL),
(312, 'perannum_30-2', 'Rm8,12-17', 'Ps68,2', 'Ep4,32-5,8', 'Ps1', 'Lc13,10-17'),
(313, 'perannum_30-3', 'Rm8,18-25', 'Ps126,1', 'Ep5,21-33', 'Ps128,1', 'Lc13,18-21'),
(314, 'perannum_30-4', 'Rm8,26-30', 'Ps12,4', 'Ep6,1-9', 'Ps145,1', 'Lc13,22-30'),
(315, 'perannum_30-5', 'Rm8,31-39', 'Ps109,21', 'Ep6,10-20', 'Ps144,1', 'Lc13,31-35'),
(316, 'perannum_30-6', 'Rm9,1-5', 'Ps147,12', 'Ph1,1-11', 'Ps111,1', 'Lc14,1-6'),
(317, 'perannum_30-7', 'Rm11,1-29', 'Ps94,12', 'Ph1,18-26', 'Ps42,2', 'Lc14,1-11'),
(318, 'perannum_31-2', 'Rm11,29-36', 'Ps69,30', 'Ph2,1-4', 'Ps131,1', 'Lc14,12-14'),
(319, 'perannum_31-3', 'Rm12,5-16', 'Ps131,1', 'Ph2,5-11', 'Ps22,24', 'Lc14,15-24'),
(320, 'perannum_31-4', 'Rm13,8-10', 'Ps112,1', 'Ph2,12-18', 'Ps27,1', 'Lc14,25-33'),
(321, 'perannum_31-5', 'Rm14,7-12', 'Ps27,1', 'Ph3,3-8', 'Ps105,2', 'Lc15,1-10'),
(322, 'perannum_31-6', 'Rm15,14-21', 'Ps98,1', 'Ph3,17-4,1', 'Ps122,1', 'Lc16,1-8'),
(323, 'perannum_31-7', 'Rm16,3-27', 'Ps145,2', 'Ph4,10-19', 'Ps112,1', 'Lc16,9-15'),
(324, 'perannum_32-2', 'Sg1,1-7', 'Ps139,1', 'Tt1,1-9', 'Ps24,1', 'Lc17,1-6'),
(325, 'perannum_32-3', 'Sg2,23-3,9', 'Ps34,2', 'Tt2,1-14', 'Ps37,3', 'Lc17,7-10'),
(326, 'perannum_32-4', 'Sg6,1-11', 'Ps82,3', 'Tt3,1-7', 'Ps23,1', NULL),
(327, 'perannum_32-5', 'Sg7,22-8,1', 'Ps119,89', 'Phm44013', 'Ps146,6', 'Lc17,20-25'),
(328, 'perannum_32-6', 'Sg13,1-9', 'Ps19,2', '2Jn1,1-9', 'Ps119,1', NULL),
(329, 'perannum_32-7', 'Sg18,14-19,9', 'Ps105,2', '3Jn1,5-8', 'Ps112,1', 'Lc18,1-8'),
(330, 'perannum_33-2', '1M1,10-64', 'Ps119,53', 'Ap1,1-2,5', 'Ps1,1', 'Lc18,35-43'),
(331, 'perannum_33-3', '2M6,18-31', 'Ps3,2', 'Ap3,1-22', 'Ps15,1', 'Lc19,1-10'),
(332, 'perannum_33-4', '2M7,1-31', 'Ps17,1', 'Ap4,1-11', 'Ps150,1', 'Lc19,11-28'),
(333, 'perannum_33-5', '1M2,15-29', 'Ps50,1', 'Ap5,1-10', 'Ps149,1', 'Lc19,41-44'),
(334, 'perannum_33-6', '1M4,36-59', '1Ch29,10', 'Ap10,8-11', 'Ps119,14', 'Lc19,45-48'),
(335, 'perannum_33-7', '1M6,1-13', 'Ps9,2', 'Ap11,4-12', 'Ps144,1', 'Lc20,27-40'),
(336, 'perannum_34-2', 'Da1,1-20', 'Da3,52', 'Ap14,1-5', 'Ps24,1', 'Lc21,1-4'),
(337, 'perannum_34-3', 'Da2,31-45', NULL, 'Ap14,14-19', 'Ps96,1', 'Lc21,5-11'),
(338, 'perannum_34-4', 'Da5,1-28', 'Da3,62', 'Ap15,1-4', 'Ps98,1', 'Lc21,12-19'),
(339, 'perannum_34-5', 'Da6,12-28', 'Da3,68', 'Ap18,1-19,9', 'Ps100,1', 'Lc21,20-28'),
(340, 'perannum_34-6', 'Da7,2-14', 'Da3,75', 'Ap20,1-21,2', 'Ps84,2', 'Lc21,29-33'),
(341, 'perannum_34-7', 'Da7,15-27', 'Da3,82', 'Ap22,1-7', 'Ps95,1', 'Lc21,34-36');