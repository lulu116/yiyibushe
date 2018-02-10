-- phpMyAdmin SQL Dump
-- version 4.0.10.11
-- http://www.phpmyadmin.net
--
-- 主机: 127.0.0.1
-- 生成日期: 2018-02-10 17:24:08
-- 服务器版本: 5.7.17-log
-- PHP 版本: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `yiyibushe`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员主键',
  `realname` char(16) NOT NULL COMMENT '账号',
  `passwd` char(32) NOT NULL COMMENT '密码',
  `loginnum` int(11) DEFAULT '0' COMMENT '登录次数',
  `lasttimes` datetime DEFAULT NULL COMMENT '最后登录时间',
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`admin_id`, `realname`, `passwd`, `loginnum`, `lasttimes`) VALUES
(2, '刘婷', '202cb962ac59075b964b07152d234b70', 56, '2018-02-10 16:44:29');

-- --------------------------------------------------------

--
-- 表的结构 `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cart_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '购物车表主键',
  `product_id` int(11) NOT NULL COMMENT '商品id',
  `color_id` int(11) NOT NULL COMMENT '颜色',
  `size_id` int(11) NOT NULL COMMENT '尺寸',
  `addtimes` datetime DEFAULT NULL COMMENT '加入时间',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `cart_num` int(11) NOT NULL DEFAULT '1' COMMENT '加购单件商品数量',
  PRIMARY KEY (`cart_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `cart`
--

INSERT INTO `cart` (`cart_id`, `product_id`, `color_id`, `size_id`, `addtimes`, `user_id`, `cart_num`) VALUES
(15, 55, 58, 39, '2017-12-26 21:14:01', 8, 2),
(16, 54, 47, 38, '2017-12-26 21:15:51', 8, 2),
(17, 40, 57, 35, '2017-12-26 21:21:53', 8, 1),
(19, 51, 41, 33, '2017-12-31 14:53:40', 8, 5),
(20, 56, 45, 48, '2017-12-31 14:55:09', 8, 1),
(21, 46, 48, 42, '2017-12-31 15:01:51', 8, 4);

-- --------------------------------------------------------

--
-- 表的结构 `cate`
--

CREATE TABLE IF NOT EXISTS `cate` (
  `cate_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类信息表主键',
  `catename` char(120) NOT NULL COMMENT '类目名称',
  `parent_cate_id` int(11) NOT NULL DEFAULT '0' COMMENT '父级类目id,0:默认一级分类',
  `admin_id` int(11) NOT NULL COMMENT '添加者ID',
  `realname` char(24) NOT NULL COMMENT '操作者姓名',
  `addtimes` datetime NOT NULL COMMENT '添加时间',
  `updatetimes` datetime NOT NULL COMMENT '修改时间',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1:类目存在 0类目不存在',
  PRIMARY KEY (`cate_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- 转存表中的数据 `cate`
--

INSERT INTO `cate` (`cate_id`, `catename`, `parent_cate_id`, `admin_id`, `realname`, `addtimes`, `updatetimes`, `status`) VALUES
(15, '上衣', 0, 2, '刘婷', '2017-12-20 15:30:36', '2017-12-20 15:30:36', 1),
(16, '裤子', 0, 2, '刘婷', '2017-12-20 15:30:58', '2017-12-20 15:30:58', 1),
(17, '裙子', 0, 2, '刘婷', '2017-12-20 15:31:05', '2017-12-20 15:31:05', 1),
(18, '女鞋', 0, 2, '刘婷', '2017-12-20 15:31:15', '2017-12-20 15:31:15', 1),
(19, '包包', 0, 2, '刘婷', '2017-12-20 15:31:23', '2017-12-20 15:31:23', 1),
(20, '配饰', 0, 2, '刘婷', '2017-12-20 15:31:30', '2017-12-20 15:31:30', 1),
(21, '衬衣', 15, 2, '刘婷', '2017-12-20 15:32:02', '2017-12-20 15:32:02', 1),
(22, '毛衣', 15, 2, '刘婷', '2017-12-20 15:32:12', '2017-12-20 15:32:12', 1),
(23, '夹克', 15, 2, '刘婷', '2017-12-20 15:32:21', '2017-12-20 15:32:21', 1),
(24, '棉衣', 15, 2, '刘婷', '2017-12-20 15:32:29', '2017-12-20 15:32:29', 1),
(25, '雪纺衫', 15, 2, '刘婷', '2017-12-20 15:32:41', '2017-12-20 15:32:41', 1),
(26, '牛仔裤', 16, 2, '刘婷', '2017-12-20 15:32:52', '2017-12-20 15:32:52', 1),
(27, '休闲裤', 16, 2, '刘婷', '2017-12-20 15:33:00', '2017-12-20 15:33:20', 1),
(28, '打底裤', 16, 2, '刘婷', '2017-12-20 15:33:32', '2017-12-20 15:33:32', 1),
(29, '毛呢裙', 17, 2, '刘婷', '2017-12-20 15:33:45', '2017-12-20 15:33:45', 1),
(30, '包臀裙', 17, 2, '刘婷', '2017-12-20 15:33:55', '2017-12-20 15:33:55', 1),
(31, '衬衫裙', 17, 2, '刘婷', '2017-12-20 15:34:05', '2017-12-20 15:34:05', 1),
(32, '鱼尾裙', 17, 2, '刘婷', '2017-12-20 15:34:15', '2017-12-20 15:34:15', 1),
(33, '背带裙', 17, 2, '刘婷', '2017-12-20 15:34:24', '2017-12-20 15:34:24', 1),
(34, '半身长裙', 17, 2, '刘婷', '2017-12-20 15:34:36', '2017-12-20 15:34:36', 1),
(35, '松糕鞋', 18, 2, '刘婷', '2017-12-20 15:34:48', '2017-12-20 15:34:48', 1),
(36, '豆豆鞋', 18, 2, '刘婷', '2017-12-20 15:34:58', '2017-12-20 15:34:58', 1),
(37, '休闲鞋', 18, 2, '刘婷', '2017-12-20 15:35:07', '2017-12-20 15:35:07', 1),
(38, '增高小白鞋', 18, 2, '刘婷', '2017-12-20 15:35:16', '2017-12-20 15:35:16', 1),
(39, '甜美高跟', 18, 2, '刘婷', '2017-12-20 15:35:26', '2017-12-20 15:35:26', 1),
(40, '英伦小皮鞋', 18, 2, '刘婷', '2017-12-20 15:35:35', '2017-12-20 15:35:35', 1),
(41, '乐福鞋', 18, 2, '刘婷', '2017-12-20 15:35:44', '2017-12-20 15:35:44', 1),
(42, '尖头单鞋', 18, 2, '刘婷', '2017-12-20 15:35:53', '2017-12-20 15:35:53', 1),
(43, '斜挎包', 19, 2, '刘婷', '2017-12-20 15:36:03', '2017-12-20 15:36:03', 1),
(44, '单肩包', 19, 2, '刘婷', '2017-12-20 15:36:12', '2017-12-20 15:36:12', 1),
(45, '手提包', 19, 2, '刘婷', '2017-12-20 15:36:20', '2017-12-20 15:36:20', 1),
(46, '钱包', 19, 2, '刘婷', '2017-12-20 15:36:28', '2017-12-20 15:36:28', 1),
(47, '旅行箱', 19, 2, '刘婷', '2017-12-20 15:36:36', '2017-12-20 15:36:36', 1),
(48, '手拿包', 19, 2, '刘婷', '2017-12-20 15:36:45', '2017-12-20 15:36:45', 1),
(49, '腰带', 20, 2, '刘婷', '2017-12-20 15:36:55', '2017-12-20 15:36:55', 1),
(50, '胸针', 20, 2, '刘婷', '2017-12-20 15:37:05', '2017-12-20 15:37:05', 1),
(51, '手镯', 20, 2, '刘婷', '2017-12-20 15:37:16', '2017-12-20 15:37:16', 1),
(52, '颈链', 20, 2, '刘婷', '2017-12-20 15:37:25', '2017-12-20 15:37:25', 1),
(53, '帽子', 20, 2, '刘婷', '2017-12-20 16:37:46', '2017-12-20 16:37:46', 1);

-- --------------------------------------------------------

--
-- 表的结构 `collect`
--

CREATE TABLE IF NOT EXISTS `collect` (
  `collect_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `product_id` int(11) NOT NULL COMMENT '商品id',
  `addtimes` datetime NOT NULL COMMENT '加入收藏的时间',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `collect_num` int(11) NOT NULL DEFAULT '0' COMMENT '1:已经收藏了；0：未收藏；一件商品只能收藏一次',
  PRIMARY KEY (`collect_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `collect`
--

INSERT INTO `collect` (`collect_id`, `product_id`, `addtimes`, `user_id`, `collect_num`) VALUES
(10, 50, '2018-01-02 11:37:06', 8, 1),
(11, 51, '2018-01-02 11:37:38', 8, 1),
(12, 49, '2018-01-02 11:37:59', 8, 1),
(13, 53, '2018-01-02 11:40:42', 8, 1),
(14, 54, '2018-01-02 11:42:09', 8, 1),
(15, 56, '2018-01-02 11:43:11', 8, 1),
(16, 40, '2018-01-02 11:44:40', 8, 1),
(17, 55, '2018-01-02 11:50:44', 8, 1),
(18, 52, '2018-01-02 15:26:50', 8, 1),
(19, 49, '2018-01-16 18:43:29', 9, 1);

-- --------------------------------------------------------

--
-- 表的结构 `color`
--

CREATE TABLE IF NOT EXISTS `color` (
  `color_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '颜色表主键',
  `product_id` int(11) NOT NULL COMMENT '商品id',
  `colorname` char(60) NOT NULL COMMENT '颜色名称',
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

--
-- 转存表中的数据 `color`
--

INSERT INTO `color` (`color_id`, `product_id`, `colorname`) VALUES
(23, 0, '蓝色'),
(24, 0, '黑色'),
(25, 38, '蓝色'),
(26, 0, '黑色'),
(27, 39, '红'),
(28, 40, '黑色'),
(29, 41, '灰色'),
(30, 41, '白色'),
(31, 42, '黑色'),
(32, 42, '灰色'),
(33, 43, '卡其色'),
(34, 44, '粉红色'),
(35, 45, '粉色'),
(36, 46, '白色'),
(37, 46, '黑色'),
(38, 47, '米白色'),
(39, 47, '白色'),
(40, 48, '米白色'),
(41, 49, '白色'),
(42, 50, '黑白色'),
(43, 50, '白色'),
(44, 51, '白色'),
(45, 51, '紫色'),
(46, 0, '花色'),
(47, 52, '黑色'),
(48, 52, '白色'),
(49, 53, '黑色'),
(50, 54, '深蓝色'),
(51, 55, '黑色'),
(52, 56, '白色'),
(53, 56, '黑色');

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` char(16) NOT NULL,
  `ordertimes` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `orderaddress` char(240) NOT NULL,
  `tel` int(11) NOT NULL,
  `price` float NOT NULL,
  `ordercount` int(11) NOT NULL,
  `totalprices` float NOT NULL,
  `status` int(11) NOT NULL COMMENT '1：付款:0：未付款:3：退货:4：退款等',
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `color_id`, `size_id`, `user_id`, `username`, `ordertimes`, `orderaddress`, `tel`, `price`, `ordercount`, `totalprices`, `status`) VALUES
(8, 53, 49, 40, 8, '刘婷', '2018-01-08 03:27:43', '四川省广元市苍溪县高级职业中学 张三（收）。', 123456789, 102, 1, 102, 1),
(9, 50, 42, 36, 8, '刘婷', '2018-01-12 07:37:32', '四川省广元市苍溪县高级职业中学 张三（收）。', 123456789, 52, 1, 52, 1),
(10, 51, 44, 37, 9, '涛哥', '2018-01-16 10:40:46', '四川省自贡市自流井区四川理工学院 王涛收', 123456789, 120, 1, 120, 1),
(11, 51, 44, 37, 9, '涛哥', '2018-01-16 10:55:36', '四川省自贡市自流井区四川理工学院 王涛收', 123456789, 120, 1, 120, 1),
(12, 46, 36, 32, 9, '涛哥', '2018-01-16 11:00:05', '四川省自贡市自流井区四川理工学院 王涛收', 123456789, 120, 1, 120, 1);

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品信息表主键',
  `productname` char(240) NOT NULL COMMENT '商品标题',
  `imgs` char(240) NOT NULL COMMENT '商品图片：多张',
  `cate_id_p` int(11) NOT NULL COMMENT '一级类目id',
  `cate_id_c` int(11) NOT NULL COMMENT '二级类目id',
  `price` float NOT NULL COMMENT '价格：小数',
  `woman_img` char(240) DEFAULT '0' COMMENT '女装轮播',
  `man_img` char(240) DEFAULT '0' COMMENT '男装轮播',
  `img` char(240) DEFAULT '0' COMMENT '主轮播',
  `sex_type` int(11) NOT NULL COMMENT '产品类型 1：男；2：女； 0：无',
  `detail` char(240) NOT NULL COMMENT '产品描述',
  `types` char(240) DEFAULT NULL COMMENT '产品类型',
  `assure` char(240) DEFAULT NULL COMMENT '商家保证',
  `addtimes` datetime NOT NULL COMMENT '添加时间',
  `updatetimes` datetime NOT NULL COMMENT '修改时间',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '1：上架 0 ：下架',
  `username` char(16) NOT NULL COMMENT '添加商品人',
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=57 ;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`product_id`, `productname`, `imgs`, `cate_id_p`, `cate_id_c`, `price`, `woman_img`, `man_img`, `img`, `sex_type`, `detail`, `types`, `assure`, `addtimes`, `updatetimes`, `status`, `username`) VALUES
(38, '衬衣', ',http://localhost/lulu_PHP_Project/yiyibushe/upload/image/ce1.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/ce3.jpg', 15, 21, 265, '0', '0', '0', 1, '<p>正装衬衫用于礼服或西服正装的搭配。便装衬衫用于非正式场合的西服搭配穿着。家居衬衫用于非正式西服的搭配，如配搭毛衣和便装裤，居家和散步穿着，度假衬衫则专用于旅游度假</p>', '服装-上衣', '1.送货上门；2.七天免费退换', '2017-12-20 16:05:22', '2017-12-20 16:05:22', 1, '刘婷'),
(40, '格子衬衣', ',http://localhost/lulu_PHP_Project/yiyibushe/upload/image/ce1.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/ce2.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/ce3.jpg', 15, 21, 203, '0', '0', '0', 1, '<p>我们的衣服质量很好</p>', '服装-上衣', '1.包邮；2.免费送货上门', '2017-12-20 16:18:31', '2017-12-20 16:18:31', 1, '刘婷'),
(41, '毛衣', ',http://localhost/lulu_PHP_Project/yiyibushe/upload/image/big_banner1.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/big_banner2.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/big_banner3.jpg', 15, 22, 264, '0', '0', '1', 0, '<p>我们的毛衣质量很好，非常漂亮。</p>', '服装-毛衣', '1.七天免费退货；2.免费送小礼物', '2017-12-20 16:23:14', '2017-12-20 16:23:14', 1, '刘婷'),
(42, '休闲鞋', ',http://localhost/lulu_PHP_Project/yiyibushe/upload/image/big_banner3.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/big_banner4.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/big_banner5.jpg', 18, 37, 158, '0', '0', '1', 0, '<p>鞋子鞋子鞋子鞋子鞋子鞋子鞋子鞋子鞋子鞋子鞋子鞋子鞋子鞋子鞋子鞋子鞋子鞋子鞋子鞋子鞋子鞋子</p>', '鞋子-休闲', '1.七天免费退货；2.免费送小礼物', '2017-12-20 16:25:28', '2017-12-20 16:25:28', 1, '刘婷'),
(43, '棉衣', ',http://localhost/lulu_PHP_Project/yiyibushe/upload/image/big_banner7.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/big_banner6.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/big_banner5.jpg', 15, 24, 368, '0', '0', '1', 0, '<p>诅咒枯叶破口大骂顺顺顺喹</p>', '棉衣', '1.包邮；2.免费送货上门', '2017-12-20 16:27:17', '2017-12-20 16:27:17', 1, '刘婷'),
(45, '大衣', ',http://localhost/lulu_PHP_Project/yiyibushe/upload/image/big_banner6.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/big_banner1.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/big_banner2.jpg', 15, 24, 568, '0', '0', '1', 0, '<p>遥须夺右右顺因因咽加工厂加压回加压夺呖右因因</p>', '上衣', '1.七天免费退货；2.免费送小礼物', '2017-12-20 16:31:52', '2017-12-20 16:31:52', 1, '刘婷'),
(46, '小白鞋', ',http://localhost/lulu_PHP_Project/yiyibushe/upload/image/big_banner5.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/big_banner3.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/big_banner4.jpg', 18, 38, 120, '0', '0', '1', 0, '<p>夺圆月加压 罟罟中因胃加厍回吸气回</p>', '增高小白鞋', '1.七天免费退货；2.免费送小礼物', '2017-12-20 16:34:15', '2017-12-20 16:34:15', 1, '刘婷'),
(47, '手提包', ',http://localhost/lulu_PHP_Project/yiyibushe/upload/image/big_banner2.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/big_banner4.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/big_banner7.jpg', 19, 45, 97, '0', '0', '1', 0, '<p>在中因回圆月回轼因回去晨嚼右边顺回回蜀犬吠日右</p>', '小包包', '1.七天免费退货；2.免费送小礼物', '2017-12-20 16:36:42', '2017-12-20 16:36:42', 1, '刘婷'),
(48, '太阳大帽子', ',http://localhost/lulu_PHP_Project/yiyibushe/upload/image/big_banner4.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/big_banner5.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/big_banner6.jpg', 20, 53, 79, '0', '0', '1', 0, '<p>在顺蜀犬吠日回加盟回回顺回右喹加压 呖回因</p>', '太阳帽子', '1.七天免费退货；2.免费送小礼物；3.赠运费险', '2017-12-20 16:39:19', '2017-12-20 16:39:19', 1, '刘婷'),
(49, '白领衬衣', ',http://localhost/lulu_PHP_Project/yiyibushe/upload/image/cen1.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/cen3.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/cen2.jpg', 15, 21, 98, '1', '0', '0', 1, '<p>地方 夺夺有我遥肝在上说 和的主主主和和</p>', '白色纺织衬衣', '1.包邮；2.免费送货上门', '2017-12-20 19:18:34', '2017-12-20 19:18:34', 1, '刘婷'),
(50, '花色衬衣', ',http://localhost/lulu_PHP_Project/yiyibushe/upload/image/cen5.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/cen3.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/cen7.jpg', 15, 21, 52, '1', '0', '0', 2, '<p>的吸加轼因加咽圆月回加厚 回回别墅 加厚地顺</p>', '花色衬衣', '1.七天免费退货；2.免费送小礼物', '2017-12-20 19:20:31', '2017-12-20 19:20:31', 1, '刘婷'),
(51, '气质衬衣', ',http://localhost/lulu_PHP_Project/yiyibushe/upload/image/cen7.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/cen2.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/cen6.jpg', 15, 21, 120, '1', '0', '0', 2, '<p>看回圆月蜀犬吠日因圆月回中国共产党吸</p>', '气质衬衣,很显成熟', '1.送货上门；2.七天免费退换', '2017-12-20 19:22:17', '2017-12-20 19:22:17', 1, '刘婷'),
(52, '毛衣', ',http://localhost/lulu_PHP_Project/yiyibushe/upload/image/mao223.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/mao88.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/mao77.jpg', 15, 22, 89, '0', '1', '0', 2, '<p>的中加厍肋国顺吸国顺胃顺胃加厍吸回嚼胃口圆月国</p>', '冬季毛衣', '1.送货上门；2.七天免费退换', '2017-12-20 20:24:47', '2017-12-20 20:24:47', 1, '刘婷'),
(53, '花毛衣', ',http://localhost/lulu_PHP_Project/yiyibushe/upload/image/mao22.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/mao55.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/mao66.jpg', 15, 22, 102, '0', '1', '0', 2, '<p>看回圆月回圆月因吸蜀犬吠日胃顺吸圆月圆月圆月圆月吸吸吸回 吸回有咀嚼加</p>', '花毛衣', '1.送货上门；2.七天免费退换', '2017-12-20 20:26:00', '2017-12-20 20:26:00', 1, '刘婷'),
(54, '牛仔裤', ',http://localhost/lulu_PHP_Project/yiyibushe/upload/image/ku1.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/ku2.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/ku33.jpg', 16, 26, 198, '0', '1', '0', 1, '<p>夺夺在3遥夺虽百回圆月顺啡右国因虽别圆月顺国蜀犬吠日</p>', '牛仔裤', '1.七天免费退货；2.免费送小礼物', '2017-12-20 20:27:44', '2017-12-20 20:27:44', 1, '刘婷'),
(55, '夹克', ',http://localhost/lulu_PHP_Project/yiyibushe/upload/image/jiek2.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/jiek1.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/jiek3.jpg', 15, 23, 912, '0', '1', '0', 1, '<p>地方右回加盟顺圆月回回圆月加厚 顺国回中</p>', '小夹克', '1.七天免费退货；2.免费送小礼物', '2017-12-20 20:28:57', '2017-12-20 20:28:57', 1, '刘婷'),
(56, '冬季棉衣', ',http://localhost/lulu_PHP_Project/yiyibushe/upload/image/mao4.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/mian1.jpg,http://localhost/lulu_PHP_Project/yiyibushe/upload/image/mian2.jpg', 15, 24, 562, '0', '0', '0', 2, '<p>在辰夺遥夺遥夺有在的在人城有震遥地在摇肝在有需用埒胯胯</p>', '服装-棉衣', '1.送货上门；2.七天免费退换', '2017-12-24 09:49:44', '2017-12-24 09:49:44', 1, '刘婷');

-- --------------------------------------------------------

--
-- 表的结构 `size`
--

CREATE TABLE IF NOT EXISTS `size` (
  `size_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '尺寸表主键',
  `product_id` int(11) NOT NULL COMMENT '商品id',
  `sizename` char(60) NOT NULL COMMENT '尺寸大小',
  PRIMARY KEY (`size_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=44 ;

--
-- 转存表中的数据 `size`
--

INSERT INTO `size` (`size_id`, `product_id`, `sizename`) VALUES
(21, 0, 'xl'),
(22, 0, 'l'),
(23, 38, 'l'),
(24, 0, 'L'),
(25, 39, 'L'),
(26, 40, 'L'),
(27, 41, 'L'),
(28, 42, 'L'),
(29, 43, 'S'),
(30, 44, 'XL'),
(31, 45, 'S'),
(32, 46, 'S'),
(33, 47, '中号'),
(34, 48, '中号'),
(35, 49, 'S'),
(36, 50, 'S'),
(37, 51, 'XL'),
(38, 0, 'S'),
(39, 52, 'L'),
(40, 53, 'S'),
(41, 54, 'L'),
(42, 55, 'XL'),
(43, 56, 'S');

-- --------------------------------------------------------

--
-- 表的结构 `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
  `stock_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '库存表主键',
  `product_id` int(11) NOT NULL COMMENT '商品id',
  `color_id` int(11) NOT NULL COMMENT '颜色',
  `size_id` int(11) NOT NULL COMMENT '尺寸',
  `addtimes` datetime DEFAULT NULL COMMENT '加入时间',
  `updatetimes` datetime DEFAULT NULL COMMENT '修改时间',
  `stocknum` int(11) NOT NULL COMMENT '库存数量',
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- 转存表中的数据 `stock`
--

INSERT INTO `stock` (`stock_id`, `product_id`, `color_id`, `size_id`, `addtimes`, `updatetimes`, `stocknum`) VALUES
(19, 0, 24, 22, '2017-12-20 16:03:30', '2017-12-20 16:03:30', 80),
(20, 38, 25, 23, '2017-12-20 16:05:22', '2017-12-20 16:05:22', 10),
(21, 0, 26, 24, '2017-12-20 16:14:59', '2017-12-20 16:14:59', 105),
(22, 39, 27, 25, '2017-12-20 16:16:21', '2017-12-20 16:16:21', 10),
(23, 40, 28, 26, '2017-12-20 16:18:32', '2017-12-20 16:18:32', 100),
(24, 41, 30, 27, '2017-12-20 16:23:14', '2017-12-20 16:23:14', 10),
(25, 42, 32, 28, '2017-12-20 16:25:29', '2017-12-20 16:25:29', 52),
(26, 43, 33, 29, '2017-12-20 16:27:17', '2017-12-20 16:27:17', 103),
(27, 44, 34, 30, '2017-12-20 16:29:12', '2017-12-20 16:29:12', 10),
(28, 45, 35, 31, '2017-12-20 16:31:53', '2017-12-20 16:31:53', 1000),
(29, 46, 37, 32, '2017-12-20 16:34:17', '2017-12-20 16:34:17', 302),
(30, 47, 39, 33, '2017-12-20 16:36:43', '2017-12-20 16:36:43', 200),
(31, 48, 40, 34, '2017-12-20 16:39:19', '2017-12-20 16:39:19', 150),
(32, 49, 41, 35, '2017-12-20 19:18:34', '2017-12-20 19:18:34', 100),
(33, 50, 43, 36, '2017-12-20 19:20:31', '2017-12-20 19:20:31', 100),
(34, 51, 45, 37, '2017-12-20 19:22:17', '2017-12-20 19:22:17', 120),
(35, 0, 46, 38, '2017-12-20 19:24:06', '2017-12-20 19:24:06', 100),
(36, 52, 48, 39, '2017-12-20 20:24:47', '2017-12-20 20:24:47', 120),
(37, 53, 49, 40, '2017-12-20 20:26:01', '2017-12-20 20:26:01', 20),
(38, 54, 50, 41, '2017-12-20 20:27:45', '2017-12-20 20:27:45', 120),
(39, 55, 51, 42, '2017-12-20 20:28:57', '2017-12-20 20:28:57', 1000),
(40, 56, 53, 43, '2017-12-24 09:49:45', '2017-12-24 09:49:45', 899);

-- --------------------------------------------------------

--
-- 表的结构 `suggest`
--

CREATE TABLE IF NOT EXISTS `suggest` (
  `suggest_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `user_id` int(11) NOT NULL COMMENT '用户ID',
  `username` char(11) NOT NULL,
  `types` char(24) NOT NULL COMMENT '意见类型',
  `admin_id` int(11) NOT NULL COMMENT '管理员ID',
  `content` char(240) NOT NULL COMMENT '内容',
  `admin_suggest` char(240) DEFAULT NULL COMMENT '管理员给用户的反馈',
  PRIMARY KEY (`suggest_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `suggest`
--

INSERT INTO `suggest` (`suggest_id`, `user_id`, `username`, `types`, `admin_id`, `content`, `admin_suggest`) VALUES
(18, 8, '刘婷', '配送问题', 2, '艰', '迥'),
(19, 8, '刘婷', '支付问题', 2, '154487旧旧间卓上班族睛', '迥'),
(20, 8, '刘婷', '发票问题', 2, 'dfasdfdskljfalskdjfklsdfasdf', 'uytu');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户主键',
  `username` char(16) NOT NULL COMMENT '账号',
  `passwd` char(32) NOT NULL COMMENT '密码',
  `userImg` char(240) NOT NULL COMMENT '用户头像',
  `tel` char(11) NOT NULL COMMENT '手机号',
  `registtimes` datetime NOT NULL COMMENT '注册时间',
  `loginnum` int(11) DEFAULT '0' COMMENT '登录次数',
  `logintimes` datetime DEFAULT NULL COMMENT '最后一次登录时间',
  `loginout` datetime DEFAULT NULL COMMENT '下线时间',
  `useraddress` char(240) NOT NULL COMMENT '收货地址',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `username`, `passwd`, `userImg`, `tel`, `registtimes`, `loginnum`, `logintimes`, `loginout`, `useraddress`) VALUES
(8, '刘婷', '83222e3274d6911f63485a7e7336132e', 'userimg.jpg', '123456789', '2017-12-19 20:56:52', 49, '2018-02-10 17:13:39', '2018-02-10 17:12:25', '四川省成都市金牛区xxxxxxx大楼7-102  张三（收）'),
(9, '涛哥', 'a83aebcf531aacd35eea7f71e81c707c', 'userimg.jpg', '123456789', '2018-01-16 18:24:57', 3, '2018-01-16 18:55:15', '2018-01-16 18:40:03', '四川省自贡市自流井区四川理工学院 王涛收');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
