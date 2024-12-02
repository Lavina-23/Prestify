function fill(value) {
  $("#searchMhs").val(value);
  $("#dropdownMhs").hide();
}

$(document).ready(function () {
  $("#searchMhs").keyup(function () {
    var namaMhs = $("#searchMhs").val();

    if (namaMhs == "") {
      $("#dropdownMhs").html("");
    } else {
      $.ajax({
        type: "POST",
        url: "index.php",
        data: {
          url: "Prestasi/searchMahasiswa",
          searchMhs: namaMhs,
        },
        success: function (data) {
          $("#dropdownMhs").html(data).show();
        },
      });
    }
  });
});

// dropdown detail prestasi
function toggleDetailPrestasi() {
  $(`#dropdown-detail`).toggleClass("hidden");
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

