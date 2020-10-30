SET FOREIGN_KEY_CHECKS = 0;
-- ----------------------------
-- Table structure for tbl_region
-- ----------------------------
DROP TABLE IF EXISTS `tbl_region`;
CREATE TABLE `tbl_region` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `psgc_code` varchar(9) NOT NULL,
  `reg_desc` varchar(100) NOT NULL,
  `reg_code` varchar(2) NOT NULL,
  `island_group` varchar(8) NOT NULL,
  `num_cases`  int unsigned DEFAULT 0,
  `num_active` int unsigned DEFAULT 0,
  `num_recoveries` int unsigned DEFAULT 0,
  `num_deaths` int unsigned DEFAULT 0,
  `num_surveillances` int unsigned DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_region
-- ----------------------------
INSERT INTO `tbl_region` VALUES ('1', '010000000', 'REGION I (ILOCOS REGION)', '01', 'Luzon', 0, 0, 0, 0, 0);
INSERT INTO `tbl_region` VALUES ('2', '020000000', 'REGION II (CAGAYAN VALLEY)', '02', 'Luzon', 0, 0, 0, 0, 0);
INSERT INTO `tbl_region` VALUES ('3', '030000000', 'REGION III (CENTRAL LUZON)', '03', 'Luzon', 0, 0, 0, 0, 0);
INSERT INTO `tbl_region` VALUES ('4', '040000000', 'REGION IV-A (CALABARZON)', '04', 'Luzon', 0, 0, 0, 0, 0);
INSERT INTO `tbl_region` VALUES ('5', '170000000', 'REGION IV-B (MIMAROPA)', '17', 'Luzon', 0, 0, 0, 0, 0);
INSERT INTO `tbl_region` VALUES ('6', '050000000', 'REGION V (BICOL REGION)', '05', 'Luzon', 0, 0, 0, 0, 0);
INSERT INTO `tbl_region` VALUES ('7', '060000000', 'REGION VI (WESTERN VISAYAS)', '06', 'Visayas', 0, 0, 0, 0, 0);
INSERT INTO `tbl_region` VALUES ('8', '070000000', 'REGION VII (CENTRAL VISAYAS)', '07', 'Visayas', 0, 0, 0, 0, 0);
INSERT INTO `tbl_region` VALUES ('9', '080000000', 'REGION VIII (EASTERN VISAYAS)', '08', 'Visayas', 0, 0, 0, 0, 0);
INSERT INTO `tbl_region` VALUES ('10', '090000000', 'REGION IX (ZAMBOANGA PENINSULA)', '09', 'Mindanao', 0, 0, 0, 0, 0);
INSERT INTO `tbl_region` VALUES ('11', '100000000', 'REGION X (NORTHERN MINDANAO)', '10', 'Mindanao', 0, 0, 0, 0, 0);
INSERT INTO `tbl_region` VALUES ('12', '110000000', 'REGION XI (DAVAO REGION)', '11', 'Mindanao', 0, 0, 0, 0, 0);
INSERT INTO `tbl_region` VALUES ('13', '120000000', 'REGION XII (SOCCSKSARGEN)', '12', 'Mindanao', 0, 0, 0, 0, 0);
INSERT INTO `tbl_region` VALUES ('14', '130000000', 'NATIONAL CAPITAL REGION (NCR)', '13', 'Luzon', 0, 0, 0, 0, 0);
INSERT INTO `tbl_region` VALUES ('15', '140000000', 'CORDILLERA ADMINISTRATIVE REGION (CAR)', '14', 'Luzon', 0, 0, 0, 0, 0);
INSERT INTO `tbl_region` VALUES ('16', '150000000', 'BANGSAMORO AUTONOMOUS REGION IN MUSLIM MINDANAO (BARMM)', '15', 'Mindanao', 0, 0, 0, 0, 0); --CHANGED FROM ARMM TO BARMM
INSERT INTO `tbl_region` VALUES ('17', '160000000', 'REGION XIII (Caraga)', '16', 'Mindanao', 0, 0, 0, 0, 0);