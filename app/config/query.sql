CREATE DATABASE db_prestify
go

USE db_prestify;
go

CREATE TABLE level (
	level_id VARCHAR(20) PRIMARY KEY,
	level_name VARCHAR (20) NOT NULL
);

CREATE TABLE pengguna (
    pengguna_id VARCHAR(20) PRIMARY KEY,
    level_id VARCHAR(20) NOT NULL,
    username VARCHAR(20) NOT NULL,
	nama VARCHAR(100) NOT NULL,
	jurusan VARCHAR(20) NOT NULL,
    password VARCHAR(200) NOT NULL, 
    email VARCHAR(255),
    FOREIGN KEY (level_id) REFERENCES level(level_id)
);

CREATE TABLE mahasiswa (
    mahasiswa_id VARCHAR(20) PRIMARY KEY,
    nim VARCHAR(20) NOT NULL,
    prodi VARCHAR(200) NOT NULL,
		angkatan CHAR(4) NOT NULL,
);

CREATE TABLE dosen (
    dosen_id VARCHAR(20) PRIMARY KEY,
    nidn VARCHAR(20) NOT NULL,
);

CREATE TABLE kategori_prestasi (
	kategori_id VARCHAR(20) PRIMARY KEY,
	nama_kategori VARCHAR(50) NOT NULL
);

CREATE TABLE prestasi (
	prestasi_id VARCHAR(20) PRIMARY KEY,
	kategori_id VARCHAR(20) NOT NULL,
	mahasiswa_id VARCHAR(20) NOT NULL,
	dosen_id VARCHAR(20) NOT NULL,
	nama_prestasi VARCHAR(100) NOT NULL,
	tingkat VARCHAR(100) NOT NULL,
	penyelenggara VARCHAR(100) NOT NULL,
	tempat_kompetisi VARCHAR(255) NOT NULL,
	link_kompetisi VARCHAR(100) NOT NULL,
	tanggal_mulai DATE NOT NULL,
	tanggal_selesai DATE NOT NULL,
	jumlah_peserta INT NOT NULL,
	no_surat_tugas VARCHAR(50) NOT NULL,
	tanggal_surat DATE NOT NULL,
	file_surat_tugas VARCHAR(50) NOT NULL,
	file_sertifikat VARCHAR(50) NOT NULL,
	file_foto_kegiatan VARCHAR(50) NOT NULL,
	file_poster VARCHAR(50) NOT NULL,
  FOREIGN KEY (kategori_id) REFERENCES kategori_prestasi(kategori_id),
  FOREIGN KEY (mahasiswa_id) REFERENCES mahasiswa(mahasiswa_id),
  FOREIGN KEY (dosen_id) REFERENCES dosen(dosen_id)
);

CREATE TABLE peserta (
	peserta_id VARCHAR(20) PRIMARY KEY,
	prestasi_id VARCHAR(20) NOT NULL,
	mahasiswa_id VARCHAR(20) NOT NULL,
	peran VARCHAR(50) NOT NULL,
    FOREIGN KEY (prestasi_id) REFERENCES prestasi(prestasi_id),
    FOREIGN KEY (mahasiswa_id) REFERENCES mahasiswa(mahasiswa_id)
);

CREATE TABLE dospem (
	dospem_id VARCHAR(20) PRIMARY KEY,
	prestasi_id VARCHAR(20) NOT NULL,
	dosen_id VARCHAR(20) NOT NULL,
	peran VARCHAR(50) NOT NULL,
    FOREIGN KEY (prestasi_id) REFERENCES prestasi(prestasi_id),
    FOREIGN KEY (dosen_id) REFERENCES dosen(dosen_id)
);

ALTER TABLE dospem ALTER COLUMN peran VARCHAR(255);

INSERT INTO level(level_id,level_name) VALUES('LVL1','Admin');
INSERT INTO level(level_id,level_name) VALUES('LVL2','Mahasiswa');

INSERT INTO pengguna(pengguna_id, level_id, username, nama, jurusan, password, email) VALUES('P1','LVL1', '177010102005011001', 'Hartoyo', 'Teknologi Informasi', '$2y$10$xJb6w5qiwEJkPO2KnAKe1uiFZ8f3OpVgL/EqBHdylIwcSLk9agnaa', 'hartoyo@gmail.com');
INSERT INTO pengguna(pengguna_id, level_id, username, nama, jurusan, password, email) VALUES('P2','LVL2', '2341770072', 'Lavina', 'Teknologi Informasi', '$2y$10$pFJIpZ217fnNPo46SxfvIO0kjOPXCArujHg85sKs49g/oju5aaWqO', 'lavina@gmail.com');

INSERT INTO mahasiswa(mahasiswa_id, nim, prodi, angkatan) VALUES
('M1', '2341770072', 'Sistem Informasi Bisnis', '2023'),
('M2', '2341770073', 'Teknik Informatika', '2023'),
('M3', '2341770074', 'Teknik Informatika', '2023');

INSERT INTO dosen (dosen_id, nidn) VALUES 
('D1', '1234567890'),
('D2', '0987654321'),
('D3', '1122334455');

INSERT INTO kategori_prestasi (kategori_id, nama_kategori) VALUES 
('K1', 'Sains'),
('K2', 'Seni'),
('K3', 'Olahraga'),
('K4', 'Teknologi'),
('K5', 'Lainnya');

INSERT INTO prestasi (
    prestasi_id, kategori_id, nama_prestasi, tingkat, penyelenggara, 
    tempat_kompetisi, link_kompetisi, tanggal_mulai, tanggal_selesai, 
    jumlah_peserta, no_surat_tugas, tanggal_surat, file_surat_tugas, 
    file_sertifikat, file_foto_kegiatan, file_poster
) VALUES
('PR1', 'K1', 'Olimpiade Matematika Nasional', 'Nasional', 'Universitas Indonesia', 
 'Jakarta', 'https://olim-ui.com', '2024-06-01', '2024-06-03', 
 50, 'ST-001', '2024-05-15', 'surat_tugas_pr1.pdf', 
 'sertifikat_pr1.pdf', 'foto_kegiatan_pr1.jpg', 'poster_pr1.jpg'),

('PR2', 'K2', 'Lomba Debat Bahasa Inggris', 'Internasional', 'Kementerian Pendidikan', 
 'Bandung', 'https://debat-edu.com', '2024-07-15', '2024-07-18', 
 30, 'ST-002', '2024-06-30', 'surat_tugas_pr2.pdf', 
 'sertifikat_pr2.pdf', 'foto_kegiatan_pr2.jpg', 'poster_pr2.jpg');

INSERT INTO peserta (peserta_id, prestasi_id, mahasiswa_id, peran) VALUES 
('PS1', 'PR1', 'M1', 'Ketua'),
('PS2', 'PR1', 'M3', 'Anggota'),
('PS3', 'PR1', 'M2', 'Anggota'),
('PS4', 'PR2', 'M1', 'Personal');

INSERT INTO dospem (dospem_id, prestasi_id, dosen_id, peran) VALUES 
('DP1', 'PR1', 'D1', 'Membimbing mahasiswa menghasilkan produk saintifik bereputasi dan mendapat pengakuan tingkat Nasional'),
('DP2', 'PR2', 'D2', 'Membimbing mahasiswa menghasilkan produk saintifik bereputasi dan mendapat pengakuan tingkat Nasional');

SELECT * FROM pengguna;
