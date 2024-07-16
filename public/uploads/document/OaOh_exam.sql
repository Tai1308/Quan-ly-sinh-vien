-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 19, 2024 lúc 04:22 PM
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

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `exam`
--
ALTER TABLE `exam`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
