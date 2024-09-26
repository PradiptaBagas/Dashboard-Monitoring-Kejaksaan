-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2024 at 06:46 PM
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
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `crud_kejaksaan`
--

CREATE TABLE `crud_kejaksaan` (
  `id` int(100) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `nama_singkat_tug` varchar(50) NOT NULL,
  `nama_tug` varchar(222) NOT NULL,
  `sumber` varchar(300) NOT NULL,
  `telaahan` date NOT NULL,
  `sprintug` varchar(100) NOT NULL,
  `tanggal_sprintug` date NOT NULL,
  `laphastug` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crud_kejaksaan`
--

INSERT INTO `crud_kejaksaan` (`id`, `kode`, `nama_singkat_tug`, `nama_tug`, `sumber`, `telaahan`, `sprintug`, `tanggal_sprintug`, `laphastug`, `keterangan`) VALUES
(1, 'TUG-01', 'Dinas Sosial', 'Dugaan Tindak Pidana Korupsi pada Dinas Sosial Kabupaten Malang terkait adanya Pengadaan Bahan Pangan Program JPS Provinsi Jawa Timur dan uang Transport pada Dinas Sosial TA 2020', 'Laporan Masyarakat', '2024-01-02', 'Print- 01 / M.5.20 / Fd.1 / 01 / 2024', '2024-01-09', '2024-01-12', 'Dihentikan'),
(2, 'TUG-02', 'Bina Marga (Jalan Fisik)', 'Dugaan tindak pidana korupsi berupa dugaan 7 (tujuh) proyek fiktif yang dilaksanakan Dinas PU Bina Marga tahun 2021-2023', 'Laporan Masyarakat', '2024-01-15', 'Print- 02 / M.5.20 / Fd.1 / 01 / 2024', '2024-01-16', '2024-02-01', 'Dihentikan'),
(3, 'TUG-03', 'Dispora', 'Dugaan tindak pidana korupsi dalam penyimpangan pembongkaran material Stadion Kanjuruhan Pada Dinas Pemuda Dan Olahraga Kabupaten Malang Tahun 2023', 'Laporan Masyarakat', '2024-01-17', 'Print- 03 / M.5.20 / Fd.1 / 01 / 2024', '2024-01-23', '2024-02-04', 'Dinaikan ke Tahap Penyelidikan'),
(4, 'TUG-07', 'ASET', 'Dugaan tindak pidana korupsi pada kegiatan pencatatan, pemanfaatan, pemindah-tangan, dan penghapusan aset milik Pemerintah Daerah Kabupaten Malang pada Tahun 2019', 'Laporan Masyarakat', '2024-02-29', 'Print-07 / M.5.20 / Fd.1 / 03 / 2024', '2024-03-04', '2024-04-03', 'Dinaikan ke Tahap Penyelidikan'),
(5, 'TUG-08', 'DBHCHT', 'Dugaan penyelewengan dana retribusi Menara Telekomunikasi dan penerbitan izin mendirikan bangunan (IMB) untuk pembangunan menara telekomunikasi di wilayah Kabupaten Malang TA 2019 s/d 2021', 'Laporan Masyarakat', '2024-03-25', 'Print-08 / M.5.20 / Fd.1 / 04 / 2024', '2024-04-16', '-', 'Permintaan Klarifikasi'),
(6, 'TUG-09', 'BPJS', 'Dugaan adanya penyalahgunaan dana untuk pembayaran premi BPJS Kesehatan yang berasal dari APBD Pemerintah Kabupaten Malang TA 2023', 'Laporan Masyarakat', '2024-04-22', 'Print-09 / M.5.20 / Fd.1 / 04 / 2024', '2024-04-23', '2024-03-23', 'Dihentikan'),
(7, 'TUG-10', 'DD ADD TAMBAKASRI', 'Dugaan adanya penyalahgunaan dana ADD dan DD ada Desa Tambak Asri Kecamatan Tajinan Kabupaten Malang TA 2015 s/d 2022', 'Laporan Masyarakat', '2024-04-24', 'Print-11 / M.5.20 / Fd.1 / 05 / 2024', '2024-05-22', '2024-05-15', 'Dihentikan'),
(8, 'TUG-11', 'PTSL TUMPANG', 'Dugaan Tindak Pidana Korupsi Pungutan Liar (Pungli)  Desa Tumpang Kec. Tumpang pada Program Pendaftaran Tanah Sistematis Lengkap (PTSL)', 'Laporan Masyarakat', '2024-05-15', 'Print-11 / M.5.20 / Fd.1 / 05 / 2024', '2024-05-22', '2024-05-15', 'Dihentikan'),
(9, 'TUG-12', 'ROKOK ILEGAL', 'Dugaan adanya tindak pidana korupsi pada perizinan pabrik rokok di daerah Desa Sumbersuko Kecamatan Tajinan Kabupaten Malang', 'Laporan Masyarakat', '2024-05-20', 'Print-12 / M.5.20 / Fd.1 / 05 / 2024', '2024-05-22', '-', 'Permintaan Klarifikasi'),
(10, 'TUG-13', 'KUR BRI', 'Dugaan penyimpangan dan penyalahgunaan Kredit Usaha Rakyat pada BRI Cabang Kepanjen Kabupaten Malang Tahun 2021', 'Laporan Masyarakat', '2024-05-28', 'Print-13 / M.5.20 / Fd.1 / 06 / 2024', '2024-06-03', '2024-07-15', 'Dinaikan ke Tahap Penyelidikan'),
(11, 'TUG-14', 'BENDUNGAN LAHOR', 'Dugaan Tindak Pidana Korupsi berupa Pungutan Liar (Pungli) yang dilakukan oleh oknum pegawai Jasa Tirta I pada Bendungan Lahor;', 'Laporan Masyarakat', '2024-07-15', 'Print- 14 / M.5.20 / Fd.1 / 07 / 2024', '2024-07-23', '-', 'Permintaan Klarifikasi');

-- --------------------------------------------------------

--
-- Table structure for table `crud_penuntutan`
--

CREATE TABLE `crud_penuntutan` (
  `id` int(50) NOT NULL,
  `terdakwa` varchar(500) NOT NULL,
  `nomor_reg` varchar(500) NOT NULL,
  `jenis_tindak_pidana` varchar(100) NOT NULL,
  `pasal_yang_didakwakan` varchar(300) NOT NULL,
  `acara_biasa` varchar(100) NOT NULL,
  `penghentian_penuntutan` varchar(300) NOT NULL,
  `tgl_pasal_surat` varchar(200) NOT NULL,
  `tgl_pasal_amar` varchar(200) NOT NULL,
  `banding` varchar(200) NOT NULL,
  `kasasi` varchar(300) NOT NULL,
  `grasi` varchar(500) NOT NULL,
  `eksekusi` varchar(400) NOT NULL,
  `keterangan` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crud_penuntutan`
--

INSERT INTO `crud_penuntutan` (`id`, `terdakwa`, `nomor_reg`, `jenis_tindak_pidana`, `pasal_yang_didakwakan`, `acara_biasa`, `penghentian_penuntutan`, `tgl_pasal_surat`, `tgl_pasal_amar`, `banding`, `kasasi`, `grasi`, `eksekusi`, `keterangan`) VALUES
(1, 'KAMDI BIN SUGITO PONIJAN, Malang, 59 tahun  / 15 Agustus 1964, Laki-laki, Indonesia, Desa Kedungbanteng RT.021 RW.008 Kec. Sumbermanjingwetan Kab. Malang, Islam, Swasta (Mantan Kades Kedungbanteng)', 'Reg Perkara : PDS – 01 / M.5.20 / Ft.1 / 01 / 2024  Reg Bukti : 01 / RT.3 / Ft.1 / 01 / 2024  Reg Tahanan : 01 / RB.2 / Ft.1 / 01 / 2024', 'Pasal 2 ayat (1) UU Nomor 20 tahun 2001 atas perubahan UU Nomor 31 tahun 1999 tentang Pemberantasan ', '02/01/2024', '-', '19/02/2024', '06 Maret 2024,  2/Pid.Sus-TPK/2023/PN Sby Pidana Penjara 2 (dua) tahun, denda Rp. 150.000.000,00 (seratus lima puluh juta rupiah) subs  2 (dua) bulan, uang pengganti Rp.143.731.500 (seratus empat pulu', '06 Maret 2024,  2/Pid.Sus-TPK/2023/PN Sby Pidana Penjara 2 (dua) tahun, denda Rp. 150.000.000,00 (seratus lima puluh juta rupiah) subs  2 (dua) bulan, uang pengganti Rp.143.731.500 (seratus empat pulu', '08/03/2024', '26/Pid.Sus-TPK/2024/PT Sby Jo Nomor 2/Pid.Sus-TPK/2023/PN Sby  tanggal 14 Mei 2024', '-', '-', 'Proses Kasas'),
(2, 'SUDAR alias SUDARYANTO, Kediri, 50 tahun / 06 Oktober 1973, laki-laki, Indonesia, Perum. Puskopad G-5 RT.002 / RW.014 Kelurahan Candirenggo  Kecamatan Singosari Kabupaten Malang, Islam, Wiraswasta (Direktur CV. RAJAWALI PUTRA TEKNIK)', 'PDS.01/M.5.20/Ft.2/02/2024', 'Perpajakan', 'Pasal 39 ayat (1) huruf c dan Pasal 39 ayat (1) huruf d atau Pasal 39 ayat (1) huruf i Undang-Undang Republik Indonesia Nomor 6 Tahun 1983 tentang Ketentuan Umum dan Tata Cara Perpajakan sebagaimana telah beberapa kali diubah terakhir dengan Undang-Undang Republik Indonesia Nomor 6 Tahun 2023 tentan', '22 Februari 2024', '-', '27 Maret 2024', 'Senin, 22 April 2024  60/ Pid.Sus/ 2024/ PN Kpn Pidana Penjara 2 Tahun dan Pidana Denda Rp. 647.156.844,00 subsidair 6 bulan Penjara', '-', '-', '-', 'P-48 Nomor : Print-1030/M.5.20/Fu.2/05/2024 tanggal 13 Mei 2024  Pidsus-38 tanggal 13 Mei 2024', 'Sudah Eksekusi'),
(3, 'YUNUS PRASETYO BIN SUCIPTO HADI, Malang, 28 tahun  / 23 Oktober 1995, Laki-laki, Indonesia, Dusun Pagersari RT.004 RW.001 Kelurahan Pagersari Kec. Ngantang Kabupaten Malang, Islam, Karyawan Swasta', 'PDS.01/M.5.20/Ft.3/06/2024', 'Cukai', 'Pasal 54 Undang-Undang Nomor 39 Tahun 2007 tentang Perubahan atas Undang-Undang Nomor 11 Tahun 1995 tentang Cukai dan/atau Pasal 56 Undang-Undang Nomor 39 Tahun 2007 tentang Perubahan atas Undang-Undang Nomor 11 Tahun 1995 tentang Cukai.', '8 Juli 2024', '-', '2 September 2024', '-', '-', '-', '-', '-', 'Tahap Persidangan');

-- --------------------------------------------------------

--
-- Table structure for table `crud_penyelidikan`
--

CREATE TABLE `crud_penyelidikan` (
  `id` int(20) NOT NULL,
  `nama_singkat` varchar(500) NOT NULL,
  `nama_sesuai_sprint` varchar(500) NOT NULL,
  `sprinlid` varchar(500) NOT NULL,
  `tanggal_sprint` date NOT NULL,
  `nama_pelapor` varchar(500) NOT NULL,
  `identitas_terlapor` varchar(100) NOT NULL,
  `ditutup` varchar(200) NOT NULL,
  `ditingkatkan` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crud_penyelidikan`
--

INSERT INTO `crud_penyelidikan` (`id`, `nama_singkat`, `nama_sesuai_sprint`, `sprinlid`, `tanggal_sprint`, `nama_pelapor`, `identitas_terlapor`, `ditutup`, `ditingkatkan`, `keterangan`) VALUES
(1, 'Dispora', 'Dugaan tindak pidana korupsi dalam penyimpangan pembongkaran material Stadion Kanjuruhan Pada Dinas Pemuda Dan Olahraga Kabupaten Malang Tahun 2023', 'Print-01 / M.5.20 / Fd.1 / 03 / 2024', '2024-03-08', 'Laporan Tugas Penelaah tanggal 29 Februari 2024', 'Dinas Pemuda Dan Olahraga Kabupaten Malang', 'Tanggal 3 Juni 2024', '-', 'Dihentikan'),
(2, 'Aset', 'Dugaan tindak pidana korupsi pada kegiatan pencatatan, pemanfaatan, pemindah-tangan, dan penghapusan aset milik Pemerintah Daerah Kabupaten Malang pada Tahun 2019', 'Print-02 / M.5.20 / Fd.1 / 04 / 2024', '2024-04-16', 'Laporan Hasil Tugas Penelaah tanggal 02 April 2024', 'Pemerintah Daerah Kabupaten Malang', '25 Juni 2024', '-', 'Dihentikan'),
(3, 'KUR BRI', 'Dugaan penyimpangan dan penyalahgunaan Kredit Usaha Rakyat (KUR) pada BRI Cabang Kepanjen Kabupaten Malang Tahun 2021', 'Print – 03 / M.5.20 / Fd.1 / 07 / 2024', '2024-07-22', 'Laporan hasil Tugas penelaah terhadap Laporan Hasil Pelaksanaan Tugas Bidang Intelijen Kejaksaan Negeri Kabupaen Malang Nomor: R–LAPHASTUG-256/ M.5.20.2 / Dek.1 / 04 / 2024', 'Bank BRI Cabang Kepanjen', '-', '-', 'Proses Permintaan Keterangan');

-- --------------------------------------------------------

--
-- Table structure for table `crud_penyidikan`
--

CREATE TABLE `crud_penyidikan` (
  `id` int(20) NOT NULL,
  `nama_dik` varchar(500) NOT NULL,
  `nama_sesuai_p8` varchar(500) NOT NULL,
  `p_8` varchar(500) NOT NULL,
  `identitas_tersangka` varchar(300) NOT NULL,
  `status_tersangka` varchar(500) NOT NULL,
  `nomor_dan_tanggal` varchar(500) NOT NULL,
  `perhentian_dik` varchar(200) NOT NULL,
  `pengalihan` varchar(200) NOT NULL,
  `pelimpahan` varchar(200) NOT NULL,
  `keterangan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `crud_penyidikan`
--

INSERT INTO `crud_penyidikan` (`id`, `nama_dik`, `nama_sesuai_p8`, `p_8`, `identitas_tersangka`, `status_tersangka`, `nomor_dan_tanggal`, `perhentian_dik`, `pengalihan`, `pelimpahan`, `keterangan`) VALUES
(1, 'BRI (Karnowo)', 'Tindak pidana korupsi dalam penyaluran Kredit Usaha Rakyat (KUR) pada Bank Rakyat Indonesia (BRI) Unit Jabung Kabupaten Malang Tahun 2021, atas nama tersangka Sdr. Karnowo Yudi', 'Print- 1758 / M.5.20 / Fd.1 / 06 / 2023 Tanggal 26 Juni 2023', 'KARNOWO YUDI', '&quot;Surat Penetapan Tersangka NOMOR : 286 / M.5.20 / Fd.1 / 06 / 2023 Tanggal 26 Juni 2023&quot;', '-', '-', '-', '-', 'Tersangka berstatus DPO'),
(2, 'Bank Jatim', 'Tindak pidana korupsi dalam pelaksanaan pemberian kredit di Bank Jatim Cabang Kepanjen tahun 2019 atas nama debitur Badru Zyaman, S.H', 'Print-01 / M.5.20 / Fd.1 / 01 / 2024 Tanggal 05 Januari 2024', 'BADRU ZYAMAN', 'Surat Penetapan Tersangka NOMOR : TAP-01 / M.5.20 / Fd.1 / 07 / 2023 Tanggal 17 Juli 2024  Surat Perintah Penahanan NOMOR : Print-01 / M.5.20 / Fd.1 / 07 / 2024 Tanggal 17 Juli 2024', '01/ RB.1 / 07 / 2024 Tanggal 23 Juli 2024', '-', '-', '-', 'Pemeriksaan Saksi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crud_kejaksaan`
--
ALTER TABLE `crud_kejaksaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_penuntutan`
--
ALTER TABLE `crud_penuntutan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_penyelidikan`
--
ALTER TABLE `crud_penyelidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `crud_penyidikan`
--
ALTER TABLE `crud_penyidikan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `crud_kejaksaan`
--
ALTER TABLE `crud_kejaksaan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `crud_penuntutan`
--
ALTER TABLE `crud_penuntutan`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crud_penyelidikan`
--
ALTER TABLE `crud_penyelidikan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `crud_penyidikan`
--
ALTER TABLE `crud_penyidikan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
