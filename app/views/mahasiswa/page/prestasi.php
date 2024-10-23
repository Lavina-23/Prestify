<div class="grid">
  <div class="flex items-center m-10">
    <h1 class="text-8xl">✨</h1>
    <h1 class="text-5xl font-bold text-gray-900">Semua Prestasimu<br>Ada Disini</h1>
  </div>
  <div class="relative overflow-x-auto sm:rounded-lg px-10">
    <table class="w-[1000px] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <tbody>
        <?php foreach ($data['prestasi'] as $i => $pres) : ?>
          <tr class="bg-white border-y dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-normal dark:text-white w-1/3">
              <?= $pres['nama_prestasi'] ?>
            </th>
            <td class="px-6 py-4">
              <?= $pres['penyelenggara'] ?>
            </td>
            <td class="px-6 py-4">
              <?= $pres['tempat_kompetisi'] ?>
            </td>
            <td class="px-6 py-4">
              <?php
              $date = date_create($pres['tanggal_selesai']);
              echo date_format($date, "d F Y")  ?>
            </td>
            <td onclick="toggleDetailPrestasi(<?= $i; ?>)" class="flex items-center gap-2 px-6 py-4 cursor-pointer">
              <button class="font-medium text-yellow-500">Detail
              </button>
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-3 h-3 text-yellow-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
              </svg>
            </td>
          </tr>

          <!-- dropdown detail -->
          <tr id="dropdown-<?= $i; ?>" class="hidden bg-gray-100 dark:bg-gray-700">
            <td colspan="5" class="px-6 py-4">
              <div class="text-gray-700 dark:text-gray-300">
                <p><strong>Deskripsi:</strong> <?= $pres['link_kompetisi']; ?></p>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>