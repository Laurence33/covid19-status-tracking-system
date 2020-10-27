SET FOREIGN_KEY_CHECKS = 0;
-- ----------------------------
-- Table structure for tbl_province
-- ----------------------------
DROP TABLE IF EXISTS `tbl_province`;
CREATE TABLE `tbl_province` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `psgc_code` varchar(9),
  `prov_desc` varchar(40),
  `reg_code` varchar(2),
  `prov_code` varchar(4),
  `region` varchar(100),
  `iso` varchar(6),
  `num_cases`  int unsigned DEFAULT 0,
  `num_active` int unsigned DEFAULT 0,
  `num_recoveries` int unsigned DEFAULT 0,
  `num_deaths` int unsigned DEFAULT 0,
  `num_surveillances` int unsigned DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_province
-- ----------------------------
INSERT INTO `tbl_province` VALUES ('1', '012800000', 'ILOCOS NORTE', '01', '0128', 'REGION I (ILOCOS REGION)', 'PH-ILN', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('2', '012900000', 'ILOCOS SUR', '01', '0129', 'REGION I (ILOCOS REGION)', 'PH-ILS', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('3', '013300000', 'LA UNION', '01', '0133', 'REGION I (ILOCOS REGION)', 'PH-LUN', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('4', '015500000', 'PANGASINAN', '01', '0155', 'REGION I (ILOCOS REGION)', 'PH-PAN', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('5', '020900000', 'BATANES', '02', '0209', 'REGION II (CAGAYAN VALLEY)', 'PH-BTN', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('6', '021500000', 'CAGAYAN', '02', '0215', 'REGION II (CAGAYAN VALLEY)', 'PH-CAG', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('7', '023100000', 'ISABELA', '02', '0231', 'REGION II (CAGAYAN VALLEY)', 'PH-ISA', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('8', '025000000', 'NUEVA VIZCAYA', '02', '0250', 'REGION II (CAGAYAN VALLEY)', 'PH-NUV', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('9', '025700000', 'QUIRINO', '02', '0257', 'REGION II (CAGAYAN VALLEY)', 'PH-QUI', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('10', '030800000', 'BATAAN', '03', '0308', 'REGION III (CENTRAL LUZON)', 'PH-BAN', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('11', '031400000', 'BULACAN', '03', '0314', 'REGION III (CENTRAL LUZON)', 'PH-BUL', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('12', '034900000', 'NUEVA ECIJA', '03', '0349', 'REGION III (CENTRAL LUZON)', 'PH-NUE', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('13', '035400000', 'PAMPANGA', '03', '0354', 'REGION III (CENTRAL LUZON)', 'PH-PAM', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('14', '036900000', 'TARLAC', '03', '0369', 'REGION III (CENTRAL LUZON)', 'PH-TAR', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('15', '037100000', 'ZAMBALES', '03', '0371', 'REGION III (CENTRAL LUZON)', 'PH-ZMB', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('16', '037700000', 'AURORA', '03', '0377', 'REGION III (CENTRAL LUZON)', 'PH-AUR', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('17', '041000000', 'BATANGAS', '04', '0410', 'REGION IV-A (CALABARZON)', 'PH-BTG', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('18', '042100000', 'CAVITE', '04', '0421', 'REGION IV-A (CALABARZON)', 'PH-CAV', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('19', '043400000', 'LAGUNA', '04', '0434', 'REGION IV-A (CALABARZON)', 'PH-LAG', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('20', '045600000', 'QUEZON', '04', '0456', 'REGION IV-A (CALABARZON)', 'PH-QUE', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('21', '045800000', 'RIZAL', '04', '0458', 'REGION IV-A (CALABARZON)', 'PH-RIZ', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('22', '174000000', 'MARINDUQUE', '17', '1740', 'REGION IV-B (MIMAROPA)', 'PH-MAD', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('23', '175100000', 'OCCIDENTAL MINDORO', '17', '1751', 'REGION IV-B (MIMAROPA)', 'PH-MDC', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('24', '175200000', 'ORIENTAL MINDORO', '17', '1752', 'REGION IV-B (MIMAROPA)', 'PH-MDR', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('25', '175300000', 'PALAWAN', '17', '1753', 'REGION IV-B (MIMAROPA)', 'PH-PLW', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('26', '175900000', 'ROMBLON', '17', '1759', 'REGION IV-B (MIMAROPA)', 'PH-ROM', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('27', '050500000', 'ALBAY', '05', '0505', 'REGION V (BICOL REGION)', 'PH-ALB', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('28', '051600000', 'CAMARINES NORTE', '05', '0516', 'REGION V (BICOL REGION)', 'PH-CAN', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('29', '051700000', 'CAMARINES SUR', '05', '0517', 'REGION V (BICOL REGION)', 'PH-CAS', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('30', '052000000', 'CATANDUANES', '05', '0520', 'REGION V (BICOL REGION)', 'PH-CAT', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('31', '054100000', 'MASBATE', '05', '0541', 'REGION V (BICOL REGION)', 'PH-MAS', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('32', '056200000', 'SORSOGON', '05', '0562', 'REGION V (BICOL REGION)', 'PH-SOR', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('33', '060400000', 'AKLAN', '06', '0604', 'REGION VI (WESTERN VISAYAS)', 'PH-AKL', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('34', '060600000', 'ANTIQUE', '06', '0606', 'REGION VI (WESTERN VISAYAS)', 'PH-ANT', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('35', '061900000', 'CAPIZ', '06', '0619', 'REGION VI (WESTERN VISAYAS)', 'PH-CAP', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('36', '063000000', 'ILOILO', '06', '0630', 'REGION VI (WESTERN VISAYAS)', 'PH-ILI', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('37', '064500000', 'NEGROS OCCIDENTAL', '06', '0645', 'REGION VI (WESTERN VISAYAS)', 'PH-NEC', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('38', '067900000', 'GUIMARAS', '06', '0679', 'REGION VI (WESTERN VISAYAS)', 'PH-GUI', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('39', '071200000', 'BOHOL', '07', '0712', 'REGION VII (CENTRAL VISAYAS)', 'PH-BOH', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('40', '072200000', 'CEBU', '07', '0722', 'REGION VII (CENTRAL VISAYAS)', 'PH-CEB', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('41', '074600000', 'NEGROS ORIENTAL', '07', '0746', 'REGION VII (CENTRAL VISAYAS)', 'PH-NER', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('42', '076100000', 'SIQUIJOR', '07', '0761', 'REGION VII (CENTRAL VISAYAS)', 'PH-SIG', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('43', '082600000', 'EASTERN SAMAR', '08', '0826', 'REGION VIII (EASTERN VISAYAS)', 'PH-EAS', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('44', '083700000', 'LEYTE', '08', '0837', 'REGION VIII (EASTERN VISAYAS)', 'PH-LEY', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('45', '084800000', 'NORTHERN SAMAR', '08', '0848', 'REGION VIII (EASTERN VISAYAS)', 'PH-NSA', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('46', '086000000', 'SAMAR (WESTERN SAMAR)', '08', '0860', 'REGION VIII (EASTERN VISAYAS)', 'PH-WSA', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('47', '086400000', 'SOUTHERN LEYTE', '08', '0864', 'REGION VIII (EASTERN VISAYAS)', 'PH-SLE', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('48', '087800000', 'BILIRAN', '08', '0878', 'REGION VIII (EASTERN VISAYAS)', 'PH-BIL', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('49', '097200000', 'ZAMBOANGA DEL NORTE', '09', '0972', 'REGION IX (ZAMBOANGA PENINSULA)', 'PH-ZAN', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('50', '097300000', 'ZAMBOANGA DEL SUR', '09', '0973', 'REGION IX (ZAMBOANGA PENINSULA)', 'PH-ZAS', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('51', '098300000', 'ZAMBOANGA SIBUGAY', '09', '0983', 'REGION IX (ZAMBOANGA PENINSULA)', 'PH-ZSI', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('52', '099700000', 'CITY OF ISABELA', '09', '0997', 'REGION IX (ZAMBOANGA PENINSULA)', 'PH-COI', 0, 0, 0, 0, 0); --NOT EXITSITNG IN LATEST
INSERT INTO `tbl_province` VALUES ('53', '101300000', 'BUKIDNON', '10', '1013', 'REGION X (NORTHERN MINDANAO)', 'PH-BUK', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('54', '101800000', 'CAMIGUIN', '10', '1018', 'REGION X (NORTHERN MINDANAO)', 'PH-CAM', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('55', '103500000', 'LANAO DEL NORTE', '10', '1035', 'REGION X (NORTHERN MINDANAO)', 'PH-LAN', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('56', '104200000', 'MISAMIS OCCIDENTAL', '10', '1042', 'REGION X (NORTHERN MINDANAO)', 'PH-MSC', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('57', '104300000', 'MISAMIS ORIENTAL', '10', '1043', 'REGION X (NORTHERN MINDANAO)', 'PH-MSR', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('58', '112300000', 'DAVAO DEL NORTE', '11', '1123', 'REGION XI (DAVAO REGION)', 'PH-DAV', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('59', '112400000', 'DAVAO DEL SUR', '11', '1124', 'REGION XI (DAVAO REGION)', 'PH-DAS', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('60', '112500000', 'DAVAO ORIENTAL', '11', '1125', 'REGION XI (DAVAO REGION)', 'PH-DAO', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('61', '118200000', 'DAVAO DE ORO', '11', '1182', 'REGION XI (DAVAO REGION)', 'PH-COM', 0, 0, 0, 0, 0); --CHANGED TO DAVAO DE ORO FROM COMPOSTELLA VALLEY
INSERT INTO `tbl_province` VALUES ('62', '118600000', 'DAVAO OCCIDENTAL', '11', '1186', 'REGION XI (DAVAO REGION)', 'PH-DVO', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('63', '124700000', 'COTABATO (NORTH COTABATO)', '12', '1247', 'REGION XII (SOCCSKSARGEN)', 'PH-NCO', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('64', '126300000', 'SOUTH COTABATO', '12', '1263', 'REGION XII (SOCCSKSARGEN)', 'PH-SCO', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('65', '126500000', 'SULTAN KUDARAT', '12', '1265', 'REGION XII (SOCCSKSARGEN)', 'PH-SUK', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('66', '128000000', 'SARANGANI', '12', '1280', 'REGION XII (SOCCSKSARGEN)', 'PH-SAR', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('67', '129800000', 'COTABATO CITY', '12', '1298', 'REGION XII (SOCCSKSARGEN)', 'PH-COC', 0, 0, 0, 0, 0); --NONE EXISTING
INSERT INTO `tbl_province` VALUES ('68', '133900000', 'METRO MANILA', '13', '1339', 'NATIONAL CAPITAL REGION (NCR)', 'PH-00', 0, 0, 0, 0, 0); --CHANGED FROM NCR, CITY OF MANILA, FIRST DISTRICT TO METRO MANILA
--INSERT INTO `tbl_province` VALUES ('69', '133900000', 'CITY OF MANILA', '13', '1339', 'NATIONAL CAPITAL REGION (NCR)', 'PH-00', 0, 0, 0, 0, 0);
--INSERT INTO `tbl_province` VALUES ('69', '137400000', 'NCR, SECOND DISTRICT', '13', '1374');
--INSERT INTO `tbl_province` VALUES ('70', '137500000', 'NCR, THIRD DISTRICT', '13', '1375');
--INSERT INTO `tbl_province` VALUES ('71', '137600000', 'NCR, FOURTH DISTRICT', '13', '1376'); --ALL METRO MANILA
INSERT INTO `tbl_province` VALUES ('69', '140100000', 'ABRA', '14', '1401', 'CORDILLERA ADMINISTRATIVE REGION (CAR)', 'PH-ABR', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('70', '141100000', 'BENGUET', '14', '1411', 'CORDILLERA ADMINISTRATIVE REGION (CAR)', 'PH-BEN', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('71', '142700000', 'IFUGAO', '14', '1427', 'CORDILLERA ADMINISTRATIVE REGION (CAR)', 'PH-IFU', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('72', '143200000', 'KALINGA', '14', '1432', 'CORDILLERA ADMINISTRATIVE REGION (CAR)', 'PH-KAL', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('73', '144400000', 'MOUNTAIN PROVINCE', '14', '1444', 'CORDILLERA ADMINISTRATIVE REGION (CAR)', 'PH-MOU', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('74', '148100000', 'APAYAO', '14', '1481', 'CORDILLERA ADMINISTRATIVE REGION (CAR)', 'PH-APA', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('75', '150700000', 'BASILAN', '15', '1507', 'BANGSAMORO AUTONOMOUS REGION IN MUSLIM MINDANAO (BARMM)', 'PH-BAS', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('76', '153600000', 'LANAO DEL SUR', '15', '1536', 'BANGSAMORO AUTONOMOUS REGION IN MUSLIM MINDANAO (BARMM)', 'PH-LAS', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('77', '153800000', 'MAGUINDANAO', '15', '1538', 'BANGSAMORO AUTONOMOUS REGION IN MUSLIM MINDANAO (BARMM)', 'PH-MAG', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('78', '156600000', 'SULU', '15', '1566', 'BANGSAMORO AUTONOMOUS REGION IN MUSLIM MINDANAO (BARMM)', 'PH-SLU', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('79', '157000000', 'TAWI-TAWI', '15', '1570', 'BANGSAMORO AUTONOMOUS REGION IN MUSLIM MINDANAO (BARMM)', 'PH-TAW', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('80', '160200000', 'AGUSAN DEL NORTE', '16', '1602', 'REGION XIII (Caraga)', 'PH-AGN', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('81', '160300000', 'AGUSAN DEL SUR', '16', '1603', 'REGION XIII (Caraga)', 'PH-AGS', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('82', '166700000', 'SURIGAO DEL NORTE', '16', '1667', 'REGION XIII (Caraga)', 'PH-SUN', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('83', '166800000', 'SURIGAO DEL SUR', '16', '1668', 'REGION XIII (Caraga)', 'PH-SUR', 0, 0, 0, 0, 0);
INSERT INTO `tbl_province` VALUES ('84', '168500000', 'DINAGAT ISLANDS', '16', '1685', 'REGION XIII (Caraga)', 'PH-DIN', 0, 0, 0, 0, 0);
