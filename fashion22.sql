-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.36-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.5.0.5305
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for fashion2
DROP DATABASE IF EXISTS `fashion2`;
CREATE DATABASE IF NOT EXISTS `fashion2` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `fashion2`;

-- Dumping structure for table fashion2.chitietdonhang
DROP TABLE IF EXISTS `chitietdonhang`;
CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `spdh_ma` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Ma don hang - san pham',
  `dh_ma` bigint(20) NOT NULL COMMENT 'ma don hang',
  `s_ma` tinyint(3) unsigned NOT NULL,
  `sp_ma` bigint(20) NOT NULL COMMENT 'Ma san pham',
  `spdh_soLuong` int(11) NOT NULL,
  `spdh_donGia` bigint(20) NOT NULL,
  PRIMARY KEY (`spdh_ma`),
  KEY `sanpham_donhang_sp_ma_foreign` (`sp_ma`),
  KEY `sanpham_donhang_dh_ma_foreign` (`dh_ma`),
  KEY `size_ctdh` (`s_ma`),
  CONSTRAINT `sanpham_donhang_dh_ma_foreign` FOREIGN KEY (`dh_ma`) REFERENCES `donhang` (`dh_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sanpham_donhang_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `size_ctdh` FOREIGN KEY (`s_ma`) REFERENCES `size` (`s_ma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.chitietdonhang: ~0 rows (approximately)
/*!40000 ALTER TABLE `chitietdonhang` DISABLE KEYS */;
/*!40000 ALTER TABLE `chitietdonhang` ENABLE KEYS */;

-- Dumping structure for table fashion2.chitietnhap
DROP TABLE IF EXISTS `chitietnhap`;
CREATE TABLE IF NOT EXISTS `chitietnhap` (
  `sp_ma` bigint(20) NOT NULL,
  `pn_ma` bigint(20) NOT NULL COMMENT 'Ma phieu nhap',
  `ctn_soLuong` bigint(20) NOT NULL COMMENT 'So luong san pham nhap vao',
  `ctn_donGia` int(10) unsigned NOT NULL COMMENT 'Gia nhap kho cua sp',
  KEY `chitietnhap_sp_ma_foreign` (`sp_ma`),
  KEY `chitietnhap_pn_ma_foreign` (`pn_ma`),
  CONSTRAINT `chitietnhap_pn_ma_foreign` FOREIGN KEY (`pn_ma`) REFERENCES `phieunhap` (`pn_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `chitietnhap_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Chi tiết nhập # Chi tiết phiếu nhập: sản phẩm, màu, số lượng, đơn giá, phiếu nhập';

-- Dumping data for table fashion2.chitietnhap: ~0 rows (approximately)
/*!40000 ALTER TABLE `chitietnhap` DISABLE KEYS */;
/*!40000 ALTER TABLE `chitietnhap` ENABLE KEYS */;

-- Dumping structure for table fashion2.donhang
DROP TABLE IF EXISTS `donhang`;
CREATE TABLE IF NOT EXISTS `donhang` (
  `dh_ma` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Mã đơn hàng, 1-Không xuất hóa đơn',
  `id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'id khách hàng',
  `dh_thoiGianDatHang` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm đặt hàng # Thời điểm đặt hàng',
  `dh_trangThai` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT 'Trạng thái # Trạng thái đơn hàng: 1-nhận đơn, 2-xử lý đơn, 3-giao hàng, 4-hoàn tất, 5-đổi trả, 6-hủy',
  `dh_tenKhachHang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Người nhận quà # Họ tên người nhận (tên hiển thị)',
  `dh_diaChi` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ người nhận # Địa chỉ người nhận',
  `dh_dienThoai` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Điện thoại người nhận # Điện thoại người nhận',
  `dh_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dh_tongcong` float unsigned NOT NULL COMMENT 'Tổng cộng',
  `dh_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo đơn hàng',
  `dh_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật đơn hàng gần nhất',
  `tt_ma` tinyint(3) unsigned NOT NULL COMMENT 'Phương thức thanh toán # tt_ma # tt_ten # Mã phương thức thanh toán',
  `vc_ma` tinyint(3) unsigned NOT NULL COMMENT 'Dịch vụ giao hàng # vc_ma # vc_ten # Mã dịch vụ giao hàng',
  `nv_giaoHang` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT 'Giao hàng # nv_ma # nv_hoTen # Mã nhân viên (người lập phiếu giao hàng và giao hàng), 1-chưa phân công',
  `nv_xuLy` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT 'Xử lý đơn hàng # nv_ma # nv_hoTen # Mã nhân viên (người xử lý đơn hàng), 1-chưa phân công',
  PRIMARY KEY (`dh_ma`),
  KEY `donhangsanpham_nv_giaohang_foreign` (`nv_giaoHang`),
  KEY `donhangsanpham_nv_xuly_foreign` (`nv_xuLy`),
  KEY `donhangsanpham_tt_ma_foreign` (`tt_ma`),
  KEY `donhangsanpham_vc_ma_foreign` (`vc_ma`),
  KEY `id` (`id`),
  CONSTRAINT `donhangsanpham_nv_giaohang_foreign` FOREIGN KEY (`nv_giaoHang`) REFERENCES `nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `donhangsanpham_nv_xuly_foreign` FOREIGN KEY (`nv_xuLy`) REFERENCES `nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `donhangsanpham_tt_ma_foreign` FOREIGN KEY (`tt_ma`) REFERENCES `thanhtoan` (`tt_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `donhangsanpham_vc_ma_foreign` FOREIGN KEY (`vc_ma`) REFERENCES `vanchuyen` (`vc_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `idkhachhang_donhang` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Đơn hàng # Đơn hàng';

-- Dumping data for table fashion2.donhang: ~0 rows (approximately)
/*!40000 ALTER TABLE `donhang` DISABLE KEYS */;
/*!40000 ALTER TABLE `donhang` ENABLE KEYS */;

-- Dumping structure for table fashion2.gioitinh_model
DROP TABLE IF EXISTS `gioitinh_model`;
CREATE TABLE IF NOT EXISTS `gioitinh_model` (
  `gt_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`gt_ten`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.gioitinh_model: ~2 rows (approximately)
/*!40000 ALTER TABLE `gioitinh_model` DISABLE KEYS */;
INSERT INTO `gioitinh_model` (`gt_ten`) VALUES
	('Nam'),
	('Nữ');
/*!40000 ALTER TABLE `gioitinh_model` ENABLE KEYS */;

-- Dumping structure for table fashion2.hinhanh
DROP TABLE IF EXISTS `hinhanh`;
CREATE TABLE IF NOT EXISTS `hinhanh` (
  `sp_ma` bigint(20) NOT NULL,
  `ha_stt` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `ha_ten` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`sp_ma`,`ha_stt`),
  CONSTRAINT `hinhanh_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.hinhanh: ~0 rows (approximately)
/*!40000 ALTER TABLE `hinhanh` DISABLE KEYS */;
/*!40000 ALTER TABLE `hinhanh` ENABLE KEYS */;

-- Dumping structure for table fashion2.khuyenmai
DROP TABLE IF EXISTS `khuyenmai`;
CREATE TABLE IF NOT EXISTS `khuyenmai` (
  `km_ma` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Mã chương trình khuyến mãi',
  `km_ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên chương trình # Tên chương trình khuyến mãi',
  `km_noiDung` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Thông tin chi tiết # Nội dung chi tiết chương trình khuyến mãi',
  `km_ngayBatDau` datetime NOT NULL COMMENT 'Thời điểm bắt đầu # Thời điểm bắt đầu khuyến mãi',
  `km_ngayKetThuc` datetime DEFAULT NULL COMMENT 'Thời điểm kết thúc # Thời điểm kết thúc khuyến mãi',
  `km_giaTri` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '100;100' COMMENT 'Giá trị khuyến mãi # Giá trị khuyến mãi trên tổng hóa đơn (giảm tiền/giảm % tiền, giảm % vận chuyển), định dạng: tien;VanChuyen',
  `nv_nguoiLap` smallint(5) unsigned NOT NULL COMMENT 'Lập kế hoạch # nv_ma # nv_hoTen # Mã nhân viên (người lập chương trình khuyến mãi)',
  `km_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo chương trình khuyến mãi',
  `km_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật chương trình khuyến mãi gần nhất',
  `km_trangThai` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT 'Trạng thái # Trạng thái chương trình khuyến mãi: 1-ngưng khuyến mãi, 2-lập kế hoạch, 3-ký nháy, 4-duyệt kế hoạch',
  `sp_ma` bigint(20) NOT NULL COMMENT 'Ma san pham',
  PRIMARY KEY (`km_ma`),
  UNIQUE KEY `khuyenmai_km_ten_unique` (`km_ten`),
  KEY `khuyenmai_nv_nguoilap_foreign` (`nv_nguoiLap`),
  KEY `khuyenmai_sp_ma_foreign` (`sp_ma`),
  CONSTRAINT `khuyenmai_nv_nguoilap_foreign` FOREIGN KEY (`nv_nguoiLap`) REFERENCES `nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `khuyenmai_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Chương trình khuyến mãi # Chương trình khuyến mãi';

-- Dumping data for table fashion2.khuyenmai: ~0 rows (approximately)
/*!40000 ALTER TABLE `khuyenmai` DISABLE KEYS */;
/*!40000 ALTER TABLE `khuyenmai` ENABLE KEYS */;

-- Dumping structure for table fashion2.loai
DROP TABLE IF EXISTS `loai`;
CREATE TABLE IF NOT EXISTS `loai` (
  `l_ma` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `l_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm đầu tiên tạo loại sản phẩm',
  `l_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật loại sản phẩm gần nhất',
  `l_trangThai` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT 'Trạng thái loại sản phẩm: 1-khóa , 2-khả dụng',
  PRIMARY KEY (`l_ma`),
  UNIQUE KEY `loai_l_ten_unique` (`l_ten`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.loai: ~6 rows (approximately)
/*!40000 ALTER TABLE `loai` DISABLE KEYS */;
INSERT INTO `loai` (`l_ma`, `l_ten`, `l_taoMoi`, `l_capNhat`, `l_trangThai`) VALUES
	(8, 'Quần nữ', '2019-02-17 00:00:00', '2019-03-17 06:58:53', 2),
	(14, 'Váy nữ', '2019-02-17 00:00:00', '2019-02-17 00:00:00', 2),
	(16, 'Quần nam', '2019-02-17 00:00:00', '2019-02-17 00:00:00', 2),
	(17, 'Áo nam', '2019-02-18 00:00:00', '2019-02-18 00:00:00', 1),
	(18, 'Áo nữ', '2019-02-17 00:00:00', '2019-02-17 00:00:00', 2),
	(19, 'Đầm nữ', '2019-03-04 00:00:00', '2019-03-04 00:00:00', 2);
/*!40000 ALTER TABLE `loai` ENABLE KEYS */;

-- Dumping structure for table fashion2.mau
DROP TABLE IF EXISTS `mau`;
CREATE TABLE IF NOT EXISTS `mau` (
  `m_ma` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `m_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_hinhDaiDien` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm đầu tiên tạo màu sản phẩm',
  `m_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật màu sản phẩm',
  `m_trangThai` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT 'Trạng thái màu sản phẩm: 1-khóa , 2-khả dụng',
  PRIMARY KEY (`m_ma`),
  UNIQUE KEY `mau_m_ten_unique` (`m_ten`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.mau: ~8 rows (approximately)
/*!40000 ALTER TABLE `mau` DISABLE KEYS */;
INSERT INTO `mau` (`m_ma`, `m_ten`, `m_hinhDaiDien`, `m_taoMoi`, `m_capNhat`, `m_trangThai`) VALUES
	(3, 'Đỏ', 'red.png', '2019-03-16 00:00:00', '2019-03-17 06:40:22', 1),
	(4, 'Trắng', 'white.png', '2019-03-16 00:00:00', '2019-03-17 06:54:03', 2),
	(5, 'Đen', 'black.png', '2019-03-16 00:00:00', '2019-03-17 06:54:16', 2),
	(6, 'Hồng', 'pink.png', '2019-03-16 00:00:00', '2019-03-17 06:54:26', 2),
	(8, 'Tím', 'purple.png', '2019-03-17 00:00:00', '2019-03-17 00:00:00', 2),
	(9, 'Xanh lá', 'green.png', '2019-03-17 00:00:00', '2019-03-17 06:55:10', 1),
	(10, 'Vàng', 'yellow.png', '2019-03-17 00:00:00', '2019-03-17 00:00:00', 2),
	(11, 'Xanh dương', 'bluee.png', '2019-03-22 00:00:00', '2019-03-22 00:00:00', 2),
	(12, 'Xám', 'grey.png', '2019-03-22 00:00:00', '2019-03-22 00:00:00', 2);
/*!40000 ALTER TABLE `mau` ENABLE KEYS */;

-- Dumping structure for table fashion2.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.migrations: ~20 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2018_10_30_111624_create_loai_table', 1),
	(4, '2018_10_30_115603_create_sanpham_table', 1),
	(5, '2018_11_01_065627_create_xuatxu_table', 1),
	(6, '2018_11_01_070023_create_nhacungcap_table', 1),
	(7, '2018_11_01_072057_create_hinhanh_table', 1),
	(8, '2018_11_01_105321_create_quyen_table', 1),
	(9, '2018_11_01_114835_create_khachhang_table', 1),
	(10, '2018_12_22_125528_create_nhanvien_table', 1),
	(11, '2018_12_22_125850_create_thanhtoan_table', 1),
	(12, '2019_02_16_072048_create_mau_table', 1),
	(13, '2019_02_16_074920_create_size_table', 1),
	(14, '2019_02_16_080226_create_khuyenmai_table', 1),
	(15, '2019_02_16_084757_create_mausize_table', 1),
	(16, '2019_02_16_095321_create_phieunhap_table', 1),
	(17, '2019_02_16_095548_create_model_table', 1),
	(18, '2019_02_16_100316_create_taikhoan_table', 1),
	(19, '2019_02_16_103451_create_vanchuyen_table', 1),
	(20, '2019_02_16_104220_create_mausanpham_table', 1),
	(21, '2019_02_16_115119_create_donhangsanpham_table', 1),
	(22, '2019_02_16_115357_create_sanpham_donhang_table', 1),
	(23, '2019_02_16_115949_create_chitietnhap_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table fashion2.model
DROP TABLE IF EXISTS `model`;
CREATE TABLE IF NOT EXISTS `model` (
  `md_ma` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Ma model',
  `md_canNang` double(8,2) NOT NULL COMMENT 'Can nang nguoi dung',
  `md_chieuCao` bigint(20) NOT NULL COMMENT 'Chieu cao nguoi dung',
  `gt_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_ma` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`md_ma`),
  KEY `gtten` (`gt_ten`),
  KEY `sizemd` (`s_ma`),
  CONSTRAINT `gtten` FOREIGN KEY (`gt_ten`) REFERENCES `gioitinh_model` (`gt_ten`),
  CONSTRAINT `sizemd` FOREIGN KEY (`s_ma`) REFERENCES `size` (`s_ma`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Model # Model';

-- Dumping data for table fashion2.model: ~7 rows (approximately)
/*!40000 ALTER TABLE `model` DISABLE KEYS */;
INSERT INTO `model` (`md_ma`, `md_canNang`, `md_chieuCao`, `gt_ten`, `s_ma`) VALUES
	(1, 53.00, 168, 'Nam', 3),
	(2, 53.00, 174, 'Nam', 5),
	(3, 53.00, 180, 'Nam', 1),
	(4, 60.00, 168, 'Nam', 4),
	(6, 60.00, 174, 'Nam', 2),
	(8, 60.00, 180, 'Nam', 6),
	(9, 40.00, 150, 'Nữ', 2),
	(10, 40.00, 160, 'Nữ', 1),
	(11, 40.00, 170, 'Nữ', 2),
	(13, 50.00, 150, 'Nữ', 1),
	(14, 50.00, 160, 'Nữ', 1),
	(16, 50.00, 170, 'Nữ', 1),
	(18, 60.00, 150, 'Nữ', 1),
	(19, 60.00, 160, 'Nữ', 2),
	(20, 60.00, 170, 'Nữ', 3);
/*!40000 ALTER TABLE `model` ENABLE KEYS */;

-- Dumping structure for table fashion2.nhacungcap
DROP TABLE IF EXISTS `nhacungcap`;
CREATE TABLE IF NOT EXISTS `nhacungcap` (
  `ncc_ma` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `ncc_ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ncc_diaChi` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ncc_dienThoai` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ncc_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ncc_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm đầu tiên tạo nhà cung cấp sản phẩm',
  `ncc_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật nhà cung cấp sản phẩm',
  `ncc_trangThai` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT 'Trạng thái nhà cung cấp sản phẩm: 1-khóa , 2-khả dụng',
  PRIMARY KEY (`ncc_ma`),
  UNIQUE KEY `nhacungcap_ncc_ten_unique` (`ncc_ten`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.nhacungcap: ~1 rows (approximately)
/*!40000 ALTER TABLE `nhacungcap` DISABLE KEYS */;
INSERT INTO `nhacungcap` (`ncc_ma`, `ncc_ten`, `ncc_diaChi`, `ncc_dienThoai`, `ncc_email`, `ncc_taoMoi`, `ncc_capNhat`, `ncc_trangThai`) VALUES
	(2, 'Công ty ABBC', '124 Mậu Thân - P.Xuân Khánh - Q.Ninh Kiều - TP.CT', '0123454312', 'abcfashion@gmail.com', '2019-03-16 00:00:00', '2019-03-16 08:35:18', 1),
	(3, 'Juno Fashion', '13 An Cư - P.10 - Q.Phú Nhuận - TP.HCM', '0923431599', 'juno@fashion.com', '2019-03-16 00:00:00', '2019-03-16 00:00:00', 2);
/*!40000 ALTER TABLE `nhacungcap` ENABLE KEYS */;

-- Dumping structure for table fashion2.nhanvien
DROP TABLE IF EXISTS `nhanvien`;
CREATE TABLE IF NOT EXISTS `nhanvien` (
  `nv_ma` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Mã nhân viên, 1-chưa phân công',
  `nv_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nv_hoTen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Họ tên # Họ tên',
  `nv_gioiTinh` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT 'Giới tính # Giới tính: 0-Nữ, 1-Nam, 2-Khác',
  `nv_ngaySinh` date NOT NULL COMMENT 'Ngày sinh # Ngày sinh',
  `nv_diaChi` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ # Địa chỉ',
  `nv_dienThoai` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Điện thoại # Điện thoại',
  `nv_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo nhân viên',
  `nv_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật nhân viên gần nhất',
  `nv_trangThai` tinyint(4) NOT NULL DEFAULT '2' COMMENT 'Trạng thái # Trạng thái nhân viên: 1-khóa, 2-khả dụng',
  `q_ma` tinyint(3) unsigned NOT NULL COMMENT 'Quyền # Mã quyền: 1-Giám đốc, 2-Quản trị, 3-Quản lý kho, 4-Kế toán, 5-Nhân viên bán hàng, 6-Nhân viên giao hàng',
  `nv_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`nv_ma`),
  UNIQUE KEY `nhanvien_nv_dienthoai_unique` (`nv_dienThoai`),
  KEY `nhanvien_q_ma_foreign` (`q_ma`),
  CONSTRAINT `nhanvien_q_ma_foreign` FOREIGN KEY (`q_ma`) REFERENCES `quyen` (`q_ma`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Nhân viên # Nhân viên';

-- Dumping data for table fashion2.nhanvien: ~4 rows (approximately)
/*!40000 ALTER TABLE `nhanvien` DISABLE KEYS */;
INSERT INTO `nhanvien` (`nv_ma`, `nv_id`, `nv_hoTen`, `nv_gioiTinh`, `nv_ngaySinh`, `nv_diaChi`, `nv_dienThoai`, `nv_taoMoi`, `nv_capNhat`, `nv_trangThai`, `q_ma`, `nv_email`) VALUES
	(6, 'NV001', 'Nguyễn Anh Tú', 1, '1995-03-16', 'Cần Thơ', '0976874533', '2019-03-17 15:02:51', '2019-03-17 08:02:51', 1, 2, 'anhtu123@gmail.com'),
	(7, 'NV002', 'Phan Anh Tân', 1, '1997-01-01', 'Cà Mau', '0982314567', '2019-03-17 15:03:06', '2019-03-17 08:03:06', 1, 2, 'anhtanphan@gmail.com'),
	(8, 'NV003', 'Trần Thị Cẫm Châu', 2, '1997-10-19', 'An Giang', '0923143564', '2019-03-17 15:03:16', '2019-03-17 08:03:16', 1, 2, 'chauchau111@gmail.com'),
	(9, 'NV004', 'Nguyễn Yến Duyên', 2, '1997-06-15', 'Bến Tre', '0326465624', '2019-03-17 15:03:37', '2019-03-17 08:03:37', 1, 2, 'duyenyen@gmail.com');
/*!40000 ALTER TABLE `nhanvien` ENABLE KEYS */;

-- Dumping structure for table fashion2.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table fashion2.phieunhap
DROP TABLE IF EXISTS `phieunhap`;
CREATE TABLE IF NOT EXISTS `phieunhap` (
  `pn_ma` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Mã phiếu nhập',
  `pn_nguoiGiao` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Người giao hàng # Người giao hàng',
  `pn_soHoaDon` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Số hóa đơn # Số hóa đơn',
  `pn_ngayXuatHoaDon` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày xuất hóa đơn # Ngày xuất hóa đơn',
  `pn_ghiChu` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Ghi chú # Ghi chú phiếu nhập',
  `nv_nguoiLapPhieu` smallint(5) unsigned NOT NULL COMMENT 'Lập phiếu # Mã nhân viên (người lập phiếu nhập)',
  `pn_ngayLapPhieu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm lập phiếu # Thời điểm lập phiếu nhập kho',
  `nv_keToan` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT 'Xác nhận # Mã nhân viên (kế toán trưởng), 1-chưa phân công',
  `pn_ngayXacNhan` datetime DEFAULT NULL COMMENT 'Thời điểm xác nhận # Thời điểm xác nhận thanh toán phiếu nhập kho',
  `nv_thuKho` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT 'Thủ kho # Mã nhân viên (thủ kho/giám đốc), 1-chưa phân công',
  `pn_ngayNhapKho` datetime DEFAULT NULL COMMENT 'Ngày nhập kho # Ngày nhập kho',
  `pn_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo phiếu nhập',
  `pn_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật phiếu nhập gần nhất',
  `pn_trangThai` tinyint(4) NOT NULL DEFAULT '2' COMMENT 'Trạng thái # Trạng thái phiếu nhập sản phẩm: 1-khóa, 2-lập phiếu, 3-thanh toán, 4-nhập kho',
  `ncc_ma` smallint(5) unsigned NOT NULL COMMENT 'Nhà cung cấp # ncc_ma # ncc_ten # Mã nhà cung cấp',
  PRIMARY KEY (`pn_ma`),
  UNIQUE KEY `phieunhap_pn_sohoadon_unique` (`pn_soHoaDon`),
  KEY `phieunhap_ncc_ma_foreign` (`ncc_ma`),
  KEY `phieunhap_nv_ketoan_foreign` (`nv_keToan`),
  KEY `phieunhap_nv_nguoilapphieu_foreign` (`nv_nguoiLapPhieu`),
  KEY `phieunhap_nv_thukho_foreign` (`nv_thuKho`),
  CONSTRAINT `phieunhap_ncc_ma_foreign` FOREIGN KEY (`ncc_ma`) REFERENCES `nhacungcap` (`ncc_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `phieunhap_nv_ketoan_foreign` FOREIGN KEY (`nv_keToan`) REFERENCES `nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `phieunhap_nv_nguoilapphieu_foreign` FOREIGN KEY (`nv_nguoiLapPhieu`) REFERENCES `nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `phieunhap_nv_thukho_foreign` FOREIGN KEY (`nv_thuKho`) REFERENCES `nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Phiếu nhập # Phiếu nhập';

-- Dumping data for table fashion2.phieunhap: ~0 rows (approximately)
/*!40000 ALTER TABLE `phieunhap` DISABLE KEYS */;
/*!40000 ALTER TABLE `phieunhap` ENABLE KEYS */;

-- Dumping structure for table fashion2.quyen
DROP TABLE IF EXISTS `quyen`;
CREATE TABLE IF NOT EXISTS `quyen` (
  `q_ma` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `q_ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q_moTa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q_trangThai` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT 'Trạng thái quyền: 1-khóa , 2-khả dụng',
  PRIMARY KEY (`q_ma`),
  UNIQUE KEY `quyen_q_ten_unique` (`q_ten`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.quyen: ~2 rows (approximately)
/*!40000 ALTER TABLE `quyen` DISABLE KEYS */;
INSERT INTO `quyen` (`q_ma`, `q_ten`, `q_moTa`, `q_trangThai`) VALUES
	(1, 'admin', 'người quản trị', 2),
	(2, 'nhân viên', 'nhân viên', 2),
	(3, 'khách hàng', 'khách hàng', 2);
/*!40000 ALTER TABLE `quyen` ENABLE KEYS */;

-- Dumping structure for table fashion2.sanpham
DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `sp_ma` bigint(20) NOT NULL AUTO_INCREMENT,
  `sp_ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_hinh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_giaGoc` int(11) NOT NULL DEFAULT '0',
  `sp_giaBan` int(10) unsigned NOT NULL DEFAULT '0',
  `sp_soLuongBanDau` bigint(20) NOT NULL,
  `sp_soLuongHienTai` bigint(20) NOT NULL,
  `sp_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Cập nhật sản phẩm mới',
  `sp_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Tạo sản phẩm mới',
  `sp_trangThai` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT 'Trạng thái sản phẩm: 1-khóa , 2-khả dụng',
  `l_ma` tinyint(3) unsigned NOT NULL COMMENT 'Loại sản phâm',
  `xx_ma` mediumint(8) unsigned NOT NULL,
  `m_ma` tinyint(3) unsigned NOT NULL,
  PRIMARY KEY (`sp_ma`),
  UNIQUE KEY `sanpham_sp_ten_unique` (`sp_ten`),
  KEY `sanpham_l_ma_foreign` (`l_ma`),
  KEY `m_ma` (`m_ma`),
  KEY `sp_xuatxu` (`xx_ma`),
  CONSTRAINT `sanpham_l_ma_foreign` FOREIGN KEY (`l_ma`) REFERENCES `loai` (`l_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sanpham_mau` FOREIGN KEY (`m_ma`) REFERENCES `mau` (`m_ma`),
  CONSTRAINT `sp_xuatxu` FOREIGN KEY (`xx_ma`) REFERENCES `xuatxu` (`xx_ma`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.sanpham: ~7 rows (approximately)
/*!40000 ALTER TABLE `sanpham` DISABLE KEYS */;
INSERT INTO `sanpham` (`sp_ma`, `sp_ten`, `sp_hinh`, `sp_giaGoc`, `sp_giaBan`, `sp_soLuongBanDau`, `sp_soLuongHienTai`, `sp_capNhat`, `sp_taoMoi`, `sp_trangThai`, `l_ma`, `xx_ma`, `m_ma`) VALUES
	(9, 'Áo sơ mi công sở', 'aosominam2.jpg', 200000, 500000, 100, 90, '2019-03-17 06:48:26', '2019-02-17 00:00:00', 2, 17, 1, 4),
	(10, 'Áo sơ mi nam', 'aosominam4.jpg', 300000, 350000, 20, 20, '2019-02-17 00:00:00', '2019-02-17 00:00:00', 1, 17, 1, 12),
	(11, 'Áo sơ mi xám', 'aosominam3.jpg', 300000, 400000, 45, 34, '2019-02-17 00:00:00', '2019-02-17 00:00:00', 1, 17, 3, 11),
	(12, 'Áo sơ mi 2', 'aosominam5.jpg', 300000, 400000, 100, 98, '2019-02-20 00:00:00', '2019-02-20 00:00:00', 1, 17, 4, 4),
	(13, 'Đầm dạ hội', 'dam.jpg', 500000, 700000, 10, 5, '2019-03-04 00:00:00', '2019-03-04 00:00:00', 2, 19, 1, 4),
	(16, 'Áo sơ mi nữ công sở', 'aotrang.jpg', 350000, 475000, 4, 2, '2019-03-04 00:00:00', '2019-03-04 00:00:00', 2, 18, 4, 4),
	(17, 'Dạ hội', 'damxoe.jpg', 1000000, 1200000, 2, 2, '2019-02-17 00:00:00', '2019-02-17 00:00:00', 2, 19, 3, 8);
/*!40000 ALTER TABLE `sanpham` ENABLE KEYS */;

-- Dumping structure for table fashion2.size
DROP TABLE IF EXISTS `size`;
CREATE TABLE IF NOT EXISTS `size` (
  `s_ma` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `s_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm đầu tiên tạo size sản phẩm',
  `s_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật size sản phẩm',
  `s_trangThai` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT 'Trạng thái size sản phẩm: 1-khóa , 2-khả dụng',
  PRIMARY KEY (`s_ma`),
  UNIQUE KEY `size_s_ten_unique` (`s_ten`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.size: ~6 rows (approximately)
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
INSERT INTO `size` (`s_ma`, `s_ten`, `s_taoMoi`, `s_capNhat`, `s_trangThai`) VALUES
	(1, 'S', '2019-03-16 00:00:00', '2019-03-16 00:00:00', 2),
	(2, 'M', '2019-03-16 00:00:00', '2019-03-16 00:00:00', 2),
	(3, 'L', '2019-03-17 00:00:00', '2019-03-17 07:01:46', 2),
	(4, 'XL', '2019-03-22 13:33:07', '2019-03-22 13:33:09', 2),
	(5, 'XXL', '2019-03-22 13:33:18', '2019-03-22 13:33:19', 2),
	(6, '3XL', '2019-03-22 13:33:28', '2019-03-22 13:33:29', 2);
/*!40000 ALTER TABLE `size` ENABLE KEYS */;

-- Dumping structure for table fashion2.size_sanpham
DROP TABLE IF EXISTS `size_sanpham`;
CREATE TABLE IF NOT EXISTS `size_sanpham` (
  `stt` int(10) unsigned NOT NULL DEFAULT '0',
  `s_ma` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `sp_ma` bigint(20) NOT NULL AUTO_INCREMENT,
  `ssp_soLuong` smallint(5) unsigned DEFAULT '0',
  PRIMARY KEY (`stt`),
  KEY `sp_ma` (`sp_ma`),
  KEY `size_s_ma_foreign` (`s_ma`),
  CONSTRAINT `size_s_ma_foreign` FOREIGN KEY (`s_ma`) REFERENCES `size` (`s_ma`),
  CONSTRAINT `size_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.size_sanpham: ~0 rows (approximately)
/*!40000 ALTER TABLE `size_sanpham` DISABLE KEYS */;
/*!40000 ALTER TABLE `size_sanpham` ENABLE KEYS */;

-- Dumping structure for table fashion2.thanhtoan
DROP TABLE IF EXISTS `thanhtoan`;
CREATE TABLE IF NOT EXISTS `thanhtoan` (
  `tt_ma` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Mã phương thức thanh toán',
  `tt_ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên phương thức # Tên phương thức thanh toán',
  `tt_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tt_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tt_trangThai` tinyint(3) NOT NULL,
  PRIMARY KEY (`tt_ma`),
  UNIQUE KEY `thanhtoan_tt_ten_unique` (`tt_ten`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Phương thức thanh toán # Phương thức thanh toán';

-- Dumping data for table fashion2.thanhtoan: ~0 rows (approximately)
/*!40000 ALTER TABLE `thanhtoan` DISABLE KEYS */;
/*!40000 ALTER TABLE `thanhtoan` ENABLE KEYS */;

-- Dumping structure for table fashion2.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namsinh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dienthoai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q_ma` tinyint(3) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `trangthai` int(11) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `q_ma` (`q_ma`),
  CONSTRAINT `maquyen` FOREIGN KEY (`q_ma`) REFERENCES `quyen` (`q_ma`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.users: ~4 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `hoten`, `gioitinh`, `namsinh`, `email`, `matkhau`, `dienthoai`, `diachi`, `q_ma`, `created_at`, `updated_at`, `trangthai`) VALUES
	(2, 'anhtuan', 'Nguyễn Anh Tuấn', 'Nam', '1950', 'tuananh23@gmail.com', '$2y$10$AQJ2Rqdj0X9FqONdQU3VAOe5VM7lKd/v6pwkqRhOVfQ9qINFU1xNK', '0912345678', 'TP. Hồ Chí Minh', 3, '2019-02-27 08:50:07', '2019-02-27 08:50:07', 0),
	(3, 'nyduyen', 'Nguyễn Yến Duyên', 'Nữ', '1997', 'nguyenyenduyen1506@gmail.com', 'duyen156', '01626465624', 'Bến Tre', 1, NULL, NULL, 0),
	(4, 'cchauu', 'Trần Thị Cẫm Châu', 'Nữ', '1997', 'chau246@gmail.com', '$2y$10$4bI9HI1g8HB0Wc1KbOiEHeJDuYIY/2R.vHqaRjGjNmbwpo4u42G7u', '0912367896', 'An Giang', 3, '2019-02-28 03:23:34', '2019-02-28 03:23:34', 0),
	(5, 'duyengia', 'Yến Duyên\r\n', 'Nam', '1950', 'duyengia@gmail.com', '$2y$10$G6PHodG.YfaEEBz2EAGpIe6zuRz/gHWxgT/jkvDEbqjTvgbfOLQPq', '012345678', 'Cần Thơ', 3, '2019-03-01 03:42:59', '2019-03-01 03:42:59', 0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table fashion2.vanchuyen
DROP TABLE IF EXISTS `vanchuyen`;
CREATE TABLE IF NOT EXISTS `vanchuyen` (
  `vc_ma` tinyint(3) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Mã dịch vụ giao hàng',
  `vc_moTa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mô tả',
  `vc_ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên dịch vụ # Tên dịch vụ giao hàng',
  `vc_chiPhi` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Phí giao hàng # Phí giao hàng',
  `vc_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo dịch vụ giao hàng',
  `vc_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật dịch vụ giao hàng gần nhất',
  `vc_trangThai` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT 'Trạng thái # Trạng thái dịch vụ giao hàng: 1-khóa, 2-hiển thị',
  PRIMARY KEY (`vc_ma`),
  UNIQUE KEY `vanchuyen_vc_ten_unique` (`vc_ten`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Dịch vụ giao hàng # Dịch vụ giao hàng';

-- Dumping data for table fashion2.vanchuyen: ~0 rows (approximately)
/*!40000 ALTER TABLE `vanchuyen` DISABLE KEYS */;
/*!40000 ALTER TABLE `vanchuyen` ENABLE KEYS */;

-- Dumping structure for table fashion2.xuatxu
DROP TABLE IF EXISTS `xuatxu`;
CREATE TABLE IF NOT EXISTS `xuatxu` (
  `xx_ma` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `xx_ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `xx_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm đầu tiên tạo xuất xứ sản phẩm',
  `xx_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật xuất xứ sản phẩm',
  `xx_trangThai` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT 'Trạng thái xuất xứ sản phẩm: 1-khóa , 2-khả dụng',
  PRIMARY KEY (`xx_ma`),
  UNIQUE KEY `xuatxu_xx_ten_unique` (`xx_ten`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.xuatxu: ~2 rows (approximately)
/*!40000 ALTER TABLE `xuatxu` DISABLE KEYS */;
INSERT INTO `xuatxu` (`xx_ma`, `xx_ten`, `xx_taoMoi`, `xx_capNhat`, `xx_trangThai`) VALUES
	(1, 'Hàn Quốc', '2019-03-22 10:24:40', '2019-03-22 10:24:42', 2),
	(3, 'Thái Lan', '2019-03-22 00:00:00', '2019-03-22 00:00:00', 2),
	(4, 'USA', '2019-03-22 00:00:00', '2019-03-22 00:00:00', 2);
/*!40000 ALTER TABLE `xuatxu` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
