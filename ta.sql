-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2017 at 06:00 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta`
--

-- --------------------------------------------------------

--
-- Table structure for table `detil_kegiatan`
--

CREATE TABLE `detil_kegiatan` (
  `ID_KEG` varchar(8) NOT NULL,
  `KODE_SKP` varchar(11) NOT NULL,
  `T_KUANTITAS` varchar(15) NOT NULL,
  `T_KUALITAS` varchar(15) NOT NULL,
  `T_WAKTU` varchar(15) NOT NULL,
  `T_BIAYA` varchar(15) NOT NULL,
  `R_KUANTITAS` varchar(15) NOT NULL,
  `R_KUALITAS` varchar(15) NOT NULL,
  `R_WAKTU` varchar(15) NOT NULL,
  `R_BIAYA` varchar(15) NOT NULL,
  `NILAICAPAIAN` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detil_kegiatan`
--

INSERT INTO `detil_kegiatan` (`ID_KEG`, `KODE_SKP`, `T_KUANTITAS`, `T_KUALITAS`, `T_WAKTU`, `T_BIAYA`, `R_KUANTITAS`, `R_KUALITAS`, `R_WAKTU`, `R_BIAYA`, `NILAICAPAIAN`) VALUES
('10101', '2017SKP4', '1', '1', '1', '1', '1', '1', '1', '1', ''),
('10101', '2017SKP5', '5', '5', '5', '5', '0', '0', '0', '0', ''),
('10101', '2017SKP7', '2', '4', '3', '0', '0', '0', '0', '0', ''),
('10101', '2017SKP9', '2', '2', '2', '2', '0', '0', '0', '0', ''),
('10102', '2017SKP10', '5', '7', '3', '4', '0', '0', '0', '0', ''),
('10102', '2017SKP12', '7', '7', '7', '7', '0', '0', '0', '0', ''),
('10102', '2017SKP13', '7', '7', '7', '7', '0', '0', '0', '0', ''),
('10102', '2017SKP14', '3', '3', '3', '3', '3', '3', '3', '3', ''),
('10102', '2017SKP4', '2', '2', '2', '2', '2', '2', '2', '2', ''),
('10103', '2017SKP11', '6', '6', '7', '8', '0', '0', '0', '0', ''),
('10103', '2017SKP15', '1', '2', '12', '0', '1', '1.9', '12', '0', ''),
('10201', '2017SKP5', '5', '5', '5', '5', '0', '0', '0', '0', ''),
('10201', '2017SKP6', '4', '4', '4', '4', '0', '0', '0', '0', ''),
('20101', '2017SKP16', '2', '100', '12', '0', '2', '77', '12', '0', ''),
('20101', '2017SKP17', '2', '100', '12', '0', '1', '78', '12', '0', ''),
('20101', '2017SKP18', '2', '100', '12', '0', '2', '89', '12', '0', ''),
('20101', '2017SKP3', '3', '3', '3', '3', '3', '3', '3', '3', ''),
('20101', '2017SKP5', '4', '4', '4', '4', '0', '0', '0', '0', ''),
('20101', '2017SKP9', '3', '3', '3', '3', '0', '0', '0', '0', ''),
('20201', '2017SKP10', '3', '4', '3', '3', '0', '0', '0', '0', ''),
('20201', '2017SKP11', '7', '8', '8', '8', '0', '0', '0', '0', ''),
('20201', '2017SKP12', '8', '8', '8', '8', '0', '0', '0', '0', ''),
('20201', '2017SKP13', '6', '6', '6', '6', '0', '0', '0', '0', ''),
('20201', '2017SKP14', '6', '6', '6', '6', '0', '0', '0', '0', ''),
('20201', '2017SKP5', '3', '3', '3', '3', '0', '0', '0', '0', ''),
('20201', '2017SKP8', '4', '4', '4', '4', '0', '0', '0', '0', ''),
('203011', '2017SKP6', '3', '3', '3', '3', '0', '0', '0', '0', ''),
('203012', '2017SKP23', '2', '100', '12', '', '2', '78', '12', '', ''),
('203013', '2017SKP22', '2', '100', '12', '0', '2', '90', '12', '0', ''),
('20307', '2017SKP16', '2', '100', '12', '0', '2', '86', '12', '0', ''),
('20307', '2017SKP17', '2', '100', '12', '0', '2', '88', '12', '0', ''),
('20307', '2017SKP18', '2', '100', '12', '0', '3', '90', '11', '0', ''),
('20307', '2017SKP23', '2', '100', '12', '', '2', '86', '12', '', ''),
('20308', '2017SKP22', '2', '100', '12', '0', '2', '90', '12', '0', ''),
('20308', '2017SKP23', '1', '100', '1', '', '1', '45', '1', '', ''),
('302010', '2017SKP5', '7', '7', '7', '7', '0', '0', '0', '0', ''),
('302012', '2017SKP9', '3', '4', '4', '6', '0', '0', '0', '0', ''),
('302014', '2017SKP6', '2', '2', '2', '2', '0', '0', '0', '0', ''),
('302016', '2017SKP11', '3', '4', '4', '5', '0', '0', '0', '0', ''),
('302017', '2017SKP12', '7', '7', '7', '7', '0', '0', '0', '0', ''),
('302017', '2017SKP14', '5', '5', '5', '5', '5', '5', '5', '0', ''),
('30203', '2017SKP13', '9', '9', '9', '9', '0', '0', '0', '0', ''),
('30204', '2016SKP19', '3', '100', '12', '0', '3', '90', '12', '0', ''),
('303010', '2017SKP16', '1', '100', '6', '0', '1', '86', '6', '0', ''),
('303011', '2017SKP20', '2', '100', '12', '0', '0', '0', '0', '0', ''),
('303011', '2017SKP3', '4', '4', '4', '4', '4', '4', '4', '4', ''),
('30302', '2017SKP6', '5', '5', '5', '5', '0', '0', '0', '0', ''),
('30303', '2017SKP10', '8', '5', '6', '3', '0', '0', '0', '0', ''),
('30304', '2017SKP5', '3', '3', '3', '3', '0', '0', '0', '0', ''),
('40101', '2017SKP5', '9', '9', '6', '0', '0', '0', '0', '0', ''),
('40101', '2017SKP6', '5', '5', '5', '5', '0', '0', '0', '0', ''),
('40101', '2017SKP7', '2', '2', '4', '0', '0', '0', '0', '0', ''),
('40102', '2017SKP13', '8', '8', '8', '8', '0', '0', '0', '0', ''),
('40102', '2017SKP3', '6', '6', '6', '6', '2', '2', '2', '2', ''),
('40203', '2017SKP10', '5', '6', '7', '8', '0', '0', '0', '0', ''),
('40203', '2017SKP11', '4', '3', '4', '4', '0', '0', '0', '0', ''),
('40203', '2017SKP14', '4', '4', '4', '4', '0', '0', '0', '0', ''),
('40203', '2017SKP5', '3', '3', '3', '3', '0', '0', '0', '0', ''),
('40204', '2017SKP12', '8', '8', '8', '8', '0', '0', '0', '0', ''),
('40302', '2017SKP9', '3', '5', '4', '8', '0', '0', '0', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `history_pangkat`
--

CREATE TABLE `history_pangkat` (
  `ID_PANGKAT` varchar(8) NOT NULL,
  `TANGGALMULAI` date NOT NULL,
  `USERID` int(11) NOT NULL,
  `ID_H_PANGKAT` int(11) NOT NULL,
  `STATUSPANGKAT` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_pangkat`
--

INSERT INTO `history_pangkat` (`ID_PANGKAT`, `TANGGALMULAI`, `USERID`, `ID_H_PANGKAT`, `STATUSPANGKAT`) VALUES
('10', '2017-05-03', 1, 76, 1),
('10', '2017-05-01', 7, 53, 1),
('10', '2017-05-02', 8, 54, 1),
('10', '2017-05-03', 9, 55, 1),
('10', '2017-05-04', 10, 56, 1),
('10', '2017-05-05', 11, 57, 1),
('10', '2017-05-06', 12, 58, 1),
('10', '2017-05-07', 13, 59, 1),
('10', '2017-05-08', 14, 60, 1),
('10', '2017-05-09', 15, 61, 1),
('10', '2017-05-28', 28, 74, 1),
('13', '2017-05-15', 21, 67, 1),
('13', '2017-05-16', 22, 68, 1),
('13', '2017-05-17', 23, 69, 1),
('13', '2017-05-18', 24, 70, 1),
('13', '2017-05-20', 26, 72, 1),
('13', '2017-05-21', 27, 73, 1),
('17', '2017-05-12', 18, 64, 1),
('17', '2017-05-13', 19, 65, 1),
('17', '2017-05-14', 20, 66, 1),
('6', '2017-05-10', 16, 62, 1),
('6', '2017-05-11', 17, 63, 1),
('6', '2017-07-07', 25, 71, 1),
('6', '2017-06-20', 30, 77, 1),
('9', '2017-05-23', 29, 75, 1);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `ID_JABATAN` varchar(7) NOT NULL,
  `NAMA_JABATAN` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`ID_JABATAN`, `NAMA_JABATAN`) VALUES
('J00', 'Kepala Sekolah'),
('J01', 'Guru Pertama'),
('J02', 'Wakil Kepala Sekolah'),
('J03', 'admin'),
('J04', 'Guru Muda'),
('J05', 'Guru'),
('J08', 'Guru Madya'),
('J09', 'Atasan Penilai'),
('J10', 'Guru Utama');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE `kegiatan` (
  `ID_KEG` varchar(8) NOT NULL,
  `ID_SUBUNSUR` varchar(12) NOT NULL,
  `BUTIR_KEGIATAN` varchar(200) NOT NULL,
  `SATUAN_HASIL` varchar(200) NOT NULL,
  `ANGKA_KREDIT` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan`
--

INSERT INTO `kegiatan` (`ID_KEG`, `ID_SUBUNSUR`, `BUTIR_KEGIATAN`, `SATUAN_HASIL`, `ANGKA_KREDIT`) VALUES
('10101', '101', 'Doktor (S-3)', 'Ijazah', '200'),
('10102', '101', 'Magister (S-2)', 'Ijazah', '150'),
('10103', '101', 'Sarjana (S-1) / Diploma IV', 'Ijazah', '100'),
('10201', '102', 'Pelatihan prajabatan fungsional bagi Guru Calon Pegawai Negeri Sipil / program induksi', 'STTPP', '3'),
('20101', '201', 'Merencanakan dan melaksanakan pembelajaran, mengevaluasi dan menilai hasil pembelajaran, menganalisis hasil pembelajaran, melaksanakan tindak lanjut hasil', 'Laporan Penilaian Kinerja', 'Paket'),
('20201', '202', 'Merencanakan dan melaksanakan pembimbingan, mengevaluasi dan menilai hasil pembimbingan, menganalisis hasil pembimbingan, melaksanakan tindak lanjut hasil pembimbingan', 'Laporan Penilaian Kinerja', 'Paket'),
('20301', '203', 'Menjadi Kepala Sekolah/Madrasah per tahun', 'Laporan Penilaian Kinerja', 'Paket'),
('203010', '203', 'Membimbing guru pemula dalam program induksi', 'Laporan Penilaian Kinerja', 'Paket'),
('203011', '203', 'Membimbing siswa dalam kegiatan ekstrakurikuler', 'Laporan Penilaian Kinerja', 'Paket'),
('203012', '203', 'Menjadi pembimbing pada penyusunan publikasi ilmiah dan karya inovatif', 'Laporan Penilaian Kinerja', 'Paket'),
('203013', '203', 'Melaksanakan pembimbingan pada kelas yang menjadi tanggungjawabnya (khusus Guru Kelas)', 'Laporan Penilaian Kinerja', 'Paket'),
('20302', '203', 'Menjadi Wakil Kepala Sekolah/Madrasah per tahun', 'Laporan Penilaian Kinerja', 'Paket'),
('20303', '203', 'Menjadi ketua program keahlian/program studi atau yang sejenisnya', 'Laporan Penilaian Kinerja', 'Paket'),
('20304', '203', 'Menjadi kepala perpustakaan', 'Laporan Penilaian Kinerja', 'Paket'),
('20305', '203', 'Menjadi kepala laboratorium, bengkel, unit produksi atau yang sejenisnya', 'Laporan Penilaian Kinerja', 'Paket'),
('20306', '203', 'Menjadi pembimbing khusus pada satuan pendidikan yang menyelenggarakan pendidikan inklusi, pendidikan terpadu atau yang sejenisnya.', 'Laporan Penilaian Kinerja', 'Paket'),
('20307', '203', 'Menjadi wali kelas', 'Laporan Penilaian Kinerja', 'Paket'),
('20308', '203', 'Menyusun kurikulum pada satuan pendidikannya', 'Laporan Penilaian Kinerja', 'Paket'),
('20309', '203', 'Menjadi pengawas penilaian dan evaluasi terhadap proses dan hasil belajar.', 'Laporan Penilaian Kinerja', 'Paket'),
('30101', '301', 'Mengikuti diklat fungsional:Lamanya lebih dari 960 jam', '1. Surat tugas  2. Laporan deskripsi hasil pelatihan 3. Sertifikat', '15'),
('301011', '301', 'Kegiatan kolektif lainnya yang sesuai dengan tugas dan kewajiban guruMenjadi pemrasaran/nara sumber pada seminar atau lokakarya ilmiah', 'Surat keterangan dan makalah pemrasaran', '0.5'),
('301012', '301', 'Kegiatan kolektif lainnya yang sesuai dengan tugas dan kewajiban guruMenjadi pemrasaran/nara sumber pada koloqium atau diskusi ilmiah', 'Surat keterangan dan makalah pemrasaran', '0.5'),
('30102', '301', 'Mengikuti diklat fungsional:Lamanya antara 641 s.d 960 jam', '1. Surat tugas  2. Laporan deskripsi hasil pelatihan 3. Sertifikat', '9'),
('30103', '301', 'Mengikuti diklat fungsional:Lamanya antara 481 s.d 640 jam', '1. Surat tugas  2. Laporan deskripsi hasil pelatihan 3.Sertifikat', '6'),
('30104', '301', 'Mengikuti diklat fungsional:Lamanya antara 181 s.d 480 jam', '1. Surat tugas  2. Laporan deskripsi hasil pelatihan 3.', '3'),
('30105', '301', 'Mengikuti diklat fungsional:Lamanya antara 81 s.d 180 jam', '1. Surat tugas  2. Laporan deskripsi hasil pelatihan 3.', '2'),
('30106', '301', 'Mengikuti diklat fungsional:Lamanya antara 30 s.d 80 jam', '1. Surat tugas  2. Laporan deskripsi hasil pelatihan 3.', '1'),
('30107', '301', 'Kegiatan kolektif guru yang meningkatkan kompetensi dan/atau keprofesian guruLokakarya atau kegiatan bersama (seperti kelompok kerja guru) untuk penyusunan perangkat kurikulum dan atau pembelajaran', 'Surat keterangan dan laporan per kegiatan', '0.15'),
('30108', '301', 'keikutsertaan pada kegiatan ilmiah (seminar, kologium dan diskusi panel)Menjadi pembahas pada kegiatan ilmiah', 'Surat keterangan dan laporan per kegiatan', '0.2'),
('30109', '301', 'keikutsertaan pada kegiatan ilmiah (seminar, kologium dan diskusi panel)Menjadi peserta pada kegiatan ilmiah', 'Surat keterangan dan laporan per kegiatan', '0.1'),
('30201', '302', 'Melaksanakan publikasi Ilmiah hasil penelitian atau gagasan ilmu pada bidang pendidikan formal:Membuat karya tulis berupa laporan hasil penelitian pada bidang pendidikan di sekolahnya, diterbitkan/dip', 'Buku', '4'),
('302010', '302', 'Membuat Artikel Ilmiah dalam bidang pendidikan formal dan pembelajaran pada satuan pendidikannya.Membuat Artikel Ilmiah dalam bidang pendidikan formal dan pembelajaran pada satuan pendidikannya dan di', 'Artikel Ilmiah', '0.5'),
('302011', '302', 'Membuat Artikel Ilmiah dalam bidang pendidikan formal dan pembelajaran pada satuan pendidikannya.Membuat Artikel Ilmiah dalam bidang pendidikan formal dan pembelajaran pada satuan pendidikannya dan di', 'Artikel Ilmiah', '1'),
('302012', '302', 'Membuat buku pelajaran per tingkat/buku pendidikan per judul:Buku pelajaran yang lolos penilaian oleh BSNP', 'Buku', '6'),
('302013', '302', 'Membuat buku pelajaran per tingkat/buku pendidikan per judul:Buku pelajaran yang dicetak oleh penerbit dan ber ISBN', 'Buku', '3'),
('302014', '302', 'Membuat buku pelajaran per tingkat/buku pendidikan per judul:Buku pelajaran dicetak oleh penerbit tetapi belum ber-ISBN.', 'Buku', '1'),
('302016', '302', 'Membuat modul/diktat pembelajaran per semester:Digunakan di tingkat Provinsi dengan pengesahan dari Dinas Pendidikan Provinsi.', 'Modul /diktat', '0.2'),
('302017', '302', 'Membuat modul/diktat pembelajaran per semester:Digunakan di tingkat kota/kabupaten dengan pengesahan dari Dinas Pendidikan Kota/Kabupaten.', 'Modul / diktat', '1'),
('302018', '302', 'Membuat modul/diktat pembelajaran per semester:Digunakan di tingkat sekolah/madrasah setempat', 'Modul / diktat', '0.5'),
('302019', '302', 'Membuat buku dalam bidang pendidikan:Buku dalam bidang pendidikan dicetak oleh penerbit dan ber-ISBN.', 'Buku', '3'),
('30202', '302', 'Melaksanakan publikasi Ilmiah hasil penelitian atau gagasan ilmu pada bidang pendidikan formal.Membuat karya tulis berupa laporan hasil penelitian pada bidang pendidikan di sekolahnya, diterbitkan/dip', 'Karya tulis dalam majalah / jurnal ilmiah', '3'),
('302020', '302', 'Membuat buku dalam bidang pendidikan:Buku dalam bidang pendidikan dicetak oleh penerbit tetapi belum ber-ISBN.', 'Buku', '0.5'),
('302021', '302', 'Membuat karya hasil terjemahan yang dinyatakan oleh kepala sekolah/madrasah tiap karya.', 'Karya hasil terjemahan', '1'),
('302022', '302', 'Membuat buku pedoman guru', 'Buku', '0.5'),
('30203', '302', 'Melaksanakan publikasi Ilmiah hasil penelitian atau gagasan ilmu pada bidang pendidikan formal.Membuat karya tulis berupa laporan hasil penelitian pada bidang pendidikan di sekolahnya, diterbitkan/dip', 'Karya tulis dalam majalah / jurnal ilmiah', '2'),
('30204', '302', 'Melaksanakan publikasi Ilmiah hasil penelitian atau gagasan ilmu pada bidang pendidikan formal.Membuat karya tulis berupa laporan hasil penelitian pada bidang pendidikan di sekolahnya, diterbitkan/dip', 'Karya tulis dalam majalah / jurnal ilmiah', '1'),
('30205', '302', 'Melaksanakan publikasi Ilmiah hasil penelitian atau gagasan ilmu pada bidang pendidikan formal.Membuat karya tulis berupa laporan hasil penelitian pada bidang pendidikan di sekolahnya, diseminarkan di', 'Laporan', '4'),
('30206', '302', 'Melaksanakan publikasi Ilmiah hasil penelitian atau gagasan ilmu pada bidang pendidikan formal.Membuat makalah berupa tinjauan ilmiah dalam  bidang pendidikan formal dan pembelajaran pada satuan pendi', 'Makalah', '2'),
('30207', '302', 'Membuat Tulisan Ilmiah Populer di bidang pendidikan formal dan pembelajaran pada satuan pendidikannya.Membuat Artikel Ilmiah Populer di bidang pendidikan formal dan pembelajaran pada satuan pendidikan', 'Artikel Ilmiah', '2'),
('30208', '302', 'Membuat Tulisan Ilmiah Populer di bidang pendidikan formal dan pembelajaran pada satuan pendidikannya.Membuat Artikel Ilmiah Populer di bidang pendidikan formal dan pembelajaran pada satuan pendidikan', 'Artikel Ilmiah', '0.5'),
('30209', '302', 'Membuat Artikel Ilmiah dalam bidang pendidikan formal dan pembelajaran pada satuan pendidikannya.Membuat Artikel Ilmiah dalam bidang pendidikan formal dan pembelajaran pada satuan pendidikannya dan di', 'Artikel Ilmiah', '2'),
('30301', '303', 'Menemukan teknologi tepatgunaKategori Kompleks', 'Hasil karya', '4'),
('303010', '303', 'Membuat alat praktikum:Kategori sederhana', 'Alat Praktik', '2'),
('303011', '303', 'Mengikuti Pengembangan Penyusunan Standar, Pedoman, Soal dan sejenisnyaMengikuti Kegiatan Penyusunan Standar/ Pedoman/ Soal dan sejenisnya pada tingkat nasional.', 'SK', '1'),
('303012', '303', 'Mengikuti Pengembangan Penyusunan Standar, Pedoman, Soal dan sejenisnyaMengikuti Kegiatan Penyusunan Standar/ Pedoman/ Soal dan sejenisnya pada tingkat provinsi.', 'SK', '1'),
('30302', '303', 'Menemukan teknologi tepatgunaKategori Sederhana', 'Hasil karya', '2'),
('30303', '303', 'Menemukan / menciptakan karya seniKategori kompleks', 'Hasil karya', '4'),
('30304', '303', 'Menemukan / menciptakan karya seniKategori sederhana', 'Hasil karya', '2'),
('30305', '303', 'Membuat alat pelajaran:Kategori kompleks', 'Alat pelajaran', '2'),
('30306', '303', 'Membuat alat pelajaran:Kategori sederhana', 'Alat pelajaran', '1'),
('30307', '303', 'Membuat alat peraga:Kategori kompleks', 'Alat peraga', '2'),
('30308', '303', '1)Kategori sederhana', 'Alat peraga', '1'),
('30309', '303', 'Membuat alat praktikum:Kategori kompleks', 'Alat Praktik', '4'),
('40101', '401', 'Memperoleh gelar/ijazah yang tidak sesuai dengan bidang yang diampunya:Doktor (S-3)', 'Ijazah', '15'),
('40102', '401', 'a.Pascasarjana (S-2)', 'Ijazah', '10'),
('40103', '401', 'b.Sarjana (S-1) / Diploma IV', 'Ijazah', '5'),
('40201', '402', 'Melaksanakan kegiatan yang mendukung tugas guru:Membimbing siswa dalam praktik kerja nyata / praktik industri / ekstrakurikuler dan yang sejenisnya', 'laporan', '0.5'),
('40202', '402', 'Sebagai pengawas ujian penilaian dan evaluasi terhadap proses dan hasil belajar tingkat :sekolah', 'SK', '0.5'),
('40203', '402', 'Sebagai pengawas ujian penilaian dan evaluasi terhadap proses dan hasil belajar tingkat :nasional', 'SK', '0.5'),
('40204', '402', 'Menjadi anggota organisasi profesi, sebagai:Pengurus aktif', 'SK', '1'),
('40205', '403', 'Menjadi anggota organisasi profesi, sebagai:Anggota aktif', 'SK', '0.5'),
('40206', '402', 'Menjadi anggota kegiatan kepramukaan, sebagai:Pengurus aktif', 'SK', '1'),
('40207', '402', 'Menjadi anggota kegiatan kepramukaan, sebagai:Anggota aktif', 'SK', '0.5'),
('40208', '402', 'Melaksanakan kegiatan yang mendukung tugas guru:Menjadi tim penilai angka kredit', 'DUPAK', '0.2'),
('40209', '402', 'Melaksanakan kegiatan yang mendukung tugas guru:Menjadi tutor/pelatih/instruktur', '2 Jampel', '0.2'),
('40301', '403', 'Memperoleh Penghargaan/tanda jasa Satya Lancana Karya Satya30 (tiga puluh) tahun', 'Sertifikat/Piagam', '3'),
('40302', '403', 'Memperoleh Penghargaan/tanda jasa Satya Lancana Karya Satya20 (dua puluh) tahun', 'Sertifikat/Piagam', '2'),
('40303', '403', 'Memperoleh Penghargaan/tanda jasa Satya Lancana Karya Satya10 (sepuluh) tahun', 'Sertifikat/Piagam', '1'),
('40304', '403', 'Memperoleh Penghargaan/tanda jasa', 'Sertifikat/Piagam', '1'),
('Array082', '101', 'hah', 'ok', '90'),
('Array083', '101', 'hah', 'ok', '90');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `KODE_KOTA` varchar(8) NOT NULL,
  `NAMA_KOTA` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`KODE_KOTA`, `NAMA_KOTA`) VALUES
('1', 'NGANJUK'),
('2', 'SURABAYA'),
('3', 'Malang'),
('4', 'Bojonegoro'),
('5', 'Sleman'),
('6', 'Pamekasan');

-- --------------------------------------------------------

--
-- Table structure for table `pangkat`
--

CREATE TABLE `pangkat` (
  `ID_PANGKAT` varchar(8) NOT NULL,
  `NAMA_PANGKAT` varchar(20) NOT NULL,
  `GOLONGAN_RUANG` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pangkat`
--

INSERT INTO `pangkat` (`ID_PANGKAT`, `NAMA_PANGKAT`, `GOLONGAN_RUANG`) VALUES
('10', 'Pembina Tk.I', 'IV/b'),
('11', 'Juru', 'I/c'),
('12', 'Pengatur', 'II/c'),
('13', 'Penata', 'III/c'),
('14', 'Pembina Utama Muda', 'IV/c'),
('15', 'Juru Tk.I', 'I/d'),
('16', 'Pengatur TK1', 'II/d'),
('17', 'Penata Tk.I', 'III/d'),
('18', 'Pembina Utama Madya', 'IV/d'),
('19', 'Pembina Utama', 'IV/e'),
('20', 'Pegawai Honorer', ''),
('21', 'Pegawai Kontrak', ''),
('3', 'Juru Muda', 'I/a'),
('4', 'Pengatur Muda', 'II/a'),
('5', 'Penata Muda', 'III/a'),
('6', 'Pembina', 'IV/a'),
('7', 'Juru Muda Tk.I', 'I/b'),
('8', 'Pengatur Muda Tk.I', 'II/b'),
('9', 'Penata Muda Tk.I', 'III/b');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `NIP` varchar(20) NOT NULL,
  `KODE_KOTA` varchar(8) NOT NULL,
  `NAMA_PEGAWAI` varchar(50) NOT NULL,
  `JENIS_KELAMIN` varchar(2) NOT NULL,
  `AGAMA` varchar(10) NOT NULL,
  `KEWARGANEGARAAN` varchar(10) NOT NULL,
  `ALAMAT` varchar(30) NOT NULL,
  `NO_TELP` decimal(15,0) NOT NULL,
  `PASSWORD` varchar(32) NOT NULL,
  `ALASAN` varchar(25) NOT NULL,
  `TANGGAL_KELUAR` date NOT NULL,
  `GAMBAR` varchar(100) NOT NULL,
  `TANGGAL_TUGAS` date NOT NULL,
  `UNIT_KERJA` varchar(20) NOT NULL,
  `USERID` int(11) NOT NULL,
  `TGLLAHIR` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`NIP`, `KODE_KOTA`, `NAMA_PEGAWAI`, `JENIS_KELAMIN`, `AGAMA`, `KEWARGANEGARAAN`, `ALAMAT`, `NO_TELP`, `PASSWORD`, `ALASAN`, `TANGGAL_KELUAR`, `GAMBAR`, `TANGGAL_TUGAS`, `UNIT_KERJA`, `USERID`, `TGLLAHIR`) VALUES
('1', '1', 'admin', 'L', 'Islam', '', 'Nganjuk', '0', 'e10adc3949ba59abbe56e057f20f883e', '', '0000-00-00', '20170605055710-1.jpg', '0000-00-00', '', 1, '2017-05-20'),
('2016', '1', 'Arya Wiratama', 'P', 'Islam', 'Indonesia', 'DFDF', '12', '202cb962ac59075b964b07152d234b70', '', '0000-00-00', '20170510091442-2017.jpg', '2017-05-23', 'SMP Negeri 1 Rejoso', 2, '2017-05-03'),
('2017090012', '3', 'TRIJONO BASOEKI, S.Pd', 'L', 'Kristen', 'Indonesia', 'Nganjuk', '1299', '202cb962ac59075b964b07152d234b70', 'noting', '2017-06-01', 'user.jpg', '2017-05-03', 'SMP Negeri 1 Rejoso', 3, '2017-05-02'),
('2018', '1', 'R.ARIES MUHARRAM', 'P', 'Islam', 'Indonesia', 'DFDF', '12', '202cb962ac59075b964b07152d234b70', '', '0000-00-00', '20170510091442-2017.jpg', '2017-05-23', 'SMP Negeri 1 Rejoso', 4, '2017-05-03'),
('2019', '1', 'MOCHAMMAD RIYADI S.P.d', 'L', 'Islam', 'Indonesia', 'raya', '61511133108', '202cb962ac59075b964b07152d234b70', '', '0000-00-00', '20170510091826-2019.jpg', '2017-05-26', 'SMP Negeri 1 Rejoso', 5, '2017-05-30'),
('2011', '1', 'BAMBANG SOEGENG H, S.Pd', 'L', 'Budha', 'Indonesia', 'k', '61511133108', '202cb962ac59075b964b07152d234b70', '', '0000-00-00', '20170511085207-2011.jpg', '2017-05-17', 'SMP Negeri 1 Rejoso', 6, '2017-05-17'),
('196106201984032000', '1', 'Wiwik Sumaryati', 'P', 'Islam', 'Indonesia', 'Nganjuk', '0', '481adf79fd8eff709645d2006f0bca80', '', '0000-00-00', 'user.jpg', '0000-00-00', 'SMP Negeri 1 Rejoso', 7, '1961-06-20'),
('196409241987032000', '1', 'Mardiana, S.Pd', 'P', 'Islam', 'Indonesia', 'Nganjuk', '0', 'de5f0a1017c8024222ce922d39c38b91', '', '0000-00-00', 'user.jpg', '0000-00-00', 'SMP Negeri 1 Rejoso', 8, '1964-09-24'),
('196005121985031000', '1', 'Suharto, S.pd', 'L', 'Islam', 'Indonesia', 'Nganjuk', '0', 'd33df17deed361f7b7f975b20aa739b6', '', '0000-00-00', 'user.jpg', '0000-00-00', 'SMP Negeri 1 Rejoso', 9, '1960-05-12'),
('196310251984031000', '1', 'Khoiru Sofiyan, S.Pd', 'P', 'Islam', 'Indonesia', 'Nganjuk', '0', '3e3b61528de464ce34471524d8d80692', '', '0000-00-00', 'user.jpg', '0000-00-00', 'SMP Negeri 1 Rejoso', 10, '1963-10-25'),
('196612111988031000', '4', 'Lamiran, S.Pd', 'L', 'Islam', 'Indonesia', 'Bojonegoro', '0', 'd4599a494a26426e67bed679c9874452', '', '0000-00-00', 'user.jpg', '0000-00-00', 'SMP Negeri 1 Rejoso', 11, '1966-12-11'),
('196707181989032000', '5', 'Eni Suryani, S.Pd', 'P', 'Islam', 'Indonesia', 'Sleman', '0', '5cf15a96d971d7ddbeaf616f41fe441c', '', '0000-00-00', 'user.jpg', '0000-00-00', 'SMP Negeri 1 Rejoso', 12, '1967-07-18'),
('196810151995121000', '1', 'Drs. Edhi Kasminanto', 'L', 'Islam', 'Indonesia', 'Nganjuk', '0', '6651663a1911d7a1512a2dd5bcdd55be', '', '0000-00-00', 'user.jpg', '0000-00-00', 'SMP Negeri 1 Rejoso', 13, '1968-10-15'),
('196805061995122000', '6', 'ISNAWATI, S.Pd', 'P', 'Islam', 'Indonesia', 'Pamekasan', '0', '95736000db2c88c034a937eff9713ccf', '', '0000-00-00', 'user.jpg', '0000-00-00', 'SMP Negeri 1 Rejoso', 14, '1968-06-06'),
('196810061995122000', '1', 'Wiwik Supartini, S.pd', 'P', 'Islam', 'Indonesia', 'Nganjuk', '0', '2738663313a1071ac17ed8c149d8b0a7', '', '0000-00-00', 'user.jpg', '0000-00-00', 'SMP Negeri 1 Rejoso', 15, '1968-10-06'),
('196612121989032000', '1', 'Siti Komariatun, S.Pd', 'P', 'Islam', 'Indonesia', 'Nganjuk', '0', '73a41b8bb963fdc97fe8d703df802a42', '', '0000-00-00', 'user.jpg', '0000-00-00', 'SMP Negeri 1 Rejoso', 16, '1967-03-06'),
('196604101986031000', '1', 'Tarbut, S.Pd', 'L', 'Islam', 'Indonesia', 'Nganjuk', '0', '4a6235cd424c70ebeca040d21c03c011', '', '0000-00-00', 'user.jpg', '0000-00-00', 'SMP Negeri 1 Rejoso', 17, '1966-12-12'),
('196805052003121000', '1', 'Tarsono, S.Pd', 'L', 'Islam', 'Indonesia', 'Nganjuk', '0', '1921e5235b075815f4ae5c1bc8a6963f', '', '0000-00-00', 'user.jpg', '0000-00-00', 'SMP Negeri 1 Rejoso', 18, '1968-05-05'),
('196907082005011000', '1', 'Sugito, S.Pd', 'L', 'Islam', 'Indonesia', 'Nganjuk', '0', '2223a27e1c061d9f1b912552570c7068', '', '0000-00-00', 'user.jpg', '0000-00-00', 'SMP Negeri 1 Rejoso', 19, '1969-07-08'),
('196911272005011000', '1', 'Didik Soetantoko, S.Pd', 'L', 'Islam', 'Indonesia', 'Nganjuk', '0', '86a4cbec5b77c626fcbc9af85b3e91f7', '', '0000-00-00', 'user.jpg', '0000-00-00', 'SMP Negeri 1 Rejoso', 20, '1969-11-27'),
('197710242006042000', '1', 'Suparni, S.Si', 'P', 'Islam', 'Indonesia', 'Nganjuk', '0', 'b857dac364eec28b872ddd8dd2cf6a90', '', '0000-00-00', 'user.jpg', '0000-00-00', 'SMP Negeri 1 Rejoso', 21, '1977-10-24'),
('198106032006042000', '1', 'Ertiana, S.Pd,I', 'P', 'Islam', 'Indonesia', 'Nganjuk', '0', 'e0b72a77d9bd925e13192e4499415379', '', '0000-00-00', 'user.jpg', '0000-00-00', 'SMP Negeri 1 Rejoso', 22, '1981-06-03'),
('197109132003121000', '1', 'Sudarmaji, S.Pd', 'L', 'Islam', 'Indonesia', 'Nganjuk', '0', 'f50825df78b3ea397a2261fba46517a9', '', '0000-00-00', 'user.jpg', '0000-00-00', 'SMP Negeri 1 Rejoso', 23, '1971-09-18'),
('196606072007012000', '6', 'Drs. Endang Yuniatik', 'P', 'Islam', 'Indonesia', 'Pamekasan', '0', 'a9ddfedecf840bd8d24cce6e1e92db05', '', '0000-00-00', 'user.jpg', '0000-00-00', 'SMP Negeri 1 Rejoso', 24, '1966-06-07'),
('196706302007012000', '3', 'Drs. Ucik Dwi Rahayu', 'P', 'Islam', 'Indonesia', 'Malang', '0', '53677c06bcb88ecd854290e13ca5b27b', '', '0000-00-00', 'user.jpg', '0000-00-00', 'SMP Negeri 1 Rejoso', 25, '1967-06-30'),
('197012062008011000', '1', 'Mukayat, S.Pd', 'L', 'Islam', 'Indonesia', 'Nganjuk', '0', '153acbdf76b83af5772fe1a52c2f60d9', '', '0000-00-00', 'user.jpg', '0000-00-00', 'SMP Negeri 1 Rejoso', 26, '1970-12-06'),
('197010042008012000', '1', 'Indah Suwarni,S.Pd', 'P', 'Islam', 'Indonesia', 'Nganjuk', '0', 'ddd1826d0c6b9bcaec1cfcbb0e73a2aa', '', '0000-00-00', 'user.jpg', '0000-00-00', 'SMP Negeri 1 Rejoso', 27, '1970-10-04'),
('196808062008012000', '1', 'Tarijem, S.Pd', 'P', 'Islam', 'Indonesia', 'Nganjuk', '0', '7c4e0c678fb432ddb138f5840602c06e', '', '0000-00-00', 'user.jpg', '0000-00-00', 'SMP Negeri 1 Rejoso', 28, '1968-08-06'),
('197109222008011000', '2', 'Heron Bambang Pujo Yulian, S.Pd', 'L', 'Islam', 'Indonesia', 'Nganjuk pace', '98876', '176431d01caa652de17c7570a54ab7d0', '', '0000-00-00', '20170605051056-29.jpg', '2008-01-01', 'SMP Negeri 1 Rejoso', 29, '1969-09-09'),
('20170620', '1', 'Army', 'P', 'Islam', 'Indonesia', 'surabaya', '98762', '202cb962ac59075b964b07152d234b70', '', '0000-00-00', '20170620054019-20170620.jpg', '2017-06-15', 'SMP Negeri 1 Rejoso', 30, '2017-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_perilaku_pegawai`
--

CREATE TABLE `penilaian_perilaku_pegawai` (
  `KODENILAI` varchar(6) NOT NULL,
  `KODE_SKP` varchar(11) DEFAULT NULL,
  `ORIENTASIPELAYANAN` varchar(5) NOT NULL,
  `INTEGRITAS` varchar(5) NOT NULL,
  `KOMITMEN` varchar(5) NOT NULL,
  `DISIPLIN` varchar(5) NOT NULL,
  `KERJASAMA` varchar(5) NOT NULL,
  `KEPEMIMPINAN` varchar(5) NOT NULL,
  `NILAIPERILAKU` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian_perilaku_pegawai`
--

INSERT INTO `penilaian_perilaku_pegawai` (`KODENILAI`, `KODE_SKP`, `ORIENTASIPELAYANAN`, `INTEGRITAS`, `KOMITMEN`, `DISIPLIN`, `KERJASAMA`, `KEPEMIMPINAN`, `NILAIPERILAKU`) VALUES
('SKP1', '2017SKP4', '80', '87.2', '88.5', '88.5', '88.5', '87.2', '0'),
('SKP2', '2017SKP6', '80', '70.3', '87.2', '0.990', '87.2', '88.5', '0'),
('SKP3', '2017SKP16', '80', '88.5', '88.5', '87.2', '88.5', '88.5', '0'),
('SKP4', '2017SKP10', '80', '70.3', '87.2', '88.5', '87.2', '80', '0'),
('SKP5', '2017SKP17', '80', '87.2', '70.3', '88.5', '80', '87.2', '0'),
('SKP6', '2017SKP18', '80', '88.5', '88.5', '80', '88.5', '88.5', '0'),
('SKP7', '2016SKP19', '80', '88.5', '80', '88.5', '88.5', '88.5', '0'),
('SKP8', '2017SKP15', '80', '80', '88.5', '88.5', '88.5', '70.3', '0'),
('SKP9', '2017SKP23', '82', '81', '83', '82', '82', '80', '0');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_jabatan`
--

CREATE TABLE `riwayat_jabatan` (
  `ID_JABATAN` varchar(7) NOT NULL,
  `USERID` int(11) NOT NULL,
  `ID_RW_JABATAN` int(11) NOT NULL,
  `TGLMULAI` date NOT NULL,
  `STATUSJABATAN` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `riwayat_jabatan`
--

INSERT INTO `riwayat_jabatan` (`ID_JABATAN`, `USERID`, `ID_RW_JABATAN`, `TGLMULAI`, `STATUSJABATAN`) VALUES
('J00', 2, 2, '2017-05-10', 0),
('J00', 7, 32, '2017-06-01', 1),
('J01', 5, 3, '2017-05-10', 0),
('J01', 6, 4, '2017-12-05', 1),
('J01', 28, 30, '2017-05-22', 1),
('J01', 29, 31, '2017-05-23', 1),
('J03', 1, 1, '2017-05-11', 1),
('J04', 5, 8, '2017-05-23', 1),
('J04', 18, 20, '2017-05-12', 1),
('J04', 19, 21, '2017-05-13', 1),
('J04', 20, 22, '2017-05-14', 1),
('J04', 21, 23, '2017-05-15', 1),
('J04', 22, 24, '2017-05-16', 1),
('J04', 23, 25, '2017-05-17', 1),
('J04', 24, 26, '2017-05-18', 1),
('J04', 26, 28, '2017-05-20', 1),
('J04', 27, 29, '2017-05-21', 1),
('J04', 30, 34, '2017-06-20', 1),
('J05', 5, 7, '2017-05-31', 0),
('J05', 25, 27, '2017-05-18', 1),
('J08', 7, 9, '2017-05-01', 0),
('J08', 8, 10, '2017-05-02', 1),
('J08', 9, 11, '2017-05-03', 0),
('J08', 10, 12, '2017-05-04', 1),
('J08', 11, 13, '2017-05-05', 1),
('J08', 12, 14, '2017-05-06', 1),
('J08', 13, 15, '2017-05-07', 1),
('J08', 14, 16, '2017-05-08', 1),
('J08', 15, 17, '2017-05-09', 1),
('J08', 16, 18, '2017-05-10', 1),
('J08', 17, 19, '2017-05-11', 1),
('J09', 9, 33, '2017-06-02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sasaran_kinerja_pegawai`
--

CREATE TABLE `sasaran_kinerja_pegawai` (
  `KODE_SKP` varchar(11) NOT NULL,
  `TANGGAL_DIUSULKAN` date NOT NULL,
  `JANGKAWAKTU_PENILAIAN` varchar(35) NOT NULL,
  `STATUS_AJUAN` varchar(26) NOT NULL,
  `KET_AJUAN` tinytext,
  `REKOMENDASI` varchar(50) NOT NULL,
  `KEBERATAN` tinytext NOT NULL,
  `TGLKEBERATAN` date NOT NULL,
  `TANGGAPANKEBERATAN` tinytext NOT NULL,
  `TGLTANGGAPANKEBERATAN` date NOT NULL,
  `KEPUTUSANKEBERATAN` tinytext NOT NULL,
  `TGLKEPUTUSAN` date NOT NULL,
  `TANGGAL_DITERIMA` date NOT NULL,
  `NILAIPRESTASI` varchar(7) NOT NULL,
  `STATUSNILAI` int(11) DEFAULT NULL,
  `KET_NILAI` tinytext,
  `USERID` int(11) DEFAULT NULL,
  `PEG_USERID` int(11) DEFAULT NULL,
  `PEG2_USERID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sasaran_kinerja_pegawai`
--

INSERT INTO `sasaran_kinerja_pegawai` (`KODE_SKP`, `TANGGAL_DIUSULKAN`, `JANGKAWAKTU_PENILAIAN`, `STATUS_AJUAN`, `KET_AJUAN`, `REKOMENDASI`, `KEBERATAN`, `TGLKEBERATAN`, `TANGGAPANKEBERATAN`, `TGLTANGGAPANKEBERATAN`, `KEPUTUSANKEBERATAN`, `TGLKEPUTUSAN`, `TANGGAL_DITERIMA`, `NILAIPRESTASI`, `STATUSNILAI`, `KET_NILAI`, `USERID`, `PEG_USERID`, `PEG2_USERID`) VALUES
('1', '2017-05-12', '2017', '', NULL, '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', NULL, NULL, 5, 6, 4),
('2', '2017-05-12', '2017', '1', NULL, '', 'pl', '2017-05-03', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', NULL, NULL, 2, 4, 7),
('2016SKP19', '2017-06-13', '2016', '4', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', 2, '', 14, 7, 9),
('2016SKP21', '2017-06-19', '2016', '0', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', 0, '', 17, 7, 9),
('2017SKP10', '2017-06-07', '2017', '4', NULL, '', 'tidak sesuai bro', '2017-06-19', 'oke sudah diperbaiki', '2017-06-19', '', '0000-00-00', '0000-00-00', '', 3, NULL, 16, 7, 9),
('2017SKP11', '2017-06-07', '2017', '4', 'PEJABAT PENILAI: kurang begitu<br> ATASAN PEJABAT PENILAI: halah<br>', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', NULL, NULL, 25, 7, 9),
('2017SKP12', '2017-06-07', '2017', '5', NULL, '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', NULL, NULL, 12, 7, 9),
('2017SKP13', '2017-06-07', '2017', '5', NULL, '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', NULL, NULL, 18, 7, 9),
('2017SKP14', '2017-06-07', '2017', '4', NULL, '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', NULL, NULL, 14, 7, 9),
('2017SKP15', '2017-06-08', '2017', '4', NULL, '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', NULL, NULL, 11, 7, 9),
('2017SKP16', '2017-06-08', '2017', '4', NULL, '', 'keberatan&nbsp;', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', 6, NULL, 20, 7, 9),
('2017SKP17', '2017-06-09', '2017', '4', NULL, '', ' kurang', '2017-06-09', 'iya kurang', '2017-06-09', 'oke', '2017-06-09', '0000-00-00', '', 6, NULL, 27, 7, 9),
('2017SKP18', '2017-06-09', '2017', '3', NULL, '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', 0, NULL, 19, 7, 9),
('2017SKP20', '2017-06-14', '2017', '2', ' PEJABAT PENILAI: cobak<br>', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', 0, '', 28, 7, 9),
('2017SKP22', '2017-06-20', '2017', '4', '', '', 'kurang', '2017-06-20', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', 3, '', 30, 7, 9),
('2017SKP23', '2017-07-13', '2017', '4', '', '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', 0, '', 22, 7, 9),
('2017SKP3', '2017-05-11', '2017', '0', NULL, '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', NULL, NULL, 1, 5, 6),
('2017SKP4', '2017-05-15', '2017', '4', NULL, '', 'tolong di cermati lagi', '0000-00-00', 'saya kurang setuju dengan anda', '0000-00-00', 'ok siap', '2017-06-11', '0000-00-00', '', 6, NULL, 11, 7, 9),
('2017SKP5', '2017-06-03', '2017', '0', NULL, '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', 1, NULL, 11, 7, 9),
('2017SKP6', '2017-06-03', '2017', '4', NULL, '', '', '0000-00-00', '', '0000-00-00', 'iya sudah', '2017-06-11', '0000-00-00', '', 6, NULL, 13, 7, 9),
('2017SKP7', '2017-06-04', '2017', '1', NULL, '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', 3, NULL, 7, 9, 10),
('2017SKP8', '2017-06-07', '2017', '0', NULL, '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', NULL, NULL, 17, 7, 9),
('2017SKP9', '2017-06-07', '2017', '0', NULL, '', '', '0000-00-00', '', '0000-00-00', '', '0000-00-00', '0000-00-00', '', NULL, NULL, 24, 7, 9);

-- --------------------------------------------------------

--
-- Table structure for table `sub_unsur`
--

CREATE TABLE `sub_unsur` (
  `ID_SUBUNSUR` varchar(12) NOT NULL,
  `ID_UNSUR` varchar(12) NOT NULL,
  `NAMA_SUBUNSUR` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_unsur`
--

INSERT INTO `sub_unsur` (`ID_SUBUNSUR`, `ID_UNSUR`, `NAMA_SUBUNSUR`) VALUES
('101', '1', 'Mengikuti pendidikan dan memperoleh gelar/ijazah/akta'),
('102', '1', 'Mengikuti pelatihan prajabatan'),
('201', '2', 'Melaksanakan proses pembelajaran'),
('202', '2', 'Melaksanakan proses bimbingan'),
('203', '2', 'Melaksanakan tugas lain yang relevan dengan fungsi sekolah / madrasah.'),
('301', '3', 'Melaksanakan pengembangan diri'),
('302', '3', 'Melaksanakan Publikasi Ilmiah hasil penelitian atau gagasan\nilmu pada bidang pendidikan formal.'),
('303', '3', 'Melaksanakan Karya Inovatif'),
('401', '4', 'Memperoleh gelar/ijazah yang tidak sesuai dengan bidang yang diampunya'),
('402', '4', 'Melaksanakan kegiatan yang mendukung tugas guru'),
('403', '4', 'Perolehan penghargaan/tanda jasa');

-- --------------------------------------------------------

--
-- Table structure for table `unsur`
--

CREATE TABLE `unsur` (
  `ID_UNSUR` varchar(12) NOT NULL,
  `NAMA_UNSUR` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unsur`
--

INSERT INTO `unsur` (`ID_UNSUR`, `NAMA_UNSUR`) VALUES
('1', 'pendidikan'),
('2', 'pembelajaran/bimbingan dan tugas tertentu'),
('3', 'pengembangan keprofesian berkelanjutan'),
('4', 'penunjang tugas guru');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detil_kegiatan`
--
ALTER TABLE `detil_kegiatan`
  ADD PRIMARY KEY (`ID_KEG`,`KODE_SKP`),
  ADD UNIQUE KEY `DETIL_KEGIATAN_PK` (`ID_KEG`,`KODE_SKP`),
  ADD KEY `MEMILIKI4_FK` (`KODE_SKP`),
  ADD KEY `BERISI_FK` (`ID_KEG`);

--
-- Indexes for table `history_pangkat`
--
ALTER TABLE `history_pangkat`
  ADD PRIMARY KEY (`ID_PANGKAT`,`USERID`,`ID_H_PANGKAT`),
  ADD UNIQUE KEY `HISTORY_PANGKAT_PK` (`ID_PANGKAT`,`USERID`,`ID_H_PANGKAT`),
  ADD KEY `MEMPEROLEH1_FK` (`USERID`),
  ADD KEY `MEMPEROLEH_FK` (`ID_PANGKAT`),
  ADD KEY `ID_H_JABATAN` (`ID_H_PANGKAT`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`ID_JABATAN`),
  ADD UNIQUE KEY `JABATAN_PK` (`ID_JABATAN`);

--
-- Indexes for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`ID_KEG`),
  ADD UNIQUE KEY `KEGIATAN_PK` (`ID_KEG`),
  ADD KEY `MEMPUNYAI2_FK` (`ID_SUBUNSUR`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`KODE_KOTA`),
  ADD UNIQUE KEY `KOTA_PK` (`KODE_KOTA`);

--
-- Indexes for table `pangkat`
--
ALTER TABLE `pangkat`
  ADD PRIMARY KEY (`ID_PANGKAT`),
  ADD UNIQUE KEY `PANGKAT_PK` (`ID_PANGKAT`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`USERID`),
  ADD UNIQUE KEY `PEGAWAI_PK` (`NIP`,`USERID`),
  ADD KEY `MEMILIKI6_FK` (`KODE_KOTA`);

--
-- Indexes for table `penilaian_perilaku_pegawai`
--
ALTER TABLE `penilaian_perilaku_pegawai`
  ADD PRIMARY KEY (`KODENILAI`),
  ADD UNIQUE KEY `PENILAIAN_PERILAKU_PEGAWAI_PK` (`KODENILAI`),
  ADD KEY `MEMILIKI8_FK` (`KODE_SKP`);

--
-- Indexes for table `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  ADD PRIMARY KEY (`ID_JABATAN`,`USERID`,`ID_RW_JABATAN`),
  ADD UNIQUE KEY `RIWAYAT_JABATAN_PK` (`ID_JABATAN`,`USERID`,`ID_RW_JABATAN`),
  ADD KEY `MEMILIKI2_FK` (`ID_JABATAN`),
  ADD KEY `MEMILIKI3_FK` (`USERID`),
  ADD KEY `ID_RW_JABATAN` (`ID_RW_JABATAN`);

--
-- Indexes for table `sasaran_kinerja_pegawai`
--
ALTER TABLE `sasaran_kinerja_pegawai`
  ADD PRIMARY KEY (`KODE_SKP`),
  ADD UNIQUE KEY `SASARAN_KINERJA_PEGAWAI_PK` (`KODE_SKP`),
  ADD KEY `MEMILIKI_FK` (`USERID`),
  ADD KEY `MEMILIKI_ATASAN_FK` (`PEG_USERID`),
  ADD KEY `MEMILIKI_PEJABAT_PENILAI_FK` (`PEG2_USERID`);

--
-- Indexes for table `sub_unsur`
--
ALTER TABLE `sub_unsur`
  ADD PRIMARY KEY (`ID_SUBUNSUR`),
  ADD UNIQUE KEY `SUB_UNSUR_PK` (`ID_SUBUNSUR`),
  ADD KEY `MEMPUNYAI4_FK` (`ID_UNSUR`);

--
-- Indexes for table `unsur`
--
ALTER TABLE `unsur`
  ADD PRIMARY KEY (`ID_UNSUR`),
  ADD UNIQUE KEY `UNSUR_PK` (`ID_UNSUR`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `history_pangkat`
--
ALTER TABLE `history_pangkat`
  MODIFY `ID_H_PANGKAT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  MODIFY `ID_RW_JABATAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `detil_kegiatan`
--
ALTER TABLE `detil_kegiatan`
  ADD CONSTRAINT `detil_kegiatan_ibfk_1` FOREIGN KEY (`KODE_SKP`) REFERENCES `sasaran_kinerja_pegawai` (`KODE_SKP`),
  ADD CONSTRAINT `detil_kegiatan_ibfk_2` FOREIGN KEY (`ID_KEG`) REFERENCES `kegiatan` (`ID_KEG`);

--
-- Constraints for table `history_pangkat`
--
ALTER TABLE `history_pangkat`
  ADD CONSTRAINT `history_pangkat_ibfk_1` FOREIGN KEY (`USERID`) REFERENCES `pegawai` (`USERID`),
  ADD CONSTRAINT `history_pangkat_ibfk_2` FOREIGN KEY (`ID_PANGKAT`) REFERENCES `pangkat` (`ID_PANGKAT`);

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`ID_SUBUNSUR`) REFERENCES `sub_unsur` (`ID_SUBUNSUR`);

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_ibfk_1` FOREIGN KEY (`KODE_KOTA`) REFERENCES `kota` (`KODE_KOTA`);

--
-- Constraints for table `penilaian_perilaku_pegawai`
--
ALTER TABLE `penilaian_perilaku_pegawai`
  ADD CONSTRAINT `penilaian_perilaku_pegawai_ibfk_1` FOREIGN KEY (`KODE_SKP`) REFERENCES `sasaran_kinerja_pegawai` (`KODE_SKP`);

--
-- Constraints for table `riwayat_jabatan`
--
ALTER TABLE `riwayat_jabatan`
  ADD CONSTRAINT `riwayat_jabatan_ibfk_1` FOREIGN KEY (`ID_JABATAN`) REFERENCES `jabatan` (`ID_JABATAN`),
  ADD CONSTRAINT `riwayat_jabatan_ibfk_2` FOREIGN KEY (`USERID`) REFERENCES `pegawai` (`USERID`);

--
-- Constraints for table `sasaran_kinerja_pegawai`
--
ALTER TABLE `sasaran_kinerja_pegawai`
  ADD CONSTRAINT `sasaran_kinerja_pegawai_ibfk_1` FOREIGN KEY (`USERID`) REFERENCES `pegawai` (`USERID`),
  ADD CONSTRAINT `sasaran_kinerja_pegawai_ibfk_2` FOREIGN KEY (`PEG_USERID`) REFERENCES `pegawai` (`USERID`),
  ADD CONSTRAINT `sasaran_kinerja_pegawai_ibfk_3` FOREIGN KEY (`PEG2_USERID`) REFERENCES `pegawai` (`USERID`);

--
-- Constraints for table `sub_unsur`
--
ALTER TABLE `sub_unsur`
  ADD CONSTRAINT `sub_unsur_ibfk_1` FOREIGN KEY (`ID_UNSUR`) REFERENCES `unsur` (`ID_UNSUR`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
