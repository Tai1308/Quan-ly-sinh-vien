-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 26, 2024 lúc 07:44 PM
-- Phiên bản máy phục vụ: 10.4.17-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_echo_land`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_course`
--

CREATE TABLE `category_course` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_course`
--

INSERT INTO `category_course` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'KHÓA HỌC CHUYÊN SÂU', '2024-04-10 08:02:59', '2024-04-10 08:02:59'),
(2, 'KHÓA CHO NGƯỜI MỚI', '2024-04-10 08:02:59', '2024-04-10 08:02:59'),
(3, 'TIẾNG ANH CHO TRẺ EM', '2024-04-10 08:03:42', '2024-04-10 08:03:42'),
(4, 'TIẾNG ANH CHO NGƯỜI ĐI LÀM', '2024-04-10 08:03:42', '2024-04-10 08:03:42'),
(6, 'KHÓA HỌC THI IELTS', '2024-04-10 08:22:08', '2024-04-10 08:22:08'),
(7, 'NGỮ PHÁP & TỪ VỰNG', '2024-04-10 08:22:08', '2024-04-10 08:22:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `course_detail`
--

CREATE TABLE `course_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tuition` bigint(20) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `notes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `id_studyTime` bigint(20) UNSIGNED NOT NULL,
  `id_studyShift` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `course_detail`
--

INSERT INTO `course_detail` (`id`, `name`, `tuition`, `quantity`, `notes`, `startDate`, `endDate`, `category_id`, `id_studyTime`, `id_studyShift`, `created_at`, `updated_at`) VALUES
(68, 'Mục tiêu từ 6.0 đạt 7.0+ IELTS', 5000000, 5, 'Cùng các bạn phát triển từng ngày và đạt được kết quả với từng bạn đề ra', '2024-06-25', '2024-08-31', 1, 1, 1, NULL, NULL),
(69, 'Mục tiêu từ 7.0 đạt 8.0+ IELTS', 6000000, 7, 'Giúp học viên cải thiện mọi kĩ năng và đạt được mục đích của bản thân đề ra', '2024-06-29', '2024-09-26', 1, 1, 1, NULL, NULL),
(70, 'Lớp dành cho người mới bắt đầu', 7000000, 10, 'Dành cho người mới bắt đầu học tiếng anh, sau khi học xong sẽ có thể giao tiếp cơ bản với người nước ngoài được', '2024-06-27', '2024-09-24', 2, 2, 1, NULL, NULL),
(71, 'Dành cho trẻ từ 4 đến 5 tuổi', 4000000, 5, 'Giúp các bạn làm quen với các kiến thức nền tảng, sau khi học xong các bạn có thể phát âm được các từ cơ bản', '2024-06-28', '2024-09-10', 3, 1, 2, NULL, NULL),
(72, 'Dành cho trẻ từ 5 đến 7 tuổi', 5000000, 10, 'Giúp các bạn có thể nghe và nói tốt hơn, sau khóa học các bạn có thể giao tiếp cơ bản được', '2024-06-30', '2024-10-03', 3, 1, 3, NULL, NULL),
(73, 'Dành cho trẻ từ 7 đến 10 tuổi', 5000000, 5, 'Giúp các bạn có thể cả thiện 3 kĩ năng chính nghe, phát âm và viết', '2024-07-26', '2024-10-26', 3, 5, 2, NULL, NULL),
(74, 'Giao tiếp cơ bản', 6000000, 8, 'Dành cho người đã đi làm muốn cải thiện kĩ năng giao tiếp để thuận tiện trong công việc của mình', '2024-06-28', '2024-09-18', 4, 1, 1, NULL, NULL),
(75, 'Luyện đề IELTS ở mức 6.0- 6.5 lên 7.0+', 4000000, 8, 'Giúp các bạn ôn luyện đề thi để có kết quả thi thật tốt', '2024-07-01', '2024-08-12', 6, 5, 3, NULL, NULL),
(76, 'Nâng cao ngữ pháp', 6000000, 6, 'Giúp người học cải thiện ngữ pháp của bản thân mình', '2024-06-30', '2024-08-30', 7, 2, 2, NULL, NULL),
(77, 'Mục tiêu từ 5.0 đạt 6.0+ IELTS', 6000000, 5, 'Giúp các bạn nâng cao được kĩ năng cần thiết và đạt được kết quả mà mình đề ra', '2024-06-30', '2024-08-29', 1, 1, 1, NULL, NULL),
(80, 'Luyện đề IELTS ở mức 5.0- 5.5 lên 6.0+', 5000000, 5, NULL, '2024-06-26', '2024-09-13', 6, 1, 2, NULL, NULL),
(92, 'grregegr', 5000000, 5, 'gggd', '2024-06-27', '2024-08-30', 1, 1, 1, NULL, NULL),
(93, 'htyhyht4h', 6000000, 6, 'fbffhh', '2024-06-27', '2024-08-30', 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diemdanh`
--

CREATE TABLE `diemdanh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_registerStudent` bigint(20) UNSIGNED NOT NULL,
  `id_period` bigint(20) UNSIGNED NOT NULL,
  `thamgia` bigint(20) UNSIGNED NOT NULL,
  `vang` int(11) NOT NULL,
  `lydovang` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `document_course`
--

CREATE TABLE `document_course` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `courseId` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_post` date NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `exam`
--

CREATE TABLE `exam` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_exam` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_level` int(11) NOT NULL,
  `courseId` int(11) NOT NULL,
  `time` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity_question` int(11) NOT NULL,
  `date_exam` date NOT NULL,
  `content_task1` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chart_task1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_task2` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `exam`
--

INSERT INTO `exam` (`id`, `name_exam`, `id_level`, `courseId`, `time`, `quantity_question`, `date_exam`, `content_task1`, `chart_task1`, `content_task2`, `created_at`, `updated_at`) VALUES
(3, 'FINAL_TEST_INTENSIVE05102019', 1, 2, '2', 2, '2019-12-04', 'The graph below shows the number of inquiries received by the Tourist Information Office in one city over a six-month period in 2011.\r\nSummarize the information by selecting and reporting the main features and make comparisons where relevant.', 'VAXp_WrittingTask1.PNG', 'Write about the following topic:Nowadays, people in some countries are living in a “throw away” society, which means that people use things for a short time and then throw them away. What are the causes of this and what problems does it cause? Give reasons for your answer and include any relevant examples from your own knowledge or experience.', NULL, NULL),
(5, 'FINAL_TEST_PRE_IELT11062019', 4, 6, '3', 3, '2019-12-12', 'The graph below shows the number of inquiries received by the Tourist Information Office in one city over a six-month period in 2011.\r\nSummarize the information by selecting and reporting the main features and make comparisons where relevant.', '9RPd_WrittingTask1.PNG', 'Nowadays, people in some countries are living in a “throw away” society, which means that people use things for a short time and then throw them away. What are the causes of this and what problems does it cause? Give reasons for your answer and include any relevant examples from your own knowledge or experience.', NULL, NULL),
(6, 'FINAL_TEST_IELTS_INTENSIVE20112019', 1, 8, '2', 2, '2019-12-07', 'The graph below shows the number of inquiries received by the Tourist Information Office in one city over a six-month period in 2011.\r\nSummarize the information by selecting and reporting the main features and make comparisons where relevant.', 'cJY4_WrittingTask1.PNG', 'Nowadays, people in some countries are living in a “throw away” society, which means that people use things for a short time and then throw them away. What are the causes of this and what problems does it cause? Give reasons for your answer and include any relevant examples from your own knowledge or experience.', NULL, NULL),
(7, 'FINAL_TEST_FOUNDATION05102019', 2, 4, '3', 3, '2019-12-04', 'The graph below shows the number of inquiries received by the Tourist Information Office in one city over a six-month period in 2011.\r\nSummarize the information by selecting and reporting the main features and make comparisons where relevant.', '50Yl_WrittingTask1.PNG', 'Nowadays, people in some countries are living in a “throw away” society, which means that people use things for a short time and then throw them away. What are the causes of this and what problems does it cause? Give reasons for your answer and include any relevant examples from your own knowledge or experience.', NULL, NULL),
(8, 'Đề thi khóa học cho người mới bắt đầu', 1, 14, '45', 10, '2024-05-28', 'Đề 1', 'jYer_CNM36.docx', NULL, NULL, NULL),
(9, 'Test trình độ lần 1', 2, 15, '15', 10, '2024-08-15', 'sdfsdfsd', 'afmn_3.png', 'sdfsdf', NULL, NULL),
(13, 'Test 5345', 1, 22, '10', 5, '2024-06-06', 'Test 232332', 'YUrN_connection môn web2.png', 'Test 232332', NULL, NULL),
(14, 'Thi test trình độ', 1, 18, '10', 8, '2024-06-08', 'Đề bài 1', 'lmei_CHỮA BÀI BIỂU ĐỒ TUẦN TỰ.png', 'Đề bài 2', NULL, NULL),
(19, 'DE THI ThU', 1, 37, '30', 5, '2024-06-12', 'ffedet', 'XdAb_Ảnh đề thi viết 2.png', 'fdtwetqwe', NULL, NULL),
(20, 'Thi Nâng cao', 1, 38, '10', 5, '2024-06-12', 'Đề bài 1', 'TLef_Ảnh đề thi viết 2.png', 'Đề bài 3', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history`
--

CREATE TABLE `history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_student` int(11) NOT NULL,
  `courseId` int(50) DEFAULT NULL,
  `id_exam` int(11) DEFAULT NULL,
  `score` double DEFAULT NULL,
  `score_writing` double DEFAULT NULL,
  `reading_score` float DEFAULT NULL,
  `speaking_score` float DEFAULT NULL,
  `listening_score` float DEFAULT NULL,
  `score_overall` double DEFAULT NULL,
  `result` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `history`
--

INSERT INTO `history` (`id`, `id_student`, `courseId`, `id_exam`, `score`, `score_writing`, `reading_score`, `speaking_score`, `listening_score`, `score_overall`, `result`, `created_at`, `updated_at`) VALUES
(23, 272413188, 2, 3, 5, 5, 6, 7.5, 6, 8, 'Đạt', NULL, NULL),
(24, 272413199, 2, 3, 5, 6.5, NULL, NULL, NULL, 8, 'Đạt', NULL, NULL),
(27, 272413188, 6, 5, 0, 0, NULL, NULL, NULL, 8, 'Đạt', NULL, NULL),
(28, 272413188, 4, 7, 6.67, 0, NULL, NULL, NULL, 8, 'Đạt', NULL, NULL),
(29, 272413188, 8, 6, 10, 0, NULL, NULL, NULL, 8, 'Đạt', NULL, NULL),
(31, 1212121122, 14, 8, 1.67, 0, NULL, NULL, NULL, 8, 'Đạt', NULL, NULL),
(38, 675432, 54, NULL, 0, 7, 6, 6, 7, 6.5, 'Chưa đạt', NULL, NULL),
(39, 654322, 54, NULL, 6, 4, 5, 4, 5, 4.5, 'Chưa đạt', NULL, NULL),
(40, 675432, 68, NULL, 0, 5, 7, 6, 9, 7, 'Đạt', NULL, NULL),
(41, 654322, 68, NULL, 0, 7, 7, 5, 4, 6, 'Đạt', NULL, NULL),
(42, 546756, 68, NULL, 0, 6, 4, 7, 5, 5.5, 'Chưa đạt', NULL, NULL),
(43, 328440, 68, NULL, 0, 6, 5, 5, 6, 5.5, 'Chưa đạt', NULL, NULL),
(44, 328379, 68, NULL, 0, 6, 6, 6, 6, 6, 'Đạt', NULL, NULL),
(45, 167843, 69, NULL, 0, 6, 6, 7, 4, 6, 'Chưa đạt', NULL, NULL),
(46, 167432, 69, NULL, 0, 7, 7, 7, 5, 6.5, 'Chưa đạt', NULL, NULL),
(47, 165423, 69, NULL, 0, 8, 7, 8, 7, 7.5, 'Đạt', NULL, NULL),
(48, 164762, 69, NULL, 0, 8, 8, 8, 6, 7.5, 'Đạt', NULL, NULL),
(49, 164323, 69, NULL, 0, 6, 6, 5, 6, 6, 'Chưa đạt', NULL, NULL),
(50, 201306, 69, NULL, 0, 7, 7, 6, 5, 6.5, 'Chưa đạt', NULL, NULL),
(51, 201244, 69, NULL, 0, 6, 6, 5, 6, 6, 'Đạt', NULL, NULL),
(52, 200649, 77, NULL, 0, 6, 6, 6, 6, 6, 'Đạt', NULL, NULL),
(53, 200492, 77, NULL, 0, 6, 6, 6, 6, 6, 'Đạt', NULL, NULL),
(54, 200411, 77, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 169662, 77, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 201244, 72, NULL, 0, 4, 5, 5, 7, 5.5, 'Chưa đạt', NULL, NULL),
(57, 200716, 75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(58, 200649, 75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(59, 200492, 75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 200411, 75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 169662, 75, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 201244, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(63, 201164, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 201097, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(65, 200988, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(66, 200893, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(67, 200828, 70, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(68, 201097, 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(69, 200988, 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(70, 200893, 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(71, 200828, 71, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_27_045319_create_category_course_table', 1),
(4, '2019_08_28_045723_create_parttime_table', 1),
(5, '2019_08_28_050108_create_student_table', 1),
(6, '2019_08_28_050304_create_teacher_table', 1),
(7, '2019_08_28_050453_create_library_table', 1),
(8, '2019_08_28_050618_create_equipment_table', 1),
(9, '2019_09_23_023020_create_level_question_table', 1),
(10, '2019_09_23_031854_create_subject_question_table', 1),
(11, '2019_09_23_081725_create_questionnaire_table', 1),
(12, '2019_09_23_130218_create_answer_table_table', 1),
(13, '2019_10_04_021237_create_study_time_table', 1),
(14, '2019_10_04_064533_create_study_shift_table', 1),
(15, '2019_10_04_070258_create_course_detail_table', 1),
(16, '2019_10_05_104738_create_exam_table', 1),
(17, '2019_10_06_105534_create_register_question_exam', 1),
(18, '2019_10_16_074419_create_period_table', 1),
(19, '2019_10_27_044948_create_register_course_teacher_table', 1),
(20, '2019_10_27_045123_create_register_course_student_table', 1),
(21, '2019_10_28_111632_diemdanh', 1),
(22, '2019_10_30_135226_document_course_table', 1),
(23, '2019_11_02_033629_create_history_table', 1),
(24, '2019_11_03_045210_create_teaching_schedule', 1),
(25, '2019_12_06_121052_create_trainee_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `period`
--

CREATE TABLE `period` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `period` int(11) NOT NULL,
  `courseId` bigint(20) UNSIGNED NOT NULL,
  `teacherId` bigint(20) UNSIGNED NOT NULL,
  `skill` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_study` date NOT NULL,
  `id_studyShift` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `register_course_student`
--

CREATE TABLE `register_course_student` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `courseId` bigint(20) UNSIGNED NOT NULL,
  `studentId` bigint(20) UNSIGNED NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `tuition` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `register_course_student`
--

INSERT INTO `register_course_student` (`id`, `courseId`, `studentId`, `status`, `tuition`, `created_at`, `updated_at`) VALUES
(3, 68, 675432, 1, 5000000, NULL, NULL),
(4, 68, 654322, 1, 5000000, NULL, NULL),
(5, 68, 546756, 1, 5000000, NULL, NULL),
(6, 68, 328440, 1, 5000000, NULL, NULL),
(7, 68, 328379, 1, 5000000, NULL, NULL),
(8, 69, 167843, NULL, 6000000, NULL, NULL),
(9, 69, 167432, NULL, 6000000, NULL, NULL),
(10, 69, 165423, NULL, 6000000, NULL, NULL),
(11, 69, 164762, NULL, 6000000, NULL, NULL),
(12, 69, 164323, NULL, 6000000, NULL, NULL),
(13, 69, 201306, NULL, 6000000, NULL, NULL),
(14, 69, 201244, NULL, 6000000, NULL, NULL),
(15, 77, 200649, NULL, 6000000, NULL, NULL),
(16, 77, 200492, NULL, 6000000, NULL, NULL),
(17, 77, 200411, NULL, 6000000, NULL, NULL),
(18, 77, 169662, NULL, 6000000, NULL, NULL),
(19, 72, 201244, NULL, 5000000, NULL, NULL),
(20, 75, 200716, NULL, 4000000, NULL, NULL),
(21, 75, 200649, NULL, 4000000, NULL, NULL),
(22, 75, 200492, NULL, 4000000, NULL, NULL),
(23, 75, 200411, NULL, 4000000, NULL, NULL),
(24, 75, 169662, NULL, 4000000, NULL, NULL),
(25, 70, 201244, NULL, 7000000, NULL, NULL),
(26, 70, 201164, NULL, 7000000, NULL, NULL),
(27, 70, 201097, NULL, 7000000, NULL, NULL),
(28, 70, 200988, NULL, 7000000, NULL, NULL),
(29, 70, 200893, NULL, 7000000, NULL, NULL),
(30, 70, 200828, NULL, 7000000, NULL, NULL),
(31, 71, 201097, NULL, 4000000, NULL, NULL),
(32, 71, 200988, NULL, 4000000, NULL, NULL),
(33, 71, 200893, NULL, 4000000, NULL, NULL),
(34, 71, 200828, NULL, 4000000, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `register_course_teacher`
--

CREATE TABLE `register_course_teacher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `courseId` bigint(20) UNSIGNED NOT NULL,
  `teacherId` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `register_course_teacher`
--

INSERT INTO `register_course_teacher` (`id`, `courseId`, `teacherId`, `created_at`, `updated_at`) VALUES
(1, 68, 154326, NULL, NULL),
(4, 77, 168654, NULL, NULL),
(5, 72, 168654, NULL, NULL),
(6, 75, 328869, NULL, NULL),
(7, 69, 168654, NULL, NULL),
(11, 92, 168654, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student`
--

CREATE TABLE `student` (
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `student_card` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `student_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target_point` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `student`
--

INSERT INTO `student` (`student_id`, `student_card`, `id_user`, `student_name`, `phone`, `email`, `address`, `sex`, `target_point`, `created_at`, `updated_at`) VALUES
(164323, NULL, 21, 'Trần Thị Vui', '0988765436', 'Vuivui432@gmail.com', 'Thanh Xuân, Hà Nội', '0', '7', NULL, NULL),
(164762, NULL, 10, 'Nguyễn Ngọc Thùy Linh', '0987652222', 'memorylinhlinh@gmail.com', 'Hòa Bình', '0', '6.5', NULL, NULL),
(165423, NULL, 13, 'Trương Trung Tín', '0987654322', 'tin123456@gmail.com', 'Cầu Giấy, Hà Nội', '1', '5', NULL, NULL),
(167432, NULL, 12, 'Nguyễn Thành Phước', '0987654321', 'phuoc123456@gmail.com', 'Minh Khai, Hà Nội', '1', '7', NULL, NULL),
(167843, NULL, 6, 'Nguyễn Đức Nhân', '0987654321', 'ducnhan060695@gmail.com', 'Thanh Hóa', '1', '7.5', NULL, NULL),
(169662, NULL, 38, 'Phùng Cát Tiên', '0868650096', 'cattientran235@gmail.com', '76,Hai Bà Trưng, Hà Nội', '0', '7', NULL, NULL),
(200411, '001032309071', 39, 'Nguyễn Quang Hải', '0988709001', 'quanghai234@gmail.com', 'Ứng Hòa, Hà Nội', '1', '7', NULL, NULL),
(200492, '001032376843', 40, 'Nguyễn Quang Duy', '0868010886', 'quangduy99@gmail.com', '23 Cầu Giấy, Hà Nội', '1', '6', NULL, NULL),
(200649, '001032300984', 41, 'Đặng Văn Lâm', '0868023234', 'danglam201@gmail.com', 'Thanh Trì. Hà Nội', '1', '6,5', NULL, NULL),
(200716, '0012064537765', 42, 'Nguyễn Thanh Xuân', '0868090123', 'thanhxuaan23@gmail.com', '126,Hai Bà Trưng, Hà Nội', '0', '6,5', NULL, NULL),
(200828, '002209879890', 43, 'Hoàng Thu Hồng', '0123456543', 'thuhong2301@gmail.com', 'Hồng Quang, Ứng Hòa, Hà Nội', '0', '6,5', NULL, NULL),
(200893, '001032349998', 44, 'Hoàng Hồng Ngọc', '0868654345', 'hongngoc457@gmail.com', 'Long Biên, Hà Nội', '0', '6', NULL, NULL),
(200988, '0012064533234', 45, 'Nguyễn Thúy Lệ', '0868609801', 'thuyle675@gmail.com', '23 Giải Phóng, Hà Nội', '0', '6', NULL, NULL),
(201097, '001202430964', 46, 'Vũ Thị Thúy', '0868659871', 'vuthuy873@gmail.com', 'Hưng Hà, Thái Bình', '0', '6', NULL, NULL),
(201164, '0010320965756', 47, 'Hoàng Thanh Phong', '0123456123', 'thanhphong978@gmai.com', 'Hồng Quang, Ứng Hòa, Hà Nội', '1', '6', NULL, NULL),
(201244, '001202439974', 48, 'Đinh Mạnh Hiệp', '0868653376', 'manhhiep2345@gmail.com', 'Ba Đình, Hà Nội', '1', '6,5', NULL, NULL),
(201306, '001201065743', 49, 'Dương Hữu Phú', '0868667865', 'huuphu8765@gmail.com', 'Ba Đình, Hà Nội', '1', '7', NULL, NULL),
(201384, '001206238876', 50, 'Trần Đức Khải', '0868659933', 'duckhai34355@gmail.com', 'Thanh Trì, Hà Nội', '1', '6,5', NULL, NULL),
(201568, '001030979021', 51, 'Nguyễn Trí Đức', '0868632123', 'triduc2342@gmail.com', 'Hưng Hà, Thái Bình', '1', '6', NULL, NULL),
(327857, '0010093321', 52, 'Trần Hiểu Trúc', '0868098564', 'trantruc45@gmail.com', 'Ứng Hòa, Hà Nội', '0', '6', NULL, NULL),
(327924, '0010328768751', 53, 'Nguyễn Quang Việt', '0988754321', 'quangviet5462@gmail.com', 'Ứng Hòa, Hà Nội', '1', '6,5', NULL, NULL),
(328008, '0010398998789', 54, 'Kiều Hồng Nhung', '0987685432', 'hongnhung987@gmail.com', 'Đội Bình, Ứng Hòa, Hà Nội', '0', '6', NULL, NULL),
(328098, '0012010657664', 55, 'Nguyễn Thị Nga', '0987365341', 'nguyennga345@gmail.com', '78 Minh Khai, Hà Nội', '0', '6', NULL, NULL),
(328177, '001202092313', 56, 'Trần Quang Khải', '0987657683', 'quangkhai7234@gmail.com', '98 Thanh Xuân, Hà Nội', '1', '6', NULL, NULL),
(328237, '0010323499656', 57, 'Nguyễn Văn Công', '0868643211', 'vancong5656@gmail.com', 'Hồng Quang, Ứng Hòa, Hà Nội', '1', '6,5', NULL, NULL),
(328379, '001202433241', 58, 'Nguyễn Khánh Hưng', '0868876452', 'khanhhung7546@gmail.com', '45 Thanh Trì, Hà Nội', '1', '6', NULL, NULL),
(328440, '001202476785', 59, 'Bùi Xuân Huấn', '0987675845', 'xuanhuan465@gmail.com', 'Việt Trì, Phú Thọ', '1', '6,5', NULL, NULL),
(546756, NULL, 11, 'Nguyễn Thị Thanh Trang', '0987654321', 'demo.ttan1@gmail.com', 'Thái Nguyên', '0', '6.5', NULL, NULL),
(654322, NULL, 22, 'Nguyễn Minh Hiếu', '0987659567', 'minhhieu012@gmai.com', 'Hà Nội', '1', '5', NULL, NULL),
(675432, NULL, 29, 'Trần Hải Yến', '0987654568', 'haiyen354@gmail.com', 'Ứng Hòa, Hà Nội', '0', '7', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `studyshift`
--

CREATE TABLE `studyshift` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_studyShift` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `user_created` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `studyshift`
--

INSERT INTO `studyshift` (`id`, `name_studyShift`, `start_time`, `end_time`, `user_created`, `created_at`, `updated_at`) VALUES
(1, 'CA01', '17:00:00', '21:00:00', 1, NULL, NULL),
(2, 'CA02', '19:00:00', '21:00:00', 1, NULL, NULL),
(3, 'CA03', '09:51:00', '11:51:00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `studytime`
--

CREATE TABLE `studytime` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_studyTime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_studyTime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_created` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `studytime`
--

INSERT INTO `studytime` (`id`, `name_studyTime`, `detail_studyTime`, `user_created`, `created_at`, `updated_at`) VALUES
(1, '2-4-6', 'Học viên học vào thứ 2,4 và 6 trong tuần', 1, NULL, NULL),
(2, '3-5-7', 'Học viên học vào thứ 3,5 và 7 trong tuần', 1, NULL, NULL),
(5, '2-4-7', 'Học viên học vào thứ 2,4 và thứ 7 trong tuần', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `teacher_card` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `teacher_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gmail` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sex` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_card`, `id_user`, `teacher_name`, `phone`, `gmail`, `address`, `sex`, `certificate`, `created_at`, `updated_at`) VALUES
(154326, NULL, 34, 'Ngô Công Thành', '0987635468', 'ncthang4367@gmail.com', 'Trâu Quỳ, Gia Lâm, Hà Nội', '1', 'IELTS 9.0', NULL, NULL),
(165432, NULL, 18, 'Đinh Văn Luyện', '0868653554', 'luyen123@gmail.com', 'Ninh Bình', '1', 'IELTS 9.0', NULL, NULL),
(165645, NULL, 19, 'Nguyễn Thị Hạnh', '0987463421', 'hanhnguyen23@gmail.com', 'Vĩnh Phúc', '0', 'IELTS 9.0', NULL, NULL),
(168654, NULL, 8, 'Nguyễn Linh Linh', '0987654321', 'linhlinhlinh0105@gmail.com', 'Hai Bà Trưng , Hà Nội', '1', 'IELTS 8.5', NULL, NULL),
(169534, NULL, 9, 'Lê Quốc Thịnh', '0987652222', 'thinh123456@gmail.com', 'Ninh Bình', '1', 'IELTS 8.0', NULL, NULL),
(328725, '001201499878', 60, 'Trần Thị Phúc', '0987687462', 'tranthiphuc94@gmail.com', 'Ứng Hòa, Hà Nội', '0', 'IELTS 8.0', NULL, NULL),
(328775, '001201989763', 61, 'Nguyễn Văn Kim', '0987673452', 'vankim456@gmail.com', 'Ứng Hòa, Hà Nội', '1', 'IELTS 9.0', NULL, NULL),
(328869, '001201986745', 62, 'Nguyễn Văn Tuấn', '0987202542', 'vantuan536@gmail.com', 'Ứng Hòa, Hà Nội', '1', 'IELTS 9.0', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `teaching_schedule`
--

CREATE TABLE `teaching_schedule` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_teacher` bigint(20) UNSIGNED NOT NULL,
  `id_studyTime` bigint(20) UNSIGNED NOT NULL,
  `id_studyShift` bigint(20) UNSIGNED NOT NULL,
  `id_userRegister` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `teaching_schedule`
--

INSERT INTO `teaching_schedule` (`id`, `id_teacher`, `id_studyTime`, `id_studyShift`, `id_userRegister`, `created_at`, `updated_at`) VALUES
(1, 168654, 1, 1, 1, NULL, NULL),
(2, 168654, 2, 2, 1, NULL, NULL),
(3, 165432, 1, 2, 1, NULL, NULL),
(4, 169534, 5, 1, 1, NULL, NULL),
(5, 154326, 1, 1, 1, NULL, NULL),
(6, 154326, 5, 2, 1, NULL, NULL),
(7, 165645, 1, 1, 1, NULL, NULL),
(8, 165645, 2, 2, 1, NULL, NULL),
(9, 328725, 1, 2, 1, NULL, NULL),
(10, 328725, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) DEFAULT 0,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super  Admin', 1, 'admin@gmail.com', '$2y$10$/OMyVs7mPGcVFi8j/wUKj.teJYBxg23xO70pyO4f9IL5MRUTbq.Y2', NULL, '2024-03-09 21:22:38', '2024-03-09 21:22:38'),
(6, 'Nguyễn Khánh Linh', 3, 'khanhlinh060695@gmail.com', '$2y$10$/OMyVs7mPGcVFi8j/wUKj.teJYBxg23xO70pyO4f9IL5MRUTbq.Y2', NULL, '2024-03-09 21:22:38', '2024-03-09 21:22:38'),
(7, 'Admin1', 1, 'linh123456@gmail.com', '$2y$10$iEgmX1IDjS/OUa37BN.RTenvZCe3oEiSS6Ai7iOglIEgQ2UpBY.AC', NULL, '2024-03-09 21:22:38', '2024-06-12 02:46:54'),
(8, 'Nguyễn Linh Linh', 2, 'linhlinhlinh0105@gmail.com', '$2y$10$/OMyVs7mPGcVFi8j/wUKj.teJYBxg23xO70pyO4f9IL5MRUTbq.Y2', NULL, '2024-03-09 21:22:38', '2024-03-09 21:22:38'),
(9, 'Lê Quốc Thịnh', 2, 'thinh123456@gmail.com', '$2y$10$xg9.darJ4BjV937tk7TeZO3n0pmCOQ.DUTkpW8gfc4NjxQiDQVBEO', NULL, '2024-03-09 21:22:38', '2024-05-13 23:07:49'),
(10, 'Nguyễn Ngọc Thùy Linh', 3, 'memorylinhlinh@gmail.com', '$2y$10$/OMyVs7mPGcVFi8j/wUKj.teJYBxg23xO70pyO4f9IL5MRUTbq.Y2', NULL, '2024-03-09 21:22:38', '2024-03-09 21:22:38'),
(11, 'Nguyễn Thị Thanh Trang', 3, 'demo.ttan1@gmail.com', '$2y$10$/OMyVs7mPGcVFi8j/wUKj.teJYBxg23xO70pyO4f9IL5MRUTbq.Y2', NULL, '2024-03-09 21:22:38', '2024-03-09 21:22:38'),
(12, 'Nguyễn Thành Phước', 3, 'phuoc123456@gmail.com', '$2y$10$/OMyVs7mPGcVFi8j/wUKj.teJYBxg23xO70pyO4f9IL5MRUTbq.Y2', NULL, '2024-03-09 21:22:38', '2024-03-09 21:22:38'),
(13, 'Trương Trung Tín', 3, 'tin123456@gmail.com', '$2y$10$/OMyVs7mPGcVFi8j/wUKj.teJYBxg23xO70pyO4f9IL5MRUTbq.Y2', NULL, '2024-03-09 21:22:38', '2024-03-09 21:22:38'),
(18, 'Đinh Văn Luyện', 2, 'luyen123@gmail.com', '$2y$10$bYxbNhsPnhZsvdl3sD1NOuuZ7qCHgHZRsto8ZdfXaHKw6O2T5y2Ny', NULL, NULL, NULL),
(19, 'Nguyễn Thị Hạnh', 2, 'hanhnguyen23@gmail.com', '$2y$10$Ey9UJ4xl84zkWkSjEL9clOaZwyzM0OcIfvTG1L/RLqv6.w35/Rl5e', NULL, NULL, NULL),
(21, 'Trần Thị Vui', 3, 'Vuivui432@gmail.com', '$2y$10$aHoa1TnIWxpgBxkAyfCjy.O9zx2NvPRRA89fFkBqyLTMD./drYXDa', NULL, NULL, '2024-06-07 19:38:04'),
(22, 'Nguyễn Minh Hiếu', 3, 'minhhieu012@gmai.com', '$2y$10$/GB9sfQnLzahcG6yvtG6qe7LV2/vHxxXKpWyUuyOQUKLlj9eW6OMO', NULL, NULL, NULL),
(28, 'Phùng Cát Tiên', 3, 'cattientran23@gmail.com', '$2y$10$ajtb5oXLmri27WAIKufZt.l48E7dGZ0KzN5MWeYH3wEEhwGg5qpZ2', NULL, NULL, '2024-06-11 11:45:19'),
(29, 'Trần Hải Yến', 3, 'haiyen354@gmail.com', '$2y$10$5U5wBuLCsqO/Gz4yS27y4O/8xCwxHLSnkmuU6xPg2mqeL94ob7eUC', NULL, NULL, '2024-06-12 11:29:27'),
(33, 'Văn Sơn', 3, 'vanson124@gmail.com', '$2y$10$zt4Sdw8uErfO1J6xewEmjuP5.B5ubqzMPu56NoLyfIQW6pJQohu0e', NULL, NULL, NULL),
(34, 'Ngô Công Thắng', 2, 'ncthang4367@gmail.com', '$2y$10$YhiTbTFCQSvfkKu5htPLHOq.XiAHXGNx1Sh9vBvdwDpkwyoq0bcg2', NULL, NULL, NULL),
(35, 'Vũ Văn Chương', 2, 'vanchuong19023@gmail.com', '$2y$10$oVw/iK7PcGAl76AfXuGVDeZU5YF/N8pS0MKM2vFF0HyYq4hCvn8GS', NULL, NULL, NULL),
(36, 'Trần Thị Loan', 2, 'loantran4563@gmail.com', '$2y$10$etxt1FvoZNUpyHx6cKBYSu4bRwmKfwuFTafFISkSPlFe0RaQTIV.a', NULL, NULL, NULL),
(38, 'Phùng Cát Tiên', 3, 'cattientran235@gmail.com', '$2y$10$09SzLXJ.6gb9FCk58OrFWe7.NFUbP7m3rq7ndcMSG9m.KwFZZyXsC', NULL, NULL, NULL),
(39, 'Nguyễn Quang Hải', 3, 'quanghai234@gmail.com', '$2y$10$vukH4Ek4U11624ag/xW5Te1jOhS1mK/fcKmL1cbDlc35PZIRfKsVa', NULL, NULL, NULL),
(40, 'Nguyễn Quang Duy', 3, 'quangduy99@gmail.com', '$2y$10$Q1hta2vRZk9pFWqty9LWNOTOuFsX1VJ0cqPCXpmdZ4MJhmgbyUDg.', NULL, NULL, NULL),
(41, 'Đặng Văn Lâm', 3, 'danglam201@gmail.com', '$2y$10$avVnaMue3vdLedm/DcV7Re.d2TqqqASpesZJOyXddK.ebqFkBHZGK', NULL, NULL, NULL),
(42, 'Nguyễn Thanh Xuân', 3, 'thanhxuaan23@gmail.com', '$2y$10$E4665QCmxFdJVrAe9J7OLOvC7TlRnsIySNTQsLpmUSB65.OYNZ4dq', NULL, NULL, NULL),
(43, 'Hoàng Thu Hồng', 3, 'thuhong2301@gmail.com', '$2y$10$ATKxf5RK8GK/CQwI8/ac/OJjK4S/ZPX2JXfJ9bJZIWa.dJgMglR/G', NULL, NULL, NULL),
(44, 'Hoàng Hồng Ngọc', 3, 'hongngoc457@gmail.com', '$2y$10$M2GsNgfT7Ccx1oTt3E.4quIb9Nl4ci12lIiA0/DVncWegrte9NLFy', NULL, NULL, NULL),
(45, 'Nguyễn Thúy Lệ', 3, 'thuyle675@gmail.com', '$2y$10$yAquOdmQjpTGQPs9e3UxxO/rzljKS9nqoG9t1a5BSEJq/zkW/FCg6', NULL, NULL, NULL),
(46, 'Vũ Thị Thúy', 3, 'vuthuy873@gmail.com', '$2y$10$1LUg87TUrKOQwEeB2fcaa.eyfnf4yW9eHEWD7CfumtyivWwosL5UO', NULL, NULL, NULL),
(47, 'Hoàng Thanh Phong', 3, 'thanhphong978@gmai.com', '$2y$10$.B6zQIr8Q00x8yKUNNOeNeK7F8/0Fyz.ghE/mcVzBVJLIafDdmT9K', NULL, NULL, NULL),
(48, 'Đinh Mạnh Hiệp', 3, 'manhhiep2345@gmail.com', '$2y$10$2Wt8QCspearakBkwX0qeQu8Zi/IsIH4Cq5QE5Wb/ICmNfJfluFOYy', NULL, NULL, NULL),
(49, 'Dương Hữu Phú', 3, 'huuphu8765@gmail.com', '$2y$10$FgkCSsq5J.0tujR4rhB1WOHav2mJoAKRaqwXUJ.BKV9iSE6KxknmG', NULL, NULL, NULL),
(50, 'Trần Đức Khải', 3, 'duckhai34355@gmail.com', '$2y$10$Jp8vT.4kvssdH3Rs9g/HD.4RMgR4C2xY.6H33fSHpTBpUzEGMW8Cm', NULL, NULL, NULL),
(51, 'Nguyễn Trí Đức', 3, 'triduc2342@gmail.com', '$2y$10$SlgHou46LiRkdl.NvK2DB.F/eaflxsZC8OJJS2RWf8L5.xbew6xJa', NULL, NULL, NULL),
(52, 'Trần Hiểu Trúc', 3, 'trantruc45@gmail.com', '$2y$10$MP22cx/AM1IYtrkSLmDNsu3umRu83uzrQnu2jKLLd2WztwW33h9UG', NULL, NULL, NULL),
(53, 'Nguyễn Quang Việt', 3, 'quangviet5462@gmail.com', '$2y$10$JEazmNlguJgBr7sM//4kG.L..fcDeDMXaRl4gj8LCWsJzDO3//3M2', NULL, NULL, NULL),
(54, 'Kiều Hồng Nhung', 3, 'hongnhung987@gmail.com', '$2y$10$ibMG2Gw3bsOJVE/mmNWvfuHgrylG8sYbflcPMjPlQN/JeNak3sCfu', NULL, NULL, NULL),
(55, 'Nguyễn Thị Nga', 3, 'nguyennga345@gmail.com', '$2y$10$ZD3ieElEpbDEvY7597svOeuG6ozD0wJVNsddPpH6OxvPopw.nbbc.', NULL, NULL, NULL),
(56, 'Trần Quang Khải', 3, 'quangkhai7234@gmail.com', '$2y$10$ZoQghFgS6j1uP.bEhalzLeOCRHzvu9/15haO4J6JnOwkfyIC16gyS', NULL, NULL, NULL),
(57, 'Nguyễn Văn Công', 3, 'vancong5656@gmail.com', '$2y$10$tqPXiPKvOBU4XCeTh/etduw6ZbcUf99jRlqHOwY.jD19qZgElqHxC', NULL, NULL, NULL),
(58, 'Nguyễn Khánh Hưng', 3, 'khanhhung7546@gmail.com', '$2y$10$Nn2sXBJWzLBfFGEgciRmE./.SdwUwfK2D2BjLK.yYab8M6Z1GWibq', NULL, NULL, NULL),
(59, 'Bùi Xuân Huấn', 3, 'xuanhuan465@gmail.com', '$2y$10$j9iN1nzqmO99XatCwSb14.5Mw1P5mo.jXoO4COolHef1OPExJAYga', NULL, NULL, NULL),
(60, 'Trần Thị Phúc', 2, 'tranthiphuc94@gmail.com', '$2y$10$EQTFhxuPyeGK0G/LNHtq0uB43ewqVt6DuHHHpWPMo1qJnm4UZIPBi', NULL, NULL, NULL),
(61, 'Nguyễn Văn Kim', 2, 'vankim456@gmail.com', '$2y$10$QSJGYhTN7RULIC7dRJ7VBOWntYeMlS7XmDyTISU5zyGeS12GfzUWa', NULL, NULL, NULL),
(62, 'Nguyễn Văn Tuấn', 2, 'vantuan536@gmail.com', '$2y$10$5N0nd47S7I4x8qNytdjgNuXI1ANOqIIwAO6TuX7sPHESn/BIg682e', NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category_course`
--
ALTER TABLE `category_course`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `course_detail`
--
ALTER TABLE `course_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_detail_category_id_foreign` (`category_id`),
  ADD KEY `course_detail_id_studytime_foreign` (`id_studyTime`),
  ADD KEY `course_detail_id_studyshift_foreign` (`id_studyShift`);

--
-- Chỉ mục cho bảng `diemdanh`
--
ALTER TABLE `diemdanh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diemdanh_id_registerstudent_foreign` (`id_registerStudent`),
  ADD KEY `diemdanh_id_period_foreign` (`id_period`);

--
-- Chỉ mục cho bảng `document_course`
--
ALTER TABLE `document_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `document_course_courseid_foreign` (`courseId`);

--
-- Chỉ mục cho bảng `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `period`
--
ALTER TABLE `period`
  ADD PRIMARY KEY (`id`),
  ADD KEY `period_courseid_foreign` (`courseId`),
  ADD KEY `period_teacherid_foreign` (`teacherId`),
  ADD KEY `period_id_studyshift_foreign` (`id_studyShift`);

--
-- Chỉ mục cho bảng `register_course_student`
--
ALTER TABLE `register_course_student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `register_course_student_courseid_foreign` (`courseId`),
  ADD KEY `register_course_student_studentid_foreign` (`studentId`);

--
-- Chỉ mục cho bảng `register_course_teacher`
--
ALTER TABLE `register_course_teacher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `register_course_teacher_courseid_foreign` (`courseId`),
  ADD KEY `register_course_teacher_teacherid_foreign` (`teacherId`);

--
-- Chỉ mục cho bảng `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Chỉ mục cho bảng `studyshift`
--
ALTER TABLE `studyshift`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `studytime`
--
ALTER TABLE `studytime`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Chỉ mục cho bảng `teaching_schedule`
--
ALTER TABLE `teaching_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teaching_schedule_id_teacher_foreign` (`id_teacher`),
  ADD KEY `teaching_schedule_id_studytime_foreign` (`id_studyTime`),
  ADD KEY `teaching_schedule_id_studyshift_foreign` (`id_studyShift`),
  ADD KEY `teaching_schedule_id_userregister_foreign` (`id_userRegister`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category_course`
--
ALTER TABLE `category_course`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `course_detail`
--
ALTER TABLE `course_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT cho bảng `diemdanh`
--
ALTER TABLE `diemdanh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `document_course`
--
ALTER TABLE `document_course`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `exam`
--
ALTER TABLE `exam`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `history`
--
ALTER TABLE `history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT cho bảng `period`
--
ALTER TABLE `period`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `register_course_student`
--
ALTER TABLE `register_course_student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `register_course_teacher`
--
ALTER TABLE `register_course_teacher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `student`
--
ALTER TABLE `student`
  MODIFY `student_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1239872755;

--
-- AUTO_INCREMENT cho bảng `studyshift`
--
ALTER TABLE `studyshift`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `studytime`
--
ALTER TABLE `studytime`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1201422987;

--
-- AUTO_INCREMENT cho bảng `teaching_schedule`
--
ALTER TABLE `teaching_schedule`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `course_detail`
--
ALTER TABLE `course_detail`
  ADD CONSTRAINT `course_detail_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category_course` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_detail_id_studyshift_foreign` FOREIGN KEY (`id_studyShift`) REFERENCES `studyshift` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `course_detail_id_studytime_foreign` FOREIGN KEY (`id_studyTime`) REFERENCES `studytime` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `diemdanh`
--
ALTER TABLE `diemdanh`
  ADD CONSTRAINT `diemdanh_id_period_foreign` FOREIGN KEY (`id_period`) REFERENCES `period` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diemdanh_id_registerstudent_foreign` FOREIGN KEY (`id_registerStudent`) REFERENCES `register_course_teacher` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `document_course`
--
ALTER TABLE `document_course`
  ADD CONSTRAINT `document_course_courseid_foreign` FOREIGN KEY (`courseId`) REFERENCES `course_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `period`
--
ALTER TABLE `period`
  ADD CONSTRAINT `period_courseid_foreign` FOREIGN KEY (`courseId`) REFERENCES `course_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `period_id_studyshift_foreign` FOREIGN KEY (`id_studyShift`) REFERENCES `studyshift` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `period_teacherid_foreign` FOREIGN KEY (`teacherId`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `register_course_student`
--
ALTER TABLE `register_course_student`
  ADD CONSTRAINT `register_course_student_courseid_foreign` FOREIGN KEY (`courseId`) REFERENCES `course_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `register_course_student_studentid_foreign` FOREIGN KEY (`studentId`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `register_course_teacher`
--
ALTER TABLE `register_course_teacher`
  ADD CONSTRAINT `register_course_teacher_courseid_foreign` FOREIGN KEY (`courseId`) REFERENCES `course_detail` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `register_course_teacher_teacherid_foreign` FOREIGN KEY (`teacherId`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `teaching_schedule`
--
ALTER TABLE `teaching_schedule`
  ADD CONSTRAINT `teaching_schedule_id_studyshift_foreign` FOREIGN KEY (`id_studyShift`) REFERENCES `studytime` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teaching_schedule_id_studytime_foreign` FOREIGN KEY (`id_studyTime`) REFERENCES `studytime` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teaching_schedule_id_teacher_foreign` FOREIGN KEY (`id_teacher`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teaching_schedule_id_userregister_foreign` FOREIGN KEY (`id_userRegister`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
