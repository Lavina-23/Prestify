<section class="max-container">

  <head>
    <style>
      .nav-link {
        font-size: 18px;
        color: black;
        text-decoration: none;
        font-weight: bold;
        padding: 10px;
        transition: color 0.3s ease;
      }

      /* Gaya tombol saat aktif */
      .nav-link.active {
        color: yellow;
        /* Warna aktif */
      }

      /* Efek hover */
      .nav-link:hover {
        color: gray;
      }
    </style>
  </head>


  <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 grid lg:grid-cols-2 gap-8 lg:gap-16">
    <div class="flex flex-col justify-center gap-4">
      <h1 class="text-4xl font-rubik font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-5xl dark:text-white">Welcome Champion!</h1>
      <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Celebrate greatness with Prestify! Together, we inspire, achieve, and shine brighter with every milestone.</p>
      <div class="flex -space-x-4 rtl:space-x-reverse">
        <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="<?= env("BASEURL") ?>/img/person1.png" alt="Person 1">
        <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="<?= env("BASEURL") ?>/img/person2.png" alt="Person 2">
        <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="<?= env("BASEURL") ?>/img/person3.png" alt="Person 3">
      </div>
      <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0">
        <a href="#" class="inline-flex justify-center items-center py-2 px-5 text-base font-medium text-center border-2 border-transparent text-white rounded-lg bg-gray-900 hover:text-gray-900 hover:border-2 hover:border-gray-900 hover:bg-white focus:ring-1 focus:ring-gray-900 dark:focus:ring-gray-900">
          Get started →
        </a>
      </div>
    </div>
    <div>
      <img src="<?= env("BASEURL") ?>/img/home.png" alt="Home Hero" class="w-full">
    </div>
  </div>
</section>


<!-- Bagian leaderboard -->
<div id="leaderboard" class="min-h-screen flex justify-center items-center p-6">
  <div class="w-full max-w-6xl">
    <!-- Navigation Tabs -->
    <div class="flex justify-center space-x-6 p-6"></div>

    <!-- Top Leaderboard Section -->
    <div class="flex gap-6 items-center justify-center p-6 bg-white rounded-xl shadow-lg">
      <!-- Second Place (Silver) -->
      <div class="w-fit h-fit grid gap-5 justify-items-center p-10 bg-purple-100 rounded-lg shadow-md">
        <div class="text-lg font-bold bg-purple-400 text-white py-1 px-2 rounded-md">2nd Place</div> <!-- Keterangan peringkat -->
        <img class="rounded-t-lg w-32" src="<?= env('BASEURL') ?>/img/person2.png" alt="" />
        <div class="grid justify-items-center">
          <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white">Muhammad Hasan</h5>
          <h1 class="font-bold text-3xl text-purple-400">8 Kejuaraan</h1>
        </div>
      </div>

      <!-- First Place (Gold) -->
      <div class="w-fit h-fit grid gap-5 justify-items-center p-10 bg-yellow-100 rounded-lg shadow-md">
        <div class="text-lg font-bold bg-yellow-400 text-white py-1 px-2 rounded-md">1st Place</div> <!-- Keterangan peringkat -->
        <img class="rounded-t-lg w-52" src="<?= env('BASEURL') ?>/img/person1.png" alt="" />
        <div class="grid justify-items-center">
          <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white">Lavina</h5>
          <h1 class="font-bold text-4xl text-yellow-400">10 Kejuaraan</h1>
        </div>
      </div>

      <!-- Third Place (Bronze) -->
      <div class="w-fit h-fit grid gap-5 justify-items-center p-10 bg-emerald-100 rounded-lg shadow-md">
        <div class="text-lg font-bold bg-emerald-400 text-white py-1 px-2 rounded-md">3rd Place</div> <!-- Keterangan peringkat -->
        <img class="rounded-t-lg w-32" src="<?= env('BASEURL') ?>/img/person4.png" alt="" />
        <div class="grid justify-items-center">
          <h5 class="text-lg font-semibold tracking-tight text-gray-900">Muhammad Husein</h5>
          <h1 class="font-bold text-3xl text-emerald-400">5 Kejuaraan</h1>
        </div>
      </div>
    </div>

    <!-- Lower Leaderboard Section
    <div class="bg-white rounded-lg shadow-lg p-6 mt-6">
      <table class="w-full text-left border-collapse">
        <thead class="text-gray-500 border-b border-gray-300">
          <tr>
            <th class="py-2 px-4">Place</th>
            <th class="px-4">Username</th>
            <th class="px-4">Points</th>
            <th class="px-4">Prize</th>
          </tr>
        </thead>
        <tbody>
          <tr class="hover:bg-gray-100">
            <td class="py-2 px-4">4</td>
            <td>Protesian</td>
            <td>156</td>
            <td>750</td>
          </tr>
          <tr class="hover:bg-gray-100">
            <td class="py-2 px-4">5</td>
            <td>NovaCrush</td>
            <td>145</td>
            <td>500</td>
          </tr>
          <tr class="hover:bg-gray-100">
            <td class="py-2 px-4">6</td>
            <td>AsteroidHunter</td>
            <td>130</td>
            <td>250</td>
          </tr>
        </tbody>
      </table>
    </div> -->
  </div>
</div>

<section id="competition" class="min-h-screen bg-gradient-to-br from-black-300 via-black-400 to-black-500 p-8">
  <div class="max-w-7xl mx-auto">
    <h2 class="text-4xl text-center font-extrabold text-white">Terkini Lomba-Lomba</h2>

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