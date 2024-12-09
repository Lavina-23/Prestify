const ctx = document.getElementById('chartMahasiswa').getContext('2d');

// Data Chart
const dataChart = {
  labels: ['Achievements', 'Volunteer', 'Users'],
  datasets: [
    {
      label: 'Statistik Mahasiswa',
      data: [10, 10, 32.4], // Ganti dengan data dinamis jika ada
      backgroundColor: [
        'rgba(54, 162, 235, 0.5)', // Biru untuk Achievements
        'rgba(255, 206, 86, 0.5)', // Kuning untuk Volunteer
        'rgba(75, 192, 192, 0.5)'  // Hijau untuk Users
      ],
      borderColor: [
        'rgba(54, 162, 235, 1)',
        'rgba(255, 206, 86, 1)',
        'rgba(75, 192, 192, 1)'
      ],
      borderWidth: 1
    }
  ]
};

// Konfigurasi Chart
const config = {
  type: 'bar', // Jenis chart (bar, line, pie, etc.)
  data: dataChart,
  options: {
    responsive: true,
    plugins: {
      legend: {
        position: 'top'
      }
    }
  }
};

// Render Chart
const chartMahasiswa = new Chart(ctx, config);
