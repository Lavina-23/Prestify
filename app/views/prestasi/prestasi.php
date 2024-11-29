<?php
$l = array("Surat Tugas", "Sertifikat", "Foto Kegiatan", "Poster Kompetisi");
foreach ($data['kompetisi'] as $kompetisi) {
  $lampiran = [
    'surat_tugas' => [
      'judul' => 'Surat Tugas',
      'link' => env('BASEURL') . "/uploads/" . $kompetisi['file_surat_tugas']
    ],
    'sertifikat' => [
      'judul' => 'Sertifikat',
      'link' => env('BASEURL') . "/uploads/" . $kompetisi['file_sertifikat']
    ],
    'foto_kegiatan' => [
      'judul' => 'Foto Kegiatan',
      'link' => env('BASEURL') . "/uploads/" . $kompetisi['file_foto_kegiatan']
    ],
    'poster' => [
      'judul' => 'Poster Kompetisi',
      'link' => env('BASEURL') . "/uploads/" . $kompetisi['file_poster']
    ]
  ];
}
?>

<div class="grid gap-10 ml-10">
  <div class="flex items-center mt-5">
    <h1 class="text-5xl">✨</h1>
    <h1 class="text-5xl font-bold text-gray-900">Semua Prestasimu Ada Disini</h1>
  </div>
  <div class="w-[1000px] relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            Nama Kompetisi
          </th>
          <th scope="col" class="px-6 py-3">
            Tahun Akademik
          </th>
          <th scope="col" class="px-6 py-3">
            Jenis
          </th>
          <th scope="col" class="px-6 py-3">
            Status
          </th>
          <th scope="col" class="px-6 py-3">

          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data['kompetisi'] as $kompetisi) : ?>
          <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
              <?= $kompetisi['nama_prestasi'] ?>
            </th>
            <td class="px-6 py-4">
              <?= $kompetisi['tahun_akademik'] . " " . $kompetisi['semester'] ?>
            </td>
            <td class="px-6 py-4">
              <?= $kompetisi['nama_kategori'] ?>
            </td>
            <td class="px-6 py-4 <?= $kompetisi['status_prestasi'] == 1 ? "text-green-600" : "text-red-600" ?>">
              <strong><?= $kompetisi['status_prestasi'] == 1 ? "Sudah Diverifikasi" : "Belum Diverifikasi" ?></strong>
            </td>
            <td onclick="toggleDetailPrestasi('<?= $kompetisi['prestasi_id'] ?>')" class="px-6 py-4">
              <a href="#" class="flex gap-2 items-center font-medium text-gray-900 hover:underline">Detail
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="4" stroke="currentColor" class="w-3 h-3 text-gray-900">
                  <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
              </a>
            </td>
          </tr>

          <!-- Detail Prestasi -->
          <tr id="dropdown-detail-<?= $kompetisi['prestasi_id'] ?>" class="hidden bg-gray-50 dark:bg-gray-700">
            <td colspan="5" class="px-6 py-4 text-gray-700 dark:text-gray-300">
              <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="grid gap-2">
                  <p><strong>Tingkat: </strong> <?= $kompetisi['tingkat'] ?></p>
                  <p><strong>Link Kompetisi: </strong> <a href="<?= $kompetisi['link_kompetisi'] ?>" target="_blank" class="text-blue-600"><?= $kompetisi['link_kompetisi'] ?></a></p>
                  <p><strong>Tanggal Mulai: </strong> <?= $kompetisi['tanggal_mulai'] ?></p>
                  <p><strong>Tanggal Akhir: </strong> <?= $kompetisi['tanggal_selesai'] ?></p>
                  <p><strong>Tempat: </strong><?= $kompetisi['tempat_kompetisi'] ?></p>
                  <p><strong>Jumlah Peserta: </strong><?= $kompetisi['jumlah_pt'] ?></p>
                  <p><strong>Surat Tugas: </strong></p>
                  <ul class="pl-5 list-none space-y-1">
                    <li>Nomor: <?= $kompetisi['no_surat_tugas'] ?></li>
                    <li>Tanggal: <?= $kompetisi['tanggal_surat'] ?></li>
                  </ul>
                  <p><strong>Lampiran:</strong></p>
                  <ul class="pl-5 list-none space-y-1">
                    <?php foreach ($lampiran as $lamp) : ?>
                      <li class="flex gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 text-green-600">
                          <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z" clip-rule="evenodd" />
                        </svg>
                        <a href="<?= $lamp['link'] ?>" target="_blank">
                          <?= $lamp['judul'] ?>
                        </a>
                      </li>
                    <?php endforeach; ?>
                  </ul>
                </div>
                <div>
                  <p><strong>Peserta:</strong></p>
                  <ul class="pl-5 list-none space-y-1">
                    <?php foreach ($data['mapres'] as $mapres) : ?>
                      <li><?= $mapres['nim'] . " - " . $mapres['nama'] ?></li>
                    <?php endforeach; ?>
                  </ul>
                  <p class="mt-2"><strong>Pembimbing:</strong></p>
                  <ul class="pl-5 list-none space-y-1">
                    <?php foreach ($data['dospem'] as $dospem) : ?>
                      <li><?= $dospem['nidn'] . " - " . $dospem['nama'] ?></li>
                    <?php endforeach; ?>
                  </ul>
                  <div class="flex mt-4 gap-2 justify-end font-bold">
                    <a href="<?= env('BASEURL') ?>/prestasi/showFormPrestasi?action=edit&prestasi_id=<?= $kompetisi['prestasi_id'] ?>" class="flex items-center gap-2 w-fit px-5 py-2 rounded-lg bg-yellow-100 text-yellow-500">Edit
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                      </svg>
                    </a>
                    <button type="button" class="flex items-center gap-2 w-fit px-5 py-2 rounded-lg bg-red-100 text-red-500">
                      Delete
                      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                      </svg>
                    </button>
                  </div>
                </div>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>