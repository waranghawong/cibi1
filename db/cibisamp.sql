-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2023 at 04:00 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cibisamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `childprofiles`
--

CREATE TABLE `childprofiles` (
  `ChildID` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Gender` enum('Male','Female','Other') NOT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `GuardianName` varchar(255) DEFAULT NULL,
  `ContactNumber` varchar(20) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `RegistrationDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `childratings`
--

CREATE TABLE `childratings` (
  `RatingID` int(11) NOT NULL,
  `ChildID` int(11) NOT NULL,
  `FamilyIncome` decimal(10,2) DEFAULT NULL,
  `NumDependentChildren` int(11) DEFAULT NULL,
  `FamilyInvolvement` decimal(3,2) DEFAULT NULL,
  `EducationalAttainment` decimal(3,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `child_account`
--

CREATE TABLE `child_account` (
  `UserID` int(11) NOT NULL,
  `child_id` int(20) NOT NULL,
  `frist_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'child',
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `child_family_information`
--

CREATE TABLE `child_family_information` (
  `id` int(11) NOT NULL,
  `child_id` int(20) NOT NULL,
  `mother_name` varchar(50) NOT NULL,
  `mother_absent` varchar(50) NOT NULL,
  `mother_occupation` varchar(50) NOT NULL,
  `is_mother_guardian` int(1) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `fathger_absent` varchar(50) NOT NULL,
  `father_occupation` varchar(50) NOT NULL,
  `is_father_guardian` int(1) NOT NULL,
  `guardian_name` varchar(50) NOT NULL,
  `guardian_occupation` varchar(50) NOT NULL,
  `guardian_relationship` varchar(50) NOT NULL,
  `child_lives_with` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child_family_information`
--

INSERT INTO `child_family_information` (`id`, `child_id`, `mother_name`, `mother_absent`, `mother_occupation`, `is_mother_guardian`, `father_name`, `fathger_absent`, `father_occupation`, `is_father_guardian`, `guardian_name`, `guardian_occupation`, `guardian_relationship`, `child_lives_with`, `created_at`, `updated_at`) VALUES
(15, 95, 'Regina Bea', 'n/a', 'entrep', 0, 'Efren Bea', 'n/a', 'entrep', 0, 'n/a', 'n/a', 'n/a', 'Mother', '2023-11-14 16:24:50', '2023-11-14 08:24:50');

-- --------------------------------------------------------

--
-- Table structure for table `child_house_hold_information`
--

CREATE TABLE `child_house_hold_information` (
  `id` int(11) NOT NULL,
  `child_id` int(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `income` int(20) NOT NULL,
  `beds` int(20) NOT NULL,
  `no_of_persons` int(20) NOT NULL,
  `walls` varchar(50) NOT NULL,
  `roof` varchar(50) NOT NULL,
  `floor` varchar(50) NOT NULL,
  `house_condition` varchar(50) NOT NULL,
  `ownership_status` varchar(50) NOT NULL,
  `cooking_facility` varchar(50) NOT NULL,
  `water_source` varchar(50) NOT NULL,
  `electricity` varchar(50) NOT NULL,
  `sanitary_facility` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child_house_hold_information`
--

INSERT INTO `child_house_hold_information` (`id`, `child_id`, `address`, `income`, `beds`, `no_of_persons`, `walls`, `roof`, `floor`, `house_condition`, `ownership_status`, `cooking_facility`, `water_source`, `electricity`, `sanitary_facility`, `created_at`, `updated_at`) VALUES
(24, 95, 'Bonga Bacacay Albay', 10, 3, 6, 'bricks', 'yero', 'concrete', 'good', 'yes', 'complete', 'bomba', '300', 'none', '2023-11-14 16:22:43', '2023-11-14 08:22:43');

-- --------------------------------------------------------

--
-- Table structure for table `child_info`
--

CREATE TABLE `child_info` (
  `id` int(20) NOT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `ad_consent` varchar(10) DEFAULT NULL,
  `dob` date NOT NULL,
  `height` int(10) DEFAULT NULL,
  `weight` int(10) DEFAULT NULL,
  `eye_color` varchar(25) DEFAULT NULL,
  `hair_color` varchar(25) DEFAULT NULL,
  `pastimes` varchar(100) DEFAULT NULL,
  `talent_hobbies` varchar(100) DEFAULT NULL,
  `chores` varchar(100) DEFAULT NULL,
  `child_sleeps_on` varchar(100) DEFAULT NULL,
  `language_spoken` varchar(100) DEFAULT NULL,
  `has_account` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child_info`
--

INSERT INTO `child_info` (`id`, `first_name`, `last_name`, `middle_name`, `gender`, `ad_consent`, `dob`, `height`, `weight`, `eye_color`, `hair_color`, `pastimes`, `talent_hobbies`, `chores`, `child_sleeps_on`, `language_spoken`, `has_account`, `created_at`, `updated_at`) VALUES
(95, 'John Francis', 'Bea', 'Belisario', 'male', 'yes', '1994-12-03', 163, 60, 'black', 'black', 'watching tv', 'play basketball', 'wash dishes', 'parents', 'bicol', 0, '2023-11-14 16:21:45', '2023-11-14 08:21:45'),
(96, 'John Francis', 'Bea', 'Belisario', 'male', 'yes', '1994-12-03', 163, 60, 'black', 'brown', 'wash dishes', 'play basketball', 'wash dishes', 'parents', 'bicol', 0, '2023-11-15 18:50:28', '2023-11-15 10:50:28'),
(97, 'gasdf', 'asdf', 'sdfasdf', 'male', 'yes', '2023-11-23', 160, 60, 'black', 'black', 'basketball', 'play guitar', 'wash dishes', 'parents', 'bicol', 0, '2023-11-15 18:55:29', '2023-11-15 10:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `child_school_info`
--

CREATE TABLE `child_school_info` (
  `id` int(11) NOT NULL,
  `child_id` int(20) NOT NULL,
  `attends_school` varchar(100) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `school_type` varchar(100) NOT NULL,
  `academic_year` varchar(50) NOT NULL,
  `school_transportation` varchar(50) NOT NULL,
  `time_school_travel` varchar(50) NOT NULL,
  `recent_grade_level` varchar(50) NOT NULL,
  `current_grade_level` varchar(50) NOT NULL,
  `favorite_school_subject` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `child_school_info`
--

INSERT INTO `child_school_info` (`id`, `child_id`, `attends_school`, `school_name`, `school_type`, `academic_year`, `school_transportation`, `time_school_travel`, `recent_grade_level`, `current_grade_level`, `favorite_school_subject`, `created_at`, `updated_at`) VALUES
(20, 95, '', 'Lower Bonga Bacacay Albay', 'Public', '2023-2024', 'Tricycle', '30 minutes', 'Grade 6', '6', 'math', '2023-11-14 16:24:17', '2023-11-14 08:24:17');

-- --------------------------------------------------------

--
-- Table structure for table `educationalhistory`
--

CREATE TABLE `educationalhistory` (
  `EducationalHistoryID` int(11) NOT NULL,
  `ChildID` int(11) NOT NULL,
  `SchoolName` varchar(255) DEFAULT NULL,
  `GradeLevel` varchar(50) DEFAULT NULL,
  `EnrollmentDate` date DEFAULT NULL,
  `GraduationDate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medicalhistory`
--

CREATE TABLE `medicalhistory` (
  `MedicalHistoryID` int(11) NOT NULL,
  `ChildID` int(11) NOT NULL,
  `MedicalCondition` varchar(255) DEFAULT NULL,
  `Medications` varchar(255) DEFAULT NULL,
  `Allergies` varchar(255) DEFAULT NULL,
  `LastCheckupDate` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `id` int(11) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(50) NOT NULL,
  `program_name` varchar(100) NOT NULL,
  `program_description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `program_name`, `program_description`, `created_at`, `updated_at`) VALUES
(4, 'Health Familyssss', 'for all children whether they are registered or sponsored for health. The children must have medical history to provide them with care and service and must be 4 – 18 years old to attend this.', '2023-11-16 11:29:20', '2023-11-16 06:49:14'),
(6, 'Health Promotion', 'The CIBI will conduct and have a program based on their financial medical expense that the children must attend to.\nExample: Dental program for children who have bad teeth from 6 – 18 years old', '2023-11-16 11:33:00', '2023-11-16 03:35:16'),
(7, 'Social Accountability', 'The CIBI will conduct and have a program disadvantaged backgrounds involves empowering them to understand their rights, advocate for themselves given by the head on CIBI on what to attend by the children who are 8 – 18 years old ', '2023-11-16 12:15:00', '2023-11-16 04:15:00'),
(8, 'dflkasdjflkj', 'awefasdfsdf', '2023-11-18 02:22:10', '2023-11-17 18:22:10');

-- --------------------------------------------------------

--
-- Table structure for table `program_tags`
--

CREATE TABLE `program_tags` (
  `id` int(50) NOT NULL,
  `program_id` int(50) NOT NULL,
  `tag_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_tags`
--

INSERT INTO `program_tags` (`id`, `program_id`, `tag_name`) VALUES
(10, 5, 'health'),
(13, 6, 'financial medical expense'),
(14, 6, 'dental'),
(15, 6, '6-18 years old'),
(16, 7, '8-18 years old'),
(19, 4, 'health'),
(20, 4, '4-18 years old'),
(21, 8, 'health'),
(22, 8, '4-18 years old'),
(23, 8, 'elementary');

-- --------------------------------------------------------

--
-- Table structure for table `registered_siblings`
--

CREATE TABLE `registered_siblings` (
  `id` int(20) NOT NULL,
  `child_id` int(20) NOT NULL,
  `sibling_first_name` varchar(50) NOT NULL,
  `sibling_last_name` varchar(50) NOT NULL,
  `sibling_dob` date NOT NULL,
  `sibling_gender` varchar(10) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_siblings`
--

INSERT INTO `registered_siblings` (`id`, `child_id`, `sibling_first_name`, `sibling_last_name`, `sibling_dob`, `sibling_gender`, `created_at`, `updated_at`) VALUES
(4, 95, 'John Francis', 'Bea', '1994-12-03', 'male', '2023-11-14 16:27:41', '2023-11-14 08:27:41');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `schedule_name` varchar(100) NOT NULL,
  `schedule_category` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `schedule_name`, `schedule_category`, `date`, `time`, `created_at`, `updated_at`) VALUES
(1, 'ahhhh', 'hahaha', '2023-11-01', '16:02:00', '2023-11-15 12:01:24', '2023-11-15 04:32:59'),
(4, 'ehhhhh', 'wefawef', '2023-11-10', '12:29:00', '2023-11-15 12:25:17', '2023-11-15 04:32:49');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_of_events`
--

CREATE TABLE `schedule_of_events` (
  `id` int(50) NOT NULL,
  `program_id` int(50) NOT NULL,
  `program_description` varchar(50) NOT NULL,
  `no_of_days` int(5) NOT NULL,
  `date` date NOT NULL,
  `event_time` time NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule_of_events`
--

INSERT INTO `schedule_of_events` (`id`, `program_id`, `program_description`, `no_of_days`, `date`, `event_time`, `created_at`, `updated_at`) VALUES
(1, 4, 'gfgsdfsdfasdasd', 1, '2023-11-01', '00:00:00', '2023-11-17 14:05:58', '2023-11-17 13:05:58'),
(2, 7, 'asdasdwasdasd', 2, '2023-11-01', '00:00:00', '2023-11-17 14:31:13', '2023-11-17 13:31:13'),
(3, 6, 'dsafsdfadfasdfasdf', 3, '2023-11-01', '10:00:00', '2023-11-17 14:41:11', '2023-11-17 13:41:11'),
(4, 4, 'asdfasdfasdfasdfsdf', 5, '2023-11-01', '11:00:00', '2023-11-17 15:18:40', '2023-11-17 14:18:40'),
(5, 8, 'sdfagwergsdfgdfgdfg', 2, '2023-11-06', '02:24:00', '2023-11-17 19:22:25', '2023-11-17 18:22:25');

-- --------------------------------------------------------

--
-- Table structure for table `unregistered_siblings`
--

CREATE TABLE `unregistered_siblings` (
  `id` int(20) NOT NULL,
  `child_id` int(20) NOT NULL,
  `unreg_first_name` varchar(100) NOT NULL,
  `unreg_last_name` varchar(100) NOT NULL,
  `unreg_dob` date NOT NULL,
  `unreg_gender` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unregistered_siblings`
--

INSERT INTO `unregistered_siblings` (`id`, `child_id`, `unreg_first_name`, `unreg_last_name`, `unreg_dob`, `unreg_gender`, `created_at`, `updated_at`) VALUES
(21, 95, 'Jenifer ', 'Bea', '1993-01-30', 'male', '2023-11-14 16:26:54', '2023-11-14 08:26:54'),
(22, 95, 'Celeste ', 'Bea', '1999-10-26', 'male', '2023-11-14 16:26:54', '2023-11-14 08:26:54'),
(23, 95, 'Niña ', 'Bea', '2001-01-26', 'male', '2023-11-14 16:26:54', '2023-11-14 08:26:54'),
(24, 95, 'John Belo', 'Bea', '2006-10-06', 'male', '2023-11-14 16:26:54', '2023-11-14 08:26:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `user_management` int(1) NOT NULL,
  `child_profile` int(1) NOT NULL,
  `scheduler` int(1) NOT NULL,
  `reports` int(1) NOT NULL,
  `utilities` int(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `first_name`, `last_name`, `username`, `password`, `email`, `phoneNumber`, `address`, `role`, `user_management`, `child_profile`, `scheduler`, `reports`, `utilities`, `created_at`, `updated_at`) VALUES
(1, 'john', 'doe', 'john', 'doe', 'jhondoe@gmail.com', '09989898', '', 'Admin', 0, 0, 0, 0, 0, NULL, '2023-11-15 02:40:53'),
(2, 'qwerty', 'zxc', 'asda', 'd41d8cd98f00b204e9800998ecf8427e', 'sdf@gasd.com', '09123456798', 'fgaw', 'sub-admin', 0, 0, 0, 0, 0, '2023-11-15 08:14:14', '2023-11-15 00:58:51'),
(3, 'John', 'Bea', 'gffd', '7815696ecbf1c96e6894b779456d330e', 'sadasd@klgdsf.com', '093214567987', 'fdgsdf', 'sub-admin', 1, 1, 1, 1, 1, '2023-11-15 08:14:44', '2023-11-15 00:58:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `childprofiles`
--
ALTER TABLE `childprofiles`
  ADD PRIMARY KEY (`ChildID`);

--
-- Indexes for table `childratings`
--
ALTER TABLE `childratings`
  ADD PRIMARY KEY (`RatingID`),
  ADD KEY `FK_ChildRatings_Child` (`ChildID`);

--
-- Indexes for table `child_account`
--
ALTER TABLE `child_account`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `child_family_information`
--
ALTER TABLE `child_family_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_house_hold_information`
--
ALTER TABLE `child_house_hold_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_info`
--
ALTER TABLE `child_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_school_info`
--
ALTER TABLE `child_school_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `educationalhistory`
--
ALTER TABLE `educationalhistory`
  ADD PRIMARY KEY (`EducationalHistoryID`),
  ADD KEY `FK_EducationalHistory_Child` (`ChildID`);

--
-- Indexes for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  ADD PRIMARY KEY (`MedicalHistoryID`),
  ADD KEY `FK_MedicalHistory_Child` (`ChildID`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_tags`
--
ALTER TABLE `program_tags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ok1` (`program_id`);

--
-- Indexes for table `registered_siblings`
--
ALTER TABLE `registered_siblings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_of_events`
--
ALTER TABLE `schedule_of_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pk1` (`program_id`);

--
-- Indexes for table `unregistered_siblings`
--
ALTER TABLE `unregistered_siblings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `childprofiles`
--
ALTER TABLE `childprofiles`
  MODIFY `ChildID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228123;

--
-- AUTO_INCREMENT for table `childratings`
--
ALTER TABLE `childratings`
  MODIFY `RatingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `child_account`
--
ALTER TABLE `child_account`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `child_family_information`
--
ALTER TABLE `child_family_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `child_house_hold_information`
--
ALTER TABLE `child_house_hold_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `child_info`
--
ALTER TABLE `child_info`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `child_school_info`
--
ALTER TABLE `child_school_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `educationalhistory`
--
ALTER TABLE `educationalhistory`
  MODIFY `EducationalHistoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `medicalhistory`
--
ALTER TABLE `medicalhistory`
  MODIFY `MedicalHistoryID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `program_tags`
--
ALTER TABLE `program_tags`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `registered_siblings`
--
ALTER TABLE `registered_siblings`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedule_of_events`
--
ALTER TABLE `schedule_of_events`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unregistered_siblings`
--
ALTER TABLE `unregistered_siblings`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedule_of_events`
--
ALTER TABLE `schedule_of_events`
  ADD CONSTRAINT `pk1` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
