
CREATE DATABASE `wa31` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `wa31`;
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


CREATE TABLE IF NOT EXISTS `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` text COLLATE utf8_unicode_ci NOT NULL,
  `name` text CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;


INSERT INTO `goods` (`id`, `category`, `name`) VALUES
(1, 'living', 'DJ ポケットミキサー'),
(2, 'fashion', 'リヴィール ウォッチ'),
(3, 'fashion', 'アコーディオン レシートホルダー'),
(4, 'dining', 'フロストガラスカラフェ'),
(5, 'dining', 'iittala レンピ グラス'),
(6, 'living', '+-0加湿器\r\n'),
(7, 'living', 'MoMA リバーシブル フレーム'),
(8, 'living', 'ネルソン スワッグレッグデスク'),
(9, 'dining', '富士椀 for Him'),
(10, 'fashion', 'キュービスト カクテルリング');
