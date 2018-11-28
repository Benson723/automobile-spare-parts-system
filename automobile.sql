-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 16, 2018 at 10:35 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `automobile`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `adminname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `accessname` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `adminname`, `email`, `phone`, `accessname`, `password`, `image`) VALUES
(6, 'boss', 'boss@gmail.com', '8606717255', 'boss', 'boss', 'A91E6BA6-0EB1-4DBB-BE16-E2E445378CED.png');

-- --------------------------------------------------------

--
-- Table structure for table `automobilesparepart`
--

CREATE TABLE `automobilesparepart` (
  `userid` varchar(30) NOT NULL,
  `uploadid` varchar(30) NOT NULL,
  `productname` varchar(30) NOT NULL,
  `companyname` varchar(30) NOT NULL,
  `yearofmanufacture` varchar(30) NOT NULL,
  `noofhands` varchar(30) NOT NULL,
  `specifications` varchar(30) NOT NULL,
  `expectingprice` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `description` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`) VALUES
(1, 'Body and main parts'),
(2, 'Electrical and electronics'),
(3, 'Interior'),
(4, 'Power-train and chassis ');

-- --------------------------------------------------------

--
-- Table structure for table `cds`
--

CREATE TABLE `cds` (
  `titel` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `interpret` varchar(200) COLLATE latin1_general_ci DEFAULT NULL,
  `jahr` int(11) DEFAULT NULL,
  `id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `cds`
--

INSERT INTO `cds` (`titel`, `interpret`, `jahr`, `id`) VALUES
('Beauty', 'Ryuichi Sakamoto', 1990, 1),
('Goodbye Country (Hello Nightclub)', 'Groove Armada', 2001, 4),
('Glee', 'Bran Van 3000', 1997, 5);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `senderid` int(11) NOT NULL,
  `comment` varchar(300) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `productid`, `senderid`, `comment`) VALUES
(1, 13, 7, 'hi I think this product is good'),
(3, 13, 7, 'hi I think this product is good'),
(9, 14, 6, 'good'),
(10, 14, 5, 'cool product'),
(11, 13, 7, 'liked it'),
(8, 13, 6, 'poor quality'),
(12, 13, 9, 'superb'),
(13, 15, 10, 'super'),
(14, 13, 10, 'bad'),
(15, 16, 17, ''),
(16, 18, 18, 'please reduce the price');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int(11) NOT NULL,
  `bywhom` int(11) NOT NULL,
  `onwhom` int(11) NOT NULL,
  `matter` varchar(150) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `bywhom`, `onwhom`, `matter`, `status`) VALUES
(1, 7, 6, 'he have not given me the product', 'responded'),
(5, 9, 8, 'hjgj', ''),
(6, 9, 8, 'bad product', ''),
(7, 9, 7, 'jhjn', 'responded'),
(8, 9, 5, 'pls remove', 'responded'),
(9, 10, 8, 'high rates', 'responded'),
(10, 9, 8, 'bad', 'responded'),
(11, 9, 10, 'bad product', 'responded'),
(12, 9, 14, 'remove', 'responded');

-- --------------------------------------------------------

--
-- Table structure for table `fundtransfer`
--

CREATE TABLE `fundtransfer` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `saccount` varchar(50) NOT NULL,
  `raccount` varchar(50) NOT NULL,
  `amount` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fundtransfer`
--

INSERT INTO `fundtransfer` (`id`, `userid`, `saccount`, `raccount`, `amount`) VALUES
(1, 7, '23456', '12345', 2000),
(2, 5, '1234', '', 2000),
(3, 15, '984654655665', '2345', 1000),
(4, 12, '154545545165', '54554', 0),
(5, 17, '1020304050', '1234567899', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `filename` varchar(60) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `pid`, `filename`) VALUES
(15, 13, 'vin1.jpeg'),
(18, 13, 'vin3.jpeg'),
(17, 13, 'vin2.jpeg'),
(16, 13, 'vin4.jpeg'),
(19, 15, 'eng1.jpeg'),
(20, 16, 'tyre1.jpeg'),
(21, 16, 'tyre2.jpeg'),
(22, 16, 'tyre3.jpeg'),
(23, 18, 'mrf1.jpg'),
(24, 18, 'mrf2.png'),
(25, 18, 'mrf3.jpg'),
(26, 18, 'mrf4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `senderid` int(11) NOT NULL,
  `receiverid` int(11) NOT NULL,
  `msg` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `senderid`, `receiverid`, `msg`) VALUES
(12, 7, 5, 'did u go to college?'),
(11, 7, 5, 'tell me how are you?'),
(10, 5, 7, 'yes i am meera'),
(9, 7, 5, 'hi meera'),
(13, 7, 5, 'ok dont reply'),
(14, 5, 8, 'hi'),
(15, 5, 7, 'yup'),
(16, 7, 8, 'hi'),
(17, 9, 8, 'hi'),
(18, 9, 10, 'hai'),
(19, 10, 9, 'hai'),
(20, 9, 10, ''),
(21, 9, 10, ''),
(22, 9, 10, ''),
(23, 9, 10, ''),
(24, 9, 10, ''),
(25, 9, 10, ''),
(26, 9, 10, ''),
(27, 13, 10, 'hai did you know me'),
(28, 10, 13, 'oh tomson my roll model'),
(29, 9, 13, 'hai'),
(30, 13, 9, 'hai'),
(31, 18, 17, 'hii'),
(32, 17, 18, 'poda \r\n');

-- --------------------------------------------------------

--
-- Table structure for table `php12`
--

CREATE TABLE `php12` (
  `name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `php12`
--

INSERT INTO `php12` (`name`, `email`) VALUES
('', '@'),
('', '@'),
('', '@'),
('nb,', 'bn,'),
('abilash', 'abi@gmai.com');

-- --------------------------------------------------------

--
-- Table structure for table `pma_bookmark`
--

CREATE TABLE `pma_bookmark` (
  `id` int(11) NOT NULL,
  `dbase` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `user` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `query` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma_column_info`
--

CREATE TABLE `pma_column_info` (
  `id` int(5) UNSIGNED NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `transformation` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Column information for phpMyAdmin';

--
-- Dumping data for table `pma_column_info`
--

INSERT INTO `pma_column_info` (`id`, `db_name`, `table_name`, `column_name`, `comment`, `mimetype`, `transformation`, `transformation_options`) VALUES
(1, 'jiss', 'student', 'sid', '', '', '_', ''),
(2, 'jiss', 'student', 'sname', '', '', '_', ''),
(3, 'jiss', 'student', 'batch', '', '', '_', ''),
(4, 'php1', 'php12', 'name', '', '', '_', ''),
(5, 'php1', 'php12', 'email', '', '', '_', ''),
(6, 'reg', 'reg1', 'name', '', '', '_', ''),
(7, 'reg', 'reg1', 'address', '', '', '_', ''),
(8, 'reg', 'reg1', 'gender', '', '', '_', ''),
(9, 'reg', 'reg1', 'state', '', '', '_', ''),
(10, 'reg', 'reg1', 'course', '', '', '_', ''),
(11, 'reg', 'reg1', 'date of birth', '', '', '_', ''),
(17, 'php1', 'regsam', 'name', '', '', '_', ''),
(13, 'reg', 'reg1', 'age', '', '', '_', ''),
(14, 'reg', 'reg1', 'email', '', '', '_', ''),
(15, 'reg', 'reg1', 'username', '', '', '_', ''),
(16, 'reg', 'reg1', 'password', '', '', '_', ''),
(18, 'php1', 'regsam', 'address', '', '', '_', ''),
(19, 'php1', 'regsam', 'age', '', '', '_', ''),
(20, 'php1', 'regsam', 'email', '', '', '_', ''),
(21, 'php1', 'regsam', 'username', '', '', '_', ''),
(22, 'php1', 'regsam', 'password', '', '', '_', ''),
(23, 'usedautomobilesparepartsbusinessportal', 'admin', 'adminname', '', '', '_', ''),
(24, 'usedautomobilesparepartsbusinessportal', 'admin', 'adminemail', '', '', '_', ''),
(25, 'usedautomobilesparepartsbusinessportal', 'admin', 'adminphone', '', '', '_', ''),
(26, 'usedautomobilesparepartsbusinessportal', 'admin', 'accessname', '', '', '_', ''),
(27, 'usedautomobilesparepartsbusinessportal', 'admin', 'password', '', '', '_', ''),
(28, 'usedautomobilesparepartsbusinessportal', 'admin', 'adminimage', '', '', '_', ''),
(29, 'usedautomobilesparepartsbusinessportal', 'userdetails', 'username', '', '', '_', ''),
(30, 'usedautomobilesparepartsbusinessportal', 'userdetails', 'useraddress', '', '', '_', ''),
(31, 'usedautomobilesparepartsbusinessportal', 'userdetails', 'useremail', '', '', '_', ''),
(32, 'usedautomobilesparepartsbusinessportal', 'userdetails', 'usercontactnumber', '', '', '_', ''),
(33, 'usedautomobilesparepartsbusinessportal', 'userdetails', 'userlocation', '', '', '_', ''),
(34, 'usedautomobilesparepartsbusinessportal', 'userdetails', 'userimage', '', '', '_', ''),
(35, 'usedautomobilesparepartsbusinessportal', 'userdetails', 'useraccountnumber', '', '', '_', ''),
(39, 'usedautomobilesparepartsbusinessportal', 'automobilesparepart', 'userid', '', '', '_', ''),
(37, 'usedautomobilesparepartsbusinessportal', 'userdetails', 'password', '', '', '_', ''),
(38, 'usedautomobilesparepartsbusinessportal', 'userdetails', 'userid', '', '', '_', ''),
(40, 'usedautomobilesparepartsbusinessportal', 'automobilesparepart', 'uploadid', '', '', '_', ''),
(41, 'usedautomobilesparepartsbusinessportal', 'automobilesparepart', 'productname', '', '', '_', ''),
(42, 'usedautomobilesparepartsbusinessportal', 'automobilesparepart', 'companyname', '', '', '_', ''),
(43, 'usedautomobilesparepartsbusinessportal', 'automobilesparepart', 'yearofmanufacture', '', '', '_', ''),
(44, 'usedautomobilesparepartsbusinessportal', 'automobilesparepart', 'noofhands', '', '', '_', ''),
(45, 'usedautomobilesparepartsbusinessportal', 'automobilesparepart', 'specifications', '', '', '_', ''),
(46, 'usedautomobilesparepartsbusinessportal', 'automobilesparepart', 'expectingprice', '', '', '_', ''),
(47, 'usedautomobilesparepartsbusinessportal', 'automobilesparepart', 'category', '', '', '_', ''),
(48, 'usedautomobilesparepartsbusinessportal', 'automobilesparepart', 'decsripton', '', '', '_', ''),
(49, 'usedautomobilesparepartsbusinessportal', 'automobilesparepart', 'descsripton', '', '', '_', ''),
(50, 'usedautomobilesparepartsbusinessportal', 'automobilesparepart', 'description', '', '', '_', ''),
(51, 'automobile', 'complaints', 'status', '', '', '_', '');

-- --------------------------------------------------------

--
-- Table structure for table `pma_designer_coords`
--

CREATE TABLE `pma_designer_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `v` tinyint(4) DEFAULT NULL,
  `h` tinyint(4) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma_history`
--

CREATE TABLE `pma_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sqlquery` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_navigationhiding`
--

CREATE TABLE `pma_navigationhiding` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `item_type` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Hidden items of navigation tree';

--
-- Dumping data for table `pma_navigationhiding`
--

INSERT INTO `pma_navigationhiding` (`username`, `item_name`, `item_type`, `db_name`, `table_name`) VALUES
('root', 'admin', 'table', 'usedautomobilesparepartsbusinessportal', ''),
('root', 'userdetails', 'table', 'usedautomobilesparepartsbusinessportal', ''),
('root', 'users', 'table', 'automobile', '');

-- --------------------------------------------------------

--
-- Table structure for table `pma_pdf_pages`
--

CREATE TABLE `pma_pdf_pages` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `page_nr` int(10) UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8 NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_recent`
--

CREATE TABLE `pma_recent` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `tables` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma_recent`
--

INSERT INTO `pma_recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"automobile\",\"table\":\"users\"},{\"db\":\"automobile\",\"table\":\"subcategory\"},{\"db\":\"automobile\",\"table\":\"spareparts\"},{\"db\":\"automobile\",\"table\":\"messages\"},{\"db\":\"automobile\",\"table\":\"gallery\"},{\"db\":\"automobile\",\"table\":\"fundtransfer\"},{\"db\":\"automobile\",\"table\":\"complaints\"},{\"db\":\"automobile\",\"table\":\"category\"},{\"db\":\"automobile\",\"table\":\"admin\"},{\"db\":\"automobile\",\"table\":\"comments\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma_relation`
--

CREATE TABLE `pma_relation` (
  `master_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma_savedsearches`
--

CREATE TABLE `pma_savedsearches` (
  `id` int(5) UNSIGNED NOT NULL,
  `username` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `search_data` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_coords`
--

CREATE TABLE `pma_table_coords` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `pdf_page_number` int(11) NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_info`
--

CREATE TABLE `pma_table_info` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) COLLATE utf8_bin NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma_table_uiprefs`
--

CREATE TABLE `pma_table_uiprefs` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `prefs` text COLLATE utf8_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma_tracking`
--

CREATE TABLE `pma_tracking` (
  `db_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `table_name` varchar(64) COLLATE utf8_bin NOT NULL,
  `version` int(10) UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text COLLATE utf8_bin NOT NULL,
  `schema_sql` text COLLATE utf8_bin,
  `data_sql` longtext COLLATE utf8_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') COLLATE utf8_bin DEFAULT NULL,
  `tracking_active` int(1) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Database changes tracking for phpMyAdmin' ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `pma_userconfig`
--

CREATE TABLE `pma_userconfig` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma_userconfig`
--

INSERT INTO `pma_userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2016-11-24 06:12:34', '{\"collation_connection\":\"utf8mb4_general_ci\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma_usergroups`
--

CREATE TABLE `pma_usergroups` (
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL,
  `tab` varchar(64) COLLATE utf8_bin NOT NULL,
  `allowed` enum('Y','N') COLLATE utf8_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma_users`
--

CREATE TABLE `pma_users` (
  `username` varchar(64) COLLATE utf8_bin NOT NULL,
  `usergroup` varchar(64) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Users and their assignments to user groups';

-- --------------------------------------------------------

--
-- Table structure for table `reg1`
--

CREATE TABLE `reg1` (
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg1`
--

INSERT INTO `reg1` (`name`, `address`, `age`, `email`, `username`, `password`) VALUES
('jiijs', 'jiii', 23, 'jiamak', 'jish', 'kokos'),
('abhilash', 'manjapra', 20, 'abhi@gmail.com', 'abhi467', 'abhilash'),
('fhysrd', 'hvj', 12, 'hjh', 'b', 'm'),
('justin', 'thanipuzha', 20, 'just43@gmail.com', 'justi', 'justi'),
('abi', 'ssa', 3, 'hh', 'bbbb', 'ddd'),
('d', 'd', 4, 'e', 'e', 'e'),
('', '', 0, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `regsam`
--

CREATE TABLE `regsam` (
  `name` varchar(30) NOT NULL,
  `address` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spareparts`
--

CREATE TABLE `spareparts` (
  `id` int(11) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `companyname` varchar(50) NOT NULL,
  `year` int(5) NOT NULL,
  `hands` int(11) NOT NULL,
  `specification` varchar(500) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(500) NOT NULL,
  `category` varchar(50) NOT NULL,
  `subcategory` varchar(50) NOT NULL,
  `userid` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spareparts`
--

INSERT INTO `spareparts` (`id`, `productname`, `companyname`, `year`, `hands`, `specification`, `price`, `description`, `category`, `subcategory`, `userid`) VALUES
(18, 'tyre', 'MRF', 2016, 1, 'MRF tyre', 3600, 'Good condition', '1', '9', 17);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `sid` int(3) NOT NULL,
  `sname` char(20) NOT NULL,
  `batch` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`sid`, `sname`, `batch`) VALUES
(1, 'gitto', 'bca14');

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `subcat_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `cid`, `subcat_name`) VALUES
(1, 1, 'Doors'),
(2, 1, 'Windows'),
(3, 2, ' Audio/video devices'),
(4, 2, 'Cameras'),
(5, 2, 'Charging system'),
(6, 2, ' Electrical supply system'),
(7, 2, 'Gauges and meters'),
(8, 3, 'Floor components and parts'),
(9, 1, 'tyre'),
(10, 3, 'Car seat'),
(11, 4, 'Braking system'),
(12, 4, 'Engine components and parts'),
(13, 4, 'Engine cooling system'),
(14, 4, 'Engine oil system'),
(15, 4, 'Exhaust system');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contactnumber` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `accountnumber` varchar(50) NOT NULL,
  `accessname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `contactnumber`, `location`, `image`, `accountnumber`, `accessname`, `password`, `status`) VALUES
(18, 'anand', 'anand@gmail.com', 'mulamkunnathkavu', '9786541230', 'thrissur', 'anand_user.png', '2010304050', 'anand', 'anand', 'null'),
(17, 'Saviyo', 'saviyo@gmail.com', 'ernakulam', '9876543210', 'kerala', 'savie_Wikipedia_User-ICON_byNightsight.png', '1020304050', 'savie', 'savie', 'null');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cds`
--
ALTER TABLE `cds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fundtransfer`
--
ALTER TABLE `fundtransfer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma_bookmark`
--
ALTER TABLE `pma_bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma_column_info`
--
ALTER TABLE `pma_column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma_designer_coords`
--
ALTER TABLE `pma_designer_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma_history`
--
ALTER TABLE `pma_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma_navigationhiding`
--
ALTER TABLE `pma_navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma_pdf_pages`
--
ALTER TABLE `pma_pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma_recent`
--
ALTER TABLE `pma_recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma_relation`
--
ALTER TABLE `pma_relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma_savedsearches`
--
ALTER TABLE `pma_savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma_table_coords`
--
ALTER TABLE `pma_table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma_table_info`
--
ALTER TABLE `pma_table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma_table_uiprefs`
--
ALTER TABLE `pma_table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma_tracking`
--
ALTER TABLE `pma_tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma_userconfig`
--
ALTER TABLE `pma_userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma_usergroups`
--
ALTER TABLE `pma_usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma_users`
--
ALTER TABLE `pma_users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- Indexes for table `spareparts`
--
ALTER TABLE `spareparts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cds`
--
ALTER TABLE `cds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `fundtransfer`
--
ALTER TABLE `fundtransfer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pma_bookmark`
--
ALTER TABLE `pma_bookmark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma_column_info`
--
ALTER TABLE `pma_column_info`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `pma_history`
--
ALTER TABLE `pma_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma_pdf_pages`
--
ALTER TABLE `pma_pdf_pages`
  MODIFY `page_nr` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma_savedsearches`
--
ALTER TABLE `pma_savedsearches`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `spareparts`
--
ALTER TABLE `spareparts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `sid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
