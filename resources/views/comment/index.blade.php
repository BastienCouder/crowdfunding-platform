<x-dashboard>
    <x-dashboard-sidebar>
        <div class="py-8">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- En-tête -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-900">Mes commentaires</h1>
                        <p class="mt-1 text-sm text-gray-500">Gérez vos commentaires sur les projets</p>
                    </div>
                    <div class="mt-4 md:mt-0">
                        <a href="{{ route('projects.index') }}" class="inline-flex items-center px-4 py-2 bg-lime-300 hover:bg-lime-400 text-fg font-medium rounded-full transition-colors shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                            </svg>
                            Découvrir des projets
                        </a>
                    </div>
                </div>

                <!-- Statistiques des commentaires -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <!-- Total des commentaires -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center">
                            <div class="bg-lime-100 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-sm font-medium text-gray-500">Total des commentaires</h2>
                                <p class="text-2xl font-bold text-gray-900" data-stat="total-comments">{{ $totalComments ?? 0 }}</p>
                            </div>
                        </div>
                    </div>

                    <!-- Projets commentés -->
                    <div class="bg-white rounded-xl shadow-sm p-6 border border-gray-100">
                        <div class="flex items-center">
                            <div class="bg-lime-100 p-3 rounded-lg">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-600">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h2 class="text-sm font-medium text-gray-500">Projets commentés</h2>
                                <p class="text-2xl font-bold text-gray-900" data-stat="commented-projects">{{ $commentedProjects ?? 0 }}</p>
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
                                <input type="text" id="search" placeholder="Rechercher un commentaire..." class="block w-full pl-10 pr-3 py-2 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500">
                            </div>
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <!-- Nouvelle combobox de recherche responsive -->
                            <div class="relative w-full md:w-auto">
                                <input type="text" 
                                       id="project-search-input"
                                       class="w-full border border-gray-200 rounded-lg px-3 py-2 focus:ring-lime-500 focus:border-lime-500"
                                       placeholder="Tous les projets"
                                       autocomplete="off">
                                
                                <select id="project-filter" name="project_filter" class="hidden">
                                    <option value="">Tous les projets</option>
                                    @foreach($projects ?? [] as $project)
                                        <option value="{{ $project->id }}">{{ $project->title }}</option>
                                    @endforeach
                                </select>
                                
                                <div id="project-results" 
                                     class="absolute z-10 w-full mt-1 bg-white border border-gray-200 rounded-lg shadow-lg hidden max-h-60 overflow-y-auto">
                                    <!-- Options injectées dynamiquement -->
                                </div>
                            </div>

                            <select id="date-filter" class="md:w-44 border border-gray-200 rounded-lg px-3 py-2 focus:ring-lime-500 focus:border-lime-500">
                                <option value="">Toutes les dates</option>
                                <option value="this-week">Cette semaine</option>
                                <option value="this-month">Ce mois-ci</option>
                                <option value="last-month">Le mois dernier</option>
                                <option value="this-year">Cette année</option>
                            </select>
                            <select id="sort-by" class="md:w-44 border border-gray-200 rounded-lg px-3 py-2 focus:ring-lime-500 focus:border-lime-500">
                                <option value="newest">Plus récents</option>
                                <option value="oldest">Plus anciens</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Liste des commentaires -->
                <div class="space-y-6 mb-8">
                    @if(count($comments ?? []) > 0)
                        @include('comment.partials.comments-list')
                        
                        <!-- Pagination -->
                        <div class="mt-6">
                            {{ $comments->links() }}
                        </div>
                    @else
                        <div class="bg-white rounded-xl shadow-sm p-12 text-center border border-gray-100">
                            <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-lime-100 mb-4">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8 text-lime-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                </svg>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Aucun commentaire trouvé</h3>
                            <p class="text-gray-500 mb-6">Vous n'avez pas encore commenté de projet.</p>
                            <a href="{{ route('projects.index') }}" class="inline-flex items-center px-4 py-2 bg-lime-300 hover:bg-lime-400 text-fg font-medium rounded-full transition-colors shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                </svg>
                                Découvrir des projets
                            </a>
                        </div>
                    @endif
                </div>

                <!-- Projets populaires -->
                <div class="mt-12">
                    <h2 class="text-xl font-bold text-gray-900 mb-6">Projets populaires à commenter</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach($popularProjects ?? [] as $project)
                            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-1 hover:shadow-md">
                                <div class="relative">
                                    @if($project->images && count($project->images) > 0)
                                        <img src="{{ asset('storage/'. $project->images[0]->image_url) }}" alt="{{ $project->title }}" class="w-full h-48 object-cover">
                                    @else
                                        <div class="w-full h-48 bg-gray-100 flex items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-300">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                            </svg>
                                        </div>
                                    @endif
                                    
                                    <!-- Badge de commentaires -->
                                    <div class="absolute top-4 right-4 bg-white rounded-full px-3 py-1 text-xs font-medium shadow-sm">
                                        <div class="flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1 text-lime-500">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 8.25h9m-9 3H12m-9.75 1.51c0 1.6 1.123 2.994 2.707 3.227 1.129.166 2.27.293 3.423.379.35.026.67.21.865.501L12 21l2.755-4.133a1.14 1.14 0 01.865-.501 48.172 48.172 0 003.423-.379c1.584-.233 2.707-1.626 2.707-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                            </svg>
                                            {{ $project->comments_count ?? 0 }}
                                        </div>
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
                                    
                                    <a href="{{ route('projects.show', $project) }}" class="block w-full bg-lime-300 hover:bg-lime-400 text-fg text-center py-2 rounded-lg transition duration-300 font-medium">
                                        Voir et commenter
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        
                        @if(count($popularProjects ?? []) === 0)
                            <div class="col-span-1 md:col-span-3 bg-gray-50 rounded-xl p-8 text-center">
                                <p class="text-gray-600">Aucun projet populaire disponible pour le moment.</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Gestion de la combobox de recherche de projets
            const searchInput = document.getElementById('project-search-input');
            const hiddenSelect = document.getElementById('project-filter');
            const resultsContainer = document.getElementById('project-results');
            const allOptions = Array.from(hiddenSelect.options).map(option => ({
                value: option.value,
                text: option.textContent
            }));

            // Fonction pour filtrer les projets
            function filterProjects(searchTerm = '') {
                const filtered = allOptions.filter(option => 
                    option.text.toLowerCase().includes(searchTerm.toLowerCase())
                );
                
                resultsContainer.innerHTML = '';
                
                if (filtered.length === 0) {
                    const noResult = document.createElement('div');
                    noResult.className = 'px-4 py-2 text-gray-500';
                    noResult.textContent = 'Aucun projet trouvé';
                    resultsContainer.appendChild(noResult);
                    return;
                }
                
                filtered.forEach(option => {
                    const item = document.createElement('div');
                    item.className = 'px-4 py-2 hover:bg-gray-100 cursor-pointer flex items-center';
                    item.innerHTML = `
                        <span class="truncate">${option.text}</span>
                        ${option.value === '' ? '<span class="ml-auto text-xs text-gray-500">Tous</span>' : ''}
                    `;
                    
                    item.addEventListener('click', () => {
                        searchInput.value = option.text;
                        hiddenSelect.value = option.value;
                        resultsContainer.classList.add('hidden');
                        loadComments(); // Appel à votre fonction existante
                    });
                    
                    resultsContainer.appendChild(item);
                });
            }

            // Gestion des événements
            searchInput.addEventListener('input', (e) => {
                filterProjects(e.target.value);
                resultsContainer.classList.remove('hidden');
            });

            searchInput.addEventListener('focus', () => {
                if (searchInput.value === '') {
                    filterProjects();
                }
                resultsContainer.classList.remove('hidden');
            });

            // Fermer le dropdown quand on clique ailleurs
            document.addEventListener('click', (e) => {
                if (!e.target.closest('#project-results') && e.target !== searchInput) {
                    resultsContainer.classList.add('hidden');
                }
            });

            // Pré-remplir si une valeur est déjà sélectionnée
            if (hiddenSelect.value) {
                const selectedOption = allOptions.find(opt => opt.value === hiddenSelect.value);
                if (selectedOption) {
                    searchInput.value = selectedOption.text;
                }
            }

            // Navigation clavier
            searchInput.addEventListener('keydown', (e) => {
                const items = resultsContainer.querySelectorAll('div');
                let currentIndex = -1;
                
                if (e.key === 'ArrowDown') {
                    e.preventDefault();
                    currentIndex = 0;
                } else if (e.key === 'ArrowUp') {
                    e.preventDefault();
                    currentIndex = items.length - 1;
                } else if (e.key === 'Enter') {
                    e.preventDefault();
                    if (items.length > 0) {
                        items[0].click();
                    }
                    return;
                }
                
                if (currentIndex >= 0 && items.length > 0) {
                    items[currentIndex].focus();
                }
            });

            // Fonction existante pour charger les commentaires
            const loadComments = function() {
                const filters = {
                    search: document.getElementById('search').value,
                    project: hiddenSelect.value,
                    date: document.getElementById('date-filter').value,
                    sort: document.getElementById('sort-by').value
                };

                const params = new URLSearchParams();
                Object.entries(filters).forEach(([key, value]) => {
                    if (value) params.append(key, value);
                });

                const newUrl = `${window.location.pathname}?${params.toString()}`;
                window.history.pushState({}, '', newUrl);

                fetch(`${window.location.pathname}?${params.toString()}&ajax=1`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(response => response.json())
                .then(data => {
                    const commentsContainer = document.querySelector('.space-y-6');
                    const paginationContainer = document.querySelector('.mt-6');
                    
                    if (commentsContainer) commentsContainer.innerHTML = data.comments;
                    if (paginationContainer) paginationContainer.innerHTML = data.pagination;
                    
                    // Mettre à jour les statistiques
                    document.querySelector('[data-stat="total-comments"]').textContent = data.stats.totalComments;
                    document.querySelector('[data-stat="commented-projects"]').textContent = data.stats.commentedProjects;
                })
                .catch(error => console.error('Error:', error));
            };

            // Écouteurs pour les autres filtres
            document.getElementById('search').addEventListener('input', function() {
                clearTimeout(this.timer);
                this.timer = setTimeout(loadComments, 500);
            });

            document.getElementById('date-filter').addEventListener('change', loadComments);
            document.getElementById('sort-by').addEventListener('change', loadComments);

            // Gestion de l'édition des commentaires
            document.addEventListener('click', function(e) {
                if (e.target.closest('.edit-comment-btn')) {
                    const commentId = e.target.closest('.edit-comment-btn').getAttribute('data-comment-id');
                    document.querySelector(`.comment-content-${commentId}`).classList.add('hidden');
                    document.querySelector(`.edit-form-${commentId}`).classList.remove('hidden');
                }
                
                if (e.target.closest('.cancel-edit-btn')) {
                    const commentId = e.target.closest('.cancel-edit-btn').getAttribute('data-comment-id');
                    document.querySelector(`.comment-content-${commentId}`).classList.remove('hidden');
                    document.querySelector(`.edit-form-${commentId}`).classList.add('hidden');
                }
            });
        });
        </script>
    </x-dashboard-sidebar>
</x-dashboard>