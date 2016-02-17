-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2015 at 03:27 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rammus`
--

-- --------------------------------------------------------

--
-- Table structure for table `cates`
--

CREATE TABLE IF NOT EXISTS `cates` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cates`
--

INSERT INTO `cates` (`id`, `name`, `slug`, `icon`, `image`, `order`, `description`, `parent_id`, `created_at`, `updated_at`) VALUES
(7, 'Trang Phục', 'trang-phuc', 'fa fa-male', '100', 1, 'Trang phục dành cho nam.', 0, '2015-11-19 04:02:07', '2015-11-19 04:02:07'),
(8, 'Áo', 'ao', '', '', 10, '', 7, '2015-11-19 04:02:39', '2015-11-19 04:02:39'),
(9, 'Áo Sơ Mi', 'ao-so-mi', '', '', 11, '', 7, '2015-11-19 04:03:08', '2015-11-19 04:03:08'),
(10, 'Áo Khoác và Áo Len', 'ao-khoac-va-ao-len', '', '', 12, '', 7, '2015-11-19 04:03:23', '2015-11-19 04:04:42'),
(11, 'Quần', 'quan', '', '', 13, '', 7, '2015-11-19 04:03:43', '2015-11-19 04:04:34'),
(12, 'Đồ Lót', 'do-lot', '', '', 14, '', 7, '2015-11-19 04:04:03', '2015-11-19 04:04:03'),
(13, 'Tất', 'tat', '', '', 15, '', 7, '2015-11-19 04:04:18', '2015-11-19 04:04:18'),
(14, 'Giày', 'giay', 'fa fa-meh-o', '101', 2, '', 0, '2015-11-19 04:16:10', '2015-11-19 05:50:36'),
(15, 'Giày Lười và Giày Mọi', 'giay-luoi-va-giay-moi', '', '', 10, '', 14, '2015-11-19 04:17:28', '2015-11-19 04:17:28'),
(16, 'Giày Tây', 'giay-tay', '', '', 21, '', 14, '2015-11-19 04:17:41', '2015-11-19 04:17:41'),
(17, 'Giày Cổ Đan', 'giay-co-dan', '', '', 22, '', 14, '2015-11-19 04:18:05', '2015-11-19 04:18:05'),
(18, 'Giày Xăng Đan', 'giay-xang-dan', '', '', 23, '', 14, '2015-11-19 04:18:50', '2015-11-19 04:19:08'),
(19, 'Dép', 'dep', '', '', 24, '', 14, '2015-11-19 04:19:25', '2015-11-19 04:19:25'),
(20, 'Giày Dép Thể Thao', 'giay-dep-the-thao', '', '', 25, '', 14, '2015-11-19 04:19:52', '2015-11-19 04:19:52'),
(21, 'Phụ Kiện', 'phu-kien', 'fa fa-male', '103', 3, '', 0, '2015-11-19 04:20:54', '2015-11-19 05:58:54'),
(22, 'Âu Phục và Cà Vạt', 'au-phuc-va-ca-vat', '', '', 30, '', 21, '2015-11-19 04:21:16', '2015-11-19 04:21:16'),
(23, 'Trang Sức', 'trang-suc', '', '', 31, '', 21, '2015-11-19 04:21:38', '2015-11-19 04:21:38'),
(24, 'Găng Tay', 'gang-tay', '', '', 32, '', 21, '2015-11-19 04:21:56', '2015-11-19 04:21:56'),
(25, 'Túi Xách', 'tui-xach', 'fa fa-male', '102', 4, '', 0, '2015-11-19 04:22:56', '2015-11-19 05:56:58'),
(26, 'Ví Tiền', 'vi-tien', '', '', 40, '', 25, '2015-11-19 04:23:16', '2015-11-19 04:23:16'),
(27, 'Balo Thời Trang', 'balo-thoi-trang', '', '', 41, '', 25, '2015-11-19 04:23:39', '2015-11-19 04:23:39'),
(28, 'Vali', 'vali', '', '', 42, '', 25, '2015-11-19 04:23:57', '2015-11-19 04:23:57'),
(29, 'Balo và Túi Laptop', 'balo-va-tui-laptop', '', '', 43, '', 25, '2015-11-19 04:24:31', '2015-11-19 04:28:45'),
(30, 'Đồng Hồ', 'dong-ho', 'fa fa-male', '', 5, '', 0, '2015-11-19 04:25:26', '2015-11-19 04:25:26'),
(31, 'Đặc Biệt', 'dac-biet', 'fa fa-male', '', 6, '', 0, '2015-11-19 04:28:22', '2015-11-19 04:28:22');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE IF NOT EXISTS `colors` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(2, 'Trắng', '#ffffff', '2015-11-17 09:46:09', '2015-11-17 09:46:09'),
(3, 'Đỏ', '#ff0000', '2015-11-17 09:46:30', '2015-11-17 09:46:30'),
(4, 'Cam', '#ff8000', '2015-11-17 10:02:05', '2015-11-17 10:02:05'),
(5, 'Tím', '#800080', '2015-11-17 10:18:08', '2015-11-17 10:18:08'),
(6, 'Đen', '#000000', '2015-11-17 10:44:31', '2015-11-17 10:44:31'),
(7, 'Xanh', '#00ff40', '2015-11-17 10:45:22', '2015-11-17 11:26:54'),
(8, 'Nâu', '#804000', '2015-11-17 13:32:17', '2015-11-17 13:32:17');

-- --------------------------------------------------------

--
-- Table structure for table `infos`
--

CREATE TABLE IF NOT EXISTS `infos` (
  `id` int(11) NOT NULL,
  `about` longtext COLLATE utf8_unicode_ci NOT NULL,
  `contact` text COLLATE utf8_unicode_ci NOT NULL,
  `page` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `infos`
--

INSERT INTO `infos` (`id`, `about`, `contact`, `page`) VALUES
(1, 'a:3:{s:5:"title";s:59:"ITPLUS ACADEMY – HỌC VÀ LÀM THEO DỰ ÁN THỰC TẾ";s:4:"slug";s:44:"itplus-academy-hoc-va-lam-theo-du-an-thuc-te";s:7:"content";s:10148:"<p><a href="http://itplus-academy.edu.vn/">ITPlus Academy</a>&nbsp;l&agrave; đơn vị trực thuộc Viện C&ocirc;ng nghệ th&ocirc;ng tin, Đại học Quốc Gia H&agrave; Nội. Đ&acirc;y l&agrave; cơ sở đ&agrave;o tạo nguồn nh&acirc;n lực C&ocirc;ng nghệ th&ocirc;ng tin chất lượng cao cho rất nhiều doanh nghiệp trong nước.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;L&agrave; đơn vị c&oacute; uy t&iacute;n trong lĩnh vực đ&agrave;o tạo kỹ năng C&ocirc;ng nghệ th&ocirc;ng tin với c&aacute;c chương tr&igrave;nh đ&agrave;o tạo được thiết kế theo y&ecirc;u cầu thực tế, ITPlus lu&ocirc;n đi đầu trong c&ocirc;ng t&aacute;c gi&aacute;o dục, với gi&aacute;o tr&igrave;nh l&agrave; những t&agrave;i liệu từ c&aacute;c doanh nghiệp gửi về, chương tr&igrave;nh học gắn với những dự &aacute;n CNTT thực tế.</p>\r\n\r\n<p>Địa chỉ: Tầng 5, Nh&agrave; E3, Đại học Quốc gia H&agrave; Nội</p>\r\n\r\n<p>Số 144 Xu&acirc;n Thuỷ, Cầu Giấy, H&agrave; Nội</p>\r\n\r\n<p>Điện thoại:04 3754 6732 Hotline 0963 72 65 65</p>\r\n\r\n<p>Email: info@itplus-academy.edu.vn</p>\r\n\r\n<p>Website: http://itplus-academy.edu.vn</p>\r\n\r\n<p>CHƯƠNG TR&Igrave;NH Đ&Agrave;O TẠO</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Hiện tại, ITPlus Academy đang triển khai chương tr&igrave;nh học v&agrave; kh&oacute;a học cấp chứng chỉ kỹ năng c&ocirc;ng nghệ th&ocirc;ng tin sau:</p>\r\n\r\n<p>Chương tr&igrave;nh d&agrave;i hạn:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<ul>\r\n	<li>Chương tr&igrave;nh&nbsp;<a href="http://itplus-academy.edu.vn/Thiet-ke-do-hoa-Truyen-thong-da-phuong-tien.html">Thiết kế Đồ họa - Truyền th&ocirc;ng đa phương tiện</a></li>\r\n	<li>Chương tr&igrave;nh&nbsp;<a href="http://itplus-academy.edu.vn/Lap-trinh-ung-dung.html">Lập tr&igrave;nh ứng dụng</a></li>\r\n</ul>\r\n\r\n<p>Chương tr&igrave;nh ngắn hạn:</p>\r\n\r\n<ul>\r\n	<li>Kh&oacute;a học Thiết kế v&agrave; lập tr&igrave;nh web chuy&ecirc;n nghiệp &ndash; M&atilde; đ&agrave;o tạo: WDP</li>\r\n	<li>Kh&oacute;a học Lập tr&igrave;nh ứng dụng di động Window Phone &ndash; M&atilde; đ&agrave;o tạo: WPH</li>\r\n	<li>Kh&oacute;a học Lập tr&igrave;nh ứng dụng di động iOS &ndash; M&atilde; đ&agrave;o tạo: iOS</li>\r\n	<li>Kh&oacute;a học&nbsp;<a href="http://itplus-academy.edu.vn/Khoa-hoc-Kiem-thu-phan-mem-Tester.html">Kiểm thử phần mềm</a>&nbsp;&ndash; M&atilde; đ&agrave;o tạo: TEST</li>\r\n	<li>Kh&oacute;a học&nbsp;<a href="http://itplus-academy.edu.vn/Khoa-hoc-Lap-trinh-Web-voi-Java.html">Lập tr&igrave;nh Web với Java</a>&nbsp;&ndash; M&atilde; đ&agrave;o tạo: WEBJ</li>\r\n	<li>Kh&oacute;a học&nbsp;<a href="http://itplus-academy.edu.vn/Khoa-hoc-Lap-trinh-Web-voi-ASPNET.html">Lập tr&igrave;nh Web với ASP.NET</a>&nbsp;&ndash; M&atilde; đ&agrave;o tạo: WEB.NET</li>\r\n	<li>Kh&oacute;a học&nbsp;<a href="http://itplus-academy.edu.vn/Khoa-Thiet-ke-do-hoa-chuyen-nghiep.html">Thiết kế đồ họa chuy&ecirc;n nghiệp</a>&nbsp;&ndash; M&atilde; đ&atilde; cấp: GM</li>\r\n	<li>Kh&oacute;a học Thiết kế Giao diện Web chuy&ecirc;n nghiệp &ndash; M&atilde; đ&atilde; cấp: WD</li>\r\n	<li>Kh&oacute;a học L&agrave;m phim hoạt h&igrave;nh 3D v&agrave; Quảng c&aacute;o &ndash; M&atilde; đ&atilde; cấp: MA</li>\r\n	<li>Kh&oacute;a học Thiết kế v&agrave; Diễn họa nội thất &ndash; M&atilde; đ&atilde; cấp: 3D</li>\r\n	<li>Kh&oacute;a học Lập tr&igrave;nh Web m&atilde; nguồn mở - M&atilde; đ&atilde; cấp: WP</li>\r\n	<li>Kh&oacute;a học&nbsp;<a href="http://itplus-academy.edu.vn/Khoa-hoc-Lap-trinh-Ung-dung-Di-dong-Android-chuyen-nghiep.html">Lập tr&igrave;nh ứng dụng di động Android</a>&nbsp;&ndash; M&atilde; đ&atilde; cấp: AD</li>\r\n	<li>Kh&oacute;a học Lập tr&igrave;nh C&ocirc;ng nghệ .Net &ndash; M&atilde; đ&atilde; cấp: MN</li>\r\n	<li>Kh&oacute;a học Lập tr&igrave;nh c&ocirc;ng nghệ Java &ndash; M&atilde; đ&atilde; cấp: JP</li>\r\n</ul>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Đ&acirc;y l&agrave; c&aacute;c kh&oacute;a học đ&atilde; được Viện C&ocirc;ng nghệ th&ocirc;ng tin, Đại học Quốc gia H&agrave; Nội thẩm định v&agrave; ph&ecirc; duyệt chương tr&igrave;nh đ&agrave;o tạo.</p>\r\n\r\n<p>VĂN BẰNG - CHỨNG CHỈ</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Sau mỗi kh&oacute;a học, học vi&ecirc;n được cấp chứng chỉ kỹ năng c&ocirc;ng nghệ th&ocirc;ng tin của Viện C&ocirc;ng Nghệ Th&ocirc;ng Tin &ndash; ĐHQG H&agrave; Nội. Chứng chỉ c&oacute; hiệu lực cấp Quốc gia.</p>\r\n\r\n<p>TẦM NH&Igrave;N</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;ITPlus Academy phấn đấu trở th&agrave;nh đơn vị đ&agrave;o tạo nguồn nh&acirc;n lực c&oacute; kỹ năng về C&ocirc;ng nghệ th&ocirc;ng tin chất lượng cao, l&agrave; cầu nối quan trọng v&agrave; uy t&iacute;n giữa doanh nghiệp với nh&acirc;n lực ng&agrave;nh C&ocirc;ng nghệ th&ocirc;ng tin.</p>\r\n\r\n<p>SỨ MỆNH</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Đối với học vi&ecirc;n: Đ&agrave;o tạo chuy&ecirc;n nghiệp, cung cấp kiến thức, kỹ năng CNTT cũng như tạo cơ hội việc l&agrave;m v&agrave; cơ hội tiếp cận gần hơn với nh&agrave; tuyển dụng.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Đối với c&aacute;c doanh nghiệp: Cung cấp nguồn nh&acirc;n lực được trang bị c&aacute;c kỹ năng về c&ocirc;ng nghệ th&ocirc;ng tin, đảm bảo nguồn nh&acirc;n lực chất lượng cao đ&aacute;p ứng c&aacute;c dự &aacute;n thực tế của doanh nghiệp.</p>\r\n\r\n<p>Đến với dự &aacute;n đ&agrave;o tạo ITPlus Academy &quot;<em>Học v&agrave; L&agrave;m theo dự &aacute;n thực tế</em>&rdquo;</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Học vi&ecirc;n được học trong một m&ocirc;i trường năng động, s&aacute;ng tạo với đội ngũ giảng vi&ecirc;n gi&agrave;u kinh nghiệm thực tế, đ&atilde; v&agrave; đang l&agrave;m việc tại c&aacute;c Doanh nghiệp phần mềm v&agrave; thiết kế lớn.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;B&agrave;i giảng được thiết kế dựa tr&ecirc;n một dự &aacute;n thực tế, học vi&ecirc;n c&oacute; thể tự tin v&agrave; l&agrave;m chủ dự &aacute;n sau kh&oacute;a học.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Học 100% thời gian tại ph&ograve;ng Lab chuẩn được trang bị m&aacute;y t&iacute;nh cấu h&igrave;nh mạnh, internet c&aacute;p quang tốc độ cao phục vụ học tập v&agrave; thực h&agrave;nh ngo&agrave;i giờ miễn ph&iacute;.</p>\r\n\r\n<p>CƠ SỞ VẬT CHẤT</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Tọa lạc tại tầng 5 t&ograve;a nh&agrave; E3 Viện CNTT ĐHQG H&agrave; Nội, ITPlus Academy&nbsp;c&oacute; địa điểm thuận lợi cho học vi&ecirc;n trong việc di chuyển bằng phương tiện giao th&ocirc;ng c&ocirc;ng cộng lẫn phương tiện c&aacute; nh&acirc;n.</p>\r\n\r\n<p>&nbsp;<img alt="" src="http://itplus-academy.edu.vn/upload/Thudt/phong%20lap.jpg" style="border:0px; height:400px; line-height:1.5em; vertical-align:middle; width:600px" /></p>\r\n\r\n<p><em>Học vi&ecirc;n h&agrave;o hứng trong mỗi giờ thực h&agrave;nh tr&ecirc;n m&aacute;y</em></p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Hệ thống ph&ograve;ng học của&nbsp;<a href="http://itplus-academy.edu.vn/">ITPlus Academy&nbsp;</a>với ti vi, điều h&ograve;a m&aacute;y lạnh, hệ thống &acirc;m thanh v&agrave; c&aacute;c c&ocirc;ng cụ vật giảng, trợ giảng hiện đại được b&agrave;i tr&iacute; rất khoa học đảm bảo chất lượng ph&ograve;ng học đa phương tiện, hiện đại.</p>\r\n\r\n<p><img alt="" src="http://itplus-academy.edu.vn/upload/Thudt/hoc%20ngoai%20gio.jpg" style="border:0px; height:400px; line-height:1.5em; vertical-align:middle; width:600px" /></p>\r\n\r\n<p><em>C&aacute;c em được đăng k&yacute; thực h&agrave;nh ngo&agrave;i giờ miễn ph&iacute;</em></p>\r\n\r\n<p>&nbsp;<img alt="" src="http://itplus-academy.edu.vn/upload/Thudt/a.jpg.jpg" style="border:0px; height:400px; line-height:1.5em; vertical-align:middle; width:600px" /></p>\r\n\r\n<p><em>Hệ thống thư viện tạo điều kiện tốt nhất cho học vi&ecirc;n mượn s&aacute;ch v&agrave; thiết bị nghi&ecirc;n cứu học tập</em></p>\r\n\r\n<p>&nbsp;<img alt="" src="http://itplus-academy.edu.vn/upload/Thudt/khuon%20vien.jpg" style="border:0px; height:400px; line-height:1.5em; vertical-align:middle; width:600px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><em>Khu&ocirc;n vi&ecirc;n trường rộng, tạo điều kiện cho học vi&ecirc;n trao đổi, chia sẻ sau mỗi tiết học</em></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt="" src="http://itplus-academy.edu.vn/upload/Thudt/vui%20choi.jpg" style="border:0px; height:400px; line-height:1.5em; vertical-align:middle; width:600px" /></p>\r\n\r\n<p><em>v&agrave; vui chơi sau giờ học</em></p>\r\n\r\n<p>CAM KẾT VIỆC L&Agrave;M</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;Đặc biệt&nbsp;ITPlus Academy&nbsp;hỗ trợ c&aacute;c kỹ năng l&agrave;m việc cho học vi&ecirc;n trong suốt qu&aacute; tr&igrave;nh học. Sau khi kết th&uacute;c chương tr&igrave;nh, học vi&ecirc;n được giới thiệu v&agrave; c&oacute; cơ hội l&agrave;m việc tại c&aacute;c c&ocirc;ng ty phần mềm uy t&iacute;n.</p>\r\n\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ITPlus cam kết việc l&agrave;m cho mỗi học vi&ecirc;n sau khi ho&agrave;n th&agrave;nh chương tr&igrave;nh học tại đ&acirc;y. Với việc hợp t&aacute;c c&ugrave;ng nhiều Doanh nghiệp CNTT lớn trong nước, ITPlus lu&ocirc;n l&agrave; cầu nối ho&agrave;n chỉnh cho nhu cầu l&agrave;m việc của c&aacute;c học vi&ecirc;n v&agrave; nhu cầu tuyển dụng nh&acirc;n sự chất lượng cao của c&aacute;c Doanh nghiệp.</p>\r\n\r\n<p><em>ITPlus Academy</em></p>\r\n";}', '', 'about'),
(2, '', 'a:4:{s:5:"email";s:28:"veilcetcotrryon123@gmail.com";s:5:"phone";s:11:"01642476038";s:7:"address";s:56:"Đại học mỏ địa chất - Từ Liêm - Hà Nội";s:3:"map";s:366:"<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.8981200952644!2d105.7805487144548!3d21.03676209288203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab4aab877325%3A0x67be25466d345b75!2zxJDhuqFpIGjhu41jIFF14buRYyBHaWE!5e0!3m2!1svi!2s!4v1448460199018" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>";}', 'contact');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_11_09_021306_create_cates_table', 1),
('2015_11_09_022407_create_products_table', 2),
('2015_11_09_023500_create_images_table', 3),
('2015_11_14_013633_create_uploads_table', 4),
('2015_11_17_152738_create_colors_table', 5),
('2015_11_17_152750_create_sizes_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `availability` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `info` longtext COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `cate_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `price`, `color`, `size`, `availability`, `info`, `image`, `user_id`, `cate_id`, `created_at`, `updated_at`) VALUES
(10, 'Áo Thể Thao Nam Tay Raglan', 'ao-the-thao-nam-tay-raglan', 249000, 'a:3:{i:0;s:1:"2";i:1;s:1:"6";i:2;s:1:"8";}', 'a:3:{i:0;s:1:"1";i:1;s:1:"2";i:2;s:1:"5";}', '1', '<p><span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">Sự kết hợp ho&agrave;n hảo giữa kiểu d&aacute;ng khỏe khoắn v&agrave; chất liệu thun lạnh co gi&atilde;n thoải m&aacute;i tr&ecirc;n &aacute;o thun nam thương hiệu Jass. Thiết kế in t&ecirc;n thương hiệu trước ngực nam t&iacute;nh kết hợp phối m&agrave;u tr&ecirc;n cổ v&agrave; đường viền quanh &aacute;o nổi bật, l&agrave; thiết kế d&agrave;nh ri&ecirc;ng cho những anh ch&agrave;ng y&ecirc;u th&iacute;ch c&aacute;c hoạt động năng động v&agrave; thể thao h&agrave;ng ng&agrave;y.</span><br />\r\n<br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- Chất liệu thun lạnh</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- Cố tr&ograve;n</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- Tay ngắn</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- In t&ecirc;n thương hi&ecirc;u trước ngực</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- Phối kh&aacute;c m&agrave;u giữa mặt trước v&agrave; sau &aacute;o</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- D&aacute;ng su&ocirc;ng</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- Co gi&atilde;n tốt</span></p>\r\n', '107,106,105,104', 1, 8, '2015-11-19 06:30:32', '2015-11-19 06:30:32'),
(11, 'Áo Sơ Mi In Caro', 'ao-so-mi-in-caro', 1399000, 'a:2:{i:0;s:1:"6";i:1;s:1:"7";}', 'a:3:{i:0;s:1:"1";i:1;s:1:"5";i:2;s:1:"9";}', '1', '<p><em>Do được đặt tại trụ sở ch&iacute;nh của ZALORA (Singapore), n&ecirc;n sản phẩm sẽ được giao đến bạn sau 21 ng&agrave;y l&agrave;m việc</em><br />\r\n<br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">&Aacute;o sơ mi in caro m&agrave;u xanh l&aacute;, trắng của thương hiệu River Island với chất liệu vải mềm mịn, mang lại cảm gi&aacute;c thoải m&aacute;i v&agrave; tho&aacute;ng m&aacute;t</span><br />\r\n<br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- Chất liệu cotton</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- Cổ lật</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- Tay d&agrave;i, c&oacute; n&uacute;t c&agrave;i ở gấu tay &aacute;o</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- 1 t&uacute;i đắp ở ngực tr&aacute;i</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- Kh&ocirc;ng c&oacute; lớp l&oacute;t trong</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- D&aacute;ng su&ocirc;ng</span></p>\r\n', '111,110,109,108', 1, 9, '2015-11-19 06:35:02', '2015-11-19 06:35:02'),
(12, 'Áo Jacket', 'ao-jacket', 799000, 'a:1:{i:0;s:1:"7";}', 'a:2:{i:0;s:1:"5";i:1;s:1:"6";}', '1', '<p><span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">Ấn tượng với vẻ ngo&agrave;i lịch l&atilde;m v&agrave; phong độ nhờ &aacute;o Jacket của thương hiệu ZALORA. Thiết kế phối m&agrave;u tối giản, may 2 t&uacute;i nắp gi&uacute;p n&acirc;ng cao phong c&aacute;ch qu&yacute; &ocirc;ng hiện đại.</span><br />\r\n<br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- Chất liệu cotton pha</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- Cổ lật</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- Tay d&agrave;i</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- Phối 2 n&uacute;t g&agrave;i dọc th&acirc;n &aacute;o</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- May 2 t&uacute;i nắp b&ecirc;n h&ocirc;ng</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- C&oacute; l&oacute;t trong</span></p>\r\n', '112', 1, 10, '2015-11-19 06:41:37', '2015-11-19 06:41:37'),
(13, 'Quần Chino Cotton Dáng Ôm', 'quan-chino-cotton-dang-om', 479000, 'a:1:{i:0;s:1:"6";}', 'a:1:{i:0;s:1:"8";}', '1', '<p><span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">Thật lịch l&atilde;m v&agrave; tr&iacute; thức c&ugrave;ng quần chino từ thương hiệu ZALORA. Quần D&aacute;ng &ocirc;m vừa, t&ocirc;n l&ecirc;n d&aacute;ng người c&acirc;n đối ho&agrave;n hảo của ph&aacute;i mạnh, Thiết kế nhiều t&uacute;i tiện dụng.</span><br />\r\n<br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- Chất liệu cotton pha</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- Lưng may rời, c&oacute; đỉa, phối n&uacute;t c&agrave;i v&agrave; kh&oacute;a k&eacute;o</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- 2 t&uacute;i b&ecirc;n h&ocirc;ng</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- 2 t&uacute;i ph&iacute;a sau</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- D&aacute;ng &ocirc;m</span></p>\r\n', '117,116', 1, 11, '2015-11-19 06:44:13', '2015-11-19 06:44:13'),
(14, 'Bộ Bốn Quần Lót Tam Giác Cung Cấp Bởi Cty TNHH SX-TM-DV ', 'bo-bon-quan-lot-tam-giac-cung-cap-boi-cty-tnhh-sx-tm-dv', 150000, 'a:1:{i:0;s:1:"6";}', 'a:4:{i:0;s:1:"1";i:1;s:1:"5";i:2;s:1:"6";i:3;s:1:"9";}', '1', '<p><span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">Bộ bốn quần l&oacute;t tam gi&aacute;c của thương hiệu WHITE HORSE được l&agrave;m từ chất liệu vải cotton mềm mịn, tạo độ co gi&atilde;n 4 chiều v&agrave; thấm h&uacute;t mồ h&ocirc;i tốt, tho&aacute;ng m&aacute;t cả ng&agrave;y, gi&uacute;p vận động thoải m&aacute;i dễ d&agrave;ng. Viền chỉ nổi trang tr&iacute; v&agrave; in t&ecirc;n thương hiệu ở mặt trước tạo điểm nhấn c&aacute; t&iacute;nh</span><br />\r\n<br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- Chất liệu 92% cotton 8% spandex</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- Eo bo thun</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- Kiểu d&aacute;ng bikini</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- Ph&iacute;a trước may hai lớp</span></p>\r\n', '120,119,118', 1, 12, '2015-11-19 06:48:07', '2015-11-19 06:48:07'),
(15, 'Bộ 5 Đôi Tất Vớ Văn Phòng Nam Dài Cổ Cung Cấp Bởi SoYoung', 'bo-5-doi-tat-vo-van-phong-nam-dai-co-cung-cap-boi-soyoung', 189000, 'a:3:{i:0;s:1:"2";i:1;s:1:"6";i:2;s:1:"8";}', 'a:6:{i:0;s:1:"2";i:1;s:1:"3";i:2;s:1:"6";i:3;s:1:"7";i:4;s:1:"8";i:5;s:1:"9";}', '1', '<p><span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- Loại sản phẩm: Bộ 5 Đ&ocirc;i Tất Vớ Văn Ph&ograve;ng Nam D&agrave;i Cổ.</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- Chất liệu: Cotton, Spandex. Đảm bảo khử m&ugrave;i hiệu quả, kh&aacute;ng khuẩn.</span><br />\r\n<span style="color:rgb(0, 0, 0); font-family:arial,sans-serif; font-size:11px">- Chất liệu vải mềm, nhẹ, co gi&atilde;n 4 chiều , thấm h&uacute;t mồ h&ocirc;i, bền m&agrave;u.</span></p>\r\n', '123,122,121', 1, 13, '2015-11-19 06:50:53', '2015-11-19 06:50:53'),
(16, 'Giày Lười Mocassins Da Giả', 'giay-luoi-mocassins-da-gia', 649000, 'a:1:{i:0;s:1:"8";}', 'a:3:{i:0;s:1:"2";i:1;s:1:"3";i:2;s:1:"8";}', '1', '<div class="box mtl fss clearfix" id="productDesc" style="margin-top: 20px; font-size: 11px; position: relative; box-sizing: border-box; zoom: 1; height: 153px; overflow: hidden; z-index: 1; color: rgb(0, 0, 0); font-family: Arial, sans-serif; letter-spacing: 0.6px; line-height: 17.6px;">V&agrave;o ng&agrave;y cuối tuần, c&ograve;n g&igrave; tuyệt vời hơn việc dạo chơi c&ugrave;ng bạn b&egrave; với một đ&ocirc;i gi&agrave;y thật thoải m&aacute;i v&agrave; s&agrave;nh điệu. Thiết kế tr&ecirc;n chất liệu da giả, đ&ocirc;i gi&agrave;y lười đến từ thương hiệu ZALORA BASICS sẽ cực kỳ l&yacute; tưởng v&agrave; bổ sung ho&agrave;n hảo cho vẻ ngo&agrave;i của bạn.&nbsp;<br />\r\n<br />\r\n- Chất liệu lớp ngo&agrave;i da tổng hợp<br />\r\n- Chất liệu đế gi&agrave;y PU</div>\r\n', '126,125,124', 1, 15, '2015-11-19 06:53:22', '2015-11-23 20:02:00'),
(17, 'This is a test', 'this-is-a-test', 500000, 'a:4:{i:0;s:1:"2";i:1;s:1:"4";i:2;s:1:"5";i:3;s:1:"7";}', 'a:3:{i:0;s:1:"2";i:1;s:1:"6";i:2;s:1:"8";}', '1', '<p>fghnfghfghfghfghfghfghfghfgh</p>\r\n', '111,110,109,108', 1, 15, '2015-11-23 20:47:40', '2015-11-23 20:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE IF NOT EXISTS `sizes` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'L', '2015-11-17 12:19:12', '2015-11-17 12:19:12'),
(2, 'X', '2015-11-17 12:19:36', '2015-11-17 12:19:36'),
(3, 'M', '2015-11-17 12:19:40', '2015-11-19 06:36:44'),
(5, 'XL', '2015-11-17 13:40:53', '2015-11-17 13:40:53'),
(6, 'ML', '2015-11-17 13:40:57', '2015-11-17 13:40:57'),
(7, 'Z', '2015-11-17 13:41:01', '2015-11-17 13:41:01'),
(8, 'S', '2015-11-19 06:31:23', '2015-11-19 06:31:23'),
(9, 'XS', '2015-11-19 06:31:38', '2015-11-19 06:31:38');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `caption` text COLLATE utf8_unicode_ci NOT NULL,
  `availability` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alt_text` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `name`, `type`, `size`, `url`, `title`, `caption`, `availability`, `alt_text`, `description`, `user_id`, `created_at`, `updated_at`) VALUES
(100, '56111915_zalora-1485-567364-1.jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/56111915_zalora-1485-567364-1.jpg', '56111915_zalora-1485-567364-1.jpg', '', '', '', '', 1, '2015-11-19 03:56:56', '2015-11-19 03:56:56'),
(101, '30111915_zalora-6080-557054-1.jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/30111915_zalora-6080-557054-1.jpg', '30111915_zalora-6080-557054-1.jpg', '', '', '', '', 1, '2015-11-19 05:50:30', '2015-11-19 05:50:30'),
(102, '53111915_do-da-hanama-7347-027454-1.jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/53111915_do-da-hanama-7347-027454-1.jpg', '53111915_do-da-hanama-7347-027454-1.jpg', '', '', '', '', 1, '2015-11-19 05:56:53', '2015-11-19 05:56:53'),
(103, '42111915_ray-ban-7632-402843-1.jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/42111915_ray-ban-7632-402843-1.jpg', '42111915_ray-ban-7632-402843-1.jpg', '', '', '', '', 1, '2015-11-19 05:58:42', '2015-11-19 05:58:42'),
(104, '43111915_jass-0276-349315-4.jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/43111915_jass-0276-349315-4.jpg', '43111915_jass-0276-349315-4.jpg', '', '', '', '', 1, '2015-11-19 06:29:43', '2015-11-19 06:29:43'),
(105, '43111915_jass-0273-349315-1.jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/43111915_jass-0273-349315-1.jpg', '43111915_jass-0273-349315-1.jpg', '', '', '', '', 1, '2015-11-19 06:29:43', '2015-11-19 06:29:43'),
(106, '43111915_jass-0275-349315-3.jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/43111915_jass-0275-349315-3.jpg', '43111915_jass-0275-349315-3.jpg', '', '', '', '', 1, '2015-11-19 06:29:43', '2015-11-19 06:29:43'),
(107, '43111915_jass-0274-349315-2.jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/43111915_jass-0274-349315-2.jpg', '43111915_jass-0274-349315-2.jpg', '', '', '', '', 1, '2015-11-19 06:29:43', '2015-11-19 06:29:43'),
(108, '52111915_river-island-9905-714073-2.jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/52111915_river-island-9905-714073-2.jpg', '52111915_river-island-9905-714073-2.jpg', '', '', '', '', 1, '2015-11-19 06:33:52', '2015-11-19 06:33:52'),
(109, '52111915_river-island-9904-714073-1.jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/52111915_river-island-9904-714073-1.jpg', '52111915_river-island-9904-714073-1.jpg', '', '', '', '', 1, '2015-11-19 06:33:52', '2015-11-19 06:33:52'),
(110, '52111915_river-island-9906-714073-3.jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/52111915_river-island-9906-714073-3.jpg', '52111915_river-island-9906-714073-3.jpg', '', '', '', '', 1, '2015-11-19 06:33:52', '2015-11-19 06:33:52'),
(111, '52111915_river-island-9906-714073-4.jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/52111915_river-island-9906-714073-4.jpg', '52111915_river-island-9906-714073-4.jpg', '', '', '', '', 1, '2015-11-19 06:33:52', '2015-11-19 06:33:52'),
(112, '10111915_zalora-1485-567364-1(2).jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/10111915_zalora-1485-567364-1(2).jpg', '10111915_zalora-1485-567364-1(2).jpg', '', '', '', '', 1, '2015-11-19 06:39:10', '2015-11-19 06:39:10'),
(116, '35111915_zalora-3171-344174-1 (1).jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/35111915_zalora-3171-344174-1 (1).jpg', '35111915_zalora-3171-344174-1 (1).jpg', '', '', '', '', 1, '2015-11-19 06:43:35', '2015-11-19 06:43:35'),
(117, '35111915_zalora-3171-344174-1.jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/35111915_zalora-3171-344174-1.jpg', '35111915_zalora-3171-344174-1.jpg', '', '', '', '', 1, '2015-11-19 06:43:35', '2015-11-19 06:43:35'),
(118, '31111915_white-horse-5462-203124-1.jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/31111915_white-horse-5462-203124-1.jpg', '31111915_white-horse-5462-203124-1.jpg', '', '', '', '', 1, '2015-11-19 06:46:31', '2015-11-19 06:46:31'),
(119, '32111915_white-horse-5463-203124-2.jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/32111915_white-horse-5463-203124-2.jpg', '32111915_white-horse-5463-203124-2.jpg', '', '', '', '', 1, '2015-11-19 06:46:32', '2015-11-19 06:46:32'),
(120, '32111915_white-horse-5465-203124-3.jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/32111915_white-horse-5465-203124-3.jpg', '32111915_white-horse-5465-203124-3.jpg', '', '', '', '', 1, '2015-11-19 06:46:32', '2015-11-19 06:46:32'),
(121, '16111915_soyoung-1918-557505-3.jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/16111915_soyoung-1918-557505-3.jpg', '16111915_soyoung-1918-557505-3.jpg', '', '', '', '', 1, '2015-11-19 06:50:16', '2015-11-19 06:50:16'),
(122, '16111915_soyoung-1917-557505-2.jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/16111915_soyoung-1917-557505-2.jpg', '16111915_soyoung-1917-557505-2.jpg', '', '', '', '', 1, '2015-11-19 06:50:16', '2015-11-19 06:50:16'),
(123, '16111915_soyoung-1916-557505-1.jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/16111915_soyoung-1916-557505-1.jpg', '16111915_soyoung-1916-557505-1.jpg', '', '', '', '', 1, '2015-11-19 06:50:16', '2015-11-19 06:50:16'),
(124, '07111915_zalora-basics-5511-931384-1.jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/07111915_zalora-basics-5511-931384-1.jpg', '07111915_zalora-basics-5511-931384-1.jpg', '', '', '', '', 1, '2015-11-19 06:53:07', '2015-11-19 06:53:07'),
(125, '07111915_zalora-basics-5514-931384-3.jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/07111915_zalora-basics-5514-931384-3.jpg', '07111915_zalora-basics-5514-931384-3.jpg', '', '', '', '', 1, '2015-11-19 06:53:07', '2015-11-19 06:53:07'),
(126, '07111915_zalora-basics-5513-931384-2.jpg', 'jpg', '1', 'http://localhost:8888/project/resources/upload/images/07111915_zalora-basics-5513-931384-2.jpg', '07111915_zalora-basics-5513-931384-2.jpg', '', '', '', '', 1, '2015-11-19 06:53:07', '2015-11-19 06:53:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `display_name`, `avatar`, `level`, `status`, `description`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'gbayvictory', 'gbayvictory', 'gbayvictory@gmail.com', '$2y$10$HekrA8Iyqqqbqy0t7hF1j.Cj4JlSPNcg73reMKpo78N4hhc4hpRoC', 'Gbay Việt Nam', 'Koala.jpg', 0, 1, '', 'MTMd5gXY36HjFk6YFFcuRNBoatfB8fcWH3Cng5cm', '0000-00-00 00:00:00', '2015-11-21 00:13:21'),
(2, 'Gbay', 'Victory', 'gbayvictory1@gmail.com', '$2y$10$g.E2KF1XaP6v1BiuJVTSMuW/7iiKl.frpcYnz06o9NblGpqiHZFDa', 'Gbay Victory', 'Koala.jpg', 1, 1, '', 'gsdhqqROzRADVLlt46NlWTjyqu8KE4kEFgfgFA98', '2015-11-18 07:33:12', '2015-11-18 07:33:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cates`
--
ALTER TABLE `cates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cates_name_unique` (`name`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `colors_name_unique` (`name`);

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_cate_id_foreign` (`cate_id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sizes_name_unique` (`name`);

--
-- Indexes for table `uploads`
--
ALTER TABLE `uploads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uploads_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cates`
--
ALTER TABLE `cates`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `uploads`
--
ALTER TABLE `uploads`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=127;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `cates` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `uploads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
