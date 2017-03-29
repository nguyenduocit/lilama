-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 05, 2016 at 10:50 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webproduct`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_group_id` int(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `name`, `admin_group_id`) VALUES
(7, 'admin', '12345678', '', 'Mod', 2);

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `site_title` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(20) COLLATE utf8_bin NOT NULL,
  `meta_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `sort_order` tinyint(4) NOT NULL DEFAULT '0',
  `activel` tinyint(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `site_title`, `icon`, `meta_desc`, `meta_key`, `parent_id`, `sort_order`, `activel`) VALUES
(35, 'iphone 6s', '', '', '', '', 26, 2, 0),
(36, 'iphone 6', '', '', '', '', 26, 3, 0),
(26, 'Apple', '', 'fa fa-apple', '', '', 0, 1, 0),
(27, 'Điện Thoại', '', 'fa fa-mobile', '', '', 0, 2, 0),
(28, 'Máy Tính Bảng', '', 'fa fa-building', '', '', 0, 3, 0),
(51, 'Macbook', '', 'fa fa-windows', '', '', 0, 4, 0),
(31, 'Thiết Bị Âm Thanh ', '', 'fa fa-volume-up', '', '', 0, 4, 0),
(32, 'Kho Phụ Kiện', '', 'fa fa-university', '', '', 0, 5, 0),
(33, 'Máy Cũ', '', 'fa fa-exchange', '', '', 0, 6, 0),
(34, 'iphone công ty', '', '', '', '', 26, 1, 0),
(37, 'iphone 5s', '', '', '', '', 26, 5, 0),
(38, 'iphone 4', '', '', '', '', 26, 0, 0),
(39, 'Lumia', '', '', '', '', 27, 1, 0),
(40, 'HTC', '', '', '', '', 27, 2, 0),
(41, 'Sony Xperia', '', '', '', '', 27, 3, 0),
(42, 'OPPO', '', '', '', '', 27, 4, 0),
(43, 'LG', '', '', '', '', 27, 5, 0),
(44, 'SamSung ', '', '', '', '', 27, 7, 0),
(45, 'Xiaomi', '', '', '', '', 28, 1, 0),
(46, 'iPad', '', '', '', '', 28, 2, 0),
(47, 'SamSung', '', '', '', '', 28, 3, 0),
(48, 'Apple', '', '', '', '', 28, 4, 0),
(49, 'Asus', '', '', '', '', 28, 5, 0),
(50, 'Lenovo', '', '', '', '', 28, 6, 0),
(52, 'Thiết Bị Âm Thanh ', '', '', '', '', 31, 2, 1),
(54, 'Macbook', '', '', '', '', 51, 1, 1),
(55, 'Kho phu Kien', '', '', '', '', 32, 1, 1),
(56, 'Máy cũ', '', '', '', '', 33, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(128) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `title`, `content`, `meta_desc`, `meta_key`, `created`) VALUES
(1, 'Giới thiệu', '<p>\r\n	Giới thiệu</p>\r\n', '', '', 1409044792);

-- --------------------------------------------------------

--
-- Table structure for table `maker`
--

CREATE TABLE `maker` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `info` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `site_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sort_order` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `parent_id` int(255) NOT NULL,
  `title` varchar(128) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_bin NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `intro` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `meta_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image_link` varchar(50) COLLATE utf8_bin NOT NULL,
  `created` int(11) NOT NULL DEFAULT '0',
  `feature` enum('0','1') COLLATE utf8_bin NOT NULL,
  `count_view` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `intro`, `content`, `meta_desc`, `meta_key`, `image_link`, `created`, `feature`, `count_view`) VALUES
(1, 'Nhà lầu siêu xe hàng mã ế sưng, đồ chơi biển đảo hút khách', '(Dân trí) - Loạt đồ chơi trung thu biển đảo hướng về quê hương mới xuất hiện nhưng đã hút khách, các mặt hàng vàng mã “xa xỉ” không còn được nhiều người mua sắm.', '<p style="TEXT-ALIGN: left">\r\n	Theo b&aacute;c Lan, một chủ cửa h&agrave;ng ở phố H&agrave;ng M&atilde; chia sẻ: &ldquo;Kinh tế kh&oacute; khăn n&ecirc;n người bỏ tiền triệu ra mua đồ c&uacute;ng đắt tiền như nh&agrave; lầu, xe hơi, điện thoại, ti vi c&ograve;n rất &iacute;t. Mọi người chỉ lựa chọn những loại đồ c&oacute; gi&aacute; b&igrave;nh d&acirc;n như quần &aacute;o, gi&agrave;y d&eacute;p v&agrave; mũ để c&uacute;ng. Những mặt h&agrave;ng b&aacute;n chạy nhất l&agrave; tiền &acirc;m phủ, v&agrave;ng, quần &aacute;o hay gi&agrave;y d&eacute;p v&igrave; c&oacute; gi&aacute; kh&aacute; b&igrave;nh d&acirc;n&rdquo;.</p>\r\n<p style="TEXT-ALIGN: center">\r\n	<img alt="Mặt hàng đèn lồng biển đảo mới xuất hiện trong dịp Tết Trung Thu năm nay" src="http://dantri4.vcmedia.vn/Urgz3f5tKFdDA0VUUO/Image/2014/08/n1-242e1.jpg" /><br />\r\n	<span style="FONT-FAMILY: Tahoma; FONT-SIZE: 10pt">Mặt h&agrave;ng đ&egrave;n lồng biển đảo mới xuất hiện trong dịp Tết Trung Thu năm nay</span></p>\r\n<p style="TEXT-ALIGN: center">\r\n	<span style="FONT-FAMILY: Tahoma"><img alt="Các thông điệp ý nghĩa yêu quê hương, biển đảo được in lên đèn lồng" src="http://dantri4.vcmedia.vn/Urgz3f5tKFdDA0VUUO/Image/2014/08/n2-242e1.jpg" /></span><br />\r\n	<span style="FONT-FAMILY: Tahoma; FONT-SIZE: 10pt">C&aacute;c th&ocirc;ng điệp &yacute; nghĩa y&ecirc;u qu&ecirc; hương, biển đảo được in l&ecirc;n đ&egrave;n lồng</span></p>\r\n<p>\r\n	Một mặt h&agrave;ng đặc biệt của m&ugrave;a Vu Lan năm nay đ&oacute; l&agrave; loại đồ chơi &ldquo;biển đảo&rdquo;. Đ&oacute; l&agrave; những chiếc đ&egrave;n lồng được in những th&ocirc;ng điệp hướng về qu&ecirc; hương, biển đảo hết sức &yacute; nghĩa.</p>\r\n<div class="article-side-rail" id="article-side-rail">\r\n	<div class="article-video-relation">\r\n		<div class="relative">\r\n			<img alt="Mùa Vu Lan: " class="thumb" src="http://video-thumbs.vcmedia.vn///dantri/7iS0Ym1SbbOoTsWhJi6Q/2014/08/08/vangma-15e63.jpg" /><img class="ico" src="http://dantri3.vcmedia.vn/App_Themes/Default/Images/ico_video_play.png" /></div>\r\n		<p class="caption">\r\n			M&ugrave;a Vu Lan: &quot;Xe si&ecirc;u sang&quot; đỗ chật phố H&agrave;ng M&atilde;</p>\r\n	</div>\r\n</div>\r\n<p>\r\n	C&aacute;c chủ cửa h&agrave;ng tại đ&acirc;y cho biết, c&aacute;c loại mặt h&agrave;ng l&agrave;m thủ c&ocirc;ng truyền thống đ&egrave;n lồng, đầu l&acirc;n, đ&egrave;n &ocirc;ng sao vẫn được kh&aacute;ch h&agrave;ng ưa chuộng nhất. Ngo&agrave;i ra, mẫu đ&egrave;n lồng in sẵn mang th&ocirc;ng điệp hướng về biển đảo qu&ecirc; hương được nhiều bậc phụ huynh v&agrave; c&aacute;c em học sinh đặc biệt y&ecirc;u th&iacute;ch.</p>\r\n<p style="TEXT-ALIGN: center">\r\n	<img alt="Mới xuất hiện nhưng những chiếc đèn lồng này được nhiều phụ huynh và các em nhỏ lựa chọn" src="http://dantri4.vcmedia.vn/Urgz3f5tKFdDA0VUUO/Image/2014/08/n4-242e1.jpg" /><br />\r\n	<span style="FONT-FAMILY: Tahoma; FONT-SIZE: 10pt">Mới xuất hiện nhưng những chiếc đ&egrave;n lồng n&agrave;y được nhiều phụ huynh v&agrave; c&aacute;c em nhỏ lựa chọn</span><br />\r\n	&nbsp;</p>\r\n<p>\r\n	Chiếc đ&egrave;n lồng mang th&ocirc;ng điệp biển đảo được gh&eacute;p lại bằng 3 mảnh b&igrave;a kh&aacute;c nhau. Chiếc đ&egrave;n c&oacute; thể thắp s&aacute;ng v&agrave; ph&aacute;t nhạc khi được lắp pin ở tay cầm.Tuy nhi&ecirc;n, chi tiết đ&aacute;ng ch&uacute; &yacute; nhất đ&oacute; l&agrave; những th&ocirc;ng điệp hướng về biển đảo in tr&ecirc;n th&acirc;n của chiếc đ&egrave;n lồng như &ldquo;Em y&ecirc;u biển đảo qu&ecirc; hương&rdquo;, &ldquo;B&eacute; hướng về biển đảo&rdquo;, &ldquo;Em y&ecirc;u biển đảo Việt Nam&rdquo;, &ldquo;Em y&ecirc;u ch&uacute; bộ đội hải qu&acirc;n Việt Nam&rdquo;, với những h&igrave;nh ảnh chiến sĩ Hải qu&acirc;n Việt Nam s&uacute;ng kho&aacute;c tr&ecirc;n vai bảo vệ chủ quyền biển đảo Tổ quốc hay những chiếc t&agrave;u mang d&ograve;ng chữ Cảnh s&aacute;t biển Việt Nam&hellip;</p>\r\n', '', '', 'n1-242e1.jpg', 1407553602, '0', 1),
(2, 'Arsenal đồng ý bán Vermaelen cho Barcelona', '(Dân trí) - Theo những thông tin từ báo giới Anh, Arsenal đã quyết định từ chối MU, để bán trung vệ Vermarlen cho Barcelona. Mức giá của trung vệ này vào khoảng 15 triệu bảng.', '<p>\r\n	Như đ&atilde; biết, c&aacute;ch đ&acirc;y v&agrave;i ng&agrave;y, trung vệ Vermaelen đ&atilde; từ chối gia hạn hợp đồng với Arsenal. Điều đ&oacute; khiến cho CLB th&agrave;nh London t&igrave;m c&aacute;ch b&aacute;n cầu thủ n&agrave;y bằng mọi gi&aacute; để &ldquo;gỡ gạc&rdquo; ch&uacute;t &iacute;t ph&iacute; chuyển nhượng thay v&igrave; mất trắng cầu thủ n&agrave;y&nbsp;ở m&ugrave;a H&egrave; sang năm.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<div align="center">\r\n	<span style="FONT-FAMILY: Tahoma; FONT-SIZE: 10pt"><img _fl="" align="middle" alt="Vermaelen ở rất gần Barcelona" src="http://dantri4.vcmedia.vn/uajiKupQ6reCuKKDlVlG/Image/2014/08/Vermaelen-d4361.jpg" style="MARGIN: 5px" width="450" /><br />\r\n	Vermaelen ở rất gần Barcelona</span><br />\r\n	&nbsp;</div>\r\n<p>\r\n	Trong thời gian gần đ&acirc;y, MU v&agrave; Barcelona l&agrave; hai ứng cử vi&ecirc;n s&aacute;ng gi&aacute; trong cuộc đua gi&agrave;nh chữ k&yacute; của hậu vệ người Bỉ. Cuối c&ugrave;ng, HLV Wenger đ&atilde; quyết định từ chối MU để b&aacute;n Vermarlen cho Barcelona. Trước đ&oacute; c&oacute; th&ocirc;ng tin cho rằng Wenger muốn đổi Vermaelen lấy Smalling, tuy nhi&ecirc;n Van Gaal lại từ chối phương &aacute;n n&agrave;y.</p>\r\n<p>\r\n	Trước b&aacute;o giới, HLV Wenger cho biết: &ldquo;Ch&uacute;ng t&ocirc;i đ&atilde; nhận được những lời đề nghị từ nước ngo&agrave;i v&agrave; quyết định để Vermaelen rời khỏi Premier League. Bản th&acirc;n Arsenal cũng đang ở trong thế kh&oacute; trong vụ n&agrave;y&rdquo;.</p>\r\n<p>\r\n	Theo tờ BBC, Arsenal đ&atilde; đồng &yacute; lời đề nghị trị gi&aacute; 15 triệu bảng của Barcelona. Trong thời gian tới, trung vệ người Bỉ sẽ được quyền tự do đ&agrave;m ph&aacute;n với đội b&oacute;ng xứ Catalan.</p>\r\n<p>\r\n	Nhiều khả năng thương vụ n&agrave;y sẽ ho&agrave;n tất trong thời gian tới. Arsenal cũng bắt đầu t&igrave;m người thay thế Vermaelen. L&uacute;c n&agrave;y, ưu ti&ecirc;n số 1 của HLV Wenger l&agrave; trung vệ Nastasic của Man City, người nhiều khả năng sẽ mất vị tr&iacute; nếu như Mangala gia nhập Etihad.</p>\r\n<p align="right">\r\n	<b>H.Long</b></p>\r\n', '', '', 'Vermaelen-d4361.jpg', 1407553674, '0', 2),
(5, ' NHỮNG GÓC KHUẤT CỦA NGHỀ STYLIST CHO SAO HOLLYWOOD ', '', '<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">Điểm nổi bật</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">- &Aacute;o c&ocirc;ng sở được thiết kế đơn giản, nhưng kh&ocirc;ng k&eacute;m phần tinh tế, với form &aacute;o vừa vặn, cổ bẻ, điểm nhấn ở phần tay b&uacute;p sen được may c&aacute;ch điệu, đẹp mắt.</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">- Chất liệu tơ g&acirc;n mềm mịn, th&ocirc;ng tho&aacute;ng v&agrave; thấm h&uacute;t mồ h&ocirc;i tốt, n&ecirc;n tạo được cảm gi&aacute;c thoải m&aacute;i cho người mặc</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">- Ba gam m&agrave;u: hồng, xanh, trắng tươi tắn, trẻ trung, rất dễ để kết hợp với ch&acirc;n v&aacute;y c&ocirc;ng sở, quần t&acirc;y, jeans,&hellip; tạo vẻ ngo&agrave;i chỉn chu khi đi l&agrave;m.</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">- Trọng lượng g&oacute;i h&agrave;ng cả bao b&igrave;: 150 gram</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">&nbsp;</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">Điều kiện</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">- Hotdeal giao sản phẩm theo m&agrave;u đến tận tay kh&aacute;ch h&agrave;ng.</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">+ Đối với khu vực TP.HCM: Miễn ph&iacute;.</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">+ Đối với c&aacute;c tỉnh th&agrave;nh kh&aacute;c: Chuyển ph&aacute;t nhanh theo ph&iacute; bưu điện.</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">- &Aacute;p dụng cho &Aacute;o c&ocirc;ng sở tay b&uacute;p sang trọng</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">- M&agrave;u sắc: hồng, xanh, trắng</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">- K&iacute;ch cỡ: Freesize &nbsp; &nbsp;</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">- Thời gian cuối giao sản phẩm đến hết 23/05/2015, kh&ocirc;ng giao sản phẩm ng&agrave;y chủ nhật.</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">- Kh&aacute;ch h&agrave;ng kh&ocirc;ng b&ugrave; th&ecirc;m tiền khi nhận sản phẩm.</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">- Kh&aacute;ch h&agrave;ng vui l&ograve;ng kiểm tra sản phẩm trước khi nhận h&agrave;ng, Hotdeal kh&ocirc;ng chịu tr&aacute;ch nhiệm đổi trả sản phẩm sau khi giao h&agrave;ng.</div>\r\n', 'Áo Công Sở Tay Búp Sang Trọng – Kiểu Dáng Thời Trang, Chất Liệu Tơ Gân Mềm Mịn, Gam Màu Tươi Tắn – Mang Đến Vẻ Ngoài Trẻ Trung, Duyên Dáng Cho Bạn Gái. Giá 210.000 VNĐ, Còn 125.000 VNĐ, Giảm 40%. ', '', '20.jpg', 1475227436, '0', 0),
(6, ' DIỄM MY 9X GỢI Ý VÁY ÁO CHO MÙA HÈ', '', '<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">- &Aacute;o c&ocirc;ng sở được thiết kế đơn giản, nhưng kh&ocirc;ng k&eacute;m phần tinh tế, với form &aacute;o vừa vặn, cổ bẻ, điểm nhấn ở phần tay b&uacute;p sen được may c&aacute;ch điệu, đẹp mắt.</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">- Chất liệu tơ g&acirc;n mềm mịn, th&ocirc;ng tho&aacute;ng v&agrave; thấm h&uacute;t mồ h&ocirc;i tốt, n&ecirc;n tạo được cảm gi&aacute;c thoải m&aacute;i cho người mặc</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">- Ba gam m&agrave;u: hồng, xanh, trắng tươi tắn, trẻ trung, rất dễ để kết hợp với ch&acirc;n v&aacute;y c&ocirc;ng sở, quần t&acirc;y, jeans,&hellip; tạo vẻ ngo&agrave;i chỉn chu khi đi l&agrave;m.</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">- Trọng lượng g&oacute;i h&agrave;ng cả bao b&igrave;: 150 gram</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">&nbsp;</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">Điều kiện</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">- Hotdeal giao sản phẩm theo m&agrave;u đến tận tay kh&aacute;ch h&agrave;ng.</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">+ Đối với khu vực TP.HCM: Miễn ph&iacute;.</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">+ Đối với c&aacute;c tỉnh th&agrave;nh kh&aacute;c: Chuyển ph&aacute;t nhanh theo ph&iacute; bưu điện.</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">- &Aacute;p dụng cho &Aacute;o c&ocirc;ng sở tay b&uacute;p sang trọng</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">- M&agrave;u sắc: hồng, xanh, trắng</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">- K&iacute;ch cỡ: Freesize &nbsp; &nbsp;</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">- Thời gian cuối giao sản phẩm đến hết 23/05/2015, kh&ocirc;ng giao sản phẩm ng&agrave;y chủ nhật.</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">- Kh&aacute;ch h&agrave;ng kh&ocirc;ng b&ugrave; th&ecirc;m tiền khi nhận sản phẩm.</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 30px;">- Kh&aacute;ch h&agrave;ng vui l&ograve;ng kiểm tra sản phẩm trước khi nhận h&agrave;ng, Hotdeal kh&ocirc;ng chịu tr&aacute;ch nhiệm đổi trả sản phẩm sau khi giao h&agrave;ng.</div>\r\n', 'Áo Công Sở Tay Búp Sang Trọng – Kiểu Dáng Thời Trang, Chất Liệu Tơ Gân Mềm Mịn, Gam Màu Tươi Tắn – Mang Đến Vẻ Ngoài Trẻ Trung, Duyên Dáng Cho Bạn Gái. Giá 210.000 VNĐ, Còn 125.000 VNĐ, Giảm 40%. ', '', 'blog4.jpg', 1475227567, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `transaction_id` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT '0',
  `amount` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `data` text COLLATE utf8_bin NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`transaction_id`, `id`, `product_id`, `qty`, `amount`, `data`, `status`) VALUES
(33, 34, 32, 1, '4750000.0000', '', 0),
(32, 33, 33, 1, '9603000.0000', '', 0),
(31, 32, 21, 1, '14580000.0000', '', 0),
(30, 31, 35, 1, '6300000.0000', '', 0),
(29, 30, 25, 1, '4275000.0000', '', 0),
(28, 29, 21, 1, '14580000.0000', '', 0),
(27, 28, 33, 1, '9603000.0000', '', 0),
(27, 27, 34, 1, '6631000.0000', '', 0),
(26, 26, 35, 1, '6300000.0000', '', 0),
(25, 25, 35, 1, '6300000.0000', '', 0),
(24, 24, 21, 1, '14580000.0000', '', 0),
(23, 23, 32, 1, '4750000.0000', '', 0),
(23, 22, 33, 2, '19206000.0000', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(255) NOT NULL,
  `catalog_id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `maker_id` int(255) NOT NULL,
  `price` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `discount` int(11) NOT NULL,
  `image_link` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `image_list` text COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT '0',
  `meta_key` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `site_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `warranty` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `total` int(255) NOT NULL,
  `buyed` int(255) NOT NULL,
  `rate_total` int(255) NOT NULL,
  `rate_count` int(255) NOT NULL,
  `gifts` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `video` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `meta_desc` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `feature` enum('0','1') CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `specifications` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `catalog_id`, `name`, `maker_id`, `price`, `content`, `discount`, `image_link`, `image_list`, `created`, `view`, `meta_key`, `site_title`, `warranty`, `total`, `buyed`, `rate_total`, `rate_count`, `gifts`, `video`, `meta_desc`, `feature`, `specifications`) VALUES
(21, 37, ' Apple iPhone 6 16GB- Hàng chính hãng    ', 0, '16200000.0000', '<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	H&Agrave;NG NHẬP KHẨU&nbsp;</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	L&agrave; h&agrave;ng được nhập khẩu trực tiếp từ nước ngo&agrave;i bởi doanh nghiệp trong nước, kh&ocirc;ng th&ocirc;ng qua nh&agrave; ph&acirc;n phối ch&iacute;nh thức tại thị trường Việt Nam.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	H&agrave;ng nhập khẩu được nhiều người chọn lựa bởi gi&aacute; th&agrave;nh tốt, chất lượng vẫn được đảm bảo như những sản phẩm được nhập khẩu th&ocirc;ng qua nh&agrave; ph&acirc;n phối ch&iacute;nh thức (v&igrave; được sản xuất từ c&ugrave;ng một nh&agrave; m&aacute;y của h&atilde;ng sản xuất). Hơn nữa, d&ugrave; kh&ocirc;ng được bảo h&agrave;nh tại c&aacute;c trung t&acirc;m bảo h&agrave;nh ch&iacute;nh thức của h&atilde;ng, c&aacute;c sản phẩm n&agrave;y vẫn được &aacute;p dụng đầy đủ ch&iacute;nh s&aacute;ch bảo h&agrave;nh của doanh nghiệp nhập khẩu.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	Lưu &yacute;: Sản phẩm kh&ocirc;ng &aacute;p dụng ch&iacute;nh s&aacute;ch đổi trả h&agrave;ng v&agrave; được bảo h&agrave;nh 1 năm tại đơn vị b&aacute;n h&agrave;ng kể từ ng&agrave;y mua.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	&nbsp;</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	&nbsp;</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	1. Đổi trả theo nhu cầu kh&aacute;ch h&agrave;ng (đổi trả h&agrave;ng v&igrave; kh&ocirc;ng ưng &yacute;):</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	Do t&iacute;nh chất đặc biệt của sản phẩm, rất tiếc ch&uacute;ng t&ocirc;i chưa hỗ trợ đổi trả h&agrave;ng với l&yacute; do n&agrave;y.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	2. H&agrave;ng giao bị bể vỡ hoặc giao sai nội dung:</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	Qu&yacute; kh&aacute;ch h&agrave;ng cần th&ocirc;ng b&aacute;o nhanh nhất cho Lazada.vn trong 48 tiếng kể từ l&uacute;c qu&yacute; kh&aacute;ch nhận h&agrave;ng. Qu&aacute; thời gian tr&ecirc;n, ch&uacute;ng t&ocirc;i xin ph&eacute;p từ chối hỗ trợ.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	Nếu như c&oacute; những chiếc điện thoại kh&ocirc;ng cần quảng c&aacute;o m&agrave; người d&ugrave;ng cũng tự động t&igrave;m đến n&oacute; th&igrave; c&oacute; lẽ iPhone l&agrave; một trong số đ&oacute; iPhone 6 16GB l&agrave; phi&ecirc;n bản mới nhất của h&atilde;ng c&ocirc;ng nghệ &quot;khổng lồ&quot; Apple đ&atilde; ch&iacute;nh thức &ldquo;l&ecirc;n kệ&rdquo; v&agrave;o ng&agrave;y 9/9 thật sự g&acirc;y được ấn tượng mạnh mẽ từ thiết kế cho đến cấu h&igrave;nh. C&oacute; thể n&oacute;i, những sản phẩm mới ra mắt của &quot;quả t&aacute;o khuyết&quot; lu&ocirc;n mang trong m&igrave;nh những cải tiến vượt bậc v&agrave; lần n&agrave;y &ldquo;đứa con cưng&rdquo; iPhone 6 16GB của h&atilde;ng cũng kh&ocirc;ng l&agrave;m người d&ugrave;ng thất vọng. Mời bạn c&ugrave;ng Lazada.vn tham khảo những t&iacute;nh năng độc đ&aacute;o b&ecirc;n cạnh những h&igrave;nh ảnh hấp dẫn của chiếc Smartphone cao cấp n&agrave;y mang lại.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	&nbsp;</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	T&Iacute;NH NĂNG NỔI BẬT</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	Thiết kế cho trải nghiệm phong ph&uacute; hơn</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	iPhone 6 16GB kh&ocirc;ng chỉ đơn giản l&agrave; lớn hơn m&agrave; c&ograve;n tốt hơn về nhiều mặt. M&agrave;n h&igrave;nh lớn nhưng độ mỏng đ&aacute;ng nể chỉ 7.1mm. Mạnh mẽ hơn nhưng vẫn tiết kiệm điện năng hiệu quả. Với thiết kế liền mạch giữa chất liệu thủy tinh v&agrave; kim loại, từng chi tiết được thiết kế kỹ lưỡng để n&acirc;ng cao trải nghiệm sử dụng Smartphone của người d&ugrave;ng. V&igrave; vậy, trong một m&agrave;n h&igrave;nh lớn hơn nhưng người d&ugrave;ng vẫn cảm thấy vừa vặn khi cầm trong tay.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	&nbsp;</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	M&agrave;n h&igrave;nh lớn hơn</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	iPhone 6 16GB sở hữu m&agrave;n h&igrave;nh k&iacute;ch thước lớn hơn bất kỳ chiếc iPhone n&agrave;o trước đ&acirc;y của h&atilde;ng. Với độ rộng m&agrave;n h&igrave;nh l&ecirc;n đến 5.5&rdquo; c&ocirc;ng nghệ LED-backlit IPS LCD cho g&oacute;c nh&igrave;n rộng v&agrave; độ ph&acirc;n giải Retina Full HD 1080x1920px với độ tương phản cao, cho khả năng hiển thị nhiều m&agrave;u sắc hơn v&agrave; thao t&aacute;c đa chạm cực kỳ ch&iacute;nh x&aacute;c. Ngo&agrave;i ra, lớp k&iacute;nh ph&acirc;n cực Polarizer được sử dụng gi&uacute;p chống ch&oacute;i tốt hơn.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	&nbsp;</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	Cực kỳ mạnh mẽ, v&ocirc; c&ugrave;ng hiệu quả</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	iPhone 6 16GB được x&acirc;y dựng tr&ecirc;n kiến tr&uacute;c m&aacute;y t&iacute;nh để b&agrave;n 64-bit v&agrave; Chip A8 thế hệ 2 cải thiện l&ecirc;n đến 20% hiệu năng CPU v&agrave; 50% đồ họa GPU cực kỳ mạnh mẽ. Sức mạnh của m&aacute;y c&ograve;n được tăng cường bởi một một xử l&yacute; phụ M8 gi&uacute;p xử l&yacute; cực kỳ hiệu quả c&aacute;c t&iacute;n hiệu từ những cảm biến. Nhờ đ&oacute;, bạn c&oacute; thể l&agrave;m được nhiều việc hơn, cho thời gian sử dụng d&agrave;i hơn với hiệu suất tốt hơn v&agrave; t&iacute;nh ổn định cao.</div>\r\n', 10, '135-home_default.jpg', '["85-home_default3.jpg","135-home_default2.jpg"]', 1471205886, 67, '', '', 'Sản phẩm không áp dụng chính sách đổi trả. Được bả', 0, 0, 0, 0, '        ', '', 'Màn hình IPS Full HD 4.7\r\nHệ điều hành IOS 8\r\nRAM 1GB; ROM 16GB\r\nCamera phụ 1.2MP\r\nCamera 8.0MP', '0', ''),
(22, 44, 'Microsoft Lumia 640XL 8GB (Đen) ', 0, '8640000.0000', '<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	H&Agrave;NG NHẬP KHẨU&nbsp;</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	L&agrave; h&agrave;ng được nhập khẩu trực tiếp từ nước ngo&agrave;i bởi doanh nghiệp trong nước, kh&ocirc;ng th&ocirc;ng qua nh&agrave; ph&acirc;n phối ch&iacute;nh thức tại thị trường Việt Nam.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	H&agrave;ng nhập khẩu được nhiều người chọn lựa bởi gi&aacute; th&agrave;nh tốt, chất lượng vẫn được đảm bảo như những sản phẩm được nhập khẩu th&ocirc;ng qua nh&agrave; ph&acirc;n phối ch&iacute;nh thức (v&igrave; được sản xuất từ c&ugrave;ng một nh&agrave; m&aacute;y của h&atilde;ng sản xuất). Hơn nữa, d&ugrave; kh&ocirc;ng được bảo h&agrave;nh tại c&aacute;c trung t&acirc;m bảo h&agrave;nh ch&iacute;nh thức của h&atilde;ng, c&aacute;c sản phẩm n&agrave;y vẫn được &aacute;p dụng đầy đủ ch&iacute;nh s&aacute;ch bảo h&agrave;nh của doanh nghiệp nhập khẩu.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	Lưu &yacute;: Sản phẩm kh&ocirc;ng &aacute;p dụng ch&iacute;nh s&aacute;ch đổi trả h&agrave;ng v&agrave; được bảo h&agrave;nh 1 năm tại đơn vị b&aacute;n h&agrave;ng kể từ ng&agrave;y mua.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	&nbsp;</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	&nbsp;</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	1. Đổi trả theo nhu cầu kh&aacute;ch h&agrave;ng (đổi trả h&agrave;ng v&igrave; kh&ocirc;ng ưng &yacute;):</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	Do t&iacute;nh chất đặc biệt của sản phẩm, rất tiếc ch&uacute;ng t&ocirc;i chưa hỗ trợ đổi trả h&agrave;ng với l&yacute; do n&agrave;y.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	2. H&agrave;ng giao bị bể vỡ hoặc giao sai nội dung:</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	Qu&yacute; kh&aacute;ch h&agrave;ng cần th&ocirc;ng b&aacute;o nhanh nhất cho Lazada.vn trong 48 tiếng kể từ l&uacute;c qu&yacute; kh&aacute;ch nhận h&agrave;ng. Qu&aacute; thời gian tr&ecirc;n, ch&uacute;ng t&ocirc;i xin ph&eacute;p từ chối hỗ trợ.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	Nếu như c&oacute; những chiếc điện thoại kh&ocirc;ng cần quảng c&aacute;o m&agrave; người d&ugrave;ng cũng tự động t&igrave;m đến n&oacute; th&igrave; c&oacute; lẽ iPhone l&agrave; một trong số đ&oacute; iPhone 6 16GB l&agrave; phi&ecirc;n bản mới nhất của h&atilde;ng c&ocirc;ng nghệ &quot;khổng lồ&quot; Apple đ&atilde; ch&iacute;nh thức &ldquo;l&ecirc;n kệ&rdquo; v&agrave;o ng&agrave;y 9/9 thật sự g&acirc;y được ấn tượng mạnh mẽ từ thiết kế cho đến cấu h&igrave;nh. C&oacute; thể n&oacute;i, những sản phẩm mới ra mắt của &quot;quả t&aacute;o khuyết&quot; lu&ocirc;n mang trong m&igrave;nh những cải tiến vượt bậc v&agrave; lần n&agrave;y &ldquo;đứa con cưng&rdquo; iPhone 6 16GB của h&atilde;ng cũng kh&ocirc;ng l&agrave;m người d&ugrave;ng thất vọng. Mời bạn c&ugrave;ng Lazada.vn tham khảo những t&iacute;nh năng độc đ&aacute;o b&ecirc;n cạnh những h&igrave;nh ảnh hấp dẫn của chiếc Smartphone cao cấp n&agrave;y mang lại.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	&nbsp;</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	T&Iacute;NH NĂNG NỔI BẬT</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	Thiết kế cho trải nghiệm phong ph&uacute; hơn</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	iPhone 6 16GB kh&ocirc;ng chỉ đơn giản l&agrave; lớn hơn m&agrave; c&ograve;n tốt hơn về nhiều mặt. M&agrave;n h&igrave;nh lớn nhưng độ mỏng đ&aacute;ng nể chỉ 7.1mm. Mạnh mẽ hơn nhưng vẫn tiết kiệm điện năng hiệu quả. Với thiết kế liền mạch giữa chất liệu thủy tinh v&agrave; kim loại, từng chi tiết được thiết kế kỹ lưỡng để n&acirc;ng cao trải nghiệm sử dụng Smartphone của người d&ugrave;ng. V&igrave; vậy, trong một m&agrave;n h&igrave;nh lớn hơn nhưng người d&ugrave;ng vẫn cảm thấy vừa vặn khi cầm trong tay.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	&nbsp;</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	M&agrave;n h&igrave;nh lớn hơn</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	iPhone 6 16GB sở hữu m&agrave;n h&igrave;nh k&iacute;ch thước lớn hơn bất kỳ chiếc iPhone n&agrave;o trước đ&acirc;y của h&atilde;ng. Với độ rộng m&agrave;n h&igrave;nh l&ecirc;n đến 5.5&rdquo; c&ocirc;ng nghệ LED-backlit IPS LCD cho g&oacute;c nh&igrave;n rộng v&agrave; độ ph&acirc;n giải Retina Full HD 1080x1920px với độ tương phản cao, cho khả năng hiển thị nhiều m&agrave;u sắc hơn v&agrave; thao t&aacute;c đa chạm cực kỳ ch&iacute;nh x&aacute;c. Ngo&agrave;i ra, lớp k&iacute;nh ph&acirc;n cực Polarizer được sử dụng gi&uacute;p chống ch&oacute;i tốt hơn.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	&nbsp;</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	Cực kỳ mạnh mẽ, v&ocirc; c&ugrave;ng hiệu quả</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	iPhone 6 16GB được x&acirc;y dựng tr&ecirc;n kiến tr&uacute;c m&aacute;y t&iacute;nh để b&agrave;n 64-bit v&agrave; Chip A8 thế hệ 2 cải thiện l&ecirc;n đến 20% hiệu năng CPU v&agrave; 50% đồ họa GPU cực kỳ mạnh mẽ. Sức mạnh của m&aacute;y c&ograve;n được tăng cường bởi một một xử l&yacute; phụ M8 gi&uacute;p xử l&yacute; cực kỳ hiệu quả c&aacute;c t&iacute;n hiệu từ những cảm biến. Nhờ đ&oacute;, bạn c&oacute; thể l&agrave;m được nhiều việc hơn, cho thời gian sử dụng d&agrave;i hơn với hiệu suất tốt hơn v&agrave; t&iacute;nh ổn định cao.</div>\r\n', 10, '102-home_default.jpg', '["102-home_default1.jpg"]', 1471254579, 35, '', '', 'Sản phẩm không áp dụng chính sách đổi trả. Được bả', 0, 0, 0, 0, ' không ', '', '', '0', ''),
(23, 44, ' Samsung Galaxy Grand Prime G530 8GB (Đen)', 0, '4680000.0000', '<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	H&Agrave;NG NHẬP KHẨU&nbsp;</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	L&agrave; h&agrave;ng được nhập khẩu trực tiếp từ nước ngo&agrave;i bởi doanh nghiệp trong nước, kh&ocirc;ng th&ocirc;ng qua nh&agrave; ph&acirc;n phối ch&iacute;nh thức tại thị trường Việt Nam.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	H&agrave;ng nhập khẩu được nhiều người chọn lựa bởi gi&aacute; th&agrave;nh tốt, chất lượng vẫn được đảm bảo như những sản phẩm được nhập khẩu th&ocirc;ng qua nh&agrave; ph&acirc;n phối ch&iacute;nh thức (v&igrave; được sản xuất từ c&ugrave;ng một nh&agrave; m&aacute;y của h&atilde;ng sản xuất). Hơn nữa, d&ugrave; kh&ocirc;ng được bảo h&agrave;nh tại c&aacute;c trung t&acirc;m bảo h&agrave;nh ch&iacute;nh thức của h&atilde;ng, c&aacute;c sản phẩm n&agrave;y vẫn được &aacute;p dụng đầy đủ ch&iacute;nh s&aacute;ch bảo h&agrave;nh của doanh nghiệp nhập khẩu.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	Lưu &yacute;: Sản phẩm kh&ocirc;ng &aacute;p dụng ch&iacute;nh s&aacute;ch đổi trả h&agrave;ng v&agrave; được bảo h&agrave;nh 1 năm tại đơn vị b&aacute;n h&agrave;ng kể từ ng&agrave;y mua.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	&nbsp;</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	&nbsp;</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	1. Đổi trả theo nhu cầu kh&aacute;ch h&agrave;ng (đổi trả h&agrave;ng v&igrave; kh&ocirc;ng ưng &yacute;):</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	Do t&iacute;nh chất đặc biệt của sản phẩm, rất tiếc ch&uacute;ng t&ocirc;i chưa hỗ trợ đổi trả h&agrave;ng với l&yacute; do n&agrave;y.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	2. H&agrave;ng giao bị bể vỡ hoặc giao sai nội dung:</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	Qu&yacute; kh&aacute;ch h&agrave;ng cần th&ocirc;ng b&aacute;o nhanh nhất cho Lazada.vn trong 48 tiếng kể từ l&uacute;c qu&yacute; kh&aacute;ch nhận h&agrave;ng. Qu&aacute; thời gian tr&ecirc;n, ch&uacute;ng t&ocirc;i xin ph&eacute;p từ chối hỗ trợ.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	Nếu như c&oacute; những chiếc điện thoại kh&ocirc;ng cần quảng c&aacute;o m&agrave; người d&ugrave;ng cũng tự động t&igrave;m đến n&oacute; th&igrave; c&oacute; lẽ iPhone l&agrave; một trong số đ&oacute; iPhone 6 16GB l&agrave; phi&ecirc;n bản mới nhất của h&atilde;ng c&ocirc;ng nghệ &quot;khổng lồ&quot; Apple đ&atilde; ch&iacute;nh thức &ldquo;l&ecirc;n kệ&rdquo; v&agrave;o ng&agrave;y 9/9 thật sự g&acirc;y được ấn tượng mạnh mẽ từ thiết kế cho đến cấu h&igrave;nh. C&oacute; thể n&oacute;i, những sản phẩm mới ra mắt của &quot;quả t&aacute;o khuyết&quot; lu&ocirc;n mang trong m&igrave;nh những cải tiến vượt bậc v&agrave; lần n&agrave;y &ldquo;đứa con cưng&rdquo; iPhone 6 16GB của h&atilde;ng cũng kh&ocirc;ng l&agrave;m người d&ugrave;ng thất vọng. Mời bạn c&ugrave;ng Lazada.vn tham khảo những t&iacute;nh năng độc đ&aacute;o b&ecirc;n cạnh những h&igrave;nh ảnh hấp dẫn của chiếc Smartphone cao cấp n&agrave;y mang lại.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	&nbsp;</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	T&Iacute;NH NĂNG NỔI BẬT</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	Thiết kế cho trải nghiệm phong ph&uacute; hơn</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	iPhone 6 16GB kh&ocirc;ng chỉ đơn giản l&agrave; lớn hơn m&agrave; c&ograve;n tốt hơn về nhiều mặt. M&agrave;n h&igrave;nh lớn nhưng độ mỏng đ&aacute;ng nể chỉ 7.1mm. Mạnh mẽ hơn nhưng vẫn tiết kiệm điện năng hiệu quả. Với thiết kế liền mạch giữa chất liệu thủy tinh v&agrave; kim loại, từng chi tiết được thiết kế kỹ lưỡng để n&acirc;ng cao trải nghiệm sử dụng Smartphone của người d&ugrave;ng. V&igrave; vậy, trong một m&agrave;n h&igrave;nh lớn hơn nhưng người d&ugrave;ng vẫn cảm thấy vừa vặn khi cầm trong tay.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	&nbsp;</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	M&agrave;n h&igrave;nh lớn hơn</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	iPhone 6 16GB sở hữu m&agrave;n h&igrave;nh k&iacute;ch thước lớn hơn bất kỳ chiếc iPhone n&agrave;o trước đ&acirc;y của h&atilde;ng. Với độ rộng m&agrave;n h&igrave;nh l&ecirc;n đến 5.5&rdquo; c&ocirc;ng nghệ LED-backlit IPS LCD cho g&oacute;c nh&igrave;n rộng v&agrave; độ ph&acirc;n giải Retina Full HD 1080x1920px với độ tương phản cao, cho khả năng hiển thị nhiều m&agrave;u sắc hơn v&agrave; thao t&aacute;c đa chạm cực kỳ ch&iacute;nh x&aacute;c. Ngo&agrave;i ra, lớp k&iacute;nh ph&acirc;n cực Polarizer được sử dụng gi&uacute;p chống ch&oacute;i tốt hơn.</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	&nbsp;</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	Cực kỳ mạnh mẽ, v&ocirc; c&ugrave;ng hiệu quả</div>\r\n<div style="box-sizing: border-box; color: rgb(51, 51, 51); font-family: Arial, Helvetica, sans-serif; line-height: 30px;">\r\n	iPhone 6 16GB được x&acirc;y dựng tr&ecirc;n kiến tr&uacute;c m&aacute;y t&iacute;nh để b&agrave;n 64-bit v&agrave; Chip A8 thế hệ 2 cải thiện l&ecirc;n đến 20% hiệu năng CPU v&agrave; 50% đồ họa GPU cực kỳ mạnh mẽ. Sức mạnh của m&aacute;y c&ograve;n được tăng cường bởi một một xử l&yacute; phụ M8 gi&uacute;p xử l&yacute; cực kỳ hiệu quả c&aacute;c t&iacute;n hiệu từ những cảm biến. Nhờ đ&oacute;, bạn c&oacute; thể l&agrave;m được nhiều việc hơn, cho thời gian sử dụng d&agrave;i hơn với hiệu suất tốt hơn v&agrave; t&iacute;nh ổn định cao.</div>\r\n', 5, '91-home_default.jpg', '["91-home_default1.jpg"]', 1471255175, 18, '', '', 'không', 0, 0, 0, 0, 'không', '', '', '0', ''),
(24, 40, ' HTC Desire 526G 8GB - hàng chính hãng', 0, '5000000.0000', '', 10, '96-home_default.jpg', '["96-home_default1.jpg"]', 1471255584, 25, '', '', '12 tháng', 0, 0, 0, 0, 'full phụ kiện ', '', '', '0', ''),
(25, 40, ' Asus Zenfone 5 A501 1G-8GB (Trắng) - Hàng nhập khẩu', 0, '4500000.0000', '', 5, '98-home_default.jpg', '["98-home_default1.jpg"]', 1471255745, 1, '', '', '12 tháng', 0, 0, 0, 0, 'không', '', '', '0', ''),
(26, 39, ' Nokia Lumia 535 8GB SIM (Đen) ', 0, '4500000.0000', '', 10, '97-home_default.jpg', '["97-home_default1.jpg"]', 1471289947, 0, '', '', 'không', 0, 0, 0, 0, ' không ', '', '', '0', ''),
(27, 37, 'Apple iPhone 5s 16GB - Hàng nhập ..  ', 0, '7000000.0000', '', 10, '85-home_default.jpg', '["85-home_default1.jpg"]', 1471319810, 15, '', '', '12 tháng', 0, 0, 0, 0, '  không  ', '', '', '0', '<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 24px;">M&agrave;n h&igrave;nh IPS Full HD 4.7</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 24px;">Hệ điều h&agrave;nh IOS 8</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 24px;">RAM 1GB; ROM 16GB</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 24px;">Camera phụ 1.2MP</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 24px;">Camera 8.0MP</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 24px;">Bảo mật v&acirc;n tay</div>\r\n\r\n<div style="box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 12px; line-height: 24px;">Sản phẩm kh&ocirc;ng &aacute;p dụng ch&iacute;nh s&aacute;ch đổi trả. Được bảo h&agrave;nh 1 năm tại đơn vị b&aacute;n kể từ ng&agrave;y nhận h&agrave;ng</div>\r\n'),
(28, 48, ' Máy tính bảng Apple iPad Mini 16GG ', 0, '16200000.0000', '', 5, '114-home_default.jpg', '[]', 1471321496, 1, '', '', '12 tháng', 0, 0, 0, 0, ' khoong ', '', '', '0', ''),
(29, 47, ' Samsung Galaxy Grand Prime G530 8GB 2 SIM (Vàng)', 0, '7020000.0000', '', 10, '82-home_default.jpg', '[]', 1471333343, 0, '', '', '12 tháng', 0, 0, 0, 0, 'không', '', '', '0', ''),
(30, 49, ' Asus Zenfone 5 A501 2G-16GB 2SIM (Trắng) – Hàng nhập khẩu   ', 0, '16000000.0000', '', 10, 'gsmarena_001-700x390.jpg', '[]', 1471333493, 0, '', '', '12 tháng', 0, 0, 0, 0, ' không ', '', '', '0', ''),
(31, 48, ' Máy tính bảng Apple iPad Air 2 16GB 3G (Xám) - Hàng nhập khẩu', 0, '11000000.0000', '', 10, '116-home_default.jpg', '[]', 1471333638, 4, '', '', '12 tháng', 0, 0, 0, 0, 'không', '', '', '0', ''),
(32, 37, ' Điện Thoại iPhone 5S 16GB FPT - Chưa Active Đủ Bảo Hành   ', 0, '5000000.0000', '', 5, '85-home_default2.jpg', '[]', 1471333874, 6, '', '', '12 tháng', 0, 0, 0, 0, '   không   ', '', '', '0', ''),
(33, 36, ' Điện Thoại iPhone 6 64GB (Xám/Trắng/ Vàng) Chưa Active - TBH', 0, '10670000.0000', '', 10, 'iphone6-sizes-800x636-1-gd.jpg', '[]', 1471334052, 9, '', '', '12 tháng', 0, 0, 0, 0, 'không', '', '', '0', ''),
(34, 48, ' Máy tính bảng Apple iPad Air 2 16GB 3G (Gold) - Hàng nhập khẩu', 0, '6980000.0000', '', 5, '134-home_default.jpg', '[]', 1471335057, 24, '', '', '12 tháng', 0, 0, 0, 0, 'không', '', '', '0', ''),
(35, 52, ' Tivi LCD   ', 0, '7000000.0000', '', 10, '102-home_default2.jpg', '["product71.jpg"]', 1471522178, 17, '', '', 'không', 0, 0, 0, 0, '   dsdsd   ', '', '', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `image_link` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `info` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sort_order` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` bigint(20) NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8_bin NOT NULL,
  `user_phone` varchar(20) COLLATE utf8_bin NOT NULL,
  `address` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(15,4) NOT NULL DEFAULT '0.0000',
  `payment` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `payment_info` text COLLATE utf8_bin NOT NULL,
  `message` varchar(255) COLLATE utf8_bin NOT NULL,
  `Transport` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `security` varchar(16) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `type`, `status`, `user_id`, `user_name`, `user_email`, `user_phone`, `address`, `amount`, `payment`, `payment_info`, `message`, `Transport`, `security`, `created`) VALUES
(31, 0, 0, 20, 'Nguyễn Văn Dược', 'nguyenvanduoc071994@gmail.com', '01659020898', 'Tây Đô Hưng Hà Thái Bình', '14580000.0000', 'Sau_khi_nhan_duoc_hang', '', '', 'chuyen phat nhanh', '', 1475475033),
(30, 0, 0, 20, 'Nguyễn Văn Dược', 'nguyenvanduoc071994@gmail.com', '01659020898', 'Tây Đô Hưng Hà Thái Bình', '6300000.0000', 'Sau_khi_nhan_duoc_hang', '', '', 'chuyen phat nhanh', '', 1475474172),
(26, 0, 0, 20, 'Nguyễn Văn Dược', 'nguyenvanduoc071994@gmail.com', '01659020898', 'Tây Đô Hưng Hà Thái Bình', '6300000.0000', 'Sau khi nhận được hàng', '', '', 'chuyen phat nhanh', '', 1475106595),
(23, 0, 0, 0, 'testGeoserver', 'nguyenvanduoc071994@gmail.com', '01659200565', 'vnvbmnvbnvb', '23956000.0000', 'Sau khi nhận được hàng', '', '', 'chuyen phat nhanh', '', 1475104450),
(24, 0, 0, 0, 'testGeoserver', 'nguyenvanduoc071994@gmail.com', '01659200565', '11', '14580000.0000', 'qua tai khoản ngân lượng', '', '', 'Giữ hàng', '', 1475104629),
(25, 0, 0, 0, ' Ốp lưng Lumia 535 Nhựa in Biển Xanh', 'nguyenvanduoc071994@gmail.com', '01659200565', '11', '6300000.0000', 'Sau khi nhận được hàng', '', '', 'Giữ hàng', '', 1475104709),
(29, 0, 0, 20, 'Nguyễn Văn Dược', 'nguyenvanduoc071994@gmail.com', '01659020898', 'Tây Đô Hưng Hà Thái Bình', '4275000.0000', 'Sau_khi_nhan_duoc_hang', '', '', 'chuyen phat nhanh', '', 1475474066),
(28, 0, 0, 20, 'Nguyễn Văn Dược', 'nguyenvanduoc071994@gmail.com', '01659020898', 'Tây Đô Hưng Hà Thái Bình', '14580000.0000', 'Sau khi nhận được hàng', '', '', 'Giữ hàng', '', 1475473770),
(27, 0, 0, 20, 'Nguyễn Văn Dược', 'nguyenvanduoc071994@gmail.com', '01659020898', 'Tây Đô Hưng Hà Thái Bình', '16234000.0000', 'Sau khi nhận được hàng', '', '', 'chuyen phat nhanh', '', 1475473623),
(32, 0, 0, 20, 'Nguyễn Văn Dược', 'nguyenvanduoc071994@gmail.com', '01659020898', 'Tây Đô Hưng Hà Thái Bình', '9603000.0000', 'Sau_khi_nhan_duoc_hang', '', '', 'Giữ hàng', '', 1475475074),
(33, 0, 0, 20, 'Nguyễn Văn Dược', 'nguyenvanduoc071994@gmail.com', '01659020898', 'Tây Đô Hưng Hà Thái Bình', '4750000.0000', 'ngan_luong', '', '', 'chuyen phat nhanh', '', 1475475413);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `sex` tinyint(5) NOT NULL,
  `password` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `user_name`, `email`, `phone`, `address`, `sex`, `password`, `created`) VALUES
(20, 'nguyenduoc', 'Nguyễn Văn Dược', 'nguyenvanduoc071994@gmail.com', '01659020898', 'Tây Đô Hưng Hà Thái Bình', 1, '25f9e794323b453885f5181f1b624d0b', 1475105434);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `info` ADD FULLTEXT KEY `title` (`title`);

--
-- Indexes for table `maker`
--
ALTER TABLE `maker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `news` ADD FULLTEXT KEY `title` (`title`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `product` ADD FULLTEXT KEY `name` (`name`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `maker`
--
ALTER TABLE `maker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
