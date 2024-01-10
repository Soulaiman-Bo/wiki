-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 10, 2024 at 02:17 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wikidb`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `author` int DEFAULT NULL,
  `content` text NOT NULL,
  `header_img` int DEFAULT NULL,
  `category` int DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modifiedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('approved','rejected','pending') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `description`, `author`, `content`, `header_img`, `category`, `createdAt`, `modifiedAt`, `status`) VALUES
(39, 'Building a viable pricing model for generative AI features could be challenging', 'Welcome back to The Interchange, where we take a look at the hottest fintech news of the previous week. We wish you and your families a very Happy New Year! If you want to receive The Interchange directly in your inbox every Sunday, head here to sign up! And just a heads-up that while the newsletter will continue moving forward, starting next week we’ll have a brand-new name and a different look. Stay tuned!', 18, 'New fundsWe started the year with news of a couple new venture funds that will be writing checks into fintech startups. First up, I scooped the news that former Anthemis Group partner Ruth Foxe Blader has started her own firm, Foxe Capital. Joining her in the new venture, which will also be exclusively fintech-focused, are former Anthemis investment associate Kyle Perez and former principal Sophie Winwood.I had the pleasure of interviewing Ruth at TechCrunch Disrupt 2022 and was impressed with her knowledge and insights around venture capital. So it wasn’t a surprise that she wanted to branch out and invest independently.What was a bit unusual about the move, though, is that she will still be investing on behalf of Anthemis, at least for the first year, essentially deploying the rest of the capital of the vehicle she was hired to manage in 2017. She’ll be compensated by Anthemis as a sub-adviser. Whether the firm will back her as an LP when she starts making new investments is unclear. While she didn’t say, I suspect she was bound by contractual obligations, so this arrangement worked around those.London-based Anthemis has had its fair share of upheaval over the past year. Last April, TechCrunch broke the news that Anthemis had completed a restructuring that resulted in its letting go of 16 employees, or about 28% of its staff.A spokesperson for the company at the time said the move was an effort “to better reflect current market conditions and to set up the business for future growth” against its “strategic priorities.” Sources familiar with internal happenings at the firm told me then that there was plenty of drama going on behind the scenes, including allegations of mismanagement on the part of the firm’s leaders and inflated salaries.When asked if her departure had anything to do with what was going on internally at Anthemis, Blader told me: “My decision was based on my desire to try my hand at running my own firm, my personal ambition level and my love for working closely with founders.”', 51, 7, '2024-01-08 14:12:16', '2024-01-08 14:12:16', 'approved'),
(40, 'Building a viable pricing model for generative AI features could be challenging', 'Welcome back to The Interchange, where we take a look at the hottest fintech news of the previous week. We wish you and your families a very Happy New Year! If you want to receive The Interchange directly in your inbox every Sunday, head here to sign up! And just a heads-up that while the newsletter will continue moving forward, starting next week we’ll have a brand-new name and a different look. Stay tuned!', 18, 'New fundsWe started the year with news of a couple new venture funds that will be writing checks into fintech startups. First up, I scooped the news that former Anthemis Group partner Ruth Foxe Blader has started her own firm, Foxe Capital. Joining her in the new venture, which will also be exclusively fintech-focused, are former Anthemis investment associate Kyle Perez and former principal Sophie Winwood.I had the pleasure of interviewing Ruth at TechCrunch Disrupt 2022 and was impressed with her knowledge and insights around venture capital. So it wasn’t a surprise that she wanted to branch out and invest independently.What was a bit unusual about the move, though, is that she will still be investing on behalf of Anthemis, at least for the first year, essentially deploying the rest of the capital of the vehicle she was hired to manage in 2017. She’ll be compensated by Anthemis as a sub-adviser. Whether the firm will back her as an LP when she starts making new investments is unclear. While she didn’t say, I suspect she was bound by contractual obligations, so this arrangement worked around those.London-based Anthemis has had its fair share of upheaval over the past year. Last April, TechCrunch broke the news that Anthemis had completed a restructuring that resulted in its letting go of 16 employees, or about 28% of its staff.A spokesperson for the company at the time said the move was an effort “to better reflect current market conditions and to set up the business for future growth” against its “strategic priorities.” Sources familiar with internal happenings at the firm told me then that there was plenty of drama going on behind the scenes, including allegations of mismanagement on the part of the firm’s leaders and inflated salaries.When asked if her departure had anything to do with what was going on internally at Anthemis, Blader told me: “My decision was based on my desire to try my hand at running my own firm, my personal ambition level and my love for working closely with founders.”', 52, 7, '2024-01-08 14:12:30', '2024-01-08 14:12:30', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `article_tag`
--

CREATE TABLE `article_tag` (
  `article_id` int NOT NULL,
  `tag_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `article_tag`
--

INSERT INTO `article_tag` (`article_id`, `tag_id`) VALUES
(40, 3),
(40, 4),
(39, 5),
(40, 5),
(40, 6),
(39, 7),
(40, 7);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(7, 'graphic design'),
(8, 'test category');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int NOT NULL,
  `src` varchar(255) DEFAULT NULL,
  `alt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `src`, `alt`) VALUES
(9, '_659ad8a8e88192.64369035.jpg', 'profile image'),
(10, '_659af0903e7cd0.33170608.jpg', 'profile image'),
(11, '_659af1146a4a66.13746369.jpg', 'profile image'),
(51, 'wiki_659bf4b0010ec9.08057857.jpg', 'article header image'),
(52, 'wiki_659bf4beab9489.72371267.jpg', 'article header image'),
(53, '_659bf991e25918.15202467.jpg', 'profile image'),
(54, '_659c095476c8a8.18386646.jpg', 'profile image'),
(55, '_659d1be88d9d19.18605476.jpg', 'profile image'),
(56, '_659d1c950e0b59.58896341.jpg', 'profile image'),
(57, '_659d1d4f5f6cc2.42854282.jpg', 'profile image'),
(58, '_659d1d78e4a073.64295319.jpg', 'profile image'),
(59, '_659d1e995bd467.34498310.jpg', 'profile image'),
(60, '_659d208fd150a9.05747044.jpg', 'profile image'),
(61, '_659d217ea3be82.17218301.jpg', 'profile image'),
(62, '_659d21e26d7a28.86784230.jpg', 'profile image'),
(63, '_659d224a82d887.56820644.jpg', 'profile image'),
(64, '_659d22956082f8.91286866.jpg', 'profile image'),
(65, '_659d22bae615d8.91804391.jpg', 'profile image'),
(66, '_659d23da07f347.73239795.jpg', 'profile image'),
(67, '_659d2405ccdbd9.93919708.jpg', 'profile image'),
(68, '_659d2427695581.94742783.jpg', 'profile image'),
(69, '_659d245600eee5.97235189.jpg', 'profile image'),
(70, '_659d246dcff647.60630369.jpg', 'profile image'),
(71, '_659d24e716cca0.65185226.jpg', 'profile image'),
(72, '_659d2512c19948.77361326.jpg', 'profile image'),
(73, '_659d25d41359f5.17670286.jpg', 'profile image'),
(74, '_659e6229b4c635.65549995.jpg', 'profile image');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'author');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, 'html'),
(3, 'javascript'),
(4, 'design'),
(5, 'sport'),
(6, 'business'),
(7, 'business'),
(8, 'lhssen'),
(9, 'zaid');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `profile_img` int DEFAULT NULL,
  `role` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `title`, `description`, `profile_img`, `role`) VALUES
(18, 'soulaiman', 'bouhlal', 'soulaiman@gmail.com', '$2y$05$/0MzUOsPGpFU/KEV91S/EehuLQCSq1..MSc9PzACIptP/MuzaemAK', 'FullStack Developer', 'With 11 years in SaaS, I&#039;ve built MillionVerifier and SAAS First. Passionate about SaaS, data, and AI.', 11, 2),
(19, 'admin', 'bouhlal', 'admin@gmail.com', '$2y$05$lguv4V2XvluO3drN/py30e7NeJbIL2SfsxGYGswIo.s5erwhEekQS', 'FullStack Developer', 'With 11 years in SaaS, I&#039;ve built MillionVerifier and SAAS First. Passionate about SaaS, data, and AI.', 53, 1),
(20, 'gggg', 'bouhlal', 'adminnnnn@gmail.com', '$2y$05$fGyNOcrr9P3GIBlHsaHKhe9VWF1DWIlGJ53RGvQ0b1YtG5PDX92.W', 'FullStack Developer', 'With 11 years in SaaS, I&#039;ve built MillionVerifier and SAAS First. Passionate about SaaS, data, and AI.', 54, 2),
(21, 'Plato', 'Dotson', 'fipemugyk@mailinator.com', '$2y$05$/087SNjrIigcbnjgs5/Siu8yAQD.d9rPLCO0WDwWJzTixQD9rraM2', 'Consectetur molestia', 'Quae et sed eos nem', 55, 2),
(22, 'Ebony', 'Copeland', 'fofopoq@mailinator.com', '$2y$05$0V1wRMmLM2QtBAAjZiE0NeJ6x7blSNJbDa1YFC98e5JpEiF93uyju', 'Irure ipsum distinc', 'Alias non aliquid au', 56, 2),
(23, 'Dane', 'Mccarty', 'raco@mailinator.com', '$2y$05$DbbibAC0c9QDND1KLCwnm.faja3lY4v1m95lgIn0aF9dw7fLUIHEK', 'Dolore est proident', 'Ut eveniet quis num', 57, 2),
(24, 'Brianna', 'Albert', 'fuvyci@mailinator.com', '$2y$05$4K285DkGs2dQ5fzgrKpt7uk7BCjQEs8u3cuU5LQEFI2UAKyu5k4yy', 'Beatae dolore omnis', 'Ut sint omnis dolor', 58, 2),
(25, 'Erica', 'Phillips', 'fasud@mailinator.com', '$2y$05$X.JdqFc7InIe9L0Y25v6g.qIiXqkVw0PdxJ/ZDzkCfuAxyGO22fwu', 'In qui aut elit arc', 'Et est sint sed dolo', 59, 2),
(26, 'Ignacia', 'Vang', 'quvysuru@mailinator.com', '$2y$05$MFJMTvVYhf0k5UJBy367jehOpK8hSijNpJImDjsEtEJzzu4ZShEiW', 'Impedit explicabo', 'Eum atque veniam do', 60, 2),
(27, 'Maite', 'Robertson', 'gepyb@mailinator.com', '$2y$05$1gIMY5ESpzXTAmEhO8lX4ufBRfxwWk4U4nXW0nS3BSsUmBXBZd0Y2', 'Dolor quam numquam m', 'Fuga Facere animi', 61, 2),
(28, 'Kelly', 'Rivers', 'xabav@mailinator.com', '$2y$05$aJKTUwivFWZdE0v4kFo7f.zVIiqSlDNgdgOLIs4EQxYgrE6d8Lvly', 'Sed qui amet nisi q', 'Esse beatae quam si', 62, 2),
(29, 'Dominique', 'Lowe', 'qobaka@mailinator.com', '$2y$05$zLfeE6FYnpm3g6yjamCpjObJAT.5m53Z4MDVyv./TtvvLYO78YIOO', 'Labore officiis quo', 'Illum et id ut inve', 63, 2),
(30, 'Elaine', 'Giles', 'bazuh@mailinator.com', '$2y$05$3ftwc9HhXN7Xz8xiAU8ty.ftmkc.hwDDjRVjnr9ZzVl5aypBZal0S', 'Deleniti dolorem exc', 'Non iure officiis nu', 64, 2),
(31, 'Keaton', 'Lopez', 'weqexeseb@mailinator.com', '$2y$05$JwGJsNwfTKyuPRm/KHYD3O57uxOak0ESRK0czdN5mT/rhsNLNze3G', 'Quia dolor ea necess', 'Quidem voluptate vol', 65, 2),
(32, 'Ulysses', 'Knight', 'kizigugic@mailinator.com', '$2y$05$II7HCKVMA9bz0FeUiYFTaej8lyPfUUHfGPrkUYwu37Fyk55vH19Ja', 'Occaecat do accusamu', 'Velit quaerat sed p', 66, 2),
(33, 'India', 'Jacobson', 'vylonyxar@mailinator.com', '$2y$05$slpHzF89R1zJbcU1O.7kYOGAqUY5LuHou0w465qwtRo9wBVg0Qap6', 'Soluta maiores verit', 'Explicabo Sed ipsa', 67, 2),
(34, 'Violet', 'Ferguson', 'gydawoka@mailinator.com', '$2y$05$KNv4Csw.yMJ8k4s4rkmlY.x5ylPrscTS4WvLOmNagOlhLxwJKPTC6', 'Magnam quia laudanti', 'Eius dolores sunt ve', 68, 2),
(35, 'Joyfffff', 'Mooney', 'matir@mailinator.com', '$2y$05$CoT7D0EQQKTni1VJ/6IMCeqxcEz8xu7Sqw1vdx.NL4iR3CFGQaAlG', 'Sed unde cillum ut d', 'Rerum cum mollit lib', 69, 2),
(36, 'Quon', 'Brennan', 'paxepeqe@mailinator.com', '$2y$05$wmFaFCD8bzn5RoV5SSah/.WhnZNRzPVOBgozfXvhtTScGHJ.EPQJm', 'Saepe qui iure volup', 'Consequatur Et aliq', 70, 2),
(37, 'Ivor', 'Ellison', 'xihigufawu@mailinator.com', '$2y$05$x3ACd2dZJIdqUUGxe1549uexgf0OFZJmKEbLOqzcZ5Tqm1IXEyIiy', 'Officia aperiam fugi', 'Corrupti velit quia', 71, 2),
(38, 'Echo', 'Mayer', 'vixu@mailinator.com', '$2y$05$jfW01lsqEAii1iLy3lXQ6Ou7lrR2jhuS/mKviKBrMkO9iKJXOHXPa', 'Aperiam impedit vol', 'Quisquam et deserunt', 72, 2),
(39, 'Jane', 'Ross', 'hujodygoha@mailinator.com', '$2y$05$KcuXwhk8XYzGeMU3U0j/JusoGhv7tc1n0Y1EMbq5D.62BHigrWjJW', 'Aute quaerat eos aut', 'Magna magnam volupta', 73, 2),
(40, 'Larissa', 'Pollard', 'puzejavyzu@mailinator.com', '$2y$05$7Dqe7Qd6sqs/tmHi5iWCDetyQLkSY10NQv/K3B0GKBn3mA3gr.m8W', 'Cillum dolor ex veli', 'Eum ipsa illo bland', 74, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`),
  ADD KEY `category` (`category`),
  ADD KEY `header_img` (`header_img`);

--
-- Indexes for table `article_tag`
--
ALTER TABLE `article_tag`
  ADD PRIMARY KEY (`article_id`,`tag_id`),
  ADD KEY `tag_id` (`tag_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `profile_img` (`profile_img`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`author`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article_ibfk_3` FOREIGN KEY (`header_img`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `article_tag`
--
ALTER TABLE `article_tag`
  ADD CONSTRAINT `article_tag_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article_tag_ibfk_2` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`profile_img`) REFERENCES `images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`role`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
