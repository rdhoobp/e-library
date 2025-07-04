-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jul 2025 pada 05.18
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-library`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL,
  `sinopsis` text NOT NULL,
  `author` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `cover` varchar(250) NOT NULL,
  `pdf` varchar(250) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `hit_counter` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `book`
--

INSERT INTO `book` (`book_id`, `title`, `deskripsi`, `sinopsis`, `author`, `publisher`, `genre_id`, `isbn`, `cover`, `pdf`, `created_at`, `updated_at`, `hit_counter`) VALUES
(1, 'Laut Bercerita', 'Jakarta, Maret 1998\r\nDi sebuah senja, di sebuah rumah susun di Jakarta, mahasiswa bernama Biru Laut disergap empat lelaki tak dikenal. Bersama kawan-kawannya, Daniel Tumbuan, Sunu Dyantoro, Alex Perazon, dia dibawa ke sebuah tempat yang tak dikenal. Berbulan-bulan mereka disekap, diinterogasi, dipukul, ditendang, digantung, dan disetrum agara bersedia menjawab satu pertanyaan penting: siapakah yang berdiri di balik gerakan aktivis dan mahasiswa saat itu.\r\n\r\nJakarta, Juni 1998\r\nKeluarga Arya Wibisono, seperti biasa, pada hari Minggu sore memasak bersama, menyediakan makanan kesukaan Biru Laut. Sang ayah akan meletakkan satu piring untuk dirinya, satu piring untuk sang ibu, Biru Laut, dan satu piring untuk si bungsu Asmara Jati. Mereka duduk menanti dan menanti. Tapi Biru Laut tak kunjung muncul.\r\n\r\nJakarta, 2000\r\nAsmara Jati, adik Biru Laut, beserta Tim Komisi Orang Hilang yang dipimpin Aswin Pradana mencoba mencari jejak mereka yang hilang serta merekam dan mempelajari testimoni mereka yang kembali. Anjani, kekasih Laut, para orangtua dan istri aktivis yang hilang menuntut kejelasan tentang anggota keluarga mereka. Sementara Biru Laut, dari dasar laut yang sunyi bercerita kepada kita, kepada dunia tentang apa yang terjadi pada dirinya dan kawan-kawannya.\r\n\r\nLaut Bercerita, novel terbaru Leila S. Chudori, bertutur tentang kisah keluarga yang kehilangan, sekumpulan sahabat yang merasakan kekosongan di dada, sekelompok orang yang gemar menyiksa dan lancar berkhianat, sejumlah keluarga yang mencari kejelasan makam anaknya, dan tentang cinta yang tak akan luntur.', 'Diceritakan dari sudut pandang Biru Laut. Ia adalah seorang mahasiswa program studi Sastra Inggris di Universitas Gadjah Mada, Yogyakarta.\r\n\r\nLaut memiliki ketertarikan terhadap dunia sastra dan tulisan karena turun dari ayahnya yang merupakan seorang wartawan Harian Solo. Laut memiliki banyak koleksi buku sastra klasik, baik dalam bahasa Indonesia maupun bahasa Inggris.\r\n\r\nSaat itu, beberapa buku sempat dilarang peredarannya oleh pemerintah karena dianggap membahayakan, termasuk buku-buku karya penulis Pramoedya Ananta Toer.\r\n\r\nRasa penasaran Laut terhadap buku karya Pramoedya membuatnya nekat untuk memfotokopi buku-buku tersebut secara diam-diam.\r\n\r\nDi tempat fotokopi langganannya, Laut bertemu dengan Kasih Kinanti. Ia adalah senior Fakultas Politik yang memiliki minat bacaan yang sama dengan Laut.\r\n\r\nPertemuannya dengan Kinan, memperkenalkan Laut pada organisasi Winatra. Dari organisasi ini Laut semakin aktif dalam kegiatan diskusi buku bersama anggota lainnya.\r\n\r\nTidak hanya membahas buku-buku berhaluan \"kiri\", organisasi Winatra sering melakukan kegiatan aktivis dan bahkan sempat merencanakan sebuah pergerakan untuk terbebas dari rezim baru dan melawan doktrin pemerintah.', 'Leila S. Chudori', 'Kepustakaan Populer Gramedia', 4, '9786024246945', 'laut-bercerita-leila-s-chudori.jpg', 'Laut_Bercerita.pdf', '2025-06-23 02:09:28', NULL, 9235),
(2, 'Atomic Habits', '', '', 'James Clear', 'Kepustakaan Populer Gramedia', 1, '9780593189641', 'atomic-habits-james-clear.jpg', 'none', '2025-06-23 06:06:19', NULL, 343),
(3, 'The Psychology of Money', '', '', 'Morgan Housel', 'Kepustakaan Populer Gramedia', 1, '9786238371044', 'the-psychology-of-money-morgan-housel.jpg', 'none', '2025-06-23 06:16:01', NULL, 223),
(4, 'Sisi Tergelap Surga', '', '', 'Brian Khrisna', 'Kepustakaan Populer Gramedia', 1, '9786020674384', 'sisi-tergelap-surga-brian-khrisna.jpg', 'none', '2025-06-23 06:26:34', NULL, 524),
(5, 'Teka Teki Rumah Aneh', '', '', 'Uketsu', 'Kepustakaan Populer Gramedia', 1, '9786020669960', 'teka-teki-rumah-aneh-uketsu.jpg', 'none', '2025-06-23 07:12:27', NULL, 856),
(6, 'Ruri Dragon 01', '', '', 'Masaoki Shindo', 'Kepustakaan Populer Gramedia', 1, '9786230316791', 'ruri-dragon-01-masaoki-shindo.jpg', 'none', '2025-06-23 07:16:07', NULL, 10240),
(7, 'BEYOND AVERAGE', '', '', 'Kun Wahyu Wardana', 'Kepustakaan Populer Gramedia', 1, '9786020681580', 'beyond-average-kun-wahyu-wardana.jpg', 'none', '2025-06-23 07:25:32', NULL, 253),
(8, 'Dompet Ayah Sepatu Ibu', '', '', 'J.S Khairen', 'Kepustakaan Populer Gramedia', 1, '9786020530222', 'dompet-ayah-sepatu-ibu-j-s-khairen.jpg', 'none', '2025-06-23 07:28:30', NULL, 764),
(9, 'Naruto Bind Up Edition 17', '', '', 'MASASHI KISHIMOTO', 'Kepustakaan Populer Gramedia', 1, '9786230069765', 'naruto-bind-up-edition-17-masashi-kishimoto.jpg', 'none', '2025-06-23 07:33:06', NULL, 856);

-- --------------------------------------------------------

--
-- Struktur dari tabel `genre`
--

CREATE TABLE `genre` (
  `genre_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `genre`
--

INSERT INTO `genre` (`genre_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Fantasi', 'Fantasi adalah bleble ble', '2025-06-24 14:24:06', '2025-06-24 14:24:06'),
(2, 'Distopia', 'dasdasd', '2025-06-24 14:24:44', '2025-06-24 14:24:44'),
(3, 'Horor', NULL, '2025-06-24 14:25:07', '2025-06-24 14:25:07'),
(4, 'Misteri', NULL, '2025-06-24 14:25:30', '2025-06-24 14:25:30'),
(5, 'Romantis', NULL, '2025-06-24 14:28:20', '2025-06-24 14:28:20'),
(6, 'Fiksi Sejarah', NULL, '2025-06-24 14:29:36', '2025-06-24 14:29:36'),
(7, 'Fiksi Ilmiah', NULL, '2025-06-24 14:30:17', '2025-06-24 14:30:17'),
(8, 'Paranormal', NULL, '2025-06-24 14:31:05', '2025-06-24 14:31:05'),
(9, 'Petualangan', NULL, '2025-06-24 14:31:56', '2025-06-24 14:31:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) NOT NULL,
  `quote` varchar(255) NOT NULL,
  `author` varchar(255) DEFAULT NULL,
  `active` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `quotes`
--

INSERT INTO `quotes` (`id`, `quote`, `author`, `active`) VALUES
(1, 'Masaklah Kode Sebelum Kamu Dimasak Kode', 'Raditya Abib S.', 0),
(2, 'Besok Mungkin Kita Sampai', 'Hindia', 1),
(3, 'dsadasdsadas', 'JUAWA', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `role` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `name`, `email`, `password`, `img`, `role`, `created_at`, `updated_at`) VALUES
(8, 'admin', 'Raditya Abib Shanau', 'radityaabib511@gmail.com', '$2y$10$anKkCzzJUGv/kKSTYMR.sezXfkwoiVq9MUVzSYq05Ws5YOmfnTHn.', '1751586449_c3bad88586d7b8b581bd.jpg', 1, '2025-07-04 02:11:19', '2025-07-03 19:06:19'),
(11, 'maximus', 'Maximusssss', 'maximus@gmail.com', '$2y$10$Cl.vHzumJIMGmox71m4lUudXy7RmsdEp9rs/jvveSb5EBMLFGIM.K', 'download.jpg', 0, '2025-07-03 19:03:36', '2025-07-03 21:51:52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`),
  ADD UNIQUE KEY `isbn` (`isbn`);

--
-- Indeks untuk tabel `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`genre_id`);

--
-- Indeks untuk tabel `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `genre`
--
ALTER TABLE `genre`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
