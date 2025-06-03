// Grouped Bar Chart (Lost/Found by Category)
const rawData = JSON.parse(document.getElementById('barChart').dataset.typeCategoryData);

const grouped = {};
rawData.forEach(item => {
    const category = item.category || 'Uncategorized';
    const type = item.report_type;

    if (!grouped[category]) grouped[category] = {
        Lost: 0,
        Found: 0
    };
    grouped[category][type] = parseInt(item.total);
});

const categories = Object.keys(grouped);
const lostCounts = categories.map(cat => grouped[cat]['Lost'] || 0);
const foundCounts = categories.map(cat => grouped[cat]['Found'] || 0);

new Chart(document.getElementById('barChart'), {
    type: 'bar',
    data: {
        labels: categories,
        datasets: [{
                label: 'Lost',
                data: lostCounts,
                backgroundColor: '#dc3545'
            },
            {
                label: 'Found',
                data: foundCounts,
                backgroundColor: '#28a745'
            }
        ]
    },
    options: {
        indexAxis: 'y',
        responsive: true,
        plugins: {
            legend: {
                position: 'top'
            }
        },
        scales: {
            x: {
                beginAtZero: true
            },
            y: {
                beginAtZero: true
            }
        }
    }
});

// Line Chart (Reports by Month)
const monthlyData = JSON.parse(document.getElementById('lineChart').dataset.monthlyReports);
const months = monthlyData.map(d => d.month);
const counts = monthlyData.map(d => parseInt(d.count));

new Chart(document.getElementById('lineChart'), {
    type: 'line',
    data: {
        labels: months,
        datasets: [{
            label: 'Reports',
            data: counts,
            fill: false,
            borderColor: '#17a2b8',
            tension: 0.2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Reports Count'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Month'
                }
            }
        }
    }
});

// Donut Chart (Report Status Overview)
const statusData = JSON.parse(document.getElementById('donutChart').dataset.reportStatusData);
const statusLabels = statusData.map(item => item.status);
const statusCounts = statusData.map(item => parseInt(item.total));
const statusColors = ['#ffc107', '#17a2b8', '#6c757d']; // Customize colors if needed

new Chart(document.getElementById('donutChart'), {
    type: 'doughnut',
    data: {
        labels: statusLabels,
        datasets: [{
            data: statusCounts,
            backgroundColor: statusColors.slice(0, statusLabels.length)
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'bottom'
            },
            tooltip: {
                enabled: true
            }
        }
    }
});
