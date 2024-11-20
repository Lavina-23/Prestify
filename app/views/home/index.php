<section class="max-container">
  <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 grid lg:grid-cols-2 gap-8 lg:gap-16">
    <div class="flex flex-col justify-center gap-4">
      <h1 class="text-4xl font-rubik font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-5xl dark:text-white">Welcome Champion !</h1>
      <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400"> Celebrate greatness with Prestify! Together, we inspire, achieve, and shine brighter with every milestone.</p>
      <div class="flex -space-x-4 rtl:space-x-reverse">
        <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="<?= env("BASEURL") ?>/img/person1.png" alt="">
        <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="<?= env("BASEURL") ?>/img/person2.png" alt="">
        <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="<?= env("BASEURL") ?>/img/person3.png" alt="">
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

  <!-- Leaderboard Section
  <section class="mt-8">
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Leaderboard</h2>
    <div class="overflow-x-auto mt-4">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">Posisi</th>
            <th scope="col" class="px-6 py-3">Nama</th>
            <th scope="col" class="px-6 py-3"> Poin Prestasi</th>
          </tr>
        </thead>
        <tbody>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">1</td>
            <td class="px-6 py-4">Reja jago</td>
            <td class="px-6 py-4">500</td>
          </tr>
          <tr class="bg-gray-50 border-b dark:bg-gray-900 dark:border-gray-700">
            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">2</td>
            <td class="px-6 py-4">Aduh Reja Lagi</td>
            <td class="px-6 py-4">450</td>
          </tr>
          <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">3</td>
            <td class="px-6 py-4">Arielreza Ganteng</td>
            <td class="px-6 py-4">400</td>
          </tr>
        </tbody>
      </table>
    </div>
  </section> -->
  <!-- End of Leaderboard Section -->

  <div class="min-h-screen bg-yellow-500 flex justify-center items-center p-6">
  <!-- Container -->
  <div class="bg-white text-gray-900 w-full max-w-5xl rounded-lg shadow-lg border border-gray-200">
    <!-- Header Section -->
    <div class="flex justify-between items-center p-6 border-b border-gray-300">
      <h1 class="text-2xl font-bold">Reward</h1>
      <div class="flex items-center space-x-4">
        <!-- User Avatars -->
        <div class="flex items-center space-x-2">
          <div class="flex items-center bg-gray-100 px-3 py-1 rounded-full shadow-sm">
            <span class="text-sm font-medium">Dinotrx</span>
            <span class="ml-2 text-yellow-500 font-bold">1000</span>
          </div>
          <div class="flex items-center bg-gray-100 px-3 py-1 rounded-full shadow-sm">
            <span class="text-sm font-medium">Astropower</span>
            <span class="ml-2 text-yellow-500 font-bold">100</span>
          </div>
          <div class="flex items-center bg-gray-100 px-3 py-1 rounded-full shadow-sm">
            <span class="text-sm font-medium">Chronal</span>
            <span class="ml-2 text-yellow-500 font-bold">150</span>
          </div>
        </div>
        <!-- User Profile -->
        <div class="bg-gray-100 rounded-full w-10 h-10 flex items-center justify-center">
          <img class="rounded-full" src="https://via.placeholder.com/40" alt="User avatar" />
        </div>
      </div>
    </div>

    <!-- Navigation Tabs -->
    <div class="flex justify-center space-x-6 p-6">
      <button class="text-lg font-semibold bg-yellow-600 text-white px-4 py-2 rounded-lg shadow-md focus:ring-2 focus:ring-yellow-300">
        Daily
      </button>
      <button class="text-lg font-semibold bg-gray-200 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-300">
        Monthly
      </button>
    </div>

    <!-- Leaderboard Section -->
    <div class="grid grid-cols-3 gap-6 p-6">
      <!-- First Place -->
      <div class="bg-gray-100 rounded-lg p-6 text-center shadow-md border border-gray-300">
        <div class="w-16 h-16 mx-auto mb-4">
          <img src="https://via.placeholder.com/64" alt="Avatar" class="rounded-full" />
        </div>
        <h2 class="text-xl font-bold text-gray-800">Klaxon</h2>
        <p class="text-yellow-500 font-medium mt-2">Earn 1,500 points</p>
        <p class="mt-2 text-sm text-gray-500">Prize: 10,000</p>
        <p class="mt-2 text-sm text-gray-500">00d 00h 43m 51s</p>
      </div>
      <!-- Second Place -->
      <div class="bg-gray-100 rounded-lg p-6 text-center shadow-md border border-gray-300">
        <div class="w-16 h-16 mx-auto mb-4">
          <img src="https://via.placeholder.com/64" alt="Avatar" class="rounded-full" />
        </div>
        <h2 class="text-xl font-bold text-gray-800">Skulldugger</h2>
        <p class="text-yellow-500 font-medium mt-2">Earn 500 points</p>
        <p class="mt-2 text-sm text-gray-500">Prize: 5,000</p>
      </div>
      <!-- Third Place -->
      <div class="bg-gray-100 rounded-lg p-6 text-center shadow-md border border-gray-300">
        <div class="w-16 h-16 mx-auto mb-4">
          <img src="https://via.placeholder.com/64" alt="Avatar" class="rounded-full" />
        </div>
        <h2 class="text-xl font-bold text-gray-800">Ultralex</h2>
        <p class="text-yellow-500 font-medium mt-2">Earn 250 points</p>
        <p class="mt-2 text-sm text-gray-500">Prize: 2,500</p>
      </div>
    </div>

    <!-- Lower Leaderboard -->
    <div class="bg-gray-50 rounded-lg p-6">
      <table class="w-full text-left">
        <thead class="text-gray-500 border-b border-gray-300">
          <tr>
            <th class="py-2">Place</th>
            <th>Username</th>
            <th>Points</th>
            <th>Prize</th>
          </tr>
        </thead>
        <tbody>
          <tr class="hover:bg-gray-100">
            <td class="py-2">4</td>
            <td>Protesian</td>
            <td>156</td>
            <td>750</td>
          </tr>
          <tr class="hover:bg-gray-100">
            <td class="py-2">5</td>
            <td>Protesian</td>
            <td>156</td>
            <td>750</td>
          </tr>
          <tr class="hover:bg-gray-100">
            <td class="py-2">6</td>
            <td>Protesian</td>
            <td>156</td>
            <td>750</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
