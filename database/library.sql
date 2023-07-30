-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jul 2023 pada 05.49
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone_number` char(15) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `authors`
--

INSERT INTO `authors` (`id`, `name`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Miss Karolann Miller16423', 'misskarolannmiller12264322@gmail.com', '082199778693641', '40585 Zboncak Canyon\r\nNew Madonna, GA41', '2023-05-07 05:12:51', '2023-05-19 09:09:35'),
(3, 'Lawson Purdy1', 'lawsonpurdy1sa1@gmail.com', '0821171928281', '7000 Gibson Shoal Suite 104\r\nLake Crawford, AK 33434-50311', '2023-05-07 05:12:51', '2023-05-19 07:55:20'),
(4, 'Jackeline Schmeler', 'jackelineschmeler@gmail.com', '08217409955', '218 Lilliana Stream Suite 321\nWuckertview, ID 71470', '2023-05-07 05:12:51', '2023-05-07 05:12:51'),
(5, 'Bret Kohler', 'bretkohler@gmail.com', '082130417093', '787 Caterina Motorway Suite 875\nCartwrighthaven, MS 59106', '2023-05-07 05:12:51', '2023-05-07 05:12:51'),
(6, 'Ike Cruickshank', 'ikecruickshank@gmail.com', '082161370611', '433 Sibyl Roads\nSauerfort, MD 11606', '2023-05-07 05:12:51', '2023-05-07 05:12:51'),
(7, 'Luigi Parkers', 'luigiparker@gmail.com', '082117998261', '6522 Kacie Spring\r\nGleasontown, VT 72692', '2023-05-07 05:12:51', '2023-05-15 21:53:51'),
(8, 'Ms. Jammie Volkman V', 'ms.jammievolkmanv@gmail.com', '082140025222', '28873 Borer Plain\nEast Fanny, MO 04728', '2023-05-07 05:12:51', '2023-05-07 05:12:51'),
(9, 'Tatum Greenholt Jr.', 'tatumgreenholtjr.@gmail.com', '08214626886', '898 Rippin Bypass Apt. 778\nKuvalisborough, WA 40771', '2023-05-07 05:12:51', '2023-05-07 05:12:51'),
(11, 'Ismael Kunze', 'ismaelkunze@gmail.com', '082192037578', '245 Blick Lakes Apt. 892\nLake Valentin, NV 66669-4336', '2023-05-07 05:12:52', '2023-05-07 05:12:52'),
(12, 'Amely Metz', 'amelymetz@gmail.com', '082166895084', '746 Stiedemann Harbors Suite 312\nCarrollmouth, NE 95227-2369', '2023-05-07 05:12:52', '2023-05-07 05:12:52'),
(13, 'Tobin Towne', 'tobintowne@gmail.com', '082158264308', '3663 Deangelo Knolls Apt. 433\nFraneckiville, NC 80718', '2023-05-07 05:12:52', '2023-05-07 05:12:52'),
(14, 'Miss Zaria Davis Sr.', 'misszariadavissr.@gmail.com', '082144437798', '95593 Carmella Valley\nJastfurt, TX 60707-0964', '2023-05-07 05:12:52', '2023-05-07 05:12:52'),
(15, 'Prof. Frida Pagac', 'prof.fridapagac@gmail.com', '082190395747', '47318 Triston Freeway\nPort Elseberg, AZ 57083', '2023-05-07 05:12:52', '2023-05-07 05:12:52'),
(16, 'Hyman Windler', 'hymanwindler@gmail.com', '082130669076', '78348 Kling Union\nWest Daisha, IL 32596-4932', '2023-05-07 05:12:52', '2023-05-07 05:12:52'),
(17, 'Darrion Rath', 'darrionrath@gmail.com', '082146139678', '854 Will Mission\nKamrenbury, OH 55371-8282', '2023-05-07 05:12:52', '2023-05-07 05:12:52'),
(18, 'Dariana Leffler', 'darianaleffler@gmail.com', '08216465440', '1412 Yundt Fords\nFritschfort, SD 36238', '2023-05-07 05:12:52', '2023-05-07 05:12:52'),
(19, 'Carmella Kling', 'carmellakling@gmail.com', '082139206934', '6265 Abbie Brooks\nPort Ruben, MA 51899-9741', '2023-05-07 05:12:52', '2023-05-07 05:12:52'),
(20, 'Mrs. Hattie Parker', 'mrs.hattieparker@gmail.com', '082133549184', '795 Lonie Coves\nKulasshire, WA 80813', '2023-05-07 05:12:52', '2023-05-07 05:12:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isbn` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `year` int(11) NOT NULL,
  `publisher_id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `catalog_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`id`, `isbn`, `title`, `year`, `publisher_id`, `author_id`, `catalog_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(6, 105459498, 'Dasar-Dasar Pemograman PHP', 2015, 2, 18, 3, 35, 19167, '2023-05-07 05:55:49', '2023-05-27 13:53:26'),
(7, 816860934, 'Kandungan Rokok ku', 2013, 2, 20, 5, 1, 11628, '2023-05-07 05:55:49', '2023-05-27 13:58:15'),
(8, 997145022, 'Dasar Musik', 2012, 9, 4, 4, 19, 19519, '2023-05-07 05:55:49', '2023-05-27 13:58:15'),
(9, 786459133, 'Perkalian', 2017, 5, 17, 1, 24, 12108, '2023-05-07 05:55:49', '2023-05-27 13:58:15'),
(10, 980249618, 'Tari Modern', 2011, 2, 1, 4, 15, 13264, '2023-05-07 05:55:49', '2023-05-27 13:43:43'),
(11, 857280953, 'Manfaat Buah Untuk Kesehatan', 2018, 8, 13, 2, 11, 10833, '2023-05-07 05:55:49', '2023-05-24 22:02:13'),
(13, 241853683, 'Lompat Jauh', 2010, 9, 12, 5, 10, 13579, '2023-05-07 06:01:45', '2023-05-07 06:01:45'),
(14, 135276480, 'Memahami SQL Dasar', 2019, 3, 8, 3, 18, 18764, '2023-05-07 06:01:45', '2023-05-07 06:01:45'),
(15, 472059302, 'Melihat Kebun Kakek', 2012, 2, 8, 1, 16, 17697, '2023-05-07 06:01:45', '2023-05-07 06:01:45'),
(16, 756300483, 'Macam - Macam Penyakit', 2021, 8, 20, 2, 14, 10756, '2023-05-07 06:01:45', '2023-05-07 06:01:45'),
(17, 969190428, 'Seni Rupa', 2010, 9, 7, 4, 15, 11337, '2023-05-07 06:01:45', '2023-05-07 06:01:45'),
(18, 932941715, 'Makanan Cepat Saji', 2013, 2, 6, 2, 20, 18516, '2023-05-07 06:01:45', '2023-05-07 06:01:45'),
(19, 459027839, 'Bahaya Narkoba', 2020, 4, 3, 2, 18, 17649, '2023-05-07 06:01:45', '2023-05-07 06:01:45'),
(20, 270773457, 'Laravel x Vue JS', 2018, 7, 20, 3, 15, 18067, '2023-05-07 06:01:45', '2023-05-07 06:01:45'),
(21, 155382374, 'Seni Bela diri lah', 2010, 10, 16, 4, 18, 11581, '2023-05-07 06:01:45', '2023-05-22 02:38:25'),
(22, 541975619, 'Sepak Bola', 2021, 4, 19, 5, 20, 14502, '2023-05-07 06:01:45', '2023-05-07 06:01:45'),
(23, 227092671, 'Ratione sed.', 2014, 10, 8, 4, 16, 10779, '2023-05-07 06:01:45', '2023-05-07 06:01:45'),
(24, 746760500, 'Nemo iure explicabo.', 2012, 7, 14, 5, 20, 19356, '2023-05-07 06:01:45', '2023-05-07 06:01:45'),
(25, 207654776, 'Neque.', 2012, 8, 12, 1, 13, 11778, '2023-05-07 06:01:45', '2023-05-07 06:01:45'),
(26, 138594344, 'Est consequuntur.', 2011, 10, 12, 5, 15, 18857, '2023-05-07 06:01:45', '2023-05-07 06:01:45'),
(27, 213361806, 'Et fuga quo est.', 2014, 3, 6, 4, 14, 10750, '2023-05-07 06:01:46', '2023-05-07 06:01:46'),
(28, 653463433, 'Reprehenderit eos.', 2017, 5, 13, 1, 11, 15607, '2023-05-07 06:01:46', '2023-05-07 06:01:46'),
(29, 309929462, 'Non et molestiae.', 2010, 2, 12, 5, 18, 16866, '2023-05-07 06:01:46', '2023-05-07 06:01:46'),
(30, 231104228, 'Sit pariatur aut.', 2011, 5, 20, 4, 19, 11557, '2023-05-07 06:01:46', '2023-05-07 06:01:46'),
(31, 313764002, 'Culpa occaecati id.', 2010, 8, 14, 3, 12, 15735, '2023-05-07 06:01:46', '2023-05-07 06:01:46'),
(32, 712709098, 'Harum doloribus ut.', 2014, 6, 12, 5, 13, 15662, '2023-05-07 06:01:46', '2023-05-07 06:01:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `catalogs`
--

CREATE TABLE `catalogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Anak-Anak', '2023-05-07 05:43:34', '2023-05-12 02:45:35'),
(2, 'Kesehatan', '2023-05-07 05:43:34', '2023-05-12 02:45:13'),
(3, 'Pemograman', '2023-05-07 05:43:34', '2023-05-07 05:43:34'),
(4, 'Kesenian', '2023-05-07 05:43:34', '2023-05-07 05:43:34'),
(5, 'Olahraga', '2023-05-07 05:43:34', '2023-05-12 02:37:50'),
(13, 'Pemograman', '2023-05-12 07:02:14', '2023-05-22 11:01:58'),
(14, 'Kesenian', '2023-05-12 07:57:55', '2023-05-22 11:01:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `gender` char(1) NOT NULL,
  `phone_number` char(15) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(64) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `members`
--

INSERT INTO `members` (`id`, `name`, `gender`, `phone_number`, `address`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Kristy Kovacek', 'P', '081619056652', '54237 Labadie Club\nLake Yasmeenburgh, VA 59150', 'kristykovacek@gmail.com', '2023-05-07 06:14:48', '2023-05-07 06:14:48'),
(2, 'Jon Gulgowski', 'P', '081649722299', '1690 Crist Junctions Suite 166\nPort Rheaton, MA 10034-8876', 'jongulgowski@gmail.com', '2023-05-07 06:14:48', '2023-05-07 06:14:48'),
(3, 'Jarrod Cartwright', 'P', '081664873774', '2577 Kovacek Shore Suite 803\nCordieville, MT 63586', 'jarrodcartwright@gmail.com', '2023-05-07 06:14:48', '2023-05-07 06:14:48'),
(4, 'Virgil Abbott', 'P', '081676402775', '1338 Charlotte Oval\nNorth Oceane, IL 02830', 'virgilabbott@gmail.com', '2023-05-07 06:14:48', '2023-05-07 06:14:48'),
(5, 'Prof. Gerhard Emard', 'L', '081695467629', '648 Johns Track\nNew Moshemouth, IL 44136-3356', 'prof.gerhardemard@gmail.com', '2023-05-07 06:14:48', '2023-05-07 06:14:48'),
(6, 'Maya Crona', 'P', '08164796248', '500 Greenholt Court\nWest Jaydonberg, SD 16101-9837', 'mayacrona@gmail.com', '2023-05-07 06:14:48', '2023-05-07 06:14:48'),
(7, 'Krystina Hansen', 'P', '081642848393', '48449 Bailey Ferry Apt. 847\nEdaburgh, DE 11073', 'krystinahansen@gmail.com', '2023-05-07 06:14:48', '2023-05-07 06:14:48'),
(8, 'Dr. King Walter Sr.', 'P', '081666648261', '92347 Hansen Glens Suite 386\nNew Alanna, HI 68060-8834', 'dr.kingwaltersr.@gmail.com', '2023-05-07 06:14:48', '2023-05-07 06:14:48'),
(9, 'Prof. Judy Torp', 'P', '081677091440', '695 Emory Dale\nNew Graciela, IN 18046', 'prof.judytorp@gmail.com', '2023-05-07 06:14:48', '2023-05-07 06:14:48'),
(10, 'Katelyn Boehm III', 'P', '081688890', '1087 Tanner Stream\nNorth Giovanny, WI 69715', 'katelynboehmiii@gmail.com', '2023-05-07 06:14:48', '2023-05-07 06:14:48'),
(11, 'Prof. Richmond Jacobson', 'L', '081633423034', '133 Greenfelder Port Suite 782\nNorth Beulahfurt, MS 10305-6025', 'prof.richmondjacobson@gmail.com', '2023-05-07 06:14:48', '2023-05-07 06:14:48'),
(12, 'Larissa Kub', 'L', '08169230524', '93436 Bartoletti Pine\nLorenzfurt, NM 25676', 'larissakub@gmail.com', '2023-05-07 06:14:48', '2023-05-07 06:14:48'),
(13, 'August Hettinger', 'P', '081650378752', '1041 Davis Station Suite 378\nSouth Zellamouth, MD 35130', 'augusthettinger@gmail.com', '2023-05-07 06:14:48', '2023-05-07 06:14:48'),
(14, 'Donnie Baumbach III', 'P', '081620229252', '18963 Fadel Landing\nTowneshire, LA 67640-9133', 'donniebaumbachiii@gmail.com', '2023-05-07 06:14:48', '2023-05-07 06:14:48'),
(15, 'Iliana Goodwin', 'P', '0816931901', '48662 Murazik Walk\nWittingborough, MI 91303-2405', 'ilianagoodwin@gmail.com', '2023-05-07 06:14:48', '2023-05-07 06:14:48'),
(16, 'Prof. Geovanni Marquardt Jr.', 'P', '081699526981', '65331 Johan Shoals Apt. 055\nNorth Jaylin, MD 80863', 'prof.geovannimarquardtjr.@gmail.com', '2023-05-07 06:14:48', '2023-05-07 06:14:48'),
(17, 'Lilyan Legros', 'L', '081698546455', '93655 Angelina Place Apt. 604\nArmstrongchester, NY 83061-6101', 'lilyanlegros@gmail.com', '2023-05-07 06:14:48', '2023-05-07 06:14:48'),
(18, 'Miss Nyasia Shields DDS', 'P', '081622009436', '257 Mafalda Inlet\nMosciskiland, WY 41155', 'missnyasiashieldsdds@gmail.com', '2023-05-07 06:14:48', '2023-05-07 06:14:48'),
(19, 'Prof. Paris Hilpert III', 'L', '08162886933', '367 Kuvalis Falls Apt. 886\nMayfurt, NE 05744', 'prof.parishilpertiii@gmail.com', '2023-05-07 06:14:48', '2023-05-07 06:14:48'),
(20, 'Lolita Bradtke', 'P', '081658077803', '164 Marshall Freeway\nNorth Kenton, GA 52032-5044', 'lolitabradtke@gmail.com', '2023-05-07 06:14:48', '2023-05-07 06:14:48'),
(24, '4', 'L', '5', '5', '4@gmail.com', '2023-05-21 07:17:29', '2023-05-21 07:17:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2012_05_06_155307_create_members_table', 1),
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_08_19_000000_create_failed_jobs_table', 1),
(11, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(12, '2023_05_06_155453_create_publishers_table', 1),
(13, '2023_05_06_155503_create_authors_table', 1),
(14, '2023_05_06_155510_create_catalogs_table', 1),
(15, '2023_05_06_155519_create_books_table', 1),
(16, '2023_05_06_155541_create_transactions_table', 1),
(17, '2023_05_06_155605_create_transaction_details_table', 1),
(18, '2023_05_27_151658_add_expired_date_to_transaction_table', 2),
(19, '2023_05_27_212700_create_permission_tables', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'index buku', 'web', '2023-05-27 15:22:36', '2023-05-27 15:22:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `phone_number` char(15) NOT NULL,
  `address` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `email`, `phone_number`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Andrew Tillman21', 'andrewtillman21@gmail.com', '0821925972201', '596462 White Lodge Apt. 586Walkermouth, CT 21843-02291', '2023-05-07 05:45:01', '2023-05-15 23:14:38'),
(2, 'Raven Keeling', 'ravenkeeling@gmail.com', '08218653593', '793 Kuvalis Ramp\nWest Clayton, VT 83308', '2023-05-07 05:45:01', '2023-05-07 05:45:01'),
(3, 'Ressie Ryan', 'ressieryan@gmail.com', '082157842100', '915 Ullrich Keys Suite 880\nMarisolmouth, IN 90072-4868', '2023-05-07 05:45:01', '2023-05-07 05:45:01'),
(4, 'August Deckow', 'augustdeckow@gmail.com', '082142864052', '3774 Adah Path Apt. 313\nMadelynnburgh, MT 47800', '2023-05-07 05:45:01', '2023-05-07 05:45:01'),
(5, 'Karson Volkman', 'karsonvolkman@gmail.com', '082141014272', '6066 Jasen Camp\nSouth Corbin, GA 02977', '2023-05-07 05:45:01', '2023-05-07 05:45:01'),
(6, 'Abel Senger', 'abelsenger@gmail.com', '082182044142', '86231 Deshawn Crescent Apt. 435\nShanahanfurt, MS 96698-3790', '2023-05-07 05:45:01', '2023-05-07 05:45:01'),
(7, 'Ressie Baumbach', 'ressiebaumbach@gmail.com', '082136118350', '34987 Oren Plains\nKaylintown, GA 24540-1237', '2023-05-07 05:45:01', '2023-05-07 05:45:01'),
(8, 'Jarrod Rippin', 'jarrodrippin@gmail.com', '082184600026', '626 Olaf Dale\nAlberthaton, CT 26569-6933', '2023-05-07 05:45:01', '2023-05-07 05:45:01'),
(9, 'Gregoria Bayer', 'gregoriabayer@gmail.com', '082118863719', '73831 Nolan Station\nMedhurstmouth, IA 24268', '2023-05-07 05:45:01', '2023-05-07 05:45:01'),
(10, 'Maureen Mayert', 'maureenmayert@gmail.com', '082176569002', '93075 Elyssa Hollow\nSpencerberg, VA 51964-3524', '2023-05-07 05:45:01', '2023-05-07 05:45:01'),
(12, 'Kesenian2', 'admin@gmail.com', '081632112128', 'Sukarami, kabupaten lahat, provinsi sumsel', '2023-05-12 08:46:00', '2023-05-12 08:46:00'),
(17, 'ongky', 'ongbyjulio@gmail.com', '081632106938', 'qwe', '2023-05-15 23:13:24', '2023-05-15 23:13:24'),
(19, '12', '12@gmail.com', '12', '12', '2023-05-21 07:55:25', '2023-05-21 07:55:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'petugas', 'web', '2023-05-27 15:22:35', '2023-05-27 15:22:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `status` enum('ya','tidak') DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `member_id`, `date_start`, `date_end`, `status`, `created_at`, `updated_at`) VALUES
(2, 2, '2023-05-27', '2023-05-30', 'tidak', '2023-05-26 02:33:46', '2023-05-26 21:15:25'),
(7, 14, '2023-05-27', '2023-05-31', 'tidak', '2023-05-27 10:22:01', '2023-05-27 10:23:57'),
(8, 6, '2023-05-23', '2023-05-26', 'ya', '2023-05-27 13:27:05', '2023-05-27 13:47:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `transaction_id`, `book_id`, `qty`, `created_at`, `updated_at`) VALUES
(19, 7, 6, 1, '2023-05-27 10:22:02', '2023-05-27 10:22:02'),
(20, 7, 7, 1, '2023-05-27 10:22:02', '2023-05-27 10:22:02'),
(21, 7, 8, 1, '2023-05-27 10:22:02', '2023-05-27 10:22:02'),
(22, 8, 6, 1, '2023-05-27 13:27:05', '2023-05-27 13:27:05'),
(23, 8, 8, 1, '2023-05-27 13:31:56', '2023-05-27 13:31:56'),
(27, 2, 8, 1, '2023-05-27 13:58:15', '2023-05-27 13:58:15'),
(28, 2, 9, 1, '2023-05-27 13:58:15', '2023-05-27 13:58:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `member_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `member_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ongky', 'ongbyjulio@gmail.com', NULL, '$2y$10$THr9hdU3TrQqty658tBRce875omlyaTgJLbPhqekvM9JZRwJAzc46', 1, NULL, '2023-05-07 17:40:34', '2023-05-07 17:40:34');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_publisher_id_foreign` (`publisher_id`),
  ADD KEY `books_author_id_foreign` (`author_id`),
  ADD KEY `books_catalog_id_foreign` (`catalog_id`);

--
-- Indeks untuk tabel `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indeks untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_transaction_id_foreign` (`transaction_id`),
  ADD KEY `transaction_details_book_id_foreign` (`book_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `member_id` (`member_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `books_catalog_id_foreign` FOREIGN KEY (`catalog_id`) REFERENCES `catalogs` (`id`),
  ADD CONSTRAINT `books_publisher_id_foreign` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`);

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
