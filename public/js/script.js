$(document).ready(function () {
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
          console.log(data);
          dropdown.html(data).show();
        },
      });
    }
  });

  $(".btnKategori").click(function () {
    const jenis = $(this).data("jenis");
    setKategori(jenis);
  });

  $(document).on("click", ".dropdownNama li", function () {
    var listNama = $(this);
    var parent = listNama.closest(".fieldNama");
    var input = parent.find(".searchNama");
    var dropdown = parent.find(".dropdownNama");

    input.val(listNama.text());
    dropdown.hide();
  });

  $("#btnAddInput").on("click", function () {
    let newInput = $(".inputGroup").first().clone();

    newInput.find("input").val("");
    newInput.find("select").prop("selectedIndex", 0);

    newInput.find(".btnRemove").on("click", function () {
      $(this).closest(".inputGroup").remove();
    });

    $("#containerMD").append(newInput);
  });
});

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

// chart
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
      name: "New users",
      data: [6500, 6418, 6456, 6526, 6356, 6456],
      color: "#1A56DB",
    },
  ],
  xaxis: {
    categories: [
      "01 February",
      "02 February",
      "03 February",
      "04 February",
      "05 February",
      "06 February",
      "07 February",
    ],
    labels: {
      show: false,
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
};

if (
  document.getElementById("area-chart") &&
  typeof ApexCharts !== "undefined"
) {
  const chart = new ApexCharts(document.getElementById("area-chart"), options);
  chart.render();
}
