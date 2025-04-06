<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Biểu đồ doanh thu</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Biểu đồ doanh thu</h2>

    <form id="filterForm">
        Từ ngày: <input type="date" name="fromDate" id="fromDate">
        Đến ngày: <input type="date" name="toDate" id="toDate">
        <button type="submit">Lọc</button>
    </form>

    <canvas id="revenueChart" width="600" height="300"></canvas>

    <script>
        let chart;

        function renderChart(labels, data) {
            const ctx = document.getElementById('revenueChart').getContext('2d');
            if (chart) chart.destroy();

            chart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Doanh thu',
                        data: data,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            title: { display: true, text: 'VNĐ' }
                        },
                        x: {
                            title: { display: true, text: 'Ngày' }
                        }
                    }
                }
            });
        }

        $('#filterForm').on('submit', function (e) {
            e.preventDefault();
            const fromDate = $('#fromDate').val();
            const toDate = $('#toDate').val();

            $.ajax({
                url: 'index.php?action=getRevenueData',
                type: 'POST',
                data: { fromDate: fromDate, toDate: toDate },
                dataType: 'json',
                success: function (response) {
                    if (response.error) {
                        alert(response.error);
                    } else {
                        const labels = response.map(item => item.period);
                        const revenues = response.map(item => parseFloat(item.revenue));
                        renderChart(labels, revenues);
                    }
                },
                error: function () {
                    alert('Đã xảy ra lỗi khi lấy dữ liệu.');
                }
            });
        });
    </script>
</body>
</html>
