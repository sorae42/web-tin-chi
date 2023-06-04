-- this query needs to be executed before doing anything else.
-- Admin login: 
-- username: admin, password: qnu

CREATE DATABASE SchoolDatabase;

USE SchoolDatabase;

-- sinh viên
CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(24) UNIQUE NOT NULL,
    password VARCHAR(100),

    real_name VARCHAR(50) NOT NULL,
    gender VARCHAR(3) NOT NULL DEFAULT FALSE,
    hometown VARCHAR(100), 

    -- 0: student, 1: tutor, 2: admin
    permission INT(1) NOT NULL DEFAULT 0,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO users VALUES ('0', 'admin', 'qnu', 'Quy Nhon University', 'Nam', 'Quy Nhon, Tinh Binh Dinh', 2, DEFAULT);

-- môn học
CREATE TABLE IF NOT EXISTS subjects (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    display_name VARCHAR(64) NOT NULL,
    tutor_id INT(6) UNSIGNED NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,

    FOREIGN KEY(tutor_id) REFERENCES users(id)
);

-- danhsách sinh viên đã đăng ký
CREATE TABLE IF NOT EXISTS registered(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    users_id INT(6) UNSIGNED NOT NULL,
    subject_id INT(6) UNSIGNED NOT NULL,
    registered_on DATETIME DEFAULT CURRENT_TIMESTAMP, 

    FOREIGN KEY(users_id) REFERENCES users(id),
    FOREIGN KEY(subject_id) REFERENCES subjects(id)
);
