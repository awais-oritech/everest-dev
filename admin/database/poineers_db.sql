-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 22, 2022 at 02:47 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poineers_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_roles`
--

CREATE TABLE `admin_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_roles`
--

INSERT INTO `admin_roles` (`id`, `name`, `link`, `created`, `is_active`) VALUES
(1, 'admin', 'pdf', '2019-10-28 18:43:48', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_role_permissions`
--

CREATE TABLE `admin_role_permissions` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `section` varchar(100) NOT NULL,
  `actions` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_role_permissions`
--

INSERT INTO `admin_role_permissions` (`id`, `role_id`, `section`, `actions`, `created`, `is_active`) VALUES
(1, 1, 'admin_users', 'add,edit,view,delete', '2019-10-28 20:54:29', 1),
(2, 1, 'categories', 'add,edit,view,delete', '2020-04-12 23:02:43', 1),
(3, 1, 'admin_sections', 'add,edit,view,delete', '2020-04-12 23:03:09', 1),
(6, 1, 'admin_roles', 'add,edit,view,delete', '2020-04-12 23:06:19', 1),
(7, 1, 'admin_role_permissions', 'add,edit,view,delete', '2020-04-12 23:06:19', 1),
(19, 1, 'section_sorting', 'view,update', '2020-06-23 05:50:35', 1),
(26, 1, 'videos', 'add,edit,view,delete', '2021-05-21 18:28:13', 1),
(27, 1, 'banners', 'add,edit', '2021-05-21 18:28:25', 1),
(28, 1, 'blogs', 'add,edit,view,delete', '2021-05-21 18:28:37', 1),
(29, 1, 'pdf', 'add,edit,view,delete', '2021-05-21 18:28:50', 1),
(31, 1, 'banners', 'add,edit,delete', '2021-06-03 18:16:10', 1),
(32, 1, 'banners', 'add,edit,delete', '2021-06-03 20:33:19', 1),
(33, 1, 'blogcategories', 'add,edit,view,delete', '2021-06-08 17:30:51', 1),
(34, 1, 'Banners', 'add,edit,view,delete', '2021-10-14 01:40:08', 1),
(35, 1, 'services', 'add,edit,view,delete', '2022-06-22 05:06:04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_sections`
--

CREATE TABLE `admin_sections` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `actions` text NOT NULL,
  `link` text NOT NULL,
  `label` varchar(255) NOT NULL,
  `icon` text NOT NULL,
  `level` int(11) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_sections`
--

INSERT INTO `admin_sections` (`id`, `name`, `actions`, `link`, `label`, `icon`, `level`, `created`, `is_active`) VALUES
(1, 'admin_sections', 'add,edit,view,delete', 'admin_sections', 'Admin Sections', '<i class=\"fa fa-sitemap\"></i>', 9, '2019-10-28 18:08:38', 1),
(2, 'admin_users', 'add,edit,view,delete', 'admin_users', 'Admin Users', '<i class=\"fa fa-user-secret\"></i>', 8, '2019-10-28 18:13:04', 1),
(3, 'categories', 'add,edit,view,delete', 'categories', 'Categories', '<i class=\"fa fa-indent\"></i>', 1, '2020-04-12 22:51:10', 1),
(5, 'admin_roles', 'add,edit,view,delete', 'admin_roles', 'Admin Roles', '<i class=\"fa fa-users\"></i>', 7, '2020-04-12 23:17:06', 1),
(15, 'quranaudios', 'add,edit,view,delete', 'quranaudios', 'Quran Audio', '<i class=\"fa fa-book\"></i>', 2, '2020-06-23 02:27:28', 1),
(19, 'admin_role_permissions', 'add,edit,view,delete', 'watches', 'Admin Role\'s permissions', '<i class=\"fa fa-lock\"></i>', 10, '2020-06-23 02:27:28', 1),
(20, 'section_sorting', 'view,update', 'section_sorting', 'Section Sortinng', '<i class=\"fa fa-sort-amount-up\"></i>', 11, '2020-06-23 05:47:12', 1),
(24, 'pdf', 'add,edit,view,delete', 'pdf', 'Documents', '<i class=\"fa fa-file-pdf\"></i>', 6, '2021-05-21 18:23:49', 1),
(25, 'blogs', 'add,edit,view,delete', 'blogs', 'blogs', '<i class=\"fa fa-image\"></i>', 5, '2021-05-21 18:24:46', 1),
(26, 'audios', 'add,edit,view,delete	', 'audios', 'Audios', '<i class=\"fa fa-volume-up\"></i>', 3, '2021-05-21 18:25:21', 1),
(27, 'videos', 'add,edit,view,delete	', 'videos', 'Videos', '<i class=\"fa fa-youtube-square\"></i>', 4, '2021-05-21 18:26:14', 1),
(28, 'quranaudiocat', 'add,edit,view,delete,single	', 'quranaudiocat', 'Q Audio category', '<i class=\"fa fa-play\"></i>', 12, '2021-06-03 15:13:52', 1),
(29, 'blogcategories', 'add,edit,view,delete', 'blogcategories', 'Post Categories', '<i class=\"fa fa-list\"></i>', 0, '2021-06-08 17:30:08', 1),
(30, 'banners', 'add,edit,view,delete', 'banners', 'Banners', '<i class=\"fa fa-image\"></i>', 0, '2021-10-14 01:39:40', 1),
(31, 'services', 'add,edit,view,delete', 'services', 'Services', '<i class=\"fa fa-indent\"></i>', 0, '2022-06-22 05:05:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `image` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'uploads/users/profile-pic.jpg',
  `role_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `password`, `phone`, `image`, `role_id`, `created`, `is_active`) VALUES
(1, 'Awais Arif', 'admin@mail.com', '202cb962ac59075b964b07152d234b70', '03208403903', 'uploads/users/mydoc-5db8392960e84.png', 1, '2019-10-29 13:19:14', 1),
(2, 'Haris', 'haris@mail.com', '123', '03208403903', 'uploads/users/mydoc-5db804070cbe2.png', 1, '2019-10-29 13:26:09', 1),
(3, 'Zain', 'zain@mail.com', '202cb962ac59075b964b07152d234b70', '03208403903', 'uploads/users/ori-5f088f6ac0e72.png', 2, '2020-07-10 20:55:22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `created`, `is_active`) VALUES
(1, 'uploads/banners/filapp-616745793c9d4.png', '2021-10-14 01:45:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `level`, `created`, `is_active`) VALUES
(3, 'Air', 1, '2021-06-03 17:12:24', 1),
(4, 'Land', 2, '2021-06-03 17:12:41', 1),
(5, 'Sea', 3, '2021-06-08 17:37:43', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pdf`
--

CREATE TABLE `pdf` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `file` text NOT NULL,
  `level` int(11) NOT NULL DEFAULT 1,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pdf`
--

INSERT INTO `pdf` (`id`, `name`, `file`, `level`, `created`, `is_active`) VALUES
(2, 'Test 1', 'uploads/pdf/pdf-60b8b8655bbd4.pdf', 2, '2021-06-03 15:56:30', 1),
(3, 'app', 'uploads/pdf/pdf-60b8b88181339.pdf', 1, '2021-06-03 16:09:53', 1),
(4, 'Awais Arif', 'uploads/pdf/pdf-60bf6c6a70339.pdf', 1, '2021-06-08 18:11:06', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blogcategories`
--

CREATE TABLE `blogcategories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blogcategories`
--

INSERT INTO `blogcategories` (`id`, `name`, `level`, `created`, `is_active`) VALUES
(1, 'test', 1, '2021-06-08 17:42:59', 1),
(2, 'Test', 2, '2021-06-08 17:43:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `image` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `level` int(11) NOT NULL DEFAULT 1,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `name`, `image`, `category_id`, `description`, `level`, `created`, `is_active`) VALUES
(2, 'Awais Arif', 'uploads/blogs/post-60bf6b8720841.png', 1, '', 2, '2021-06-08 18:07:03', 1),
(3, 'Lorem Ipsum', 'uploads/blogs/post-60bf7212b4b64.png', 1, '', 3, '2021-06-08 18:35:14', 1),
(4, 'Awais Arif', 'uploads/blogs/post-60f1ae2a037c2.png', 2, '', 1, '2021-07-16 21:04:58', 1),
(5, 'Awais Arif', 'uploads/blogs/post-60f1ae453bd59.png', 2, '', 2, '2021-07-16 21:05:25', 1),
(6, 'asdsa', 'uploads/blogs/post-62b2643f18208.png', 1, 'Blog', 12, '2022-06-22 05:37:19', 1),
(7, 'POST', 'uploads/blogs/post-62b2647bec0d3.jpeg', 1, 'dadasd', 1, '2022-06-22 05:38:19', 1),
(8, 'POST', 'uploads/blogs/post-62b265433ac31.jpeg', 2, 'DES', 1, '2022-06-22 05:41:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `file` text DEFAULT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `category_id`, `file`, `created`, `is_active`) VALUES
(5, 'Shipment', 5, 'uploads/services/img-62b26073b68f8.png', '2022-06-22 05:21:07', 1),
(6, 'Duty', 5, 'uploads/services/img-62b2609ade3eb.png', '2022-06-22 05:21:46', 1),
(7, 'Tax ', 5, '', '2022-06-22 05:27:35', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` varchar(200) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `sur_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_by` varchar(50) NOT NULL,
  `token` text NOT NULL,
  `is_verified` tinyint(4) NOT NULL DEFAULT 0,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `name`, `sur_name`, `email`, `phone`, `password`, `contact_by`, `token`, `is_verified`, `created`, `is_active`) VALUES
(1, 'Mrs', 'Lorem Ipsum', '', 'admin@mail.com', '03218868489', '202cb962ac59075b964b07152d234b70', '', 'e67ccbd32c3f7a0de4a29c6f0132655e', 1, '2020-05-24 20:23:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `link` text NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp(),
  `is_active` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `name`, `link`, `created`, `is_active`) VALUES
(1, 'Sharum', 'ljX7kyS5R7M', '2021-06-03 16:50:42', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_roles`
--
ALTER TABLE `admin_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_role_permissions`
--
ALTER TABLE `admin_role_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_sections`
--
ALTER TABLE `admin_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`) USING BTREE;

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pdf`
--
ALTER TABLE `pdf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogcategories`
--
ALTER TABLE `blogcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_roles`
--
ALTER TABLE `admin_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `admin_role_permissions`
--
ALTER TABLE `admin_role_permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `admin_sections`
--
ALTER TABLE `admin_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pdf`
--
ALTER TABLE `pdf`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blogcategories`
--
ALTER TABLE `blogcategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
