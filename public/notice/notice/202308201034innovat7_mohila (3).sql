-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 07:27 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `education_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details1` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `banner_image`, `details1`, `image1`, `image2`, `created_at`, `updated_at`) VALUES
(1, 'abc', 'About/about_banner_image-588902269.png', '<p>ckhxclkhfdljhg</p>', 'About/about_image-293082824.png', 'About/about_image-1531412888.png', '2023-06-11 01:40:06', '2023-08-02 05:07:44'),
(2, 'fdgfddsfdsf', 'About/about_banner_image-1553930758.jpg', '<p>fdgfdgfdgdf</p>', 'About/about_image-1033251399.png', 'About/about_image-45250522.jpg', '2023-08-02 05:10:37', '2023-08-02 05:11:16');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `select_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `number`, `email`, `service_id`, `date`, `select_time`, `created_at`, `updated_at`) VALUES
(1, 'shadhin', '019738272737', 'admin@itsolutionstuff.com', '7', '2023-06-12', '1', '2023-06-06 04:01:25', '2023-06-06 04:01:25'),
(3, 'ddd', '35345', 'mibucili@mailinator.com', '8', '2023-06-28', '3', '2023-06-06 05:16:45', '2023-06-06 05:16:45'),
(5, 'abc', '019738272737', 'mibucili@mailinator.com', '5', '2023-06-29', '2', '2023-06-06 05:18:10', '2023-06-06 05:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_infos`
--

CREATE TABLE `appointment_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details1` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details3` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_infos`
--

INSERT INTO `appointment_infos` (`id`, `title`, `details1`, `details2`, `details3`, `created_at`, `updated_at`) VALUES
(1, 'Protect Your Health With Our Health Package', '<p>There are many variations of passages of Lorem Ipsum amets avoilble but majority have suffered alteration in some form, by injected humour or randomise words which don\'t sure amet consec tetur adicing.</p>', '<h3>Good People Work</h3>\r\n<p>Vestibulum ac diam sit amet quam vehicula elemen tum sed sit amet dui praesent sapien pellen tesque .</p>', '<h3>Live Healthy Life</h3>\r\n<p>Vestibulum ac diam sit amet quam vehicula elemen tum sed sit amet dui praesent sapien pellen tesque.</p>', '2023-05-31 04:32:53', '2023-05-31 05:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `short_details`, `image`, `created_at`, `updated_at`) VALUES
(4, 'Start to learning today2', 'Explore Interests and Career With Courses2', 'website-banner/banner-295804695.jpg', '2023-06-07 23:07:58', '2023-06-07 23:20:00'),
(5, 'Start to learning today1', 'Explore Interests and Career With Courses1', 'website-banner/banner-917415904.jpg', '2023-06-07 23:11:43', '2023-06-07 23:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `banner_and_titles`
--

CREATE TABLE `banner_and_titles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_and_titles`
--

INSERT INTO `banner_and_titles` (`id`, `title`, `image`, `page`, `created_at`, `updated_at`) VALUES
(1, 'Meet Our Expert & Experienced Instructor.', 'banner/banner-775395475.jpg', 'instructor', '2023-06-04 00:08:08', '2023-06-12 23:13:15'),
(2, 'Think Hard & Focus On The Patient\'s Well-Being.', 'banner/banner-957721314.jpg', 'courses', '2023-06-04 01:07:22', '2023-06-12 23:13:36'),
(5, 'Our Latest & Most Popular Tips & Tricks For You.', 'banner/banner-1764042857.jpg', 'blogs', '2023-06-04 01:28:53', '2023-06-11 00:16:05'),
(6, 'Have some suggestions or just want to say hi? Our support team are ready to help you 24/7.', 'banner/banner-543614010.jpg', 'contacts', '2023-06-04 03:17:11', '2023-06-08 00:26:27'),
(9, 'Latest photos of events', 'banner/banner-1901185870.jpg', 'gallery', '2023-06-08 01:11:55', '2023-06-08 01:11:55'),
(10, 'Research or Paper Publication', 'banner/banner-1972766236.jpg', 'research', '2023-06-12 00:20:43', '2023-06-12 00:20:43'),
(11, NULL, 'banner/banner-1115876782.jpg', 'enrollment', '2023-06-12 04:42:15', '2023-06-12 04:42:15'),
(12, 'Think Hard & Focus On The Patient\'s Well-Being.', 'banner/banner-1355036597.jpg', 'testimonial', '2023-06-12 23:23:12', '2023-06-12 23:23:59'),
(13, NULL, 'banner/banner-951538574.jpg', 'login', '2023-06-12 23:32:25', '2023-06-12 23:32:25'),
(14, NULL, 'banner/banner-1969302124.jpg', 'register', '2023-06-12 23:32:34', '2023-06-12 23:32:34');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_image1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_image2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_image3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details1` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `add_home` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1= active; 0=deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `short_details`, `main_image`, `banner_image`, `details_image1`, `details_image2`, `details_image3`, `details1`, `details2`, `add_home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'High school program starting soon 2021', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam...</p>', 'blog/blog_main_image-1441084933.jpg', 'blog/blog_banner_image-596917598.jpg', 'blog/blog_details_image-1467804235.jpg', 'blog/blog_details_image-1265064551.jpg', 'blog/blog_details_image-1870697604.jpg', '<h2 class=\"title mb-40\">Economy may face double recession</h2>\r\n<div class=\"blog-desc mb-35\">\r\n<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment. Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.</p>\r\n</div>', '<div class=\"blog-desc mb-40\">\r\n<p>Phosfluorescently engage worldwide methodologies with web-enabled technology. Interactively coordinate proactive e-commerce via process-centric &ldquo;outside the box&rdquo; thinking. Completely pursue scalable customer service through sustainable potentialities. Collaboratively administrate turnkey channels whereas virtual e-tailers. Objectively seize scalable metrics whereas proactive e-services. Seamlessly empower fully researched growth strategies and interoperable internal or &ldquo;organic&rdquo; sources.</p>\r\n</div>\r\n<ul class=\"unorder-list mb-20\">\r\n<li>New Construction Benefit of Service</li>\r\n<li>Renovations Benefit of Service</li>\r\n<li>Historic Renovations and Restorations</li>\r\n<li>Additions Benefit of Service</li>\r\n<li>Rebuilding from fire or water damage</li>\r\n</ul>\r\n<h2 class=\"title\">Experts Always Ready to Maximizing Products</h2>\r\n<div class=\"blog-desc\">\r\n<p>Proactively fabricate one-to-one materials via effective e-business. Completely synergize scalable e-commerce rather than high standards in e-services. Assertively iterate resource maximizing products after leading-edge intellectual capital. Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.</p>\r\n</div>\r\n<h4 class=\"sm-title\">Experts Always Ready to Maximizing Products</h4>\r\n<div class=\"blog-desc\">\r\n<p>Interactively procrastinate high-payoff content without backward-compatible data. Quickly cultivate optimal processes and tactical architectures. Completely iterate covalent strategic theme areas via accurate e-markets. Globally incubate standards compliant channels before scalable benefits. Quickly disseminate superior deliverables whereas web-enabled applications. Quickly drive clicks-and-mortar catalysts for change before vertical</p>\r\n</div>', 1, 1, '2023-06-01 02:18:23', '2023-06-10 23:01:19'),
(2, 'University while the lovely valley team work', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam</p>', 'blog/blog_main_image-415396868.jpg', 'blog/blog_banner_image-1955410769.jpg', 'blog/blog_details_image-1594307127.jpg', 'blog/blog_details_image-631522332.jpg', 'blog/blog_details_image-2028373379.jpg', '<div class=\"blog-desc\">\r\n<p>We denounce with righteous indige nation and dislike men who are so beguiled and demo realized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided.</p>\r\n</div>\r\n<blockquote>\r\n<p>Globally incubate standards compliant channels before scalable benefits. Quickly disseminate superior deliverables whereas web-enabled applications.</p>\r\n</blockquote>\r\n<div class=\"blog-desc mb-40\">\r\n<p>Interactively procrastinate high-payoff content without backward-compatible data. Quickly cultivate optimal processes and tactical architectures. Completely iterate covalent strategic theme areas via accurate e-markets. Globally incubate standards compliant channels before scalable benefits.</p>\r\n</div>', '<h2 class=\"title mb-40\">Economy may face double recession</h2>\r\n<div class=\"blog-desc mb-35\">\r\n<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment. Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.</p>\r\n<div class=\"blog-deatails\">\r\n<div class=\"blog-full\">\r\n<div class=\"blog-desc mb-40\">\r\n<p>Phosfluorescently engage worldwide methodologies with web-enabled technology. Interactively coordinate proactive e-commerce via process-centric &ldquo;outside the box&rdquo; thinking. Completely pursue scalable customer service through sustainable potentialities. Collaboratively administrate turnkey channels whereas virtual e-tailers. Objectively seize scalable metrics whereas proactive e-services. Seamlessly empower fully researched growth strategies and interoperable internal or &ldquo;organic&rdquo; sources.</p>\r\n</div>\r\n<ul class=\"unorder-list mb-20\">\r\n<li>New Construction Benefit of Service</li>\r\n<li>Renovations Benefit of Service</li>\r\n<li>Historic Renovations and Restorations</li>\r\n<li>Additions Benefit of Service</li>\r\n<li>Rebuilding from fire or water damage</li>\r\n</ul>\r\n<h2 class=\"title\">Experts Always Ready to Maximizing Products</h2>\r\n<div class=\"blog-desc\">\r\n<p>Proactively fabricate one-to-one materials via effective e-business. Completely synergize scalable e-commerce rather than high standards in e-services. Assertively iterate resource maximizing products after leading-edge intellectual capital. Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.</p>\r\n</div>\r\n<h4 class=\"sm-title\">Experts Always Ready to Maximizing Products</h4>\r\n<div class=\"blog-desc\">\r\n<p>Interactively procrastinate high-payoff content without backward-compatible data. Quickly cultivate optimal processes and tactical architectures. Completely iterate covalent strategic theme areas via accurate e-markets. Globally incubate standards compliant channels before scalable benefits. Quickly disseminate superior deliverables whereas web-enabled applications. Quickly drive clicks-and-mortar catalysts for change before vertical architectures</p>\r\n</div>\r\n</div>\r\n</div>\r\n<div class=\"ps-navigation\">\r\n<ul>\r\n<li>&nbsp;</li>\r\n</ul>\r\n</div>\r\n</div>', 1, 1, '2023-06-10 22:56:44', '2023-06-10 22:56:44');

-- --------------------------------------------------------

--
-- Table structure for table `consultancies`
--

CREATE TABLE `consultancies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_image1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_image2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_image3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details1` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultancies`
--

INSERT INTO `consultancies` (`id`, `banner_image`, `details_image1`, `details_image2`, `details_image3`, `details1`, `details2`, `created_at`, `updated_at`) VALUES
(1, 'consultancy/consultancy_banner_image-1675148363.jpg', 'consultancy/consultancy_details_image-1273101043.jpg', 'consultancy/consultancy_details_image-661757760.jpg', 'consultancy/consultancy_details_image-375049347.jpg', '<h4>Educavo Course Details</h4>\r\n<p>Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. Quisque tincidunt laoreet malesuada. Cum sociis natoque penatibus...</p>', '<p>Eleifend euismod pellentesque vel Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. Quisque tincidunt laoreet malesuada. Cum sociis natoque penatibus.</p>\r\n<h3>What you&rsquo;ll learn?</h3>\r\n<ul class=\"review-list\">\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Sed consequat justo non mauris pretium at tempor justo.</li>\r\n<li>Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Sed consequat justo non mauris pretium at tempor justo.</li>\r\n<li>Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo</li>\r\n<li>Phasellus enim magna, varius et commodo ut..</li>\r\n</ul>\r\n<h3>Requirements</h3>\r\n<ul class=\"review-list\">\r\n<li>Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo</li>\r\n<li>Ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel.</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Varius et commodo ut, ultricies vitae velit. Ut nulla tellus.</li>\r\n<li>Phasellus enim magna, varius et commodo ut..</li>\r\n</ul>', '2023-06-11 23:32:10', '2023-06-11 23:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `number`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'shadhin', NULL, 'admin@itsolutionstuff.com', 'dsgfdsfsdfds', 'dsfdsfdsfsdfsdf', '2023-06-06 05:56:18', '2023-06-06 05:56:18'),
(2, 'fsdfsdf', NULL, 'shadhin@gmail.com', 'dsgfdsfsdfds', 'fgdfgdfgdfgdfgfd', '2023-06-06 05:57:01', '2023-06-06 05:57:01'),
(3, 'aaa', '534543', 'admin@itsolutionstuff.com', 'fdgdfgfd', 'fdgdfgdfgdfg dfgfdgfdg', '2023-06-06 05:58:01', '2023-06-06 05:58:01'),
(4, 'aaa', '019738272737', 'admin@admin.com', 'fdgdfgfd', 'dfgfdgfdgdfgfdgdfg', '2023-06-08 00:24:31', '2023-06-08 00:24:31');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=pending,1=approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `user_id`, `service_id`, `payment_type`, `number`, `transaction_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'nagad', '019738272737', 'T-23432dfsd', '1', '2023-06-12 03:55:36', '2023-06-12 04:16:06'),
(2, 2, 2, 'rocket', '019738272737', 'T-23432DSDFD', '0', '2023-06-12 04:43:50', '2023-06-12 04:43:50'),
(3, 3, 1, 'bkash', '019738272737', 'T-23432dfsd', '1', '2023-06-18 03:12:21', '2023-06-18 03:15:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `footer_details`
--

CREATE TABLE `footer_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_details`
--

INSERT INTO `footer_details` (`id`, `details`, `credit`, `created_at`, `updated_at`) VALUES
(3, 'We denounce with righteous indi gnation and dislike men who are so beguiled and demoralized by the charms of pleasure of your moment, so blinded by desire those who fail weakness.', '2020 All Rights Reserved. Developed ByTechweb BD IT', '2023-06-07 23:56:22', '2023-06-07 23:56:41');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `add_home` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1= active; 0=deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `image`, `add_home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'gallery/gallery_image-401958126.jpg', 1, 1, '2023-06-07 05:05:52', '2023-06-07 05:14:22'),
(2, 'gallery/gallery_image-1835405128.jpg', 1, 1, '2023-06-07 05:14:32', '2023-06-07 05:14:32'),
(3, 'gallery/gallery_image-1967782948.jpg', 1, 1, '2023-06-07 05:14:38', '2023-06-07 05:14:38'),
(4, 'gallery/gallery_image-964604254.jpg', 1, 1, '2023-06-07 05:14:45', '2023-06-07 05:14:45'),
(5, 'gallery/gallery_image-1678554901.jpg', 1, 1, '2023-06-07 05:14:54', '2023-06-07 05:14:54'),
(6, 'gallery/gallery_image-2021040969.jpg', 1, 1, '2023-06-07 05:15:01', '2023-06-07 05:15:01'),
(7, 'gallery/gallery_image-26606718.jpg', 0, 0, '2023-06-07 05:15:13', '2023-06-07 05:19:58'),
(8, 'gallery/gallery_image-1414575372.jpg', 1, 1, '2023-06-07 22:29:06', '2023-06-07 22:29:06');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_image1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `favicon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `site_name`, `logo_image`, `logo_image1`, `favicon`, `created_at`, `updated_at`) VALUES
(1, 'Education', 'logo/logo-1658540052.png', 'logo/logo-404593903.png', 'logo/favicon-967054774.png', '2023-06-11 02:16:19', '2023-06-11 02:16:19');

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

CREATE TABLE `management` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedIn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1= active, 0= deactive',
  `add_home` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`id`, `name`, `designation`, `email`, `facebook`, `instagram`, `linkedIn`, `youtube`, `image`, `status`, `add_home`, `created_at`, `updated_at`) VALUES
(1, 'shadhin', 'Othopedic Surgeon', 'shadhin@gmail.com', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', 'https://www.youtube.com/', 'management/management-922931680.png', 1, 1, '2023-06-04 03:35:03', '2023-06-04 03:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Projects', '2023-08-02 05:27:18', '2023-08-02 05:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(21, '2023_05_31_060218_create_teams_table', 3),
(24, '2023_05_31_085553_create_testimonials_table', 4),
(25, '2023_05_31_101618_create_appointment_infos_table', 5),
(29, '2023_06_01_060829_create_packages_table', 6),
(31, '2023_06_01_074910_create_blogs_table', 7),
(33, '2023_06_04_054616_create_banner_and_titles_table', 8),
(34, '2023_06_04_092454_create_management_table', 9),
(37, '2023_06_04_105408_create_website_links_table', 11),
(38, '2023_06_05_070802_create_footer_details_table', 12),
(42, '2023_06_06_095531_create_appointments_table', 14),
(43, '2023_06_06_113522_create_contact_us_table', 15),
(44, '2023_06_07_104911_create_galleries_table', 16),
(45, '2023_06_05_102842_create_banners_table', 17),
(49, '2023_05_30_071424_create_abouts_table', 19),
(50, '2023_06_04_101518_create_logos_table', 20),
(51, '2023_05_29_072203_create_services_table', 21),
(53, '2014_10_12_000000_create_users_table', 22),
(54, '2023_06_12_050757_create_consultancies_table', 23),
(55, '2023_06_12_055545_create_research_table', 24),
(57, '2023_06_12_063432_create_payment_numbers_table', 25),
(59, '2023_06_12_092315_create_enrollments_table', 26),
(60, '2023_08_02_111913_create_menus_table', 27),
(61, '2023_08_02_113535_create_sub_menus_table', 28);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `options` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1= active, 0= deactive',
  `add_home` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `price`, `options`, `status`, `add_home`, `created_at`, `updated_at`) VALUES
(1, 'Basic Plan', 79, '[\"New Patient Consultation\",\"Regular health Checkup\",\"Ocupational Therapy\",\"Phusical Therapy\",\"X-rays\",null]', 1, 1, '2023-06-01 00:57:27', '2023-06-01 01:10:09'),
(2, 'Standard Plan', 89, '[\"New Patient Consultation\",\"Regular health Checkup\",\"Ocupational Therapy\",\"Phusical Therapy\",\"X-rays\",null]', 1, 1, '2023-06-01 01:11:40', '2023-06-01 01:11:40'),
(3, 'Premium Plan', 99, '[\"New Patient Consultation\",\"Regular health Checkup\",\"Ocupational Therapy\",\"Phusical Therapy\",\"X-rays\",\"Cancer Treatment\",null]', 1, 1, '2023-06-01 01:12:46', '2023-06-01 01:12:46');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_numbers`
--

CREATE TABLE `payment_numbers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bkash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nagad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rocket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_numbers`
--

INSERT INTO `payment_numbers` (`id`, `bkash`, `nagad`, `rocket`, `created_at`, `updated_at`) VALUES
(1, '019745645646', '0172352365', '019756756766', '2023-06-12 00:45:32', '2023-06-12 00:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_image1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_image2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_image3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details1` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `add_home` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1= active; 0=deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`id`, `title`, `short_details`, `main_image`, `banner_image`, `details_image1`, `details_image2`, `details_image3`, `details1`, `details2`, `add_home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'High school program starting soon 2021', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam...</p>', 'research/research_main_image-1474554970.jpg', 'research/research_banner_image-1045844051.jpg', 'research/research_details_image-1907470230.jpg', 'research/research_details_image-1701328911.jpg', 'research/research_details_image-422122199.jpg', '<h2 class=\"title mb-40\">Economy may face double recession.</h2>\r\n<div class=\"blog-desc mb-35\">\r\n<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment. Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.</p>\r\n</div>', '<div class=\"blog-desc mb-40\">\r\n<p>Phosfluorescently engage worldwide methodologies with web-enabled technology. Interactively coordinate proactive e-commerce via process-centric &ldquo;outside the box&rdquo; thinking. Completely pursue scalable customer service through sustainable potentialities. Collaboratively administrate turnkey channels whereas virtual e-tailers. Objectively seize scalable metrics whereas proactive e-services. Seamlessly empower fully researched growth strategies and interoperable internal or &ldquo;organic&rdquo; sources.</p>\r\n</div>\r\n<ul class=\"unorder-list mb-20\">\r\n<li>New Construction Benefit of Service</li>\r\n<li>Renovations Benefit of Service</li>\r\n<li>Historic Renovations and Restorations</li>\r\n<li>Additions Benefit of Service</li>\r\n<li>Rebuilding from fire or water damage</li>\r\n</ul>\r\n<h2 class=\"title\">Experts Always Ready to Maximizing Products.</h2>\r\n<div class=\"blog-desc\">\r\n<p>Proactively fabricate one-to-one materials via effective e-business. Completely synergize scalable e-commerce rather than high standards in e-services. Assertively iterate resource maximizing products after leading-edge intellectual capital. Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.</p>\r\n</div>\r\n<h4 class=\"sm-title\">Experts Always Ready to Maximizing Products.</h4>\r\n<div class=\"blog-desc\">\r\n<p>Interactively procrastinate high-payoff content without backward-compatible data. Quickly cultivate optimal processes and tactical architectures. Completely iterate covalent strategic theme areas via accurate e-markets. Globally incubate standards compliant channels before scalable benefits. Quickly disseminate superior deliverables whereas web-enabled applications. Quickly drive clicks-and-mortar catalysts for change before vertical</p>\r\n</div>', 1, 1, '2023-06-12 00:13:15', '2023-06-12 00:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `service_title` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `main_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `banner_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_image1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_image2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_image3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_home` int(11) DEFAULT NULL,
  `service_details_small` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_details1` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_details2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_details3` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1= active; 0=deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_title`, `main_image`, `price`, `banner_image`, `details_image1`, `details_image2`, `details_image3`, `service_home`, `service_details_small`, `service_details1`, `service_details2`, `service_details3`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fitness Development Strategy Buildup Laoreet', 'services/services_main_image-1065523139.jpg', 750, 'services/services_banner_image-1853677552.jpg', 'services/services_details_image-1245709720.jpg', 'services/services_details_image-796716001.jpg', 'services/services_details_image-615468607.jpg', 1, '<p>Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. Quisque tincidunt laoreet malesuada. Cum sociis natoque penatibus</p>', '<h4>Educavo Course Details</h4>\r\n<p>Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. Quisque tincidunt laoreet malesuada. Cum sociis natoque penatibus.</p>', '<p>Eleifend euismod pellentesque vel Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. Quisque tincidunt laoreet malesuada. Cum sociis natoque penatibus.</p>', '<ul class=\"student-list\">\r\n<li>3,564 Total Students</li>\r\n&nbsp;\r\n<li><span class=\"theme_color\">4.5</span>&nbsp;&nbsp;(1254 Rating)</li>\r\n&nbsp;\r\n<li>256 Reviews</li>\r\n</ul>\r\n<h3>What you&rsquo;ll learn?</h3>\r\n<ul class=\"review-list\">\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Sed consequat justo non mauris pretium at tempor justo.</li>\r\n<li>Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Sed consequat justo non mauris pretium at tempor justo.</li>\r\n<li>Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n</ul>\r\n<h3>Requirements</h3>\r\n<ul class=\"review-list\">\r\n<li>Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo</li>\r\n<li>Ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel.</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Varius et commodo ut, ultricies vitae velit. Ut nulla tellus.</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n</ul>', 1, '2023-06-11 03:01:21', '2023-06-11 03:01:21'),
(2, 'Artificial Intelligence Fundamental Startup Justo', 'services/services_main_image-1546172901.jpg', 200, 'services/services_banner_image-827692409.jpg', 'services/services_details_image-1899831290.jpg', 'services/services_details_image-1728898727.jpg', 'services/services_details_image-215154261.jpg', 1, '<p>Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. Quisque tincidunt laoreet malesuada. Cum sociis natoque penatibus.</p>', '<h4>Educavo Course Details</h4>\r\n<p>Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. Quisque tincidunt laoreet malesuada. Cum sociis natoque penatibus.</p>', '<p>Eleifend euismod pellentesque vel Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. Quisque tincidunt laoreet malesuada. Cum sociis natoque penatibus.</p>\r\n<ul class=\"student-list\">\r\n<li>23,564 Total Students</li>\r\n&nbsp;\r\n<li><span class=\"theme_color\">4.5</span>&nbsp;&nbsp;(1254 Rating)</li>\r\n&nbsp;\r\n<li>256 Reviews</li>\r\n</ul>', '<h3>What you&rsquo;ll learn?</h3>\r\n<ul class=\"review-list\">\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Sed consequat justo non mauris pretium at tempor justo.</li>\r\n<li>Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Sed consequat justo non mauris pretium at tempor justo.</li>\r\n<li>Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n</ul>\r\n<h3>Requirements</h3>\r\n<ul class=\"review-list\">\r\n<li>Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo</li>\r\n<li>Ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel.</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Varius et commodo ut, ultricies vitae velit. Ut nulla tellus.</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n</ul>', 1, '2023-06-11 03:03:18', '2023-06-11 03:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menus`
--

CREATE TABLE `sub_menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_id` int(11) DEFAULT NULL,
  `banner_image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_image1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_image2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details_image3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details1` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details2` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_menus`
--

INSERT INTO `sub_menus` (`id`, `title`, `menu_id`, `banner_image`, `details_image1`, `details_image2`, `details_image3`, `details1`, `details2`, `created_at`, `updated_at`) VALUES
(1, 'hello', 1, 'consultancy/consultancy_banner_image-1970983837.png', 'consultancy/consultancy_details_image-1552974315.png', 'consultancy/consultancy_details_image-192149293.jpg', 'consultancy/consultancy_details_image-1976193330.png', '<p>dsfdsfdsf</p>', '<p>sdfdsfdsf</p>', '2023-08-02 05:46:23', '2023-08-02 05:52:06');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedIn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1= active, 0= deactive',
  `add_home` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `designation`, `email`, `facebook`, `instagram`, `linkedIn`, `youtube`, `image`, `status`, `add_home`, `created_at`, `updated_at`) VALUES
(1, 'Dr. Fedrick Bonita', 'Othopedic Surgeon', 'fedrick@gmail.com', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', 'https://www.youtube.com/', 'team/team-722119950.png', 1, 1, '2023-05-31 01:43:52', '2023-05-31 02:12:11'),
(2, 'Dr. Ken Moris', 'Urology Efficient', 'moris@gmail.com', 'https://www.facebook.com/', NULL, 'https://www.linkedin.com/', NULL, 'team/team-952239864.png', 1, 1, '2023-05-31 01:46:13', '2023-05-31 02:11:47'),
(3, 'Dr. Luiz Frank', 'Neurosurgery Efficient', 'frank@gmail.com', 'https://www.facebook.com/', 'https://www.instagram.com/', NULL, 'https://www.youtube.com/', 'team/team-167116506.png', 1, 1, '2023-05-31 01:47:26', '2023-05-31 02:11:29'),
(4, 'Dr. Selina Gomez', 'Surgery Efficient', 'gomez@gmail.com', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', 'https://www.youtube.com/', 'team/team-1997767589.png', 1, 1, '2023-05-31 02:13:21', '2023-05-31 02:13:21'),
(5, 'Dr. Sarai Conn', 'Senior Dentist', 'sarai@gmail.com', 'https://www.youtube.com/', 'https://www.instagram.com/', NULL, NULL, 'team/team-1351244191.png', 1, 0, '2023-05-31 02:14:13', '2023-05-31 02:14:13'),
(6, 'Dr. Maureen Klein', 'Othopedic Surgeon', NULL, NULL, NULL, NULL, NULL, 'team/team-68965612.png', 1, 1, '2023-05-31 02:14:36', '2023-05-31 02:14:36'),
(7, 'Dr.Fletcher Waelchi', 'Medicine Expert', NULL, NULL, NULL, NULL, NULL, 'team/team-1469656857.png', 1, 1, '2023-05-31 02:14:57', '2023-05-31 02:14:57'),
(8, 'Dr.Bonita Schaden', 'Neurologist', NULL, NULL, NULL, NULL, NULL, 'team/team-1431995246.jpg', 1, 0, '2023-05-31 02:15:16', '2023-05-31 02:15:16'),
(9, 'Jhon Pedrocas', 'Professor', 'admin@gmail.com', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', 'https://www.youtube.com/', 'team/team-571237496.jpg', 1, 1, '2023-06-08 00:43:51', '2023-06-08 00:43:51');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `star` int(11) DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1= active, 0= deactive',
  `add_home` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `review`, `star`, `image`, `status`, `add_home`, `created_at`, `updated_at`) VALUES
(1, 'Jim Morison T', 'Director, BATT', '<p>Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam aliq earu expel dolor eme fugiat enim amet sit dolor.T</p>', 5, 'testimonial/testimonial-1259082305.jpg', 1, 1, '2023-05-31 03:36:11', '2023-05-31 03:46:53'),
(2, 'Alex Cruis', 'CEO, IBAC', '<p>Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam aliq earu expel dolor eme fugiat enim amet sit dolor.</p>', 5, 'testimonial/testimonial-1835323369.jpg', 1, 1, '2023-05-31 03:37:24', '2023-05-31 03:37:24'),
(3, 'Tom Haris', 'Engineer, Olleo', '<p>Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam aliq earu expel dolor eme fugiat enim amet sit dolor.</p>', 3, 'testimonial/testimonial-581778892.jpg', 1, 0, '2023-05-31 03:37:58', '2023-05-31 03:37:58'),
(4, 'Harry Jackson', 'Enterpreneur', '<p>Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam aliq earu expel dolor eme fugiat enim amet sit dolor.</p>', 4, 'testimonial/testimonial-1227925017.jpg', 1, 1, '2023-05-31 03:38:26', '2023-05-31 03:38:26'),
(5, 'Chris Haris', 'MD, ITec', '<p>Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam aliq earu expel dolor eme fugiat enim amet sit dolor.</p>', 5, 'testimonial/testimonial-686587466.jpg', 0, 1, '2023-05-31 03:38:55', '2023-06-08 01:26:52'),
(6, 'Ricky Ponting', 'Enterprenaur', '<p>Lorem ipsum dolor sit amet adip selection repellat tetur delni vel quam aliq earu expel dolor eme fugiat enim amet sit dolor.</p>', 4, 'testimonial/testimonial-1170844415.jpg', 1, 0, '2023-05-31 03:40:04', '2023-05-31 03:40:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT 0,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, 1, '$2y$10$NfMQyw0pJfoV2uGXyPraQ.oczVEUXVbST9vGzaoK5xnrd9QOChmLe', 'user/user-1773984705.jpg', NULL, '2023-06-11 04:28:21', '2023-06-11 04:32:31'),
(2, 'Shadhin Elahi', 'shadhin@gmail.com', NULL, 0, '$2y$10$u2IMMxW1cVDFEkv4/5Rakep.t54qAefMFL3cJtxFxMAKOJtkD1M2W', 'user/user-724309772.jpg', NULL, '2023-06-12 01:36:41', '2023-06-12 05:02:51'),
(3, 'rifat', 'rifat@gmail.com', NULL, 0, '$2y$10$GzpywpgtvIjINzviDf0AZ.HY.Oox9FjjnhfjxxIDEj722vM0izj4.', NULL, NULL, '2023-06-18 03:11:39', '2023-06-18 03:11:39');

-- --------------------------------------------------------

--
-- Table structure for table `website_links`
--

CREATE TABLE `website_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedIn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_link` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_links`
--

INSERT INTO `website_links` (`id`, `email`, `facebook`, `instagram`, `linkedIn`, `youtube`, `number`, `address`, `map_link`, `created_at`, `updated_at`) VALUES
(3, 'user@itsolutionstuff.com', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', 'https://www.youtube.com/', '019738272737', '2767 Sunrise Street, NY 1002, USA', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d29199.978510144396!2d90.41343228190985!3d23.818694561552554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e0!4m3!3m2!1d23.820403799999998!2d90.4150013!4m5!1s0x3755c7b512a69851%3A0x1f8ae2a40e063c4d!2z4KaT4Kav4Ka84Ka-4Kaf4Ka-4Kaw4Kaq4KeL4Kay4KeLIOCmrOCmv-CmoeCmvw!3m2!1d23.8081072!2d90.4302925!5e0!3m2!1sbn!2sbd!4v1685957818958!5m2!1sbn!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2023-06-05 03:37:10', '2023-06-07 23:49:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_infos`
--
ALTER TABLE `appointment_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_and_titles`
--
ALTER TABLE `banner_and_titles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultancies`
--
ALTER TABLE `consultancies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `footer_details`
--
ALTER TABLE `footer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `management`
--
ALTER TABLE `management`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_numbers`
--
ALTER TABLE `payment_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_menus`
--
ALTER TABLE `sub_menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `website_links`
--
ALTER TABLE `website_links`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `appointment_infos`
--
ALTER TABLE `appointment_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banner_and_titles`
--
ALTER TABLE `banner_and_titles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `consultancies`
--
ALTER TABLE `consultancies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `footer_details`
--
ALTER TABLE `footer_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `management`
--
ALTER TABLE `management`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_numbers`
--
ALTER TABLE `payment_numbers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_menus`
--
ALTER TABLE `sub_menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `website_links`
--
ALTER TABLE `website_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
