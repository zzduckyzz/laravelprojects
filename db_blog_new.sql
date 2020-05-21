-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2020 at 06:28 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_blog_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` tinyint(4) NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `position`, `icon`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tin thể thao', 1, NULL, 2, '2020-03-22 21:28:50', '2020-04-24 07:01:21'),
(2, 'Tin thời sự', 2, NULL, 2, '2020-03-24 03:17:08', '2020-03-24 03:17:08'),
(3, 'Tin nóng  24h', 3, NULL, 2, '2020-03-24 03:17:40', '2020-03-24 03:17:40'),
(4, 'Danh mục bài viết mới', 5, NULL, 2, '2020-04-24 07:02:00', '2020-04-24 07:02:06');

-- --------------------------------------------------------

--
-- Table structure for table `group_permission`
--

CREATE TABLE `group_permission` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `group_permission`
--

INSERT INTO `group_permission` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Danh mục bài viết', 'Danh mục bài viết', '2020-03-18 17:48:12', '2020-03-18 18:08:33'),
(2, 'Bài viết', 'Bài viết', '2019-03-18 17:48:48', '2019-03-18 18:08:20'),
(3, 'Người dùng', 'Người dùng', '2019-03-18 18:14:14', '2019-03-18 18:14:14');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_08_12_135838_entrust_setup_tables', 1),
(4, '2018_08_18_171458_create_categories_table', 1),
(5, '2018_10_01_054159_create_news_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categori_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `public_user_id` int(10) UNSIGNED DEFAULT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `site_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_preview` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `hot` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `categori_id`, `user_id`, `public_user_id`, `meta_key`, `site_title`, `meta_desc`, `image_preview`, `image_banner`, `view`, `content`, `status`, `hot`, `created_at`, `updated_at`) VALUES
(1, 'Pellentesque mattis arcu massa, nec fringilla turpis eleifend id.', 1, 1, NULL, 'xdfgsdfg', NULL, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales', '\\uploads\\news\\2019-03-23-09-10-24-hinh-anime-buon-nhat-co-don-that-tinh-12.jpg', NULL, 2, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales</p>', 2, 0, '2020-03-22 22:36:20', '2020-04-24 07:05:33'),
(2, 'Mọi Sự Donate ủng hộ Cho Kênh để duy trì vui lòng gửi vào các tài khoản sau:', 1, 1, NULL, 'image_preview', NULL, 'image_preview', '\\uploads\\news\\2019-03-23-09-21-32-nhung-anh-bia-facebook-dep-va-mang-lai-nhung-y-nghia-sau-lang-nhat-12.jpg', '\\uploads\\news\\2019-03-23-09-21-32-nhung-anh-bia-facebook-dep-va-mang-lai-nhung-y-nghia-sau-lang-nhat-12.jpg', 1, '<pre>\r\nimage_preview</pre>\r\n\r\n<pre>\r\nimage_preview</pre>\r\n\r\n<pre>\r\nimage_preview</pre>\r\n\r\n<pre>\r\nimage_preview</pre>\r\n\r\n<pre>\r\nimage_preview</pre>', 2, 0, '2020-03-23 02:20:42', '2020-04-16 01:32:45'),
(3, 'THANH LÝ ÍT ĐỒ NHÀ ĐANG DÙNG CHO BẠN NÀO CẦN INBOX MÌNH NHÉ', 1, 1, NULL, 'THANH LÝ ÍT ĐỒ NHÀ ĐANG DÙNG CHO BẠN NÀO CẦN INBOX MÌNH NHÉ', NULL, 'THANH LÝ ÍT ĐỒ NHÀ ĐANG DÙNG CHO BẠN NÀO CẦN INBOX MÌNH NHÉ', '\\uploads\\news\\2019-03-23-09-24-58-miami-ultra-2018-main-stage-3-200-150.jpg', '\\uploads\\news\\2019-03-23-09-24-58-miami-ultra-2018-main-stage-3-730-353.jpg', 3, '<p>THANH L&Yacute; &Iacute;T ĐỒ NH&Agrave; ĐANG D&Ugrave;NG CHO BẠN N&Agrave;O CẦN INBOX M&Igrave;NH NH&Eacute;</p>', 2, 1, '2020-03-23 02:24:58', '2020-04-24 07:00:08'),
(4, 'Vietjet muốn xây nhà ga sân bay Điện Biên theo hình thức BOT', 3, 1, NULL, 'fasadasdasd', NULL, 'Nội dung mô tả', '\\uploads\\news\\2019-03-24-10-29-34-14-200-150.PNG', '\\uploads\\news\\2019-03-24-10-29-35-14-730-353.PNG', 8, '<p><strong>Vietjet muốn x&acirc;y nh&agrave; ga s&acirc;n bay Điện Bi&ecirc;n theo h&igrave;nh thức BOT</strong></p>\r\n\r\n<p>Bộ Giao th&ocirc;ng Vận tải đ&atilde; b&aacute;o c&aacute;o l&ecirc;n Ch&iacute;nh phủ về việc ủng hộ phương &aacute;n giao tỉnh Điện Bi&ecirc;n l&agrave;m cơ quan nh&agrave; nước c&oacute; thẩm quyền trong việc mở rộng s&acirc;n bay Điện Bi&ecirc;n.</p>\r\n\r\n<p>Trong b&aacute;o c&aacute;o, Bộ Giao th&ocirc;ng Vận tải cho biết, Vietjet đề xuất UBND tỉnh Điện Bi&ecirc;n sử dụng 100% ng&acirc;n s&aacute;ch đối với c&ocirc;ng t&aacute;c giải ph&oacute;ng mặt bằng v&agrave; t&aacute;i định cư.&nbsp;</p>\r\n\r\n<p>Tuy nhi&ecirc;n, c&aacute;c c&ocirc;ng tr&igrave;nh thuộc khu nh&agrave; ga h&agrave;nh kh&aacute;ch, Vietjet đề xuất thực hiện theo h&igrave;nh thức hợp đồng BOT, thời gian hợp đồng trong 55 năm. Sau khi kết th&uacute;c thời hạn hợp đồng, nh&agrave; đầu tư đề xuất được quyền ưu ti&ecirc;n thu&ecirc; lại để tiếp tục khai th&aacute;c. Nguồn vốn ước t&iacute;nh khoảng 1.855 tỷ đồng.</p>\r\n\r\n<p>Vietjet dự kiến thời gian thực hiện việc mở rộng Cảng h&agrave;ng kh&ocirc;ng Điện Bi&ecirc;n l&agrave; 24 th&aacute;ng.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Nóng trong tuần: Vì sao bà Nguyễn Thị Phương Thảo muốn rót nghìn tỷ vào Điện Biên - 1\" src=\"https://cdn.24h.com.vn/upload/1-2019/images/2019-03-23/1553352794-226-nong-trong-tuan-vi-sao-vietjet-cua-ba-nguyen-thi-phuong-thao-muon-rot-nghin-ty-vao-dien-bien-1-1553310056-width660height441.jpg\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Vietjet dự kiến thời gian thực hiện việc mở rộng Cảng h&agrave;ng kh&ocirc;ng Điện Bi&ecirc;n l&agrave; 24 th&aacute;ng.</p>\r\n\r\n<p>Tổng c&ocirc;ng ty Cảng h&agrave;ng kh&ocirc;ng Việt Nam (ACV) tiếp tục l&agrave; người khai th&aacute;c tại s&acirc;n bay Điện Bi&ecirc;n v&agrave; thực hiện quản l&yacute;, vận h&agrave;nh, khai th&aacute;c s&acirc;n bay n&agrave;y. Đối với khu vực nh&agrave; ga h&agrave;nh kh&aacute;ch, s&acirc;n đỗ &ocirc; t&ocirc; v&agrave; c&aacute;c c&ocirc;ng tr&igrave;nh phụ trợ, ACV sẽ phối hợp với Vietjet lựa chọn v&agrave; sử dụng đội ngũ c&aacute;n bộ nh&acirc;n vi&ecirc;n đang l&agrave;m việc để khai th&aacute;c cho nh&agrave; ga mới.</p>\r\n\r\n<p><strong>Xả mạnh quỹ b&igrave;nh ổn k&igrave;m gi&aacute; xăng dầu</strong></p>', 2, 0, '2020-03-24 03:29:34', '2020-07-24 06:52:17'),
(5, 'NÓNG nhất tuần: Gần 300 thi thể người lộ ra trên núi Everest', 3, 2, NULL, 'NÓNG nhất tuần: Gần 300 thi thể người lộ ra trên núi Everest', NULL, 'NÓNG nhất tuần: Gần 300 thi thể người lộ ra trên núi Everest', '\\uploads\\news\\2019-03-24-10-38-06-capture-200-150.PNG', '\\uploads\\news\\2019-03-24-10-38-06-capture-730-353.PNG', 0, '<h1>N&Oacute;NG nhất tuần: Gần 300 thi thể người lộ ra tr&ecirc;n n&uacute;i Everest</h1>', 1, 1, '2020-03-24 03:38:06', '2020-03-24 04:30:40'),
(6, 'Tân Bí thư Đà Nẵng: \'Phải hoàn thành dự án hầm chui trước APEC\'', 3, 1, NULL, 'Tân Bí thư Đà Nẵng:', NULL, 'Tân Bí thư Trương Quang Nghĩa chỉ đạo đơn vị thi công phải tập trung nhân lực hoàn thành nút giao thông hầm chui Điện Biên Phủ - Nguyễn Tri phương - Lê Độ để phục vụ APEC.', '\\uploads\\news\\2019-07-24-14-04-45-5282-shop-hoa-tuoi-copy-200-150.jpg', '\\uploads\\news\\2019-07-24-14-04-46-5282-shop-hoa-tuoi-copy-730-353.jpg', 1, '<p>&acirc;n B&iacute; thư Trương Quang Nghĩa chỉ đạo đơn vị thi c&ocirc;ng phải tập trung nh&acirc;n lực ho&agrave;n th&agrave;nh n&uacute;t giao th&ocirc;ng hầm chui Điện Bi&ecirc;n Phủ - Nguyễn Tri phương - L&ecirc; Độ để phục vụ APEC.</p>\r\n\r\n<p>Chiều 16/10, &ocirc;ng Trương Quang Nghĩa, B&iacute; thư Th&agrave;nh ủy Đ&agrave; Nẵng c&ugrave;ng l&atilde;nh đạo UBND TP v&agrave; đại diện c&aacute;c Sở ng&agrave;nh đ&atilde; đến kiểm tra tiến độ n&uacute;t giao th&ocirc;ng Điện Bi&ecirc;n Phủ - Nguyễn Tri Phương - L&ecirc; Độ (quận Thanh Kh&ecirc;).</p>\r\n\r\n<p><strong><a href=\"https://news.zing.vn/video-tan-bi-thu-da-nang-thi-sat-nut-giao-thong-ham-chui-post787975.html\" target=\"_blank\">T&acirc;n B&iacute; thư Đ&agrave; Nẵng thị s&aacute;t n&uacute;t giao th&ocirc;ng hầm chui</a></strong>&nbsp;Sau gần 10 ng&agrave;y giữ chức b&iacute; thư Th&agrave;nh ủy Đ&agrave; Nẵng, &ocirc;ng Trương Quang Nghĩa đ&atilde; đi thị s&aacute;t n&uacute;t giao th&ocirc;ng hầm chui Điện Bi&ecirc;n Phủ - Nguyễn Tri Phương - L&ecirc; Độ.</p>\r\n\r\n<p>Đ&acirc;y l&agrave; một trong những c&ocirc;ng tr&igrave;nh trọng điểm m&agrave; TP Đ&agrave; Nẵng triển khai với mục ti&ecirc;u sẽ ho&agrave;n th&agrave;nh trước th&aacute;ng 11, để kịp thời phục vụ việc đi lại trong Tuần lễ cấp cao APEC. Tuy nhi&ecirc;n, do địa chất phức tạp v&agrave; thời tiết kh&ocirc;ng thuận lợi n&ecirc;n dự &aacute;n kh&ocirc;ng ho&agrave;n th&agrave;nh như dự kiến v&agrave; đ&atilde; 2 lần gi&atilde;n tiến độ.</p>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"Tan Bi thu Da Nang: \'Phai hoan thanh du an ham chui truoc APEC\' hinh anh 1\" src=\"https://znews-photo-td.zadn.vn/w660/Uploaded/jugtzb/2017_10_16/Ham_chui_1_Zing.jpg\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>B&iacute; thư Trương Quang Nghĩa c&ugrave;ng đại diện c&aacute;c Sở, ng&agrave;nh đi thị s&aacute;t n&uacute;t giao th&ocirc;ng hầm chui Điện Bi&ecirc;n Phủ - Nguyễn Tri Phương - L&ecirc; Độ. Ảnh:&nbsp;<em>Đo&agrave;n Nguy&ecirc;n.&nbsp;</em></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>B&aacute;o c&aacute;o với B&iacute; thư, &ocirc;ng Lương Thạch Vỹ, Gi&aacute;m đốc Ban Quản l&yacute; c&aacute;c dự &aacute;n đầu tư cơ sở hạ tầng ưu ti&ecirc;n Đ&agrave; Nẵng (chủ đầu tư dự &aacute;n) cho hay, c&ocirc;ng tr&igrave;nh đ&atilde; ho&agrave;n th&agrave;nh 80% tổng khối lượng gi&aacute; trị hợp đồng.</p>\r\n\r\n<p>Trong đ&oacute;, c&ocirc;ng t&aacute;c di dời c&aacute;c c&ocirc;ng tr&igrave;nh hạ tầng kỹ thuật như, c&acirc;y xanh, đ&egrave;n chiếu s&aacute;ng, th&ocirc;ng tin li&ecirc;n lạc, sửa chữa mặt đường H&agrave; Huy Tập, khoan cọc xi măng, hệ thống tho&aacute;t nước... cơ bản đ&atilde; ho&agrave;n th&agrave;nh. Hạng mục cống hộp cũng ho&agrave;n th&agrave;nh 183/183 m.</p>\r\n\r\n<p>Tuyến cống hộp ph&iacute;a C&ocirc;ng vi&ecirc;n 29/3 mới ho&agrave;n th&agrave;nh 405/478 m. Khối lượng thi c&ocirc;ng x&acirc;y dựng trạm bơm chưa xong. Khu vực hầm k&iacute;n, hầm hở đ&atilde; ho&agrave;n th&agrave;nh. Nền mặt đường nh&aacute;nh, đường gom b&ecirc;n tr&aacute;i tuyến L&ecirc; Độ &nbsp;- &nbsp;Ng&atilde; ba Huế mới ho&agrave;n th&agrave;nh 90% khối lượng.</p>\r\n\r\n<p>Đoạn đường từ L&ecirc; Độ đến L&ecirc; Duẫn ho&agrave;n th&agrave;nh 95% khối lượng. Nền mặt, đường nh&aacute;nh b&ecirc;n phải đoạn Nguyễn Tri Phương về Ng&atilde; ba Huế mới ho&agrave;n th&agrave;nh 60% khối lượng.</p>\r\n\r\n<p>&Ocirc;ng Vỹ cho biết hiện c&aacute;c đơn vị thi c&ocirc;ng đang gấp r&uacute;t thi c&ocirc;ng cả 3 ca để c&aacute;c hạng mục c&ocirc;ng tr&igrave;nh ho&agrave;n th&agrave;nh trước 30/10.</p>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"Tan Bi thu Da Nang: \'Phai hoan thanh du an ham chui truoc APEC\' hinh anh 2\" src=\"https://znews-photo-td.zadn.vn/w660/Uploaded/jugtzb/2017_10_16/Ham_chui_3_Zing.jpg\" title=\"Tân Bí thư Đà Nẵng: \'Phải hoàn thành dự án hầm chui trước APEC\' hình ảnh 2\" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td>N&uacute;t giao th&ocirc;ng hầm chui Điện Bi&ecirc;n Phủ - Nguyễn Tri Phương - L&ecirc; Độ. Ảnh:&nbsp;<em>Đo&agrave;n Nguy&ecirc;n.&nbsp;</em></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>Sau khi nghe đại diện c&aacute;c đơn vị b&aacute;o c&aacute;o, B&iacute; thư Th&agrave;nh ủy Trương Quang Nghĩa y&ecirc;u cầu c&aacute;c nh&agrave; thầu thi c&ocirc;ng tiếp tục đẩy nhanh tiến độ, tập trung nh&acirc;n lực, vật tư l&agrave;m việc cả ng&agrave;y lẫn đ&ecirc;m để ho&agrave;n th&agrave;nh c&ocirc;ng tr&igrave;nh trước th&aacute;ng 11. &quot;Mặc d&ugrave; đẩy nhanh tiến độ nhưng c&aacute;c đơn vị phải đảm bảo tốt chất lượng cũng như mỹ quan của c&ocirc;ng tr&igrave;nh&quot;, &ocirc;ng Nghĩa n&oacute;i.</p>\r\n\r\n<p>Người đứng đầu TP Đ&agrave; Nẵng y&ecirc;u cầu Sở Giao th&ocirc;ng Vận tải v&agrave; c&aacute;c đơn vị li&ecirc;n quan kịp thời th&aacute;o gỡ c&aacute;c kh&oacute; khăn, vướng mắc ph&aacute;t sinh. &ldquo;Điều lo ngại nhất hiện nay l&agrave; thời tiết. V&igrave; vậy ch&uacute;ng ta phải tận dụng những ng&agrave;y nắng r&aacute;o để đẩy nhanh tiến độ. T&ocirc;i lưu &yacute;, danh dự của TP Đ&agrave; Nẵng hiện nay phụ thuộc hết v&agrave;o c&aacute;c đơn vị thi c&ocirc;ng&quot;, &ocirc;ng Nghĩa nhấn mạnh.</p>\r\n\r\n<p>B&iacute; thư Đ&agrave; Nẵng cũng cho rằng, sự kiện Tuần lễ cấp cao APEC đ&atilde; đến gần n&ecirc;n UBND TP phải s&acirc;u s&aacute;t, chỉ đạo c&aacute;c Sở, ng&agrave;nh tập trung ho&agrave;n thiện c&aacute;c c&ocirc;ng tr&igrave;nh trọng điểm, trong đ&oacute; c&oacute; n&uacute;t giao th&ocirc;ng Nguyễn Tri Phương - Điện Bi&ecirc;n Phủ - L&ecirc; Độ. Tuyệt đối kh&ocirc;ng được để khi sự kiện APEC diễn ra m&agrave; c&aacute;c dự &aacute;n vẫn c&ograve;n nhếch nh&aacute;c, chưa xong.</p>', 2, 1, '2020-07-24 07:04:45', '2020-05-05 09:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `group_permission_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `group_permission_id`, `created_at`, `updated_at`) VALUES
(1, 'them-danh-muc', 'Thêm mới danh mục', 'Thêm mới danh mục', 1, '2020-03-18 17:56:20', '2020-03-18 18:03:17'),
(2, 'chinh-sua-danh-muc', 'Chỉnh sửa danh mục', 'Chỉnh sửa danh mục', 1, '2020-03-18 17:59:30', '2020-03-18 18:03:37'),
(3, 'xoa-danh-muc', 'Xóa danh mục', 'Xóa danh mục', 1, '2020-03-18 18:00:43', '2020-03-18 18:03:59'),
(4, 'cap-nhat-trang-thai-danh-muc', 'Cập nhật trạng thái danh mục', 'Cập nhật trạng thái danh mục', 1, '2020-03-18 18:01:32', '2020-03-18 18:04:33'),
(5, 'danh-sach-danh-muc', 'Danh sách danh mục', 'Danh sách danh mục', 1, '2020-03-18 18:02:47', '2020-03-18 18:17:17'),
(6, 'them-bai-viet', 'Thêm bài viết', 'Thêm bài viết', 2, '2020-03-18 18:05:08', '2020-03-18 18:05:08'),
(7, 'chinh-sua-bai-viet', 'Chỉnh sửa bài viết', 'Chỉnh sửa bài viết', 2, '2020-03-18 18:05:32', '2020-03-18 18:05:32'),
(8, 'xoa-bai-viet', 'Xóa bài viết', 'Xóa bài viết', 2, '2020-03-18 18:06:38', '2020-03-18 18:06:38'),
(9, 'duyet-bai-viet', 'Duyệt bài viết', 'Duyệt bài viết', 2, '2020-03-18 18:07:00', '2020-03-18 18:07:00'),
(10, 'danh-sach-bai-viet', 'Danh sách bài viết', 'Danh sách bài viết', 2, '2020-03-18 18:07:55', '2020-03-18 18:07:55'),
(11, 'them-nguoi-dung', 'Thêm người dùng', 'Thêm người dùng', 3, '2020-03-18 18:14:44', '2020-03-18 18:14:44'),
(12, 'chinh-sua-nguoi-dung', 'Chỉnh sửa người dùng', 'Chỉnh sửa người dùng', 3, '2020-03-18 18:15:04', '2020-03-18 18:15:04'),
(13, 'xoa-nguoi-dung', 'Xóa người dùng', 'Xóa người dùng', 3, '2020-03-18 18:15:42', '2020-03-18 18:15:42'),
(14, 'update-trang-thai-nguoi-dung', 'Update trạng thái người dùng', 'Update trạng thái người dùng', 3, '2020-03-18 18:16:27', '2020-03-18 18:16:27'),
(15, 'danh-sach-nguoi-dung', 'Danh sách người dùng', 'Danh sách người dùng', 3, '2020-03-18 18:16:49', '2020-03-18 18:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(6, 2),
(7, 1),
(7, 2),
(8, 1),
(9, 1),
(10, 1),
(10, 2),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Quản trị viên', 'Duyệt bài quản lý người dùng', '2020-03-18 19:01:03', '2020-03-18 19:01:03'),
(2, 'Người dùng', 'Người dùng', '2019-03-18 19:02:04', '2019-03-18 19:02:04');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 2,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `gender`, `avatar`, `birthday`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Phạm Minh Đức', 'administrator@gmail.com', '$2y$10$SetXt.qTic/2tVQDpCtBiu.Pvr7g0Gu8d2xESVoVQBSpSvENbX/2W', '0966419464', 'HN', 1, '', '1994-12-26', 2, 'JPe1LSVIIXqLYWfO5B8s2vx0vywBY9LbmGgK7fSi5a6vNSceMNEwsr3zGhTz', '2020-03-22 21:27:29', '2020-03-23 09:18:17'),
(2, 'Phạm Minh Đức', 'abc@gmail.com', '$2y$10$dGuuAgDcD09nLgxepUpJ..q/VLlpeQR6T2xAo8gBEK91pdNWEMQJm', '0123456789', 'HN', 2, NULL, NULL, 2, 'q2fFA8oq9hu15ORttC5MNGQvFAOP2N2L1fbqaxPyTLxdG61jbghhsq3w1qNX', '2020-04-04 03:13:07', '2020-05-05 09:13:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `group_permission`
--
ALTER TABLE `group_permission`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_permission_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_categori_id_foreign` (`categori_id`),
  ADD KEY `news_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`),
  ADD KEY `permissions_group_permission_id_foreign` (`group_permission_id`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `group_permission`
--
ALTER TABLE `group_permission`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_categori_id_foreign` FOREIGN KEY (`categori_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `news_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_group_permission_id_foreign` FOREIGN KEY (`group_permission_id`) REFERENCES `group_permission` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
