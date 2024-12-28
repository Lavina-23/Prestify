CREATE database db_prestify

USE db_prestify

CREATE TABLE LEVEL (
    level_id VARCHAR(50) PRIMARY KEY,
    nama VARCHAR(100)
);

CREATE TABLE PENGGUNA (
    pengguna_id VARCHAR(50) PRIMARY KEY,
    level_id VARCHAR(50) FOREIGN KEY REFERENCES LEVEL(level_id),
    username VARCHAR(100),
    password VARCHAR(100),
    nama VARCHAR(100),
    email VARCHAR(100)
);

CREATE TABLE MAHASISWA (
    mahasiswa_id VARCHAR(50) PRIMARY KEY,
    nim VARCHAR(20),
	jurusan VARCHAR(100),
    prodi VARCHAR(100),
    angkatan VARCHAR(10),
    pengguna_id VARCHAR(50) FOREIGN KEY REFERENCES PENGGUNA(pengguna_id)
);

CREATE TABLE DOSEN (
    dosen_id VARCHAR(50) PRIMARY KEY,
    nidn VARCHAR(20),
	nama VARCHAR(100),
    jurusan VARCHAR(100)
);

CREATE TABLE KATEGORI_PRESTASI (
    kategori_id VARCHAR(50) PRIMARY KEY,
    nama_kategori VARCHAR(100)
);

CREATE TABLE PRESTASI (
    prestasi_id VARCHAR(50) PRIMARY KEY,
    kategori_id VARCHAR(50) FOREIGN KEY REFERENCES KATEGORI_PRESTASI(kategori_id),
    nama_prestasi VARCHAR(100),
    tingkat VARCHAR(50),
    peringkat INT,
    poin INT,
    penyelenggara VARCHAR(100),
    tempat_kompetisi VARCHAR(100),
    link_kompetisi VARCHAR(100),
    tanggal_mulai DATE,
    tanggal_selesai DATE,
    jumlah_peserta INT,
    no_surat_tugas VARCHAR(50),
    tanggal_surat DATE,
    file_surat_tugas VARCHAR(100),
    file_sertifikat VARCHAR(100),
    file_foto_kegiatan VARCHAR(100),
    file_poster VARCHAR(100)
);

CREATE TABLE INFO_LOMBA (
    lomba_id VARCHAR(50) PRIMARY KEY,
    kategori_id VARCHAR(50) FOREIGN KEY REFERENCES KATEGORI_PRESTASI(kategori_id),
    nama_lomba VARCHAR(100),
    tingkat VARCHAR(50),
    deskripsi_lomba VARCHAR(255),
    link_lomba VARCHAR(100),
    deadline_lomba DATE
);

ALTER TABLE PRESTASI ADD tahun_akademik VARCHAR(20), semester VARCHAR(50);
ALTER TABLE PRESTASI ADD status_prestasi VARCHAR(50);
ALTER TABLE PRESTASI ADD created_at DATETIME;
ALTER TABLE Prestasi
ADD CONSTRAINT DF_created_at DEFAULT GETDATE() FOR created_at;

CREATE TABLE MAPRES (
    mapres_id VARCHAR(50) PRIMARY KEY,
    mahasiswa_id VARCHAR(50) FOREIGN KEY REFERENCES MAHASISWA(mahasiswa_id),
    prestasi_id VARCHAR(50) FOREIGN KEY REFERENCES PRESTASI(prestasi_id),
    peran VARCHAR(255)
);

CREATE TABLE DOSPEM (
    dospem_id VARCHAR(50) PRIMARY KEY,
    dosen_id VARCHAR(50) FOREIGN KEY REFERENCES DOSEN(dosen_id),
    prestasi_id VARCHAR(50) FOREIGN KEY REFERENCES PRESTASI(prestasi_id),
    peran VARCHAR(255)
);

INSERT INTO LEVEL (level_id, nama) VALUES ('LVL1', 'Super Admin');
INSERT INTO LEVEL (level_id, nama) VALUES ('LVL2', 'Admin');
INSERT INTO LEVEL (level_id, nama) VALUES ('LVL3', 'Mahasiswa');

INSERT INTO KATEGORI_PRESTASI (kategori_id, nama_kategori) VALUES ('KAT1', 'Saintek');
INSERT INTO KATEGORI_PRESTASI (kategori_id, nama_kategori) VALUES ('KAT2', 'Seni');
INSERT INTO KATEGORI_PRESTASI (kategori_id, nama_kategori) VALUES ('KAT3', 'Olahraga');
INSERT INTO KATEGORI_PRESTASI (kategori_id, nama_kategori) VALUES ('KAT4', 'Lainnya');

-- Data Admin/Super Admin
INSERT INTO PENGGUNA (pengguna_id, level_id, username, password, nama, email) VALUES 
('PGN1', 'LVL1', '1982010101', '$2y$10$LZXwVXLQG9FLF0tS.tvIeuGRvMXQZpBqKA5qVVGwddhdkxndWX1qa', 'Jokko Widodoy', 'super.admin@example.com'), --1982010101
('PGN2', 'LVL2', '1982010102', '$2y$10$lWQxI6YqlFPyHUCoc4h40uFgHnzqXocn6otwKSOqjgmNkIbQ69xNe', 'Prabroro Firdaus', 'admin.saintek@example.com'); --1982010102

-- Data Mahasiswa dengan NIM 10 digit
INSERT INTO PENGGUNA (pengguna_id, level_id, username, password, nama, email) VALUES 
('PGN3', 'LVL3', '2100010001', '$2y$10$WyG/.0khRpLefmHDUwYyWOhsppDkFUssLnyKp69Xkkkky6guK5gWK', 'Budi Santoso', 'budi.santoso@example.com'), -- 2100010001
('PGN4', 'LVL3', '2100010002', '$2y$10$C0dJd6pjvVVD05SAJ/kUx.Ie4c90yjghB1EzmeTCvfjvEpFm5uGny', 'Ayu Rahmawati','ayu.rahma@example.com'), -- 2100010002
('PGN5', 'LVL3', '2100010003', '$2y$10$FXY9GvunDLYHWFedA2V4e.QidHFjx5lI0Tv5l/P.Vm5O4641pqBWK', 'Doni Wijaya','doni.wijaya@example.com'), -- 2100010003
('PGN6', 'LVL3', '2100010004', '$2y$10$xbyPWQc2fqKm2zhCc.JVa.tCBTrse.zPX1n.H2pDZlnDVeXDtVeTG', 'Siti Aminah','siti.aminah@example.com'); -- 2100010004

-- Data Mahasiswa
INSERT INTO MAHASISWA (mahasiswa_id, nim, jurusan, prodi, angkatan, pengguna_id) VALUES
('MHS1', '2100010001', 'Teknologi Informasi', 'Teknik Informatika', '2021', 'PGN3'),
('MHS2', '2100010002', 'Teknik Mesin', 'Teknik Mesin', '2021', 'PGN4'),
('MHS3', '2100010003', 'Teknik Sipil', 'Teknik Sipil', '2021', 'PGN5'),
('MHS4', '2100010004', 'Sistem Informasi Bisnis', 'Teknologi Informasi', '2021', 'PGN6');

-- Info Lomba
INSERT INTO INFO_LOMBA (lomba_id, kategori_id, nama_lomba, tingkat, deskripsi_lomba, link_lomba, deadline_lomba) VALUES
('LMB1', 'KAT1', 'Lomba Cerdas Cermat', 'Nasional', 'Kompetisi cerdas cermat tingkat nasional', 'http://lomba-cerdas-cermat.com', '2023-11-01'),
('LMB2', 'KAT2', 'Lomba Debat', 'Regional', 'Kompetisi debat tingkat regional', 'http://lomba-debat.com', '2023-12-05'),
('LMB3', 'KAT3', 'Lomba Karya Tulis Ilmiah', 'Nasional', 'Kompetisi karya tulis ilmiah tingkat nasional', 'http://lomba-karya-tulis-ilmiah.com', '2024-01-15'),
('LMB4', 'KAT4', 'Lomba Robotik', 'Internasional', 'Kompetisi robotik tingkat internasional', 'http://lomba-robotik.com', '2024-02-20'),
('LMB5', 'KAT1', 'Lomba Matematika', 'Nasional', 'Kompetisi matematika tingkat nasional', 'http://lomba-matematika.com', '2024-03-01');

-- Data Dosen
INSERT INTO DOSEN (dosen_id, nidn, nama, jurusan) VALUES
('DSN1', '123456789', 'Muhammad Sumbul', 'Teknologi Informasi'),
('DSN2', '987654321', 'Khalid Khasmiiri', 'Teknik Sipil'),
('DSN3', '384268394', 'Ismail Ahmad Kanabawi', 'Teknologi Informasi'),
('DSN4', '784392713', 'Khidir Karawita', 'Teknik Elektro');
GO;

CREATE TRIGGER trg_after_delete_prestasi
ON PRESTASI
AFTER DELETE
AS
BEGIN
	DELETE FROM MAPRES WHERE prestasi_id IN (SELECT prestasi_id FROM DELETED);
	DELETE FROM DOSPEM WHERE prestasi_id IN (SELECT prestasi_id FROM DELETED);
END;
GO;

ALTER TABLE MAPRES 
DROP CONSTRAINT FK__MAPRES__prestasi__46E78A0C;

ALTER TABLE MAPRES 
ADD CONSTRAINT FK__MAPRES__prestasi__46E78A0C 
FOREIGN KEY (prestasi_id) REFERENCES PRESTASI(prestasi_id) ON DELETE CASCADE;

ALTER TABLE DOSPEM 
DROP CONSTRAINT FK__DOSPEM__prestasi__4AB81AF0;

ALTER TABLE DOSPEM 
ADD CONSTRAINT FK__DOSPEM__prestasi__4AB81AF0 
FOREIGN KEY (prestasi_id) REFERENCES PRESTASI(prestasi_id) ON DELETE CASCADE;

