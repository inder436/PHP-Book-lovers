-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--


DROP TABLE IF EXISTS `books`;
CREATE TABLE IF NOT EXISTS `books` (
  `book_id` int(100) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(100) NOT NULL,
  `book_genre` varchar(100) NOT NULL,
  `book_review` varchar(1000) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `book_link` varchar(300) NOT NULL,
  PRIMARY KEY (`book_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;


INSERT INTO `books` (`book_id`, `book_title`, `book_genre`, `book_review`, `user_name`, `email`, `book_link`) VALUES
(3, 'Becoming', 'Memoirs', 'story about  Michelle Obama.', 'Mou Chen', 'chenmou929@gmail.com', 'https://www.amazon.ca/gp/product/1524763136/ref=s9_acsd_top'),
(4, 'Interference', 'Novel', 'An immaculately constructed page-turner that is also, miraculously, a redemptive meditation on loneliness and community', 'Mou Chen', 'chenmou929@gmail.com', 'https://www.amazon.ca/gp/product/B00K6L5XIM/ref=s9_acsd_top_hd_bw_b3qQa_c_x_3_w?pf_rd_m=A3DWYIK6Y9EEQB&pf_rd_s=merchandised-search-8&pf_rd_r=7ZGF854X5YZ6MFBZHDS3&pf_rd_t=101&pf_rd_p=3fd3ec9d-e1cb-5f5f-86ac-9d461300eccc&pf_rd_i=916520'),
(5, 'Bad Blood', 'History of Technology', 'One of the Best Books of 2018: NPR â€¢ New York Times Book Review, Inc. â€¢ TIME â€¢ Wall Street Journal â€¢ Washington Post ', 'Mou Chen', 'chenmou929@gmail.com', 'https://www.amazon.ca/gp/product/152473165X/ref=s9_acsd_zwish_hd_bw_b3qQa_c_x_w?pf_rd_m=A3DWYIK6Y9EEQB&pf_rd_s=merchandised-search-12&pf_rd_r=7QKWFD0FVKW7K3C4P7BC&pf_rd_t=101&pf_rd_p=3fd3ec9d-e1cb-5f5f-86ac-9d461300eccc&pf_rd_i=916520');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
