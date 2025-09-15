CREATE DATABASE IF NOT EXISTS db_xirpl1_9_1;
USE db_xirpl1_9_1;

CREATE TABLE IF NOT EXISTS karyawan (
  id_karyawan INT AUTO_INCREMENT PRIMARY KEY,
  nama_karyawan VARCHAR(100) NOT NULL,
  jabatan VARCHAR(50) NOT NULL
);

INSERT INTO karyawan (nama_karyawan, jabatan) VALUES
('Budi', 'Manager'),
('Siti', 'Staff'),
('Andi', 'Supervisor');
