/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : rx_rodelease

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 23/07/2019 09:51:46
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for rx_admin
-- ----------------------------
DROP TABLE IF EXISTS `rx_admin`;
CREATE TABLE `rx_admin`  (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员表',
  `admin_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '管理员电话',
  `admin_user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '管理员姓名',
  `admin_create_time` int(11) NULL DEFAULT NULL COMMENT '创建时间',
  `admin_status` tinyint(4) NULL DEFAULT 1 COMMENT '管理员状态默认：1启用，0未启用，2：删除',
  `admin_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '管理员密码',
  `admin_last_ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '最后登录的ip',
  `admin_last_time` int(11) NULL DEFAULT NULL COMMENT '最后登录的时间',
  `admin_login_count` int(11) NULL DEFAULT NULL COMMENT '登录的次数',
  `admin_module` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '管理的身份superadmin，admin',
  PRIMARY KEY (`admin_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rx_admin
-- ----------------------------
INSERT INTO `rx_admin` VALUES (1, '18304061005', '韩立冬', 123456789, 1, 'e10adc3949ba59abbe56e057f20f883e', '127.0.0.1', 1563757822, 25, 'superadmin');
INSERT INTO `rx_admin` VALUES (2, '18304061001', '张三', 123456788, 1, 'e10adc3949ba59abbe56e057f20f883e', '127.0.0.1', 1563325604, 39, 'admin');
INSERT INTO `rx_admin` VALUES (3, '18304061002', '李四', 1563432646, 1, '123456', NULL, NULL, NULL, 'admin');

-- ----------------------------
-- Table structure for rx_agreement
-- ----------------------------
DROP TABLE IF EXISTS `rx_agreement`;
CREATE TABLE `rx_agreement`  (
  `agreement_id` int(11) NOT NULL AUTO_INCREMENT,
  `agreement_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '协议名称',
  `agreement_content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '协议内容',
  `agreement_status` tinyint(4) NULL DEFAULT 1 COMMENT '状态0：不启用，1：启用',
  PRIMARY KEY (`agreement_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rx_banner
-- ----------------------------
DROP TABLE IF EXISTS `rx_banner`;
CREATE TABLE `rx_banner`  (
  `banner_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '轮播图主键',
  `banner_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '轮播名字',
  `banner_cover` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '轮播封面图',
  `banner_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '轮播图跳转的url',
  `banner_order_sort` int(11) NULL DEFAULT NULL,
  `banner_describe` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '轮播内容',
  `banner_status` tinyint(4) NULL DEFAULT 1 COMMENT '是否开启轮播0：不开启，1：开启',
  `banner_create_time` int(11) NULL DEFAULT NULL COMMENT '添加时间',
  `banner_update_time` int(11) NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`banner_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rx_banner
-- ----------------------------
INSERT INTO `rx_banner` VALUES (1, '轮播1', 'https://lf.ruixinec.com/timg2.jpg', NULL, 1, '我是轮播描述1', 1, 1234567897, 1234567897);
INSERT INTO `rx_banner` VALUES (2, '轮播2', 'https://lf.ruixinec.com/timg1.jpg', NULL, 2, '我是轮播描述2', 1, 1234567897, 1234567897);
INSERT INTO `rx_banner` VALUES (3, '测试轮播图', 'https://lf.ruixinec.com/6144e49c302c46234656c34beb035575.png', '', 0, NULL, 1, 1563528721, 1563528721);
INSERT INTO `rx_banner` VALUES (4, '测试轮播图2', 'https://lf.ruixinec.com/6ab68e51b1b732ae58efb4048e858a26.png', '', 0, '<p>我是测试符文本啊啊啊啊</p><p><img src=\"https://lf.ruixinec.com/515b788a8f6b26c23342b30ae48d9048.png\" title=\"\" alt=\"\"/></p>', 1, 1563528784, 1563528784);

-- ----------------------------
-- Table structure for rx_category
-- ----------------------------
DROP TABLE IF EXISTS `rx_category`;
CREATE TABLE `rx_category`  (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '分类名字',
  `category_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '分类图片',
  `category_parent_id` int(11) NOT NULL COMMENT '父id',
  `category_order_sort` int(6) NOT NULL DEFAULT 0,
  `category_status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '状态 0禁用 1正常',
  `category_create_time` int(10) NULL DEFAULT NULL COMMENT '添加时间',
  `category_update_time` int(10) NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`category_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 18 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rx_category
-- ----------------------------
INSERT INTO `rx_category` VALUES (1, '男装', '', 0, 0, 1, 123456789, 123456789);
INSERT INTO `rx_category` VALUES (2, '女装', '', 0, 0, 1, 123456789, 123456789);
INSERT INTO `rx_category` VALUES (3, '道具', '', 0, 0, 1, 123456789, 123456789);
INSERT INTO `rx_category` VALUES (4, '小的男装', '', 1, 0, 1, 123456789, 123456789);
INSERT INTO `rx_category` VALUES (5, '大的男装', '', 1, 0, 1, 123456789, 123456789);
INSERT INTO `rx_category` VALUES (6, '老的男装', '', 1, 0, 1, 123456789, 123456789);
INSERT INTO `rx_category` VALUES (7, '小的女装', '', 2, 0, 1, 123456789, 12346789);
INSERT INTO `rx_category` VALUES (8, '古装', '', 0, 0, 1, 1563414788, 1563414788);
INSERT INTO `rx_category` VALUES (9, '男装2', '', 0, 0, 0, 1563415295, 1563415759);
INSERT INTO `rx_category` VALUES (10, '小孩道具', '', 3, 0, 1, 1563418062, 1563418062);
INSERT INTO `rx_category` VALUES (11, '大人玩具', '', 3, 0, 1, 1563419530, 1563420636);
INSERT INTO `rx_category` VALUES (12, '道具22', '', 3, 0, 1, 1563419558, 1563422607);
INSERT INTO `rx_category` VALUES (13, '大人女装', '', 2, 0, 1, 1563420661, 1563420661);

-- ----------------------------
-- Table structure for rx_goods
-- ----------------------------
DROP TABLE IF EXISTS `rx_goods`;
CREATE TABLE `rx_goods`  (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品主键',
  `goods_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '商品名称',
  `goods_num` int(11) NULL DEFAULT 0 COMMENT '商品数量',
  `goods_img` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '商品图展示以json方式存入',
  `goods_cover` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '商品图封面（默认上传第一张图）',
  `goods_current_price` decimal(10, 2) NULL DEFAULT NULL COMMENT '商品现价',
  `goods_original_price` decimal(10, 2) NULL DEFAULT NULL COMMENT '商品原价',
  `goods_admin_id` int(11) NULL DEFAULT NULL COMMENT '发布商品的管理员id 外键',
  `goods_lease_time` int(11) NULL DEFAULT NULL COMMENT '商品租赁的时间',
  `goods_create_time` int(11) NULL DEFAULT NULL COMMENT '商品上架的时间',
  `goods_update_time` int(11) NULL DEFAULT NULL COMMENT '商品修改的时间',
  `goods_status` tinyint(4) NULL DEFAULT NULL COMMENT '商品的状态0下架1正常-1删除',
  `goods_category_id` int(11) NULL DEFAULT NULL COMMENT '商品所属的分类id 外键',
  `goods_is_host` tinyint(4) NULL DEFAULT 0 COMMENT '是否是热门商品0非热门1热门',
  `goods_desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '商品描述',
  PRIMARY KEY (`goods_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rx_goods
-- ----------------------------
INSERT INTO `rx_goods` VALUES (1, '商品礼服出租啊啊啊', 10, '[\"https://lf.ruixinec.com/e0c85abcfd72802c06737a1b1ec18a62.png\",\"https://lf.ruixinec.com/f030e28e68e326cb70861cc58d9b2485.png\"]', 'https://lf.ruixinec.com/e0c85abcfd72802c06737a1b1ec18a62.png', 100.00, 100.00, 1, 32, 1563351565, 1563759303, 1, 4, 0, '<p>描述描述aaaaaaaaaaa</p>');
INSERT INTO `rx_goods` VALUES (2, '出租出租', 20, '[\"https://lf.ruixinec.com/timg1.jpg\"]', 'https://lf.ruixinec.com/timg1.jpg', 1020.00, 2000.00, 1, 40, 2147483647, 214532145, 1, 4, 0, '描述描述');
INSERT INTO `rx_goods` VALUES (3, '啊啊啊啊啊啊', 30, '[\"https://lf.ruixinec.com/timg1.jpg\"]', 'https://lf.ruixinec.com/timg1.jpg', 100.00, 100.00, 1, 30, 123456789, 123456789, -1, 5, 1, '描述描述');
INSERT INTO `rx_goods` VALUES (4, '哦哦哦哦', 87, '[\"https://lf.ruixinec.com/timg1.jpg\"]', 'https://lf.ruixinec.com/timg1.jpg', 360.00, 360.00, 1, 20, 123456789, 123456789, 1, 6, 1, '描述描述');
INSERT INTO `rx_goods` VALUES (5, '啊啊啊啊啊', 10, '[\"https://lf.ruixinec.com/8cd37045f4e17e2b9ae63e43a1047338.png\",\"https://lf.ruixinec.com/0202761144f8863b2493972fbd95f3bc.png\"]', 'https://lf.ruixinec.com/8cd37045f4e17e2b9ae63e43a1047338.png', 100.00, 100.00, 1, 10, 1563344056, 1563357754, -1, 4, 1, '描述描述');
INSERT INTO `rx_goods` VALUES (6, '鸡鸡鸡鸡鸡鸡鸡鸡鸡鸡鸡', 13, '[\"https://lf.ruixinec.com/e975ca3417d43a874c239434883f9a4d.png\",\"https://lf.ruixinec.com/de7cfc4b5b34f44e30384068028ad62f.png\"]', 'https://lf.ruixinec.com/e975ca3417d43a874c239434883f9a4d.png', 60.00, 60.00, 1, 30, 1563351259, 1563351259, -1, 7, 0, '描述描述');
INSERT INTO `rx_goods` VALUES (11, '***********************', 2, '[\"https://lf.ruixinec.com/166458ca271ae5609254f0d59cc20afe.png\",\"https://lf.ruixinec.com/60774693a42078998d7b61215142fbcf.png\"]', 'https://lf.ruixinec.com/166458ca271ae5609254f0d59cc20afe.png', 20.00, 20.00, 1, 10, 1563758758, 1563845456, 1, 4, 1, '<p><img src=\"https://lf.ruixinec.com/2caef32a6920cc2ea3c26d97fc7732cf.png\" title=\"\" alt=\"\"/></p><p>我是商品描述</p>');

-- ----------------------------
-- Table structure for rx_menu
-- ----------------------------
DROP TABLE IF EXISTS `rx_menu`;
CREATE TABLE `rx_menu`  (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '后台菜单名称',
  `parent_id` int(5) NOT NULL COMMENT '上级菜单id',
  `url` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `url_params` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '\" \"',
  `icon` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `module` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `isactive` int(1) NOT NULL DEFAULT 0,
  `isdefault` tinyint(1) NOT NULL DEFAULT 1,
  `order_sort` int(6) NOT NULL,
  `hide` int(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rx_menu
-- ----------------------------
INSERT INTO `rx_menu` VALUES (1, '用户管理', 0, '', '\" \"', 'xe62c;', 'admin', 0, 1, 0, 0);
INSERT INTO `rx_menu` VALUES (2, '用户列表', 1, 'admin/User/lists', '\" \"', '', 'admin', 0, 1, 0, 0);
INSERT INTO `rx_menu` VALUES (3, '管理员管理', 0, '', '\" \"', 'xe62d;', 'admin', 0, 1, 1, 0);
INSERT INTO `rx_menu` VALUES (4, '商品管理', 0, '', '\" \"', 'xe6d3;', 'admin', 0, 1, 2, 0);
INSERT INTO `rx_menu` VALUES (5, '商品列表', 4, 'admin/Goods/lists', '\" \"', '', 'admin', 0, 1, 1, 0);
INSERT INTO `rx_menu` VALUES (6, '订单管理', 0, '', '\" \"', 'xe627;', 'admin', 0, 1, 3, 0);
INSERT INTO `rx_menu` VALUES (7, '订单列表', 6, 'admin/Order/lists', '\" \"', '', 'admin', 0, 1, 0, 0);
INSERT INTO `rx_menu` VALUES (8, '商品分类', 4, 'admin/Goods/category', '\" \"', '', 'admin', 0, 1, 2, 0);
INSERT INTO `rx_menu` VALUES (9, '管理员列表', 3, 'admin/Admin/lists', '\" \"', '', 'admin', 0, 1, 1, 0);
INSERT INTO `rx_menu` VALUES (10, '角色管理', 3, 'admin/Admin/roles', '\" \"', '', 'admin', 0, 1, 2, 0);
INSERT INTO `rx_menu` VALUES (11, '权限管理', 3, 'admin/Admin/permissions', '\" \"', '', 'admin', 0, 1, 3, 0);
INSERT INTO `rx_menu` VALUES (12, '图文管理', 0, '', '\" \"', 'xe613;', 'admin', 0, 1, 4, 0);
INSERT INTO `rx_menu` VALUES (13, '轮播管理', 12, 'admin/Imgtext/banners', '\" \"', '', 'admin', 0, 1, 1, 0);
INSERT INTO `rx_menu` VALUES (14, '关于我们', 12, 'admin/Imgtext/aboutMy', '\" \"', '', 'admin', 0, 1, 2, 0);

-- ----------------------------
-- Table structure for rx_merchant
-- ----------------------------
DROP TABLE IF EXISTS `rx_merchant`;
CREATE TABLE `rx_merchant`  (
  `merchant_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商家主键id',
  `merchant_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '商家店名称',
  `merchant_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '商家固定电话',
  `merchant_mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '商家手机号',
  `merchant_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '商家地址',
  `merchant_lng` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '商家经度',
  `merchant_lat` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '商家纬度',
  `merchant_description` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '商家简介',
  PRIMARY KEY (`merchant_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rx_merchant
-- ----------------------------
INSERT INTO `rx_merchant` VALUES (1, '正青春歌舞团', '85784512', '13604011234', '辽宁省吉林市', NULL, NULL, '<p>公司简介简介</p><p>阿萨达阿萨啊啊敖德萨所阿萨撒撒啊</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;阿萨德阿萨撒撒发顺丰a<br/></p><p><img src=\"https://lf.ruixinec.com/f8137c4ea2e3a8e6850ca1d581ff28f8.png\" title=\"\" alt=\"\"/></p>');

-- ----------------------------
-- Table structure for rx_order
-- ----------------------------
DROP TABLE IF EXISTS `rx_order`;
CREATE TABLE `rx_order`  (
  `order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单主键',
  `order_payment` double(255, 2) NULL DEFAULT NULL COMMENT '实付金额',
  `order_payment_type` int(11) NULL DEFAULT NULL COMMENT '支付类型 1：线上支付，2：线下支付',
  `order_post_fee` double(255, 2) NULL DEFAULT NULL COMMENT '邮费',
  `order_status` int(10) NULL DEFAULT NULL COMMENT '状态：0：未付款，1：已付款，2：未发货，3：已发货，4：交易成功，5：交易关闭',
  `order_create_time` int(11) NULL DEFAULT NULL COMMENT '订单创建时间',
  `order_update_time` int(11) NULL DEFAULT NULL COMMENT '订单更新时间',
  `order_payment_time` int(11) NULL DEFAULT NULL COMMENT '付款时间',
  `order_consign_time` int(11) NULL DEFAULT NULL COMMENT '发货时间',
  `order_end_time` int(11) NULL DEFAULT NULL COMMENT '交易完成时间',
  `order_close_time` int(11) NULL DEFAULT NULL COMMENT '交易关闭时间',
  `order_shipping_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '物流名称',
  `order_shipping_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '物流单号',
  `order_platform_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '平台订单流水号',
  `order_payment_number` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '支付平台订单流水号',
  `order_user_id` int(11) NULL DEFAULT NULL COMMENT '用户id号',
  `order_buyer_message` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL COMMENT '买家留言',
  PRIMARY KEY (`order_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rx_order
-- ----------------------------
INSERT INTO `rx_order` VALUES (1, 200.00, 1, 10.00, 0, 1563781028, 1563781028, NULL, NULL, NULL, NULL, NULL, NULL, '2019072215370875305', '2019072215370889431', 1, '买家留言');
INSERT INTO `rx_order` VALUES (2, 200.00, 1, 10.00, 0, 1563781154, 1563781154, NULL, NULL, NULL, NULL, NULL, NULL, '2019072215391411715', '2019072215391485302', 1, '买家留言');
INSERT INTO `rx_order` VALUES (3, 200.00, 1, 10.00, 0, 1563781190, 1563781190, NULL, NULL, NULL, NULL, NULL, NULL, '2019072215395060773', '2019072215395063537', 1, '买家留言');

-- ----------------------------
-- Table structure for rx_order_item
-- ----------------------------
DROP TABLE IF EXISTS `rx_order_item`;
CREATE TABLE `rx_order_item`  (
  `order_item_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单详情表',
  `order_item_goods_id` int(11) NULL DEFAULT NULL COMMENT '订单商品id号',
  `order_item_order_id` int(11) NULL DEFAULT NULL COMMENT '订单id号',
  `order_item_num` int(11) NULL DEFAULT NULL COMMENT '购买商品的数量',
  `order_item_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '订单商品的标题',
  `order_item_price` double(11, 2) NULL DEFAULT NULL COMMENT '商品的单价',
  `order_item_total_fee` double(11, 2) NULL DEFAULT NULL COMMENT '订单商品总价',
  `order_item_pic_path` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '商品的封面图片',
  PRIMARY KEY (`order_item_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rx_order_item
-- ----------------------------
INSERT INTO `rx_order_item` VALUES (1, 1, 0, 2, '商品礼服出租啊啊啊', 100.00, 200.00, 'https://lf.ruixinec.com/e0c85abcfd72802c06737a1b1ec18a62.png');
INSERT INTO `rx_order_item` VALUES (2, 1, 2, 2, '商品礼服出租啊啊啊', 100.00, 200.00, 'https://lf.ruixinec.com/e0c85abcfd72802c06737a1b1ec18a62.png');
INSERT INTO `rx_order_item` VALUES (3, 1, 3, 2, '商品礼服出租啊啊啊', 100.00, 200.00, 'https://lf.ruixinec.com/e0c85abcfd72802c06737a1b1ec18a62.png');

-- ----------------------------
-- Table structure for rx_order_shipping
-- ----------------------------
DROP TABLE IF EXISTS `rx_order_shipping`;
CREATE TABLE `rx_order_shipping`  (
  `order_shipping_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单配送信息表主键id',
  `order_shipping_order_id` int(11) NULL DEFAULT NULL COMMENT '订单的id号',
  `order_shipping_receiver_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '收货人真实姓名',
  `order_shipping_receiver_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '收货人固定电话',
  `order_shipping_receiver_mobile` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '收货人移动电话',
  `order_shipping_receiver_state` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '收货人的省',
  `order_shipping_receiver_city` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '收货人的城市',
  `order_shipping_receiver_district` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '收货人的区/县',
  `order_shipping_receiver_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '收货地址',
  `order_shipping_receiver_zip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '邮编',
  `order_shipping_create_time` int(11) NULL DEFAULT NULL COMMENT '创建时间',
  `order_shipping_update_time` int(11) NULL DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`order_shipping_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rx_order_shipping
-- ----------------------------
INSERT INTO `rx_order_shipping` VALUES (1, 0, '张三', '85244654', '18304061001', '辽宁省', '沈阳市', '浑南区', 'xx街道xdx座', '110326', 1563781028, 1563781028);
INSERT INTO `rx_order_shipping` VALUES (2, 2, '张三', '85244654', '18304061001', '辽宁省', '沈阳市', '浑南区', 'xx街道xdx座', '110326', 1563781154, 1563781154);
INSERT INTO `rx_order_shipping` VALUES (3, 3, '张三', '85244654', '18304061001', '辽宁省', '沈阳市', '浑南区', 'xx街道xdx座', '110326', 1563781190, 1563781190);

-- ----------------------------
-- Table structure for rx_permission
-- ----------------------------
DROP TABLE IF EXISTS `rx_permission`;
CREATE TABLE `rx_permission`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '权限节点名称',
  `type` smallint(4) UNSIGNED NOT NULL DEFAULT 0 COMMENT '权限类型1api权限2前路由权限',
  `category_id` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '权限分组id',
  `path` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '权限路径',
  `path_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '路径唯一编码',
  `description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '描述信息',
  `status` smallint(4) UNSIGNED NOT NULL DEFAULT 0 COMMENT '状态0未启用1正常',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '创建时间',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_permission`(`path_id`, `status`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '权限节点' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rx_permission
-- ----------------------------
INSERT INTO `rx_permission` VALUES (1, '后台最高权限', 1, 1, '/*', '523048e7f5ca9550505f2d8ea6d587e7', '所有的权限', 1, 0);
INSERT INTO `rx_permission` VALUES (2, '用户列表', 1, 2, '/admin/user/lists', '', '管理用户', 1, 0);
INSERT INTO `rx_permission` VALUES (9, '删除用户', 1, 2, 'admin/user/del', '', '删除用户', 1, 0);
INSERT INTO `rx_permission` VALUES (10, '停用用户', 1, 2, 'admin/user/stop', '', '停用用户', 1, 0);
INSERT INTO `rx_permission` VALUES (11, '启用用户', 1, 2, 'admin/user/start', '', '启用用户', 1, 0);
INSERT INTO `rx_permission` VALUES (12, '管理员列表', 1, 3, 'admin/Admin/lists', '', '管理员列表', 1, 0);
INSERT INTO `rx_permission` VALUES (13, '添加管理员', 1, 3, 'admin/Admin/addAdmin', '', '添加管理员', 1, 0);
INSERT INTO `rx_permission` VALUES (14, '停用管理员', 1, 3, 'admin/Admin/stopAdmin', '', '停用管理员', 1, 0);
INSERT INTO `rx_permission` VALUES (15, '启用管理员', 1, 0, 'admin/Admin/startAdmin', '', '启用管理员', 1, 0);

-- ----------------------------
-- Table structure for rx_permission_category
-- ----------------------------
DROP TABLE IF EXISTS `rx_permission_category`;
CREATE TABLE `rx_permission_category`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '权限分组名称',
  `description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '权限分组描述',
  `status` smallint(4) UNSIGNED NOT NULL DEFAULT 1 COMMENT '权限分组状态1有效2无效',
  `create_time` int(10) UNSIGNED NOT NULL DEFAULT 0 COMMENT '权限分组创建时间',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rx_permission_category
-- ----------------------------
INSERT INTO `rx_permission_category` VALUES (1, '超级管理员组', '网站后台最高级别管理员组', 1, 0);
INSERT INTO `rx_permission_category` VALUES (2, '用户组', '管理普通用户', 1, 0);
INSERT INTO `rx_permission_category` VALUES (3, '管理员组', '管理员组', 1, 0);
INSERT INTO `rx_permission_category` VALUES (4, '角色组', '角色管理组', 1, 0);
INSERT INTO `rx_permission_category` VALUES (5, '权限组', '权限管理组', 1, 0);
INSERT INTO `rx_permission_category` VALUES (6, '订单组', '系统的订单处理', 1, 0);
INSERT INTO `rx_permission_category` VALUES (7, '商品组', '商品管理组', 1, 0);
INSERT INTO `rx_permission_category` VALUES (8, '商品分类组', '商品分类组', 1, 0);

-- ----------------------------
-- Table structure for rx_role
-- ----------------------------
DROP TABLE IF EXISTS `rx_role`;
CREATE TABLE `rx_role`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '角色名',
  `description` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT '' COMMENT '角色描述',
  `status` smallint(4) UNSIGNED NOT NULL DEFAULT 0 COMMENT '状态1正常0未启用',
  `sort_num` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '排序值',
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `idx_role`(`status`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '角色' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rx_role
-- ----------------------------
INSERT INTO `rx_role` VALUES (1, '超级管理员', '最高级别的角色', 1, 0);
INSERT INTO `rx_role` VALUES (2, '管理员', '普通的管理员', 1, 0);
INSERT INTO `rx_role` VALUES (4, '测试角色', '测试角色描述2019年7月19日15:20:36', 1, 0);

-- ----------------------------
-- Table structure for rx_role_permission
-- ----------------------------
DROP TABLE IF EXISTS `rx_role_permission`;
CREATE TABLE `rx_role_permission`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `role_id` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '角色编号',
  `permission_id` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '权限编号',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '角色权限对应表' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rx_role_permission
-- ----------------------------
INSERT INTO `rx_role_permission` VALUES (1, 1, 1);
INSERT INTO `rx_role_permission` VALUES (2, 2, 2);
INSERT INTO `rx_role_permission` VALUES (3, 2, 3);
INSERT INTO `rx_role_permission` VALUES (4, 2, 4);
INSERT INTO `rx_role_permission` VALUES (19, 4, 2);
INSERT INTO `rx_role_permission` VALUES (20, 4, 9);
INSERT INTO `rx_role_permission` VALUES (21, 4, 10);
INSERT INTO `rx_role_permission` VALUES (22, 4, 11);

-- ----------------------------
-- Table structure for rx_user_info
-- ----------------------------
DROP TABLE IF EXISTS `rx_user_info`;
CREATE TABLE `rx_user_info`  (
  `userinfo_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户详细信息主键自增id',
  `userinfo_user_id` int(11) NOT NULL COMMENT '用户id',
  `userinfo_email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户邮箱',
  `userinfo_idcard` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '用户身份证号',
  `userinfo_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '用户现在地址',
  `userinfo_real_picture` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户现实照片图片',
  `userinfo_idcard_img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '身份证图片',
  `userinfo_idcard_img2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '身份证图片2',
  `userinfo_qq` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'qq号码',
  `userinfo_city` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '所在城市',
  `userinfo_provice` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '所在省',
  `userinfo_area` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '' COMMENT '区',
  `userinfo_lat` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '纬度',
  `userinfo_lng` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '经度',
  `userinfo_nation` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '身份证民族',
  `userinfo_idcard_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '身份证住址',
  `userinfo_idcard_birth` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '身份证生日',
  PRIMARY KEY (`userinfo_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for rx_user_role
-- ----------------------------
DROP TABLE IF EXISTS `rx_user_role`;
CREATE TABLE `rx_user_role`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '用户id',
  `role_id` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT '角色id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = '用户角色对应关系' ROW_FORMAT = Compact;

-- ----------------------------
-- Records of rx_user_role
-- ----------------------------
INSERT INTO `rx_user_role` VALUES (2, 2, 2);
INSERT INTO `rx_user_role` VALUES (3, 3, 2);
INSERT INTO `rx_user_role` VALUES (8, 1, 1);

-- ----------------------------
-- Table structure for rx_users
-- ----------------------------
DROP TABLE IF EXISTS `rx_users`;
CREATE TABLE `rx_users`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户主键自增id',
  `user_nickname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户昵称',
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户真实姓名',
  `user_avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户头像',
  `user_phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户授权电话',
  `user_openid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '微信授权登录openID',
  `user_password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户登录密码（微信授权登录不用）',
  `user_age` int(11) NULL DEFAULT 0 COMMENT '用户年龄',
  `user_sex` tinyint(4) NULL DEFAULT 0 COMMENT '用户性别：默认0：未知，1：男，2：女',
  `user_status` tinyint(4) NULL DEFAULT 1 COMMENT '用户状态：默认1：启用，0：禁用',
  `user_create_time` int(11) NULL DEFAULT NULL COMMENT '用户注册时间',
  `user_update_time` int(11) NULL DEFAULT NULL COMMENT '用户修改时间',
  `user_unitionid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '用户的微信UnitionID唯一标识',
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of rx_users
-- ----------------------------
INSERT INTO `rx_users` VALUES (1, '张三', '张三', NULL, '18304061001', '123456', '123456', 10, 0, 1, 1234567891, 1234567897, NULL);

SET FOREIGN_KEY_CHECKS = 1;
