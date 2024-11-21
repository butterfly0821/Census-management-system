-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 03:39 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: cms_db
--

-- --------------------------------------------------------

--
-- Table structure for table admins
--

CREATE TABLE admins (
  admin_id varchar(30) NOT NULL,
  fname varchar(100) NOT NULL,
  lname varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  phone varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  role varchar(100) NOT NULL DEFAULT 'admin',
  avatar varchar(255) NOT NULL DEFAULT 'avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table admins
--

INSERT INTO admins (admin_id, fname, lname, email, phone, password, role, avatar) VALUES
('2', 'admin', 'admin', 'admin@gmail.com', '0917043076', '$2y$10$k/48IUOXEUtjggGrhJ/iQuS2oawM/GKugDA26RSqc51NxGJS7w5kO', 'admin', 'avatar.png');

-- --------------------------------------------------------

--
-- Table structure for table enumerators
--

CREATE TABLE enumerators (
  no int(11) NOT NULL,
  enumerator_id varchar(30) NOT NULL,
  fname varchar(100) NOT NULL,
  lname varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  phone varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  role varchar(100) NOT NULL DEFAULT 'enumerator',
  avatar varchar(255) NOT NULL DEFAULT 'avatar.png',
  status bit(1) NOT NULL DEFAULT b'1',
  address varchar(30) NOT NULL,
  supervisor_id varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table enumerators
--

INSERT INTO enumerators (no, enumerator_id, fname, lname, email, phone, password, role, avatar, status, address, supervisor_id) VALUES
(1, 'enum_04', 'ganesh', 'g', 'a@gmail.com', '0965328741', '$2y$10$8utjvawfGCHjOotaO3XjpesoMNMLHdQ8yH9UAe37vWNN/SbzkOd.C', 'enumerator', 'avatar.png', b'1', 'mysore', 'super_89'),
(5, 'enum12', 'manoj', 'H', 'e@gmail.com', '0987546234', '$2y$10$TB4nHzcE9v7QSo/Ac7bf6.PrHG8Ux2VnBDSXraQTLnVeH595f3O0C', 'enumerator', 'avatar.png', b'1', 'mandya', 'super123'),
(7, 'enum_14', 'reena', 'M', 'a@gmail.com', '0985425412', '$2y$10$Fd/31D/uOAUIaoYPIc9AteZuDPdX95qJcvJq28/lNSdSv4TSdZrFm', 'enumerator', 'avatar.png', b'1', 'hubli', 'super333');

-- --------------------------------------------------------

--
-- Table structure for table guests
--

CREATE TABLE guests (
  guest_id int(11) NOT NULL,
  fname varchar(30) NOT NULL,
  lname varchar(30) NOT NULL,
  email varchar(40) NOT NULL,
  phone varchar(15) NOT NULL,
  password varchar(100) NOT NULL,
  role varchar(20) NOT NULL,
  isnew bit(1) NOT NULL DEFAULT b'0',
  status bit(1) NOT NULL DEFAULT b'0',
  avatar varchar(30) NOT NULL DEFAULT 'avatar.png',
  hobby varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table guests
--

INSERT INTO guests (guest_id, fname, lname, email, phone, password, role, isnew,status, avatar, hobby) VALUES
(1, 'amruth', 'm', 'h@gmail.com', '09454542757', '$2y$10$4sDDHuKcVT1rZIR5ic9Y5e4Tf5hWbibjcNbyW8RtfI3DSD5xJy5qS', 'guest', b'0',b'1', 'avatar.png', 'reading'),
(2, 'kumar', 'j', 'k@gmail.com', '098765543', '$2y$10$.GIuD6dSiRC01RSpfIhjy.EJ6S75eOmKIch2v0E5T5I4JlMBQHfBm', 'guest',b'0',  b'1', 'avatar.png', 'reading'),
(6, 'raj', 'p', 'a@gmail.com', '0954321', '$2y$10$0Tuq0ZD7afmka4IHdsgAZ.rpqZ135cvgbBhJ.B8tsSDXyBXxY278S', 'guest',b'0', b'1', 'avatar.png', ''),
(15, 'sandya', 'p', 's@gmail.com', '098756321', '$2y$10$ByglD7av51dhC0LAJ6esuOf3K8x8N2tuM1BFIXbjGtJl8eFtPYEmG', 'guest',b'0',  b'1', 'avatar.png', 'football');

-- --------------------------------------------------------

--
-- Table structure for table house
--

CREATE TABLE house (
  id int(11) NOT NULL,
  house_id int(11) NOT NULL,
  district varchar(30) NOT NULL,
  state varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table house
--

INSERT INTO house (id, house_id, district, state) VALUES
(1, 398,  'mysore', 'karnataka'),
(2, 367, 'mysore', 'karnataka'),
(3, 125,'mysore', 'karnataka'),
(5, 126, 'mysore', 'karnataka');

-- --------------------------------------------------------

--
-- Table structure for table notification
--



--
-- Table structure for table person
--

CREATE TABLE person (
  person_id varchar(15) NOT NULL,
  name varchar(40) NOT NULL,
  fname varchar(40) NOT NULL,
  gfname varchar(40) NOT NULL,
  sex varchar(1) NOT NULL,
  age date NOT NULL,
  house_id varchar(5) NOT NULL,
  married varchar(15) NOT NULL,
  disability varchar(5) NOT NULL,
  birth_place varchar(30) NOT NULL,
  religion varchar(15) NOT NULL,
  education varchar(15) NOT NULL,
  job varchar(30) NOT NULL,
  
  
  phone varchar(15) NOT NULL,
  email varchar(100) NOT NULL,
  
  enum_id varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table person
--

INSERT INTO person (person_id, name, fname, gfname, sex, age, house_id, married, disability, birth_place, religion, education, job, phone, email,enum_id) VALUES
('10', 'saad', 'Hemanth', 'Druva', 'm', '1960-08-09', '398', 'single', 'yes', 'mysore', 'Hindu', 'masters', 'unemployed', '0987542658', 't@gmail.com', 'enum_04'),
('11', 'amulya', 'Tarun', 'Giri', 'f', '2022-08-09', '398', 'single', 'yes', 'banglore', 'Hindu', 'illetrate', 'unemployed',  '09874541', '1@gmail.com',  'enum_04'),
('1234/11', 'deepika', 'Ananth', 'Manoj', 'f', '2022-01-06', '398', 'single', 'no', 'hubli', 'hindu', 'illiterate', 'unemployed', '0967410404', 'z@gmail.com', 'enum12'),
('1234/25', 'deepa', 'kumar', 'chandru', 'f', '2022-08-10', '367', 'married', 'no', 'hubli', 'muslim', 'certificate', 'governmental', '0967410404', 'zol@gmail.com',  'enum12'),

('18', 'arun', 'naveen', 'Sumanth', 'm', '2022-08-09', '367', 'married', 'no', 'mandya', 'muslim', 'certificate', 'non-governmental', '0912345678', 's@gmail.com', 'enum_04');


-- --------------------------------------------------------

--
-- Table structure for table supervisors
--

CREATE TABLE supervisors (
  no int(11) NOT NULL,
  supervisor_id varchar(30) NOT NULL,
  fname varchar(100) NOT NULL,
  lname varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  phone varchar(100) NOT NULL,
  subcity varchar(30) NOT NULL,
  password varchar(100) NOT NULL,
  role varchar(100) NOT NULL DEFAULT 'supervisor',
  avatar varchar(255) NOT NULL DEFAULT 'avatar.png',
  status bit(1) NOT NULL DEFAULT b'1',
  address varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table supervisors
--

INSERT INTO supervisors (no, supervisor_id, fname, lname, email, phone, subcity, password, role, avatar, status, address) VALUES
(5, 'super_03', 'Tarun', 'M', 't@gmail.com', '0985236541', 'tumkur', '$2y$10$EXYNDOnKmgcUp3YOg2GsaOOISWxAJSNdm3Swa7dpG42BhFjJTpOmy', 'supervisor', 'avatar.png', b'1', 'mysore'),
(6, 'super001', 'Teju', 'M', 't@yahoo.com', '0956712222', 'mandya', '$2y$10$jsNSlqxv78D4q.QKNxClru/SxCiFjZxKDFagDYCsgmARzjL7tvg5u', 'supervisor', 'avatar.png', b'1', 'mandya'),

(10, 'super333', 'Ajay', 'A', 'c@gmail.com', '0912365478', 'Mysore', '$2y$10$D/HCeZuXz/8L/eBahvAg0OPlAyQQi7Aq6ySWGF6ujbFmjL55BKeAq', 'supervisor', 'avatar.png', b'1', 'Chikmanglur');

--
-- Indexes for dumped tables
--

--
-- Indexes for table admins
--
ALTER TABLE admins
  ADD PRIMARY KEY (admin_id);

--
-- Indexes for table enumerators
--
ALTER TABLE enumerators
  ADD PRIMARY KEY (no);

--
-- Indexes for table guests
--
ALTER TABLE guests
  ADD PRIMARY KEY (guest_id);

--
-- Indexes for table house
--
ALTER TABLE house
  ADD PRIMARY KEY (id);


--
-- Indexes for table person
--
ALTER TABLE person
  ADD PRIMARY KEY (person_id);

--
-- Indexes for table supervisors
--
ALTER TABLE supervisors
  ADD PRIMARY KEY (no);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table enumerators
--
ALTER TABLE enumerators
  MODIFY no int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table guests
--
ALTER TABLE guests
  MODIFY guest_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table house
--
ALTER TABLE house
  MODIFY id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
--

-- AUTO_INCREMENT for table supervisors
--
ALTER TABLE supervisors
  MODIFY no int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;