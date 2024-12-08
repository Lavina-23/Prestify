<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Prestify</title>

  <link rel="stylesheet" href="./css/output.css">
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
  <style>
    html {
      scroll-behavior: smooth;
    }

    .nav-link {
      text-decoration: none;
      padding: 8px 16px;
      font-weight: bold;
      color: #333;
      transition: color 0.3s, background-color 0.3s;
    }

    .nav-link:hover {
      color: #FFA500;
      /* Warna hover */
    }

    .active {
      color: #FFA500;
      /* Warna menu aktif */
    }

    .clicked {
      background-color: #FFA500;
      /* Warna saat diklik */
      color: white;
      border-radius: 4px;
    }
  </style>
</head>

<body>
  <nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
      <!-- Logo -->
      <a href="<?= env("BASEURL") ?>" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="<?= env("BASEURL") ?>../public/img/logo.png" class="h-12" alt="Prestify Logo">
      </a>

      <!-- Tombol Login / Dashboard -->
      <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
        <?php if ($this->isLogin()): ?>
          <a href="<?php echo env("BASEURL") ?>/mahasiswa/index">
            <button class="text-white bg-gray-900 font-medium rounded-lg text-sm px-6 py-2 text-center border-2 border-transparent hover:bg-white hover:text-gray-900 hover:border-2 hover:border-gray-900">Dashboard</button>
          </a>
        <?php else: ?>
          <a href="<?php echo env("BASEURL") ?>/user/login">
            <button class="text-white bg-gray-900 font-medium rounded-lg text-sm px-6 py-2 text-center border-2 border-transparent hover:bg-white hover:text-gray-900 hover:border-2 hover:border-gray-900">Get started</button>
          </a>
        <?php endif; ?>
        <button data-collapse-toggle="navbar-sticky" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-sticky" aria-expanded="false">
          <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
            <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>

      <!-- Menu Navigasi -->
      <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
        <ul class="flex flex-col font-medium md:flex-row md:space-x-8 md:mt-0">
          <li>
            <a href="<?= env("BASEURL") ?>" class="nav-link <?= $activePage === 'home' ? 'active' : '' ?>">Home</a>
          </li>
          <li>
            <a href="#competition" class="nav-link <?= $activePage === 'competition' ? 'active' : '' ?>">Competition</a>
          </li>
          <li>
    <a href="#leaderboard" class="nav-link hover:text-gray-300">Leaderboard</a>
  </li>
          <li>
            <a href="#contact" class="nav-link <?= $activePage === 'contact' ? 'active' : '' ?>">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <nav class="bg-gray-900 text-white">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile Menu Button -->
          <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <!-- Menu Icon -->
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
          </button>
        </div>
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex-shrink-0">
            <a href="<?= env("BASEURL") ?>" class="text-white text-xl font-semibold">MyApp</a> <!-- Link Home -->
          </div>
          <div class="hidden sm:block sm:ml-6">
            <div class="flex space-x-4">
              <a href="<?= env("BASEURL") ?>" class="text-gray-300 hover:text-yellow-500 px-3 py-2 rounded-md text-sm font-medium">Home</a>
              <a href="#leaderboard" class="text-gray-300 hover:text-yellow-500 px-3 py-2 rounded-md text-sm font-medium">Leaderboard</a>
              <a href="#competition" class="text-gray-300 hover:text-yellow-500 px-3 py-2 rounded-md text-sm font-medium">Competition</a> <!-- Ganti About dengan Competition -->
              <a href="#contact" class="text-gray-300 hover:text-yellow-500 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </nav>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.5.2/flowbite.min.js"></script>
  <script>
    // Menambahkan event listener untuk klik tombol menu
    document.querySelectorAll('.nav-link').forEach(link => {
      link.addEventListener('click', function() {
        // Hapus class 'clicked' dari semua link
        document.querySelectorAll('.nav-link').forEach(item => item.classList.remove('clicked'));
        // Tambahkan class 'clicked' pada link yang diklik
        this.classList.add('clicked');
      });
    });
  </script>
</body>

</html>