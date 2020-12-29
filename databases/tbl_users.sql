SET FOREIGN_KEY_CHECKS = 0;
-- ---------------------------- --
-- TABLE STRUCTURE FOR tbl_users --
-- ---------------------------- --
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE tbl_users (
    `id` int(9) ZEROFILL NOT NULL AUTO_INCREMENT,
    `username` varchar(12) NOT NULL,
    `password` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;