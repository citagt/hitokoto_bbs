-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2023-12-07 18:26:57
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `hitokoto_bbs`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL COMMENT '投稿番号',
  `email` varchar(100) NOT NULL COMMENT 'メールアドレス',
  `name` varchar(100) NOT NULL COMMENT 'ニックネーム',
  `contents` varchar(100) NOT NULL COMMENT '投稿内容',
  `created_at` datetime DEFAULT NULL COMMENT '登録日時'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='投稿情報';

--
-- テーブルのデータのダンプ `post`
--

INSERT INTO `post` (`id`, `email`, `name`, `contents`, `created_at`) VALUES
(1, '◆7d55114476df', '', '', '2023-12-08 01:36:34');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '投稿番号', AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
