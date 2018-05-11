/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : homework

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-05-11 11:50:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
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
INSERT INTO `admin` VALUES ('12', 'test1', 'eyJpdiI6IlJkZW9GTVE0QVllT3VyR2orbnNOY3c9PSIsInZhbHVlIjoiXC8yYzJyaUw3RjQ3eEZVaHJrRFBjK1E9PSIsIm1hYyI6IjVhY2UzYzhlYTdjYWViNWI5YWFjZGJjODc1N2M2ZjEwMjU3ZTM1YjU4ZjZlNzU1YWUyM2UzODM1M2ZmOWE3MjEifQ==', '2018-03-08 06:37:11', '2018-05-10 16:25:52', '2', '1', '1');
INSERT INTO `admin` VALUES ('13', 'test2', 'eyJpdiI6IllBcVViTFJjUzJnWGl1cFVHcnNTcVE9PSIsInZhbHVlIjoiR1hoRDBObWdjM05sZ2RJK3E0YUdIUT09IiwibWFjIjoiOTRjNjRjNTJiNGE1ZmQ5NzczYjhlNzkwZDZiZDI0NDdjZTUwZjFjODhlMDI3YWY5NGYyNjI1MDhiNmRmYzdiNCJ9', '2018-03-08 06:37:24', '2018-03-08 06:37:24', '1', '1', '0');
INSERT INTO `admin` VALUES ('14', 'test3', 'eyJpdiI6IlRTRDl4U01LeHBjMW9IaGhGT29DMGc9PSIsInZhbHVlIjoiV1Y5cEMxN1psYVV2dXBxdzhsRll6Zz09IiwibWFjIjoiZTJhYTg4MmMxNmRhZmUxMWVjMzhkNGZiZGMzMDUyOGI3NzI2YTZhNGUzZjcxNDQ4YTk4YzQ0MTYyNmFmMzRhYSJ9', '2018-03-08 06:37:34', '2018-03-08 06:37:34', '1', '1', '1');
INSERT INTO `admin` VALUES ('16', 'test5', 'eyJpdiI6ImFSczNOVFduVkxvUmR5RU9ZaFBuY3c9PSIsInZhbHVlIjoiVU5QdE5xU0x6TXZEMXh2V3FpR3ZQZz09IiwibWFjIjoiOTg1YjFkYWIyOTE5N2NmOTQ3MjZkYTYzOWVlNmE0ZTJlNzI2OGM1ODc1OWQ2NzNiNTdjMDQ2OWI1MTE1MDhmNyJ9', '2018-03-08 06:38:01', '2018-03-08 06:38:01', '1', '1', '1');
INSERT INTO `admin` VALUES ('17', 'test6', 'eyJpdiI6IlhadG5PQldFbDFFcXNiVHhKYzBNVGc9PSIsInZhbHVlIjoiSktnVXN2NFFQbmJ5RklSQ1ppOUQxdz09IiwibWFjIjoiMmFlMmY4YTUwZDE4MDM1NmMyNDEwZmY5YzhmZjQ2M2NiZDI5M2Q4NzE4OTlmZDM3NDRhN2U5NzM5MWU4MTIzZiJ9', '2018-03-08 08:38:07', '2018-03-08 08:38:07', '1', '0', '0');
INSERT INTO `admin` VALUES ('18', 'test7', 'eyJpdiI6IjV1YVJ4NEVHNGJXTlNCN21FR21OVHc9PSIsInZhbHVlIjoiMjFZOWlicWVRODczWjFxMEN3ZmxMQT09IiwibWFjIjoiYTQ5NjhmZmNhNGNjN2I2MjI5MTM3NzNjY2MyZjVmZWZlOWExMDQwZjIzOWMwNjYxMjM3OTgwNGRjZmY0ZjU2ZiJ9', '2018-03-09 06:09:01', '2018-03-09 06:09:01', '1', '0', '1');
INSERT INTO `admin` VALUES ('19', 'test8', 'eyJpdiI6ImFVZklzOUVQRUVmN0lTVEU1K3FERkE9PSIsInZhbHVlIjoib1loZnhDa1wvVXJqMVBpYnl6SUNaQ0E9PSIsIm1hYyI6ImVlYzY0MWZkNTNlYjllNjA1OGNmNzY2NTM0ZGI2ZTgyNjNjMjI1YWNlZDZhYjRhMDVmNDNlY2EwNmFmNjg3ZDQifQ==', '2018-03-09 06:10:22', '2018-03-09 06:10:22', '1', '0', '1');

-- ----------------------------
-- Table structure for `answer`
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
-- Table structure for `comment`
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
-- Table structure for `course`
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '课程id',
  `name` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL COMMENT '课程简介',
  `typeid` int(11) NOT NULL,
  `isselect` enum('0','2','1') NOT NULL DEFAULT '0' COMMENT '0不能选课，1可以选课，2选课完毕',
  `isable` enum('0','1') NOT NULL DEFAULT '0' COMMENT '1已激活0未激活',
  `type` enum('1','0') NOT NULL DEFAULT '0' COMMENT '0通选课1专业选修课',
  `starttime` date NOT NULL COMMENT '课程开设时间',
  `endtime` date NOT NULL COMMENT '课程关闭时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES ('1', '数据结构', '方灿', '5', '0', '1', '0', '2018-03-22', '2018-06-14');
INSERT INTO `course` VALUES ('2', '计算机网络', '区灵', '5', '0', '1', '0', '2018-03-01', '2018-06-23');
INSERT INTO `course` VALUES ('3', '算法', '王茂忠', '6', '0', '1', '0', '2018-03-01', '2018-06-21');
INSERT INTO `course` VALUES ('4', 'flash动画', '陈思琪', '5', '0', '0', '0', '2018-03-01', '2018-06-21');
INSERT INTO `course` VALUES ('5', '网页平面设计', '王五', '5', '0', '1', '0', '2018-03-01', '2018-06-15');
INSERT INTO `course` VALUES ('6', '数据挖掘', '张三', '5', '0', '0', '0', '2018-03-22', '2018-03-17');
INSERT INTO `course` VALUES ('7', 'linux', '王英', '6', '0', '1', '0', '2018-03-22', '2018-06-06');
INSERT INTO `course` VALUES ('8', '激光原理', '刘江', '22', '1', '1', '1', '2018-04-07', '2018-07-01');
INSERT INTO `course` VALUES ('9', '操作系统原理', '1-18周（8-10节）、北区 25教', '5', '0', '1', '0', '2018-03-01', '2018-06-30');
INSERT INTO `course` VALUES ('10', '网站制作', '专业选修课', '23', '1', '1', '1', '2018-05-01', '2018-05-04');
INSERT INTO `course` VALUES ('11', '计算机导论', '专业选修课', '34', '1', '1', '1', '2018-05-11', '2018-07-12');

-- ----------------------------
-- Table structure for `judge`
-- ----------------------------
DROP TABLE IF EXISTS `judge`;
CREATE TABLE `judge` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '评定id',
  `sid` int(11) NOT NULL COMMENT '学生id',
  `tid` int(11) NOT NULL COMMENT '教师id',
  `qid` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of judge
-- ----------------------------

-- ----------------------------
-- Table structure for `question`
-- ----------------------------
DROP TABLE IF EXISTS `question`;
CREATE TABLE `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '问题id',
  `name` varchar(255) NOT NULL COMMENT '对应文件名',
  `info` varchar(255) NOT NULL COMMENT '问题描述',
  `extras` varchar(255) DEFAULT NULL COMMENT '问题补充',
  `teacherid` int(11) NOT NULL COMMENT '发布老师id',
  `classid` int(11) NOT NULL COMMENT '对应班级id',
  `courseid` int(11) NOT NULL,
  `createtime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of question
-- ----------------------------
INSERT INTO `question` VALUES ('1', '第一次作业', '完成环境安装', '152544130723463.txt', '1', '11', '1', '2018-05-04 13:41:48');
INSERT INTO `question` VALUES ('2', '第二次作业', '完成实验二', '152578697628681.txt', '1', '11', '1', '2018-05-08 13:42:58');

-- ----------------------------
-- Table structure for `relation`
-- ----------------------------
DROP TABLE IF EXISTS `relation`;
CREATE TABLE `relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classid` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `courseid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of relation
-- ----------------------------
INSERT INTO `relation` VALUES ('1', '11', '1', '1');
INSERT INTO `relation` VALUES ('2', '22', '6', '8');
INSERT INTO `relation` VALUES ('3', '11', '1', '2');
INSERT INTO `relation` VALUES ('4', '11', '2', '5');
INSERT INTO `relation` VALUES ('5', '11', '2', '9');
INSERT INTO `relation` VALUES ('6', '15', '2', '9');
INSERT INTO `relation` VALUES ('7', '16', '1', '9');
INSERT INTO `relation` VALUES ('8', '23', '1', '10');
INSERT INTO `relation` VALUES ('19', '34', '7', '11');

-- ----------------------------
-- Table structure for `review`
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
-- Table structure for `slider`
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
INSERT INTO `slider` VALUES ('13', '152153811628348.jpg', '13', '1', '风景2', '333');
INSERT INTO `slider` VALUES ('14', '15215381376554.jpg', '25', '1', '风景3', '444');
INSERT INTO `slider` VALUES ('15', '15215381347749.jpg', '18', '1', '风景4', '555');
INSERT INTO `slider` VALUES ('16', '15220445178096.jpg', '12', '1', '北京', 'sa');

-- ----------------------------
-- Table structure for `student`
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES ('3', 'student1', 'eyJpdiI6IkZFUFRheHVmVGMrRzB0d1BOK1dcL2F3PT0iLCJ2YWx1ZSI6ImxhQk1PXC9HK3ZJbDk5MU1XNXlcL3d0Zz09IiwibWFjIjoiNjNmYjBmZmMxYjAxODczYThiMDBhNDMxNzExZTY2YWFkNjc4ODE1MzdmMWM5YmIwMTI1NGZmNDlmMTAwZWM4MiJ9', '13368090853', '1', '11');
INSERT INTO `student` VALUES ('4', '学生2', 'eyJpdiI6InB5REEyNFVaS2d6T015TUg5cktkSEE9PSIsInZhbHVlIjoiemI4XC9YTmtkXC8wVER0SXQ2Wm9ySm93PT0iLCJtYWMiOiIyNDY1NzczNTdlYmFmZjlmMzgzZDFjMDE3NTRkNDA2OGQ4MGY4MTE4MmIzZjU2ODQ2MDJmZThhNDZkYWMwNzI1In0=', '15263242558', '1', '11');
INSERT INTO `student` VALUES ('5', '学生3', 'eyJpdiI6Ik91UHBydmlCRGpVV2RzM09LZkZjWUE9PSIsInZhbHVlIjoiWWk1Qlh2bm1yYjgrMGs5WHoxaEpMZz09IiwibWFjIjoiZjE4NTE3Zjg4MDA0MTRiNTQ5ZmU0ZGNhYjBlZGI5NGM3M2U3YmIzY2Q5OGE2NGUxNTRlMjNhMWViYTNlMjc1MiJ9', '15432685845', '1', '11');

-- ----------------------------
-- Table structure for `student_info`
-- ----------------------------
DROP TABLE IF EXISTS `student_info`;
CREATE TABLE `student_info` (
  `id` int(11) NOT NULL COMMENT '学生编号',
  `name` varchar(255) NOT NULL COMMENT '学生姓名',
  `number` varchar(255) NOT NULL COMMENT '学号',
  `email` varchar(255) DEFAULT NULL COMMENT '学生邮箱',
  `cid` int(11) DEFAULT NULL COMMENT '学生所属班级',
  `starttime` date NOT NULL COMMENT '入学时间',
  `endtime` date DEFAULT NULL COMMENT '毕业时间',
  `lastlogin` datetime NOT NULL DEFAULT '1970-01-01 00:00:00' COMMENT '最近登录时间',
  `state` enum('1','0') DEFAULT '1' COMMENT '0注销学生，1正常学生',
  `photo` varchar(255) NOT NULL DEFAULT 'male.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of student_info
-- ----------------------------
INSERT INTO `student_info` VALUES ('3', '学生1', '1120180003', 'xs1@163.com', null, '2018-03-28', null, '2018-05-11 01:23:40', '1', 'male.jpg');
INSERT INTO `student_info` VALUES ('4', '王鹏飞', '1120180004', 'pengfei@163.com', null, '2018-04-07', null, '1970-01-01 00:00:00', '1', 'male.jpg');
INSERT INTO `student_info` VALUES ('5', '陈思蒙', '1120180005', 'simeng@163.com', null, '2018-04-07', null, '1970-01-01 00:00:00', '1', 'male.jpg');

-- ----------------------------
-- Table structure for `student_relation`
-- ----------------------------
DROP TABLE IF EXISTS `student_relation`;
CREATE TABLE `student_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studentid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `state` enum('2','1','0') DEFAULT '2' COMMENT '2确认选课 1单项选课 0未选课',
  PRIMARY KEY (`id`),
  KEY `classid` (`classid`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of student_relation
-- ----------------------------
INSERT INTO `student_relation` VALUES ('1', '4', '11', '2');
INSERT INTO `student_relation` VALUES ('2', '5', '11', '2');
INSERT INTO `student_relation` VALUES ('6', '3', '11', '2');
INSERT INTO `student_relation` VALUES ('4', '3', '22', '2');
INSERT INTO `student_relation` VALUES ('5', '3', '23', '1');

-- ----------------------------
-- Table structure for `teacher`
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of teacher
-- ----------------------------
INSERT INTO `teacher` VALUES ('1', 'teacher1', 'eyJpdiI6InRYRTVsbklzRWd4bjJETGI2MDJEM1E9PSIsInZhbHVlIjoiVjR0OE5iUDJOd0VjbEw2dnNqXC9WeWc9PSIsIm1hYyI6IjU4OGNkNDY3OWE5NDJjMjU2ZmZmYjM5OTVmNDUzYTgyYWY0NGRkODQ1OWMyNThmM2ViMDk5YTg4NzkyOTg0MmYifQ==', '13835841676', '1', '5');
INSERT INTO `teacher` VALUES ('2', '教师2', 'eyJpdiI6ImdtaXZqOFQ3TzJ5Z3RJZnIxWjJZdHc9PSIsInZhbHVlIjoiY1pPZWMwblQySE1JTXNPY2lDckVwZz09IiwibWFjIjoiOTk3NjMwMmI4MzUwZDNlNjNlYTRlMzI3MGE1NTkzYjYzZDJjMzgwMDJiYWUwNTFlZjEyNTk0ZWY2MjI3NTM0NCJ9', '13585664442', '1', '5');
INSERT INTO `teacher` VALUES ('5', '教师3', 'eyJpdiI6IlwvbGJYcUp5cVBvb0tMVFN1dDFyYjF3PT0iLCJ2YWx1ZSI6IlJcL1wvSGZneEo5ODNkc0l3K0o4UVJMZz09IiwibWFjIjoiMzJhNjUzNGViZmFmNTBhMTdiNjUxOTk0ODkwMGE3ZjhlMGY5MjA4ZWRlMDZlMWUyOWQ1NWQyYmFmMGViMWU0MSJ9', '15236542698', '1', '11');
INSERT INTO `teacher` VALUES ('6', '教师4', 'eyJpdiI6IjNqY3JMc0t5YUl4N00relkwa0RYUkE9PSIsInZhbHVlIjoiMTNZTjl5VEFPTnhRdjhmRGMzNFpDQT09IiwibWFjIjoiNjk4MDg1OTlhNDQ3MDFlMTQ2YzdlYTAxNGZjMWJmY2Y0OWI0YjA4NGY2M2JhNGZkMWE5NGE0ODkzMjRhZDYwNyJ9', '13368090823', '1', '3');
INSERT INTO `teacher` VALUES ('7', 'teacher5', 'eyJpdiI6IlM2eWdZeXVGeUNOZ2NRRVpTZWtNZkE9PSIsInZhbHVlIjoiNlwvSTRnSmZ3SHpjZ1wvakhmZHdpRlhRPT0iLCJtYWMiOiJjNDI5MGE4NWI2NmMwYWNmYzBlZWViZjg2N2Q3NDQwMDk4YmNiNzYxNGZhOTc2YWNjOWYwYmYxMmFmYmE5Y2VkIn0=', '15535826879', '1', '2');

-- ----------------------------
-- Table structure for `teacher_info`
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
  `lastlogin` datetime DEFAULT '1970-01-01 00:00:00' COMMENT '最近登录时间',
  `state` enum('1','0') DEFAULT '1' COMMENT '0离职老师，1正常老师',
  `photo` varchar(255) DEFAULT 'mail.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of teacher_info
-- ----------------------------
INSERT INTO `teacher_info` VALUES ('1', '老师1', '0020180001', 'ls1@163.com', null, '2018-03-28', null, '2018-05-09 15:35:35', '1', 'male.jpg');
INSERT INTO `teacher_info` VALUES ('2', '刘江', '0020180002', 'liujiang@163.com', null, '2018-04-07', null, '2018-04-15 06:03:06', '1', 'mail.jpg');
INSERT INTO `teacher_info` VALUES ('5', '张义林', '0020180005', 'yilin@163.com', null, '2018-04-07', null, '1970-01-01 00:00:00', '1', 'mail.jpg');
INSERT INTO `teacher_info` VALUES ('6', '陈思定', '0020180006', 'siding@163.com', null, '2018-04-10', null, '1970-01-01 00:00:00', '1', 'mail.jpg');
INSERT INTO `teacher_info` VALUES ('7', '教师5', '0020180007', 'teacher5@163.com', null, '2018-05-10', null, '1970-01-01 00:00:00', '1', 'mail.jpg');

-- ----------------------------
-- Table structure for `teacher_relation`
-- ----------------------------
DROP TABLE IF EXISTS `teacher_relation`;
CREATE TABLE `teacher_relation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacherid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `classid` (`classid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teacher_relation
-- ----------------------------
INSERT INTO `teacher_relation` VALUES ('1', '2', '5');
INSERT INTO `teacher_relation` VALUES ('2', '5', '11');
INSERT INTO `teacher_relation` VALUES ('3', '6', '3');
INSERT INTO `teacher_relation` VALUES ('4', '1', '5');
INSERT INTO `teacher_relation` VALUES ('5', '7', '2');

-- ----------------------------
-- Table structure for `type`
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
  `description` varchar(255) NOT NULL,
  `createtime` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4;

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
INSERT INTO `type` VALUES ('16', '计科三班', '5', '0-1-2-5-', '20', '1', '3', '三班', '2018-04-10');
INSERT INTO `type` VALUES ('17', '软工一班', '6', '0-1-2-6-', '22', '1', '3', '软一', '2018-04-10');
INSERT INTO `type` VALUES ('18', '软工二班', '6', '0-1-2-6-', '23', '1', '3', '软二', '2018-04-10');
INSERT INTO `type` VALUES ('19', '网工班', '7', '0-1-2-7-', '24', '1', '3', '网络功程', '2018-04-10');
INSERT INTO `type` VALUES ('20', '电商班', '9', '0-1-2-9-', '25', '1', '3', '电子商务', '2018-04-10');
INSERT INTO `type` VALUES ('21', '牛顿班', '12', '0-1-3-12-', '26', '1', '3', '物理班', '2018-04-10');
INSERT INTO `type` VALUES ('22', '光学班', '1', '0-1-', '27', '1', '3', '主要讲激光原理', '2018-04-10');
INSERT INTO `type` VALUES ('23', '网站一班', '1', '0-1-', '40', '1', '3', '专业班级', '2018-05-11');
INSERT INTO `type` VALUES ('34', '导论一班', '1', '0-1-', '22', '1', '3', '无', '2018-05-10');

-- ----------------------------
-- Table structure for `verifycode`
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

-- ----------------------------
-- Table structure for `work`
-- ----------------------------
DROP TABLE IF EXISTS `work`;
CREATE TABLE `work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questionid` int(11) NOT NULL COMMENT '问题id',
  `teacherid` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '文件名',
  `committime` date NOT NULL COMMENT '提交时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of work
-- ----------------------------
INSERT INTO `work` VALUES ('1', '1', '1', '3', '第一次作业', '2018-05-11');
