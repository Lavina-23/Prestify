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
        color: yellow; /* Warna aktif */
      }

      /* Efek hover */
      .nav-link:hover {
        color: gray;
      }

      /* Menambahkan keterangan di atas avatar */
      .leaderboard-rank {
        font-size: 18px;
        font-weight: bold;
        color: white;
        background-color: rgba(0, 0, 0, 0.5);
        padding: 4px 8px;
        border-radius: 4px;
        margin-bottom: 10px;
      }
    </style>
  </head>


  <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 grid lg:grid-cols-2 gap-8 lg:gap-16">
    <div class="flex flex-col justify-center gap-4">
      <h1 class="text-4xl font-rubik font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-5xl dark:text-white">Sistem Prestasi Mahasiswa</h1>
      <p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Segala Prestasi mu ada disini!</p>
      <div class="flex -space-x-4 rtl:space-x-reverse">
        <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="<?= env("BASEURL") ?>../public/img/person1.png" alt="Person 1">
        <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="<?= env("BASEURL") ?>../public/img/person2.png" alt="Person 2">
        <img class="w-10 h-10 border-2 border-white rounded-full dark:border-gray-800" src="<?= env("BASEURL") ?>../public/img/person3.png" alt="Person 3">
      </div>
      <div class="flex flex-col space-y-4 sm:flex-row sm:space-y-0">
        <a href="#" class="inline-flex justify-center items-center py-2 px-5 text-base font-medium text-center border-2 border-transparent text-white rounded-lg bg-gray-900 hover:text-gray-900 hover:border-2 hover:border-gray-900 hover:bg-white focus:ring-1 focus:ring-gray-900 dark:focus:ring-gray-900">
          Get started → 
        </a>
      </div>
    </div>
    <div>
      <img src="<?= env("BASEURL") ?>../public/img/home.png" alt="Home Hero" class="w-full">
    </div>
  </div>
</section>
<section id="competition" class="min-h-screen bg-gradient-to-br from-black-300 via-black-400 to-black-500 p-8">
  <div class="max-w-7xl mx-auto">
    <h2 class="text-4xl text-center font-extrabold text-Black">Terkini Lomba-Lomba</h2>
    
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Lomba - Prestify</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #F4F4F4;
            color: #1C1C1C;
            text-align: center;
        }

        h1 {
            font-size: 48px;
            font-weight: bold;
        }

        p {
            font-size: 18px;
            color: #6C757D;
            margin-bottom: 30px;
        }

        .category-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 40px;
        }

        .category-button {
            padding: 15px 30px;
            background-color: #1C1C1C;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .category-button:hover {
            background-color: #FFB800;
        }

        .competition-list {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            max-width: 700px;
            margin: 0 auto;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .competition-list h2 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .competition-list ul {
            list-style-type: none;
            padding: 0;
        }

        .competition-list li {
            background-color: #F4F4F4;
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid #E0E0E0;
            border-radius: 5px;
            font-size: 16px;
            text-align: left;
            cursor: pointer;
        }

        .competition-details {
            margin-top: 20px;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            gap: 20px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: 20px auto;
            text-align: left;
        }

        .competition-details img {
            max-width: 300px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .competition-caption {
            flex: 1;
            font-size: 16px;
            line-height: 1.6;
        }

        .competition-caption h3 {
            font-size: 20px;
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .competition-details {
                flex-direction: column;
                text-align: center;
            }

            .competition-caption {
                text-align: justify;
            }
        }
    </style>
</head>
<body>
    <h1>Saatnya Tunjukkan Potensimu!</h1>
    <p>Pilih kategori lomba!</p>

    <div class="category-buttons">
        <button class="category-button" onclick="showCompetitions('uiux')">UI/UX</button>
        <button class="category-button" onclick="showCompetitions('smartcity')">Smart City</button>
        <button class="category-button" onclick="showCompetitions('businessplan')">Business Plan</button>
        <button class="category-button" onclick="showCompetitions('innovationapp')">Innovation Application</button>
    </div>

    <div class="competition-list" id="competition-list">
        <h2>Daftar Lomba</h2>
        <ul id="competition-items">
            <li>Pilih kategori untuk melihat daftar lomba.</li>
        </ul>
    </div>

    <div class="competition-details" id="competition-details"></div>

    <script>
        const competitions = {
            uiux: [
                { 
                    name: "Lomba Desain UI/UX Nasional 2024", 
                    flyer: "../public/img/uiux1.jpg", 
                    caption: "Buat desain UI/UX terbaik untuk aplikasi masa depan! Lomba ini bertujuan untuk mencari bakat-bakat desainer yang kreatif dan inovatif. Peserta diharapkan membuat prototipe yang berfokus pada pengalaman pengguna yang optimal dan desain antarmuka yang menarik."
                },
                { 
                    name: "Kompetisi Inovasi UX untuk Aplikasi Mobile", 
                    flyer: "../public/img/uiux2.jpg", 
                    caption: "Tunjukkan inovasi UX dalam aplikasi mobile! Kompetisi ini menantang peserta untuk memecahkan masalah user experience dengan solusi inovatif yang dapat meningkatkan efisiensi dan kenyamanan pengguna aplikasi mobile."
                }
            ],
            smartcity: [
                { 
                    name: "Lomba Konsep Smart City Terbaik", 
                    flyer: "../public/img/smartcity1.jpg", 
                    caption: "Ide terbaik untuk kota pintar masa depan! Kompetisi ini mendorong peserta untuk menciptakan konsep teknologi yang dapat meningkatkan kualitas hidup di perkotaan dengan solusi berbasis IoT dan teknologi digital."
                },
                { 
                    name: "Hackathon Smart City 2024", 
                    flyer: "../public/img/smartcity2.png",
                    caption: "Bangun solusi inovatif untuk kota pintar! Hackathon ini mengundang tim-tim pengembang untuk membuat prototipe yang dapat menyelesaikan berbagai tantangan perkotaan dengan pendekatan teknologi."
                }
            ]
        };

        function showCompetitions(category) {
            const listElement = document.getElementById("competition-items");
            const detailsElement = document.getElementById("competition-details");
            listElement.innerHTML = "";
            detailsElement.innerHTML = "";

            const selectedCompetitions = competitions[category];

            selectedCompetitions.forEach((competition) => {
                const listItem = document.createElement("li");
                listItem.textContent = competition.name;
                listItem.onclick = () => showDetails(competition);
                listElement.appendChild(listItem);
            });
        }

        function showDetails(competition) {
            const detailsElement = document.getElementById("competition-details");
            detailsElement.innerHTML = `
                <img src="${competition.flyer}" alt="${competition.name}">
                <div class="competition-caption">
                    <h3>${competition.name}</h3>
                    <p>${competition.caption}</p>
                </div>
            `;
        }
    </script>
</body>
</html>


<!-- Bagian leaderboard -->
<div id="leaderboard" class="min-h-screen bg-gradient-to-br from-black-300 via-black-400 to-black-500 flex justify-center items-center p-6">
  <div class="w-full max-w-6xl">
    <!-- Navigation Tabs -->
    <div class="flex justify-center space-x-6 p-6"></div>

    <!-- Top Leaderboard Section -->
    <div class="grid grid-cols-3 gap-6 items-center p-6 bg-white rounded-lg shadow-lg">
      <!-- Second Place (Silver) -->
      <div class="bg-gradient-to-br from-gray-300 via-gray-400 to-gray-500 rounded-lg p-6 text-center shadow-md flex flex-col items-center justify-start border border-gray-600">
        <div class="leaderboard-rank">2nd Place</div> <!-- Keterangan peringkat -->
        <div class="w-20 h-20 mx-auto mb-4">
          <img src="<?= env("BASEURL") ?>../public/img/person3.png" alt="Avatar 2" class="rounded-full border-4 border-gray-400" />
        </div>
        <h2 class="text-2xl font-bold text-gray-800">Skulldugger</h2>
        <p class="text-black font-medium mt-2">Earn 500 points</p>
        <p class="mt-2 text-sm text-gray-600">Prize: 5,000</p>
      </div>

      <!-- First Place (Gold) -->
      <div class="bg-gradient-to-br from-[#FFD700] via-[#FFC300] to-[#FFB700] rounded-lg p-8 text-center shadow-lg border border-[#FFA500] flex flex-col items-center justify-center">
        <div class="leaderboard-rank">1st Place</div> <!-- Keterangan peringkat -->
        <div class="w-28 h-28 mb-4">
          <img src="<?= env("BASEURL") ?>../public/img/person2.png" alt="Avatar 1" class="rounded-full border-4 border-yellow-600" />
        </div>
        <h2 class="text-4xl font-extrabold text-gray-800">Klaxon</h2>
        <p class="text-yellow-600 font-bold mt-2 text-lg">Earn 1,500 points</p>
        <p class="mt-2 text-sm text-gray-600 font-semibold">Prize: 10,000</p>
        <p class="mt-2 text-sm text-gray-500">00d 00h 43m 51s</p>
      </div>

      <!-- Third Place (Bronze) -->
      <div class="bg-gradient-to-br from-[#8C4A2B] via-[#A65E2D] to-[#D69A6D] rounded-lg p-6 text-center shadow-md flex flex-col items-center justify-start border border-[#7C4D2A]">
        <div class="leaderboard-rank">3rd Place</div> <!-- Keterangan peringkat -->
        <div class="w-16 h-16 mx-auto mb-4">
          <img src="<?= env("BASEURL") ?>../public/img/person1.png" alt="Avatar 3" class="rounded-full border-4 border-white-600" />
        </div>
        <h2 class="text-xl font-semibold text-gray-800">Ultralex</h2>
        <p class="text-amber-600 font-medium mt-2">Earn 250 points</p>
        <p class="mt-2 text-sm text-gray-600">Prize: 2,500</p>
      </div>
    </div>

    <!-- Lower Leaderboard Section -->
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
    </div>
  </div>
</div>

<!-- File: contact-profile-polinema.html -->
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Profile POLINEMA</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <!-- Navbar -->
  <nav class="bg-blue-800 text-white">
    <div class="max-w-7xl mx-auto px-4">
      <div class="flex justify-between items-center py-3">
        <div class="text-xl font-bold">POLINEMA</div>
        <ul class="flex space-x-6">
          <li>
            <a href="#contact" class="nav-link hover:text-gray-300">Contact</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Container Utama -->
  <div id="contact" class="max-w-4xl mx-auto mt-10 p-6 bg-white rounded-lg shadow-lg">
    <!-- Bagian Header -->
    <div class="flex items-center justify-center">
      <img src="../public/img/Logo-Polinema.png" 
           alt="Logo POLINEMA" 
           class="w-28 h-28 object-cover rounded-full border-4 border-blue-500">
    </div>
    <h1 class="text-center text-3xl font-semibold text-blue-800 mt-4">Politeknik Negeri Malang</h1>
    <p class="text-center text-gray-600 mt-2">Teknologi, Integritas, dan Kreativitas</p>

    <!-- Informasi Kontak -->
    <div class="mt-6">
      <h2 class="text-xl font-semibold text-gray-700 mb-4">Kontak Kami</h2>
      <ul class="space-y-3 text-gray-600">
        <li class="flex items-center">
          <span class="w-6 h-6 inline-block mr-2 text-blue-500">
            📍
          </span>
          <span>
            Jl. Soekarno Hatta No. 9, Malang, Jawa Timur, Indonesia
          </span>
        </li>
        <li class="flex items-center">
          <span class="w-6 h-6 inline-block mr-2 text-blue-500">
            ☎️
          </span>
          <span>
            (0341) 404424, 404425
          </span>
        </li>
        <li class="flex items-center">
          <span class="w-6 h-6 inline-block mr-2 text-blue-500">
            ✉️
          </span>
          <span>
            info@polinema.ac.id
          </span>
        </li>
        <li class="flex items-center">
          <span class="w-6 h-6 inline-block mr-2 text-blue-500">
            🌐
          </span>
          <a href="https://www.polinema.ac.id" 
             class="text-blue-600 hover:underline">
            www.polinema.ac.id
          </a>
        </li>
      </ul>
    </div>

    <!-- Media Sosial -->
    <div class="mt-6">
      <h2 class="text-xl font-semibold text-gray-700 mb-4">Ikuti Kami</h2>
      <div class="flex space-x-6 justify-center">
        <!-- Facebook -->
        <a href="https://facebook.com/polinema" 
           target="_blank" 
           class="text-blue-700 hover:text-blue-900">
          <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M22 12a10 10 0 10-11.625 9.875v-6.996h-2.5v-2.879h2.5V9.399c0-2.475 1.49-3.847 3.735-3.847 1.083 0 2.217.193 2.217.193v2.438h-1.248c-1.23 0-1.615.766-1.615 1.55v1.86h2.75l-.44 2.879h-2.31V21.875A10 10 0 0022 12z" />
          </svg>
        </a>
        <!-- Instagram -->
        <a href="https://instagram.com/polinema" 
           target="_blank" 
           class="text-pink-600 hover:text-pink-800">
          <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M7.75 2a5.75 5.75 0 00-5.75 5.75v8.5A5.75 5.75 0 007.75 22h8.5A5.75 5.75 0 0022 16.25v-8.5A5.75 5.75 0 0016.25 2h-8.5zM12 7a5 5 0 110 10 5 5 0 010-10zm7.25-2.5a1.25 1.25 0 110 2.5 1.25 1.25 0 010-2.5z" />
          </svg>
        </a>
        <!-- YouTube -->
        <a href="https://youtube.com/polinema" 
           target="_blank" 
           class="text-red-600 hover:text-red-800">
          <svg class="w-8 h-8" fill="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path d="M19.615 3.183A2.958 2.958 0 0119.823 3H4.177a2.958 2.958 0 01-.208.183C3.401 3.465 3 4.186 3 5.166v13.668c0 .98.401 1.701.969 1.983.147.074.318.133.508.183a2.958 2.958 0 011.73 0c.19-.05.361-.109.508-.183C20.599 20.535 21 19.814 21 18.834V5.166c0-.98-.401-1.701-.969-1.983zm-9.615 4.93l5.917 3.887-5.917 3.887V8.113z" />
          </svg>
        </a>
      </div>
    </div>
  </div>

</body>
</html>
