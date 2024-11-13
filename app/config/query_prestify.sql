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
    mahasiswa_id VARCHAR(50) FOREIGN KEY REFERENCES MAHASISWA(mahasiswa_id),
    dosen_id VARCHAR(50) FOREIGN KEY REFERENCES DOSEN(dosen_id),
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

CREATE TABLE MAPRES (
    mapres_id VARCHAR(50) PRIMARY KEY,
    prestasi_id VARCHAR(50) FOREIGN KEY REFERENCES PRESTASI(prestasi_id),
    mahasiswa_id VARCHAR(50) FOREIGN KEY REFERENCES MAHASISWA(mahasiswa_id),
    peran VARCHAR(100)
);

CREATE TABLE DOSPEM (
    dospem_id VARCHAR(50) PRIMARY KEY,
    prestasi_id VARCHAR(50) FOREIGN KEY REFERENCES PRESTASI(prestasi_id),
    dosen_id VARCHAR(50) FOREIGN KEY REFERENCES DOSEN(dosen_id),
    peran VARCHAR(100)
);

ALTER TABLE DOSPEM ALTER COLUMN peran VARCHAR(255);

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

-- Data Dosen
INSERT INTO DOSEN (dosen_id, nidn, nama, jurusan) VALUES
('DSN1', '123456789', 'Muhammad Sumbul', 'Teknologi Informasi'),
('DSN2', '987654321', 'Khalid Khasmiiri', 'Teknik Sipil'),
('DSN3', '384268394', 'Ismail Ahmad Kanabawi', 'Teknologi Informasi'),
('DSN4', '784392713', 'Khidir Karawita', 'Teknik Elektro');

-- Data Prestasi
INSERT INTO PRESTASI (
	prestasi_id, kategori_id, mahasiswa_id, dosen_id, nama_prestasi, tingkat, peringkat, poin,
	penyelenggara, tempat_kompetisi, link_kompetisi, tanggal_mulai, tanggal_selesai, jumlah_peserta,
	no_surat_tugas, tanggal_surat, file_surat_tugas, file_sertifikat, file_foto_kegiatan, file_poster
) VALUES
('PRS1', 'KAT1', 'MHS1', 'DSN1', 'Lomba Coding Nasional', 'Nasional', 1, 3,
'Universitas ABC', 'Jakarta', 'https://example.com/lomba-coding', '2024-01-10', '2024-01-12', 5000,
'ST001', '2024-01-05', 'surat_tugas_prs1.pdf', 'sertifikat_prs1.pdf', 'foto_kegiatan_prs1.jpg', 'poster_prs1.jpg'),

('PRS2', 'KAT2', 'MHS2', 'DSN2', 'Kompetisi Seni Tari', 'Regional', 2, 2,
'Dinas Kebudayaan', 'Bandung', 'https://example.com/kompetisi-seni', '2024-02-20', '2024-02-21', 300,
'ST002', '2024-02-15', 'surat_tugas_prs2.pdf', 'sertifikat_prs2.pdf', 'foto_kegiatan_prs2.jpg', 'poster_prs2.jpg'),

('PRS3', 'KAT3', 'MHS3', 'DSN4', 'Kejuaraan Atletik', 'Internasional', 3, 1,
'Komite Olahraga', 'Tokyo', 'https://example.com/atletik', '2024-03-15', '2024-03-17', 1000,
'ST003', '2024-03-10', 'surat_tugas_prs3.pdf', 'sertifikat_prs3.pdf', 'foto_kegiatan_prs3.jpg', 'poster_prs3.jpg'),

('PRS4', 'KAT4', 'MHS4', 'DSN3', 'Kompetisi Esai Ilmiah', 'Nasional', 1, 3,
'Universitas XYZ', 'Surabaya', 'https://example.com/kompetisi-esai', '2024-04-01', '2024-04-03', 4000,
'ST004', '2024-03-25', 'surat_tugas_prs4.pdf', 'sertifikat_prs4.pdf', 'foto_kegiatan_prs4.jpg', 'poster_prs4.jpg');

-- Data Mapres
INSERT INTO MAPRES (mapres_id, prestasi_id, mahasiswa_id, peran) VALUES
('MAP1', 'PRS1', 'MHS1', 'Ketua'),
('MAP2', 'PRS2', 'MHS2', 'Anggota'),
('MAP3', 'PRS3', 'MHS3', 'Anggota'),
('MAP4', 'PRS4', 'MHS4', 'Ketua');

-- Data Dospem
INSERT INTO DOSPEM (dospem_id, prestasi_id, dosen_id, peran) VALUES
('DSP1', 'PRS1', 'DSN1', 'Melakukan pembinaan kegiatan mahasiswa di bidang akademik (PA) dan kemahasiswaan (BEM, Maperwa, dan lain-lain)'),
('DSP2', 'PRS2', 'DSN2', 'Membimbing mahasiswa mengikuti kompetisi dibidang akademik dan kemahasiswaan bereputasi dan mencapai juara tingkat Nasional'),
('DSP3', 'PRS3', 'DSN4', 'Membimbing mahasiswa menghasilkan produk saintifik bereputasi dan mendapat pengakuan tingkat Internasional'),
('DSP4', 'PRS4', 'DSN3', 'Membimbing mahasiswa mengikuti kompetisi dibidang akademik dan kemahasiswaan bereputasi dan mencapai juara tingkat Nasional');
