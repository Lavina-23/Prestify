
    <div class="grid gap-10 ml-10">
    <div class="flex items-center mt-5">
        <h1 class="text-5xl">✨</h1>
        <h1 class="text-5xl font-bold text-gray-900">Lomba yang Tersedia</h1>
    </div>
    <div class="w-[1350px] relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
            <th scope="col" class="px-6 py-3">
                ID
            </th>
            <th scope="col" class="px-6 py-3">
                Kategori
            </th>
            <th scope="col" class="px-6 py-3">
                Nama Lomba
            </th>
            <th scope="col" class="px-6 py-3">
                Tingkat
            </th>
            <th scope="col" class="px-6 py-3">
                Deskripsi
            </th>
            <th scope="col" class="px-6 py-3">
                Link
            </th>
            <th scope="col" class="px-6 py-3">
                Deadline
            </th>
            <th scope="col" class="px-10 py-3">
                Aksi
            </th>
            </tr>
        </thead>
        <tbody>    
            <?php foreach ($data['Lomba'] as $lombas) : ?>
            <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                <?= $lombas['lomba_id'] ?>
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?= $lombas['kategori_id'] ?>
                </th>
                <td class="px-6 py-4">
                <?= $lombas['nama_lomba']?>
                </td>
                <td class="px-6 py-4">
                <?= $lombas['tingkat'] ?>
                </td>
                <td class="px-6 py-4">
                <?= $lombas['deskripsi_lomba'] ?>
                </td>
                <td class="px-6 py-4">
                <?= $lombas['link_lomba'] ?>
                </td>
                <td class="px-6 py-4">
                <?= $lombas['deadline_lomba'] ?>
                </td>
                <td class="px-6 py-4">
                <div class="flex gap-4 items-center justify-center">
                <!-- Tombol Delete -->
                    <button onclick="deleteLomba(<?= $lombas['lomba_id'] ?>)" class="font-medium text-gray-900 hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-gray-900">
                        <path fill-rule="evenodd" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" clip-rule="evenodd" />
                    </svg>
                    </button>
                    <a href="formUpdate.php?id=<?= $lombas['lomba_id'] ?>" class="font-medium text-gray-900 hover:underline">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 text-gray-900">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                    </a>
                </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>
    </div>
    <script>
        function deleteLomba(id) {
            if (confirm("Apakah Anda yakin ingin menghapus lomba ini?")) {
                fetch(`deleteLomba.php?id=${id}`, {
                method: "DELETE",
                })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                    alert("Lomba berhasil dihapus!");
                    location.reload(); // Reload untuk memperbarui tabel
                    } else {
                    alert("Gagal menghapus lomba!");
                    }
                })
                .catch((error) => console.error("Error:", error));
        }
        }
    </script>
    