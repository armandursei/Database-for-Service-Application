-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gazdă: localhost
-- Timp de generare: ian. 11, 2025 la 10:05 PM
-- Versiune server: 10.4.28-MariaDB
-- Versiune PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `ServiceReparatiiDispozitive`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `Angajati`
--

CREATE TABLE `Angajati` (
  `IDAngajat` int(11) NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `Prenume` varchar(50) NOT NULL,
  `CNP` char(13) NOT NULL,
  `Telefon` char(15) DEFAULT NULL,
  `Mail` varchar(50) DEFAULT NULL,
  `Strada` varchar(50) DEFAULT NULL,
  `Numar` char(10) DEFAULT NULL,
  `Oras` varchar(50) DEFAULT NULL,
  `Judet` varchar(50) DEFAULT NULL,
  `DataNasterii` datetime DEFAULT NULL,
  `DataAngajarii` datetime NOT NULL,
  `Salariu` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `Angajati`
--

INSERT INTO `Angajati` (`IDAngajat`, `Nume`, `Prenume`, `CNP`, `Telefon`, `Mail`, `Strada`, `Numar`, `Oras`, `Judet`, `DataNasterii`, `DataAngajarii`, `Salariu`) VALUES
(1, 'Moise', 'Vali', '5030421654321', '071243425', 'giuyyt@yahoo.ro', 'meriso', '21', 'valea', 'norului', '2002-12-19 00:00:00', '2024-12-19 00:00:00', 4700.00),
(2, 'Ionescu', 'Maria', '2870923456789', '0723456789', 'maria.ionescu@example.com', 'Strada Lalelelor', '15', 'Cluj-Napociity', 'Cluj', '1987-09-23 00:00:00', '2018-07-15 00:00:00', 4800.00),
(3, 'Georgescu', 'Vasile', '1730323456789', '0734567890', 'vasile.georgescu@example.com', 'Strada Panselutelor', '21', 'Timisoara', 'Timis', '1973-03-23 00:00:00', '2017-05-20 00:00:00', 5100.75),
(4, 'Dumitru', 'Elena', '2920823456789', '0745678901', 'elena.dumitru@example.com', 'Strada Trandafirilor', '5', 'Constanta', 'Constanta', '1992-08-23 00:00:00', '2019-04-10 00:00:00', 4000.25),
(5, 'Stoica', 'Andrei', '1900223456789', '0756789012', 'andrei.stoica@example.com', 'Strada Magnoliei', '12', 'Iasi', 'Iasi', '1990-02-20 00:00:00', '2016-01-05 00:00:00', 4600.50),
(6, 'Tanasie', 'Cristina', '1850623456789', '0767890123', 'cristina.tanase@example.com', 'Strada Brândusei', '30', 'Brasov', 'Brasov', '1985-06-15 00:00:00', '2021-06-25 00:00:00', 4700.00),
(7, 'Radu', 'Alexandru', '1930423456789', '0778901234', 'alexandru.radu@example.com', 'Strada Ghioceilor', '7', 'Craiova', 'Dolj', '1993-04-20 00:00:00', '2022-09-12 00:00:00', 4300.00),
(8, 'Mihai', 'Gabriela', '2880723456789', '0789012345', 'gabriela.mihai@example.com', 'Strada Crizantemelor', '50', 'Arad', 'Arad', '1988-07-15 00:00:00', '2015-11-20 00:00:00', 4900.25),
(9, 'Barbu', 'Dragos', '1991223456789', '0790123456', 'dragos.barbu@example.com', 'Strada Hortensiei', '17', 'Oradea', 'Bihor', '1999-12-10 00:00:00', '2020-10-01 00:00:00', 4500.75),
(10, 'Ilie', 'Ana', '2950323456789', '0701234567', 'ana.ilie@example.com', 'Strada Violetelor', '25', 'Sibiu', 'Sibiu', '1995-03-23 00:00:00', '2023-02-14 00:00:00', 4200.50),
(15, 'Mirela', 'Mirela', '1234567999123', '0744929577', 'burgan@yahoo.com', 'regina', '21', 'bucur', 'bucur', '2001-05-21 08:25:12', '2024-11-22 08:25:17', 14320.00);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `Clienti`
--

CREATE TABLE `Clienti` (
  `IDClient` int(11) NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `Prenume` varchar(50) NOT NULL,
  `PersoanaJuridica` char(1) DEFAULT NULL CHECK (`PersoanaJuridica` in ('v','x')),
  `CNP_CUI` char(13) NOT NULL,
  `Telefon` char(15) DEFAULT NULL,
  `Mail` varchar(50) DEFAULT NULL,
  `Strada` varchar(50) DEFAULT NULL,
  `Numar` char(10) DEFAULT NULL,
  `Oras` varchar(50) DEFAULT NULL,
  `Judet` varchar(50) DEFAULT NULL,
  `DataNasterii` datetime DEFAULT NULL,
  `PuncteLoialitate` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `Clienti`
--

INSERT INTO `Clienti` (`IDClient`, `Nume`, `Prenume`, `PersoanaJuridica`, `CNP_CUI`, `Telefon`, `Mail`, `Strada`, `Numar`, `Oras`, `Judet`, `DataNasterii`, `PuncteLoialitate`) VALUES
(1, 'Popa', 'Mihai', 'x', '1870623456789', '0711111111', 'mihai.popa@example.com', 'Strada Fagului', '10', 'Bucuresti', 'Ilfov', '1987-06-23 00:00:00', 100),
(2, 'Marin', 'Ioana', 'x', '2880523456789', '0722222222', 'ioana.marin@example.com', 'Strada Plopilor', '15', 'Cluj-Napoca', 'Cluj', '1988-05-23 00:00:00', 50),
(3, 'Vasilescu', 'Andrei', 'x', '1920323456789', '0733333333', 'andrei.vasilescu@example.com', 'Strada Stejarului', '12', 'Timisoara', 'Timis', '1992-03-23 00:00:00', 30),
(4, 'Constantin', 'Elena', 'x', '1830823456789', '0744444444', 'elena.constantin@example.com', 'Strada Teiului', '5', 'Constanta', 'Constanta', '1983-08-23 00:00:00', 120),
(5, 'Nedelcu', 'Cristian', 'v', 'RO12345678', '0755555555', 'cristian.nedelcu@example.com', 'Strada Pinului', '7', 'Iasi', 'Iasi', NULL, 75),
(6, 'Preda', 'Gabriela', 'v', 'RO87654321', '0766666666', 'gabriela.preda@example.com', 'Strada Artarului', '20', 'Brasov', 'Brasov', NULL, 90),
(7, 'Enache', 'Roxana', 'x', '1950423456789', '0777777777', 'roxana.enache@example.com', 'Strada Salciei', '35', 'Craiova', 'Dolj', '1995-04-20 00:00:00', 60),
(8, 'Badea', 'Stefan', 'v', 'RO12398745', '0788888888', 'stefan.badea@example.com', 'Strada Merilor', '50', 'Arad', 'Arad', NULL, 20),
(9, 'Cristea', 'Adriana', 'x', '1900223456789', '0799999999', 'adriana.cristea@example.com', 'Strada Perilor', '40', 'Oradea', 'Bihor', '1990-02-10 00:00:00', 85),
(10, 'Manole', 'Adrian', 'x', '1890123456789', '0700000000', 'adrian.manole@example.com', 'Strada Castanilor', '45', 'Sibiu', 'Sibiu', '1989-01-15 00:00:00', 110);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `Dispozitive`
--

CREATE TABLE `Dispozitive` (
  `IDDispozitiv` int(11) NOT NULL,
  `DenumireProducator` varchar(50) NOT NULL,
  `DenumireModel` varchar(50) NOT NULL,
  `GarantieValida` datetime DEFAULT NULL,
  `SerialNumber` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `Dispozitive`
--

INSERT INTO `Dispozitive` (`IDDispozitiv`, `DenumireProducator`, `DenumireModel`, `GarantieValida`, `SerialNumber`) VALUES
(1, 'Samsung', 'Galaxy S21', '2025-01-01 00:00:00', 34234235),
(2, 'Apple', 'iPhone 13', '2024-12-31 00:00:00', 2341291294),
(3, 'Dell', 'Inspiron 15', '2024-06-15 00:00:00', 45389493904),
(4, 'HP', 'Pavilion', '2025-08-20 00:00:00', 4598234090),
(5, 'Lenovo', 'ThinkPad X1', '2026-03-10 00:00:00', 123123),
(6, 'Asus', 'ROG Strix', '2025-09-25 00:00:00', 8493534034),
(7, 'Acer', 'Aspire 5', '2024-11-11 00:00:00', 3287382),
(8, 'Sony', 'PlayStation 5', '2025-07-01 00:00:00', 32758823892),
(9, 'Microsoft', 'Surface Pro 7', '2024-04-15 00:00:00', 32874392439),
(10, 'LG', 'OLED TV CX', '2023-12-31 00:00:00', 13248798712),
(11, 'Samsung', 'Galaxy S22', '2025-12-31 00:00:00', 100000000011),
(12, 'Apple', 'iPhone 14', '2024-11-30 00:00:00', 100000000012),
(13, 'Huawei', 'P50 Pro', '2024-10-31 00:00:00', 100000000013),
(14, 'Xiaomi', 'Redmi Note 12', '2025-01-15 00:00:00', 100000000014),
(15, 'OnePlus', 'OnePlus 11', '2024-09-15 00:00:00', 100000000015),
(16, 'Sony', 'Xperia 1 IV', '2027-08-30 00:00:00', 100000000016),
(17, 'Google', 'Pixel 7 Pro', '2026-07-20 00:00:00', 100000000017),
(18, 'Motorola', 'Edge 30 Ultra', '2024-06-15 00:00:00', 100000000018),
(19, 'Oppo', 'Find X5 Pro', '2025-05-10 00:00:00', 100000000019),
(20, 'Asus', 'ROG Phone 6', '2024-04-25 00:00:00', 100000000020);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `failed_jobs`
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
-- Structură tabel pentru tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `Piese`
--

CREATE TABLE `Piese` (
  `IDPiesa` int(11) NOT NULL,
  `DenumireProducator` varchar(50) NOT NULL,
  `DenumireModel` varchar(50) NOT NULL,
  `Stoc` int(11) NOT NULL,
  `PretPeBuc` decimal(5,2) NOT NULL,
  `Lot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `Piese`
--

INSERT INTO `Piese` (`IDPiesa`, `DenumireProducator`, `DenumireModel`, `Stoc`, `PretPeBuc`, `Lot`) VALUES
(1, 'Intel', 'i7-10700K', 4, 300.00, 1),
(2, 'AMD', 'Ryzen 5 5600X', 20, 250.00, 1),
(3, 'Samsung', 'EVO 970 SSD', 10, 120.00, 2),
(4, 'Kingston', 'Fury RAM 16GB', 25, 75.00, 3),
(5, 'NVIDIA', 'RTX 3060', 5, 450.00, 4),
(6, 'Corsair', 'RM750 PSU', 12, 100.00, 2),
(7, 'Asus', 'TUF Motherboard', 8, 200.00, 3),
(8, 'Cooler Master', 'Hyper 212', 30, 50.00, 1),
(9, 'Seagate', 'Barracuda HDD', 18, 60.00, 2),
(10, 'MSI', 'Gaming Monitor', 7, 400.00, 3),
(11, 'Samsung', 'Capac Baterie', 50, 25.50, 101),
(12, 'Apple', 'Cablu Lightning', 30, 19.99, 102),
(13, 'Huawei', 'Display P30', 20, 45.00, 103),
(14, 'Xiaomi', 'Baterie Mi Note 10', 40, 29.99, 104),
(15, 'Sony', 'Camera Xperia', 15, 55.50, 105),
(16, 'Google', 'Carcasă Pixel 6', 25, 35.00, 106),
(17, 'Motorola', 'Placă de Bază Edge 30', 10, 150.00, 107),
(18, 'Oppo', 'Panou Frontal X5', 20, 60.00, 108),
(19, 'Asus', 'Ventilator ROG', 18, 40.50, 109),
(20, 'OnePlus', 'Ecran OnePlus 9', 22, 75.00, 110);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `PieseReparatii`
--

CREATE TABLE `PieseReparatii` (
  `IDPiesa` int(11) NOT NULL,
  `IDReparatie` int(11) NOT NULL,
  `NumarBucati` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `PieseReparatii`
--

INSERT INTO `PieseReparatii` (`IDPiesa`, `IDReparatie`, `NumarBucati`) VALUES
(1, 1, 5),
(1, 21, 2),
(2, 1, 2),
(2, 22, 1),
(3, 2, 1),
(3, 23, 3),
(4, 3, 2),
(4, 10, 1),
(4, 24, 2),
(5, 4, 1),
(5, 25, 1),
(6, 5, 1),
(6, 26, 4),
(7, 6, 1),
(7, 27, 2),
(8, 7, 3),
(8, 28, 3),
(9, 8, 2),
(9, 29, 1),
(10, 9, 1),
(10, 20, 5),
(11, 21, 2),
(12, 12, 4),
(13, 13, 1),
(14, 14, 3),
(15, 15, 2),
(16, 16, 1),
(17, 17, 6),
(18, 18, 2),
(19, 19, 1),
(20, 20, 3);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `Reparatii`
--

CREATE TABLE `Reparatii` (
  `IDReparatie` int(11) NOT NULL,
  `IDClient` int(11) NOT NULL,
  `IDAngajat` int(11) DEFAULT NULL,
  `IDDispozitiv` int(11) NOT NULL,
  `Data` datetime NOT NULL,
  `DescriereDefectiune` varchar(500) DEFAULT NULL,
  `NrOreTotal` int(11) NOT NULL,
  `Cost` decimal(6,2) NOT NULL,
  `Discount` int(11) DEFAULT 0,
  `Status` tinyint(4) DEFAULT 0
) ;

--
-- Eliminarea datelor din tabel `Reparatii`
--

INSERT INTO `Reparatii` (`IDReparatie`, `IDClient`, `IDAngajat`, `IDDispozitiv`, `Data`, `DescriereDefectiune`, `NrOreTotal`, `Cost`, `Discount`, `Status`) VALUES
(1, 1, NULL, 1, '2024-01-10 00:00:00', 'Ecran spart', 3, 500.00, 10, 2),
(2, 2, 2, 2, '2024-02-15 00:00:00', 'Probleme software', 2, 305.00, 15, 2),
(3, 3, 3, 3, '2024-03-20 00:00:00', 'Bateria nu se incarca', 4, 600.00, 0, 0),
(4, 2, 4, 4, '2024-04-25 00:00:00', 'Supraîncălzire', 5, 700.00, 20, 1),
(5, 5, 5, 5, '2024-05-30 00:00:00', 'Placa de baza defecta', 6, 1200.00, 30, 1),
(6, 6, 6, 6, '2024-06-05 00:00:00', 'Probleme ventilator', 3, 400.00, 10, 0),
(7, 7, 7, 7, '2024-07-12 00:00:00', 'Hard disk defect', 4, 800.00, 0, 2),
(8, 8, 8, 8, '2024-08-18 00:00:00', 'Porturi USB nefunctionale', 5, 450.00, 15, 0),
(9, 9, 9, 9, '2024-09-25 00:00:00', 'Ecran negru', 3, 550.00, 10, 2),
(10, 10, 10, 10, '2024-10-30 00:00:00', 'Zgomote anormale', 2, 350.00, 5, 2),
(12, 1, 2, 1, '2024-12-19 00:00:00', 'dssdc', 5, 800.00, 10, 2),
(13, 1, 1, 1, '2023-10-01 10:00:00', 'Defecțiune la ecran.', 5, 500.00, 10, 1),
(14, 2, 2, 2, '2023-10-05 14:30:00', 'Problemă la placa de bază.', 8, 1200.00, 15, 0),
(15, 3, 3, 3, '2023-10-10 09:15:00', 'Baterie defectă.', 2, 200.00, 0, 2),
(16, 4, 1, 4, '2023-10-12 11:45:00', 'Defecțiune la camera foto.', 6, 700.00, 20, 1),
(17, 5, 4, 5, '2023-10-15 16:20:00', 'Port de încărcare defect.', 4, 400.00, 0, 0),
(18, 6, 5, 6, '2023-10-18 13:50:00', 'Ecran spart.', 5, 600.00, 10, 2),
(19, 7, 2, 7, '2023-10-20 15:30:00', 'Sunet distorsionat.', 3, 300.00, 5, 1),
(20, 8, 3, 8, '2023-10-22 17:10:00', 'Sistem de operare blocat.', 7, 750.00, 0, 0),
(21, 9, 4, 9, '2023-10-25 10:25:00', 'Wi-Fi nefuncțional.', 6, 650.00, 20, 1),
(22, 10, 5, 10, '2023-10-27 12:00:00', 'Defecțiune la touch screen.', 5, 550.00, 0, 2),
(23, 1, 1, 11, '2023-10-30 14:35:00', 'Vibrație nefuncțională.', 4, 450.00, 10, 1),
(24, 2, 2, 12, '2023-11-01 09:45:00', 'Defecțiune la microfon.', 6, 600.00, 15, 0),
(25, 3, 3, 13, '2023-11-03 11:20:00', 'Baterie care se descarcă rapid.', 2, 220.00, 5, 2),
(26, 4, 1, 14, '2023-11-06 13:00:00', 'Cameră neclară.', 5, 500.00, 20, 1),
(27, 5, 4, 15, '2023-11-08 15:40:00', 'Defecțiune la butoane.', 4, 480.00, 0, 0),
(28, 6, 5, 16, '2023-11-10 17:10:00', 'Defecțiune la accelerometru.', 3, 350.00, 10, 2),
(29, 7, 2, 17, '2023-11-12 10:00:00', 'Dispozitiv supraîncălzit.', 5, 550.00, 0, 1),
(30, 8, 3, 18, '2023-11-15 12:45:00', 'Semnal slab.', 6, 670.00, 20, 0),
(31, 9, 4, 19, '2023-11-18 14:20:00', 'Aplicații care nu pornesc.', 7, 750.00, 0, 1),
(32, 10, 5, 20, '2023-11-20 16:55:00', 'Ecran care pâlpâie.', 5, 500.00, 10, 2);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Eliminarea datelor din tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6OVsGqg51N0HzI5F907cLiTH8jSvbpOjoDH3X5zA', NULL, '127.0.0.1', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.2 Safari/605.1.15', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieEc5MXRUZnJqbE55WFNVbDlQTzhZZ1JIZ0F0aXZ5OGROYmZsd2FyUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQ/dGFibGU9Q2xpZW50aSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1736629362);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `Unelte`
--

CREATE TABLE `Unelte` (
  `IDUnealta` int(11) NOT NULL,
  `DenumireProducator` varchar(50) NOT NULL,
  `DenumireModel` varchar(50) NOT NULL,
  `Stoc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `Unelte`
--

INSERT INTO `Unelte` (`IDUnealta`, `DenumireProducator`, `DenumireModel`, `Stoc`) VALUES
(1, 'Bosch', 'GSR 12V', 11),
(2, 'Makita', 'DF331DWAE', 15),
(3, 'DeWalt', 'DCD791D2', 8),
(4, 'Hilti', 'SF 2H-A', 12),
(5, 'Einhell', 'TE-CD 18', 20),
(6, 'Black+Decker', 'BDCDC18K', 14),
(7, 'Ryobi', 'R18DD3-0', 10),
(8, 'Metabo', 'PowerMaxx BS', 6),
(9, 'Stanley', 'FMC601C2K', 9),
(10, 'Festool', 'CXS Li 2.6', 7);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `UnelteReparatii`
--

CREATE TABLE `UnelteReparatii` (
  `IDUnealta` int(11) NOT NULL,
  `IDReparatie` int(11) NOT NULL,
  `NrOreProcedura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Eliminarea datelor din tabel `UnelteReparatii`
--

INSERT INTO `UnelteReparatii` (`IDUnealta`, `IDReparatie`, `NrOreProcedura`) VALUES
(1, 1, 2),
(1, 2, 19),
(2, 2, 1),
(3, 1, 1),
(3, 3, 3),
(4, 4, 4),
(5, 5, 3),
(6, 6, 2),
(7, 7, 1),
(8, 8, 2),
(9, 9, 2),
(10, 10, 1);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `Angajati`
--
ALTER TABLE `Angajati`
  ADD PRIMARY KEY (`IDAngajat`),
  ADD UNIQUE KEY `CNP` (`CNP`);

--
-- Indexuri pentru tabele `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexuri pentru tabele `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexuri pentru tabele `Clienti`
--
ALTER TABLE `Clienti`
  ADD PRIMARY KEY (`IDClient`),
  ADD UNIQUE KEY `CNP_CUI` (`CNP_CUI`);

--
-- Indexuri pentru tabele `Dispozitive`
--
ALTER TABLE `Dispozitive`
  ADD PRIMARY KEY (`IDDispozitiv`),
  ADD UNIQUE KEY `SerialNumber` (`SerialNumber`);

--
-- Indexuri pentru tabele `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexuri pentru tabele `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexuri pentru tabele `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexuri pentru tabele `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexuri pentru tabele `Piese`
--
ALTER TABLE `Piese`
  ADD PRIMARY KEY (`IDPiesa`);

--
-- Indexuri pentru tabele `PieseReparatii`
--
ALTER TABLE `PieseReparatii`
  ADD PRIMARY KEY (`IDPiesa`,`IDReparatie`),
  ADD KEY `IDReparatie` (`IDReparatie`);

--
-- Indexuri pentru tabele `Reparatii`
--
ALTER TABLE `Reparatii`
  ADD PRIMARY KEY (`IDReparatie`),
  ADD KEY `IDClient` (`IDClient`),
  ADD KEY `IDAngajat` (`IDAngajat`),
  ADD KEY `IDDispozitiv` (`IDDispozitiv`);

--
-- Indexuri pentru tabele `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexuri pentru tabele `Unelte`
--
ALTER TABLE `Unelte`
  ADD PRIMARY KEY (`IDUnealta`);

--
-- Indexuri pentru tabele `UnelteReparatii`
--
ALTER TABLE `UnelteReparatii`
  ADD PRIMARY KEY (`IDUnealta`,`IDReparatie`),
  ADD KEY `IDReparatie` (`IDReparatie`);

--
-- Indexuri pentru tabele `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `Angajati`
--
ALTER TABLE `Angajati`
  MODIFY `IDAngajat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pentru tabele `Clienti`
--
ALTER TABLE `Clienti`
  MODIFY `IDClient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pentru tabele `Dispozitive`
--
ALTER TABLE `Dispozitive`
  MODIFY `IDDispozitiv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pentru tabele `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pentru tabele `Piese`
--
ALTER TABLE `Piese`
  MODIFY `IDPiesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pentru tabele `Reparatii`
--
ALTER TABLE `Reparatii`
  MODIFY `IDReparatie` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pentru tabele `Unelte`
--
ALTER TABLE `Unelte`
  MODIFY `IDUnealta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pentru tabele `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `PieseReparatii`
--
ALTER TABLE `PieseReparatii`
  ADD CONSTRAINT `piesereparatii_ibfk_1` FOREIGN KEY (`IDPiesa`) REFERENCES `Piese` (`IDPiesa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `piesereparatii_ibfk_2` FOREIGN KEY (`IDReparatie`) REFERENCES `Reparatii` (`IDReparatie`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `Reparatii`
--
ALTER TABLE `Reparatii`
  ADD CONSTRAINT `reparatii_ibfk_1` FOREIGN KEY (`IDClient`) REFERENCES `Clienti` (`IDClient`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reparatii_ibfk_2` FOREIGN KEY (`IDAngajat`) REFERENCES `Angajati` (`IDAngajat`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `reparatii_ibfk_3` FOREIGN KEY (`IDDispozitiv`) REFERENCES `Dispozitive` (`IDDispozitiv`) ON UPDATE CASCADE;

--
-- Constrângeri pentru tabele `UnelteReparatii`
--
ALTER TABLE `UnelteReparatii`
  ADD CONSTRAINT `uneltereparatii_ibfk_1` FOREIGN KEY (`IDUnealta`) REFERENCES `Unelte` (`IDUnealta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `uneltereparatii_ibfk_2` FOREIGN KEY (`IDReparatie`) REFERENCES `Reparatii` (`IDReparatie`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
