<x-app-layout>
    @include('layouts.navigation')
    
    <!-- Hero Section -->
    <section class="relative mb-12">
        <div class="relative rounded-lg mx-6 overflow-hidden">
            <picture>
                <source srcset="{{ asset('images/hands.webp') }}" type="image/webp">
                <source srcset="{{ asset('images/hands.jpg') }}" type="image/jpeg">
                <img src="{{ asset('images/hands.jpg') }}" 
                     alt="Mains qui se tendent les unes vers les autres" 
                     loading="eager"
                     width="1200"
                     height="300"
                     class="w-full h-[220px] md:h-[300px] object-cover"
                     style="background: #e2e8f0">
            </picture>
            <div class="absolute inset-0 bg-gray-800/30"></div>
            <div class="absolute inset-0 flex flex-col justify-center px-8 md:px-12">
                <h1 class="text-white text-3xl md:text-5xl font-bold mb-4">Découvrez nos projets</h1>
                <p class="text-white text-lg md:text-2xl font-medium max-w-2xl">Soutenez des causes qui vous tiennent à cœur et faites une différence concrète.</p>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section class="px-6 mb-20">
        <div class="container mx-auto max-w-6xl">
            <!-- Filters Section -->
            <div class="mb-12">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <h2 class="text-xl font-bold mb-4">Filtrer les projets</h2>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <!-- Search Input -->
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </div>
                            <input type="text" id="search" placeholder="Rechercher..." class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500">
                        </div>
                        
                        <!-- Status Filter -->
                        <select id="status-filter" class="border border-gray-200 rounded-lg px-3 py-2 focus:ring-lime-500 focus:border-lime-500">
                            <option value="">Tous les statuts</option>
                            <option value="active">Actifs</option>
                            <option value="completed">Terminés</option>
                            <option value="upcoming">À venir</option>
                        </select>
                        
                        <!-- Category Filter -->
                        <select id="category-filter" class="border border-gray-200 rounded-lg px-3 py-2 focus:ring-lime-500 focus:border-lime-500">
                            <option value="">Toutes catégories</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        
                        <!-- Sort By -->
                        <select id="sort-by" class="border border-gray-200 rounded-lg px-3 py-2 focus:ring-lime-500 focus:border-lime-500">
                            <option value="newest">Plus récents</option>
                            <option value="popular">Plus populaires</option>
                            <option value="ending">Bientôt terminés</option>
                            <option value="most_funded">Plus financés</option>
                        </select>
                    </div>
                </div>
            </div>
            
             <!-- Projects Grid Container -->
        <div id="projects-grid-container">
            
            @include('projects.partials.projects-grid-website', ['projects' => $projects])
        </div>
        
        <!-- Pagination Container -->
        <div id="pagination-container" class="mt-6">
            {{ $projects->links() }}
        </div>

        @if(count($projects) === 0)
            <div class="text-center py-16 bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="bg-lime-50 inline-flex rounded-full p-4 mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-gray-800 mb-2">Aucun projet disponible</h3>
                <p class="text-gray-600 mb-8">Aucun projet ne correspond à vos critères de recherche. Essayez d'ajuster vos filtres.</p>
                <button onclick="resetFilters()" class="bg-lime-500 hover:bg-lime-600 text-white font-medium px-6 py-2 rounded-lg transition duration-300">
                    Réinitialiser les filtres
                </button>
            </div>
        @endif
        </div>
        </section>
    <!-- Call to Action -->
    <section class="bg-gray-50 py-20 px-6 mb-20">
        <div class="container mx-auto max-w-6xl">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Vous avez un projet à financer ?</h2>
                <p class="text-lg text-gray-600 mb-8">
                    Lancez votre propre campagne de financement et donnez vie à vos idées grâce à notre communauté.
                </p>
                <a href="#" class="inline-block bg-lime-300 hover:bg-lime-400 text-fg font-medium px-8 py-3 rounded-lg transition duration-300">
                    Créer un projet
                </a>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="px-6 mb-20">
        <div class="container mx-auto max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4">Questions fréquentes</h2>
                <div class="w-20 h-1 bg-lime-500 mx-auto mb-6"></div>
                <p class="text-gray-600 max-w-3xl mx-auto">Trouvez des réponses aux questions les plus courantes sur le financement participatif.</p>
            </div>
            
            <div class="max-w-3xl mx-auto">
                <div class="space-y-4">
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h3 class="font-medium">Comment choisir un projet à soutenir ?</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">Nous vous recommandons de choisir des projets qui correspondent à vos centres d'intérêt et valeurs. Examinez attentivement la description du projet, l'équipe derrière le projet et les contreparties offertes avant de contribuer.</p>
                        </div>
                    </div>
                    
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h3 class="font-medium">Comment fonctionnent les contreparties ?</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">Les porteurs de projet proposent souvent des contreparties en échange de contributions. Ces contreparties sont décrites sur la page du projet. Le porteur de projet s'engage à livrer ces contreparties une fois le projet réalisé.</p>
                        </div>
                    </div>
                    
                    <div class="border-b pb-4 faq-item">
                        <div class="flex justify-between items-center cursor-pointer faq-header">
                            <h3 class="font-medium">Puis-je annuler ma contribution ?</h3>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                        </div>
                        <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                            <p class="pt-4 text-gray-600">Dans le modèle "Tout ou rien", vous pouvez annuler votre contribution tant que la campagne n'a pas atteint son objectif. Dans le modèle "Flexible", les contributions sont immédiatement versées au porteur de projet et ne peuvent pas être annulées.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // FAQ accordion functionality
            const faqHeaders = document.querySelectorAll('.faq-header');
            
            faqHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const faqItem = this.closest('.faq-item');
                    const content = faqItem.querySelector('.faq-content');
                    const icon = this.querySelector('svg');
                    
                    // Toggle the active state
                    if (content.style.maxHeight) {
                        content.style.maxHeight = null;
                        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />';
                    } else {
                        content.style.maxHeight = content.scrollHeight + "px";
                        icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />';
                    }
                });
            });

            // AJAX Filtering
            const searchInput = document.getElementById('search');
            const statusFilter = document.getElementById('status-filter');
            const categoryFilter = document.getElementById('category-filter');
            const sortBy = document.getElementById('sort-by');
            const projectsGrid = document.querySelector('.grid.grid-cols-1');
            const paginationContainer = document.querySelector('.mt-12');
            const emptyState = document.querySelector('.text-center.py-16');
            
            function loadProjects() {
    const params = new URLSearchParams();
    
    if (searchInput.value) params.append('search', searchInput.value);
    if (statusFilter.value) params.append('status', statusFilter.value);
    if (categoryFilter.value) params.append('category', categoryFilter.value);
    if (sortBy.value) params.append('sort', sortBy.value);
    
    fetch(`${window.location.pathname}?${params.toString()}&ajax=1`, {
        headers: { 
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) throw new Error('Network response was not ok');
        return response.json();
    })
    .then(data => {
        // Mettre à jour la grille de projets
        if (data.html) {
            document.querySelector('#projects-grid-container').innerHTML = data.html;
        }
        
        // Mettre à jour la pagination
        if (data.pagination) {
            document.querySelector('#pagination-container').innerHTML = data.pagination;
        }
        
        // Mettre à jour les valeurs des filtres
        if (data.filters) {
            searchInput.value = data.filters.search || '';
            statusFilter.value = data.filters.status || '';
            categoryFilter.value = data.filters.category || '';
            sortBy.value = data.filters.sort || 'newest';
        }
        
        // Gérer l'état vide
        const emptyState = document.querySelector('#empty-state');
        if (emptyState) {
            if (data.html.includes('project-item')) { // Supposons que vos projets ont la classe 'project-item'
                emptyState.classList.add('hidden');
            } else {
                emptyState.classList.remove('hidden');
            }
        }
    })
    .catch(error => console.error('Error:', error));
}
            
            [searchInput, statusFilter, categoryFilter, sortBy].forEach(element => {
                if (element) {
                    element.addEventListener('change', loadProjects);
                }
            });
            
            // Search with debounce
            let searchTimer;
            if (searchInput) {
                searchInput.addEventListener('input', () => {
                    clearTimeout(searchTimer);
                    searchTimer = setTimeout(loadProjects, 500);
                });
            }
            
            // Reset filters
            window.resetFilters = function() {
                searchInput.value = '';
                statusFilter.value = '';
                categoryFilter.value = '';
                sortBy.value = 'newest';
                loadProjects();
            };
            
            // Initial load if URL has params
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.toString() && urlParams.toString() !== 'ajax=1') {
                loadProjects();
            }
        });
    </script>

    @include('layouts.footer')
</x-app-layout>