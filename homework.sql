/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : homework

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-03-29 19:57:11
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `starttime` timestamp NOT NULL,
  `lastlogin` timestamp NOT NULL,
  `typeid` int(11) DEFAULT NULL COMMENT '所属分类id',
  `kind` enum('3','2','1','0') DEFAULT '0' COMMENT '0管理，1学校，2学院，3专业',
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1正常，0禁用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('5', 'admins', 'eyJpdiI6InNVNkEwd1IzN3lNd3lGTlJMWGErYXc9PSIsInZhbHVlIjoicytTV3pPdFdHN2pqSjRDNzllb25mQT09IiwibWFjIjoiNGM1YTllZTljYzdhZWZkZjRkZmY4YjVhNzNkMDRlZGFhYzg1ZTA3YTc3MzRhZjE1ZGMxZDJjN2U0MWU5NDgwNyJ9', '2018-03-08 00:00:00', '2018-03-08 00:00:00', '1', '1', '0');
INSERT INTO `admin` VALUES ('7', 'weilonger', 'eyJpdiI6ImEzbjRSc1Z4TEhMUlpBVThLbjJHSGc9PSIsInZhbHVlIjoiSjJQbUt6Z1E3QmV3alVqOFpCdmhGNWxlMWlEZVdHKzF6XC9lc0hXbTNudlk9IiwibWFjIjoiMDQ4MGU0OGE4NTVjYmM2OTUwMTVhMzg0YmE4MmIwMGJlZGM1MDU0ZDMxZjk5MGQxZTY5OTE2MzQ2NmU3MzQxZiJ9', '2018-03-08 00:00:00', '2018-03-08 00:00:00', '1', '0', '1');
INSERT INTO `admin` VALUES ('8', 'libai', 'eyJpdiI6Im1KTTNQeXMyQWdcLzgxWkQ0NXgyczNRPT0iLCJ2YWx1ZSI6IjN0aE1saFpuUUQ2NlwvXC8yV1h6NmR1UT09IiwibWFjIjoiMjYwNmQxNjc4NjU2Yjk0ZWEwZjNkNmJkM2MwNGNjNWNiZjgyYTAwNThkN2Y5NDU0OWRiM2JlZDBmMTM2ZTQwNCJ9', '2018-03-08 00:00:00', '2018-03-08 00:00:00', '1', '0', '0');
INSERT INTO `admin` VALUES ('9', 'maomao', 'eyJpdiI6Imt5WTVtcWFOQTBwaGNGTWVlT2NuSWc9PSIsInZhbHVlIjoiYVdhOHozYjlTNFZhdGtYanY3UUlpQT09IiwibWFjIjoiNTM2MDMwOTcyM2VhY2FhOGJjODQwYmU1MjdkNzkyOWUyNGEyZmI3YzViZWQxNjkwNTM3ZThkMmJkZGJkYmUxZCJ9', '2018-03-08 00:00:00', '2018-03-08 00:00:00', '1', '0', '1');
INSERT INTO `admin` VALUES ('11', 'baidu', 'eyJpdiI6Im91TFJ4c3BxZnZ6aHdZOFZUd3B6XC9nPT0iLCJ2YWx1ZSI6IkY3eEFaNFwvTzdpTXlGXC9rTUZJQityQT09IiwibWFjIjoiZGVkNzA0NTg3NWIzYTNiZjg1ODdjOGU5ZjRiYjU5MzM2YWQxYmRmNWQxYmJjNzkxNTQxNjQ0MmQxMTc1MTJhNyJ9', '2018-03-08 06:26:08', '2018-03-08 06:26:08', '1', '0', '1');
INSERT INTO `admin` VALUES ('12', 'test1', 'eyJpdiI6IlJkZW9GTVE0QVllT3VyR2orbnNOY3c9PSIsInZhbHVlIjoiXC8yYzJyaUw3RjQ3eEZVaHJrRFBjK1E9PSIsIm1hYyI6IjVhY2UzYzhlYTdjYWViNWI5YWFjZGJjODc1N2M2ZjEwMjU3ZTM1YjU4ZjZlNzU1YWUyM2UzODM1M2ZmOWE3MjEifQ==', '2018-03-08 06:37:11', '2018-03-29 11:00:58', '2', '1', '1');
INSERT INTO `admin` VALUES ('13', 'test2', 'eyJpdiI6IllBcVViTFJjUzJnWGl1cFVHcnNTcVE9PSIsInZhbHVlIjoiR1hoRDBObWdjM05sZ2RJK3E0YUdIUT09IiwibWFjIjoiOTRjNjRjNTJiNGE1ZmQ5NzczYjhlNzkwZDZiZDI0NDdjZTUwZjFjODhlMDI3YWY5NGYyNjI1MDhiNmRmYzdiNCJ9', '2018-03-08 06:37:24', '2018-03-08 06:37:24', '1', '1', '0');
INSERT INTO `admin` VALUES ('14', 'test3', 'eyJpdiI6IlRTRDl4U01LeHBjMW9IaGhGT29DMGc9PSIsInZhbHVlIjoiV1Y5cEMxN1psYVV2dXBxdzhsRll6Zz09IiwibWFjIjoiZTJhYTg4MmMxNmRhZmUxMWVjMzhkNGZiZGMzMDUyOGI3NzI2YTZhNGUzZjcxNDQ4YTk4YzQ0MTYyNmFmMzRhYSJ9', '2018-03-08 06:37:34', '2018-03-08 06:37:34', '1', '1', '1');
INSERT INTO `admin` VALUES ('16', 'test5', 'eyJpdiI6ImFSczNOVFduVkxvUmR5RU9ZaFBuY3c9PSIsInZhbHVlIjoiVU5QdE5xU0x6TXZEMXh2V3FpR3ZQZz09IiwibWFjIjoiOTg1YjFkYWIyOTE5N2NmOTQ3MjZkYTYzOWVlNmE0ZTJlNzI2OGM1ODc1OWQ2NzNiNTdjMDQ2OWI1MTE1MDhmNyJ9', '2018-03-08 06:38:01', '2018-03-08 06:38:01', '1', '1', '1');
INSERT INTO `admin` VALUES ('17', 'test6', 'eyJpdiI6IlhadG5PQldFbDFFcXNiVHhKYzBNVGc9PSIsInZhbHVlIjoiSktnVXN2NFFQbmJ5RklSQ1ppOUQxdz09IiwibWFjIjoiMmFlMmY4YTUwZDE4MDM1NmMyNDEwZmY5YzhmZjQ2M2NiZDI5M2Q4NzE4OTlmZDM3NDRhN2U5NzM5MWU4MTIzZiJ9', '2018-03-08 08:38:07', '2018-03-08 08:38:07', '1', '0', '0');
INSERT INTO `admin` VALUES ('18', 'test7', 'eyJpdiI6IjV1YVJ4NEVHNGJXTlNCN21FR21OVHc9PSIsInZhbHVlIjoiMjFZOWlicWVRODczWjFxMEN3ZmxMQT09IiwibWFjIjoiYTQ5NjhmZmNhNGNjN2I2MjI5MTM3NzNjY2MyZjVmZWZlOWExMDQwZjIzOWMwNjYxMjM3OTgwNGRjZmY0ZjU2ZiJ9', '2018-03-09 06:09:01', '2018-03-09 06:09:01', '1', '0', '1');
INSERT INTO `admin` VALUES ('19', 'test8', 'eyJpdiI6ImFVZklzOUVQRUVmN0lTVEU1K3FERkE9PSIsInZhbHVlIjoib1loZnhDa1wvVXJqMVBpYnl6SUNaQ0E9PSIsIm1hYyI6ImVlYzY0MWZkNTNlYjllNjA1OGNmNzY2NTM0ZGI2ZTgyNjNjMjI1YWNlZDZhYjRhMDVmNDNlY2EwNmFmNjg3ZDQifQ==', '2018-03-09 06:10:22', '2018-03-09 06:10:22', '1', '0', '1');

-- ----------------------------
-- Table structure for answer
-- ----------------------------
DROP TABLE IF EXISTS `answer`;
CREATE TABLE `answer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '回复对应文件名',
  `sid` int(11) NOT NULL,
  `qid` int(11) NOT NULL COMMENT '对应问题id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of answer
-- ----------------------------

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '评论id',
  `hid` int(11) NOT NULL COMMENT '评论的作业id',
  `toid` int(11) DEFAULT NULL COMMENT '若是回复，则是该对应回复的id',
  `content` varchar(255) NOT NULL COMMENT '回复内容',
  `publishtime` datetime NOT NULL,
  `tid` int(11) DEFAULT NULL COMMENT '教师id',
  `sid` int(11) DEFAULT NULL COMMENT '学生id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of comment
-- ----------------------------

-- ----------------------------
-- Table structure for course
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '课程id',
  `name` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL COMMENT '课程简介',
  `typeid` int(11) NOT NULL,
  `isable` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1已激活0未激活',
  `isselect` enum('0','2','1') NOT NULL DEFAULT '0' COMMENT '0不能选课，1可以选课，2选课完毕',
  `type` enum('1','0') NOT NULL DEFAULT '0' COMMENT '0专业选修课1通选课',
  `starttime` date NOT NULL COMMENT '课程开设时间',
  `endtime` date NOT NULL COMMENT '课程关闭时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', '数据结构', '方灿', '5', '1', '1', '0', '2018-03-22', '2018-06-14');
INSERT INTO `course` VALUES ('2', '计算机网络', '区灵', '5', '1', '0', '0', '2018-03-01', '2018-06-23');
INSERT INTO `course` VALUES ('3', '算法', '王茂忠', '6', '1', '1', '0', '2018-03-01', '2018-06-21');
INSERT INTO `course` VALUES ('4', 'flash动画', '陈思琪', '5', '0', '2', '0', '2018-03-01', '2018-06-21');
INSERT INTO `course` VALUES ('5', '网页平面设计', '王五', '5', '1', '0', '0', '2018-03-01', '2018-06-15');
INSERT INTO `course` VALUES ('6', '数据挖掘', '张三', '5', '0', '0', '0', '2018-03-22', '2018-03-17');
INSERT INTO `course` VALUES ('7', 'linux', '王英', '6', '1', '1', '0', '2018-03-22', '2018-06-06');

-- ----------------------------
-- Table structure for judge
-- ----------------------------
DROP TABLE IF EXISTS `judge`;
CREATE TABLE `judge` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '评定id',
  `sid` int(11) NOT NULL COMMENT '学生id',
  `tid` int(11) NOT NULL COMMENT '教师id',
  `cid` int(11) NOT NULL COMMENT '课程id',
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of judge
-- ----------------------------

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for question
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '问题id',
  `name` varchar(255) NOT NULL COMMENT '对应文件名',
  `info` varchar(255) NOT NULL COMMENT '问题描述',
  `extra` varchar(255) DEFAULT NULL COMMENT '问题补充',
  `tid` int(11) NOT NULL COMMENT '发布老师id',
  `cid` int(11) NOT NULL COMMENT '对应班级id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of question
-- ----------------------------

-- ----------------------------
-- Table structure for review
-- ----------------------------
DROP TABLE IF EXISTS `review`;
CREATE TABLE `review` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '反馈id',
  `title` varchar(255) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `publishtime` date NOT NULL COMMENT '评论日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of review
-- ----------------------------

-- ----------------------------
-- Table structure for slider
-- ----------------------------
DROP TABLE IF EXISTS `slider`;
CREATE TABLE `slider` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `img` varchar(255) NOT NULL,
  `orders` tinyint(4) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '1上架0下架',
  `title` varchar(255) NOT NULL,
  `href` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of slider
-- ----------------------------
INSERT INTO `slider` VALUES ('11', '152153792912399.jpg', '12', '1', '风景', '111');
INSERT INTO `slider` VALUES ('12', '15215380858572.jpg', '10', '1', '风景1', '222');
INSERT INTO `slider` VALUES ('13', '152153811628348.jpg', '13', '1', '风景2', '333');
INSERT INTO `slider` VALUES ('14', '15215381376554.jpg', '25', '1', '风景3', '444');
INSERT INTO `slider` VALUES ('15', '15215381347749.jpg', '18', '1', '风景4', '555');
INSERT INTO `slider` VALUES ('16', '15220445178096.jpg', '12', '1', '北京', 'sa');

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '学生编号',
  `username` varchar(255) NOT NULL COMMENT '学生姓名',
  `password` varchar(255) NOT NULL COMMENT '学生密码',
  `phone` varchar(255) NOT NULL,
  `gender` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0女生1男生',
  `typeid` int(11) NOT NULL COMMENT '所属学院id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('3', 'student1', 'eyJpdiI6IkZFUFRheHVmVGMrRzB0d1BOK1dcL2F3PT0iLCJ2YWx1ZSI6ImxhQk1PXC9HK3ZJbDk5MU1XNXlcL3d0Zz09IiwibWFjIjoiNjNmYjBmZmMxYjAxODczYThiMDBhNDMxNzExZTY2YWFkNjc4ODE1MzdmMWM5YmIwMTI1NGZmNDlmMTAwZWM4MiJ9', '13368090853', '1', '11');

-- ----------------------------
-- Table structure for student_info
-- ----------------------------
DROP TABLE IF EXISTS `student_info`;
CREATE TABLE `student_info` (
  `id` int(11) NOT NULL COMMENT '学生编号',
  `name` varchar(255) NOT NULL COMMENT '学生姓名',
  `number` varchar(255) NOT NULL COMMENT '学号',
  `email` varchar(255) DEFAULT NULL COMMENT '学生邮箱',
  `cid` varchar(255) DEFAULT NULL COMMENT '学生所属班级',
  `starttime` date NOT NULL COMMENT '入学时间',
  `endtime` date DEFAULT NULL COMMENT '毕业时间',
  `lastlogin` datetime DEFAULT NULL COMMENT '最近登录时间',
  `state` enum('1','0') DEFAULT '1' COMMENT '0注销学生，1正常学生',
  `photo` varchar(255) DEFAULT 'male.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of student_info
-- ----------------------------
INSERT INTO `student_info` VALUES ('3', '学生1', '1120180003', null, null, '2018-03-28', null, '2018-03-29 07:33:57', '1', 'male.jpg');

-- ----------------------------
-- Table structure for student_relation
-- ----------------------------
DROP TABLE IF EXISTS `student_relation`;
CREATE TABLE `student_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` int(11) NOT NULL COMMENT '学生学号',
  `courseid` int(11) NOT NULL COMMENT '课程编号',
  `classid` int(11) NOT NULL COMMENT '班级编号',
  PRIMARY KEY (`id`),
  KEY `courseid1` (`courseid`),
  KEY `classid1` (`classid`),
  CONSTRAINT `classid1` FOREIGN KEY (`classid`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `courseid1` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of student_relation
-- ----------------------------

-- ----------------------------
-- Table structure for teacher
-- ----------------------------
DROP TABLE IF EXISTS `teacher`;
CREATE TABLE `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gender` enum('0','1') NOT NULL DEFAULT '1' COMMENT '0女生1男生',
  `typeid` int(11) NOT NULL COMMENT '教师所属机构id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES ('1', 'teacher1', 'eyJpdiI6InRYRTVsbklzRWd4bjJETGI2MDJEM1E9PSIsInZhbHVlIjoiVjR0OE5iUDJOd0VjbEw2dnNqXC9WeWc9PSIsIm1hYyI6IjU4OGNkNDY3OWE5NDJjMjU2ZmZmYjM5OTVmNDUzYTgyYWY0NGRkODQ1OWMyNThmM2ViMDk5YTg4NzkyOTg0MmYifQ==', '13835841676', '1', '5');

-- ----------------------------
-- Table structure for teacher_info
-- ----------------------------
DROP TABLE IF EXISTS `teacher_info`;
CREATE TABLE `teacher_info` (
  `id` int(11) NOT NULL COMMENT '教师id',
  `name` varchar(255) NOT NULL COMMENT '教师姓名',
  `number` varchar(255) NOT NULL COMMENT '教师编号',
  `email` varchar(255) DEFAULT NULL COMMENT '教师邮箱',
  `cid` varchar(255) DEFAULT NULL COMMENT '教师所带班级(可能为数组）',
  `starttime` date NOT NULL COMMENT '入职时间',
  `endtime` date DEFAULT NULL COMMENT '离职时间',
  `lastlogin` datetime DEFAULT NULL COMMENT '最近登录时间',
  `state` enum('1','0') DEFAULT '1' COMMENT '0离职老师，1正常老师',
  `photo` varchar(255) DEFAULT 'mail.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of teacher_info
-- ----------------------------
INSERT INTO `teacher_info` VALUES ('1', '老师1', '0020180001', null, null, '2018-03-28', null, '2018-03-28 00:00:00', '1', 'male.jpg');

-- ----------------------------
-- Table structure for teahcer_relation
-- ----------------------------
DROP TABLE IF EXISTS `teahcer_relation`;
CREATE TABLE `teahcer_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacherid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `courseid` (`courseid`),
  KEY `classid` (`classid`),
  CONSTRAINT `classid` FOREIGN KEY (`classid`) REFERENCES `type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `courseid` FOREIGN KEY (`courseid`) REFERENCES `course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of teahcer_relation
-- ----------------------------

-- ----------------------------
-- Table structure for type
-- ----------------------------
DROP TABLE IF EXISTS `type`;
CREATE TABLE `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `path` varchar(255) NOT NULL,
  `sort` int(11) NOT NULL,
  `isLou` int(11) NOT NULL,
  `kind` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `createtime` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of type
-- ----------------------------
INSERT INTO `type` VALUES ('1', '西南大学', '0', '0-', '10000', '0', '0', '西南大学', '2018-03-10');
INSERT INTO `type` VALUES ('2', '计算机科学与技术学院、软件学院', '1', '0-1-', '100', '1', '1', '计信院', '2018-03-01');
INSERT INTO `type` VALUES ('3', '物理学院', '1', '0-1-', '50', '1', '1', '物院', '2018-03-02');
INSERT INTO `type` VALUES ('5', '计算机科学与技术', '2', '0-1-2-', '20', '1', '2', '计科', '2018-03-07');
INSERT INTO `type` VALUES ('6', '软件工程', '2', '0-1-2-', '22', '1', '2', '软工', '2018-03-08');
INSERT INTO `type` VALUES ('7', '网络工程', '2', '0-1-2-', '21', '0', '2', '网工', '2018-03-08');
INSERT INTO `type` VALUES ('8', '清华大学', '0', '0-', '10001', '0', '0', '清华', '2014-01-07');
INSERT INTO `type` VALUES ('9', '电子商务', '2', '0-1-2-', '23', '0', '2', '电商', '2018-03-16');
INSERT INTO `type` VALUES ('11', '计科一班', '5', '0-1-2-5-', '25', '0', '3', '1班', '2018-03-08');
INSERT INTO `type` VALUES ('12', '物理学', '3', '0-1-3-', '25', '0', '2', '物理', '2018-03-15');
INSERT INTO `type` VALUES ('15', '计科二班', '5', '0-1-2-5-', '25', '0', '3', '2班', '2018-03-08');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------

-- ----------------------------
-- Table structure for verifycode
-- ----------------------------
DROP TABLE IF EXISTS `verifycode`;
CREATE TABLE `verifycode` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '验证码id',
  `code` varchar(255) NOT NULL,
  `publishtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of verifycode
-- ----------------------------
