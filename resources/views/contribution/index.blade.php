<x-app-layout>
    <x-dashboard-sidebar>
        <div class="py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- En-tête -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                    <div>
                <h1 class="text-2xl font-bold text-gray-900">Mes contributions</h1>
                <p class="mt-1 text-sm text-gray-500">Suivez toutes vos contributions aux projets</p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('projects.index') }}" class="inline-flex items-center px-4 py-2 bg-lime-500 hover:bg-lime-600 text-white font-medium rounded-full transition-colors shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                    </svg>
                    Découvrir des projets
                </a>
            </div>
        </div>

        <!-- Statistiques des contributions -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <!-- Total des contributions -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center">
                    <div class="bg-lime-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-sm font-medium text-gray-500">Total des contributions</h2>
                        <p class="text-2xl font-bold text-gray-900" data-stat="total-amount">{{ number_format($totalAmount ?? 0, 0, ',', ' ') }} €</p>
                    </div>
                </div>
            </div>

            <!-- Nombre de projets soutenus -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center">
                    <div class="bg-lime-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-sm font-medium text-gray-500">Projets soutenus</h2>
                        <p class="text-2xl font-bold text-gray-900" data-stat="supported-projects">{{ $supportedProjects ?? 0 }}</p>
                    </div>
                </div>
            </div>

            <!-- Contribution moyenne -->
            <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                <div class="flex items-center">
                    <div class="bg-lime-100 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-sm font-medium text-gray-500">Contribution moyenne</h2>
                        <p class="text-2xl font-bold text-gray-900" data-stat="average-amount">{{ number_format($averageAmount ?? 0, 0, ',', ' ') }} €</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filtres et recherche -->
        <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100 mb-8">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div class="flex-1">
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </div>
                        <input type="text" id="search" placeholder="Rechercher un projet..." class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500">
                    </div>
                </div>
                <div class="flex flex-wrap gap-2">
                    <select id="status-filter" class="w-auto pr-10 border border-gray-200 rounded-lg px-3 py-2 focus:ring-lime-500 focus:border-lime-500">
                        <option value="">Tous les statuts</option>
                        <option value="completed">Réussis</option>
                        <option value="active">En cours</option>
                        <option value="failed">Échoués</option>
                    </select>
                    <select id="date-filter" class="w-auto pr-10 border border-gray-200 rounded-lg px-3 py-2 focus:ring-lime-500 focus:border-lime-500">
                        <option value="">Toutes les dates</option>
                        <option value="this-month">Ce mois-ci</option>
                        <option value="last-month">Le mois dernier</option>
                        <option value="this-year">Cette année</option>
                        <option value="last-year">L'année dernière</option>
                    </select>
                    <select id="sort-by" class="w-auto pr-10 border border-gray-200 rounded-lg px-3 py-2 focus:ring-lime-500 focus:border-lime-500">
                        <option value="newest">Plus récents</option>
                        <option value="oldest">Plus anciens</option>
                        <option value="amount-high">Montant (décroissant)</option>
                        <option value="amount-low">Montant (croissant)</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Liste des contributions -->
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="p-6 border-b border-gray-100">
                <h3 class="text-lg font-semibold text-gray-900">Historique des contributions</h3>
            </div>

            @if(count($contributions ?? []) > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Projet</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Montant</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                                <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @include('contribution.partials.contributions-table')
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="px-6 py-4 border-t border-gray-200">
                    {{ $contributions->links() }}
                </div>
            @else
                <div class="p-12 text-center">
                    <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-lime-100 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0zm3 0h.008v.008H18V10.5zm-12 0h.008v.008H6V10.5z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Aucune contribution trouvée</h3>
                    <p class="text-gray-500 mb-6">Vous n'avez pas encore contribué à un projet.</p>
                    <a href="{{ route('projects.index') }}" class="inline-flex items-center px-4 py-2 bg-lime-500 hover:bg-lime-600 text-white font-medium rounded-full transition-colors shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 010 .656l-5.603 3.113a.375.375 0 01-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112z" />
                        </svg>
                        Découvrir des projets
                    </a>
                </div>
            @endif
        </div>

        <!-- Projets recommandés -->
        <div class="mt-12">
            <h2 class="text-xl font-bold text-gray-900 mb-6">Projets qui pourraient vous intéresser</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($recommendedProjects ?? [] as $project)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-md">
                        <div class="relative">
                            @if($project->images && count($project->images) > 0)
                                <img src="{{ $project->images[0]->image_url }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                            @else
                                <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-300">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Badge de catégorie -->
                            <div class="absolute bottom-4 left-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-lime-100 text-lime-800">
                                    {{ $project->category->name }}
                                </span>
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-2 line-clamp-1">{{ $project->title }}</h3>
                            <p class="text-gray-600 mb-4 text-sm line-clamp-2">{{ $project->description }}</p>
                            
                            <!-- Barre de progression -->
                            <div class="mb-4">
                                @php
                                    $percentage = min(100, round(($project->current_amount / $project->goal_amount) * 100));
                                @endphp
                                <div class="w-full bg-gray-100 rounded-full h-2 mb-2">
                                    <div class="bg-lime-500 h-2 rounded-full" style="width: {{ $percentage }}%"></div>
                                </div>
                                <div class="flex justify-between text-sm">
                                    <span class="font-medium">{{ $percentage }}% financé</span>
                                    <span class="text-gray-500">
                                        @if($project->end_date->isPast())
                                            <span class="text-red-500">Terminé</span>
                                        @else
                                            {{ $project->daysLeft() }} jours restants
                                        @endif
                                    </span>
                                </div>
                            </div>
                            
                            <a href="{{ route('projects.show', $project) }}" class="block w-full bg-lime-500 hover:bg-lime-600 text-white text-center py-2 rounded-lg transition duration-300 font-medium">
                                Voir le projet
                            </a>
                        </div>
                    </div>
                @endforeach
                
                @if(count($recommendedProjects ?? []) === 0)
                    <div class="col-span-1 md:col-span-3 bg-gray-50 rounded-xl p-8 text-center">
                        <p class="text-gray-600">Aucun projet recommandé pour le moment.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<script>
 
</script>
</x-dashboard-sidebar>
</x-app-layout>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');
    const statusFilter = document.getElementById('status-filter');
    const dateFilter = document.getElementById('date-filter');
    const sortBy = document.getElementById('sort-by');
    const contributionsContainer = document.querySelector('table tbody');
    const paginationContainer = document.querySelector('.px-6.py-4.border-t');
    const statsElements = {
        totalAmount: document.querySelector('[data-stat="total-amount"]'),
        supportedProjects: document.querySelector('[data-stat="supported-projects"]'),
        averageAmount: document.querySelector('[data-stat="average-amount"]')
    };
    
    let timer;
    const debounceTime = 500;

    function loadContributions() {
        const filters = {
            search: searchInput.value,
            status: statusFilter.value,
            'date-filter': dateFilter.value,
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
            if (contributionsContainer) {
                contributionsContainer.innerHTML = data.table;
            }
            if (paginationContainer) {
                paginationContainer.innerHTML = data.pagination;
            }
            if (statsElements.totalAmount) {
                statsElements.totalAmount.textContent = `${data.stats.totalAmount} €`;
            }
            if (statsElements.supportedProjects) {
                statsElements.supportedProjects.textContent = data.stats.supportedProjects;
            }
            if (statsElements.averageAmount) {
                statsElements.averageAmount.textContent = `${data.stats.averageAmount} €`;
            }
        })
        .catch(error => {
            console.error('Error loading contributions:', error);
        });
    }

    // Écouteurs d'événements
    [searchInput, statusFilter, dateFilter, sortBy].forEach(element => {
        element?.addEventListener('change', function() {
            clearTimeout(timer);
            timer = setTimeout(loadContributions, debounceTime);
        });
    });

    searchInput?.addEventListener('input', function() {
        clearTimeout(timer);
        timer = setTimeout(loadContributions, debounceTime);
    });
});
</script>


