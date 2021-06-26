-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 03, 2021 at 12:13 AM
-- Server version: 5.7.24
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
-- Database: `library_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `title` text NOT NULL,
  `author` text NOT NULL,
  `isbn` text NOT NULL,
  `publisher` text NOT NULL,
  `category` text NOT NULL,
  `copies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`title`, `author`, `isbn`, `publisher`, `category`, `copies`) VALUES
('Harry Potter', 'J. K. Rowling', ' 9780747532743', 'BLOOMSBURY PUBLISHING PLC', 'Fantasy', 9),
('The Lord Of The Rings', 'J. R. R. Tolkien', '9780544003415', 'Allen & Unwin', 'Fantasy', 10),
('The Great Gatsby', 'F. Scott Fitzgerald', '9780743273565', 'Charles Scribner\'s Sons', 'Tragedy', 8);

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrower` text NOT NULL,
  `book` text NOT NULL,
  `isbn` text NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date NOT NULL,
  `fine` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrower`, `book`, `isbn`, `borrow_date`, `return_date`, `fine`) VALUES
('User1', 'Dune', '13254', '2021-05-03', '2021-06-03', 0),
('User2', 'The Lord Of The Rings', '9780544003415', '2021-05-03', '2021-06-03', 0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `username` text NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `age` int(11) NOT NULL,
  `contact` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`username`, `name`, `email`, `age`, `contact`) VALUES
('User1', 'User1', 'user@user.com', 21, '123456789'),
('User2', 'User2', 'user2@user.com', 22, '123456789');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `username` text NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `role`) VALUES
('admin', 'admin', 'admin'),
('User1', '123', 'member'),
('User2', '123', 'member');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
