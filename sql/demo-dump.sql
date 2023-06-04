-- demonstration, dumped from PMA
-- only use this if you *just* have created SchoolDatabase,
-- and need some data to preview the website.

USE SchoolDatabase;

INSERT INTO `users` (`id`, `username`, `password`, `real_name`, `gender`, `hometown`, `permission`, `created_at`) VALUES
(1, 'tranthienthanh', '1', 'Trần Thiên Thành', 'Nam', 'Quy Nhơn, Bình Định', 1, '2023-05-23 09:56:10'),
(2, 'hovanlam', '1', 'Hồ Văn Lâm', 'Nam', 'Quy Nhơn, Bình Định', 1, '2023-05-23 09:56:10'),
(3, 'phamvanphu', '1', 'Phạm Văn Phu', 'Nam', 'Quy Nhơn, Bình Định', 1, '2023-05-23 09:56:10'),
(4, 'phamvanviet', '1', 'Phạm Văn Việt', 'Nam', 'Quy Nhơn, Bình Định', 1, '2023-05-23 09:56:10'),
(5, 'phamtranthien', '1', 'Phạm Trần Thiện', 'Nam', 'Quy Nhơn, Bình Định', 1, '2023-05-23 09:56:10'),
(6, 'hoanhminh', '1', 'Hồ Anh Minh', 'Nam', 'Quy Nhơn, Bình Định', 1, '2023-05-23 09:56:10'),
(7, 'nguyenthikimphuong', '1', 'Nguyễn Thị Kim Phượng', 'Nữ', 'Quy Nhơn, Bình Định', 1, '2023-05-23 09:56:10'),
(8, 'nguyenthiloan', '1', 'Nguyễn Thị Loan', 'Nữ', 'Quy Nhơn, Bình Định', 1, '2023-05-23 09:56:10'),
(9, 'phungvanminh', '1', 'Phùng Văn Minh', 'Nam', 'Quy Nhơn, Bình Định', 1, '2023-05-23 09:56:10'),
(10, 'trandinhluyen', '1', 'Trần Đình Luyện', 'Nam', 'Quy Nhơn, Bình Định', 1, '2023-05-23 09:56:10'),
(11, 'nguyenngocdung', '1', 'Nguyễn Ngọc Dũng', 'Nam', 'Quy Nhơn, Bình Định', 1, '2023-05-23 09:56:10'),
(12, 'levanan', '1', 'Lê Văn An', 'Nam', 'Quy Nhơn, Bình Định', 1, '2023-05-23 09:56:10'),
(13, 'nguyentongxuan', '1', 'Nguyễn Tòng Xuân', 'Nam', 'Quy Nhơn, Bình Định', 1, '2023-05-23 09:56:10'),
(14, 'tranthithanhhuyen', '1', 'Trần Thị Thanh Huyền', 'Nữ', 'Quy Nhơn, Bình Định', 1, '2023-05-23 09:56:10'),
(15, 'truongthanhlong', '1', 'Trương Thanh Long', 'Nam', 'Quy Nhơn, Bình Định', 1, '2023-05-23 09:56:10'),
(16, 'hoangvanduc', '1', 'Hoàng Văn Đức', 'Nam', 'Quy Nhơn, Bình Định', 1, '2023-05-23 09:56:10'),
(17, 'donguyenkhanhquynh', '1', 'Đỗ Nguyễn Khánh Quỳnh', 'Nữ', 'Quy Nhơn, Bình Định', 1, '2023-05-23 09:56:10'),
(18, 'maithitham', '1', 'Mai Thị Thắm', 'Nữ', 'Quy Nhơn, Bình Định', 1, '2023-05-23 09:56:10'),
(19, 'lamthithanhtam', '1', 'Lâm Thị Thanh Tâm', 'Nữ', 'Quy Nhơn, Bình Định', 1, '2023-05-23 09:56:10'),
(20, 'nguyendinhien', '1', 'Nguyễn Đình Hiền', 'Nam', 'Quy Nhơn, Bình Định', 1, '2023-05-23 09:56:10'),
(21, 'nguyentuananh', '1', 'Nguyễn Tuấn Anh', 'Nam', 'Quy Nhơn, Bình Định', 1, '2023-05-23 09:56:10'),
(22, 'votuandanh', '1', 'Nguyễn Văn A', 'Nam', 'Quy Nhơn - Bình Định', 0, '2023-05-23 10:28:47'),
(23, 'dangleanh', '1', 'Đặng Lê Anh', 'Nam', 'Quy Nhơn - Bình Định', 0, '2023-05-31 11:48:05'),
(24, 'nguyenvanb', '1', 'Nguyễn Văn B', 'Nam', 'Bình Định', 0, '2023-06-04 14:15:46'),
(25, 'abc', '1', 'ABC', 'Nam', 'abc', 0, '2023-06-04 14:20:28');

INSERT INTO `subjects` (`id`, `display_name`, `tutor_id`, `created_at`) VALUES
(1, 'Đại số tuyến tính', 12, '2023-05-23 10:24:41'),
(2, 'Giải tích', 13, '2023-05-23 10:24:59'),
(3, 'Toán Logic', 6, '2023-05-23 10:25:11'),
(4, 'Lập trình cơ bản', 1, '2023-05-23 10:25:23'),
(5, 'Phương pháp tính', 16, '2023-05-23 10:25:42'),
(6, 'Hệ quản trị cơ sở dữ liệu', 7, '2023-05-23 10:25:53'),
(7, 'Thực hành máy tính (lắp ráp, cài đặt, bảo trì)', 11, '2023-05-23 10:26:15'),
(8, 'Nhập môn Thuật toán', 6, '2023-05-23 10:26:25'),
(9, '	Lập trình hướng đối tượng', 8, '2023-05-23 10:26:39'),
(10, 'Nhập môn mạng máy tính', 9, '2023-05-23 10:26:49'),
(11, 'Toán rời rạc', 6, '2023-05-23 10:26:56'),
(12, 'Giới thiệu ngành CNTT	', 8, '2023-05-23 10:27:02'),
(13, 'Kỹ thuật lập trình', 10, '2023-05-23 10:27:12'),
(14, 'Lập trình ứng dụng Web', 2, '2023-05-23 10:27:23'),
(15, 'Nhập môn cơ sở dữ liệu', 3, '2023-05-23 10:27:30'),
(16, 'Tiếng Anh cho CNTT', 4, '2023-05-23 10:27:39'),
(17, 'Lập trình trên Desktop', 5, '2023-05-23 10:27:46'),
(18, 'Cấu trúc dữ liệu', 1, '2023-05-23 10:27:54'),
(19, 'Tiếng Anh 2', 14, '2023-06-03 19:57:47'),
(20, 'Nhập môn thuật toán', 2, '2023-06-04 19:39:50');

INSERT INTO `registered` (`id`, `users_id`, `subject_id`, `registered_on`) VALUES
(26, 22, 14, '2023-06-03 19:52:23'),
(29, 24, 14, '2023-06-04 19:24:14'),
(30, 23, 14, '2023-06-04 19:24:46');