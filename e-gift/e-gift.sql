-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Apr 2021 pada 10.43
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-gift`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_barang`
--

CREATE TABLE `data_barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_barang`
--

INSERT INTO `data_barang` (`id`, `nama`, `harga`, `stok`, `gambar`, `deskripsi`) VALUES
(1, 'Brem', 17000, 24, 'item1.jpg', 'Brem adalah makanan yang berasal dari sari ketan yang dimasak dan dikeringkan, merupakan hasil dari fermentasi ketan hitam yang diambil sarinya saja yang kemudian diendapkan dalam waktu sekitar sehari semalam.'),
(2, 'Sambal Pecel', 20000, 14, 'item2.jpg', 'Sambal pecel atau sambel pecel merupakan bumbu makanan yang dibuat dari kacang tanah, cabai, gula merah, bawang putih, daun jeruk nipis, buah asam dan garam. Sambal pecel digunakan untuk bumbu makanan yang dilengkapi dengan sayuran dan beberapa lauk tradisional seperti tempe, tahu, peyek, Kering, dan lauk lainnya.'),
(3, 'Madumongso', 18900, 22, 'item3.jpg', 'Madumongso adalah makanan ringan asal Ponorogo. Makanan ringan ini terbuat dari ketan hitam sebagai bahan dasarnya. Rasanya asam bercampur manis karena ketan hitam sebelumnya diolah dahulu menjadi tapai. '),
(4, 'Pot sabut kelapa Wijaya Craft', 43000, 34, 'item4.jpg', 'Port sabut kelapa dengan kualitas bahan yang terjamin. Bisa digunakan untuk menggantung tanaman seperti anggrek.'),
(5, 'Kerupuk beras', 1500, 85, 'item5.jpg', 'Kerupuk beras memang menjadi salah satu jenis kerupuk yang sangat digemari masyarakat. Kerupuk beras sendiri dibuat dari sisa nasi, namun meski begitu rasanya sangatlah lezat. Rasa kerupuk beras yang gurih, renyah dan asin membuat kerupuk ini disukai bagi banyak orang.'),
(6, 'Rengginang', 2400, 54, 'item6.jpg', 'Rengginang adalah sejenis kerupuk tebal yang terbuat dari beras ketan yang dibentuk bulat dan dikeringkan dengan cara dijemur di bawah panas matahari lalu digoreng panas dalam minyak goreng.'),
(7, 'Pisang Bolen', 5600, 26, 'item7.jpg', 'Pisang bolen adalah suatu hidangan ringan berbahan baku pisang yang dilapisi gulungan lembar-lembar adonan pastri dan kemudian digoreng dengan minyak. Hidangan ini merupakan variasi dalam pengolahan dari pisang goreng.'),
(8, 'Kopi Kare', 15000, 74, 'item8.jpg', 'Kopi Kare, Kopi Khas Madiun yang Ditanam dan Diproduksi di Lereng Gunung Wilis. Kopi Kare menjadi salah satu kopi khas di Madiun yang ditanam dan diproduksi langsung di lereng Gunung Wilis.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id` int(11) NOT NULL,
  `nama_pembeli` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jumlah` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id`, `nama_pembeli`, `alamat`, `jumlah`, `id_barang`, `waktu`) VALUES
(5, 'fajri', 'jawa barat, indonesia', 2, 6, '2021-04-30');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
