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
  `psw` VARCHAR(100) NOT NULL,
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
-- Table structure for table `Reports`
--

CREATE TABLE `Reports` (
  `report_id` INT PRIMARY KEY AUTO_INCREMENT,
  `report_description` TEXT NOT NULL,
  `date_reported` DATE NOT NULL,
  `title` VARCHAR(255) NOT NULL,
  `user_id` INT NOT NULL,
  `evidence` VARCHAR(255), -- This column stores the file path or URL of the evidence
  FOREIGN KEY (`user_id`) REFERENCES `Users`(`user_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
-- Table structure for table `VerdictStatus`
--

CREATE TABLE `VerdictStatus` (
  `verdict_status_id` INT PRIMARY KEY AUTO_INCREMENT,
  `verdict_status_description` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert some default verdict statuses into the VerdictStatus table
INSERT INTO `VerdictStatus` (`verdict_status_description`) VALUES ('Pending'), ('Under Investigation'), ('Closed'), ('Resolved');

-- --------------------------------------------------------
-- Table structure for table `Cases`
--
CREATE TABLE `Cases` (
  `case_id` INT PRIMARY KEY AUTO_INCREMENT,
  `report_id` INT NOT NULL,
  `verdict_status_id` INT NOT NULL DEFAULT 1,
  `user_id` INT NOT NULL,
  `report_date` DATE NOT NULL,
  FOREIGN KEY (`report_id`) REFERENCES `Reports`(`report_id`),
  FOREIGN KEY (`verdict_status_id`) REFERENCES `VerdictStatus`(`verdict_status_id`),
  FOREIGN KEY (`user_id`) REFERENCES `Users`(`user_id`)
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

-- Create the Hearings table
CREATE TABLE `Hearings` (
  `hearing_id` INT PRIMARY KEY AUTO_INCREMENT,
  `meeting_title` VARCHAR(255) NOT NULL,
  `student_name` VARCHAR(255) NOT NULL,
  `student_email` VARCHAR(255) NOT NULL,
  `room_number` VARCHAR(50) NOT NULL,
  `meeting_date` DATE NOT NULL,
  `meeting_time` TIME NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Create a table for the persons in charge
CREATE TABLE `PersonsInCharge` (
  `person_id` INT PRIMARY KEY AUTO_INCREMENT,
  `hearing_id` INT NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  FOREIGN KEY (`hearing_id`) REFERENCES `Hearings`(`hearing_id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- Add CaseType table
CREATE TABLE `CaseType` (
  `case_type_id` INT PRIMARY KEY AUTO_INCREMENT,
  `case_type_description` VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert default case types into the CaseType table
INSERT INTO `CaseType` (`case_type_description`) VALUES 
('Academic Integrity'), 
('Behavioral Misconduct'), 
('Harassment'), 
('Discrimination'), 
('Substance Abuse'), 
('Vandalism'), 
('Theft'), 
('Other');



