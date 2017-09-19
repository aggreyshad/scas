-- phpMyAdmin SQL Dump
-- version 4.3.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2016 at 08:50 AM
-- Server version: 5.5.16-log
-- PHP Version: 5.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scas`
--

-- --------------------------------------------------------

--
-- Table structure for table `aggregate`
--

CREATE TABLE IF NOT EXISTS `aggregate` (
  `aggregate_id` int(11) NOT NULL,
  `aggregate_name` varchar(100) NOT NULL,
  `aggregate_short_name` varchar(100) NOT NULL,
  `aggregate_value` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aggregate`
--

INSERT INTO `aggregate` (`aggregate_id`, `aggregate_name`, `aggregate_short_name`, `aggregate_value`) VALUES
(1, 'Distinction 1', 'D1', 1),
(2, 'Distinction 2', 'D2', 2),
(3, 'Credit 3', 'C3', 3),
(4, 'Credit 4', 'C4', 4),
(5, 'Credit 5', 'C5', 5),
(6, 'Credit 6', 'C6', 6),
(7, 'Pass 7', 'P7', 7),
(8, 'Pass 8', 'P8', 8),
(9, 'Failure 9', 'F9', 9);

-- --------------------------------------------------------

--
-- Table structure for table `career`
--

CREATE TABLE IF NOT EXISTS `career` (
  `career_id` int(11) NOT NULL,
  `career_name` varchar(255) NOT NULL,
  `career_details` text NOT NULL,
  `career_cat_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career`
--

INSERT INTO `career` (`career_id`, `career_name`, `career_details`, `career_cat_id`) VALUES
(1, 'Correctional Service Officers', 'Instill discipline among humans', 16),
(2, 'Early Childhood Educators and Assistants', 'Work with young children', 16),
(3, 'Instructors and Teachers of Persons with Disabilities', '<h3>Description</h3>\n\n<p>Instructors and teachers of persons with disabilities teach children and adults with physical and developmental disabilities communication techniques, such as Braille or sign language, and rehabilitation skills to increase independence and mobility. They are employed in rehabilitation centres, specialized educational institutes and throughout the elementary and secondary school system.</p>\n\n<h3>Main duties</h3>\n\n<ul>\n	<li>instruct students who are blind or visually impaired in reading and writing Braille and in the use of special equipment;</li>\n	<li>instruct students who are deaf or hearing impaired in lip-reading, finger spelling and sign language, according to individual communication needs;</li>\n	<li>instruct students who are hearing impaired in formation and development of sounds for speech using hearing aids and other devices;</li>\n	<li>instruct individuals with physical disabilities and their families in the use of rehabilitative techniques, prosthetic devices, wheelchairs and other equipment designed to minimize the effects of a disability;</li>\n	<li>assist individuals with intellectual impairments and physical disabilities to develop life skills and provide job training and support.</li>\n</ul>\n', 16),
(4, 'Paralegal and Related Occupations', '<h3><strong>Description :</strong></h3>\r\n\r\n<p>Legal assistants and paralegals prepare legal documents, maintain records and files and conduct research to assist lawyers or other professionals. Notaries public administer oaths, take affidavits, sign legal documents and perform other activities according to the limitations of their appointment. Trademark agents advise clients on intellectual property matters. Independent paralegals provide legal services to the public as allowed by law, or provide paralegal services on contract to law firms or other establishments. Legal assistants and paralegals are employed by law firms, by record search companies and in legal departments throughout the public and private sectors. Independent paralegals are usually self-employed. Trademark agents are employed by law firms and legal departments throughout the public and private sectors, trademark development and search firms or they may be self-employed. Notaries public are employed by government and in the public and private sectors or they may be self-employed.</p>\r\n\r\n<h3><strong>Main duties :</strong></h3>\r\n\r\n<p><strong>Legal assistants and paralegals</strong></p>\r\n\r\n<ul>\r\n	<li>assist lawyers by interviewing clients, witnesses and other related parties, assembling documentary evidence, preparing trial briefs, and arranging for trials;</li>\r\n	<li>prepare wills, real estate transactions and other legal documents, court reports and affidavits;</li>\r\n	<li>research records, court files and other legal documents;</li>\r\n	<li>draft legal correspondence and perform general office and clerical duties.</li>\r\n</ul>\r\n\r\n<p><strong>Notaries public</strong></p>\r\n\r\n<ul>\r\n	<li>administer oaths and take affidavits and depositions;</li>\r\n	<li>witness and certify the validity of signatures on documents;</li>\r\n	<li>may draft contracts, prepare promissory notes and draw up wills, mortgages and other legal documents;</li>\r\n	<li>may arrange probates and administer the estates of deceased persons.</li>\r\n</ul>\r\n\r\n<p><strong>Trademark agents</strong></p>\r\n\r\n<ul>\r\n	<li>advise clients on intellectual property matters and represent clients before the Registrar of Trade-Marks on matters including prosecution of applications for registration of trademarks;</li>\r\n	<li>advise on the registrability of trademarks, trademark licensing requirements, transfer of intellectual property and protection of existing trademark rights;</li>\r\n	<li>represent clients at proceedings before the Trade Marks Opposition Board and in related proceedings;</li>\r\n	<li>may represent clients internationally in consultation with foreign associates and attorneys.</li>\r\n</ul>\r\n\r\n<p><strong>Independent paralegals</strong></p>\r\n\r\n<ul>\r\n	<li>represent clients in small claims court and in other lower court proceedings, at tribunals and before administrative bodies ;</li>\r\n	<li>advise clients and take legal action on landlord and tenant matters, traffic violations, name changes and other issues within their jurisdictions.</li>\r\n</ul>\r\n', 16),
(5, 'Police Officers', '<h3><strong>Description :</strong></h3>\r\n\r\n<p>Police officers protect the public, detect and prevent crime and perform other activities directed at maintaining law and order. They are employed by municipal and federal governments, some provincial and regional governments and the Armed Forces.</p>\r\n\r\n<h3><strong>Main duties :</strong></h3>\r\n\r\n<ul>\r\n	<li>patrol assigned areas to maintain public safety and order and to enforce laws and regulations;</li>\r\n	<li>investigate crimes and accidents, secure evidence, interview witnesses, compile notes and reports and provide testimony in courts of law;</li>\r\n	<li>arrest criminal suspects;</li>\r\n	<li>provide emergency assistance to victims of accidents, crimes and natural disasters;</li>\r\n	<li>participate in crime prevention, public information and safety programs;</li>\r\n	<li>may supervise and co-ordinate the work of other police officers.</li>\r\n</ul>\r\n', 16),
(6, 'Accounting and Related Clerks', '<h3>Description :</h3>\r\n\r\n<p>This unit group includes clerks who calculate, prepare and process bills, invoices, accounts payable and receivable, budgets and other financial records according to established procedures. They are employed throughout the private and public sectors.</p>\r\n\r\n<h3>Main duties :</h3>\r\n\r\n<ul>\r\n	<li>calculate, prepare and issue documents related to accounts such as bills, invoices, inventory reports, account statements and other financial statements using computerized and manual systems;</li>\r\n	<li>code, total, batch, enter, verify and reconcile transactions such as accounts payable and receivable, payroll, purchase orders, cheques, invoices, cheque requisitions, and bank statements in a ledger or computer system;</li>\r\n	<li>compile budget data and documents based on estimated revenues and expenses and previous budgets;</li>\r\n	<li>prepare period or cost statements or reports;</li>\r\n	<li>calculate costs of materials, overhead and other expenses based on estimates, quotations, and price lists;</li>\r\n	<li>respond to customer inquiries, maintain good customer relations and solve problems;</li>\r\n	<li>perform related clerical duties, such as word processing, maintaining filing and record systems, faxing and photocopying</li>\r\n</ul>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `careercourse`
--

CREATE TABLE IF NOT EXISTS `careercourse` (
  `career_course_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `career_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `careercourse`
--

INSERT INTO `careercourse` (`career_course_id`, `course_id`, `career_id`) VALUES
(1, 14, 1),
(4, 36, 1),
(5, 37, 1),
(6, 14, 3),
(7, 15, 3),
(9, 37, 5),
(10, 37, 4);

-- --------------------------------------------------------

--
-- Table structure for table `career_cat`
--

CREATE TABLE IF NOT EXISTS `career_cat` (
  `career_cat_id` int(11) NOT NULL,
  `career_cat_name` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `career_cat`
--

INSERT INTO `career_cat` (`career_cat_id`, `career_cat_name`) VALUES
(1, 'Administration, Business and IT'),
(2, 'Agriculture and Fisheries'),
(3, 'Arts'),
(4, 'Beauty Care'),
(5, 'Buildings and Public Works'),
(6, 'Chemistry and Biology'),
(7, 'Communications and Documentation'),
(8, 'Electrotechnology'),
(9, 'Food and Tourism'),
(10, 'Health Services'),
(11, 'Maintenance Mechanics'),
(12, 'Mechanical Manufacturing'),
(13, 'Metallurgical Technology'),
(14, 'Mining and Site Operations'),
(15, 'Motorized Equipment Maintenance'),
(16, 'Social, Educational, and Legal Services'),
(17, 'Transportation'),
(18, 'Woodworking and Furniture Making'),
(19, 'Forestry and Paper');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'GENERAL PAPER'),
(2, 'HUMANITIES'),
(3, 'LANGUAGES'),
(4, 'MATHEMATICAL SUBJECTS'),
(5, 'SCIENCE SUBJECTS'),
(6, 'CULTURAL SUBJECTS AND OTHERS'),
(7, 'TECHNICAL SUBJECTS'),
(8, 'ENGLISH LANGUAGE'),
(9, 'BUSINESS STUDIES');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `class_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `name_numeric` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `name`, `name_numeric`) VALUES
(1, 'Senior 1', 1),
(2, 'Senior 2', 2),
(3, 'Senior 3', 3),
(4, 'Senior 4', 4),
(5, 'Senior 5', 5),
(6, 'Senior 6', 6);

-- --------------------------------------------------------

--
-- Table structure for table `combination`
--

CREATE TABLE IF NOT EXISTS `combination` (
  `combination_id` int(11) NOT NULL,
  `combination_name` varchar(25) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `combination`
--

INSERT INTO `combination` (`combination_id`, `combination_name`) VALUES
(1, 'HEG'),
(2, 'HEL'),
(3, 'PCB'),
(4, 'HED'),
(5, 'HDG'),
(6, 'EMP'),
(7, 'MPC'),
(8, 'GCB'),
(9, 'MCB'),
(10, 'EGM'),
(11, 'CBF'),
(12, 'EMA'),
(13, 'HEI');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `course_type` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_type`) VALUES
(1, 'Accounting', 'Bachelor of Science in'),
(2, 'Business Administration', 'Bachelor of'),
(3, ' Diary Industry and Business', 'Bachelor of Science in'),
(4, 'Feed Industry and Business', 'Bachelor of Science in'),
(5, 'Leather Industry and Business', 'Bachelor of Science in'),
(6, 'Meat Industy', 'Bachelor of Science in'),
(7, 'Laboratory Science Education', 'Bachelor of Science in'),
(8, 'Poultry and Business', 'Bachelor of Science in'),
(9, 'Agricultural Engineering', 'Bachelor of Science in'),
(10, 'Agribusiness Management', 'Bachelor of Science in'),
(11, 'Agriculture', 'Bachelor of Science in'),
(12, 'Architecture', 'Bachelor of'),
(13, 'Arts', 'Bachelor of Arts in'),
(14, 'Social Sciences', 'Bachelor of Arts in'),
(15, 'Adult and Community Education', 'Bachelor of'),
(16, 'Agricultural Land Use and Management', 'Bachelor of Science in'),
(17, 'Animal Production Technical and Management', 'Bachelor of'),
(18, 'Agricultural and Rural Innovation', 'Bachelor of'),
(19, 'Business Computing', 'Bachelor of'),
(20, 'Biomedical Engineering', 'Bachelor of Science in'),
(21, 'Business Statistics', 'Bachelor of'),
(22, 'Biotechnology', 'Bachelor of Science in'),
(23, 'Conservation Biology', 'Bachelor of Science in'),
(24, 'Community Psychology', 'Bachelor of'),
(25, 'Drama and Film', 'Bachelor of Arts in'),
(26, 'Dental Surgery', 'Bachelor of'),
(27, 'Dental Technology', 'Bachelor of Science in'),
(28, ' Economics', 'Bachelor of Arts in'),
(29, 'Environmental Health', 'Bachelor of'),
(30, ' Enterprenuership and Small Business Management', 'Bachelor of'),
(31, 'Information Technology', 'Bachelor of'),
(32, 'Fisheries and Aquaculture', 'Bachelor of Science in'),
(33, 'Human Resource Management', 'Bachelor of'),
(34, 'International Business', 'Bachelor of'),
(35, 'Industrial Chemisty', 'Bachelor of Science in'),
(36, 'Industrial and Organisation Psychology', 'Bachelor of'),
(37, 'Laws', 'Bachelor of'),
(38, 'Computer Science', 'Bachelor of Science in'),
(39, 'procurement', 'Diploma in');

-- --------------------------------------------------------

--
-- Table structure for table `coursesubject`
--

CREATE TABLE IF NOT EXISTS `coursesubject` (
  `coursesubject_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `requirement_type` int(11) NOT NULL COMMENT '1=Essential,2=Relevant,3=Desirable,4=Other,5=Essential&Relevant,6=Essential&Relevant&Desirable'
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursesubject`
--

INSERT INTO `coursesubject` (`coursesubject_id`, `course_id`, `subject_id`, `requirement_type`) VALUES
(1, 9, 15, 1),
(2, 9, 17, 1),
(3, 9, 19, 2),
(4, 9, 1, 3),
(5, 38, 15, 5),
(6, 38, 20, 5),
(7, 38, 1, 3),
(8, 38, 17, 5),
(9, 38, 7, 5),
(10, 38, 19, 5),
(11, 38, 18, 5),
(12, 38, 25, 5),
(13, 38, 26, 5),
(14, 38, 24, 5),
(15, 38, 3, 5),
(16, 38, 4, 5),
(17, 36, 2, 5),
(18, 36, 3, 5),
(19, 36, 4, 5),
(20, 36, 5, 5),
(21, 36, 6, 5),
(22, 36, 7, 5),
(23, 36, 8, 5),
(24, 36, 9, 5),
(25, 36, 10, 5),
(26, 36, 11, 5),
(27, 36, 12, 5),
(28, 36, 13, 5),
(29, 36, 14, 5),
(30, 36, 15, 5),
(31, 36, 17, 5),
(32, 36, 18, 5),
(33, 36, 19, 5),
(34, 36, 20, 5),
(35, 36, 21, 5),
(36, 36, 22, 5),
(37, 36, 23, 5),
(38, 36, 24, 5),
(39, 36, 25, 5),
(40, 36, 26, 5),
(41, 36, 27, 5),
(42, 36, 28, 5),
(43, 36, 1, 3),
(44, 36, 16, 3),
(45, 37, 2, 5),
(46, 37, 3, 5),
(47, 37, 4, 5),
(48, 37, 5, 5),
(49, 37, 6, 5),
(50, 37, 7, 5),
(51, 37, 8, 5),
(52, 37, 9, 5),
(53, 37, 10, 5),
(54, 37, 11, 5),
(55, 37, 12, 5),
(56, 37, 13, 5),
(57, 37, 14, 5),
(58, 37, 15, 5),
(59, 37, 17, 5),
(60, 37, 18, 5),
(61, 37, 19, 5),
(62, 37, 20, 5),
(63, 37, 21, 5),
(64, 37, 22, 5),
(65, 37, 23, 5),
(66, 37, 24, 5),
(67, 37, 25, 5),
(68, 37, 26, 5),
(69, 37, 27, 5),
(70, 37, 28, 5),
(71, 37, 1, 3),
(72, 37, 16, 3),
(73, 10, 15, 5),
(74, 10, 3, 5),
(75, 10, 20, 5),
(76, 10, 18, 5),
(77, 10, 19, 5),
(78, 10, 17, 5),
(79, 10, 7, 5),
(80, 10, 1, 3),
(81, 10, 16, 3);

-- --------------------------------------------------------

--
-- Table structure for table `cuttoffpoints`
--

CREATE TABLE IF NOT EXISTS `cuttoffpoints` (
  `cuttOffPoints_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `points` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuttoffpoints`
--

INSERT INTO `cuttoffpoints` (`cuttOffPoints_id`, `course_id`, `year`, `points`) VALUES
(1, 1, 2013, 25),
(2, 1, 2014, 28),
(3, 1, 2015, 30),
(4, 37, 2013, 35),
(5, 37, 2014, 37),
(6, 37, 2015, 43),
(7, 36, 2013, 42),
(8, 36, 2014, 49),
(9, 36, 2015, 52);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE IF NOT EXISTS `exams` (
  `exam_id` int(11) NOT NULL,
  `exam_name` varchar(225) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`exam_id`, `exam_name`) VALUES
(1, 'BOT'),
(2, 'MID'),
(3, 'EOT'),
(4, 'UCE'),
(5, 'UACE');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE IF NOT EXISTS `marks` (
  `mark_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `year` year(4) NOT NULL,
  `term` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `mark` int(11) NOT NULL,
  `aggregate_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`mark_id`, `student_id`, `subject_id`, `exam_id`, `year`, `term`, `class_id`, `mark`, `aggregate_id`) VALUES
(1, 11, 29, 4, 2014, 3, 4, 85, 1),
(2, 12, 29, 4, 2014, 3, 4, 72, 3),
(3, 13, 29, 4, 2014, 3, 4, 49, 8),
(4, 14, 29, 4, 2014, 3, 4, 65, 4),
(5, 15, 29, 4, 2014, 3, 4, 66, 4),
(6, 11, 44, 4, 2014, 3, 4, 99, 1),
(7, 12, 44, 4, 2014, 3, 4, 88, 1),
(8, 13, 44, 4, 2014, 3, 4, 82, 1),
(9, 14, 44, 4, 2014, 3, 4, 89, 1),
(10, 15, 44, 4, 2014, 3, 4, 74, 3),
(11, 11, 35, 4, 2014, 3, 4, 74, 3),
(12, 12, 35, 4, 2014, 3, 4, 68, 4),
(13, 13, 35, 4, 2014, 3, 4, 88, 1),
(14, 14, 35, 4, 2014, 3, 4, 72, 3),
(15, 15, 35, 4, 2014, 3, 4, 59, 6),
(16, 11, 36, 4, 2014, 3, 4, 74, 3),
(17, 12, 36, 4, 2014, 3, 4, 58, 6),
(18, 13, 36, 4, 2014, 3, 4, 68, 4),
(19, 14, 36, 4, 2014, 3, 4, 65, 4),
(20, 15, 36, 4, 2014, 3, 4, 49, 8),
(21, 11, 48, 4, 2014, 3, 4, 94, 1),
(22, 12, 48, 4, 2014, 3, 4, 73, 3),
(23, 13, 48, 4, 2014, 3, 4, 70, 3),
(24, 14, 48, 4, 2014, 3, 4, 65, 4),
(25, 15, 48, 4, 2014, 3, 4, 50, 7),
(26, 11, 49, 4, 2014, 3, 4, 77, 2),
(27, 12, 49, 4, 2014, 3, 4, 62, 5),
(28, 13, 49, 4, 2014, 3, 4, 59, 6),
(29, 14, 49, 4, 2014, 3, 4, 58, 6),
(30, 15, 49, 4, 2014, 3, 4, 45, 8),
(31, 11, 50, 4, 2014, 3, 4, 50, 7),
(32, 12, 50, 4, 2014, 3, 4, 55, 6),
(33, 13, 50, 4, 2014, 3, 4, 67, 4),
(34, 14, 50, 4, 2014, 3, 4, 79, 2),
(35, 15, 50, 4, 2014, 3, 4, 50, 7),
(36, 11, 32, 4, 2014, 3, 4, 77, 2),
(37, 12, 32, 4, 2014, 3, 4, 65, 4),
(38, 13, 32, 4, 2014, 3, 4, 55, 6),
(39, 14, 32, 4, 2014, 3, 4, 65, 4),
(40, 15, 32, 4, 2014, 3, 4, 77, 2),
(41, 15, 63, 4, 2014, 3, 4, 85, 1),
(42, 12, 64, 4, 2014, 3, 4, 76, 2),
(43, 13, 64, 4, 2014, 3, 4, 59, 6),
(44, 14, 47, 4, 2014, 3, 4, 82, 1),
(45, 14, 57, 4, 2014, 3, 4, 79, 2),
(46, 11, 39, 4, 2014, 3, 4, 88, 1),
(47, 13, 68, 4, 2014, 3, 4, 82, 1),
(48, 15, 68, 4, 2014, 3, 4, 71, 3),
(49, 11, 69, 4, 2014, 3, 4, 70, 3),
(50, 12, 67, 4, 2014, 3, 4, 57, 6),
(51, 13, 66, 4, 2014, 3, 4, 59, 6),
(52, 12, 65, 4, 2014, 3, 4, 81, 1),
(53, 1, 69, 1, 2014, 1, 1, 82, 1),
(54, 2, 69, 1, 2014, 1, 1, 71, 3),
(55, 4, 69, 1, 2014, 1, 1, 59, 6),
(56, 7, 69, 1, 2014, 1, 1, 12, 9),
(57, 8, 69, 1, 2014, 1, 1, 73, 3),
(58, 9, 69, 1, 2014, 1, 1, 85, 1),
(59, 1, 44, 1, 2014, 1, 1, 85, 1),
(60, 2, 44, 1, 2014, 1, 1, 84, 1),
(61, 3, 44, 1, 2014, 1, 1, 74, 3),
(62, 4, 44, 1, 2014, 1, 1, 65, 4),
(63, 6, 44, 1, 2014, 1, 1, 65, 4),
(64, 7, 44, 1, 2014, 1, 1, 78, 2),
(65, 8, 44, 1, 2014, 1, 1, 44, 9),
(66, 9, 44, 1, 2014, 1, 1, 69, 4),
(67, 16, 29, 4, 2014, 3, 4, 70, 3),
(68, 16, 44, 4, 2014, 3, 4, 75, 2),
(69, 16, 35, 4, 2014, 3, 4, 80, 1),
(70, 16, 36, 4, 2014, 3, 4, 85, 1),
(71, 16, 48, 4, 2014, 3, 4, 60, 5),
(72, 16, 49, 4, 2014, 3, 4, 45, 8),
(73, 16, 50, 4, 2014, 3, 4, 65, 4),
(74, 16, 34, 4, 2014, 3, 4, 75, 2),
(75, 16, 51, 4, 2014, 3, 4, 80, 1),
(76, 16, 69, 4, 2014, 3, 4, 50, 7),
(77, 17, 29, 4, 2014, 3, 4, 85, 1),
(78, 17, 44, 4, 2014, 3, 4, 77, 2),
(79, 17, 35, 4, 2014, 3, 4, 65, 4),
(80, 17, 36, 4, 2014, 3, 4, 65, 4),
(81, 17, 48, 4, 2014, 3, 4, 50, 7),
(82, 17, 49, 4, 2014, 3, 4, 45, 8),
(83, 17, 50, 4, 2014, 3, 4, 55, 6),
(84, 17, 63, 4, 2014, 3, 4, 66, 4),
(85, 17, 51, 4, 2014, 3, 4, 70, 3),
(86, 17, 32, 4, 2014, 3, 4, 70, 3),
(87, 17, 61, 4, 2014, 3, 4, 89, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL,
  `student_surname` varchar(30) NOT NULL,
  `student_othernames` varchar(30) NOT NULL,
  `class_id` int(11) NOT NULL,
  `stream` varchar(5) NOT NULL,
  `sex` char(1) NOT NULL COMMENT 'M=Male,F=Female',
  `dob` date NOT NULL,
  `student_email` varchar(60) NOT NULL,
  `o_level_index` varchar(10) NOT NULL,
  `a_level_index` varchar(10) NOT NULL,
  `nationality` varchar(60) NOT NULL,
  `level` char(1) NOT NULL COMMENT 'O=O Level, A=A Level',
  `student_password` varchar(255) NOT NULL,
  `admission_date` datetime NOT NULL,
  `student_photofile` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_surname`, `student_othernames`, `class_id`, `stream`, `sex`, `dob`, `student_email`, `o_level_index`, `a_level_index`, `nationality`, `level`, `student_password`, `admission_date`, `student_photofile`) VALUES
(1, 'Isaakwa', 'Peter', 1, 'A', 'M', '1991-06-02', 'isaakwapeter@gmail.com', '', '', 'Uganda', 'O', 'e9fd588b5872543d86c44e763356a495', '2016-03-19 09:27:50', ''),
(2, 'Muhammad', 'Irfan', 1, 'A', 'M', '1991-12-01', 'mouhammadirfan@gmail.com', '', '', 'Uganda', 'O', 'e9fd588b5872543d86c44e763356a495', '2016-03-19 09:27:50', ''),
(3, 'Kate', 'Noah', 1, 'A', 'M', '1991-01-01', 'katenoah@gmail.com', '', '', 'Uganda', 'O', 'e9fd588b5872543d86c44e763356a495', '2016-03-19 09:27:50', ''),
(4, 'Mulinda', 'Sadat', 1, 'A', 'M', '1988-01-01', 'sadat@gmail.com', '', '', 'Uganda', 'O', 'e9fd588b5872543d86c44e763356a495', '2016-03-19 09:27:50', ''),
(5, 'kiryowa', 'moses', 6, 'B', 'F', '1993-02-23', 'moses@ab.com', '', '', 'Uganda', 'A', 'e9fd588b5872543d86c44e763356a495', '2016-03-19 14:37:59', ''),
(6, 'komakeche', 'Peter', 1, 'A', 'M', '1992-04-02', 'koma@gmail.com', '', '', 'Uganda', 'O', 'e9fd588b5872543d86c44e763356a495', '2016-03-19 15:03:24', ''),
(7, 'katamba', 'Irfan', 1, 'A', 'M', '1988-04-04', 'katamba@gmail.com', '', '', 'Uganda', 'O', 'e9fd588b5872543d86c44e763356a495', '2016-03-19 15:03:25', ''),
(8, 'ssegirinya', 'Noah', 1, 'A', 'M', '1989-04-04', 'noah@gmail.com', '', '', 'Uganda', 'O', 'e9fd588b5872543d86c44e763356a495', '2016-03-19 15:03:25', ''),
(9, 'lutankome', 'Sadat', 1, 'A', 'M', '1994-04-02', 'llsadat@gmail.com', '', '', 'Uganda', 'O', 'e9fd588b5872543d86c44e763356a495', '2016-03-19 15:03:25', ''),
(10, 'Hawumba', 'Jonah', 2, 'A', 'M', '1999-02-02', 'jonah_hawumba@gmail.com', '', '', 'Uganda', 'O', 'e9fd588b5872543d86c44e763356a495', '2016-03-21 17:06:26', ''),
(11, 'Obbo', 'Francis', 4, 'A', 'M', '1991-02-02', 'francisobbo@gmail.com', '', '', 'Uganda', 'O', 'e9fd588b5872543d86c44e763356a495', '2016-03-30 14:53:47', ''),
(12, 'Mawerere', 'Lawrence', 4, 'A', 'M', '1991-07-22', 'mawererelawrence@gmail.com', '', '', 'Uganda', 'O', 'e9fd588b5872543d86c44e763356a495', '2016-03-30 14:55:42', ''),
(13, 'Kasamba', 'Esther', 4, 'A', 'F', '1991-04-02', 'kasambaesther@gmail.com', '', '', 'Uganda', 'O', 'e9fd588b5872543d86c44e763356a495', '2016-03-30 14:57:20', ''),
(14, 'Ibiara', 'Sara', 4, 'A', 'M', '1990-06-22', 'ibiarasara@gmail.com', '', '', 'Uganda', 'O', 'e9fd588b5872543d86c44e763356a495', '2016-03-30 14:58:33', ''),
(15, 'Kayizi', 'Joshua', 4, 'A', 'M', '1990-04-01', 'kayizijoshua@gmail.com', '', '', 'Kazakhstan', 'O', 'e9fd588b5872543d86c44e763356a495', '2016-03-30 15:00:06', ''),
(16, 'Luwambo', 'Raymond', 4, 'A', 'M', '1997-06-15', 'luwambo11@gmail.com', '', '', 'Uganda', 'O', 'e9fd588b5872543d86c44e763356a495', '2016-04-10 17:18:56', ''),
(17, 'Iporotum', 'Jeff', 4, 'A', 'M', '1994-06-08', 'jeffiporotum@gmail.com', '', '', 'Uganda', 'O', 'e9fd588b5872543d86c44e763356a495', '2016-05-13 15:49:14', '');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(60) NOT NULL,
  `subject_short_name` varchar(10) NOT NULL,
  `level` char(1) NOT NULL,
  `category_id` int(11) NOT NULL,
  `code` varchar(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `subject_name`, `subject_short_name`, `level`, `category_id`, `code`) VALUES
(1, 'GENERAL PAPER', 'GP', 'A', 1, 'S101'),
(2, 'History', 'HIS', 'A', 2, 'P210'),
(3, 'Economics', 'ECON', 'A', 2, 'P220'),
(4, 'Entrepreneurship Education', 'ENT', 'A', 2, 'P230'),
(5, 'Islamic Religious Education', 'IRE', 'A', 2, 'P235'),
(6, 'Christian Religious Education', 'CRE', 'A', 2, 'P245'),
(7, 'Geography', 'GEOG', 'A', 2, 'P250'),
(8, 'Literature in English', 'LIT', 'A', 3, 'P310'),
(9, 'Kiswahili', 'KIS', 'A', 3, 'P320'),
(10, 'French', 'FRE', 'A', 3, 'P330'),
(11, 'German', 'GER', 'A', 3, 'P340'),
(12, 'Latin', 'LAT', 'A', 3, 'P350'),
(13, 'Luganda', 'LUG', 'A', 3, 'P360'),
(14, 'Arabic', 'ARA', 'A', 3, 'P370'),
(15, 'Mathematics', 'MATHS', 'A', 4, 'P425'),
(16, 'Mathematics (Subsidiary)', 'MATHS', 'A', 4, 'S475'),
(17, 'Physics', 'PHY', 'A', 5, 'P510'),
(18, 'Agriculture: Principles and Practice', 'AGR', 'A', 5, 'P515'),
(19, 'Chemistry', 'CHE', 'A', 5, 'P525'),
(20, 'Biology', 'BIO', 'A', 5, 'P530'),
(21, 'Art', 'ART', 'A', 6, 'P615'),
(22, 'Music', 'MUS', 'A', 6, 'P620'),
(23, 'Clothing and Textiles', 'CLOTH', 'A', 6, 'P630'),
(24, 'Foods and Nutrition', 'FN', 'A', 6, 'P640'),
(25, 'Geometrical and Mechanical Drawing', 'GM', 'A', 7, 'P710'),
(26, 'Geometrical and Building Drawing', 'GB', 'A', 7, 'P720'),
(27, 'Woodwork', 'WW', 'A', 7, 'P730'),
(28, 'Engineering Metalwork', 'EM', 'A', 7, 'P740'),
(29, 'English Language', 'ENG', 'O', 8, '112'),
(30, 'Literature in English', 'LIT', 'O', 2, '208'),
(31, 'Fasihi ya Kiswahili', 'SWA', 'O', 2, '218'),
(32, 'Christian Religious Education', 'CRE', 'O', 2, '223'),
(33, 'Christian Religious Education', 'CR.E', 'O', 2, '224'),
(34, 'Islamic Religious Education', 'IRE', 'O', 2, '225'),
(35, 'History', 'HIS', 'O', 2, '241'),
(36, 'Geography', 'GEO', 'O', 2, '273'),
(37, 'Political Education', 'POL', 'O', 2, '285'),
(38, 'Latin', 'LAT', 'O', 3, '301'),
(39, 'German', 'GER', 'O', 3, '309'),
(40, 'French', 'FRE', 'O', 3, '314'),
(41, 'Luganda', 'LUG', 'O', 3, '335'),
(42, 'Lugha ya Kiswahili', 'KIS.L', 'O', 3, '336'),
(43, 'Arabic Language', 'ARA', 'O', 3, '337'),
(44, 'Mathematics', 'MAT', 'O', 4, '456'),
(45, 'Additional Mathematics', 'AM', 'O', 4, '475'),
(46, 'General Science', 'GS', 'O', 5, '500'),
(47, 'Agriculture: Principles & Practice.', 'AGRI', 'O', 5, '527'),
(48, 'Physics', 'PHY', 'O', 5, '535'),
(49, 'Chemistry', 'CHE', 'O', 5, '545'),
(50, 'Biology', 'BIO', 'O', 5, '553'),
(51, 'Art', 'ART', 'O', 6, '610'),
(52, 'Music', 'MUS', 'O', 6, '621'),
(53, 'Health Education', 'HE', 'O', 6, '631'),
(54, 'Clothing & Textile', 'CLO', 'O', 6, '652'),
(55, 'Foods & Nutrition', 'FN', 'O', 6, '662'),
(56, 'Home Management', 'HM', 'O', 6, '672'),
(57, 'Woodwork', 'WW', 'O', 7, '732'),
(58, 'Technical Drawing', 'TD', 'O', 7, '735'),
(59, 'Metalwork', 'MW', 'O', 7, '742'),
(60, 'Building Construction', 'BC', 'O', 7, '743'),
(61, 'Electricity & Electronics', 'E&E', 'O', 7, '751'),
(62, 'Power & Energy', 'P&E', 'O', 7, '752'),
(63, 'Commerce', 'COM', 'O', 9, '800'),
(64, 'Principles of Accounts', 'ACC', 'O', 9, '810'),
(65, 'Shorthand', 'SH', 'O', 9, '820'),
(66, 'Typewriting', 'TW', 'O', 9, '831'),
(67, 'Office Practice', 'OP', 'O', 9, '835'),
(68, 'Computer Studies', 'CS', 'O', 9, '840'),
(69, 'Entrepreneurship Skills', 'ENT.S', 'O', 9, '845');

-- --------------------------------------------------------

--
-- Table structure for table `subjectcombination`
--

CREATE TABLE IF NOT EXISTS `subjectcombination` (
  `subject_combination_id` int(11) NOT NULL,
  `combination_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjectcombination`
--

INSERT INTO `subjectcombination` (`subject_combination_id`, `combination_id`, `subject_id`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 7),
(4, 2, 2),
(5, 2, 3),
(6, 2, 8),
(7, 3, 17),
(8, 3, 19),
(9, 3, 20),
(10, 4, 2),
(11, 4, 3),
(12, 4, 6),
(13, 5, 2),
(14, 5, 6),
(15, 5, 7),
(16, 6, 3),
(17, 6, 15),
(18, 6, 17),
(19, 7, 15),
(20, 7, 17),
(21, 7, 19),
(22, 8, 7),
(23, 8, 19),
(24, 8, 20),
(25, 9, 15),
(26, 9, 19),
(27, 9, 20),
(28, 10, 3),
(29, 10, 7),
(30, 10, 15),
(31, 11, 19),
(32, 11, 20),
(33, 11, 24),
(34, 12, 4),
(35, 12, 15),
(36, 12, 21),
(37, 13, 2),
(38, 13, 4),
(39, 13, 5);

-- --------------------------------------------------------

--
-- Table structure for table `subjectprerequisites`
--

CREATE TABLE IF NOT EXISTS `subjectprerequisites` (
  `sp_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `o_level_subject_id` int(11) NOT NULL,
  `aggregate_id` int(11) NOT NULL COMMENT 'Minimun Aggreate ID',
  `type` int(11) NOT NULL COMMENT '1=Required,0=Desirable'
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subjectprerequisites`
--

INSERT INTO `subjectprerequisites` (`sp_id`, `subject_id`, `o_level_subject_id`, `aggregate_id`, `type`) VALUES
(1, 2, 35, 5, 1),
(2, 2, 37, 5, 0),
(10, 4, 69, 5, 1),
(11, 4, 63, 5, 0),
(17, 5, 34, 5, 1),
(18, 6, 32, 5, 2),
(19, 6, 33, 5, 2),
(20, 7, 36, 5, 1),
(21, 8, 29, 5, 1),
(22, 8, 30, 5, 0),
(23, 9, 31, 5, 2),
(24, 9, 42, 5, 2),
(25, 10, 40, 5, 1),
(26, 11, 39, 5, 1),
(27, 12, 38, 5, 1),
(28, 13, 41, 5, 1),
(29, 14, 43, 5, 1),
(30, 15, 44, 5, 1),
(31, 15, 45, 5, 0),
(32, 16, 44, 5, 1),
(33, 16, 45, 5, 0),
(35, 17, 48, 5, 1),
(36, 18, 47, 5, 1),
(37, 18, 46, 5, 0),
(38, 18, 48, 5, 0),
(39, 18, 49, 5, 0),
(40, 18, 50, 5, 0),
(41, 19, 49, 5, 1),
(42, 20, 50, 5, 1),
(43, 20, 46, 5, 0),
(44, 20, 47, 5, 0),
(45, 20, 53, 5, 0),
(46, 20, 55, 5, 0),
(47, 21, 51, 5, 1),
(48, 22, 52, 5, 1),
(49, 23, 54, 5, 1),
(50, 23, 51, 5, 0),
(51, 23, 56, 5, 0),
(52, 24, 55, 5, 2),
(53, 24, 56, 5, 2),
(54, 24, 53, 5, 0),
(55, 24, 46, 5, 0),
(56, 24, 50, 5, 0),
(57, 24, 47, 5, 0),
(58, 24, 49, 5, 0),
(60, 27, 57, 6, 1),
(61, 27, 58, 6, 0),
(62, 25, 58, 7, 2),
(63, 25, 59, 7, 2),
(64, 25, 61, 6, 0),
(65, 25, 62, 6, 0),
(76, 4, 64, 5, 0),
(77, 26, 58, 6, 2),
(78, 26, 60, 6, 2),
(79, 26, 62, 6, 0),
(80, 3, 63, 5, 2),
(81, 3, 64, 5, 2),
(82, 3, 69, 6, 2),
(83, 3, 67, 6, 0),
(84, 3, 68, 5, 0),
(86, 3, 66, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `full_name` varchar(90) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `joining_date` datetime NOT NULL,
  `user_tel` varchar(20) NOT NULL,
  `user_role` int(11) NOT NULL COMMENT '0=Admin,1=Teacher,2=Student',
  `photofile` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `full_name`, `user_email`, `user_password`, `joining_date`, `user_tel`, `user_role`, `photofile`) VALUES
(1, 'Moses', 'Mpiima Moses', 'mosesm@gmail.com', 'e9fd588b5872543d86c44e763356a495', '2016-03-14 21:25:48', '+256 778 856137', 0, ''),
(2, 'Sarah', 'Sara Abeja', 'abeja@gmail.com', 'e9fd588b5872543d86c44e763356a495', '2016-03-14 21:28:39', '+256 712 345678', 0, ''),
(3, 'Aggrey', 'Ibanda Aggrey', 'aggrey.ibanda@gmail.com', 'e9fd588b5872543d86c44e763356a495', '2016-03-16 06:13:33', '+256 778 856137', 0, ''),
(4, 'Nakato', ' Nakato Goretti', 'nakatogoretti@gmail.com', 'e9fd588b5872543d86c44e763356a495', '2016-03-16 06:26:49', '', 0, ''),
(5, 'Odongo', ' Odongo Ben', ' odongoben@gmail.com', 'e9fd588b5872543d86c44e763356a495', '2016-03-16 06:26:55', '', 0, ''),
(6, 'Omodingi', ' Omodingi Emmanuel', 'omodingi@gmail.com', 'e9fd588b5872543d86c44e763356a495', '2016-03-16 06:27:28', '', 1, ''),
(7, 'Irene', ' Nakacha', 'irene@gmail.com', 'e9fd588b5872543d86c44e763356a495', '2016-03-16 06:39:17', '', 1, ''),
(8, 'Janet', 'Janet Lackie', 'jannet@gmail.com', 'e9fd588b5872543d86c44e763356a495', '2016-03-16 06:39:54', '', 1, ''),
(9, 'Katongole', 'Katongole  Ismael', 'Ishmael@gmail.com', 'e9fd588b5872543d86c44e763356a495', '2016-03-16 06:55:00', '', 1, ''),
(10, 'Mulondo', 'Mulonngo Goretti', 'mgoretti@gmail.com', 'e9fd588b5872543d86c44e763356a495', '2016-03-16 07:12:02', '', 1, ''),
(11, 'Gladys', 'Nakato Gladys', 'nakatogladys@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '2016-03-17 10:24:06', '+256 712 345888', 1, ''),
(12, 'Beatrice', ' Ndyamureeba Beatrice', 'triosh@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '2016-03-17 10:25:54', '', 0, ''),
(13, 'Joshua', ' Joshua Muhanguzi', 'josh@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '2016-03-17 10:26:06', '', 0, ''),
(14, 'Mulinda', 'Mulinde Saddat', 'mulinda44@gmail.com', 'e9fd588b5872543d86c44e763356a495', '2016-03-19 14:32:43', '+256 775 411028', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aggregate`
--
ALTER TABLE `aggregate`
  ADD PRIMARY KEY (`aggregate_id`);

--
-- Indexes for table `career`
--
ALTER TABLE `career`
  ADD PRIMARY KEY (`career_id`);

--
-- Indexes for table `careercourse`
--
ALTER TABLE `careercourse`
  ADD PRIMARY KEY (`career_course_id`);

--
-- Indexes for table `career_cat`
--
ALTER TABLE `career_cat`
  ADD PRIMARY KEY (`career_cat_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `combination`
--
ALTER TABLE `combination`
  ADD PRIMARY KEY (`combination_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `coursesubject`
--
ALTER TABLE `coursesubject`
  ADD PRIMARY KEY (`coursesubject_id`);

--
-- Indexes for table `cuttoffpoints`
--
ALTER TABLE `cuttoffpoints`
  ADD PRIMARY KEY (`cuttOffPoints_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`mark_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `subjectcombination`
--
ALTER TABLE `subjectcombination`
  ADD PRIMARY KEY (`subject_combination_id`);

--
-- Indexes for table `subjectprerequisites`
--
ALTER TABLE `subjectprerequisites`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aggregate`
--
ALTER TABLE `aggregate`
  MODIFY `aggregate_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `career`
--
ALTER TABLE `career`
  MODIFY `career_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `careercourse`
--
ALTER TABLE `careercourse`
  MODIFY `career_course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `career_cat`
--
ALTER TABLE `career_cat`
  MODIFY `career_cat_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `combination`
--
ALTER TABLE `combination`
  MODIFY `combination_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `coursesubject`
--
ALTER TABLE `coursesubject`
  MODIFY `coursesubject_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `cuttoffpoints`
--
ALTER TABLE `cuttoffpoints`
  MODIFY `cuttOffPoints_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `subjectcombination`
--
ALTER TABLE `subjectcombination`
  MODIFY `subject_combination_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `subjectprerequisites`
--
ALTER TABLE `subjectprerequisites`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
