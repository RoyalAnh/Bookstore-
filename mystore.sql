-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 16, 2024 lúc 03:33 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `mystore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_table`
--

CREATE TABLE `admin_table` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_table`
--

INSERT INTO `admin_table` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'Huy', 'admin14@gmail.com', '$2y$10$oQ3/kL7ayUD1iuUzHyY0rucyqsIN4ng66RxplLzu8/YTuQ2adAE5C'),
(2, 'admin', 'quang@gmail.com', '$2y$10$ycjPgGhITRqY0qcdrdu5QOLXhn.loPc1IkFboCZ3H5vS7mT37JmXe');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `author_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `authors`
--

INSERT INTO `authors` (`author_id`, `author_name`) VALUES
(1, 'Steven W. Ellingson'),
(2, 'Michael Fitz'),
(3, 'Ram Bilas Pachori'),
(4, 'Anil Pandey'),
(5, 'Behzad Razavi'),
(6, 'Steve McConnell'),
(7, 'Reema Thareja'),
(8, 'Stanley K. Ridgley'),
(9, 'Rhodes J.E.'),
(10, 'G. A. Vijayalakshmi Pai');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_title` varchar(100) NOT NULL,
  `book_name` varchar(100) NOT NULL,
  `publishing_year` year(4) NOT NULL,
  `book_description` text NOT NULL,
  `book_keyword` varchar(255) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `book_image` varchar(255) NOT NULL,
  `book_pdf` varchar(255) NOT NULL,
  `book_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `book_name`, `publishing_year`, `book_description`, `book_keyword`, `topic_id`, `author_id`, `book_image`, `book_pdf`, `book_price`) VALUES
(3, 'Code Complete', 'Code Complete_ A Practical Handbook of Software Construction', '2004', 'This book provides practical advice and real-world examples to help developers improve their coding skills and create high-quality software.', 'computer,code,software', 5, 6, 'code_complete.jpg', 'Steve McConnell - Code Complete_ A Practical Handbook of Software Construction (with PDF outline)-Microsoft Press (2004).pdf', 800),
(4, 'Data Structures Using C', 'Data structures using C', '2014', 'The book adopts a systematic approach, presenting the design of each data structure followed by algorithms for various operations and analyzing their running times.', 'Data Structure, Algorithm, C Programing', 5, 7, 'Data Structures Using C.jpg', 'Data structures using C.pdf', 800),
(5, 'Strategic Thinking Skills', 'Strategic Thinking Skills', '2012', 'Strategic thinking is about unraveling the mysteries of the chaotic world around us and harnessing powerful forces to our own ends. It means utilizing tools of analysis and tactics to take decisive and prudent action that gives us the best possible chance of achieving our objectives— whether those objectives are personal or professional.', 'Psychology, Strategic Thinking', 20, 8, 'strategic_thinking_skills.jpg', '(The Great Courses) Professor Stanley K. Ridgley - Strategic Thinking Skills-The Teaching Company (2012).pdf', 800),
(6, 'Electromagnetics', 'Electromagnetics', '2018', 'Electromagnetics, volume 1 by Steven W. Ellingson is a 225-page, peer-reviewed open educational resource intended for electrical engineering students in the third year of a bachelor of science degree program. It is intended as a primary textbook for a one-semester first course in undergraduate engineering electromagnetics. The book employs the “transmission lines first” approach in which transmission lines are introduced using a lumped-element equivalent circuit model for a differential length of transmission line, leading to one-dimensional wave equations for voltage and current.', 'electromagnetic radiation', 19, 1, 'electromagnetics.jpg', 'Steven W. Ellingson - Electromagnetics. 1-VT Publishing (2018).pdf', 800),
(7, 'Communications Systems', 'Fundamentals of Communications Systems', '2007', 'Get a Solid Account of Physical Layer Communications Theory, Illustrated with Numerous Interactive MATLAB Mini-Projects  You can rely on Fundamentals of Communications Systems for a solid introduction to physical layer communications theory, filled with modern implementations and MATLAB examples. This state-of-the-art guide covers essential theory and current engineering practice, carefully explaining the real-world tradeoffs necessary among performance, spectral efficiency, and complexity. Written by an award-winning communications expert, the book first takes readers through analog communications basics, amplitude modulations, analog angle modulation, and random processes. This essential resource then explains noise in bandpass communications systems…bandpass Gaussian random processes…digital communications basics…complexity of optimum demodulation…spectrally efficient data transmission...and more. Fundamentals of Communications Systems features: A modern approach to communications theory, reflecting current engineering applications Numerous MATLAB problems integrated throughout, with software available for download Detailed coverage of tradeoffs among performance, spectral efficiency, and complexity in engineering design Text written in four parts for easy modular presentation Inside This On-Target Communications Engineering Tool • Mathematical Foundations • Analog Communications Basics • Amplitude Modulations • Analog Angle Modulation • More Topics in Analog Communications • Random Processes • Noise in Bandpass Communications Systems • Bandpass Gaussian Random Processes • Digital Communications Basics • Optimal Single Bit Demodulation Structures • Transmitting More than One Bit • Complexity of Optimum Demodulation • Spectrally Efficient Data Transmission', 'systems, communications systems', 19, 2, 'fundametals_of_communication_systems.jpg', '(Communications Engineering) Michael Fitz - Fundamentals of Communications Systems-McGraw-Hill Professional (2007).pdf', 800),
(9, 'Microstrip Antenna Design', 'Practical Microstrip and Printed Antenna Design', '2019', 'This comprehensive resource presents antenna fundamentals balanced with the design of printed antennas. Over 70 antenna projects, along with design dimensions, design flows and antenna performance results are discussed, including antennas for wireless communication, 5G antennas and beamforming. Examples of smartphone antennas, MIMO antennas, aerospace and satellite remote sensing array antennas, automotive antennas and radar systems and many more printed antennas for various applications are also included. These projects include design dimensions and parameters that incorporate the various techniques used by industries and academia.  This book is intended to serve as a practical microstrip and printed antenna design guide to cover various real-world applications. All Antenna projects discussed in this book are designed, analyzed and simulated using full-wave electromagnetic solvers. Based on several years of the author’s research in antenna design and development for RF and microwave applications, this book offers an in-depth coverage of practical printed antenna design methodology for modern applications.', 'antenna design', 5, 4, 'antenna_design.jpg', 'Anil Pandey - Practical Microstrip and Printed Antenna Design-Artech House (2019).pdf', 800),
(10, 'Fundamentals of Microelectronics', 'Fundamentals of Microelectronics', '2013', 'Fundamentals of Microelectronics, 2nd Edition is designed to build a strong foundation in both design and analysis of electronic circuits this text offers conceptual understanding and mastery of the material by using modern examples to motivate and prepare readers for advanced courses and their careers. The books unique problem-solving framework enables readers to deconstruct complex problems into components that they are familiar with which builds the confidence and intuitive skills needed for success.', 'analog electronic, microelectronic, transistor', 19, 5, 'fundamentals_of_microelectronics1.jpg', 'Behzad Razavi - Fundamentals of Microelectronics-Wiley (2013)1.pdf', 800),
(11, 'Data Structures and Algorithms', 'A Textbook of Data Structures and Algorithms, Volume 1: Mastering Linear Data Structures', '2023', 'Data structures and algorithms is a fundamental course in computer science, which most undergraduate and graduate programs in computer science and other allied disciplines in science and engineering offer during the early stages of the respective programs, either as a core or as an elective course. The course enables students to have a much-needed foundation for efficient programming, leading to better problem solving in their respective disciplines.', 'Computer Engineering, DSA, Programming', 5, 10, 'A Textbook of Data Structures and Algorithms, Volume 1.jpg', '(Computer Engineering Series) G. A. Vijayalakshmi Pai - A Textbook of Data Structures and Algorithms, Volume 1_ Mastering Linear Data Structures-Wiley-ISTE (2023).pdf', 800),
(12, 'Time-Frequency Analysis', 'Time-Frequency Analysis Techniques and their Applications', '2023', 'Most of the real-life signals are non-stationary in nature. The examples of such signals include biomedical signals, communication signals, speech, earthquake signals, vibration signals, etc. Time-frequency analysis plays an important role for extracting the meaningful information from these signals. The book presents time-frequency analysis methods together with their various applications.  The basic concepts of signals and different ways of representing signals have been provided. The various time-frequency analysis techniques namely, short-time Fourier transform, wavelet transform, quadratic time-frequency transforms, advanced wavelet transforms, and adaptive time-frequency transforms have been explained. The fundamentals related to these methods are included. The various examples have been included in the book to explain the presented concepts effectively. The recently developed time-frequency analysis techniques such as, Fourier-Bessel series expansion-based methods, synchrosqueezed wavelet transform, tunable-Q wavelet transform, iterative eigenvalue decomposition of Hankel matrix, variational mode decomposition, Fourier decomposition method, etc. have been explained in the book. The numerous applications of time-frequency analysis techniques in various research areas have been demonstrated.  This book covers basic concepts of signals, time-frequency analysis, and various conventional and advanced time-frequency analysis methods along with their applications. The set of problems included in the book will be helpful to gain an expertise in time-frequency analysis. The material presented in this book will be useful for students, academicians, and researchers to understand the fundamentals and applications related to time-frequency analysis.', 'electronics, signal proccessing', 19, 3, 'time_frequency.jpg', 'Ram Bilas Pachori - Time-Frequency Analysis Techniques and their Applications-CRC Press (2023).pdf', 800);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `purchased_book`
--

CREATE TABLE `purchased_book` (
  `purchased_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(11) NOT NULL,
  `topic_title` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_title`) VALUES
(3, 'Biology'),
(4, 'Business'),
(5, 'Computers'),
(9, 'Chemistry'),
(13, 'Economy'),
(14, 'Education'),
(18, 'Art'),
(19, 'Technology'),
(20, 'Psychology'),
(21, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_payments`
--

CREATE TABLE `user_payments` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_table`
--

CREATE TABLE `user_table` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_balance` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_table`
--

INSERT INTO `user_table` (`user_id`, `username`, `user_email`, `user_password`, `user_balance`) VALUES
(1, 'huyle', 'abcanc407@gmail.com', '$2y$10$pX6A5SJbeSdoKN81yelimeOyI0cdCesPsyb8mFGHiIs4.zjelAF.K', 30000),
(2, 'quang', 'quang@gmail.com', '$2y$10$43oESi5B6XEOC48syegWEeWFsy/0sqLRyp/bG/rqds7tqTIrOPh3y', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`author_id`);

--
-- Chỉ mục cho bảng `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `FK1` (`author_id`),
  ADD KEY `FK2` (`topic_id`);

--
-- Chỉ mục cho bảng `purchased_book`
--
ALTER TABLE `purchased_book`
  ADD PRIMARY KEY (`purchased_id`),
  ADD KEY `FK3` (`book_id`),
  ADD KEY `FK4` (`user_id`);

--
-- Chỉ mục cho bảng `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Chỉ mục cho bảng `user_payments`
--
ALTER TABLE `user_payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `purchased_book`
--
ALTER TABLE `purchased_book`
  MODIFY `purchased_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `user_payments`
--
ALTER TABLE `user_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user_table`
--
ALTER TABLE `user_table`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `FK1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`author_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK2` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `purchased_book`
--
ALTER TABLE `purchased_book`
  ADD CONSTRAINT `FK3` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK4` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user_payments`
--
ALTER TABLE `user_payments`
  ADD CONSTRAINT `user_payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_table` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
