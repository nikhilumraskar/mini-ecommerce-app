/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 100130
Source Host           : localhost:3306
Source Database       : minkpay_db

Target Server Type    : MYSQL
Target Server Version : 100130
File Encoding         : 65001

Date: 2018-03-29 10:31:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of cart
-- ----------------------------
INSERT INTO `cart` VALUES ('1', '4', '1', '6', '1');
INSERT INTO `cart` VALUES ('2', '4', '2', '7', '1');
INSERT INTO `cart` VALUES ('3', '0', '2', '1', '0');
INSERT INTO `cart` VALUES ('4', '4', '1', '2', '0');
INSERT INTO `cart` VALUES ('5', '4', '2', '1', '0');

-- ----------------------------
-- Table structure for modules
-- ----------------------------
DROP TABLE IF EXISTS `modules`;
CREATE TABLE `modules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of modules
-- ----------------------------
INSERT INTO `modules` VALUES ('1', 'Orders', 'order');
INSERT INTO `modules` VALUES ('2', 'Manage Users', 'user');
INSERT INTO `modules` VALUES ('3', 'Manage Products', 'product');
INSERT INTO `modules` VALUES ('4', 'Cart', 'cart');
INSERT INTO `modules` VALUES ('5', 'Shop', 'shop');

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `delivery_guy` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('2', '4', '4', '3', '3');

-- ----------------------------
-- Table structure for orders_details
-- ----------------------------
DROP TABLE IF EXISTS `orders_details`;
CREATE TABLE `orders_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of orders_details
-- ----------------------------
INSERT INTO `orders_details` VALUES ('1', '2', '1', '4');
INSERT INTO `orders_details` VALUES ('2', '2', '2', '7');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES ('1', 'product1', '8', '10.00', '0');
INSERT INTO `products` VALUES ('2', 'product2', '3', '40.00', '0');
INSERT INTO `products` VALUES ('3', 'product3', '0', '2.00', '0');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', 'Admin');
INSERT INTO `role` VALUES ('2', 'Store Manager');
INSERT INTO `role` VALUES ('3', 'Delivery guy');
INSERT INTO `role` VALUES ('4', 'Customer');

-- ----------------------------
-- Table structure for role2module
-- ----------------------------
DROP TABLE IF EXISTS `role2module`;
CREATE TABLE `role2module` (
  `role_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `default` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of role2module
-- ----------------------------
INSERT INTO `role2module` VALUES ('1', '1', '1');
INSERT INTO `role2module` VALUES ('1', '2', '1');
INSERT INTO `role2module` VALUES ('1', '3', '1');
INSERT INTO `role2module` VALUES ('2', '1', '1');
INSERT INTO `role2module` VALUES ('2', '3', '1');
INSERT INTO `role2module` VALUES ('3', '1', '1');
INSERT INTO `role2module` VALUES ('4', '1', '1');
INSERT INTO `role2module` VALUES ('4', '4', '1');
INSERT INTO `role2module` VALUES ('4', '5', '1');

-- ----------------------------
-- Table structure for status
-- ----------------------------
DROP TABLE IF EXISTS `status`;
CREATE TABLE `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(255) NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of status
-- ----------------------------
INSERT INTO `status` VALUES ('1', 'Order Placed', '0');
INSERT INTO `status` VALUES ('2', 'Delivery Services Assigned', '0');
INSERT INTO `status` VALUES ('3', 'Shiped', '0');
INSERT INTO `status` VALUES ('4', 'Delivered', '0');

-- ----------------------------
-- Table structure for user2module
-- ----------------------------
DROP TABLE IF EXISTS `user2module`;
CREATE TABLE `user2module` (
  `user_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `deleted` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user2module
-- ----------------------------
INSERT INTO `user2module` VALUES ('1', '1', '0');
INSERT INTO `user2module` VALUES ('1', '2', '0');
INSERT INTO `user2module` VALUES ('1', '3', '0');
INSERT INTO `user2module` VALUES ('2', '1', '0');
INSERT INTO `user2module` VALUES ('2', '3', '0');
INSERT INTO `user2module` VALUES ('3', '1', '0');
INSERT INTO `user2module` VALUES ('4', '1', '0');
INSERT INTO `user2module` VALUES ('4', '4', '0');
INSERT INTO `user2module` VALUES ('4', '5', '0');
INSERT INTO `user2module` VALUES ('5', '1', '0');
INSERT INTO `user2module` VALUES ('7', '1', '0');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `deleted` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'adrla7IBSfTZQ', '1', '0');
INSERT INTO `users` VALUES ('2', 'store_manager', 'st3rCn.zSAbZU', '2', '0');
INSERT INTO `users` VALUES ('3', 'dguyone', 'dgT3UXyVrpcqk', '3', '0');
INSERT INTO `users` VALUES ('4', 'nikhil', 'ni71DTcJAiC5w', '4', '0');
INSERT INTO `users` VALUES ('7', 'raju', 'ra5xSgK4tcuhk', '3', '0');
