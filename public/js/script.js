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
    var input = parent.find(".searchNama");
    var dropdown = parent.find(".dropdownNama");

    input.val(listNama.text());
    dropdown.hide();
  });

  // handle value kategori prestasi
  $(".btnKategori").click(function () {
    const jenis = $(this).data("jenis");
    setKategori(jenis);
  });

  // handle tambah input field
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

const options2 = {
  colors: ["#1A56DB", "#FDBA8C"],
  series: [
    {
      name: "Organic",
      color: "#1A56DB",
      data: [
        {
          x: "Mon",
          y: 231,
        },
        {
          x: "Tue",
          y: 122,
        },
        {
          x: "Wed",
          y: 63,
        },
        {
          x: "Thu",
          y: 421,
        },
        {
          x: "Fri",
          y: 122,
        },
        {
          x: "Sat",
          y: 323,
        },
        {
          x: "Sun",
          y: 111,
        },
      ],
    },
    {
      name: "Social media",
      color: "#FDBA8C",
      data: [
        {
          x: "Mon",
          y: 232,
        },
        {
          x: "Tue",
          y: 113,
        },
        {
          x: "Wed",
          y: 341,
        },
        {
          x: "Thu",
          y: 224,
        },
        {
          x: "Fri",
          y: 522,
        },
        {
          x: "Sat",
          y: 411,
        },
        {
          x: "Sun",
          y: 243,
        },
      ],
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
