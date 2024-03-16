/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 80036 (8.0.36)
 Source Host           : localhost:3306
 Source Schema         : web

 Target Server Type    : MySQL
 Target Server Version : 80036 (8.0.36)
 File Encoding         : 65001

 Date: 16/03/2024 15:16:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for contents
-- ----------------------------
DROP TABLE IF EXISTS `contents`;
CREATE TABLE `contents`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` json NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `statusenable` tinyint(1) NULL DEFAULT 1,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `order` int NULL DEFAULT NULL,
  `image` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contents
-- ----------------------------
INSERT INTO `contents` VALUES ('9b8e1265-cd8d-4035-aac1-b8381a8f193c', 'Prewedding', '\"Prewedding\"', 'category-image', 1, NULL, NULL, 'preweddding.png', '2024-03-13 22:49:23', '2024-03-13 22:49:23');
INSERT INTO `contents` VALUES ('9b900383-485f-49e9-9837-c2d613983769', 'Wedding', '\"Wedding\"', 'category-image', 1, NULL, NULL, 'wedding.webp', '2024-03-14 21:59:25', '2024-03-14 21:59:25');
INSERT INTO `contents` VALUES ('9b900383-c0a3-4cd0-b5ab-c4c385149666', 'Prewedding', '\"Prewedding\"', 'category-image', 0, NULL, NULL, 'preweddding.png', '2024-03-14 21:59:25', '2024-03-14 21:59:25');
INSERT INTO `contents` VALUES ('9b900383-c203-46e6-b482-147aee5b98f7', 'Engagement', '\"Engagement\"', 'category-image', 1, NULL, NULL, '600x400.png', '2024-03-14 21:59:25', '2024-03-14 21:59:25');
INSERT INTO `contents` VALUES ('9b900383-c321-4c09-a05b-560bfa10156b', 'Pengajian', '\"Pengajian\"', 'category-image', 1, NULL, NULL, '600x400.png', '2024-03-14 21:59:25', '2024-03-14 21:59:25');

-- ----------------------------
-- Table structure for data_fixes
-- ----------------------------
DROP TABLE IF EXISTS `data_fixes`;
CREATE TABLE `data_fixes`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `noted` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `statusenable` tinyint(1) NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data_fixes
-- ----------------------------
INSERT INTO `data_fixes` VALUES ('09ee0105-29bb-4910-abb6-f378b099fd0f', 'Booking ', 'booking-category', 'Kategory booking dan reservation', 1, '2024-03-11 19:13:27', '2024-03-11 19:13:29');
INSERT INTO `data_fixes` VALUES ('4fd557e4-21a3-482d-8c50-b24c74d4087d', 'image', 'image', 'image category', 1, '2024-03-13 22:37:09', '2024-03-13 22:37:15');
INSERT INTO `data_fixes` VALUES ('bca8104b-4990-4637-a205-f385020f693d', '[\r\n  {\r\n    \"label\": \"Image\",\r\n    \"value\": \"Image\"\r\n  },\r\n  {\r\n    \"label\": \"Video\",\r\n    \"value\": \"Video\"\r\n  },\r\n  {\r\n    \"label\": \"Embed Youtube\",\r\n    \"value\": \"Embed Youtube\"\r\n  }\r\n]\r\n', 'type-image', 'type image gallery', 1, '2024-03-14 22:09:29', '2024-03-14 22:09:32');

-- ----------------------------
-- Table structure for images
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `parent_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusenable` tinyint(1) NULL DEFAULT 1,
  `category` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of images
-- ----------------------------
INSERT INTO `images` VALUES ('9b936a2b-a432-4f25-af68-b129f3081a5d', NULL, '9b936a2b-a0e4-428e-a375-4f49f7f6896e', NULL, 'prewedding-diva-amanda-bW.png', 'Image', 0, 'Prewedding', '2024-03-16 14:33:57', '2024-03-16 14:44:32');
INSERT INTO `images` VALUES ('9b936e24-7788-480e-924b-21c9232b61e3', 'Prewedding Dimas', NULL, 'prewedding-dimas', 'thumbnail-prewedding-dimas.png', 'Image', 1, 'Prewedding', '2024-03-16 14:45:03', '2024-03-16 14:45:03');
INSERT INTO `images` VALUES ('9b936e24-7bcd-4204-8975-8e653352559d', NULL, '9b936e24-7788-480e-924b-21c9232b61e3', NULL, 'prewedding-dimas-dc.png', 'Image', 0, 'Prewedding', '2024-03-16 14:45:03', '2024-03-16 14:46:10');
INSERT INTO `images` VALUES ('9b936ea0-f487-4814-b1e6-f6e2cd2eec22', NULL, '9b936e24-7788-480e-924b-21c9232b61e3', NULL, 'prewedding-dimas-Cu.png', 'Image', 1, 'Prewedding', '2024-03-16 14:46:25', '2024-03-16 14:46:25');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (6, '2024_03_10_144217_create_profiles_table', 3);
INSERT INTO `migrations` VALUES (8, '2024_03_11_120619_create_data_fixes_table', 4);
INSERT INTO `migrations` VALUES (11, '2024_03_10_143614_create_contents_table', 7);
INSERT INTO `migrations` VALUES (16, '2024_03_13_221245_create_images_table', 8);

-- ----------------------------
-- Table structure for profile
-- ----------------------------
DROP TABLE IF EXISTS `profile`;
CREATE TABLE `profile`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `statusenable` tinyint(1) NULL DEFAULT 1,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `email1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `whatsapp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `youtube` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tiktok` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `file1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `file2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `file3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `partner1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `partner2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `partner3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of profile
-- ----------------------------
INSERT INTO `profile` VALUES ('c7106906-80f9-4a42-b1df-dad5105c75eb', 'PT Hieros Photography Indonesia', 'Herios Photograpy', 1, 'Wedding Photographers Based In Bandung, Komplek Mulya Golf Residence A7- Pakemitan, Cinambo, Bandung.', ' Hello@Hierosphoto.Com', NULL, '08565-900-4317', '08565-900-4317', 'https://www.youtube.com/', 'https://www.youtube.com/', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://drive.google.com/file/d/1jUHM7uUvs3pbip3NBssamvCIxaSSGXHy/view', NULL, NULL, 'logo.png', 'partners.png', NULL, NULL, '2024-03-10 22:14:25', '2024-03-10 22:14:28');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `account_type` enum('0','1') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `statusenambled` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('9b86226c-75a5-483e-b74e-7bc0ddb39f84', 'winarno12', 'winarno@gmail.com', '$2y$10$guBsAXf80hIHs.KnOV0imegqAVnBTs93MfeEJwFFERHcMBT1bA8r.', '6281477084168', 'avatar.png', 'Hi I\'m Jansh,has been the industry\'s standard dummy text To an English person alteration text....', '0', 1, NULL, '2024-03-09 17:07:34', '2024-03-10 06:50:51');
INSERT INTO `users` VALUES ('9b8753c7-b07d-470e-9cbd-2854c35e9873', 'hello', 'hello@hierosphoto.com', '$2y$10$s6obiQoeYjzNR47V8vKZzu31Pv1g/r5JXQE0MzfJ7sx.S4u6H5m4m', '6285659004317', NULL, NULL, '1', 1, NULL, '2024-03-10 07:21:24', '2024-03-10 07:21:24');

SET FOREIGN_KEY_CHECKS = 1;
