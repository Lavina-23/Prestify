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
                <?php foreach ($data as $lombas) : ?>
                    <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4">
                            <?= $lombas['lomba_id'] ?>
                        </td>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $lombas['kategori_id'] ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $lombas['nama_lomba'] ?>
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
                                <a href="<?= env('BASEURL') ?>/lomba/deleteLomba/<?= $lombas['lomba_id'] ?>" onclick="return confirm('Yakin ingin menghapus?');" class="flex items-center gap-2 w-fit px-5 py-2 text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
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