<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f4f6f9;
            display: flex;
      
         
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            color: white;
            position: fixed;
            height: 100%;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar h2 {
            font-size: 24px;
            text-align: center;
            color: #1abc9c;
            margin-bottom: 20px;
        }

        .sidebar nav ul {
            list-style: none;
        }

        .sidebar nav ul li a {
            display: block;
            padding: 12px 20px;
            color: #ecf0f1;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .sidebar nav ul li a:hover,
        .sidebar nav ul li a.active {
            background: #1abc9c;
            border-radius: 5px;
        }

   
 
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        /* Filter Section */
        .filter {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 20px;
            gap: 10px;
        }

        .filter select,
        .filter button {
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid #ccc;
            transition: all 0.3s ease;
        }

        .filter button {
            background-color: #1abc9c;
            color: white;
            cursor: pointer;
        }

        .filter button:hover {
            background-color: #16a085;
        }

        /* Chart Containers */
        .chart-container {
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            height: 400px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        canvas {
            display: block;
            width: 100%;
            height: 100%;
        }

        .no-data {
            text-align: center;
            color: #e74c3c;
            font-size: 18px;
        }
        /* Notes List */
        .notes {
            width: 250px;
            margin-left: 20px;
            border-left: 2px solid #1abc9c;
            padding-left: 10px;
        }

        .notes h4 {
            margin-bottom: 10px;
            font-size: 18px;
            color: #2c3e50;
        }

        .notes ul {
            list-style: none;
            padding: 0;
        }

        .notes ul li {
            margin: 5px 0;
            padding: 8px;
            background: #f9f9f9;
            border-radius: 5px;
            color: #333;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
  

        <!-- Main Content -->
      
    <script>
    // Dữ liệu từ PHP (sanphamsaphet)
    const sanPhamSapHetData = {
        labels: <?= json_encode(array_column($sanphamsaphet, 'masanpham')) ?>, // Tên sản phẩm
        datasets: [{
            data: <?= json_encode(array_column($sanphamsaphet, 'soluong')) ?>,
            backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0'],
            hoverOffset: 4
        }]
        
    };
</script>
<main class="main-content">
  

        <div class="container">
            <h3 style="text-align: center;">Sản phẩm sắp hết</h3>
            <div class="chart-container">
                <canvas id="sanPhamSapHetChart"></canvas>
            </div>
            <!-- <div class="notes">
                <h4>Mã/Tên Sản Phẩm</h4>
                <ul id="notesList">
                    <li>Mã: SP01 - Tên: Sản phẩm A</li>
                    <li>Mã: SP02 - Tên: Sản phẩm B</li>
                    <li>Mã: SP03 - Tên: Sản phẩm C</li>
                    <li>Mã: SP04 - Tên: Sản phẩm D</li>
                </ul>
            </div> -->
        </div>

        <div class="container">
            <h3 style="text-align: center;">Dashboard Doanh Thu</h3>
            <div class="filter">
                <form id="filterForm">
                    <select id="monthFilter" name="month">
                    <option value="">-- Chọn tháng --</option>
                            <option value="2024-01">Tháng 1</option>
                            <option value="2024-02">Tháng 2</option>
                            <option value="2024-03">Tháng 3</option>
                            <option value="2024-04">Tháng 4</option>
                            <option value="2024-05">Tháng 5</option>
                            <option value="2024-06">Tháng 6</option>
                            <option value="2024-07">Tháng 7</option>
                            <option value="2024-08">Tháng 8</option>
                            <option value="2024-09">Tháng 9</option>
                            <option value="2024-10">Tháng 10</option>
                            <option value="2024-11">Tháng 11</option>
                            <option value="2024-12">Tháng 12</option>
                    </select>
                    <button type="submit">Lọc</button>
                </form>
            </div>
            <div class="chart-container">
                <canvas id="doanhThuChart"></canvas>
            </div>
            <p class="no-data" style="display: none;">Không có dữ liệu để hiển thị.</p>
        </div>
    </main>




    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const chartContainer = document.getElementById('doanhThuChart');
            const noDataMessage = document.querySelector('.no-data');
            let myChart;

            function updateChart(data) {
                const labels = data.map(item => item.ngay);
                const revenueData = data.map(item => item.doanhthu);

                if (data.length === 0) {
                    chartContainer.style.display = 'none';
                    noDataMessage.style.display = 'block';
                    return;
                }

                chartContainer.style.display = 'block';
                noDataMessage.style.display = 'none';

                if (myChart) {
                    myChart.destroy();
                }

                const ctx = chartContainer.getContext('2d');
                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Doanh thu theo ngày',
                            data: revenueData,
                            backgroundColor: 'rgba(52, 152, 219, 0.7)',
                            borderColor: '#3498db',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                display: true
                            }
                        },
                        scales: {
                            x: {
                                title: {
                                    display: true,
                                    text: 'Ngày'
                                }
                            },
                            y: {
                                title: {
                                    display: true,
                                    text: 'Doanh thu (VNĐ)'
                                },
                                beginAtZero: true
                            }
                        }
                    }
                });
            }

            function fetchData(month) {
                const formData = new FormData();
                formData.append('month', month);

                fetch('/inis/admin/getDoanhThuJSON', {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.json())
                    .then(data => {
                        updateChart(data);
                    })
                    .catch(error => console.error('Error fetching data:', error));
            }

            fetchData('');

            document.getElementById('filterForm').addEventListener('submit', function (e) {
                e.preventDefault();
                const selectedMonth = document.getElementById('monthFilter').value;
                fetchData(selectedMonth);
            });
       // Biểu đồ sản phẩm sắp hết
       const sanPhamCtx = document.getElementById('sanPhamSapHetChart').getContext('2d');
const sanPhamSapHetChart = new Chart(sanPhamCtx, {
    type: 'pie',
    data: sanPhamSapHetData,
    options: {
        responsive: true,
        maintainAspectRatio: true, // Duy trì tỷ lệ
        plugins: {
            legend: {
                display: true,
                position: 'top',
            },
            tooltip: {
                callbacks: {
                    // Tùy chỉnh nội dung tooltip
                    label: function(context) {
                        const label = context.label || ''; // Lấy tên sản phẩm
                        const value = context.raw || 0; // Lấy số lượng sản phẩm
                        return `Mã: ${label} - Số lượng: ${value}`;
                    }
                }
            }
        },
    },
});

        });
    </script>
</body>
</html>
