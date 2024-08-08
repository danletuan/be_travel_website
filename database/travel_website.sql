-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 08, 2024 lúc 05:58 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `travel_website`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Adventure Travel', NULL, NULL),
(2, 'Beach', NULL, NULL),
(3, 'Explore World', NULL, NULL),
(4, 'Family Holidays', NULL, NULL),
(5, 'Art and Culture', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `forgot_password`
--

CREATE TABLE `forgot_password` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expired_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_07_145652_create_categories_table', 1),
(6, '2024_08_07_145652_create_forgot_password_table', 2),
(7, '2024_08_07_145652_create_news_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `draft` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `category_id`, `title`, `slug`, `content`, `status`, `image`, `draft`, `created_at`, `updated_at`) VALUES
(1, 1, 'where can i go? 5 amazing countries that are open right now 1', 'where-can-i-go?-5-amazing-countries-that-are-open-right-now', '<p style=\"text-indent: 30px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam,                         purus sit amet luctus                         venena, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim praesent elementum                         facilisis leo, vel fringilla est ullamcorper eget nulla facilisi.</p>                     <p>enim lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci sagittis eu volutpat                         odio facilisis mauris sit amet massa vitae tortor condimentum lacinia quis vel eros donec ac                         odio tempor orci dapibus ultrices in iaculis nunc sed augue lacus, viverra vitae congue eu,                         consequat ac felis donec et odio pellentesque diam volutpat commodo sed egestas egestas                         fringilla fau.</p>                     <img src=\"assets/home/news-detail/image1.png\" alt=\"Landscape 1\" class=\"img-fluid mb-3 mt-5\">                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet integer facilisis aliquet erat                         vitae viverra ornare. Placerat urna integer nibh justo. Dictum vulputate odio mauris amet,                         dictumst molestie. Faucibus consectetur mauris tristique dolor ut diam, adipiscing et. Semper mi                         proin malesuada orci phasellus. Consectetur posuere iaculis amet sem. Euismod turpis                         pellentesque sit risus eu, sagittis nulla. Facilisis urna, mi pharetra sed.</p>                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet integer facilisis aliquet erat                         vitae viverra ornare. Placerat urna integer nibh justo. Dictum vulputate odio mauris amet,                         dictumst molestie. </p>                     <img src=\"assets/home/news-detail/image2.png\" alt=\"Landscape 2\" class=\"img-fluid mb-3\"                         style=\"margin-right: 20px;\">                     <img src=\"assets/home/news-detail/image3.png\" alt=\"Landscape 3\" class=\"img-fluid mb-3\">                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet integer facilisis aliquet erat                         vitae viverra ornare. Placerat urna integer nibh justo. Dictum vulputate odio mauris amet,                         dictumst molestie. Faucibus consectetur mauris tristique dolor ut diam, adipiscing et. Semper mi                         proin malesuada orci phasellus. Consectetur posuere iaculis amet sem. Euismod turpis                         pellentesque sit risus eu, sagittis nulla. Facilisis urna, mi pharetra sed.</p>', 1, 'assets/home/news/image1.png', NULL, '2024-08-08 03:25:10', '2024-08-08 03:25:10'),
(3, 2, 'where can i go? 5 amazing countries that are open right now 2', 'where-can-i-go?-5-amazing-countries-that-are-open-right-now', '<p style=\"text-indent: 30px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam,                         purus sit amet luctus                         venena, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim praesent elementum                         facilisis leo, vel fringilla est ullamcorper eget nulla facilisi.</p>                     <p>enim lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci sagittis eu volutpat                         odio facilisis mauris sit amet massa vitae tortor condimentum lacinia quis vel eros donec ac                         odio tempor orci dapibus ultrices in iaculis nunc sed augue lacus, viverra vitae congue eu,                         consequat ac felis donec et odio pellentesque diam volutpat commodo sed egestas egestas                         fringilla fau.</p>                     <img src=\"assets/home/news-detail/image1.png\" alt=\"Landscape 1\" class=\"img-fluid mb-3 mt-5\">                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet integer facilisis aliquet erat                         vitae viverra ornare. Placerat urna integer nibh justo. Dictum vulputate odio mauris amet,                         dictumst molestie. Faucibus consectetur mauris tristique dolor ut diam, adipiscing et. Semper mi                         proin malesuada orci phasellus. Consectetur posuere iaculis amet sem. Euismod turpis                         pellentesque sit risus eu, sagittis nulla. Facilisis urna, mi pharetra sed.</p>                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet integer facilisis aliquet erat                         vitae viverra ornare. Placerat urna integer nibh justo. Dictum vulputate odio mauris amet,                         dictumst molestie. </p>                     <img src=\"assets/home/news-detail/image2.png\" alt=\"Landscape 2\" class=\"img-fluid mb-3\"                         style=\"margin-right: 20px;\">                     <img src=\"assets/home/news-detail/image3.png\" alt=\"Landscape 3\" class=\"img-fluid mb-3\">                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet integer facilisis aliquet erat                         vitae viverra ornare. Placerat urna integer nibh justo. Dictum vulputate odio mauris amet,                         dictumst molestie. Faucibus consectetur mauris tristique dolor ut diam, adipiscing et. Semper mi                         proin malesuada orci phasellus. Consectetur posuere iaculis amet sem. Euismod turpis                         pellentesque sit risus eu, sagittis nulla. Facilisis urna, mi pharetra sed.</p>', 1, 'assets/home/news/image1.png', NULL, '2024-08-08 03:25:10', '2024-08-08 03:25:10'),
(4, 3, 'where can i go? 5 amazing countries that are open right now 3', 'where-can-i-go?-5-amazing-countries-that-are-open-right-now', '<p style=\"text-indent: 30px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam,                         purus sit amet luctus                         venena, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim praesent elementum                         facilisis leo, vel fringilla est ullamcorper eget nulla facilisi.</p>                     <p>enim lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci sagittis eu volutpat                         odio facilisis mauris sit amet massa vitae tortor condimentum lacinia quis vel eros donec ac                         odio tempor orci dapibus ultrices in iaculis nunc sed augue lacus, viverra vitae congue eu,                         consequat ac felis donec et odio pellentesque diam volutpat commodo sed egestas egestas                         fringilla fau.</p>                     <img src=\"assets/home/news-detail/image1.png\" alt=\"Landscape 1\" class=\"img-fluid mb-3 mt-5\">                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet integer facilisis aliquet erat                         vitae viverra ornare. Placerat urna integer nibh justo. Dictum vulputate odio mauris amet,                         dictumst molestie. Faucibus consectetur mauris tristique dolor ut diam, adipiscing et. Semper mi                         proin malesuada orci phasellus. Consectetur posuere iaculis amet sem. Euismod turpis                         pellentesque sit risus eu, sagittis nulla. Facilisis urna, mi pharetra sed.</p>                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet integer facilisis aliquet erat                         vitae viverra ornare. Placerat urna integer nibh justo. Dictum vulputate odio mauris amet,                         dictumst molestie. </p>                     <img src=\"assets/home/news-detail/image2.png\" alt=\"Landscape 2\" class=\"img-fluid mb-3\"                         style=\"margin-right: 20px;\">                     <img src=\"assets/home/news-detail/image3.png\" alt=\"Landscape 3\" class=\"img-fluid mb-3\">                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet integer facilisis aliquet erat                         vitae viverra ornare. Placerat urna integer nibh justo. Dictum vulputate odio mauris amet,                         dictumst molestie. Faucibus consectetur mauris tristique dolor ut diam, adipiscing et. Semper mi                         proin malesuada orci phasellus. Consectetur posuere iaculis amet sem. Euismod turpis                         pellentesque sit risus eu, sagittis nulla. Facilisis urna, mi pharetra sed.</p>', 1, 'assets/home/news/image1.png', NULL, '2024-08-08 03:25:10', '2024-08-08 03:25:10'),
(5, 4, 'where can i go? 5 amazing countries that are open right now 4', 'where-can-i-go?-5-amazing-countries-that-are-open-right-now', '<p style=\"text-indent: 30px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam,                         purus sit amet luctus                         venena, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim praesent elementum                         facilisis leo, vel fringilla est ullamcorper eget nulla facilisi.</p>                     <p>enim lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci sagittis eu volutpat                         odio facilisis mauris sit amet massa vitae tortor condimentum lacinia quis vel eros donec ac                         odio tempor orci dapibus ultrices in iaculis nunc sed augue lacus, viverra vitae congue eu,                         consequat ac felis donec et odio pellentesque diam volutpat commodo sed egestas egestas                         fringilla fau.</p>                     <img src=\"assets/home/news-detail/image1.png\" alt=\"Landscape 1\" class=\"img-fluid mb-3 mt-5\">                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet integer facilisis aliquet erat                         vitae viverra ornare. Placerat urna integer nibh justo. Dictum vulputate odio mauris amet,                         dictumst molestie. Faucibus consectetur mauris tristique dolor ut diam, adipiscing et. Semper mi                         proin malesuada orci phasellus. Consectetur posuere iaculis amet sem. Euismod turpis                         pellentesque sit risus eu, sagittis nulla. Facilisis urna, mi pharetra sed.</p>                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet integer facilisis aliquet erat                         vitae viverra ornare. Placerat urna integer nibh justo. Dictum vulputate odio mauris amet,                         dictumst molestie. </p>                     <img src=\"assets/home/news-detail/image2.png\" alt=\"Landscape 2\" class=\"img-fluid mb-3\"                         style=\"margin-right: 20px;\">                     <img src=\"assets/home/news-detail/image3.png\" alt=\"Landscape 3\" class=\"img-fluid mb-3\">                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet integer facilisis aliquet erat                         vitae viverra ornare. Placerat urna integer nibh justo. Dictum vulputate odio mauris amet,                         dictumst molestie. Faucibus consectetur mauris tristique dolor ut diam, adipiscing et. Semper mi                         proin malesuada orci phasellus. Consectetur posuere iaculis amet sem. Euismod turpis                         pellentesque sit risus eu, sagittis nulla. Facilisis urna, mi pharetra sed.</p>', 1, 'assets/home/news/image1.png', NULL, '2024-08-08 03:25:10', '2024-08-08 03:25:10'),
(6, 5, 'where can i go? 5 amazing countries that are open right now 5', 'where-can-i-go?-5-amazing-countries-that-are-open-right-now', '<p style=\"text-indent: 30px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam,                         purus sit amet luctus                         venena, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim praesent elementum                         facilisis leo, vel fringilla est ullamcorper eget nulla facilisi.</p>                     <p>enim lobortis scelerisque fermentum dui faucibus in ornare quam viverra orci sagittis eu volutpat                         odio facilisis mauris sit amet massa vitae tortor condimentum lacinia quis vel eros donec ac                         odio tempor orci dapibus ultrices in iaculis nunc sed augue lacus, viverra vitae congue eu,                         consequat ac felis donec et odio pellentesque diam volutpat commodo sed egestas egestas                         fringilla fau.</p>                     <img src=\"assets/home/news-detail/image1.png\" alt=\"Landscape 1\" class=\"img-fluid mb-3 mt-5\">                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet integer facilisis aliquet erat                         vitae viverra ornare. Placerat urna integer nibh justo. Dictum vulputate odio mauris amet,                         dictumst molestie. Faucibus consectetur mauris tristique dolor ut diam, adipiscing et. Semper mi                         proin malesuada orci phasellus. Consectetur posuere iaculis amet sem. Euismod turpis                         pellentesque sit risus eu, sagittis nulla. Facilisis urna, mi pharetra sed.</p>                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet integer facilisis aliquet erat                         vitae viverra ornare. Placerat urna integer nibh justo. Dictum vulputate odio mauris amet,                         dictumst molestie. </p>                     <img src=\"assets/home/news-detail/image2.png\" alt=\"Landscape 2\" class=\"img-fluid mb-3\"                         style=\"margin-right: 20px;\">                     <img src=\"assets/home/news-detail/image3.png\" alt=\"Landscape 3\" class=\"img-fluid mb-3\">                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Amet integer facilisis aliquet erat                         vitae viverra ornare. Placerat urna integer nibh justo. Dictum vulputate odio mauris amet,                         dictumst molestie. Faucibus consectetur mauris tristique dolor ut diam, adipiscing et. Semper mi                         proin malesuada orci phasellus. Consectetur posuere iaculis amet sem. Euismod turpis                         pellentesque sit risus eu, sagittis nulla. Facilisis urna, mi pharetra sed.</p>', 1, 'assets/home/news/image1.png', NULL, '2024-08-08 03:25:10', '2024-08-08 03:25:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_logged_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `forgot_password`
--
ALTER TABLE `forgot_password`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `news_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `forgot_password`
--
ALTER TABLE `forgot_password`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
