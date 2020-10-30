SET FOREIGN_KEY_CHECKS = 0;
-- ---------------------------- --
-- TABLE STRUCTURE FOR tbl_case --
-- ---------------------------- --
DROP TABLE IF EXISTS `tbl_case`;
CREATE TABLE tbl_case (
    `id` int(9) ZEROFILL NOT NULL AUTO_INCREMENT,
    `status` varchar(10) NOT NULL,
    `brgy_code` varchar(9) NOT NULL,
    `barangay` varchar(70) NOT NULL,
    `citymun_code` varchar(6) NOT NULL,
    `citymun` varchar(50) NOT NULL,
    `prov_code` varchar(4) NOT NULL,
    `province` varchar(40) NOT NULL,
    `fname` varchar(30) NOT NULL,
    `mname` varchar(30) NOT NULL,
    `lname` varchar(30) NOT NULL,
    `age` int(3) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8