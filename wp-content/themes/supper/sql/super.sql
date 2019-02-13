-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 13, 2019 at 05:37 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `super`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_term_relationships`
--

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Dumping data for table `wp_term_relationships`
--

INSERT INTO `wp_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1072, 59, 0),
(1262, 59, 0),
(1263, 59, 0),
(1264, 59, 0),
(1265, 59, 0),
(1266, 59, 0),
(1267, 59, 0),
(1268, 59, 0),
(1269, 59, 0),
(1270, 59, 0),
(1271, 59, 0),
(1272, 59, 0),
(1273, 59, 0),
(1274, 59, 0),
(1275, 59, 0),
(1276, 59, 0),
(1277, 59, 0),
(1278, 59, 0),
(1279, 59, 0),
(1280, 59, 0),
(1281, 59, 0),
(1282, 59, 0),
(1283, 59, 0),
(1284, 59, 0),
(1285, 59, 0),
(1286, 59, 0),
(1287, 59, 0),
(1288, 59, 0),
(1289, 59, 0),
(1290, 59, 0),
(1291, 59, 0),
(1292, 59, 0),
(1293, 59, 0),
(1294, 59, 0),
(1295, 59, 0),
(1296, 59, 0),
(1297, 59, 0),
(1298, 59, 0),
(1299, 59, 0),
(1300, 59, 0),
(1301, 59, 0),
(1302, 59, 0),
(1303, 60, 0),
(1304, 60, 0),
(1305, 60, 0),
(1306, 60, 0),
(1307, 60, 0),
(1308, 60, 0),
(1309, 60, 0),
(1310, 60, 0),
(1311, 60, 0),
(1312, 60, 0),
(1313, 60, 0),
(1314, 60, 0),
(1315, 60, 0),
(1316, 60, 0),
(1317, 60, 0),
(1318, 60, 0),
(1319, 60, 0),
(1320, 60, 0),
(1321, 60, 0),
(1322, 60, 0),
(1323, 60, 0),
(1324, 60, 0),
(1325, 60, 0),
(1326, 60, 0),
(1327, 60, 0),
(1328, 60, 0),
(1329, 60, 0),
(1330, 60, 0),
(1331, 60, 0),
(1332, 60, 0),
(1333, 60, 0),
(1334, 60, 0),
(1335, 60, 0),
(1336, 60, 0),
(1337, 60, 0),
(1338, 59, 0),
(1339, 60, 0),
(1340, 59, 0),
(1341, 59, 0),
(1342, 59, 0),
(1343, 59, 0),
(1344, 59, 0),
(1345, 59, 0),
(1346, 59, 0),
(1347, 59, 0),
(1348, 59, 0),
(1349, 59, 0),
(1350, 59, 0),
(1351, 59, 0),
(1352, 59, 0),
(1353, 59, 0),
(1354, 59, 0),
(1355, 60, 0),
(1356, 60, 0),
(1357, 60, 0),
(1358, 60, 0),
(1359, 60, 0),
(1360, 60, 0),
(1361, 60, 0),
(1362, 60, 0),
(1401, 73, 0),
(1404, 74, 0),
(1413, 75, 0),
(1417, 75, 0),
(1420, 75, 0),
(1423, 75, 0),
(1426, 73, 0),
(1426, 76, 0),
(1426, 78, 0),
(1486, 76, 0),
(1487, 76, 0),
(1490, 87, 0),
(1491, 87, 0),
(1492, 87, 0),
(1493, 87, 0),
(1494, 87, 0),
(1495, 87, 0),
(1496, 87, 0),
(1497, 87, 0),
(1498, 87, 0),
(1504, 87, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
