-- Create the database if it does not exist
CREATE DATABASE IF NOT EXISTS `AJMS` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `AJMS`;

-- --------------------------------------------------------
-- Table structure for table `Roles`
--

CREATE TABLE `Roles` (
  `role_id` INT PRIMARY KEY AUTO_INCREMENT,
  `role_name` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert roles into the Roles table
INSERT INTO `Roles` (`role_name`) VALUES ('student'), ('admin');

-- --------------------------------------------------------
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `user_id` INT PRIMARY KEY AUTO_INCREMENT,
  `fname` VARCHAR(50) NOT NULL,
  `lname` VARCHAR(50) NOT NULL,
  `email` VARCHAR(255) NOT NULL UNIQUE,
  `role_id` INT NOT NULL,
   `psw` varchar(100) NOT NULL,
  FOREIGN KEY (`role_id`) REFERENCES `Roles`(`role_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Table structure for table `Policy`
--

CREATE TABLE `Policy` (
  `policy_id` INT PRIMARY KEY AUTO_INCREMENT,
  `description` TEXT NOT NULL,
  `last_update` DATE NOT NULL,
  `user_id` INT NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `Users`(`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Table structure for table `Cases`
--

CREATE TABLE `Cases` (
  `case_id` INT PRIMARY KEY AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `policy_id` INT NOT NULL,
  `description` TEXT NOT NULL,
  `verdict_status` VARCHAR(255) NOT NULL,
  `type` VARCHAR(255) NOT NULL,
  `report_date` DATE NOT NULL,
  FOREIGN KEY (`user_id`) REFERENCES `Users`(`user_id`) ON DELETE CASCADE,
  FOREIGN KEY (`policy_id`) REFERENCES `Policy`(`policy_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Table structure for table `Verdict`
--

CREATE TABLE `Verdict` (
  `case_id` INT NOT NULL,
  `verdict_description` TEXT NOT NULL,
  `verdict_date` DATE NOT NULL,
  PRIMARY KEY (`case_id`, `verdict_date`),
  FOREIGN KEY (`case_id`) REFERENCES `Cases`(`case_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
