$(document).ready(function () {
    let salesPurchasesBar = document.getElementById("salesPurchasesChart");
    let salesPurchasesChart = new Chart(salesPurchasesBar, {
        type: "bar",
        data: {
            labels: ["Senin", "Selasa", "Rabu", "Kamis", "Jumat"],
            datasets: [
                {
                    label: "Penjualan",
                    data: [120, 150, 180, 130, 160],
                    backgroundColor: ["#F59E0B"],
                    borderColor: ["#F59E0B"],
                    borderWidth: 1,
                },
                {
                    label: "Pembelian",
                    data: [100, 130, 110, 140, 120],
                    backgroundColor: ["#0284C7"],
                    borderColor: ["#0284C7"],
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

    let overviewChart = document.getElementById("currentMonthChart");
    let currentMonthChart = new Chart(overviewChart, {
        type: "doughnut",
        data: {
            labels: ["Penjualan", "Pembelian", "Pengeluaran"],
            datasets: [
                {
                    data: [300, 200, 100],
                    backgroundColor: ["#F59E0B", "#0284C7", "#EF4444"],
                    hoverBackgroundColor: ["#F59E0B", "#0284C7", "#EF4444"],
                },
            ],
        },
    });

    let paymentChart = document.getElementById("paymentChart");
    let cashflowChart = new Chart(paymentChart, {
        type: "line",
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May"],
            datasets: [
                {
                    label: "Pembayaran Terkirim",
                    data: [500, 600, 550, 650, 700],
                    fill: false,
                    borderColor: "#EA580C",
                    tension: 0,
                },
                {
                    label: "Pembayaran Diterima",
                    data: [450, 500, 480, 600, 650],
                    fill: false,
                    borderColor: "#2563EB",
                    tension: 0,
                },
            ],
        },
    });
});

