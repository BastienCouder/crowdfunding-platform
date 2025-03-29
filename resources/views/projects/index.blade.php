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
            
            <!-- Projects Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($projects as $project)
                    <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden transition duration-300 ease-in-out transform hover:-translate-y-2 hover:shadow-md">
                        <div class="relative">
                            @if ($project->images && count($project->images) > 0)
                                <img src="{{ $project->images[0]->image_url }}" alt="{{ $project->title }}" class="w-full h-52 object-cover">
                            @else
                                <div class="w-full h-52 bg-gray-100 flex items-center justify-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 text-gray-300">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                    </svg>
                                </div>
                            @endif
                            
                            <!-- Project Status Badge -->
                            <div class="absolute top-4 right-4 bg-white rounded-full px-3 py-1 text-xs font-medium shadow-sm">
                                @if($project->status === 'completed')
                                    Terminé
                                @elseif($project->status === 'upcoming')
                                    À venir
                                @else
                                    {{ round(($project->current_amount / $project->goal_amount) * 100) }}% financé
                                @endif
                            </div>
                            
                            <!-- Category Badge -->
                            <div class="absolute bottom-4 left-4 bg-lime-500 text-white rounded-full px-3 py-1 text-xs font-medium shadow-sm">
                                {{ $project->category->name }}
                            </div>
                        </div>
                        
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <div class="w-8 h-8 rounded-full bg-gray-200 overflow-hidden mr-3">
                                    @if($project->user->profile_photo)
                                        <img src="{{ $project->user->profile_photo }}" alt="{{ $project->user->name }}" class="w-full h-full object-cover">
                                    @else
                                        <div class="w-full h-full flex items-center justify-center text-gray-500">
                                            {{ substr($project->user->name, 0, 1) }}
                                        </div>
                                    @endif
                                </div>
                                <span class="text-sm text-gray-600">{{ $project->user->name }}</span>
                            </div>
                            
                            <h2 class="text-xl font-bold text-gray-800 mb-2 line-clamp-2">{{ $project->title }}</h2>
                            <p class="text-gray-600 mb-6 text-sm line-clamp-3">{{ $project->description }}</p>
                            
                            <!-- Progress Bar -->
                            <div class="mb-4">
                                <div class="w-full bg-gray-100 rounded-full h-2">
                                    <div class="bg-lime-500 h-2 rounded-full" style="width: {{ min(($project->current_amount / $project->goal_amount) * 100, 100) }}%"></div>
                                </div>
                            </div>
                            
                            <!-- Stats -->
                            <div class="flex justify-between items-center mb-6 text-sm">
                                <div>
                                    <span class="text-gray-500 block">Objectif</span>
                                    <span class="font-bold text-gray-800">{{ number_format($project->goal_amount, 0, ',', ' ') }} €</span>
                                </div>
                                <div class="text-right">
                                    <span class="text-gray-500 block">Collectés</span>
                                    <span class="font-bold text-lime-600">{{ number_format($project->current_amount, 0, ',', ' ') }} €</span>
                                </div>
                            </div>
                            
                            <!-- Days Left -->
                            <div class="flex justify-between items-center mb-6">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">
                                        @if($project->status === 'completed')
                                            Terminé
                                        @elseif($project->status === 'upcoming')
                                            Débute le {{ $project->start_date->format('d/m/Y') }}
                                        @else
                                            {{ $project->days_left }} jours restants
                                        @endif
                                    </span>
                                </div>
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <span class="text-sm text-gray-600">{{ $project->backers_count }} contributeurs</span>
                                </div>
                            </div>
                            
                            <!-- Action Button -->
                            <a href="{{ route('projects.show', $project) }}" class="block w-full bg-lime-500 hover:bg-lime-600 text-white text-center py-3 rounded-lg transition duration-300 font-medium">
                                @if($project->status === 'completed')
                                    Voir les résultats
                                @elseif($project->status === 'upcoming')
                                    S'inscrire à l'alerte
                                @else
                                    Contribuer
                                @endif
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <!-- Empty State -->
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
            
            <!-- Pagination -->
            <div class="mt-12">
                {{ $projects->links() }}
            </div>
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
                <a href="#" class="inline-block bg-lime-500 hover:bg-lime-600 text-white font-medium px-8 py-3 rounded-lg transition duration-300">
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
                
                // Update URL without reloading
                const newUrl = `${window.location.pathname}?${params.toString()}`;
                window.history.pushState({}, '', newUrl);
                
                fetch(`${window.location.pathname}?${params.toString()}&ajax=1`, {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                .then(response => {
                    if (!response.ok) throw new Error('Network response was not ok');
                    return response.json();
                })
                .then(data => {
                    if (data.html) {
                        projectsGrid.innerHTML = data.html;
                    }
                    
                    if (paginationContainer && data.pagination) {
                        paginationContainer.innerHTML = data.pagination;
                    }
                    
                    // Show/hide empty state
                    if (emptyState) {
                        if (data.html.includes('bg-white rounded-xl shadow-sm')) {
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