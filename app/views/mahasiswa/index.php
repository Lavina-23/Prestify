<?php 

?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="grid h-full md:h-screen w-full p-10 pr-96">
  <div class="grid md:flex items-center justify-between h-24">
    <div>
      <h1 class="text-5xl font-bold text-gray-900">Halo <?= $data['nama'] ?> !</h1>
      <p class="text-sm font-normal text-gray-500 mt-1">Sudahkah Anda sholat ?</p>
    </div>
  </div>

  <hr class="my-5">

  <!-- Dropdown for Month Selection -->
  <div class="mt-5">
    <label for="monthSelect" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Bulan:</label>
    <select id="monthSelect" class="block p-2 w-1/2 text-sm text-gray-900 bg-white border border-gray-300 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
      <option value="all">Semua Bulan</option>
      <option value="1">Januari</option>
      <option value="2">Februari</option>
      <option value="3">Maret</option>
      <option value="4">April</option>
      <option value="5">Mei</option>
      <option value="6">Juni</option>
      <option value="7">Juli</option>
      <option value="8">Agustus</option>
      <option value="9">September</option>
      <option value="10">Oktober</option>
      <option value="11">November</option>
      <option value="12">Desember</option>
    </select>
  </div>

  <!-- Chart -->
  <div class="mt-10">
    <canvas id="myChart" width="400" height="200"></canvas>
  </div>
</div>

<script>

  // Data prestasi simulasi per bulan
  const monthlyData = {
    1: [5, 10, 15, 20, 25, 30, 35],  // Januari
    2: [10, 12, 8, 16, 20, 24, 18],  // Februari
    3: [20, 22, 24, 18, 16, 14, 12], // Maret
    4: [8, 12, 20, 15, 22, 18, 25],  // April
    5: [30, 25, 20, 15, 10, 5, 8],   // Mei
    6: [14, 18, 20, 22, 16, 12, 10], // Juni
    7: [24, 20, 18, 12, 10, 8, 6],   // Juli
    8: [10, 14, 18, 20, 25, 30, 35], // Agustus
    9: [5, 10, 12, 16, 20, 18, 14],  // September
    10: [25, 22, 20, 18, 15, 12, 10],// Oktober
    11: [10, 12, 8, 6, 5, 8, 10],    // November
    12: [30, 25, 20, 15, 10, 5, 8],  // Desember
    all: [12, 15, 18, 20, 25, 22, 30] // Rata-rata 1 tahun
  };

  // Penentuan jumlah minggu berdasarkan bulan
  const monthWeeks = {
    1: 5,   // Januari
    2: 4,   // Februari
    3: 5,   // Maret
    4: 5,   // April
    5: 5,   // Mei
    6: 5,   // Juni
    7: 5,   // Juli
    8: 5,   // Agustus
    9: 4,   // September
    10: 5,  // Oktober
    11: 4,  // November
    12: 5,  // Desember
    all: 5   // Untuk seluruh tahun
  };

  // Initial Chart Setup
  const ctx = document.getElementById('myChart').getContext('2d');
  const myChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['Minggu 1', 'Minggu 2', 'Minggu 3', 'Minggu 4', 'Minggu 5'], // Default untuk 5 minggu
      datasets: [{
        label: 'Prestasi Mahasiswa',
        data: monthlyData.all, // Default ke seluruh tahun
        borderColor: 'rgba(75, 192, 192, 1)',
        backgroundColor: 'rgba(75, 192, 192, 0.2)',
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });

  // Update Chart on Month Selection
  document.getElementById('monthSelect').addEventListener('change', function () {
    const selectedMonth = this.value;
    if (selectedMonth === "all") {
      // Tampilkan data berdasarkan bulan
      const labels = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
      const data = Object.values(monthlyData).slice(0, 12); // Ambil data untuk setiap bulan

      myChart.data.labels = labels;
      myChart.data.datasets[0].data = data.map(month => month.reduce((sum, value) => sum + value, 0)); // Total setiap bulan
      myChart.update();
    } else {
      // Tampilkan data berdasarkan minggu
      const selectedData = monthlyData[selectedMonth] || monthlyData.all;
      const numberOfWeeks = monthWeeks[selectedMonth] || monthWeeks.all;

      myChart.data.labels = Array.from({ length: numberOfWeeks }, (_, i) => `Minggu ${i + 1}`);
      myChart.data.datasets[0].data = selectedData;
      myChart.update();
    }
  });
</script>
