-- this query needs to be executed before doing anything else.

CREATE DATABASE SchoolDatabase;

USE SchoolDatabase;

-- sinh viên
CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(24) NOT NULL,
    password VARCHAR(100),

    real_name VARCHAR(50) NOT NULL,
    gender VARCHAR(3) NOT NULL DEFAULT FALSE,
    hometown VARCHAR(100), 

    -- 0: student, 1: tutor, 2: admin
    permission INT(1) NOT NULL DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO students VALUES ('0', 'qnu', '0', 'Quy Nhon University', 'Nam', 'Quy Nhon, Tinh Binh Dinh', false, DEFAULT);

-- môn học
CREATE TABLE IF NOT EXISTS subjects (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(24) NOT NULL,
    display_name VARCHAR(64),

    
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO subjects VALUES ('0', 'demo', 'Thử nghiệm', DEFAULT);

-- danh sách sinh viên đã đăng ký
CREATE TABLE IF NOT EXISTS registered(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    student_id INT(6) UNSIGNED NOT NULL,
    subject_id INT(6) UNSIGNED NOT NULL,
    registered_on DATETIME DEFAULT CURRENT_TIMESTAMP, 

    FOREIGN KEY(student_id) REFERENCES students(id),
    FOREIGN KEY(subject_id) REFERENCES subjects(id)
);

INSERT INTO registered VALUES ('0', '0', '0', DEFAULT);
