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

-- Dumping structure for table fashion2.chitietdonhang
CREATE TABLE IF NOT EXISTS `chitietdonhang` (
  `sp_ma` bigint(20) NOT NULL COMMENT 'Ma san pham',
  `dh_ma` bigint(20) NOT NULL COMMENT 'ma don hang',
  `dhsp_ma` bigint(20) NOT NULL COMMENT 'Ma don hang - san pham',
  `dhsp_soLuong` int(11) NOT NULL,
  `dhsp_donGia` bigint(20) NOT NULL,
  `dhsp_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dhsp_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `sanpham_donhang_sp_ma_foreign` (`sp_ma`),
  KEY `sanpham_donhang_dh_ma_foreign` (`dh_ma`),
  CONSTRAINT `sanpham_donhang_dh_ma_foreign` FOREIGN KEY (`dh_ma`) REFERENCES `donhang` (`dh_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sanpham_donhang_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.chitietdonhang: ~0 rows (approximately)
/*!40000 ALTER TABLE `chitietdonhang` DISABLE KEYS */;
/*!40000 ALTER TABLE `chitietdonhang` ENABLE KEYS */;

-- Dumping structure for table fashion2.chitietnhap
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
CREATE TABLE IF NOT EXISTS `donhang` (
  `dh_ma` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Mã đơn hàng, 1-Không xuất hóa đơn',
  `kh_ma` bigint(20) NOT NULL COMMENT 'Khách hàng # kh_ma # kh_hoTen # Mã khách hàng',
  `dh_thoiGianDatHang` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm đặt hàng # Thời điểm đặt hàng',
  `dh_thoiGianNhanHang` datetime NOT NULL COMMENT 'Thời điểm giao hàng # Thời điểm giao hàng theo yêu cầu của khách hàng',
  `dh_tenKhachHang` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Người nhận quà # Họ tên người nhận (tên hiển thị)',
  `dh_diaChi` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ người nhận # Địa chỉ người nhận',
  `dh_dienThoai` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Điện thoại người nhận # Điện thoại người nhận',
  `dh_daThanhToan` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'Đã thanh toán # Đã thanh toán tiền (trường hợp tặng quà)',
  `nv_xuLy` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT 'Xử lý đơn hàng # nv_ma # nv_hoTen # Mã nhân viên (người xử lý đơn hàng), 1-chưa phân công',
  `dh_ngayXuLy` datetime DEFAULT NULL COMMENT 'Thời điểm xử lý # Thời điểm xử lý đơn hàng',
  `nv_giaoHang` smallint(5) unsigned NOT NULL DEFAULT '1' COMMENT 'Giao hàng # nv_ma # nv_hoTen # Mã nhân viên (người lập phiếu giao hàng và giao hàng), 1-chưa phân công',
  `dh_ngayLapPhieuGiao` datetime DEFAULT NULL COMMENT 'Thời điểm lập phiếu giao # Thời điểm lập phiếu giao',
  `dh_ngayGiaoHang` datetime DEFAULT NULL COMMENT 'Thời điểm khách nhận được hàng # Thời điểm khách nhận được hàng',
  `dh_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo đơn hàng',
  `dh_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật đơn hàng gần nhất',
  `dh_trangThai` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT 'Trạng thái # Trạng thái đơn hàng: 1-nhận đơn, 2-xử lý đơn, 3-giao hàng, 4-hoàn tất, 5-đổi trả, 6-hủy',
  `vc_ma` tinyint(3) unsigned NOT NULL COMMENT 'Dịch vụ giao hàng # vc_ma # vc_ten # Mã dịch vụ giao hàng',
  `tt_ma` tinyint(3) unsigned NOT NULL COMMENT 'Phương thức thanh toán # tt_ma # tt_ten # Mã phương thức thanh toán',
  `dh_tongcong` float unsigned NOT NULL COMMENT 'Tổng cộng',
  `dh_ghiChu` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`dh_ma`),
  KEY `donhangsanpham_kh_ma_foreign` (`kh_ma`),
  KEY `donhangsanpham_nv_giaohang_foreign` (`nv_giaoHang`),
  KEY `donhangsanpham_nv_xuly_foreign` (`nv_xuLy`),
  KEY `donhangsanpham_tt_ma_foreign` (`tt_ma`),
  KEY `donhangsanpham_vc_ma_foreign` (`vc_ma`),
  CONSTRAINT `donhangsanpham_kh_ma_foreign` FOREIGN KEY (`kh_ma`) REFERENCES `khachhang` (`kh_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `donhangsanpham_nv_giaohang_foreign` FOREIGN KEY (`nv_giaoHang`) REFERENCES `nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `donhangsanpham_nv_xuly_foreign` FOREIGN KEY (`nv_xuLy`) REFERENCES `nhanvien` (`nv_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `donhangsanpham_tt_ma_foreign` FOREIGN KEY (`tt_ma`) REFERENCES `thanhtoan` (`tt_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `donhangsanpham_vc_ma_foreign` FOREIGN KEY (`vc_ma`) REFERENCES `vanchuyen` (`vc_ma`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Đơn hàng # Đơn hàng';

-- Dumping data for table fashion2.donhang: ~0 rows (approximately)
/*!40000 ALTER TABLE `donhang` DISABLE KEYS */;
/*!40000 ALTER TABLE `donhang` ENABLE KEYS */;

-- Dumping structure for table fashion2.hinhanh
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

-- Dumping structure for table fashion2.khachhang
CREATE TABLE IF NOT EXISTS `khachhang` (
  `kh_ma` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'Ma khach hang',
  `kh_hoTen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Ho ten khach hang',
  `kh_gioiTinh` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '1:Nam, 2:Nữ',
  `kh_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Email khach hang',
  `kh_ngaySinh` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngay sinh khach hang',
  `kh_diaChi` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL' COMMENT 'Dia chi khach hang',
  `kh_dienThoai` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT 'NULL' COMMENT 'Dien thoai khach hang',
  `kh_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thoi diem tao moi khach hang',
  `kh_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thoi diem cap nhat khach hang gan nhat',
  `kh_trangThai` tinyint(3) unsigned NOT NULL DEFAULT '3',
  PRIMARY KEY (`kh_ma`),
  UNIQUE KEY `khachhang_kh_ngaysinh_unique` (`kh_ngaySinh`),
  UNIQUE KEY `khachhang_kh_dienthoai_unique` (`kh_dienThoai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.khachhang: ~0 rows (approximately)
/*!40000 ALTER TABLE `khachhang` DISABLE KEYS */;
/*!40000 ALTER TABLE `khachhang` ENABLE KEYS */;

-- Dumping structure for table fashion2.khuyenmai
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
	(8, 'Quần nữ', '2019-02-17 00:00:00', '2019-02-17 00:00:00', 2),
	(14, 'Váy nữ', '2019-02-17 00:00:00', '2019-02-17 00:00:00', 2),
	(16, 'Quần nam', '2019-02-17 00:00:00', '2019-02-17 00:00:00', 2),
	(17, 'Áo nam', '2019-02-18 00:00:00', '2019-02-18 00:00:00', 1),
	(18, 'Áo nữ', '2019-02-17 00:00:00', '2019-02-17 00:00:00', 2),
	(19, 'Đầm nữ', '2019-03-04 00:00:00', '2019-03-04 00:00:00', 2);
/*!40000 ALTER TABLE `loai` ENABLE KEYS */;

-- Dumping structure for table fashion2.mau
CREATE TABLE IF NOT EXISTS `mau` (
  `m_ma` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `m_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `m_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm đầu tiên tạo màu sản phẩm',
  `m_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật màu sản phẩm',
  `m_trangThai` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT 'Trạng thái màu sản phẩm: 1-khóa , 2-khả dụng',
  PRIMARY KEY (`m_ma`),
  UNIQUE KEY `mau_m_ten_unique` (`m_ten`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.mau: ~0 rows (approximately)
/*!40000 ALTER TABLE `mau` DISABLE KEYS */;
/*!40000 ALTER TABLE `mau` ENABLE KEYS */;

-- Dumping structure for table fashion2.mausanpham
CREATE TABLE IF NOT EXISTS `mausanpham` (
  `sp_ma` bigint(20) NOT NULL COMMENT 'Màu sắc # m_ma # m_ten # Mã sản phẩm',
  `m_ma` tinyint(3) unsigned NOT NULL COMMENT 'Sản phẩm # sp_ma # sp_ten # Mã màu sản phẩm',
  `msp_soluong` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'Số lượng # Số lượng sản phẩm tương ứng với màu',
  PRIMARY KEY (`sp_ma`,`m_ma`),
  KEY `mausanpham_m_ma_foreign` (`m_ma`),
  CONSTRAINT `mausanpham_m_ma_foreign` FOREIGN KEY (`m_ma`) REFERENCES `mau` (`m_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mausanpham_sp_ma_foreign` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Số lượng sản phẩm theo màu # Số lượng sản phẩm tương ứng với các màu';

-- Dumping data for table fashion2.mausanpham: ~0 rows (approximately)
/*!40000 ALTER TABLE `mausanpham` DISABLE KEYS */;
/*!40000 ALTER TABLE `mausanpham` ENABLE KEYS */;

-- Dumping structure for table fashion2.mausize
CREATE TABLE IF NOT EXISTS `mausize` (
  `m_ma` tinyint(3) unsigned NOT NULL COMMENT 'Ma mau',
  `s_ma` tinyint(3) unsigned NOT NULL COMMENT 'Ma size',
  KEY `mausize_m_ma_foreign` (`m_ma`),
  KEY `mausize_s_ma_foreign` (`s_ma`),
  CONSTRAINT `mausize_m_ma_foreign` FOREIGN KEY (`m_ma`) REFERENCES `mau` (`m_ma`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `mausize_s_ma_foreign` FOREIGN KEY (`s_ma`) REFERENCES `size` (`s_ma`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.mausize: ~0 rows (approximately)
/*!40000 ALTER TABLE `mausize` DISABLE KEYS */;
/*!40000 ALTER TABLE `mausize` ENABLE KEYS */;

-- Dumping structure for table fashion2.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.migrations: ~23 rows (approximately)
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
CREATE TABLE IF NOT EXISTS `model` (
  `md_ma` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Ma model',
  `md_canNang` double(8,2) NOT NULL COMMENT 'Can nang nguoi dung',
  `md_chieuCao` bigint(20) NOT NULL COMMENT 'Chieu cao nguoi dung',
  PRIMARY KEY (`md_ma`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Model # Model';

-- Dumping data for table fashion2.model: ~0 rows (approximately)
/*!40000 ALTER TABLE `model` DISABLE KEYS */;
/*!40000 ALTER TABLE `model` ENABLE KEYS */;

-- Dumping structure for table fashion2.nhacungcap
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.nhacungcap: ~0 rows (approximately)
/*!40000 ALTER TABLE `nhacungcap` DISABLE KEYS */;
/*!40000 ALTER TABLE `nhacungcap` ENABLE KEYS */;

-- Dumping structure for table fashion2.nhanvien
CREATE TABLE IF NOT EXISTS `nhanvien` (
  `nv_ma` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Mã nhân viên, 1-chưa phân công',
  `nv_hoTen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Họ tên # Họ tên',
  `nv_gioiTinh` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT 'Giới tính # Giới tính: 0-Nữ, 1-Nam, 2-Khác',
  `nv_ngaySinh` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Ngày sinh # Ngày sinh',
  `nv_diaChi` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Địa chỉ # Địa chỉ',
  `nv_dienThoai` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Điện thoại # Điện thoại',
  `nv_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm đầu tiên tạo nhân viên',
  `nv_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật # Thời điểm cập nhật nhân viên gần nhất',
  `nv_trangThai` tinyint(4) NOT NULL DEFAULT '2' COMMENT 'Trạng thái # Trạng thái nhân viên: 1-khóa, 2-khả dụng',
  `q_ma` tinyint(3) unsigned NOT NULL COMMENT 'Quyền # Mã quyền: 1-Giám đốc, 2-Quản trị, 3-Quản lý kho, 4-Kế toán, 5-Nhân viên bán hàng, 6-Nhân viên giao hàng',
  PRIMARY KEY (`nv_ma`),
  UNIQUE KEY `nhanvien_nv_dienthoai_unique` (`nv_dienThoai`),
  KEY `nhanvien_q_ma_foreign` (`q_ma`),
  CONSTRAINT `nhanvien_q_ma_foreign` FOREIGN KEY (`q_ma`) REFERENCES `quyen` (`q_ma`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Nhân viên # Nhân viên';

-- Dumping data for table fashion2.nhanvien: ~0 rows (approximately)
/*!40000 ALTER TABLE `nhanvien` DISABLE KEYS */;
/*!40000 ALTER TABLE `nhanvien` ENABLE KEYS */;

-- Dumping structure for table fashion2.password_resets
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
CREATE TABLE IF NOT EXISTS `quyen` (
  `q_ma` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `q_ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q_moTa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q_trangThai` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT 'Trạng thái quyền: 1-khóa , 2-khả dụng',
  PRIMARY KEY (`q_ma`),
  UNIQUE KEY `quyen_q_ten_unique` (`q_ten`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.quyen: ~3 rows (approximately)
/*!40000 ALTER TABLE `quyen` DISABLE KEYS */;
INSERT INTO `quyen` (`q_ma`, `q_ten`, `q_moTa`, `q_trangThai`) VALUES
	(1, 'admin', 'người quản trị', 2),
	(2, 'nhân viên', 'nhân viên', 2),
	(3, 'khách hàng', 'khách hàng', 2);
/*!40000 ALTER TABLE `quyen` ENABLE KEYS */;

-- Dumping structure for table fashion2.sanpham
CREATE TABLE IF NOT EXISTS `sanpham` (
  `sp_ma` bigint(20) NOT NULL AUTO_INCREMENT,
  `sp_ten` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_giaGoc` int(11) NOT NULL DEFAULT '0',
  `sp_giaBan` int(10) unsigned NOT NULL DEFAULT '0',
  `sp_hinh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sp_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Tạo sản phẩm mới',
  `sp_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Cập nhật sản phẩm mới',
  `sp_trangThai` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT 'Trạng thái sản phẩm: 1-khóa , 2-khả dụng',
  `l_ma` tinyint(3) unsigned NOT NULL COMMENT 'Loại sản phâm',
  `sp_soLuongBanDau` bigint(20) NOT NULL,
  `sp_soLuongHienTai` bigint(20) NOT NULL,
  PRIMARY KEY (`sp_ma`),
  UNIQUE KEY `sanpham_sp_ten_unique` (`sp_ten`),
  KEY `sanpham_l_ma_foreign` (`l_ma`),
  CONSTRAINT `sanpham_l_ma_foreign` FOREIGN KEY (`l_ma`) REFERENCES `loai` (`l_ma`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.sanpham: ~6 rows (approximately)
/*!40000 ALTER TABLE `sanpham` DISABLE KEYS */;
INSERT INTO `sanpham` (`sp_ma`, `sp_ten`, `sp_giaGoc`, `sp_giaBan`, `sp_hinh`, `sp_taoMoi`, `sp_capNhat`, `sp_trangThai`, `l_ma`, `sp_soLuongBanDau`, `sp_soLuongHienTai`) VALUES
	(9, 'Áo sơ mi công sở', 200000, 500000, 'aosominam2.jpg', '2019-02-17 00:00:00', '2019-02-18 06:37:12', 1, 17, 100, 90),
	(10, 'Áo sơ mi nam', 300000, 350000, 'aosominam4.jpg', '2019-02-17 00:00:00', '2019-02-17 00:00:00', 1, 17, 20, 20),
	(11, 'Áo sơ mi xám', 300000, 400000, 'aosominam3.jpg', '2019-02-17 00:00:00', '2019-02-17 00:00:00', 1, 17, 45, 34),
	(12, 'Áo sơ mi 2', 300000, 400000, 'aosominam5.jpg', '2019-02-20 00:00:00', '2019-02-20 00:00:00', 1, 17, 100, 98),
	(13, 'Đầm dạ hội', 500000, 700000, 'dam.jpg', '2019-03-04 00:00:00', '2019-03-04 00:00:00', 2, 19, 10, 5),
	(16, 'Áo sơ mi nữ công sở', 350000, 475000, 'aotrang.jpg', '2019-03-04 00:00:00', '2019-03-04 00:00:00', 2, 18, 4, 2);
/*!40000 ALTER TABLE `sanpham` ENABLE KEYS */;

-- Dumping structure for table fashion2.size
CREATE TABLE IF NOT EXISTS `size` (
  `s_ma` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `s_ten` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `s_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm đầu tiên tạo size sản phẩm',
  `s_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật size sản phẩm',
  `s_trangThai` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT 'Trạng thái size sản phẩm: 1-khóa , 2-khả dụng',
  PRIMARY KEY (`s_ma`),
  UNIQUE KEY `size_s_ten_unique` (`s_ten`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.size: ~0 rows (approximately)
/*!40000 ALTER TABLE `size` DISABLE KEYS */;
/*!40000 ALTER TABLE `size` ENABLE KEYS */;

-- Dumping structure for table fashion2.taikhoan
CREATE TABLE IF NOT EXISTS `taikhoan` (
  `tk_ma` bigint(20) unsigned NOT NULL COMMENT 'Mã tài khoản',
  `tk_username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Username dùng để đăng nhập',
  `tk_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Password dùng để đăng nhập',
  `tk_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm cập nhật tài khoản',
  `tk_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm tạo # Thời điểm tạo mới tài khoản',
  `tk_trangThai` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT 'Trạng thái # Trạng thái tài khoản: 1-Khóa, 2-Khả dụng',
  `q_ma` tinyint(3) unsigned NOT NULL COMMENT 'Mã quyền đăng nhập tài khoản',
  PRIMARY KEY (`tk_ma`),
  KEY `taikhoan_q_ma_foreign` (`q_ma`),
  CONSTRAINT `taikhoan_q_ma_foreign` FOREIGN KEY (`q_ma`) REFERENCES `quyen` (`q_ma`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tài khoản # Tài khoản';

-- Dumping data for table fashion2.taikhoan: ~0 rows (approximately)
/*!40000 ALTER TABLE `taikhoan` DISABLE KEYS */;
/*!40000 ALTER TABLE `taikhoan` ENABLE KEYS */;

-- Dumping structure for table fashion2.thanhtoan
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
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gioitinh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `namsinh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dienthoai` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `q_ma` tinyint(3) unsigned NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `username`, `gioitinh`, `namsinh`, `diachi`, `dienthoai`, `q_ma`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Nguyễn Văn Anh', 'nvanh', 'Nam', '2004', 'Cần Thơ', '012345678', 3, 'nvanh123@gmail.com', '$2y$10$wne9EMhbShPkrO8eGQPHN.eqo4z4M0e70l8JN8u3rgCaVo17MhM2.', NULL, '2019-02-27 08:24:39', '2019-02-27 08:24:39'),
	(2, 'Nguyễn Anh Tuấn', 'anhtuan', 'Nam', '1950', 'TP. Hồ Chí Minh', '0912345678', 3, 'tuananh23@gmail.com', '$2y$10$AQJ2Rqdj0X9FqONdQU3VAOe5VM7lKd/v6pwkqRhOVfQ9qINFU1xNK', NULL, '2019-02-27 08:50:07', '2019-02-27 08:50:07'),
	(3, 'Nguyễn Yến Duyên', 'nyduyen', 'Nữ', '1997', 'Bến Tre', '01626465624', 1, 'nguyenyenduyen1506@gmail.com', 'duyen156', NULL, NULL, NULL),
	(4, 'Trần Thị Cẫm Châu', 'cchauu', 'Nữ', '1997', 'An Giang', '0912367896', 3, 'chau246@gmail.com', '$2y$10$4bI9HI1g8HB0Wc1KbOiEHeJDuYIY/2R.vHqaRjGjNmbwpo4u42G7u', NULL, '2019-02-28 03:23:34', '2019-02-28 03:23:34'),
	(5, 'Yến Duyên\r\n', 'duyengia', 'Nam', '1950', 'Cần Thơ', '012345678', 3, 'duyengia@gmail.com', '$2y$10$G6PHodG.YfaEEBz2EAGpIe6zuRz/gHWxgT/jkvDEbqjTvgbfOLQPq', 'KzQixsUnH0klbZk3GqEqOcZXMD238DCWyNVYB9unigvjDHReYcvsrxTlnvKv', '2019-03-01 03:42:59', '2019-03-01 03:42:59');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table fashion2.vanchuyen
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
CREATE TABLE IF NOT EXISTS `xuatxu` (
  `xx_ma` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `xx_ten` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `xx_taoMoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm đầu tiên tạo xuất xứ sản phẩm',
  `xx_capNhat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Thời điểm cập nhật xuất xứ sản phẩm',
  `xx_trangThai` tinyint(3) unsigned NOT NULL DEFAULT '2' COMMENT 'Trạng thái xuất xứ sản phẩm: 1-khóa , 2-khả dụng',
  PRIMARY KEY (`xx_ma`),
  UNIQUE KEY `xuatxu_xx_ten_unique` (`xx_ten`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table fashion2.xuatxu: ~0 rows (approximately)
/*!40000 ALTER TABLE `xuatxu` DISABLE KEYS */;
/*!40000 ALTER TABLE `xuatxu` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
