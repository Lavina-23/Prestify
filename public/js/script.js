$(document).ready(function () {
  // dropdown live search nama mhs dan dospem
  $(document).on("keyup", ".searchNama", function () {
    var input = $(this);
    var nama = input.val();
    var parent = input.closest(".fieldNama");
    var dropdown = parent.find(".dropdownNama");
    var type = parent.data("type");

    if (nama === "") {
      dropdown.html("").hide();
    } else {
      $.ajax({
        type: "POST",
        url: "index.php",
        data: {
          url:
            type === "mahasiswa"
              ? "Prestasi/searchMahasiswa"
              : "Prestasi/searchDospem",
          searchNama: nama,
        },
        success: function (data) {
          dropdown.html(data).show();
        },
      });
    }
  });

  $(document).on("click", ".dropdownNama li", function () {
    var listNama = $(this);
    var parent = listNama.closest(".fieldNama");
    var input = parent.find("input.searchNama");

    input.val(listNama.text().trim());
    parent.find(".dropdownNama").hide();
  });

  // handle tambah input field
  $(".btnAddInput").on("click", function () {
    let containerId = $(this).data("target");
    let newInput = $("#" + containerId)
      .find(".inputGroup")
      .last()
      .clone();

    newInput.find("input").val("");
    newInput.find("select").prop("selectedIndex", 0);

    newInput.find(".btnRemove").on("click", function () {
      $(this).closest(".inputGroup").remove();
    });

    newInput.show();
    $("#" + containerId).append(newInput);
  });

  // handle value kategori prestasi
  $(".btnKategori").click(function () {
    const jenis = $(this).data("jenis");
    setKategori(jenis);
  });

  // handle nav styles
  const $navLinks = $(".no-underline");

  $navLinks.on("click", function () {
    $navLinks.removeClass("bg-yellow-100 text-yellow-500");
    $(this).addClass("bg-yellow-100 text-yellow-500");
  });
});

// handle style kategori prestasi
function setKategori(jenis) {
  $("#kategori_id").val(jenis);

  $(".btnKategori")
    .removeClass("bg-gray-900 text-white")
    .addClass("text-gray-900 bg-transparent");

  $(`.btnKategori[data-jenis='${jenis}']`)
    .removeClass("text-gray-900 bg-transparent")
    .addClass("bg-gray-900 text-white");
}

// dropdown detail prestasi
function toggleDetailPrestasi(id) {
  const currentDetail = $(`#dropdown-detail-${id}`);
  const isCurrentlyVisible = !currentDetail.hasClass("hidden");

  $('[id^="dropdown-detail-"]').addClass("hidden");

  if (!isCurrentlyVisible) {
    currentDetail.removeClass("hidden");
  }
}

// chart mahasiswa
document.addEventListener("DOMContentLoaded", () => {
  fetch("http://localhost/Prestify/public/prestasi/countPrestasiMapres")
    .then((response) => response.json())
    .then((data) => {
      const chartData = Array(12).fill(0);

      data.forEach((item) => {
        const indexBulan = parseInt(item.bulanPrestasi) - 1;
        chartData[indexBulan] = parseInt(item.totalPrestasi);
      });

      const options = {
        chart: {
          height: "100%",
          maxWidth: "100%",
          type: "area",
          fontFamily: "Inter, sans-serif",
          dropShadow: {
            enabled: false,
          },
          toolbar: {
            show: false,
          },
        },
        tooltip: {
          enabled: true,
          x: {
            show: false,
          },
        },
        fill: {
          type: "gradient",
          gradient: {
            opacityFrom: 0.55,
            opacityTo: 0,
            shade: "#1C64F2",
            gradientToColors: ["#1C64F2"],
          },
        },
        dataLabels: {
          enabled: false,
        },
        stroke: {
          width: 6,
        },
        grid: {
          show: false,
          strokeDashArray: 4,
          padding: {
            left: 2,
            right: 2,
            top: 0,
          },
        },
        series: [
          {
            name: "Jumlah Prestasi",
            data: chartData,
            color: "#1A56DB",
          },
        ],
        xaxis: {
          categories: [
            "Januari",
            "Februari",
            "Maret",
            "April",
            "Mei",
            "Juni",
            "Juli",
            "Agustus",
            "September",
            "Oktober",
            "November",
            "Desember",
          ],
          labels: {
            show: true,
          },
          axisBorder: {
            show: true,
          },
          axisTicks: {
            show: true,
          },
        },
        yaxis: {
          show: true,
          labels: {
            formatter: (value) => parseInt(value),
          },
        },
      };

      if (
        document.getElementById("area-chart") &&
        typeof ApexCharts !== "undefined"
      ) {
        const chart = new ApexCharts(
          document.getElementById("area-chart"),
          options
        );
        chart.render();
      }
    });
});

// chart admin - super
document.addEventListener("DOMContentLoaded", () => {
  fetch("http://localhost/Prestify/public/prestasi/countPrestasi")
    .then((response) => response.json())
    .then((data) => {
      const chartData = data.map((i) => ({
        x: i.jurusan,
        y: parseInt(i.totalPrestasi),
      }));

      const options2 = {
        colors: ["#1A56DB", "#FDBA8C"],
        series: [
          {
            name: "Organic",
            color: "#f59e0b",
            data: chartData,
          },
        ],
        chart: {
          type: "bar",
          height: "320px",
          fontFamily: "Inter, sans-serif",
          toolbar: {
            show: false,
          },
        },
        plotOptions: {
          bar: {
            horizontal: false,
            columnWidth: "70%",
            borderRadiusApplication: "end",
            borderRadius: 8,
          },
        },
        tooltip: {
          shared: true,
          intersect: false,
          style: {
            fontFamily: "Inter, sans-serif",
          },
        },
        states: {
          hover: {
            filter: {
              type: "darken",
              value: 1,
            },
          },
        },
        stroke: {
          show: true,
          width: 0,
          colors: ["transparent"],
        },
        grid: {
          show: false,
          strokeDashArray: 4,
          padding: {
            left: 2,
            right: 2,
            top: -14,
          },
        },
        dataLabels: {
          enabled: false,
        },
        legend: {
          show: false,
        },
        xaxis: {
          floating: false,
          labels: {
            show: true,
            style: {
              fontFamily: "Inter, sans-serif",
              cssClass: "text-xs font-normal fill-gray-500 dark:fill-gray-400",
            },
          },
          axisBorder: {
            show: false,
          },
          axisTicks: {
            show: false,
          },
        },
        yaxis: {
          show: false,
        },
        fill: {
          opacity: 1,
        },
      };

      if (
        document.getElementById("column-chart") &&
        typeof ApexCharts !== "undefined"
      ) {
        const chart = new ApexCharts(
          document.getElementById("column-chart"),
          options2
        );
        chart.render();
      }
    });
});
