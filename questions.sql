SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `questions`
-- ----------------------------
DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(254) NOT NULL DEFAULT '',
  `optionOne` varchar(254) NOT NULL DEFAULT '',
  `optionTwo` varchar(254) NOT NULL DEFAULT '',
  `timeCreated` datetime DEFAULT NULL,
  `resultsTimerMinutes` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `questions`
-- ----------------------------
BEGIN;
INSERT INTO `questions` VALUES ('1', 'Which wallet should I get?', 'http://img.ffffound.com/static-data/assets/6/0731966b068e20b5639dbdd48704ff6813aba77a_m.jpg', 'http://img.ffffound.com/static-data/assets/6/6559bd0329887e0f63879bd9f51ffca84325f197_m.jpg', '2012-05-11 18:06:10', '0');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
