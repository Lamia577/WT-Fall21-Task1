<?php
class db{
    function open_con()
    {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "276914049";
        $db = "test_db";
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        else {
            return $conn;
        }
    }
    function add_data($conn, $first_name, $last_name, $email, $gender, $mobile_no, $date_of_birth, $hsc_result, $ssc_result, $course, $year, $semester)
    {
        $sql = "INSERT INTO new_students (FIRST_NAME, LAST_NAME, EMAIL, GENDER, MOBILE_NO, DATE_OF_BIRTH, HSC_RESULT, SSC_RESULT, COURSE, YEAR, SEMESTER)
                VALUES ('$first_name', '$last_name', '$email', '$gender', '$mobile_no', '$date_of_birth', '$hsc_result', '$ssc_result', '$course', '$year', '$semester')";
        $success = $conn->query($sql);
        return $success;
    }

    function close_con($conn)
    {
        $conn -> close();
    }
} 

--------------------------------------------------------------------
  } 
   Mid_Lab_Exam/Controller/process.php 

<?php
include('db.php');

$first_name = $last_name = $email = $gender = $mobile_no = $date_of_birth = $hsc_result = $ssc_result = $course = $year = $semester = "";

$ins_success = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $mobile_no = $_POST["mobile_no"];
    $date_of_birth = $_POST["date_of_birth"];
    $hsc_result = $_POST["hsc_result"];
    $ssc_result = $_POST["ssc_result"];
    $course = $_POST["course"];
    $year = $_POST["year"];
    $semester = $_POST["semester"];
}

$connection = new db();
$conobj=$connection->open_con();

$insert_success=$connection->add_data($conobj, $first_name, $last_name, $email, $gender, $mobile_no, $date_of_birth, $hsc_result, $ssc_result, $course, $year, $semester);

if($insert_success == true) $ins_success = "Data inserted successfully";
else $ins_success = "Data could not be inserted";

$connection->close_con($conobj);

?> 
--------------------------------------------------------------------------
  Mid_Lab_Exam/index.php

  <?php include "Controller/process.php"?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Task 2</title>
</head>
<body>
<h1>Please fill up the form</h1>
<hr>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="first_name">First Name:</label> <input type="text" name="first_name" ><br>
    <label for="last_name">Last Name:</label> <input type="text" name="last_name"><br>
    <label for="email">Email: </label> <input type="text" name="email"><br>
    <label for="gender">Designation:</label>
    <input type="radio" name="gender" value="Male">Male
    <input type="radio" name="gender" value="Female">Female
    <br>
    <label for="mobile_no">Mobile No: </label> <input type="text" name="mobile_no"><br>
    <label for="date_of_birth">Date of Birth: </label> <input type="date" name="date_of_birth"><br>
    <label for="hsc_result">HSC Result:</label> <input type="text" name="hsc_result" ><br>
    <label for="ssc_result">SSC Result:</label> <input type="text" name="ssc_result"><br>
    <label for="course">Select a course you want to enroll:</label>
    <select name="course">
        <option value="CSE">CSE</option>
        <option value="EEE">EEE</option>
        <option value="BBA">BBA</option>
    </select><br>
    <label for="year">Choose enrolling year:</label>
    <select name="year">
        <option value="2020">2020</option>
        <option value="2021">2021</option>
        <option value="2022">2022</option>
    </select><br>
    <label for="semester">Choose enrolling semester:</label>
    <select name="semester">
        <option value="Summer">Summer</option>
        <option value="Fall">Fall</option>
        <option value="Spring">Spring</option>
    </select><br>
    <input type="submit" name="submit" value="Insert Data">
</form>>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    echo  $ins_success . "<br>";
}
?>


</body>
</html> 
--------------------------------------------------------------
- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2021 at 05:37 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_db`
--

-- --------------------------------------------------------
- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2021 at 05:37 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `new_students`
--

CREATE TABLE `new_students` (
  `FIRST_NAME` varchar(50) NOT NULL,
  `LAST_NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `GENDER` varchar(50) NOT NULL,
  `MOBILE_NO` varchar(50) NOT NULL,
  `DATE_OF_BIRTH` date NOT NULL,
  `HSC_RESULT` varchar(50) NOT NULL,
  `SSC_RESULT` varchar(50) NOT NULL,
  `COURSE` varchar(50) NOT NULL,
  `YEAR` varchar(50) NOT NULL,
  `SEMESTER` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_students`
--

INSERT INTO `new_students` (`FIRST_NAME`, `LAST_NAME`, `EMAIL`, `GENDER`, `MOBILE_NO`, `DATE_OF_BIRTH`, `HSC_RESULT`, `SSC_RESULT`, `COURSE`, `YEAR`, `SEMESTER`) VALUES
('', '', '', '', '', '0000-00-00', '', '', '', '', ''),
('Lam', 'Rahman', 'lamrahman22@gmail.com', 'Male', '12345678901', '2021-10-20', 'GPA 5.0', 'GPA 5.0', 'CSE', '2020', 'Summer'),
('', '', '', '', '', '0000-00-00', '', '', '', '', ''),
('ABC', 'DEF', 'asd@asdasde.com', 'Female', '12345678912', '2021-10-28', 'GPA 4.0', 'GPA 3.0', 'EEE', '2021', 'Spring');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- Table structure for table `new_students`
--

CREATE TABLE `new_students` (
  `FIRST_NAME` varchar(50) NOT NULL,
  `LAST_NAME` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `GENDER` varchar(50) NOT NULL,
  `MOBILE_NO` varchar(50) NOT NULL,
  `DATE_OF_BIRTH` date NOT NULL,
  `HSC_RESULT` varchar(50) NOT NULL,
  `SSC_RESULT` varchar(50) NOT NULL,
  `COURSE` varchar(50) NOT NULL,
  `YEAR` varchar(50) NOT NULL,
  `SEMESTER` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `new_students`
--

INSERT INTO `new_students` (`FIRST_NAME`, `LAST_NAME`, `EMAIL`, `GENDER`, `MOBILE_NO`, `DATE_OF_BIRTH`, `HSC_RESULT`, `SSC_RESULT`, `COURSE`, `YEAR`, `SEMESTER`) VALUES
('', '', '', '', '', '0000-00-00', '', '', '', '', ''),
('Tanzeem', 'Rahat', 'tanzeemrahat80@gmail.com', 'Male', '12345678901', '2021-10-20', 'GPA 5.0', 'GPA 5.0', 'CSE', '2020', 'Summer'),
('', '', '', '', '', '0000-00-00', '', '', '', '', ''),
('ABC', 'DEF', 'asd@asdasde.com', 'Female', '12345678912', '2021-10-28', 'GPA 4.0', 'GPA 3.0', 'EEE', '2021', 'Spring');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
   
