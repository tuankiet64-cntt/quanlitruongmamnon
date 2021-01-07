-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 07, 2021 lúc 02:58 AM
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
-- Cấu trúc bảng cho bảng `cackhoangchi`
--

CREATE TABLE `cackhoangchi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenkhoangchi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idgv` bigint(20) UNSIGNED NOT NULL,
  `sotien` int(11) NOT NULL,
  `ghichu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cackhoangchi`
--

INSERT INTO `cackhoangchi` (`id`, `tenkhoangchi`, `idgv`, `sotien`, `ghichu`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Vật liệu', 6, 1000000, NULL, 1, '2020-12-11 02:25:56', '2020-12-15 04:49:01'),
(2, 'Tu sửa', 6, 10000000, NULL, 1, '2020-11-11 04:58:47', '2020-12-15 04:58:47'),
(3, 'Cho quà thầy cô', 6, 1000000, NULL, 1, '2020-10-14 05:04:55', '2020-12-15 05:04:55'),
(4, 'Quà trì ân', 6, 10000000, NULL, 2, '2020-09-11 05:05:11', '2020-12-15 05:05:11');

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
(3, 'Ủng hộ miền trung', 2, '10000', '2020-10-26 11:40:15', '2020-10-26 12:03:02', '2020-10-26', 'Nghèo quá khỏi đóng'),
(4, 'Học phí', 1, '1000000', '2021-01-05 02:20:19', '2021-01-05 02:29:23', '2020-12-05', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `checkin`
--

CREATE TABLE `checkin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idgv` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `checkin`
--

INSERT INTO `checkin` (`id`, `idgv`, `created_at`, `updated_at`, `trangthai`) VALUES
(2, 2, '2020-12-05 08:09:33', '2020-12-07 15:14:43', 0),
(3, 6, '2020-12-05 08:09:33', '2020-12-05 08:09:33', 1),
(4, 2, '2020-12-05 08:09:33', '2020-12-07 15:14:49', 1),
(5, 2, '2020-12-05 08:09:33', '2020-12-05 08:09:33', 1),
(6, 2, '2020-12-05 17:00:00', '2020-12-07 14:53:39', 1),
(13, 4, '2020-12-07 15:51:04', '2020-12-07 15:51:04', 1),
(14, 4, '2021-01-05 02:14:24', '2021-01-05 02:14:24', 1);

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
(1, 'Chưa xếp lớp', '36 tháng', NULL, NULL),
(2, 'Mầm', '5 tuổi', NULL, NULL),
(3, 'Chồi ', '4 tuổi', NULL, NULL),
(4, 'Lá', '3 tuổi', NULL, NULL),
(5, 'Kết thúc', '7 tuổi', NULL, NULL);

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
(4, 4, 12, NULL, 1, '2020-12-08 02:20:40', '2020-10-24 02:20:40'),
(5, 5, 12, NULL, 0, '2020-12-09 02:20:40', '2020-10-24 02:20:40'),
(8, 1, 12, NULL, 1, '2020-12-28 08:08:10', '2020-10-28 08:08:10'),
(9, 2, 12, NULL, 1, '2020-12-28 08:08:10', '2020-10-28 08:08:10'),
(10, 3, 12, NULL, 1, '2020-12-28 08:08:10', '2020-10-28 08:08:10'),
(11, 4, 12, NULL, 0, '2020-12-28 08:08:10', '2020-10-28 08:08:10'),
(12, 5, 12, NULL, 1, '2020-12-28 08:08:10', '2020-10-28 08:08:10'),
(15, 1, 12, NULL, 1, '2021-01-05 02:19:26', '2021-01-05 02:19:26'),
(16, 2, 12, NULL, 1, '2021-01-05 02:19:26', '2021-01-05 02:19:26'),
(17, 3, 12, NULL, 1, '2021-01-05 02:19:26', '2021-01-05 02:19:26'),
(18, 4, 12, NULL, 1, '2021-01-05 02:19:26', '2021-01-05 02:19:26'),
(19, 5, 12, NULL, 1, '2021-01-05 02:19:26', '2021-01-05 02:19:26');

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
(13, 1, '[\"3\"]', 2, '10000000', '2020-11-21 07:53:15', '2020-11-21 07:53:15'),
(14, 2, '[\"3\"]', 2, '10000000', '2020-11-21 07:54:43', '2020-11-21 07:54:43'),
(15, 3, '[\"3\"]', 2, '100000000', '2020-11-21 07:55:12', '2020-11-21 07:55:12'),
(16, 1, '[\"4\"]', 2, '1000000', '2021-01-05 02:36:12', '2021-01-05 02:36:12');

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
(4, 7, 'Thanh Lệ Nguyễn', 1, '1997-10-23', '123456789', 'giaovien1@gmail.com', '0961612309', 'Đại học', '2020-10-05 21:01:30', '2020-11-20 12:20:12', 'Nhà', 'Kinh', 'Phật', '2020-06-10', 'Nhà', 1),
(5, 10, 'Nguyễn Thị Thanh Lệ', 0, '1968-08-10', '123456789', 'thanhlehh@gmail.com', '0934130497', 'Đại học', '2020-10-06 02:07:44', '2020-10-06 02:07:44', 'tphcm', 'Kinh', 'Phật', '1970-01-01', 'tphcm', 1),
(6, 2, 'Trần Ngọc Bình', 1, '1960-10-23', '123456789', 'ngocbinh@gmail.com', '0961612308', 'Lái xe', '2020-10-06 02:19:35', '2020-10-06 03:10:05', 'Nhà', 'Kinh', 'Phật', '2020-10-10', 'Nhà', 1);

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
(1, 3, 'Âm Nhạc', '2,3,4,5,6', 'Hát ca', NULL, '2020-11-09 02:21:45', '2021-01-01'),
(3, 2, 'Âm nhạc', '', NULL, NULL, NULL, '2020-11-07'),
(9, 4, 'Âm Nhạc', '6,1,3', NULL, '2020-11-06 02:22:54', '2020-11-06 02:22:54', '2021-01-01'),
(10, 4, 'Hát Ca', '1,2,5', NULL, '2020-11-06 02:23:22', '2020-11-06 02:23:22', '2021-02-02');

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
  `tenthuonggoi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hocsinh`
--

INSERT INTO `hocsinh` (`id`, `hovaten`, `ngaysinh`, `gioitinh`, `diachi`, `ngayvaotruong`, `tinhtrangsuckhoe`, `created_at`, `updated_at`, `hokhauthuongtru`, `hokhautamtru`, `dantoc`, `tongiao`, `malophoc`, `tenthuonggoi`) VALUES
(1, 'Nguyễn Văn A', '2020-01-05', 1, 'ádasd', '1970-01-01', 'Rất tốt', '2020-09-25 07:21:15', '2020-10-21 23:06:19', 'ádasd', 'ádasdas', 'ádasdasd', NULL, 24, 'Nam'),
(2, 'Nguyễn Văn B', '2020-10-09', 1, 'Long An', '1970-01-01', 'tốt', '2020-09-25 07:33:28', '2021-01-04 01:45:05', 'Long An', 'Long An', 'Kinh', 'Phật', 24, NULL),
(3, 'Nguyễn Văn C', '2020-09-09', 1, 'Nhà bè', '1970-01-01', 'Tốt', '2020-09-25 07:34:37', '2021-01-04 01:45:25', 'Nhà bè', 'Nhà bè', 'Kinh', NULL, 24, NULL),
(4, 'Trần Văn D', '2020-09-09', 1, 'Long Khánh', '1970-01-01', 'Tốt', '2020-09-25 07:41:49', '2021-01-04 01:45:46', 'Long Khánh', 'Long Khánh', 'Kinh', 'Phật', 24, NULL),
(5, 'Trần Quốc Tuấn', '2020-09-09', 1, 'TPHCM', '1970-01-01', 'Tốt', '2020-09-25 07:43:03', '2021-01-04 01:42:06', 'TPHCM', 'TPHCM', 'Kinh', 'Phật', 24, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichday`
--

CREATE TABLE `lichday` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idgv` bigint(20) UNSIGNED DEFAULT NULL,
  `idlophoc` bigint(20) UNSIGNED NOT NULL,
  `ngayday` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`ngayday`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lichday`
--

INSERT INTO `lichday` (`id`, `idgv`, `idlophoc`, `ngayday`, `created_at`, `updated_at`) VALUES
(12, 4, 24, '[\"1\",\"2\",\"3\",\"4\",\"5\"]', '2020-10-21 23:07:02', '2020-11-17 03:43:18'),
(20, NULL, 27, '[\"4\"]', '2020-11-18 04:31:48', '2020-11-19 04:34:10'),
(22, NULL, 27, '[\"5\",\"6\"]', '2020-11-18 04:34:41', '2020-11-19 04:34:10'),
(23, NULL, 27, '[\"1\",\"2\"]', '2020-11-18 04:42:37', '2020-11-19 04:34:10');

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
(24, 4, 'Chồi 1', 20, '2020-10-21 20:17:38', '2020-11-19 04:19:02'),
(25, 2, 'Chồi 2', 100, '2020-10-21 20:18:55', '2020-10-21 20:18:55'),
(27, 2, 'Lá 4', 20, '2020-11-03 05:27:02', '2020-11-19 04:34:10'),
(28, 5, 'Ra Trường', 1000000, '2020-11-03 06:09:45', '2020-11-03 06:10:35');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luongnv`
--

CREATE TABLE `luongnv` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idgv` bigint(20) UNSIGNED NOT NULL,
  `songaylamviec` int(11) NOT NULL,
  `sotienhangngay` int(11) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `luongnv`
--

INSERT INTO `luongnv` (`id`, `idgv`, `songaylamviec`, `sotienhangngay`, `tongtien`, `created_at`, `updated_at`) VALUES
(1, 5, 28, 10000, 100000, NULL, NULL),
(2, 2, 30, 666666, 20000000, '2020-12-08 03:47:05', '2020-12-08 04:07:32'),
(3, 4, 28, 357142, 10000000, '2020-12-08 03:48:21', '2020-12-08 03:48:21');

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
(34, '2020_11_09_083236_adddateend', 26),
(36, '2020_11_17_084508_add_year', 27),
(37, '2020_11_25_115612_addtintuc', 28),
(39, '2020_12_05_142653_checkin', 29),
(40, '2020_12_07_181229_addstatuschamcong', 30),
(43, '2020_12_08_081203_create_luong', 31),
(44, '2020_12_08_120335_createrecordluong', 32),
(47, '2020_12_15_090331_createtablechi', 33);

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
  `emailbo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hotenme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdtme` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hovatenph` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sdtph` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailph` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trangthai` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nknhaphoc`
--

INSERT INTO `nknhaphoc` (`id`, `tenhs`, `ngaysinh`, `gioitinh`, `hokhau`, `diachi`, `suckhoehientai`, `hotenbo`, `sdtbo`, `emailbo`, `hotenme`, `sdtme`, `emailme`, `hovatenph`, `sdtph`, `emailph`, `trangthai`, `created_at`, `updated_at`) VALUES
(5, 'Trần Tuấn Kiệt', '1970-01-01', 1, 'Vũng Tàu', 'ádasd', 'Tốt', 'Nguyễn VănThanh', '0961612308', 'trantuankiet071097@gmail.com', 'Nguyễn Thị Liên', '0935612795', 'trantuankiet071097@gmail.com', '', '', '', '1', '2020-09-16 20:27:27', '2021-01-07 01:36:57'),
(24, 'Nguyễn Xuân Lan', '1970-01-01', 0, '55 Tuệ tĩnh', '55 Tuệ tĩnh', 'Tốt', 'Nguyễn VănThanh', '0961612308', 'trantuankiet071097@gmail.com', 'Nguyễn Thị Liên', '0934130497', 'trantuankiet071097@gmail.com', '', '', '', '1', '2020-12-16 05:11:09', '2020-12-16 05:40:38'),
(25, 'Nguyễn Minh Ngọc', '1970-01-01', 0, 'Tuệ Tỉnh', '441 Lê văn quới', 'Tốt', 'Nguyễn bé hai', '0961612308', 'trantuankiet071097@gmail.com', 'Nguyễn Thị thúy', '0934130497', 'trantuankiet071097@gmail.com', '', '', '', '0', '2020-12-16 05:43:33', '2020-12-16 05:43:33'),
(26, 'Nguyễn Quốc Hưng', '2020-10-01', 1, '53 đường số 4', 'TPHCM', 'Tốt', 'Nguyễn Phước Khanh', '0912345689', 'trantuankiet071097@gmail.com', 'Nguyễn Mỹ Kim', '0973778923', 'kevintran6266@gmail.com', '', '', '', '1', '2021-01-07 01:30:20', '2021-01-07 01:41:01');

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
(1, 1, 'Tràn tuấn kiệt', '0961612308', 'trantuankiet071097@gmail.com', 'bố', '2020-10-09', 'ádaádasd', NULL, '2020-09-25 07:43:03', '2020-09-25 07:43:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recordluong`
--

CREATE TABLE `recordluong` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `idgv` bigint(20) UNSIGNED NOT NULL,
  `ngaylamviec` int(11) NOT NULL,
  `luongngay` int(11) NOT NULL,
  `tongtien` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `recordluong`
--

INSERT INTO `recordluong` (`id`, `idgv`, `ngaylamviec`, `luongngay`, `tongtien`, `created_at`, `updated_at`) VALUES
(1, 2, 20, 10000, 100000, '2020-12-07 05:10:48', NULL),
(2, 2, 20, 10000, 100000, '2020-11-11 05:10:48', NULL),
(3, 4, 1, 357142, 357142, '2020-12-08 05:47:18', '2020-12-08 05:47:18');

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
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id`, `title`, `description`, `content`, `image_path`, `created_at`, `updated_at`) VALUES
(1, 'MOTHER GOOSE TIME – Chủ đề tháng 4', 'HỌ HÀNG ONG & BƯỚM', '<p>🐝&nbsp;Bọn trẻ nhà Iris sẽ cùng nhau khởi động tháng 4 với chủ đề thật hấp dẫn các bạn nhỏ ONG &amp; BƯỚM. Này nhé,<br />Khám phá cuộc sống của những chú ong. Hoạt động để tạo nên mật ngọt cho đời thế nào nè. Và đừng chủ quan, hãy học hỏi thêm kỹ năng sơ cứu khi bị ong tấn công nhé!<br />🦋&nbsp;Vòng đời của những của loài bướm thì thế nào nhỉ? Từ những chú sâu bò lổm nhổm &ndash; trông có vẻ đáng sợ nhỉ &ndash; hóa thân thành những chú bướm mang những vẻ đẹp từ rực rỡ đến huyền hoặc.<br />Nào, Tháng 4 thật sống động đang chờ các bạn nhỏ. Bắt đầu nhé!</p>', 'images/16080952098.jpg', NULL, '2020-12-16 05:06:49'),
(2, '☀️CÁC BỆNH LIÊN QUAN TỚI NẮNG NÓNG VÀ CÁCH XỬ TRÍ CHO TRẺ', 'ádasd', '<p>⛹️&zwj;♀️Ra mồ hôi nhiều mà không được bù nước đầy đủ có thể dẫn tới mất nước và chuột rút, trong khi cơ thể không thải đủ nhiệt sẽ dẫn tới suy kiệt vì nóng, thậm chí là say nắng cần cấp cứu. Chuột rút, kiệt sức vì nóng hay say nóng thường xuất hiện ở trẻ lớn tham gia hoạt động thể lực kéo dài dưới nắng nóng, ví dụ trong giờ chơi thể thao. Với trẻ nhỏ, bệnh chủ yếu liên quan tới nắng nóng là mất nước.<br />💥&nbsp;Mất nước<br />Trẻ bị mất nước khi lượng dịch thoát ra qua mồ hôi và nước tiểu lớn hơn lượng dịch uống vào. Mất nước ở mức độ nhỏ, kể cả chỉ tương đương 2% cân nặng, cũng có thể ảnh hưởng xấu tới trẻ. Mất nước làm giảm khả năng điều hòa thân nhiệt và do đó làm tăng nguy cơ mắc các bệnh do nắng nóng khác.<br />😥&nbsp;Các biểu hiện của mất nước:<br />+ Môi khô, khát nước, tiểu ít hoặc không tiểu, nước tiểu cô đặc, sẫm màu.<br />+ Khóc không có nước mắt.<br />+ Trẻ quấy khóc, khó chịu.<br />+ Có vẻ ủ rũ, lờ đờ, mệt mỏi.<br />Trường hợp nặng, trẻ có biểu hiện: Mắt trũng, thóp trũng, buồn nôn, nôn, lờ đờ hay hôn mê.<br />➡️&nbsp;Xử trí: Nếu nghi ngờ bé bị thiếu nước, cần chuyển bé vào nơi thoáng mát, cho bé uống nước. Nếu bé không cảm thấy dễ chịu hơn thì cần tìm sự trợ giúp y tế.<br />💥Chuột rút do nóng<br />😥&nbsp;Biểu hiện: Chuột rút do nóng là tình trạng đau cơ hay co cứng cơ, thường xuất hiện ở vùng bụng, cánh tay hay cẳng chân, khi vận động quá mức trong thời tiết nóng. Trẻ hay vã mồ hôi nhiều khi hoạt động mạnh dễ bị chuột rút kiểu này. Ra mồ hôi nhiều khiến cơ thể mất nước và muối, hàm lượng muối thấp trong cơ khiến cơ co rút đau đớn. Chuột rút do nóng cũng có thể là biểu hiện của kiệt sức do nóng.<br />➡️&nbsp;Xử trí:<br />+ Ngừng hoạt động thể lực và ngồi yên ở nơi râm mát.<br />+ Uống nhiều nước.<br />+ Tiếp tục ngừng hoạt động thể lực mạnh trong vòng vài giờ sau khi hết bị chuột rút để tránh rơi vào kiệt sức hay say nắng.<br />+ Tìm trợ giúp y tế nếu tình trạng không cải thiện sau một giờ.<br />💥&nbsp;Kiệt sức do nóng<br />&ndash; Các dấu hiệu cảnh báo:<br />+ Vã mồ hôi như tắm, người nhợt nhạt, chuột rút, mệt mỏi, đau đầu, buồn nôn, nôn, ngất.<br />+ Da lạnh và ẩm ướt.<br />+ Mạch nhanh và yếu<br />+ Thở nhanh và nông.<br />➡️&nbsp;Xử trí<br />+ Nếu không được điều trị, kiệt sức vì nóng có thể tiến triển thành say nắng. Cần tìm trợ giúp y tế nếu tình trạng này không tiến bộ sau một giờ.<br />+ Giúp trẻ hạ thân nhiệt bằng các biện pháp: Cho uống nước mát, tắm nước mát, lau người bằng khăn mát, đưa trẻ tới nơi có quạt mát, điều hòa, mặc quần áo nhẹ nhàng, thoáng mát.<br />💥Say nắng<br />Đây là căn bệnh nghiêm trọng nhất do nắng nóng. Bệnh xuất hiện khi cơ thể không còn khả năng kiểm soát nhiệt độ: Thân nhiệt gia tăng nhanh chóng, ra mồ hôi không đủ để giải tỏa nhiệt, cơ thể không thể tự làm mát. Thân nhiệt có thể lên tới 39,5 độ C hoặc cao hơn trong vòng 10-15 phút. Say nắng có thể dẫn tới tử vong hoặc tàn phế vĩnh viễn nếu không được điều trị cấp cứu kịp thời.<br />😥&nbsp;Các dấu hiệu cảnh báo:<br />+ Thân nhiệt lên cao (trên 39,5 độ C)<br />+ Da nóng, đỏ và khô (không ra mồ hôi)<br />+ Mạch nhanh, mạnh<br />+ Đau đầu nhức nhối<br />+ Chóng mặt<br />+ Buồn nôn<br />+ Mê sảng<br />+ Mất ý thức<br />➡️&nbsp;Xử trí<br />+ Say nắng là tình trạng cấp cứu, có thể dẫn tới tử vong. Khi thấy trẻ có những dấu hiệu nêu trên, cần nhờ người gọi xe cấp cứu trong khi tìm cách hạ thân nhiệt của trẻ.<br />+ Chuyển trẻ tới khu vực râm mát<br />+ Nhanh chóng hạ thân nhiệt của trẻ bằng bất cứ biện pháp nào, ví dụ dùng vòi nước mát hay xô nước mát xối lên người, dùng khăn ướt lau người&hellip; Nếu độ ẩm không khí thấp, cần bọc trẻ trong một tấm vải ướt và mát rồi quạt thật mạnh.<br />+ Theo dõi thân nhiệt và tiếp tục các biện pháp làm mát cho tới khi nhiệt độ xuống còn 38,5 hay 39 độ C.<br />Nguồn: tuoitre.vn</p>', 'images/16080951827.jpg', '2020-11-26 04:03:53', '2020-12-16 05:06:22'),
(3, 'Mother Goose Time – Chủ đề tháng 11', 'NHỮNG NGƯỜI PHỤC VỤ CỘNG ĐỒNG', '<p>👩&zwj;🏫Tháng 11 này các bạn nhỏ sẽ rất hãnh diện đảm nhận vai trò mới khi lên chức cảnh sát trưởng, trở thành lính cứu hỏa hay một người tài xế xe buýt. Đó là những nhân vật sinh ra để phục vụ cộng đồng.<br />👮&zwj;♂️Qua những bài học này, trẻ sẽ hiểu rõ về những người làm những công việc bảo vệ cuộc sống an toàn cho mọi người, những người giúp cho các thế hệ luôn học hỏi và phát triển.</p><p>👨&zwj;🏫&nbsp;Trẻ sẽ học cách biết ơn về tất cả các công việc mọi người làm trong cộng đồng của chúng ta.</p><p>Và cũng trong tháng này, ngày 20/11 &ndash; Ngày Nhà Giáo Việt Nam cũng sẽ là một chủ đề rất phù hợp để trẻ học hỏi, hiểu biết rõ hơn về công việc &ldquo;trồng người&rdquo;.</p>', 'images/16080951106.jpg', '2020-11-26 04:10:26', '2020-12-16 05:05:10'),
(4, 'Tri ân thầy cô – Dạy trẻ cách tặng quà 20/11', 'Hãy dạy con lòng biết ơn thầy cô qua cách tặng quà 20/11', '<p>Tặng quà các giáo viên của con là việc không xấu, tuy nhiên, cách tặng quà của phụ huynh ngày nay mới là điều cần phải xem lại, khi mà vào những dịp đặc biệt này, phụ huynh thay con chọn và mang quà tặng thầy cô, còn chính các bé, những người cần tôn vinh và bày tỏ lòng biết ơn đến những người dạy dỗ mình thì vẫn thản nhiên như không có chuyện gì xảy ra.</p><p>Tại một số trường mầm non, nhằm muốn các bé hiểu ý nghĩa ngày 20/11, các giáo viên đã tổ chức cho các bé vẽ tranh hoặc sáng tác thơ ca, viết truyện&hellip; để tặng thầy cô giáo đang dạy dỗ mình.</p><p>Ngoài ra, các bé còn được tham gia các hoạt động cùng giáo viên như thi cắm hoa, thi nấu ăn hay thi tỉa hoa quả&hellip; vào những dịp như thế này.</p><p>Tuy vậy, trách nhiệm của các bậc cha mẹ vẫn là lớn nhất, để giúp con hiểu hơn về ngày lễ của thầy cô, giúp con bày tỏ lòng biết ơn đúng cách đến &ldquo;người lái đò&rdquo;, cha mẹ cần làm những việc sau:</p><p><em>Không thay con tặng quà thầy cô giáo</em></p><p>Hãy chuẩn bị cho con một bó hoa, một bông hoa hoặc một món quà để đích thân con mang đến tặng thầy cô giáo của con.</p><p>Cha mẹ cũng có thể đi cùng con, nhưng hãy để con là nhân vật chính trong sự kiện này.</p><p>Để bày tỏ lòng biết ơn, cha mẹ cũng có thể kèm theo bó hoa, hộp quà chiếc phong bì, điều đó không xấu. Tuy nhiên, không nên để trẻ biết được, hoặc giải thích cho trẻ về chiếc phong bì này có ý nghĩa gì tránh để trẻ nghĩ rằng thầy cô &ldquo;được nhận tiền&rdquo; của cha mẹ chúng.</p><p><em>Giải thích cho con hiểu ý nghĩa của ngày 20/11</em></p><p>Trẻ dù mới lên 2- 3 tuổi cũng nên giải thích cho con hiểu về ý nghĩa ngày này.</p><p>Đối với trẻ còn quá nhỏ, cha mẹ có thể giải thích bằng hình ảnh hoặc những câu chuyện thú vị để trẻ dễ hiểu hơn.</p><p><em>Nói cho con biết về món quà ý nghĩa nhất với thầy cô</em></p><p>Cha mẹ không nên đem quà ra để giải thích cho con rằng, bày tỏ lòng biết ơn thầy cô là phải thể hiện bằng vật chất.</p><p>Hãy nói cho con hiểu rằng, những món quà về vật chất chỉ là hình thức, còn món quà lớn nhất đó là con cần phải chăm ngoan, học giỏi&hellip; mới là sự đền đáp công ơn to lớn của người đã dạy dỗ con.</p><p><em>Không so sánh</em></p><p>Cũng vì đua nhau tặng quà 20/11 theo phong trào nên nhiều phụ huynh có thói quen đón con học về là hỏi con hôm nay có những bạn nào, phụ huynh nào tặng quà cô giáo, tặng quà gì. Điều này vô tình khiến trẻ phải chú ý đến những món quà vật chất của các bạn khác và có thể đem ra so sánh với món quà của mình.</p><p>Trẻ cũng sẽ cảm thấy không tự tin nếu đã tặng cô món quà không được lớn như những bạn khá cùng lớp.</p><p>Nguồn: baomoi.com</p>', 'images/16080950585.jpg', '2020-11-26 04:19:39', '2020-12-16 05:04:18'),
(5, '🌛 BÍ KÍP GIÚP CON TRẺ ỔN ĐỊNH GIẤC NGỦ SAU NHỮNG NGÀY TẾT😴', '🌛 BÍ KÍP GIÚP CON TRẺ ỔN ĐỊNH GIẤC NGỦ SAU NHỮNG NGÀY TẾT😴', '<p>💥Sau kì ngh&zwnj;ỉ Tết dài trẻ bắ&zwnj;t đầu có thói quen ngủ dậy muộn, ít l&zwnj;o lắn&zwnj;g về bà&zwnj;i vở và thoải mái vu&zwnj;i chơi. Đặc biệt là Tết nguyên đán 2020 năm nay, kỳ nghỉ Tết thêm kéo dài do dịch viêm hô hấp cấp virus Corona gây ra. Vậy làm sao để giúp con điều chỉnh lại nhịp sin&zwnj;h học trước khi quay trở lại trường học.<br />🛌 Hãy giúp trẻ dậy sớm hơn.<br />Trước khi trẻ bắ&zwnj;t đầu đi học trở lại sau kỳ ngh&zwnj;ỉ Tết từ 3 đến 4 ngày, bố mẹ cần giúp trẻ điều chỉnh lại giấc ngủ để trẻ có thể bắ&zwnj;t đầu quen lại với việc dậy sớm và không bị kh&zwnj;ó chị&zwnj;u khi phải dậy sớm đi học.<br />Một trong những cách đơn gi&zwnj;ản mà bạn có thể áp dụng: điều chỉnh giờ báo thức mỗi ngày sớm hơn từ 15-20 phú&zwnj;t, đến khi trẻ bắ&zwnj;t đầu quen thì lại tiếp tụ&zwnj;c điều chỉnh giờ sớm hơn cho đến đúng mốc thời gian mà trẻ cần thức dậy để đến trường. Lưu ý, bạn cần phải thật kiên nhẫn: trong những ngày đầu thật sự rất khó để kéo trẻ khỏi chiếc giường ngủ thâ&zwnj;n yê&zwnj;u, nhưng dần dần sau 1-2 ngày trẻ sẽ bắ&zwnj;t đầu quen và nhịp c&zwnj;ơ th&zwnj;ể của trẻ cũng sẽ tự độn&zwnj;g điều chỉnh theo.<br />🛌 Ngủ sớm sẽ dậy sớm<br />Trong những ngày Tết, bố mẹ thường cho con thức khuya hơn để con thoải mái chơi trong những ngày này. Dĩ nhiên, trẻ sẽ chẳng thể dậy sớm nổi nếu đã thức quá khuya vào đêm hôm trước. Chính vì vậy, việc bắ&zwnj;t trẻ đi ngủ đúng giờ cũng là việc cần phải làm để tập lại nhịp sin&zwnj;h hoạt của trẻ. Mẹ cần chú ý đến thời gian &ldquo;ngủ đủ&rdquo; của con và đảm bảo rằng trẻ cần ngủ đủ 8 tiếng vào mỗi đêm. Như vậy, nếu muốn trẻ thức dậy vào lúc 6g sáng thì trẻ cần phải đi ngủ vào 10g tối hôm trước. Cũng như việc dậy sớm, ngủ sớm cũng rất khó thực hiện trong thời gian đầu khi trẻ chưa quen giấc và vẫn còn rất mê chơi khi đến giờ ngủ. Bố mẹ cần nghiêm khắc &ndash; đúng giờ phải đưa trẻ lên giường dù cho trẻ chưa buồ&zwnj;n ngủ, có thể kể chuyện cho trẻ nghe, vỗ về trẻ để giúp trẻ chìm vào giấc ngủ nhanh hơn. Ngủ sớm và dậy sớm sẽ đi đôi cùng nhau, khi trẻ dậy sớm thì trẻ cũng sẽ tự tập thói quen ngủ sớm vì sau một ngày hoạt độn&zwnj;g (khi dậy sớm) c&zwnj;ơ th&zwnj;ể trẻ cũng mệt sớm hơn và trẻ sẽ tự độn&zwnj;g có nhu cầu ngủ sớm hơn.<br />🛌 Đừng để trẻ có thói quen ngủ nướng<br />Ngủ nướng là vẫn cố nằm thêm trên giường dù đã ngủ đủ giấc -đây là thói quen rất xấ&zwnj;u và sẽ rất khó chỉnh về sau. Ngay từ đầu, bố mẹ cần tập cho trẻ thói quen đi ngủ đúng giờ và dậy đúng giờ. Thậm chí, trong dịp lễ tết hay cuối tuần bố mẹ cũng chỉ nên cho trẻ ngủ muộn thêm từ nửa tiếng đến một tiếng mà thôi.<br />🛌 Hãy cùng trẻ tập thể dụ&zwnj;c mỗi sáng<br />Khi bước ra khỏi giường, thường trẻ sẽ rất uể oải và mệt mỏi. Bố mẹ hãy khuyến khích trẻ tập những bà&zwnj;i thể dụ&zwnj;c nhẹ để giúp má&zwnj;u huyết lưu thông cũng như mang lại sự tỉnh táo cho con, sẵn sàng để bắ&zwnj;t đầu một ngày mới. Tập thể dụ&zwnj;c cùng trẻ sẽ giúp con có độn&zwnj;g lực dậy sớm nhiều hơn và tìm thấy niềm vu&zwnj;i trong lịch sin&zwnj;h hoạt lành mạnh mỗi ngày cùng bố mẹ.<br />🛌 Cả nhà hãy cùng ăn sáng ngon khỏe<br />Sau tập thể dụ&zwnj;c, việc ăn sáng tại nhà cũng rất cần thiết để giúp trẻ khởi đầu ngày mới hứng khởi, năng độn&zwnj;g và học tập có kết quả. Không nên cho con b&zwnj;ỏ qua bữa sáng dù đó có là ngày Tết, vì bữa sáng là bữa quan trọng nhất cung cấp năng lượng cho cả một ngày hoạt độn&zwnj;g của con.<br />Nguồn: Sưu Tầm.<br />🤗Với những chia sẻ trên, hy vọng sẽ giúp ba mẹ cải thiện phần nào giấc ngủ cho con trẻ sau những thời gian bị thay đổi trong những ngày tết.</p>', 'images/160639728712.jpg', '2020-11-26 04:26:30', '2020-12-16 05:02:44'),
(6, 'Âm nhạc – Phương pháp tự nhiên đánh thức giác quan của trẻ', 'Âm nhạc – Phương pháp tự nhiên đánh thức giác quan của trẻ', '<p><em><strong>Các nghiên cứu khoa học từ các quốc gia phát triển như Hong Kong, đến Anh, Mỹ, Thụy Điển&hellip; đều chứng minh rằng âm nhạc có ảnh hưởng tích cực đến sự phát triển trí não. Tiếp xúc sớm với thế giới âm nhạc là con đường nhanh chóng để đánh thức các giác quan của trẻ một cách tự nhiên nhất.</strong></em></p><p><strong>1. Ảnh hưởng tích cực của âm nhạc đối với sự phát triển của trẻ</strong></p><ul><li>Năm 1998, các nhà tâm lý học tại Đại học Hong Kong đã tiến hành một nghiên cứu trên 60 học sinh nữ gồm hai nhóm: có học một loại nhạc cụ nào đó trong ít nhất 6 năm và không chơi bất cứ loại nhạc cụ nào. Kết quả cho thấy khả năng ghi nhớ từ của nhóm học sinh chơi nhạc cụ cao hơn hẳn nhóm còn lại 16%. Điều này cho thấy âm nhạc có thể giúp trẻ nâng cao khả năng ghi nhớ và phát triển ngôn ngữ.</li><li>Đặc biệt đối với âm nhạc Mozart, các nhà khoa học còn phát hiện ra tác dụng &ldquo;đánh thức&rdquo; giác quan hết sức phong phú.</li><li>Các bác sĩ tại Viện thần kinh London (Anh) đã xác nhận nghe nhạc Mozart 45 phút mỗi ngày có thể dẫn đến sự thay đổi đáng kể số lượng tế bào não, tăng khả năng học tập, chỉ số IQ, hạn chế những tổn thương về thân kinh và cải thiện thị lực.</li><li>Một cuộc kiểm tra IQ được tiến hành tại Mỹ cũng chứng minh tốc độ hoạt động não nói riêng và nhiều hoạt động khác nói chung, cũng như chỉ số IQ trung bình của trẻ được nghe nhạc Mozart cao hơn các trẻ khác từ 9 đến 10 điểm. Đồng thời, tốc độ phân tích và khả năng xử lý hình ảnh của vùng não kiểm soát chức năng thị giác của con người cũng được tăng cường đáng kể.</li><li>Theo một nghiên cứu của Bệnh viện Oberwalliser &ndash; Thụy Điển, ngoài âm nhạc Mozart, những bản nhạc của nhà soạn nhạc danh tiếng Bach cũng rất có ích trong việc ổn định nhịp tim, giảm stress và mang lại trang thái cân bằng cho tâm hồn.</li><li>Tuy nhiên, Mozart hay Bach không phải là những lựa chọn âm nhạc duy nhất của trẻ. Bạn cần dành cho trẻ một &ldquo;thực đơn&rdquo; âm nhạc đa dạng và thay đổi để trẻ có thể nâng cao khả năng cảm thụ âm nhạc. Có như vậy, đời sống tinh thần của trẻ mới được phát triển đầy đủ và hài hòa.</li></ul><p><strong>2. Chọn nhạc cho trẻ</strong></p><p>Thật thú vị khi giới thiệu cho con bạn tất cả những thể loại âm nhạc mà bạn ưa thích, từ cổ điển, nhạc quê hương đến rock&rsquo;n&rsquo; roll&hellip;, không nên hạn chế thể loại nhạc vì điều đó vô tình sẽ giới hạn những sở thích âm nhạc của trẻ ngay từ đầu. Điều duy nhất bạn cần lưu ý là: với những loại âm nhạc có giai điệu quá u buồn, bạn cần phải xem xét bé đã đủ cứng cáp để cảm nhận chúng hay chưa.</p><p>Hãy nhớ rằng các loại nhạc khác nhau đều có tác động đến tâm trạng của con bạn. Vì vậy nếu bạn muốn thư giãn, hãy chọn nghe loại nhạc có tính xoa dịu như một bản nhạc cổ điển chẳng hạn; những ca khúc pop sôi động sẽ có tác dụng kích thích và khiến trẻ chạy nhảy khắp nơi.</p><p><strong>3. Dẫn dắt trẻ đến với âm nhạc</strong></p><p><img alt=\"\" width=\"800\" srcset=\"https://irispreschool.com.vn/wp-content/uploads/2020/03/young-woman-playing-guitar-group-kids-singing-musical-instruments-female-teacher-pupils-having-music-vector-153948874-1.jpg 800w, https://irispreschool.com.vn/wp-content/uploads/2020/03/young-woman-playing-guitar-group-kids-singing-musical-instruments-female-teacher-pupils-having-music-vector-153948874-1-300x222.jpg 300w, https://irispreschool.com.vn/wp-content/uploads/2020/03/young-woman-playing-guitar-group-kids-singing-musical-instruments-female-teacher-pupils-having-music-vector-153948874-1-768x569.jpg 768w, https://irispreschool.com.vn/wp-content/uploads/2020/03/young-woman-playing-guitar-group-kids-singing-musical-instruments-female-teacher-pupils-having-music-vector-153948874-1-500x371.jpg 500w\" sizes=\"(max-width: 800px) 100vw, 800px\" src=\"https://irispreschool.com.vn/wp-content/uploads/2020/03/young-woman-playing-guitar-group-kids-singing-musical-instruments-female-teacher-pupils-having-music-vector-153948874-1.jpg\" /></p><p>Bạn có thể nhận thấy trẻ em rất khó làm quen với âm nhạc nếu không có hình ảnh để liên tưởng. Vì thế, hãy dành chút thời gian cùng trẻ ngắm các hình ảnh trên bao bì đĩa CD trước hoặc trong khi nghe nhạc, nếu bạn tìm thêm được nhiều hình ảnh minh họa thì càng tốt. Ví dụ như khi nghe một bản nhạc cổ điển, bạn có thể cho trẻ xem hình ảnh những loại nhạc cụ khác nhau và giải thích một chút để trẻ liên tưởng đến nguồn âm thanh mà chúng đang nghe, chẳng hạn như: &ldquo;Nào, bây giờ đã đến lúc biểu diễn vĩ cầm, và đây là hình của một chiếc vĩ cầm&rdquo;&hellip;</p><p>Trẻ em chắc chắn sẽ rất thích nếu được sử dụng nhạc cụ để chơi theo bản nhạc mà trẻ đang nghe. Bạn có thể mua sắm một số nhạc cụ đồ chơi dành cho trẻ em hoặc tự tạo ra nhạc cụ thú vị cho trẻ. Rất đơn giản, bạn chỉ cần cho những hạt gạo hay các miếng nui khô vào một cái bình hay chai nước rỗng nhỏ . Khi con bạn đập hay lắc hãy cố truyền cho bé những cảm nhận về nhịp &amp; phách.</p><p>Lắc lư theo điệu nhạc cũng là một cách tuyệt vời để bạn vui chơi cùng trẻ. Hãy để cơ thể chuyển động tự nhiên theo điệu nhạc và phóng thích một chút hormone serotonin có chức năng kích thích tâm trạng hưng phấn. Việc nhìn thấy bạn nhảy múa một cách tự do thực sự làm con bạn thích thú và lôi cuốn chúng hòa vào nhịp điệu. Bạn sẽ thấy cuộc sống này thật hạnh phúc biết bao!</p><p><strong>4. Cho trẻ chơi nhạc cùng bạn bè</strong></p><p>Ngoài các hoạt động &ldquo;sinh hoạt âm nhạc&rdquo; trong môi trường gia đình, bạn còn có nhiều cách khác đánh thức giác quan của trẻ như những hương trình âm nhạc trên TV, radio hay tại trường hoc, nhà thiếu nhi địa phương.</p><p>Ngoài niềm yêu thích âm nhạc, con bạn còn được sinh hoạt, vui đùa cùng với các trẻ khác. Môi trường bạn bè này giúp chúng tiếp thu nhanh hơn và hào hứng hơn. Đồng thời, những tiếp xúc ban đầu đó sẽ khiến trẻ dạn dĩ và góp phần phát triển khả năng ngôn ngữ.</p><p>Âm nhạc là con đường tự nhiên giúp trẻ phát triển giác quan và bồi đắp đời sống tinh thần phong phú, giàu tình cảm. Hơn nữa, đó còn là môi trường tốt để bạn cùng chia sẻ một số sở thích và trải qua khoảng thời gian thư giãn tuyệt vời với con trẻ. Chơi nhạc cùng trẻ cũng sẽ thu ngắn khoảng cách giữa bạn và trẻ, giúp bạn luôn gần gũi và thấu hiểu tâm tư của trẻ nhiều hơn nữa.</p><p>Nguồn: sưu tầm.</p>', 'images/16080949064.jpg', '2020-11-27 03:30:15', '2020-12-16 05:01:46'),
(7, ' THÔNG BÁO KÉO DÀI THỜI GIAN TẠM NGHỈ HỌC ĐẾN HẾT NGÀY 05/04/2020', ' THÔNG BÁO ', '<p>📨<strong>Kính gửi Quý Phụ Huynh</strong>,<br />Thực hiện chỉ đạo của UBND TP.HCM trước tình hình diễn biến phức tạp, tiềm ẩn nhiều nguy cơ lây nhiễm trong cộng đồng của dịch bệnh viêm đường hô hấp cấp Covid-19 do virus Corona gây ra. Ban Giám Hiệu Trường Mầm non vũ trụ phải thông báo tiếp tục kéo dài thời gian tạm nghỉ học của các bé đến hết&nbsp;<a href=\"https://www.facebook.com/hashtag/ng%C3%A0y_05_th%C3%A1ng_04_n%C4%83m_2020?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARBS2VdFgHvMxhe78eVMNHXGQLfJg9mzORgTvtJWStBt36ZO1TcJ6rEnpc3p474cvnkJkOcKOjT2lRNy-fd-4ERiaS1I7ZEJM1Qzg6O6exQhpxI_0tSFzSVOE2dnz7HovDIqkSLTnTogo6RAT6SP0ppAD4qw6wZegSlwS3Jrv7lCzbLIFMYLyBYwNXrlB-Qdu0OBFh9lJFd7iAsWj7W4zRNx_8RPMuRPxN10Ya6xj6mHpARcMYTIEfginz419VW_6fJAcCZgV8HeuQ5B6hpbkEQjuLB77faXrLW6PBofYXVaI6lO7PHUTJSkV0PR80mJD1g5EtY2VpWNhQsD5FZRzpBVWw&amp;__tn__=%2ANK-R\">5</a>/4/2020&nbsp;để đảm bảo sức khỏe an toàn tuyệt đối cho các bé.<br />Rất mong nhận được sự phối hợp của các Quý Phụ Huynh. Chân thành cảm ơn Quý Phụ Huynh đã luôn đồng hành và chia sẻ! Nhà trường luôn hy vọng diễn biến phòng chống bệnh dịch được kiểm soát tốt nhất để trẻ đến trường.<br />Thời gian nhập học dự kiến vào thứ hai 06/04/2020.<br />Trân Trọng<br /><strong>Ban Giám Hiệu.</strong></p>', 'images/16080947583.jpg', '2020-11-27 03:30:27', '2020-12-16 05:00:47'),
(8, 'ĐỐ VUI CÙNG BÉ', 'Miêu tả', '<p>🦛&ldquo;Da dày và trơn bóng</p><p>&nbsp; &nbsp; &nbsp;Tai nhỏ nhưng miệng to</p><p>&nbsp; &nbsp; &nbsp;Ngày ở dưới sông, hồ</p><p>&nbsp; &nbsp; &nbsp;Đêm lên bờ ăn cỏ.&rdquo;&nbsp;🌱</p><p>(Đố bạn là con gì?)</p><p>Đáp án: Con Hà Mã</p><p>🤗 Chúng mình sẽ cùng đến với một bài thơ hỏi đố liên quan đến một loài vật mà bé hay gặp trên màn ảnh và trong Thảo Cầm Viên nè.</p><p>Ba mẹ hãy giúp cô đọc cho các bé nghe và xem các bé nhà mình có đoán ra là con vật gì không nha.</p>', '', '2020-11-27 03:30:42', '2020-12-16 04:58:12'),
(9, 'ĐỐ VUI CÙNG BÉ', 'ĐỐ VUI CÙNG BÉ', '<p>💁&zwj;♀️&nbsp;Các bạn ơi! Cùng xem hôm nay chúng mình có đố vui gì nè. Ba mẹ giúp cô đọc cho các bạn nhỏ nhé, để xem các bạn nhỏ của mình đã đoán ra được là con vật gì không nha.</p><p>💁&zwj;♀️Mùa nắng nóng đã bắt đầu, các bạn nhỏ và gia đình đừng quên bổ sung thêm vitamin, trái cây và uống bù lượng nước đã mất đi trong cơ thể để tránh cảm giác mệt mỏi, choáng, thậm chí bị nhức đầu hay khó thở nhé. Và đừng quên:</p><p>🤗&nbsp;Luôn mang khẩu trang khi đi ra ngoài.</p><p>🤗&nbsp;Thường xuyên rửa tay.</p><p>🤗&nbsp;Ăn uống đầy đủ dưỡng chất.</p><p>Chúng ta sẽ có một sức khỏe thật tốt cho việc chuẩn bị quay lại trường học thôi. Chúc các bé ngủ thật ngon.</p>', 'images/16080946502.jpg', '2020-11-27 03:30:58', '2020-12-16 04:57:41'),
(10, '5 hành vi của trẻ không bao giờ được bỏ qua', '5 Dấu hiệu cần quan tâm ở trẻ', '<p>Tuổi thơ là giai đoạn rất nhạy cảm với sự phát triển của trẻ. Đây là thời điểm tốt nhất để trẻ có sự phát triển về thể chất và tinh thần. Nếu trẻ có vấn đề ở độ tuổi này, sẽ dẫn đến các vấn đề hành vi về sau.</p><p>Dưới đây là 5 vấn đề cần chấn chỉnh trẻ ngay khi còn nhỏ.</p><p><strong>1. Ngắt lời</strong></p><p>Nếu con bạn liên tục ngắt lời khi người lớn đang nói thì đây là một dấu hiệu xấu. Để thu hút sự chú ý về cho mình, chúng không quan tâm đến người khác. Vô tình điều này tạo nên tính ích kỷ, xem mình là &quot;cái rốn của vũ trụ&quot;. Thói quen này cũng sẽ gây khó chịu cho người xung quanh.</p><p>Để trị, hãy giơ một hoặc hai ngón tay lên, có nghĩa là bạn sẽ ở bên con trong một hoặc hai phút nữa. Khi con làm quen được tín hiệu này và chờ một khoảng thời gian thích hợp, hãy dừng cuộc trò chuyện và khen ngợi con.</p><p>Tuy nhiên, tùy lứa tuổi mà cách xử lý khác nhau, ví như khi trẻ lên 3-4 tuổi, đừng mong con có thể đợi được vài phút, nên bạn cần xử lý việc nhanh. Hoặc khi con lớn hơn, hiểu chuyện hơn, bạn có thể kéo dài thời gian chờ đợi.</p><p><strong>2. Dùng vũ lực với người khác</strong></p><p>Hành vi đấm, cắn bạn khi đang chơi cần phải được dạy dỗ ngay. Sự hung hăng này không hề bình thường ở một đứa trẻ nếu điều này tiếp tục duy trì đến khi 8 tuổi.</p><p>Nếu thấy con bạn có điều này, hãy hỏi rõ ràng nguyên nhân, sau đó giải thích cho con hiểu đây là hành vi xấu. Làm tổn thương người khác là đáng bị lên án. Không ai được phép làm tổn thương người khác.</p><p><img alt=\"boy wearing teal and black striped t-shirt holding toy\" src=\"https://images.unsplash.com/photo-1495399375768-af8af1b8b9f5?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=crop&amp;w=1000&amp;q=80\" /></p><p><strong>3. Không nghe lời cha mẹ</strong></p><p>Nếu con bạn không chú ý đến lời cha mẹ nói thì hành vi này cũng cần thay đổi. Một khi bạn bỏ qua thì con sẽ phớt lờ bạn mọi lúc. Khi con càng lớn, lời nói của bạn sẽ không còn chút trọng lượng nào với con nữa.</p><p>Khi con phớt lờ bạn nói, hãy thu hút sự chú ý của trẻ bằng cách chạm vào vai con, hướng mặt con vào mặt mình, gọi thẳng tên con, tắt các thiết bị công nghệ... để cuộc nói chuyện chỉ có con và bạn.</p><p><strong>4. Phóng đại sự thật</strong></p><p>Ban đầu trẻ có thể hơi phóng đại sự thật, ví dụ nói rất thích ăn rau nhưng thực tế không chịu ăn một loại rau nào. Những lời nói dối này không có hại, nhưng không chính xác. Khi con bạn quen với việc khiến bản thân trông đẹp hơn trong mắt người khác, việc nói dối trở nên tự động. Một lúc nào đó lời nói dối này có thể gây ra vấn đề lớn ở trường học, xã hội.</p><p>Để trị tật xấu này của trẻ, điều quan trọng là phải xem xét tuổi của chúng. Một đứa trẻ 2-3 tuổi có thể không hoàn toàn hiểu sự khác biệt giữa không trung thực và trung thực. Khi con bạn từ khoảng 4 tuổi trở lên, hãy bắt đầu giải thích thế nào là nói dối và giúp bé hiểu tại sao việc này là xấu. Khen ngợi con bạn là trung thực và khuyến khích con nói sự thật, ngay cả khi có thể khiến con gặp rắc rối.</p><p><strong>5. Hành vi hỗn xược</strong></p><p>Nếu đứa trẻ trợn mắt, lườm bạn, đánh bạn, giọng điệu gay gắt với bạn thì cần phải trị ngay. Đây là hành động thiếu tôn trọng người khác.</p><p>Một số phụ huynh phớt lờ vì nghĩ đây là hành vi nhất thời, qua một giai đoạn sẽ hết, nhưng nếu bạn không đối đầu, bạn có thể sẽ có một đứa con lớp 3 vô lễ, không thể hòa đồng với bạn, không thể kết nối với giáo viên.</p><p>Các hành vi hỗn xược này thường bắt đầu khi trẻ mẫu giáo bắt chước trẻ lớn hơn. Cách xử lý là làm cho con nhận thức được hành vi của mình. Nói với bé, ví dụ, &quot;Khi con lườm như thế, có phải con không thích những gì mẹ đang nói&quot;. Cách này không phải làm cho con xấu hổ mà để cho bé thấy được biểu hiện vẻ mặt, lời nói của mình gây khó chịu cho người khác ra sao. Nếu hành vi này tiếp tục, hãy từ chối nói chuyện cho đến khi con thay đổi thái độ.</p>', 'images/1608094589hinh-chup-tre-em.jpg', '2020-11-27 03:31:11', '2020-12-16 04:56:29');

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
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$qeE8qsTj2di6fGjxOjmkO.UgcUGfmy3mt9Nyj6lxhQbM7a/unvivG', 1, '1', NULL, NULL, '2021-01-04 08:10:52'),
(5, 'ádas', 'giaovien2@gmail.com', NULL, '$2y$10$3P3QZZ4b2N7/AdI2YGKY0.fzfvSwDMHWyxx2/C1JfT5AAy4ab8wr2', 2, '0', NULL, '2020-10-05 20:16:44', '2020-10-06 20:33:06'),
(7, 'Trần Tuấn Kiệt', 'giaovien1@gmail.com', NULL, '$2y$10$mm6yfLtnQWE2sCzIEmTq7eusoq3py4.KJil7U9clc/DqDY6LmWpgq', 2, '1', NULL, '2020-10-05 21:01:30', '2020-10-05 21:01:30'),
(8, 'ádasdasd', 'alalsjd@gmail.com', NULL, '$2y$10$H7tDm6MRK.41IxKeqPt2IucP/GDzw/78U9SrkbnZU5HlKjveFQ2YG', 2, '1', NULL, '2020-10-06 01:46:58', '2020-10-06 01:46:58'),
(9, 'Nguyễn Thị Thanh Lệ', 'thanhle@gmail.com', NULL, '$2y$10$MFH1i22oL634s/65qLjtD.0UgR0Wd2LaL3FMBsg3o6RgDEq9gG1ay', 2, '1', NULL, '2020-10-06 01:52:59', '2020-10-06 01:52:59'),
(10, 'Nguyễn Thị Thanh Lệ', 'thanhlehh@gmail.com', NULL, '$2y$10$Dd9NjGBmtXMPG6nmMWXxWu0Ia4LW.sy.XRKR6EHm.xPbOrX5ChF/W', 2, '1', NULL, '2020-10-06 02:07:44', '2020-10-06 02:07:44'),
(11, 'Trần Ngọc Bình', 'ngocbinh@gmail.com', NULL, '$2y$10$rj5Aa4eFT.7H9TdSM0P7QOwgAj2Qg9/OPiAVjq7iZMady6l1g8Hsy', 3, '1', NULL, '2020-10-06 02:19:35', '2020-10-06 20:02:54'),
(12, 'Kiet', 'giaovien3@gmail.com', NULL, '$2y$10$eYusO4IoVjC6g78wfZt6nOzkYNo/5NPNyFpHxZileKdliX0zh2QfC', 1, '1', NULL, '2020-12-28 09:05:13', '2020-12-28 09:05:13'),
(13, 'Kiet', 'giaovien4@gmail.com', NULL, '$2y$10$gBkatTYr65TR.UM6NRv8wOS/BRnug0OPVr85lww9siBT5Y7Wsw2K2', 1, '1', NULL, '2020-12-28 09:06:19', '2020-12-28 09:06:19');

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
-- Chỉ mục cho bảng `cackhoangchi`
--
ALTER TABLE `cackhoangchi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cackhoangchi_idgv_foreign` (`idgv`);

--
-- Chỉ mục cho bảng `cackhoangphi`
--
ALTER TABLE `cackhoangphi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkin_idgv_foreign` (`idgv`);

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
  ADD UNIQUE KEY `UC_idgv` (`idgv`),
  ADD KEY `lichday_idlophoc_foreign` (`idlophoc`);

--
-- Chỉ mục cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UC_lophoc` (`tenlop`) USING BTREE,
  ADD KEY `lophoc_madanhmuclop_foreign` (`madanhmuclop`);

--
-- Chỉ mục cho bảng `luongnv`
--
ALTER TABLE `luongnv`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `luongnv_idgv_unique` (`idgv`);

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
-- Chỉ mục cho bảng `recordluong`
--
ALTER TABLE `recordluong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `recordluong_idgv_foreign` (`idgv`);

--
-- Chỉ mục cho bảng `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`),
  ADD KEY `report_idgv_foreign` (`idgv`),
  ADD KEY `report_idhd_foreign` (`idhd`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT cho bảng `cackhoangchi`
--
ALTER TABLE `cackhoangchi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `cackhoangphi`
--
ALTER TABLE `cackhoangphi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `checkin`
--
ALTER TABLE `checkin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `dongtien`
--
ALTER TABLE `dongtien`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `luongnv`
--
ALTER TABLE `luongnv`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `nknhaphoc`
--
ALTER TABLE `nknhaphoc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `phuhuynh`
--
ALTER TABLE `phuhuynh`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `recordluong`
--
ALTER TABLE `recordluong`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `report`
--
ALTER TABLE `report`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cackhoangchi`
--
ALTER TABLE `cackhoangchi`
  ADD CONSTRAINT `cackhoangchi_idgv_foreign` FOREIGN KEY (`idgv`) REFERENCES `giaovien` (`id`);

--
-- Các ràng buộc cho bảng `checkin`
--
ALTER TABLE `checkin`
  ADD CONSTRAINT `checkin_idgv_foreign` FOREIGN KEY (`idgv`) REFERENCES `giaovien` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `hocsinh_malophoc_foreign` FOREIGN KEY (`malophoc`) REFERENCES `lophoc` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Các ràng buộc cho bảng `luongnv`
--
ALTER TABLE `luongnv`
  ADD CONSTRAINT `luongnv_idgv_foreign` FOREIGN KEY (`idgv`) REFERENCES `giaovien` (`id`);

--
-- Các ràng buộc cho bảng `phuhuynh`
--
ALTER TABLE `phuhuynh`
  ADD CONSTRAINT `phuhuynh_mahs_foreign` FOREIGN KEY (`mahs`) REFERENCES `hocsinh` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `recordluong`
--
ALTER TABLE `recordluong`
  ADD CONSTRAINT `recordluong_idgv_foreign` FOREIGN KEY (`idgv`) REFERENCES `giaovien` (`id`);

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
