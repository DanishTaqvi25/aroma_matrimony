-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 08:54 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imatrimony`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `profile_id` int(11) NOT NULL,
  `profile_uuid` varchar(50) NOT NULL,
  `profile_for` varchar(1000) NOT NULL,
  `profile_password` varchar(500) NOT NULL,
  `profile_name` varchar(1000) NOT NULL,
  `package` varchar(50) NOT NULL DEFAULT '5012bbce-da36-447d-a86c-9b83ed0d1153',
  `age` int(11) NOT NULL,
  `height` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `physical` varchar(1000) NOT NULL,
  `mother` varchar(1000) NOT NULL,
  `marital` varchar(1000) NOT NULL,
  `gender` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `otp` int(11) NOT NULL,
  `whatsapp` int(15) NOT NULL,
  `address_1` varchar(100) NOT NULL,
  `address_2` varchar(100) NOT NULL,
  `highest_education` varchar(50) NOT NULL,
  `employed_in` varchar(100) NOT NULL,
  `city` text NOT NULL,
  `district` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(1000) NOT NULL,
  `religion` text NOT NULL,
  `caste` varchar(1000) NOT NULL,
  `sub_caste` varchar(1000) NOT NULL,
  `denomination` text NOT NULL,
  `division` varchar(1000) NOT NULL,
  `religious_values` varchar(1000) NOT NULL,
  `baptism` varchar(100) NOT NULL,
  `ornaments` varchar(100) NOT NULL,
  `present_country` varchar(100) NOT NULL,
  `present_state` varchar(100) NOT NULL,
  `present_district` varchar(100) NOT NULL,
  `present_city` text NOT NULL,
  `citizenship` varchar(100) NOT NULL,
  `present_place` varchar(100) NOT NULL,
  `permanent_place` varchar(100) NOT NULL,
  `ancestral_origin` varchar(100) NOT NULL,
  `place_birth` varchar(100) NOT NULL,
  `family_status` varchar(100) NOT NULL,
  `family_type` varchar(100) NOT NULL,
  `father_name` varchar(100) NOT NULL,
  `father_job` varchar(100) NOT NULL,
  `mother_name` varchar(100) NOT NULL,
  `mother_job` varchar(100) NOT NULL,
  `no_of_brothers` int(11) NOT NULL,
  `no_of_sisters` int(11) NOT NULL,
  `drinking_habit` varchar(100) NOT NULL,
  `smoking_habit` varchar(50) NOT NULL,
  `food_habit` varchar(50) NOT NULL,
  `about` varchar(100) NOT NULL,
  `pro_image` varchar(500) DEFAULT NULL,
  `p_religion` varchar(50) NOT NULL,
  `p_caste` varchar(50) NOT NULL,
  `p_subcaste` varchar(50) NOT NULL,
  `p_denomination` text NOT NULL,
  `p_division` varchar(50) NOT NULL,
  `p_education` varchar(50) NOT NULL,
  `p_country` varchar(50) NOT NULL,
  `p_state` text NOT NULL,
  `p_district` text NOT NULL,
  `p_city` text NOT NULL,
  `p_citizenship` text NOT NULL,
  `p_income` varchar(100) NOT NULL,
  `p_highest_education` varchar(50) NOT NULL,
  `p_employed_in` varchar(100) NOT NULL,
  `p_occupation` varchar(50) NOT NULL,
  `p_marital` varchar(50) NOT NULL,
  `p_physical` varchar(50) NOT NULL,
  `p_status` enum('created','approved','rejected','paid') NOT NULL DEFAULT 'created',
  `p_package` varchar(50) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_isactive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`profile_id`, `profile_uuid`, `profile_for`, `profile_password`, `profile_name`, `package`, `age`, `height`, `weight`, `physical`, `mother`, `marital`, `gender`, `email`, `mobile`, `otp`, `whatsapp`, `address_1`, `address_2`, `highest_education`, `employed_in`, `city`, `district`, `state`, `country`, `religion`, `caste`, `sub_caste`, `denomination`, `division`, `religious_values`, `baptism`, `ornaments`, `present_country`, `present_state`, `present_district`, `present_city`, `citizenship`, `present_place`, `permanent_place`, `ancestral_origin`, `place_birth`, `family_status`, `family_type`, `father_name`, `father_job`, `mother_name`, `mother_job`, `no_of_brothers`, `no_of_sisters`, `drinking_habit`, `smoking_habit`, `food_habit`, `about`, `pro_image`, `p_religion`, `p_caste`, `p_subcaste`, `p_denomination`, `p_division`, `p_education`, `p_country`, `p_state`, `p_district`, `p_city`, `p_citizenship`, `p_income`, `p_highest_education`, `p_employed_in`, `p_occupation`, `p_marital`, `p_physical`, `p_status`, `p_package`, `created_date`, `profile_isactive`) VALUES
(1, '0e5144d8-5a73-4ee9-a4ac-55f97680aa80', 'a', '123456', 'gu', '5012bbce-da36-447d-a86c-9b83ed0d1153', 8, 8, 8, 'b', '08b5524c-9b61-4194-9602-faae03171dc3', 'Divorced', 'Female', 'uhj', '0', 0, 0, 'n', 'njn', '', '', '', 'jnj', 'nnj', 'n', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', '0b663c70-03ee-4ac1-94b2-fc46581d1222', '', '622d8c04-af4f-47ee-aae8-948d66d8438e', 'd', 'no', 'h', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '', 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', 'jkkj', ',n,m', 'mnmn', 'mnm', 'd', 'b', 'nbnb', 'mnn', 'bnb', 'mn', 7, 8, 'No', 'No', 'u', 'khu', NULL, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '68c0ffb1-5454-4bdc-b1d9-0b6e235fe7a1', '94271823-4cda-4327-b1e1-bc3e72ce75e2', '', '622d8c04-af4f-47ee-aae8-948d66d8438e', 't', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '', 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', '0', '', '', '19a6cf12-4e57-42e2-a9ef-3f2cc218bf4c', 'di', 'p', 'created', '', '2021-11-19 09:07:25', 1),
(2, '23c6fe86-98c6-49eb-861b-c269738b0ca0', 'b', '123456', 'akshay', '5012bbce-da36-447d-a86c-9b83ed0d1153', 24, 17, 66, 'b', '795c36d1-8133-4e77-9819-e9f2036fa08d', 'Single', 'Male', 'akshaysmail897@gmail.com', '2147483647', 897, 2147483647, 'Akshay Bhavan', 'Vendar PO', '', '', '', '', '529f864f-9c9f-42d3-b36c-3e53b9993890', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', '763789de-c652-48b0-9888-6fcb25ea8024', '', '622d8c04-af4f-47ee-aae8-948d66d8438e', 'd', 'no', 'h', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'd4e61297-5cea-42ac-998d-bdde312e135d', '', 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', 'kollam', 'kollam', 'origin', 'kollam', 's', 'family', 'father', 'fjob', 'mother', 'm job', 1, 0, 'No', 'No', 'u', 'hiii', NULL, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '230a704b-342e-49e4-b4c4-9f55692eb4df', 'f1d60ad2-337a-47cc-8077-058e1f650fce', '', '622d8c04-af4f-47ee-aae8-948d66d8438e', 't', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '', 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', '0', '', '', '19a6cf12-4e57-42e2-a9ef-3f2cc218bf4c', 'di', 'p', 'created', '', '2021-11-19 09:07:25', 1),
(6, '3289174a-5ce3-4dfd-bf9b-162704aea275', 'Myself', '123456', 'j', '5012bbce-da36-447d-a86c-9b83ed0d1153', 7, 7, 7, 'Abled', '', 'Single', 'Male', 'ghj', '0', 0, 0, 'h', 'gh', '', '', '', '', '', '', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', '', '', '', 's', 'yes', 'r', '', '', '', '', '', 'hg', 'hghgh', 'yt', 'y', 'd', 'Rrtrt', 'rt', 'trrt', 'tr', 'tr', 6, 6, 'Yes', 'Yes', 'p', '', NULL, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '', '', '', '', 'y', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '', 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', '0', '', '', '19a6cf12-4e57-42e2-a9ef-3f2cc218bf4c', 'si', 'm', 'created', '', '2021-11-19 09:07:25', 1),
(7, 'd5b19a5e-ea61-40af-9b9b-80698d1aaa67', 'Myself', '123456', 'khj', '5012bbce-da36-447d-a86c-9b83ed0d1153', 6, 7, 7, 'Abled', '', 'Single', 'Male', 'ih', '0', 0, 0, 'i', 'iui', '', '', '', '', '', '', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', '', '', '', 's', 'yes', 'r', '', '', '', '', '', 'h', 'h', 'hh', 'hh', 'd', 'h', 'hh', 'h', 'h', 'k', 9, 9, 'Yes', 'Yes', 'p', 'h', NULL, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '', '', '', '', 'y', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '', 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', '0', '', '', '19a6cf12-4e57-42e2-a9ef-3f2cc218bf4c', 'si', 'm', 'created', '', '2021-11-19 09:07:25', 1),
(8, '22af96d6-dd3d-4f40-9047-0bdb5e391332', 'Myself', '123456', 'y', '5012bbce-da36-447d-a86c-9b83ed0d1153', 6, 6, 6, 'Abled', '', 'Single', 'Male', 'y', '0', 0, 0, 'y', 'y', '', '', '', '', '', '', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', '', '', '', 's', 'yes', 'r', '', '', '', '', '', 'h', 'h', 'hh', 'h', 'd', 'h', 'h', 'hh', 'h', 'h', 7, 7, 'Yes', 'Yes', 'p', 'h', NULL, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '', '', '', '', 'y', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '', 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', '0', '', '', '19a6cf12-4e57-42e2-a9ef-3f2cc218bf4c', 'si', 'm', 'created', '', '2021-11-19 09:07:25', 1),
(9, '36b00541-ce15-4b2b-89d5-da24eb535a72', 'Myself', '123456', 't', '5012bbce-da36-447d-a86c-9b83ed0d1153', 6, 6, 6, 'Abled', '', 'Single', 'Male', 'y', '0', 0, 0, 'u', 'u', '', '', '', '', '', '', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', '', '', '', 's', 'yes', 'r', '', '', '', '', '', 'h', 'h', 'h', 'h', 'd', 'h', 'h', 'h', 'h', 'h', 8, 8, 'Yes', 'Yes', 'p', 'j', NULL, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '', '', '', '', 'y', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '', 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', '0', '', '', '19a6cf12-4e57-42e2-a9ef-3f2cc218bf4c', 'si', 'm', 'created', '', '2021-11-19 09:07:25', 1),
(10, 'b59cae91-2d3c-4671-aad6-b621c27c52c8', 'Myself', '123456', 'y', '5012bbce-da36-447d-a86c-9b83ed0d1153', 8, 8, 8, 'Abled', '', 'Single', 'Male', 'yy', '0', 0, 0, 'u', 'u', '', '', '', '', '', '', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', '', '', '', 's', 'yes', 'r', '', '', '', '', '', 'h', 'h', 'h', 'h', 'd', 'hh', 'h', 'h', 'h', 'h', 8, 8, 'Yes', 'Yes', 'p', 'h', NULL, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '', '', '', '', 'y', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '', 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', '0', '', '', '19a6cf12-4e57-42e2-a9ef-3f2cc218bf4c', 'si', 'm', 'created', '', '2021-11-19 09:07:25', 1),
(11, 'bcde8d40-a120-4303-bc13-e90fc0249c13', 'Myself', '123456', 'y', '5012bbce-da36-447d-a86c-9b83ed0d1153', 8, 8, 8, 'Abled', '', 'Single', 'Male', 'yy', '0', 0, 0, 'u', 'u', '', '', '', '', '', '', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', '', '', '', 's', 'yes', 'r', '', '', '', '', '', 'h', 'h', 'h', 'h', 'd', 'hh', 'h', 'h', 'h', 'h', 8, 8, 'Yes', 'Yes', 'p', 'h', NULL, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '', '', '', '', 'y', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '', 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', '0', '', '', '19a6cf12-4e57-42e2-a9ef-3f2cc218bf4c', 'si', 'm', 'created', '', '2021-11-19 09:07:25', 1),
(12, '3ef8de87-d435-439c-b9d9-925678c7f508', 'Myself', '123456', 'y', '5012bbce-da36-447d-a86c-9b83ed0d1153', 8, 8, 8, 'Abled', '', 'Single', 'Male', 'yy', '0', 0, 0, 'u', 'u', '', '', '', '', '', '', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', '', '', '', 's', 'yes', 'r', '', '', '', '', '', 'h', 'h', 'h', 'h', 'd', 'hh', 'h', 'h', 'h', 'h', 8, 8, 'Yes', 'Yes', 'p', 'h', NULL, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '', '', '', '', 'y', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '', 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', '0', '', '', '19a6cf12-4e57-42e2-a9ef-3f2cc218bf4c', 'si', 'm', 'created', '', '2021-11-19 09:07:25', 1),
(13, '1159e104-1b69-4e4b-9490-943206a393bc', 'Myself', '123456', 'y', '5012bbce-da36-447d-a86c-9b83ed0d1153', 8, 8, 8, 'Abled', '', 'Single', 'Male', 'yy', '0', 0, 0, 'u', 'u', '', '', '', '', '', '', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', '', '', '', 's', 'yes', 'r', '', '', '', '', '', 'h', 'h', 'h', 'h', 'd', 'hh', 'h', 'h', 'h', 'h', 8, 8, 'Yes', 'Yes', 'p', 'h', NULL, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '', '', '', '', 'y', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '', 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', '0', '', '', '19a6cf12-4e57-42e2-a9ef-3f2cc218bf4c', 'si', 'm', 'created', '', '2021-11-19 09:07:25', 1),
(14, '7410ddea-33f0-4501-85d7-cfc6139e039d', 'Myself', '123456', 'y', '5012bbce-da36-447d-a86c-9b83ed0d1153', 8, 8, 8, 'Abled', '', 'Single', 'Male', 'yy', '0', 0, 0, 'u', 'u', '', '', '', '', '', '', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', '', '', '', 's', 'yes', 'r', '', '', '', '', '', 'h', 'h', 'h', 'h', 'd', 'hh', 'h', 'h', 'h', 'h', 8, 8, 'Yes', 'Yes', 'p', 'h', NULL, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '', '', '', '', 'y', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '', 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', '0', '', '', '19a6cf12-4e57-42e2-a9ef-3f2cc218bf4c', 'si', 'm', 'created', '', '2021-11-19 09:07:25', 1),
(15, 'f399784b-ef04-4bc5-bdcd-aba817398e89', 'Myself', '123456', 'y', '5012bbce-da36-447d-a86c-9b83ed0d1153', 8, 8, 8, 'Abled', '', 'Single', 'Male', 'yy', '0', 0, 0, 'u', 'u', '', '', '', '', '', '', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', '', '', '', 's', 'yes', 'r', '', '', '', '', '', 'h', 'h', 'h', 'h', 'd', 'hh', 'h', 'h', 'h', 'h', 8, 8, 'Yes', 'Yes', 'p', 'h', NULL, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '', '', '', '', 'y', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '', 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', '0', '', '', '19a6cf12-4e57-42e2-a9ef-3f2cc218bf4c', 'si', 'm', 'created', '', '2021-11-19 09:07:25', 1),
(16, '44a26311-b14d-4c2c-8a99-58882862ad77', 'Myself', '123456', 'y', '5012bbce-da36-447d-a86c-9b83ed0d1153', 8, 8, 8, 'Abled', '', 'Single', 'Male', 'yy', '0', 0, 0, 'u', 'u', '', '', '', '', '', '', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', '', '', '', 's', 'yes', 'r', '', '', '', '', '', 'h', 'h', 'h', 'h', 'd', 'hh', 'h', 'h', 'h', 'h', 8, 8, 'Yes', 'Yes', 'p', 'h', NULL, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '', '', '', '', 'y', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '', 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', '0', '', '', '19a6cf12-4e57-42e2-a9ef-3f2cc218bf4c', 'si', 'm', 'created', '', '2021-11-19 09:07:25', 1),
(17, 'a0d3d0ae-beaa-4ba6-9e89-d5d05453d02a', 'Myself', '123456', 't', '5012bbce-da36-447d-a86c-9b83ed0d1153', 7, 7, 7, 'Abled', '', 'Single', 'Male', 'u', '0', 0, 0, 'u', 'u', '', '', '', '', '', '', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', '', '', '', 's', 'yes', 'r', '', '', '', '', '', 'y', 'yy', 'yy', 'y', 'd', 'yy', 'yy', 'y', 'y', 'yy', 7, 7, 'Yes', 'Yes', 'p', '', NULL, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '', '', '', '', 'y', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '', 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', '0', '', '', '19a6cf12-4e57-42e2-a9ef-3f2cc218bf4c', 'si', 'm', 'created', '', '2021-11-19 09:07:25', 1),
(18, 'f77c3731-bd92-41ac-bfc9-95f0483564be', 'Myself', '123456', 'Shyam', '5012bbce-da36-447d-a86c-9b83ed0d1153', 12, 121, 12, 'Abled', '', 'Single', 'Male', 'shyam@gmail.com', '1', 1, 1, '1', '1', '', '', '', 'd4e61297-5cea-42ac-998d-bdde312e135d', '529f864f-9c9f-42d3-b36c-3e53b9993890', '561bc12a-d629-4329-a85a-3010725c6ae2', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', '', '', '', 's', 'yes', 'r', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '', 'e6aed759-7c43-4147-b202-31949fbdea73', '1', '1', '1', '1', 'd', '1', '1', '1', '1', '1', 1, 1, 'Yes', 'Yes', 'p', '1', NULL, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '', '', '', '', 'y', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '', 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', '0', '', '', '19a6cf12-4e57-42e2-a9ef-3f2cc218bf4c', 'si', 'm', 'approved', '', '2021-11-19 09:07:25', 1),
(19, '8a89d870-2808-46c7-9041-762723bc569b', 'Myself', '123456', 'Chandran', '5012bbce-da36-447d-a86c-9b83ed0d1153', 15, 15, 1, 'Abled', '', 'Single', 'Male', 'a@gmail.com', '545', 5, 5, '5', '5', '', '', '', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '529f864f-9c9f-42d3-b36c-3e53b9993890', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', '', '', '', 's', 'yes', 'r', '', '', '', '', '', '4', '1', '1', '1', 'd', '1', '1', '1', '1', '1', 1, 1, 'Yes', 'Yes', 'p', '', NULL, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '', '', '', '', 'y', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '', 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', '0', '', '', '19a6cf12-4e57-42e2-a9ef-3f2cc218bf4c', 'si', 'm', 'rejected', '', '2021-11-19 09:07:25', 1),
(20, 'da5cccdf-2ecd-44b9-ad30-51055c0a4af5', 'Myself', '123456', 'Abhina Rajesh', '5012bbce-da36-447d-a86c-9b83ed0d1153', 26, 158, 58, 'Abled', '795c36d1-8133-4e77-9819-e9f2036fa08d', 'Single', 'Female', 'abhi@gmail.com', '2147483647', 123, 2147483647, 'AddressLine1 ', 'AddressLine2', '', '', '', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '529f864f-9c9f-42d3-b36c-3e53b9993890', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', 'f1d60ad2-337a-47cc-8077-058e1f650fce', '', '3b9ddbd9-701e-4360-973c-f5e4d18a8d95', 'd', 'no', 'h', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'd132bf1c-9aed-4c51-9cce-ceddae1fafb4', '', 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', 'Kodiyeri', 'Thalassey , Manekkara', 'Ancestral Origin', 'JOSEGIRI HOSPITAL', 's', 'Extended Family', 'Babu', 'Contractor', 'Kavitha', 'HouseWife', 1, 2, 'Yes', 'No', 'p', 'About Abhina ', NULL, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '230a704b-342e-49e4-b4c4-9f55692eb4df', 'f1d60ad2-337a-47cc-8077-058e1f650fce', '', '3b9ddbd9-701e-4360-973c-f5e4d18a8d95', 'y', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '', 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', '0', '', '', '19a6cf12-4e57-42e2-a9ef-3f2cc218bf4c', 'si', 'm', 'created', '', '2021-11-20 03:27:35', 1),
(21, '1d613b65-6ce8-43a5-9dd3-6b3e62dae0f9', 'Myself', '123456', '1', '5012bbce-da36-447d-a86c-9b83ed0d1153', 1, 1, 1, 'Abled', '08b5524c-9b61-4194-9602-faae03171dc3', 'Single', 'Male', 's@gmail.com', '1', 1, 1, '1', '1', '', '', '', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', 'a50140c3-17ac-4a2b-9fdf-b8adc53f791d', '561bc12a-d629-4329-a85a-3010725c6ae2', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', '', '', '', 's', 'yes', 'r', '', '', '', '', '', '1', '1', '1', '1', 'd', '1', '1', '1', '1', '1', 1, 1, 'Yes', 'Yes', 'p', '1', NULL, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '', '', '', '', 'y', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '', 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', '0', '', '', '19a6cf12-4e57-42e2-a9ef-3f2cc218bf4c', 'si', 'm', 'created', '', '2021-11-20 04:55:53', 1),
(22, 'b4cf83e3-55d5-4865-9b01-48eb05466d25', 'Myself', '123456', '1', '5012bbce-da36-447d-a86c-9b83ed0d1153', 1, 1, 1, 'Abled', '', 'Single', 'Male', '1', '1', 1, 1, '1', '1', '', '', '', '', '', '', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', '', '', '', 's', 'yes', 'r', '', '', '', '', '', '1', '1', '1', '1', 'd', '1', '1', '1', '1', '1', 1, 1, 'Yes', 'Yes', 'p', '1', NULL, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '', '', '', '', 'y', '', '', '', '', '', '0', '', '', '', 'si', 'm', 'created', '', '2021-11-20 10:13:45', 1),
(23, 'cc3ce7d4-6fe2-4513-80ed-64632b46cb04', 'Myself', '123456', '1', '5012bbce-da36-447d-a86c-9b83ed0d1153', 1, 1, 1, 'Abled', '', 'Single', 'Male', '1', '1', 1, 1, '1', '1', '', '', '', '', '', '', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', '', '', '', 's', 'yes', 'r', '', '', '', '', '', '1', '1', '1', '1', 'd', '1', '1', '1', '1', '1', 1, 1, 'Yes', 'Yes', 'p', '1', NULL, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '', '', '', '', 'y', '', '', '', '', '', '0', '', '', '', 'si', 'm', 'created', '', '2021-11-20 10:15:20', 1),
(24, '72ec08e7-d217-447e-ae98-353486cc6f87', 'Myself', '123456', 'Mustafa', '5012bbce-da36-447d-a86c-9b83ed0d1153', 25, 150, 58, 'Disabled', '795c36d1-8133-4e77-9819-e9f2036fa08d', 'Divorced', 'Male', 'Mustafa@gmail.com', '2147483647', 12, 623866799, 'Mustafa', 'Address 2', '', '', '', 'd4e61297-5cea-42ac-998d-bdde312e135d', '529f864f-9c9f-42d3-b36c-3e53b9993890', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', 'bf3b79a8-6eb8-4c1a-9b71-cf3f9e8a3a2e', 'a8346b7a-1558-4716-a188-1176588d3481', '0b663c70-03ee-4ac1-94b2-fc46581d1222', '', '622d8c04-af4f-47ee-aae8-948d66d8438e', 'd', 'no', 'h', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '', 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', '1', '1', '1', '1', 'd', '1', '1', '1', '1', '1', 1, 1, 'Yes', 'Yes', 'p', '', NULL, '', '', '', '', '', 'y', '', '', '', '', '', '0', '', '', '', 'si', 'm', 'created', '', '2021-11-20 11:30:29', 1),
(25, 'd443573a-3bb2-41a7-8958-ef6e7e33dea3', 'Myself', '123456', '1', '5012bbce-da36-447d-a86c-9b83ed0d1153', 1, 1, 1, 'Abled', '', 'Single', 'Male', '1', '1', 1, 1, '1', '1', '', '', '', 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '529f864f-9c9f-42d3-b36c-3e53b9993890', '561bc12a-d629-4329-a85a-3010725c6ae2', '', '', '', '', '', 's', 'yes', 'r', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'd4e61297-5cea-42ac-998d-bdde312e135d', '', 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', '1', '1', '11', '1', 'd', '1', '1', '1', '1', '1', 1, 1, 'Yes', 'Yes', 'p', '', NULL, '', '', '', '', '', 'y', '', '', '', '', '', '0', '2fa64476-3f13-4346-b572-7d4965e66c40', 'private', '', 'si', 'm', 'created', '', '2021-11-22 04:53:44', 1),
(26, '61925df6-5249-4462-9ac7-7531110cded0', 'Friend', '123456', 'Prabith Prabhakar Ji', '5012bbce-da36-447d-a86c-9b83ed0d1153', 29, 162, 68, 'Abled', '795c36d1-8133-4e77-9819-e9f2036fa08d', 'Single', 'Male', 'prabith@gmail.com', '623878978', 7894, 623899780, 'Address 1', 'Address 2', '2fa64476-3f13-4346-b572-7d4965e66c40', 'private', '', 'd132bf1c-9aed-4c51-9cce-ceddae1fafb4', 'a50140c3-17ac-4a2b-9fdf-b8adc53f791d', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', '763789de-c652-48b0-9888-6fcb25ea8024', '', '3b9ddbd9-701e-4360-973c-f5e4d18a8d95', 's', 'yes', 'r', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'd4e61297-5cea-42ac-998d-bdde312e135d', '', 'e6aed759-7c43-4147-b202-31949fbdea73', 'Kodiyeri', 'Kodiyeri', 'An', 'Thalassery', 's', 'Small', 'Prabhakaran', 'Professor', 'Prabitha', 'House Wife', 0, 1, 'No', 'No', 'u', 'Prabith Aka Pran=bhakaran', NULL, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '230a704b-342e-49e4-b4c4-9f55692eb4df', 'f1d60ad2-337a-47cc-8077-058e1f650fce', '', '622d8c04-af4f-47ee-aae8-948d66d8438e', 't', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'd132bf1c-9aed-4c51-9cce-ceddae1fafb4', '', 'e6aed759-7c43-4147-b202-31949fbdea73', 'a', '2fa64476-3f13-4346-b572-7d4965e66c40', 'private', 'dff86349-f6bb-494b-842e-e0d678a9db30', 'di', 'p', 'created', '', '2021-11-22 04:57:28', 1),
(27, '233d0fdb-52f7-4cf3-92e5-379e84e6952f', 'Myself', '123456', 'Abhinav', '5012bbce-da36-447d-a86c-9b83ed0d1153', 28, 168, 58, 'Abled', '795c36d1-8133-4e77-9819-e9f2036fa08d', 'Divorced', 'Female', 'Abhinav@gmail.com', '55555555', 555, 555578787, 'Address 1', 'Address 2', '2fa64476-3f13-4346-b572-7d4965e66c40', 'private', '', '', '529f864f-9c9f-42d3-b36c-3e53b9993890', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', '763789de-c652-48b0-9888-6fcb25ea8024', '', '622d8c04-af4f-47ee-aae8-948d66d8438e', 'd', 'no', 'h', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'd132bf1c-9aed-4c51-9cce-ceddae1fafb4', '', 'e6aed759-7c43-4147-b202-31949fbdea73', 'Present Place', 'Permanent Place', 'Ancestral Origin', 'Place of Birth', 's', 'Place of Birth', 'Father’s Name', 'Father’s Name', 'Mothers’ Name', 'Mothers’ Job', 1, 1, 'Yes', 'No', 'p', 'About \r\n', NULL, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', '763789de-c652-48b0-9888-6fcb25ea8024', '', '622d8c04-af4f-47ee-aae8-948d66d8438e', 'y', '', '', '', '', '', 'a', '2fa64476-3f13-4346-b572-7d4965e66c40', 'private', '', 'si', 'm', 'created', '', '2021-11-22 06:25:44', 1),
(28, '5ffd44fa-40b9-488e-8d11-736667300d7c', 'Myself', '', 'ftyu', '5012bbce-da36-447d-a86c-9b83ed0d1153', 78, 786, 87, 'Abled', '', 'Single', 'Male', 'jhgug', '2147483647', 55330, 0, 'hjgug', 'ugu', '', '', '', 'd4e61297-5cea-42ac-998d-bdde312e135d', '529f864f-9c9f-42d3-b36c-3e53b9993890', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '', '', '', '1', '', 's', 'yes', 'r', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'd4e61297-5cea-42ac-998d-bdde312e135d', '', 'e6aed759-7c43-4147-b202-31949fbdea73', 'hgjg', 'ughg', 'ghgu', 'ghghg', 'd', 'gjgj', 'gjhg', 'jhg', 'jhghj', 'gjhg', 8, 8, 'Yes', 'Yes', 'p', '', NULL, '', '', '', '1', '', 'y', '', '', '', '', '', 'b', '', '', '', 'si', 'm', 'created', '', '2021-12-29 05:31:36', 1),
(29, '7c81f423-e364-4992-8e1a-8e5090b7d5a9', 'Myself', '', 'new', '5012bbce-da36-447d-a86c-9b83ed0d1153', 77, 77, 77, 'Abled', '', 'Single', 'Male', 'jjk', '2147483647', 93218, 899, 'yy', 'yy', '', '', '', 'd4e61297-5cea-42ac-998d-bdde312e135d', '529f864f-9c9f-42d3-b36c-3e53b9993890', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '', '', '', '1', '', 's', 'yes', 'r', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'd4e61297-5cea-42ac-998d-bdde312e135d', '', 'e6aed759-7c43-4147-b202-31949fbdea73', 'uu', 'uu', 'uu', 'uu', 'd', 'uu', 'uuu', 'uu', 'u', 'uu', 5, 5, 'Yes', 'Yes', 'p', '', NULL, '', '', '', '1', '', 'y', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'd4e61297-5cea-42ac-998d-bdde312e135d', '', '', 'b', '', '', '', 'si', 'm', 'rejected', '', '2021-12-29 05:35:47', 1),
(30, 'd519922f-f4f0-4002-ab44-6ef3f8189a93', 'Myself', '', 'ppaa', '5012bbce-da36-447d-a86c-9b83ed0d1153', 8, 8, 8, 'Abled', '', 'Single', 'Male', 'gu', '2147483647', 99269, 897, 'gjhgj', 'gjhg', '', '', '454e44c9-dcd6-44f4-94c5-07cb14241bc2', 'd132bf1c-9aed-4c51-9cce-ceddae1fafb4', '529f864f-9c9f-42d3-b36c-3e53b9993890', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '', '', '', '1', '', 's', 'yes', 'r', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'd132bf1c-9aed-4c51-9cce-ceddae1fafb4', '454e44c9-dcd6-44f4-94c5-07cb14241bc2', 'e6aed759-7c43-4147-b202-31949fbdea73', 'uhuh', 'uhuh', 'uhuh', 'uhuh', 'd', 'uhu', 'uhuh', 'uhu', 'h', 'uhu', 7, 7, 'Yes', 'Yes', 'p', '', NULL, '', '', '', '1', '', 'y', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'd132bf1c-9aed-4c51-9cce-ceddae1fafb4', '454e44c9-dcd6-44f4-94c5-07cb14241bc2', '', 'b', '', '', '', 'si', 'm', 'created', '', '2021-12-29 06:12:16', 1),
(31, '93c36f07-4bd4-4cf8-aee1-0e37df56b476', 'Myself', '', 'Akshay S', '5012bbce-da36-447d-a86c-9b83ed0d1153', 24, 168, 65, 'Abled', 'b9badf6b-b235-4bb4-a828-8bb4a417831f', 'Single', 'Male', 'akshaysmail897@gmail.com', '9074338475', 60007, 99999999, 'Akshay Bhavan', 'Vendar PO', 'abfb869f-2b97-4343-98db-d59fcd4ecb5e', 'private', '3a23b1ce-c20e-40fe-9f0e-005a5abd21f7', 'd4e61297-5cea-42ac-998d-bdde312e135d', '529f864f-9c9f-42d3-b36c-3e53b9993890', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '230a704b-342e-49e4-b4c4-9f55692eb4df', 'f1d60ad2-337a-47cc-8077-058e1f650fce', '1', '622d8c04-af4f-47ee-aae8-948d66d8438e', 'd', 'yes', 'h', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'd4e61297-5cea-42ac-998d-bdde312e135d', '3a23b1ce-c20e-40fe-9f0e-005a5abd21f7', 'e6aed759-7c43-4147-b202-31949fbdea73', 'kollam', 'kollam', 'origin', 'kollam', 'd', 'fam', 'fat', 'fat', 'mot', 'mot', 1, 1, 'No', 'No', 'u', 'jjjj', NULL, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '230a704b-342e-49e4-b4c4-9f55692eb4df', 'f1d60ad2-337a-47cc-8077-058e1f650fce', '1', '622d8c04-af4f-47ee-aae8-948d66d8438e', 't', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'd4e61297-5cea-42ac-998d-bdde312e135d', '3a23b1ce-c20e-40fe-9f0e-005a5abd21f7', 'e6aed759-7c43-4147-b202-31949fbdea73', 'a', '2fa64476-3f13-4346-b572-7d4965e66c40', 'business', 'dff86349-f6bb-494b-842e-e0d678a9db30', 'di', 'p', 'created', '', '2021-12-29 07:33:55', 1),
(32, '961792c7-321a-4abe-999c-267ae91e12cd', 'Myself', '', 'tuy', '5012bbce-da36-447d-a86c-9b83ed0d1153', 876, 87686, 8768, 'Abled', '', 'Single', 'Male', 'jh', '9846285314', 39484, 0, 'hgh', 'jhj', '', '', '', '', '', '', '', '', '', '1', '', 's', 'yes', 'r', '', '', '', '', '', 'h', 'hh', 'h', 'hjj', 'd', 'jj', 'kk', 'kjh', 'jhg', 'hj', 4, 4, 'Yes', 'Yes', 'p', '', NULL, '', '', '', '2', '', 'y', '', '', '', '', '', 'b', '', '', '', 'si', 'm', 'approved', '', '2021-12-29 07:39:14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `client_image`
--

CREATE TABLE `client_image` (
  `pro_image_id` int(11) NOT NULL,
  `pro_image_uuid` varchar(500) NOT NULL,
  `profile_uuid` varchar(500) NOT NULL,
  `pro_image` varchar(500) NOT NULL,
  `pro_image_ismain` varchar(500) NOT NULL,
  `pro_image_isactive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_image`
--

INSERT INTO `client_image` (`pro_image_id`, `pro_image_uuid`, `profile_uuid`, `pro_image`, `pro_image_ismain`, `pro_image_isactive`) VALUES
(1, '', '1d613b65-6ce8-43a5-9dd3-6b3e62dae0f9', '85a6df2f688f4aa96159d2ba7a1962f6.png', '0', 1),
(2, '', '66369d68-dcd5-43a9-a758-85888ef00501', '85a6df2f688f4aa96159d2ba7a1962f6.png', '0', 1),
(3, '', '5b50e4c4-feb1-4b4c-8ee3-5e810f59693e', 'cfadc8f8f4b05baa8cdc48db00047d25.png', '0', 1),
(4, '', '695a63d5-4222-4df6-914d-51f53d6b67ab', '85a6df2f688f4aa96159d2ba7a1962f6.png', '0', 1),
(5, '', 'ed5d33ee-7c16-4784-b0e2-ec59cdc82e98', 'cfadc8f8f4b05baa8cdc48db00047d25.png', '0', 1),
(6, '', '27404ee0-29b5-4a81-b7a7-3c8dea93503d', 'd67e46e9ff20705eed6eec199bac4116.png', '0', 1),
(7, '', '18d35e15-3a9b-49f1-b80e-eac381939920', '85a6df2f688f4aa96159d2ba7a1962f6.png', '0', 1),
(8, '', '197eec6e-4512-4e18-93c4-3809b7e6166a', 'cfadc8f8f4b05baa8cdc48db00047d25.png', '0', 1),
(9, '', 'a97123ab-421d-4aa0-8b3b-030fa8a6074f', 'd67e46e9ff20705eed6eec199bac4116.png', '0', 1),
(10, '', 'c1ae86fc-7aa7-4ccb-bec9-834f46f6c567', 'e68f4bd998dd003f4f53b195434a356a.png', '0', 1),
(11, '', '805f23f9-4776-4825-906c-5f3d8928359a', '22b5e67a27a2408c48bf27d1442d54fd.png', '0', 1),
(12, '7a0f7ec4-14e3-4922-a085-2446ef4117cc', '22af96d6-dd3d-4f40-9047-0bdb5e391332', '4d821a8cc19d324ac4457809fddbb138.png', '0', 1),
(13, 'aa2658d1-7344-4992-b17a-dc6311b5707d', '22af96d6-dd3d-4f40-9047-0bdb5e391332', '4d821a8cc19d324ac4457809fddbb138.png', '0', 1),
(14, 'dd35e5af-7947-45c5-a804-6c8ceddd63f7', '22af96d6-dd3d-4f40-9047-0bdb5e391332', '556dd7e292d4a21f800c7f507fbf08d4.png', '0', 1),
(15, 'ccab1696-842d-44e1-a433-bdc9b05dac01', '22af96d6-dd3d-4f40-9047-0bdb5e391332', '4d821a8cc19d324ac4457809fddbb138.png', '0', 1),
(16, 'eb38a00d-21d0-4772-b553-19db7ae4f89d', '22af96d6-dd3d-4f40-9047-0bdb5e391332', '556dd7e292d4a21f800c7f507fbf08d4.png', '0', 1),
(17, '94b25dbb-0d3d-49f7-9b4c-2e05d3d83712', '22af96d6-dd3d-4f40-9047-0bdb5e391332', 'd974d600ff90772adac2502e4704b987.png', '0', 1),
(18, '81544983-6c5a-4657-8e91-64ad4e2e8ff5', '22af96d6-dd3d-4f40-9047-0bdb5e391332', '4d821a8cc19d324ac4457809fddbb138.png', '0', 1),
(19, 'd76b3e68-81b7-495a-9115-46a05cd5e8fc', '22af96d6-dd3d-4f40-9047-0bdb5e391332', '556dd7e292d4a21f800c7f507fbf08d4.png', '0', 1),
(20, '798e59f9-3fb8-4c54-9c47-c4e1ea4fa11c', '22af96d6-dd3d-4f40-9047-0bdb5e391332', 'd974d600ff90772adac2502e4704b987.png', '0', 1),
(21, '3c14678c-d96b-47cf-9771-88f65fa4a386', '22af96d6-dd3d-4f40-9047-0bdb5e391332', 'f92e1c8f99795ef604c10d8995664655.png', '0', 1),
(22, '03c414e6-562f-4404-9a86-3c1ff50c3890', '36b00541-ce15-4b2b-89d5-da24eb535a72', '2f6abe36d2d13aa3d1e713a05bb6115a.png', '0', 1),
(23, 'a73e10ac-33da-4072-a845-83d89cb845d6', '36b00541-ce15-4b2b-89d5-da24eb535a72', '2f6abe36d2d13aa3d1e713a05bb6115a.png', '0', 1),
(24, '83266c9c-c4fd-4b25-b239-19bd5c47c419', '36b00541-ce15-4b2b-89d5-da24eb535a72', '99436e43d74378b42e8155d437c78265.png', '0', 1),
(25, '09b2bc14-6cce-47f1-a407-07b687e8aa77', '36b00541-ce15-4b2b-89d5-da24eb535a72', '2f6abe36d2d13aa3d1e713a05bb6115a.png', '0', 1),
(26, '583423a2-87ac-4b28-9e08-66b7f21ba390', '36b00541-ce15-4b2b-89d5-da24eb535a72', '99436e43d74378b42e8155d437c78265.png', '0', 1),
(27, '6550497c-8e0a-4463-bf2d-3d25868e4793', '36b00541-ce15-4b2b-89d5-da24eb535a72', '6b5a566f96360516ffc7f0b61e7ef1b2.png', '0', 1),
(28, '9e2e3f92-9671-4845-9893-838694d2a5a1', '36b00541-ce15-4b2b-89d5-da24eb535a72', '2f6abe36d2d13aa3d1e713a05bb6115a.png', '0', 1),
(29, '7cd6c918-a7fe-4ae4-9e2e-4aa867942825', '36b00541-ce15-4b2b-89d5-da24eb535a72', '99436e43d74378b42e8155d437c78265.png', '0', 1),
(30, '190b96c9-eecf-4a67-a9fc-9ef4b1c78d4a', '36b00541-ce15-4b2b-89d5-da24eb535a72', '6b5a566f96360516ffc7f0b61e7ef1b2.png', '0', 1),
(31, 'b8151ee6-1ab2-4a84-bdbe-bfffd401d26b', '36b00541-ce15-4b2b-89d5-da24eb535a72', '83e1df331195f8413ef7cfb843ad81b5.png', '0', 1),
(32, '662e9e07-bc36-4059-849e-135bc9973e0e', 'b59cae91-2d3c-4671-aad6-b621c27c52c8', '438668598cf4c1f1eb0946e60c06ddf9.png', '0', 1),
(33, 'f502cd92-a2e4-4310-9d20-2c3d791a3ece', 'b59cae91-2d3c-4671-aad6-b621c27c52c8', '438668598cf4c1f1eb0946e60c06ddf9.png', '0', 1),
(34, '991efcd9-e477-4c15-83fe-0bd8d5e306b6', 'b59cae91-2d3c-4671-aad6-b621c27c52c8', 'dd4de8a1e2795453083842cee10c2ae1.png', '0', 1),
(35, '95364360-74c8-47e9-8d6c-e46a240c5377', 'b59cae91-2d3c-4671-aad6-b621c27c52c8', '438668598cf4c1f1eb0946e60c06ddf9.png', '0', 1),
(36, 'a6d2057f-42f2-4f86-a230-542a7177e853', 'b59cae91-2d3c-4671-aad6-b621c27c52c8', 'dd4de8a1e2795453083842cee10c2ae1.png', '0', 1),
(37, 'f1d560bb-b077-4201-9457-3afa3d553f9e', 'b59cae91-2d3c-4671-aad6-b621c27c52c8', '4449af521174bde721785bac38f62cf2.png', '0', 1),
(38, 'ad2344e9-d6ff-49c2-8bec-27d7a4f9b425', 'bcde8d40-a120-4303-bc13-e90fc0249c13', '438668598cf4c1f1eb0946e60c06ddf9.png', '0', 1),
(39, '2a590745-d984-4085-8812-67e61fb1a77d', 'bcde8d40-a120-4303-bc13-e90fc0249c13', '438668598cf4c1f1eb0946e60c06ddf9.png', '0', 1),
(40, '5f04af6a-9f60-4a76-86d2-55c0b7d3c31b', 'bcde8d40-a120-4303-bc13-e90fc0249c13', 'dd4de8a1e2795453083842cee10c2ae1.png', '0', 1),
(41, '8e092184-155e-4e5d-8e15-925a217fde2e', 'bcde8d40-a120-4303-bc13-e90fc0249c13', '438668598cf4c1f1eb0946e60c06ddf9.png', '0', 1),
(42, 'ed32eeca-a2f9-4b8a-b253-4ddfdcedce3c', 'bcde8d40-a120-4303-bc13-e90fc0249c13', 'dd4de8a1e2795453083842cee10c2ae1.png', '0', 1),
(43, '4cc3debe-9cd5-4cc5-a466-be0c106948fd', 'bcde8d40-a120-4303-bc13-e90fc0249c13', '4449af521174bde721785bac38f62cf2.png', '0', 1),
(44, '4f330fa6-020e-4530-8961-2957ac448b24', '3ef8de87-d435-439c-b9d9-925678c7f508', '438668598cf4c1f1eb0946e60c06ddf9.png', '0', 1),
(45, '41523f93-3b68-4c3b-9987-46182ab60346', '3ef8de87-d435-439c-b9d9-925678c7f508', '438668598cf4c1f1eb0946e60c06ddf9.png', '0', 1),
(46, '60a97f1f-2cea-4f43-9426-5a235217c17e', '3ef8de87-d435-439c-b9d9-925678c7f508', 'dd4de8a1e2795453083842cee10c2ae1.png', '0', 1),
(47, '1eb08941-5027-4a05-b115-ba86c63f5f4a', '3ef8de87-d435-439c-b9d9-925678c7f508', '438668598cf4c1f1eb0946e60c06ddf9.png', '0', 1),
(48, '64255ae3-6ad2-4d55-8d57-a33f87b28c2f', '3ef8de87-d435-439c-b9d9-925678c7f508', 'dd4de8a1e2795453083842cee10c2ae1.png', '0', 1),
(49, 'b3240e56-fa7a-4765-94dc-fe0182abcf91', '3ef8de87-d435-439c-b9d9-925678c7f508', '4449af521174bde721785bac38f62cf2.png', '0', 1),
(50, '86fb764d-7c6c-42a6-9a64-c4a387562fb2', '1159e104-1b69-4e4b-9490-943206a393bc', '438668598cf4c1f1eb0946e60c06ddf9.png', '0', 1),
(51, '9b88d8b7-40bb-427a-b60d-0478bc41c32d', '1159e104-1b69-4e4b-9490-943206a393bc', '438668598cf4c1f1eb0946e60c06ddf9.png', '0', 1),
(52, 'b3caaa19-b573-4332-add1-10b701bfe407', '1159e104-1b69-4e4b-9490-943206a393bc', 'dd4de8a1e2795453083842cee10c2ae1.png', '0', 1),
(53, '722c443a-f7fd-4238-b361-bb1ac9a294fc', '1159e104-1b69-4e4b-9490-943206a393bc', '438668598cf4c1f1eb0946e60c06ddf9.png', '0', 1),
(54, 'cd4329f6-b90d-4329-9900-5eeccc38b180', '1159e104-1b69-4e4b-9490-943206a393bc', 'dd4de8a1e2795453083842cee10c2ae1.png', '0', 1),
(55, '4383f18e-449a-4390-b37c-869e43706b39', '1159e104-1b69-4e4b-9490-943206a393bc', '4449af521174bde721785bac38f62cf2.png', '0', 1),
(56, '01708dd1-edf1-44f6-a59a-adc4bb5a9aa7', '7410ddea-33f0-4501-85d7-cfc6139e039d', '438668598cf4c1f1eb0946e60c06ddf9.png', '0', 1),
(57, '9d96cfc9-b066-439d-a4b0-b966edbc5837', '7410ddea-33f0-4501-85d7-cfc6139e039d', '438668598cf4c1f1eb0946e60c06ddf9.png', '0', 1),
(58, '7fea1891-8297-468c-af4b-d6e2ed602c42', '7410ddea-33f0-4501-85d7-cfc6139e039d', 'dd4de8a1e2795453083842cee10c2ae1.png', '0', 1),
(59, '604d65a5-d606-40e1-80a5-349a80ad6ae4', '7410ddea-33f0-4501-85d7-cfc6139e039d', '438668598cf4c1f1eb0946e60c06ddf9.png', '0', 1),
(60, '667d175c-461f-4fbe-af73-9faacfdf6109', '7410ddea-33f0-4501-85d7-cfc6139e039d', 'dd4de8a1e2795453083842cee10c2ae1.png', '0', 1),
(61, 'f5b87bd0-8c85-46a8-872b-42b6e772fcb1', '7410ddea-33f0-4501-85d7-cfc6139e039d', '4449af521174bde721785bac38f62cf2.png', '0', 1),
(62, 'd4240c43-6be5-46ec-bf78-e2425440607a', 'f399784b-ef04-4bc5-bdcd-aba817398e89', '438668598cf4c1f1eb0946e60c06ddf9.png', '0', 1),
(63, '830c34e7-bd67-4f7a-adcd-10d32ebc1eec', 'f399784b-ef04-4bc5-bdcd-aba817398e89', '438668598cf4c1f1eb0946e60c06ddf9.png', '0', 1),
(64, '01a066bf-b36f-4ac7-8d89-f0a1d5e15894', 'f399784b-ef04-4bc5-bdcd-aba817398e89', 'dd4de8a1e2795453083842cee10c2ae1.png', '0', 1),
(65, 'a4ca7978-802a-4926-9708-c083ec5d3720', 'f399784b-ef04-4bc5-bdcd-aba817398e89', '438668598cf4c1f1eb0946e60c06ddf9.png', '0', 1),
(66, 'db7d8337-1729-44e0-a80e-ac5b1d9963de', 'f399784b-ef04-4bc5-bdcd-aba817398e89', 'dd4de8a1e2795453083842cee10c2ae1.png', '0', 1),
(67, '66572299-e146-4837-a444-ba3a3b0a01e2', 'f399784b-ef04-4bc5-bdcd-aba817398e89', '4449af521174bde721785bac38f62cf2.png', '0', 1),
(68, 'cbbab2c8-0abc-4fca-9413-d8d055229932', '44a26311-b14d-4c2c-8a99-58882862ad77', '438668598cf4c1f1eb0946e60c06ddf9.png', '0', 1),
(69, 'd79e84d1-17a8-4a15-ac9d-90df5c38b1ba', '44a26311-b14d-4c2c-8a99-58882862ad77', '438668598cf4c1f1eb0946e60c06ddf9.png', '0', 1),
(70, '9b3e90f8-6937-4fbf-afd2-f6d38a70364f', '44a26311-b14d-4c2c-8a99-58882862ad77', 'dd4de8a1e2795453083842cee10c2ae1.png', '0', 1),
(71, 'fa5fc3d1-c4aa-4f1b-bdc1-aa6099f644a1', '44a26311-b14d-4c2c-8a99-58882862ad77', '438668598cf4c1f1eb0946e60c06ddf9.png', '0', 1),
(72, 'c17a0699-e9b4-44d3-b693-7831bc84e427', '44a26311-b14d-4c2c-8a99-58882862ad77', 'dd4de8a1e2795453083842cee10c2ae1.png', '0', 1),
(73, '515fe54e-d64f-4a59-b8d2-113ed98e6d04', '44a26311-b14d-4c2c-8a99-58882862ad77', '4449af521174bde721785bac38f62cf2.png', '0', 1),
(74, 'c3726004-21a5-466f-b0e0-bb7160633448', 'a0d3d0ae-beaa-4ba6-9e89-d5d05453d02a', '13510be606b1c221ecbdfe08e7b441f8.png', '0', 1),
(75, 'b6c8b4c8-26ce-4429-813d-34afdc2a381f', 'a0d3d0ae-beaa-4ba6-9e89-d5d05453d02a', '13510be606b1c221ecbdfe08e7b441f8.png', '0', 1),
(76, 'ba683e47-8ceb-4e27-a14a-f5732954ab52', 'a0d3d0ae-beaa-4ba6-9e89-d5d05453d02a', '6dd9921e729f7929398f4af52c81dc35.png', '0', 1),
(77, 'c28b4d52-322c-4f5d-95a0-a22ce8c86d9b', 'f77c3731-bd92-41ac-bfc9-95f0483564be', '19691912620286d8fab048bfb540b994.jpg', '0', 1),
(78, '9d09f628-a187-4a2a-897c-8184cc148972', 'f77c3731-bd92-41ac-bfc9-95f0483564be', '19691912620286d8fab048bfb540b994.jpg', '0', 1),
(79, '84a6a2ea-fd47-42ac-9f89-2796a31f8ba2', 'f77c3731-bd92-41ac-bfc9-95f0483564be', 'fed42e0a779512c6580415f2fd490649.jpg', '0', 1),
(80, '7f17133c-d8b1-49df-a979-c84dcf515b9c', 'f77c3731-bd92-41ac-bfc9-95f0483564be', '19691912620286d8fab048bfb540b994.jpg', '0', 1),
(81, '3690091e-a6a5-4950-bfb6-6accd72ab628', 'f77c3731-bd92-41ac-bfc9-95f0483564be', 'fed42e0a779512c6580415f2fd490649.jpg', '0', 1),
(82, 'f369d623-2739-4bff-a886-9f44f1656452', 'f77c3731-bd92-41ac-bfc9-95f0483564be', '0ca83d479bae35bb695e7a40b7d75e24.jpg', '0', 1),
(83, 'af19be0c-d18e-4349-a853-6d632ec3be33', '8a89d870-2808-46c7-9041-762723bc569b', 'ddf455cc76294c338f65324b141d1c9d.png', '0', 1),
(84, 'f5b90edf-19ff-45d0-b185-e6d74ffc4a68', '8a89d870-2808-46c7-9041-762723bc569b', 'ddf455cc76294c338f65324b141d1c9d.png', '0', 1),
(85, 'd72f2c2b-18e7-4a7c-ac1d-da1fca4e18a9', '8a89d870-2808-46c7-9041-762723bc569b', 'e8ec03c53af80b47711f6225eea830c2.jpg', '0', 1),
(86, '30766c9d-c14e-442b-8b53-5680b3f2b60f', '8a89d870-2808-46c7-9041-762723bc569b', 'ddf455cc76294c338f65324b141d1c9d.png', '0', 1),
(87, 'a8816991-4127-4fca-a082-00867d8e525b', '8a89d870-2808-46c7-9041-762723bc569b', 'e8ec03c53af80b47711f6225eea830c2.jpg', '0', 1),
(88, 'a149340a-ac7f-4d09-8934-470919fc1fb4', '8a89d870-2808-46c7-9041-762723bc569b', '4613ab89adba5874a73386302fd35aa1.jpg', '0', 1),
(89, 'f232e333-311f-4848-baff-42ffb0ccb46c', 'da5cccdf-2ecd-44b9-ad30-51055c0a4af5', '69b26a25c656afa6941d1341d24ab7f8.png', '0', 1),
(90, 'b733e940-6d03-48b4-986d-c43a1af002c5', 'da5cccdf-2ecd-44b9-ad30-51055c0a4af5', '69b26a25c656afa6941d1341d24ab7f8.png', '0', 1),
(91, '8ef3871c-b761-4b66-aebc-eb211e2fb59b', 'da5cccdf-2ecd-44b9-ad30-51055c0a4af5', '924f32892319ad4ff9871e0d95d887ab.png', '0', 1),
(92, '8d4b63f6-470b-4229-b56f-044bbc0fc202', 'da5cccdf-2ecd-44b9-ad30-51055c0a4af5', '69b26a25c656afa6941d1341d24ab7f8.png', '0', 1),
(93, '796282e2-5145-4893-960a-90c88496dfa5', 'da5cccdf-2ecd-44b9-ad30-51055c0a4af5', '924f32892319ad4ff9871e0d95d887ab.png', '0', 1),
(94, '1f3b8b51-1140-4437-acee-f473216ec7f1', 'da5cccdf-2ecd-44b9-ad30-51055c0a4af5', 'a2ec2b52e472773273d5d6cbe92f17e0.png', '0', 1),
(95, '143f4310-378e-42ad-824a-5f722ea537bc', 'da5cccdf-2ecd-44b9-ad30-51055c0a4af5', 'db8385e57ad5193038ff2334203b5d09.png', '0', 1),
(96, '42766d45-911e-4f69-8471-019ed3b184d6', 'da5cccdf-2ecd-44b9-ad30-51055c0a4af5', '57ff82beca0738aa60697657817f86b7.png', '1', 1),
(97, '9511724f-e8e8-4017-8ca1-7c6eafef1386', 'b4cf83e3-55d5-4865-9b01-48eb05466d25', '70341efa78821547e5fc692fcac57564.png', '0', 1),
(98, '93b811d4-a958-471f-bbc2-72f01def5a9d', 'b4cf83e3-55d5-4865-9b01-48eb05466d25', '70341efa78821547e5fc692fcac57564.png', '0', 1),
(99, '089d1254-78c6-4323-b020-43b121c713d9', 'b4cf83e3-55d5-4865-9b01-48eb05466d25', 'edd289371a557310212f32318f05cbbc.png', '0', 1),
(100, '13834251-7ef6-451d-98c9-ef34b56a34ce', 'b4cf83e3-55d5-4865-9b01-48eb05466d25', '6cc43f37430d9d543ce90060b7a80b45.png', '0', 1),
(101, '9c5bfc56-265e-41a7-8a7e-af32363441b0', 'b4cf83e3-55d5-4865-9b01-48eb05466d25', '70341efa78821547e5fc692fcac57564.png', '0', 1),
(102, '18c5f0a5-0b8b-4ba8-ad56-473a46d9f540', 'b4cf83e3-55d5-4865-9b01-48eb05466d25', 'edd289371a557310212f32318f05cbbc.png', '0', 1),
(103, 'fd0ab6b3-346a-4156-93db-ab475aa6c5cd', 'b4cf83e3-55d5-4865-9b01-48eb05466d25', '6cc43f37430d9d543ce90060b7a80b45.png', '0', 1),
(104, 'dd7d706d-1852-4583-8d2e-3bf194d10cd2', 'b4cf83e3-55d5-4865-9b01-48eb05466d25', '9237a93ad64102f9ad48311fb43844ba.png', '0', 1),
(105, '1b315435-c247-4046-aaee-955f8636f37b', 'cc3ce7d4-6fe2-4513-80ed-64632b46cb04', '6096525567f7271f7c4aa445ccb8e74e.png', '0', 1),
(106, '40b44eb6-db0f-4f0c-9801-887b6ecd8925', 'cc3ce7d4-6fe2-4513-80ed-64632b46cb04', '6096525567f7271f7c4aa445ccb8e74e.png', '0', 1),
(107, '1e12c694-7971-40bb-898c-9c9d171b5b2d', 'cc3ce7d4-6fe2-4513-80ed-64632b46cb04', '6891a6aae5ed0a06278d5cc156178959.png', '0', 1),
(108, '729ceb31-24da-43d8-b147-02e7b1312abf', 'cc3ce7d4-6fe2-4513-80ed-64632b46cb04', '6096525567f7271f7c4aa445ccb8e74e.png', '0', 1),
(109, '92213496-25a1-4506-a43d-f97c61dd5b92', 'cc3ce7d4-6fe2-4513-80ed-64632b46cb04', '6891a6aae5ed0a06278d5cc156178959.png', '0', 1),
(110, 'b64c838b-ec49-482b-ab08-0213f41821d5', 'cc3ce7d4-6fe2-4513-80ed-64632b46cb04', '59e019e6bd14e80d86e3c20395f93355.png', '0', 1),
(111, '773ab3f7-82be-462f-a909-f9b105572ff3', 'cc3ce7d4-6fe2-4513-80ed-64632b46cb04', '77f5dd43a79465084c9502a2c0d05c6b.png', '0', 1),
(112, '9ba461f2-6163-45e5-bcf7-ce29d2732298', '72ec08e7-d217-447e-ae98-353486cc6f87', 'cb2e59772e5dbb5a530ef0a1560a8a83.png', '0', 1),
(113, 'dbc69d0d-574e-47c6-94be-9de58e9c5595', '72ec08e7-d217-447e-ae98-353486cc6f87', 'cb2e59772e5dbb5a530ef0a1560a8a83.png', '0', 1),
(114, 'e37fa30e-b53b-4d94-91d3-3e199e782ce7', '72ec08e7-d217-447e-ae98-353486cc6f87', '23aafbbe294e2412bca142fc2f932b35.png', '0', 1),
(115, '27345acc-e0a2-44a5-9134-1b144f475e3b', 'd443573a-3bb2-41a7-8958-ef6e7e33dea3', 'b396757e64e3f3da985a4032295638af.png', '0', 1),
(116, '3ad5e3c4-a490-4ffb-9b05-a023953691d5', 'd443573a-3bb2-41a7-8958-ef6e7e33dea3', 'b396757e64e3f3da985a4032295638af.png', '0', 1),
(117, 'f1372ebd-cb0a-4ab9-a520-8937e73fc497', 'd443573a-3bb2-41a7-8958-ef6e7e33dea3', '3e713bc6637fd3e1dafcb91b804b7af5.png', '0', 1),
(118, 'bb1253cd-ed90-44b4-b2e4-5f9aaf9e9c92', 'd443573a-3bb2-41a7-8958-ef6e7e33dea3', 'b396757e64e3f3da985a4032295638af.png', '1', 1),
(119, 'adae1ab7-aa61-49c4-b50e-d5e2f119c3c1', 'd443573a-3bb2-41a7-8958-ef6e7e33dea3', '3e713bc6637fd3e1dafcb91b804b7af5.png', '0', 1),
(120, 'a18f4439-9e31-4cb0-8ee5-4d3be85894de', 'd443573a-3bb2-41a7-8958-ef6e7e33dea3', '222323121c150547007721441a9d48b5.png', '0', 1),
(121, '70b01d56-47db-446a-94fe-918241e58506', '61925df6-5249-4462-9ac7-7531110cded0', '4ca3a404f1015ba71de827449af3d3ec.png', '0', 0),
(122, 'f2465aaa-e421-4c8b-95b3-441b0dfe4300', '61925df6-5249-4462-9ac7-7531110cded0', 'c72c1ea605b4d009ff1ad512e7888c2b.jpg', '1', 0),
(123, 'f515d53a-d979-46da-96b4-69cc712701c5', '61925df6-5249-4462-9ac7-7531110cded0', 'c72c1ea605b4d009ff1ad512e7888c2b.jpg', '0', 0),
(124, '96b749e8-2cd3-4d31-a65b-5973bbed6ad2', '61925df6-5249-4462-9ac7-7531110cded0', 'f7ee519ebf8963d630a9b40a326cb5d9.jpg', '0', 0),
(125, '7e94dfb6-37c0-4dd3-aecb-6f39fb1c6181', '61925df6-5249-4462-9ac7-7531110cded0', 'c72c1ea605b4d009ff1ad512e7888c2b.jpg', '0', 0),
(126, '12112404-8b79-4e41-b69d-f458a1cdfb51', '61925df6-5249-4462-9ac7-7531110cded0', 'f7ee519ebf8963d630a9b40a326cb5d9.jpg', '0', 0),
(127, '85869703-ff81-4a84-913d-397f33485b91', '61925df6-5249-4462-9ac7-7531110cded0', 'ff1e161d1fc83888236f1fa02250da4b.jpg', '0', 0),
(128, '16523411-dbe6-4e1b-b1eb-c2998fb2f91d', '233d0fdb-52f7-4cf3-92e5-379e84e6952f', '1e2585c728d2b37fbec34a6f23c985e9.png', '1', 0),
(129, 'c267b621-b029-4d07-b92f-4b878c6e2133', '61925df6-5249-4462-9ac7-7531110cded0', 'ff1e161d1fc83888236f1fa02250da4b.jpg', '1', 0),
(130, '7cba637d-9d7e-4eac-8999-43c5a9249e5c', '61925df6-5249-4462-9ac7-7531110cded0', 'f7ee519ebf8963d630a9b40a326cb5d9.jpg', '0', 0),
(131, '7ce06503-4744-42e5-b135-d3be860c685b', '61925df6-5249-4462-9ac7-7531110cded0', 'c72c1ea605b4d009ff1ad512e7888c2b.jpg', '0', 0),
(132, 'e895e44c-76ac-4262-a009-e5dc17a72420', '61925df6-5249-4462-9ac7-7531110cded0', 'f7ee519ebf8963d630a9b40a326cb5d9.jpg', '0', 0),
(133, '08411a47-c860-4619-8f6e-f8e52ba2e175', '61925df6-5249-4462-9ac7-7531110cded0', 'ff1e161d1fc83888236f1fa02250da4b.jpg', '1', 0),
(134, 'd88a8fce-bc4d-4904-b000-ad2e191fe7b6', '61925df6-5249-4462-9ac7-7531110cded0', 'f7ee519ebf8963d630a9b40a326cb5d9.jpg', '0', 0),
(135, 'd4440f72-eab3-4a13-8f05-a40885d3512f', '61925df6-5249-4462-9ac7-7531110cded0', 'c72c1ea605b4d009ff1ad512e7888c2b.jpg', '0', 0),
(136, '473ee035-7246-46e7-b7ad-72ccb0664ec8', '61925df6-5249-4462-9ac7-7531110cded0', 'f7ee519ebf8963d630a9b40a326cb5d9.jpg', '0', 0),
(137, '337ab330-43f4-4865-8e2a-c6895337c656', '61925df6-5249-4462-9ac7-7531110cded0', 'f7ee519ebf8963d630a9b40a326cb5d9.jpg', '1', 0),
(138, 'b300ef20-c00c-4129-b15c-e7589e61de11', '61925df6-5249-4462-9ac7-7531110cded0', 'c72c1ea605b4d009ff1ad512e7888c2b.jpg', '0', 0),
(139, 'b43408de-7347-4dca-a96f-83d82e56af2e', '61925df6-5249-4462-9ac7-7531110cded0', 'f7ee519ebf8963d630a9b40a326cb5d9.jpg', '0', 0),
(140, '36772260-a90d-41c3-b568-5212a64d787c', '61925df6-5249-4462-9ac7-7531110cded0', 'ff1e161d1fc83888236f1fa02250da4b.jpg', '0', 0),
(141, '8c00b921-4368-4df0-b507-dfd360bcb321', '61925df6-5249-4462-9ac7-7531110cded0', 'ff1e161d1fc83888236f1fa02250da4b.jpg', '1', 0),
(142, '5808e75f-57ab-41fe-b281-dae0e4486765', '61925df6-5249-4462-9ac7-7531110cded0', 'f7ee519ebf8963d630a9b40a326cb5d9.jpg', '0', 0),
(143, '9e2d2fa8-aae8-4511-8d8c-eb4705f3c153', '61925df6-5249-4462-9ac7-7531110cded0', 'c72c1ea605b4d009ff1ad512e7888c2b.jpg', '0', 0),
(144, '1223395e-c2da-43a1-a48e-5b5dbc2cac68', '61925df6-5249-4462-9ac7-7531110cded0', 'f7ee519ebf8963d630a9b40a326cb5d9.jpg', '0', 0),
(145, '6541a27a-e1ab-4dfb-8293-8a65cc888963', '233d0fdb-52f7-4cf3-92e5-379e84e6952f', '1e2585c728d2b37fbec34a6f23c985e9.png', '1', 1),
(146, '840ec298-520f-43b4-8372-7b8be604ba11', '61925df6-5249-4462-9ac7-7531110cded0', 'f7ee519ebf8963d630a9b40a326cb5d9.jpg', '0', 1),
(147, '69f3b768-b5c1-493c-a5f3-f8dcd87fe530', '61925df6-5249-4462-9ac7-7531110cded0', 'c72c1ea605b4d009ff1ad512e7888c2b.jpg', '1', 1),
(148, 'f55bc6b6-b1c8-4675-8115-21eeb7da4438', '61925df6-5249-4462-9ac7-7531110cded0', 'f7ee519ebf8963d630a9b40a326cb5d9.jpg', '0', 1),
(149, '040b94c3-9597-4b82-b746-cc178a4e6d8b', '61925df6-5249-4462-9ac7-7531110cded0', 'ff1e161d1fc83888236f1fa02250da4b.jpg', '0', 1),
(150, 'b5b392f0-0ca5-4b83-82e8-391061b3e7bb', '5ffd44fa-40b9-488e-8d11-736667300d7c', '78301dd9c98a5a4028c1cdb219b98ad7.jpg', '1', 1),
(151, '696ec91d-c57f-4b7c-8808-7426f7ceed20', '7c81f423-e364-4992-8e1a-8e5090b7d5a9', '0d9483c28bcf6f7061fd9c7e9c783b90.jpg', '1', 1),
(152, 'a64c788d-ab7c-46e0-bd19-873477c65f2e', 'd519922f-f4f0-4002-ab44-6ef3f8189a93', 'aebefe77259b93edbbc8b2405226286b.jpg', '1', 0),
(153, '3a40b805-f302-4832-9838-2b2c51c57ebf', 'd519922f-f4f0-4002-ab44-6ef3f8189a93', 'aebefe77259b93edbbc8b2405226286b.jpg', '1', 0),
(154, '5acd568c-ac9b-4e6c-bf38-99aea2d09aa9', 'd519922f-f4f0-4002-ab44-6ef3f8189a93', 'aebefe77259b93edbbc8b2405226286b.jpg', '1', 0),
(155, '45799832-5072-4077-8c74-ea13157a39c0', 'd519922f-f4f0-4002-ab44-6ef3f8189a93', 'aebefe77259b93edbbc8b2405226286b.jpg', '1', 0),
(156, 'f3c45731-e4eb-4545-9ac7-67ebfe9d0d02', 'd519922f-f4f0-4002-ab44-6ef3f8189a93', 'aebefe77259b93edbbc8b2405226286b.jpg', '1', 1),
(157, 'ba3f2dcd-f7c5-4472-a2df-81a7fcc444d4', '93c36f07-4bd4-4cf8-aee1-0e37df56b476', 'ad7472fae4e6b71a1094968255920b07.jpg', '1', 0),
(158, '09c82e61-9da5-4ceb-b3fd-81930d7204f7', '93c36f07-4bd4-4cf8-aee1-0e37df56b476', 'ee242ecd8c130e65b4cde2ab55984a07.jpg', '0', 0),
(159, '1cb8e68b-9e10-413e-8775-90cf8c577ca6', '93c36f07-4bd4-4cf8-aee1-0e37df56b476', '433545ff6d23e16941b8ca67aa33d64d.jpg', '0', 0),
(160, '5d427ce9-8719-4d3d-9aa2-3800e41ec548', '93c36f07-4bd4-4cf8-aee1-0e37df56b476', '0a36e5716e59fa3a76ee48e7cdf6ed75.jpg', '0', 0),
(161, 'be680822-d41b-4ed3-9b05-35c8479c9102', '93c36f07-4bd4-4cf8-aee1-0e37df56b476', '0a36e5716e59fa3a76ee48e7cdf6ed75.jpg', '0', 1),
(162, '025d7432-a273-4a8e-b41e-9ffb07b2b9a2', '93c36f07-4bd4-4cf8-aee1-0e37df56b476', '433545ff6d23e16941b8ca67aa33d64d.jpg', '0', 1),
(163, '6b01b634-c6ab-4653-a7f1-c10031688ea4', '93c36f07-4bd4-4cf8-aee1-0e37df56b476', 'ee242ecd8c130e65b4cde2ab55984a07.jpg', '0', 1),
(164, 'f6ab1213-60c9-418e-aba6-b10195cac2d1', '93c36f07-4bd4-4cf8-aee1-0e37df56b476', 'ad7472fae4e6b71a1094968255920b07.jpg', '1', 1),
(165, '6434ba92-c7ad-45bd-b579-708484daee30', '961792c7-321a-4abe-999c-267ae91e12cd', 'b4cf2b2b8bfbfa2441be68fd25a4f7d8.jpg', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `client_request`
--

CREATE TABLE `client_request` (
  `client_request_id` int(11) NOT NULL,
  `client_request_uuid` varchar(50) NOT NULL,
  `client_request_from` varchar(50) NOT NULL,
  `client_request_to` varchar(50) NOT NULL,
  `client_request_date` date DEFAULT NULL,
  `client_request_update_date` date DEFAULT NULL,
  `client_request_status` enum('created','accepted','rejected','pending') NOT NULL DEFAULT 'created'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_request`
--

INSERT INTO `client_request` (`client_request_id`, `client_request_uuid`, `client_request_from`, `client_request_to`, `client_request_date`, `client_request_update_date`, `client_request_status`) VALUES
(1, '2443c10a-e550-4438-8151-af8bc4a3cc9f', '61925df6-5249-4462-9ac7-7531110cded0', 'da5cccdf-2ecd-44b9-ad30-51055c0a4af5', '2021-12-20', NULL, 'accepted'),
(3, '01831f5d-8fff-46fc-94a9-b4eb08478a95', '72ec08e7-d217-447e-ae98-353486cc6f87', 'da5cccdf-2ecd-44b9-ad30-51055c0a4af5', '2021-12-20', NULL, 'accepted'),
(4, 'c9e4f140-6901-44db-890a-c6bf2973257b', 'da5cccdf-2ecd-44b9-ad30-51055c0a4af5', 'f77c3731-bd92-41ac-bfc9-95f0483564be', '2021-12-20', NULL, 'accepted'),
(5, 'df16538b-dfad-47fe-b6db-cd7627ebeb46', 'da5cccdf-2ecd-44b9-ad30-51055c0a4af5', 'd443573a-3bb2-41a7-8958-ef6e7e33dea3', '2021-12-20', NULL, 'created'),
(6, '7b9821b5-c5e9-4cb1-88fe-0cbfaf8ad5bc', '233d0fdb-52f7-4cf3-92e5-379e84e6952f', 'da5cccdf-2ecd-44b9-ad30-51055c0a4af5', '2021-12-20', NULL, 'rejected'),
(7, '25281ae4-179c-4e9c-9911-d420b5a3f88b', '1d613b65-6ce8-43a5-9dd3-6b3e62dae0f9', 'da5cccdf-2ecd-44b9-ad30-51055c0a4af5', '2021-12-20', '2021-12-20', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `navbar`
--

CREATE TABLE `navbar` (
  `navId` int(11) NOT NULL,
  `navName` varchar(30) NOT NULL,
  `navIcon` varchar(100) NOT NULL,
  `navParent` int(11) NOT NULL,
  `navSlug` varchar(50) NOT NULL,
  `navOrder` int(11) NOT NULL,
  `navHref` varchar(80) NOT NULL,
  `navAriaControls` varchar(50) NOT NULL,
  `navActive` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `navbar`
--

INSERT INTO `navbar` (`navId`, `navName`, `navIcon`, `navParent`, `navSlug`, `navOrder`, `navHref`, `navAriaControls`, `navActive`) VALUES
(1, 'Dashboard', '<i class=\"fas fa-tachometer-alt\"></i>', 0, 'dashboard', 1, 'dashboard/manage', 'collapse_banner', 1),
(2, 'Members', '<i class=\"fas fa-user\"></i>', 0, 'members', 2, 'members/manage', 'collapse_banner', 1),
(4, 'Manage Members', '', 2, 'manage-members', 2, '#', '#', 1),
(5, 'Approved Members', '', 2, 'approved-members', 3, '#', '#', 1),
(6, 'Rejected Members', '', 2, 'rejected-members', 4, '#', '#', 1),
(7, 'Paid Members', '', 2, 'paid-members', 5, '#', '#', 1),
(8, 'Interests', '<i class=\"fas fa-ankh\"></i>', 0, 'interests', 3, 'interests/manage', 'collapse_banner', 1),
(9, 'Interests List', '', 8, 'manage-interests', 1, '#', '#', 1),
(10, 'Package', '<i class=\"fas fa-box\"></i>', 0, 'package', 4, 'package/manage', 'collapse_banner', 1),
(11, 'Create Package', '', 10, 'create-package', 1, '#', '#', 1),
(12, 'Manage package', '', 10, 'manage-package', 2, '#', '#', 1),
(13, 'Banner', '<i class=\"fas fa-image\"></i>', 0, 'banner', 5, 'banner/manage', 'collapse_banner', 1),
(14, 'Create Banner', '', 13, 'create-banner', 1, '#', '#', 1),
(15, 'Manage Banner', '', 13, 'manage-banner', 2, '#', '#', 1),
(16, 'Settings', '<i class=\"fas fa-user-cog\"></i>', 0, 'settings', 7, 'settings/manage', 'collapse_banner', 1),
(17, 'SiteSettings', '', 16, 'site-settings', 1, '#', '#', 1),
(18, 'Religion', '', 16, 'create-religion', 3, '#', '#', 1),
(19, 'Caste', '', 16, 'create-caste', 4, '#', '#', 1),
(20, 'SubCaste', '', 16, 'create-subcaste', 5, '#', '#', 1),
(21, 'Division', '', 16, 'create-division', 6, '#', '#', 1),
(22, 'Citizenship', '', 16, 'create-citizenship', 7, '#', '#', 1),
(23, 'Occupation', '', 16, 'create-occupation', 8, '#', '#', 1),
(24, 'Success Stories', '<i class=\"fas fa-clipboard-check\"></i>', 0, 'success', 6, 'success/manage', 'collapse_banner', 1),
(25, 'Create Success Stories', '', 24, 'create-success', 1, '#', '#', 1),
(26, 'Manage Success Stories', '', 24, 'manage-success', 2, '#', '#', 1),
(27, 'Manage SiteSettings', '', 16, 'manage-settings', 2, '#', '#', 1),
(28, 'Country', '', 16, 'create-country', 9, '#', '#', 1),
(29, 'State', '', 16, 'create-state', 10, '#', '#', 1),
(30, 'District', '', 16, 'create-district', 11, '#', '#', 1),
(31, 'Mother Tongue', '<i class=\"fas fa-box\">\r\n</i>', 600, 'mother', 8, 'mother/manage', 'collapse_banner', 1),
(32, 'Create Mother Tongue', '', 31, 'create-mother', 1, '#', '#', 1),
(33, 'Manage Mother Tongue', '', 31, 'manage-mother', 2, '#', '#', 1),
(71, 'Highest Education', '', 16, 'create-education', 11, '#', '#', 1),
(72, 'Mother Tongue', '', 16, 'manage-mother-tongue', 12, '', '', 1),
(73, 'City', '', 16, 'create-city', 13, '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shared_profile`
--

CREATE TABLE `shared_profile` (
  `shared_profile_id` int(11) NOT NULL,
  `shared_profile_uuid` varchar(50) NOT NULL,
  `shared_profile_profile` varchar(50) NOT NULL,
  `shared_profile_shared_by` varchar(50) NOT NULL,
  `shared_profile_status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shared_profile`
--

INSERT INTO `shared_profile` (`shared_profile_id`, `shared_profile_uuid`, `shared_profile_profile`, `shared_profile_shared_by`, `shared_profile_status`) VALUES
(1, '795c36d1-8133-4e77-9819-e9f2036fa08d', 'da5cccdf-2ecd-44b9-ad30-51055c0a4af5', '1d613b65-6ce8-43a5-9dd3-6b3e62dae0f9', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sm_baners`
--

CREATE TABLE `sm_baners` (
  `banner_id` int(11) NOT NULL,
  `banner_uuid` varchar(500) NOT NULL,
  `banner_title` varchar(1000) NOT NULL,
  `banner_image` varchar(500) NOT NULL,
  `banner_isactive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sm_baners`
--

INSERT INTO `sm_baners` (`banner_id`, `banner_uuid`, `banner_title`, `banner_image`, `banner_isactive`) VALUES
(1, '9ccabc9d-8ec8-4df6-9075-8b2afdd41eb3', 're', 'b4ee575ccd15da36ad92d1fe44e76d5c.jpg', 0),
(2, '07ad1e25-aeb8-49c3-9020-a42adbd8940a', 'pp', 'b957579f99a404bead5d32996c0a4733.png', 0),
(3, 'c394787e-babd-4421-9af3-1761765ab1cd', 'New B', '34f87e8ff84ddf48064c9d4d9983caa0.png', 0),
(4, '1521538b-d53f-4e62-a8ea-8cec586aeebe', '12', '0dffffb6e85a2150ecfd7cb820b44104.png', 1),
(5, '61bd94b5-7a1d-4cdb-b60d-b3e5b280ced1', '12', '72436fe7b2e33655cc38903ef2096080.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sm_caste`
--

CREATE TABLE `sm_caste` (
  `caste_id` int(11) NOT NULL,
  `caste_uuid` varchar(50) NOT NULL,
  `caste_name` varchar(50) NOT NULL,
  `caste_religion` varchar(50) NOT NULL,
  `caste_order` int(11) NOT NULL,
  `caste_isactive` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sm_caste`
--

INSERT INTO `sm_caste` (`caste_id`, `caste_uuid`, `caste_name`, `caste_religion`, `caste_order`, `caste_isactive`) VALUES
(1, '6995f9fc-6b74-4c97-9e1a-12f810a5c890', 'Thiyyas', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', 1, 1),
(2, '230a704b-342e-49e4-b4c4-9f55692eb4df', 'nayar', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', 3, 1),
(3, '26f16f71-617b-43fc-8f0a-bf2f1b6caa1b', 'q', 'ebddf435-b28d-4529-bf8a-00835be57848', 1, 0),
(4, '68c0ffb1-5454-4bdc-b1d9-0b6e235fe7a1', 'CASTE', 'ebddf435-b28d-4529-bf8a-00835be57848', 2, 1),
(5, '5b3e701b-1bb9-4346-b355-e8b7359c2750', 'C', '9073ee0f-4c09-4f3c-84d7-2739b612c4dc', 1, 0),
(6, 'de66cc7e-0599-416a-b1b8-2a53ca14020c', 'M A', 'bf3b79a8-6eb8-4c1a-9b71-cf3f9e8a3a2e', 1, 1),
(7, 'a8346b7a-1558-4716-a188-1176588d3481', 'M B', 'bf3b79a8-6eb8-4c1a-9b71-cf3f9e8a3a2e', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sm_citizenship`
--

CREATE TABLE `sm_citizenship` (
  `citizenship_id` int(11) NOT NULL,
  `citizenship_uuid` varchar(50) NOT NULL,
  `citizenship_name` varchar(50) NOT NULL,
  `citizenship_order` int(11) NOT NULL,
  `citizenship_isactive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sm_citizenship`
--

INSERT INTO `sm_citizenship` (`citizenship_id`, `citizenship_uuid`, `citizenship_name`, `citizenship_order`, `citizenship_isactive`) VALUES
(1, 'e6aed759-7c43-4147-b202-31949fbdea73', 'India', 1, 1),
(2, 'cbeabe54-b30b-43c5-8e21-f38bc57ddd26', 'Japan', 2, 0),
(3, '8c0248af-b06b-4263-90fa-d8d6c29e688d', 'USA', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sm_city`
--

CREATE TABLE `sm_city` (
  `city_id` int(11) NOT NULL,
  `city_uuid` varchar(50) NOT NULL,
  `city_name` varchar(1000) NOT NULL,
  `city_order` int(11) NOT NULL,
  `city_isactive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sm_city`
--

INSERT INTO `sm_city` (`city_id`, `city_uuid`, `city_name`, `city_order`, `city_isactive`) VALUES
(1, 'c3276e88-ff32-4e99-b58e-548ebab859ad', 'New City Edit', 1, 0),
(2, '454e44c9-dcd6-44f4-94c5-07cb14241bc2', 'Last City', 2, 1),
(3, '3a23b1ce-c20e-40fe-9f0e-005a5abd21f7', 'City x', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sm_country`
--

CREATE TABLE `sm_country` (
  `country_id` int(11) NOT NULL,
  `country_uuid` varchar(50) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `country_order` int(11) NOT NULL,
  `country_isactive` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sm_country`
--

INSERT INTO `sm_country` (`country_id`, `country_uuid`, `country_name`, `country_order`, `country_isactive`) VALUES
(1, '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', 'India', 1, 1),
(2, '75297516-2e10-4a0f-8bc7-c799c62056a5', 'China Old', 2, 0),
(3, 'f7c55c03-5910-4766-bcbf-eb3bf7ea2c64', 'Pakistan', 3, 0),
(4, '561bc12a-d629-4329-a85a-3010725c6ae2', 'America', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sm_district`
--

CREATE TABLE `sm_district` (
  `district_id` int(11) NOT NULL,
  `district_uuid` varchar(50) NOT NULL,
  `district_country` varchar(50) NOT NULL,
  `district_state` varchar(50) NOT NULL,
  `district_name` varchar(100) NOT NULL,
  `district_order` int(11) NOT NULL,
  `district_isactive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sm_district`
--

INSERT INTO `sm_district` (`district_id`, `district_uuid`, `district_country`, `district_state`, `district_name`, `district_order`, `district_isactive`) VALUES
(1, 'd132bf1c-9aed-4c51-9cce-ceddae1fafb4', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'Kannur', 1, 1),
(2, 'd4e61297-5cea-42ac-998d-bdde312e135d', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'Kollam', 2, 1),
(3, '69ba88cf-061b-4c8c-8560-ebea0a47786d', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'Alapuzha', 3, 0),
(4, 'c19528d7-2e36-42da-bff8-3e03c2f909e7', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', '529f864f-9c9f-42d3-b36c-3e53b9993890', 'Kochi', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sm_division`
--

CREATE TABLE `sm_division` (
  `division_id` int(11) NOT NULL,
  `division_uuid` varchar(50) NOT NULL,
  `division_name` varchar(100) NOT NULL,
  `division_order` int(11) NOT NULL,
  `division_isactive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sm_division`
--

INSERT INTO `sm_division` (`division_id`, `division_uuid`, `division_name`, `division_order`, `division_isactive`) VALUES
(1, '3b9ddbd9-701e-4360-973c-f5e4d18a8d95', 'Division Main', 1, 1),
(2, '622d8c04-af4f-47ee-aae8-948d66d8438e', 'Sub Division', 2, 1),
(3, 'd2d3a5df-ba85-4eac-b066-4d92df2eff82', 'Delete Division', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sm_highest_education`
--

CREATE TABLE `sm_highest_education` (
  `high_education_id` int(11) NOT NULL,
  `high_education_uuid` varchar(50) NOT NULL,
  `high_education_name` varchar(1000) NOT NULL,
  `high_education_order` int(1) NOT NULL DEFAULT 0,
  `high_education_isactive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sm_highest_education`
--

INSERT INTO `sm_highest_education` (`high_education_id`, `high_education_uuid`, `high_education_name`, `high_education_order`, `high_education_isactive`) VALUES
(1, '42ed0b79-46c8-43d0-8236-da3f4f88beec', 'SSLC', 1, 1),
(2, 'abfb869f-2b97-4343-98db-d59fcd4ecb5e', 'Degree', 2, 1),
(3, '54245f2f-a874-4060-bcfe-3d48faafc99f', 'Diploma', 3, 1),
(4, '2fa64476-3f13-4346-b572-7d4965e66c40', 'B-TECH', 4, 1),
(5, '593a2040-29ef-4f8b-ad31-2691fa0b75ed', 'PG', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sm_mother`
--

CREATE TABLE `sm_mother` (
  `mother_id` int(11) NOT NULL,
  `mother_uuid` varchar(50) NOT NULL,
  `mother_name` varchar(1000) NOT NULL,
  `mother_order` int(11) NOT NULL,
  `mother_isactive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sm_mother`
--

INSERT INTO `sm_mother` (`mother_id`, `mother_uuid`, `mother_name`, `mother_order`, `mother_isactive`) VALUES
(1, '4f567198-2371-471f-8939-ce8052080f38', 'wer', 2, 0),
(2, '795c36d1-8133-4e77-9819-e9f2036fa08d', 'Malayalam', 3, 1),
(3, '1d8d2cc7-f8a6-49b9-99e0-b6f2a9e80313', 'English', 4, 0),
(4, '0aac7fcf-2a96-4046-b47d-13dfe23be26c', 'Hindi', 3, 1),
(5, '08b5524c-9b61-4194-9602-faae03171dc3', 'Tamil', 2, 1),
(6, 'a5d9bfc9-ab46-4381-8a6d-59c67d03a38c', 'English1', 1, 0),
(7, 'd041fb31-d737-4eb1-b919-998b9850885a', 'Malayalam', 1, 0),
(8, 'b9badf6b-b235-4bb4-a828-8bb4a417831f', 'Malayalam', 1, 1),
(9, '31eeb1f3-428e-4860-a61d-89af0a34475c', 'Telugu', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sm_occupation`
--

CREATE TABLE `sm_occupation` (
  `occupation_id` int(11) NOT NULL,
  `occupation_uuid` varchar(50) NOT NULL,
  `occupation_name` varchar(500) NOT NULL,
  `occupation_order` int(11) NOT NULL,
  `occupation_isactive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sm_occupation`
--

INSERT INTO `sm_occupation` (`occupation_id`, `occupation_uuid`, `occupation_name`, `occupation_order`, `occupation_isactive`) VALUES
(1, 'ded07d84-655f-4201-85b1-d5bf53adcf20', 'Job 1', 1, 1),
(2, 'dff86349-f6bb-494b-842e-e0d678a9db30', 'Job 2', 2, 1),
(3, '687a9fab-acb2-4030-b2c3-260cebe343e4', 'Job Delet', 2, 0),
(4, '19a6cf12-4e57-42e2-a9ef-3f2cc218bf4c', 'tt', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sm_package`
--

CREATE TABLE `sm_package` (
  `package_id` int(11) NOT NULL,
  `package_uuid` varchar(50) NOT NULL,
  `package_name` varchar(1000) NOT NULL,
  `package_no_of_days` int(11) NOT NULL,
  `package_no_of_profile` int(11) NOT NULL,
  `package_order` int(11) NOT NULL,
  `package_amount` decimal(10,2) NOT NULL,
  `package_image` varchar(1000) NOT NULL,
  `package_isactive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sm_package`
--

INSERT INTO `sm_package` (`package_id`, `package_uuid`, `package_name`, `package_no_of_days`, `package_no_of_profile`, `package_order`, `package_amount`, `package_image`, `package_isactive`) VALUES
(1, '5012bbce-da36-447d-a86c-9b83ed0d1153', 'Free Pack', 350, 0, 1, '0.00', '', 1),
(2, '69cbbc9c-c7e7-49d1-908f-c409aee34e4b', 'Silver Pack', 30, 0, 2, '700.00', '', 1),
(3, 'b53d0c04-24a6-4eac-80f2-846c2dcfef5e', 'Gold Pack', 90, 0, 3, '2100.00', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sm_religion`
--

CREATE TABLE `sm_religion` (
  `religion_id` int(11) NOT NULL,
  `religion_uuid` varchar(50) NOT NULL,
  `religion_name` varchar(50) NOT NULL,
  `religion_order` int(11) NOT NULL,
  `religion_isactive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sm_religion`
--

INSERT INTO `sm_religion` (`religion_id`, `religion_uuid`, `religion_name`, `religion_order`, `religion_isactive`) VALUES
(1, '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', 'Hindu', 1, 1),
(2, 'ebddf435-b28d-4529-bf8a-00835be57848', 'Christians', 2, 1),
(3, 'dfd7d18f-38ca-4d33-a52e-d1fac1ea0147', 'hindu', 3, 0),
(4, 'bc735559-168e-4a07-b678-b81eb58592e1', 'hindus', 2, 0),
(5, '9073ee0f-4c09-4f3c-84d7-2739b612c4dc', 'hindu', 3, 0),
(6, 'bf3b79a8-6eb8-4c1a-9b71-cf3f9e8a3a2e', 'Muslim', 89, 1),
(7, 'f77476be-b010-4076-a58e-05c75cb1c75e', 'Rel', 1, 0),
(8, '10cae14c-b5f3-47c8-b839-54e173cf712c', '1', 1, 0),
(9, 'd7d4d0d8-c411-460a-9819-5a5576c1ae7c', '11', 11, 0),
(10, 'da5a5207-5b3e-4051-8f67-586551207b67', '111x', 111, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sm_site_settings`
--

CREATE TABLE `sm_site_settings` (
  `settings_id` int(11) NOT NULL,
  `settings_uuid` varchar(50) NOT NULL,
  `settings_site_name` varchar(1000) NOT NULL,
  `settings_icon` varchar(100) NOT NULL,
  `settings_smtp` varchar(100) NOT NULL,
  `settings_site_logo` varchar(100) NOT NULL,
  `settings_razorpayid` varchar(100) NOT NULL,
  `settings_password` varchar(100) NOT NULL,
  `settings_site_dark_logo` varchar(100) NOT NULL,
  `settings_site_email` varchar(100) NOT NULL,
  `settings_isactive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sm_site_settings`
--

INSERT INTO `sm_site_settings` (`settings_id`, `settings_uuid`, `settings_site_name`, `settings_icon`, `settings_smtp`, `settings_site_logo`, `settings_razorpayid`, `settings_password`, `settings_site_dark_logo`, `settings_site_email`, `settings_isactive`) VALUES
(1, '93db3f1e-47bb-4a1a-9bb6-8698f03af1c3', 'Site Name 1', '8ca8738f5036898659b0de5f225a13c3.png', 'SMTP 1', 'acd16d19e949cc97ebd0b3957828611f.jpg', 'SMTP 1', 'SMTP123', '7e891df450ba27b45da98456c4ff3308.jpg', 'Site Mail1', 1),
(2, '23d6366c-6cb0-455e-ae5d-e66695d65e9c', 'Site Name', 'f14d765f611756dcdeeb681cabc36376.png', 'SMTP', 'b402c6418fd8be2d3b9472e29f76bdbd.png', 'Razorpay Id', 'Password', '73ce1a584e354368685c0c27300ccf79.jpg', 'Site Mail', 0),
(3, 'bebb182e-9bb5-46b8-a514-c59ab13edb9e', 'ws', 'a0efd6be77c5d696fc67b3888617ed79.png', 'SMTP2', '48f3736acd03eaea69270ef0a5a6fe40.png', '2', 'we', '66b3ddb6b879da489757c68a201c88ee.png', 'dd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sm_state`
--

CREATE TABLE `sm_state` (
  `state_id` int(11) NOT NULL,
  `state_uuid` varchar(50) NOT NULL,
  `state_country` varchar(50) NOT NULL,
  `state_name` varchar(50) NOT NULL,
  `state_order` int(11) NOT NULL,
  `state_isactive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sm_state`
--

INSERT INTO `sm_state` (`state_id`, `state_uuid`, `state_country`, `state_name`, `state_order`, `state_isactive`) VALUES
(1, 'a50140c3-17ac-4a2b-9fdf-b8adc53f791d', '561bc12a-d629-4329-a85a-3010725c6ae2', 'Washington dc', 1, 1),
(2, '529f864f-9c9f-42d3-b36c-3e53b9993890', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', 'Keralam', 2, 1),
(3, '9429438d-59b8-4561-ab6a-d64164a6a80c', '7c8c7a33-b11d-47a0-a1f7-72f7941a6f5e', 'Tamilnadi', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sm_sub_caste`
--

CREATE TABLE `sm_sub_caste` (
  `sub_caste_id` int(11) NOT NULL,
  `sub_caste_uuid` varchar(50) NOT NULL,
  `sub_caste_religion` varchar(50) NOT NULL,
  `sub_caste_parent` varchar(50) NOT NULL,
  `sub_caste_name` varchar(100) NOT NULL,
  `sub_caste_order` int(11) NOT NULL,
  `sub_caste_isactive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sm_sub_caste`
--

INSERT INTO `sm_sub_caste` (`sub_caste_id`, `sub_caste_uuid`, `sub_caste_religion`, `sub_caste_parent`, `sub_caste_name`, `sub_caste_order`, `sub_caste_isactive`) VALUES
(1, '5588d024-53ca-4cc6-ab33-a490cf0bf79b', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '230a704b-342e-49e4-b4c4-9f55692eb4df', 'nayar1', 1, 0),
(2, 'f1d60ad2-337a-47cc-8077-058e1f650fce', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '230a704b-342e-49e4-b4c4-9f55692eb4df', 'Subcaste', 2, 1),
(3, '69842761-3d27-4bc2-9cca-532f73e864db', 'ebddf435-b28d-4529-bf8a-00835be57848', '26f16f71-617b-43fc-8f0a-bf2f1b6caa1b', 'ch', 1, 0),
(4, '763789de-c652-48b0-9888-6fcb25ea8024', '3d959c4f-6db6-4d43-bcaf-798c2cb0d2ea', '6995f9fc-6b74-4c97-9e1a-12f810a5c890', 'FFYFF', 2, 1),
(5, '0b663c70-03ee-4ac1-94b2-fc46581d1222', 'bf3b79a8-6eb8-4c1a-9b71-cf3f9e8a3a2e', 'a8346b7a-1558-4716-a188-1176588d3481', 'mbs', 2, 1),
(6, '89acd690-8281-447a-8cd6-c78445f01e2f', 'bf3b79a8-6eb8-4c1a-9b71-cf3f9e8a3a2e', 'de66cc7e-0599-416a-b1b8-2a53ca14020c', 'mas', 1, 1),
(7, '94271823-4cda-4327-b1e1-bc3e72ce75e2', 'ebddf435-b28d-4529-bf8a-00835be57848', '68c0ffb1-5454-4bdc-b1d9-0b6e235fe7a1', 'cc', 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sm_succes_stories`
--

CREATE TABLE `sm_succes_stories` (
  `couple_id` int(11) NOT NULL,
  `couple_uuid` varchar(50) NOT NULL,
  `couple_name` varchar(1000) NOT NULL,
  `couple_order` int(11) NOT NULL,
  `couple_image` varchar(500) NOT NULL,
  `couple_isactive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sm_succes_stories`
--

INSERT INTO `sm_succes_stories` (`couple_id`, `couple_uuid`, `couple_name`, `couple_order`, `couple_image`, `couple_isactive`) VALUES
(1, 'b5ebf9aa-7d4c-4c2f-8262-86e7bcf7e293', 'John & Anju', 1, 'f6969af406476c99f401539ade5a03cb.png', 1),
(2, '93e0a80e-62f5-4c49-a839-1bd487c1c6a8', 'gg', 2, '3fa216aa253f41d6d8db5aa582662777.jpg', 0),
(3, 'c1757a1d-4e43-4bc2-a010-59f5106f3780', 'Jose & Anu', 2, '65f614c58b7214dc2dfbcf97c67065a9.png', 1),
(4, '4ed57d0f-b019-4b28-bdc8-173d128a5ab5', 'Vinu & Daisy', 3, '28a0aa1838e409d48a722a7f98c40cec.png', 0),
(5, '705d8574-a06a-407a-8536-5483fe68d6ac', 'Vimal & Bincy', 4, 'f2edc29bbb95f74ac59c84724c946b89.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`profile_id`);

--
-- Indexes for table `client_image`
--
ALTER TABLE `client_image`
  ADD PRIMARY KEY (`pro_image_id`);

--
-- Indexes for table `client_request`
--
ALTER TABLE `client_request`
  ADD PRIMARY KEY (`client_request_id`);

--
-- Indexes for table `navbar`
--
ALTER TABLE `navbar`
  ADD PRIMARY KEY (`navId`);

--
-- Indexes for table `shared_profile`
--
ALTER TABLE `shared_profile`
  ADD PRIMARY KEY (`shared_profile_id`);

--
-- Indexes for table `sm_baners`
--
ALTER TABLE `sm_baners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `sm_caste`
--
ALTER TABLE `sm_caste`
  ADD PRIMARY KEY (`caste_id`);

--
-- Indexes for table `sm_citizenship`
--
ALTER TABLE `sm_citizenship`
  ADD PRIMARY KEY (`citizenship_id`);

--
-- Indexes for table `sm_city`
--
ALTER TABLE `sm_city`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `sm_country`
--
ALTER TABLE `sm_country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `sm_district`
--
ALTER TABLE `sm_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `sm_division`
--
ALTER TABLE `sm_division`
  ADD PRIMARY KEY (`division_id`);

--
-- Indexes for table `sm_highest_education`
--
ALTER TABLE `sm_highest_education`
  ADD PRIMARY KEY (`high_education_id`);

--
-- Indexes for table `sm_mother`
--
ALTER TABLE `sm_mother`
  ADD PRIMARY KEY (`mother_id`);

--
-- Indexes for table `sm_occupation`
--
ALTER TABLE `sm_occupation`
  ADD PRIMARY KEY (`occupation_id`);

--
-- Indexes for table `sm_package`
--
ALTER TABLE `sm_package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `sm_religion`
--
ALTER TABLE `sm_religion`
  ADD PRIMARY KEY (`religion_id`);

--
-- Indexes for table `sm_site_settings`
--
ALTER TABLE `sm_site_settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `sm_state`
--
ALTER TABLE `sm_state`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `sm_sub_caste`
--
ALTER TABLE `sm_sub_caste`
  ADD PRIMARY KEY (`sub_caste_id`);

--
-- Indexes for table `sm_succes_stories`
--
ALTER TABLE `sm_succes_stories`
  ADD PRIMARY KEY (`couple_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `client_image`
--
ALTER TABLE `client_image`
  MODIFY `pro_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `client_request`
--
ALTER TABLE `client_request`
  MODIFY `client_request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `navbar`
--
ALTER TABLE `navbar`
  MODIFY `navId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `shared_profile`
--
ALTER TABLE `shared_profile`
  MODIFY `shared_profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sm_baners`
--
ALTER TABLE `sm_baners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sm_caste`
--
ALTER TABLE `sm_caste`
  MODIFY `caste_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sm_citizenship`
--
ALTER TABLE `sm_citizenship`
  MODIFY `citizenship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sm_city`
--
ALTER TABLE `sm_city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sm_country`
--
ALTER TABLE `sm_country`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sm_district`
--
ALTER TABLE `sm_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sm_division`
--
ALTER TABLE `sm_division`
  MODIFY `division_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sm_highest_education`
--
ALTER TABLE `sm_highest_education`
  MODIFY `high_education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sm_mother`
--
ALTER TABLE `sm_mother`
  MODIFY `mother_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sm_occupation`
--
ALTER TABLE `sm_occupation`
  MODIFY `occupation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sm_package`
--
ALTER TABLE `sm_package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sm_religion`
--
ALTER TABLE `sm_religion`
  MODIFY `religion_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sm_site_settings`
--
ALTER TABLE `sm_site_settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sm_state`
--
ALTER TABLE `sm_state`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sm_sub_caste`
--
ALTER TABLE `sm_sub_caste`
  MODIFY `sub_caste_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sm_succes_stories`
--
ALTER TABLE `sm_succes_stories`
  MODIFY `couple_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
