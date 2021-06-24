-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 15, 2019 at 02:23 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gfsaasprod`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `drop_tables_like` (`pattern` VARCHAR(255), `db` VARCHAR(255))  BEGIN
    SET FOREIGN_KEY_CHECKS = 0;
    SELECT @str_sql:=CONCAT('drop table ', GROUP_CONCAT(table_name))
    FROM information_schema.tables
    WHERE table_schema=db AND table_name LIKE pattern;

    PREPARE stmt from @str_sql;
    EXECUTE stmt;
    DROP prepare stmt;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `menu_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `sort_order` int(11) DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `article_article_category`
--

CREATE TABLE `article_article_category` (
  `article_id` bigint(20) UNSIGNED NOT NULL,
  `article_category_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `article_categories`
--

CREATE TABLE `article_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `billing_addresses`
--

CREATE TABLE `billing_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_2` text COLLATE utf8mb4_unicode_ci,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_category_blog_post`
--

CREATE TABLE `blog_category_blog_post` (
  `blog_category_id` bigint(20) UNSIGNED NOT NULL,
  `blog_post_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `published_on` timestamp NULL DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `cover_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `meta_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_code_2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `iso_code_3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_format` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postcode_required` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `currency_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symbol_left` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `symbol_right` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `created_at`, `updated_at`, `name`, `iso_code_2`, `iso_code_3`, `address_format`, `postcode_required`, `status`, `currency_name`, `currency_code`, `symbol_left`, `symbol_right`) VALUES
(1, NULL, NULL, 'Aaland Islands', 'AX', 'ALA', '', 0, 1, 'Euro', 'EUR', '€', ''),
(2, NULL, NULL, 'Afghanistan', 'AF', 'AFG', '', 0, 1, 'Afghani', 'AFN', '?', ''),
(3, NULL, NULL, 'Albania', 'AL', 'ALB', '', 0, 1, 'Lek', 'ALL', 'L', ''),
(4, NULL, NULL, 'Algeria', 'DZ', 'DZA', '', 0, 1, 'Algerian Dinar', 'DZD', '?.?', ''),
(5, NULL, NULL, 'American Samoa', 'AS', 'ASM', '', 0, 1, 'Euros', 'EUR', '$', ''),
(6, NULL, NULL, 'Andorra', 'AD', 'AND', '', 0, 1, 'Euros', 'EUR', '€', ''),
(7, NULL, NULL, 'Angola', 'AO', 'AGO', '', 0, 1, 'Angolan kwanza', 'AOA', 'Kz', ''),
(8, NULL, NULL, 'Anguilla', 'AI', 'AIA', '', 0, 1, 'East Caribbean Dollar', 'XCD', '$', ''),
(9, NULL, NULL, 'Antarctica', 'AQ', 'ATA', '', 0, 1, 'Antarctican dollar', 'AQD', '$', ''),
(10, NULL, NULL, 'Antigua and Barbuda', 'AG', 'ATG', '', 0, 1, 'East Caribbean Dollar', 'XCD', '$', ''),
(11, NULL, NULL, 'Argentina', 'AR', 'ARG', '', 0, 1, 'Peso', 'ARS', '$', ''),
(12, NULL, NULL, 'Armenia', 'AM', 'ARM', '', 0, 1, 'Dram', 'AMD', '', ''),
(13, NULL, NULL, 'Aruba', 'AW', 'ABW', '', 0, 1, 'Netherlands Antilles Guilder', 'ANG', 'ƒ', ''),
(14, NULL, NULL, 'Australia', 'AU', 'AUS', '', 0, 1, 'Australian Dollars', 'AUD', '$', ''),
(15, NULL, NULL, 'Austria', 'AT', 'AUT', '', 0, 1, 'Euros', 'EUR', '€', ''),
(16, NULL, NULL, 'Azerbaijan', 'AZ', 'AZE', '', 0, 1, 'Manat', 'AZN', '', ''),
(17, NULL, NULL, 'Bahamas', 'BS', 'BHS', '', 0, 1, 'Bahamian Dollar', 'BSD', '$', ''),
(18, NULL, NULL, 'Bahrain', 'BH', 'BHR', '', 0, 1, 'Bahraini Dinar', 'BHD', '.?.?', ''),
(19, NULL, NULL, 'Bangladesh', 'BD', 'BGD', '', 0, 1, 'Taka', 'BDT', '?', ''),
(20, NULL, NULL, 'Barbados', 'BB', 'BRB', '', 0, 1, 'Barbadian Dollar', 'BBD', '$', ''),
(21, NULL, NULL, 'Belarus', 'BY', 'BLR', '', 0, 1, 'Belarus Ruble', 'BYR', 'Br', ''),
(22, NULL, NULL, 'Belgium', 'BE', 'BEL', '{firstname} {lastname} {company} {address_1} {address_2} {postcode} {city} {country}', 0, 1, 'Euros', 'EUR', '€', ''),
(23, NULL, NULL, 'Belize', 'BZ', 'BLZ', '', 0, 1, 'Belizean Dollar', 'BZD', '$', ''),
(24, NULL, NULL, 'Benin', 'BJ', 'BEN', '', 0, 1, 'CFA Franc BCEAO', 'XOF', 'Fr', ''),
(25, NULL, NULL, 'Bermuda', 'BM', 'BMU', '', 0, 1, 'Bermudian Dollar', 'BMD', '$', ''),
(26, NULL, NULL, 'Bhutan', 'BT', 'BTN', '', 0, 1, 'Indian Rupee', 'INR', '₹', ''),
(27, NULL, NULL, 'Bolivia', 'BO', 'BOL', '', 0, 1, 'Boliviano', 'BOB', 'Bs.', ''),
(28, NULL, NULL, 'Bonaire, Sint Eustatius and Saba', 'BQ', 'BES', '', 0, 1, 'United States Dollar', 'USD', '$', ''),
(29, NULL, NULL, 'Bosnia and Herzegovina', 'BA', 'BIH', '', 0, 1, 'Bosnia and Herzegovina convertible mark', 'BAM', '', ''),
(30, NULL, NULL, 'Botswana', 'BW', 'BWA', '', 0, 1, 'Pula', 'BWP', 'P', ''),
(31, NULL, NULL, 'Bouvet Island', 'BV', 'BVT', '', 0, 1, 'Norwegian Krone', 'NOK', 'kr', ''),
(32, NULL, NULL, 'Brazil', 'BR', 'BRA', '', 0, 1, 'Brazil', 'BRL', 'R$', ''),
(33, NULL, NULL, 'British Indian Ocean Territory', 'IO', 'IOT', '', 0, 1, 'United States Dollar', 'USD', '$', ''),
(34, NULL, NULL, 'Brunei Darussalam', 'BN', 'BRN', '', 0, 1, 'Bruneian Dollar', 'BND', '$', ''),
(35, NULL, NULL, 'Bulgaria', 'BG', 'BGR', '', 0, 1, 'Lev', 'BGN', '??', ''),
(36, NULL, NULL, 'Burkina Faso', 'BF', 'BFA', '', 0, 1, 'CFA Franc BCEAO', 'XOF', 'Fr', ''),
(37, NULL, NULL, 'Burundi', 'BI', 'BDI', '', 0, 1, 'Burundi Franc', 'BIF', 'Fr', ''),
(38, NULL, NULL, 'Cambodia', 'KH', 'KHM', '', 0, 1, 'Riel', 'KHR', '?', ''),
(39, NULL, NULL, 'Cameroon', 'CM', 'CMR', '', 0, 1, 'CFA Franc BEAC', 'XAF', 'Fr', ''),
(40, NULL, NULL, 'Canada', 'CA', 'CAN', '', 0, 1, 'Canadian Dollar', 'CAD', '$', ''),
(41, NULL, NULL, 'Canary Islands', 'IC', 'ICA', '', 0, 1, 'Euro', 'EUR', '', ''),
(42, NULL, NULL, 'Cape Verde', 'CV', 'CPV', '', 0, 1, 'Escudo', 'CVE', 'Esc', ''),
(43, NULL, NULL, 'Cayman Islands', 'KY', 'CYM', '', 0, 1, 'Caymanian Dollar', 'KYD', '$', ''),
(44, NULL, NULL, 'Central African Republic', 'CF', 'CAF', '', 0, 1, 'CFA Franc BEAC', 'XAF', 'Fr', ''),
(45, NULL, NULL, 'Chad', 'TD', 'TCD', '', 0, 1, 'CFA Franc BEAC', 'XAF', 'Fr', ''),
(46, NULL, NULL, 'Chile', 'CL', 'CHL', '', 0, 1, 'Chilean Peso', 'CLP', '$', ''),
(47, NULL, NULL, 'China', 'CN', 'CHN', '', 0, 1, 'Yuan Renminbi', 'CNY', '¥', ''),
(48, NULL, NULL, 'Christmas Island', 'CX', 'CXR', '', 0, 1, 'Australian Dollars', 'AUD', '$', ''),
(49, NULL, NULL, 'Cocos (Keeling) Islands', 'CC', 'CCK', '', 0, 1, 'Australian Dollars', 'AUD', '$', ''),
(50, NULL, NULL, 'Colombia', 'CO', 'COL', '', 0, 1, 'Peso', 'COP', '$', ''),
(51, NULL, NULL, 'Comoros', 'KM', 'COM', '', 0, 1, 'Comoran Franc', 'KMF', 'Fr', ''),
(52, NULL, NULL, 'Congo', 'CG', 'COG', '', 0, 1, 'CFA Franc BEAC', 'XAF', 'Fr', ''),
(53, NULL, NULL, 'Cook Islands', 'CK', 'COK', '', 0, 1, 'New Zealand Dollars', 'NZD', '$', ''),
(54, NULL, NULL, 'Costa Rica', 'CR', 'CRI', '', 0, 1, 'Costa Rican Colon', 'CRC', '?', ''),
(55, NULL, NULL, 'Cote D\'Ivoire', 'CI', 'CIV', '', 0, 1, 'CFA Franc BCEAO', 'XOF', 'Fr', ''),
(56, NULL, NULL, 'Croatia', 'HR', 'HRV', '', 0, 1, 'Croatian Dinar', 'HRK', 'kn', ''),
(57, NULL, NULL, 'Cuba', 'CU', 'CUB', '', 0, 1, 'Cuban Peso', 'CUP', '$', ''),
(58, NULL, NULL, 'Curacao', 'CW', 'CUW', '', 0, 1, 'Netherlands Antillean guilder', 'NAF', 'ƒ', ''),
(59, NULL, NULL, 'Cyprus', 'CY', 'CYP', '', 0, 1, 'Cypriot Pound', 'CYP', '€', ''),
(60, NULL, NULL, 'Czech Republic', 'CZ', 'CZE', '', 0, 1, 'Koruna', 'CZK', 'K?', ''),
(61, NULL, NULL, 'Democratic Republic of Congo', 'CD', 'COD', '', 0, 1, 'Congolese Frank', 'CDF', 'Fr', ''),
(62, NULL, NULL, 'Denmark', 'DK', 'DNK', '', 0, 1, 'Danish Krone', 'DKK', 'kr', ''),
(63, NULL, NULL, 'Djibouti', 'DJ', 'DJI', '', 0, 1, 'Djiboutian Franc', 'DJF', 'Fr', ''),
(64, NULL, NULL, 'Dominica', 'DM', 'DMA', '', 0, 1, 'East Caribbean Dollar', 'XCD', '$', ''),
(65, NULL, NULL, 'Dominican Republic', 'DO', 'DOM', '', 0, 1, 'Dominican Peso', 'DOP', '$', ''),
(66, NULL, NULL, 'East Timor', 'TL', 'TLS', '', 0, 1, 'United States Dollar', 'USD', '$', ''),
(67, NULL, NULL, 'Ecuador', 'EC', 'ECU', '', 0, 1, 'Sucre', 'ECS', '$', ''),
(68, NULL, NULL, 'Egypt', 'EG', 'EGY', '', 0, 1, 'Egyptian Pound', 'EGP', '£', ''),
(69, NULL, NULL, 'El Salvador', 'SV', 'SLV', '', 0, 1, 'Salvadoran Colon', 'SVC', '$', ''),
(70, NULL, NULL, 'Equatorial Guinea', 'GQ', 'GNQ', '', 0, 1, 'CFA Franc BEAC', 'XAF', 'Fr', ''),
(71, NULL, NULL, 'Eritrea', 'ER', 'ERI', '', 0, 1, 'Ethiopian Birr', 'ETB', 'Nfk', ''),
(72, NULL, NULL, 'Estonia', 'EE', 'EST', '', 0, 1, 'Estonian Kroon', 'EEK', '€', ''),
(73, NULL, NULL, 'Ethiopia', 'ET', 'ETH', '', 0, 1, 'Ethiopian Birr', 'ETB', 'Br', ''),
(74, NULL, NULL, 'Falkland Islands (Malvinas)', 'FK', 'FLK', '', 0, 1, 'Falkland Pound', 'FKP', '£', ''),
(75, NULL, NULL, 'Faroe Islands', 'FO', 'FRO', '', 0, 1, 'Danish Krone', 'DKK', 'kr', ''),
(76, NULL, NULL, 'Fiji', 'FJ', 'FJI', '', 0, 1, 'Fijian Dollar', 'FJD', '$', ''),
(77, NULL, NULL, 'Finland', 'FI', 'FIN', '', 0, 1, 'Euros', 'EUR', '€', ''),
(78, NULL, NULL, 'France, Metropolitan', 'FR', 'FRA', '{firstname} {lastname} {company} {address_1} {address_2} {postcode} {city} {country}', 1, 1, 'Euros', 'EUR', '€', ''),
(79, NULL, NULL, 'French Guiana', 'GF', 'GUF', '', 0, 1, 'Euros', 'EUR', '€', ''),
(80, NULL, NULL, 'French Polynesia', 'PF', 'PYF', '', 0, 1, 'CFP Franc', 'XPF', 'Fr', ''),
(81, NULL, NULL, 'French Southern Territories', 'TF', 'ATF', '', 0, 1, 'Euros', 'EUR', '€', ''),
(82, NULL, NULL, 'FYROM', 'MK', 'MKD', '', 0, 1, 'Denar', 'MKD', '???', ''),
(83, NULL, NULL, 'Gabon', 'GA', 'GAB', '', 0, 1, 'CFA Franc BEAC', 'XAF', 'Fr', ''),
(84, NULL, NULL, 'Gambia', 'GM', 'GMB', '', 0, 1, 'Dalasi', 'GMD', 'D', ''),
(85, NULL, NULL, 'Georgia', 'GE', 'GEO', '', 0, 1, 'Lari', 'GEL', '?', ''),
(86, NULL, NULL, 'Germany', 'DE', 'DEU', '{company} {firstname} {lastname} {address_1} {address_2} {postcode} {city} {country}', 1, 1, 'Euros', 'EUR', '€', ''),
(87, NULL, NULL, 'Ghana', 'GH', 'GHA', '', 0, 1, 'Ghana cedi', 'GHS', 'GH¢', ''),
(88, NULL, NULL, 'Gibraltar', 'GI', 'GIB', '', 0, 1, 'Gibraltar Pound', 'GIP', '£', ''),
(89, NULL, NULL, 'Greece', 'GR', 'GRC', '', 0, 1, 'Euros', 'EUR', '€', ''),
(90, NULL, NULL, 'Greenland', 'GL', 'GRL', '', 0, 1, 'Danish Krone', 'DKK', 'kr', ''),
(91, NULL, NULL, 'Grenada', 'GD', 'GRD', '', 0, 1, 'East Caribbean Dollar', 'XCD', '$', ''),
(92, NULL, NULL, 'Guadeloupe', 'GP', 'GLP', '', 0, 1, 'Euros', 'EUR', '€', ''),
(93, NULL, NULL, 'Guam', 'GU', 'GUM', '', 0, 1, 'United States Dollar', 'USD', '$', ''),
(94, NULL, NULL, 'Guatemala', 'GT', 'GTM', '', 0, 1, 'Quetzal', 'GTQ', 'Q', ''),
(95, NULL, NULL, 'Guernsey', 'GG', 'GGY', '', 1, 1, 'Guernsey pound', 'GGP', '£', ''),
(96, NULL, NULL, 'Guinea', 'GN', 'GIN', '', 0, 1, 'Guinean Franc', 'GNF', 'Fr', ''),
(97, NULL, NULL, 'Guinea-Bissau', 'GW', 'GNB', '', 0, 1, 'CFA Franc BCEAO', 'XOF', 'Fr', ''),
(98, NULL, NULL, 'Guyana', 'GY', 'GUY', '', 0, 1, 'Guyanaese Dollar', 'GYD', '$', ''),
(99, NULL, NULL, 'Haiti', 'HT', 'HTI', '', 0, 1, 'Gourde', 'HTG', 'G', ''),
(100, NULL, NULL, 'Heard and Mc Donald Islands', 'HM', 'HMD', '', 0, 1, 'Australian Dollars', 'AUD', '$', ''),
(101, NULL, NULL, 'Honduras', 'HN', 'HND', '', 0, 1, 'Lempira', 'HNL', 'L', ''),
(102, NULL, NULL, 'Hong Kong', 'HK', 'HKG', '', 0, 1, 'HKD', 'HKD', '$', ''),
(103, NULL, NULL, 'Hungary', 'HU', 'HUN', '', 0, 1, 'Forint', 'HUF', 'Ft', ''),
(104, NULL, NULL, 'Iceland', 'IS', 'ISL', '', 0, 1, 'Icelandic Krona', 'ISK', 'kr', ''),
(105, NULL, NULL, 'India', 'IN', 'IND', '', 0, 1, 'Indian Rupee', 'INR', '₹', ''),
(106, NULL, NULL, 'Indonesia', 'ID', 'IDN', '', 0, 1, 'Indonesian Rupiah', 'IDR', 'Rp', ''),
(107, NULL, NULL, 'Iran (Islamic Republic of)', 'IR', 'IRN', '', 0, 1, 'Iranian Rial', 'IRR', '?', ''),
(108, NULL, NULL, 'Iraq', 'IQ', 'IRQ', '', 0, 1, 'Iraqi Dinar', 'IQD', '?.?', ''),
(109, NULL, NULL, 'Ireland', 'IE', 'IRL', '', 0, 1, 'Euros', 'EUR', '€', ''),
(110, NULL, NULL, 'Israel', 'IL', 'ISR', '', 0, 1, 'Shekel', 'ILS', '?', ''),
(111, NULL, NULL, 'Italy', 'IT', 'ITA', '', 0, 1, 'Euros', 'EUR', '€', ''),
(112, NULL, NULL, 'Jamaica', 'JM', 'JAM', '', 0, 1, 'Jamaican Dollar', 'JMD', '$', ''),
(113, NULL, NULL, 'Japan', 'JP', 'JPN', '', 0, 1, 'Japanese Yen', 'JPY', '¥', ''),
(114, NULL, NULL, 'Jersey', 'JE', 'JEY', '', 1, 1, 'Pound Sterling', 'GBP', '£', ''),
(115, NULL, NULL, 'Jordan', 'JO', 'JOR', '', 0, 1, 'Jordanian Dinar', 'JOD', '?.?', ''),
(116, NULL, NULL, 'Kazakhstan', 'KZ', 'KAZ', '', 0, 1, 'Tenge', 'KZT', '', ''),
(117, NULL, NULL, 'Kenya', 'KE', 'KEN', '', 0, 1, 'Kenyan Shilling', 'KES', 'Sh', ''),
(118, NULL, NULL, 'Kiribati', 'KI', 'KIR', '', 0, 1, 'Australian Dollars', 'AUD', '$', ''),
(119, NULL, NULL, 'Korea, Republic of', 'KR', 'KOR', '', 0, 1, 'Won', 'KRW', '?', ''),
(120, NULL, NULL, 'Kuwait', 'KW', 'KWT', '', 0, 1, 'Kuwaiti Dinar', 'KWD', '?.?', ''),
(121, NULL, NULL, 'Kyrgyzstan', 'KG', 'KGZ', '', 0, 1, 'Som', 'KGS', '?', ''),
(122, NULL, NULL, 'Lao People\'s Democratic Republic', 'LA', 'LAO', '', 0, 1, 'Kip', 'LAK', '?', ''),
(123, NULL, NULL, 'Latvia', 'LV', 'LVA', '', 0, 1, 'Lat', 'LVL', '€', ''),
(124, NULL, NULL, 'Lebanon', 'LB', 'LBN', '', 0, 1, 'Lebanese Pound', 'LBP', '?.?', ''),
(125, NULL, NULL, 'Lesotho', 'LS', 'LSO', '', 0, 1, 'Loti', 'LSL', 'L', ''),
(126, NULL, NULL, 'Liberia', 'LR', 'LBR', '', 0, 1, 'Liberian Dollar', 'LRD', '$', ''),
(127, NULL, NULL, 'Libyan Arab Jamahiriya', 'LY', 'LBY', '', 0, 1, 'Libyan Dinar', 'LYD', '?.?', ''),
(128, NULL, NULL, 'Liechtenstein', 'LI', 'LIE', '', 0, 1, 'Swiss Franc', 'CHF', 'Fr', ''),
(129, NULL, NULL, 'Lithuania', 'LT', 'LTU', '', 0, 1, 'Lita', 'LTL', '€', ''),
(130, NULL, NULL, 'Luxembourg', 'LU', 'LUX', '', 0, 1, 'Euros', 'EUR', '€', ''),
(131, NULL, NULL, 'Macau', 'MO', 'MAC', '', 0, 1, 'Pataca', 'MOP', 'P', ''),
(132, NULL, NULL, 'Madagascar', 'MG', 'MDG', '', 0, 1, 'Malagasy Franc', 'MGA', 'Ar', ''),
(133, NULL, NULL, 'Malawi', 'MW', 'MWI', '', 0, 1, 'Malawian Kwacha', 'MWK', 'MK', ''),
(134, NULL, NULL, 'Malaysia', 'MY', 'MYS', '', 0, 1, 'Ringgit', 'MYR', 'RM', ''),
(135, NULL, NULL, 'Maldives', 'MV', 'MDV', '', 0, 1, 'Rufiyaa', 'MVR', '.?', ''),
(136, NULL, NULL, 'Mali', 'ML', 'MLI', '', 0, 1, 'CFA Franc BCEAO', 'XOF', 'Fr', ''),
(137, NULL, NULL, 'Malta', 'MT', 'MLT', '', 0, 1, 'Maltese Lira', 'MTL', '€', ''),
(138, NULL, NULL, 'Marshall Islands', 'MH', 'MHL', '', 0, 1, 'United States Dollar', 'USD', '$', ''),
(139, NULL, NULL, 'Martinique', 'MQ', 'MTQ', '', 0, 1, 'Euros', 'EUR', '€', ''),
(140, NULL, NULL, 'Mauritania', 'MR', 'MRT', '', 0, 1, 'Ouguiya', 'MRO', 'UM', ''),
(141, NULL, NULL, 'Mauritius', 'MU', 'MUS', '', 0, 1, 'Mauritian Rupee', 'MUR', '?', ''),
(142, NULL, NULL, 'Mayotte', 'YT', 'MYT', '', 0, 1, 'Euros', 'EUR', '€', ''),
(143, NULL, NULL, 'Mexico', 'MX', 'MEX', '', 0, 1, 'Peso', 'MXN', '$', ''),
(144, NULL, NULL, 'Micronesia, Federated States of', 'FM', 'FSM', '', 0, 1, 'United States Dollar', 'USD', '$', ''),
(145, NULL, NULL, 'Moldova, Republic of', 'MD', 'MDA', '', 0, 1, 'Leu', 'MDL', 'L', ''),
(146, NULL, NULL, 'Monaco', 'MC', 'MCO', '', 0, 1, 'Euros', 'EUR', '€', ''),
(147, NULL, NULL, 'Mongolia', 'MN', 'MNG', '', 0, 1, 'Tugrik', 'MNT', '?', ''),
(148, NULL, NULL, 'Montenegro', 'ME', 'MNE', '', 0, 1, 'Euro', 'EUR', '€', ''),
(149, NULL, NULL, 'Montserrat', 'MS', 'MSR', '', 0, 1, 'East Caribbean Dollar', 'XCD', '$', ''),
(150, NULL, NULL, 'Morocco', 'MA', 'MAR', '', 0, 1, 'Dirham', 'MAD', '?.?.', ''),
(151, NULL, NULL, 'Mozambique', 'MZ', 'MOZ', '', 0, 1, 'Metical', 'MZN', 'MT', ''),
(152, NULL, NULL, 'Myanmar', 'MM', 'MMR', '', 0, 1, 'Kyat', 'MMK', 'Ks', ''),
(153, NULL, NULL, 'Namibia', 'NA', 'NAM', '', 0, 1, 'Dollar', 'NAD', '$', ''),
(154, NULL, NULL, 'Nauru', 'NR', 'NRU', '', 0, 1, 'Australian Dollars', 'AUD', '$', ''),
(155, NULL, NULL, 'Nepal', 'NP', 'NPL', '', 0, 1, 'Nepalese Rupee', 'NPR', '?', ''),
(156, NULL, NULL, 'Netherlands', 'NL', 'NLD', '', 0, 1, 'Euros', 'EUR', '€', ''),
(157, NULL, NULL, 'Netherlands Antilles', 'AN', 'ANT', '', 0, 1, 'Netherlands Antilles Guilder', 'ANG', '', ''),
(158, NULL, NULL, 'New Caledonia', 'NC', 'NCL', '', 0, 1, 'CFP Franc', 'XPF', 'Fr', ''),
(159, NULL, NULL, 'New Zealand', 'NZ', 'NZL', '', 0, 1, 'New Zealand Dollars', 'NZD', '$', ''),
(160, NULL, NULL, 'Nicaragua', 'NI', 'NIC', '', 0, 1, 'Cordoba Oro', 'NIO', 'C$', ''),
(161, NULL, NULL, 'Niger', 'NE', 'NER', '', 0, 1, 'CFA Franc BCEAO', 'XOF', 'Fr', ''),
(162, NULL, NULL, 'Nigeria', 'NG', 'NGA', '', 0, 1, 'Naira', 'NGN', '₦', ''),
(163, NULL, NULL, 'Niue', 'NU', 'NIU', '', 0, 1, 'New Zealand Dollars', 'NZD', '$', ''),
(164, NULL, NULL, 'Norfolk Island', 'NF', 'NFK', '', 0, 1, 'Australian Dollars', 'AUD', '$', ''),
(165, NULL, NULL, 'North Korea', 'KP', 'PRK', '', 0, 1, 'Won', 'KPW', '?', ''),
(166, NULL, NULL, 'Northern Mariana Islands', 'MP', 'MNP', '', 0, 1, 'United States Dollar', 'USD', '$', ''),
(167, NULL, NULL, 'Norway', 'NO', 'NOR', '', 0, 1, 'Norwegian Krone', 'NOK', 'kr', ''),
(168, NULL, NULL, 'Oman', 'OM', 'OMN', '', 0, 1, 'Sul Rial', 'OMR', '?.?.', ''),
(169, NULL, NULL, 'Pakistan', 'PK', 'PAK', '', 0, 1, 'Rupee', 'PKR', '?', ''),
(170, NULL, NULL, 'Palau', 'PW', 'PLW', '', 0, 1, 'United States Dollar', 'USD', '$', ''),
(171, NULL, NULL, 'Palestinian Territory, Occupied', 'PS', 'PSE', '', 0, 1, 'Jordanian dinar', 'JOD', '?', ''),
(172, NULL, NULL, 'Panama', 'PA', 'PAN', '', 0, 1, 'Balboa', 'PAB', 'B/.', ''),
(173, NULL, NULL, 'Papua New Guinea', 'PG', 'PNG', '', 0, 1, 'Kina', 'PGK', 'K', ''),
(174, NULL, NULL, 'Paraguay', 'PY', 'PRY', '', 0, 1, 'Guarani', 'PYG', '?', ''),
(175, NULL, NULL, 'Peru', 'PE', 'PER', '', 0, 1, 'Nuevo Sol', 'PEN', 'S/.', ''),
(176, NULL, NULL, 'Philippines', 'PH', 'PHL', '', 0, 1, 'Peso', 'PHP', '?', ''),
(177, NULL, NULL, 'Pitcairn', 'PN', 'PCN', '', 0, 1, 'New Zealand Dollars', 'NZD', '$', ''),
(178, NULL, NULL, 'Poland', 'PL', 'POL', '', 0, 1, 'Zloty', 'PLN', 'z?', ''),
(179, NULL, NULL, 'Portugal', 'PT', 'PRT', '', 0, 1, 'Euros', 'EUR', '€', ''),
(180, NULL, NULL, 'Puerto Rico', 'PR', 'PRI', '', 0, 1, 'United States Dollar', 'USD', '$', ''),
(181, NULL, NULL, 'Qatar', 'QA', 'QAT', '', 0, 1, 'Rial', 'QAR', '?.?', ''),
(182, NULL, NULL, 'Reunion', 'RE', 'REU', '', 0, 1, 'Euros', 'EUR', '€', ''),
(183, NULL, NULL, 'Romania', 'RO', 'ROM', '', 0, 1, 'Leu', 'RON', 'lei', ''),
(184, NULL, NULL, 'Russian Federation', 'RU', 'RUS', '', 0, 1, 'Ruble', 'RUB', '?', ''),
(185, NULL, NULL, 'Rwanda', 'RW', 'RWA', '', 0, 1, 'Rwanda Franc', 'RWF', 'Fr', ''),
(186, NULL, NULL, 'Saint Kitts and Nevis', 'KN', 'KNA', '', 0, 1, 'East Caribbean Dollar', 'XCD', '$', ''),
(187, NULL, NULL, 'Saint Lucia', 'LC', 'LCA', '', 0, 1, 'East Caribbean Dollar', 'XCD', '$', ''),
(188, NULL, NULL, 'Saint Vincent and the Grenadines', 'VC', 'VCT', '', 0, 1, 'East Caribbean Dollar', 'XCD', '$', ''),
(189, NULL, NULL, 'Samoa', 'WS', 'WSM', '', 0, 1, 'Euros', 'EUR', 'T', ''),
(190, NULL, NULL, 'San Marino', 'SM', 'SMR', '', 0, 1, 'Euros', 'EUR', '€', ''),
(191, NULL, NULL, 'Sao Tome and Principe', 'ST', 'STP', '', 0, 1, 'Dobra', 'STD', 'Db', ''),
(192, NULL, NULL, 'Saudi Arabia', 'SA', 'SAU', '', 0, 1, 'Riyal', 'SAR', '?.?', ''),
(193, NULL, NULL, 'Senegal', 'SN', 'SEN', '', 0, 1, 'CFA Franc BCEAO', 'XOF', 'Fr', ''),
(194, NULL, NULL, 'Serbia', 'RS', 'SRB', '', 0, 1, 'Serbian dinar', 'RSD', '???.', ''),
(195, NULL, NULL, 'Seychelles', 'SC', 'SYC', '', 0, 1, 'Rupee', 'SCR', '?', ''),
(196, NULL, NULL, 'Sierra Leone', 'SL', 'SLE', '', 0, 1, 'Leone', 'SLL', 'Le', ''),
(197, NULL, NULL, 'Singapore', 'SG', 'SGP', '', 0, 1, 'Dollar', 'SGD', '$', ''),
(198, NULL, NULL, 'Slovak Republic', 'SK', 'SVK', '{firstname} {lastname} {company} {address_1} {address_2} {city} {postcode} {zone} {country}', 0, 1, 'Koruna', 'SKK', '€', ''),
(199, NULL, NULL, 'Slovenia', 'SI', 'SVN', '', 0, 1, 'Euros', 'EUR', '€', ''),
(200, NULL, NULL, 'Solomon Islands', 'SB', 'SLB', '', 0, 1, 'Solomon Islands Dollar', 'SBD', '$', ''),
(201, NULL, NULL, 'Somalia', 'SO', 'SOM', '', 0, 1, 'Shilling', 'SOS', 'Sh', ''),
(202, NULL, NULL, 'South Africa', 'ZA', 'ZAF', '', 0, 1, 'Rand', 'ZAR', 'R', ''),
(203, NULL, NULL, 'South Georgia & South Sandwich Islands', 'GS', 'SGS', '', 0, 1, 'Pound Sterling', 'GBP', '£', ''),
(204, NULL, NULL, 'South Sudan', 'SS', 'SSD', '', 0, 1, 'South Sudanese Pound', 'SSP', '£', ''),
(205, NULL, NULL, 'Spain', 'ES', 'ESP', '', 0, 1, 'Euros', 'EUR', '€', ''),
(206, NULL, NULL, 'Sri Lanka', 'LK', 'LKA', '', 0, 1, 'Rupee', 'LKR', 'Rs', ''),
(207, NULL, NULL, 'St. Barthelemy', 'BL', 'BLM', '', 0, 1, 'Euro', 'EUR', '€', ''),
(208, NULL, NULL, 'St. Helena', 'SH', 'SHN', '', 0, 1, 'Pound Sterling', 'GBP', '£', ''),
(209, NULL, NULL, 'St. Martin (French part)', 'MF', 'MAF', '', 0, 1, 'Netherlands Antillean guilder', 'ANG', '€', ''),
(210, NULL, NULL, 'St. Pierre and Miquelon', 'PM', 'SPM', '', 0, 1, 'Euro', 'EUR', '€', ''),
(211, NULL, NULL, 'Sudan', 'SD', 'SDN', '', 0, 1, 'Dinar', 'SDG', '?.?.', ''),
(212, NULL, NULL, 'Suriname', 'SR', 'SUR', '', 0, 1, 'Surinamese Guilder', 'SRD', '$', ''),
(213, NULL, NULL, 'Svalbard and Jan Mayen Islands', 'SJ', 'SJM', '', 0, 1, 'Norwegian Krone', 'NOK', 'kr', ''),
(214, NULL, NULL, 'Swaziland', 'SZ', 'SWZ', '', 0, 1, 'Lilangeni', 'SZL', 'L', ''),
(215, NULL, NULL, 'Sweden', 'SE', 'SWE', '{company} {firstname} {lastname} {address_1} {address_2} {postcode} {city} {country}', 1, 1, 'Krona', 'SEK', 'kr', ''),
(216, NULL, NULL, 'Switzerland', 'CH', 'CHE', '', 0, 1, 'Swiss Franc', 'CHF', 'Fr', ''),
(217, NULL, NULL, 'Syrian Arab Republic', 'SY', 'SYR', '', 0, 1, 'Syrian Pound', 'SYP', '£', ''),
(218, NULL, NULL, 'Taiwan', 'TW', 'TWN', '', 0, 1, 'Dollar', 'TWD', '$', ''),
(219, NULL, NULL, 'Tajikistan', 'TJ', 'TJK', '', 0, 1, 'Tajikistan Ruble', 'TJS', '??', ''),
(220, NULL, NULL, 'Tanzania, United Republic of', 'TZ', 'TZA', '', 0, 1, 'Shilling', 'TZS', 'Sh', ''),
(221, NULL, NULL, 'Thailand', 'TH', 'THA', '', 0, 1, 'Baht', 'THB', '?', ''),
(222, NULL, NULL, 'Togo', 'TG', 'TGO', '', 0, 1, 'CFA Franc BCEAO', 'XOF', 'Fr', ''),
(223, NULL, NULL, 'Tokelau', 'TK', 'TKL', '', 0, 1, 'New Zealand Dollars', 'NZD', '$', ''),
(224, NULL, NULL, 'Tonga', 'TO', 'TON', '', 0, 1, 'PaÕanga', 'TOP', 'T$', ''),
(225, NULL, NULL, 'Trinidad and Tobago', 'TT', 'TTO', '', 0, 1, 'Trinidad and Tobago Dollar', 'TTD', '$', ''),
(226, NULL, NULL, 'Tunisia', 'TN', 'TUN', '', 0, 1, 'Tunisian Dinar', 'TND', '?.?', ''),
(227, NULL, NULL, 'Turkey', 'TR', 'TUR', '', 0, 1, 'Lira', 'TRY', '', ''),
(228, NULL, NULL, 'Turkmenistan', 'TM', 'TKM', '', 0, 1, 'Manat', 'TMT', 'm', ''),
(229, NULL, NULL, 'Turks and Caicos Islands', 'TC', 'TCA', '', 0, 1, 'United States Dollar', 'USD', '$', ''),
(230, NULL, NULL, 'Tuvalu', 'TV', 'TUV', '', 0, 1, 'Australian Dollars', 'AUD', '$', ''),
(231, NULL, NULL, 'Uganda', 'UG', 'UGA', '', 0, 1, 'Shilling', 'UGX', 'Sh', ''),
(232, NULL, NULL, 'Ukraine', 'UA', 'UKR', '', 0, 1, 'Hryvnia', 'UAH', '?', ''),
(233, NULL, NULL, 'United Arab Emirates', 'AE', 'ARE', '', 0, 1, 'Dirham', 'AED', '?.?', ''),
(234, NULL, NULL, 'United Kingdom', 'GB', 'GBR', '', 1, 1, 'Pound Sterling', 'GBP', '£', ''),
(235, NULL, NULL, 'United States', 'US', 'USA', '{firstname} {lastname} {company} {address_1} {address_2} {city}, {zone} {postcode} {country}', 0, 1, 'United States Dollar', 'USD', '$', ''),
(236, NULL, NULL, 'United States Minor Outlying Islands', 'UM', 'UMI', '', 0, 1, 'United States Dollar', 'USD', '$', ''),
(237, NULL, NULL, 'Uruguay', 'UY', 'URY', '', 0, 1, 'Peso', 'UYU', '$', ''),
(238, NULL, NULL, 'Uzbekistan', 'UZ', 'UZB', '', 0, 1, 'Som', 'UZS', '', ''),
(239, NULL, NULL, 'Vanuatu', 'VU', 'VUT', '', 0, 1, 'Vatu', 'VUV', 'Vt', ''),
(240, NULL, NULL, 'Vatican City State (Holy See)', 'VA', 'VAT', '', 0, 1, 'Euros', 'EUR', '€', ''),
(241, NULL, NULL, 'Venezuela', 'VE', 'VEN', '', 0, 1, 'Bolivar', 'VEF', 'Bs F', ''),
(242, NULL, NULL, 'Viet Nam', 'VN', 'VNM', '', 0, 1, 'Dong', 'VND', '?', ''),
(243, NULL, NULL, 'Virgin Islands (British)', 'VG', 'VGB', '', 0, 1, 'United States Dollar', 'USD', '$', ''),
(244, NULL, NULL, 'Virgin Islands (U.S.)', 'VI', 'VIR', '', 0, 1, 'United States Dollar', 'USD', '$', ''),
(245, NULL, NULL, 'Wallis and Futuna Islands', 'WF', 'WLF', '', 0, 1, 'CFP Franc', 'XPF', 'Fr', ''),
(246, NULL, NULL, 'Western Sahara', 'EH', 'ESH', '', 0, 1, 'Dirham', 'MAD', '?.?.', ''),
(247, NULL, NULL, 'Yemen', 'YE', 'YEM', '', 0, 1, 'Rial', 'YER', '?', ''),
(248, NULL, NULL, 'Zambia', 'ZM', 'ZMB', '', 0, 1, 'Kwacha', 'ZMK', 'ZK', ''),
(249, NULL, NULL, 'Zimbabwe', 'ZW', 'ZWE', '', 0, 1, 'Zimbabwe Dollar', 'ZWD', 'P', '');

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  `exchange_rate` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`id`, `created_at`, `updated_at`, `country_id`, `is_default`, `exchange_rate`) VALUES
(1, '2019-09-20 21:57:21', '2019-09-20 21:57:21', 235, 1, 1.00);

-- --------------------------------------------------------

--
-- Table structure for table `currency_payment_method`
--

CREATE TABLE `currency_payment_method` (
  `currency_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `menu_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `page_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `sort_order` int(11) DEFAULT NULL,
  `meta_title` text COLLATE utf8mb4_unicode_ci,
  `meta_description` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `help_categories`
--

CREATE TABLE `help_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `help_category_help_post`
--

CREATE TABLE `help_category_help_post` (
  `help_category_id` bigint(20) UNSIGNED NOT NULL,
  `help_post_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `help_posts`
--

CREATE TABLE `help_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `sort_order` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hostnames`
--

CREATE TABLE `hostnames` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fqdn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `force_https` tinyint(1) NOT NULL DEFAULT '0',
  `under_maintenance_since` timestamp NULL DEFAULT NULL,
  `website_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `invoice_purpose_id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(8,2) NOT NULL,
  `paid` tinyint(1) NOT NULL,
  `item_id` int(11) DEFAULT NULL,
  `extra` text COLLATE utf8mb4_unicode_ci,
  `auto` tinyint(1) NOT NULL DEFAULT '0',
  `hash` text COLLATE utf8mb4_unicode_ci,
  `expires` int(11) DEFAULT NULL,
  `due_date` int(11) DEFAULT NULL,
  `currency_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method_id` bigint(20) UNSIGNED DEFAULT NULL,
  `paypal_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_purposes`
--

CREATE TABLE `invoice_purposes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `purpose` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_purposes`
--

INSERT INTO `invoice_purposes` (`id`, `created_at`, `updated_at`, `purpose`, `code`) VALUES
(1, '2019-09-20 21:57:20', '2019-09-20 21:57:20', 'Subscription Renewal', 'subscription');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_01_01_000003_tenancy_websites', 1),
(4, '2017_01_01_000005_tenancy_hostnames', 1),
(5, '2018_04_06_000001_tenancy_websites_needs_db_host', 1),
(6, '2019_09_05_130202_create_settings_table', 1),
(7, '2019_09_05_131347_create_packages_table', 1),
(8, '2019_09_05_131403_create_package_durations_table', 1),
(9, '2019_09_05_131422_create_countries_table', 1),
(10, '2019_09_05_131436_create_currencies_table', 1),
(11, '2019_09_05_131446_create_subscribers_table', 1),
(12, '2019_09_05_131510_create_billing_addresses_table', 1),
(13, '2019_09_05_131524_create_invoice_purposes_table', 1),
(14, '2019_09_05_131533_create_invoices_table', 1),
(15, '2019_09_05_131549_create_blog_categories_table', 1),
(16, '2019_09_05_131604_create_blog_posts_table', 1),
(17, '2019_09_05_131622_create_blog_category_blog_post_table', 1),
(18, '2019_09_05_131632_create_help_categories_table', 1),
(19, '2019_09_05_131649_create_help_posts_table', 1),
(20, '2019_09_05_131713_create_help_category_help_post_table', 1),
(21, '2019_09_05_131724_create_features_table', 1),
(22, '2019_09_05_131741_create_article_categories_table', 1),
(23, '2019_09_05_131752_create_articles_table', 1),
(24, '2019_09_05_131805_create_article_article_category_table', 1),
(25, '2019_09_05_132454_create_roles_table', 1),
(26, '2019_09_05_132515_add_role_to_user', 1),
(27, '2019_09_05_161133_create_payment_methods_table', 1),
(28, '2019_09_05_161220_create_currency_payment_method_table', 1),
(29, '2019_09_05_161322_create_payment_method_fields_table', 1),
(30, '2019_09_06_112855_add_user_to_blog_post', 1),
(31, '2019_09_06_114628_add_subscription_invoice_purpose', 1),
(32, '2019_09_06_124028_add_payment_method_to_field', 1),
(33, '2019_09_06_124203_rename_pacakge_duration_field', 1),
(34, '2019_09_09_143556_change_subscriber_fk', 1),
(35, '2019_09_09_153308_add_visibility_to_packages', 1),
(36, '2019_09_10_114917_add_unit_to_packages', 1),
(37, '2019_09_10_145016_add_settings', 1),
(38, '2019_09_10_152644_add_default_currency', 1),
(39, '2019_09_10_154016_add_config_setting', 1),
(40, '2019_09_10_155020_enable_registration', 1),
(41, '2019_09_11_100607_add_trial_flag', 1),
(42, '2019_09_11_133646_remove_username_subscriber', 1),
(43, '2019_09_12_133357_add_ft_to_user', 1),
(44, '2019_09_13_141600_add_drop_table_sp', 1),
(45, '2019_09_13_190445_add_invoice_payment_method', 1),
(46, '2019_09_13_193146_add_payment_methods', 1),
(47, '2019_09_16_125750_add_invoice_auto_id', 1),
(48, '2019_09_16_134727_add_ft_to_invoice', 1),
(49, '2019_09_16_145725_add_meta_to_blog', 1),
(50, '2019_09_16_202601_add_ft_to_blog', 1),
(51, '2019_09_16_202623_add_ft_to_help', 1),
(52, '2019_09_16_220428_add_bank_transfer', 1),
(53, '2019_09_16_221825_add_bank_fields', 1),
(54, '2019_09_17_085540_add_disqus_setting', 1),
(55, '2019_09_18_101641_add_stripe_fields', 1),
(56, '2019_09_18_102435_add_stripe_plan', 1),
(57, '2019_09_18_160720_add_paypal_fields', 1),
(58, '2019_09_18_163149_add_paypal_webhook', 1),
(59, '2019_09_18_172305_add_paypal_agreement_to_invoice', 1),
(60, '2019_09_18_193200_remove_two_checkout', 1),
(61, '2019_09_19_142112_add_mailchimp_settings', 1),
(62, '2019_09_19_145345_add_social_settings', 1),
(63, '2019_09_20_153757_change_paypal_setting', 1),
(64, '2019_10_15_114357_fix_subscriber_foriegn', 2);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `storage_space` double DEFAULT NULL,
  `storage_unit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_limit` int(11) DEFAULT NULL,
  `department_limit` int(11) DEFAULT NULL,
  `is_free` tinyint(1) NOT NULL DEFAULT '0',
  `public` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `package_durations`
--

CREATE TABLE `package_durations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seconds` int(11) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `stripe_plan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_order` int(11) DEFAULT NULL,
  `method_label` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_global` tinyint(1) NOT NULL DEFAULT '0',
  `translate` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `created_at`, `updated_at`, `name`, `status`, `code`, `sort_order`, `method_label`, `is_global`, `translate`) VALUES
(1, '2019-09-20 21:57:21', '2019-09-20 21:57:21', 'Paypal', 0, 'paypal', 1, 'Paypal', 0, 0),
(2, '2019-09-20 21:57:21', '2019-09-20 21:57:21', 'Stripe', 0, 'stripe', 1, 'Stripe', 0, 0),
(4, '2019-09-20 21:57:21', '2019-09-20 21:57:21', 'Bank Transfer', 1, 'bank', 1, 'Bank Transfer', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_method_fields`
--

CREATE TABLE `payment_method_fields` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `serialized` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` text COLLATE utf8mb4_unicode_ci,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_method_fields`
--

INSERT INTO `payment_method_fields` (`id`, `created_at`, `updated_at`, `key`, `value`, `serialized`, `type`, `options`, `class`, `payment_method_id`) VALUES
(1, '2019-09-20 21:57:21', '2019-09-20 21:57:21', 'details', NULL, 0, 'textarea', NULL, NULL, 4),
(2, '2019-09-20 21:57:21', '2019-09-20 21:57:21', 'secret_key', NULL, 0, 'text', NULL, NULL, 2),
(3, '2019-09-20 21:57:21', '2019-09-20 21:57:21', 'publishable_key', NULL, 0, 'text', NULL, NULL, 2),
(4, '2019-09-20 21:57:21', '2019-09-20 21:57:21', 'endpoint_secret', NULL, 0, 'text', NULL, NULL, 2),
(5, '2019-09-20 21:57:22', '2019-09-20 21:57:22', 'client_id', NULL, 0, 'text', NULL, NULL, 1),
(6, '2019-09-20 21:57:22', '2019-09-20 21:57:22', 'secret', NULL, 0, 'text', NULL, NULL, 1),
(8, '2019-09-20 21:57:22', '2019-09-20 21:57:22', 'webhook_id', NULL, 0, 'text', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `created_at`, `updated_at`, `title`) VALUES
(1, NULL, NULL, 'admin'),
(2, NULL, NULL, 'subscriber');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placeholder` text COLLATE utf8mb4_unicode_ci,
  `value` text COLLATE utf8mb4_unicode_ci,
  `serialized` tinyint(1) NOT NULL DEFAULT '0',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` text COLLATE utf8mb4_unicode_ci,
  `class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `created_at`, `updated_at`, `key`, `placeholder`, `value`, `serialized`, `type`, `options`, `class`, `sort_order`) VALUES
(1, NULL, NULL, 'general_site_name', NULL, NULL, 0, 'text', '', NULL, NULL),
(2, NULL, NULL, 'general_homepage_title', NULL, NULL, 0, 'text', '', NULL, NULL),
(3, NULL, NULL, 'general_homepage_meta_desc', NULL, NULL, 0, 'textarea', '', NULL, NULL),
(4, NULL, NULL, 'general_admin_email', NULL, NULL, 0, 'text', '', NULL, NULL),
(5, NULL, NULL, 'general_address', NULL, NULL, 0, 'textarea', '', NULL, NULL),
(6, NULL, NULL, 'general_tel', NULL, NULL, 0, 'text', '', NULL, NULL),
(7, NULL, NULL, 'general_contact_email', NULL, NULL, 0, 'text', '', NULL, NULL),
(8, NULL, '2019-09-20 21:57:21', 'general_enable_registration', NULL, '1', 0, 'radio', '1=Yes,0=No', NULL, NULL),
(9, NULL, NULL, 'general_header_scripts', NULL, NULL, 0, 'textarea', '', NULL, NULL),
(10, NULL, NULL, 'general_footer_scripts', NULL, NULL, 0, 'textarea', '', NULL, NULL),
(11, NULL, NULL, 'image_logo', NULL, NULL, 0, 'image', '', NULL, NULL),
(12, NULL, NULL, 'image_icon', NULL, NULL, 0, 'image', '', NULL, NULL),
(13, NULL, NULL, 'mail_protocol', NULL, NULL, 0, 'select', 'mail=Mail,smtp=SMTP', NULL, NULL),
(14, NULL, NULL, 'mail_smtp_host', NULL, NULL, 0, 'text', '', NULL, NULL),
(15, NULL, NULL, 'mail_smtp_username', NULL, NULL, 0, 'text', '', NULL, NULL),
(16, NULL, NULL, 'mail_smtp_password', NULL, NULL, 0, 'text', '', NULL, NULL),
(17, NULL, NULL, 'mail_smtp_port', NULL, NULL, 0, 'text', '', NULL, NULL),
(18, NULL, NULL, 'mail_smtp_timeout', NULL, NULL, 0, 'text', '', NULL, NULL),
(19, NULL, NULL, 'trial_enabled', NULL, NULL, 0, 'text', '', NULL, NULL),
(20, NULL, NULL, 'trial_package_duration_id', NULL, NULL, 0, 'text', '', NULL, NULL),
(21, NULL, NULL, 'trial_days', NULL, NULL, 0, 'text', '', NULL, NULL),
(22, '2019-09-20 21:57:21', '2019-09-20 21:57:21', 'config_language', NULL, 'en', 0, 'text', NULL, NULL, NULL),
(23, '2019-09-20 21:57:21', '2019-09-20 21:57:21', 'general_disqus_shortcode', NULL, NULL, 0, 'text', NULL, NULL, NULL),
(24, '2019-09-20 21:57:22', '2019-09-20 21:57:22', 'mailchimp_api_key', NULL, NULL, 0, 'text', NULL, NULL, NULL),
(25, '2019-09-20 21:57:22', '2019-09-20 21:57:22', 'mailchimp_list_id', NULL, NULL, 0, 'text', NULL, NULL, NULL),
(26, '2019-09-20 21:57:22', '2019-09-20 21:57:22', 'social_facebook', NULL, NULL, 0, 'text', NULL, NULL, NULL),
(27, '2019-09-20 21:57:22', '2019-09-20 21:57:22', 'social_instagram', NULL, NULL, 0, 'text', NULL, NULL, NULL),
(28, '2019-09-20 21:57:22', '2019-09-20 21:57:22', 'social_twitter', NULL, NULL, 0, 'text', NULL, NULL, NULL),
(29, '2019-09-20 21:57:22', '2019-09-20 21:57:22', 'social_linkedin', NULL, NULL, 0, 'text', NULL, NULL, NULL),
(30, '2019-09-20 21:57:22', '2019-09-20 21:57:22', 'social_youtube', NULL, NULL, 0, 'text', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `website_id` bigint(20) UNSIGNED NOT NULL,
  `package_duration_id` bigint(20) UNSIGNED DEFAULT NULL,
  `expires` int(11) DEFAULT NULL,
  `referrer` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `auto_renew` tinyint(1) NOT NULL DEFAULT '0',
  `currency_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `trial` tinyint(1) NOT NULL DEFAULT '1',
  `enabled` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `trial`, `enabled`) VALUES
(1, 'Admin', 'admin@email.com', NULL, '$2y$10$HaTZzludt1atCdtrQc53QuVr99ppzp/q25ZJknHbzECNZEnVJ9DOS', NULL, '2019-09-20 21:57:22', '2019-09-20 21:57:22', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `websites`
--

CREATE TABLE `websites` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `managed_by_database_connection` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'References the database connection key in your database.php'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `article_article_category`
--
ALTER TABLE `article_article_category`
  ADD KEY `article_article_category_article_id_foreign` (`article_id`),
  ADD KEY `article_article_category_article_category_id_foreign` (`article_category_id`);

--
-- Indexes for table `article_categories`
--
ALTER TABLE `article_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `billing_addresses_user_id_foreign` (`user_id`),
  ADD KEY `billing_addresses_country_id_foreign` (`country_id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_category_blog_post`
--
ALTER TABLE `blog_category_blog_post`
  ADD KEY `blog_category_blog_post_blog_category_id_foreign` (`blog_category_id`),
  ADD KEY `blog_category_blog_post_blog_post_id_foreign` (`blog_post_id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `blog_posts_user_id_foreign` (`user_id`);
ALTER TABLE `blog_posts` ADD FULLTEXT KEY `full` (`title`,`content`,`meta_title`,`meta_description`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `currencies_country_id_foreign` (`country_id`);

--
-- Indexes for table `currency_payment_method`
--
ALTER TABLE `currency_payment_method`
  ADD KEY `currency_payment_method_currency_id_foreign` (`currency_id`),
  ADD KEY `currency_payment_method_payment_method_id_foreign` (`payment_method_id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `help_categories`
--
ALTER TABLE `help_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `help_category_help_post`
--
ALTER TABLE `help_category_help_post`
  ADD KEY `help_category_help_post_help_category_id_foreign` (`help_category_id`),
  ADD KEY `help_category_help_post_help_post_id_foreign` (`help_post_id`);

--
-- Indexes for table `help_posts`
--
ALTER TABLE `help_posts`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `help_posts` ADD FULLTEXT KEY `full` (`title`,`content`);

--
-- Indexes for table `hostnames`
--
ALTER TABLE `hostnames`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `hostnames_fqdn_unique` (`fqdn`),
  ADD KEY `hostnames_website_id_foreign` (`website_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_user_id_foreign` (`user_id`),
  ADD KEY `invoices_invoice_purpose_id_foreign` (`invoice_purpose_id`),
  ADD KEY `invoices_currency_id_foreign` (`currency_id`),
  ADD KEY `invoices_payment_method_id_foreign` (`payment_method_id`);
ALTER TABLE `invoices` ADD FULLTEXT KEY `full` (`extra`);

--
-- Indexes for table `invoice_purposes`
--
ALTER TABLE `invoice_purposes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package_durations`
--
ALTER TABLE `package_durations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_durations_package_id_foreign` (`package_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_method_fields`
--
ALTER TABLE `payment_method_fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_method_fields_payment_method_id_foreign` (`payment_method_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscribers_user_id_foreign` (`user_id`),
  ADD KEY `subscribers_website_id_foreign` (`website_id`),
  ADD KEY `subscribers_currency_id_foreign` (`currency_id`),
  ADD KEY `subscribers_package_duration_id_foreign` (`package_duration_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);
ALTER TABLE `users` ADD FULLTEXT KEY `full` (`name`,`email`);

--
-- Indexes for table `websites`
--
ALTER TABLE `websites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `article_categories`
--
ALTER TABLE `article_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `help_categories`
--
ALTER TABLE `help_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `help_posts`
--
ALTER TABLE `help_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostnames`
--
ALTER TABLE `hostnames`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_purposes`
--
ALTER TABLE `invoice_purposes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package_durations`
--
ALTER TABLE `package_durations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_method_fields`
--
ALTER TABLE `payment_method_fields`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `websites`
--
ALTER TABLE `websites`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article_article_category`
--
ALTER TABLE `article_article_category`
  ADD CONSTRAINT `article_article_category_article_category_id_foreign` FOREIGN KEY (`article_category_id`) REFERENCES `article_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `article_article_category_article_id_foreign` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `billing_addresses`
--
ALTER TABLE `billing_addresses`
  ADD CONSTRAINT `billing_addresses_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `billing_addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_category_blog_post`
--
ALTER TABLE `blog_category_blog_post`
  ADD CONSTRAINT `blog_category_blog_post_blog_category_id_foreign` FOREIGN KEY (`blog_category_id`) REFERENCES `blog_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `blog_category_blog_post_blog_post_id_foreign` FOREIGN KEY (`blog_post_id`) REFERENCES `blog_posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD CONSTRAINT `blog_posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `currencies`
--
ALTER TABLE `currencies`
  ADD CONSTRAINT `currencies_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `currency_payment_method`
--
ALTER TABLE `currency_payment_method`
  ADD CONSTRAINT `currency_payment_method_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `currency_payment_method_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `help_category_help_post`
--
ALTER TABLE `help_category_help_post`
  ADD CONSTRAINT `help_category_help_post_help_category_id_foreign` FOREIGN KEY (`help_category_id`) REFERENCES `help_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `help_category_help_post_help_post_id_foreign` FOREIGN KEY (`help_post_id`) REFERENCES `help_posts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hostnames`
--
ALTER TABLE `hostnames`
  ADD CONSTRAINT `hostnames_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_invoice_purpose_id_foreign` FOREIGN KEY (`invoice_purpose_id`) REFERENCES `invoice_purposes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `invoices_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `package_durations`
--
ALTER TABLE `package_durations`
  ADD CONSTRAINT `package_durations_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_method_fields`
--
ALTER TABLE `payment_method_fields`
  ADD CONSTRAINT `payment_method_fields_payment_method_id_foreign` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD CONSTRAINT `subscribers_currency_id_foreign` FOREIGN KEY (`currency_id`) REFERENCES `currencies` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `subscribers_package_duration_id_foreign` FOREIGN KEY (`package_duration_id`) REFERENCES `package_durations` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `subscribers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscribers_website_id_foreign` FOREIGN KEY (`website_id`) REFERENCES `websites` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;