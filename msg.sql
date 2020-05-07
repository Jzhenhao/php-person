/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : msg

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2019-06-19 16:52:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for lyb
-- ----------------------------
DROP TABLE IF EXISTS `lyb`;
CREATE TABLE `lyb` (
  `id` mediumint(255) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `nr` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lyb
-- ----------------------------
INSERT INTO `lyb` VALUES ('6', 'jzh', '好帅');
INSERT INTO `lyb` VALUES ('7', 'jzh', '真的帅');
INSERT INTO `lyb` VALUES ('8', 'jin', '呃呃呃呃呃');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` mediumint(6) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('0', 'jin', '123456');
INSERT INTO `user` VALUES ('1', 'jzh', '111');
INSERT INTO `user` VALUES ('2', 'zs', '123');
INSERT INTO `user` VALUES ('3', 'ls', '123');
