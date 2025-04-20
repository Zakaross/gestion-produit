@extends('layouts.app')

@section('content')
<div class="p-6">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Statistiques des Produits</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

        <!-- Bar Chart -->
        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-lg font-semibold mb-2">Produits par catégorie</h3>
            <canvas id="barChart"></canvas>
        </div>

        <!-- Doughnut Chart -->
        <div class="bg-white p-4 rounded shadow">
            <h3 class="text-lg font-semibold mb-2">Répartition du poids par catégorie</h3>
            <canvas id="doughnutChart"></canvas>
        </div>

        <!-- Line Chart -->
        <div class="bg-white p-4 rounded shadow md:col-span-2">
            <h3 class="text-lg font-semibold mb-2">Prix moyen par catégorie</h3>
            <canvas id="lineChart"></canvas>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const labels = @json($labels);
    const quantites = @json($quantites->values());
    const poids = @json($poids->values());
    const prixMoyen = @json($prixMoyen->values());

    // Bar Chart
    new Chart(document.getElementById('barChart'), {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Nombre de produits',
                data: quantites,
                backgroundColor: 'rgba(59, 130, 246, 0.6)',
                borderColor: 'rgba(59, 130, 246, 1)',
                borderWidth: 1,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Doughnut Chart
    new Chart(document.getElementById('doughnutChart'), {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                label: 'Poids total',
                data: poids,
                backgroundColor: [
                    '#60a5fa', '#fbbf24', '#34d399', '#f87171', '#a78bfa'
                ]
            }]
        },
        options: { responsive: true }
    });

    // Line Chart
    new Chart(document.getElementById('lineChart'), {
        type: 'line',
        data: {
            labels: labels,
            datasets: [{
                label: 'Prix moyen',
                data: prixMoyen,
                fill: false,
                borderColor: '#10b981',
                tension: 0.3
            }]
        },
        options: { responsive: true }
    });
</script>
@endsection
