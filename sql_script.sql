-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2021 at 04:24 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `last`
--

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `stdLevel` int(11) NOT NULL,
  `stdBooks` varchar(255) NOT NULL,
  `stdid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admission`
--

INSERT INTO `admission` (`stdLevel`, `stdBooks`, `stdid`) VALUES
(0, 'book test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `TeacherID` int(11) NOT NULL,
  `CourseId` varchar(255) NOT NULL,
  `DueDate` date NOT NULL,
  `AssignFile` varchar(255) NOT NULL,
  `AssignID` int(11) NOT NULL,
  `assignStatus` int(11) NOT NULL,
  `assignSolution` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`TeacherID`, `CourseId`, `DueDate`, `AssignFile`, `AssignID`, `assignStatus`, `assignSolution`, `year`) VALUES
(1, 'cs100', '2021-01-27', '', 1, 0, 0, 2),
(1, 'cs314', '0000-00-00', 'bla bla', 2, 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `attendState` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `date`, `attendState`) VALUES
(1, '2021-01-12', 1),
(9, '2021-01-12', 0);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `StudentId` int(11) NOT NULL,
  `courseCode` varchar(255) NOT NULL,
  `courseName` varchar(255) NOT NULL,
  `CourseDesc` varchar(255) NOT NULL,
  `NumTeachers` int(11) NOT NULL,
  `CourseMatrial` varchar(255) NOT NULL,
  `studentName` varchar(250) NOT NULL,
  `teacherEnrolled` int(11) NOT NULL,
  `courseYear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`StudentId`, `courseCode`, `courseName`, `CourseDesc`, `NumTeachers`, `CourseMatrial`, `studentName`, `teacherEnrolled`, `courseYear`) VALUES
(6, 'code2', 'name2', 'desc2', 0, '', '', 3, 2),
(1, 'cs100', 'test', '', 1, '', '', 1, 1),
(2, 'cs314', 'OOP', '', 2, '', '', 2, 2),
(3, 'cs351', 'OS', '', 3, '', '', 3, 2),
(6, 'cserror404', 'course name', 'ddkfnsdkn', 0, '', '', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `ExamID` int(11) NOT NULL,
  `ExamName` varchar(255) NOT NULL,
  `ExamDate` date NOT NULL,
  `ExamRes` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `Year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`ExamID`, `ExamName`, `ExamDate`, `ExamRes`, `StudentID`, `Year`) VALUES
(0, 'compiler', '2021-01-26', 3, 6, 2),
(1, 'CS351', '2021-01-13', 21, 3, 1),
(2, 'CS314', '2021-01-22', 31, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `ID` int(11) NOT NULL,
  `subTitle` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`ID`, `subTitle`, `Description`) VALUES
(191523, 'sub title', 'the mail had been changed to new time is '),
(191525, 'sub', 'body'),
(191527, 'sybtitle', 'body body'),
(191528, 'last test', 'test last'),
(191534, 'test', 'test first email');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `QuizID` int(11) NOT NULL,
  `DueDate` date NOT NULL,
  `QuizRes` int(11) NOT NULL,
  `teacherId` int(11) NOT NULL,
  `QuizName` varchar(255) NOT NULL,
  `QYear` int(11) NOT NULL,
  `stdId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`QuizID`, `DueDate`, `QuizRes`, `teacherId`, `QuizName`, `QYear`, `stdId`) VALUES
(1, '2021-01-19', 7, 1, 'cs100', 2, 3),
(2, '2021-01-21', 7, 3, 'cs100', 2, 7),
(3, '2021-01-30', 6, 2, 'cs314', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `stdid` int(11) NOT NULL,
  `day` varchar(255) NOT NULL,
  `Time Slot` varchar(255) NOT NULL,
  `roomID` varchar(255) NOT NULL,
  `courseID` varchar(255) NOT NULL,
  `groupType` varchar(255) NOT NULL,
  `groupNo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`stdid`, `day`, `Time Slot`, `roomID`, `courseID`, `groupType`, `groupNo`) VALUES
(1, 'Sunday', 'From 11:00 to 12:30', 'G103 A', 'CS313', 'Lecture', 'A-W1'),
(2, 'Sunday', 'From 09:30 to 11:00', 'G103 A', 'CS316', 'Lecture', 'A-W1'),
(3, 'Monday', 'From 11:00 to 12:30', 'D102', 'CS351', 'lab', 'A-W2');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentId` int(10) NOT NULL,
  `studentName` varchar(10) DEFAULT NULL,
  `studentEmail` varchar(30) DEFAULT NULL,
  `stdRes` int(11) NOT NULL,
  `Level` int(11) NOT NULL,
  `payment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentId`, `studentName`, `studentEmail`, `stdRes`, `Level`, `payment`) VALUES
(1, 'soliman', 'ahmedeasa48@gmail.com', 0, 0, 1),
(2, 'issa', 'test@gmail.com', 0, 0, 0),
(3, 'othman', 'o.3@gmail.com', 3, 0, 0),
(6, 'soli', 'soli@soli', 2, 2, 1),
(7, 'soliman2', 'soliman@gmail.com', 4, 2, 0),
(10, 'yassin', 'yas@gmail.com', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacherID` int(11) NOT NULL,
  `teacherName` varchar(255) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherID`, `teacherName`, `salary`) VALUES
(1, 'esmat', 5000),
(2, '', 1000),
(3, 'othman', 1000),
(9, 'solo', 3000),
(11, 'osama', 5000),
(12, 'yassin', 4000),
(13, 'ibrahim', 5000),
(14, 'samir', 6000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userName` varchar(255) NOT NULL,
  `userAddress` varchar(255) NOT NULL,
  `userEmail` varchar(255) NOT NULL,
  `userPassword` varchar(255) NOT NULL,
  `userType` int(11) NOT NULL,
  `fullName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userName`, `userAddress`, `userEmail`, `userPassword`, `userType`, `fullName`) VALUES
(1, 'esmat', 'nasr city', 'o.3@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2, ' esmat mohamed'),
(2, 'issa', 'sfnsd', 'ahmed.mohamed305@msa.edu.eg', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1, ''),
(3, 'othman', 'nasr city', 'o.3@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 3, 'Othman esmat'),
(4, 'solyuhbn', 'fiivj', 'ss@ss', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 3, ''),
(5, 'salem', 'Teacher1 Address', 'salem@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 4, 'salem ibrahim'),
(6, 'soli', 'soli', 'soli@soli', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 4, 'df'),
(7, 'soliman2', 'giza', 'soliman.harby@msa.edu.eg', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 3, ''),
(8, 'jhg', '', 'salamasoliman610@gmial.com', 'ca643fd25af92dae8826e5a8051cc90f71e3f6dc', 3, 'kjg'),
(9, 'solo', '', '12@muscel', '8b583aa0ac7f15508192f2ea1c56b9a07eb48e38', 2, 'ovic'),
(10, 'yassin', 'nasrcity', 'yas@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 3, ''),
(11, 'osama', 'new cairo', 'osos@hotmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2, 'OsamaMohamed'),
(12, 'yassin', 'nasrcity', 'yas@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2, 'yassinMohamed'),
(13, 'ibrahim', 'nasrcity', 'ibra@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2, 'ibrahimMohamed'),
(14, 'samir', 'nasrcity', 'samir@yahoo.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 2, 'samir Mohamed'),
(15, 'kamel', 'nasrcity', 'kam@hotmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 4, 'kamel Othman'),
(191536, 'hhhhh', 'hhhh', 'hhh@gmail.com', '', 3, ''),
(191537, 'Ahmed', 'test', 'test@gmail.com', '', 3, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`AssignID`),
  ADD KEY `fk_teacherid2` (`TeacherID`),
  ADD KEY `fk_courseid` (`CourseId`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD KEY `fk_attend` (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseCode`),
  ADD KEY `fk_teacherid1` (`teacherEnrolled`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`ExamID`),
  ADD KEY `studentid` (`StudentID`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`QuizID`),
  ADD KEY `fk_teacherid3` (`teacherId`),
  ADD KEY `fk_year` (`QYear`),
  ADD KEY `fk_name` (`QuizName`),
  ADD KEY `fk_std1` (`stdId`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD KEY `stdid` (`stdid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentId`),
  ADD KEY `Level` (`Level`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherID`),
  ADD UNIQUE KEY `teacherID` (`teacherID`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191535;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacherID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191538;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `fk_courseid` FOREIGN KEY (`CourseId`) REFERENCES `course` (`courseCode`),
  ADD CONSTRAINT `fk_teacherid2` FOREIGN KEY (`TeacherID`) REFERENCES `teacher` (`teacherID`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `fk_attend` FOREIGN KEY (`id`) REFERENCES `users` (`userID`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_teacherid1` FOREIGN KEY (`teacherEnrolled`) REFERENCES `teacher` (`teacherID`);

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `studentid` FOREIGN KEY (`StudentID`) REFERENCES `student` (`studentId`);

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `fk_name` FOREIGN KEY (`QuizName`) REFERENCES `course` (`courseCode`),
  ADD CONSTRAINT `fk_std1` FOREIGN KEY (`stdId`) REFERENCES `student` (`studentId`),
  ADD CONSTRAINT `fk_teacherid3` FOREIGN KEY (`teacherId`) REFERENCES `teacher` (`teacherID`),
  ADD CONSTRAINT `fk_year` FOREIGN KEY (`QYear`) REFERENCES `student` (`Level`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `stdid` FOREIGN KEY (`stdid`) REFERENCES `student` (`studentId`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `fk_studentid` FOREIGN KEY (`studentId`) REFERENCES `users` (`userID`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk_teacherId` FOREIGN KEY (`teacherID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
