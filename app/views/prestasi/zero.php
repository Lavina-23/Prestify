<div class="grid justify-items-center items-center h-screen mx-auto">
  <div class="grid justify-items-center gap-5">
    <img src="<?= env('BASEURL') ?>/img/zero.png" alt="empty-achievement">
    <div class="text-center">
      <h1 class="text-3xl font-bold text-gray-900">Belum ada prestasi nih..</h1>
      <p class="text-md text-center text-gray-500">
        Mari wujudkan prestasi bersama! Tambahkan pencapaianmu <br> dan jadilah inspirasi bagi yang lain.
      </p>
    </div>
    <a href="<?= env("BASEURL") ?>/prestasi/formAddPrestasi" class="inline-flex justify-center items-center py-1 px-4 text-base font-medium text-center border-2 border-transparent text-white rounded-lg bg-gray-900 hover:text-gray-900 hover:border-2 hover:border-gray-900 hover:bg-white focus:ring-1 focus:ring-gray-900 dark:focus:ring-gray-900">
      Tambah Prestasi
    </a>
  </div>
</div>