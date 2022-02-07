-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2022-02-07 13:49:59
-- 伺服器版本： 10.4.22-MariaDB
-- PHP 版本： 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `ci_test`
--

-- --------------------------------------------------------

--
-- 資料表結構 `products`
--

CREATE TABLE `products` (
  `id` int(12) UNSIGNED NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0-disabled,1-active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `image`, `status`, `created_at`, `updated_at`) VALUES
(5, 'iPhone X', 'very good iOS phone developed by apple inc', 'Screenshot_1.png', 1, '2022-02-06 12:55:00', '2022-02-06 12:49:13'),
(6, 'macbook pro', 'macbook pro is expensive notebook developed by apple inc', 'Screenshot_5.png', 0, '2022-02-06 12:56:34', '0000-00-00 00:00:00'),
(7, 'logitect headset', 'Hear it all with our own PRO-G drivers designed for precise and full-range sound. Get into the game more than ever with next-gen DTS Headphone:X 2.0 surround sound.3Advanced features like DTS Headphone:X 2.0, Blue VO!CE, and LIGHTSYNC RGB are not available on PlayStation 4. Sound amazing and crystal-clear communication with Discord Certified audio', 'headsets.png', 1, '2022-02-06 17:33:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `product_list`
--

CREATE TABLE `product_list` (
  `id` int(12) UNSIGNED NOT NULL,
  `user_id` int(12) UNSIGNED NOT NULL,
  `product_id` int(12) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` float NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `product_list`
--

INSERT INTO `product_list` (`id`, `user_id`, `product_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 4, 5, 3, 1000, '2022-02-06 16:31:01', '2022-02-06 16:31:01'),
(3, 7, 5, 3, 900, '2022-02-06 16:45:47', '2022-02-06 16:45:47'),
(4, 7, 6, 3, 3000, '2022-02-06 16:46:09', '2022-02-06 16:46:09'),
(5, 8, 6, 4, 3000, '2022-02-06 16:46:09', '2022-02-06 16:46:09'),
(6, 9, 5, 2, 1000, '2022-02-06 16:46:09', '2022-02-06 16:46:09'),
(7, 4, 6, 3, 2800, '2022-02-07 02:33:58', '2022-02-07 02:33:58');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `id` int(12) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(260) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0-disabled, 1-active, 2-other',
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `activation_code` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `status`, `is_admin`, `activation_code`, `created_at`, `updated_at`, `verified`) VALUES
(4, 'user1', 'rexcheung727@gmail.com', '96ad58da2e871d09a1439307b82636cc1f69c326d6272e5d3b04c649349fe1cb9c8a01cf3fc9bac23ea1a001026b93bccf5f74ead444e3e27e52d4c109dd4333PEjIhXpllHtdHu0O+Cl8FUXDq9We7Vu/aW40EDOhdSk=', 1, 0, 'a813172b66d4abc9082e2e0893910916', '2022-02-06 01:57:42', '2022-02-06 01:57:42', 1),
(5, 'admin', 'admin@admin.com', 'c01629f09b3f014dab9ed0381dd8c328de93f75019062789cf77ae6c30d2f46ac0dc61e5970dd19c81704eacf8d3cdb6bb909bd5406984e7b2727000e316e854lpUDUo5S50bq6xcKmsyK9uRX8dnrgbjs4h4XUr6Ldmw=', 1, 1, 'ed658d90180c1847ea506ba22fe37160', '2022-02-06 02:09:44', '2022-02-06 02:09:44', 1),
(6, 'doctordeepblue', 'doctor.deepblue@gmail.com', 'dfc67210ee86ad772b78a093f898f0f7cbfb2e62784b24bcdb568b1cf1284095109c842e28da6e9d2d06afdc58801a87c6536d3bac734a5e46a4b93afe5e9b52mh0GN02PU5pphLB6Fv41lpxrEu9hmfirwIoNV5w/gPA=', 1, 0, '9012ed43e276684420e3a12c9320bcae', '2022-02-06 16:40:23', '2022-02-06 16:40:23', 1),
(7, 'user34', 'user2@user.com', '028d4d4ff61171a850de5b90cb0e6f9538d42ccf7cfa144faabe6fb2b85f08fb2b47a3e8399093b5d727dc73933f724a6351d8fd1dd101118f8523f7466b0a7az6k2Lhq37MJrAjqYb7sOQD4vpnDOvWI5sJDE8mZI+CU=', 1, 0, '0d222c122bd5dbf3cc5984adc89aabf9', '2022-02-06 16:43:42', '2022-02-06 16:43:42', 1),
(8, 'user4', 'user4@user.com', '7756d3eb74720f08bbdb4943e8a9564dcebbd0ff3df24d4d3596ad91edab8e51df83f0b7350b855fb6fde5ee1b573491f250ecc0900d19d96a9956085b84ba32sU3nre79C0Ttr6aGL4QZNG+IjtdfNkc1+0pTQD6iHL0=', 1, 0, '45a178bec20c7dcb262ec256e192633c', '2022-02-06 17:06:41', '2022-02-06 17:06:41', 0),
(9, 'user6', 'user6@user.com', '7756d3eb74720f08bbdb4943e8a9564dcebbd0ff3df24d4d3596ad91edab8e51df83f0b7350b855fb6fde5ee1b573491f250ecc0900d19d96a9956085b84ba32sU3nre79C0Ttr6aGL4QZNG+IjtdfNkc1+0pTQD6iHL0=', 1, 0, '45a178bec20c7dcb262ec256e192633c', '2022-02-06 17:06:41', '2022-02-06 17:06:41', 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `product_list`
--
ALTER TABLE `product_list`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `products`
--
ALTER TABLE `products`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product_list`
--
ALTER TABLE `product_list`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `users`
--
ALTER TABLE `users`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
