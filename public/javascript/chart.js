document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById("myChart").getContext("2d");
    const myChart = new Chart(ctx, {
        type: "bar",
        data: {
            labels: ["Pegawai", "Jabatan"],
            datasets: [
                {
                    label: "Jumlah Data",
                    data: [pegawai, jabatan],
                    backgroundColor: [
                        "rgba(75, 192, 192, 0.2)",
                        "rgba(153, 102, 255, 0.2)",
                    ],
                    borderColor: [
                        "rgba(75, 192, 192, 1)",
                        "rgba(153, 102, 255, 1)",
                    ],
                    borderWidth: 1,
                },
            ],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                },
            },
        },
    });
});
