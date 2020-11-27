-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 26, 2020 at 10:56 AM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zflexsof_churchdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `rs_tbl_admin`
--

CREATE TABLE `rs_tbl_admin` (
  `admin_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `pass` varchar(100) NOT NULL DEFAULT '',
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(25) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `last_login_date` datetime DEFAULT NULL,
  `last_login_ip` varchar(30) DEFAULT NULL,
  `menu_id` varchar(200) DEFAULT NULL,
  `mem_type` int(2) DEFAULT '1' COMMENT '1=>Main Admin, 2=>Sub Admin'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rs_tbl_admin_menu`
--

CREATE TABLE `rs_tbl_admin_menu` (
  `menu_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `menu_title` varchar(255) NOT NULL,
  `menu_link` varchar(255) NOT NULL,
  `menu_order` smallint(4) NOT NULL DEFAULT '0',
  `frm_status` int(2) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rs_tbl_church`
--

CREATE TABLE `rs_tbl_church` (
  `church_id` int(11) NOT NULL,
  `church_name` varchar(250) DEFAULT NULL,
  `church_address` varchar(250) DEFAULT NULL,
  `church_city` varchar(250) DEFAULT NULL,
  `church_state` varchar(255) DEFAULT NULL,
  `church_country` int(11) DEFAULT NULL,
  `church_p_number` varchar(70) DEFAULT NULL,
  `church_m_number` varchar(70) DEFAULT NULL,
  `church_logo` varchar(10) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `is_active` int(2) NOT NULL DEFAULT '1' COMMENT '1=>Active, 0=>InActive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_tbl_church`
--

INSERT INTO `rs_tbl_church` (`church_id`, `church_name`, `church_address`, `church_city`, `church_state`, `church_country`, `church_p_number`, `church_m_number`, `church_logo`, `created_date`, `is_active`) VALUES
(1, 'New Church', 'church Location', 'Church City', 'Church State', 223, '987654321', '123456789', 'e39fd.png', '2018-01-15', 1),
(2, 'Old Friendship Missionary Baptist Church', '731 Friendship Church Road', 'Powder Springs', 'Georgia', 223, '770-426-8577', '770-426-8577', '2751e.jpg', '2018-01-15', 1),
(3, 'West Cobb Church', '1245 Villa Rica Road', 'Marietta', 'Georgia', 223, '770-422-8822', '770-422-8822', 'cd103.png', '2018-01-15', 1),
(4, 'World Changes', 'Atlanta', 'Atlanta', 'Georgia', 223, '404-343-9983', '678-997-8765', NULL, '2018-01-25', 1),
(5, 'Test Church', 'Testing Location Field', 'Testing City Field', 'Testing State Filed', 222, '123456789', '987654321', '9bcb2.jpg', '2018-01-30', 1),
(6, 'ABHIJECT-CHURCH', 'India', 'India', 'India', 0, '4445454545', '4554545455', '63085.png', '2018-06-23', 1),
(7, 'TEST OFFICE1', 'India', 'Moconna', 'TESTSTATE', 223, '4044287163', '3443434', '0afa6.png', '2018-06-23', 1),
(8, 'Testing grounds', 'The Internet', 'Netcity', 'State', 73, '123', '123', '046f9.jpg', '2018-06-30', 1),
(9, 'Superb Tech', 'Overseas', 'Nosure', 'NA', 98, '444.444.4444', NULL, '2e5f2.png', '2019-04-06', 1),
(10, 'Superb Tech Office Business', '23232 Providence', 'NA', 'India', 99, '334-343-3433', '334-343-9990', '7de34.jpg', '2019-04-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rs_tbl_config`
--

CREATE TABLE `rs_tbl_config` (
  `config_id` int(10) NOT NULL,
  `config_category` varchar(100) NOT NULL DEFAULT '''site''',
  `config_caption` varchar(255) NOT NULL,
  `config_key` varchar(255) NOT NULL,
  `config_value` text NOT NULL,
  `config_order` smallint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_tbl_config`
--

INSERT INTO `rs_tbl_config` (`config_id`, `config_category`, `config_caption`, `config_key`, `config_value`, `config_order`) VALUES
(1, 'mail', 'Site E-mail', 'site_email', '', 1),
(2, 'site', 'Meta Title', 'meta_title', '|| ZFlex ||', 2),
(3, 'site', 'Meta Keywords', 'meta_keywords', '|| ZFlex ||', 3),
(4, 'sote', 'Meta Description', 'meta_desc', '|| ZFlex ||', 4);

-- --------------------------------------------------------

--
-- Table structure for table `rs_tbl_contact`
--

CREATE TABLE `rs_tbl_contact` (
  `contact_id` int(11) NOT NULL,
  `contact_address` text,
  `contact_number` varchar(100) DEFAULT NULL,
  `contact_timing` varchar(250) DEFAULT NULL,
  `is_active` int(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `rs_tbl_contents`
--

CREATE TABLE `rs_tbl_contents` (
  `cms_id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT '0',
  `cms_type` varchar(50) DEFAULT NULL,
  `cms_title` varchar(255) DEFAULT NULL,
  `cms_heading` varchar(255) DEFAULT NULL,
  `cms_meta_keyword` text,
  `cms_meta_description` text,
  `cms_details` longblob,
  `cms_date` int(10) DEFAULT NULL,
  `cms_file` varchar(100) DEFAULT NULL,
  `is_active` int(2) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rs_tbl_countries`
--

CREATE TABLE `rs_tbl_countries` (
  `country_id` int(11) NOT NULL,
  `country_name` varchar(64) NOT NULL DEFAULT '',
  `iso_code_2` char(2) NOT NULL,
  `iso_code_3` char(3) NOT NULL,
  `format_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_tbl_countries`
--

INSERT INTO `rs_tbl_countries` (`country_id`, `country_name`, `iso_code_2`, `iso_code_3`, `format_id`) VALUES
(1, 'Afghanistan', 'AF', 'AFG', 1),
(2, 'Albania', 'AL', 'ALB', 1),
(3, 'Algeria', 'DZ', 'DZA', 1),
(4, 'American Samoa', 'AS', 'ASM', 1),
(5, 'Andorra', 'AD', 'AND', 1),
(6, 'Angola', 'AO', 'AGO', 1),
(7, 'Anguilla', 'AI', 'AIA', 1),
(8, 'Antarctica', 'AQ', 'ATA', 1),
(9, 'Antigua and Barbuda', 'AG', 'ATG', 1),
(10, 'Argentina', 'AR', 'ARG', 1),
(11, 'Armenia', 'AM', 'ARM', 1),
(12, 'Aruba', 'AW', 'ABW', 1),
(13, 'Australia', 'AU', 'AUS', 1),
(14, 'Austria', 'AT', 'AUT', 5),
(15, 'Azerbaijan', 'A', 'AZE', 1),
(16, 'Bahamas', 'BS', 'BHS', 1),
(17, 'Bahrain', 'BH', 'BHR', 1),
(18, 'Bangladesh', 'BD', 'B', 1),
(19, 'Barbados', 'BB', 'BRB', 1),
(20, 'Belarus', 'BY', 'BLR', 1),
(21, 'Belgium', 'BE', 'BEL', 1),
(22, 'Belize', 'BZ', 'BLZ', 1),
(23, 'Benin', 'BJ', 'BEN', 1),
(24, 'Bermuda', 'BM', 'BMU', 1),
(25, 'Bhutan', 'BT', 'BTN', 1),
(26, 'Bolivia', 'BO', 'BOL', 1),
(27, 'Bosnia and Herzegowina', 'BA', 'BIH', 1),
(28, 'Botswana', 'BW', 'BWA', 1),
(29, 'Bouvet Island', 'BV', 'BVT', 1),
(30, 'Brazil', 'BR', 'BRA', 1),
(31, 'British Indian Ocean Territory', 'IO', 'IOT', 1),
(32, 'Brunei Darussalam', 'BN', 'BRN', 1),
(33, 'Bulgaria', 'BG', 'BGR', 1),
(34, 'Burkina Faso', 'BF', 'BFA', 1),
(35, 'Burundi', 'BI', 'BDI', 1),
(36, 'Cambodia', 'KH', 'KHM', 1),
(37, 'Cameroon', 'CM', 'CMR', 1),
(38, 'Canada', 'CA', 'CAN', 1),
(39, 'Cape Verde', 'CV', 'CPV', 1),
(40, 'Cayman Islands', 'KY', 'CYM', 1),
(41, 'Central African Republic', 'CF', 'CAF', 1),
(42, 'Chad', 'TD', 'TCD', 1),
(43, 'Chile', 'CL', 'CHL', 1),
(44, 'China', 'CN', 'CHN', 1),
(45, 'Christmas Island', 'CX', 'CXR', 1),
(46, 'Cocos (Keeling) Islands', 'CC', 'CCK', 1),
(47, 'Colombia', 'CO', 'COL', 1),
(48, 'Comoros', 'KM', 'COM', 1),
(49, 'Congo', 'CG', 'COG', 1),
(50, 'Cook Islands', 'CK', 'COK', 1),
(51, 'Costa Rica', 'CR', 'CRI', 1),
(52, 'CoteIvoire', 'CI', 'CIV', 1),
(53, 'Croatia', 'HR', 'HRV', 1),
(54, 'Cuba', 'CU', 'CUB', 1),
(55, 'Cyprus', '', 'CYP', 1),
(56, 'Czech Republic', 'CZ', 'CZE', 1),
(57, 'Denmark', 'DK', 'DNK', 1),
(58, 'Djibouti', 'DJ', 'DJI', 1),
(59, 'Dominica', 'DM', 'DMA', 1),
(60, 'Dominican Republic', 'DO', 'DOM', 1),
(61, 'East Timor', 'TP', 'TMP', 1),
(62, 'Ecuador', 'EC', 'ECU', 1),
(63, 'Egypt', 'EG', 'EGY', 1),
(64, 'El Salvador', 'SV', 'SLV', 1),
(65, 'Equatorial Guinea', 'GQ', 'GNQ', 1),
(66, 'Eritrea', 'ER', 'ERI', 1),
(67, 'Estonia', 'EE', 'EST', 1),
(68, 'Ethiopia', 'ET', 'ETH', 1),
(69, 'Falkland Islands (Malvinas)', 'FK', 'FLK', 1),
(70, 'Faroe Islands', 'FO', 'FRO', 1),
(71, 'Fiji', 'FJ', 'FJI', 1),
(72, 'Finland', 'FI', 'FIN', 1),
(73, 'France', 'FR', 'FRA', 1),
(74, 'France, Metropolitan', 'FX', 'FXX', 1),
(75, 'French Guiana', 'GF', 'GUF', 1),
(76, 'French Polynesia', 'PF', 'PYF', 1),
(77, 'French Southern Territories', 'TF', 'ATF', 1),
(78, 'Gabon', 'GA', 'GAB', 1),
(79, 'Gambia', 'GM', 'GMB', 1),
(80, 'Georgia', 'GE', 'GEO', 1),
(81, 'Germany', 'DE', 'DEU', 5),
(82, 'Ghana', 'GH', 'GHA', 1),
(83, 'Gibraltar', 'GI', '', 1),
(84, 'Greece', 'GR', 'GRC', 1),
(85, 'Greenland', 'GL', 'GRL', 1),
(86, 'Grenada', 'GD', 'GRD', 1),
(87, 'Guadeloupe', 'GP', 'GLP', 1),
(88, 'Guam', 'GU', 'GUM', 1),
(89, 'Guatemala', 'GT', 'GTM', 1),
(90, 'Guinea', 'GN', 'GIN', 1),
(91, 'Guinea-bissau', 'GW', 'GNB', 1),
(92, 'Guyana', 'GY', 'GUY', 1),
(93, 'Haiti', 'HT', 'HTI', 1),
(94, 'Heard and Mc Donald Islands', 'HM', 'HMD', 1),
(95, 'Honduras', 'HN', 'HND', 1),
(96, 'Hong Kong', 'HK', 'HKG', 1),
(97, 'Hungary', 'HU', 'HUN', 1),
(98, 'Iceland', 'IS', 'ISL', 1),
(99, 'India', 'IN', 'IND', 1),
(100, 'Indonesia', 'ID', 'IDN', 1),
(101, 'Iran (Islamic Republic of)', 'IR', 'IRN', 1),
(102, 'Iraq', 'IQ', 'IRQ', 1),
(103, 'Ireland', 'IE', 'IRL', 1),
(104, 'Israel', 'IL', 'ISR', 1),
(105, 'Italy', 'IT', 'ITA', 1),
(106, 'Jamaica', 'JM', 'JAM', 1),
(107, 'Japan', 'JP', 'JPN', 1),
(108, 'Jordan', 'JO', 'JOR', 1),
(109, 'Kazakhstan', 'KZ', 'KAZ', 1),
(110, 'Kenya', 'KE', 'KEN', 1),
(111, 'Kiribati', 'KI', 'KIR', 1),
(112, 'Korea, Democratic Republic', 'KP', 'PRK', 1),
(113, 'Korea, Republic', 'KR', 'KOR', 1),
(114, 'Kuwait', 'KW', 'KWT', 1),
(115, 'Kyrgyzstan', 'KG', 'KGZ', 1),
(116, 'Lao Peoples Democratic Republic', 'LA', 'LAO', 1),
(117, 'Latvia', 'LV', 'LVA', 1),
(118, 'Lebanon', 'LB', 'LBN', 1),
(119, 'Lesotho', 'LS', 'LSO', 1),
(120, 'Liberia', 'LR', 'LBR', 1),
(121, 'Libyan Arab Jamahiriya', 'LY', 'LBY', 1),
(122, 'Liechtenstein', 'LI', 'LIE', 1),
(123, 'Lithuania', 'LT', 'LTU', 1),
(124, 'Luxembourg', 'LU', 'LUX', 1),
(125, 'Macau', 'MO', 'MAC', 1),
(126, 'Macedonia', 'MK', 'MKD', 1),
(127, 'Madagascar', 'MG', 'MDG', 1),
(128, 'Malawi', 'MW', 'MWI', 1),
(129, 'Malaysia', 'MY', 'MYS', 1),
(130, 'Maldives', 'MV', 'MDV', 1),
(131, 'Mali', 'ML', 'MLI', 1),
(132, 'Malta', 'MT', 'M', 1),
(133, 'Marshall Islands', 'MH', 'MHL', 1),
(134, 'Martinique', 'MQ', 'MTQ', 1),
(135, 'Mauritania', 'MR', 'MRT', 1),
(136, 'Mauritius', 'MU', 'MUS', 1),
(137, 'Mayotte', 'YT', 'MYT', 1),
(138, 'Mexico', 'MX', 'MEX', 1),
(139, 'Micronesia', 'FM', 'FSM', 1),
(140, 'Moldova', 'MD', 'MDA', 1),
(141, 'Monaco', 'MC', 'MCO', 1),
(142, 'Mongolia', 'MN', 'MNG', 1),
(143, 'Montserrat', 'MS', 'MSR', 1),
(144, 'Morocco', 'MA', 'MAR', 1),
(145, 'Mozambique', 'MZ', 'MOZ', 1),
(146, 'Myanmar', 'MM', 'MMR', 1),
(147, 'Namibia', 'NA', 'NAM', 1),
(148, 'Nauru', 'NR', 'NRU', 1),
(149, 'Nepal', 'NP', 'NPL', 1),
(150, 'Netherlands', 'NL', 'NLD', 1),
(151, 'Netherlands Antilles', 'AN', 'ANT', 1),
(152, 'New Caledonia', 'NC', 'NCL', 1),
(153, 'New Zealand', 'NZ', 'NZL', 1),
(154, 'Nicaragua', 'NI', 'NIC', 1),
(155, 'Niger', 'NE', 'NER', 1),
(156, 'Nigeria', 'NG', 'NGA', 1),
(157, 'Niue', 'NU', 'NIU', 1),
(158, 'Norfolk Island', 'NF', 'NFK', 1),
(159, 'Northern Mariana Islands', 'MP', 'MNP', 1),
(160, 'Norway', 'NO', 'NOR', 1),
(161, 'Oman', 'OM', 'OMN', 1),
(162, 'Pakistan', 'PK', 'PAK', 1),
(163, 'Palau', 'PW', 'PLW', 1),
(164, 'Panama', 'PA', 'PAN', 1),
(165, 'Papua New Guinea', 'PG', 'PNG', 1),
(166, 'Paraguay', 'PY', 'PRY', 1),
(167, 'Peru', 'PE', 'PER', 1),
(168, 'Philippines', 'PH', 'PHL', 1),
(169, 'Pitcairn', 'PN', 'PCN', 1),
(170, 'Poland', 'PL', 'POL', 1),
(171, 'Portugal', 'PT', 'PRT', 1),
(172, 'Puerto Rico', 'PR', 'PRI', 1),
(173, 'Qatar', 'QA', 'QAT', 1),
(174, 'Reunion', 'RE', 'REU', 1),
(175, 'Romania', '', 'ROM', 1),
(176, 'Russian Federation', 'RU', 'RUS', 1),
(177, 'Rwanda', 'RW', 'RWA', 1),
(178, 'Saint Kitts and Nevis', 'KN', 'KNA', 1),
(179, 'Saint Lucia', 'LC', 'LCA', 1),
(180, 'Saint Vincent and the Grenadines', 'VC', 'VCT', 1),
(181, 'Samoa', 'WS', 'WSM', 1),
(182, 'San Marino', 'SM', 'SMR', 1),
(183, 'Sao Tome and Principe', 'ST', 'STP', 1),
(184, 'Saudi Arabia', 'SA', 'SAU', 1),
(185, 'Senegal', 'SN', 'SEN', 1),
(186, 'Seychelles', 'SC', 'SYC', 1),
(187, 'Sierra Leone', 'SL', 'SLE', 1),
(188, 'Singapore', 'SG', 'SGP', 4),
(189, 'Slovakia (Slovak Republic)', 'SK', 'SVK', 1),
(190, 'Slovenia', 'SI', 'SVN', 1),
(191, 'Solomon Islands', 'SB', 'SLB', 1),
(192, 'Somalia', 'SO', 'SOM', 1),
(193, 'South Africa', 'ZA', 'ZAF', 1),
(194, 'South Georgia and the South Sandwich Islands', 'GS', 'SGS', 1),
(195, 'Spain', 'ES', 'ESP', 3),
(196, 'Sri Lanka', 'LK', 'LKA', 1),
(197, 'St. Helena', 'SH', 'SHN', 1),
(198, 'St. Pierre and Miquelon', 'PM', 'SPM', 1),
(199, 'Sudan', 'SD', 'SDN', 1),
(200, 'Suriname', 'SR', 'SUR', 1),
(201, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', 1),
(202, 'Swaziland', 'SZ', 'SWZ', 1),
(203, 'Sweden', 'SE', 'SWE', 1),
(204, 'Switzerland', 'CH', 'CHE', 1),
(205, 'Syrian Arab Republic', 'SY', 'SYR', 1),
(206, 'Taiwan', 'TW', 'TWN', 1),
(207, 'Tajikistan', 'TJ', 'TJK', 1),
(208, 'Tanzania, United Republic of', 'TZ', 'TZA', 1),
(209, 'Thailand', 'TH', 'THA', 1),
(210, 'Togo', 'TG', 'TGO', 1),
(211, 'Tokelau', 'TK', 'TKL', 1),
(212, 'Tonga', 'TO', 'TON', 1),
(213, 'Trinidad and Tobago', 'TT', 'TTO', 1),
(214, 'Tunisia', 'TN', 'TUN', 1),
(215, 'Turkey', 'TR', 'TUR', 1),
(216, 'Turkmenistan', 'TM', 'TKM', 1),
(217, 'Turks and Caicos Islands', 'TC', 'TCA', 1),
(218, 'Tuvalu', 'TV', 'TUV', 1),
(219, 'Uganda', 'UG', 'UGA', 1),
(220, 'Ukraine', 'UA', 'UKR', 1),
(221, 'United Arab Emirates', 'AE', 'ARE', 1),
(222, 'United Kingdom', 'GB', 'GBR', 1),
(223, 'United States', 'US', 'USA', 2),
(224, 'United States Minor Outlying Islands', 'UM', 'UMI', 1),
(225, 'Uruguay', 'UY', 'URY', 1),
(226, 'Uzbekistan', 'UZ', 'UZB', 1),
(227, 'Vanuatu', 'VU', 'VUT', 1),
(228, 'Vatican City State (Holy See)', 'VA', 'VAT', 1),
(229, 'Venezuela', 'VE', 'VEN', 1),
(230, 'Viet Nam', 'VN', 'VNM', 1),
(231, 'Virgin Islands (British)', 'VG', 'VGB', 1),
(232, 'Virgin Islands (U.S.)', 'VI', 'VIR', 1),
(233, 'Wallis and Futuna Islands', 'WF', 'WLF', 1),
(234, 'Western Sahara', 'EH', 'ESH', 1),
(235, 'Yemen', 'YE', 'YEM', 1),
(236, 'Yugoslavia', 'YU', 'YUG', 1),
(237, 'Zaire', 'ZR', 'ZAR', 1),
(238, 'Zambia', 'ZM', 'ZMB', 1),
(239, 'Zimbabwe', 'ZW', 'ZWE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rs_tbl_currency`
--

CREATE TABLE `rs_tbl_currency` (
  `currency_type_id` int(11) NOT NULL,
  `church_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `currency_name` varchar(100) DEFAULT NULL,
  `currency_symbl` varchar(10) DEFAULT NULL,
  `entry_date` date DEFAULT NULL,
  `is_active` int(2) NOT NULL DEFAULT '1' COMMENT '1=>Active, 2=>InActive'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_tbl_currency`
--

INSERT INTO `rs_tbl_currency` (`currency_type_id`, `church_id`, `member_id`, `currency_name`, `currency_symbl`, `entry_date`, `is_active`) VALUES
(1, 1, 2, 'Dollar', '$', '2018-01-15', 1),
(2, 2, 3, 'Check', 'NA', '2018-01-15', 1),
(3, 2, 3, 'Cash', 'NA', '2018-01-15', 1),
(4, 2, 3, 'Money Order', 'NA', '2018-01-15', 1),
(5, 4, 8, 'Cash', '$', '2018-01-25', 1),
(6, 4, 8, 'Check', '$', '2018-01-25', 1),
(7, 4, 8, 'Money Order', 'mo', '2018-01-25', 1),
(8, 5, 11, 'Test', 'T', '2018-01-30', 1),
(9, 9, 39, 'USD', '$', '2019-04-06', 1),
(10, 10, 44, 'Anniversary', 'usd', '2019-04-07', 1),
(11, 10, 44, 'Cash', 'usd', '2019-04-07', 1),
(12, 10, 44, 'Check', 'usd', '2019-04-07', 1),
(13, 2, 3, 'Credit Card', 'usd', '2019-04-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rs_tbl_faq`
--

CREATE TABLE `rs_tbl_faq` (
  `faq_id` int(11) NOT NULL,
  `faq_title` varchar(255) DEFAULT NULL,
  `faq_answer` text,
  `faq_country` int(11) DEFAULT '0',
  `faq_category_id` int(11) DEFAULT '0',
  `faq_date` date DEFAULT '0000-00-00',
  `faq_status` int(2) NOT NULL DEFAULT '1' COMMENT '1=>Active, 2=>InActive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_tbl_faq`
--

INSERT INTO `rs_tbl_faq` (`faq_id`, `faq_title`, `faq_answer`, `faq_country`, `faq_category_id`, `faq_date`, `faq_status`) VALUES
(1, 'My First Question', '<p>Question Answer asd as dsa ds d sd sa d sad asd as d sad sad asd ad a sd asd sa da sd asd asd sd sd asd asd as</p>', NULL, 0, '2016-02-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rs_tbl_member`
--

CREATE TABLE `rs_tbl_member` (
  `member_id` int(10) NOT NULL,
  `member_email` varchar(255) DEFAULT NULL,
  `member_pass` varchar(32) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip_code` varchar(50) DEFAULT NULL,
  `country` int(10) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `mobile` varchar(30) DEFAULT NULL,
  `reg_date` date DEFAULT NULL,
  `is_active` smallint(4) NOT NULL DEFAULT '1',
  `member_type` int(2) DEFAULT '1' COMMENT '1=>Super Admin, 2=>Church Admin, 3=>Church Staff Member',
  `profile_image` varchar(255) DEFAULT NULL,
  `member_category_id` int(5) DEFAULT NULL,
  `login_permission` int(2) NOT NULL DEFAULT '2' COMMENT '1=>Yes, 2=>No',
  `church_id` int(11) DEFAULT NULL,
  `member_no` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_tbl_member`
--

INSERT INTO `rs_tbl_member` (`member_id`, `member_email`, `member_pass`, `first_name`, `last_name`, `dob`, `address`, `city`, `state`, `zip_code`, `country`, `phone`, `mobile`, `reg_date`, `is_active`, `member_type`, `profile_image`, `member_category_id`, `login_permission`, `church_id`, `member_no`) VALUES
(1, 'admin@gmail.com', 'BWKRS69Q9iQ=', 'Mr.', 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, 1, NULL, NULL),
(2, 'church@gmail.com', '792CC6llaOs=', 'CMF Name', 'CML Name', NULL, 'Church Admin Address', '', '', NULL, 1, '987654321', '123456789', '2018-01-15', 1, 2, NULL, 0, 1, 1, '123'),
(3, 'oldfriendshipbaptistchurch@gmail.com', 'BWKRS69Q9iQ=', 'Tony', 'McCollum', NULL, 'Marietta, GA', '', '', NULL, 223, '770-426-8577', '404-428-7163', '2018-02-28', 1, 2, NULL, 0, 1, 2, '0005'),
(4, 'misty@wcc.com', '', 'Misty', 'Skeldgell', NULL, 'Villa Rica Georgia', NULL, NULL, NULL, NULL, '770-422-8822', '770-422-8822', '2019-04-06', 1, 2, NULL, NULL, 1, 3, NULL),
(5, 'NA', 'passw0rd', 'Louis', 'Brock', NULL, '121 Wood Drive', 'Marietta', 'GA', NULL, 223, '770-426-8577', '770-426-8577', '2018-01-15', 1, 2, NULL, 11, 2, 2, '0004'),
(6, 'mvgulley@gmail.com', 'passw0rd', 'Marjetta', 'Gully-McCollum', NULL, '2811 Penncross', 'Marietta', 'GA', NULL, 223, '404-428-3104', '404-428-3104', '2018-01-15', 1, 3, NULL, 13, 1, 2, '0006'),
(7, 'tony.mccollum@ofmbc.com', '', 'Tony', 'McCollum', NULL, '2811 Penncross', 'Marietta', 'GA', NULL, 223, '404-428-3104', '404-428-7163', '2018-02-04', 1, 4, NULL, NULL, 2, 2, '00005'),
(8, 'worldchanges@gmail.com', 'QDpms71cet4=', 'Roger', 'Johnson', NULL, '1297 Peachtree Road, Atlanta Georgia', '', '', NULL, 1, '404-343-2323', '678-334-3434', '2018-01-25', 1, 2, NULL, 0, 1, 4, '00002'),
(9, 'sally@worldchanges.com', 'passw0rd', 'Sally', 'Pallsoney', NULL, '3928 North Decatur Avenue', 'Decatur', 'GA', NULL, 223, '399-333-3333', '909-334-3453', '2018-01-25', 1, 3, NULL, 18, 1, 4, '00003'),
(10, 'john@worldchanges.com', NULL, 'John', 'Wayne', NULL, '100 Peachtree City Road', 'Atlanta', 'GA', NULL, 223, '454-343-3433', '343-343-3434', '2018-01-25', 1, 4, NULL, NULL, 2, 4, '001001'),
(11, 'test@gmail.com', 'cKPBh5G1zEE=', 'Test FName', 'Test LName', NULL, 'Admin Testing Address', NULL, NULL, NULL, NULL, '123456', '654321', '2018-02-02', 1, 2, NULL, NULL, 1, 5, NULL),
(12, 'M-TestEmail@test.com', NULL, 'M-Test FName', 'M-Test LName', NULL, 'M-Test Address', 'M-Test City', 'M-Test State', NULL, 93, '321321', '123123', '2018-01-30', 1, 4, NULL, NULL, 2, 5, 'Mem-01'),
(13, 'jerrydodd@ofmbc.com', NULL, 'Rev. Jerry', 'Dodd', NULL, 'Need this Info', 'Marietta', 'GA', NULL, 223, '4044287163', '404-344-4444', '2018-02-03', 1, 4, NULL, NULL, 2, 2, '00009'),
(14, 'none@ofmbc.com', NULL, 'Guest', 'Guest', NULL, NULL, 'Powder Springs', 'GA', NULL, 223, NULL, NULL, '2018-02-03', 1, 4, NULL, NULL, 2, 2, '99999'),
(15, 'rev_renfroe@ofmbc.com', NULL, 'Rev. Willie', 'Renfroe', NULL, NULL, 'Hiram', 'GA', NULL, 223, NULL, NULL, '2018-02-03', 1, 4, NULL, NULL, 2, 2, '00008'),
(16, 'louise.mcmultry@ofmbc.com', NULL, 'Louise', 'McMultry', NULL, 'somewhere off the loop', 'Marietta', 'GA', NULL, 223, NULL, NULL, '2018-02-03', 1, 4, NULL, NULL, 2, 2, '00001'),
(17, 'lois.brock@ofmbc.com', NULL, 'Lois', 'Brock', NULL, '123 Wood Drive', 'Marietta', 'GA', NULL, 223, NULL, NULL, '2018-02-03', 1, 4, NULL, NULL, 2, 2, '00012'),
(18, 'marjetta.mccollum@ofmbc.com', NULL, 'Marjetta', 'Gulley-McCollum', NULL, '2811 PENNCROSS DR SW', 'MARIETTA', 'GA', NULL, 223, '4044283104', '404-428-3104', '2018-02-03', 1, 4, NULL, NULL, 2, 2, '00006'),
(19, 'bria.mccollum@ofmbc.com', NULL, 'Bria', 'McCollum', NULL, '2811 Penncross Drive', 'Marietta', 'GA', NULL, 223, '404-793-9146', '404-793-9146', '2018-02-03', 1, 4, NULL, NULL, 2, 2, '00007'),
(20, 'others@ofmbc.com', NULL, 'Others (Unknown)', 'NoEnvelop', NULL, 'NA', 'NA', 'NA', NULL, 223, NULL, '999-999-9999', '2018-02-03', 2, 4, NULL, NULL, 2, 2, '99998'),
(21, 'fdfd@test.com', NULL, 'dfdf', 'dsfdsf', NULL, 'ddfd', 'dfdf', 'dfdf', NULL, 223, '444-444-4444', '444-444-4444', '2018-02-09', 3, 4, NULL, NULL, 2, 2, '99997'),
(22, 'georgia.coleman@ofmbc.com', NULL, 'Georgia', 'Coleman', NULL, 'xxxxx lane', 'Powder Springs', 'GA', NULL, 223, NULL, '000-000-0000', '2018-02-10', 2, 4, NULL, NULL, 2, 2, '00020'),
(23, 'janis.mccleskey', NULL, 'Janis', 'McCleskey', NULL, 'xxxx not given', 'Marietta', 'GA', NULL, 223, '000-000-0000', '000-000-0000', '2018-02-10', 2, 4, NULL, NULL, 2, 2, '00021'),
(24, 'debra.ramsey@ofmbc.com', NULL, 'Debra', 'Ramsey', NULL, 'xxxx not known', 'Marietta', 'GA', NULL, 223, NULL, '404-516-7684', '2018-02-10', 2, 4, NULL, NULL, 2, 2, '00019'),
(25, 'charlene.dottory@ofmbc.com', NULL, 'Charlene Brown', 'Dottory', NULL, '62 Howard Ave. NW', 'Cartersville', 'GA', NULL, 223, NULL, '678-000-0000', '2018-02-10', 2, 4, NULL, NULL, 2, 2, '00022'),
(26, 'patricia.coleman@ofbmc.com', NULL, 'Patricia', 'Coleman', NULL, 'xxxx need to get', 'Powder Springs', 'GA', NULL, 223, NULL, '678-000-0017', '2018-02-10', 2, 4, NULL, NULL, 2, 2, '00017'),
(27, 'annie.mccleskey@ofmbc.com', NULL, 'Annie', 'McCleskey', NULL, '222222 Sandtown Road', 'Marietta', 'Georgia', NULL, 223, NULL, '404-000-0000', '2018-02-10', 2, 4, NULL, NULL, 2, 2, '00018'),
(28, 'mattie.conley@ofmbc.com', '', 'Mattie', 'Conley', NULL, 'xxxxx dont have lane', 'Roswell', 'GA', NULL, 223, '', '770-000-0009', '2018-02-10', 2, 4, NULL, NULL, 2, 2, '00010'),
(29, 'rev_robert.elliott@ofmbc.com', NULL, 'Robert and Mary', 'Elliott', NULL, 'Notsure', 'Hiram', 'Georgia', NULL, 223, NULL, '789-333-3333', '2018-02-10', 2, 4, NULL, NULL, 2, 2, '00023'),
(30, 'pat.smith@ofmbc.com', NULL, 'Pat', 'Smith', NULL, '2550 Cumberland Blvd.', 'Syrma', 'Georgia', NULL, 223, NULL, '000-333-3333', '2018-02-10', 2, 4, NULL, NULL, 2, 2, '00030'),
(31, 'katie.rashad@ofmbc.com', NULL, 'Katie', 'Rashad', NULL, '404 Parkway Avenue SE', 'Symrna', 'Georgia', NULL, 223, NULL, '678-333-3333', '2018-02-10', 2, 4, NULL, NULL, 2, 2, '00031'),
(32, 'email@email.com', 'pass', 'name1', 'name2', NULL, NULL, NULL, NULL, NULL, 223, NULL, NULL, '2018-02-15', 1, 3, NULL, NULL, 1, 1, '321'),
(33, 'none@oldfriendshipmbc.com', NULL, 'Iriah', 'Johnson', NULL, 'NA', 'NA', 'NA', NULL, 223, NULL, NULL, '2018-05-21', 3, 4, NULL, NULL, 2, 2, '000888'),
(34, 'test@zflex.com', 'xB3BB5sJwQk=', 'AdminABHIJ', 'ABHIJ', NULL, 'dfdfdfdfdfdfdfdf', NULL, NULL, NULL, NULL, '45454579', '979797', '2018-06-23', 1, 2, NULL, NULL, 1, 6, NULL),
(35, 'user1@zflex.com', 'admin', 'Test', 'USer1', NULL, 'dfdsfsdfdsf', 'India', 'GA', NULL, 99, '34343', '343434', '2018-06-23', 1, 3, NULL, NULL, 1, 6, '00000'),
(36, 'testdoc@zflex.com', '2D7EpgClwcA=', 'test', 'McCollumdfddfdfdsf', NULL, 'fggfdgfdgfg', NULL, NULL, NULL, NULL, '', '', '2018-06-27', 1, 2, NULL, NULL, 1, 7, NULL),
(37, 'mouradif@gmail.com', 'OHRprg5VeHgzaoyyLkgeaw==', 'Mourad', 'Kejji', NULL, 'Somewhere', NULL, NULL, NULL, NULL, '123', '123', '2018-06-30', 1, 2, NULL, NULL, 1, 8, NULL),
(38, 'mourad@freelancer.com', 'password', 'Little', 'Account', NULL, 'yep', '', '', NULL, 1, '123', '', '2018-06-30', 1, 3, NULL, 0, 1, 8, '40111085'),
(39, 'superbtech@churchims.com', '1WcP16Nklaa3id7lDTvzbA==', 'Superb', 'Tech', NULL, 'India', NULL, NULL, NULL, NULL, '444-444-4444', NULL, '2019-04-06', 1, 2, NULL, NULL, 1, 9, NULL),
(40, 'tony.macc@churchims.com', NULL, 'Tony', 'Macc', NULL, '98 nowhere land', '876 Anywhere place', 'Ohio', NULL, 222, '899-333-3333', NULL, '2019-04-06', 1, 4, NULL, NULL, 2, 9, '000011'),
(41, 'rajapatel47@gmail.com', NULL, 'Irfan', 'Patel', NULL, 'india', 'Mumbai', 'Madhya Pradseh', NULL, 99, '12456', '9876543210', '2019-04-06', 1, 4, NULL, NULL, 2, 9, '786'),
(42, 'tony.James@churchims.com', NULL, 'Tony33', 'James', NULL, NULL, NULL, NULL, NULL, 73, '888-333-3333', NULL, '2019-04-06', 1, 4, NULL, NULL, 2, 9, '000022'),
(43, 'rev.hardeman@ofmbc.com', NULL, 'Tony and Kimmy', 'Hardeman', NULL, '636 Ocean Avenue', 'Canton', 'Georgia', NULL, 223, '678-497-5042', '407-209-3255', '2019-04-06', 3, 4, NULL, NULL, 2, 2, '00040'),
(44, 'superbtechbusiness@churchims.com', 'BWKRS69Q9iQ=', 'Superb22', 'TechBusiness', NULL, '334 NA Land Overseas', NULL, NULL, NULL, NULL, '334-343-3434', NULL, '2019-04-07', 1, 2, NULL, NULL, 1, 10, NULL),
(45, 'tim.Jones@churchims.com', NULL, 'Timmy', 'Jones', NULL, '334 Test Address', 'New York', 'NY', NULL, 223, NULL, '444-444-2498', '2019-04-07', 1, 4, NULL, NULL, 2, 10, '00001'),
(46, 'sanjay.gupta@churchims.com', NULL, 'Sanjay', 'Gupta', NULL, '788 Gupta Avenue', '101 Main Stree', 'New Jersey', NULL, 223, '876-343-3434', '593-333-3434', '2019-04-07', 1, 4, NULL, NULL, 2, 10, '00002'),
(47, NULL, NULL, 'Theresa', 'Elliott', NULL, NULL, NULL, 'GA', NULL, 223, NULL, NULL, '2019-04-22', 1, 4, NULL, NULL, 2, 2, '000033'),
(48, NULL, NULL, 'Elder Tony and Kimmy', 'Hardeman', NULL, '636 Ocean Avenue', 'Canton', 'Georgia', NULL, 223, NULL, NULL, '2019-04-22', 1, 4, NULL, NULL, 2, 2, '000040');

-- --------------------------------------------------------

--
-- Table structure for table `rs_tbl_member_category`
--

CREATE TABLE `rs_tbl_member_category` (
  `member_category_id` int(11) NOT NULL,
  `category_name` varchar(200) DEFAULT NULL,
  `church_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `entery_date` datetime DEFAULT NULL,
  `is_active` int(2) NOT NULL DEFAULT '1' COMMENT '1=>Active, 2=>InActive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_tbl_member_category`
--

INSERT INTO `rs_tbl_member_category` (`member_category_id`, `category_name`, `church_id`, `member_id`, `entery_date`, `is_active`) VALUES
(2, 'Pastorial', 1, 2, NULL, 1),
(3, 'Trustee', 1, 2, NULL, 1),
(4, 'Chairman', 1, 2, NULL, 2),
(5, 'Secretary', 1, 2, NULL, 1),
(6, 'Instructor/Teacher', 1, 2, NULL, 1),
(7, 'Clerk', 1, 2, NULL, 1),
(8, 'Music Director', 1, 2, NULL, 1),
(9, 'Deacon', 1, 2, NULL, 1),
(10, 'Pastor', 2, 3, NULL, 1),
(11, 'Church Clerk', 2, 3, NULL, 1),
(12, 'Secretary', 2, 3, NULL, 1),
(13, 'Sunday School Teacher', 2, 3, NULL, 1),
(14, 'Trustee', 2, 3, NULL, 1),
(15, 'Church Superintendent', 2, 3, NULL, 1),
(16, 'Church Clerk', 4, 8, NULL, 1),
(17, 'Pastor', 4, 8, NULL, 1),
(18, 'Secretary', 4, 8, NULL, 1),
(19, 'Finance Officer', 4, 8, NULL, 1),
(20, 'Superintendent', 4, 8, NULL, 1),
(21, 'Urcher', 4, 8, NULL, 1),
(22, 'Muscian', 4, 8, NULL, 1),
(23, 'Deacon', 4, 8, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rs_tbl_minutes`
--

CREATE TABLE `rs_tbl_minutes` (
  `meetingNotetaker` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `meetingDate` date NOT NULL,
  `meetingTopic` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `meetingNotes` blob NOT NULL,
  `meetingAttendees` varchar(5000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rs_tbl_transection_category`
--

CREATE TABLE `rs_tbl_transection_category` (
  `tran_category_id` int(11) NOT NULL,
  `tran_category_name` varchar(250) DEFAULT NULL,
  `church_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `tran_type` int(2) NOT NULL DEFAULT '1' COMMENT '1=>Contribution, 2=>Expense',
  `entry_date` datetime DEFAULT NULL,
  `is_active` int(2) NOT NULL DEFAULT '1' COMMENT '1=>Active, 2=>InActive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_tbl_transection_category`
--

INSERT INTO `rs_tbl_transection_category` (`tran_category_id`, `tran_category_name`, `church_id`, `member_id`, `tran_type`, `entry_date`, `is_active`) VALUES
(4, 'Sunday School', 1, 2, 1, NULL, 1),
(5, 'Worship Service', 1, 2, 1, NULL, 1),
(6, 'Church Anniversary', 1, 2, 1, NULL, 1),
(7, 'Special Service Offering', 1, 2, 1, NULL, 1),
(8, 'Utility - Gas', 1, 2, 2, NULL, 1),
(9, 'Utility - Water', 1, 2, 2, NULL, 1),
(10, 'Utility - Electric', 1, 2, 2, NULL, 1),
(11, 'Supplies - Office Supplies', 1, 2, 2, NULL, 1),
(12, 'Supplies - Kitchen and Bathroom (Cleaning Supplies)', 1, 2, 2, NULL, 1),
(13, 'Utilities - Gas', 2, 3, 2, NULL, 1),
(14, 'Utilities - Water', 2, 3, 2, NULL, 1),
(15, 'Utilities - Electric', 2, 3, 2, NULL, 1),
(16, 'Supplies - Office (Paper, Pens, Computer, Ink, etc)', 2, 3, 2, NULL, 1),
(17, 'Supplies - Kitchen', 2, 3, 2, NULL, 1),
(18, 'Worship Service', 2, 3, 1, NULL, 1),
(19, 'Bible Study', 2, 3, 1, NULL, 1),
(20, 'Sunday School', 2, 3, 1, NULL, 1),
(21, 'Church Anniversary Service', 2, 3, 1, NULL, 1),
(22, 'Pastor Appriciation', 2, 3, 1, NULL, 1),
(23, 'Special Fund Raising Events', 2, 3, 1, NULL, 1),
(24, 'Pastor Anniversary', 2, 3, 1, NULL, 1),
(25, 'Worship Service', 4, 8, 1, NULL, 1),
(26, 'Sunday School', 4, 8, 1, NULL, 1),
(27, 'Missionary Funds', 4, 8, 1, NULL, 1),
(28, 'Bible Study', 4, 8, 1, NULL, 1),
(29, 'Church Anniversary', 4, 8, 1, NULL, 1),
(30, 'CC Test', 5, 11, 1, NULL, 1),
(31, 'EC-Test', 5, 11, 2, NULL, 1),
(32, 'Benevolence Offerings', 2, 3, 2, NULL, 1),
(33, 'Church Maintenance', 2, 3, 2, NULL, 1),
(34, 'Church Musician Fees', 2, 3, 2, NULL, 1),
(35, 'Offering', 9, 39, 1, NULL, 1),
(36, 'Special Occasions', 9, 39, 1, NULL, 1),
(37, 'Offering', 10, 44, 1, NULL, 1),
(38, 'Special Occasions', 10, 44, 1, NULL, 1),
(39, 'Anniversary', 10, 44, 1, NULL, 3),
(40, 'Utilities', 10, 44, 2, NULL, 1),
(41, 'Phone', 10, 44, 2, NULL, 1),
(42, 'Gas', 10, 44, 2, NULL, 1),
(43, 'Office Supplies', 10, 44, 2, NULL, 1),
(44, 'Birthday Cards and Gifts', 2, 3, 2, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rs_tbl_transection_detail`
--

CREATE TABLE `rs_tbl_transection_detail` (
  `transection_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `church_id` int(11) NOT NULL,
  `member_no` varchar(50) DEFAULT NULL,
  `collection_date` date DEFAULT NULL,
  `check_no` varchar(20) DEFAULT NULL,
  `currency_type` int(5) DEFAULT NULL,
  `amount_category` int(5) DEFAULT NULL,
  `receiving_amount` varchar(10) DEFAULT NULL,
  `transection_note` text,
  `transection_type` int(2) NOT NULL DEFAULT '1' COMMENT '1=>Contribution, 2=>Expense',
  `entry_date` date DEFAULT NULL,
  `is_active` int(2) NOT NULL DEFAULT '1' COMMENT '1=>Active, 2=>InActive'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rs_tbl_transection_detail`
--

INSERT INTO `rs_tbl_transection_detail` (`transection_id`, `member_id`, `church_id`, `member_no`, `collection_date`, `check_no`, `currency_type`, `amount_category`, `receiving_amount`, `transection_note`, `transection_type`, `entry_date`, `is_active`) VALUES
(1, 3, 2, '0005', '2018-01-13', '0000', 2, 13, '805.00', 'Emergency Gas needed due to freezing temps over this winter.  Ran out and had to get Blossom to make special delivery.', 2, '2018-01-15', 1),
(2, 3, 2, '0005', '2017-12-24', '0000', 2, 16, '67.31', 'Two 25.00 Mastercards. One for Rev. Renfroe for Birthday. And One for Christmas Card for Sis. Conley (Musician).', 2, '2018-01-15', 1),
(3, 3, 2, '0005', '2018-01-07', 'NA', 3, 18, '5.00', 'Tithes', 1, '2018-01-15', 1),
(4, 8, 4, '001001', '2018-01-27', '0002', 6, 25, '150.00', 'NA', 1, '2018-01-25', 1),
(5, 11, 5, 'Mem-01', '2018-01-30', 'CK-1231', 8, 30, '1000', 'Testing Note', 1, '2018-01-30', 1),
(6, 11, 5, NULL, '2018-01-30', '101010', 8, 31, '1000', 'Expense Note', 2, '2018-01-30', 1),
(7, 3, 2, '00009', '2018-01-21', NULL, 3, 20, '10.00', NULL, 1, '2018-02-03', 1),
(8, 3, 2, '00008', '2018-01-21', NULL, 3, 20, '1.00', NULL, 1, '2018-02-03', 1),
(9, 3, 2, '0005', '2018-01-21', NULL, 3, 20, '2.00', NULL, 1, '2018-02-03', 1),
(10, 3, 2, '0005', '2018-01-21', NULL, 2, 18, '20.00', NULL, 1, '2018-02-03', 1),
(11, 3, 2, '00008', '2018-01-21', NULL, 3, 18, '2.00', NULL, 1, '2018-02-03', 1),
(12, 3, 2, '00009', '2018-01-21', NULL, 2, 18, '100.00', NULL, 1, '2018-02-03', 1),
(13, 3, 2, '00006', '2018-01-21', NULL, 2, 18, '40.00', NULL, 1, '2018-02-03', 1),
(14, 3, 2, '00007', '2018-01-21', NULL, 3, 18, '1.00', NULL, 1, '2018-02-03', 1),
(15, 3, 2, '00002', '2018-01-21', NULL, 3, 18, '25.00', NULL, 1, '2018-02-03', 1),
(16, 3, 2, '00002', '2018-01-21', NULL, 3, 20, '5.00', NULL, 1, '2018-02-03', 1),
(17, 3, 2, '00001', '2018-01-21', NULL, 3, 18, '23.00', NULL, 1, '2018-02-03', 1),
(18, 3, 2, '99998', '2018-01-21', NULL, 3, 20, '3.00', NULL, 1, '2018-02-03', 2),
(19, 3, 2, '00007', '2018-01-28', NULL, 2, 20, '.25', NULL, 1, '2018-02-03', 1),
(20, 3, 2, '00006', '2018-01-28', NULL, 3, 20, '1.00', NULL, 1, '2018-02-03', 1),
(21, 3, 2, '00009', '2018-01-28', NULL, 3, 20, '10.00', NULL, 1, '2018-02-03', 1),
(22, 3, 2, '0005', '2018-01-28', NULL, 3, 20, '2.00', NULL, 1, '2018-02-03', 1),
(23, 3, 2, '00008', '2018-01-28', NULL, 3, 20, '1.00', NULL, 1, '2018-02-03', 1),
(24, 3, 2, '00002', '2018-01-28', NULL, 3, 20, '5.00', NULL, 1, '2018-02-03', 1),
(25, 3, 2, '00001', '2018-01-28', NULL, 3, 20, '2.00', NULL, 1, '2018-02-03', 1),
(26, 3, 2, '00001', '2018-01-28', NULL, 3, 18, '25.00', NULL, 1, '2018-02-03', 1),
(27, 3, 2, '00002', '2018-01-28', NULL, 3, 18, '25.00', NULL, 1, '2018-02-03', 1),
(28, 3, 2, '00007', '2018-01-28', NULL, 3, 18, '1.00', NULL, 1, '2018-02-03', 1),
(29, 3, 2, '00006', '2018-01-28', NULL, 2, 18, '100.00', NULL, 1, '2018-02-03', 1),
(30, 3, 2, '0005', '2018-01-28', NULL, 2, 18, '20.00', NULL, 1, '2018-02-03', 1),
(31, 3, 2, '00009', '2018-01-28', NULL, 2, 18, '100.00', NULL, 1, '2018-02-03', 1),
(32, 3, 2, '00008', '2018-01-28', NULL, 3, 18, '1.00', NULL, 1, '2018-02-03', 1),
(33, 3, 2, '00001', '2018-02-04', NULL, 2, 18, '30.00', 'Mother Noted that 5.00 to be for Sunday School - but all in one check. So all will be applied here for worship.', 1, '2018-02-10', 1),
(34, 3, 2, '00020', '2018-02-04', NULL, 3, 18, '2.00', 'Sent via Mother Brock. Not present', 1, '2018-02-10', 2),
(35, 3, 2, '00022', '2018-02-04', NULL, 2, 18, '50.00', 'Sent via Mother Brock.  Not Present.', 1, '2018-02-10', 2),
(36, 3, 2, '00002', '2018-02-04', NULL, 3, 18, '25.00', NULL, 1, '2018-02-10', 1),
(37, 3, 2, '00021', '2018-02-04', NULL, 3, 18, '25.00', 'Not present.  Sent via Mother Brock.', 1, '2018-02-10', 2),
(38, 3, 2, '00019', '2018-02-04', NULL, 3, 18, '5.00', 'Not Present.  Sent via Mother Brock.', 1, '2018-02-10', 2),
(39, 3, 2, '00007', '2018-02-04', NULL, 3, 18, '1.00', NULL, 1, '2018-02-10', 1),
(40, 3, 2, '00008', '2018-02-04', NULL, 2, 18, '270.00', 'Preached this sunday.', 1, '2018-02-10', 1),
(41, 3, 2, '00005', '2018-02-04', NULL, 2, 18, '10.00', NULL, 1, '2018-02-10', 1),
(42, 3, 2, '00002', '2018-02-04', NULL, 2, 20, '5.00', NULL, 1, '2018-02-10', 1),
(43, 3, 2, '00008', '2018-02-04', NULL, 3, 20, '2.00', NULL, 1, '2018-02-10', 1),
(44, 3, 2, '00005', '2018-02-04', NULL, 3, 20, '1.00', 'Taught Sunday School.', 1, '2018-02-10', 1),
(45, 3, 2, '00008', '2018-01-07', NULL, 3, 20, '1.00', NULL, 1, '2018-02-10', 1),
(46, 3, 2, '00002', '2018-01-07', NULL, 3, 20, '5.00', NULL, 1, '2018-02-10', 1),
(47, 3, 2, '99998', '2018-01-07', NULL, 3, 20, '5.00', NULL, 1, '2018-02-10', 2),
(48, 3, 2, '00006', '2018-01-07', NULL, 2, 18, '130.00', NULL, 1, '2018-02-10', 1),
(49, 3, 2, '00002', '2018-01-07', NULL, 2, 18, '25.00', NULL, 1, '2018-02-10', 1),
(50, 3, 2, '00001', '2018-01-07', NULL, 3, 18, '25.00', NULL, 1, '2018-02-10', 1),
(51, 3, 2, '00005', '2018-01-07', NULL, 3, 18, '7.00', NULL, 1, '2018-02-10', 1),
(52, 3, 2, '00008', '2018-01-07', NULL, 2, 18, '265.00', NULL, 1, '2018-02-10', 1),
(53, 3, 2, '00007', '2018-01-07', NULL, 3, 18, '1.00', NULL, 1, '2018-02-10', 1),
(54, 3, 2, '00009', '2018-01-14', NULL, 3, 20, '10.00', NULL, 1, '2018-02-10', 1),
(55, 3, 2, '00007', '2018-01-14', NULL, 3, 20, '1.00', NULL, 1, '2018-02-10', 1),
(56, 3, 2, '00002', '2018-01-14', NULL, 2, 20, '5.00', NULL, 1, '2018-02-10', 1),
(57, 3, 2, '99998', '2018-01-14', NULL, 3, 20, '3.00', NULL, 1, '2018-02-10', 1),
(58, 3, 2, '00007', '2018-01-14', NULL, 3, 18, '1.00', NULL, 1, '2018-02-10', 1),
(59, 3, 2, '00006', '2018-01-14', NULL, 2, 18, '40.00', NULL, 1, '2018-02-10', 1),
(60, 3, 2, '00002', '2018-01-14', NULL, 3, 18, '30.00', NULL, 1, '2018-02-10', 1),
(61, 3, 2, '00020', '2018-01-14', NULL, 3, 18, '4.00', NULL, 1, '2018-02-10', 1),
(62, 3, 2, '00017', '2018-01-14', NULL, 3, 18, '2.00', 'Not present.  Send via Mother Brock.', 1, '2018-02-10', 2),
(63, 3, 2, '00008', '2018-01-14', NULL, 2, 18, '100.00', 'Not Present.  Sent by Mother Brock.', 1, '2018-02-10', 2),
(64, 3, 2, '00001', '2018-01-14', NULL, 3, 18, '25.00', NULL, 1, '2018-02-10', 1),
(65, 3, 2, '00005', '2018-01-14', NULL, 2, 18, '20.00', NULL, 1, '2018-02-10', 1),
(66, 3, 2, '00009', '2018-01-14', NULL, 2, 18, '10.00', 'Musician for the service.', 1, '2018-02-10', 2),
(67, 3, 2, '00009', '2018-01-14', NULL, 2, 18, '100.00', 'Preached for the Service.', 1, '2018-02-10', 2),
(68, 3, 2, NULL, '2018-01-07', NULL, 2, 18, '25.00', NULL, 1, '2018-02-10', 2),
(69, 3, 2, '00008', '2017-12-31', NULL, 3, 20, '2.00', NULL, 1, '2018-02-10', 2),
(70, 3, 2, '99998', '2017-12-31', NULL, 3, 20, '6.00', NULL, 1, '2018-02-10', 2),
(71, 3, 2, '00002', '2017-12-31', NULL, 2, 18, '30.00', NULL, 1, '2018-02-10', 1),
(72, 3, 2, '00001', '2017-12-31', NULL, 3, 18, '25.00', NULL, 1, '2018-02-10', 1),
(73, 3, 2, '00007', '2017-12-31', NULL, 3, 18, '5.00', NULL, 1, '2018-02-10', 1),
(74, 3, 2, '00006', '2017-12-31', NULL, 3, 18, '10.00', NULL, 1, '2018-02-10', 1),
(75, 3, 2, '00010', '2017-12-31', NULL, 2, 18, '10.00', 'Musician of the Service', 1, '2018-02-10', 2),
(76, 3, 2, '00005', '2017-12-31', NULL, 2, 18, '25.00', NULL, 1, '2018-02-10', 1),
(77, 3, 2, '00008', '2017-12-31', NULL, 3, 18, '2.00', 'Preacher of the Worship Service', 1, '2018-02-10', 2),
(78, 3, 2, '00007', '2017-12-24', NULL, 3, 20, '.40', NULL, 1, '2018-02-10', 1),
(79, 3, 2, '00008', '2017-12-24', NULL, 3, 20, '1.00', NULL, 1, '2018-02-10', 2),
(80, 3, 2, '00009', '2017-12-24', NULL, 3, 20, '8.00', NULL, 1, '2018-02-10', 2),
(81, 3, 2, '99998', '2017-12-24', NULL, 2, 20, '10.00', NULL, 1, '2018-02-10', 2),
(82, 3, 2, '00001', '2017-12-24', NULL, 3, 18, '25.00', NULL, 1, '2018-02-10', 1),
(83, 3, 2, '00002', '2017-12-24', NULL, 3, 18, '24.00', NULL, 1, '2018-02-10', 1),
(84, 3, 2, '00006', '2017-12-24', NULL, 2, 18, '30.00', NULL, 1, '2018-02-10', 1),
(85, 3, 2, '00005', '2017-12-24', NULL, 2, 18, '10.00', NULL, 1, '2018-02-10', 1),
(86, 3, 2, '00008', '2017-12-24', NULL, 3, 18, '1.00', NULL, 1, '2018-02-10', 2),
(87, 3, 2, '00010', '2017-12-24', NULL, 3, 18, '1.05', 'Musician for the Service', 1, '2018-02-10', 1),
(88, 3, 2, '00009', '2017-12-24', NULL, 2, 18, '100.00', 'Preacher of the Worship Service', 1, '2018-02-10', 1),
(89, 3, 2, '00009', '2017-12-17', NULL, 3, 20, '10.00', NULL, 1, '2018-02-10', 1),
(90, 3, 2, '00008', '2017-12-17', NULL, 3, 20, '2.00', NULL, 1, '2018-02-10', 2),
(91, 3, 2, '99998', '2017-12-17', NULL, 3, 20, '14.00', NULL, 1, '2018-02-10', 2),
(92, 3, 2, '00007', '2017-12-17', NULL, 3, 18, '1.00', NULL, 1, '2018-02-10', 1),
(93, 3, 2, '00008', '2017-12-17', NULL, 3, 18, '2.00', NULL, 1, '2018-02-10', 1),
(94, 3, 2, '00002', '2017-12-17', NULL, 3, 18, '25.00', NULL, 1, '2018-02-10', 1),
(95, 3, 2, '00001', '2017-12-17', NULL, 3, 18, '25.00', NULL, 1, '2018-02-10', 1),
(96, 3, 2, '00006', '2017-12-17', NULL, 2, 18, '127.00', NULL, 1, '2018-02-10', 1),
(97, 3, 2, '00005', '2017-12-17', NULL, 2, 18, '25.00', NULL, 1, '2018-02-10', 1),
(98, 3, 2, '00009', '2017-12-17', NULL, 2, 18, '127.00', 'Preacher of the Worship Service.', 1, '2018-02-10', 2),
(99, 3, 2, '00030', '2017-12-17', NULL, 3, 18, '5.00', 'Guest at OFMBC', 1, '2018-02-10', 2),
(100, 3, 2, '00031', '2017-12-17', NULL, 2, 18, '10.00', 'Guest @ OFMBC', 1, '2018-02-10', 2),
(101, 3, 2, '0005', '2018-05-18', NULL, 2, 13, '100.00', NULL, 2, '2018-05-21', 1),
(102, 3, 2, '0004', '2018-05-18', '', 2, 32, '50.00', 'Monies sent to Bernice McCollum for Son\'s Death (in place of Flowers)', 2, '2018-05-21', 1),
(103, 3, 2, '00009', '2018-05-13', NULL, 2, 18, '100.00', NULL, 1, '2018-05-21', 1),
(104, 3, 2, '00008', '2018-05-13', NULL, 2, 18, '275.00', NULL, 1, '2018-05-21', 1),
(105, 3, 2, '00007', '2018-05-13', NULL, 3, 18, '0.25', NULL, 1, '2018-05-21', 1),
(106, 3, 2, '00012', '2018-05-13', NULL, 3, 18, '25.00', NULL, 1, '2018-05-21', 1),
(107, 3, 2, '00001', '2018-05-13', NULL, 3, 18, '25.00', NULL, 1, '2018-05-21', 1),
(108, 3, 2, '00006', '2018-05-13', NULL, 2, 18, '65.00', NULL, 1, '2018-05-21', 1),
(109, 3, 2, '00005', '2018-05-13', NULL, 3, 18, '3.00', NULL, 1, '2018-05-21', 1),
(110, 3, 2, '00010', '2018-05-13', NULL, 3, 18, '20.00', NULL, 1, '2018-05-21', 1),
(111, 3, 2, '00009', '2018-05-13', NULL, 3, 20, '10.00', NULL, 1, '2018-05-21', 1),
(112, 3, 2, '00008', '2018-05-13', NULL, 3, 20, '2.00', NULL, 1, '2018-05-21', 1),
(113, 3, 2, '00001', '2018-05-13', NULL, 3, 20, '2.00', NULL, 1, '2018-05-21', 1),
(114, 3, 2, '00012', '2018-05-13', NULL, 2, 20, '5.00', NULL, 1, '2018-05-21', 1),
(115, 3, 2, '00007', '2018-05-13', NULL, 3, 20, '.05', NULL, 1, '2018-05-21', 1),
(116, 3, 2, '00006', '2018-05-13', NULL, 3, 20, '1.00', NULL, 1, '2018-05-21', 1),
(117, 3, 2, '00005', '2018-05-13', NULL, 3, 20, '1.00', NULL, 1, '2018-05-21', 1),
(118, 3, 2, '99999', '0000-00-00', NULL, 3, 18, '10.00', 'Guest of Min. Jerrica Dodd (Speaker of Hour)', 1, '2018-05-21', 1),
(119, 3, 2, '00019', '2018-05-13', NULL, 3, 20, '1.00', NULL, 1, '2018-05-21', 2),
(120, 3, 2, '00005', '2018-06-03', NULL, 3, 20, '1.00', 'only two in sunday school.', 1, '2018-06-10', 1),
(121, 3, 2, '00012', '2018-06-03', NULL, 3, 20, '5.00', NULL, 1, '2018-06-10', 1),
(122, 3, 2, '00005', '2018-06-03', NULL, 2, 18, '10.00', 'Only two for Worship...', 1, '2018-06-10', 1),
(123, 3, 2, '00012', '2018-06-03', NULL, 2, 18, '30.00', NULL, 1, '2018-06-10', 1),
(124, 3, 2, '00012', '2018-06-03', NULL, 3, 18, '15.00', 'From Mother McMultry - (sent in via Mother Brock).', 1, '2018-06-10', 1),
(125, 3, 2, '00001', '2018-09-09', NULL, 3, 20, '2.00', 'Only Sunday School.  No Preacher.', 1, '2018-09-15', 1),
(126, 3, 2, '00005', '2018-09-09', '1013', 2, 18, '25.00', 'Only Sunday School  (short worship) with no Preacher.', 1, '2018-09-15', 1),
(127, 3, 2, '00001', '2018-09-09', '3995', 2, 18, '30.00', 'Sunday school and short worship - no preacher.', 1, '2018-09-15', 1),
(128, 3, 2, '00012', '2018-09-09', '6604', 2, 18, '30.00', 'Sunday School and Short Worship - no preacher.', 1, '2018-09-15', 1),
(129, 3, 2, '0005', '2018-12-07', '3973', 2, 33, '380.00', 'Church Road Work - smoothing and Bobcat work by Charles Arnold.', 2, '2018-12-08', 1),
(130, 3, 2, '0005', '2018-12-16', '3971', 2, 34, '20.00', 'Youth Pianist for Sunday Worship', 2, '2018-12-17', 1),
(131, 39, 9, '000011', '2019-04-01', NULL, 9, 35, '30.00', NULL, 1, '2019-04-06', 1),
(132, 39, 9, '000011', '2019-03-10', '232', 9, 35, '90.00', NULL, 1, '2019-04-06', 1),
(133, 39, 9, '000022', '2019-03-09', NULL, 9, 35, '25.00', NULL, 1, '2019-04-06', 1),
(134, 39, 9, '000022', '2019-04-05', NULL, 9, 36, '45.00', NULL, 1, '2019-04-06', 1),
(135, 3, 2, '00009', '2019-03-31', '4082', 2, 18, '100.00', NULL, 1, '2019-04-06', 1),
(136, 3, 2, '00006', '2019-03-31', '1727', 2, 18, '50.00', NULL, 1, '2019-04-06', 1),
(137, 3, 2, '00012', '2019-03-31', NULL, 3, 18, '25.00', NULL, 1, '2019-04-06', 1),
(138, 3, 2, '00001', '2019-03-31', NULL, 3, 18, '20.00', NULL, 1, '2019-04-06', 1),
(139, 3, 2, '00010', '2019-03-31', NULL, 3, 18, '1.00', NULL, 1, '2019-04-06', 1),
(140, 3, 2, '00005', '2019-03-31', NULL, 3, 18, '5.00', NULL, 1, '2019-04-06', 1),
(141, 3, 2, '00009', '2019-03-31', '', 3, 20, '10.00', '', 1, '2019-04-06', 1),
(142, 3, 2, '00012', '2019-03-31', NULL, 3, 20, '2.00', NULL, 1, '2019-04-06', 1),
(143, 3, 2, '00006', '2019-03-31', NULL, 3, 20, '1.00', NULL, 1, '2019-04-06', 1),
(144, 44, 10, '00001', '2019-04-07', '232', 12, 38, '25.00', '', 1, '2019-04-07', 1),
(145, 44, 10, '00002', '2019-04-05', NULL, 11, 37, '45.00', NULL, 1, '2019-04-07', 1),
(146, 44, 10, '00001', '2019-03-31', '41082', 12, 37, '100.00', NULL, 1, '2019-04-07', 1),
(147, 44, 10, '00001', '2019-03-06', NULL, 11, 37, '45.00', NULL, 1, '2019-04-07', 1),
(148, 44, 10, NULL, '2019-04-06', NULL, 12, 43, '30.00', 'Ink for printer', 2, '2019-04-07', 1),
(149, 44, 10, NULL, '2019-04-01', '4099', 12, 42, '90.00', NULL, 2, '2019-04-07', 1),
(150, 3, 2, '0005', '2019-04-20', NULL, 13, 16, '100.00', 'For Updates / Improvement for Finance Website for OFMBC reporting setup.', 2, '2019-04-20', 1),
(151, 3, 2, '0005', '2019-04-21', NULL, 13, 44, '54.16', 'Mother Louis McMultry 97 Birthday card and $25.00 visa.  Two BFI Lily plants (for church table); whoppers Eggs for members.', 2, '2019-04-21', 1),
(152, 3, 2, '00005', '2019-04-21', NULL, 3, 20, '5.00', NULL, 1, '2019-04-22', 1),
(153, 3, 2, '00012', '2019-04-21', NULL, 3, 20, '2.00', NULL, 1, '2019-04-22', 1),
(154, 3, 2, '00006', '0000-00-00', NULL, 3, 20, '2.00', NULL, 1, '2019-04-22', 1),
(155, 3, 2, '00023', '2019-04-21', NULL, 3, 20, '5.00', NULL, 1, '2019-04-22', 1),
(156, 3, 2, '000040', '2019-04-21', NULL, 3, 20, '10.00', NULL, 1, '2019-04-22', 1),
(157, 3, 2, '000033', '2019-04-21', NULL, 3, 20, '1.00', NULL, 1, '2019-04-22', 1),
(158, 3, 2, '00023', '2019-04-21', NULL, 3, 18, '25.00', NULL, 1, '2019-04-22', 1),
(159, 3, 2, '000040', '2019-04-21', NULL, 3, 18, '20.00', NULL, 1, '2019-04-22', 1),
(160, 3, 2, '00006', '2019-04-21', '1731', 2, 18, '50.00', NULL, 1, '2019-04-22', 1),
(161, 3, 2, '00005', '2019-04-21', '1207', 2, 18, '25.00', NULL, 1, '2019-04-22', 1),
(162, 3, 2, '00023', '0000-00-00', NULL, 3, 18, '2.00', NULL, 1, '2019-04-22', 1),
(163, 3, 2, '00005', '2020-02-09', NULL, 2, 18, '50.00', NULL, 1, '2020-02-16', 1),
(164, 3, 2, '00006', '2020-02-09', NULL, 2, 18, '100.00', NULL, 1, '2020-02-16', 1),
(165, 3, 2, '00012', '2020-02-09', NULL, 2, 18, '50.00', 'not present - sent offering', 1, '2020-02-16', 1),
(166, 3, 2, '00010', '2020-02-09', NULL, 3, 18, '5.00', NULL, 1, '2020-02-16', 1),
(167, 3, 2, '000040', '2020-02-09', NULL, 3, 18, '520.00', NULL, 1, '2020-02-16', 1),
(168, 3, 2, '000040', '2020-02-09', NULL, 3, 20, '10.00', NULL, 1, '2020-02-16', 1),
(169, 3, 2, '00005', '2020-02-09', NULL, 3, 20, '2.00', NULL, 1, '2020-02-16', 1),
(170, 3, 2, '00006', '2020-02-09', NULL, 3, 20, '2.00', NULL, 1, '2020-02-16', 1),
(171, 3, 2, '000040', '2020-03-08', NULL, 3, 18, '405.00', 'Absent but communion was served to home and tithes was paid.', 1, '2020-03-08', 2),
(172, 3, 2, '00005', '2020-03-08', '1213', 2, 18, '50.00', NULL, 1, '2020-03-08', 1),
(173, 3, 2, '00005', '2020-03-08', NULL, 3, 20, '2.00', NULL, 1, '2020-03-08', 1),
(174, 3, 2, '00006', '2020-03-08', '1784', 2, 18, '100.00', NULL, 1, '2020-03-08', 1),
(175, 3, 2, '00006', '2020-03-08', NULL, 3, 20, '10.00', NULL, 1, '2020-03-08', 1),
(176, 3, 2, '00006', '2020-02-23', NULL, 3, 20, '5.00', NULL, 1, '2020-03-08', 1),
(177, 3, 2, '00010', '2020-02-23', NULL, 3, 20, '5.00', NULL, 1, '2020-03-08', 1),
(178, 3, 2, '00005', '2020-02-23', NULL, 3, 20, '2.00', NULL, 1, '2020-03-08', 1),
(179, 3, 2, '000040', '2020-02-23', NULL, 3, 20, '2.00', NULL, 1, '2020-03-08', 1),
(180, 3, 2, '00012', '2020-02-23', '6750', 2, 18, '50.00', NULL, 1, '2020-03-08', 1),
(181, 3, 2, '00010', '2020-02-23', '3140', 2, 18, '10.00', NULL, 1, '2020-03-08', 1),
(182, 3, 2, '000040', '2020-02-23', NULL, 3, 18, '170.00', NULL, 1, '2020-03-08', 2),
(183, 3, 2, '00019', '2020-02-23', NULL, 3, 18, '2.00', NULL, 1, '2020-03-08', 2),
(184, 3, 2, '00006', '2020-02-23', '1783', 2, 18, '100.00', NULL, 1, '2020-03-08', 1),
(185, 3, 2, '00005', '2020-02-23', '1100', 2, 18, '50.00', NULL, 1, '2020-03-08', 1),
(186, 3, 2, '00005', '2020-04-03', NULL, 13, 18, '30.00', 'Done via paypal donations.', 1, '2020-04-12', 1),
(187, 3, 2, '00012', '2020-04-10', NULL, 2, 18, '75.00', NULL, 1, '2020-04-12', 1),
(188, 3, 2, '000040', '2020-04-12', NULL, 3, 18, '580.00', 'Tithes send in for previous sunday.', 1, '2020-04-12', 1),
(189, 3, 2, '00006', '2020-05-03', '1213', 13, 18, '200.00', 'Online Payment via the website', 1, '2020-05-13', 1),
(190, 3, 2, '00005', '2020-05-03', NULL, 13, 18, '75.00', 'Online payment via church website.', 1, '2020-05-13', 1),
(191, 3, 2, '00007', '2020-05-03', NULL, 2, 18, '50.00', 'Online Payment via church website - paypal', 1, '2020-05-13', 1),
(192, 3, 2, '00012', '2020-05-08', NULL, 2, 18, '30.00', 'Sent in payment via mail.', 1, '2020-05-13', 1),
(193, 3, 2, '00012', '2020-05-08', NULL, 3, 18, '20.00', 'Sent in payment for tithes via mail.', 1, '2020-05-13', 1),
(194, 3, 2, '00012', '2020-05-17', NULL, 3, 23, '50.00', 'No service however cash tithes was send in by Lois Brock.', 1, '2020-05-17', 1),
(195, 3, 2, '0005', '2020-05-17', NULL, 2, 32, '100.00', 'Family of Louis \"Mother\" McMultry', 2, '2020-05-17', 1),
(196, 3, 2, '000040', '2020-06-04', NULL, 3, 18, '400.00', NULL, 1, '2020-06-04', 1),
(197, 3, 2, '00012', '2020-05-31', '8897', 2, 18, '30.00', NULL, 1, '2020-06-04', 1),
(198, 3, 2, '99999', '2020-05-31', '8134', 2, 23, '100.00', 'Benevolence offering for Mother Louis McMultry from  Susan Miles:\r\nMarietta, GA', 1, '2020-06-04', 1),
(199, 3, 2, '99999', '2020-06-04', NULL, 2, 18, '300.00', 'Benevolence offering for Mother McMultry from Elizabeth Lynn Newman', 1, '2020-06-04', 2),
(200, 3, 2, '00006', '2020-06-07', NULL, 13, 18, '300.00', 'Tithes and offering', 1, '2020-06-09', 1),
(201, 3, 2, '00005', '2020-06-08', NULL, 13, 18, '55.00', 'Tithes and offerings', 1, '2020-06-09', 1),
(202, 3, 2, '00007', '2020-06-07', NULL, 2, 18, '55.00', 'Tithes and offerings', 1, '2020-06-09', 1),
(203, 3, 2, '000040', '2020-06-21', NULL, 3, 18, '200.00', 'Tithes and Offerings - Hardeman family', 1, '2020-06-22', 1),
(204, 3, 2, '00012', '2020-06-21', NULL, 2, 18, '40.00', 'Tithes for Mother Brock - sent via mail', 1, '2020-06-22', 1),
(205, 3, 2, '00005', '2020-06-22', NULL, 13, 18, '50.00', 'Tithes for week', 1, '2020-06-22', 1),
(206, 3, 2, '00006', '2020-06-28', NULL, 13, 18, '1600.00', 'Tithes and Offerings', 1, '2020-07-04', 1),
(207, 3, 2, '000040', '2020-06-28', NULL, 3, 18, '430.00', 'Tithes and Offerings', 1, '2020-07-04', 1),
(208, 3, 2, '00005', '2020-07-04', NULL, 13, 18, '70.00', 'Offering and Tithes', 1, '2020-07-04', 1),
(209, 3, 2, '00005', '2020-07-30', NULL, 13, 18, '50.00', 'Offer/Tithes made via paypal', 1, '2020-07-31', 1),
(210, 3, 2, '00012', '2020-07-26', '6759', 2, 18, '20.00', 'Offering/Tithes - she came out to the church and delivered tithes.', 1, '2020-08-02', 1),
(211, 3, 2, '000040', '2020-08-02', NULL, 3, 18, '1720.00', 'Tithes and Offerings', 1, '2020-08-02', 1),
(212, 3, 2, '00012', '2020-08-02', NULL, 3, 18, '40.00', 'Tithes and Offerings', 1, '2020-08-02', 1),
(213, 3, 2, '00006', '2020-08-08', NULL, 13, 18, '300.00', 'Tithes/offerings - via paypal/credit card', 1, '2020-08-09', 1),
(214, 3, 2, '0005', '2020-08-10', NULL, 13, 16, '13.32', 'Postage Stamps and Security Envelope  - for sending later to Church members and community.', 2, '2020-08-10', 1),
(215, 3, 2, '0005', '2020-08-16', NULL, 13, 16, '196.11', 'Phone & Network Bill - Paid via card - Confirmation no. --> 6PN7EVR1C01Y0XG', 2, '2020-08-16', 1),
(216, 3, 2, '00005', '2020-08-16', NULL, 13, 18, '75.00', 'Tithes/Offerings- off sunday', 1, '2020-08-16', 1),
(217, 3, 2, '000040', '2020-08-16', NULL, 3, 18, '200.00', 'Tithes and Offerings', 1, '2020-08-25', 1),
(218, 3, 2, '00019', '2020-08-23', NULL, 3, 18, '10.00', 'Tithes/OFferings', 1, '2020-08-25', 1),
(219, 3, 2, '0005', '2020-08-22', NULL, 13, 17, '31.76', 'Health products - Hand SAnitizer', 2, '2020-08-25', 1),
(220, 3, 2, '0005', '2020-08-29', NULL, 2, 32, '100.00', 'For Lee Conner  (Daughter of Bobby McCollum and Bessie Conner) - Grief and Loss Benevolent offering.', 2, '2020-08-30', 1),
(221, 3, 2, '000040', '2020-09-06', NULL, 3, 18, '500.00', 'Tithes and offerings', 1, '2020-09-06', 1),
(222, 3, 2, '00006', '2020-09-13', NULL, 13, 18, '100.00', 'Tithes and Offering', 1, '2020-09-13', 1),
(223, 3, 2, '00005', '2020-09-13', NULL, 13, 18, '50.00', 'Tithes and Offerings', 1, '2020-09-13', 1),
(224, 3, 2, '000040', '2020-09-20', NULL, 3, 18, '340.00', 'Tithes and Offerings', 1, '2020-09-29', 1),
(225, 3, 2, '00006', '2020-10-04', NULL, 13, 18, '100.00', 'Tithes/Offering', 1, '2020-10-05', 1),
(226, 3, 2, '00006', '2020-11-04', NULL, 13, 18, '200.00', 'Tithes and offerings via PayPal', 1, '2020-11-15', 1),
(227, 3, 2, '00005', '2020-11-15', NULL, 13, 18, '25.00', 'Offerings for OFMBC - paid via PayPal.', 1, '2020-11-15', 1),
(228, 3, 2, '000040', '2020-11-15', NULL, 3, 18, '192.00', 'Tithes & Offerings - Hardeman Family  (Deposited to OFMBC LGE Checking)', 1, '2020-11-16', 1),
(229, 3, 2, '000040', '2020-11-15', NULL, 3, 18, '420.00', 'Tithes & Offerings - Hardeman Family  (Deposited to OFMBC LGE Checking)', 1, '2020-11-16', 1),
(230, 3, 2, '0005', '2020-11-22', '4267', 2, 33, '150.00', 'All Seasons Lawn Services', 2, '2020-11-21', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `rs_tbl_admin`
--
ALTER TABLE `rs_tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `rs_tbl_admin_menu`
--
ALTER TABLE `rs_tbl_admin_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `rs_tbl_church`
--
ALTER TABLE `rs_tbl_church`
  ADD PRIMARY KEY (`church_id`);

--
-- Indexes for table `rs_tbl_config`
--
ALTER TABLE `rs_tbl_config`
  ADD PRIMARY KEY (`config_id`);

--
-- Indexes for table `rs_tbl_contact`
--
ALTER TABLE `rs_tbl_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `rs_tbl_contents`
--
ALTER TABLE `rs_tbl_contents`
  ADD PRIMARY KEY (`cms_id`);

--
-- Indexes for table `rs_tbl_countries`
--
ALTER TABLE `rs_tbl_countries`
  ADD PRIMARY KEY (`country_id`),
  ADD KEY `IDX_COUNTRY_NAME` (`country_name`);

--
-- Indexes for table `rs_tbl_currency`
--
ALTER TABLE `rs_tbl_currency`
  ADD PRIMARY KEY (`currency_type_id`);

--
-- Indexes for table `rs_tbl_faq`
--
ALTER TABLE `rs_tbl_faq`
  ADD PRIMARY KEY (`faq_id`);

--
-- Indexes for table `rs_tbl_member`
--
ALTER TABLE `rs_tbl_member`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `email` (`member_email`),
  ADD KEY `Password` (`member_pass`),
  ADD KEY `full_name` (`first_name`,`last_name`);

--
-- Indexes for table `rs_tbl_member_category`
--
ALTER TABLE `rs_tbl_member_category`
  ADD PRIMARY KEY (`member_category_id`);

--
-- Indexes for table `rs_tbl_transection_category`
--
ALTER TABLE `rs_tbl_transection_category`
  ADD PRIMARY KEY (`tran_category_id`);

--
-- Indexes for table `rs_tbl_transection_detail`
--
ALTER TABLE `rs_tbl_transection_detail`
  ADD PRIMARY KEY (`transection_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `rs_tbl_countries`
--
ALTER TABLE `rs_tbl_countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
