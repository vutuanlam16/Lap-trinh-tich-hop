-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 12, 2018 lúc 09:30 AM
-- Phiên bản máy phục vụ: 10.1.35-MariaDB
-- Phiên bản PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `examm`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answer`
--

CREATE TABLE `answer` (
  `aid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `q_option` text NOT NULL,
  `uid` int(11) NOT NULL,
  `score_u` float NOT NULL DEFAULT '0',
  `rid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `answer`
--

INSERT INTO `answer` (`aid`, `qid`, `q_option`, `uid`, `score_u`, `rid`) VALUES
(109, 21, 'blue', 1, 1, 1),
(110, 22, 'toi đang đi làm viedcj ở đâu và làm gì ở chỗ này bạn có biết không aldskf sdlsadkj s;dljf s;lsdkj ;lsadfjs ds;fds dsf dflkdsj lsfs fds sdf', 1, 0, 1),
(111, 8, '43esfdsa sd sdf sdfa sfd gfds gdfg dsgfdsfdg sd fs', 1, 0, 1),
(112, 6, 'Good Morning___Good Night', 1, 0.25, 1),
(113, 6, 'Red___Green', 1, 0.25, 1),
(114, 6, 'Honda___BMW', 1, 0.25, 1),
(115, 6, 'Keyboard___CPU', 1, 0.25, 1),
(116, 7, 'blue', 1, 1, 1),
(117, 18, '95', 1, 1, 1),
(118, 20, 'C___D', 1, 0.25, 1),
(119, 20, 'A___D', 1, 0, 1),
(120, 20, 'E___H', 1, 0, 1),
(121, 20, 'G___F', 1, 0, 1),
(146, 18, '95', 6, 1, 2),
(147, 8, 'Không có gì là ổn thỏa ở đây cả bạn nhé', 6, 0, 2),
(148, 21, 'blue', 6, 1, 2),
(149, 19, '99', 6, 0.5, 2),
(155, 6, 'Honda___Green', 6, 0, 4),
(156, 18, '95', 6, 1, 4),
(158, 19, '98', 6, 0, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `cid` int(11) NOT NULL,
  `category_name` varchar(1000) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `is_skill` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`cid`, `category_name`, `subject_id`, `parent_id`, `is_skill`) VALUES
(1, 'Integration Management', 1, 0, ''),
(2, 'Introduction', 1, 0, ''),
(3, 'Scope Management', 1, 0, ''),
(4, 'Time Management', 2, 0, ''),
(5, 'Cost Management', 2, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `class`
--

CREATE TABLE `class` (
  `class_id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `class_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `class`
--

INSERT INTO `class` (`class_id`, `subject_id`, `class_name`) VALUES
(1, 1, 'Hoc Tap 1'),
(2, 2, 'Hoc Hanh'),
(3, 3, 'Hoc Hoi');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course`
--

CREATE TABLE `course` (
  `class_id` int(11) NOT NULL,
  `class_name` varchar(1000) CHARACTER SET utf8mb4 NOT NULL,
  `initiated_by` int(11) NOT NULL,
  `initiated_time` int(11) NOT NULL,
  `closed_time` int(11) NOT NULL,
  `content` longtext CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `course`
--

INSERT INTO `course` (`class_id`, `class_name`, `initiated_by`, `initiated_time`, `closed_time`, `content`) VALUES
(1, 'Thông tin lớp học Live1', 1, 1524673080, 0, '\r\n		\r\n		\r\n		nội dung khóa học 1<div>N?i dung ti?p theo c?a b?n ??y</div>	<div contenteditable=\"false\"><a href=\"http://localhost/quiz3/classfiles/Vultr.docx\" target=\"new\" style=\"cursor:pointer;\">Vultr.docx</a></div>Kh?ng c? n?i dung g? kh?c ??u b?n nh?<div>g? c? d?u</div><div>Kh?ng c? n?i dung g? kh?c ??u b?n nh?</div><div>G? ???c ti?ng Vi?t ? ??y r?i ta?</div><div><br></div>		<div contenteditable=\"false\"><a href=\"http://localhost/quiz3/classfiles/Book1.xlsx\" target=\"new\" style=\"cursor:pointer;\">Book1.xlsx</a></div><br>'),
(2, 'THông tin lớp học  2', 1, 0, 0, 'ffds fdsfsfsdfsdffsdf<div>fsd</div><div>f</div><div>s</div><div>f</div><div>sdf</div><div>sd</div><div>f</div><div>ds</div><div>fsd</div><div>f</div><div>sd</div><div>f</div><div>sdasdasdadaa</div><div>d</div><div>sad</div><div>as</div><div>d</div><div>as</div>'),
(3, 'Name3', 1, 1357943054, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group`
--

CREATE TABLE `group` (
  `gid` int(11) NOT NULL,
  `group_name` varchar(1000) NOT NULL,
  `price` float NOT NULL,
  `valid_for_days` int(11) NOT NULL DEFAULT '0',
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `group`
--

INSERT INTO `group` (`gid`, `group_name`, `price`, `valid_for_days`, `description`) VALUES
(1, 'Free', 0, 0, '10 Free quiz'),
(3, 'Premium-1', 100, 90, '100 Quizzes'),
(4, 'Group 3', 2500, 90, '<p>Unlimites quizzes.</p>\r\n<p>Phone support</p>'),
(5, 'Nhóm Kiên4', 1000000, 0, '<p>M&ocirc; tả cho nh&oacute;m Ki&ecirc;n 4</p>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lesson`
--

CREATE TABLE `lesson` (
  `lesson_id` int(10) NOT NULL,
  `class_id` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `cid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lesson`
--

INSERT INTO `lesson` (`lesson_id`, `class_id`, `subject_id`, `cid`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 2),
(3, 1, 1, 3),
(4, 1, 1, 4),
(5, 2, 2, 1),
(6, 2, 2, 2),
(7, 2, 2, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `level`
--

CREATE TABLE `level` (
  `lid` int(11) NOT NULL,
  `level_name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `level`
--

INSERT INTO `level` (`lid`, `level_name`) VALUES
(1, 'Easy'),
(2, 'Difficult');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `link` varchar(100) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `create_date` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `menu`
--

INSERT INTO `menu` (`id`, `parent_id`, `name`, `link`, `icon`, `create_date`, `status`) VALUES
(1, 0, 'Content', '', 'fa fa-shopping-cart', 0, 1),
(2, 0, 'Class', 'class', 'fa fa-home', 0, 1),
(3, 0, 'Evaluation', '', 'fa fa-cog', 0, 1),
(4, 0, 'User', '', 'fa fa-users', 0, 1),
(5, 0, 'Setting', '', 'fa fa-cog', 0, 1),
(10, 1, 'Subject', 'subject', NULL, 0, 1),
(11, 1, 'Category', 'category', NULL, 0, 1),
(12, 1, 'Question', 'question', NULL, 0, 1),
(13, 1, 'Material', 'material', NULL, 0, 1),
(14, 3, 'Test List', 'test_list', NULL, 0, 1),
(15, 3, 'Test Result ', 'test_result', NULL, 0, 1),
(16, 4, 'User List', 'user', NULL, 0, 1),
(17, 4, 'Notification', 'notification', NULL, 0, 1),
(18, 5, 'Level List', 'level', NULL, 0, 1),
(19, 5, 'User Group', 'user_group', NULL, 0, 1),
(20, 5, 'System Menus', 'menu', NULL, 0, 1),
(21, 5, 'Account Type', 'account', NULL, 0, 1),
(22, 5, 'Config', 'config', NULL, 0, 1),
(23, 5, 'Custom', 'custom', NULL, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notification`
--

CREATE TABLE `notification` (
  `nid` int(11) NOT NULL,
  `notification_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(100) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `click_action` varchar(100) DEFAULT NULL,
  `notification_to` varchar(1000) DEFAULT NULL,
  `response` text,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `option`
--

CREATE TABLE `option` (
  `oid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `q_option` text NOT NULL,
  `q_option_match` varchar(1000) DEFAULT NULL,
  `score` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `option`
--

INSERT INTO `option` (`oid`, `qid`, `q_option`, `q_option_match`, `score`) VALUES
(46, 6, 'Good Morning', 'Good Night', 0.25),
(47, 6, 'Honda', 'BMW', 0.25),
(48, 6, 'Keyboard', 'CPU', 0.25),
(49, 6, 'Red', 'Green', 0.25),
(51, 7, 'Blue, Sky Blue', NULL, 1),
(52, 3, '4', NULL, 0.5),
(53, 3, '5', NULL, 0),
(54, 3, 'Four', NULL, 0.5),
(55, 3, 'Six', NULL, 0),
(56, 1, 'Patiala', NULL, 0),
(57, 1, 'New Delhi', NULL, 1),
(58, 1, 'Chandigarh', NULL, 0),
(59, 1, 'Mumbai', NULL, 0),
(76, 14, 'A', 'B', 0.25),
(77, 14, 'C', 'D', 0.25),
(78, 14, 'E', 'F', 0.25),
(79, 14, 'G', 'H', 0.25),
(81, 15, 'Washington, Washington D.C', NULL, 1),
(82, 13, '<p>five</p>', NULL, 0),
(83, 13, '<p>40</p>', NULL, 0.5),
(84, 13, '<p>fourty</p>', NULL, 0.5),
(85, 13, '<p>six</p>', NULL, 0),
(86, 12, '<p>five</p>', NULL, 0),
(87, 12, '<p>14</p>', NULL, 1),
(88, 12, '<p>three</p>', NULL, 0),
(89, 12, '<p>six</p>', NULL, 0),
(90, 17, '<p>Lựa chọn 1.1</p>', NULL, 0),
(91, 17, '<p>Lựa chọn 1.2</p>', NULL, 0),
(92, 17, '<p>Lựa chọn 1.3</p>', NULL, 1),
(93, 17, '<p>Lựa chọn 1.4</p>', NULL, 0),
(94, 18, 'five', NULL, 0),
(95, 18, 'four', NULL, 1),
(96, 18, 'three', NULL, 0),
(97, 18, 'six', NULL, 0),
(98, 19, 'five', NULL, 0),
(99, 19, 'four', NULL, 0.5),
(100, 19, 'four', NULL, 0.5),
(101, 19, 'six', NULL, 0),
(102, 20, 'A', 'B', 0.25),
(103, 20, 'C', 'D', 0.25),
(104, 20, 'E', 'F', 0.25),
(105, 20, 'G', 'H', 0.25),
(106, 21, 'Blue, Sky blue', NULL, 0.25),
(107, 23, '<p>Lựa chọn Kien2.1</p>', NULL, 1),
(108, 23, '<p>Lựa chọn Kien2.2</p>', NULL, 0),
(109, 23, '<p>Lựa chọn Kien2.3</p>', NULL, 0),
(110, 23, '<p>Lựa chọn Kien2.4</p>', NULL, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payment`
--

CREATE TABLE `payment` (
  `pid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `amount` float NOT NULL,
  `paid_date` int(11) NOT NULL,
  `payment_gateway` varchar(100) NOT NULL DEFAULT 'Paypal',
  `payment_status` varchar(100) NOT NULL DEFAULT 'Pending',
  `transaction_id` varchar(1000) NOT NULL,
  `other_data` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `qcl`
--

CREATE TABLE `qcl` (
  `qcl_id` int(11) NOT NULL,
  `quid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `noq` int(11) NOT NULL,
  `i_correct` text NOT NULL,
  `i_incorrect` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `qcl`
--

INSERT INTO `qcl` (`qcl_id`, `quid`, `cid`, `lid`, `noq`, `i_correct`, `i_incorrect`) VALUES
(71, 2, 1, 1, 3, '1', '0'),
(72, 2, 3, 1, 1, '1', '0'),
(73, 2, 2, 1, 1, '1', '0'),
(78, 4, 1, 1, 7, '1', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `question`
--

CREATE TABLE `question` (
  `qid` int(11) NOT NULL,
  `question_type` varchar(100) NOT NULL DEFAULT 'Multiple Choice Single Answer',
  `question` text NOT NULL,
  `description` text NOT NULL,
  `cid` int(11) NOT NULL,
  `lid` int(11) NOT NULL,
  `no_time_served` int(11) NOT NULL DEFAULT '0',
  `no_time_corrected` int(11) NOT NULL DEFAULT '0',
  `no_time_incorrected` int(11) NOT NULL DEFAULT '0',
  `no_time_unattempted` int(11) NOT NULL DEFAULT '0',
  `subject_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `question`
--

INSERT INTO `question` (`qid`, `question_type`, `question`, `description`, `cid`, `lid`, `no_time_served`, `no_time_corrected`, `no_time_incorrected`, `no_time_unattempted`, `subject_id`) VALUES
(1, 'Multiple Choice Single Answer', 'What is the capital of INDIA?', 'New Delhi', 2, 1, 15, 11, 2, 2, 1),
(3, 'Multiple Choice Multiple Answer', 'What is 2+2=?', '4', 2, 1, 15, 10, 2, 3, 1),
(6, 'Match the Column', 'Match the Following', '', 1, 1, 14, 6, 2, 6, 2),
(7, 'Short Answer', 'What is the color of sky?', '', 1, 1, 12, 5, 1, 6, 2),
(8, 'Long Answer', 'Write an essay on INDIA. (250 words )', '', 1, 1, 8, 0, 0, 5, 1),
(12, 'Multiple Choice Single Answer', '<p>What is 12+2 = ?</p>', '<p>Here is description or explanation</p>', 1, 2, 5, 2, 1, 2, 1),
(13, 'Multiple Choice Multiple Answer', '<p>What is 32+8 = ?&nbsp;</p>', '<p>Here is description or explanation</p>', 1, 2, 5, 2, 0, 3, 2),
(14, 'Match the Column', 'Match the column', 'Here is description or explanation', 1, 2, 0, 0, 0, 0, 2),
(15, 'Short Answer', '<p>What is the capital of USA</p>', '<p>Here is description or explanation</p>', 1, 2, 0, 0, 0, 0, 2),
(16, 'Long Answer', '<p>Write about Globalization in 250 words</p>', '<p>Here is description or explanation</p>', 2, 2, 0, 0, 0, 0, 1),
(17, 'Multiple Choice Single Answer', '<p>C&acirc;u hỏi 1</p>', '<p>M&ocirc; tả cho c&acirc;u hỏi 1</p>', 2, 1, 0, 0, 0, 0, 1),
(18, 'Multiple Choice Single Answer', 'Kien What is 2+2 = ?', 'Mô tả trả lời/giải thích cho câu Kien What is 2+2 = ?', 1, 1, 4, 3, 0, 1, 1),
(19, 'Multiple Choice Multiple Answer', 'Kien What is 2+2 = ?(multiple choice)', 'Mô tả trả lời/giải thích cho câu Kien What is 2+2 = ?(multiple choice)', 1, 1, 3, 0, 2, 1, 1),
(20, 'Match the Column', 'Kien Match the column', 'Mô tả trả lời/giải thích cho câu Kien Match the column', 1, 1, 4, 0, 1, 3, 0),
(21, 'Short Answer', 'Kien What is the color of sky?', 'Mô tả trả lời/giải thích cho câu Kien What is the color of sky?', 1, 1, 3, 2, 0, 1, 0),
(22, 'Long Answer', 'Kien Write about Globalization in 250 words', 'Mô tả trả lời/giải thích cho câu Kien Write about Globalization in 250 words', 1, 1, 4, 0, 0, 3, 0),
(23, 'Multiple Choice Single Answer', '<p>C&acirc;u hỏi Ki&ecirc;n #2 ở đ&acirc;y. Tr&ocirc;ng ảnh được đấy chứ :)</p>\r\n<p><img src=\"https://i-vnexpress.vnecdn.net/2018/04/25/vk-8340-1524614982.jpg\" alt=\"Ảnh cho c&acirc;u hỏi Kien2 từ Vnexpress\" width=\"500\" height=\"300\" /></p>', '<p>Giải th&iacute;ch phuwong &aacute;n đ&uacute;ng cho c&acirc;u hỏi Kien2</p>', 2, 1, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quiz`
--

CREATE TABLE `quiz` (
  `quid` int(11) NOT NULL,
  `quiz_name` varchar(1000) NOT NULL,
  `description` text NOT NULL,
  `start_date` int(11) NOT NULL,
  `end_date` int(11) NOT NULL,
  `gids` text NOT NULL,
  `qids` text NOT NULL,
  `noq` int(11) NOT NULL,
  `correct_score` text NOT NULL,
  `incorrect_score` text NOT NULL,
  `ip_address` text NOT NULL,
  `duration` int(11) NOT NULL DEFAULT '10',
  `maximum_attempts` int(11) NOT NULL DEFAULT '1',
  `pass_percentage` float NOT NULL DEFAULT '50',
  `view_answer` int(11) NOT NULL DEFAULT '1',
  `camera_req` int(11) NOT NULL DEFAULT '1',
  `question_selection` int(11) NOT NULL DEFAULT '1',
  `gen_certificate` int(11) NOT NULL DEFAULT '0',
  `certificate_text` text,
  `with_login` int(11) NOT NULL DEFAULT '1',
  `quiz_template` varchar(100) NOT NULL DEFAULT 'Default'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `quiz`
--

INSERT INTO `quiz` (`quid`, `quiz_name`, `description`, `start_date`, `end_date`, `gids`, `qids`, `noq`, `correct_score`, `incorrect_score`, `ip_address`, `duration`, `maximum_attempts`, `pass_percentage`, `view_answer`, `camera_req`, `question_selection`, `gen_certificate`, `certificate_text`, `with_login`, `quiz_template`) VALUES
(1, 'Sample Quiz', '<p>Sample Quiz Sample Quiz</p>', 1460344840, 1522502169, '3,1', '1,3,12,13', 4, '1', '0', '', 1000, 10, 50, 1, 0, 0, 0, NULL, 1, 'Default'),
(2, 'Sample Quiz 2', '<p>Sample Quiz 2</p>', 1457687593, 1522502169, '1,3,4', '', 5, '1', '0', '', 100, 10, 50, 1, 0, 1, 1, 'ID: #{result_id}<br>\r\n \r\n<br><br>\r\n<center>\r\n<font style=\'font-size:32px;\'>Certificate</font><br><br><br>\r\n<h4>This is certified that {first_name}  {last_name} has attempted the quiz \'{quiz_name}\' and obtained {percentage_obtained}% marks.<br>\r\nHis/her result status is {status}<br>\r\n</h4>\r\n\r\n</center>\r\n<br><br><br><br><br><br> \r\n{qr_code}<br>\r\nDate: {generated_date}', 1, 'Default'),
(3, 'Quiz with advance template', '', 1490966169, 1522502169, '1,3,4', '1,3,6,7', 4, '1,1,1,1', '-0.33,-0.33,-0.33,-0.33', '', 10, 10, 50, 1, 0, 0, 0, NULL, 1, 'Advance'),
(4, 'Kiên Quiz1', '<p>M&ocirc; tả cho Ki&ecirc;n Quiz1 ở đ&acirc;y</p>', 1524666710, 1556375510, '1,3,4', '', 7, '1,1,1,1,1,1,1', '0,0,0,0,0,0,0', '', 10, 10, 50, 1, 1, 1, 1, 'mã kết quả: {result_id}\r\nXin chào {first_name}, bạn đã chiến thắng trong quiz {quiz_name} với tỷ lệ phần trăm đạt được là {percentage_obtained}, score là {score_obtained}, kết quả là {result}, \r\nNgày: {generated_date}, {qr_code} ', 1, 'Default'),
(5, 'Bài quiz kien1', '<p>M&ocirc; tả b&agrave;i quiz cho ki&ecirc;n 1</p>', 1525340068, 1556876068, '1', '', 0, '', '', '', 10, 10, 50, 1, 0, 1, 0, NULL, 1, 'Default'),
(6, 'Kien Quiz2', '<p>Nooij dung quiz 2 nhaapj cau hoi thu cong</p>', 1525343443, 1556879443, '1', '', 0, '1', '0', '', 10, 10, 50, 1, 0, 0, 0, NULL, 1, 'Default'),
(7, 'lam ngu', '', 1537169467, 1568705467, '1', '', 0, '', '', 'àdasfd', 10, 10, 50, 1, 0, 0, 0, 'ádfadf', 1, 'Default');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `result`
--

CREATE TABLE `result` (
  `rid` int(11) NOT NULL,
  `quid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `result_status` varchar(100) NOT NULL DEFAULT 'Open',
  `start_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `categories` text NOT NULL,
  `category_range` text NOT NULL,
  `r_qids` text NOT NULL,
  `individual_time` text NOT NULL,
  `total_time` int(11) NOT NULL DEFAULT '0',
  `score_obtained` float NOT NULL DEFAULT '0',
  `percentage_obtained` float NOT NULL DEFAULT '0',
  `attempted_ip` varchar(100) NOT NULL,
  `score_individual` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `manual_valuation` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `result`
--

INSERT INTO `result` (`rid`, `quid`, `uid`, `result_status`, `start_time`, `end_time`, `categories`, `category_range`, `r_qids`, `individual_time`, `total_time`, `score_obtained`, `percentage_obtained`, `attempted_ip`, `score_individual`, `photo`, `manual_valuation`) VALUES
(1, 4, 1, 'Pending', 1524667116, 1524667254, 'Integration Management', '7', '21,22,8,6,7,18,20', '0,47,10,47,9,5,6', 124, 4, 57.1429, '::1', '1,3,3,1,1,1,2', '1524667116.jpg', 1),
(2, 4, 6, 'Pending', 1524668489, 1524668568, 'Integration Management', '7', '18,8,21,19,20,6,22', '0,35,13,5,0,0,11', 64, 2, 28.5714, '::1', '1,3,1,2,0,0,0', '', 1),
(3, 5, 1, 'Open', 1525772017, 0, '', '', '', '', 0, 0, 0, '127.0.0.1', '', '', 0),
(4, 4, 6, 'Fail', 1536222062, 1536222097, 'Integration Management', '7', '6,18,19,8,20,22,21', '0,16,14,0,0,0,0', 30, 1, 14.2857, '127.0.0.1', '2,1,0,0,0,0,0', '', 0),
(5, 4, 6, 'Fail', 1537514205, 1537542119, 'Integration Management', '7', '19,20,8,18,7,6,22', '90,0,0,0,0,0,0', 90, 0, 0, '::1', '2,0,0,0,0,0,0', '', 0),
(6, 5, 6, 'Open', 1537667116, 0, '', '', '', '', 0, 0, 0, '::1', '', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'admin'),
(2, 'giao vien'),
(3, 'user'),
(4, 'support');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_menu`
--

CREATE TABLE `role_menu` (
  `id` int(10) NOT NULL,
  `menu_id` int(10) NOT NULL,
  `role_id` int(10) NOT NULL,
  `actions` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `role_menu`
--

INSERT INTO `role_menu` (`id`, `menu_id`, `role_id`, `actions`) VALUES
(1, 1, 1, '1,2,3,4'),
(2, 2, 1, '1,2,3,4'),
(3, 3, 1, '1,2,3,4'),
(4, 4, 1, '1,2,3,4'),
(5, 5, 1, '1,2,3,4'),
(6, 10, 1, '1,2,3,4'),
(7, 11, 1, '1,2,3,4'),
(8, 12, 1, '1,2,3,4'),
(9, 13, 1, '1,2,3,4'),
(10, 14, 1, '1,2,3,4'),
(11, 15, 1, '1,2,3,4'),
(12, 16, 1, '1,2,3,4'),
(13, 17, 1, '1,2,3,4'),
(14, 18, 1, '1,2,3,4'),
(15, 19, 1, '1,2,3,4'),
(16, 20, 1, '1,2,3,4'),
(17, 21, 1, '1,2,3,4'),
(18, 22, 1, '1,2,3,4'),
(19, 23, 1, '1,2,3,4');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting`
--

CREATE TABLE `setting` (
  `id` int(10) NOT NULL,
  `key_setting` int(10) NOT NULL,
  `value` varchar(50) NOT NULL,
  `note` varchar(50) NOT NULL,
  `type` int(10) NOT NULL,
  `ordering` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `setting`
--

INSERT INTO `setting` (`id`, `key_setting`, `value`, `note`, `type`, `ordering`) VALUES
(1, 1, 'Them', '', 1, 0),
(2, 2, 'Sua', '', 1, 1),
(3, 3, 'Xoa', '', 1, 2),
(4, 4, 'Xem', '', 1, 3),
(5, 5, 'Import', '', 1, 4),
(6, 6, 'Export', '', 1, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `subject`
--

INSERT INTO `subject` (`subject_id`, `name`) VALUES
(1, 'Phân Tích Giải Thuật'),
(2, 'CSDL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `test_table`
--

CREATE TABLE `test_table` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `dob` datetime DEFAULT NULL,
  `created_at` int(10) NOT NULL,
  `updated_at` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `contact_no` varchar(1000) DEFAULT NULL,
  `connection_key` varchar(1000) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `gid` int(11) NOT NULL DEFAULT '1',
  `su` int(11) NOT NULL DEFAULT '0',
  `subscription_expired` int(11) NOT NULL DEFAULT '0',
  `verify_code` int(11) NOT NULL DEFAULT '0',
  `wp_user` varchar(100) DEFAULT NULL,
  `registered_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `photo` varchar(1000) DEFAULT NULL,
  `user_status` varchar(100) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `password`, `username`, `first_name`, `last_name`, `contact_no`, `connection_key`, `role_id`, `gid`, `su`, `subscription_expired`, `verify_code`, `wp_user`, `registered_date`, `photo`, `user_status`) VALUES
(1, '202cb962ac59075b964b07152d234b70', 'admin@example.com', 'Admin', 'Admin', '1234567890', NULL, 1, 1, 1, 1776290400, 0, '', '2017-04-20 18:22:38', NULL, 'Active'),
(5, '202cb962ac59075b964b07152d234b70', 'user@example.com', 'User', 'User2', '1234567890', '123', 3, 1, 0, 2122569000, 0, '', '2017-04-20 18:22:38', NULL, 'Active'),
(6, '202cb962ac59075b964b07152d234b70', 'kienntvn@gmail.com', 'Kien', 'User', '0912656836', NULL, 4, 1, 0, 2147483647, 0, NULL, '2018-04-25 10:48:12', NULL, 'Active'),
(16, '202cb962ac59075b964b07152d234b70', 'kiennt@gmail.com', 'Kiên', 'Admin', '0912656836', NULL, 2, 4, 0, 0, 0, NULL, '2018-04-25 21:06:39', NULL, 'Active');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`aid`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cid`);

--
-- Chỉ mục cho bảng `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Chỉ mục cho bảng `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`class_id`);

--
-- Chỉ mục cho bảng `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`gid`);

--
-- Chỉ mục cho bảng `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`lesson_id`);

--
-- Chỉ mục cho bảng `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`lid`);

--
-- Chỉ mục cho bảng `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`nid`);

--
-- Chỉ mục cho bảng `option`
--
ALTER TABLE `option`
  ADD PRIMARY KEY (`oid`);

--
-- Chỉ mục cho bảng `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pid`);

--
-- Chỉ mục cho bảng `qcl`
--
ALTER TABLE `qcl`
  ADD PRIMARY KEY (`qcl_id`);

--
-- Chỉ mục cho bảng `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`qid`);

--
-- Chỉ mục cho bảng `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quid`);

--
-- Chỉ mục cho bảng `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`rid`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `role_menu`
--
ALTER TABLE `role_menu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Chỉ mục cho bảng `test_table`
--
ALTER TABLE `test_table`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `answer`
--
ALTER TABLE `answer`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `course`
--
ALTER TABLE `course`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `group`
--
ALTER TABLE `group`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `lesson`
--
ALTER TABLE `lesson`
  MODIFY `lesson_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `level`
--
ALTER TABLE `level`
  MODIFY `lid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `notification`
--
ALTER TABLE `notification`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `option`
--
ALTER TABLE `option`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT cho bảng `payment`
--
ALTER TABLE `payment`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `qcl`
--
ALTER TABLE `qcl`
  MODIFY `qcl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `question`
--
ALTER TABLE `question`
  MODIFY `qid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `result`
--
ALTER TABLE `result`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `role_menu`
--
ALTER TABLE `role_menu`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `test_table`
--
ALTER TABLE `test_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
