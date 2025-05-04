CREATE DATABASE db_mvc;
USE db_mvc;

CREATE TABLE students (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    nim VARCHAR(20) NOT NULL UNIQUE,
    phone VARCHAR(15),
    join_date DATE
);

CREATE TABLE mata_kuliah (
    id INT PRIMARY KEY AUTO_INCREMENT,
    kode_matkul VARCHAR(10) NOT NULL UNIQUE,
    nama_matkul VARCHAR(100) NOT NULL,
    sks INT NOT NULL
);

CREATE TABLE mengontrak (
    id INT PRIMARY KEY AUTO_INCREMENT,
    student_id INT NOT NULL,
    matkul_id INT NOT NULL,
    semester VARCHAR(10) NOT NULL,
    tahun_ajaran VARCHAR(10) NOT NULL,
    nilai CHAR(1),
    FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
    FOREIGN KEY (matkul_id) REFERENCES mata_kuliah(id) ON DELETE CASCADE
);

CREATE INDEX idx_student_id ON mengontrak(student_id);
CREATE INDEX idx_matkul_id ON mengontrak(matkul_id);
