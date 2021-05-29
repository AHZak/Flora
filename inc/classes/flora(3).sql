-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 29, 2021 at 08:35 AM
-- Server version: 8.0.25-0ubuntu0.20.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flora`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `FName` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LName` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permission` enum('admin','master') COLLATE utf8mb4_unicode_ci NOT NULL,
  `admined_by` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `FName`, `LName`, `email`, `password`, `phone`, `permission`, `admined_by`, `created_at`, `updated_at`) VALUES
(8, 'arash', 'abedi', 'arash078insta@gmail.com', 'b921f466f191d99ef6ac3a08fee9a4a86ef21a08', '09215919027', 'master', 1, '2021-05-19 13:49:12', '2021-05-19 13:49:12'),
(9, 'amir', 'tataloo', 'amira@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '09360795096', 'master', 1, '2021-05-19 14:31:14', '2021-05-19 14:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `creator_id` int NOT NULL,
  `visibility` enum('visible','hide') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'visible',
  `show_index` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `creator_id`, `visibility`, `show_index`, `created_at`, `updated_at`) VALUES
(3, 'گیاهان آپارتمانی', 1, 'visible', 'yes', '2021-05-14 13:51:49', '2021-05-14 13:51:49'),
(4, 'کاکتوس ها', 1, 'visible', 'yes', '2021-05-14 13:51:57', '2021-05-14 13:51:57'),
(5, 'فضای باز', 1, 'visible', 'yes', '2021-05-14 13:52:12', '2021-05-14 13:52:12'),
(6, 'هدیه', 1, 'visible', 'no', '2021-05-14 21:21:48', '2021-05-14 21:21:48');

-- --------------------------------------------------------

--
-- Table structure for table `category_product`
--

CREATE TABLE `category_product` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_product`
--

INSERT INTO `category_product` (`id`, `product_id`, `category_id`) VALUES
(5, 5, 3),
(6, 6, 4),
(7, 7, 5),
(8, 8, 5),
(9, 9, 5),
(10, 10, 3),
(11, 11, 4),
(12, 12, 5),
(13, 13, 3),
(14, 14, 3),
(15, 15, 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `code` int NOT NULL,
  `customer_id` int NOT NULL,
  `customer_role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `payment_method_id` int NOT NULL,
  `shipping_id` int NOT NULL,
  `sum_price` double NOT NULL,
  `postal_price` double NOT NULL,
  `status` enum('doing','done','canceled') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `customer_id`, `customer_role`, `payment_method_id`, `shipping_id`, `sum_price`, `postal_price`, `status`, `address_id`, `created_at`, `updated_at`) VALUES
(22, 1445, 8, 'admin', 1, 2, 94000, 0, 'done', 6, '2021-05-29 06:01:08', '2021-05-29 06:01:08');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `ordered_price` double NOT NULL,
  `quantity` int NOT NULL,
  `sum_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `ordered_price`, `quantity`, `sum_price`) VALUES
(25, 22, 5, 47000, 2, 94000);

-- --------------------------------------------------------

--
-- Table structure for table `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('disable','active') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `name`, `status`) VALUES
(1, 'پرداخت در محل', 'active'),
(2, 'پرداخت آنلاین', 'disable');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `title` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_alt` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` double NOT NULL,
  `sales` int NOT NULL DEFAULT '0',
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `visibility` enum('hide','visible') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'visible',
  `instock` int NOT NULL,
  `creator_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `image`, `image_alt`, `price`, `sales`, `description`, `visibility`, `instock`, `creator_id`, `created_at`, `updated_at`) VALUES
(5, 'رشته مروارید', '../../flora/upload/images/product-sample-coral.jpg', 'رشته مروارید', 47000, 0, 'گیاه رشته مروارید (String of Pearls) چه گیاه خانگی بی‌نظیری است! مطمئنا از زیبایی شاخه‌های ظریف و مهره‌های گِرد و خوش فرمی که از آن آویزان شده است به وجد می‌آیید. ترکیب گیاه Senecio rowleyanus برای آویز شدن از سقف یا قرار گرفتن بر روی استند بسیار مناسب است.                                     ', 'visible', 10, 1, '2021-05-14 19:56:48', '2021-05-14 19:56:48'),
(6, 'سدوم مورگانیوم', '../../flora/upload/images/product-sample-pink.jpg', '', 120000, 0, 'گیاه سدم مورگانیونم (Sedum Morganianum) یکی از منحصربه فردترین ساکولنت‌ها است. این گیاه با برگ‌های گوشتی زیبایش که به رنگ‌های سبز و آبی هستند و گاها در تابستان و بر اثر نور خورشید به رنگ قرمز تغییر می‌کنند، بسیار خاص و تماشایی هستند.                                            ', 'visible', 20, 1, '2021-05-14 21:03:15', '2021-05-14 21:03:15'),
(7, 'درخت موز', '../../flora/upload/images/product-sample-yellow.jpg', 'درخت موز', 55000, 0, 'اگر شما به دنبال یک کاکتوسی هستید تا فضای خانه‌تان را تغییر دهد و خیلی راحت و بی‌دردسر رشد کند این گیاه همان چیزی هست که شما می‌خواهید. کاکتوس گوش خرگوشی برای رشد به نور زیاد و آبدهی منظم نیاز دارد. این گیاه را در یک گلدان سنگی با شن‌ها و سنگ‌های رنگی تصور کنید، فوق العاده می‌شود.                      ', 'visible', 22, 1, '2021-05-14 21:03:58', '2021-05-14 21:03:58'),
(8, 'کامیس', '../../flora/upload/images/product-sample-yellow.jpg', 'کامیس', 88000, 0, 'به این گیاه کمک می‌کند تا خیلی خوب رشد کند. نکته‌ای که در پرورش این گیاه اهمیت دارد، انتخاب گلدان مناسب برای رشد ریشه‌های این گیاه است. سعی شود به تناسب بزرگ شدن درختچه، سایز گلدان نیز تغییر کند.                      ', 'visible', 7, 1, '2021-05-14 21:05:21', '2021-05-14 21:05:21'),
(9, 'کاج نوئل', '../../flora/upload/images/product-sample-seablue.jpg', 'کاج نوئل', 150000, 0, 'این گیاه میوه هم می‌دهد! میوه‌ی آن شبیه به آناناس است و از زمان جوانه زدن تا رسیدن، حدود یکسال زمان نیاز دارد. این گیاه گرمسیری با ظاهر زیبایش، خانه شما را بسیار جذاب و مدرن جلوه می‌دهد.                      ', 'visible', 40, 1, '2021-05-14 21:06:01', '2021-05-14 21:06:01'),
(10, 'پتوس', '../../flora/upload/images/product-sample.jpg', 'پتوس', 22000, 0, 'رای طراحی دکور داخلی یک گزینه‌ی ایده‌آل است. با انتخاب مناسب گلدان، می‌توان سرعت رشد و قد کشیدن فیکوس لیراتا را تحت کنترل قرار داد. درختچه‌ی فیوکوس نور غیر مستقیم را دوست دارد.                      ', 'visible', 30, 1, '2021-05-14 21:06:55', '2021-05-14 21:06:55'),
(11, 'کراوسولا', '../../flora/upload/images/product-sample-purple.jpg', 'کراسولا', 17000, 0, 'یکی دیگر از معروف ترین انواع ساکولنت مخملی کراسولا است. این ساکولنت به دلیل نگهداری آسان هم مناسب داخل منزل و هم مناسب بالکن و فضای آزاد است. تکثیر و هرس کراسولا برای رسیدن به فرم دلخواه به راحتی انجام می‌شود  که یکی دیگر از مزیت های آن است. کراسولا برگ های گوشتی و ساقه های ضخیم دارد که با قرار دادن                       ', 'visible', 60, 1, '2021-05-14 21:08:29', '2021-05-14 21:08:29'),
(12, 'فیکوس', '../../flora/upload/images/product-sample-seablue.jpg', 'فیکوس', 250000, 0, 'گیاه فیکوس (Ficous elastic) با قرار گرفتن در معرض نور غیر مستقیم، خاک مرطوب و هوای مرطوب یک درختچه‌ی با وقار و باشکوه خواهد بود. برگ‌های براق آن با قرار گرفتن در معرض نور کافی، خیلی عالی خودنمایی می‌کند. درختچه Rubber برای سالن‌هایی با سقف بلند مناسب است                      ', 'visible', 30, 1, '2021-05-14 21:18:29', '2021-05-14 21:18:29'),
(13, 'کالاتیا', '../../flora/upload/images/product-sample-purple.jpg', 'کالاتیا', 55000, 0, 'رگه‌های سفید روی برگ‌های سبز شفاف گیاه کالاتیا اوربیفولیا، مانند یک نقاشی زنده خودنمایی می‌کند. گیاه کالاتیا اوربیفولیا در مقایسه با سایر گیاهان کمی به وسواس و دقت نیاز دارد                      ', 'visible', 6, 1, '2021-05-14 21:19:17', '2021-05-14 21:19:17'),
(14, 'استرلیتزیا', '../../flora/upload/images/product-sample-seablue.jpg', 'استرلیتزیا', 60000, 0, 'گیاه پرنده بهشتی یا (Strelitzia Nicolai) فقط با اسمش چقدر به جان و روح آدم می‌نشیند چه برسد به ظاهر زیبایش! درختچه‌ی استریلیزیا در شرایط عالی، تا بیش از ۶ متر رشد می‌کند و نگهداشتن آن را در خانه‌ با چالش روبه رو می‌سازد. اگرچه بیشتر گیاهان با نور مستقیم خورشید                      ', 'visible', 90, 1, '2021-05-14 21:21:26', '2021-05-14 21:21:26'),
(15, 'باکس رز سفید', '../../flora/upload/images/product-sample-coral.jpg', 'باکس رز سفید', 175000, 0, 'همانند بقیه ساکولنت ها، جنس سدوم نیز آب را داخل برگ هایش ذخیره می‌کند. برگ ها به صورت خوشه ای در اطراف یک ساقه ضخیم رشد می‌کنند. در حالی که بعضی از برگ ها کاملا براق هستند، سطح بقیه برگ ها با پرز پوشیده شده اند. انواع مختلفی از نظر اندازه و ظاهر در این جنس ساکولنتی وجود دارد.                                            ', 'visible', 8, 1, '2021-05-14 21:23:04', '2021-05-14 21:23:04');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` int NOT NULL,
  `shipping_type` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `description` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('disable','active') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `shipping_type`, `description`, `status`, `price`) VALUES
(1, 'ارسال فوری', '2ok', 'active', 15000),
(2, 'ارسال عادی', 'shiit', 'active', 6000);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory_product`
--

CREATE TABLE `subcategory_product` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `subcategory_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategory_product`
--

INSERT INTO `subcategory_product` (`id`, `product_id`, `subcategory_id`) VALUES
(5, 5, 6),
(6, 6, 3),
(7, 7, 4),
(8, 8, 5),
(9, 9, 5),
(10, 10, 6),
(11, 11, 3),
(12, 12, 5),
(13, 13, 6),
(14, 14, 7),
(15, 15, 8);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visibility` enum('visible','hide') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'visible',
  `creator_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `visibility`, `creator_id`, `created_at`, `updated_at`) VALUES
(3, 4, 'ساکولنت', 'visible', 1, '2021-05-14 14:34:08', '2021-05-14 14:34:08'),
(4, 5, 'درخت میوه', 'visible', 1, '2021-05-14 19:53:33', '2021-05-14 19:53:33'),
(5, 5, 'درختچه', 'visible', 1, '2021-05-14 19:54:10', '2021-05-14 19:54:10'),
(6, 3, 'آویز', 'visible', 1, '2021-05-14 19:55:57', '2021-05-14 19:55:57'),
(7, 3, 'گلدانی', 'visible', 1, '2021-05-14 21:20:26', '2021-05-14 21:20:26'),
(8, 6, 'باکس گل', 'visible', 1, '2021-05-14 21:21:56', '2021-05-14 21:21:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `FName` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `LName` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_varified` enum('none','done') COLLATE utf8mb4_unicode_ci NOT NULL,
  `register_code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FName`, `LName`, `phone`, `password`, `email`, `is_varified`, `register_code`, `created_at`, `updated_at`) VALUES
(9, 'arash', 'abedi', '09215919027', NULL, 'arash078insta@gmail.com', 'done', 'expired', '2021-05-17 13:50:18', '2021-05-17 13:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `users_address`
--

CREATE TABLE `users_address` (
  `id` int NOT NULL,
  `user_phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` int NOT NULL,
  `floor` int NOT NULL,
  `postal_code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_explain` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_address`
--

INSERT INTO `users_address` (`id`, `user_phone`, `address`, `unit`, `floor`, `postal_code`, `title`, `address_explain`, `created_at`, `updated_at`) VALUES
(1, '09215919027', 'مازندران، قائم شهر، میدان طالقانی، قائمشهر', 4, 2, '125424', 'ربات دانلود آهنگ', '', '2021-05-22 15:32:15', '2021-05-22 15:32:15'),
(6, '09215919027', 'مازندران، قائم شهر، میدان طالقانی، قائمشهرغغع', 8, 2, '125424', 'test111', '', '2021-05-22 16:15:34', '2021-05-22 16:15:34'),
(7, '09215919027', 'rrrr', 5, 4, '5642', 'olo', 'oooo', '2021-05-24 12:59:07', '2021-05-24 12:59:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_product`
--
ALTER TABLE `category_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory_product`
--
ALTER TABLE `subcategory_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_address`
--
ALTER TABLE `users_address`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `category_product`
--
ALTER TABLE `category_product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategory_product`
--
ALTER TABLE `subcategory_product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users_address`
--
ALTER TABLE `users_address`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
