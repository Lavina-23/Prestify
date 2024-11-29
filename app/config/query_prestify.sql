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

ALTER TABLE PRESTASI ADD tahun_akademik VARCHAR(20), semester VARCHAR(50);
ALTER TABLE PRESTASI ADD status_prestasi VARCHAR(50);
ALTER TABLE PRESTASI ALTER COLUMN status_prestasi BIT;

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

SELECT * 
FROM PENGGUNA p
RIGHT JOIN MAHASISWA m ON p.pengguna_id = m.pengguna_id;

-- Data Dosen
INSERT INTO DOSEN (dosen_id, nidn, nama, jurusan) VALUES
('DSN1', '123456789', 'Muhammad Sumbul', 'Teknologi Informasi'),
('DSN2', '987654321', 'Khalid Khasmiiri', 'Teknik Sipil'),
('DSN3', '384268394', 'Ismail Ahmad Kanabawi', 'Teknologi Informasi'),
('DSN4', '784392713', 'Khidir Karawita', 'Teknik Elektro');

TRUNCATE TABLE DOSPEM;
TRUNCATE TABLE MAPRES;

DELETE FROM PRESTASI;
DELETE FROM MAPRES;
DELETE FROM DOSPEM;

SELECT * FROM PRESTASI;
SELECT * FROM MAPRES;

SELECT * FROM 
PRESTASI p 
LEFT JOIN MAPRES m ON p.prestasi_id = m.prestasi_id
LEFT JOIN MAHASISWA mh ON mh.mahasiswa_id = m.mahasiswa_id
LEFT JOIN PENGGUNA pg ON pg.pengguna_id = mh.pengguna_id
WHERE mh.pengguna_id = 'PGN1';

SELECT * FROM 
              PRESTASI p 
                LEFT JOIN MAPRES m ON p.prestasi_id = m.prestasi_id
                LEFT JOIN MAHASISWA mh ON mh.mahasiswa_id = m.mahasiswa_id
                LEFT JOIN PENGGUNA pg ON pg.pengguna_id = mh.pengguna_id
                LEFT JOIN KATEGORI_PRESTASI k ON k.kategori_id = p.kategori_id
                WHERE mh.pengguna_id = 'PGN3';
