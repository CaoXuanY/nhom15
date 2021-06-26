-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3309
-- Thời gian đã tạo: Th1 07, 2021 lúc 02:04 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `q1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manufactures`
--

DROP TABLE IF EXISTS `manufactures`;
CREATE TABLE IF NOT EXISTS `manufactures` (
  `manu_id` int(11) NOT NULL AUTO_INCREMENT,
  `manu_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`manu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manufactures`
--

INSERT INTO `manufactures` (`manu_id`, `manu_name`) VALUES
(1, 'Oppo'),
(2, 'Apple'),
(3, 'SamSung'),
(4, 'Redmi'),
(5, 'Vivo'),
(6, 'hồng'),
(7, 'nhom 15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manu_id` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `pro_images` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK01_manuID` (`manu_id`),
  KEY `FK02_typeID` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `manu_id`, `type_id`, `price`, `pro_images`, `description`, `feature`, `created_at`) VALUES
(4, 'iphone xs Max 64Gb', 2, 1, 13790000, '636748771942273320_iphone-xs-max-black_1_3_wp5x-kj.png', 'Hoàn toàn xứng đáng với những gì được mong chờ, phiên bản cao cấp nhất iPhone Xs Max 64 GB của Apple năm nay nổi bật với chip A12 Bionic mạnh mẽ, màn hình rộng đến 6.5 inch, cùng camera kép trí tuệ nhân tạo và Face ID được nâng cấp', 1, '2020-11-20 08:42:10'),
(5, 'iphone 11 64GB', 2, 1, 14490000, '1_53_7_1_88ns-5t.jpg', 'Sau bao nhiêu chờ đợi cũng như đồn đoán thì cuối cùng Apple đã chính thức giới thiệu bộ 3 siêu phẩm iPhone 11 mạnh mẽ nhất của mình vào tháng 9/2019. Có mức giá rẻ nhất nhưng vẫn được nâng cấp mạnh mẽ như chiếc iPhone Xr năm ngoái, đó chính là phiên bản iPhone 11 64GB.', 1, '2020-11-20 08:42:16'),
(7, 'Samsung Galaxy Note 10 Lite', 3, 1, 8890000, '637148517611735452_ss-note10-lite-bac-1_kbze-az.png', 'Sau bao đồn đoán và trông ngóng thì cuối cùng \"người em út\" trong series Note 10 cũng đã chính thức trình làng với tên gọi Samsung Galaxy Note 10 Lite với những thay đổi nhất định về ngoại hình.', 1, '2020-11-20 08:42:33'),
(8, 'Samsung Galaxy A71\r\n', 3, 1, 7590000, '8308cecfebc32911b38f333d372dadb5.jpg', 'Sau A51, Samsung tiếp tục ra mắt Galaxy A71 là đại diện kế tiếp thuộc thế hệ smartphone Galaxy A 2020. Máy được cải tiến với camera macro siêu cận đột phá, camera chính lên đến 64 MP cùng thiết kế thời thượng và cao cấp.', 1, '2020-11-20 08:42:39'),
(9, 'Samsung Galaxy A51 (4/64GB)\r\n', 3, 1, 6290000, '637109792483576058_ss-a51-xanh-1.png.jpg', 'Samsung đã ra mắt điện thoại Samsung Galaxy A51 mở đầu cho thế hệ Galaxy A 2020 hướng tới giới trẻ hiện đại, thời thượng. Máy sở hữu cụm 4 camera, bao gồm camera macro chụp cận cảnh lần đầu xuất hiện trên smartphone Galaxy, màn hình tràn viền vô cực cùng mặt lưng họa tiết kim cương nổi bật.', 1, '2020-11-20 08:42:47'),
(10, 'SamSung Galaxy A21s\r\n\r\n', 3, 1, 3790000, '9b17270ebea2459f929c070574b27d87.jpg', 'Samsung Galaxy A21s 3GB/32GB là phiên bản kế nhiệm của Galaxy A21 vừa ra mắt, được Samsung nâng cấp cả về hiệu năng, chất lượng camera và dung lượng pin. Thiết kế hiện đại bên cạnh mức giá hấp dẫn, giúp sản phẩm trở thành một lựa chọn hấp dẫn trong tầm giá.', 0, '2020-11-20 08:42:54'),
(11, 'Samsung Galaxy Tab A8 8\" T295 (2019)\r\n', 3, 1, 3290000, '636973183082447415_samsung-galaxy-tab-a8-2019-den-1.png', 'Đặc điểm nổi bật của Samsung Galaxy Tab A8 8\" T295 (2019)\r\nSamsung Galaxy Tab A8 8 inch T295 (2019) là một chiếc máy tính bảng gọn nhẹ, với màn hình vừa đủ có thể giúp bạn giải trí hay hỗ trợ trẻ nhỏ trong việc học tập.', 1, '2020-11-20 08:43:02'),
(12, 'Vivo Y20\r\n', 5, 1, 3490000, 'vivo-y20 (1).png', 'Vivo Y20 – Smartphone giá rẻ, pin 5000mAh siêu trâu\r\nVivo Y20 thuộc phân khúc smartphone giá rẻ của điện thoại Vivo nhưng vẫn có thiết kế cuốn hút cùng với cấu hình khỏe và pin siêu trâu. Với dung lượng pin 5000mAh và chip 460 8 nhân, máy sẽ mang đến cho bạn những trải nghiệm tuyệt vời suốt ngày dài.\r\n\r\nThiết kế nguyên khối, chất liệu nhựa Polymer cao cấp, hiệu ứng màu gradient đẹp mắt\r\nVivo Y20 có thiết kế đơn giản nhưng tinh tế và sang trọng không hề thua kém bất kỳ dòng smartphone cao cấp nào với chất liệu nhựa Polymer cao cấp, cứng cáp. Chất liệu nhựa Polymer giả kính mang đến mặt lưng bóng bẩy.', 0, '2020-12-27 08:30:04'),
(13, 'Vivo V19', 5, 1, 6990000, 'vivo-v19-_4.png', 'Điện thoại Vivo V19 – Thiết kế nổi bật, 4 camera chụp đêm cực đỉnh\r\nVivo V19 là smartphone thuộc phân khúc tầm trung được ra mắt vào năm 2020 của thương hiệu Vivo và nhận được sự yêu thích của nhiều người dùng. Điện thoại Vivo này với thiết kế nổi bật và phù hợp với xu hướng hiện đại với màu sắc thời thượng, cấu hình vượt trội cùng với hệ thống camera với chế độ chụp ảnh ban đêm siêu ấn tượng chắc chắn sẽ mang đến cho người dùng nhiều trải nghiệm thú vị.\r\n\r\nThiết kế khung nhựa và mặt lưng kính, màu Bạc thời thượng\r\nVivo V19 có thiết kế hiện đại theo xu hướng của những smartphone cao cấp hiện nay với phần khung nhựa cứng cáp cùng với mặt lưng kính tạo nên độ bóng bẩy, bắt sáng tốt cho vẻ ngoài nổi bật. Điện thoại có kích thước 159.6 x 75 x 8.5 mm cùng với trọng lượng chỉ 186.5g vô cùng gọn nhẹ mang đến sự thoải mái khi cầm cũng như gọn gàng khi cho vào túi.', 1, '2020-11-20 08:43:17'),
(14, 'Vivo V20', 5, 1, 7190000, 'vivo-v20_1_ (1).jpg', 'Điện thoại Vivo V20 - Công nghệ hiện đại, đẳng cấp đến từ camera\r\nTuy là một thương hiệu khá mới mẻ nhưng Vivo nhanh chóng xây dựng được chỗ đứng trên thị trường điện thoại Việt Nam. Với thiết kế sang trọng, tính năng hiện đại Vivo ngày càng khẳng định được chất lượng trong từng mẫu smartphone của mình. Và Vivo V20 cũng không phải là ngoại lệ.\r\n\r\nThiết kế chuẩn xu hướng, mặt lưng phong cách gradient\r\nVivo V20 được khoác lên mình diện mạo theo chuẩn xu hướng smartphone 2020 được ưa chuộng nhất trên thị trường hiện nay. Khung viền được làm bằng kim loại, 2 bề mặt được phủ kính cường lực các góc cạnh bo tròn. Cảm biến vân tay cơ học được tích hợp bên trong màn hình.', 1, '2020-12-27 03:51:26'),
(15, 'Vivo Y50', 5, 1, 5290000, 'vivo-y50-_3.png', 'vivo-y50-_3.png', 1, '2020-11-29 03:00:27'),
(16, 'Vivo Y30', 5, 1, 3890000, 'vivo-y30-_3 (1).png', 'Điện thoại Vivo Y30 - Smartphone giá rẻ với viên pin sử dụng lâu dài\r\nBạn đang tìm kiếm một chiếc điện thoại có mức giá tầm trung, sức mạnh bền bỉ, cùng viên pin đủ khả năng giúp bạn trải nghiệm các tính năng trong ngày dài. Trước khi ra quyết định mua sắm một chiếc điện thoại như trên thì mời bạn tham khảo thêm về Vivo Y30. Để hiểu và biết thêm thông tin thì mời bạn đọc tiếp bài bên dưới.\r\n\r\nThiết kế nguyên khối tinh tế bền bỉ cùng khả năng 2 sim 2 sóng linh hoạt, tiện lợi\r\nMang trong mình một thiết kết nguyên khối với chất liệu bằng nhựa cao cấp, giúp cho sản phẩm Vivo Y30 có một độ bền bỉ và chống va đập khá tốt. Việc trang bị sản phẩm nguyên khối còn giúp cho chiếc điện thoại vivo này trở nên liền mạch hơn hạn chế được các vấn đề về khó khăn trong trải nghiệm người dùng, giúp thiết bị trở nên bền bỉ hơn.', 0, '2020-12-27 02:54:14'),
(21, 'Xiaomi Redmi 9(3GB- 32GB)', 4, 1, 3100000, 'xiaomi-redmi-9-3gb-(2).jpg', 'Điện thoại Xiaomi Redmi 9 - Bốn camera cùng màn hình rộng đẹp mắt\r\nXiaomi Redmi 9 được trang bị màn hình phủ trọn mặt trước, vi xử lý 8 nhân 12nm và bốn camera sau chất lượng, đây là chiếc smartphone đáng chú ý trong phân khúc trung cấp, hứa hẹn sẽ là \"siêu phẩm\" của hãng điện thoại nổi tiếng Xiaomi trong năm nay. Ngoài ra, bạn cũng có thể tham khảo thêm Xiaomi Redmi 9A với mức giá hấp dẫn hơn.\r\n\r\nThiết kế bóng bẩy với cảm biến vân tay, màn hình rộng 6.53 inch phủ trọn mặt trước\r\nĐiện thoại Redmi 9 có thiết kế trẻ trung & năng động, sẵn sàng thu hút mọi ánh nhìn. Thân máy và phần khung được làm từ chất liệu nhựa, với mặt lưng có thêm lớp giả kính bóng bẩy & làm nổi bật lên màu sắc của chiếc máy. Mặt lưng cũng được bo cong nhẹ hai bên và bốn góc máy nhằm tạo cảm giác thoải mái khi cầm nắm, cùng cảm biến vân tay được tích hợp phía dưới camera. Ngoài ra, smartphone còn có khả năng chống tóe nước, cho phép người dùng an tâm sư dụng máy dưới điều kiện ẩm ướt.', 0, '2020-12-27 08:22:34'),
(22, 'Xiaomi Redmi Note 9 Pro 128GB', 4, 1, 6150000, 'redmi-note-9-pro_3.jpg', 'Thông số kỹ thuật\r\nHãng sản xuất	Xiaomi\r\nKích thước	165.8 x 76.7 x 8.8 mm\r\nTrọng lượng	209 g\r\nBộ nhớ đệm / Ram	6 GB\r\nBộ nhớ trong	128 GB\r\nLoại SIM	2 SIM (Nano-SIM)\r\nLoại màn hình	IPS LCD, 16 triệu màu, Corning Gorilla Glass 5, 450 nits\r\nKích thước màn hình	6.67 inches\r\nĐộ phân giải màn hình	1080 x 2400 pixels\r\nHệ điều hành	Android\r\nPhiên bản hệ điều hành	Android 10.0; MIUI 11\r\nChipset	Qualcomm SM7125 Snapdragon 720G (8 nm)\r\nCPU	Octa-core (2x2.3 GHz Kryo 465 Gold & 6x1.8 GHz Kryo 465 Silver)\r\nGPU	Adreno 618\r\nKhe cắm thẻ nhớ	microSDXC\r\nCamera sau	64 MP, f/1.9, 26mm (wide), 1/1.72\", 0.8µm, PDAF\r\n8 MP, f/2.2, 13mm (ultrawide), 1/4.0\", 1.12µm\r\n5 MP, f/2.4, (macro), 1.12µm\r\n2 MP, f/2.4, (depth)\r\nCamera trước	16 MP, f/2.5, (wide), 1.0µm\r\nQuay video	Trước: 1080p@30fps\r\nSau: 2160p@30fps, 1080p@30/60/120fps, 720p@960fps, gyro-EIS\r\n3G	HSPA 42.2/5.76 Mbps, EV-DO Rev.A 3.1 Mbps\r\n4G	LTE-A (4CA) Cat15 800/150 Mbps\r\nWLAN	Wi-Fi 802.11 a/b/g/n/ac, dual-band, Wi-Fi Direct, hotspot\r\nBluetooth	5.0, A2DP, LE\r\nGPS	A-GPS, GLONASS, GALILEO, BDS, NavIC\r\nUSB	2.0, Type-C 1.0 reversible connector\r\nCảm biến	Cảm biến vân tay, cảm biến tiệm cận, gia tốc kế, la bàn, con quay hồi chuyển\r\nPin	Li-Po 5020 mAh battery, Fast charging 30W', 1, '2020-12-27 08:26:32'),
(23, 'Xiaomi Redmi 9C', 4, 1, 2490000, 'redmi-9c_2_.jpg', 'Điện thoại Xiaomi Redmi 9C - Thiết kế tinh tế sang trọng, hiệu năng mạnh mẽ\r\nXiaomi là một trong những hãng công nghệ nổi bật trên thị trường hiện nay. Các sản phẩm của hãng này đều sở hữu thiết kế tinh tế cùng cấu hình mạnh mẽ khiến cho các sản phẩm từ hãng này luôn được người dùng đón nhận. Sau khi ra mắt Redmi 9 thì mới đây, hãng cũng vừa cho ra mắt thêm Xiaomi Redmi 9C với giá bán vô cùng hấp dẫn. Bạn đang tìm cho mình một chiếc điện thoại Xiaomi cấu hình mạnh và thiết kế bắt mắt bền bỉ thì đây chính là sự lựa chọn hoàn hảo dành cho bạn.\r\n\r\nThiết kế nguyên khối nhỏ gọn, màn hình IPS LCD 6.53 inch sắc nét\r\nRedmi 9C sở hữu thiết kế nguyên khối cứng cáp và bền bỉ, các chi tiết được nhà sản xuất hoàn thiện rất tỉ mỉ từ đó mang lại sự sang trọng và tinh tế cho sản phẩm, các góc được bo cong êm ái cho cảm giác cầm nắm thoải mái. Máy có kích thước khá nhỏ gọn cực kì mỏng nhẹ với kích thước nhỏ gọn như vậy bạn có thể dễ dàng bỏ vừa túi quần mang điện thoại đi khắp mọi nơi mà không hề xảy ra tình trạng cấn tú', 0, '2020-11-20 08:44:31'),
(24, 'Xiaomi Redmi Note 8 128GB', 4, 1, 4990000, '637060415977209905_xiaomi-redmi-note-8-trang-1_1.png', 'Thông số kỹ thuật\r\nHãng sản xuất	Xiaomi\r\nKích thước	Đang cập nhật\r\nTrọng lượng	Đang cập nhật\r\nBộ nhớ đệm / Ram	4 GB\r\nBộ nhớ trong	128 GB\r\nLoại SIM	2 SIM (Nano-SIM)\r\nLoại màn hình	LCD FULL HD\r\nKích thước màn hình	6.3 inches\r\nHệ điều hành	Android\r\nPhiên bản hệ điều hành	Android 9.0 (Pie)', 1, '2020-11-20 08:44:39'),
(25, 'Xiaomi Redmi Note 9s 4G 64GB', 4, 1, 4800000, 'redmi_note_9s_0002_layer_1.jpg', 'Xiaomi Redmi Note 9S – Smartphone cấu hình mạnh, 4 camera ấn tượng\r\nRedmi Note 9S là chiếc smartphone tầm trung mới nhất của Xiaomi được nâng cấp của điện thoại Redmi Note 9 hiện nay. Chiếc điện thoại này gây ấn tượng với cấu hình phần cứng mạnh mẽ 4GB RAM, hệ thống bốn camera sau chất lượng cùng mức giá bán cực kỳ hấp dẫn. Đây hứa hẹn sẽ là chiếc điện thoại gây bão trong thời gian sắp tới.\r\n\r\nThiết kế mặt lưng kính họa tiết gradient, màn hình lớn 6.67 inch, độ phân giải FullHD+\r\nĐiện thoại Redmi Note 9S có vẻ ngoài vô cùng nổi bật bởi mặt lưng kính bóng bẩy cùng hiệu ứng gradient. Hiệu ứng này đã và đang trở thành một trào lưu của các smartphone hiện nay. Khi nghiêng bạn có thể nhìn thấy màu sắc thay đổi ở các góc nhìn khác nhau. Do đó, khi cầm máy trên tay, chẳng khác gì bạn đang cầm món đồ trang sức.', 1, '2020-11-20 08:44:48'),
(27, 'Laptop HP 15s fq1111TU i3 1005G1/4GB/256GB/Win10 (193R0PA)', 2, 7, 11390000, 'hp-15s-fq1111tu-i3-193r0pa-224012-224012-600x600.jpg', 'Laptop HP 15s fq1111TU i3 (193R0PA) sở hữu độ hoàn thiện cao, thân máy mỏng nhẹ cùng cấu hình đủ dùng cho học tập, làm việc văn phòng và lướt web giải trí.', 1, '2020-11-29 03:29:07'),
(28, '\r\nLaptop Lenovo IdeaPad C340 14IML i3 10110U/8GB/512GB/Touch/Win10 (81TK007PVN)', 2, 7, 11400000, 'lenovo-ideapad-c340-14iml-i3-10110u-8gb-512gb-touc-5-213524-600x600.jpg', 'Laptop Lenovo IdeaPad C340 14IML i3 (81TK007PVN) là mẫu máy tính xách tay học tập văn phòng được trang bị chip Intel thế hệ 10 cùng RAM 8 GB, ổ cứng SSD 512 GB cực nhanh. Lenovo IdeaPad C340 được thiết kế mỏng nhẹ, thời trang, phù hợp cho giới trẻ, đặc biệt là những người cần đem theo laptop thường xuyên.', 1, '2020-11-29 03:29:30'),
(30, 'Laptop Acer Aspire 3 A315 54K 37B0 i3 8130U/4GB/256GB/Win10 (NX.HEESV.00D)\r\n', 2, 7, 9990000, 'acer-aspire-3-a315-nx-heesv-00d-221251-1-600x600.jpg', 'Acer Aspire 3 A315 54K 37B0 i3 (NX.HEESV.00D) là mẫu laptop học tập - văn phòng được thiết kế gọn nhẹ, vẫn mang đến nhiều điểm nổi bật khi sở hữu cấu hình tốt, ổ cứng SSD cực nhanh và màn hình Full HD sắc nét. Sản phẩm sẽ là lựa chọn tuyệt vời trong tầm giá', 1, '2020-11-29 03:51:09'),
(33, 'Loa Bluetooth JBL Boombox 2 Đen\r\n', 3, 8, 9690000, 'loa-bluetooth-jbl-boombox-2-den-ava-1-600x600.jpg', 'Vỏ của loa Bluetooth JBL Boombox 2 Đen được làm bằng nhựa hơi nhám ít bám bụi, vệ sinh dễ dàng. Loa có thiết kế hình trụ nằm có tay cầm phía trên giúp bạn dễ dàng di chuyển loa đi nhiều nơi, loa có khối lượng 5.5 kg vừa phải khi cầm lên cho cảm chắc tay nhưng không nặng.', 1, '2020-11-29 03:30:25'),
(34, 'Loa bluetooth Sony Extra Bass SRS-XB43', 3, 8, 4990000, 'loa-bluetooth-sony-srs-xb43-ava-600x600-1-600x600.jpg', 'Loa Bluetooth Sony có kiểu dáng hiện đại, gọn đẹp, năng động\r\nKích cỡ hơi lớn nhưng bạn vẫn cầm nắm, di chuyển thoái mái đến mọi nơi nghe nhạc. Màu đen, xanh dương đẹp mắt, tinh tế, dễ lựa chọn.', 1, '2020-11-29 03:30:42'),
(36, 'Loa Bluetooth JBL PULSE2BLKAS Đen\r\n', 3, 8, 2952000, 'loa-bluetooth-jbl-pulse2blkas-den-add-600x600-1-600x600.jpg', 'Đặc điểm nổi bật của Loa Bluetooth JBL PULSE2BLKAS Đen\r\n\r\nLoa Bluetooth JBL PULSE2BLKAS đen mang phong cách trẻ trung, năng động, cho các buổi tiệc âm thanh của bạn trở nên hoàn hảo hơn', 1, '2020-11-29 03:31:01'),
(38, 'Bàn Phím Cơ Có Dây Gaming Corsair K68 RGB Đen\r\n', 4, 9, 3100000, 'ban-phim-co-co-day-gaming-corsair-k68-rgb-den-600x600.jpg', 'Giới thiệu sản phẩm\r\nBàn Phím Cơ Có Dây Gaming Corsair K68 RGB Đen tạo hình thân thiện dành cho game thủ, đơn giản, rất đẹp mắt\r\nChất liệu nhựa cứng với bề mặt nhám cho người dùng những thao tác bấm chắc chắn, giúp bàn phím chống trầy tốt, thiết kế các chi tiết và góc cạnh không quá cầu kỳ, tạo sự quen thuộc và thân thiện cho game thủ trong từng thao tác, để dễ dàng làm chủ thế trận hơn trong mỗi hiệp đấu', 1, '2020-11-29 03:32:47'),
(40, 'Bàn Phím Cơ Có Dây Gaming Corsair K63 Đen\r\n', 4, 9, 1750000, 'ban-phim-co-co-day-gaming-corsair-k63-den-600x600.jpg', 'Giới thiệu sản phẩm\r\nThiết kế bàn phím cơ kiểu rút gọn - Tenkeyless đậm chất gaming\r\nBề mặt của bàn phím có màu đen cuốn hút cùng với đèn nền đỏ cho thiết kế cá tính, thời thượng, tô điểm cho phòng game của bạn thêm sành điệu. Trọng lượng chỉ 500 gram, kích cỡ gọn gàng cất giữ hoặc mang theo khi đi du lịch đơn giản', 1, '2020-11-29 03:33:22'),
(42, 'Bàn Phím Cơ Có Dây Gaming Rapoo V500 Pro Đen\r\n', 4, 9, 990000, 'ban-phim-co-co-day-gaming-rapoo-v500-pro-den-600x600.jpg', 'Thông số kỹ thuật\r\nTương thích:	Windows\r\nCách kết nối:	Dây cắm USB\r\nĐèn LED:	Có\r\nKích thước:	Dài 43.2 cm - Rộng 13 cm - Cao 4.5 cm\r\nTrọng lượng:	1 kg\r\nSản xuất tại:	Trung Quốc\r\nThương hiệu của:	Trung Quốc', 0, '2020-11-29 03:34:00'),
(45, 'Tai nghe', 1, 1, 100000000, 'MWP22-1400x1060.jpeg', 'Tai nghe 4.0', 1, '2021-01-06 17:10:09'),
(63, 'd', 1, 0, 1, 'samsung-galaxy-tab-a-plus-97-sm-p555-n-190x190.jpg', 'ds', 1, '2021-01-06 18:25:33'),
(64, 'hu', 1, 0, 12222222, 'hinh17.jpg', 'was', 1, '2021-01-06 18:26:53'),
(65, 'ba', 1, 0, 1, 'e71f183254abaaf5f3ba.jpg', 'asdad', 1, '2021-01-06 18:28:27'),
(66, 'ddsd', 1, 0, 1, 'lenovo-phab-2gb-400x460-400x460.png', 'dff', 1, '2021-01-06 18:29:53'),
(67, 'sddsdsds', 1, 0, 1, 'samsung-galaxy-s6-edge-plus-400x533.png', 'sasa', 1, '2021-01-06 18:30:48'),
(68, 'Thu', 1, 0, 2, 'note9pro.jpg', 'huy', 1, '2021-01-06 18:31:26'),
(69, 'nhom 15', 7, 7, 1234, 'oppo-a12-4gb-den-400x460-400x460.png', 'ds', 1, '2021-01-06 18:37:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `protypes`
--

DROP TABLE IF EXISTS `protypes`;
CREATE TABLE IF NOT EXISTS `protypes` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `protypes`
--

INSERT INTO `protypes` (`type_id`, `type_name`) VALUES
(0, 'hdjsdhs'),
(1, '1'),
(7, 'LapTop'),
(8, 'Loa'),
(9, 'Bàn Phím');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `pass`, `role_id`) VALUES
(1, 'user1', 'c4ca4238a0b923820dcc509a6f75849b', 1),
(3, 'admin', '806d8e1e323557a073a79d006c3fae11', 1),
(6, 'AdMin', 'e10adc3949ba59abbe56e057f20f883e', 0),
(8, 'Vinh', 'f103edaccc01274757afa2fa11161954', 0);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK01_manuID` FOREIGN KEY (`manu_id`) REFERENCES `manufactures` (`manu_id`),
  ADD CONSTRAINT `FK02_typeID` FOREIGN KEY (`type_id`) REFERENCES `protypes` (`type_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
