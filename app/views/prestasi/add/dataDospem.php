<?php
$peran = array("Melakukan pembinaan kegiatan mahasiswa di bidang akademik (PA) dan kemahasiswaan (BEM, Maperwa, dan lain-lain)", "Membimbing mahasiswa menghasilkan produk saintifik bereputasi dan mendapat pengakuan tingkat Internasional", "Membimbing mahasiswa menghasilkan produk saintifik bereputasi dan mendapat pengakuan tingkat Nasional", "Membimbing mahasiswa mengikuti kompetisi dibidang akademik dan kemahasiswaan bereputasi dan mencapai juara tingkat Internasional", "Membimbing mahasiswa mengikuti kompetisi dibidang akademik dan kemahasiswaan bereputasi dan mencapai juara tingkat Nasional");
?>

<form method="post" action="<?= env("BASEURL") ?>/prestasi/addDataPrestasi" class="max-w-xl mx-auto">
  <span class="text-xs text-gray-500">Step 3</span>
  <h1 class="text-lg font-bold text-gray-900">Data Dosen Pembimbing</h1>
  <hr>

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
        <select name="peranDospem[]" id="peran" class="w-64 text-white bg-gray-900 hover:bg-gray-800 font-medium rounded-lg text-sm px-5 py-2.5 text-left inline-flex items-center justify-between focus:ring-0 focus:ring-transparent">
          <?php foreach ($peran as $prn) : ?>
            <option><?= $prn ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <!-- button remove input field -->
      <div>
        <button type="button" class="btnRemove text-xl focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg px-3.5 py-1.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">×</button>
      </div>
    </div>
  </div>

  <!-- button tambah dospem -->
  <button id="btnAddInput" type="button" class="mt-5 text-sm focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg px-3.5 py-1.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">+ Tambah Dosen</button>

  <button type="submit" class="text-white bg-gray-900 hover:bg-gray-800 font-medium rounded-lg text-sm px-3.5 py-1.5 text-center">Save</button>
</form>