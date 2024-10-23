<div class="grid">
  <h1 class="m-10 text-5xl font-bold text-gray-900">Daftar Prestasi</h1>
  <div class="relative overflow-x-auto sm:rounded-lg px-10">
    <table class="w-[1000px] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <tbody>
        <?php foreach ($data['prestasi'] as $pres) : ?>
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
            <td class="px-6 py-4">
              <a href="#" class="font-medium text-yellow-500 hover:underline">Detail</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </div>
</div>