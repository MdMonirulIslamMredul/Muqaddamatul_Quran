-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 03, 2023 at 11:58 AM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charity`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

DROP TABLE IF EXISTS `abouts`;
CREATE TABLE IF NOT EXISTS `abouts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci,
  `title_bangla` text COLLATE utf8mb4_unicode_ci,
  `banner_image` text COLLATE utf8mb4_unicode_ci,
  `des_eng` longtext COLLATE utf8mb4_unicode_ci,
  `des_bangla` longtext COLLATE utf8mb4_unicode_ci,
  `image1` text COLLATE utf8mb4_unicode_ci,
  `image2` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `title`, `title_bangla`, `banner_image`, `des_eng`, `des_bangla`, `image1`, `image2`, `created_at`, `updated_at`) VALUES
(1, 'Introduction', 'পরিচিতি', 'About/about_banner_image-1862407579.jpg', '<p>The As-Sunnah Foundation is a non-political, non-profitable government-registered organization dedicated to education, da\'wah and full human welfare. It was established in 2017 by Shaikh Ahmadullah. He is the chairman of the organization and manages it directly. As-Sunnah Foundation was registered in 2019 from Joint Stock, Whose registration number is S-13111/2019. Since then, it has been working rigorously to serve the humanity, reform the society, developing the utmost morality, arrange various activities to build up a neat and clean mentality and ultimately to build up an ideal society following in the footsteps of the Prophet Muhammad, the teacher of humanity, the messenger of human liberation and peace and the ideal of human welfare. One of the goals of As-Sunnah Foundation is to build life and society based on the Quran and Sunnah and to propagate and spread authentic knowledge. It is our policy to adopt a moderate approach based on the Qur\'an and Sunnah following the path of the righteous predecessors.</p>', '<p>আস-সুন্নাহ ফাউন্ডেশন একটি অরাজনৈতিক, অলাভজনক শিক্ষা, দাওয়াহ ও পূর্ণত মানবকল্যাণে নিবেদিত সেবামূলক সরকার-নিবন্ধিত প্রতিষ্ঠান। নিবন্ধন নম্বর: এস-১৩১১১/২০১৯। ২০১৭ সালে শায়খ আহমাদুল্লাহ এটি প্রতিষ্ঠা করেন। তিনি প্রতিষ্ঠানটির চেয়ারম্যান হিসেবে প্রত্যক্ষভাবে পরিচালনা করছেন। এই প্রতিষ্ঠান মানবতার শিক্ষক, মানুষের মুক্তি ও শান্তির দূত, মানবসেবার আদর্শ, মহানবী মুহাম্মদ সা.-এর পদাঙ্ক অনুসরণ করে আর্তমানবতার সেবা, সমাজ-সংস্কার, মহোত্তম নীতিচেতনার সঞ্চার, পরিচ্ছন্ন মানসিকতা গঠনে নিরন্তর নানা কর্মসূচি পালন, সর্বোপরি একটি আদর্শ কল্যাণসমাজ বিনির্মাণে যথাশক্তি প্রচেষ্টা চালিয়ে যাচ্ছে। কুরআন ও সুন্নাহ ভিত্তিক জীবন ও সমাজ গঠন করা এবং বিশুদ্ধ ইলমের প্রচার ও বিস্তার আস-সুন্নাহ ফাউন্ডেশনের অন্যতম লক্ষ্য। সালফে সালিহীনের পথ ধরে কুরআন ও সুন্নাহ ভিত্তিক মধ্যমপন্থা অবলম্বন করা আমাদের নীতি।</p>', 'About/about_image-59858221.jpg', 'About/about_image-1412603328.jpg', '2023-09-01 17:41:51', '2023-09-01 17:50:46'),
(4, 'Principles and Norms', 'নীতি ও আদর্শ', 'About/about_banner_image-1672345269.jpg', '<ul class=\"ant-timeline\">\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-content\">The Holy Quran and the Sunnah of the Messenger of Allah (peace be upon him) are the main ideals of the As-Sunnah Foundation.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">It accepts the Qur\'an and Sunnah in the light of the interpretation of the Salafe Salihin.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">It nurtures the aqeedah and vision of Ahlus-Sunnah wal-Jama&rsquo;ah.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">It calls for shirk-free faith and bid&lsquo;at-free practices.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">It works for the unity and solidarity of the Ummah.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">It adopts moderation by avoiding extreme polarization as much as possible on divisive issues.</div>\r\n</li>\r\n<li class=\"ant-timeline-item ant-timeline-item-last\">\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">It refrains from taking political action and position and work for the greater good of all irrespective of party affiliation.</div>\r\n</li>\r\n</ul>', '<ul class=\"ant-timeline\">\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-content\">পবিত্র কুরআন ও আল্লাহর রাসুল মুহাম্মাদ (সাল্লাল্লাহু আলাইহি ওয়া সাল্লাম)-এর সুন্নাহ তথা কর্মনীতিই আস-সুন্নাহ ফাউন্ডেশনের মূল আদর্শ।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">কুরআন-সুন্নাহকে সালাফে সালিহীনের ব্যাখ্যার আলোকে গ্রহণ করা।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">আহলুস-সুন্নাহ ওয়াল-জামা&lsquo;আহর আক্বীদা ও দৃষ্টিভঙ্গি লালন করা।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">শিরকমুক্ত ঈমান ও বিদ&lsquo;আতমুক্ত আমলের প্রতি আহ্বান করা।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">উম্মাহর ঐক্য ও সংহতির জন্যে কাজ করা।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">মতপার্থক্যপূর্ণ বিষয়ে যথাসম্ভব প্রান্তিকতা পরিহার করে মধ্যপন্থা অবলম্বন করা।</div>\r\n</li>\r\n<li class=\"ant-timeline-item ant-timeline-item-last\">\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">রাজনৈতিক কর্ম ও অবস্থান গ্রহণ থেকে বিরত থাকা এবং দলমত নির্বিশেষে সকলের বৃহত্তর কল্যাণে কাজ করে যাওয়া।</div>\r\n</li>\r\n</ul>', 'About/about_image-341358050.jpg', 'About/about_image-738991384.jpg', '2023-09-01 17:47:42', '2023-09-01 17:47:42'),
(5, 'Goals and Objectives', 'লক্ষ্য ও উদ্দেশ্য', 'About/about_banner_image-1090411625.png', '<article class=\"ant-typography\">\r\n<div class=\"ant-typography\">The goal of the As-Sunnah Foundation is to gain the satisfaction of the Almighty Allah by conducting da\'wah activities to prevent evil deeds in the light of the lifestyle of the Prophet (peace be upon him).</div>\r\n</article>\r\n<ul class=\"ant-timeline\">\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">(a) Institutional and sub-institutional Islamic and general education and career-oriented technical training initiatives across the country, especially in the comparatively neglected sections of society</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">(b) service to humanity and</div>\r\n</li>\r\n<li class=\"ant-timeline-item ant-timeline-item-last\">\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">(c) encouragement for good deeds are the prime objective of the As-sunnah Foundation.</div>\r\n</li>\r\n</ul>', '<article class=\"ant-typography\">\r\n<div class=\"ant-typography\">রাসূলুল্লাহ (সাল্লালহু আলইহি ওয়া সাল্লাম)-এর জীবনাদর্শের আলোকে</div>\r\n</article>\r\n<ul class=\"ant-timeline\">\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">(ক) দেশজুড়ে, বিশেষত সমাজের তুলনামূলক উপেক্ষিত অংশে প্রাতিষ্ঠানিক ও উপ-প্রাতিষ্ঠানিকভাবে ইসলামী ও সাধারণ শিক্ষা-দীক্ষা ও কর্মমুখী বৈষয়িক প্রশিক্ষণের উদ্যোগ</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">(খ) আর্তমানবতার সেবা এবং</div>\r\n</li>\r\n<li class=\"ant-timeline-item ant-timeline-item-last\">\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">(গ) সৎকাজে উৎসাহ দান ও অসৎকাজ নিবারণে দাওয়াতি কার্যক্রম পরিচালনার মাধ্যমে মহান আল্লাহর সন্তুষ্টি অর্জনই আস-সুন্নাহ ফাউন্ডেশনের লক্ষ্য।</div>\r\n</li>\r\n</ul>', 'About/about_image-699920804.jpg', 'About/about_image-260559246.jpg', '2023-09-01 17:53:59', '2023-09-01 17:53:59'),
(6, 'Activities', 'কার্যক্রম', 'About/about_banner_image-1622009408.jpg', '<article class=\"ant-typography\">\r\n<div class=\"ant-typography\">The As-Sunnah Foundation mainly works in three sectors: education, service and da\'wah.</div>\r\n</article>\r\n<h1>Educational activities</h1>\r\n<ul class=\"ant-timeline\">\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Preparation of modern up-to-date textbooks and textbooks with basic teachings of Quran and Sunnah and establishment of madrasas to build wise scholars and dedicated souls.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Organizing competitions and prize distribution on education, culture and various social and life-oriented subjects.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Higher Ilmi Research Center.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Arranging various term based Islamic education courses for working men and women.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Establishment and management of schools, colleges, universities and technical schools with the spirit of As-Sunnah at the centre.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Establishment of Sabahi Maktab for the spreading of basic education at the pre-primary level.</div>\r\n</li>\r\n<li class=\"ant-timeline-item ant-timeline-item-last\">\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Provide literacy and other ancillary expenses to prevent children from indigent families from dropping out of school.</div>\r\n</li>\r\n</ul>\r\n<h1>Charitable activities</h1>\r\n<ul class=\"ant-timeline\">\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Provide financial assistance for handicrafts, machinery, technical, farm management training as well as self-reliance in eliminating unemployment and alleviating poverty.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Provide relief assistance to affected areas from time to time and during natural disasters.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Medical assistance to patients unable to bear the cost of treatment.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Collect unused medicines and distribute them among distressed patients through various booths.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Distribution of Iftar items to the needy during the month of Ramadan and organization of Da\'wah.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Distribution of Fitra, clothes and Eid items on the occasion of Eid among the needy.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Arranging sacrifices on behalf of the affluent and distributing among the needy.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Distribution of earning materials like rickshaws, sewing machines etc. among the needy.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Establishment of tube wells and reservoirs in areas deprived of potable water.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Planting and maintenance of high yielding trees in the yard of needy families and residential madrasas for the purpose of environmental protection and self reliance.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Provide various trainings and assistance to make Madrasa students self reliant.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">To co-operate and rehabilitate street children and the disabled.</div>\r\n</li>\r\n<li class=\"ant-timeline-item ant-timeline-item-last\">\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Teaching and upbringing of widows and taking care of them till they become orphans.</div>\r\n</li>\r\n</ul>\r\n<h1>Da\'wah activities</h1>\r\n<ul class=\"ant-timeline\">\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Construction and management of ideal mosques to build a peaceful and prosperous society.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Weekly, monthly, annual and occasional waz-mahfils, open exchange of views and seminars are organized at mosques, madrasas, district auditoriums, upazila parishad auditoriums, grounds, etc. in different areas to highlight the correct views of Islam.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Publication and dissemination of basic and authentic books highlighting pure Islamic knowledge, beliefs, policies and views.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Taking initiatives to eradicate shirk-bid &lsquo;at, polarization and extremism.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Contribute documentaries of thematic discussion programs and disseminate through social media.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Writing, translating, publishing and disseminating books for non-Muslims highlighting the superiority and beauty of Islam.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">To take various measures to eradicate religious and social prejudices and to prevent subcultures.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Management of Family Counseling Department.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Establishment of open &lsquo;call center&rsquo; for religious inquiries and consultations.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Establishment of Muslim Youth Club.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Dawah training for Imams and Khatibs.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Construction of Islamic Cultural Center for Children and Adolescents.</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Establishment of library.</div>\r\n</li>\r\n<li class=\"ant-timeline-item ant-timeline-item-last\">\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">Shariah Solution Department.</div>\r\n</li>\r\n</ul>', '<article class=\"ant-typography\">\r\n<div class=\"ant-typography\">আস-সুন্নাহ ফাউন্ডেশন প্রধানত তিনটি সেক্টরে কাজ করে&mdash; শিক্ষা, সেবা ও দা&rsquo;ওয়াহ।</div>\r\n</article>\r\n<h1>শিক্ষা কার্যক্রম সমূহ</h1>\r\n<ul class=\"ant-timeline\">\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">প্রাজ্ঞ আলেম ও নিবেদিতপ্রাণ দা&lsquo;য়ী ইলাল্লাহ গড়ে তুলতে কুরআন-সুন্নাহর মৌলিক শিক্ষা সম্বলিত আধুনিক যুগোপযোগী পাঠক্রম ও পাঠ্যপুস্তক প্রণয়ন এবং মাদরাসা প্রতিষ্ঠা।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">শিক্ষা, সংস্কৃতি ও নানা সামাজিক ও জীবনমুখি বিষয়ের ওপর প্রতিযোগিতা ও পুরস্কার বিতরণের আয়োজন করা।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">উচ্চতর ইলমী গবেষণাকেন্দ্র।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">কর্মজীবী নর-নারীর জন্য বিভিন্ন মেয়াদী ইসলামশিক্ষা কোর্সের আয়োজন।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">আস-সুন্নাহর চেতনাকে কেন্দ্রে রেখে স্কুল, কলেজ, বিশ্ববিদ্যালয় ও কারিগরি বিদ্যালয় প্রতিষ্ঠা ও পরিচালনা।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">প্রাক প্রাথমিক স্তরে বুনিয়াদি শিক্ষা বিস্তারে সবাহী মকতব প্রতিষ্ঠা।</div>\r\n</li>\r\n<li class=\"ant-timeline-item ant-timeline-item-last\">\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">অসচ্ছল পরিবারের শিশুদের বিদ্যালয় থেকে ঝরে পড়া রোধে পড়া-লেখা ও অন্যান্য আনুষঙ্গিক খরচ যোগানো।</div>\r\n</li>\r\n</ul>\r\n<h1>সেবা কার্যক্রম</h1>\r\n<ul class=\"ant-timeline\">\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">বেকারত্ব দূরীকরণে ও দারিদ্র্য বিমোচনে হস্তশিল্প, যন্ত্রশিল্প, কারিগরি, খামার ব্যবস্থাপনা প্রশিক্ষণের পাশাপাশি আত্মনির্ভরশীলতার জন্য অর্থ সহায়তা প্রদান।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">সময়ে সময়ে এবং প্রাকৃতিক দূর্যোগকালে উপদ্রুত অঞ্চলে ত্রাণ-সহায়তা প্রদান।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">চিকিৎসার ব্যয়ভার বহনে অক্ষম রোগীদের চিকিৎসা সহায়তা।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">অব্যবহৃত ওষুধ সংগ্রহ করে বিভিন্ন বুথের মাধ্যমে দুঃস্থ রোগীদের মাঝে সরবারহ করা।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">রামাদান মাসে অভাবগ্রস্তদের মধ্যে ইফতার সামগ্রী বিতরণ ও দা&rsquo;ওয়াহ এর আয়োজন।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">দুঃস্থদের মধ্যে ঈদ উপলক্ষে ফিতরা, পোশাক ও ঈদ-সামগ্রী বিতরণ।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">সচ্ছলদের পক্ষ হতে কুরবানীর আয়োজন করে দুঃস্থদের মধ্যে বিতরণ।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">দুঃস্থদের মধ্যে রিকশা, সেলাই মেশিন ইত্যাদি উপার্জন উপকরণ বিতরণ।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">সুপেয় পানির সুবিধাবঞ্চিত এলাকায় নলকূপ ও জলাধার স্থাপন।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">পরিবেশ সুরক্ষা ও স্বাবলম্বীকরণের লক্ষ্যে অভাবী পরিবার ও আবাসিক মাদরাসার আঙিনায় অধিক ফলনশীন বৃক্ষরোপণ ও পরিচর্যা।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">মাদরাসা শিক্ষার্থীদের আত্মনির্ভরশীল করার জন্য নানামুখী প্রশিক্ষণ ও সহায়তা প্রদান।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">পথশিশু ও প্রতিবন্ধীদের সহযোগিতা ও পুনর্বাসন করা।</div>\r\n</li>\r\n<li class=\"ant-timeline-item ant-timeline-item-last\">\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">বিধবাদের ব্যয়ভার গ্রহণ ও এতিমদের পরিণত হয়ে ওঠা অবধি অভিভাবকের দায়িত্ব গ্রহণপূর্বক শিক্ষাদান ও প্রতিপালন।</div>\r\n</li>\r\n</ul>\r\n<h1>দা&lsquo;ওয়াহ কার্যক্রম সমূহ</h1>\r\n<ul class=\"ant-timeline\">\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">শান্তিপূর্ণ ও কল্যাণকর সমাজ গঠনে সহায়ক আদর্শ মসজিদ নির্মাণ ও পরিচালনা।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">বিষয় বিশেষে ইসলামের দৃষ্টিভঙ্গি তুলে ধরার লক্ষ্যে বিভিন্ন এলাকার মসজিদ, মাদরাসা, জেলা অডিটরিয়াম, উপজেলা পরিষদ মিলনায়াতন, মাঠ প্রভৃতি সমাগমস্থলে সাপ্তাহিক, মাসিক, বার্ষিক ও উপলক্ষ-সাময়িক ওয়ায মাহফিল, মুক্ত মতবিনিময় এবং আলোচনাসভা আয়োজন।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">বিশুদ্ধ ইসলামিক জ্ঞান, আকীদা, কর্মনীতি ও দৃষ্টিভঙ্গি তুলে ধরে মৌলিক ও প্রমাণ্য বইপত্র প্রকাশ ও প্রচার।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">শিরক-বিদ&lsquo;আত, প্রান্তিকতা ও উগ্রপন্থা নির্মূলে উদ্যোগ গ্রহণ।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">বিষয়ভিত্তিক আলোচনা অনুষ্ঠানের তথ্যচিত্র ধারণ করে সামাজিক যোগাযোগমাধ্যমে প্রচার।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">অমুসলিমদের উদ্দেশ্যে ইসলামের শ্রেষ্ঠত্ব ও সৌন্দর্য তুলে ধরে বই রচনা, অনুবাদ, প্রকাশ ও প্রচার।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">ধর্মীয় ও সামাজিক কুসংস্কার দূরীকরণ ও অপসংস্কৃতি প্রতিরোধে নানামুখি ব্যবস্থা গ্রহণ করা।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">ফ্যামিলি কাউন্সেলিং বিভাগ পরিচালনা।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">দীনি জিজ্ঞাসা ও পরামর্শের জন্য উন্মুক্ত &lsquo;কল সেন্টার&rsquo; স্থাপন।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">মুসলিম ইয়ুথ ক্লাব প্রতিষ্ঠা।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">ইমাম ও খতীবদের জন্য দা&lsquo;ওয়াহ প্রশিক্ষণ।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">শিশু-কিশোরদের ইসলামী সংস্কৃতিকেন্দ্র নির্মান।</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">পাঠাগার প্রতিষ্ঠা।</div>\r\n</li>\r\n<li class=\"ant-timeline-item ant-timeline-item-last\">\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">শরয়ী সমাধান বিভাগ।</div>\r\n</li>\r\n</ul>', 'About/about_image-343012347.jpg', 'About/about_image-1045815795.jpg', '2023-09-01 17:56:09', '2023-09-01 17:56:09');

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

DROP TABLE IF EXISTS `activities`;
CREATE TABLE IF NOT EXISTS `activities` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bangla_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_des_eng` text COLLATE utf8mb4_unicode_ci,
  `short_des_bangla` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `title`, `bangla_title`, `short_des_eng`, `short_des_bangla`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Self-reliance Project with Zakat Funds', 'যাকাত তহবিল দিয়ে স্বনির্ভরতা প্রকল্প', '<div class=\"ant-typography\">Through the Self-Reliance Project, the As-Sunnah Foundation provides much-needed technical training and materials to the poor. The purpose of this project is to make unemployed and unskilled men and women self-reliant by providing financial assistance and necessary materials through technical training (separately) to enhance their skills.</div>\r\n<div class=\"ant-typography\">The importance of earning halal food is immense. In the Holy Qur&rsquo;an, Allah says, &lsquo;After the prayer is over, disperse in the land and seek the bounty of Allah; And remember Allah much, perhaps you may be successful. \'(Surah Jumu\'ah: verse 10)</div>\r\n<div class=\"ant-typography\">The Prophet (peace and blessings of Allaah be upon him) said, &lsquo;No one ever eats better food than the food he has earned.&rsquo; (Saheeh Bukhari, 2072)</div>\r\n<div class=\"ant-typography\">They are given technical training to help the poor in their search for halal food. In addition to acquiring skills through training, at the same time they are taught the basic tenets and rules of Islam through famous Islamic scholars so that they can acquire basic knowledge of the religion and become principled and faithful citizens. So that they can be financially self-sufficient, as well as the true servants of Allah and simultaneously live their life abiding by the rules and ethics of Islam.</div>\r\n<div class=\"ant-typography\">We think that providing training, money and materials is not enough for many to become self-sufficient. To this end, we regularly supervise, follow up, and provide necessary advice to those trained, financially supported and material-assisted people by the Foundation. In this way we play a role in creating a skilled and ethically developed working population.</div>\r\n<h5>The following programs have been implemented under the Self-reliance Project:</h5>\r\n<div class=\"ant-typography\">Distribution of rickshaws, vans, cows, goats, grocery items, fishing nets, boats, etc., to economically disadvantaged individuals in 64 districts, benefiting 2,077 people. In 2023, 2,000 rickshaws have already been distributed.</div>', '<p>স্বাবলম্বীকরণ প্রকল্পের মাধ্যমে আস-সুন্নাহ ফাউন্ডেশন দরিদ্রদেরকে প্রয়োজনীয় কারিগরি প্রশিক্ষণ ও উপকরণ-সহায়তা প্রদান করে। বেকার ও অদক্ষ নারী-পুরুষকে দক্ষতা বৃদ্ধির জন্য (আলাদাভাবে) কারিগরি প্রশিক্ষণ পূর্বক আর্থিক সহায়তা এবং প্রয়োজনীয় উপকরণ প্রদান করে আত্মনির্ভরশীল করা এ প্রকল্পের উদ্দেশ্য। হালাল রিযক উপার্জন করার গুরুত্ব অপরিসীম। পবিত্র কুরআনে আল্লাহ তা&lsquo;আলা বলেন, &lsquo;সালাত সমাপ্ত হওয়ার পর তোমরা পৃথিবীতে ছড়িয়ে পড়ো এবং আল্লাহর অনুগ্রহ অনুসন্ধান করো; আর আল্লাহকে বেশি বেশি স্মরণ করো, যাতে তোমরা সফল হতে পারো।&rsquo; (সূরা জুমু&lsquo;আহ: আয়াত-১০) রাসূলুল্লাহ সাল্লাল্লাহু আলাইহি ওয়া সাল্লাম বলেছেন, &lsquo;নিজ হাতে উপার্জিত খাদ্যের চেয়ে উত্তম খাদ্য কখনো কেউ খায় না।&rsquo; (সহীহ বুখারী-২০৭২) দরিদ্র জনগোষ্ঠীর হালাল রিযক অনুসন্ধানে সহায়তা করার মানসে তাদেরকে কারিগরি প্রশিক্ষণ দেয়া হয়। প্রশিক্ষণের মাধ্যমে দক্ষতা অর্জনের পাশাপাশি একই সময়ে তাঁরা যাতে দ্বীনের মৌলিক জ্ঞান অর্জন করতে পারেন এবং নীতিবান ও বিশ্বস্ত নাগরিক হন&mdash; এজন্য তাদেরকে প্রখ্যাত ইসলামিক স্কলারদের মাধ্যমে ইসলামের মৌলিক আকীদা ও বিধান শিক্ষাদান করা হয়। যেন তারা আর্থিকভাবেও স্বাবলম্বীও হতে পারেন, পাশাপাশি আল্লাহর খাঁটি বান্দা নীতি-নৈতিকতায় বলীয়ান হিসেবে জীবন যাপন করতে পারেন। আমরা মনে করি&mdash; শুধু প্রশিক্ষণ, অর্থ ও উপকরণ-সহায়তা প্রদান অনেকের ক্ষেত্রে স্বাবলম্বিতা অর্জনের জন্য যথেষ্ট নয়। এজন্য আমরা ফাউন্ডেশনের অধীনে প্রশিক্ষিত, আর্থিক ও উপকরণ-সহায়তাপ্রাপ্তদের নিয়মিত তত্ত্বাবধান করি, খোঁজ-খবর রাখি এবং প্রয়োজনীয় পরামর্শ দিয়ে থাকি। এভাবে আমরা নৈতিকতা সম্পন্ন সুদক্ষ কর্মজীবী জনগোষ্ঠী তৈরিতে ভূমিকা রাখি। এই প্রকল্পের আওতায় এ যাবৎ যেসব কার্যক্রম পরিচালিত হয়েছে: স্বাবলম্বীকরণ প্রকল্পের আওতায় আস-সুন্নাহ ফাউন্ডেশন এ পর্যন্ত ৬৪ জেলায় ২ হাজার ৭৭ জন অসহায় নারী-পুরুষকে প্রশিক্ষণ-পূর্বক রিকশা, ভ্যান, গরু, ছাগল, মুদি মালামাল, মাছ ধরার জাল, নৌকা, ইত্যাদি উপার্জন-উপকরণ প্রদান করেছে। এর মধ্যে ২০২৩ সালেই ২ হাজার রিকশা বিতরণ করা হয়েছে।</p>', 'activity/activity_img/202309031129carity(1).jpg', 1, '2023-08-30 23:29:46', '2023-09-03 05:29:16'),
(3, 'Distribution1 of relief to flood victims', 'বন্যার্তদের1 মধ্যে ত্রাণ বিতরণ', '<div class=\"ant-typography\">Every1 year, during the monsoon season, approximately 26,000 square kilometers of Bangladesh\'s land area is submerged due to flooding. At this time, the people living in the northern regions of the country are particularly vulnerable and suffer greatly. In response to this, the As-Sunnah Foundation has been actively engaged in providing relief and support to the affected and vulnerable communities in the flood-affected districts.</div>\r\n<div class=\"ant-typography\">The importance and virtue of standing by the side of a distressed and needy person are significant. Abu Huraira (may Allah be pleased with him) narrated that the Messenger of Allah (peace be upon him) said, \'Whoever relieves the hardship of a believer in this world, Allah will relieve his hardship on the Day of Resurrection. Whoever helps ease someone in difficulty, Allah will make it easy for him in this world and in the Hereafter. Allah helps the servant as long as he helps his brother.\' (Sunan Tirmidhi, Hadith-2945)</div>\r\n<div class=\"ant-typography\">In this context, opportunities are created to stand by the side of the needy and distressed, and by acting upon the above Hadith, one can extend their assistance to others.</div>\r\n<div class=\"ant-typography\">The support provided includes essential supplies such as rice, lentils, oil, potatoes, clothes, candles, matches, gas stoves, water purification tablets, and other necessary equipment.</div>\r\n<div class=\"ant-typography\">As part of this project, in addition to distributing 1,032 metric tons of food supplies in the fearful floods of 2022, the foundation also distributed milk and fodder for the cattle, as well as 105 cows for distribution among the flood-affected people during Eid-ul-Adha. Moreover, 959 families were assisted in building homes, and 996 affected farmers received financial support of BDT 5,000 each.</div>', '<div class=\"ant-typography\">প্রতি1 বছর বর্ষাকালে বাংলাদেশের প্রায় ২৬,০০০ বর্গ কিলোমিটার এলাকা বন্যায় প্লাবিত হয়। এসময় বিশেষভাবে দেশের উত্তরাঞ্চলের বানভাসি মানুষ চরম দুর্ভোগের শিকার হন। আস সুন্নাহ ফাউন্ডেশন দেশের বন্যাকবলিত জেলাগুলোতে প্রতি বছরই ত্রাণ কার্যক্রম ও দুর্দশাগ্রস্ত-অসহায় মানুষের পাশে দাঁড়ানোর উদ্যোগ নিয়ে থাকে।</div>\r\n<div class=\"ant-typography\">দুর্দশাগ্রস্ত মানুষের পাশে দাঁড়ানোর গুরুত্ব ও ফযীলত অনেক বেশি। আবু হুরায়রা (রা.) থেকে বর্ণিত, তিনি বলেন, রাসূলুল্লাহ (সাল্লাল্লাহু আলাইহি ওয়া সাল্লাম) বলেছেন, &lsquo;যে ব্যক্তি কোনো অভাবীর কষ্ট দূর করবেন, আল্লাহ তা&lsquo;আলা ইহকালে ও পরকালে তার কষ্ট দূর করে দেবেন। ততক্ষণ পর্যন্ত আল্লাহ তা&lsquo;আলা বান্দার সহায়তা করতে থাকেন, যতক্ষণ পর্যন্ত সে তার কোনো ভাইয়ের সাহায্যে নিয়োজিত থাকে।&rsquo; (সুনান তিরমিযী, হাদীস-২৯৪৫)</div>\r\n<div class=\"ant-typography\">এই কার্যক্রমের আওতায় অভাবী ও দুর্দশাগ্রস্ত মানুষের পাশে দাঁড়ানোর সুযোগ তৈরি হয় এবং উপরিউক্ত হাদীসের ওপর আমল হয়।</div>\r\n<div class=\"ant-typography\">ত্রাণ সামগ্রীর মধ্যে উল্লেখযোগ্য হলো&mdash; চাল, ডাল, তেল, আলু, চিড়া, মোমবাতি, গ্যাস লাইটার, খাবার স্যালাইন এবং পানি বিশুদ্ধকরণ ট্যাবলেটসহ প্রয়োজনীয় উপকরণ।</div>\r\n<div class=\"ant-typography\">বন্যায় ত্রাণ বিতরণ প্রকল্পের আওতায় শুধু ২০২২ সালের ভয়াবহ বন্যায় ১ হাজার ৩২ মেট্রিক টন খাদ্যসামগ্রীর পাশাপাশি শিশুখাদ্য ও গবাদি পশুর জন্য খৈল-ভূসি বিতরণ করা হয়েছে। একই বছর ঈদুল আযহায় ১০৫ টি গরু জবাই করে বন্যার্তদের মধ্যে গোশত বিতরণ করা হয়। বন্যা পরবর্তী পুনর্বাসনের অংশ হিসেবে ৯৫৯ পরিবারকে ঘর নির্মাণ করে দেয়া হয় এবং ৯৯৬ জন ক্ষতিগ্রস্ত কৃষককে নগদ ৫ হাজার টাকা করে প্রদান করা হয়।</div>', 'activity/activity_img/202309031126relief-distribution-flood-chattogram-2023.jpeg', 1, '2023-08-30 23:35:17', '2023-09-03 05:26:16'),
(2, 'Qurbani (Sacrificing animals) for all', 'সবার জন্য কুরবানী', '<div class=\"ant-typography\">Qurbani for all is part of the regular humanitarian activities of the As-Sunnah Foundation. Since its inception, the Foundation has been conducting sacrificial activities on behalf of pious rich people among the poor.</div>\r\n<div class=\"ant-typography\">Most of the sacrifices are usually city-centric. But more poor people live in villages. It is doubtful whether the number of cows sacrificed in a multi-storey building in the city is the same as in a few villages. Through the Sacrifice for All project, the As-Sunnah Foundation delivers a portion of the sacrifices of the urban rich to the underprivileged poor in remote areas.</div>\r\n<div class=\"ant-typography\">Foundation volunteers assist the Foundation in implementing projects at the field level.</div>\r\n<div class=\"ant-typography\">Note that the meat is distributed among the poor by sacrificing one goat in full and one-seventh of a cow in full.</div>\r\n<div class=\"ant-typography\">So far, under this project, 1,167 cows and goats have been sacrificed and the meat distributed among the destitute in various regions of the country.</div>\r\n<div class=\"ant-typography\">Additionally, frozen meat is collected from Dhaka and distributed to the needy people living in the farthest corners of the country through the use of refrigerated vehicles.</div>', '<div class=\"ant-typography\">সবার জন্য কুরবানী আস-সুন্নাহ ফাউন্ডেশনের মানবসেবামূলক নিয়মিত কার্যক্রমের অংশ। প্রতিষ্ঠার পর থেকেই থেকেই ফাউন্ডেশন দীনদার ধনীদের পক্ষ থেকে গরিব জনগোষ্ঠীর মধ্যে কুরবানী কার্যক্রম পরিচালনা করে আসছে।</div>\r\n<div class=\"ant-typography\">সাধারণত বেশি সংখ্যক কুরবানী হয়ে থাকে শহর-কেন্দ্রিক। অথচ অধিক সংখ্যক গরিব বাস করে গ্রামে। শহরের একটি বহুতল ভবনে যত সংখ্যক গরু কুরবানী হয়ে থাকে, এই পরিমাণ গরু কুরবানী কয়েকটি গ্রামেও হয় কি না&mdash; যথেষ্ট সন্দেহ রয়েছে। সবার জন্য কুরবানী প্রকল্পের মাধ্যমে আস-সুন্নাহ ফাউন্ডেশন শহুরে ধনীদের কুরবানীর একটা অংশ প্রত্যন্ত অঞ্চলের সুবিধা-বঞ্চিত দরিদ্র জনগোষ্ঠীর নিকট পৌঁছে দেয়।</div>\r\n<div class=\"ant-typography\">মাঠ পর্যায়ে প্রকল্প বাস্তবয়নে ফাউন্ডেশনকে ফাউন্ডেশনের স্বেচ্ছাসেবীগণ সহয়তা করেন।</div>\r\n<div class=\"ant-typography\">উল্লেখ্য, একটি ছাগল পূর্ণাঙ্গভাবে একজনের পক্ষ থেকে এবং একটি গরুর এক সপ্তমাংশ পূর্ণাঙ্গভাবে একজনের পক্ষ থেকে কুরবানী করে গোশত গরিবদের মধ্যে বণ্টন করা হয়।</div>\r\n<div class=\"ant-typography\">এই প্রকল্পের আওতায় এখন পর্যন্ত দেশের বিভিন্ন অঞ্চলে ১ হাজার ১৬৭ টি গরু-ছাগল কুরবানী করে দুস্থদের মধ্যে গোশত বিতরণ করা হয়েছে।</div>\r\n<div class=\"ant-typography\">এছাড়াও ঢাকা থেকে গোশত সংগ্রহ করে ফ্রোজেন গাড়ির মাধ্যমে প্রত্যন্ত অঞ্চলের গরিবদের মাধ্যমে বিতরণ করা হয়।</div>', 'activity/activity_img/202309031128charityPr.jpg', 1, '2023-08-30 23:33:32', '2023-09-03 05:28:58');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
CREATE TABLE IF NOT EXISTS `appointments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `service_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `select_time` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

DROP TABLE IF EXISTS `appointment_infos`;
CREATE TABLE IF NOT EXISTS `appointment_infos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details1` longtext COLLATE utf8mb4_unicode_ci,
  `details2` longtext COLLATE utf8mb4_unicode_ci,
  `details3` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointment_infos`
--

INSERT INTO `appointment_infos` (`id`, `title`, `details1`, `details2`, `details3`, `created_at`, `updated_at`) VALUES
(1, 'Protect Your Health With Our Health Package', '<p>There are many variations of passages of Lorem Ipsum amets avoilble but majority have suffered alteration in some form, by injected humour or randomise words which don\'t sure amet consec tetur adicing.</p>', '<h3>Good People Work</h3>\r\n<p>Vestibulum ac diam sit amet quam vehicula elemen tum sed sit amet dui praesent sapien pellen tesque .</p>', '<h3>Live Healthy Life</h3>\r\n<p>Vestibulum ac diam sit amet quam vehicula elemen tum sed sit amet dui praesent sapien pellen tesque.</p>', '2023-05-31 04:32:53', '2023-05-31 05:28:35');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `short_details`, `image`, `created_at`, `updated_at`) VALUES
(4, 'Start to learning today2', 'Explore Interests and Career With Courses2', 'website-banner/banner-295804695.jpg', '2023-06-07 23:07:58', '2023-06-07 23:20:00'),
(5, 'Start to learning today1', 'Explore Interests and Career With Courses1', 'website-banner/banner-917415904.jpg', '2023-06-07 23:11:43', '2023-06-07 23:19:45'),
(6, 'bove title listings everywhere they appear in Edelweiss when users have', 'bove title listings everywhere they appear in Edelweiss when users havebove title listings everywhere they appear in Edelweiss when users have', 'website-banner/banner-869762477.jpg', '2023-08-29 03:40:33', '2023-08-29 03:40:33');

-- --------------------------------------------------------

--
-- Table structure for table `banner_and_titles`
--

DROP TABLE IF EXISTS `banner_and_titles`;
CREATE TABLE IF NOT EXISTS `banner_and_titles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `page` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci,
  `short_details` text COLLATE utf8mb4_unicode_ci,
  `main_image` text COLLATE utf8mb4_unicode_ci,
  `banner_image` text COLLATE utf8mb4_unicode_ci,
  `details_image1` text COLLATE utf8mb4_unicode_ci,
  `details_image2` text COLLATE utf8mb4_unicode_ci,
  `details_image3` text COLLATE utf8mb4_unicode_ci,
  `details1` longtext COLLATE utf8mb4_unicode_ci,
  `details2` longtext COLLATE utf8mb4_unicode_ci,
  `add_home` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1= active; 0=deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

DROP TABLE IF EXISTS `consultancies`;
CREATE TABLE IF NOT EXISTS `consultancies` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `banner_image` text COLLATE utf8mb4_unicode_ci,
  `details_image1` text COLLATE utf8mb4_unicode_ci,
  `details_image2` text COLLATE utf8mb4_unicode_ci,
  `details_image3` text COLLATE utf8mb4_unicode_ci,
  `details1` longtext COLLATE utf8mb4_unicode_ci,
  `details2` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultancies`
--

INSERT INTO `consultancies` (`id`, `banner_image`, `details_image1`, `details_image2`, `details_image3`, `details1`, `details2`, `created_at`, `updated_at`) VALUES
(1, 'consultancy/consultancy_banner_image-1675148363.jpg', 'consultancy/consultancy_details_image-1273101043.jpg', 'consultancy/consultancy_details_image-661757760.jpg', 'consultancy/consultancy_details_image-375049347.jpg', '<h4>Educavo Course Details</h4>\r\n<p>Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. Quisque tincidunt laoreet malesuada. Cum sociis natoque penatibus...</p>', '<p>Eleifend euismod pellentesque vel Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. Quisque tincidunt laoreet malesuada. Cum sociis natoque penatibus.</p>\r\n<h3>What you&rsquo;ll learn?</h3>\r\n<ul class=\"review-list\">\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Sed consequat justo non mauris pretium at tempor justo.</li>\r\n<li>Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Sed consequat justo non mauris pretium at tempor justo.</li>\r\n<li>Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo</li>\r\n<li>Phasellus enim magna, varius et commodo ut..</li>\r\n</ul>\r\n<h3>Requirements</h3>\r\n<ul class=\"review-list\">\r\n<li>Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo</li>\r\n<li>Ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel.</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Varius et commodo ut, ultricies vitae velit. Ut nulla tellus.</li>\r\n<li>Phasellus enim magna, varius et commodo ut..</li>\r\n</ul>', '2023-06-11 23:32:10', '2023-06-11 23:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `counters`
--

DROP TABLE IF EXISTS `counters`;
CREATE TABLE IF NOT EXISTS `counters` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `incon_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incon_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incon_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `incon_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `value_4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `incon_1`, `title_1`, `value_1`, `incon_2`, `title_2`, `value_2`, `incon_3`, `title_3`, `value_3`, `incon_4`, `title_4`, `value_4`, `status`, `created_at`, `updated_at`) VALUES
(1, 'pe-7s-smile', 'Projects done', '126', 'pe-7s-rocket', 'Happy clients', '212', 'pe-7s-add-user', 'Cups of coffee', '134', 'pe-7s-global', 'Photos taken', '179', 1, '2023-08-22 04:06:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `donates`
--

DROP TABLE IF EXISTS `donates`;
CREATE TABLE IF NOT EXISTS `donates` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bangla_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_des1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `short_des2` text COLLATE utf8mb4_unicode_ci,
  `long_des1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `long_des2` text COLLATE utf8mb4_unicode_ci,
  `long_des3` text COLLATE utf8mb4_unicode_ci,
  `short_des_bangla1` text COLLATE utf8mb4_unicode_ci,
  `short_des_bangla2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `long_des_bangla1` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `long_des_bangla2` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `long_des_bangla3` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donates`
--

INSERT INTO `donates` (`id`, `title`, `bangla_title`, `short_des1`, `short_des2`, `long_des1`, `long_des2`, `long_des3`, `short_des_bangla1`, `short_des_bangla2`, `long_des_bangla1`, `long_des_bangla2`, `long_des_bangla3`, `image`, `video_link`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Zakat Fund', 'যাকাত ফান্ড', '<p>Your Zakat has the power to transform lives, from sheltering those who have no home,&nbsp;</p>', '<div class=\"ant-typography\">Your Zakat has the power to transform lives, from sheltering those who have no home,&nbsp;</div>', '<article class=\"ant-typography\">\n<div class=\"ant-typography\">\n<div class=\"ant-typography\">Zakat is a promise that we must fulfill to help those in need. The law of zakat establishes the rights of the poor to support and help. For every sane, adult Muslim who owns wealth over a certain amount&ndash;known as the &lsquo;Nisab&rsquo; &ndash; he or she must pay 2.5% of that wealth as zakat. When you pay zakat you don&rsquo;t just full fill your obligation but also create smile and give them comfort to those struggling to survive.</div>\n<div class=\"ant-typography\">Let&rsquo;s Create Smile Together:</div>\n<div class=\"ant-typography\">The compulsory alms are only for the poor and the needy and the agents employed therein and those whose hearts are to be conciliated and those in bondage and debtors and for expenditure in the way of Allah and for the wayfarer: an ordinance from Allah:and Allah is Knowing, Wise.</div>\n</div>\n</article>', '<div class=\"ant-typography\">Zakat is a promise that we must fulfill to help those in need. The law of zakat establishes the rights of the poor to support and help. For every sane, adult Muslim who owns wealth over a certain amount&ndash;known as the &lsquo;Nisab&rsquo; &ndash; he or she must pay 2.5% of that wealth as zakat. When you pay zakat you don&rsquo;t just full fill your obligation but also create smile and give them comfort to those struggling to survive.</div>\r\n<div class=\"ant-typography\">Let&rsquo;s Create Smile Together:</div>\r\n<div class=\"ant-typography\">The compulsory alms are only for the poor and the needy and the agents employed therein and those whose hearts are to be conciliated and those in bondage and debtors and for expenditure in the way of Allah and for the wayfarer: an ordinance from Allah:and Allah is Knowing, Wise.</div>', '<div class=\"ant-typography\">Zakat is a promise that we must fulfill to help those in need. The law of zakat establishes the rights of the poor to support and help. For every sane, adult Muslim who owns wealth over a certain amount&ndash;known as the &lsquo;Nisab&rsquo; &ndash; he or she must pay 2.5% of that wealth as zakat. When you pay zakat you don&rsquo;t just full fill your obligation but also create smile and give them comfort to those struggling to survive.</div>\r\n<div class=\"ant-typography\">Let&rsquo;s Create Smile Together:</div>\r\n<div class=\"ant-typography\">The compulsory alms are only for the poor and the needy and the agents employed therein and those whose hearts are to be conciliated and those in bondage and debtors and for expenditure in the way of Allah and for the wayfarer: an ordinance from Allah:and Allah is Knowing, Wise.</div>', '<div class=\"ant-typography\">যাকাত বিশ্ব পরিবর্তন করতে পারে:</div>\n<div class=\"ant-typography\">যাকাত হল একটি প্রতিশ্রুতি যা দ্বারা অসহায় ও অভাবীদের সহায়তা করে তাদের অবস্থা পরিবর্তন করার জন্য তাদের পাশে দাঁড়াতে হবে।</div>', '<div class=\"ant-typography\">যাকাত বিশ্ব পরিবর্তন করতে পারে:</div>\r\n<div class=\"ant-typography\">যাকাত হল একটি প্রতিশ্রুতি যা দ্বারা অসহায় ও অভাবীদের সহায়তা করে তাদের অবস্থা পরিবর্তন করার জন্য তাদের পাশে দাঁড়াতে হবে। যাকাতের এই বিধান গরিবদের হক ও অধিকার প্রতিষ্ঠা করার জন্য আল্লাহ&nbsp;</div>', '<article class=\"ant-typography\">\r\n<div class=\"ant-typography\">২০১৬ সাল থেকে আমরা সারা দেশে মানবিক ও টেকসই সহায়তা সরবরাহ করে আসছি।</div>\r\n<div class=\"ant-typography\">যাকাত প্রদানে যে খাত গুলোকে আমরা গুরত্ব দেই:</div>\r\n</article>\r\n<ul class=\"ant-timeline\">\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">বিধবা ও দরিদ্র শিশুদের স্বাবলম্বী করা</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">অভাবীদের সহায়তা প্রদান</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">জরুরী চিকিৎসা সহায়তা সরবাহ</div>\r\n</li>\r\n<li class=\"ant-timeline-item ant-timeline-item-last\">\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">দক্ষ জনবল তৈরির প্রশিক্ষন প্রদান করে তাদের উপার্জনক্ষম করা</div>\r\n</li>\r\n</ul>\r\n<article class=\"ant-typography\">\r\n<div class=\"ant-typography\">যাকাত গণনা</div>\r\n<div class=\"ant-typography\">যাকাত শব্দের অর্থ পরিচ্ছন্নতা। নিজের আয় থেকে একটি নির্দিষ্ট অংশ কম সৌভাগ্যবান মানুষকে দান করে আল্লাহ সুবহানাহু ওয়া তায়ালাকে সন্তুষ্ট করার পাশাপাশি দেশজুড়ে অসহায় ভাই-বোনদের মুখে হাসি ফোটাতে পারেন। যাকাত দিয়ে আপনি বাঁচাতে পারেন কারো জীবন, ফোটাতে পারেন তার প্রিয়জনের মুখে হাসি। হতে পারেন কারো বিপদের বন্ধু। ফিকহ অনুসারে নিসাব পরিমাপ করা হয়ে থাকে, এই পরিমাণ হচ্ছে ৭.৫ তোলা স্বর্ণ (৬১২.৩৬ গ্রাম) কিংবা ৫২.৫ তোলা (৮৭.৪৮ গ্রাম) রৌপ্য অথবা সমপরিমাণ অর্থ।</div>\r\n</article>', '<div class=\"ant-typography\">যাকাত বিশ্ব পরিবর্তন করতে পারে:</div>\r\n<div class=\"ant-typography\">যাকাত হল একটি প্রতিশ্রুতি যা দ্বারা অসহায় ও অভাবীদের সহায়তা করে তাদের অবস্থা পরিবর্তন করার জন্য তাদের পাশে দাঁড়াতে হবে। যাকাতের এই বিধান গরিবদের হক ও অধিকার প্রতিষ্ঠা করার জন্য আল্লাহ নাযিল করেছেন। প্রতিটি বিবেকবান, প্রাপ্তবয়স্ক মুসলমান যিনি নির্দিষ্ট পরিমাণে ধন-সম্পদের মালিক - যা &lsquo;নিসাব&rsquo; নামে পরিচিত তাকে অবশ্যই তার সম্পদের ২.৫% যাকাত হিসাবে দিতে হবে। যাকাত প্রদান করার মাধ্যমে আপনি কেবল নিজের দায়বদ্ধতাই পূর্ণ করেন না বরং একটি মলিন মুখে হাসি তৈরি করেন এবং তাদের বেঁচে থাকার লড়াইয়ে অনুপ্রেরনা প্রদান করেন।</div>\r\n<div class=\"ant-typography\">আসুন একসাথে হাসি ফোটাই:</div>\r\n<div class=\"ant-typography\">যাকাত হল কেবল ফকির, মিসকীন, যাকাত আদায় কারী ও যাদের চিত্ত আকর্ষণ প্রয়োজন তাদের হক এবং তা দাস-মুক্তির জন্যে-ঋণ গ্রস্তদের জন্য, আল্লাহর পথে জেহাদকারীদের জন্যে এবং মুসাফিরদের জন্যে, এই হল আল্লাহর নির্ধারিত বিধান। আল্লাহ সর্বজ্ঞ, প্রজ্ঞাময়।</div>\r\n<div class=\"ant-typography\">সুরা আত-তাওবা - ৯:৬০</div>\r\n<div class=\"ant-typography\">মহান আল্লাহ পবিত্র কুরআনে সুস্পষ্টভাবে যাকাত কিভাবে বিতরণ করতে হবে তা উল্লেখ করেছেন। আল কুরআন ও হাদিসের গাইডলাইন অনুসারে আস-সুন্নাহ ফাউন্ডেশন, যারা হত দরিদ্র এবং অসহায় তাদের নিকট আপনাদের প্রদান করা যাকাত বিতরণ করে। বেশিরভাগ আলেমগণ ও ফকীহগন এই ব্যাপারে একমত যে যাকাত গ্রহণের জন্য দরিদ্র ও অভাবী লোকেরা সবচেয়ে বেশি উপযোগী। আমাদের প্রতিষ্ঠিত এইড চেইন, দক্ষ টীম, নিরলস প্রচেষ্টা এবং দীর্ঘ দিনের অভিজ্ঞতা আপনার যাকাতকে সবচেয়ে উপযুক্ত লোকের কাছে পৌঁছে দিতে সক্ষম এবং যারা যাকাত গ্রহন করছেন তাদের সুন্দর একটি ভবিষ্যত নিশ্চিত করতে নিরলস কাজ করি।</div>', '<div class=\"ant-typography\">যাকাত বিশ্ব পরিবর্তন করতে পারে:</div>\r\n<div class=\"ant-typography\">যাকাত হল একটি প্রতিশ্রুতি যা দ্বারা অসহায় ও অভাবীদের সহায়তা করে তাদের অবস্থা পরিবর্তন করার জন্য তাদের পাশে দাঁড়াতে হবে। যাকাতের এই বিধান গরিবদের হক ও অধিকার প্রতিষ্ঠা করার জন্য আল্লাহ নাযিল করেছেন। প্রতিটি বিবেকবান, প্রাপ্তবয়স্ক মুসলমান যিনি নির্দিষ্ট পরিমাণে ধন-সম্পদের মালিক - যা &lsquo;নিসাব&rsquo; নামে পরিচিত তাকে অবশ্যই তার সম্পদের ২.৫% যাকাত হিসাবে দিতে হবে। যাকাত প্রদান করার মাধ্যমে আপনি কেবল নিজের দায়বদ্ধতাই পূর্ণ করেন না বরং একটি মলিন মুখে হাসি তৈরি করেন এবং তাদের বেঁচে থাকার লড়াইয়ে অনুপ্রেরনা প্রদান করেন।</div>\r\n<div class=\"ant-typography\">আসুন একসাথে হাসি ফোটাই:</div>\r\n<div class=\"ant-typography\">যাকাত হল কেবল ফকির, মিসকীন, যাকাত আদায় কারী ও যাদের চিত্ত আকর্ষণ প্রয়োজন তাদের হক এবং তা দাস-মুক্তির জন্যে-ঋণ গ্রস্তদের জন্য, আল্লাহর পথে জেহাদকারীদের জন্যে এবং মুসাফিরদের জন্যে, এই হল আল্লাহর নির্ধারিত বিধান। আল্লাহ সর্বজ্ঞ, প্রজ্ঞাময়।</div>\r\n<div class=\"ant-typography\">সুরা আত-তাওবা - ৯:৬০</div>\r\n<div class=\"ant-typography\">মহান আল্লাহ পবিত্র কুরআনে সুস্পষ্টভাবে যাকাত কিভাবে বিতরণ করতে হবে তা উল্লেখ করেছেন। আল কুরআন ও হাদিসের গাইডলাইন অনুসারে আস-সুন্নাহ ফাউন্ডেশন, যারা হত দরিদ্র এবং অসহায় তাদের নিকট আপনাদের প্রদান করা যাকাত বিতরণ করে। বেশিরভাগ আলেমগণ ও ফকীহগন এই ব্যাপারে একমত যে যাকাত গ্রহণের জন্য দরিদ্র ও অভাবী লোকেরা সবচেয়ে বেশি উপযোগী। আমাদের প্রতিষ্ঠিত এইড চেইন, দক্ষ টীম, নিরলস প্রচেষ্টা এবং দীর্ঘ দিনের অভিজ্ঞতা আপনার যাকাতকে সবচেয়ে উপযুক্ত লোকের কাছে পৌঁছে দিতে সক্ষম এবং যারা যাকাত গ্রহন করছেন তাদের সুন্দর একটি ভবিষ্যত নিশ্চিত করতে নিরলস কাজ করি।</div>', 'donation/donate_img/202309021644sadaqah.jpg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/mdSfg8qO8ts?si=sqbZtyqqbIzBYGg9\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, '2023-08-29 22:24:28', '2023-09-02 10:44:39'),
(2, 'As-Sunnah Foundation Masjid Complex', 'আস-সুন্নাহ ফাউন্ডেশন মসজিদ কমপ্লেক্স', '<p>Your Zakat has the power to transform lives, from sheltering those who have no home,&nbsp;</p>', '<p>Your Zakat has the power to transform lives, from sheltering those who have no home,&nbsp;</p>', '<p>The As-Sunnah Foundation Masjid Complex will be the focal point of the multi-faceted activities of the As-Sunnah Foundation for the welfare of the country, nation and ummah. In-Sha-Allah it will be the center of various humanitarian and public welfare projects, including an ideal mosque, a modern madrasah with an integrated syllabus aimed at creating an Islamic scholar to meet the needs of the age.</p>', '<article class=\"ant-typography\">\n<div class=\"ant-typography\">\n<div class=\"ant-typography\">Zakat is a promise that we must fulfill to help those in need. The law of zakat establishes the rights of the poor to support and help. For every sane, adult Muslim who owns wealth over a certain amount&ndash;known as the &lsquo;Nisab&rsquo; &ndash; he or she must pay 2.5% of that wealth as zakat. When you pay zakat you don&rsquo;t just full fill your obligation but also create smile and give them comfort to those struggling to survive.</div>\n<div class=\"ant-typography\">Let&rsquo;s Create Smile Together:</div>\n<div class=\"ant-typography\">The compulsory alms are only for the poor and the needy and the agents employed therein and those whose hearts are to be conciliated and those in bondage and debtors and for expenditure in the way of Allah and for the wayfarer: an ordinance from Allah:and Allah is Knowing, Wise.</div>\n</div>\n</article>', '<article class=\"ant-typography\">\n<div class=\"ant-typography\">\n<div class=\"ant-typography\">Zakat is a promise that we must fulfill to help those in need. The law of zakat establishes the rights of the poor to support and help. For every sane, adult Muslim who owns wealth over a certain amount&ndash;known as the &lsquo;Nisab&rsquo; &ndash; he or she must pay 2.5% of that wealth as zakat. When you pay zakat you don&rsquo;t just full fill your obligation but also create smile and give them comfort to those struggling to survive.</div>\n<div class=\"ant-typography\">Let&rsquo;s Create Smile Together:</div>\n<div class=\"ant-typography\">The compulsory alms are only for the poor and the needy and the agents employed therein and those whose hearts are to be conciliated and those in bondage and debtors and for expenditure in the way of Allah and for the wayfarer: an ordinance from Allah:and Allah is Knowing, Wise.</div>\n</div>\n</article>', '<div class=\"ant-typography\">যাকাত বিশ্ব পরিবর্তন করতে পারে:</div>\n<div class=\"ant-typography\">যাকাত হল একটি প্রতিশ্রুতি যা দ্বারা অসহায় ও অভাবীদের সহায়তা করে তাদের অবস্থা পরিবর্তন করার জন্য তাদের পাশে দাঁড়াতে হবে।</div>', '<div class=\"ant-typography\">যাকাত বিশ্ব পরিবর্তন করতে পারে:</div>\n<div class=\"ant-typography\">যাকাত হল একটি প্রতিশ্রুতি যা দ্বারা অসহায় ও অভাবীদের সহায়তা করে তাদের অবস্থা পরিবর্তন করার জন্য তাদের পাশে দাঁড়াতে হবে।</div>', '<p>আস-সুন্নাহ ফাউন্ডেশন মসজিদ কমপ্লেক্স দেশ, জাতি ও উম্মাহর কল্যাণে আস-সুন্নাহ ফাউন্ডেশনের বহুমুখী কার্যক্রমের কেন্দ্রবিন্দু তে পরিণত হবে। যুগের চাহিদা মেটাতে একজন ইসলামী পণ্ডিত তৈরির লক্ষ্যে একটি সমন্বিত সিলেবাসসহ একটি আদর্শ মসজিদ, একটি আধুনিক মাদ্রাসাসহ বিভিন্ন মানবিক ও জনকল্যাণমূলক প্রকল্পের কেন্দ্র বিন্দু হবে ইনশাআল্লাহ।</p>', '<p>আস-সুন্নাহ ফাউন্ডেশন মসজিদ কমপ্লেক্স দেশ, জাতি ও উম্মাহর কল্যাণে আস-সুন্নাহ ফাউন্ডেশনের বহুমুখী কার্যক্রমের কেন্দ্রবিন্দু তে পরিণত হবে। যুগের চাহিদা মেটাতে একজন ইসলামী পণ্ডিত তৈরির লক্ষ্যে একটি সমন্বিত সিলেবাসসহ একটি আদর্শ মসজিদ, একটি আধুনিক মাদ্রাসাসহ বিভিন্ন মানবিক ও জনকল্যাণমূলক প্রকল্পের কেন্দ্র বিন্দু হবে ইনশাআল্লাহ।</p>', '<p>আস-সুন্নাহ ফাউন্ডেশন মসজিদ কমপ্লেক্স দেশ, জাতি ও উম্মাহর কল্যাণে আস-সুন্নাহ ফাউন্ডেশনের বহুমুখী কার্যক্রমের কেন্দ্রবিন্দু তে পরিণত হবে। যুগের চাহিদা মেটাতে একজন ইসলামী পণ্ডিত তৈরির লক্ষ্যে একটি সমন্বিত সিলেবাসসহ একটি আদর্শ মসজিদ, একটি আধুনিক মাদ্রাসাসহ বিভিন্ন মানবিক ও জনকল্যাণমূলক প্রকল্পের কেন্দ্র বিন্দু হবে ইনশাআল্লাহ।</p>', 'donation/donate_img/202308291119assunnah-complex.jpg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/mdSfg8qO8ts?si=sqbZtyqqbIzBYGg9\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, '2023-08-29 05:19:15', NULL),
(4, 'General Fund', 'সাধারণ তহবিল', '<p>f someone donates to a specific sector, the As-Sunnah Foundation spends it in that sector.&nbsp;</p>', '<div class=\"ant-typography\">f someone donates to a specific sector, the As-Sunnah Foundation spends it in that sector.</div>', '<p>f someone donates to a specific sector, the As-Sunnah Foundation spends it in that sector. The general fund is spent on every charitable activity of As- Sunnah Foundation. Also, the expenditure of different activities such as religious education of As -Sunnah humanitarian services and dawah activities related total initiatives is met from the general fund.</p>\r\n<p>f someone donates to a specific sector, the As-Sunnah Foundation spends it in that sector. The general fund is spent on every charitable activity of As- Sunnah Foundation. Also, the expenditure of different activities such as religious education of As -Sunnah humanitarian services and dawah activities related total initiatives is met from the general fund.</p>', '<p>f someone donates to a specific sector, the As-Sunnah Foundation spends it in that sector. The general fund is spent on every charitable activity of As- Sunnah Foundation. Also, the expenditure of different activities such as religious education of As -Sunnah humanitarian services and dawah activities related total initiatives is met from the general fund.f someone donates to a specific sector, the As-Sunnah Foundation spends it in that sector. The general fund is spent on every charitable activity of As- Sunnah Foundation. Also, the expenditure of different activities such as religious education of As -Sunnah humanitarian services and dawah activities related total initiatives is met from the general fund.</p>', '<p>f someone donates to a specific sector, the As-Sunnah Foundation spends it in that sector. The general fund is spent on every charitable activity of As- Sunnah Foundation. Also, the expenditure of different activities such as religious education of As -Sunnah humanitarian services and dawah activities related total initiatives is met from the general fund.f someone donates to a specific sector, the As-Sunnah Foundation spends it in that sector. The general fund is spent on every charitable activity of As- Sunnah Foundation. Also, the expenditure of different activities such as religious education of As -Sunnah humanitarian services and dawah activities related total initiatives is met from the general fund.</p>', '<div class=\"ant-typography\">যাকাত হল একটি প্রতিশ্রুতি যা দ্বারা অসহায় ও অভাবীদের সহায়তা করে তাদের অবস্থা পরিবর্তন করার জন্য তাদের পাশে দাঁড়াতে হবে।</div>', '<div class=\"ant-typography\">&nbsp;</div>\r\n<div class=\"ant-typography\">যাকাত হল কেবল ফকির, মিসকীন, যাকাত আদায় কারী ও যাদের চিত্ত আকর্ষণ প্রয়োজন তাদের হক এবং তা দাস-মুক্তির জন্যে-ঋণ গ্রস্তদের জন্য, আল্লাহর পথে জেহাদকারীদের জন্যে এবং মুসাফিরদের জন্যে,&nbsp;</div>', '<article class=\"ant-typography\">\r\n<div class=\"ant-typography\">২০১৬ সাল থেকে আমরা সারা দেশে মানবিক ও টেকসই সহায়তা সরবরাহ করে আসছি।</div>\r\n<div class=\"ant-typography\">যাকাত প্রদানে যে খাত গুলোকে আমরা গুরত্ব দেই:</div>\r\n</article>\r\n<ul class=\"ant-timeline\">\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">বিধবা ও দরিদ্র শিশুদের স্বাবলম্বী করা</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">অভাবীদের সহায়তা প্রদান</div>\r\n</li>\r\n<li class=\"ant-timeline-item\">\r\n<div class=\"ant-timeline-item-tail\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">জরুরী চিকিৎসা সহায়তা সরবাহ</div>\r\n</li>\r\n<li class=\"ant-timeline-item ant-timeline-item-last\">\r\n<div class=\"ant-timeline-item-head ant-timeline-item-head-green\">&nbsp;</div>\r\n<div class=\"ant-timeline-item-content\">দক্ষ জনবল তৈরির প্রশিক্ষন প্রদান করে তাদের উপার্জনক্ষম করা</div>\r\n</li>\r\n</ul>\r\n<article class=\"ant-typography\">\r\n<div class=\"ant-typography\">যাকাত গণনা</div>\r\n<div class=\"ant-typography\">যাকাত শব্দের অর্থ পরিচ্ছন্নতা। নিজের আয় থেকে একটি নির্দিষ্ট অংশ কম সৌভাগ্যবান মানুষকে দান করে আল্লাহ সুবহানাহু ওয়া তায়ালাকে সন্তুষ্ট করার পাশাপাশি দেশজুড়ে অসহায় ভাই-বোনদের মুখে হাসি ফোটাতে পারেন। যাকাত দিয়ে আপনি বাঁচাতে পারেন কারো জীবন, ফোটাতে পারেন তার প্রিয়জনের মুখে হাসি। হতে পারেন কারো বিপদের বন্ধু। ফিকহ অনুসারে নিসাব পরিমাপ করা হয়ে থাকে, এই পরিমাণ হচ্ছে ৭.৫ তোলা স্বর্ণ (৬১২.৩৬ গ্রাম) কিংবা ৫২.৫ তোলা (৮৭.৪৮ গ্রাম) রৌপ্য অথবা সমপরিমাণ অর্থ।</div>\r\n</article>', '<div class=\"ant-typography\">যাকাত হল একটি প্রতিশ্রুতি যা দ্বারা অসহায় ও অভাবীদের সহায়তা করে তাদের অবস্থা পরিবর্তন করার জন্য তাদের পাশে দাঁড়াতে হবে। যাকাতের এই বিধান গরিবদের হক ও অধিকার প্রতিষ্ঠা করার জন্য আল্লাহ নাযিল করেছেন। প্রতিটি বিবেকবান, প্রাপ্তবয়স্ক মুসলমান যিনি নির্দিষ্ট পরিমাণে ধন-সম্পদের মালিক - যা &lsquo;নিসাব&rsquo; নামে পরিচিত তাকে অবশ্যই তার সম্পদের ২.৫% যাকাত হিসাবে দিতে হবে। যাকাত প্রদান করার মাধ্যমে আপনি কেবল নিজের দায়বদ্ধতাই পূর্ণ করেন না বরং একটি মলিন মুখে হাসি তৈরি করেন এবং তাদের বেঁচে থাকার লড়াইয়ে অনুপ্রেরনা প্রদান করেন।</div>\r\n<div class=\"ant-typography\">আসুন একসাথে হাসি ফোটাই:</div>\r\n<div class=\"ant-typography\">যাকাত হল কেবল ফকির, মিসকীন, যাকাত আদায় কারী ও যাদের চিত্ত আকর্ষণ প্রয়োজন তাদের হক এবং তা দাস-মুক্তির জন্যে-ঋণ গ্রস্তদের জন্য, আল্লাহর পথে জেহাদকারীদের জন্যে এবং মুসাফিরদের জন্যে, এই হল আল্লাহর নির্ধারিত বিধান। আল্লাহ সর্বজ্ঞ, প্রজ্ঞাময়।</div>', '<div class=\"ant-typography\">যাকাত হল একটি প্রতিশ্রুতি যা দ্বারা অসহায় ও অভাবীদের সহায়তা করে তাদের অবস্থা পরিবর্তন করার জন্য তাদের পাশে দাঁড়াতে হবে। যাকাতের এই বিধান গরিবদের হক ও অধিকার প্রতিষ্ঠা করার জন্য আল্লাহ নাযিল করেছেন। প্রতিটি বিবেকবান, প্রাপ্তবয়স্ক মুসলমান যিনি নির্দিষ্ট পরিমাণে ধন-সম্পদের মালিক - যা &lsquo;নিসাব&rsquo; নামে পরিচিত তাকে অবশ্যই তার সম্পদের ২.৫% যাকাত হিসাবে দিতে হবে। যাকাত প্রদান করার মাধ্যমে আপনি কেবল নিজের দায়বদ্ধতাই পূর্ণ করেন না বরং একটি মলিন মুখে হাসি তৈরি করেন এবং তাদের বেঁচে থাকার লড়াইয়ে অনুপ্রেরনা প্রদান করেন।</div>\r\n<div class=\"ant-typography\">আসুন একসাথে হাসি ফোটাই:</div>\r\n<div class=\"ant-typography\">যাকাত হল কেবল ফকির, মিসকীন, যাকাত আদায় কারী ও যাদের চিত্ত আকর্ষণ প্রয়োজন তাদের হক এবং তা দাস-মুক্তির জন্যে-ঋণ গ্রস্তদের জন্য, আল্লাহর পথে জেহাদকারীদের জন্যে এবং মুসাফিরদের জন্যে, এই হল আল্লাহর নির্ধারিত বিধান। আল্লাহ সর্বজ্ঞ, প্রজ্ঞাময়।</div>', 'donation/donate_img/202308300425general.jpg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/mdSfg8qO8ts?si=sqbZtyqqbIzBYGg9\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, '2023-08-29 22:25:54', '2023-09-02 10:49:48'),
(5, 'Monthly Donation Fund', 'মাসিক অনুদান তহবিল', '<p>The monthly donor member of the As-Sunnah Foundation is a permanent donor of the organization. Regular donations of the monthly donor members are a means of sustainable income for the multi-faceted da\'wah activities and overall development of the As-Sunnah Foundation.</p>', NULL, '<p>The monthly donor member of the As-Sunnah Foundation is a permanent donor of the organization. Regular donations of the monthly donor members are a means of sustainable income for the multi-faceted da\'wah activities and overall development of the As-Sunnah Foundation.</p>', NULL, NULL, '0', NULL, '<p>আস-সুন্নাহ ফাউন্ডেশনের মাসিক দাতা সদস্য সংগঠনের স্থায়ী দাতা। মাসিক দাতা সদস্যদের নিয়মিত অনুদান আস-সুন্নাহ ফাউন্ডেশনের বহুমুখী দাওয়াত কার্যক্রম এবং সামগ্রিক উন্নয়নের জন্য টেকসই আয়ের একটি মাধ্যম।</p>', NULL, NULL, 'donation/donate_img/202308300428monthly.jpg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/mdSfg8qO8ts?si=sqbZtyqqbIzBYGg9\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, '2023-08-29 22:28:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enrollmentforms`
--

DROP TABLE IF EXISTS `enrollmentforms`;
CREATE TABLE IF NOT EXISTS `enrollmentforms` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `b_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `english_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `service_id` int DEFAULT NULL,
  `division` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `school_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mother_profession` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alter_guardian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `personal_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `guardian_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `present_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_office` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `upzilla_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `district_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrollmentforms`
--

INSERT INTO `enrollmentforms` (`id`, `b_name`, `english_name`, `user_id`, `service_id`, `division`, `school_name`, `father_name`, `father_profession`, `mother_name`, `mother_profession`, `alter_guardian`, `relation`, `dob`, `religion`, `personal_mobile`, `guardian_mobile`, `present_address`, `post_office`, `upzilla_name`, `district_name`, `photo`, `status`, `created_at`, `updated_at`) VALUES
(4, 'তানবির আহমেদ', 'Tanbir Ahmed', 11, 2, 'Dhaka', 'Dhaka School and College', 'Raza mia', 'Administrator', 'sokina bibi', 'Housewife', 'Rony mia', 'brother', '1999-07-20', 'Muslim', '01798937254', '01798937279', 'Bhola,', 'Bhola', 'Bhola', 'Bhola', 'enrollmentimage/student/202308200855images.jpg', 0, '2023-08-20 02:55:41', '2023-08-20 03:20:07'),
(5, 'মেজবা উদ্দীন', 'Mejbah Uddin', 10, 1, 'Dhaka', 'Dhaka School and College', 'Tofaj uddin', 'Teacher', 'Halima bibi', 'Housewife', 'Rony mia', 'Uncle', '1994-06-20', 'Muslim', '01798937299', '01738930897', 'Dhaka, Badda', 'Badda', 'Badda', 'Dhaka', 'enrollmentimage/student/20230820090995895f45a8a1b5e9461165c7e450befe.jpg', 0, '2023-08-20 03:09:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `enrollmentform_infos`
--

DROP TABLE IF EXISTS `enrollmentform_infos`;
CREATE TABLE IF NOT EXISTS `enrollmentform_infos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `institute_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institute_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institute_owner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `institute_Instructions` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrollmentform_infos`
--

INSERT INTO `enrollmentform_infos` (`id`, `institute_name`, `institute_address`, `institute_owner`, `institute_Instructions`, `created_at`, `updated_at`) VALUES
(1, 'হুদা কম্পিউটার ও কারিগরি প্রশিক্ষণ কেন্দ্র1', 'মোনালী বাজার, ভেলাজান, ঠাকুরগাঁও', 'পরিচালনায় : মো: আইয়ুব আলী', '<ul>\r\n<li>আবেদনকারীকে স্বশরীরে পাসপোর্ট অফিসে এসে আবেদন দাখিল এবং প্রি ও বায়োএনরোলমেন্ট করতে হবে। তবে পাঁচ বৎসরের নীচে শিশুদের সাদা ব্যকগ্রাউন্ডের 3R/4R ছবি নিয়ে আসতে হবে।&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>\r\n<li>কূটনৈতিক পাসপোর্ট লাভের যোগ্য আবেদনকারীগণকে পূরণকৃত ফরম ও সংযুক্তিসমূহ পররাষ্ট্র মন্ত্রণালয়ে জমা দিতে হবে।</li>\r\n<li>শিক্ষাগত বা চাকুরীসূত্রে প্রাপ্ত পদবিসমূহ (যেমনঃ ডাক্তার, ইঞ্জিনিয়ার, ডক্টর, পিএইচডি ইত্যাদি ) নামের অংশ হিসাবে পরিগণিত হবে না।</li>\r\n<li>ফরমের ক্রমিক নং ৩ পূরণের ক্ষেত্রে, একাধিক অংশ থাকলে প্রতি অংশের মাঝখানে ১টি ঘর শূণ্য রেখে পূরন করতে হবে। আবেদনকারীর পিতা, মাতা স্বামী/স্ত্রী মৃত হলে ও নামের পূর্বে&rsquo;মৃত/মরহুম/Late&rsquo;লেখা যাবে না।</li>\r\n<li>পাসপোর্ট সমর্পণকৃতদের (সারেন্ডারড)আবেদনপত্রের সাথে অবশ্যই পূর্বের পাসপোর্ট নিয়ে আসতে হবে।</li>\r\n<li>ছবি তোলার সময় সাদা পোশাক, সাদা&nbsp;&zwj;টুপি এবং চোখে চশমা পরা যাবে না।</li>\r\n<li>ছবি, স্বাক্ষর ও আঙ্গুলের ছাপ প্রদানের পুর্বে একটি প্রাক ডেলিভারী রশিদ প্রদান করা হয় যাতে পাসপোর্ট এ প্রদর্শিত সকল তথ্য দেওয়া থাকে। উক্ত রশিদে আপনার তথ্য সঠিক আছে কিনা যাচাই করে নিন এবং কোন তথ্য ভুল থাকলে সংশ্লিষ্ট অপারেটরকে জানিয়ে তাৎক্ষণিক সংশোধন করে নিতে পারবেন।&nbsp;উল্লেখ্য যে, পাসপোর্ট আবেদনকারীর ছবি, স্বাক্ষর ও আঙ্গুলের ছাপ প্রদানের পর মূল ডেলিভারী রশিদ প্রদান করা হয় এবং এরপর সংশোধনের আর কোন সুযোগ থাকে না। অতএব, কাউন্টার ত্যাগের পূর্বে আপনার তথ্য যাচাই করে ডেলিভারী রশিদ বুঝে নিন।</li>\r\n<li>&nbsp;<a title=\"www.passport.gov.bd\" href=\"http://www.passport.gov.bd/\">www.passport.gov.bd</a> এই ঠিকানায় প্রবেশ করে Application Status অপশন থেকে ডেলিভারী রশিদে প্রদত্ত আপনার Enrolment ID এবং Date of Birth প্রদান করে 1আবেদনের বর্তমান অবস্থা জেনে নিতে পারবেন।</li>\r\n</ul>', '2023-08-17 03:54:55', '2023-08-18 22:19:27');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

DROP TABLE IF EXISTS `enrollments`;
CREATE TABLE IF NOT EXISTS `enrollments` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `service_id` int NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=pending,1=approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `user_id`, `service_id`, `payment_type`, `number`, `transaction_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 'nagad', '019738272737', 'T-23432dfsd', '1', '2023-06-12 03:55:36', '2023-06-12 04:16:06'),
(2, 2, 2, 'rocket', '019738272737', 'T-23432DSDFD', '1', '2023-06-12 04:43:50', '2023-08-19 03:04:01'),
(3, 3, 1, 'bkash', '019738272737', 'T-23432dfsd', '1', '2023-06-18 03:12:21', '2023-06-18 03:15:50');

-- --------------------------------------------------------

--
-- Table structure for table `enroll_certificates`
--

DROP TABLE IF EXISTS `enroll_certificates`;
CREATE TABLE IF NOT EXISTS `enroll_certificates` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_id` int NOT NULL,
  `user_id` int NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enroll_certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `enroll_certificates`
--

INSERT INTO `enroll_certificates` (`id`, `service_id`, `user_id`, `mobile`, `enroll_certificate`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 11, '01798937254', 'enroll_certificate/certificate/202308211210202308210914invoice.pdf', 1, '2023-08-21 06:10:25', NULL),
(2, 1, 10, '01798937299', 'enroll_certificate/certificate/202308211210202308210923invoice.pdf', 1, '2023-08-21 06:10:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `footer_details`
--

DROP TABLE IF EXISTS `footer_details`;
CREATE TABLE IF NOT EXISTS `footer_details` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `details_b` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `credit` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit_b` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `footer_details`
--

INSERT INTO `footer_details` (`id`, `details`, `details_b`, `credit`, `credit_b`, `created_at`, `updated_at`) VALUES
(3, 'Copyright © 2023 TecWeb Foundation - all rights reserved. Technical support by Quantic Dynamics.\r\nTerms and conditions | Privacy Policy', 'স্বত্ব © 2023 টেকওয়েব ফাউন্ডেশন - সর্ব স্বত্ব সংরক্ষিত। কারিগরি সহায়তায় কোয়ান্টিক ডায়নামিক্স।\r\nপরিষেবার শর্তাবলী | গোপনীয়তা নীতি', '2023 All Rights Reserved. Developed ByTechweb BD IT', '2023 সর্বস্বত্ব সংরক্ষিত। বিকাশ করেছে টেকওয়েব বিডি আইটি', '2023-06-07 23:56:22', '2023-09-03 10:45:57');

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
CREATE TABLE IF NOT EXISTS `galleries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `image` text COLLATE utf8mb4_unicode_ci,
  `add_home` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1= active; 0=deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

DROP TABLE IF EXISTS `logos`;
CREATE TABLE IF NOT EXISTS `logos` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_image` text COLLATE utf8mb4_unicode_ci,
  `logo_image1` text COLLATE utf8mb4_unicode_ci,
  `favicon` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `site_name`, `logo_image`, `logo_image1`, `favicon`, `created_at`, `updated_at`) VALUES
(2, 'Charity', 'logo/logo-1417261537.jpg', 'logo/logo-1598043796.jpg', 'logo/favicon-57743491.jpg', '2023-09-01 14:17:01', '2023-09-01 15:49:57');

-- --------------------------------------------------------

--
-- Table structure for table `management`
--

DROP TABLE IF EXISTS `management`;
CREATE TABLE IF NOT EXISTS `management` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedIn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '1' COMMENT '1= active, 0= deactive',
  `add_home` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `management`
--

INSERT INTO `management` (`id`, `name`, `designation`, `email`, `facebook`, `instagram`, `linkedIn`, `youtube`, `image`, `status`, `add_home`, `created_at`, `updated_at`) VALUES
(1, 'shadhin', 'Othopedic Surgeon', 'shadhin@gmail.com', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', 'https://www.youtube.com/', 'management/management-922931680.png', 1, 1, '2023-06-04 03:35:03', '2023-06-04 03:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bangla` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`, `title_bangla`, `created_at`, `updated_at`) VALUES
(1, 'Projects', 'প্রকল্প', '2023-08-02 05:27:18', '2023-08-02 05:29:08'),
(2, 'Governance', 'শাসন', '2023-08-20 00:06:21', '2023-08-20 00:06:21');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(61, '2023_08_02_113535_create_sub_menus_table', 28),
(62, '2023_08_17_064357_create_enrollmentforms_table', 29),
(63, '2023_08_17_065117_create_enrollmentform_infos_table', 29),
(64, '2023_08_19_050307_create_results_table', 30),
(65, '2023_08_19_051353_create_result_types_table', 30),
(66, '2023_08_19_111028_create_upload_results_table', 31),
(67, '2023_08_20_094011_create_notices_table', 32),
(68, '2023_08_21_071113_create_enroll_certificates_table', 33),
(69, '2023_08_22_090408_create_counters_table', 34),
(70, '2023_08_23_062312_create_subjects_table', 35),
(71, '2023_08_29_100403_create_donates_table', 36),
(72, '2023_08_30_051622_create_projects_table', 37),
(73, '2023_08_30_094540_create_video_galleries_table', 38),
(74, '2023_08_31_050114_create_activities_table', 39),
(75, '2023_08_31_164934_create_partners_table', 40),
(76, '2023_09_03_124516_create_upcoming_projects_table', 41);

-- --------------------------------------------------------

--
-- Table structure for table `notices`
--

DROP TABLE IF EXISTS `notices`;
CREATE TABLE IF NOT EXISTS `notices` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `short_des` text COLLATE utf8mb4_unicode_ci,
  `long_des` text COLLATE utf8mb4_unicode_ci,
  `pdf_file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notices`
--

INSERT INTO `notices` (`id`, `short_des`, `long_des`, `pdf_file`, `status`, `created_at`, `updated_at`) VALUES
(1, '<p>You are advised to contact the following Advisors of your department for on-campus Pre-Registration by following the Pre-registration flowchart of FALL 2023-2024. You are advised to contact the following Advisors of your department for on-campus Pre-Registration by following the Pre-registration flowchart of FALL 2023-2024.111</p>', '<p>You are advised to contact the following Advisors of your department for on-campus Pre-Registration by following the Pre-registration flowchart of FALL 2023-2024. You are advised to contact the following Advisors of your department for on-campus Pre-Registration by following the Pre-registration flowchart of FALL 2023-2024.You are advised to contact the following Advisors of your department for on-campus Pre-Registration by following the Pre-registration flowchart of FALL 2023-2024. You are advised to contact the following Advisors of your department for on-campus Pre-Registration by following the Pre-registration flowchart of FALL 2023-2024.You are advised to contact the following Advisors of your department for on-campus Pre-Registration by following the Pre-registration flowchart of FALL 2023-2024. You are advised to contact the following Advisors of your department for on-campus Pre-Registration by following the Pre-registration flowchart of FALL 2023-2024.11</p>', 'notice/notice/202308201031formfillup.pdf', 1, '2023-08-20 04:07:51', '2023-08-20 04:31:17'),
(2, '<p>Welcome to the Soft Skills Development &amp; Research Foundation, where we strive to make a positive impact in the community through our various initiatives and programs. We are here to provide support and resources to those in need, and create a better future for all.</p>', '<p>Welcome to the Soft Skills Development &amp; Research Foundation, where we strive to make a positive impact in the community through our various initiatives and programs. We are here to provide support and resources to those in need, and create a better future for all.Welcome to the Soft Skills Development &amp; Research Foundation, where we strive to make a positive impact in the community through our various initiatives and programs. We are here to provide support and resources to those in need, and create a better future for all.</p>', 'notice/notice/202308201009ফরম.pdf', 1, '2023-08-20 04:09:33', NULL),
(3, '<p>Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. Quisque tincidunt laoreet malesuada. Cum sociis natoque penatibus.222</p>', '<p>Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. Quisque tincidunt laoreet malesuada. Cum sociis natoque penatibus.Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. Quisque tincidunt laoreet malesuada. Cum sociis natoque penatibus.Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. Quisque tincidunt laoreet malesuada. Cum sociis natoque penatibus.22</p>', 'notice/notice/202308201034innovat7_mohila (3).sql', 1, '2023-08-20 04:10:08', '2023-08-20 04:34:27');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int DEFAULT NULL,
  `options` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1= active, 0= deactive',
  `add_home` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `price`, `options`, `status`, `add_home`, `created_at`, `updated_at`) VALUES
(1, 'Basic Plan', 79, '[\"New Patient Consultation\",\"Regular health Checkup\",\"Ocupational Therapy\",\"Phusical Therapy\",\"X-rays\",null]', 1, 1, '2023-06-01 00:57:27', '2023-06-01 01:10:09'),
(2, 'Standard Plan', 89, '[\"New Patient Consultation\",\"Regular health Checkup\",\"Ocupational Therapy\",\"Phusical Therapy\",\"X-rays\",null]', 1, 1, '2023-06-01 01:11:40', '2023-06-01 01:11:40'),
(3, 'Premium Plan', 99, '[\"New Patient Consultation\",\"Regular health Checkup\",\"Ocupational Therapy\",\"Phusical Therapy\",\"X-rays\",\"Cancer Treatment\",null]', 1, 1, '2023-06-01 01:12:46', '2023-06-01 01:12:46');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

DROP TABLE IF EXISTS `partners`;
CREATE TABLE IF NOT EXISTS `partners` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `partner_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partner_name_bangla` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `partner_name`, `partner_name_bangla`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sombbol', 'সম্বল', 'partner/partner_img/2023083117361.png', 1, '2023-08-31 11:24:23', '2023-08-31 11:36:12'),
(2, 'One taka treatment', 'এক টাকায় চিকিৎসা', 'partner/partner_img/2023083117262.png', 1, '2023-08-31 11:26:37', NULL),
(3, 'one taka food', 'এক টাকায় আহার', 'partner/partner_img/2023083117403.png', 1, '2023-08-31 11:40:24', NULL),
(4, NULL, NULL, 'partner/partner_img/2023083117405.png', 1, '2023-08-31 11:40:47', NULL),
(5, NULL, NULL, 'partner/partner_img/2023083117414.png', 1, '2023-08-31 11:41:19', NULL),
(6, NULL, NULL, 'partner/partner_img/2023083117426.jpg', 1, '2023-08-31 11:42:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_numbers`
--

DROP TABLE IF EXISTS `payment_numbers`;
CREATE TABLE IF NOT EXISTS `payment_numbers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `bkash` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nagad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rocket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_numbers`
--

INSERT INTO `payment_numbers` (`id`, `bkash`, `nagad`, `rocket`, `created_at`, `updated_at`) VALUES
(1, '019745645646', '0172352365', '019756756766', '2023-06-12 00:45:32', '2023-06-12 00:45:54');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
CREATE TABLE IF NOT EXISTS `projects` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bangla` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_des_eng` text COLLATE utf8mb4_unicode_ci,
  `short_des_bangla` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `title_bangla`, `short_des_eng`, `short_des_bangla`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, '1Web Development Course-2023', '1ওয়েব ডেভেলপমেন্ট কোর্স-2023', '<p>1With the aim of enhancing the skills and creating employment opportunities for the unemployed and unskilled individuals, As-Sunnah Foundation\'s subsidiary institution, As-Sunnah Skill Development Institute, is conducting the Web Development Course-2023. After conducting a three-month online course initially, the successful candidates who pass through the examination will be made proficient with three months of residential training, in-sha-Allah.</p>', 'বেকার ও অদক্ষ ব্যক্তিদের দক্ষতা বৃদ্ধি ও কর্মসংস্থানের সুযোগ সৃষ্টির লক্ষ্যে আস-সুন্নাহ ফাউন্ডেশনের সহযোগী প্রতিষ্ঠান আস-সুন্নাহ স্কিল ডেভেলপমেন্ট ইনস্টিটিউট ওয়েব ডেভেলপমেন্ট কোর্স-২০২৩ পরিচালনা করছে। প্রাথমিকভাবে তিন মাসের অনলাইন কোর্স পরিচালনার পর পরীক্ষায় উত্তীর্ণ সফল প্রার্থীদের তিন মাসের আবাসিক প্রশিক্ষণদিয়ে দক্ষ করে তোলা হবে ইনশাআল্লাহ।', 'project/project_img/202308300723carity(1).jpg', 1, '2023-08-30 01:21:35', '2023-08-30 01:23:32'),
(2, 'Small Business Management Course-2023', 'ছোট ব্যবসা ব্যবস্থাপনা কোর্স-2023', '<h4>As part of the continuous projects of the As-Sunnah Skill Development Institute aimed at enhancing skills and creating employment opportunities for unemployed and unskilled individuals, the \'Small Business Management Course-2023\' is currently being conducted. This course is providing training to 45 alim and 45 general educated youth. This course will cover Microsoft Word-Excel, Graphic Design, Digital Marketing, Accounting, and the English language. After completion of the course, trainees will be offered jobs as per their qualifications In-Sha-Allah</h4>', '<p>বেকার ও অদক্ষ ব্যক্তিদের দক্ষতা বৃদ্ধি এবং কর্মসংস্থানের সুযোগ সৃষ্টির লক্ষ্যে আস-সুন্নাহ স্কিল ডেভেলপমেন্ট ইনস্টিটিউটের ধারাবাহিক প্রকল্পের অংশ হিসেবে বর্তমানে \'স্মল বিজনেস ম্যানেজমেন্ট কোর্স-২০২৩\' পরিচালিত হচ্ছে। এই কোর্সে ৪৫ জন আলিম ও ৪৫ জন সাধারণ শিক্ষিত যুবককে প্রশিক্ষণ দেওয়া হচ্ছে। এই কোর্সটি Microsoft Word-Excel, গ্রাফিক ডিজাইন, ডিজিটাল মার্কেটিং, অ্যাকাউন্টিং এবং ইংরেজি ভাষা কভার করবে। কোর্স শেষ হওয়ার পর প্রশিক্ষণার্থীদের যোগ্যতা অনুযায়ী চাকরি দেওয়া হবে ইন-শা-আল্লাহ</p>', 'project/project_img/202308300724small-business-management.jpg', 1, '2023-08-30 01:24:48', NULL),
(3, 'Relief distribution among flood-affected in greater Chattogram', 'বৃহত্তর চট্টগ্রামে বন্যা দুর্গতদের মাঝে ত্রাণ বিতরণ', '<h4>In light of the disruption &amp; distress of civilian life due to flooding in Greater Chattogram, As-Sunnah Foundation stands beside the residents of Greater Chattogram with emergency relief operations. Relief operations will continue till the situation normalizes In-Sha-Allah.</h4>', 'বৃহত্তর চট্টগ্রামে বন্যার কারণে নাগরিক জীবনের বিপর্যয় ও দুর্ভোগের আলোকে, আস-সুন্নাহ ফাউন্ডেশন জরুরী ত্রাণ কার্যক্রমে বৃহত্তর চট্টগ্রামের বাসিন্দাদের পাশে দাঁড়িয়েছে। পরিস্থিতি স্বাভাবিক না হওয়া পর্যন্ত ত্রাণ তৎপরতা চলবে ইন-শা-আল্লাহ।', 'project/project_img/202308300725relief-distribution-flood-chattogram-2023.jpeg', 1, '2023-08-30 01:25:38', NULL),
(4, 'Qurbani for all', 'সবার জন্য কোরবানি', '<p>In light of the disruption &amp; distress of civilian life due to flooding in Greater Chattogram, As-Sunnah Foundation stands beside the residents of Greater Chattogram with emergency relief operations. Relief operations will continue till the situation normalizes In-Sha-Allah.</p>', 'বৃহত্তর চট্টগ্রামে বন্যার কারণে নাগরিক জীবনের বিপর্যয় ও দুর্ভোগের আলোকে, আস-সুন্নাহ ফাউন্ডেশন জরুরী ত্রাণ কার্যক্রমে বৃহত্তর চট্টগ্রামের বাসিন্দাদের পাশে দাঁড়িয়েছে। পরিস্থিতি স্বাভাবিক না হওয়া পর্যন্ত ত্রাণ তৎপরতা চলবে ইন-শা-আল্লাহ।', 'project/project_img/202308300726iftar.jpg', 1, '2023-08-30 01:26:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

DROP TABLE IF EXISTS `research`;
CREATE TABLE IF NOT EXISTS `research` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8mb4_unicode_ci,
  `short_details` text COLLATE utf8mb4_unicode_ci,
  `main_image` text COLLATE utf8mb4_unicode_ci,
  `banner_image` text COLLATE utf8mb4_unicode_ci,
  `details_image1` text COLLATE utf8mb4_unicode_ci,
  `details_image2` text COLLATE utf8mb4_unicode_ci,
  `details_image3` text COLLATE utf8mb4_unicode_ci,
  `details1` longtext COLLATE utf8mb4_unicode_ci,
  `details2` longtext COLLATE utf8mb4_unicode_ci,
  `add_home` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1= active; 0=deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`id`, `title`, `short_details`, `main_image`, `banner_image`, `details_image1`, `details_image2`, `details_image3`, `details1`, `details2`, `add_home`, `status`, `created_at`, `updated_at`) VALUES
(1, 'High school program starting soon 2021', '<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam...</p>', 'research/research_main_image-1474554970.jpg', 'research/research_banner_image-1045844051.jpg', 'research/research_details_image-1907470230.jpg', 'research/research_details_image-1701328911.jpg', 'research/research_details_image-422122199.jpg', '<h2 class=\"title mb-40\">Economy may face double recession.</h2>\r\n<div class=\"blog-desc mb-35\">\r\n<p>Leverage agile frameworks to provide a robust synopsis for high level overviews. Iterative approaches to corporate strategy foster collaborative thinking to further the overall value proposition. Organically grow the holistic world view of disruptive innovation via workplace diversity and empowerment. Bring to the table win-win survival strategies to ensure proactive domination. At the end of the day, going forward, a new normal that has evolved from generation X is on the runway heading towards a streamlined cloud solution. User generated content in real-time will have multiple touchpoints for offshoring.</p>\r\n</div>', '<div class=\"blog-desc mb-40\">\r\n<p>Phosfluorescently engage worldwide methodologies with web-enabled technology. Interactively coordinate proactive e-commerce via process-centric &ldquo;outside the box&rdquo; thinking. Completely pursue scalable customer service through sustainable potentialities. Collaboratively administrate turnkey channels whereas virtual e-tailers. Objectively seize scalable metrics whereas proactive e-services. Seamlessly empower fully researched growth strategies and interoperable internal or &ldquo;organic&rdquo; sources.</p>\r\n</div>\r\n<ul class=\"unorder-list mb-20\">\r\n<li>New Construction Benefit of Service</li>\r\n<li>Renovations Benefit of Service</li>\r\n<li>Historic Renovations and Restorations</li>\r\n<li>Additions Benefit of Service</li>\r\n<li>Rebuilding from fire or water damage</li>\r\n</ul>\r\n<h2 class=\"title\">Experts Always Ready to Maximizing Products.</h2>\r\n<div class=\"blog-desc\">\r\n<p>Proactively fabricate one-to-one materials via effective e-business. Completely synergize scalable e-commerce rather than high standards in e-services. Assertively iterate resource maximizing products after leading-edge intellectual capital. Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide with additional clickthroughs from DevOps. Nanotechnology immersion along the information highway will close the loop on focusing solely on the bottom line.</p>\r\n</div>\r\n<h4 class=\"sm-title\">Experts Always Ready to Maximizing Products.</h4>\r\n<div class=\"blog-desc\">\r\n<p>Interactively procrastinate high-payoff content without backward-compatible data. Quickly cultivate optimal processes and tactical architectures. Completely iterate covalent strategic theme areas via accurate e-markets. Globally incubate standards compliant channels before scalable benefits. Quickly disseminate superior deliverables whereas web-enabled applications. Quickly drive clicks-and-mortar catalysts for change before vertical</p>\r\n</div>', 1, 1, '2023-06-12 00:13:15', '2023-06-12 00:16:34');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

DROP TABLE IF EXISTS `results`;
CREATE TABLE IF NOT EXISTS `results` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bangla` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `title`, `title_bangla`, `created_at`, `updated_at`) VALUES
(1, 'Results', 'ফলাফল', '2023-08-18 23:33:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `result_types`
--

DROP TABLE IF EXISTS `result_types`;
CREATE TABLE IF NOT EXISTS `result_types` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `subject_id` int NOT NULL,
  `result_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `roll_no` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `result_types`
--

INSERT INTO `result_types` (`id`, `subject_id`, `result_id`, `name`, `roll_no`, `created_at`, `updated_at`) VALUES
(9, 4, '1', NULL, NULL, '2023-08-23 03:23:09', NULL),
(8, 5, '1', NULL, NULL, '2023-08-23 03:07:35', NULL),
(7, 1, '1', NULL, NULL, '2023-08-23 01:42:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_title` text COLLATE utf8mb4_unicode_ci,
  `main_image` text COLLATE utf8mb4_unicode_ci,
  `price` int DEFAULT NULL,
  `banner_image` text COLLATE utf8mb4_unicode_ci,
  `details_image1` text COLLATE utf8mb4_unicode_ci,
  `details_image2` text COLLATE utf8mb4_unicode_ci,
  `details_image3` text COLLATE utf8mb4_unicode_ci,
  `service_home` int DEFAULT NULL,
  `service_details_small` longtext COLLATE utf8mb4_unicode_ci,
  `service_details1` longtext COLLATE utf8mb4_unicode_ci,
  `service_details2` longtext COLLATE utf8mb4_unicode_ci,
  `service_details3` longtext COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '1' COMMENT '1= active; 0=deactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `service_title`, `main_image`, `price`, `banner_image`, `details_image1`, `details_image2`, `details_image3`, `service_home`, `service_details_small`, `service_details1`, `service_details2`, `service_details3`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fitness Development Strategy Buildup Laoreet', 'services/services_main_image-1065523139.jpg', 750, 'services/services_banner_image-1853677552.jpg', 'services/services_details_image-1245709720.jpg', 'services/services_details_image-796716001.jpg', 'services/services_details_image-615468607.jpg', 1, '<p>Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. Quisque tincidunt laoreet malesuada. Cum sociis natoque penatibus</p>', '<h4>Educavo Course Details</h4>\r\n<p>Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. Quisque tincidunt laoreet malesuada. Cum sociis natoque penatibus.</p>', '<p>Eleifend euismod pellentesque vel Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. Quisque tincidunt laoreet malesuada. Cum sociis natoque penatibus.</p>', '<ul class=\"student-list\">\r\n<li>3,564 Total Students</li>\r\n&nbsp;\r\n<li><span class=\"theme_color\">4.5</span>&nbsp;&nbsp;(1254 Rating)</li>\r\n&nbsp;\r\n<li>256 Reviews</li>\r\n</ul>\r\n<h3>What you&rsquo;ll learn?</h3>\r\n<ul class=\"review-list\">\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Sed consequat justo non mauris pretium at tempor justo.</li>\r\n<li>Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Sed consequat justo non mauris pretium at tempor justo.</li>\r\n<li>Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n</ul>\r\n<h3>Requirements</h3>\r\n<ul class=\"review-list\">\r\n<li>Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo</li>\r\n<li>Ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel.</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Varius et commodo ut, ultricies vitae velit. Ut nulla tellus.</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n</ul>', 1, '2023-06-11 03:01:21', '2023-06-11 03:01:21'),
(2, 'Artificial Intelligence Fundamental Startup Justo', 'services/services_main_image-1546172901.jpg', 200, 'services/services_banner_image-827692409.jpg', 'services/services_details_image-1899831290.jpg', 'services/services_details_image-1728898727.jpg', 'services/services_details_image-215154261.jpg', 1, '<p>Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. Quisque tincidunt laoreet malesuada. Cum sociis natoque penatibus.</p>', '<h4>Educavo Course Details</h4>\r\n<p>Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. Quisque tincidunt laoreet malesuada. Cum sociis natoque penatibus.</p>', '<p>Eleifend euismod pellentesque vel Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, sagittis vel justo. In libero urna, venenatis sit amet ornare non, suscipit nec risus. Sed consequat justo non mauris pretium at tempor justo sodales. Quisque tincidunt laoreet malesuada. Cum sociis natoque penatibus.</p>\r\n<ul class=\"student-list\">\r\n<li>23,564 Total Students</li>\r\n&nbsp;\r\n<li><span class=\"theme_color\">4.5</span>&nbsp;&nbsp;(1254 Rating)</li>\r\n&nbsp;\r\n<li>256 Reviews</li>\r\n</ul>', '<h3>What you&rsquo;ll learn?</h3>\r\n<ul class=\"review-list\">\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Sed consequat justo non mauris pretium at tempor justo.</li>\r\n<li>Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Sed consequat justo non mauris pretium at tempor justo.</li>\r\n<li>Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n</ul>\r\n<h3>Requirements</h3>\r\n<ul class=\"review-list\">\r\n<li>Phasellus enim magna, varius et commodo ut, ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel, sagittis vel justo</li>\r\n<li>Ultricies vitae velit. Ut nulla tellus, eleifend euismod pellentesque vel.</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n<li>Varius et commodo ut, ultricies vitae velit. Ut nulla tellus.</li>\r\n<li>Phasellus enim magna, varius et commodo ut.</li>\r\n</ul>', 1, '2023-06-11 03:03:18', '2023-06-11 03:03:18');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `result_id` int NOT NULL,
  `subject_name_english` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_name_bangla` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `result_id`, `subject_name_english`, `subject_name_bangla`, `created_at`, `updated_at`) VALUES
(1, 1, 'Power Point', 'পাওয়ারপয়েন্ট', '2023-08-23 00:51:01', NULL),
(2, 1, 'MS Word', 'মাইক্রোসফট ওয়ার্ড', '2023-08-23 00:51:31', NULL),
(4, 1, 'Graphic design', 'গ্রাফিক ডিজাইন', '2023-08-23 00:52:11', NULL),
(5, 1, 'Programming Language', 'প্রোগ্রাম ভাষা', '2023-08-23 00:52:44', NULL),
(6, 1, 'Mathematic12', 'গণিত12', '2023-08-23 03:13:04', '2023-08-23 03:43:33');

-- --------------------------------------------------------

--
-- Table structure for table `sub_menus`
--

DROP TABLE IF EXISTS `sub_menus`;
CREATE TABLE IF NOT EXISTS `sub_menus` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_bangla` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `menu_id` int DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_image` text COLLATE utf8mb4_unicode_ci,
  `details_image1` text COLLATE utf8mb4_unicode_ci,
  `details_image2` text COLLATE utf8mb4_unicode_ci,
  `details_image3` text COLLATE utf8mb4_unicode_ci,
  `details1` longtext COLLATE utf8mb4_unicode_ci,
  `details2` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_menus`
--

INSERT INTO `sub_menus` (`id`, `title`, `title_bangla`, `designation`, `name`, `menu_id`, `image`, `banner_image`, `details_image1`, `details_image2`, `details_image3`, `details1`, `details2`, `created_at`, `updated_at`) VALUES
(1, 'hello', 'হ্যালো', NULL, NULL, 1, NULL, 'consultancy/consultancy_banner_image-1970983837.png', 'consultancy/consultancy_details_image-1552974315.png', 'consultancy/consultancy_details_image-192149293.jpg', 'consultancy/consultancy_details_image-1976193330.png', '<p>dsfdsfdsf</p>', '<p>sdfdsfdsf</p>', '2023-08-02 05:46:23', '2023-08-02 05:52:06'),
(2, 'Vice Chancallor', 'উপাচার্য', 'PROFESSOR', 'DR. MD. SHARFUDDIN AHMED', 2, NULL, 'consultancy/consultancy_banner_image-1667997728.jpg', NULL, NULL, NULL, '<p>Bangabandhu Sheikh Mujib Medical University (BSMMU) was established in 1998 as the first medical university of the country after the name of the father of the nation. Since its inception, BSMMU has been serving as the leading medical institution that contributing significantly in growth and improvement of postgraduate medical education in Bangladesh.</p>\r\n<p>Being a medical university with focus on healthcare, medical education and research, the University encourages Innovation, Imagination and Insight among its teachers, residents and staffs to develop a competency framework. This enabling environment ensures that BSMMU graduates are knowledgeable, competent,work-ready and caring healthcare professionals who are critical thinkers, reflective and yet proactive.</p>', NULL, '2023-08-20 00:21:54', '2023-08-20 00:27:50'),
(3, 'Pro Vice Chancellor (Academic)', 'প্রো ভাইস চ্যান্সেলর (একাডেমিক)', 'PROFESSOR', 'PROFESSOR DR. AKM MOSHARRAF HOSSAIN', 2, NULL, 'consultancy/consultancy_banner_image-1433697122.jpg', NULL, NULL, NULL, '<p>As &ldquo;living the values&rdquo; is an integral part of BSMMU, the University also places emphasis on active involvement in the community to inculcate a caring attitude among residents, trainees and staff, which is reflected in the camaraderie among them and the community. It also enables residents and students to translate, gather knowledge, enhance communication skills, strengthen professional and technical skills appropriate to be applied in real world situations.</p>', NULL, '2023-08-20 00:36:51', '2023-08-20 00:36:51'),
(4, 'Treasurer', 'কোষাধ্যক্ষ', 'Professor', 'Dr. Mohammed Atiqur Rahman', 2, 'consultancyImage/consultancy_image-731992338.jpg', 'consultancy/consultancy_banner_image-1547769883.jpg', NULL, NULL, NULL, '<p>To establish an outstanding professional acumen, research based curricular activities in the field of Pulmonology, Critical Care and Emergency Respirology to be practiced with great solemnity to serve the ailing humanity, enacting a clinical and interventional Pulmonology centre of excellence is my professional zeal.</p>', NULL, '2023-08-20 01:24:55', '2023-08-20 02:08:58');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedIn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '1' COMMENT '1= active, 0= deactive',
  `add_home` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review` text COLLATE utf8mb4_unicode_ci,
  `star` int DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `status` int NOT NULL DEFAULT '1' COMMENT '1= active, 0= deactive',
  `add_home` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `upcoming_projects`
--

DROP TABLE IF EXISTS `upcoming_projects`;
CREATE TABLE IF NOT EXISTS `upcoming_projects` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `donate_id` bigint DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bangla_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_des1` text COLLATE utf8mb4_unicode_ci,
  `short_des2` text COLLATE utf8mb4_unicode_ci,
  `short_des_bangla1` text COLLATE utf8mb4_unicode_ci,
  `short_des_bangla2` text COLLATE utf8mb4_unicode_ci,
  `long_des1` longtext COLLATE utf8mb4_unicode_ci,
  `long_des2` longtext COLLATE utf8mb4_unicode_ci,
  `long_des3` longtext COLLATE utf8mb4_unicode_ci,
  `long_des_bangla1` longtext COLLATE utf8mb4_unicode_ci,
  `long_des_bangla2` longtext COLLATE utf8mb4_unicode_ci,
  `long_des_bangla3` longtext COLLATE utf8mb4_unicode_ci,
  `image1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `video_link1` text COLLATE utf8mb4_unicode_ci,
  `video_link2` text COLLATE utf8mb4_unicode_ci,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `project_start_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upcoming_projects`
--

INSERT INTO `upcoming_projects` (`id`, `donate_id`, `title`, `bangla_title`, `short_des1`, `short_des2`, `short_des_bangla1`, `short_des_bangla2`, `long_des1`, `long_des2`, `long_des3`, `long_des_bangla1`, `long_des_bangla2`, `long_des_bangla3`, `image1`, `image2`, `image3`, `video_link1`, `video_link2`, `location`, `project_start_date`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Hello Project', 'হ্যালো প্রজেক্ট', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</p>', '<p>Lorem Ipsum হল মুদ্রণ এবং টাইপসেটিং শিল্পের ডামি পাঠ্য। Lorem Ipsum হয়েছে</p>', '<p>Lorem Ipsum হল মুদ্রণ এবং টাইপসেটিং শিল্পের ডামি পাঠ্য। Lorem Ipsum হয়েছে</p>', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>', '<p>Lorem Ipsum হল মুদ্রণ এবং টাইপসেটিং শিল্পের ডামি পাঠ্য। লোরেম ইপসাম 1500 এর দশক থেকে শিল্পের মানক ডামি টেক্সট হয়েছে, যখন একটি অজানা প্রিন্টার টাইপের একটি গ্যালি নিয়েছিল এবং একটি টাইপ নমুনা বই তৈরি করতে এটিকে স্ক্র্যাম্বল করেছিল।</p>', '<p>Lorem Ipsum হল মুদ্রণ এবং টাইপসেটিং শিল্পের ডামি পাঠ্য। লোরেম ইপসাম 1500 এর দশক থেকে শিল্পের মানক ডামি টেক্সট হয়েছে, যখন একটি অজানা প্রিন্টার টাইপের একটি গ্যালি নিয়েছিল এবং একটি টাইপ নমুনা বই তৈরি করতে এটিকে স্ক্র্যাম্বল করেছিল।</p>', '<p>Lorem Ipsum হল মুদ্রণ এবং টাইপসেটিং শিল্পের ডামি পাঠ্য। লোরেম ইপসাম 1500 এর দশক থেকে শিল্পের মানক ডামি টেক্সট হয়েছে, যখন একটি অজানা প্রিন্টার টাইপের একটি গ্যালি নিয়েছিল এবং একটি টাইপ নমুনা বই তৈরি করতে এটিকে স্ক্র্যাম্বল করেছিল।</p>', 'upcomeproject/project_img/202309031548shansad.jpg', 'upcomeproject/project_img/202309031549lagbag1.jpg', 'upcomeproject/project_img/202309031549downluuoad.png', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/50WkIjIJjIY?si=0ngbZSq1L5Q5-hMl\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/EAenROV_JXI?si=A-DRmFjUeULc1Wdm\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'Cox\'s Baza', '2023-10-12', 1, '2023-09-03 09:07:10', '2023-09-03 09:49:34'),
(2, NULL, 'project BD', 'প্রজেক্ট বিডি', '<p>f type and scrambled it to make a type specimen book. It has survived not only</p>', '<p>f type and scrambled it to make a type specimen book. It has survived not only</p>', '<p>টাইপ এবং একটি টাইপ নমুনা বই করতে এটি scrambled. এটা শুধু টিকে আছে না</p>', '<p>টাইপ এবং একটি টাইপ নমুনা বই করতে এটি scrambled. এটা শুধু টিকে আছে না</p>', '<p>etting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker i</p>', '<p>etting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker i</p>', '<p>etting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker i</p>', '<p>&nbsp;অবশেষ অপরিবর্তিত অবশিষ্ট. এটি 1960-এর দশকে লোরেম ইপসাম প্যাসেজ সম্বলিত লেট্রাসেট শীট প্রকাশের মাধ্যমে এবং আরও সম্প্রতি অ্যালডাস পেজমেকার i-এর মতো ডেস্কটপ প্রকাশনা সফ্টওয়্যার দিয়ে জনপ্রিয় হয়েছিল।</p>', '<p>&nbsp;অবশেষ অপরিবর্তিত অবশিষ্ট. এটি 1960-এর দশকে লোরেম ইপসাম প্যাসেজ সম্বলিত লেট্রাসেট শীট প্রকাশের মাধ্যমে এবং আরও সম্প্রতি অ্যালডাস পেজমেকার i-এর মতো ডেস্কটপ প্রকাশনা সফ্টওয়্যার দিয়ে জনপ্রিয় হয়েছিল।</p>', '<p>&nbsp;অবশেষ অপরিবর্তিত অবশিষ্ট. এটি 1960-এর দশকে লোরেম ইপসাম প্যাসেজ সম্বলিত লেট্রাসেট শীট প্রকাশের মাধ্যমে এবং আরও সম্প্রতি অ্যালডাস পেজমেকার i-এর মতো ডেস্কটপ প্রকাশনা সফ্টওয়্যার দিয়ে জনপ্রিয় হয়েছিল।</p>', 'upcomeproject/project_img/202309031510relief-distribution-flood-chattogram-2023.jpeg', 'upcomeproject/project_img/202309031510sadaqah.jpg', 'upcomeproject/project_img/202309031510assunnah-complex.jpg', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/EAenROV_JXI?si=A-DRmFjUeULc1Wdm\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/EAenROV_JXI?si=A-DRmFjUeULc1Wdm\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 'Dhaka, bd', '2023-11-15', 1, '2023-09-03 09:10:19', '2023-09-03 09:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `upload_results`
--

DROP TABLE IF EXISTS `upload_results`;
CREATE TABLE IF NOT EXISTS `upload_results` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `result_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` int NOT NULL,
  `result_grate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upload_results`
--

INSERT INTO `upload_results` (`id`, `result_type`, `subject_id`, `result_grate`, `user_id`, `created_at`, `updated_at`) VALUES
(13, '7', 1, 'C', 11, '2023-08-23 02:27:36', NULL),
(12, '7', 1, 'A+', 10, '2023-08-23 02:15:20', NULL),
(14, '8', 5, 'C', 10, '2023-08-23 03:10:22', NULL),
(15, '9', 4, 'B', 10, '2023-08-23 03:23:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT '0',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `roll_no` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `is_admin`, `password`, `image`, `roll_no`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@admin.com', NULL, 1, '$2y$10$NfMQyw0pJfoV2uGXyPraQ.oczVEUXVbST9vGzaoK5xnrd9QOChmLe', 'user/user-1773984705.jpg', NULL, NULL, '2023-06-11 04:28:21', '2023-06-11 04:32:31'),
(2, 'Shadhin Elahi', 'shadhin@gmail.com', NULL, 0, '$2y$10$u2IMMxW1cVDFEkv4/5Rakep.t54qAefMFL3cJtxFxMAKOJtkD1M2W', 'user/user-724309772.jpg', NULL, NULL, '2023-06-12 01:36:41', '2023-06-12 05:02:51'),
(3, 'rifat', 'rifat@gmail.com', NULL, 0, '$2y$10$GzpywpgtvIjINzviDf0AZ.HY.Oox9FjjnhfjxxIDEj722vM0izj4.', NULL, NULL, NULL, '2023-06-18 03:11:39', '2023-06-18 03:11:39'),
(10, 'Mejbah Uddin', 'mejbah@gmail.com', NULL, 0, '$2y$10$FqinvoRqQKEqJjGSgxsOP.KvUS2JtkhEqBh9S4n3.lRBvtVgmLWB2', NULL, 'STU904690', NULL, '2023-08-19 04:20:45', '2023-08-19 04:20:45'),
(11, 'Tanbir Ahmed', 'tanbir@gmail.com', NULL, 0, '$2y$10$8UiqoPTGRuYEeUiEZNe5ie8N6YwyOCZ9xbGkkOn2pETzIxKBufeAK', NULL, 'STU697401', NULL, '2023-08-20 02:52:17', '2023-08-20 02:52:17');

-- --------------------------------------------------------

--
-- Table structure for table `video_galleries`
--

DROP TABLE IF EXISTS `video_galleries`;
CREATE TABLE IF NOT EXISTS `video_galleries` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `video_link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `video_galleries`
--

INSERT INTO `video_galleries` (`id`, `video_link`, `status`, `created_at`, `updated_at`) VALUES
(1, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/e2-LubtmpCU?si=kGrQO7hSGEKEkA8g\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, '2023-08-30 04:01:25', NULL),
(2, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/zSOlo9jRNdY?si=7_VFhLspbqOI_Ziw\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, '2023-08-30 04:03:22', NULL),
(3, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/yMPxq9lQE0E?si=wOmsOWH0TQ1-iL3Q\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, '2023-08-30 04:03:44', '2023-08-30 04:26:39'),
(4, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/50WkIjIJjIY?si=0ngbZSq1L5Q5-hMl\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, '2023-08-30 04:03:44', '2023-08-30 04:26:39');

-- --------------------------------------------------------

--
-- Table structure for table `website_links`
--

DROP TABLE IF EXISTS `website_links`;
CREATE TABLE IF NOT EXISTS `website_links` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedIn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `map_link` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `website_links`
--

INSERT INTO `website_links` (`id`, `email`, `facebook`, `instagram`, `linkedIn`, `youtube`, `number`, `address`, `map_link`, `created_at`, `updated_at`) VALUES
(3, 'user@itsolutionstuff.com', 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', 'https://www.youtube.com/', '019738272737', '2767 Sunrise Street, NY 1002, USA', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d29199.978510144396!2d90.41343228190985!3d23.818694561552554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e0!4m3!3m2!1d23.820403799999998!2d90.4150013!4m5!1s0x3755c7b512a69851%3A0x1f8ae2a40e063c4d!2z4KaT4Kav4Ka84Ka-4Kaf4Ka-4Kaw4Kaq4KeL4Kay4KeLIOCmrOCmv-CmoeCmvw!3m2!1d23.8081072!2d90.4302925!5e0!3m2!1sbn!2sbd!4v1685957818958!5m2!1sbn!2sbd\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', '2023-06-05 03:37:10', '2023-06-07 23:49:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
