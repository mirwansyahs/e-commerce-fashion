-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Agu 2022 pada 06.21
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce-fashion`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart_item`
--

CREATE TABLE `cart_item` (
  `id` int(11) UNSIGNED NOT NULL,
  `session_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `size` varchar(5) NOT NULL,
  `color` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `cart_item`
--

INSERT INTO `cart_item` (`id`, `session_id`, `product_id`, `size`, `color`, `quantity`, `created_at`, `modified_at`) VALUES
(2, 2, 7, 'XL', 'Hitam', 2, NULL, NULL),
(4, 8, 10, '32', 'Hitam', 2, '2022-08-03 16:52:59', NULL),
(5, 9, 7, 'L', 'Hitam', 2, '2022-08-03 17:09:35', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `color`
--

CREATE TABLE `color` (
  `id` int(11) UNSIGNED NOT NULL,
  `color` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `color`
--

INSERT INTO `color` (`id`, `color`, `created_at`, `modified_at`) VALUES
(1, 'Hitam', '2022-07-30 03:37:29', '2022-07-30 03:37:29'),
(2, 'Merah', '2022-07-30 03:37:29', '2022-07-30 03:37:29'),
(3, 'Biru', '2022-07-30 03:37:29', '2022-07-30 03:37:29'),
(4, 'Hijau', '2022-07-30 03:37:29', '2022-07-30 03:37:29'),
(5, 'Kuning', '2022-07-30 06:48:54', '2022-07-30 06:48:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `discount`
--

CREATE TABLE `discount` (
  `discount_id` int(11) UNSIGNED NOT NULL,
  `discount_name` varchar(255) NOT NULL,
  `discount_desc` text DEFAULT NULL,
  `discount_percent` double NOT NULL,
  `active` enum('active','failed') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `discount`
--

INSERT INTO `discount` (`discount_id`, `discount_name`, `discount_desc`, `discount_percent`, `active`, `created_at`, `modified_at`, `deleted_at`) VALUES
(1, 'Tidak Ada', 'Untuk mengisi diproduk jika tidak ada diskon', 0, 'active', '2022-07-18 07:03:55', '2022-07-22 08:23:27', NULL),
(2, 'Diskon Lebaran', 'Diskon Lebaran', 50, 'active', '2022-07-20 01:58:43', NULL, NULL),
(3, 'Diskon Hari Merdeka', 'Diskon Hari Merdeka', 25, 'active', '2022-07-16 21:18:03', '2022-07-22 08:27:14', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `message`
--

CREATE TABLE `message` (
  `id` int(11) UNSIGNED NOT NULL,
  `room_number` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `sender_id` int(11) UNSIGNED NOT NULL,
  `recipient_id` int(11) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `is_read` int(1) NOT NULL DEFAULT 0,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `message`
--

INSERT INTO `message` (`id`, `room_number`, `user_id`, `sender_id`, `recipient_id`, `message`, `is_read`, `time`) VALUES
(1, 1, 2, 2, 1, 'Halo Aku Satu\r\n', 1, '2022-07-28 10:28:41'),
(2, 1, 2, 1, 2, 'Iya halo aku dua', 1, '2022-07-28 10:28:41'),
(3, 2, 3, 3, 1, 'Halo', 1, '2022-07-28 10:34:45'),
(4, 2, 3, 1, 3, 'iya', 0, '2022-07-27 09:23:20'),
(6, 1, 2, 2, 1, 'Punten Brow', 1, '2022-07-28 10:28:41'),
(14, 2, 3, 1, 3, 'Holaaa Berhasilllll', 0, '2022-07-27 10:08:19'),
(15, 2, 3, 3, 1, 'Yeayyy!', 1, '2022-07-28 10:34:45'),
(16, 1, 2, 1, 2, 'Ada apa brow', 1, '2022-07-28 10:28:41'),
(19, 2, 3, 1, 3, 'Alhamdulillah', 0, '2022-07-28 08:42:19'),
(20, 2, 3, 3, 1, 'Mantap', 1, '2022-08-01 11:43:36'),
(24, 1, 2, 1, 2, 'Cek cek', 0, '2022-07-28 10:31:23'),
(25, 1, 2, 2, 1, 'coba', 1, '2022-08-01 13:54:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `message_latest`
--

CREATE TABLE `message_latest` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `message_id` int(11) UNSIGNED NOT NULL,
  `time_in` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `message_latest`
--

INSERT INTO `message_latest` (`id`, `user_id`, `message_id`, `time_in`) VALUES
(1, 2, 25, '2022-07-28 10:00:52'),
(5, 3, 20, '2022-08-01 11:19:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `message_room`
--

CREATE TABLE `message_room` (
  `id` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `message_id` int(11) UNSIGNED NOT NULL,
  `room` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `message_room`
--

INSERT INTO `message_room` (`id`, `user_id`, `message_id`, `room`, `created_at`, `modified_at`) VALUES
(1, 2, 1, 1, '2022-07-19 21:30:24', '2022-07-27 07:00:25'),
(2, 1, 2, 1, '2022-07-19 21:31:50', '2022-07-27 07:01:37'),
(3, 2, 6, 1, '2022-07-25 18:26:35', '2022-07-27 07:03:25'),
(4, 3, 3, 2, '2022-07-21 03:52:33', '2022-07-27 08:04:24'),
(5, 3, 14, 2, '2022-07-27 08:45:23', '2022-07-27 08:45:41'),
(6, 3, 19, 2, '2022-07-28 08:42:19', '2022-07-28 08:42:19'),
(7, 3, 20, 2, '2022-07-28 08:43:03', '2022-07-28 08:43:03'),
(11, 2, 24, 1, '2022-07-28 09:05:24', '2022-07-28 09:05:24'),
(12, 2, 25, 1, '2022-07-28 10:00:52', '2022-07-28 10:00:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(67, '2022-07-10-163455', 'App\\Database\\Migrations\\User', 'default', 'App', 1658049400, 1),
(68, '2022-07-11-033257', 'App\\Database\\Migrations\\UserAddress', 'default', 'App', 1658049401, 1),
(69, '2022-07-11-041643', 'App\\Database\\Migrations\\UserPayment', 'default', 'App', 1658049402, 1),
(70, '2022-07-11-050040', 'App\\Database\\Migrations\\ShoppingSession', 'default', 'App', 1658049403, 1),
(71, '2022-07-11-050516', 'App\\Database\\Migrations\\ProductCategory', 'default', 'App', 1658049403, 1),
(72, '2022-07-11-051300', 'App\\Database\\Migrations\\ProductInventory', 'default', 'App', 1658049403, 1),
(73, '2022-07-11-051907', 'App\\Database\\Migrations\\Discount', 'default', 'App', 1658049404, 1),
(74, '2022-07-11-052412', 'App\\Database\\Migrations\\Product', 'default', 'App', 1658049404, 1),
(75, '2022-07-11-053619', 'App\\Database\\Migrations\\CartItem', 'default', 'App', 1658049404, 1),
(76, '2022-07-11-055231', 'App\\Database\\Migrations\\PaymentDetails', 'default', 'App', 1658049404, 1),
(77, '2022-07-11-060858', 'App\\Database\\Migrations\\OrderDetails', 'default', 'App', 1658049405, 1),
(78, '2022-07-11-061239', 'App\\Database\\Migrations\\OrderItems', 'default', 'App', 1658049406, 1),
(79, '2022-07-12-044339', 'App\\Database\\Migrations\\Store', 'default', 'App', 1658049407, 1),
(80, '2022-07-20-112852', 'App\\Database\\Migrations\\Message', 'default', 'App', 1658316940, 2),
(81, '2022-07-11-052050', 'App\\Database\\Migrations\\ProductBrand', 'default', 'App', 1658892545, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_delivery`
--

CREATE TABLE `order_delivery` (
  `id` int(11) UNSIGNED NOT NULL,
  `expedition` varchar(255) NOT NULL,
  `shiping` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_delivery`
--

INSERT INTO `order_delivery` (`id`, `expedition`, `shiping`, `created_at`, `modified_at`) VALUES
(1, 'J&T', '5000', '2022-07-31 10:57:15', '2022-07-31 10:57:15'),
(2, 'JNE', '5000', '2022-07-31 10:57:15', '2022-07-31 10:57:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) UNSIGNED NOT NULL,
  `invoice` varchar(20) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `delivery_id` int(11) UNSIGNED NOT NULL,
  `resi` varchar(50) NOT NULL,
  `subtotal` varchar(11) NOT NULL,
  `shiping` int(11) NOT NULL,
  `total` decimal(11,0) NOT NULL,
  `payment_id` int(11) UNSIGNED NOT NULL,
  `booking_date` timestamp NULL DEFAULT NULL,
  `delivery_date` timestamp NULL DEFAULT NULL,
  `date_received` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `order_details`
--

INSERT INTO `order_details` (`id`, `invoice`, `user_id`, `delivery_id`, `resi`, `subtotal`, `shiping`, `total`, `payment_id`, `booking_date`, `delivery_date`, `date_received`) VALUES
(31, 'INV0608220001', 2, 2, 'JPQ12121211', '144900', 5000, '224900', 30, '2022-08-06 09:35:58', '2022-08-05 16:55:37', '2022-08-06 16:52:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `order_items_id` int(11) UNSIGNED NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `size_item` varchar(5) NOT NULL,
  `color_item` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `status_item` enum('in','delivery','complete') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `order_items`
--

INSERT INTO `order_items` (`order_items_id`, `order_id`, `product_id`, `size_item`, `color_item`, `qty`, `status_item`) VALUES
(12, 31, 7, 'XL', 'Hitam', 2, 'complete');

--
-- Trigger `order_items`
--
DELIMITER $$
CREATE TRIGGER `InsertOrderItem` BEFORE INSERT ON `order_items` FOR EACH ROW BEGIN
	UPDATE product set quantity = quantity - NEW.qty 
    WHERE id = NEW.product_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_details`
--

CREATE TABLE `payment_details` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_payment_id` int(11) UNSIGNED NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `transaction_status` varchar(100) NOT NULL,
  `transaction_time` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `payment_details`
--

INSERT INTO `payment_details` (`id`, `user_payment_id`, `gross_amount`, `bank`, `transaction_status`, `transaction_time`) VALUES
(30, 31, 224900, 'bca', 'pending', '2022-08-06 09:35:57'),
(31, 32, 224900, 'bca', 'pending', '2022-08-06 11:26:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `desc` text DEFAULT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `brand_id` int(11) UNSIGNED NOT NULL,
  `material` varchar(100) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount_id` int(11) UNSIGNED DEFAULT NULL,
  `original_price` int(11) NOT NULL,
  `price` decimal(11,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `slug`, `desc`, `category_id`, `brand_id`, `material`, `weight`, `quantity`, `discount_id`, `original_price`, `price`, `created_at`, `modified_at`, `deleted_at`) VALUES
(7, 'Kaos Polos Hitam', 'kaos.jpg', 'kaos-polos-hitam', '<p>Ready kaos polos super premium\r\n</p><p>DETAIL KAOS :\r\nKaos polos basic\r\nmatt spandex asli premium 30s\r\nBahan adem,lembut ,nyerap keringat,di jamin nyaman di pakai\r\nJahitan rantai rapi standar distro clothing\r\n</p><p>\r\nNB:\r\nBUKAN SPANDEX PE YG HARGA JUAL 18 RIBUAN\r\nTEKSTUR BAHAN PANAS DAN CEPAT BERBULU</p><p>\r\n\r\nSIZE CHART :\r\nM=LD 96cm x PJG 66cm\r\nL=LD 98cm x PJG 68cm\r\nXL=LD 100cm x  PJG 70cm\r\n</p><p>Toleransi 1-2 cm, karna produksi nya massal\r\nBerat produk 180gr\r\n1kg muat 7 pcs\r\n\r\nKualitas original mantap\r\nreal pict & good quality\r\n\r\n\r\n#kaospolos #T-shirtso-neck #kaosdistro #kaospolosmurah #kaospolosspandex\r\n\r\nTerima kasih!</p>', 1, 2, 'cotton', '300gram', 91, 2, 75000, '37500', '2022-07-20 01:59:50', '2022-07-29 03:07:05', NULL),
(10, 'Celana panjang jeans pria hitam premium', 'Celana panjang jeans pria hitam premium.jpg', 'celana-panjang-jeans-pria-hitam-premium', '<p>==========================================\r\n</p><p>● Bahan : Badjatex Premium Stretch</p><p>● Model : Slim Fit\r\n</p><p>● Bahan Strerch /  elastis nyaman dipakai</p><p>\r\n==========================================\r\n</p><p>\r\nPanduan Size Chart Lokal :</p><p>\r\nUkuran  28 : Lingkaran pinggang 72 cm x Panjang Celana 98 cm\r\n</p><p>Ukuran  30 : Lingkaran pinggang 78 cm x Panjang Celana 99 cm</p><p>Ukuran  32 : Lingkaran pinggang 83 cm x Panjang Celana 100 cm\r\n</p><p>Ukuran  34 : Lingkaran pinggang 88 cm x Panjang Celana 101 cm</p><p>\r\n\r\n*Toleransi Ukuran 1-2 Centimeters\r\n\r\nLengkapi keseharian kalian dengan CELVIN DENIM STRETCH. Bahan kualitas premium dan diproduksi dari tangan-tangan kreatif INDONESIA bakal bikin hari hari kalian semakin sempurna.\r\nBahan Denim Stretch (bahan melar / ngaret) dan potongan SLIMFIT akan bikin kalian nyaman, bebas bergerak, dan terlihat semakin kece.\r\n\r\nHappy Shopping Guyss :)</p>', 2, 1, 'levis', '320gram', 97, 2, 144900, '72450', '2022-07-22 08:01:58', '2022-07-29 14:36:57', NULL),
(28, 'asdasd', 'asdasd_1.jpg', 'asdasd', '<p>adasd</p>', 1, 1, 'adasd', '340gram', 22, 1, 121212212, '121212212', '2022-07-30 05:03:30', '2022-07-30 06:20:10', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_brand`
--

CREATE TABLE `product_brand` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `product_brand`
--

INSERT INTO `product_brand` (`id`, `name`, `slug`, `created_at`, `modified_at`, `deleted_at`) VALUES
(1, 'No Brand', 'no-brand', '2022-07-26 15:41:18', NULL, NULL),
(2, 'Erigo', 'erigo', '2022-07-26 15:41:18', NULL, NULL),
(3, 'Aerostreet', 'aerostreet', '2022-07-27 06:57:46', '2022-07-27 06:59:47', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_category`
--

CREATE TABLE `product_category` (
  `category_id` int(11) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(225) NOT NULL,
  `category_desc` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `product_category`
--

INSERT INTO `product_category` (`category_id`, `category_name`, `category_slug`, `category_desc`, `created_at`, `modified_at`, `deleted_at`) VALUES
(1, 'Baju', 'baju', 'Baju-baju bagus', '2022-07-16 21:17:51', '2022-07-27 06:39:35', NULL),
(2, 'Celana', 'celana', 'Celana-celana bagus', '2022-07-16 21:17:51', '2022-07-27 06:39:41', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_detail`
--

CREATE TABLE `product_detail` (
  `id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `size_id` int(11) UNSIGNED NOT NULL,
  `color_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product_detail`
--

INSERT INTO `product_detail` (`id`, `product_id`, `size_id`, `color_id`, `created_at`, `modified_at`) VALUES
(18, 28, 1, 1, '2022-07-30 06:20:10', '2022-07-30 05:03:30'),
(19, 28, 2, 2, '2022-07-30 06:20:10', '2022-07-30 05:03:30'),
(20, 28, 3, 3, '2022-07-30 06:20:10', '2022-07-30 05:03:30'),
(21, 28, 4, 4, '2022-07-30 06:20:10', '2022-07-30 05:03:31'),
(22, 10, 1, 1, '2022-07-30 07:05:59', '2022-07-30 07:05:59'),
(23, 10, 2, 2, '2022-07-30 07:05:59', '2022-07-30 07:05:59'),
(24, 10, 3, 3, '2022-07-30 07:05:59', '2022-07-30 07:05:59'),
(25, 10, 4, 4, '2022-07-30 07:05:59', '2022-07-30 07:05:59'),
(26, 7, 1, 1, '2022-07-30 07:07:01', '2022-07-30 07:07:01'),
(27, 7, 2, 2, '2022-07-30 07:07:01', '2022-07-30 07:07:01'),
(28, 7, 3, 3, '2022-07-30 07:07:01', '2022-07-30 07:07:01'),
(29, 7, 4, 4, '2022-07-30 07:07:01', '2022-07-30 07:07:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `shopping_session`
--

CREATE TABLE `shopping_session` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `total` decimal(20,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `shopping_session`
--

INSERT INTO `shopping_session` (`id`, `user_id`, `total`, `created_at`, `modified_at`) VALUES
(2, 3, '37500', NULL, NULL),
(8, 2, '144900', '2022-08-03 16:52:59', NULL),
(9, 2, '75000', '2022-08-03 17:09:35', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `size`
--

CREATE TABLE `size` (
  `id` int(11) UNSIGNED NOT NULL,
  `size` varchar(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `size`
--

INSERT INTO `size` (`id`, `size`, `created_at`, `modified_at`) VALUES
(1, 'S', '2022-07-30 03:38:14', '2022-07-30 03:38:14'),
(2, 'M', '2022-07-30 03:38:14', '2022-07-30 03:38:14'),
(3, 'L', '2022-07-30 03:38:14', '2022-07-30 03:38:14'),
(4, 'XL', '2022-07-30 03:38:14', '2022-07-30 03:38:14'),
(5, 'XXL', '2022-07-30 06:45:48', '2022-07-30 06:46:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `store`
--

CREATE TABLE `store` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `telephone` varchar(13) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `store`
--

INSERT INTO `store` (`id`, `name`, `email`, `image`, `about`, `address`, `telephone`, `facebook`, `instagram`, `twitter`, `created_at`, `modified_at`) VALUES
(1, 'LEON.ID', 'leon_id@gmail.com', 'LEON.ID.png', 'Leon ID merupakan sebuah usaha toko online shop yang bergerak di bidang fashion', 'Kuningan, Jawa Barat, Indonesia', '0889898989', '#', '#', '#', '2022-07-16 21:17:38', '2022-08-03 02:25:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(13) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `status` enum('offline','online') NOT NULL DEFAULT 'offline',
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `image`, `first_name`, `last_name`, `email`, `telephone`, `level`, `status`, `created_at`, `modified_at`) VALUES
(1, 'ali', '$2y$10$U7tywMON7QRz0z3IhoURweqjjtSf.nEAryxFqRf5uQGEBiaTcLkXa', 'avatar-1.png', 'Ali', 'Abdurohman', 'ali@gmail.com', '08123456789', 'admin', 'offline', '2022-07-16 21:17:13', '2022-08-03 04:43:57'),
(2, 'user', '$2y$10$slfY443MHVJdzhrFTln5p.KOLiGMabiqJaYK1mKo5Pszk4xkGM0Fm', 'user.png', 'User', '', 'user@gmail.com', '081233434392', 'user', 'offline', '2022-07-16 21:17:13', '2022-07-16 21:17:13'),
(3, 'percobaan', 'percobaan', 'percobaan.png', 'Percobaan', '', 'percobaan@gmail.com', '0813434433', 'user', 'offline', '2022-07-21 10:50:47', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `village` varchar(100) NOT NULL,
  `postal_code` varchar(5) NOT NULL,
  `telephone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_address`
--

INSERT INTO `user_address` (`id`, `user_id`, `address`, `country`, `province`, `city`, `district`, `village`, `postal_code`, `telephone`) VALUES
(1, 1, 'jl. abc no 45', 'Indonesia', 'Jawa Barat', 'Cirebon', 'Waled', 'Ciuyah', '98272', '0812334343'),
(2, 2, 'jl. sds no 40', 'Indonesia', 'Jawa Barat', 'Cirebon', 'Waled', 'Ambit', '98232', '0823232423'),
(3, 3, 'cek', 'cek', '', '', '', '', '3223', '0823232');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_payment`
--

CREATE TABLE `user_payment` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `va_number` varchar(100) NOT NULL,
  `expiry` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_payment`
--

INSERT INTO `user_payment` (`id`, `user_id`, `payment_type`, `va_number`, `expiry`) VALUES
(31, 2, 'bank_transfer', '78500870709', NULL),
(32, 2, 'bank_transfer', '78500785064', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart_item`
--
ALTER TABLE `cart_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_item_session_id_foreign` (`session_id`),
  ADD KEY `cart_item_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discount_id`);

--
-- Indeks untuk tabel `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_sender_id_foreign` (`sender_id`),
  ADD KEY `message_recipient_id_foreign` (`recipient_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `message_latest`
--
ALTER TABLE `message_latest`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `message_id` (`message_id`);

--
-- Indeks untuk tabel `message_room`
--
ALTER TABLE `message_room`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `message_id` (`message_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_delivery`
--
ALTER TABLE `order_delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_user_id_foreign` (`user_id`),
  ADD KEY `order_details_payment_id_foreign` (`payment_id`),
  ADD KEY `delivery_id` (`delivery_id`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_items_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indeks untuk tabel `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_id` (`user_payment_id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id_foreign` (`category_id`),
  ADD KEY `product_discount_id_foreign` (`discount_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indeks untuk tabel `product_brand`
--
ALTER TABLE `product_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `size_id` (`size_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Indeks untuk tabel `shopping_session`
--
ALTER TABLE `shopping_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shopping_session_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_address_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `user_payment`
--
ALTER TABLE `user_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_payment_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart_item`
--
ALTER TABLE `cart_item`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `color`
--
ALTER TABLE `color`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `discount`
--
ALTER TABLE `discount`
  MODIFY `discount_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `message_latest`
--
ALTER TABLE `message_latest`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `message_room`
--
ALTER TABLE `message_room`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `order_delivery`
--
ALTER TABLE `order_delivery`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_items_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `product_brand`
--
ALTER TABLE `product_brand`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `product_category`
--
ALTER TABLE `product_category`
  MODIFY `category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `shopping_session`
--
ALTER TABLE `shopping_session`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `size`
--
ALTER TABLE `size`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_payment`
--
ALTER TABLE `user_payment`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_item_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `shopping_session` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_recipient_id_foreign` FOREIGN KEY (`recipient_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `message_latest`
--
ALTER TABLE `message_latest`
  ADD CONSTRAINT `message_latest_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_latest_ibfk_2` FOREIGN KEY (`message_id`) REFERENCES `message` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `message_room`
--
ALTER TABLE `message_room`
  ADD CONSTRAINT `message` FOREIGN KEY (`message_id`) REFERENCES `message` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_delivery_id_foreign` FOREIGN KEY (`delivery_id`) REFERENCES `order_delivery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payment_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `payment_details`
--
ALTER TABLE `payment_details`
  ADD CONSTRAINT `payment_details_ibfk_1` FOREIGN KEY (`user_payment_id`) REFERENCES `user_payment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `product_brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_discount_id_foreign` FOREIGN KEY (`discount_id`) REFERENCES `discount` (`discount_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `color_id_fk` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id_fk` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `size_id_fk` FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `shopping_session`
--
ALTER TABLE `shopping_session`
  ADD CONSTRAINT `shopping_session_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_payment`
--
ALTER TABLE `user_payment`
  ADD CONSTRAINT `user_payment_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
