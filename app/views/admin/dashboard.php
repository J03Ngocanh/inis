<!-- app/views/admin/dashboard.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <style>
        .container {
            max-width: 1200px;
            margin: 80px auto;
            padding: 20px;
        }
        .filter-section {
            margin-bottom: 20px;
        }
        .chart-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
        }
        .chart-box {
            width: 48%;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        select {
            padding: 8px;
            margin: 0 10px;
        }
        .filter-group {
            margin-bottom: 10px;
        }

        .filter-group label {
            margin-right: 10px;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="chart-container">
        <div class="chart-box">
            <div class="filter-group">
                <label for="yearFilter">Lọc doanh thu theo năm:</label>
                <select id="yearFilter">
                    <?php
                    $currentYear = isset($currentYear) ? $currentYear : date('Y');
                    for ($i = 2020; $i <= date('Y'); $i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo $i == $currentYear ? 'selected' : ''; ?>>
                            <?php echo $i; ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
            <h3>Doanh Thu Theo Tháng</h3>
            <canvas id="revenueChart"></canvas>
        </div>

        <div class="chart-box">
            <div class="filter-group">
                <label for="monthFilter">Lọc sản phẩm theo tháng:</label>
                <select id="monthFilter">
                    <?php
                    $currentMonth = isset($currentMonth) ? $currentMonth : date('m');
                    for ($i = 1; $i <= 12; $i++): ?>
                        <option value="<?php echo $i; ?>" <?php echo $i == $currentMonth ? 'selected' : ''; ?>>
                            <?php echo "Tháng $i"; ?>
                        </option>
                    <?php endfor; ?>
                </select>
            </div>
            <h3>Top Sản Phẩm Bán Chạy</h3>
            <canvas id="productChart"></canvas>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#yearFilter').trigger('change');
        $('#monthFilter').trigger('change');
    });
    // Biểu đồ doanh thu
    const revenueChart = new Chart(document.getElementById('revenueChart'), {
        type: 'bar',
        data: {
            labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
                'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
            datasets: [{
                label: 'Doanh Thu (triệu VNĐ)',
                data: <?php echo json_encode(array_values($doanhthu ?? array_fill(1, 12, 0))); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Biểu đồ top sản phẩm
    const productChart = new Chart(document.getElementById('productChart'), {
        type: 'pie',
        data: {
            labels: <?php echo json_encode($topsp['labels'] ?? []); ?>,
            datasets: [{
                data: <?php echo json_encode($topsp['data'] ?? []); ?>,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.6)',
                    'rgba(54, 162, 235, 0.6)',
                    'rgba(255, 206, 86, 0.6)',
                    'rgba(75, 192, 192, 0.6)',
                    'rgba(153, 102, 255, 0.6)'
                ]
            }]
        }
    });
    // Ajax cho doanh thu
    $('#yearFilter').change(function() {
        $.ajax({
            url: '/inis/admin/getDoanhThuTheoNamJSON',
            method: 'POST',
            data: { year: $(this).val() },
            success: function(response) {
                try {
                    const data = response
                    if (data && Array.isArray(data.data)) {
                        revenueChart.data.datasets[0].data = data.data;
                        revenueChart.update();
                    } else {
                        console.error('Dữ liệu doanh thu không hợp lệ:', data);
                    }
                } catch (e) {
                    console.error('Lỗi parse JSON doanh thu:', e);
                }
            },
            error: function(xhr, status, error) {
                console.error('Lỗi khi lấy dữ liệu doanh thu:', error);
            }
        });
    });

    // Ajax cho top sản phẩm
    $('#monthFilter').change(function() {
        $.ajax({
            url: '/inis/admin/getTopSanPhamJSON',
            method: 'POST',
            data: {
                month: $(this).val(),
                year: $('#yearFilter').val()
            },
            success: function(response) {
                try {
                    const data = response;
                    if (data && Array.isArray(data.labels) && Array.isArray(data.data)) {
                        productChart.data.labels = data.labels;
                        productChart.data.datasets[0].data = data.data;
                        productChart.update();
                    } else {
                        console.error('Dữ liệu top sản phẩm không hợp lệ:', data);
                    }
                } catch (e) {
                    console.error('Lỗi parse JSON top sản phẩm:', e);
                }
            },
            error: function(xhr, status, error) {
                console.error('Lỗi khi lấy dữ liệu top sản phẩm:', error);
            }
        });
    });
</script>
</body>
</html>