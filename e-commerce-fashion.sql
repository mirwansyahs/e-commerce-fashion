-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jul 2022 pada 14.48
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
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  `sender_id` int(11) UNSIGNED NOT NULL,
  `recipient_id` int(11) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `is_read` int(1) NOT NULL DEFAULT 0,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `message`
--

INSERT INTO `message` (`id`, `sender_id`, `recipient_id`, `message`, `is_read`, `time`) VALUES
(1, 2, 1, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, earum placeat possimus animi ad quo asperiores aliquid vitae debitis beatae. Explicabo eum molestias impedit porro quos sint illum delectus. Cupiditate!', 0, '2022-07-20 04:30:24'),
(2, 1, 2, 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse omnis assumenda quibusdam sed, quasi explicabo sint porro! Consequatur numquam porro quibusdam excepturi commodi rerum aliquid molestiae, quo quis? Quisquam laborum porro consequatur corporis expedita fuga magni voluptatum iste quae minima!', 0, '2022-07-20 04:31:50'),
(3, 3, 1, 'Halo', 0, '2022-07-21 10:52:33'),
(4, 1, 3, 'iya', 0, '2022-07-22 04:32:44'),
(6, 2, 1, 'Punten Brow', 0, '2022-07-26 01:26:35'),
(10, 1, 3, 'Cek', 0, '2022-07-26 07:01:49'),
(11, 1, 2, 'Apakah ada yang saya bisa bantu?', 0, '2022-07-26 07:03:15'),
(12, 1, 2, 'coba', 0, '2022-07-26 07:40:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `message_room`
--

CREATE TABLE `message_room` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL,
  `room` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `message_room`
--

INSERT INTO `message_room` (`id`, `user_id`, `message_id`, `room`, `created_at`, `modified_at`) VALUES
(1, 2, 1, 1, '2022-07-27 14:00:25', '2022-07-27 14:00:25'),
(2, 1, 2, 1, '2022-07-27 14:01:37', '2022-07-27 14:01:37'),
(3, 2, 6, 1, '2022-07-27 14:03:25', '2022-07-27 14:03:25');

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
-- Struktur dari tabel `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `total` decimal(11,0) NOT NULL,
  `payment_id` int(11) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) UNSIGNED NOT NULL,
  `order_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Trigger `order_items`
--
DELIMITER $$
CREATE TRIGGER `InsertOrderItem` BEFORE INSERT ON `order_items` FOR EACH ROW BEGIN
	UPDATE product set quantity = quantity - NEW.quantity 
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
  `amount` int(11) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `desc` text DEFAULT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `brand_id` int(11) NOT NULL,
  `size` varchar(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `material` varchar(100) NOT NULL,
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

INSERT INTO `product` (`id`, `name`, `image`, `desc`, `category_id`, `brand_id`, `size`, `color`, `material`, `quantity`, `discount_id`, `original_price`, `price`, `created_at`, `modified_at`, `deleted_at`) VALUES
(7, 'Kaos Polos Hitam', 'kaos.jpg', '<p>Ready kaos polos super premium\r\n</p><p>DETAIL KAOS :\r\nKaos polos basic\r\nmatt spandex asli premium 30s\r\nBahan adem,lembut ,nyerap keringat,di jamin nyaman di pakai\r\nJahitan rantai rapi standar distro clothing\r\n</p><p>\r\nNB:\r\nBUKAN SPANDEX PE YG HARGA JUAL 18 RIBUAN\r\nTEKSTUR BAHAN PANAS DAN CEPAT BERBULU</p><p>\r\n\r\nSIZE CHART :\r\nM=LD 96cm x PJG 66cm\r\nL=LD 98cm x PJG 68cm\r\nXL=LD 100cm x  PJG 70cm\r\n</p><p>Toleransi 1-2 cm, karna produksi nya massal\r\nBerat produk 180gr\r\n1kg muat 7 pcs\r\n\r\nKualitas original mantap\r\nreal pict &amp; good quality\r\n\r\n\r\n#kaospolos #T-shirtso-neck #kaosdistro #kaospolosmurah #kaospolosspandex\r\n\r\nTerima kasih!</p>', 1, 0, '0', '0', '', 98, 2, 75000, '37500', '2022-07-20 01:59:50', '2022-07-26 14:24:18', NULL),
(10, 'Celana panjang jeans pria hitam premium', 'Celana panjang jeans pria hitam premium.jpg', '<p>==========================================\r\n</p><p>● Bahan : Badjatex Premium Stretch</p><p>● Model : Slim Fit\r\n</p><p>● Bahan Strerch /  elastis nyaman dipakai\r\n==========================================\r\n</p><p>\r\nPanduan Size Chart Lokal :</p><p>\r\nUkuran  28 : Lingkaran pinggang 72 cm x Panjang Celana 98 cm\r\n</p><p>Ukuran  30 : Lingkaran pinggang 78 cm x Panjang Celana 99 cm</p><p>Ukuran  32 : Lingkaran pinggang 83 cm x Panjang Celana 100 cm\r\n</p><p>Ukuran  34 : Lingkaran pinggang 88 cm x Panjang Celana 101 cm</p><p>\r\n\r\n*Toleransi Ukuran 1-2 Centimeters\r\n\r\nLengkapi keseharian kalian dengan CELVIN DENIM STRETCH. Bahan kualitas premium dan diproduksi dari tangan-tangan kreatif INDONESIA bakal bikin hari hari kalian semakin sempurna.\r\nBahan Denim Stretch (bahan melar / ngaret) dan potongan SLIMFIT akan bikin kalian nyaman, bebas bergerak, dan terlihat semakin kece.\r\n\r\nHappy Shopping Guyss :)</p>', 2, 1, '28', 'hitam', 'levis', 100, 2, 144900, '72450', '2022-07-22 08:01:58', '2022-07-27 05:17:45', NULL);

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
-- Struktur dari tabel `shopping_session`
--

CREATE TABLE `shopping_session` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `total` decimal(20,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `store`
--

CREATE TABLE `store` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `telephone` varchar(13) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `store`
--

INSERT INTO `store` (`id`, `name`, `email`, `image`, `address`, `telephone`, `created_at`, `modified_at`) VALUES
(1, 'LEON.ID', 'official@leon.id', 'LEON.ID.png', 'Jl. Abcd No. 41', '0812334343', '2022-07-16 21:17:38', '2022-07-16 21:17:38');

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
  `telephone` varchar(13) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `status` enum('offline','online') NOT NULL DEFAULT 'offline',
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `image`, `first_name`, `last_name`, `telephone`, `level`, `status`, `created_at`, `modified_at`) VALUES
(1, 'ali', '$2y$10$U7tywMON7QRz0z3IhoURweqjjtSf.nEAryxFqRf5uQGEBiaTcLkXa', 'avatar-1.png', 'Ali', 'Abdurohman', '085155126055', 'admin', 'online', '2022-07-16 21:17:13', '2022-07-16 21:17:13'),
(2, 'user', '$2y$10$slfY443MHVJdzhrFTln5p.KOLiGMabiqJaYK1mKo5Pszk4xkGM0Fm', 'avatar-2.png', 'User', '', '081233434392', 'user', 'offline', '2022-07-16 21:17:13', '2022-07-16 21:17:13'),
(3, 'Percobaan', 'percobaan', 'avatar-3.png', 'percobaan', '', '43434', 'user', 'offline', '2022-07-21 10:50:47', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_address`
--

CREATE TABLE `user_address` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `address_line1` varchar(255) NOT NULL,
  `address_line2` varchar(255) NOT NULL,
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

INSERT INTO `user_address` (`id`, `user_id`, `address_line1`, `address_line2`, `country`, `province`, `city`, `district`, `village`, `postal_code`, `telephone`) VALUES
(1, 1, 'jl. abc no 45', 'jl. bcd no 21', 'Indonesia', 'Jawa Barat', 'Cirebon', 'Waled', 'Ciuyah', '98272', '0812334343'),
(2, 2, 'jl. sds no 40', '', 'Indonesia', 'Jawa Barat', 'Cirebon', 'Waled', 'Ambit', '98232', '082323242'),
(3, 3, 'cek', '', 'cek', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_payment`
--

CREATE TABLE `user_payment` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `provider` varchar(255) NOT NULL,
  `account_no` varchar(100) NOT NULL,
  `expiry` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD KEY `message_recipient_id_foreign` (`recipient_id`);

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
-- Indeks untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_user_id_foreign` (`user_id`),
  ADD KEY `order_details_payment_id_foreign` (`payment_id`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indeks untuk tabel `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_category_id_foreign` (`category_id`),
  ADD KEY `product_discount_id_foreign` (`discount_id`),
  ADD KEY `size_id` (`size`),
  ADD KEY `color_id` (`color`),
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
-- Indeks untuk tabel `shopping_session`
--
ALTER TABLE `shopping_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shopping_session_user_id_foreign` (`user_id`);

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `discount`
--
ALTER TABLE `discount`
  MODIFY `discount_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `message_room`
--
ALTER TABLE `message_room`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
-- AUTO_INCREMENT untuk tabel `shopping_session`
--
ALTER TABLE `shopping_session`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  ADD CONSTRAINT `message_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payment_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_discount_id_foreign` FOREIGN KEY (`discount_id`) REFERENCES `discount` (`discount_id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
