<section id="lomba">
  <div class="container mx-auto px-6 py-12">
    <h1 class="text-4xl font-bold text-gray-900 mb-8">Daftar Lomba</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
      <?php if (!empty($lombas)): ?>
        <?php foreach ($lombas as $lomba): ?>
          <div class="bg-white p-6 rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold text-gray-800"><?= $lomba['nama_lomba'] ?></h3>
            <p class="mt-2 text-gray-600"><?= $lomba['deskripsi_lomba'] ?></p>
            <p class="mt-4 text-sm text-gray-500">Tingkat: <?= $lomba['tingkat'] ?></p>
            <p class="mt-4 text-sm text-gray-500">Deadline: <?= date('d M Y', strtotime($lomba['deadline_lomba'])) ?></p>
            <a href="<?= $lomba['link_lomba'] ?>" class="mt-4 inline-block text-blue-500 hover:underline">Detail Lomba</a>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p class="text-gray-600">Belum ada lomba yang tersedia.</p>
      <?php endif; ?>
    </div>
  </div>
</section>
          