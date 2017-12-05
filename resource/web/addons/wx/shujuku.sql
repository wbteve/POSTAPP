-- phpMyAdmin SQL Dump
-- version 4.0.10
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2016-02-18 10:18:50
-- 服务器版本: 5.1.73
-- PHP 版本: 5.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: ``
--

-- --------------------------------------------------------

--
-- 表的结构 `ims_superman_creditmall_ad`
--

CREATE TABLE IF NOT EXISTS `ims_superman_creditmall_ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '公众号id',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '广告名称',
  `content` text COMMENT '广告内容',
  `isshow` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否显示,0:否,1:是',
  `start_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '时间戳',
  `end_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '时间戳',
  `displayorder` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '时间戳',
  PRIMARY KEY (`id`),
  KEY `indx_uniacid` (`uniacid`,`isshow`,`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ims_superman_creditmall_ad_position`
--

CREATE TABLE IF NOT EXISTS `ims_superman_creditmall_ad_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad_id` int(11) NOT NULL DEFAULT '0' COMMENT '广告id',
  `position_id` int(11) NOT NULL DEFAULT '0' COMMENT '位置id',
  PRIMARY KEY (`id`),
  UNIQUE KEY `indx_id` (`ad_id`,`position_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ims_superman_creditmall_dispatch`
--

CREATE TABLE IF NOT EXISTS `ims_superman_creditmall_dispatch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '公众号id',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '配送方式名称',
  `fee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '费用',
  `isshow` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否显示,0:否,1:是',
  `need_address` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否需要地址,0:否,1:是',
  `extend` text COMMENT '扩展内容',
  `displayorder` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '时间戳',
  PRIMARY KEY (`id`),
  KEY `indx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- 表的结构 `ims_superman_creditmall_mytask`
--

CREATE TABLE IF NOT EXISTS `ims_superman_creditmall_mytask` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '公众号id',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员id',
  `task_id` int(11) NOT NULL DEFAULT '0' COMMENT '任务id',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '任务状态,-1:失败,0:已领取,1:已完成',
  `progress` varchar(255) NOT NULL DEFAULT '' COMMENT '任务进度',
  `applytime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '申请时间戳',
  `completetime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '完成时间戳',
  PRIMARY KEY (`id`),
  KEY `indx_uniacid` (`uniacid`),
  KEY `indx_uid` (`uid`,`task_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- 表的结构 `ims_superman_creditmall_order`
--

CREATE TABLE IF NOT EXISTS `ims_superman_creditmall_order` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '公众号id',
  `ordersn` varchar(50) NOT NULL DEFAULT '' COMMENT '订单号',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员id',
  `product_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品id',
  `total` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '数量',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '总价格',
  `credit_type` varchar(10) NOT NULL DEFAULT '' COMMENT '积分类型',
  `credit` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '总积分',
  `remark` varchar(500) NOT NULL DEFAULT '' COMMENT '备注',
  `username` varchar(100) NOT NULL DEFAULT '' COMMENT '收货人姓名',
  `mobile` varchar(20) NOT NULL DEFAULT '' COMMENT '收货人电话',
  `zipcode` varchar(10) NOT NULL DEFAULT '' COMMENT '邮编',
  `address` varchar(1000) NOT NULL DEFAULT '' COMMENT '收货地址',
  `express_title` varchar(100) NOT NULL DEFAULT '' COMMENT '快递公司',
  `express_no` varchar(50) NOT NULL DEFAULT '' COMMENT '快递单号',
  `express_fee` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '快递费',
  `pickup_info` text COMMENT '自取信息',
  `pay_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '支付方式,1:credit,2:wechat',
  `payment_no` varchar(100) NOT NULL DEFAULT '' COMMENT '微信支付单号',
  `pay_credit` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否支付积分,0:否,1:是',
  `pay_price` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '订单状态，-2:已删除,-1:已取消,0:待支付,1:已支付待发货,2:已发货,3:已收货,4:已评价',
  `pay_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '支付时间戳',
  `isread` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否阅读,0:否,1:是',
  `extend` text,
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '时间戳',
  PRIMARY KEY (`id`),
  UNIQUE KEY `indx_ordersn` (`ordersn`),
  KEY `indx_uniacid` (`uniacid`,`status`,`dateline`),
  KEY `indx_uid` (`uid`,`status`,`dateline`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- 表的结构 `ims_superman_creditmall_product`
--

CREATE TABLE IF NOT EXISTS `ims_superman_creditmall_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '公众号id',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '商品类型id',
  `dispatch_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '配送方式id',
  `market_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '市场价',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `credit_type` varchar(10) NOT NULL DEFAULT '' COMMENT '积分类型',
  `credit` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '积分',
  `total` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '库存',
  `sales` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '销量',
  `month_sales` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '月销量',
  `week_sales` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '周销量',
  `start_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '开始时间',
  `end_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '结束时间',
  `cover` varchar(255) NOT NULL DEFAULT '' COMMENT '封面',
  `album` mediumtext COMMENT '相册',
  `view_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '浏览数',
  `share_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '分享数',
  `comment_count` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '评论数',
  `description` text COMMENT '详细介绍',
  `joined_total` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '参与人数',
  `displayorder` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `minus_total` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:拍下减库存 2:付款减库存 3:永不减',
  `ishome` tinyint(4) NOT NULL DEFAULT '0' COMMENT '首页推荐,0:否,1:是',
  `isnew` tinyint(4) NOT NULL DEFAULT '0' COMMENT '新品推荐,0:否,1:是',
  `ishot` tinyint(4) NOT NULL DEFAULT '0' COMMENT '热卖推荐,0:否,1:是',
  `isshow` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:下架 1:上架',
  `isvirtual` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否虚拟物品,0:否,1:是',
  `order_buy_num` tinyint(4) NOT NULL DEFAULT '0' COMMENT '每单最多购买数',
  `max_buy_num` tinyint(4) NOT NULL DEFAULT '0' COMMENT '用户最多购买数',
  `today_limit` int(11) NOT NULL DEFAULT '0',
  `extend` text COMMENT '扩展内容',
  `share_credit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `groupid` int(11) NOT NULL DEFAULT '0',
  `share_credit_type` varchar(10) NOT NULL DEFAULT '',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '时间戳',
  PRIMARY KEY (`id`),
  KEY `indx_uniacid` (`uniacid`,`type`,`displayorder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- 表的结构 `ims_superman_creditmall_product_log`
--

CREATE TABLE IF NOT EXISTS `ims_superman_creditmall_product_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '公众号id',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员id',
  `product_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品id',
  `credit_type` varchar(10) NOT NULL DEFAULT '' COMMENT '积分类型',
  `credit` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '消费积分',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态,0:未中,1:已中',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '时间戳',
  PRIMARY KEY (`id`),
  KEY `indx_id` (`uniacid`,`uid`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ims_superman_creditmall_product_share`
--

CREATE TABLE IF NOT EXISTS `ims_superman_creditmall_product_share` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '公众号id',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员id',
  `product_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品id',
  `friend_uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '好友会员id 0为游客',
  `credit_type` varchar(10) NOT NULL DEFAULT '' COMMENT '积分类型',
  `credit` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '消费积分',
  `ip` char(15) NOT NULL DEFAULT '' COMMENT 'ip',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '时间戳',
  PRIMARY KEY (`id`),
  KEY `indx_uniacid` (`uniacid`,`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- 表的结构 `ims_superman_creditmall_stat`
--

CREATE TABLE IF NOT EXISTS `ims_superman_creditmall_stat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '公众号id',
  `daytime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '日期',
  `product_views` int(11) NOT NULL DEFAULT '0' COMMENT '商品浏览数',
  `product_shares` int(11) NOT NULL DEFAULT '0' COMMENT '商品分享数',
  `product_comments` int(11) NOT NULL DEFAULT '0' COMMENT '商品评论数',
  PRIMARY KEY (`id`),
  KEY `indx_uniacid` (`uniacid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- 表的结构 `ims_superman_creditmall_task`
--

CREATE TABLE IF NOT EXISTS `ims_superman_creditmall_task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '公众号id',
  `relate_id` int(11) NOT NULL DEFAULT '0' COMMENT '依存任务id',
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '任务类型 1:新手任务 2:日常任务 3:活动任务',
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '任务名称',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '模块标识',
  `url` varchar(255) NOT NULL DEFAULT '' COMMENT '模块入口链接',
  `description` text COMMENT '任务描述',
  `icon` varchar(100) NOT NULL DEFAULT '' COMMENT '任务图标',
  `isshow` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否启用 0:否 1:是',
  `applied` int(11) NOT NULL DEFAULT '0' COMMENT '已申请人次',
  `completed` int(11) NOT NULL DEFAULT '0' COMMENT '已完成人次',
  `limits` int(11) NOT NULL DEFAULT '0' COMMENT '允许申请人次上限 0:不限制',
  `applyperm` text COMMENT '允许申请用户组id',
  `credit_type` varchar(10) NOT NULL DEFAULT '' COMMENT '奖励积分类型',
  `credit_min` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '最小奖励积分',
  `credit_max` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '最大奖励积分',
  `builtin` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否系统任务 0:否 1:是',
  `issuperman` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否超人产品 0:否 1:是',
  `starttime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '开始时间戳 0:不限制',
  `endtime` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '结束时间戳 0:不限制',
  `extend` text COMMENT '扩展内容',
  `displayorder` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '时间戳',
  PRIMARY KEY (`id`),
  KEY `indx_uniacid` (`uniacid`),
  KEY `indx_name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- 表的结构 `ims_superman_creditmall_virtual_stuff`
--

CREATE TABLE IF NOT EXISTS `ims_superman_creditmall_virtual_stuff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uniacid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '公众号id',
  `uid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '会员id',
  `product_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '商品id',
  `key` varchar(255) NOT NULL DEFAULT '' COMMENT '物品key',
  `value` varchar(1000) NOT NULL DEFAULT '' COMMENT '物品value',
  `extend` text COMMENT '预留扩展字段',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '状态,0:未领取,1:已领取',
  `get_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '领取时间戳',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '时间戳',
  PRIMARY KEY (`id`),
  KEY `indx_id` (`uniacid`,`uid`,`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
