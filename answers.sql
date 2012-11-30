SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `answers`
-- ----------------------------
DROP TABLE IF EXISTS `answers`;
CREATE TABLE `answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `questionId` int(10) unsigned NOT NULL DEFAULT '0',
  `optionChosen` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `timeCreated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ip` varchar(40) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `countQuery` (`optionChosen`,`questionId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `answers`
-- ----------------------------
BEGIN;
INSERT INTO `answers` VALUES ('1', '1', '2', '2012-05-11 18:09:58', '108.35.46.170');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
