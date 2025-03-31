<x-dashboard>
    <x-dashboard-sidebar >
<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- En-tête avec bouton de création -->
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Mes projets</h1>
                <p class="mt-1 text-sm text-gray-500">Gérez tous vos projets de financement participatif</p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('projects.create') }}" class="inline-flex items-center px-4 py-2 bg-lime-300 hover:bg-lime-400 text-fg font-medium rounded-full transition-colors shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Créer un projet
                </a>
            </div>
        </div>

        @include('partials.filters')
        <!-- Affichage des projets -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            @include('projects.partials.projects-grid', ['projects' => $projects])
        </div>

        <!-- Pagination -->
        <div class="mt-6">
            {{ $projects->links() }}
        </div>
    </div>
</div>
</x-dashboard-sidebar>
</x-dashboard>

<script>
    
    document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');
    const statusFilter = document.getElementById('status-filter');
    const categoryFilter = document.getElementById('category-filter');
    const sortBy = document.getElementById('sort-by');
    const projectsContainer = document.querySelector('.grid'); // Sélecteur de votre grille de projets
    const paginationContainer = document.querySelector('.mt-6'); // Sélecteur de votre pagination
    
    let timer;
    const debounceTime = 500;

    function loadProjects() {
        const filters = {
            search: searchInput.value,
            status: statusFilter.value,
            category: categoryFilter.value,
            sort: sortBy.value
        };

        // Construire les paramètres URL
        const params = new URLSearchParams();
        Object.entries(filters).forEach(([key, value]) => {
            if (value) params.append(key, value);
        });

        // Mettre à jour l'URL
        const newUrl = `${window.location.pathname}?${params.toString()}`;
        window.history.pushState({}, '', newUrl);

        // Envoyer la requête AJAX
        fetch(`${window.location.pathname}?${params.toString()}&ajax=1`, {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(response => {
            if (!response.ok) throw new Error('Network response was not ok');
            return response.json();
        })
        .then(data => {
            if (projectsContainer) {
                projectsContainer.innerHTML = data.html;
            }
            if (paginationContainer) {
                paginationContainer.innerHTML = data.pagination;
            }
        })
        .catch(error => {
            console.error('Error loading projects:', error);
        });
    }

    // Écouteurs d'événements
    [searchInput, statusFilter, categoryFilter, sortBy].forEach(element => {
        element?.addEventListener('change', function() {
            clearTimeout(timer);
            timer = setTimeout(loadProjects, debounceTime);
        });
    });

    searchInput?.addEventListener('input', function() {
        clearTimeout(timer);
        timer = setTimeout(loadProjects, debounceTime);
    });
});
</script>