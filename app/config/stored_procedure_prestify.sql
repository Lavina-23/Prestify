USE db_prestify;
GO;

CREATE PROCEDURE sp_GetDataPrestasi
  @user VARCHAR(50)
AS
  BEGIN
    SELECT * 
    FROM PRESTASI P
    INNER JOIN MAPRES M ON P.prestasi_id = M.prestasi_id
    INNER JOIN MAHASISWA MH ON MH.mahasiswa_id = M.mahasiswa_id
    INNER JOIN PENGGUNA pg ON pg.pengguna_id = mh.pengguna_id
    INNER JOIN KATEGORI_PRESTASI k ON k.kategori_id = p.kategori_id
    WHERE mh.pengguna_id = @user;
END;
GO;

CREATE PROCEDURE sp_AddDataKompetisi
    @prestasi_id VARCHAR(50),
    @kategori_id VARCHAR(50),
    @nama_prestasi VARCHAR(100),
    @tingkat VARCHAR(50),
    @peringkat INT,
    @poin INT,
    @penyelenggara VARCHAR(100),
    @tempat_kompetisi VARCHAR(100),
    @link_kompetisi VARCHAR(100),
    @tanggal_mulai DATE,
    @tanggal_selesai DATE,
    @jumlah_peserta INT,
    @no_surat_tugas VARCHAR(50),
    @tanggal_surat DATE,
    @file_surat_tugas VARCHAR(100),
    @file_sertifikat VARCHAR(100),
    @file_foto_kegiatan VARCHAR(100),
    @file_poster VARCHAR(100),
    @jumlah_pt INT,
    @tahun_akademik VARCHAR(20),
    @semester VARCHAR(50),
    @status_prestasi VARCHAR(50)
AS
BEGIN
    INSERT INTO PRESTASI (
        prestasi_id, kategori_id, nama_prestasi, tingkat, peringkat, poin, penyelenggara, tempat_kompetisi, link_kompetisi,
        tanggal_mulai, tanggal_selesai, jumlah_peserta, no_surat_tugas, tanggal_surat, file_surat_tugas, file_sertifikat, 
        file_foto_kegiatan, file_poster, jumlah_pt, tahun_akademik, semester, status_prestasi
    )
    VALUES (
        @prestasi_id, @kategori_id, @nama_prestasi, @tingkat, @peringkat, @poin, @penyelenggara, @tempat_kompetisi, 
        @link_kompetisi, @tanggal_mulai, @tanggal_selesai, @jumlah_peserta, @no_surat_tugas, @tanggal_surat, @file_surat_tugas,
        @file_sertifikat, @file_foto_kegiatan, @file_poster, @jumlah_pt, @tahun_akademik, @semester, @status_prestasi
    );
END;
GO;

CREATE PROCEDURE sp_UpdateVerif
    @id VARCHAR(50),
    @status VARCHAR(50)
AS
BEGIN
    UPDATE PRESTASI
    SET status_prestasi = @status
    WHERE prestasi_id = @id;
END;
