USE `medicinedb`;

CREATE TABLE `carts` (
  `id_product` int(11) NOT NULL,
  `id_user` text NOT NULL,
  `Product_name` text NOT NULL,
  `Product_img` text NOT NULL,
  `Product_price` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `carts` (`id_product`, `id_user`, `Product_name`, `Product_img`, `Product_price`) VALUES
(3, 3, 'Máy đo nồng độ oxi trong máu Microlife SpO2 OXI200', 'https://thietbiytevp.com/products/may-do-nong-do-oxy-trong-mau-microlife-spo2-oxy200-g.jpg', '849.000'),
(2, 2, 'Máy đo huyết áp Omron HEM-7361T', 'https://thietbiytevp.com/products/7316.jpg', '2.249.000'),
(6, 4, 'Máy massage chân tay bùng áp suất khí ZamZam-200', 'https://thietbiytevp.com/products/M16-1.jpg', '7.499.000');

CREATE TABLE `products` (
  `id` int(6) NOT NULL,
  `name` text NOT NULL,
  `brand` text NOT NULL,
  `description` text NOT NULL,
  `price` text NOT NULL,
  `coverImg` text NOT NULL,
  `altImg1` text NOT NULL,
  `altImg2` text NOT NULL,
  `altImg3` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `products` (`id`, `name`, `brand`, `description`, `price`, `coverImg`, `altImg1`, `altImg2`, `altImg3`) VALUES
(1, 'Máy đo đường huyết Accu Chek Instant', 'familyHealth', 'Máy Accu-Chek Instant cho kết quả chính xác, đáp ứng và vượt tiêu chuẩn ISO 15197:2013, sử dụng được 4 loại máu, hạn chế sai số nhờ men thử ít tương tác và giới hạn Hct rộng. Máy sử dụng một nút cho mọi chức năng giúp thao tác đơn giản hơn', '1.049.000', 'https://thietbiytevp.com/products/accu%20chek%20instant.jpg', 'https://bizweb.dktcdn.net/100/370/247/files/may-do-duong-huyet-accu-check-instant-ytevietha.jpg?v=1593157795626', 'https://driver.gianhangvn.com/file/Accuchek-Instant-793383f18698.jpg', 'https://ytesaigon.com/wp-content/uploads/2019/08/accu-chek-instant-6.jpg'),
(2, 'Máy đo huyết áp Omron HEM-7361T', 'familyHealth', 'Máy đo huyết áp bắp tay Omron đo theo phương pháp dao động cho kết quả đo rất chính xác, đáng tin cậy. Đây là thương hiệu máy đo huyết áp số 1 tại thị trường Nhật Bản, được người tiêu dùng tin tưởng lựa chọn.', '2.249.000', 'https://thietbiytevp.com/products/7316.jpg', 'https://bizweb.dktcdn.net/thumb/1024x1024/100/361/467/products/may-do-huyet-ap-omron-7361t-68.jpg?v=1591139965250', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9oJsyEbMuLiL0ew4DfJMmVD1FXtsfEw3h5A&usqp=CAU ', 'https://cf.shopee.vn/file/682c5e372e6fd2cad05a72492a8fbfe1'),
(3, 'Máy đo nồng độ oxi trong máu Microlife SpO2 OXI200', 'familyHealth', 'Microlife SpO2 OXY200 là sản phẩm rất cần thiết cho những phòng khám, bệnh viện hay những bệnh nhân được bác sĩ chỉ định dùng máy đo nồng độ oxy trong máu tại nhà', '849.000', 'https://thietbiytevp.com/products/may-do-nong-do-oxy-trong-mau-microlife-spo2-oxy200-g.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTz99oiVtb_N5YbVjWJ_5gQf7VFPvyCIk6Fsg&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcMOeSpZ0F9O3dVDZF_rMdRfuZSnbqymK5bg&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTrU3-E2tTRHrzSeFj-RKe4tDE4MQIxw_FsLw&usqp=CAU'),
(4, 'Máy massage chân tay bùng áp suất khí ZamZam-200', 'familyHealth', 'Máy massage chân tay bụng áp suất khí ZamZam-200 sử dụng phương pháp biến thiên áp suất tuần hoàn, bơm nạp khí và xả liên tục cho máu lưu thông giúp làm thúc đẩy dòng chảy trong tĩnh mạch hoạt động ổn định, bình thường. Máy giúp điều trị phòng ngừa suy giảm tĩnh mạch, ngăn ngừa hình thành máu đông, tăng cường tuần hoàn máu mang đến một cơ thể khỏe mạnh cường tráng cho người dùng.', '8.999.000', 'https://thietbiytevp.com/products/zam%20zam.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSwLzC6Kp31GIS9Ecg47JzI9ZA1MRN7zyu0Sg&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQnWgy3NQ8E6VtC0wVAWtz54v5jq4NC-oA9Cw&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxuhwR0r4C61XFYoSS8NS_TPqvkZ1UIH6clg&usqp=CAU'),
(5, 'Xe lăn đa năng Lucass X607', 'familyHealth', 'Xe lăn đa năng Lucass X607 có 2 bánh chống lật đảm bảo an toàn, là loại xe lăn đa năng của thương hiệu Lucass – Mỹ, được ưa chuộng tại nhiều quốc gia và có mặt tại Việt Nam đáp ứng nhu cầu đa dạng của khách hang.', '2.799.000', 'https://thietbiytevp.com/products/xe-lan-da-nang-lucass-x607-2-banh-xe-chong-lat.jpg', 'https://giuongbenhnhan.com/data/news/2421/LUCASS%20X7%205.jpg ', ' https://giuongbenhnhan.com/data/news/2421/LUCASS%20X7%2010.jpg', 'https://giuongbenhnhan.com/data/news/2421/LUCASS%20X7%20%209.jpg'),
(6, 'Giường điện 3 chức năng NAKITA NKM B10', 'medicalBed', 'Giường điện 3 chức năng NAKITA NKM B10 CÔNG NGHỆ NHẬT BẢN. Điều khiển bằng điện thông qua remote, 3 chức năng nâng hạ đầu, nâng hạ chân, nâng cao thấp mặt giường', '13.499.000', 'https://thietbiytevp.com/products/B10.jpg', 'https://imgur.com/UaGOlPO', 'https://imgur.com/eJaZ89J', 'https://imgur.com/5qeg06t'),
(7, 'Giường bệnh 3 tay quay Nakita NKM B03', 'medicalBed', 'Giường bệnh 3 tay quay Nakita NKM B03 Chức năng: Nâng hạ đầu, Nâng hạ chân, Nâng cao thấp mặt giường', '9.999.000', 'https://thietbiytevp.com/products/500%20500.jpg', 'https://imgur.com/BjBdtqK', 'https://imgur.com/F1AigmO', 'https://imgur.com/RFN1Vqw'),
(8, 'Giường bệnh nhân 2 tay quayNAKITA NKM-B02', 'medicalBed', 'Tiện lợi cho người bệnh nằm 1 chỗ lâu ngày. Cấu tạo giường bằng THÉP TẤM  sơn tĩnh điện, có 2 thanh chắn 2 bên có thể dễ dàng nâng lên hạ xuống được. Đầu giường làm bằng nhựa ABS có thể tháo lắp dễ dàng. Bộ sản phẩm bao gồm giường, nệm, cây treo dịch truyền', '7.499.000', 'https://thietbiytevp.com/products/M16-1.jpg', 'https://imgur.com/w030iUW', 'https://imgur.com/isH5nzZ', 'https://thietbiytevp.com/products/M16-1.jpg'),
(9, 'Giường điện đa năng Lucass GB-T5D', 'medicalBed', 'Giường điện đa năng Lucass GB-T5D là loại giường bệnh điện điều khiển tự động kết hợp tay quay cao cấp hỗ trợ chăm sóc bệnh nhân. Giường được sản xuất trên dây chuyền công nghệ hiện đại của Mỹ đảm bảo tiêu chuẩn cao được xuất khẩu sang các nền kinh tế phát triển như Châu Âu, Mỹ.', '17.999.000', 'https://thietbiytevp.com/products/giuonng%20da%20nang%20lucass%20t5d.jpg', 'https://giuongbenhnhan.com/data/news/2439/giuong-benh-Lucass-T5D.jpg', 'https://giuongbenhnhan.com/data/news/2439/giuong-benh-Lucass-T5D%202.jpg', 'https://giuongbenhnhan.com/data/news/2439/Giuong-benh-nhan-Lucass-web%205.jpg'),
(10, 'Giường bệnh nhân đa chức năng Lucass GB-T41', 'medicalBed', 'Giường bệnh nhân đa chức năng Lucass GB-T41 là loại giường bệnh đa chức năng cao cấp điều khiển bằng tay quay.', '11.199.000', 'https://thietbiytevp.com/products/Gi%C6%B0%E1%BB%9Dng%20lucass%204%20tay%20quay%20GB-T41.jpg', 'https://giuongbenhnhan.com/data/news/2438/Giuong-benh-nhan-Lucass-web.jpg', 'https://giuongbenhnhan.com/data/news/2395/Gi%C6%B0%E1%BB%9Dng%20Nikita%20DCN04.jpg', 'https://giuongbenhnhan.com/data/news/2438/Giuong-benh-nhan-Lucass-web%208.jpg'),
(11, 'Máy trợ thính NewSound Vivo 201', 'hearingAids', 'Máy được sản xuất theo công nghệ kỹ thuật số hiện đại nhất. Công nghệ giảm độ ồn vượt trội. Có 2 chương trình được thiết kế sẳn. Tùy theo môi trường âm thanh mà chọn chương trình phù hợp. Cảnh báo pin yếu. Nút điều chỉnh âm thanh kỹ thuật số: nhấn nút điều chỉnh âm thanh lên hoặc xuống để tăng hay giảm âm lượng. Nhấn tăng trong 3 giây, chương trình sẽ điều chỉnh âm lượng sang kênh khác.', '2.999.000', 'https://thietbiytevp.com/products/may-tro-thinh-newsound-vivo-201(1).jpg', 'https://huynhngocmedical.com.vn/upload/images/Products/may-tro-thinh-newsound-vivo-201-01.jpg', 'https://huynhngocmedical.com.vn/upload/images/Products/may-tro-thinh-newsound-vivo-201-02.jpg', 'https://huynhngocmedical.com.vn/upload/images/Products/may-tro-thinh-newsound-vivo-201-03.jpg'),
(12, 'Máy trợ thính New Sound B80P', 'hearingAids', 'Người lớn tuổi bị lãng tai do tuổi tác cao làm lão hóa giảm khả năng nghe, những máy trợ thính có dây với thao tác đơn giản, âm thanh to và rõ ràng rất phù hợp. Sản phẩm Máy trợ thính New Sound B80P có dây với những nút bấm to trên thân máy và chất lượng âm thanh rõ ràng, rất phù hợp cho người lớn tuổi bị nặng tai. Người dùng dễ dàng thao tác mà không cần tới sự trợ giúp của người ngoài, pin tiểu dễ mua và máy dễ bảo quản, độ bền cao. Sản phẩm rất phù hợp cho người lớn tuổi do máy có chất lượng âm thanh to, rõ ràng và dễ thao tác sử dụng cũng như bảo quản, độ bền cao.', '1.299.000', 'https://thietbiytevp.com/products/may-tro-thinh-newsound-b80p.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSehqGNIXHYG8QfBlnpwVjg7TpaC5jhalqIjQ&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTeE3_m5B3Ika0JuW4cQqIy20I2HAxxNCPUMA&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRfM7JXF0HGbXicZvtBl9Qny4-_xWXPfBo5hA&usqp=CAU'),
(13, 'Máy trợ thính có dây Rionet HA-20DX', 'hearingAids', 'Rionet HA-20DX là loại bỏ túi có dây, có độ bền cao, có bộ phận cài (kẹp) tránh bị rơi hay mất máy; các nút tắt/bật, điều chỉnh âm lượng to, phù hợp với mọi đối tượng sử dụng.', '1.099.000', 'https://thietbiytevp.com/products/may-tro-thinh-Rionet-HA-20Dx-300.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ-3mip32o0XGep4N_v_PTTNC9PgYhk2xvy5w&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSPJBdLI_LfZvDFI-lADgj5yt0_3_qkAdfFrg&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7HMyFcabhHKnESzrmid5zEK6mFpnb3Jef6w&usqp=CAU'),
(14, 'Máy trợ thính nhét tai HM-06', 'hearingAids', 'Máy trợ thính không dây, nhỏ gọn Rionet HM-06 là loại máy có kích thước nhỏ gọn chỉ bằng hạt lạc (đậu phụng). Máy được lắp nhỏ gọn trong vành tai, đảm bảo tính thẩm mỹ cao, kín đáo. Sản phẩm được sản xuất tại Nhật Bản.', '3.699.000', 'https://thietbiytevp.com/products/rionet-hm-06.jpg', 'https://yte247.vn/upload_images/detail/tro_thinh/rionet_hm_06_dai_dien.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRuTeeneQNjOr4ZTsuBtypIgiewWd9FEhWROw&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRToZpLYhbqOf02qo4x0IT81e8AIg4nHU9CWA&usqp=CAU'),
(15, 'Máy trợ thính không dây HB-23P', 'hearingAids', 'Máy trợ thính là sản phẩm hỗ trợ người lớn tuổi bị lãng tai, người bi điếc đột ngột. Máy trợ thính có cấu tạo tương tự một phát phát và thu âm, âm thanh sau khi thu nhận được sẽ khuếch đại lên và chuyển đến tai người dùng.
Máy trợ thính không dây (móc vành tai) mang tính thẩm mỹ cao. Máy trợ thính vành tai HB-23P là dòng máy trợ thính móc trên vành tai được sản xuất theo công nghệ Nhật Bản. Máy trợ thính vành tai HB-23P dùng cho người già, trẻ nhỏ và dân công sở. Dùng cho người bị điếc vừa phải (nói to vẫn có thể nghe được).', '1.849.000', 'https://thietbiytevp.com/products/may%20tro%20thinh%20hp23b.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTspypWh6uU_KDKOQHei9Sj3j95ZDkAjRwnfQ&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRdGiblIo6mbkvhqdrn3WlY7iVjhxU55vn-fg&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTQF7pEwIX0rSZmkI2enVwsMGay0gXlhxrYOQ&usqp=CAU'),
(16, 'Bàn khám sản', 'inox', 'Bàn khám phụ khoa được sản xuất hoàn toàn bằng inox dùng trong các bệnh viện dùng để khám phụ khoa.', '1.799.000', 'https://thietbiytevp.com/products/ban%20kham%20san%20inox.jpg', 'https://driver.gianhangvn.com/file/ban%20kham%20phu%20khoa-290608f18698.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSgN2i-MyC42Ms1hvIFEjRRcnXq3b7sjdZ4nQ&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6Xf6sKxu9uvE6WwOqgloxAZyBQQ7xf6jWKw&usqp=CAU'),
(17, 'Tủ thuốc y tế inox', 'inox', ' Kích thước tủ : 800x400x1600 (mm) (DxRxC). Mặt dựng bằng Inox dày 0,4 – 0,5mm. Kết cấu tủ thuốc chia làm 2 phần. Phần trên có 3 ngăn đựng dụng cụ và thuốc. Mặt đứng gồm có 2 cánh cửa kèm theo ổ khóa và tay nắm. Mặt hông tủ làm bằng Inox. Mặt sau làm bằng Inox tấm dày 0,4mm. Phần dưới gồm có 2 ngăn. Phía dưới có 2 cánh cửa gồm ổ khóa và tay nắm', '2.399.000', 'https://thietbiytevp.com/products/tu-thuoc-y-te-inox.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ2JpMv85gIxLzJ_OnaHwhFOFWboruH9jugzA&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR-A7OwTOr1UcWHmNOAk1hbhRIRUia0LK7qYA&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS_v84BSSAbO8v-rqtgT_7ZteR_0SJDCwsQ6A&usqp=CAU'),
(18, 'Ghế xoay', 'inox', 'Mặt ghế inox 201 Ø32.0 dày 1.2mm đúc liền, 04 chân inox Ø19.1x1.0, Ghế dùng trong y tế. Có thể tăng lên xuống. Inox nguyên chiếc', '329.000', 'https://thietbiytevp.com/products/gx.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpsBXQCL2H35TuDIxhgBf5R5YTbDB8sP0arg&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQx_7gq_FRh0X9HutYN0hr1w9LnNESbNxgCrQ&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTPjSJDR8VTGq9FoPO3oerNRvMTOJQ8WNfUNw&usqp=CAU'),
(19, 'Xe đẩy bình oxi 2m3', 'inox', 'Xe đẩy bình oxy là một phương tiện vận chuyển bình oxy an toàn dễ dàng trong bệnh viện, phòng khám, trạm xá và sử dụng chuyển bình oxy trong gia đình. Giá đỡ bình oxy còn là một phương tiện chống ngã bình oxy khi gia đình có trẻ em và phòng tránh nhiều trường hợp ngã bình oxy gây nguy hiểm. Xe đẩy bình oxy y tế được sản xuất bằn inox SUS201 chuyên dùng đẩy bình oxy y tế loại 6 khổi dễ dàng từ nơi này đến nơi khác. Bình oxy khi để trên khung xe đẩy được bảo vệ với khóa dây xích tránh bình rơi ra khi vận chuyển.
Xe đẩy bình oxy sử dụng 2 bánh xe chính có đường kính 175mm với trục bi lăn giúp xe vận chuyển êm đồng thời có sử dụng bánh xe phụ tạo gắn vào phía xe đẩy giúp tạo thế ba chân và có thể xếp gọn bánh xe phụ này khi không cần thiết dùng đến.', '249.000', 'https://thietbiytevp.com/products/xe-day-binh-oxy-2m3.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSjW7grmERfJeB7kMBqpOobEOwepHjuzWV34Q&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRtJY78s9x0TP6U6nbm1_x8HK_m6k3vGVTMQQ&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcROx3KOxhD9W5m6GfDKmQBB0KgMC2GJzp1KKg&usqp=CAU'),
(20, 'Bàn khám tiểu phẫu', 'inox', 'Bàn khám tiểu phẫu', '1.249.000', 'https://thietbiytevp.com/products/ban-kham-tieu-phau.jpg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRxkwwf6_RKKk7VLX5a5_BTPndFgCIH16lBlw&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSN0H5DiXxOaIPxFZpgZ5tEOXCmYVLvl1u2pw&usqp=CAU', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTr8hfhlzZrC4AHRFr5eHrfG6W9x353Mdm8yA&usqp=CAU');
CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `users` (`id`, `email`, `password`, `isAdmin`) VALUES
(1, 'admin@admin', 'admin', 1),
(2, 'batman@batman', 'batman', 0),
(3, 'batman@gmail.com', 'batman', 0),
(4, 'anbeo@gmail.com', 'batman', 0),
(6, 'truongan@gmail.com', 'batman', 0),
(7, 'truongan1@gmail.com', 'batman', 0),
(8, 'batman1@gmail.com', 'batman', 0);

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

COMMIT;