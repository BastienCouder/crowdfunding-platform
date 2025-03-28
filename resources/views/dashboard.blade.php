<x-app-layout>
<x-dashboard-sidebar>
<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Cartes de statistiques -->
        @include('partials.stats-cards')

        <!-- Graphiques -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
            <!-- Graphique 1: Évolution des collectes -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Évolution des collectes</h3>
                <div class="h-64">
                    <canvas id="collectionsChart"></canvas>
                </div>
            </div>

            <!-- Graphique 2: Répartition par catégorie -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Répartition par catégorie</h3>
                <div class="h-64">
                    <canvas id="categoriesChart"></canvas>
                </div>
            </div>
        </div>

        @include('partials.filters')
        <!-- Liste des projets -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900">Mes projets</h3>
            </div>

            <div id="projects-table">
                @include('partials.projects-table')
            </div>
        </div>
    </div>
</div>

</x-dashboard-sidebar>
</x-app-layout>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialisation des graphiques
    const collectionsCtx = document.getElementById('collectionsChart').getContext('2d');
    const categoriesCtx = document.getElementById('categoriesChart').getContext('2d');
    
    const collectionsChart = new Chart(collectionsCtx, {
        type: 'line',
        data: {
            labels: @json($monthlyLabels),
            datasets: [{
                label: 'Montant collecté (€)',
                data: @json($monthlyAmounts),
                backgroundColor: 'rgba(101, 163, 13, 0.2)',
                borderColor: 'rgba(101, 163, 13, 1)',
                borderWidth: 2,
                tension: 0.3,
                fill: true
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    const categoriesChart = new Chart(categoriesCtx, {
        type: 'doughnut',
        data: {
            labels: @json($categoryNames),
            datasets: [{
                data: @json($categoryAmounts),
                backgroundColor: [
                    'rgba(101, 163, 13, 0.7)',
                    'rgba(234, 179, 8, 0.7)',
                    'rgba(59, 130, 246, 0.7)',
                    'rgba(244, 63, 94, 0.7)',
                    'rgba(139, 92, 246, 0.7)',
                    'rgba(20, 184, 166, 0.7)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right'
                }
            }
        }
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
 
    const searchInput = document.getElementById('search');
    const statusFilter = document.getElementById('status-filter');
    const categoryFilter = document.getElementById('category-filter');
    const sortBy = document.getElementById('sort-by');
    
    let timer;
    const debounceTime = 500;

    function getCurrentFilters() {
        return {
            search: searchInput.value,
            status: statusFilter.value,
            category: categoryFilter.value,
            sort: sortBy.value
        };
    }

    function loadProjects() {
    const filters = {
        search: document.getElementById('search').value,
        status: document.getElementById('status-filter').value,
        category: document.getElementById('category-filter').value,
        sort: document.getElementById('sort-by').value
    };

    // Construire les paramètres URL
    const params = new URLSearchParams();
    Object.entries(filters).forEach(([key, value]) => {
        if (value) params.append(key, value);
    });

    // Mettre à jour l'URL dans la barre d'adresse
    const newUrl = `${window.location.pathname}?${params.toString()}`;
    window.history.pushState({}, '', newUrl);

    // Envoyer la requête AJAX
    fetch(`/dashboard?${params.toString()}&ajax=1`, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        // Mise à jour de la table des projets
        document.getElementById('projects-table').innerHTML = data.table;
        
        // Mise à jour des statistiques
        document.querySelector('.stats-cards-container').innerHTML = data.stats;
        
        // Mise à jour des graphiques
        collectionsChart.data.labels = data.monthlyLabels;
        collectionsChart.data.datasets[0].data = data.monthlyAmounts;
        collectionsChart.update();
        
        categoriesChart.data.labels = data.categoryNames;
        categoriesChart.data.datasets[0].data = data.categoryAmounts;
        categoriesChart.update();
    })
    .catch(error => {
        console.error('Error loading projects:', error);
    });
}
    // Écouteurs d'événements
    [searchInput, statusFilter, categoryFilter, sortBy].forEach(element => {
    element.addEventListener('change', function() {
        console.log(`Filtre ${this.id} changé:`, this.value);
        clearTimeout(timer);
        timer = setTimeout(loadProjects, debounceTime);
    });
});

// Pour le champ de recherche
searchInput.addEventListener('input', function() {
    console.log('Recherche:', this.value);
    clearTimeout(timer);
    timer = setTimeout(loadProjects, debounceTime);
});
});
</script>
