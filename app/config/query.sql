USE db_pencatatan_prestasi;
go

CREATE SCHEMA Pengguna;
go

CREATE SCHEMA Prestasi;
go

CREATE SCHEMA Laporan;
go

CREATE TABLE Pengguna.level (
	level_id VARCHAR(20) PRIMARY KEY,
	level_name VARCHAR (20) NOT NULL
);

CREATE TABLE Pengguna.data_pengguna (
    pengguna_id VARCHAR(20) PRIMARY KEY,
    level_id VARCHAR(20) NOT NULL,
	nama VARCHAR(100) NOT NULL,
    nomor_identitas VARCHAR(20) NOT NULL,
    password VARCHAR(200) NOT NULL, 
    email VARCHAR(255),
    FOREIGN KEY (level_id) REFERENCES Pengguna.level(level_id)
);  

INSERT INTO Pengguna.level(level_id,level_name) VALUES('LVL1','Admin');
INSERT INTO Pengguna.level(level_id,level_name) VALUES('LVL2','Mahasiswa');

INSERT INTO Pengguna.data_pengguna(pengguna_id, level_id, nama, nomor_identitas, password, email) VALUES('P1','LVL1', 'Hartoyo', '177010102005011001', '177010102005011001', 'hartoyo@gmail.com');
INSERT INTO Pengguna.data_pengguna(pengguna_id, level_id, nama, nomor_identitas, password, email) VALUES('P2','LVL2', 'Lavina', '2365418890', '2365418890', 'lavina@gmail.com');
