-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2019 at 09:10 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_projectpln`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_akun`
--

CREATE TABLE `tb_akun` (
  `USERNAME` varchar(10) NOT NULL,
  `PASSWORD` varchar(60) DEFAULT NULL,
  `LVL` enum('ADMIN','PETUGAS','','') DEFAULT NULL,
  `NIP` double DEFAULT NULL,
  `CREATED_BY` varchar(20) DEFAULT NULL,
  `DATE_CREATED` varchar(50) DEFAULT NULL,
  `MODIFIED_BY` varchar(20) DEFAULT NULL,
  `DATE_MODIFIED` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_akun`
--

INSERT INTO `tb_akun` (`USERNAME`, `PASSWORD`, `LVL`, `NIP`, `CREATED_BY`, `DATE_CREATED`, `MODIFIED_BY`, `DATE_MODIFIED`) VALUES
('baskhara', '$2y$10$0DBySNCEuTy9uj20R.DNXugZ2RsDlGflSnIOgDnoZ5wVlYy21Np1C', 'ADMIN', 113160677227, 'admin', NULL, NULL, NULL),
('habibi', '$2y$10$wGx2mbTr4Ci0XUeZLNfNtuZ1zOLPi2u7mnuyoc56V4OBlANE4vU6u', 'PETUGAS', 113160600622, 'baskhara', '29/01/2019 12:25:12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ext_tgk`
--

CREATE TABLE `tb_ext_tgk` (
  `IDTGK` int(30) NOT NULL,
  `IDPEL` double DEFAULT NULL,
  `LEMBAR` varchar(5) DEFAULT NULL,
  `RPPTL` int(10) DEFAULT NULL,
  `RPBPJU` int(10) DEFAULT NULL,
  `RPPPN` int(10) DEFAULT NULL,
  `RPMAT` int(10) DEFAULT NULL,
  `TAGSUS` int(10) DEFAULT NULL,
  `UJL` int(10) DEFAULT NULL,
  `BP` int(10) DEFAULT NULL,
  `TRAFO` int(10) DEFAULT NULL,
  `SEWATRAFO` int(10) DEFAULT NULL,
  `SEWAKAP` int(10) DEFAULT NULL,
  `RPTAG` int(10) DEFAULT NULL,
  `RPBK` int(10) DEFAULT NULL,
  `TGL_AKHIR` varchar(20) DEFAULT NULL,
  `KALITGK` int(5) NOT NULL,
  `TGL_MODIFIED` varchar(20) DEFAULT NULL,
  `CREATED_BY` varchar(20) DEFAULT NULL,
  `DATE_CREATED` varchar(50) DEFAULT NULL,
  `MODIFIED_BY` varchar(20) DEFAULT NULL,
  `DATE_MODIFIED` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tb_gmaps`
--

CREATE TABLE `tb_gmaps` (
  `ID` int(11) NOT NULL,
  `NAMA` varchar(30) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `AU_KEYS` varchar(50) NOT NULL,
  `MODIFIED_BY` varchar(20) NOT NULL,
  `DATE_MODIFIED` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_gmaps`
--

INSERT INTO `tb_gmaps` (`ID`, `NAMA`, `EMAIL`, `AU_KEYS`, `MODIFIED_BY`, `DATE_MODIFIED`) VALUES
(1, 'PROJECT PLN', 'thepln.project22@gmail.com', 'AIzaSyDnEBDsvxyIq8LVgYfxMl0V6eceosiCjS4', 'admin', '09/01/2019 09:53:20');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `NIP` double NOT NULL,
  `NAMA` varchar(40) DEFAULT NULL,
  `ALAMAT` varchar(100) DEFAULT NULL,
  `JK` enum('LAKI-LAKI','PEREMPUAN') DEFAULT NULL,
  `JABATAN` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(30) DEFAULT NULL,
  `TELP` double DEFAULT NULL,
  `UNITAP` varchar(5) DEFAULT NULL,
  `UNITUP` int(5) DEFAULT NULL,
  `CREATED_BY` varchar(20) DEFAULT NULL,
  `DATE_CREATED` varchar(50) DEFAULT NULL,
  `MODIFIED_BY` varchar(20) DEFAULT NULL,
  `DATE_MODIFIED` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pegawai`
--

INSERT INTO `tb_pegawai` (`NIP`, `NAMA`, `ALAMAT`, `JK`, `JABATAN`, `EMAIL`, `TELP`, `UNITAP`, `UNITUP`, `CREATED_BY`, `DATE_CREATED`, `MODIFIED_BY`, `DATE_MODIFIED`) VALUES
(113160600622, 'Afrizal Habibi', 'Pabahanan', 'LAKI-LAKI', 'Manager', 'habibi@pln.cal', 8786792653, '22BJM', 22140, 'baskhara', '29/01/2019 12:04:11', NULL, NULL),
(113160677227, 'Muhammad Fajar Baskhara', 'Pelaihari', 'LAKI-LAKI', 'Staff', 'baskhara@pln.cal', 821722757, '22BJM', 22160, 'admin', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `IDPEL` double NOT NULL,
  `NAMA_PEL` varchar(40) DEFAULT NULL,
  `ALAMAT` varchar(100) DEFAULT NULL,
  `UNITAP` varchar(5) DEFAULT NULL,
  `UNITUP` int(5) DEFAULT NULL,
  `TARIF` varchar(5) DEFAULT NULL,
  `DAYA` varchar(10) DEFAULT NULL,
  `KOGOL` int(10) DEFAULT NULL,
  `GARDU` int(10) DEFAULT NULL,
  `KOORDX` varchar(20) DEFAULT NULL,
  `KOORDY` varchar(20) DEFAULT NULL,
  `CREATED_BY` varchar(20) DEFAULT NULL,
  `DATE_CREATED` varchar(50) DEFAULT NULL,
  `MODIFIED_BY` varchar(20) DEFAULT NULL,
  `DATE_MODIFIED` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tunggakan`
--

CREATE TABLE `tb_tunggakan` (
  `IDTGK` int(30) NOT NULL,
  `IDPEL` double DEFAULT NULL,
  `LEMBAR` varchar(5) DEFAULT NULL,
  `RPPTL` int(10) DEFAULT NULL,
  `RPBPJU` int(10) DEFAULT NULL,
  `RPPPN` int(10) DEFAULT NULL,
  `RPMAT` int(10) DEFAULT NULL,
  `TAGSUS` int(10) DEFAULT NULL,
  `UJL` int(10) DEFAULT NULL,
  `BP` int(10) DEFAULT NULL,
  `TRAFO` int(10) DEFAULT NULL,
  `SEWATRAFO` int(10) DEFAULT NULL,
  `SEWAKAP` int(10) DEFAULT NULL,
  `RPTAG` int(10) DEFAULT NULL,
  `RPBK` int(10) DEFAULT NULL,
  `TGL_AKHIR` varchar(20) DEFAULT NULL,
  `KALITGK` int(5) NOT NULL,
  `TGL_MODIFIED` varchar(20) DEFAULT NULL,
  `CREATED_BY` varchar(20) DEFAULT NULL,
  `DATE_CREATED` varchar(50) DEFAULT NULL,
  `MODIFIED_BY` varchar(20) DEFAULT NULL,
  `DATE_MODIFIED` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Table structure for table `tb_unitap`
--

CREATE TABLE `tb_unitap` (
  `UNITAP` varchar(5) NOT NULL,
  `WIL` varchar(10) DEFAULT NULL,
  `NAMA` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_unitap`
--

INSERT INTO `tb_unitap` (`UNITAP`, `WIL`, `NAMA`) VALUES
('22BJM', 'KSKT', 'BANJARMASIN'),
('22BRB', 'KSKT', 'BARABAI'),
('22KKP', 'KSKT', 'KUALA KAPUAS'),
('22KTB', 'KSKT', 'KOTABARU'),
('22PRY', 'KSKT', 'PALANGKA RAYA');

-- --------------------------------------------------------

--
-- Table structure for table `tb_unitup`
--

CREATE TABLE `tb_unitup` (
  `UNITUP` int(5) NOT NULL,
  `RAYON` varchar(30) DEFAULT NULL,
  `UNITAP` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_unitup`
--

INSERT INTO `tb_unitup` (`UNITUP`, `RAYON`, `UNITAP`) VALUES
(22100, 'LAMB MANGKURAT', '22BJM'),
(22110, 'AHMAD YANI', '22BJM'),
(22120, 'BANJARBARU', '22BJM'),
(22130, 'MARTAPURA', '22BJM'),
(22140, 'PELAIHARI', '22BJM'),
(22150, 'MARABAHAN', '22BJM'),
(22160, 'GAMBUT', '22BJM'),
(22200, 'BARABAI', '22BRB'),
(22210, 'RANTAU', '22BRB'),
(22220, 'KANDANGAN', '22BRB'),
(22230, 'AMUNTAI', '22BRB'),
(22240, 'TANJUNG', '22BRB'),
(22250, 'PARINGIN', '22BRB'),
(22260, 'BINUANG', '22BRB'),
(22270, 'DAHA', '22BRB'),
(22300, 'KOTABARU', '22KTB'),
(22320, 'BT LICIN', '22KTB'),
(22330, 'SATUI', '22KTB'),
(22400, 'P RAYA TIMUR', '22PRY'),
(22410, 'P RAYA BARAT', '22PRY'),
(22420, 'KASONGAN', '22PRY'),
(22430, 'K KURUN', '22PRY'),
(22440, 'SAMPIT', '22PRY'),
(22450, 'P BUN', '22PRY'),
(22460, 'NANGA BULIK', '22PRY'),
(22470, 'SUKAMARA', '22PRY'),
(22480, 'K PEMBUANG', '22PRY'),
(22500, 'KAPUAS', '22KKP'),
(22510, 'P PISAU', '22KKP'),
(22520, 'BUNTOK', '22KKP'),
(22530, 'TAMIYANG L', '22KKP'),
(22540, 'M TEWEH', '22KKP'),
(22550, 'PURUK CAHU', '22KKP');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_tunggakan`
-- (See below for the actual view)
--
CREATE TABLE `view_tunggakan` (
`IDTGK` int(30)
,`UNITAP` varchar(5)
,`UNITUP` int(5)
,`IDPEL` double
,`NAMA` varchar(40)
,`TARIF` varchar(5)
,`DAYA` varchar(10)
,`KOGOL` int(10)
,`GARDU` int(10)
,`ALAMAT` varchar(100)
,`LEMBAR` varchar(5)
,`RPPTL` int(10)
,`RPBPJU` int(10)
,`RPPPN` int(10)
,`RPMAT` int(10)
,`TAGSUS` int(10)
,`UJL` int(10)
,`BP` int(10)
,`TRAFO` int(10)
,`SEWATRAFO` int(10)
,`SEWAKAP` int(10)
,`RPTAG` int(10)
,`RPBK` int(10)
,`TANGGAL_TGK` varchar(20)
,`TGL_MODIFIED` varchar(20)
);

-- --------------------------------------------------------

--
-- Structure for view `view_tunggakan`
--
DROP TABLE IF EXISTS `view_tunggakan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_tunggakan`  AS  select `tb_tunggakan`.`IDTGK` AS `IDTGK`,`tb_pelanggan`.`UNITAP` AS `UNITAP`,`tb_pelanggan`.`UNITUP` AS `UNITUP`,`tb_tunggakan`.`IDPEL` AS `IDPEL`,`tb_pelanggan`.`NAMA_PEL` AS `NAMA`,`tb_pelanggan`.`TARIF` AS `TARIF`,`tb_pelanggan`.`DAYA` AS `DAYA`,`tb_pelanggan`.`KOGOL` AS `KOGOL`,`tb_pelanggan`.`GARDU` AS `GARDU`,`tb_pelanggan`.`ALAMAT` AS `ALAMAT`,`tb_tunggakan`.`LEMBAR` AS `LEMBAR`,`tb_tunggakan`.`RPPTL` AS `RPPTL`,`tb_tunggakan`.`RPBPJU` AS `RPBPJU`,`tb_tunggakan`.`RPPPN` AS `RPPPN`,`tb_tunggakan`.`RPMAT` AS `RPMAT`,`tb_tunggakan`.`TAGSUS` AS `TAGSUS`,`tb_tunggakan`.`UJL` AS `UJL`,`tb_tunggakan`.`BP` AS `BP`,`tb_tunggakan`.`TRAFO` AS `TRAFO`,`tb_tunggakan`.`SEWATRAFO` AS `SEWATRAFO`,`tb_tunggakan`.`SEWAKAP` AS `SEWAKAP`,`tb_tunggakan`.`RPTAG` AS `RPTAG`,`tb_tunggakan`.`RPBK` AS `RPBK`,`tb_tunggakan`.`TGL_AKHIR` AS `TANGGAL_TGK`,`tb_tunggakan`.`TGL_MODIFIED` AS `TGL_MODIFIED` from (`tb_tunggakan` join `tb_pelanggan` on((`tb_pelanggan`.`IDPEL` = `tb_tunggakan`.`IDPEL`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD PRIMARY KEY (`USERNAME`),
  ADD KEY `NIP` (`NIP`);

--
-- Indexes for table `tb_ext_tgk`
--
ALTER TABLE `tb_ext_tgk`
  ADD PRIMARY KEY (`IDTGK`),
  ADD KEY `IDPEL` (`IDPEL`);

--
-- Indexes for table `tb_gmaps`
--
ALTER TABLE `tb_gmaps`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`NIP`),
  ADD KEY `UNITAP` (`UNITAP`),
  ADD KEY `UNITUP` (`UNITUP`);

--
-- Indexes for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`IDPEL`),
  ADD KEY `UNITAP` (`UNITAP`),
  ADD KEY `UNITUP` (`UNITUP`);

--
-- Indexes for table `tb_tunggakan`
--
ALTER TABLE `tb_tunggakan`
  ADD PRIMARY KEY (`IDTGK`),
  ADD KEY `IDPEL` (`IDPEL`);

--
-- Indexes for table `tb_unitap`
--
ALTER TABLE `tb_unitap`
  ADD PRIMARY KEY (`UNITAP`);

--
-- Indexes for table `tb_unitup`
--
ALTER TABLE `tb_unitup`
  ADD PRIMARY KEY (`UNITUP`),
  ADD KEY `UNITAP` (`UNITAP`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_ext_tgk`
--
ALTER TABLE `tb_ext_tgk`
  MODIFY `IDTGK` int(30) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_gmaps`
--
ALTER TABLE `tb_gmaps`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_tunggakan`
--
ALTER TABLE `tb_tunggakan`
  MODIFY `IDTGK` int(30) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_akun`
--
ALTER TABLE `tb_akun`
  ADD CONSTRAINT `tb_akun_ibfk_1` FOREIGN KEY (`NIP`) REFERENCES `tb_pegawai` (`NIP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD CONSTRAINT `tb_pegawai_ibfk_1` FOREIGN KEY (`UNITUP`) REFERENCES `tb_unitup` (`UNITUP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pegawai_ibfk_2` FOREIGN KEY (`UNITAP`) REFERENCES `tb_unitap` (`UNITAP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD CONSTRAINT `tb_pelanggan_ibfk_1` FOREIGN KEY (`UNITAP`) REFERENCES `tb_unitap` (`UNITAP`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pelanggan_ibfk_2` FOREIGN KEY (`UNITUP`) REFERENCES `tb_unitup` (`UNITUP`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_tunggakan`
--
ALTER TABLE `tb_tunggakan`
  ADD CONSTRAINT `tb_tunggakan_ibfk_1` FOREIGN KEY (`IDPEL`) REFERENCES `tb_pelanggan` (`IDPEL`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_unitup`
--
ALTER TABLE `tb_unitup`
  ADD CONSTRAINT `tb_unitup_ibfk_1` FOREIGN KEY (`UNITAP`) REFERENCES `tb_unitap` (`UNITAP`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
