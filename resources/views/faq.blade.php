<x-app-layout>
    @include('layouts.navigation')
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
        <div class="absolute inset-0 bg-gray-800/40"></div>
        <div class="absolute inset-0 flex flex-col justify-center px-8 md:px-12">
            <h1 class="text-white text-3xl md:text-5xl font-bold mb-4">Foire Aux Questions</h1>
            <p class="text-white text-lg md:text-2xl font-medium max-w-2xl">Trouvez des réponses à toutes vos questions sur le fonctionnement de Fund.</p>
        </div>
    </div>
</section>

<section class="px-6 mb-12">
    <div class="container mx-auto max-w-6xl">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold mb-4">Comment pouvons-nous vous aider ?</h2>
            <div class="w-20 h-1 bg-lime-500 mx-auto mb-6"></div>
            <p class="text-gray-600 max-w-3xl mx-auto">Nous avons rassemblé les questions les plus fréquemment posées pour vous aider à mieux comprendre notre plateforme. Si vous ne trouvez pas la réponse à votre question, n'hésitez pas à nous contacter.</p>
        </div>
        
        <!-- Search Bar -->
        <div class="max-w-2xl mx-auto mb-16">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </div>
                <input type="text" id="faq-search" placeholder="Rechercher une question..." class="block w-full pl-10 pr-3 py-4 border border-gray-200 rounded-lg focus:ring-lime-500 focus:border-lime-500 shadow-sm">
            </div>
        </div>
    </div>
</section>

<!-- FAQ Categories and Questions -->
<section class="px-6 mb-20">
    <div class="container mx-auto max-w-6xl">
        <!-- Category Tabs -->
        <div class="mb-12 border-b border-gray-200">
            <div class="flex flex-wrap -mb-px">
                @foreach($categories as $key => $name)
                    <button class="category-tab mr-2 inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300 font-medium @if($loop->first) active border-lime-500 text-lime-600 @endif" data-category="{{ $key }}">
                        {{ $name }}
                    </button>
                @endforeach
            </div>
        </div>
        
        <!-- FAQ Content -->
        <div class="max-w-5xl mx-auto space-y-8">
            @foreach($categories as $key => $name)
                <div id="{{ $key }}" class="faq-category @if(!$loop->first) hidden @endif">
                    <h3 class="text-2xl font-bold mb-6">{{ $name }}</h3>
                    
                    <div class="space-y-4">
                        @foreach($faqsByCategory[$key] as $faq)
                            <div class="border-b pb-4 faq-item">
                                <div class="flex justify-between items-center cursor-pointer faq-header">
                                    <h4 class="font-medium">{{ $faq->question }}</h4>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </div>
                                <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                                    <p class="pt-4 text-gray-600">{{ $faq->answer }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@include('partials.call-to-action')

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Sauvegarde le contenu original au chargement
    const originalContent = {};
    document.querySelectorAll('.faq-category').forEach(cat => {
        originalContent[cat.id] = cat.innerHTML;
    });

    const searchInput = document.getElementById('faq-search');
    let searchTimeout;

    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const searchTerm = this.value.trim();
        
        if (searchTerm.length === 0) {
            resetToOriginalState();
            return;
        }
        
        searchTimeout = setTimeout(() => {
            performSearch(searchTerm);
        }, 300);
    });

    function resetToOriginalState() {
        // Restaure le contenu original
        document.querySelectorAll('.faq-category').forEach(cat => {
            cat.innerHTML = originalContent[cat.id];
            cat.classList.add('hidden');
        });
        
        // Réactive le premier onglet par défaut
        const firstTab = document.querySelector('.category-tab');
        const firstCategory = firstTab.dataset.category;
        
        document.getElementById(firstCategory).classList.remove('hidden');
        
        // Réinitialise les styles des onglets
        document.querySelectorAll('.category-tab').forEach(tab => {
            tab.classList.remove('active', 'border-lime-500', 'text-lime-600');
            tab.classList.add('border-transparent', 'hover:text-gray-600', 'hover:border-gray-300');
        });
        
        firstTab.classList.add('active', 'border-lime-500', 'text-lime-600');
        firstTab.classList.remove('border-transparent', 'hover:text-gray-600', 'hover:border-gray-300');
        
        // Réattache les événements
        attachFaqEventListeners();
    }

    function performSearch(searchTerm) {
        // Cache toutes les catégories
        document.querySelectorAll('.faq-category').forEach(cat => {
            cat.classList.add('hidden');
        });

        let hasResults = false;
        
        // Recherche dans chaque élément FAQ
        document.querySelectorAll('.faq-item').forEach(item => {
            const question = item.querySelector('.faq-header h4').textContent.toLowerCase();
            const answer = item.querySelector('.faq-content p').textContent.toLowerCase();
            const searchLower = searchTerm.toLowerCase();
            
            if (question.includes(searchLower) || answer.includes(searchLower)) {
                item.style.display = 'block';
                item.closest('.faq-category').classList.remove('hidden');
                hasResults = true;
            } else {
                item.style.display = 'none';
            }
        });

        if (!hasResults) {
            document.querySelectorAll('.faq-category').forEach(cat => {
                cat.classList.remove('hidden');
                cat.querySelector('.space-y-4').innerHTML = 
                    '<p class="text-gray-500 py-4">Aucun résultat trouvé pour votre recherche.</p>';
            });
        }
    }

    function attachFaqEventListeners() {
        document.querySelectorAll('.faq-header').forEach(header => {
            header.addEventListener('click', function() {
                const content = this.nextElementSibling;
                const icon = this.querySelector('svg');
                
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                    icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />';
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                    icon.innerHTML = '<path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12h-15" />';
                }
            });
        });
    }

    // Gestion des onglets de catégorie
    document.querySelectorAll('.category-tab').forEach(tab => {
        tab.addEventListener('click', function() {
            document.querySelectorAll('.category-tab').forEach(t => {
                t.classList.remove('active', 'border-lime-500', 'text-lime-600');
                t.classList.add('border-transparent', 'hover:text-gray-600', 'hover:border-gray-300');
            });
            
            this.classList.add('active', 'border-lime-500', 'text-lime-600');
            this.classList.remove('border-transparent', 'hover:text-gray-600', 'hover:border-gray-300');
            
            document.querySelectorAll('.faq-category').forEach(cat => {
                cat.classList.add('hidden');
            });
            
            const categoryId = this.getAttribute('data-category');
            document.getElementById(categoryId).classList.remove('hidden');
        });
    });

    // Initialisation
    attachFaqEventListeners();
});
</script>
@include('layouts.footer')
</x-app-layout>
