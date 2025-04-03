<x-app-layout>
    @include('layouts.navigation')
    <!-- Section Hero -->
    <section class="relative mb-12">
        <div class="relative rounded-lg mx-6 overflow-hidden">
            <picture>
                <source srcset="{{ asset('images/hands.webp') }}" type="image/webp">
                <source srcset="{{ asset('images/hands.jpg') }}" type="image/jpeg">
                <img src="{{ asset('images/hands.jpg') }}" 
                     alt="Communauté locale plantant des arbres" 
                     loading="eager"
                     width="1200"
                     height="300"
                     class="w-full h-[220px] md:h-[300px] object-cover"
                     style="background: #e2e8f0">
            </picture>
            <div class="absolute inset-0 bg-gray-800/30"></div>
            <div class="absolute inset-0 flex flex-col justify-center px-8 md:px-12">
                <h1 class="text-white text-6xl md:text-7xl font-bold mb-1">ÉcoFund</h1>
                <p class="text-white text-xl md:text-2xl font-medium mb-6">Financez l'avenir<br>de votre territoire</p>
                <div class="flex">
                    <a href="#" class="bg-lime-300 hover:bg-lime-400 text-gray-800 px-4 py-2 rounded-full text-sm font-medium inline-block">
                        Soutenir un projet local
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Section Simple comme bonjour -->
    <section class="px-6 mb-12">
        <h2 class="text-2xl font-bold mb-1">Agir local, c'est simple</h2>
        <p class="text-gray-600 mb-12">En 3 clics, soutenez des initiatives écologiques près de chez vous et voyez leur impact en temps réel.</p>
        
        <!-- Grille de fonctionnalités -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
            <!-- Fonctionnalité 1 -->
            <div class="bg-gray-50 p-6 rounded-lg">
                <div class="bg-lime-100 w-10 h-10 rounded-lg flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                    </svg>
                </div>
                <h3 class="font-bold text-lg mb-2">Projets près de chez vous</h3>
                <p class="text-gray-600 text-sm">Découvrez et soutenez des initiatives écologiques dans un rayon de 15km autour de votre domicile.</p>
            </div>
            
            <!-- Fonctionnalité 2 -->
            <div class="bg-gray-50 p-6 rounded-lg">
                <div class="bg-lime-100 w-10 h-10 rounded-lg flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v12m-3-2.818l.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-.725 0-1.45-.22-2.003-.659-1.106-.879-1.106-2.303 0-3.182s2.9-.879 4.006 0l.415.33M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="font-bold text-lg mb-2">Impact mesurable</h3>
                <p class="text-gray-600 text-sm">Chaque mois, recevez un rapport personnalisé sur l'impact environnemental de vos contributions.</p>
            </div>
            
            <!-- Fonctionnalité 3 -->
            <div class="bg-gray-50 p-6 rounded-lg">
                <div class="bg-lime-100 w-10 h-10 rounded-lg flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-lime-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                    </svg>
                </div>
                <h3 class="font-bold text-lg mb-2">Communauté engagée</h3>
                <p class="text-gray-600 text-sm">Rencontrez les porteurs de projets et autres contributeurs lors d'événements locaux.</p>
            </div>
        </div>
    </section>

    <!-- Section Urgences locales -->
    <section class="px-6 mb-12">
        <h2 class="text-2xl font-bold mb-1">Urgences écologiques locales</h2>
        <p class="text-gray-600 mb-8">Ces projets ont besoin de votre soutien immédiat pour préserver notre environnement local.</p>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
            @foreach($endingSoonProjects as $project)
            <div class="rounded-lg overflow-hidden border border-gray-200 hover:shadow-md transition-shadow">
                <img src="{{ $project->images->first() ? asset('storage/'.$project->images->first()->path) : asset('images/default-eco-project.jpg') }}" 
                     alt="{{ $project->title }}" 
                     class="w-full h-40 object-cover">
                <div class="p-4">
                    <div class="flex items-center mb-2">
                        <span class="text-sm text-gray-600">{{ $project->location }}</span>
                        <span class="ml-2 w-2 h-2 rounded-full {{ $project->isActive() ? 'bg-green-500' : 'bg-gray-500' }}"></span>
                    </div>
                    <h3 class="font-bold">{{ $project->title }}</h3>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 mt-3">
                        <div class="bg-lime-500 h-2.5 rounded-full" 
                             style="width: {{ $project->progressPercentage() }}%"></div>
                    </div>
                    <div class="flex justify-between items-center mt-4">
                        <span class="font-bold">{{ number_format($project->current_amount, 0, ',', ' ') }} €</span>
                        <span class="text-xs text-gray-500">
                            @if($project->daysLeft() > 0)
                                {{ $project->daysLeft() }} jour(s) restant
                            @else
                                Dernier jour !
                            @endif
                        </span>
                    </div>
                    <a href="{{ route('projects.show', $project) }}" class="mt-4 inline-block w-full text-center bg-lime-300 hover:bg-lime-400 text-gray-800 px-4 py-2 rounded-full text-sm font-medium">
                        Contribuer
                    </a>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="text-center">
            <a href="{{ route('projects.index') }}" class="inline-block bg-gray-800 hover:bg-gray-700 text-white px-6 py-2 rounded-full text-sm font-medium">
                Voir tous les projets
            </a>
        </div>
    </section>

    <!-- Section Communauté -->
    <section class="px-6 mb-12 text-center">
        <div class="relative py-12 px-4 max-w-4xl mx-auto">
            <!-- Images de fond éco-responsables -->
            <picture class="absolute left-0 top-1/4 w-28 h-28 hidden md:block">
                <source srcset="{{ asset('images/ferme.jpg') }}" type="image/jpeg">
                <img src="{{ asset('images/ferme.jpg') }}" 
                     alt="Ferme locale" 
                     loading="lazy"
                     width="112"
                     height="112"
                     class="w-full h-full object-cover rounded-lg"
                     style="background: #e2e8f0">
            </picture>

            <picture class="absolute right-0 top-1/4 w-28 h-28 hidden md:block">
                <source srcset="{{ asset('images/panneau.jpg') }}" type="image/jpeg">
                <img src="{{ asset('images/panneau.jpg') }}" 
                     alt="Panneaux solaires" 
                     loading="lazy"
                     width="112"
                     height="112"
                     class="w-full h-full object-cover rounded-lg"
                     style="background: #e2e8f0">
            </picture>

            <picture class="absolute left-28 bottom-0 w-28 h-28 hidden md:block">
                <source srcset="{{ asset('images/bottle.webp') }}" type="image/webp">
                <source srcset="{{ asset('images/bottle.jpg') }}" type="image/jpeg">
                <img src="{{ asset('images/bottle.jpg') }}" 
                     alt="Centre de recyclage" 
                     loading="lazy"
                     width="112"
                     height="112"
                     class="w-full h-full object-cover rounded-lg"
                     style="background: #e2e8f0">
            </picture>

            <picture class="absolute right-28 bottom-0 w-28 h-28 hidden md:block">
                <source srcset="{{ asset('images/jardin.jpg') }}" type="image/jpeg">
                <img src="{{ asset('images/jardin.jpg') }}" 
                     alt="Jardin communautaire" 
                     loading="lazy"
                     width="112"
                     height="112"
                     class="w-full h-full object-cover rounded-lg"
                     style="background: #e2e8f0">
            </picture>
            
            <h2 class="text-xl font-bold mb-2">Rejoignez les</h2>
            <div class="text-7xl font-bold mb-4">24 763</div>
            <p class="mb-6">Citoyens engagés pour notre région</p>
            <a href="#" class="bg-lime-300 hover:bg-lime-400 text-gray-800 px-6 py-2 rounded-full text-sm font-medium inline-block">
                S'inscrire à la newsletter
            </a>
        </div>
    </section>

    <!-- Section FAQ -->
    <section class="w-full px-6 flex flex-col items-center justify-center mb-16">
        <h2 class="text-2xl font-bold mb-8">Questions fréquentes</h2>
        
        <div class="space-y-4 w-full max-w-3xl">
            <!-- Question 1 -->
            <div class="border-b pb-4 faq-item">
                <div class="flex justify-between items-center cursor-pointer faq-header">
                    <h3 class="font-medium group-hover:text-lime-600 transition-colors">Comment sont sélectionnés les projets ?</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400 group-hover:text-lime-600 transition-colors">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
                <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                    <p class="text-gray-600 pt-4">Un comité local indépendant évalue chaque projet sur 3 critères : impact environnemental, ancrage territorial et viabilité. Seuls 30% des projets soumis sont retenus.</p>
                </div>
            </div>
            
            <!-- Question 2 -->
            <div class="border-b pb-4 faq-item">
                <div class="flex justify-between items-center cursor-pointer faq-header">
                    <h3 class="font-medium group-hover:text-lime-600 transition-colors">Puis-je visiter les projets que je soutiens ?</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400 group-hover:text-lime-600 transition-colors">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
                <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                    <p class="text-gray-600 pt-4">Absolument ! Nous organisons régulièrement des journées portes ouvertes. Vous recevrez des invitations en fonction de votre localisation et des projets que vous soutenez.</p>
                </div>
            </div>
            
            <!-- Question 3 -->
            <div class="border-b pb-4 faq-item">
                <div class="flex justify-between items-center cursor-pointer faq-header">
                    <h3 class="font-medium group-hover:text-lime-600 transition-colors">Quelle part prend la plateforme ?</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400 group-hover:text-lime-600 transition-colors">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
                <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                    <p class="text-gray-600 pt-4">Seulement 5% (au lieu de 8% en moyenne sur les autres plateformes), grâce à notre statut d'entreprise solidaire et au soutien de notre région.</p>
                </div>
            </div>
            
            <!-- Question 4 -->
            <div class="border-b pb-4 faq-item">
                <div class="flex justify-between items-center cursor-pointer faq-header">
                    <h3 class="font-medium group-hover:text-lime-600 transition-colors">Comment l'impact écologique est-il calculé ?</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400 group-hover:text-lime-600 transition-colors">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
                <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                    <p class="text-gray-600 pt-4">Nous utilisons la méthodologie Bilan Carbone® adaptée aux spécificités locales, avec vérification par un organisme agréé par l'ADEME.</p>
                </div>
            </div>
            
            <!-- Question 5 -->
            <div class="border-b pb-4 faq-item">
                <div class="flex justify-between items-center cursor-pointer faq-header">
                    <h3 class="font-medium group-hover:text-lime-600 transition-colors">Puis-je proposer un projet ?</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-gray-400 group-hover:text-lime-600 transition-colors">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                </div>
                <div class="faq-content overflow-hidden max-h-0 transition-all duration-300">
                    <p class="text-gray-600 pt-4">Oui, si votre projet est situé dans notre région et répond à nos critères écologiques. Notre équipe vous accompagne gratuitement dans le montage de votre campagne.</p>
                </div>
            </div>
        </div>
    </section>

<script>
    // FAQ search functionality
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
    });
</script>

    @include('partials.call-to-action')
    @include('layouts.footer')
</x-app-layout>