<?php
$tingkat = array("Sekolah", "Kecamatan", "Kab/Kota", "Provinsi", "Nasional", "Internasional", "Lainnya");
$listPeranMhs = array("Ketua", "Anggota", "Personal");
$listPeranDsn = array("Melakukan pembinaan kegiatan mahasiswa di bidang akademik (PA) dan kemahasiswaan (BEM, Maperwa, dan lain-lain)", "Membimbing mahasiswa menghasilkan produk saintifik bereputasi dan mendapat pengakuan tingkat Internasional", "Membimbing mahasiswa menghasilkan produk saintifik bereputasi dan mendapat pengakuan tingkat Nasional", "Membimbing mahasiswa mengikuti kompetisi dibidang akademik dan kemahasiswaan bereputasi dan mencapai juara tingkat Internasional", "Membimbing mahasiswa mengikuti kompetisi dibidang akademik dan kemahasiswaan bereputasi dan mencapai juara tingkat Nasional");
?>

<!-- Form -->
<form method="post" action="<?= env("BASEURL") ?>/prestasi/addDataPrestasi" enctype="multipart/form-data" class="mx-auto my-20">
  <!-- Form Input Data Kompetisi  -->
  <div class="flex gap-5">
    <div>
      <span class="text-sm text-gray-500">Step 1</span>
      <h1 class="text-lg font-bold text-gray-900">Data Kompetisi</h1>
      <hr class="mb-5 w-64">
    </div>

    <div>
      <!-- Jenis Kompetisi -->
      <label for="jenis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jenis</label>
      <div class="flex w-full rounded-md shadow-sm mb-5" role="group">
        <input type="hidden" id="kategori_id" name="kategori_id">
        <button type="button" data-jenis="KAT1" class="btnKategori inline-flex gap-2 w-full justify-center items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-s-lg hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
            <path fill-rule="evenodd" d="M10.5 3.798v5.02a3 3 0 0 1-.879 2.121l-2.377 2.377a9.845 9.845 0 0 1 5.091 1.013 8.315 8.315 0 0 0 5.713.636l.285-.071-3.954-3.955a3 3 0 0 1-.879-2.121v-5.02a23.614 23.614 0 0 0-3 0Zm4.5.138a.75.75 0 0 0 .093-1.495A24.837 24.837 0 0 0 12 2.25a25.048 25.048 0 0 0-3.093.191A.75.75 0 0 0 9 3.936v4.882a1.5 1.5 0 0 1-.44 1.06l-6.293 6.294c-1.62 1.621-.903 4.475 1.471 4.88 2.686.46 5.447.698 8.262.698 2.816 0 5.576-.239 8.262-.697 2.373-.406 3.092-3.26 1.47-4.881L15.44 9.879A1.5 1.5 0 0 1 15 8.818V3.936Z" clip-rule="evenodd" />
          </svg>
          Saintek
        </button>
        <button type="button" data-jenis="KAT2" class="btnKategori inline-flex gap-2 w-full justify-center items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border-t border-b border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-5">
            <path fill-rule="evenodd" d="M20.599 1.5c-.376 0-.743.111-1.055.32l-5.08 3.385a18.747 18.747 0 0 0-3.471 2.987 10.04 10.04 0 0 1 4.815 4.815 18.748 18.748 0 0 0 2.987-3.472l3.386-5.079A1.902 1.902 0 0 0 20.599 1.5Zm-8.3 14.025a18.76 18.76 0 0 0 1.896-1.207 8.026 8.026 0 0 0-4.513-4.513A18.75 18.75 0 0 0 8.475 11.7l-.278.5a5.26 5.26 0 0 1 3.601 3.602l.502-.278ZM6.75 13.5A3.75 3.75 0 0 0 3 17.25a1.5 1.5 0 0 1-1.601 1.497.75.75 0 0 0-.7 1.123 5.25 5.25 0 0 0 9.8-2.62 3.75 3.75 0 0 0-3.75-3.75Z" clip-rule="evenodd" />
          </svg>
          Seni
        </button>
        <button type="button" data-jenis="KAT3" class="btnKategori inline-flex gap-2 w-full justify-center items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border-t border-b border-l border-gray-900 hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor" class="h-5 w-5">
            <path d="M511.8 267.4c-26.1 8.7-53.4 13.8-81 15.1c9.2-105.3-31.5-204.2-103.2-272.4C434.1 41.1 512 139.5 512 256c0 3.8-.1 7.6-.2 11.4zm-3.9 34.7c-5.8 32-17.6 62-34.2 88.7c-97.5 48.5-217.7 42.6-311.9-24.5c23.7-36.2 55.4-67.7 94.5-91.8c79.9 43.2 170.1 50.8 251.6 27.6zm-236-55.5c-2.5-90.9-41.1-172.7-101.9-231.7C196.8 5.2 225.8 0 256 0c2.7 0 5.3 0 7.9 .1c90.8 60.2 145.7 167.2 134.7 282.3c-43.1-2.4-86.4-14.1-126.8-35.9zM138 28.8c20.6 18.3 38.7 39.4 53.7 62.6C95.9 136.1 30.6 220.8 7.3 316.9C2.5 297.4 0 277 0 256C0 157.2 56 71.5 138 28.8zm69.6 90.5c19.5 38.6 31 81.9 32.3 127.7C162.5 294.6 110.9 368.9 90.2 451C66 430.4 45.6 405.4 30.4 377.2c6.7-108.7 71.9-209.9 177.1-257.9zM256 512c-50.7 0-98-14.7-137.8-40.2c5.6-27 14.8-53.1 27.4-77.7C232.2 454.6 338.1 468.8 433 441c-46 44-108.3 71-177 71z" />
          </svg>
          Olahraga
        </button>
        <input type="text" data-jenis="KAT4" placeholder="Lainnya" class="btnKategori inline-flex gap-2 w-full justify-center items-center px-4 py-2 text-sm font-medium text-gray-900 bg-transparent border border-gray-900 rounded-e-lg hover:bg-gray-900 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-500 focus:bg-gray-900 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
        </input>
      </div>

      <div class="flex gap-4">
        <!-- Tingkat -->
        <div class="grid">
          <label for="tingkat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tingkat</label>
          <select name="tingkat" id="tingkat" class="w-44 text-white bg-gray-900 hover:bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-left inline-flex items-center justify-between focus:ring-0 focus:ring-transparent">
            <?php foreach ($tingkat as $ting) : ?>
              <option value="<?= $ting ?>"><?= $ting ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <!-- Nama Kompetisi -->
        <div class="grid w-full">
          <label for="nama_prestasi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Kompetisi</label>
          <input type="text" id="nama_prestasi" name="nama_prestasi" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Mendapatkan Ridho Allah" />
        </div>
      </div>

      <!-- peringkat -->
      <div class="my-5">
        <label for="peringkat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Peringkat</label>
        <input type="number" id="peringkat" name="peringkat" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="1" />
      </div>

      <!-- Penyelenggara -->
      <div class="my-5">
        <label for="penyelenggara" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Kompetisi</label>
        <input type="penyelenggara" id="penyelenggara" name="penyelenggara" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Dunya" />
      </div>

      <!-- Tempat Kompetisi -->
      <div class="my-5">
        <label for="tempat_kompetisi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tempat Kompetisi</label>
        <input type="tempat_kompetisi" id="tempat_kompetisi" name="tempat_kompetisi" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="Dunya" />
      </div>


      <!-- Link Kompetisi -->
      <div class="mb-5">
        <label for="link_kompetisi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">URL Kompetisi</label>
        <input type="text" id="link_kompetisi" name="link_kompetisi" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="www.example.com" />
      </div>

      <!-- Tanggal Kompetisi -->
      <div class="mb-5">
        <label for="repeat-password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Waktu Kompetisi</label>
        <div date-rangepicker datepicker-autohide class="flex items-center w-full">
          <div class="relative w-full">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
              </svg>
            </div>
            <input name="tanggal_mulai" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tanggal Awal">
          </div>
          <span class="mx-2 text-gray-500 dark:text-gray-400">hingga</span>
          <div class="relative w-full">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
              </svg>
            </div>
            <input name="tanggal_selesai" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tanggal Selesai">
          </div>
        </div>
      </div>

      <!-- Jumlah Peserta -->
      <div class="mb-5 flex w-full gap-4">
        <div class="w-full">
          <label for="jumlah_pt" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah PT (Berpartisipasi)</label>
          <input type="number" id="jumlah_pt" name="jumlah_pt" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="123456" />
        </div>
        <div class="w-full">
          <label for="jumlah_peserta" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah Peserta</label>
          <input type="number" id="jumlah_peserta" name="jumlah_peserta" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="123456" />
        </div>
      </div>

      <!-- Surat Tugas -->
      <div class="mb-5 flex w-full gap-4">
        <div class="w-full">
          <label for="no_surat_tugas" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No Surat Tugas</label>
          <input type="text" id="no_surat_tugas" name="no_surat_tugas" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5" placeholder="123/WRI/IX/2045" />
        </div>
        <div class="w-full">
          <label for="tanggal_surat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Surat Tugas</label>

          <div class="relative max-w-sm">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
              </svg>
            </div>
            <input datepicker id="default-datepicker" name="tanggal_surat" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
          </div>
        </div>
      </div>

      <!-- Lampiran -->
      <div class="mb-5 grid gap-5">
        <div class="max-w-full">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_surat_tugas">File Surat Tugas</label>
          <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="file_surat_tugas" type="file" name="file_surat_tugas">
          <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Ukuran (Max: 5000Kb) Ekstensi (.jpg,.jpeg,.png,.pdf,.docx)</div>
        </div>
        <div class="max-w-full">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">File Sertifikat</label>
          <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="file_sertifikat" type="file"
            name="file_sertifikat">
          <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Ukuran (Max: 5000Kb) Ekstensi (.jpg,.jpeg,.png,.pdf,.docx)</div>
        </div>
        <div class="max-w-full">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Foto Kegiatan</label>
          <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="file_foto_kegiatan" type="file"
            name="file_foto_kegiatan">
          <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Ukuran (Max: 5000Kb) Ekstensi (.jpg,.jpeg,.png,.pdf,.docx)</div>
        </div>
        <div class="max-w-full">
          <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="user_avatar">Foto Poster</label>
          <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="file_poster" type="file"
            name="file_poster">
          <div class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="user_avatar_help">Ukuran (Max: 5000Kb) Ekstensi (.jpg,.jpeg,.png,.pdf,.docx)</div>
        </div>
      </div>
    </div>
  </div>

  <!-- Form Input Data Mapres -->
  <div class="flex gap-5">
    <div>
      <span class="text-sm text-gray-500">Step 2</span>
      <h1 class="text-lg font-bold text-gray-900">Data Mahasiswa</h1>
      <hr class="mb-5 w-64">
    </div>

    <div class="w-full">
      <div id="containerMD">
        <div class="inputGroup mt-5 flex justify-between gap-4 items-end">
          <!-- input nama mahasiswa -->
          <div class="fieldNama grid w-full" data-type="mahasiswa">
            <label for="mahasiswa" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mahasiswa</label>
            <input type="text" name="namaMhs[]" class="searchNama w-full text-gray-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex items-center">
            <div class="dropdownNama absolute mt-20 z-10 hidden cursor-pointer bg-white divide-y divide-gray-100 rounded-lg shadow w-80 dark:bg-gray-700">
            </div>
          </div>

          <!-- dropdown peran -->
          <div class="grid">
            <label for="peran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Peran</label>
            <select name="peranMhs[]" id="peran" class="w-44 text-white bg-gray-900 hover:bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-left inline-flex items-center justify-between focus:ring-0 focus:ring-transparent">
              <?php foreach ($listPeranMhs as $peran) : ?>
                <option><?= $peran ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- button remove input field -->
          <div>
            <button type="button" class="btnRemove text-xl focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg px-3.5 py-1.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">×</button>
          </div>
        </div>
      </div>

      <!-- button tambah mahasiswa -->
      <button id="btnAddInput" type="button" class="mt-5 text-sm focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg px-3.5 py-1.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">+ Tambah Mahasiswa</button>
    </div>
  </div>

  <!-- Form Input Data Dospem -->
  <div class="flex gap-5 mt-5">
    <div>
      <span class="text-sm text-gray-500">Step 3</span>
      <h1 class="text-lg font-bold text-gray-900">Data Dosen Pembimbing</h1>
      <hr class="mb-5 w-64">
    </div>

    <div class="w-full">
      <div id="containerMD">
        <div class="inputGroup mt-5 flex justify-between gap-4 items-end">
          <!-- input nama dospem -->
          <div class="fieldNama grid w-full" data-type="dospem">
            <label for="dospem" class="block mb-2 text-sm font-medium text-gray-900">Dosen</label>
            <input type="text" name="namaDospem[]" class="searchNama w-full text-gray-900 font-medium rounded-lg text-sm px-5 py-2.5 inline-flex items-center">
            <div class="dropdownNama absolute mt-20 z-10 hidden cursor-pointer bg-white divide-y divide-gray-100 rounded-lg shadow w-80 dark:bg-gray-700">
            </div>
          </div>

          <!-- dropdown peran -->
          <div class="grid">
            <label for="peran" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Peran</label>
            <select name="peranDospem[]" id="peran" class="w-44 text-white bg-gray-900 hover:bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-left inline-flex items-center justify-between focus:ring-0 focus:ring-transparent">
              <?php foreach ($listPeranDsn as $peran) : ?>
                <option><?= $peran ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <!-- button remove input field -->
          <div>
            <button type="button" class="btnRemove text-xl focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg px-3.5 py-1.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">×</button>
          </div>
        </div>
      </div>
      <button id="btnAddInput" type="button" class="mt-5 text-sm focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg px-3.5 py-1.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">+ Tambah Dosen</button>
    </div>
  </div>

  <div class="w-full flex justify-end mt-10">
    <button type="submit" class="text-white bg-gray-900 hover:bg-gray-800 font-medium rounded-lg text-md w-32 px-3.5 py-1.5 text-center">Save</button>
  </div>
</form>