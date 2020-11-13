-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2020 lúc 03:16 AM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel_demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cackhoangphi`
--

CREATE TABLE `cackhoangphi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenkhoangphi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loaiphi` int(11) NOT NULL,
  `sotien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `thangapdung` date NOT NULL,
  `ghichu` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cackhoangphi`
--

INSERT INTO `cackhoangphi` (`id`, `tenkhoangphi`, `loaiphi`, `sotien`, `created_at`, `updated_at`, `thangapdung`, `ghichu`) VALUES
(1, 'Học phí', 1, '10000', NULL, '2020-10-26 12:05:30', '2020-09-10', 'Phải đóng'),
(2, 'Đầu tư', 2, '10000', '2020-10-26 11:16:38', '2020-10-26 12:03:14', '2020-09-17', NULL),
(3, 'Ủng hộ miền trung', 2, '10000', '2020-10-26 11:40:15', '2020-10-26 12:03:02', '2020-10-26', 'Nghèo quá khỏi đóng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chucvu`
--

CREATE TABLE `chucvu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenchucvu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chuthich` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chucvu`
--

INSERT INTO `chucvu` (`id`, `tenchucvu`, `chuthich`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Admin', 'Người Quản trị', NULL, NULL, ''),
(2, 'Giáo viên', 'Giảng dạy', NULL, NULL, ''),
(3, 'Bảo mẫu', 'Chăm sóc ăn uống', NULL, NULL, ''),
(4, 'Cán Bộ Văn Phòng', 'Làm những công việc trong văn phòng', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuclop`
--

CREATE TABLE `danhmuclop` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loptuoi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dotuoi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuclop`
--

INSERT INTO `danhmuclop` (`id`, `loptuoi`, `dotuoi`, `created_at`, `updated_at`) VALUES
(1, 'Chưa xếp lớp', '', NULL, NULL),
(2, 'Mầm', '', NULL, NULL),
(3, 'Chồi ', '', NULL, NULL),
(4, 'Lá', '', NULL, NULL),
(5, 'Kết thúc', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diemdanh`
--

CREATE TABLE `diemdanh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idhs` bigint(20) UNSIGNED NOT NULL,
  `id_lichday` bigint(20) UNSIGNED NOT NULL,
  `chuthich` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diemdanh`
--

INSERT INTO `diemdanh` (`id`, `idhs`, `id_lichday`, `chuthich`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 12, NULL, 1, '2020-09-02 02:20:40', '2020-09-09 07:58:34'),
(2, 1, 12, NULL, 0, '2020-09-08 02:20:40', '2020-10-24 02:20:40'),
(3, 1, 12, NULL, 1, '2020-09-16 08:07:52', '2020-10-24 02:20:40'),
(4, 4, 12, NULL, 1, '2020-09-08 02:20:40', '2020-10-24 02:20:40'),
(5, 5, 12, NULL, 0, '2020-09-09 02:20:40', '2020-10-24 02:20:40'),
(6, 6, 12, NULL, 1, '2020-10-24 02:20:40', '2020-10-24 02:20:40'),
(7, 7, 12, NULL, 1, '2020-10-24 02:20:40', '2020-10-24 02:20:40'),
(8, 1, 12, NULL, 1, '2020-10-28 08:08:10', '2020-10-28 08:08:10'),
(9, 2, 12, NULL, 1, '2020-10-28 08:08:10', '2020-10-28 08:08:10'),
(10, 3, 12, NULL, 1, '2020-10-28 08:08:10', '2020-10-28 08:08:10'),
(11, 4, 12, NULL, 0, '2020-10-28 08:08:10', '2020-10-28 08:08:10'),
(12, 5, 12, NULL, 1, '2020-10-28 08:08:10', '2020-10-28 08:08:10'),
(13, 6, 12, NULL, 1, '2020-10-28 08:08:10', '2020-10-28 08:08:10'),
(14, 7, 12, NULL, 1, '2020-10-28 08:08:10', '2020-10-28 08:08:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dongtien`
--

CREATE TABLE `dongtien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idhs` bigint(20) UNSIGNED NOT NULL,
  `idphi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`idphi`)),
  `idcanbo` bigint(20) UNSIGNED NOT NULL,
  `tongtien` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dongtien`
--

INSERT INTO `dongtien` (`id`, `idhs`, `idphi`, `idcanbo`, `tongtien`, `created_at`, `updated_at`) VALUES
(1, 1, '1', 2, '100000', '2020-09-09 07:08:48', NULL),
(2, 2, '1', 2, '20000', '2020-10-13 02:15:16', NULL),
(4, 1, '[\"1\",\"2\"]', 2, '30000', '2020-10-28 07:32:55', '2020-10-28 07:32:55'),
(5, 4, '[\"1\",\"2\"]', 2, '20000', '2020-10-28 08:09:53', '2020-10-28 08:09:53'),
(6, 1, '[\"3\"]', 2, '10000', '2020-11-13 01:37:20', '2020-11-13 01:37:20');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mataikhoan` bigint(20) UNSIGNED NOT NULL,
  `hovaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh` int(11) NOT NULL,
  `ngaysinh` date NOT NULL,
  `cmnd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bangcap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dantoc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tongiao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngayvaotruong` date DEFAULT NULL,
  `hokhau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(10) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giaovien`
--

INSERT INTO `giaovien` (`id`, `mataikhoan`, `hovaten`, `gioitinh`, `ngaysinh`, `cmnd`, `email`, `sdt`, `bangcap`, `created_at`, `updated_at`, `diachi`, `dantoc`, `tongiao`, `ngayvaotruong`, `hokhau`, `status`) VALUES
(2, 5, 'ádas', 1, '1997-01-10', '123123121', 'giaovien2@gmail.com', '0961612308', 'ádasd', '2020-10-05 20:16:44', '2020-10-06 20:59:45', '53 đường số 1', 'ád', 'ádasd', '1970-01-01', 'ádasd', 1),
(4, 7, 'Trần Tuấn Kiệt', 1, '1997-10-07', '123456789', 'giaovien1@gmail.com', '0961612308', 'Đại học', '2020-10-05 21:01:30', '2020-10-05 21:01:30', 'Nhà', 'Kinh', 'Phật', '2020-06-10', 'Nhà', 1),
(5, 10, 'Nguyễn Thị Thanh Lệ', 0, '1968-08-10', '123456789', 'thanhlehh@gmail.com', '0934130497', 'Đại học', '2020-10-06 02:07:44', '2020-10-06 02:07:44', 'tphcm', 'Kinh', 'Phật', '1970-01-01', 'tphcm', 1),
(6, 11, 'Trần Ngọc Bình', 1, '1960-10-23', '123456789', 'ngocbinh@gmail.com', '0961612308', 'Lái xe', '2020-10-06 02:19:35', '2020-10-06 03:10:05', 'Nhà', 'Kinh', 'Phật', '2020-10-10', 'Nhà', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoatdong`
--

CREATE TABLE `hoatdong` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `iddm` bigint(20) UNSIGNED NOT NULL,
  `tenhoatdong` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaygiangday` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ghichu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ngayketthuc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoatdong`
--

INSERT INTO `hoatdong` (`id`, `iddm`, `tenhoatdong`, `ngaygiangday`, `ghichu`, `created_at`, `updated_at`, `ngayketthuc`) VALUES
(1, 3, 'Âm Nhạc', '2,3,4,5,6', 'Hát ca', NULL, '2020-11-09 02:21:45', '2020-11-30'),
(3, 2, 'Âm nhạc', '', NULL, NULL, NULL, '2020-11-07'),
(9, 4, 'Âm Nhạc', '6,1,3', NULL, '2020-11-06 02:22:54', '2020-11-06 02:22:54', '2020-12-10'),
(10, 3, 'Hát Ca', '1,2,5', NULL, '2020-11-06 02:23:22', '2020-11-06 02:23:22', '2020-11-10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocsinh`
--

CREATE TABLE `hocsinh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hovaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` int(11) NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngayvaotruong` date NOT NULL,
  `tinhtrangsuckhoe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hokhauthuongtru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hokhautamtru` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dantoc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tongiao` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `malophoc` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `tenthuonggoi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hocsinh`
--

INSERT INTO `hocsinh` (`id`, `hovaten`, `ngaysinh`, `gioitinh`, `diachi`, `ngayvaotruong`, `tinhtrangsuckhoe`, `created_at`, `updated_at`, `hokhauthuongtru`, `hokhautamtru`, `dantoc`, `tongiao`, `malophoc`, `tenthuonggoi`) VALUES
(1, 'Nguyễn Văn A', '1970-01-01', 1, 'ádasd', '1970-01-01', 'Rất tốt', '2020-09-25 07:21:15', '2020-10-21 23:06:19', 'ádasd', 'ádasdas', 'ádasdasd', NULL, 24, 'Nam'),
(2, 'Nguyễn Văn B', '2020-09-09', 1, 'ádasd', '2020-11-09', 'ádasd', '2020-09-25 07:33:28', '2020-10-21 23:06:19', 'ádasd', 'ádasdas', 'ádasdasd', NULL, 24, ''),
(3, 'Nguyễn Văn C', '2020-09-09', 1, 'ádasd', '2020-11-09', 'ádasd', '2020-09-25 07:34:37', '2020-10-21 23:06:19', 'ádasd', 'ádasdas', 'ádasdasd', NULL, 24, ''),
(4, 'Trần Văn D', '2020-09-09', 1, 'ádasd', '2020-10-09', 'ádasd', '2020-09-25 07:41:49', '2020-10-21 23:06:19', 'ádasd', 'ádasd', 'ádasd', 'ádasd', 24, ''),
(5, 'ádasd', '2020-09-09', 1, 'ádasd', '2020-10-09', 'ádasd', '2020-09-25 07:43:03', '2020-10-21 23:06:19', 'ádasd', 'ádasd', 'ádasd', 'ádasd', 24, ''),
(6, 'ádasd', '2020-09-02', 1, 'ádasd', '2020-07-09', 'ád', '2020-09-26 03:22:24', '2020-10-21 23:06:27', 'ádasd', NULL, 'ádasd', NULL, 24, 'ádasdasd'),
(7, 'ádasd', '2020-09-02', 1, 'ádasd', '2020-07-09', 'ád', '2020-09-26 03:23:22', '2020-10-21 23:06:27', 'ádasd', NULL, 'ádasd', NULL, 24, 'ádasdasd'),
(8, 'ádasd', '2020-09-02', 1, 'ádasd', '1970-01-01', 'ád', '2020-09-26 04:43:24', '2020-11-03 06:08:53', 'ádasd', NULL, 'Kinh', NULL, 27, 'Nghĩa tử'),
(9, 'ádasd', '2020-09-02', 1, 'ádasd', '1970-01-01', 'ád', '2020-09-26 04:43:29', '2020-09-30 04:24:05', 'ádasd', NULL, 'Kinh', NULL, 1, 'Nghĩa tử'),
(10, 'ádasd', '2020-09-09', 1, 'ádasd', '2020-10-09', 'ádasd', '2020-09-26 04:48:00', '2020-09-30 04:23:55', 'ádasd', 'ádasdasd', 'ádasd', 'ádasdasd', 1, 'ádasd'),
(11, 'ádasd', '2020-09-09', 1, 'ádasd', '1970-01-01', 'ádasd', '2020-09-26 04:50:28', '2020-09-27 19:02:36', 'ádasd', 'ádasdasd', 'ádasd', 'Phật', 1, 'ádasd');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichday`
--

CREATE TABLE `lichday` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idgv` bigint(20) UNSIGNED NOT NULL,
  `idlophoc` bigint(20) UNSIGNED NOT NULL,
  `ngayday` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`ngayday`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lichday`
--

INSERT INTO `lichday` (`id`, `idgv`, `idlophoc`, `ngayday`, `created_at`, `updated_at`) VALUES
(12, 4, 24, '[\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"]', '2020-10-21 23:07:02', '2020-11-06 05:18:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophoc`
--

CREATE TABLE `lophoc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `madanhmuclop` bigint(20) UNSIGNED NOT NULL,
  `tenlop` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `soluong` int(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lophoc`
--

INSERT INTO `lophoc` (`id`, `madanhmuclop`, `tenlop`, `soluong`, `created_at`, `updated_at`) VALUES
(1, 1, 'Chưa phân lớp', 1000000000, NULL, NULL),
(24, 3, 'Chồi 1', 20, '2020-10-21 20:17:38', '2020-10-21 23:05:55'),
(25, 2, 'Chồi 2', 100, '2020-10-21 20:18:55', '2020-10-21 20:18:55'),
(27, 4, 'Lá 4', 20, '2020-11-03 05:27:02', '2020-11-03 05:27:02'),
(28, 5, 'Ra Trường', 1000000, '2020-11-03 06:09:45', '2020-11-03 06:10:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_09_15_012656_n_knhaphoc', 2),
(5, '2020_09_22_041807_create_hocsinh', 3),
(6, '2020_09_23_020734_phuhuynh', 4),
(7, '2020_09_24_045002_createphuhuynh', 5),
(8, '2020_09_25_120728_edithocsinh', 6),
(9, '2020_09_25_121431_edithocsinh', 7),
(10, '2020_09_26_085555_addmalop', 8),
(11, '2020_09_26_085749_taolophoc', 9),
(12, '2020_09_26_090110_addlophoc', 10),
(13, '2020_09_26_090240_addkhoaphu', 11),
(14, '2020_09_26_093010_addlophoc', 12),
(15, '2020_09_26_093743_taolophoc', 13),
(16, '2020_09_26_093931_addkhoaphu', 13),
(17, '2020_09_26_094736_addkhoaphuhocsinh', 14),
(18, '2020_09_26_100954_addanhchi', 15),
(19, '2020_10_05_111815_chucvu', 16),
(21, '2020_10_06_015406_addstatus', 17),
(22, '2020_10_07_125200_lichday', 18),
(23, '2020_10_08_015451_diemdanh', 19),
(24, '2020_10_15_041801_addlichday', 20),
(27, '2020_10_20_040248_creatediemdanh', 21),
(28, '2020_10_24_092342_cackhoanphi', 22),
(29, '2020_10_24_092348_dadongtien', 22),
(30, '2020_10_25_202719_addmonth', 23),
(32, '2020_11_04_161401_createhoatdong', 24),
(33, '2020_11_06_153233_createreport', 25),
(34, '2020_11_09_083236_adddateend', 26);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nknhaphoc`
--

CREATE TABLE `nknhaphoc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenhs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `gioitinh` int(11) NOT NULL,
  `hokhau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suckhoehientai` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotenbo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdtbo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailbo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hotenme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdtme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hovatenph` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdtph` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailph` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trangthai` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nknhaphoc`
--

INSERT INTO `nknhaphoc` (`id`, `tenhs`, `ngaysinh`, `gioitinh`, `hokhau`, `diachi`, `suckhoehientai`, `hotenbo`, `sdtbo`, `emailbo`, `hotenme`, `sdtme`, `emailme`, `hovatenph`, `sdtph`, `emailph`, `trangthai`, `created_at`, `updated_at`) VALUES
(1, 'ádasd', '1970-01-01', 1, 'ádasd', 'ádasd', 'ádasd', 'ádasd', 'ádasd', 'ádasd', 'ádasd', 'ádasdasd', 'ádasdasd', '', '', '', '2', '2020-09-15 02:41:01', '2020-09-30 05:10:29'),
(2, 'ádasd', '1970-01-01', 1, 'ádasd', 'ádasd', 'ádasd', 'ádasd', 'ádasd', 'ádasd', 'ádasd', 'ádasdasd', 'ádasdasd', '', '', '', '2', '2020-09-15 02:47:31', '2020-09-21 21:06:15'),
(3, 'ádasdasd', '1970-01-01', 0, 'ádasdasd', 'ádasdsad', 'ádasdasd', 'ádasd', 'ádasd', 'ádasd', 'ádasd', 'ádasdas', 'ádasdasd', '', '', '', '1', '2020-09-15 02:54:09', '2020-09-19 03:03:57'),
(4, '123123', '1970-01-01', 1, '123123', 'ádasd', 'ádasd', 'ád', 'ádasd', 'ádasd', 'ádasd', 'ádasd', 'ádasd', '', '', '', '1', '2020-09-15 03:25:24', '2020-09-19 03:24:17'),
(5, 'Trần Tuấn Kiệt', '1970-01-01', 1, 'ádasd', 'ádasd', 'ádasd', 'ádasd', '0961612308', 'trantuankiet071097@gmail.com', 'ádasd', '0935612795', 'trantuankiet071097@gmail.com', '', '', '', '1', '2020-09-16 20:27:27', '2020-09-19 03:31:50'),
(6, 'ádaws', '2020-02-09', 0, 'ádasd', 'ádasd', 'ádasd', '', '', '', '', '', '', 'ádasd', 'ádasda', 'ádasd', '1', '2020-09-16 20:29:25', '2020-09-18 02:23:22'),
(7, 'ádasdasd', '2020-01-09', 1, 'ádasd', 'ádasda', 'ádasd', 'ádasd', '0961612308', 'trantuankiet071097@gmail.com', 'ádasd', '0961612308', 'trantuankiet071097@gmail.com', '', '', '', '1', '2020-09-16 21:08:01', '2020-09-19 03:10:39'),
(8, 'ádasd', '2020-09-09', 1, 'ádasd', 'ádasd', 'ádasd', '', '', '', '', '', '', 'Tràn tuấn kiệt', '0961612308', 'trantuankiet071097@gmail.com', '1', '2020-09-16 21:26:06', '2020-09-18 02:27:12'),
(9, 'ádasd', '2020-09-09', 1, 'ádasd', 'ádasd', 'ádasd', '', '', '', '', '', '', 'Tràn tuấn kiệt', '0961612308', 'trantuankiet071097@gmail.com', '1', '2020-09-16 21:26:16', '2020-09-19 03:16:26'),
(10, 'ádasd', '2020-09-09', 1, 'ádasd', 'ádasd', 'ádasd', '', '', '', '', '', '', 'Tràn tuấn kiệt', '0961612308', 'trantuankiet071097@gmail.com', '3', '2020-09-16 21:26:39', '2020-09-26 04:50:28'),
(11, 'ádasd', '2020-09-09', 1, 'ádasd', 'ádasd', 'ádasd', '', '', '', '', '', '', 'Tràn tuấn kiệt', '0961612308', 'trantuankiet071097@gmail.com', '3', '2020-09-16 22:38:43', '2020-09-26 04:48:00'),
(12, 'ádasd', '2020-02-09', 1, 'ádasd', 'ádasd', 'ád', '', '', '', '', '', '', 'ádasd', '0961612308', 'trantuankiet071097@gmail.com', '3', '2020-09-17 01:04:41', '2020-09-26 04:43:29'),
(13, 'ádasd', '2020-10-09', 1, 'ádasd', 'ádasd', 'ádas', '', '', '', '', '', '', 'ádas', '0961612308', 'trantuankiet071097@gmail.com', '0', '2020-09-17 01:10:45', '2020-09-17 01:10:45'),
(14, 'ádasd', '2020-10-09', 1, 'ádasd', 'ádasd', 'ádas', '', '', '', '', '', '', 'ádas', '0961612308', 'trantuankiet071097@gmail.com', '0', '2020-09-17 01:11:27', '2020-09-17 01:11:27'),
(15, 'ádasd', '2020-10-09', 1, 'ádasd', 'ádasd', 'ádas', '', '', '', '', '', '', 'ádas', '0961612308', 'trantuankiet071097@gmail.com', '0', '2020-09-17 01:12:10', '2020-09-17 01:12:10'),
(16, 'ádasd', '2020-10-09', 1, 'ádasd', 'ádasd', 'ádas', '', '', '', '', '', '', 'ádas', '0961612308', 'trantuankiet071097@gmail.com', '0', '2020-09-17 01:12:34', '2020-09-17 01:12:34'),
(17, 'ádasd', '2020-10-09', 1, 'ádasd', 'ádasd', 'ádas', '', '', '', '', '', '', 'ádas', '0961612308', 'trantuankiet071097@gmail.com', '0', '2020-09-17 01:14:32', '2020-09-17 01:14:32'),
(18, 'ádasd', '2020-10-09', 1, 'ádasd', 'ádasd', 'ádas', '', '', '', '', '', '', 'ádas', '0961612308', 'trantuankiet071097@gmail.com', '0', '2020-09-17 01:15:24', '2020-09-17 01:15:24'),
(19, 'ádasd', '2020-10-09', 1, 'ádasd', 'ádasd', 'ádas', '', '', '', '', '', '', 'ádas', '0961612308', 'trantuankiet071097@gmail.com', '0', '2020-09-17 01:18:34', '2020-09-17 01:18:34'),
(20, 'ádasd', '2020-10-09', 1, 'ádasd', 'ádasd', 'ádas', '', '', '', '', '', '', 'ádas', '0961612308', 'trantuankiet071097@gmail.com', '0', '2020-09-17 01:22:23', '2020-09-17 01:22:23'),
(21, 'ádasd', '2020-10-09', 1, 'ádasd', 'ádasd', 'ádas', '', '', '', '', '', '', 'ádas', '0961612308', 'trantuankiet071097@gmail.com', '0', '2020-09-17 01:22:34', '2020-09-17 01:22:34'),
(22, 'ádsadas', '1970-01-01', 0, 'ádasd', 'ádasd', 'ádasd', '', '', '', '', '', '', 'ádasd', '0961612308', 'trantuankiet071097@gmail.com', '0', '2020-09-17 19:00:04', '2020-09-17 19:00:04'),
(23, 'ádasdas', '1970-01-01', 1, 'ádasd', 'ádasd', 'ádasd', '', '', '', '', '', '', 'ádasd', '0961612308', 'trantuankiet071097@gmail.com', '0', '2020-09-17 19:00:34', '2020-09-17 19:00:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phuhuynh`
--

CREATE TABLE `phuhuynh` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mahs` bigint(20) UNSIGNED NOT NULL,
  `hovaten` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quanhe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ngaysinh` date DEFAULT NULL,
  `nghenghiep` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tendonvi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phuhuynh`
--

INSERT INTO `phuhuynh` (`id`, `mahs`, `hovaten`, `sdt`, `email`, `quanhe`, `ngaysinh`, `nghenghiep`, `tendonvi`, `created_at`, `updated_at`) VALUES
(1, 1, 'Tràn tuấn kiệt', '0961612308', 'trantuankiet071097@gmail.com', 'bố', '2020-10-09', 'ádaádasd', NULL, '2020-09-25 07:43:03', '2020-09-25 07:43:03'),
(2, 7, 'alsdhjkasj', NULL, NULL, 'Anh/Chị', NULL, NULL, NULL, '2020-09-26 03:23:22', '2020-09-26 03:23:22'),
(3, 7, 'ádasd', '0961612308', 'trantuankiet071097@gmail.com', 'Ba', '2020-10-09', 'ádasd', NULL, '2020-09-26 03:23:22', '2020-09-26 03:23:22'),
(4, 8, 'ádasd', '0961612308', 'trantuankiet071097@gmail.com', 'Dì', '2020-08-09', 'ádasd', NULL, '2020-09-26 04:43:24', '2020-09-26 04:43:24'),
(5, 9, 'ádasd', '0961612308', 'trantuankiet071097@gmail.com', 'Dì', '2020-08-09', 'ádasd', NULL, '2020-09-26 04:43:29', '2020-09-26 04:43:29'),
(6, 10, 'Tràn tuấn kiệt', '0961612308', 'trantuankiet071097@gmail.com', 'cậu', '2020-03-09', 'ádasdasd', NULL, '2020-09-26 04:48:00', '2020-09-26 04:48:00'),
(7, 11, 'Tràn tuấn kiệt', '0961612308', 'trantuankiet071097@gmail.com', 'Chú', '2020-09-09', 'ádasd', NULL, '2020-09-26 04:50:28', '2020-09-26 04:50:28');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `report`
--

CREATE TABLE `report` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idgv` bigint(20) UNSIGNED NOT NULL,
  `idhd` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nhanxet` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `report`
--

INSERT INTO `report` (`id`, `idgv`, `idhd`, `status`, `noidung`, `created_at`, `updated_at`, `nhanxet`) VALUES
(1, 4, 1, 1, '<p>Các bé hát rất hay</p>', '2020-11-06 08:56:05', '2020-11-12 06:29:06', '<p>Có tiến bộ vượt bậc quá trời</p>'),
(2, 4, 10, 0, '<p>Hát hay quá chời. Ca sĩ</p>', '2020-11-06 09:03:06', '2020-11-06 09:20:10', '<p>Có tiến bộ vượt bậc quá trời luôn á</p>'),
(3, 4, 1, 1, '<p>Ca múa quá trời quá đất</p>', '2020-11-12 08:31:27', '2020-11-12 08:31:27', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `level`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$osBQLvdV804alOefq5T3a.N8IZEXRXcyNqURxwv2dRnxVEHHgM5pm', 1, '1', NULL, NULL, '2020-11-04 04:44:41'),
(5, 'ádas', 'giaovien2@gmail.com', NULL, '$2y$10$3P3QZZ4b2N7/AdI2YGKY0.fzfvSwDMHWyxx2/C1JfT5AAy4ab8wr2', 2, '0', NULL, '2020-10-05 20:16:44', '2020-10-06 20:33:06'),
(7, 'Trần Tuấn Kiệt', 'giaovien1@gmail.com', NULL, '$2y$10$mm6yfLtnQWE2sCzIEmTq7eusoq3py4.KJil7U9clc/DqDY6LmWpgq', 2, '1', NULL, '2020-10-05 21:01:30', '2020-10-05 21:01:30'),
(8, 'ádasdasd', 'alalsjd@gmail.com', NULL, '$2y$10$H7tDm6MRK.41IxKeqPt2IucP/GDzw/78U9SrkbnZU5HlKjveFQ2YG', 2, '1', NULL, '2020-10-06 01:46:58', '2020-10-06 01:46:58'),
(9, 'Nguyễn Thị Thanh Lệ', 'thanhle@gmail.com', NULL, '$2y$10$MFH1i22oL634s/65qLjtD.0UgR0Wd2LaL3FMBsg3o6RgDEq9gG1ay', 2, '1', NULL, '2020-10-06 01:52:59', '2020-10-06 01:52:59'),
(10, 'Nguyễn Thị Thanh Lệ', 'thanhlehh@gmail.com', NULL, '$2y$10$Dd9NjGBmtXMPG6nmMWXxWu0Ia4LW.sy.XRKR6EHm.xPbOrX5ChF/W', 2, '1', NULL, '2020-10-06 02:07:44', '2020-10-06 02:07:44'),
(11, 'Trần Ngọc Bình', 'ngocbinh@gmail.com', NULL, '$2y$10$rj5Aa4eFT.7H9TdSM0P7QOwgAj2Qg9/OPiAVjq7iZMady6l1g8Hsy', 3, '1', NULL, '2020-10-06 02:19:35', '2020-10-06 20:02:54');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_chucvu`
--

CREATE TABLE `user_chucvu` (
  `magv` bigint(20) UNSIGNED NOT NULL,
  `macv` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cackhoangphi`
--
ALTER TABLE `cackhoangphi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `danhmuclop`
--
ALTER TABLE `danhmuclop`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `diemdanh`
--
ALTER TABLE `diemdanh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diemdanh_id_lichday_foreign` (`id_lichday`),
  ADD KEY `diemdanh_idhs_foreign` (`idhs`);

--
-- Chỉ mục cho bảng `dongtien`
--
ALTER TABLE `dongtien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dongtien_idhs_foreign` (`idhs`),
  ADD KEY `dongtien_idcanbo_foreign` (`idcanbo`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mataikhoan` (`mataikhoan`);

--
-- Chỉ mục cho bảng `hoatdong`
--
ALTER TABLE `hoatdong`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UQ_active` (`iddm`,`tenhoatdong`);

--
-- Chỉ mục cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hocsinh_malophoc_foreign` (`malophoc`);

--
-- Chỉ mục cho bảng `lichday`
--
ALTER TABLE `lichday`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lichday_idgv_foreign` (`idgv`),
  ADD KEY `lichday_idlophoc_foreign` (`idlophoc`);

--
-- Chỉ mục cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UC_lophoc` (`tenlop`),
  ADD KEY `lophoc_madanhmuclop_foreign` (`madanhmuclop`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nknhaphoc`
--
ALTER TABLE `nknhaphoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `phuhuynh`
--
ALTER TABLE `phuhuynh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `phuhuynh_mahs_foreign` (`mahs`);

--
-- Chỉ mục cho bảng `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `report_idgv_foreign` (`idgv`),
  ADD KEY `report_idhd_foreign` (`idhd`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `level` (`level`);

--
-- Chỉ mục cho bảng `user_chucvu`
--
ALTER TABLE `user_chucvu`
  ADD PRIMARY KEY (`magv`,`macv`),
  ADD KEY `macv` (`macv`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cackhoangphi`
--
ALTER TABLE `cackhoangphi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `danhmuclop`
--
ALTER TABLE `danhmuclop`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `diemdanh`
--
ALTER TABLE `diemdanh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `dongtien`
--
ALTER TABLE `dongtien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `hoatdong`
--
ALTER TABLE `hoatdong`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `lichday`
--
ALTER TABLE `lichday`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `nknhaphoc`
--
ALTER TABLE `nknhaphoc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `phuhuynh`
--
ALTER TABLE `phuhuynh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `report`
--
ALTER TABLE `report`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `diemdanh`
--
ALTER TABLE `diemdanh`
  ADD CONSTRAINT `diemdanh_id_lichday_foreign` FOREIGN KEY (`id_lichday`) REFERENCES `lichday` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `diemdanh_idhs_foreign` FOREIGN KEY (`idhs`) REFERENCES `hocsinh` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dongtien`
--
ALTER TABLE `dongtien`
  ADD CONSTRAINT `dongtien_idcanbo_foreign` FOREIGN KEY (`idcanbo`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `dongtien_idhs_foreign` FOREIGN KEY (`idhs`) REFERENCES `hocsinh` (`id`);

--
-- Các ràng buộc cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD CONSTRAINT `giaovien_ibfk_1` FOREIGN KEY (`mataikhoan`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `hoatdong`
--
ALTER TABLE `hoatdong`
  ADD CONSTRAINT `hoatdong_iddm_foreign` FOREIGN KEY (`iddm`) REFERENCES `danhmuclop` (`id`);

--
-- Các ràng buộc cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD CONSTRAINT `hocsinh_malophoc_foreign` FOREIGN KEY (`malophoc`) REFERENCES `lophoc` (`id`);

--
-- Các ràng buộc cho bảng `lichday`
--
ALTER TABLE `lichday`
  ADD CONSTRAINT `lichday_idgv_foreign` FOREIGN KEY (`idgv`) REFERENCES `giaovien` (`id`),
  ADD CONSTRAINT `lichday_idlophoc_foreign` FOREIGN KEY (`idlophoc`) REFERENCES `lophoc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD CONSTRAINT `lophoc_madanhmuclop_foreign` FOREIGN KEY (`madanhmuclop`) REFERENCES `danhmuclop` (`id`);

--
-- Các ràng buộc cho bảng `phuhuynh`
--
ALTER TABLE `phuhuynh`
  ADD CONSTRAINT `phuhuynh_mahs_foreign` FOREIGN KEY (`mahs`) REFERENCES `hocsinh` (`id`);

--
-- Các ràng buộc cho bảng `report`
--
ALTER TABLE `report`
  ADD CONSTRAINT `report_idgv_foreign` FOREIGN KEY (`idgv`) REFERENCES `giaovien` (`id`),
  ADD CONSTRAINT `report_idhd_foreign` FOREIGN KEY (`idhd`) REFERENCES `hoatdong` (`id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`level`) REFERENCES `chucvu` (`id`);

--
-- Các ràng buộc cho bảng `user_chucvu`
--
ALTER TABLE `user_chucvu`
  ADD CONSTRAINT `user_chucvu_ibfk_1` FOREIGN KEY (`magv`) REFERENCES `giaovien` (`id`),
  ADD CONSTRAINT `user_chucvu_ibfk_2` FOREIGN KEY (`macv`) REFERENCES `chucvu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
