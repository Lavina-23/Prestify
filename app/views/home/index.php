<section id="hero">
  <!-- Hero -->
  <div class="h-full lg:min-h-screen px-6 md:!px-20 gap-5 mt-6 lg:!mt-0 mx-auto max-w-screen-xl lg:py-12 grid justify-center items-center lg:gap-10">
    <div class="grid md:flex">
      <div class="order-last md:order-first flex flex-col justify-center gap-4 text-center md:!text-left">
        <h1 class="text-4xl font-rubik font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl">Welcome Champion!</h1>
        <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400 lg:w-3/4">Celebrate greatness with Prestify! Together, we inspire, achieve, and shine brighter with every milestone.</p>
        <div class="flex md:grid justify-center md:!justify-start gap-3">
          <div class="flex -space-x-4 rtl:space-x-reverse">
            <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="<?= env("BASEURL") ?>/img/person1.png" alt="Person 1">
            <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="<?= env("BASEURL") ?>/img/person2.png" alt="Person 2">
            <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="<?= env("BASEURL") ?>/img/person3.png" alt="Person 3">
          </div>
          <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0">
            <a href="<?= env('BASEURL') ?>/user/login" class="inline-flex justify-center items-center py-2 px-5 text-base font-medium text-center border-2 border-transparent text-white rounded-lg bg-gray-900 hover:text-gray-900 hover:border-2 hover:border-gray-900 hover:bg-white focus:ring-1 focus:ring-gray-900 dark:focus:ring-gray-900">
              Get started
            </a>
          </div>
        </div>
      </div>
      <div class="flex gap-5">
        <img src="<?= env("BASEURL") ?>/img/home.png" alt="Home Hero" class="w-full h-fit">
      </div>
    </div>
    <div class="bg-white dark:bg-gray-900">
      <hr class="border border-gray-200">
      <div class="py-8 lg:py-16 mx-auto max-w-screen-xl px-4">
        <div class="grid grid-cols-2 gap-8 text-gray-500 sm:gap-12 md:grid-cols-4 lg:grid-cols-6 dark:text-gray-400">
          <a href="#" class="flex justify-center items-center">
            <img class="h-12 grayscale hover:grayscale-0" src="https://kmipn.pens.ac.id/img/kmipn.webp" alt="kmipn">
          </a>
          <a href="#" class="flex justify-center items-center">
            <img class="h-12 grayscale hover:grayscale-0" src="https://pimnas37.unair.ac.id/wp-content/uploads/2024/02/LOGO-PIMNAS-37-UNAIR.png" alt="pimnas">
          </a>
          <a href="#" class="flex justify-center items-center">
            <img class="h-20 grayscale hover:grayscale-0" src="<?= env('BASEURL') ?>/img/gemastik.png" alt="gemastik">
          </a>
          <a href="#" class="flex justify-center items-center">
            <img class="h-20 grayscale hover:grayscale-0" src="<?= env('BASEURL') ?>/img/pkm.jpg" alt="pkm">
          </a>
        </div>
      </div>
      <hr class="border border-gray-200">
    </div>
  </div>

  <!-- Bagian leaderboard -->
  <div id="leaderboard" class="lg:min-h-screen flex justify-center items-center p-6 relative">
    <div class="w-full max-w-6xl relative">
      <!-- Top Leaderboard Section -->
      <div class="grid justify-items-center gap-10 p-10 bg-transparent relative z-10">
        <div class="text-center">
          <h1 class="font-extrabold text-3xl md:!text-6xl text-gray-950">- Leaderboard -</h1>
          <p class="mt-2 text-gray-600">Apakah ada namamu disini?</p>
        </div>
        <div class="grid md:flex gap-10 place-items-center items-center justify-center">
          <?php
          $ranks = ['2nd Place', '1st Place', '3rd Place'];
          $colors = ['purple', 'yellow', 'emerald'];
          $imageUrls = ['/img/person2.png', '/img/person1.png', '/img/person3.png'];
          ?>

          <?php if (!empty($data['leaderboard'])) : ?>
            <?php foreach ($data['leaderboard'] as $i => $mapres): ?>
              <div class="max-w-fit grid gap-5 justify-items-center p-5 bg-<?= $colors[$i] ?>-100 rounded-lg shadow-xl">
                <div class="text-lg font-bold text-<?= $colors[$i] ?>-100 bg-<?= $colors[$i] ?>-400 text-white py-1 px-2 rounded-md">
                  <?= $ranks[$i] ?>
                </div>
                <img class="w-<?= $i == 1 ? '32' : ($i == 2 ? '16' : '20') ?>" src="<?= env('BASEURL') . $imageUrls[$i] ?>" alt="" />
                <div class="grid justify-items-center">
                  <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white"><?= $mapres['nama_mahasiswa'] ?></h5>
                  <h1 class="font-bold text-<?= $i == 1 ? '3xl' : ($i == 2 ? 'xl' : '2xl') ?> text-<?= $colors[$i] ?>-600"><?= $mapres['jumlah_prestasi'] ?> Kejuaraan</h1>
                  <h1 class="font-bold text-<?= $i == 1 ? 'lg' : ($i == 2 ? 'md' : 'sm') ?> text-<?= $colors[$i] ?>-400"><?= $mapres['total_poin'] ?> Poin ✨</h1>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else : ?>
            <div class="grid gap-5 justify-items-center">
              <img src="<?= env('BASEURL') ?>/img/question.png" alt="question-mark">
              <h1 class="font-bold text-2xl">Wah belum ada yang jadi juara nih..</h1>
            </div>
          <?php endif; ?>
        </div>
      </div>
      <!-- Background Star -->
      <img src="<?= env('BASEURL') ?>/img/star.png" alt="star" class="mt-20 lg:mt-0 absolute inset-0 -z-50 hidden md:!flex">
    </div>
  </div>

  <!-- Info Lomba -->
  <section id="lomba" class="md:p-10 lg:my-32 mx-10">
    <h1 class="font-extrabold text-3xl md:!text-5xl text-gray-950">Lomba yang Akan Datang</h1>
    <p class="mt-2 text-gray-600">Ikuti perlombaan dibawah ini, dan tunjukkan ide revolusionermu !</p>
    <div class="max-w-7xl mx-auto">
      <!-- Daftar Lomba -->
      <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        <!-- Lomba 1 -->
        <div class="bg-white text-gray-800 p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-semibold">Lomba Coding 2024</h3>
          <p class="mt-2 text-gray-600">Lomba coding untuk pengembang pemula, hadiah utama 5 juta rupiah!</p>
          <p class="mt-4 text-sm text-gray-500">Deadline: 30 Desember 2024</p>
        </div>
        <!-- Lomba 2 -->
        <div class="bg-white text-gray-800 p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-semibold">Lomba Desain Grafis</h3>
          <p class="mt-2 text-gray-600">Tunjukkan kreativitas desain Anda, hadiah utama 3 juta rupiah!</p>
          <p class="mt-4 text-sm text-gray-500">Deadline: 15 Januari 2025</p>
        </div>
        <!-- Lomba 3 -->
        <div class="bg-white text-gray-800 p-6 rounded-lg shadow-lg">
          <h3 class="text-xl font-semibold">Lomba Fotografi</h3>
          <p class="mt-2 text-gray-600">Lomba fotografi dengan tema alam, hadiah utama 2 juta rupiah!</p>
          <p class="mt-4 text-sm text-gray-500">Deadline: 25 Januari 2025</p>
        </div>
      </div>

      <!-- Form Input Lomba Baru -->
      <!-- <div class="mt-16">
        <h3 class="text-2xl font-bold text-white">Input Lomba Baru</h3>
        <form action="<?= env('BASEURL') ?>/submit-competition" method="POST" class="mt-4 space-y-4">
          <div>
            <label for="competition_name" class="text-white">Nama Lomba</label>
            <input type="text" id="competition_name" name="competition_name" class="w-full p-3 rounded-md border border-gray-300" required>
          </div>
          <div>
            <label for="competition_description" class="text-white">Deskripsi Lomba</label>
            <textarea id="competition_description" name="competition_description" class="w-full p-3 rounded-md border border-gray-300" required></textarea>
          </div>
          <div>
            <label for="competition_deadline" class="text-white">Deadline</label>
            <input type="date" id="competition_deadline" name="competition_deadline" class="w-full p-3 rounded-md border border-gray-300" required>
          </div>
          <div class="flex justify-end">
            <button type="submit" class="bg-blue-500 text-white py-2 px-6 rounded-md hover:bg-blue-600">Tambah Lomba</button>
          </div>
        </form>
      </div> -->
    </div>
  </section>
</section>