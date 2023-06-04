-- demonstration user data (written from scratch)
-- partially working, use with caution.
-- you should use demo_dump.sql if your database is clean

USE SchoolDatabase;

INSERT INTO users (username, password, real_name, gender, hometown, permission) VALUES
('admin', 'admin', 'Admin', '', '', 2),
('hovanlam', '1', 'Hồ Văn Lâm', 'Nam', 'Quy Nhơn, Bình Định', 1),
('votuandanh', '1', 'Nguyễn Văn A', 'Nam', 'Quy Nhơn - Bình Định', 0),
('dangleanh', '1', 'Đặng Lê Anh', 'Nam', 'Quy Nhơn - Bình Định', 0);

INSERT INTO subject (display_name, tutor_id) VALUES
('Lập trình ứng dụng Web', 2);

INSERT INTO registered (users_id, subject_id) VALUES
(3, 1),
(4, 1);
