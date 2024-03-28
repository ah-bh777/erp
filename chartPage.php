<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bar Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }
        #myChart {
            position: absolute;
            top: 0;
            right: 0;
            height: 30%;
        }
    </style>
</head>
<body>
    <div>
        <canvas id="myChart"></canvas>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const ctx = document.getElementById('myChart').getContext('2d');
            const data = {
                labels: ['A', 'B', 'C'],
                datasets: [
                    {
                        label: 'Dataset 1',
                        data: [1, 2, 3],
                        borderColor: '#36A2EB',
                        backgroundColor: '#9BD0F5',
                    },
                    {
                        label: 'Dataset 2',
                        data: [2, 3, 4],
                        borderColor: '#FF6384',
                        backgroundColor: '#FFB1C1',
                    }
                ]
            };

            new Chart(ctx, {
                type: 'bar',
                data: data,
                options: {
                    responsive: true, // Turning on responsive setting
                    layout: {
                        padding: 20 // Adjusting padding to manipulate the size
                    }
                }
            });
        });
    </script>
</body>
</html>
