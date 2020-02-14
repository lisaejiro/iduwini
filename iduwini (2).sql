-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2019 at 10:08 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iduwini`
--

-- --------------------------------------------------------

--
-- Table structure for table `board`
--

CREATE TABLE `board` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `position` text NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `board`
--

INSERT INTO `board` (`id`, `name`, `position`, `image`) VALUES
(1, 'Seriake Dickson', 'HIS EXCELLENCY, EXECUTIVE GOVERNOR OF BAYELSA STATE', 'b1.png'),
(2, 'Osagie Okunbor', 'General ManagerShell, Nigeria', 'b2.jpg'),
(3, 'Mr. Korubo Macpherson Gold', 'Chairman, Iduwini Cluster Development Board', '19passport-CDBChairman-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `current_staff`
--

CREATE TABLE `current_staff` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `position` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `current_staff`
--

INSERT INTO `current_staff` (`id`, `name`, `position`, `email`, `phone`, `created_at`) VALUES
(1, 'Kurobo Macpherson Gold', 'Chairman', '--', '--', '2019-10-08 12:43:57'),
(2, 'Iyalade Pers', 'Vice Chairman', '--', '--', '2019-10-08 12:43:57'),
(4, 'Geregere Timothy', 'PRO', '--', '--', '2019-10-08 12:43:57'),
(5, 'Ekpetikoru Ebilade Jason', 'Secretary', '--', '--', '2019-10-08 12:43:57'),
(10, 'Evelyn October', 'Tresurer', '--', '--', '2019-10-08 12:43:57'),
(15, 'Henry Ofesokumor', 'Asst. Sec.', '--', '--', '2019-10-08 12:43:57'),
(16, 'Omolo Akeme', 'Fin. Secretary', '--', '--', '2019-10-21 16:50:14');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `status` varchar(20) NOT NULL,
  `privilege` varchar(100) NOT NULL,
  `ability` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`, `phone`, `status`, `privilege`, `ability`, `created_at`) VALUES
(1, ' Admin Account', 'admin@iduwini.com', '21232f297a57a5a743894a0e4a801fc3', '08000000000', 'active', 'admin', '', '2019-09-10 16:20:36'),
(2, 'Max Miller', 'maxmiller@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '08012345678', 'active', 'subadmin', 'project,letter,site,video,', '2019-09-29 23:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `slug` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `details` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `slug`, `image`, `details`, `created_at`) VALUES
(3, 'Iduwini Cluster Reps participating in Shell Organized Event', 'iduwini-cluster-reps-participating-in-shell-organized-event', '15IduwiniClusterRepsparticipatinginShellOrganizedEvent.JPG', '<p>Iduwini Cluster Reps participating in an event organized by shell.</p>', '2019-10-21 13:26:24');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter`
--

CREATE TABLE `newsletter` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter`
--

INSERT INTO `newsletter` (`id`, `name`, `phone`, `email`, `created_at`) VALUES
(1, 'John Doe', '08000000000', 'johndoe@gmail.com', '2019-09-29 20:40:07'),
(2, 'Jack Doe', '07111111111', 'jackdoe@gmail.com', '2019-09-29 20:40:07'),
(3, 'Mary Doe', '08100000000', 'maryjoe@gmail.com', '2019-09-29 20:40:07'),
(4, 'EJIRO', '0906', 'lis@gmail.com', '2019-12-04 17:35:51'),
(5, 'EJIRO', '0906', 'lis@gmail.com', '2019-12-04 17:36:15'),
(6, 'EJIRO', '0906', 'lis@gmail.com', '2019-12-04 17:36:37'),
(7, 'EJIRO', '0906', 'lis@gmail.com', '2019-12-04 17:37:01'),
(8, 'EJIRO', '0906', 'lis@gmail.com', '2019-12-04 17:43:14');

-- --------------------------------------------------------

--
-- Table structure for table `news_cron`
--

CREATE TABLE `news_cron` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `past_staff`
--

CREATE TABLE `past_staff` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `position` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `past_staff`
--

INSERT INTO `past_staff` (`id`, `name`, `position`, `email`, `phone`, `created_at`) VALUES
(1, 'Mr. Ebabogha Bralade', 'Chairman', '--', '--', '2019-10-08 09:49:08'),
(2, 'Mrs. Tina Alumona', 'Secretary', '--', '--', '2019-10-08 09:49:08'),
(3, 'Mr. AmietimiIsiayeiEsq', 'Vice    Chairman', '--', '--', '2019-10-08 09:49:08'),
(4, 'Mr. Olupobiri I. Professor', 'Treasurer', '--', '--', '2019-10-08 09:49:08'),
(5, 'Mr. Francis Metini', 'Member', '--', '--', '2019-10-08 09:49:08'),
(6, 'Miss JustinaItoro', 'Member', '--', '--', '2019-10-08 09:49:08'),
(7, 'Mr. Moses Doloebiowei', 'Member', '--', '--', '2019-10-08 09:49:08'),
(8, 'Mrs. Veronica Ajuju', 'Member', '--', '--', '2019-10-08 09:49:08'),
(9, 'Prince Freedom Ajuju', 'Financial Secretary', '--', '--', '2019-10-08 09:49:08'),
(10, 'Mr. Blessing Flogg', 'Member', '--', '--', '2019-10-08 09:49:08'),
(11, 'Mrs. Veronica Dominic', 'Member', '--', '--', '2019-10-08 09:49:08'),
(12, 'Mr. James Idogho', 'Member', '--', '--', '2019-10-08 09:49:08'),
(13, 'Mr. German Iro', 'Member', '--', '--', '2019-10-08 09:49:08'),
(14, 'Mr. Felix Galuwei', 'Member', '--', '--', '2019-10-08 09:49:08'),
(15, 'Mrs. KeledeDisi', 'Member', '--', '--', '2019-10-08 09:49:08');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `title`, `image`, `created_at`) VALUES
(5, 'Capacity Building', '4CapacityBuilding--.jpg', '2019-10-21 15:52:42'),
(6, 'Interactions btw NGO n Iduwini Board Reps', '7InteractionsbtwNGOnIduwiniBoardReps.jpg', '2019-10-21 15:57:43'),
(7, 'Oath of Office by Current Exco Board Members', '1OathofOfficebyCurrentExcoBoardMembers.jpg', '2019-10-21 15:58:27'),
(8, 'Ultra-modern IDF Secretariat Complex, Yenagoa', '173b1.jpg', '2019-10-21 15:59:32');

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `details` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id`, `title`, `slug`, `image`, `details`, `created_at`) VALUES
(4, 'Equipment for Skills Acquisition Training on Fashion designing, Hair dressing and Catering for Amatu I, Amatu II, Bisangbene and Letugbene Women Development Centres', 'equipment-for-skills-acquisition-training-on-fashion-designing-hair-dressing-and-catering-for-amatu-i-amatu-ii-bisangbene-and-letugbene-women-development-centres', '8b3.jpg', '<p>Giving out equipment for Skills Acquisition Training on Fashion designing, Hair dressing and Catering for Amatu I, Amatu II, Bisangbene and Letugbene Women Development Centres</p>', '2019-10-21 12:56:10'),
(5, 'Youth Economic Empowerment Lifeline Programme', 'youth-economic-empowerment-lifeline-programme', '6b3.jpg', '<p><em>Youth Economic Empowerment Lifeline Programme&nbsp;</em>designed for youths in the various communities.</p>', '2019-10-21 13:01:25'),
(6, 'Group photographs of Dignitaries during the commissioning of projects and Presentation of Starter Packs for 40 Women Beneficiaries of Skills Acquisition Training December, 2014 at the Secretariat in Yenagoa', 'group-photographs-of-dignitaries-during-the-commissioning-of-projects-and-presentation-of-starter-packs-for-40-women-beneficiaries-of-skills-acquisition-training-december-2014-at-the-secretariat-in-yenagoa', '18b3.jpg', '<p>Commissioning of projects and Presentation of Starter Packs for 40 Women Beneficiaries of Skills Acquisition Training December, 2014 at the Secretariat in Yenagoa</p>', '2019-10-21 13:05:10'),
(7, 'Presentation of  21 Yamaha Engines, Boats and nets for Amatu I and Amatu II as Economics Empowerment for women and men', 'presentation-of-21-yamaha-engines-boats-and-nets-for-amatu-i-and-amatu-ii-as-economics-empowerment-for-women-and-men', '16b3.jpg', '<p>Presentation of&nbsp; 21 Yamaha Engines, Boats and nets for Amatu I and Amatu II as Economics Empowerment for women and men.</p>', '2019-10-21 13:18:11');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `details` text NOT NULL,
  `before_img` varchar(200) NOT NULL,
  `during_img` varchar(200) NOT NULL,
  `after_img` varchar(200) NOT NULL,
  `des1` varchar(100) NOT NULL,
  `des2` varchar(100) NOT NULL,
  `des3` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `slug`, `details`, `before_img`, `during_img`, `after_img`, `des1`, `des2`, `des3`, `created_at`) VALUES
(3, 'Construction of Reinforced Concrete Community Primary School Road at Amatu II Community (85m X 3.0m)', 'construction-of-reinforced-concrete-community-primary-school-road-at-amatu-ii-community-85m-x-3-0m', '<p><strong>Construction of Reinforced Concrete Community Primary School Road at </strong><strong>Amatu</strong><strong> II Community (85m X 3.0m</strong><strong>)</strong></p>', '', '18p1.jpg', '18p2.jpg', '', 'during construction', 'after construction', '2019-10-21 11:38:15'),
(4, 'Solar-Powered Public toilets for Aghoro I, Aghoro II and Bisangbene Communities', 'solar-powered-public-toilets-for-aghoro-i-aghoro-ii-and-bisangbene-communities', '<p>Solar-Powered Public toilets for Aghoro I, Aghoro II and Bisangbene Communities&nbsp;</p>', '', '13p3.jpg', '16p4.jpg', '', 'during construction', 'after construction', '2019-10-21 12:01:36'),
(5, 'Presentation of Starter Packs for Beneficiaries in Catering, Hair Dressing and Fashion Designing', 'presentation-of-starter-packs-for-beneficiaries-in-catering-hair-dressing-and-fashion-designing', '<p>Presentation of Starter Packs for Beneficiaries in Catering, Hair Dressing and Fashion Designing</p>', '', '7p5.jpg', '19p6.jpg', '', 'during construction', 'after construction', '2019-10-21 12:06:10'),
(6, 'Ultra-modern IDF Secretariat Complex, Yenagoa', 'ultra-modern-idf-secretariat-complex-yenagoa', '<p><em>Ultra-modern IDF Secretariat Complex, With Fully Furnished Interiors of IDF Secretariat, Yenagoa.</em></p>', '', '3b1.jpg', '15b2.jpg', '', 'during construction', 'after construction', '2019-10-21 12:19:19');

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `about` text NOT NULL,
  `policy` text NOT NULL,
  `overview` text NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `twitter` varchar(200) NOT NULL,
  `instagram` varchar(200) NOT NULL,
  `youtube` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `phone`, `email`, `name`, `address`, `about`, `policy`, `overview`, `facebook`, `twitter`, `instagram`, `youtube`) VALUES
(1, '08063814815, 08155713875', 'info@iduwini-cluster.com.ng', 'Iduwini Cluster Development', '<p>Flat 1, Block 9, Road 2, Okaka Housing Estate, Yenagoa, Bayelsa State.</p>', '<p>Iduwini Cluster is one of the SPDC GMoU clusters among others across the Niger Delta Region.</p>\r\n\r\n<p>The High Level Of Poverty Across The Communities And The Rising Wave Of Social Vices Demands Urgent Action To Stem The Trend. Accordingly, Successive Boards Of The Cluster Particularly The Immediate Past Board Made Economic Empowerment And Rural Infrastructure The Thrust Of Its Administration.</p>\r\n\r\n<blockquote>The success of the GMoU is hinged on the basic principles of transparency, accountability and stakeholder involvement.</blockquote>', '<h3>Communities under Idiwini Cluster include: Aghoro-1, Aghoro-2, Letugbene, Amatu-1, Amatu-2, Bisangbene</h3>\r\n\r\n<p>The location of Idiwini Cluster communities and the very challenging terrain of the communities have informed the choice of intervention projects and programs being implemented by the past Boards of the cluster.</p>', '<h3><strong>The GMoU framework emerged the preferred community interface strategy for the deployment of social investment projects and programs for SPDC following the seeming failures of previous frameworks.</strong></h3>\r\n\r\n<p>The framework is deployed to put development in the hands of host communities to drive and own development interventions as funded by SPDC. The framework which adopts the bottom-top approach to development, have enjoyed wide acceptance from stakeholders as it tends to have addressed the twin challenges of community resistance issues and micro development challenges in the host communities where the framework has been deployed.<br />\r\nThe success of the GMoU is hinged on the basic principles of transparency, accountability and stakeholder involvement.</p>', '#', '#', '#', 'http://www.youtube.com/iduwini');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `slug` text NOT NULL,
  `url` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `slug`, `url`, `created_at`) VALUES
(4, 'Shell set up community project', 'shell-set-up-community-project', 'https://www.youtube.com/watch?v=cjeYMTnySPc', '2019-10-23 13:52:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `board`
--
ALTER TABLE `board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `current_staff`
--
ALTER TABLE `current_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_cron`
--
ALTER TABLE `news_cron`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `past_staff`
--
ALTER TABLE `past_staff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
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
-- AUTO_INCREMENT for table `board`
--
ALTER TABLE `board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `current_staff`
--
ALTER TABLE `current_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news_cron`
--
ALTER TABLE `news_cron`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `past_staff`
--
ALTER TABLE `past_staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
