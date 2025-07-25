-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 25, 2025 at 08:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_game_budaya`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `jobs`
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
-- Table structure for table `job_batches`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_07_01_164343_create_questions_table', 1),
(5, '2025_07_01_164440_create_scores_table', 1),
(6, '2025_07_21_124902_add_description_to_questions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) NOT NULL,
  `question_text` text NOT NULL,
  `correct_answer` varchar(255) NOT NULL,
  `options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`options`)),
  `clue` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `category`, `question_text`, `correct_answer`, `options`, `clue`, `description`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'Makanan Khas', 'Makanan khas dari Yogyakarta yang terbuat dari nangka muda dan dimasak dengan santan adalah...', 'Gudeg', '[\"Gudeg\",\"Rawon\",\"Karedok\",\"Opor Ayam\",\"Sate Klathak\"]', 'Sering disebut juga sebagai \"nangka manis\".', 'Gudeg adalah makanan khas Yogyakarta yang terbuat dari nangka muda yang dimasak dengan santan dan berbagai rempah-rempah. Gudeg memiliki rasa manis dan biasanya disajikan dengan nasi, ayam kampung, telur, tahu, tempe, dan sambal krecek.', 'gudeg.jpeg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(2, 'Makanan Khas', 'Hidangan daging sapi yang dimasak dalam waktu lama dengan rempah-rempah hingga kering dan menjadi ikon kuliner dari Padang adalah...', 'Rendang', '[\"Rendang\",\"Gulai\",\"Semur\",\"Dendeng Balado\",\"Asam Padeh\"]', 'Pernah dinobatkan sebagai makanan terlezat di dunia.', 'Rendang adalah masakan daging sapi khas Minangkabau yang dimasak dengan santan dan campuran rempah-rempah khas Indonesia. Proses memasaknya lama hingga kuahnya mengering dan bumbunya meresap sempurna ke dalam daging.', 'rendang.jpeg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(3, 'Makanan Khas', 'Makanan berkuah hitam dari Jawa Timur yang menggunakan \'kluwek\' sebagai bumbu utamanya adalah...', 'Rawon', '[\"Rawon\",\"Soto\",\"Sop Buntut\",\"Soto Betawi\",\"Brongkos\"]', 'Warnanya yang gelap menjadi ciri khas utamanya.', 'Rawon adalah sup daging sapi khas Jawa Timur yang berwarna hitam pekat karena menggunakan kluwek sebagai bumbu utama. Rawon biasanya disajikan dengan nasi, tauge, telur asin, dan sambal.', 'rawon.jpeg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(4, 'Makanan Khas', 'Makanan khas Palembang yang terbuat dari ikan dan sagu, biasanya disajikan dengan kuah cuka yang pedas adalah...', 'Pempek', '[\"Pempek\",\"Otak-otak\",\"Siomay\",\"Tekwan\",\"Laksan\"]', 'Sering dimakan bersama mi kuning dan potongan timun.', 'Pempek adalah makanan khas Palembang yang terbuat dari daging ikan yang digiling halus dan dicampur dengan tepung sagu. Pempek disajikan dengan kuah cuka yang asam, manis, dan pedas, serta pelengkap seperti mi kuning dan timun.', 'pempek.jpeg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(5, 'Makanan Khas', 'Sate yang terkenal dari Madura biasanya terbuat dari daging...', 'Ayam', '[\"Ayam\",\"Kambing\",\"Sapi\",\"Sate Lilit\",\"Sate Maranggi\"]', 'Disajikan dengan bumbu kacang yang kental dan lontong.', 'Sate ayam Madura adalah sate khas dari Madura yang menggunakan daging ayam yang dipotong kecil-kecil, ditusuk, dan dibakar. Sate ini disajikan dengan bumbu kacang yang kental, kecap manis, dan lontong.', 'sate_ayam.jpeg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(6, 'Makanan Khas', 'Nasi yang dibungkus daun pisang lalu dibakar, dan merupakan makanan khas Sunda adalah...', 'Nasi Bakar', '[\"Nasi Bakar\",\"Nasi Uduk\",\"Nasi Kuning\",\"Nasi Liwet\",\"Nasi Timbel\"]', 'Aroma daun pisang yang terbakar sangat kuat.', 'Nasi bakar adalah nasi yang dibumbui dan dicampur dengan lauk seperti ayam, ikan, atau teri, kemudian dibungkus daun pisang dan dibakar. Proses pembakaran memberikan aroma khas daun pisang yang harum.', 'nasi_bakar.jpeg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(7, 'Makanan Khas', 'Hidangan mie dari Aceh yang disajikan dengan kuah kari yang kental dan pedas adalah...', 'Mie Aceh', '[\"Mie Aceh\",\"Mie Jawa\",\"Mie Kocok\",\"Mie Gomak\",\"Mie Celor\"]', 'Bisa disajikan goreng, tumis, atau dengan kuah.', 'Mie Aceh adalah mie kuning tebal khas Aceh yang disajikan dengan kuah kari pedas dan kental, biasanya berisi daging sapi, kambing, atau seafood. Mie Aceh dapat disajikan goreng, tumis, atau berkuah.', 'mie_aceh.jpeg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(8, 'Makanan Khas', 'Makanan khas Betawi yang berupa kerak telur yang dicampur dengan ebi dan bawang goreng adalah...', 'Kerak Telor', '[\"Kerak Telor\",\"Martabak\",\"Serabi\",\"Gado-gado\",\"Nasi Ulam\"]', 'Sering ditemukan saat perayaan ulang tahun Jakarta.', 'Kerak telor adalah makanan tradisional Betawi yang terbuat dari beras ketan, telur ayam atau bebek, ebi (udang kering), dan bawang goreng. Kerak telor dimasak di atas tungku arang hingga bagian bawahnya garing.', 'kerak_telor.jpeg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(9, 'Makanan Khas', 'Bubur khas dari Manado yang berisi campuran berbagai sayuran dan umbi-umbian adalah...', 'Tinutuan', '[\"Tinutuan\",\"Bubur Ayam\",\"Bubur Sumsum\",\"Bubur Kampiun\",\"Bubur Pedas\"]', 'Juga dikenal dengan sebutan Bubur Manado.', 'Tinutuan atau Bubur Manado adalah bubur khas Sulawesi Utara yang terbuat dari campuran beras, labu kuning, singkong, jagung, dan berbagai sayuran hijau. Biasanya disajikan dengan sambal dan ikan asin.', 'tinutuan.jpeg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(10, 'Makanan Khas', 'Ayam betutu adalah masakan ayam utuh yang kaya rempah, berasal dari daerah...', 'Bali', '[\"Bali\",\"Lombok\",\"Jawa\",\"Ayam Taliwang\",\"Ayam Pop\"]', 'Pulau ini terkenal dengan sebutan Pulau Dewata.', 'Ayam betutu adalah masakan khas Bali berupa ayam utuh yang dibumbui dengan rempah-rempah khas Bali, lalu dibungkus daun pisang dan dipanggang atau dikukus hingga empuk dan bumbunya meresap.', 'ayam_betutu.jpeg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(11, 'Tarian & Kesenian', 'Tarian yang berasal dari Aceh dan menampilkan kekompakan gerakan tangan ribuan penari pria adalah...', 'Tari Saman', '[\"Tari Saman\",\"Tari Piring\",\"Tari Kecak\",\"Tari Seudati\",\"Tari Guel\"]', 'Tidak menggunakan alat musik, hanya tepukan tangan dan dada.', 'Tari Saman adalah tari tradisional Aceh yang dilakukan oleh sekelompok pria dengan gerakan cepat dan kompak. Tarian ini biasanya diiringi dengan nyanyian dan tepukan tangan.', 'tari_saman.jpeg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(12, 'Tarian & Kesenian', 'Tarian dari Bali yang menceritakan kisah Ramayana dan diiringi oleh suara \"cak-cak-cak\" dari para penarinya adalah...', 'Tari Kecak', '[\"Tari Kecak\",\"Tari Barong\",\"Tari Pendet\",\"Tari Janger\",\"Tari Sanghyang\"]', 'Sering dipentaskan saat matahari terbenam di Uluwatu.', 'Tari Kecak adalah tari tradisional Bali yang menceritakan kisah Ramayana. Tarian ini unik karena tidak menggunakan alat musik, melainkan hanya diiringi suara \"cak-cak-cak\" dari para penarinya.', 'tari_kecak.jpeg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(13, 'Tarian & Kesenian', 'Kesenian wayang yang menggunakan boneka kayu tiga dimensi dan berasal dari Jawa Barat adalah...', 'Wayang Golek', '[\"Wayang Golek\",\"Wayang Kulit\",\"Wayang Beber\",\"Wayang Klitik\",\"Wayang Potehi\"]', 'Dalangnya menggunakan bahasa Sunda.', 'Wayang Golek adalah seni pertunjukan wayang dari Jawa Barat yang menggunakan boneka kayu tiga dimensi. Pertunjukan ini biasanya mengangkat cerita-cerita dari Mahabharata dan Ramayana.', 'wayang_golek.jpeg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(14, 'Tarian & Kesenian', 'Tari dari Minangkabau yang menggunakan piring sebagai properti utamanya adalah...', 'Tari Piring', '[\"Tari Piring\",\"Tari Payung\",\"Tari Indang\",\"Tari Pasambahan\",\"Tari Randai\"]', 'Penari tidak boleh menjatuhkan properti yang dipegangnya.', 'Tari Piring adalah tari tradisional Minangkabau yang menggunakan piring sebagai properti utama. Tarian ini biasanya dibawakan oleh sekelompok penari wanita yang mengenakan pakaian adat Minangkabau.', 'tari_piring.jpeg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(15, 'Tarian & Kesenian', 'Pertunjukan seni dari Jawa Timur yang menampilkan topeng singa raksasa dan diiringi musik gamelan adalah...', 'Reog', '[\"Reog\",\"Kuda Lumping\",\"Debus\",\"Jaranan\",\"Barongan\"]', 'Berasal dari daerah Ponorogo.', 'Reog adalah seni pertunjukan tradisional dari Ponorogo, Jawa Timur, yang menampilkan topeng singa raksasa dan diiringi musik gamelan. Pertunjukan ini biasanya menceritakan tentang kisah perjuangan melawan penjajah.', 'reog_ponorogo.jpeg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(16, 'Tarian & Kesenian', 'Tarian penyambutan yang paling tua di Bali dan biasanya dipentaskan untuk menyambut tamu agung adalah...', 'Tari Pendet', '[\"Tari Pendet\",\"Tari Legong\",\"Tari Janger\",\"Tari Gambuh\",\"Tari Rejang\"]', 'Penari membawa bokor berisi bunga untuk ditaburkan.', 'Tari Pendet adalah tari sambutan tradisional Bali yang biasanya dibawakan oleh para penari wanita. Tarian ini menggambarkan rasa syukur dan penghormatan kepada tamu yang datang.', 'tari_pendet.jpeg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(17, 'Tarian & Kesenian', 'Seni bela diri asli Indonesia yang diakui oleh UNESCO sebagai warisan budaya takbenda adalah...', 'Pencak Silat', '[\"Pencak Silat\",\"Karate\",\"Taekwondo\",\"Tarung Derajat\",\"Silek\"]', 'Memiliki banyak aliran di berbagai daerah.', 'Pencak Silat adalah seni bela diri tradisional Indonesia yang menggabungkan antara seni bela diri, seni tari, dan seni musik. Setiap daerah di Indonesia memiliki aliran dan gaya pencak silat yang berbeda-beda.', 'pencak_silat.jpeg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(18, 'Tarian & Kesenian', 'Tarian dari Betawi yang gerakannya terinspirasi dari silat dan sering ditampilkan dalam acara pernikahan adalah...', 'Tari Topeng Betawi', '[\"Tari Topeng Betawi\",\"Tari Yapong\",\"Tari Cokek\",\"Ondel-ondel\",\"Lenong\"]', 'Menggunakan topeng (kedok) sebagai ciri khasnya.', 'Tari Topeng Betawi adalah tari tradisional dari Betawi yang menggunakan topeng sebagai ciri khasnya. Tarian ini biasanya dibawakan dalam acara-acara tertentu seperti pernikahan, khitanan, dan acara adat lainnya.', 'tari_topeng.jpeg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(19, 'Tarian & Kesenian', 'Kesenian drama tari tradisional dari Jawa yang menceritakan kisah-kisah Panji adalah...', 'Wayang Wong', '[\"Wayang Wong\",\"Ketoprak\",\"Ludruk\",\"Sendratari\",\"Langendriyan\"]', '\'Wong\' dalam bahasa Jawa berarti orang.', 'Wayang Wong adalah seni pertunjukan drama tari tradisional dari Jawa yang menceritakan kisah-kisah Panji. Pertunjukan ini melibatkan penari, pemusik, dan dalang yang mengendalikan wayang.', 'wayang_wong.jpg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(20, 'Tarian & Kesenian', 'Tarian pergaulan dari Papua yang gerakannya sangat energik dan ceria adalah...', 'Tari Yospan', '[\"Tari Yospan\",\"Tari Sajojo\",\"Tari Perang\",\"Tari Suanggi\",\"Tari Selamat Datang\"]', 'Gabungan dari dua tarian, Yosim dan Pancar.', 'Tari Yospan adalah tari pergaulan khas Papua yang menggabungkan gerakan tari Yosim dan Pancar. Tarian ini biasanya dibawakan oleh sekelompok pemuda-pemudi dengan gerakan yang energik dan ceria.', 'tari_yospan.jpg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(21, 'Pahlawan Nasional', 'Pahlawan wanita dari Aceh yang memimpin perang gerilya melawan Belanda setelah suaminya gugur adalah...', 'Cut Nyak Dien', '[\"Cut Nyak Dien\",\"R.A. Kartini\",\"Dewi Sartika\",\"Cut Meutia\",\"Laksamana Malahayati\"]', 'Suaminya bernama Teuku Umar.', 'Cut Nyak Dien adalah pahlawan wanita asal Aceh yang terkenal karena keberaniannya memimpin perang melawan Belanda. Ia adalah istri dari Teuku Umar, seorang pahlawan Aceh lainnya.', 'cut_nyak_dien.jpeg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(22, 'Pahlawan Nasional', 'Pahlawan yang memimpin perlawanan besar di Jawa Tengah melawan penjajah Belanda, dikenal dengan sebutan Perang Jawa, adalah...', 'Pangeran Diponegoro', '[\"Pangeran Diponegoro\",\"Sultan Hasanuddin\",\"Tuanku Imam Bonjol\",\"Sentot Alibasyah\",\"Kyai Mojo\"]', 'Menggunakan taktik gerilya dari markasnya di Gua Selarong.', 'Pangeran Diponegoro adalah pahlawan nasional Indonesia yang terkenal karena perannya dalam Perang Jawa melawan penjajah Belanda. Ia menggunakan taktik gerilya dalam perjuangannya dan berhasil mengalahkan Belanda dalam beberapa pertempuran.', 'pangeran_diponegoro.jpg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(23, 'Pahlawan Nasional', 'Pahlawan proklamator kemerdekaan Indonesia yang juga merupakan presiden pertama RI adalah...', 'Soekarno', '[\"Soekarno\",\"Mohammad Hatta\",\"Sutan Sjahrir\",\"Tan Malaka\",\"Supomo\"]', 'Dikenal dengan julukan \"Bung Karno\".', 'Soekarno adalah pahlawan nasional Indonesia yang dikenal sebagai proklamator kemerdekaan Indonesia bersama Mohammad Hatta. Ia juga merupakan presiden pertama Republik Indonesia.', 'soekarno.jpg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(24, 'Pahlawan Nasional', 'Pahlawan wanita dari Jepara yang memperjuangkan emansipasi dan pendidikan bagi perempuan adalah...', 'R.A. Kartini', '[\"R.A. Kartini\",\"Martha Christina Tiahahu\",\"Nyi Ageng Serang\",\"Dewi Sartika\",\"Rasuna Said\"]', 'Kumpulan suratnya dibukukan dengan judul \"Habis Gelap Terbitlah Terang\".', 'R.A. Kartini adalah pahlawan nasional Indonesia yang dikenal sebagai pelopor emansipasi wanita dan pendidikan bagi perempuan. Ia adalah penulis surat-surat yang kemudian dibukukan dalam buku \"Habis Gelap Terbitlah Terang\".', 'ra_kartini.jpg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(25, 'Pahlawan Nasional', 'Pahlawan dari Maluku yang terkenal dengan perlawanannya merebut Benteng Duurstede adalah...', 'Kapitan Pattimura', '[\"Kapitan Pattimura\",\"Silas Papare\",\"Pangeran Antasari\",\"Sultan Nuku\",\"Thomas Pattiwwail\"]', 'Nama aslinya adalah Thomas Matulessy.', 'Kapitan Pattimura adalah pahlawan nasional Indonesia yang berasal dari Maluku. Ia terkenal karena perlawananannya terhadap penjajahan Belanda dan berhasil merebut Benteng Duurstede.', 'kapitan_pattimura.jpeg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(26, 'Pahlawan Nasional', 'Pahlawan dari Sulawesi Selatan yang dijuluki \"Ayam Jantan dari Timur\" karena keberaniannya melawan VOC adalah...', 'Sultan Hasanuddin', '[\"Sultan Hasanuddin\",\"Sultan Agung\",\"Sultan Iskandar Muda\",\"Arung Palakka\",\"Sultan Ageng Tirtayasa\"]', 'Raja dari Kerajaan Gowa-Tallo.', 'Sultan Hasanuddin adalah pahlawan nasional Indonesia yang berasal dari Sulawesi Selatan. Ia dikenal sebagai raja yang berani melawan penjajahan VOC dan memperjuangkan kemerdekaan Indonesia.', 'sultan_hasanuddin.webp', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(27, 'Pahlawan Nasional', 'Jenderal Besar yang memimpin perang gerilya melawan Agresi Militer Belanda dan menjadi Panglima TNI pertama adalah...', 'Jenderal Soedirman', '[\"Jenderal Soedirman\",\"Gatot Soebroto\",\"A.H. Nasution\",\"Oerip Soemohardjo\",\"Bung Tomo\"]', 'Ditandu selama perang karena penyakit paru-paru.', 'Jenderal Soedirman adalah pahlawan nasional Indonesia yang dikenal sebagai Panglima TNI pertama. Ia memimpin perang gerilya melawan Agresi Militer Belanda dan berhasil mempertahankan kemerdekaan Indonesia.', 'jenderal_soedirman.jpg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(28, 'Pahlawan Nasional', 'Siapakah pahlawan pendidikan yang mendirikan Taman Siswa dan terkenal dengan semboyan \"Ing ngarso sung tulodo\"?', 'Ki Hajar Dewantara', '[\"Ki Hajar Dewantara\",\"Douwes Dekker\",\"Cipto Mangunkusumo\",\"Mohammad Sjafei\",\"H.O.S. Cokroaminoto\"]', 'Hari lahirnya diperingati sebagai Hari Pendidikan Nasional.', 'Ki Hajar Dewantara adalah pahlawan nasional Indonesia yang dikenal sebagai pelopor pendidikan di Indonesia. Ia mendirikan Taman Siswa dan memiliki semboyan \"Ing ngarso sung tulodo\" yang berarti \"Di depan memberi contoh\".', 'ki_hajar_dewantara.jpg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(29, 'Tempat Ikonik & Sejarah', 'Candi Buddha terbesar di dunia yang terletak di Magelang, Jawa Tengah, adalah...', 'Candi Borobudur', '[\"Candi Borobudur\",\"Candi Prambanan\",\"Candi Mendut\",\"Candi Kalasan\",\"Candi Pawon\"]', 'Memiliki banyak stupa dan relief Jataka.', 'Candi Borobudur adalah candi Buddha terbesar di dunia yang terletak di Magelang, Jawa Tengah. Candi ini dibangun pada abad ke-8 dan ke-9 Masehi dan memiliki banyak stupa serta relief yang menggambarkan ajaran Buddha.', 'candi_borobudur.jpg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(30, 'Tempat Ikonik & Sejarah', 'Kompleks candi Hindu terbesar di Indonesia yang dipersembahkan untuk Trimurti (Siwa, Wisnu, Brahma) adalah...', 'Candi Prambanan', '[\"Candi Prambanan\",\"Candi Sewu\",\"Candi Plaosan\",\"Candi Ratu Boko\",\"Candi Ijo\"]', 'Terkenal dengan legenda Roro Jonggrang.', 'Candi Prambanan adalah kompleks candi Hindu terbesar di Indonesia yang terletak di Sleman, Yogyakarta. Candi ini dibangun pada abad ke-9 dan dipersembahkan untuk Trimurti, yaitu Siwa, Wisnu, dan Brahma.', 'candi_prambanan.jpg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(31, 'Tempat Ikonik & Sejarah', 'Pulau di Indonesia yang terkenal sebagai habitat asli komodo adalah...', 'Pulau Komodo', '[\"Pulau Komodo\",\"Pulau Bali\",\"Pulau Lombok\",\"Pulau Rinca\",\"Pulau Padar\"]', 'Merupakan bagian dari Taman Nasional di Nusa Tenggara Timur.', 'Pulau Komodo adalah pulau yang terletak di Nusa Tenggara Timur dan merupakan bagian dari Taman Nasional Komodo. Pulau ini terkenal sebagai habitat asli komodo, hewan purba yang hanya ada di Indonesia.', 'pulau_komodo.jpg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(32, 'Tempat Ikonik & Sejarah', 'Monumen di pusat Jakarta yang puncaknya dilapisi emas dan menjadi simbol perjuangan bangsa adalah...', 'Monas', '[\"Monas\",\"Tugu Pahlawan\",\"Patung Dirgantara\",\"Patung Selamat Datang\",\"Tugu Proklamasi\"]', 'Kependekan dari Monumen Nasional.', 'Monas atau Monumen Nasional adalah monumen yang terletak di pusat Jakarta dan menjadi simbol perjuangan bangsa Indonesia. Monumen ini dibangun untuk memperingati perjuangan rakyat Indonesia dalam merebut kemerdekaan.', 'monas.png', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(33, 'Tempat Ikonik & Sejarah', 'Danau vulkanik terbesar di dunia yang terletak di Sumatera Utara adalah...', 'Danau Toba', '[\"Danau Toba\",\"Danau Maninjau\",\"Danau Singkarak\",\"Danau Ranau\",\"Danau Poso\"]', 'Di tengahnya terdapat sebuah pulau besar bernama Samosir.', 'Danau Toba adalah danau vulkanik terbesar di dunia yang terletak di Sumatera Utara. Di tengah danau ini terdapat sebuah pulau besar bernama Samosir yang juga merupakan tempat tinggal suku Batak.', 'danau_toba.png', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(34, 'Tempat Ikonik & Sejarah', 'Gunung di Jawa Timur yang terkenal dengan kawah birunya (blue fire) adalah...', 'Gunung Ijen', '[\"Gunung Ijen\",\"Gunung Bromo\",\"Gunung Semeru\",\"Gunung Raung\",\"Gunung Kelud\"]', 'Tempat penambangan belerang tradisional.', 'Gunung Ijen adalah gunung berapi yang terletak di Jawa Timur dan terkenal dengan kawah birunya yang mengandung belerang. Di sini juga terdapat fenomena alam yang disebut blue fire atau api biru.', 'gunung_ijen.jpg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(35, 'Tempat Ikonik & Sejarah', 'Tempat di Jakarta yang menjadi saksi bisu pembacaan teks proklamasi kemerdekaan Indonesia adalah...', 'Jalan Pegangsaan Timur No. 56', '[\"Jalan Pegangsaan Timur No. 56\",\"Gedung Sate\",\"Istana Merdeka\",\"Gedung Joang 45\",\"Rumah Rengasdengklok\"]', 'Merupakan kediaman pribadi Bung Karno saat itu.', 'Jalan Pegangsaan Timur No. 56 adalah alamat di mana teks proklamasi kemerdekaan Indonesia dibacakan oleh Soekarno dan Mohammad Hatta pada tanggal 17 Agustus 1945. Tempat ini sekarang menjadi museum.', 'proklamasi.jpg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(36, 'Tempat Ikonik & Sejarah', 'Pura suci di Bali yang terletak di tengah danau Beratan, Bedugul, adalah...', 'Pura Ulun Danu Beratan', '[\"Pura Ulun Danu Beratan\",\"Pura Besakih\",\"Pura Tanah Lot\",\"Pura Tirta Empul\",\"Pura Lempuyang\"]', 'Gambarnya pernah ada di uang kertas Rp 50.000.', 'Pura Ulun Danu Beratan adalah pura suci yang terletak di tepi danau Beratan, Bedugul, Bali. Pura ini didedikasikan untuk Dewi Danu, dewi air, dan merupakan salah satu objek wisata terkenal di Bali.', 'pura_ulun_danu.webp', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(37, 'Tempat Ikonik & Sejarah', 'Kerajaan Hindu-Buddha pertama di Nusantara yang diperkirakan berdiri pada abad ke-4 adalah...', 'Kerajaan Kutai', '[\"Kerajaan Kutai\",\"Kerajaan Sriwijaya\",\"Kerajaan Majapahit\",\"Kerajaan Tarumanegara\",\"Kerajaan Salakanagara\"]', 'Bukti keberadaannya adalah prasasti Yupa di Kalimantan Timur.', 'Kerajaan Kutai adalah kerajaan Hindu-Buddha pertama di Nusantara yang diperkirakan berdiri pada abad ke-4 Masehi. Bukti keberadaan kerajaan ini ditemukan melalui prasasti Yupa yang ditemukan di Kalimantan Timur.', 'kerajaan_kutai.webp', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(38, 'Tempat Ikonik & Sejarah', 'Kerajaan maritim besar yang berpusat di Palembang dan menguasai perdagangan di Asia Tenggara adalah...', 'Kerajaan Sriwijaya', '[\"Kerajaan Sriwijaya\",\"Kerajaan Tarumanegara\",\"Kerajaan Mataram Kuno\",\"Kerajaan Medang\",\"Kerajaan Singasari\"]', 'Dikenal sebagai pusat pendidikan agama Buddha.', 'Kerajaan Sriwijaya adalah kerajaan maritim besar yang berpusat di Palembang dan menguasai perdagangan di Asia Tenggara pada abad ke-7 hingga ke-13 Masehi. Kerajaan ini juga dikenal sebagai pusat pendidikan agama Buddha.', 'kerajaan_sriwijaya.jpg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(39, 'Alat Musik & Adat', 'Alat musik dari Jawa Barat yang terbuat dari bambu dan dimainkan dengan cara digoyangkan adalah...', 'Angklung', '[\"Angklung\",\"Suling\",\"Calung\",\"Kolintang\",\"Talempong\"]', 'Satu alat hanya menghasilkan satu nada.', 'Angklung adalah alat musik tradisional dari Jawa Barat yang terbuat dari bambu dan dimainkan dengan cara digoyangkan. Alat musik ini biasanya digunakan dalam pertunjukan seni tradisional Sunda.', 'angklung.jpeg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(40, 'Alat Musik & Adat', 'Seperangkat alat musik gamelan yang berasal dari Jawa dan Bali didominasi oleh instrumen...', 'Logam (perkusi)', '[\"Logam (perkusi)\",\"Dawai (gesek)\",\"Tiup\",\"Bambu\",\"Kulit\"]', 'Instrumennya seperti gong, bonang, dan saron.', 'Gamelan adalah seperangkat alat musik tradisional yang berasal dari Jawa dan Bali. Alat musik ini didominasi oleh instrumen perkusi dari logam seperti gong, bonang, dan saron.', 'gamelan.jpeg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(41, 'Alat Musik & Adat', 'Alat musik petik dari Nusa Tenggara Timur yang terbuat dari daun lontar adalah...', 'Sasando', '[\"Sasando\",\"Kecapi\",\"Sampek\",\"Jap\\u00e9\",\"Gong\"]', 'Bentuknya seperti harpa kecil dengan tabung bambu di tengah.', 'Sasando adalah alat musik petik tradisional dari Nusa Tenggara Timur yang terbuat dari daun lontar. Alat musik ini memiliki bentuk seperti harpa kecil dengan tabung bambu di tengahnya.', 'sasando.jpg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(42, 'Alat Musik & Adat', 'Upacara adat pembakaran jenazah umat Hindu di Bali disebut...', 'Ngaben', '[\"Ngaben\",\"Sekaten\",\"Rambu Solo\",\"Melasti\",\"Galungan\"]', 'Dipercaya dapat menyucikan roh orang yang telah meninggal.', 'Ngaben adalah upacara adat pembakaran jenazah umat Hindu di Bali. Upacara ini dipercaya dapat menyucikan roh orang yang telah meninggal dan membebaskannya dari siklus reinkarnasi.', 'ngaben.jpg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(43, 'Alat Musik & Adat', 'Rumah adat dari Sumatera Barat yang memiliki atap runcing seperti tanduk kerbau adalah...', 'Rumah Gadang', '[\"Rumah Gadang\",\"Rumah Joglo\",\"Rumah Honai\",\"Rumah Bolon\",\"Rumah Limas\"]', 'Rumah bagi masyarakat Minangkabau.', 'Rumah Gadang adalah rumah adat dari Sumatera Barat yang menjadi simbol kebanggaan masyarakat Minangkabau. Rumah ini memiliki atap runcing yang menyerupai tanduk kerbau dan biasanya dihiasi dengan ukiran khas Minangkabau.', 'rumah_gadang.jpg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(44, 'Alat Musik & Adat', 'Upacara pemakaman mewah di Tana Toraja yang bisa berlangsung berhari-hari adalah...', 'Rambu Solo', '[\"Rambu Solo\",\"Tedak Siten\",\"Seren Taun\",\"Ma\'nene\",\"Tiwah\"]', 'Sering melibatkan penyembelihan kerbau sebagai kurban.', 'Rambu Solo adalah upacara pemakaman adat yang dilakukan oleh masyarakat Toraja di Sulawesi Selatan. Upacara ini bisa berlangsung berhari-hari dan sering melibatkan penyembelihan kerbau sebagai kurban.', 'rambu_solo.jpg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(45, 'Alat Musik & Adat', 'Kain tradisional Indonesia yang dibuat dengan teknik pewarnaan menggunakan lilin malam adalah...', 'Batik', '[\"Batik\",\"Tenun\",\"Songket\",\"Ikat\",\"Ulos\"]', 'Diakui UNESCO sebagai warisan budaya dunia.', 'Batik adalah kain tradisional Indonesia yang dibuat dengan teknik pewarnaan menggunakan lilin malam. Motif dan corak batik sangat beragam dan setiap daerah di Indonesia memiliki ciri khas batik masing-masing.', 'batik.png', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(46, 'Pengetahuan Umum', 'Bunga Nasional Indonesia yang dikenal sebagai \"Puspa Bangsa\" adalah...', 'Bunga Melati', '[\"Bunga Melati\",\"Bunga Anggrek\",\"Bunga Rafflesia\",\"Bunga Kenanga\",\"Bunga Sedap Malam\"]', 'Warnanya putih bersih dan berbau sangat harum.', 'Bunga Melati adalah bunga nasional Indonesia yang dikenal sebagai \"Puspa Bangsa\". Bunga ini memiliki warna putih bersih dan harum yang sangat khas.', 'bunga_melati.jpg', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(47, 'Pengetahuan Umum', 'Hewan yang menjadi fauna identitas provinsi Jawa Barat adalah...', 'Macan Tutul Jawa', '[\"Macan Tutul Jawa\",\"Badak Bercula Satu\",\"Anoa\",\"Elang Jawa\",\"Owa Jawa\"]', 'Bukan harimau, tetapi memiliki corak tutul.', 'Macan Tutul Jawa adalah hewan yang menjadi fauna identitas provinsi Jawa Barat. Hewan ini bukan harimau, tetapi memiliki corak tutul yang mirip dengan harimau.', 'macan_tutul_jawa.webp', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(48, 'Pengetahuan Umum', 'Semboyan negara Indonesia, \"Bhinneka Tunggal Ika\", memiliki arti...', 'Berbeda-beda tetapi tetap satu', '[\"Berbeda-beda tetapi tetap satu\",\"Bersatu kita teguh\",\"Maju tak gentar\",\"Satu Nusa Satu Bangsa\",\"Merdeka atau Mati\"]', 'Diambil dari kitab Sutasoma.', 'Bhinneka Tunggal Ika adalah semboyan negara Indonesia yang berarti \"Berbeda-beda tetapi tetap satu\". Semboyan ini diambil dari kitab Sutasoma karya Mpu Tantular.', 'bhinneka_tunggal_ika.webp', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(49, 'Pengetahuan Umum', 'Burung yang menjadi lambang negara Indonesia adalah...', 'Burung Garuda', '[\"Burung Garuda\",\"Burung Cenderawasih\",\"Burung Elang Jawa\",\"Burung Enggang\",\"Burung Merak\"]', 'Mencengkeram pita bertuliskan semboyan negara.', 'Burung Garuda adalah burung yang menjadi lambang negara Indonesia. Burung ini digambarkan sedang mencengkeram pita bertuliskan semboyan negara, \"Bhinneka Tunggal Ika\".', 'garuda.png', '2025-07-21 05:58:30', '2025-07-21 05:58:30'),
(50, 'Pengetahuan Umum', 'Pulau di Indonesia yang dijuluki sebagai \"Paru-paru Dunia\" karena luasnya hutan hujan tropis adalah...', 'Kalimantan', '[\"Kalimantan\",\"Sumatera\",\"Papua\",\"Sulawesi\",\"Jawa\"]', 'Nama lainnya adalah Borneo.', 'Kalimantan adalah pulau di Indonesia yang dijuluki sebagai \"Paru-paru Dunia\" karena luasnya hutan hujan tropis yang ada di pulau ini. Nama lainnya adalah Borneo.', 'kalimantan.jpg', '2025-07-21 05:58:30', '2025-07-21 05:58:30');

-- --------------------------------------------------------

--
-- Table structure for table `scores`
--

CREATE TABLE `scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `score` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scores`
--

INSERT INTO `scores` (`id`, `user_id`, `score`, `created_at`, `updated_at`) VALUES
(1, 1, 10, '2025-07-24 04:50:56', '2025-07-24 04:50:56'),
(2, 1, 130, '2025-07-24 09:03:02', '2025-07-24 09:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Izzat', 'izzatffr12@gmail.com', NULL, '$2y$12$VavzwG/NpzNS2oDkSANJXerPflPWjexSX/zOmBXplLfhZMw6bGmz2', NULL, '2025-07-21 05:59:03', '2025-07-21 05:59:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `scores_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `scores`
--
ALTER TABLE `scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `scores_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
