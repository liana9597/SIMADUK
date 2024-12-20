// my_chart.js
document.addEventListener('DOMContentLoaded', function () {
    const ctx1 = document.getElementById('myChart').getContext('2d');
    const ctx2 = document.getElementById('earning').getContext('2d');
    
    // First chart
    const myChart = new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: ['Pernikahan', 'Kelahiran', 'Kematian', 'Migrasi'],
            datasets: [{
                label: 'Daily Views',
                data: [12, 19, 3, 5],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            resposive: true,
        }
    });

    // Second chart
    const earningsChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June'],
            datasets: [{
                label: 'Migrasi',
                data: [300, 500, 400, 700, 600, 800],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2
            }]
        },
        options: {
            resposive: true,
        }
    });
});